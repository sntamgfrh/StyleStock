<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PurchaseController extends Controller
{
    public function index(Request $request)
    {
        $query = Purchase::with(['supplier', 'user', 'items.product']);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('purchase_number', 'like', "%{$search}%")
                    ->orWhereHas('supplier', function ($supplier) use ($search) {
                        $supplier->where('name', 'like', "%{$search}%");
                    });
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $purchases = $query
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $products = Product::orderBy('name')->get();
        $suppliers = Supplier::orderBy('name')->get();

        return view('purchases.create', compact(
            'products',
            'suppliers'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_id' => [
                'required',
                'exists:suppliers,id',
            ],
            'purchased_at' => [
                'required',
                'date',
            ],
            'items' => [
                'required',
                'array',
                'min:1',
            ],
            'items.*.product_id' => [
                'required',
                'exists:products,id',
            ],
            'items.*.quantity' => [
                'required',
                'integer',
                'min:1',
            ],
            'items.*.unit_cost' => [
                'required',
                'numeric',
                'min:0',
            ],
        ], [
            'supplier_id.required' => 'Supplier wajib dipilih.',
            'purchased_at.required' => 'Tanggal pembelian wajib diisi.',
            'items.required' => 'Minimal harus ada satu produk.',
            'items.*.product_id.required' => 'Produk wajib dipilih.',
            'items.*.quantity.min' => 'Jumlah produk minimal 1.',
            'items.*.unit_cost.required' => 'Harga beli wajib diisi.',
        ]);

        DB::transaction(function () use ($validated) {
            $purchaseNumber = 'PUR-' . now()->format('YmdHis')
                . '-' . strtoupper(Str::random(4));

            $purchase = Purchase::create([
                'supplier_id' => $validated['supplier_id'],
                'user_id' => auth()->id(),
                'purchase_number' => $purchaseNumber,
                'total' => 0,
                'status' => 'completed',
                'purchased_at' => $validated['purchased_at'],
            ]);

            $total = 0;

            foreach ($validated['items'] as $item) {
                $product = Product::where('id', $item['product_id'])
                    ->lockForUpdate()
                    ->firstOrFail();

                $quantity = (int) $item['quantity'];
                $unitCost = (float) $item['unit_cost'];
                $subtotal = $quantity * $unitCost;

                PurchaseItem::create([
                    'purchase_id' => $purchase->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'unit_cost' => $unitCost,
                    'subtotal' => $subtotal,
                ]);

                $product->stock += $quantity;
                $product->purchase_price = $unitCost;
                $product->save();

                StockMovement::create([
                    'product_id' => $product->id,
                    'user_id' => auth()->id(),
                    'supplier_id' => $validated['supplier_id'],
                    'type' => 'IN',
                    'quantity' => $quantity,
                    'notes' => 'Pembelian ' . $purchaseNumber,
                ]);

                $total += $subtotal;
            }

            $purchase->update([
                'total' => $total,
            ]);
        });

        return redirect()
            ->route('purchases.index')
            ->with(
                'success',
                'Transaksi pembelian berhasil disimpan dan stok telah ditambahkan!'
            );
    }

    public function show(Purchase $purchase)
    {
        $purchase->load([
            'supplier',
            'user',
            'items.product',
        ]);

        return view('purchases.show', compact('purchase'));
    }

    /**
     * Membatalkan transaksi pembelian.
     * Hanya Admin yang boleh menjalankan fungsi ini.
     */
    public function cancel(Purchase $purchase)
    {
        abort_unless(
            auth()->user()->role === 'admin',
            403,
            'Kamu tidak memiliki izin untuk membatalkan pembelian.'
        );

        DB::transaction(function () use ($purchase) {

            // Kunci transaksi agar tidak dibatalkan bersamaan.
            $purchase = Purchase::whereKey($purchase->id)
                ->lockForUpdate()
                ->firstOrFail();

            // Pastikan transaksi belum pernah dibatalkan.
            if ($purchase->status !== 'completed') {
                throw ValidationException::withMessages([
                    'purchase' => 'Transaksi ini sudah dibatalkan atau tidak dapat dibatalkan.',
                ]);
            }

            $items = $purchase->items()->get();

            if ($items->isEmpty()) {
                throw ValidationException::withMessages([
                    'purchase' => 'Transaksi tidak memiliki detail produk.',
                ]);
            }

            // Gabungkan jumlah jika produk yang sama tercatat beberapa kali.
            $productQuantities = $items
                ->groupBy('product_id')
                ->map(function ($productItems) {
                    return $productItems->sum('quantity');
                });

            // Periksa dan kunci seluruh produk sebelum mengurangi stok.
            $products = Product::whereIn('id', $productQuantities->keys())
                ->orderBy('id')
                ->lockForUpdate()
                ->get()
                ->keyBy('id');

            foreach ($productQuantities as $productId => $quantity) {
                $product = $products->get($productId);

                if (!$product) {
                    throw ValidationException::withMessages([
                        'purchase' => 'Salah satu produk dalam transaksi tidak ditemukan.',
                    ]);
                }

                if ($product->stock < $quantity) {
                    throw ValidationException::withMessages([
                        'purchase' => 'Pembelian tidak dapat dibatalkan karena stok produk '
                            . $product->name
                            . ' tidak mencukupi. Stok tersedia: '
                            . $product->stock
                            . ', stok yang harus dikurangi: '
                            . $quantity
                            . '.',
                    ]);
                }
            }

            // Kurangi stok dan catat pergerakan stok keluar.
            foreach ($productQuantities as $productId => $quantity) {
                $product = $products->get($productId);

                $product->stock -= $quantity;
                $product->save();

                StockMovement::create([
                    'product_id' => $product->id,
                    'user_id' => auth()->id(),
                    'supplier_id' => $purchase->supplier_id,
                    'type' => 'OUT',
                    'quantity' => $quantity,
                    'notes' => 'Pembatalan pembelian ' . $purchase->purchase_number,
                ]);
            }

            // Ubah status transaksi setelah semua proses berhasil.
            $purchase->update([
                'status' => 'cancelled',
            ]);
        });

        return redirect()
            ->route('purchases.show', $purchase->id)
            ->with(
                'success',
                'Transaksi pembelian berhasil dibatalkan dan stok telah disesuaikan.'
            );
    }
}
