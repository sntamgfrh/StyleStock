<?php

namespace App\Http\Controllers;

use App\Models\StockMovement;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class StockMovementController extends Controller
{
    public function index(Request $request)
    {
        $query = StockMovement::with([
            'product',
            'user',
            'supplier'
        ]);

        // Pencarian berdasarkan keterangan, produk, atau petugas
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('notes', 'like', "%{$search}%")
                    ->orWhereHas('product', function ($product) use ($search) {
                        $product->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('user', function ($user) use ($search) {
                        $user->where('name', 'like', "%{$search}%");
                    });
            });
        }

        // Filter jenis pergerakan stok
        if (
            $request->filled('type') &&
            in_array($request->type, ['IN', 'OUT'])
        ) {
            $query->where('type', $request->type);
        }

        // Pengurutan data
        $sort = $request->get('sort', 'latest');

        if ($sort === 'oldest') {
            $query->orderBy('id', 'asc');
        } elseif ($sort === 'quantity') {
            $query->orderBy('quantity', 'desc');
        } else {
            $query->orderBy('id', 'desc');
        }

        // Pagination
        $movements = $query->paginate(10)->withQueryString();

        return view('StockMovement.index', compact('movements'));
    }

    public function create()
    {
        $products = Product::orderBy('name')->get();
        $suppliers = Supplier::orderBy('name')->get();
        $users = User::orderBy('name')->get();

        return view('StockMovement.create', compact(
            'products',
            'suppliers',
            'users'
        ));
    }

    public function store(Request $request)
    {
        // Validasi data pergerakan stok
        $validated = $request->validate([
            'product_id' => [
                'required',
                Rule::exists('products', 'id')
            ],
            'user_id' => [
                'required',
                Rule::exists('users', 'id')
            ],
            'supplier_id' => [
                'nullable',
                Rule::exists('suppliers', 'id')
            ],
            'type' => [
                'required',
                Rule::in(['IN', 'OUT'])
            ],
            'quantity' => [
                'required',
                'integer',
                'min:1'
            ],
            'notes' => [
                'nullable',
                'string',
                'max:255'
            ],
        ]);

        // Update stok dan simpan riwayat dalam satu transaksi database
        DB::transaction(function () use ($validated) {

            $product = Product::where('id', $validated['product_id'])
                ->lockForUpdate()
                ->firstOrFail();

            // Periksa ketersediaan stok sebelum stok keluar
            if (
                $validated['type'] === 'OUT' &&
                $product->stock < $validated['quantity']
            ) {
                throw ValidationException::withMessages([
                    'quantity' => 'Stok produk tidak mencukupi!',
                ]);
            }

            // Perbarui jumlah stok
            if ($validated['type'] === 'IN') {
                $product->stock += $validated['quantity'];
            } else {
                $product->stock -= $validated['quantity'];
            }

            $product->save();

            // Simpan riwayat pergerakan stok
            StockMovement::create($validated);
        });

        return redirect()
            ->route('stock-movements.index')
            ->with('success', 'Pergerakan stok berhasil dicatat!');
    }

    public function show(StockMovement $stockMovement)
    {
        $stockMovement->load([
            'product',
            'user',
            'supplier'
        ]);

        return view('StockMovement.show', compact('stockMovement'));
    }
}
