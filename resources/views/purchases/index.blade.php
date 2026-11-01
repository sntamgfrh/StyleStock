<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembelian - StyleStock</title>

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

        /* SIDEBAR */
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

        /* LOGOUT */
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

        /* MAIN CONTENT */
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
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 28px;
            position: relative;
            overflow: hidden;
        }

        .welcome::after {
            content: "";
            position: absolute;
            width: 190px;
            height: 190px;
            border: 30px solid rgba(249,115,22,0.25);
            border-radius: 50%;
            right: 55px;
            top: -75px;
        }

        .welcome h2 {
            font-size: 23px;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .welcome p {
            color: #e7e5e4;
            font-size: 13px;
            line-height: 1.7;
            max-width: 550px;
            position: relative;
            z-index: 1;
        }

        .welcome strong {
            color: #fb923c;
        }

        /* SECTION HEADING */
        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
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

        /* BUTTON */
        .btn {
            display: inline-block;
            background: #F97316;
            color: white;
            text-decoration: none;
            padding: 11px 17px;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn:hover {
            background: #ea580c;
        }

        /* SECTION */
        .section {
            background: white;
            border: 1px solid #eee7df;
            border-radius: 13px;
            padding: 23px;
            box-shadow: 0 4px 15px rgba(41,37,36,0.035);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .section-header h2 {
            font-size: 17px;
        }

        .section-header p {
            font-size: 12px;
            color: #78716c;
            margin-top: 5px;
        }

        /* SEARCH DAN FILTER */
        .filters {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .filters input,
        .filters select {
            padding: 11px 12px;
            border: 1px solid #eee7df;
            border-radius: 8px;
            font-size: 12px;
            background: #FAF7F2;
            color: #292524;
            outline: none;
        }

        .filters input {
            flex: 1;
            min-width: 200px;
        }

        .filters input:focus,
        .filters select:focus {
            border-color: #F97316;
        }

        .reset {
            display: inline-block;
            padding: 11px 15px;
            color: #57534e;
            background: #f5f0e9;
            border: 1px solid #eee7df;
            border-radius: 8px;
            text-decoration: none;
            font-size: 12px;
        }

        .reset:hover {
            background: #eee7df;
        }

        /* NOTIFIKASI */
        .success {
            background: #dcfce7;
            color: #166534;
            padding: 13px 15px;
            border-radius: 9px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 13px 15px;
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
            min-width: 750px;
            border-collapse: collapse;
        }

        th {
            background: #faf7f2;
            color: #78716c;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 14px 12px;
            text-align: left;
        }

        td {
            padding: 15px 12px;
            border-bottom: 1px solid #f0ebe5;
            font-size: 12px;
        }

        tbody tr:hover {
            background: #fffaf5;
        }

        /* BADGE */
        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: bold;
        }

        .completed {
            background: #dcfce7;
            color: #166534;
        }

        .cancelled {
            background: #fee2e2;
            color: #991b1b;
        }

        .detail-link {
            color: #ea580c;
            text-decoration: none;
            font-weight: bold;
        }

        .detail-link:hover {
            text-decoration: underline;
        }

        .empty {
            text-align: center;
            color: #a8a29e;
            padding: 30px;
        }

        /* PAGINATION */
        .pagination {
            margin-top: 20px;
            font-size: 12px;
        }

        .pagination nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        /* RESPONSIVE */
        @media (max-width: 1100px) {
            .main {
                padding: 30px 25px;
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

            .section {
                overflow-x: auto;
            }

            .filters {
                flex-direction: column;
            }

            .filters input,
            .filters select,
            .filters button,
            .filters a {
                width: 100%;
            }

            .section-heading {
                align-items: flex-start;
                flex-direction: column;
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

            <a href="{{ route('purchases.index') }}" class="active">
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

            <!-- MENU LAPORAN INVENTORY -->
            <a href="{{ route('reports.inventory') }}">
                <svg viewBox="0 0 24 24">
                    <path d="M4 19V5m0 14h16M8 16v-4m4 4V8m4 8v-7m4 7V4"/>
                </svg>
                Laporan Inventory
            </a>

        </nav>

        <!-- LOGOUT -->
        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout-button">
                Logout
            </button>
        </form>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="main">

        <!-- TOPBAR -->
        <div class="topbar">
            <div>
                <h1>Data Pembelian</h1>
                <p>Kelola dan pantau transaksi pembelian barang dari supplier.</p>
            </div>

            <div class="date">
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </div>
        </div>

        <!-- WELCOME -->
        <section class="welcome">
            <h2>Transaksi Pembelian Barang</h2>
            <p>
                Catat pembelian produk dari supplier dan pantau penambahan
                persediaan melalui sistem
                <strong>StyleStock Inventory Management System</strong>.
            </p>
        </section>

        <!-- SECTION HEADING -->
        <div class="section-heading">
            <div>
                <h2>Data Transaksi Pembelian</h2>
                <p>Daftar seluruh transaksi pembelian barang.</p>
            </div>

            <a href="{{ route('purchases.create') }}" class="btn">
                + Tambah Pembelian
            </a>
        </div>

        <!-- NOTIFIKASI -->
        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="error">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="error">
                <strong>Terjadi kesalahan:</strong>
                <ul style="margin: 8px 0 0 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- TABLE SECTION -->
        <section class="section">

            <div class="section-header">
                <div>
                    <h2>Riwayat Pembelian</h2>
                    <p>Informasi nomor transaksi, supplier, total, dan status.</p>
                </div>
            </div>

            <!-- SEARCH DAN FILTER -->
            <form action="{{ route('purchases.index') }}"
                  method="GET"
                  class="filters">

                <input
                    type="text"
                    name="search"
                    placeholder="Cari nomor pembelian atau supplier..."
                    value="{{ request('search') }}"
                >

                <select name="status">
                    <option value="">Semua Status</option>

                    <option value="completed"
                        {{ request('status') == 'completed' ? 'selected' : '' }}>
                        Selesai
                    </option>

                    <option value="cancelled"
                        {{ request('status') == 'cancelled' ? 'selected' : '' }}>
                        Dibatalkan
                    </option>
                </select>

                <button type="submit" class="btn">
                    Terapkan
                </button>

                <a href="{{ route('purchases.index') }}" class="reset">
                    Reset
                </a>

            </form>

            <!-- TABLE -->
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Pembelian</th>
                            <th>Tanggal</th>
                            <th>Supplier</th>
                            <th>Petugas</th>
                            <th>Total Pembelian</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($purchases as $purchase)
                            <tr>
                                <td>
                                    {{ $purchases->firstItem() + $loop->index }}
                                </td>

                                <td>
                                    <strong>{{ $purchase->purchase_number }}</strong>
                                </td>

                                <td>
                                    {{ $purchase->purchased_at
                                        ? \Carbon\Carbon::parse($purchase->purchased_at)->format('d-m-Y')
                                        : '-' }}
                                </td>

                                <td>
                                    {{ $purchase->supplier->name ?? '-' }}
                                </td>

                                <td>
                                    {{ $purchase->user->name ?? '-' }}
                                </td>

                                <td>
                                    Rp {{ number_format((float) $purchase->total, 0, ',', '.') }}
                                </td>

                                <td>
                                    @if($purchase->status === 'completed')
                                        <span class="badge completed">
                                            Selesai
                                        </span>
                                    @else
                                        <span class="badge cancelled">
                                            {{ ucfirst($purchase->status) }}
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('purchases.show', $purchase->id) }}"
                                       class="detail-link">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="8" class="empty">
                                    Belum ada transaksi pembelian.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- PAGINATION -->
            <div class="pagination">
                {{ $purchases->links() }}
            </div>

        </section>

    </main>

</body>
</html>
