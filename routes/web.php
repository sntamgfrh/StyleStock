<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\InventoryReportController;

// ===============================
// HALAMAN LOGIN
// ===============================
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.store');
});

// ===============================
// LOGOUT
// ===============================
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// ===============================
// HALAMAN YANG MEMBUTUHKAN LOGIN
// ===============================
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // ===============================
    // PRODUK
    // ===============================
    Route::middleware('role:admin')->group(function () {
        Route::resource('products', ProductController::class)
            ->except(['index', 'show']);
    });

    Route::middleware('role:admin,staff')->group(function () {
        Route::resource('products', ProductController::class)
            ->only(['index', 'show']);
    });

    // ===============================
    // KATEGORI
    // ===============================
    Route::middleware('role:admin')->group(function () {
        Route::resource('categories', CategoryController::class)
            ->except(['index', 'show']);
    });

    Route::middleware('role:admin,staff')->group(function () {
        Route::resource('categories', CategoryController::class)
            ->only(['index', 'show']);
    });

    // ===============================
    // SUPPLIER
    // ===============================
    Route::middleware('role:admin')->group(function () {
        Route::resource('suppliers', SupplierController::class)
            ->except(['index', 'show']);
    });

    Route::middleware('role:admin,staff')->group(function () {
        Route::resource('suppliers', SupplierController::class)
            ->only(['index', 'show']);
    });

    // ===============================
    // PERGERAKAN STOK
    // ===============================
    Route::middleware('role:admin,staff')->group(function () {
        Route::resource('stock-movements', StockMovementController::class)
            ->only(['index', 'create', 'store', 'show']);
    });

    // ===============================
    // LAPORAN INVENTORY
    // ===============================
    Route::middleware('role:admin,staff')->group(function () {
        Route::get('/reports/inventory', [InventoryReportController::class, 'index'])
            ->name('reports.inventory');
    });

    // ===============================
    // PEMBELIAN
    // ===============================
    Route::middleware('role:admin,staff')->group(function () {
        Route::resource('purchases', PurchaseController::class)
            ->only(['index', 'create', 'store', 'show']);
    });

    Route::middleware('role:admin')->group(function () {
        Route::post('/purchases/{purchase}/cancel', [PurchaseController::class, 'cancel'])
            ->name('purchases.cancel');
    });

    // ===============================
    // TRANSAKSI PENJUALAN
    // ===============================
    Route::middleware('role:admin,staff')->group(function () {
        Route::resource('sales', SaleController::class)
            ->only(['index', 'create', 'store', 'show']);
    });

    // Admin saja yang boleh membatalkan penjualan
    Route::middleware('role:admin')->group(function () {
        Route::post('/sales/{sale}/cancel', [SaleController::class, 'cancel'])
            ->name('sales.cancel');
    });

});
