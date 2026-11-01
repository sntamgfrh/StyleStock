<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        // Admin dan Staff dapat melihat semua transaksi.
        $query = Sale::with('user', 'items.product')
            ->latest('sold_at');

        // Pencarian nomor transaksi atau nama pembeli.
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('sale_number', 'like', '%' . $search . '%')
                    ->orWhere('buyer_name', 'like', '%' . $search . '%');
            });
        }

        // Filter status transaksi.
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $sales = $query->paginate(10)->withQueryString();

        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::where('stock', '>', 0)
            ->where('selling_price', '>', 0)
            ->orderBy('name')
            ->get();

        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'buyer_name' => [
                'required',
                'string',
                'max:255',
            ],

            'items' => [
                'required',
                'array',
                'min:1',
            ],

            'items.*.product_id' => [
                'required',
                'integer',
                'distinct',
                'exists:products,id',
            ],

            'items.*.quantity' => [
                'required',
                'integer',
                'min:1',
            ],
        ], [
            'buyer_name.required' =>
                'Nama pembeli wajib diisi.',

            'buyer_name.max' =>
                'Nama pembeli maksimal 255 karakter.',

            'items.required' =>
                'Pilih minimal satu produk.',

            'items.min' =>
                'Pilih minimal satu produk.',

            'items.*.product_id.required' =>
                'Produk wajib dipilih.',

            'items.*.product_id.distinct' =>
                'Produk yang sama tidak boleh dimasukkan dua kali.',

            'items.*.product_id.exists' =>
                'Produk yang dipilih tidak ditemukan.',

            'items.*.quantity.required' =>
                'Jumlah produk wajib diisi.',

            'items.*.quantity.min' =>
                'Jumlah produk minimal 1.',
        ]);

        $sale = DB::transaction(function () use ($validated) {

            $productIds = collect($validated['items'])
                ->pluck('product_id')
                ->map(fn ($id) => (int) $id)
                ->sort()
                ->values();

            $products = Product::whereIn('id', $productIds)
                ->orderBy('id')
                ->lockForUpdate()
                ->get()
                ->keyBy('id');

            foreach ($validated['items'] as $item) {
                $product = $products->get(
                    (int) $item['product_id']
                );

                if (!$product) {
                    throw ValidationException::withMessages([
                        'items' =>
                            'Produk yang dipilih tidak ditemukan.',
                    ]);
                }

                if ((int) $product->stock < (int) $item['quantity']) {
                    throw ValidationException::withMessages([
                        'items' =>
                            'Stok produk ' . $product->name .
                            ' tidak mencukupi. Stok tersedia: ' .
                            $product->stock,
                    ]);
                }

                if ((float) $product->selling_price <= 0) {
                    throw ValidationException::withMessages([
                        'items' =>
                            'Harga jual produk ' . $product->name .
                            ' belum diatur. Silakan periksa data produk.',
                    ]);
                }
            }

            // Membuat nomor transaksi dan mencatat waktu otomatis.
            $sale = Sale::create([
                'user_id' => auth()->id(),
                'buyer_name' => trim($validated['buyer_name']),

                'sale_number' => 'TRX-' .
                    now()->format('YmdHis') . '-' .
                    Str::upper(Str::random(5)),

                'total' => 0,
                'status' => 'completed',
                'sold_at' => now(),
            ]);

            $total = 0;

            foreach ($validated['items'] as $item) {
                $product = $products->get(
                    (int) $item['product_id']
                );

                $quantity = (int) $item['quantity'];
                $unitPrice = (float) $product->selling_price;
                $subtotal = $unitPrice * $quantity;

                $total += $subtotal;

                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'unit_price' => $unitPrice,
                    'subtotal' => $subtotal,
                ]);

                // Mengurangi stok produk.
                $product->decrement('stock', $quantity);

                // Mencatat pergerakan stok keluar.
                StockMovement::create([
                    'product_id' => $product->id,
                    'user_id' => auth()->id(),
                    'supplier_id' => null,
                    'type' => 'OUT',
                    'quantity' => $quantity,
                    'notes' =>
                        'Penjualan ' . $sale->sale_number,
                ]);
            }

            // Menyimpan total transaksi.
            $sale->update([
                'total' => $total,
            ]);

            return $sale;
        });

        return redirect()
            ->route('sales.show', $sale->id)
            ->with(
                'success',
                'Transaksi penjualan berhasil disimpan.'
            );
    }

    public function show(Sale $sale)
    {
        // Admin dan Staff dapat melihat detail semua transaksi.
        $sale->load('user', 'items.product');

        return view('sales.show', compact('sale'));
    }

    public function cancel(Sale $sale)
    {
        // Hanya Admin yang boleh membatalkan transaksi.
        if (auth()->user()->role !== 'admin') {
            abort(
                403,
                'Hanya Admin yang dapat membatalkan transaksi.'
            );
        }

        DB::transaction(function () use ($sale) {

            $sale = Sale::whereKey($sale->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($sale->status !== 'completed') {
                throw ValidationException::withMessages([
                    'sale' =>
                        'Transaksi ini sudah dibatalkan atau tidak dapat dibatalkan.',
                ]);
            }

            $items = SaleItem::where('sale_id', $sale->id)
                ->get();

            if ($items->isEmpty()) {
                throw ValidationException::withMessages([
                    'sale' =>
                        'Detail transaksi tidak ditemukan.',
                ]);
            }

            $productIds = $items->pluck('product_id')
                ->unique()
                ->sort()
                ->values();

            $products = Product::whereIn('id', $productIds)
                ->orderBy('id')
                ->lockForUpdate()
                ->get()
                ->keyBy('id');

            foreach ($items as $item) {
                $product = $products->get(
                    (int) $item->product_id
                );

                if (!$product) {
                    throw ValidationException::withMessages([
                        'sale' =>
                            'Produk pada transaksi tidak ditemukan.',
                    ]);
                }

                // Mengembalikan stok produk.
                $product->increment(
                    'stock',
                    (int) $item->quantity
                );

                // Mencatat pergerakan stok masuk.
                StockMovement::create([
                    'product_id' => $product->id,
                    'user_id' => auth()->id(),
                    'supplier_id' => null,
                    'type' => 'IN',
                    'quantity' => $item->quantity,
                    'notes' =>
                        'Pembatalan penjualan ' .
                        $sale->sale_number,
                ]);
            }

            $sale->update([
                'status' => 'cancelled',
            ]);
        });

        return redirect()
            ->route('sales.show', $sale->id)
            ->with(
                'success',
                'Transaksi berhasil dibatalkan dan stok dikembalikan.'
            );
    }
}
