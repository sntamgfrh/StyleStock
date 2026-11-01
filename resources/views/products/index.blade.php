<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk - StyleStock</title>

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

        /* SIDEBAR - SAMA DENGAN DASHBOARD */
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

        /* TOMBOL LOGOUT */
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

        /* MAIN */
        .main {
            margin-left: 240px;
            padding: 35px 40px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 28px;
        }

        .topbar h1 {
            font-size: 27px;
            margin-bottom: 7px;
        }

        .topbar p {
            color: #78716c;
            font-size: 13px;
        }

        .date {
            background: white;
            border: 1px solid #eee7df;
            padding: 12px 17px;
            border-radius: 9px;
            color: #57534e;
            font-size: 12px;
            white-space: nowrap;
        }

        /* WELCOME */
        .welcome {
            background: linear-gradient(110deg, #292524, #57534e);
            color: white;
            padding: 27px 30px;
            border-radius: 15px;
            margin-bottom: 28px;
            position: relative;
            overflow: hidden;
        }

        .welcome::after {
            content: "";
            position: absolute;
            width: 170px;
            height: 170px;
            border: 27px solid rgba(249,115,22,0.25);
            border-radius: 50%;
            right: 55px;
            top: -75px;
        }

        .welcome h2 {
            font-size: 21px;
            margin-bottom: 9px;
            position: relative;
            z-index: 1;
        }

        .welcome p {
            color: #e7e5e4;
            font-size: 13px;
            line-height: 1.7;
            max-width: 600px;
            position: relative;
            z-index: 1;
        }

        .welcome strong {
            color: #fb923c;
        }

        /* CONTENT */
        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 17px;
        }

        .section-heading h2 {
            font-size: 17px;
        }

        .section-heading p {
            font-size: 12px;
            color: #78716c;
            margin-top: 5px;
        }

        .container {
            background: white;
            border: 1px solid #eee7df;
            border-radius: 13px;
            padding: 23px;
            box-shadow: 0 4px 15px rgba(41,37,36,0.035);
        }

        .container-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 8px;
        }

        .container-header h2 {
            font-size: 17px;
        }

        .container-desc {
            color: #78716c;
            font-size: 12px;
            margin-bottom: 20px;
        }

        /* BUTTON */
        .header-actions {
            display: flex;
            align-items: center;
            gap: 9px;
            flex-wrap: wrap;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #F97316;
            color: white;
            padding: 11px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-add:hover {
            background: #ea580c;
            transform: translateY(-2px);
        }

        .btn-report {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #57534e;
            color: white;
            padding: 11px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-report:hover {
            background: #44403c;
            transform: translateY(-2px);
        }

        .btn-report svg {
            width: 16px;
            height: 16px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* SEARCH */
        .search {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search input {
            flex: 1;
            min-width: 0;
            padding: 12px 14px;
            border: 1px solid #e7e5e4;
            border-radius: 8px;
            outline: none;
            font-size: 13px;
            color: #292524;
        }

        .search input:focus {
            border-color: #F97316;
            box-shadow: 0 0 0 3px #F973161c;
        }

        .btn-search {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            background: #F97316;
            color: white;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-search:hover {
            background: #ea580c;
        }

        .btn-reset {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 15px;
            border-radius: 8px;
            background: #f5f5f4;
            color: #57534e;
            text-decoration: none;
            font-size: 12px;
        }

        .btn-reset:hover {
            background: #e7e5e4;
        }

        /* ALERT */
        .alert-success {
            background: #dcfce7;
            color: #166534;
            padding: 13px 16px;
            border-radius: 9px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            padding: 13px 16px;
            border-radius: 9px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        /* TABLE */
        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th {
            background: #faf7f2;
            color: #78716c;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 14px 12px;
            text-align: left;
            white-space: nowrap;
        }

        td {
            padding: 15px 12px;
            border-bottom: 1px solid #f0ebe5;
            font-size: 12px;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fffaf5;
        }

        .sku {
            color: #ea580c;
            font-weight: bold;
        }

        .product-name {
            font-weight: bold;
            color: #292524;
        }

        .price {
            font-weight: bold;
            white-space: nowrap;
        }

        .stock {
            display: inline-block;
            background: #dcfce7;
            color: #166534;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .stock-low {
            background: #fee2e2;
            color: #b91c1c;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-detail,
        .btn-edit,
        .btn-delete {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 10px;
            border: none;
            border-radius: 7px;
            color: white;
            text-decoration: none;
            font-size: 11px;
            font-weight: bold;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-detail {
            background: #57534e;
        }

        .btn-detail:hover {
            background: #44403c;
        }

        .btn-edit {
            background: #F97316;
        }

        .btn-edit:hover {
            background: #ea580c;
        }

        .btn-delete {
            background: #dc2626;
        }

        .btn-delete:hover {
            background: #b91c1c;
        }

        .delete-form {
            display: inline;
        }

        .empty {
            text-align: center;
            color: #a8a29e;
            padding: 30px;
        }

        /* PAGINATION */
        .pagination {
            margin-top: 22px;
        }

        .pagination nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .pagination nav > div {
            font-size: 12px;
        }

        .pagination a,
        .pagination span {
            color: #c2410c;
        }

        .footer {
            text-align: center;
            color: #a8a29e;
            font-size: 11px;
            margin-top: 25px;
        }

        /* RESPONSIVE */
        @media (max-width: 1100px) {
            .main {
                padding: 28px;
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

            .topbar {
                align-items: flex-start;
                gap: 12px;
                flex-direction: column;
            }

            .welcome::after {
                display: none;
            }

            .container {
                padding: 16px;
            }

            .search {
                flex-wrap: wrap;
            }

            .search input {
                flex-basis: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
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

            <a href="{{ route('products.index') }}" class="active">
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
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM20 8v6m-3-3h6"/>
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

            <!-- MENU LAPORAN BARU -->
            <a href="{{ route('reports.inventory') }}">
                <svg viewBox="0 0 24 24">
                    <path d="M4 19V5m0 14h16M8 16v-4m4 4V8m4 8v-7m4 7V4"/>
                </svg>
                Laporan Inventory
            </a>

        </nav>

        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout-button">
                Logout
            </button>
        </form>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="main">

        <div class="topbar">
            <div>
                <h1>Data Produk</h1>
                <p>Kelola dan pantau seluruh persediaan produk StyleStock.</p>
            </div>

            <div class="date">
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </div>
        </div>

        <section class="welcome">
            <h2>Manajemen Data Produk</h2>
            <p>
                Kelola informasi produk, harga, kategori, dan jumlah stok barang
                dengan mudah melalui <strong>StyleStock Inventory Management System</strong>.
            </p>
        </section>

        <div class="section-heading">
            <div>
                <h2>Daftar Produk</h2>
                <p>Informasi seluruh produk yang tersimpan di database.</p>
            </div>
        </div>

        <section class="container">

            <div class="container-header">
                <h2>Semua Produk</h2>

                <div class="header-actions">

                    <!-- TOMBOL LAPORAN BARU -->
                    <a href="{{ route('reports.inventory') }}" class="btn-report">
                        <svg viewBox="0 0 24 24">
                            <path d="M4 19V5m0 14h16M8 16v-4m4 4V8m4 8v-7m4 7V4"/>
                        </svg>
                        Lihat Laporan
                    </a>

                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('products.create') }}" class="btn-add">
                            + Tambah Produk
                        </a>
                    @endif

                </div>
            </div>

            <div class="container-desc">
                Cari, lihat, dan kelola data produk inventaris.
            </div>

            @if (session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert-error">
                    {{ session('error') }}
                </div>
            @endif

            <!-- PENCARIAN -->
            <form action="{{ route('products.index') }}" method="GET" class="search">

                <input
                    type="text"
                    name="search"
                    placeholder="Cari berdasarkan nama atau SKU produk..."
                    value="{{ request('search') }}"
                >

                <button type="submit" class="btn-search">
                    Cari Produk
                </button>

                @if (request('search'))
                    <a href="{{ route('products.index') }}" class="btn-reset">
                        Reset
                    </a>
                @endif

            </form>

            <!-- TABEL PRODUK -->
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>SKU</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>
                                    {{ $products->firstItem() + $loop->index }}
                                </td>

                                <td class="sku">
                                    {{ $product->sku }}
                                </td>

                                <td class="product-name">
                                    {{ $product->name }}
                                </td>

                                <td>
                                    {{ $product->category?->name ?? '-' }}
                                </td>

                                <td class="price">
                                    Rp {{ number_format((float) $product->price, 0, ',', '.') }}
                                </td>

                                <td>
                                    <span class="stock {{ $product->stock <= $product->minimum_stock ? 'stock-low' : '' }}">
                                        {{ $product->stock }}
                                    </span>
                                </td>

                                <td>
                                    <div class="actions">

                                        <a href="{{ route('products.show', $product->id) }}"
                                           class="btn-detail">
                                            Detail
                                        </a>

                                        @if (auth()->user()->role === 'admin')
                                            <a href="{{ route('products.edit', $product->id) }}"
                                               class="btn-edit">
                                                Edit
                                            </a>

                                            <form action="{{ route('products.destroy', $product->id) }}"
                                                  method="POST"
                                                  class="delete-form"
                                                  onsubmit="return confirm('Yakin ingin menghapus produk ini?');">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn-delete">
                                                    Hapus
                                                </button>

                                            </form>
                                        @endif

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="empty">
                                    Belum ada produk atau produk tidak ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- PAGINATION -->
            <div class="pagination">
                {{ $products->links() }}
            </div>

        </section>

        <div class="footer">
            StyleStock &copy; {{ date('Y') }} — Inventory Management System
        </div>

    </main>

</body>
</html>
