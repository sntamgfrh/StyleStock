<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Inventory - StyleStock</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #FAF7F2;
            color: #292524;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 30px 18px;
            background: linear-gradient(180deg, #292524, #44403c);
            color: white;
            overflow-y: auto;
        }

        .brand {
            font-size: 25px;
            font-weight: bold;
            padding-left: 12px;
            margin-bottom: 12px;
        }

        .brand small {
            display: block;
            color: #d6d3d1;
            font-size: 11px;
            font-weight: normal;
            letter-spacing: 2px;
            margin-top: 7px;
        }

        .menu-title {
            color: #a8a29e;
            font-size: 10px;
            letter-spacing: 2px;
            padding: 30px 12px 12px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 15px;
            color: #e7e5e4;
            text-decoration: none;
            padding: 14px 13px;
            border-radius: 9px;
            margin-bottom: 7px;
            font-size: 14px;
            transition: 0.2s;
        }

        .menu a svg {
            width: 21px;
            height: 21px;
            fill: none;
            stroke: currentColor;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }

        .menu a:hover,
        .menu a.active {
            background: #F97316;
            color: white;
            transform: translateX(3px);
        }

        .logout-form {
            margin-top: 25px;
            padding: 0 5px;
        }

        .logout-button {
            width: 100%;
            padding: 13px;
            background: transparent;
            color: #e7e5e4;
            border: 1px solid #78716c;
            border-radius: 9px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-align: left;
            transition: 0.2s;
        }

        .logout-button:hover {
            background: #F97316;
            border-color: #F97316;
            color: white;
        }

        .main {
            margin-left: 240px;
            padding: 30px;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .header p {
            color: #78716c;
            font-size: 14px;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .summary-card {
            background: white;
            padding: 22px;
            border-radius: 13px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.04);
            border: 1px solid #eee7df;
        }

        .summary-card p {
            color: #78716c;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .summary-card h2 {
            font-size: 23px;
            color: #292524;
            overflow-wrap: anywhere;
        }

        .summary-card small {
            display: block;
            margin-top: 8px;
            color: #a8a29e;
            font-size: 11px;
        }

        .panel {
            background: white;
            padding: 24px;
            border-radius: 13px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.04);
            border: 1px solid #eee7df;
            margin-bottom: 25px;
        }

        .panel-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .panel-heading h2 {
            font-size: 18px;
        }

        .panel-description {
            color: #78716c;
            font-size: 12px;
            margin-top: 7px;
        }

        .filter-form {
            display: flex;
            align-items: end;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 20px;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .filter-group label {
            font-size: 12px;
            font-weight: bold;
        }

        .filter-group input {
            padding: 10px;
            border: 1px solid #e7e5e4;
            border-radius: 7px;
            font-size: 13px;
        }

        .btn {
            display: inline-block;
            border: none;
            border-radius: 7px;
            padding: 11px 16px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-orange {
            background: #F97316;
            color: white;
        }

        .btn-light {
            background: #f5f5f4;
            color: #44403c;
        }

        .btn-detail {
            background: #fff7ed;
            color: #c2410c;
            border: 1px solid #fed7aa;
            padding: 8px 11px;
            font-size: 12px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th {
            background: #faf7f2;
            color: #57534e;
            font-size: 12px;
            text-align: left;
            padding: 14px 12px;
        }

        td {
            padding: 14px 12px;
            border-bottom: 1px solid #f0eeeb;
            font-size: 13px;
            vertical-align: top;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .badge-in,
        .badge-completed,
        .badge-safe {
            background: #dcfce7;
            color: #166534;
        }

        .badge-out,
        .badge-cancelled,
        .badge-low {
            background: #fee2e2;
            color: #991b1b;
        }

        .badge-warning {
            background: #fef3c7;
            color: #92400e;
        }

        .empty {
            text-align: center;
            color: #a8a29e;
            padding: 25px;
        }

        .product-list {
            padding-left: 17px;
            line-height: 1.8;
        }

        .money {
            white-space: nowrap;
        }

        .section-total {
            margin-top: 18px;
            padding: 14px;
            background: #faf7f2;
            border-radius: 8px;
            font-size: 13px;
        }

        .section-total strong {
            color: #c2410c;
        }

        .print-only {
            display: none;
        }

        @media print {
            body {
                background: white;
            }

            .sidebar,
            .filter-form,
            .no-print,
            .action-column {
                display: none !important;
            }

            .main {
                margin: 0;
                padding: 0;
            }

            .panel,
            .summary-card {
                box-shadow: none;
                border: 1px solid #ddd;
                break-inside: avoid;
            }

            .print-only {
                display: block;
            }

            .table-wrapper {
                overflow: visible;
            }

            table {
                min-width: 0;
            }

            th, td {
                font-size: 10px;
                padding: 8px 6px;
            }
        }

        @media (max-width: 1000px) {
            .summary {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main {
                margin-left: 0;
                padding: 22px 16px;
            }

            .summary {
                grid-template-columns: 1fr;
            }

            .panel-heading {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <div class="brand">
        StyleStock
        <small>INVENTORY MANAGEMENT</small>
    </div>

    <div class="menu-title">MENU UTAMA</div>

    <nav class="menu">
        <a href="{{ route('dashboard') }}">
            <svg viewBox="0 0 24 24">
                <path d="M3 10.5L12 3l9 7.5V21h-6v-6H9v6H3z"/>
            </svg>
            Dashboard
        </a>

        <a href="{{ route('products.index') }}">
            <svg viewBox="0 0 24 24">
                <path d="M12 3L3 7.5 12 12l9-4.5L12 3zM3 7.5V17l9 4 9-4V7.5M12 12v9"/>
            </svg>
            Data Produk
        </a>

        <a href="{{ route('categories.index') }}">
            <svg viewBox="0 0 24 24">
                <path d="M3 6h7l2 2h9v11H3z"/>
            </svg>
            Data Kategori
        </a>

        <a href="{{ route('suppliers.index') }}">
            <svg viewBox="0 0 24 24">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM20 8v6m-3-3h6"/>
            </svg>
            Data Supplier
        </a>

        <a href="{{ route('stock-movements.index') }}">
            <svg viewBox="0 0 24 24">
                <path d="M7 7h13l-3-3m3 3-3 3M17 17H4l3 3m-3-3 3-3"/>
            </svg>
            Pergerakan Stok
        </a>

        <a href="{{ route('purchases.index') }}">
            <svg viewBox="0 0 24 24">
                <path d="M3 3h2l2.4 12.2a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 2-1.6L22 8H6"/>
                <circle cx="10" cy="21" r="1"/>
                <circle cx="18" cy="21" r="1"/>
            </svg>
            Data Pembelian
        </a>

        <a href="{{ route('sales.index') }}">
            <svg viewBox="0 0 24 24">
                <path d="M3 3h2l2.4 12.2a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 2-1.6L22 8H6"/>
                <circle cx="10" cy="21" r="1"/>
                <circle cx="18" cy="21" r="1"/>
            </svg>
            Data Penjualan
        </a>

        <a href="{{ route('reports.inventory') }}" class="active">
            <svg viewBox="0 0 24 24">
                <path d="M4 19V5m0 14h16M8 16v-4m4 4V8m4 8v-7m4 7V4"/>
            </svg>
            Laporan Inventory
        </a>
    </nav>

    <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="logout-button">Logout</button>
    </form>
</aside>

<main class="main">

    <div class="header">
        <h1>Laporan Inventory</h1>
        <p>Ringkasan stok, pembelian, penjualan, dan pergerakan persediaan StyleStock.</p>
    </div>

    <div class="print-only">
        <h2>Laporan Inventory StyleStock</h2>
        <p>
            Periode:
            {{ $startDate ?: 'Semua tanggal' }}
            sampai
            {{ $endDate ?: 'Sekarang' }}
        </p>
        <br>
    </div>

    <!-- RINGKASAN -->
    <section class="summary">

        <div class="summary-card">
            <p>Total Produk</p>
            <h2>{{ number_format($totalProducts) }}</h2>
            <small>Jumlah jenis produk terdaftar</small>
        </div>

        <div class="summary-card">
            <p>Total Stok Tersedia</p>
            <h2>{{ number_format($totalStock) }}</h2>
            <small>Akumulasi stok seluruh produk</small>
        </div>

        <div class="summary-card">
            <p>Nilai Persediaan</p>
            <h2>Rp {{ number_format($inventoryValue, 0, ',', '.') }}</h2>
            <small>Estimasi nilai berdasarkan harga beli</small>
        </div>

        <div class="summary-card">
            <p>Total Barang Masuk</p>
            <h2>{{ number_format($totalIn) }}</h2>
            <small>Berdasarkan filter periode</small>
        </div>

        <div class="summary-card">
            <p>Total Barang Keluar</p>
            <h2>{{ number_format($totalOut) }}</h2>
            <small>Berdasarkan filter periode</small>
        </div>

        <div class="summary-card">
            <p>Total Transaksi Pembelian</p>
            <h2>{{ number_format($totalPurchases) }}</h2>
            <small>Termasuk transaksi yang dibatalkan</small>
        </div>

        <div class="summary-card">
            <p>Total Pengeluaran Pembelian</p>
            <h2>Rp {{ number_format($purchaseExpense, 0, ',', '.') }}</h2>
            <small>Hanya pembelian yang selesai</small>
        </div>

        <div class="summary-card">
            <p>Total Transaksi Penjualan</p>
            <h2>{{ number_format($totalSales) }}</h2>
            <small>Termasuk transaksi yang dibatalkan</small>
        </div>

        <div class="summary-card">
            <p>Total Pendapatan Penjualan</p>
            <h2>Rp {{ number_format($salesRevenue, 0, ',', '.') }}</h2>
            <small>Hanya penjualan yang selesai</small>
        </div>

    </section>

    <!-- FILTER PERIODE -->
    <section class="panel">
        <div class="panel-heading">
            <h2>Filter Periode Laporan</h2>
        </div>

        <form action="{{ route('reports.inventory') }}" method="GET" class="filter-form">

            <div class="filter-group">
                <label for="start_date">Dari Tanggal</label>
                <input
                    type="date"
                    name="start_date"
                    id="start_date"
                    value="{{ $startDate }}"
                >
            </div>

            <div class="filter-group">
                <label for="end_date">Sampai Tanggal</label>
                <input
                    type="date"
                    name="end_date"
                    id="end_date"
                    value="{{ $endDate }}"
                >
            </div>

            <button type="submit" class="btn btn-orange">
                Terapkan Filter
            </button>

            <a href="{{ route('reports.inventory') }}" class="btn btn-light">
                Reset
            </a>

        </form>

        <button onclick="window.print()" class="btn btn-orange no-print">
            Cetak Laporan
        </button>
    </section>

    <!-- DETAIL STOK PRODUK -->
    <section class="panel">
        <div class="panel-heading">
            <div>
                <h2>Detail Stok Produk</h2>
                <p class="panel-description">
                    Informasi harga, jumlah stok, batas minimum, dan nilai persediaan setiap produk.
                </p>
            </div>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>SKU</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Stok Minimum</th>
                        <th>Nilai Persediaan</th>
                        <th>Status Stok</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name ?? '-' }}</td>

                            <td class="money">
                                Rp {{ number_format($product->purchase_price ?? $product->price, 0, ',', '.') }}
                            </td>

                            <td class="money">
                                Rp {{ number_format($product->selling_price ?? $product->price, 0, ',', '.') }}
                            </td>

                            <td>{{ number_format($product->stock) }}</td>
                            <td>{{ number_format($product->minimum_stock) }}</td>

                            <td class="money">
                                Rp {{ number_format($product->stock * ($product->purchase_price ?? $product->price), 0, ',', '.') }}
                            </td>

                            <td>
                                @if ($product->stock <= $product->minimum_stock)
                                    <span class="badge badge-low">Stok Menipis</span>
                                @else
                                    <span class="badge badge-safe">Stok Aman</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="empty">
                                Belum ada data produk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="section-total">
            Total nilai persediaan:
            <strong>
                Rp {{ number_format($inventoryValue, 0, ',', '.') }}
            </strong>
        </div>
    </section>

    <!-- DETAIL PEMBELIAN -->
    <section class="panel">
        <div class="panel-heading">
            <div>
                <h2>Detail Transaksi Pembelian</h2>
                <p class="panel-description">
                    Riwayat barang masuk berdasarkan transaksi pembelian dan rincian produknya.
                </p>
            </div>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Nomor Pembelian</th>
                        <th>Supplier</th>
                        <th>Produk dan Jumlah</th>
                        <th>Total Pembelian</th>
                        <th>Status</th>
                        <th class="action-column">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($purchases as $index => $purchase)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>
                                {{ $purchase->purchased_at?->format('d/m/Y H:i') ?? '-' }}
                            </td>

                            <td>{{ $purchase->purchase_number }}</td>

                            <td>{{ $purchase->supplier->name ?? '-' }}</td>

                            <td>
                                @if ($purchase->items->isNotEmpty())
                                    <ul class="product-list">
                                        @foreach ($purchase->items as $item)
                                            <li>
                                                {{ $item->product->name ?? 'Produk tidak ditemukan' }}
                                                ({{ number_format($item->quantity) }} x
                                                Rp {{ number_format($item->unit_cost, 0, ',', '.') }})
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    -
                                @endif
                            </td>

                            <td class="money">
                                Rp {{ number_format($purchase->total, 0, ',', '.') }}
                            </td>

                            <td>
                                @if ($purchase->status === 'completed')
                                    <span class="badge badge-completed">Selesai</span>
                                @else
                                    <span class="badge badge-cancelled">Dibatalkan</span>
                                @endif
                            </td>

                            <td class="action-column">
                                <a
                                    href="{{ route('purchases.show', $purchase->id) }}"
                                    class="btn btn-detail"
                                >
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="empty">
                                Belum ada transaksi pembelian pada periode ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="section-total">
            Total pengeluaran pembelian:
            <strong>
                Rp {{ number_format($purchaseExpense, 0, ',', '.') }}
            </strong>
        </div>
    </section>

    <!-- DETAIL PENJUALAN -->
    <section class="panel">
        <div class="panel-heading">
            <div>
                <h2>Detail Transaksi Penjualan</h2>
                <p class="panel-description">
                    Riwayat barang keluar berdasarkan transaksi penjualan dan rincian produk.
                </p>
            </div>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Nomor Penjualan</th>
                        <th>Nama Pembeli</th>
                        <th>Produk dan Jumlah</th>
                        <th>Total Penjualan</th>
                        <th>Status</th>
                        <th class="action-column">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($sales as $index => $sale)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>
                                {{ $sale->sold_at?->format('d/m/Y H:i') ?? '-' }}
                            </td>

                            <td>{{ $sale->sale_number }}</td>

                            <td>{{ $sale->buyer_name }}</td>

                            <td>
                                @if ($sale->items->isNotEmpty())
                                    <ul class="product-list">
                                        @foreach ($sale->items as $item)
                                            <li>
                                                {{ $item->product->name ?? 'Produk tidak ditemukan' }}
                                                ({{ number_format($item->quantity) }} x
                                                Rp {{ number_format($item->unit_price, 0, ',', '.') }})
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    -
                                @endif
                            </td>

                            <td class="money">
                                Rp {{ number_format($sale->total, 0, ',', '.') }}
                            </td>

                            <td>
                                @if ($sale->status === 'completed')
                                    <span class="badge badge-completed">Selesai</span>
                                @else
                                    <span class="badge badge-cancelled">Dibatalkan</span>
                                @endif
                            </td>

                            <td class="action-column">
                                <a
                                    href="{{ route('sales.show', $sale->id) }}"
                                    class="btn btn-detail"
                                >
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="empty">
                                Belum ada transaksi penjualan pada periode ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="section-total">
            Total pendapatan penjualan:
            <strong>
                Rp {{ number_format($salesRevenue, 0, ',', '.') }}
            </strong>
        </div>
    </section>

    <!-- DETAIL PERGERAKAN STOK -->
    <section class="panel">
        <div class="panel-heading">
            <div>
                <h2>Detail Pergerakan Stok</h2>
                <p class="panel-description">
                    Riwayat barang masuk dan keluar, jumlah perubahan, supplier, serta pengguna yang mencatat transaksi.
                </p>
            </div>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal dan Waktu</th>
                        <th>SKU</th>
                        <th>Nama Produk</th>
                        <th>Jenis Pergerakan</th>
                        <th>Jumlah</th>
                        <th>Supplier</th>
                        <th>Pengguna</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($movements as $index => $movement)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>
                                {{ $movement->created_at?->format('d/m/Y H:i:s') ?? '-' }}
                            </td>

                            <td>{{ $movement->product->sku ?? '-' }}</td>

                            <td>{{ $movement->product->name ?? '-' }}</td>

                            <td>
                                @if ($movement->type === 'IN')
                                    <span class="badge badge-in">Barang Masuk</span>
                                @else
                                    <span class="badge badge-out">Barang Keluar</span>
                                @endif
                            </td>

                            <td>{{ number_format($movement->quantity) }}</td>

                            <td>{{ $movement->supplier->name ?? '-' }}</td>

                            <td>{{ $movement->user->name ?? '-' }}</td>

                            <td>{{ $movement->notes ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="empty">
                                Belum ada riwayat pergerakan stok pada periode ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="section-total">
            Total barang masuk:
            <strong>{{ number_format($totalIn) }} unit</strong>
            &nbsp; | &nbsp;
            Total barang keluar:
            <strong>{{ number_format($totalOut) }} unit</strong>
        </div>
    </section>

</main>

</body>
</html>
