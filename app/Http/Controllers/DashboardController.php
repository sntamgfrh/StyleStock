<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\StockMovement;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Product::count();

        $totalKategori = Category::count();

        $totalSupplier = Supplier::count();

        $totalStok = Product::sum('stock');

        $stokMenipis = Product::whereColumn(
            'stock',
            '<=',
            'minimum_stock'
        )->count();

        $transaksiMasuk = StockMovement::where('type', 'IN')->count();

        $transaksiKeluar = StockMovement::where('type', 'OUT')->count();

        $pergerakanTerbaru = StockMovement::with([
            'product',
            'user',
            'supplier'
        ])->orderBy('id', 'desc')
          ->limit(5)
          ->get();

        return view('dashboard.index', compact(
            'totalProduk',
            'totalKategori',
            'totalSupplier',
            'totalStok',
            'stokMenipis',
            'transaksiMasuk',
            'transaksiKeluar',
            'pergerakanTerbaru'
        ));
    }
}
