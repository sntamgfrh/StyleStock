<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    // Menampilkan daftar dan pencarian produk
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        $products = $query
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('products.index', compact('products'));
    }

    // Form tambah produk
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('products.create', compact('categories'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'sku' => ['required', 'string', 'max:100', 'unique:products,sku'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'minimum_stock' => ['required', 'integer', 'min:0'],
        ]);

        Product::create($validated);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    // Menampilkan detail produk
    public function show(Product $product)
    {
        $product->load('category');

        return view('products.show', compact('product'));
    }

    // Form edit produk
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();

        return view('products.edit', compact('product', 'categories'));
    }

    // Memperbarui produk
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'sku' => [
                'required',
                'string',
                'max:100',
                Rule::unique('products', 'sku')->ignore($product->id),
            ],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'minimum_stock' => ['required', 'integer', 'min:0'],
        ]);

        $product->update($validated);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    // Menghapus produk dengan pemeriksaan riwayat stok
    public function destroy(Product $product)
    {
        $hasHistory = StockMovement::where('product_id', $product->id)->exists();

        if ($hasHistory) {
            return redirect()
                ->route('products.index')
                ->with('error', 'Produk tidak dapat dihapus karena sudah memiliki riwayat pergerakan stok.');
        }

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}
