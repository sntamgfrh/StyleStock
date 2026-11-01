<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Sale;
use App\Models\Purchase;
use Illuminate\Http\Request;

class InventoryReportController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // =====================================
        // DATA DAN RINGKASAN PRODUK
        // =====================================

        $products = Product::with('category')
            ->orderBy('name')
            ->get();

        $totalProducts = Product::count();
        $totalStock = Product::sum('stock');

        $inventoryValue = Product::selectRaw(
            'COALESCE(SUM(stock * COALESCE(purchase_price, price)), 0) as total'
        )->value('total');

        // =====================================
        // RIWAYAT PERGERAKAN STOK
        // =====================================

        $movements = StockMovement::with([
                'product',
                'user',
                'supplier'
            ])
            ->when($startDate, function ($query) use ($startDate) {
                $query->whereDate('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                $query->whereDate('created_at', '<=', $endDate);
            })
            ->latest('created_at')
            ->get();

        $totalIn = $movements
            ->where('type', 'IN')
            ->sum('quantity');

        $totalOut = $movements
            ->where('type', 'OUT')
            ->sum('quantity');

        // =====================================
        // RIWAYAT PEMBELIAN
        // =====================================

        $purchases = Purchase::with([
                'supplier',
                'user',
                'items.product'
            ])
            ->when($startDate, function ($query) use ($startDate) {
                $query->whereDate('purchased_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                $query->whereDate('purchased_at', '<=', $endDate);
            })
            ->latest('purchased_at')
            ->get();

        $totalPurchases = $purchases->count();

        $purchaseExpense = $purchases
            ->where('status', 'completed')
            ->sum('total');

        // =====================================
        // RIWAYAT PENJUALAN
        // =====================================

        $sales = Sale::with([
                'user',
                'items.product'
            ])
            ->when($startDate, function ($query) use ($startDate) {
                $query->whereDate('sold_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                $query->whereDate('sold_at', '<=', $endDate);
            })
            ->latest('sold_at')
            ->get();

        $totalSales = $sales->count();

        $salesRevenue = $sales
            ->where('status', 'completed')
            ->sum('total');

        // =====================================
        // TAMPILKAN LAPORAN
        // =====================================

        return view('reports.inventory', compact(
            'products',
            'totalProducts',
            'totalStock',
            'inventoryValue',
            'movements',
            'totalIn',
            'totalOut',
            'purchases',
            'totalPurchases',
            'purchaseExpense',
            'sales',
            'totalSales',
            'salesRevenue',
            'startDate',
            'endDate'
        ));
    }
}
