<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - StyleStock</title>

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

        /* MAIN CONTENT */
        .main {
            margin-left: 240px;
            padding: 35px 40px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        /* SECTION */
        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        /* STATISTIC CARDS */
        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 17px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 21px;
            border-radius: 13px;
            border: 1px solid #eee7df;
            box-shadow: 0 4px 15px rgba(41,37,36,0.035);
            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(41,37,36,0.08);
        }

        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 17px;
        }

        .card-label {
            color: #78716c;
            font-size: 12px;
        }

        .card-icon {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #fff0e5;
            color: #ea580c;
            font-size: 12px;
            font-weight: bold;
        }

        .card h3 {
            font-size: 28px;
            color: #292524;
            margin-bottom: 6px;
        }

        .card small {
            font-size: 11px;
            color: #a8a29e;
        }

        .card.warning .card-icon {
            background: #fef3c7;
            color: #b45309;
        }

        .card.incoming .card-icon {
            background: #dcfce7;
            color: #15803d;
        }

        .card.outgoing .card-icon {
            background: #fee2e2;
            color: #b91c1c;
        }

        /* QUICK LINKS */
        .quick-links {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 30px;
        }

        .quick-link {
            display: block;
            background: white;
            padding: 18px;
            text-decoration: none;
            color: #292524;
            border: 1px solid #eee7df;
            border-radius: 11px;
            transition: 0.2s;
        }

        .quick-link:hover {
            border-color: #F97316;
            transform: translateY(-3px);
        }

        .quick-link span {
            color: #F97316;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .quick-link h3 {
            font-size: 13px;
            margin-top: 10px;
        }

        .quick-link p {
            font-size: 11px;
            color: #a8a29e;
            margin-top: 6px;
        }

        /* TABLE */
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
            margin-bottom: 20px;
        }

        .section-header h2 {
            font-size: 17px;
        }

        .section-header a {
            text-decoration: none;
            color: #ea580c;
            font-size: 12px;
            font-weight: bold;
        }

        table {
            width: 100%;
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

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: bold;
        }

        .masuk {
            background: #dcfce7;
            color: #166534;
        }

        .keluar {
            background: #fee2e2;
            color: #991b1b;
        }

        .empty {
            text-align: center;
            color: #a8a29e;
            padding: 30px;
        }

        /* RESPONSIVE */
        @media (max-width: 1100px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .quick-links {
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

            .topbar {
                align-items: flex-start;
                gap: 12px;
                flex-direction: column;
            }

            .cards,
            .quick-links {
                grid-template-columns: 1fr;
            }

            .welcome::after {
                display: none;
            }

            .section {
                overflow-x: auto;
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

            <a href="{{ route('dashboard') }}" class="active">
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

            <!-- MENU PEMBELIAN -->
            <a href="{{ route('purchases.index') }}">
                <svg viewBox="0 0 24 24">
                    <path d="M3 3h2l2.4 12.2a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 2-1.6L22 8H6"/>
                    <circle cx="10" cy="21" r="1"/>
                    <circle cx="18" cy="21" r="1"/>
                </svg>
                Data Pembelian
            </a>

            <!-- MENU PENJUALAN BARU -->
            <a href="{{ route('sales.index') }}">
                <svg viewBox="0 0 24 24">
                    <path d="M3 3h2l2.4 12.2a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 2-1.6L22 8H6"/>
                    <circle cx="10" cy="21" r="1"/>
                    <circle cx="18" cy="21" r="1"/>
                </svg>
                Data Penjualan
            </a>

            <!-- MENU LAPORAN INVENTORY -->
            <a href="{{ route('reports.inventory') }}"
                class="{{ request()->routeIs('reports.inventory') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24">
                    <path d="M4 19V5m0 14h16M8 16v-4m4 4V8m4 8v-7m4 7V4"/>
                </svg>
                Laporan Inventory
            </a>

        </nav>

        <!-- FORM LOGOUT -->
        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout-button">
                Logout
            </button>
        </form>

    </aside>

    <main class="main">

        <div class="topbar">
            <div>
                <h1>Dashboard</h1>
                <p>Selamat datang di halaman pengelolaan inventaris StyleStock.</p>
            </div>

            <div class="date">
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </div>
        </div>

        <section class="welcome">
            <h2>Kelola Inventaris Lebih Mudah</h2>
            <p>
                Pantau seluruh aktivitas persediaan barang, mulai dari data produk,
                kategori, supplier, hingga transaksi stok masuk dan keluar
                melalui <strong>StyleStock Inventory Management System</strong>.
            </p>
        </section>

        <div class="section-heading">
            <div>
                <h2>Ringkasan Inventaris</h2>
                <p>Informasi terkini dari database inventaris Anda.</p>
            </div>
        </div>

        <div class="cards">

            <div class="card">
                <div class="card-top">
                    <span class="card-label">Total Produk</span>
                    <div class="card-icon">PR</div>
                </div>
                <h3>{{ number_format($totalProduk) }}</h3>
                <small>Jumlah produk terdaftar</small>
            </div>

            <div class="card">
                <div class="card-top">
                    <span class="card-label">Total Kategori</span>
                    <div class="card-icon">KT</div>
                </div>
                <h3>{{ number_format($totalKategori) }}</h3>
                <small>Kategori produk tersedia</small>
            </div>

            <div class="card">
                <div class="card-top">
                    <span class="card-label">Total Supplier</span>
                    <div class="card-icon">SP</div>
                </div>
                <h3>{{ number_format($totalSupplier) }}</h3>
                <small>Supplier terdaftar</small>
            </div>

            <div class="card">
                <div class="card-top">
                    <span class="card-label">Total Stok</span>
                    <div class="card-icon">ST</div>
                </div>
                <h3>{{ number_format($totalStok) }}</h3>
                <small>Unit barang tersedia</small>
            </div>

            <div class="card warning">
                <div class="card-top">
                    <span class="card-label">Stok Menipis</span>
                    <div class="card-icon">!</div>
                </div>
                <h3>{{ number_format($stokMenipis) }}</h3>
                <small>Produk perlu diperiksa</small>
            </div>

            <div class="card incoming">
                <div class="card-top">
                    <span class="card-label">Stok Masuk</span>
                    <div class="card-icon">IN</div>
                </div>
                <h3>{{ number_format($transaksiMasuk) }}</h3>
                <small>Total transaksi masuk</small>
            </div>

            <div class="card outgoing">
                <div class="card-top">
                    <span class="card-label">Stok Keluar</span>
                    <div class="card-icon">OUT</div>
                </div>
                <h3>{{ number_format($transaksiKeluar) }}</h3>
                <small>Total transaksi keluar</small>
            </div>

        </div>

        <div class="section-heading">
            <div>
                <h2>Akses Cepat</h2>
                <p>Pilih menu untuk mengelola inventaris.</p>
            </div>
        </div>

        <div class="quick-links">

            <a href="{{ route('products.index') }}" class="quick-link">
                <span>PRODUK</span>
                <h3>Kelola Produk</h3>
                <p>Lihat dan atur data produk.</p>
            </a>

            <a href="{{ route('categories.index') }}" class="quick-link">
                <span>KATEGORI</span>
                <h3>Kelola Kategori</h3>
                <p>Atur pengelompokan produk.</p>
            </a>

            <a href="{{ route('suppliers.index') }}" class="quick-link">
                <span>SUPPLIER</span>
                <h3>Kelola Supplier</h3>
                <p>Lihat data pemasok barang.</p>
            </a>

            <a href="{{ route('stock-movements.index') }}" class="quick-link">
                <span>STOK</span>
                <h3>Riwayat Pergerakan Stok</h3>
                <p>Catat stok masuk dan keluar.</p>
            </a>

            <!-- AKSES CEPAT PEMBELIAN -->
            <a href="{{ route('purchases.index') }}" class="quick-link">
                <span>PEMBELIAN</span>
                <h3>Transaksi Pembelian</h3>
                <p>Catat pembelian dan penambahan stok.</p>
            </a>

            <!-- AKSES CEPAT PENJUALAN BARU -->
            <a href="{{ route('sales.index') }}" class="quick-link">
                <span>PENJUALAN</span>
                <h3>Transaksi Penjualan</h3>
                <p>Catat penjualan dan pengurangan stok.</p>
            </a>

            <!-- AKSES CEPAT LAPORAN INVENTORY -->
            <a href="{{ route('reports.inventory') }}" class="quick-link">
                <span>LAPORAN</span>
                <h3>Laporan Inventory</h3>
                <p>Lihat ringkasan dan riwayat inventaris.</p>
            </a>

        </div>

        <section class="section">
            <div class="section-header">
                <h2>Riwayat Pergerakan Stok Terbaru</h2>
                <a href="{{ route('stock-movements.index') }}">Lihat Semua</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Jenis Transaksi</th>
                        <th>Jumlah</th>
                        <th>Petugas</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($pergerakanTerbaru as $movement)
                        <tr>
                            <td>{{ $movement->product->name ?? '-' }}</td>

                            <td>
                                @if ($movement->type === 'IN')
                                    <span class="badge masuk">Stok Masuk</span>
                                @else
                                    <span class="badge keluar">Stok Keluar</span>
                                @endif
                            </td>

                            <td>{{ number_format($movement->quantity) }}</td>

                            <td>{{ $movement->user->name ?? '-' }}</td>

                            <td>
                                {{ $movement->created_at
                                    ? \Carbon\Carbon::parse($movement->created_at)->format('d-m-Y H:i')
                                    : '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty">
                                Belum ada riwayat pergerakan stok.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>

    </main>

</body>
</html>