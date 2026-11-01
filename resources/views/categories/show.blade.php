<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kategori - StyleStock</title>

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

        /* KONTEN UTAMA */
        .main {
            margin-left: 240px;
            padding: 35px 40px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .topbar h1 {
            font-size: 26px;
        }

        .topbar p {
            color: #78716c;
            font-size: 14px;
            margin-top: 7px;
        }

        /* TOMBOL KEMBALI */
        .back-button {
            display: inline-block;
            padding: 12px 18px;
            background: #F97316;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            white-space: nowrap;
            transition: 0.2s;
        }

        .back-button:hover {
            background: #ea580c;
        }

        /* DETAIL KATEGORI */
        .detail-card {
            background: white;
            border: 1px solid #eee7df;
            padding: 28px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(41,37,36,0.035);
            margin-bottom: 25px;
        }

        .detail-card h2 {
            font-size: 18px;
            margin-bottom: 22px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .detail-item label {
            display: block;
            color: #78716c;
            font-size: 12px;
            margin-bottom: 8px;
        }

        .detail-item p {
            font-size: 15px;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .description {
            line-height: 1.7;
            font-weight: normal !important;
        }

        /* TABEL PRODUK */
        .section-title {
            font-size: 19px;
            margin-bottom: 18px;
        }

        .table-wrapper {
            background: white;
            border: 1px solid #eee7df;
            border-radius: 14px;
            padding: 22px;
            box-shadow: 0 4px 15px rgba(41,37,36,0.035);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th, td {
            padding: 15px 13px;
            text-align: left;
            border-bottom: 1px solid #f0ede8;
            font-size: 13px;
        }

        th {
            color: #78716c;
            background: #FAF7F2;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stock-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #fff7ed;
            color: #c2410c;
            font-weight: bold;
            font-size: 11px;
        }

        .empty {
            text-align: center;
            padding: 35px;
            color: #78716c;
            font-size: 14px;
        }

        .message {
            padding: 14px 18px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
        }

        /* RESPONSIVE */
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
                flex-direction: column;
            }

            .detail-grid {
                grid-template-columns: 1fr;
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

            <a href="{{ route('categories.index') }}" class="active">
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

            <!-- MENU LAPORAN INVENTORY -->
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

    <!-- KONTEN UTAMA -->
    <main class="main">

        <div class="topbar">
            <div>
                <h1>Detail Kategori</h1>
                <p>Informasi lengkap kategori dan produk terkait.</p>
            </div>

            <a href="{{ route('categories.index') }}" class="back-button">
                &larr; Kembali ke Kategori
            </a>
        </div>

        @if(session('success'))
            <div class="message success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="message error">
                {{ session('error') }}
            </div>
        @endif

        <!-- INFORMASI KATEGORI -->
        <section class="detail-card">

            <h2>Informasi Kategori</h2>

            <div class="detail-grid">

                <div class="detail-item">
                    <label>ID Kategori</label>
                    <p>{{ $category->id }}</p>
                </div>

                <div class="detail-item">
                    <label>Nama Kategori</label>
                    <p>{{ $category->name }}</p>
                </div>

                <div class="detail-item">
                    <label>Jumlah Produk</label>
                    <p>{{ $category->products->count() }} produk</p>
                </div>

                <div class="detail-item">
                    <label>Deskripsi</label>
                    <p class="description">
                        {{ $category->description ?: 'Tidak ada deskripsi.' }}
                    </p>
                </div>

            </div>

        </section>

        <!-- DAFTAR PRODUK -->
        <h2 class="section-title">Daftar Produk dalam Kategori</h2>

        <section class="table-wrapper">

            @if($category->products->count() > 0)

                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Produk</th>
                            <th>SKU</th>
                            <th>Harga</th>
                            <th>Stok</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($category->products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td>{{ $product->name }}</td>

                                <td>{{ $product->sku }}</td>

                                <td>
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </td>

                                <td>
                                    <span class="stock-badge">
                                        {{ number_format($product->stock) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @else

                <div class="empty">
                    Belum ada produk dalam kategori ini.
                </div>

            @endif

        </section>

    </main>

</body>
</html>
