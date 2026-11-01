<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - StyleStock</title>

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

        .actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .button {
            display: inline-block;
            padding: 12px 17px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .back-button {
            background: #292524;
            color: white;
        }

        .back-button:hover {
            background: #44403c;
        }

        .edit-button {
            background: #F97316;
            color: white;
        }

        .edit-button:hover {
            background: #ea580c;
        }

        /* DETAIL CARD */
        .detail-card {
            background: white;
            border: 1px solid #eee7df;
            border-radius: 13px;
            padding: 27px;
            box-shadow: 0 4px 15px rgba(41,37,36,0.035);
            margin-bottom: 25px;
        }

        .detail-card h2 {
            font-size: 17px;
            margin-bottom: 25px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 25px;
        }

        .detail-item label {
            display: block;
            color: #78716c;
            font-size: 12px;
            margin-bottom: 9px;
        }

        .detail-item p {
            color: #292524;
            font-size: 14px;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .stock-badge {
            display: inline-block;
            padding: 7px 12px;
            background: #fff0e5;
            color: #ea580c;
            border-radius: 20px;
            font-size: 12px;
        }

        .minimum-badge {
            display: inline-block;
            padding: 7px 12px;
            background: #fef3c7;
            color: #b45309;
            border-radius: 20px;
            font-size: 12px;
        }

        .status-low {
            color: #b91c1c;
            font-weight: bold;
        }

        .status-normal {
            color: #15803d;
            font-weight: bold;
        }

        .info-note {
            background: #fff7ed;
            border-left: 4px solid #F97316;
            padding: 16px 18px;
            border-radius: 8px;
            color: #57534e;
            font-size: 12px;
            line-height: 1.7;
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

            .actions {
                width: 100%;
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

    <!-- MAIN CONTENT -->
    <main class="main">

        <div class="topbar">

            <div>
                <h1>Detail Produk</h1>
                <p>Informasi lengkap mengenai produk StyleStock.</p>
            </div>

            <div class="actions">

                <a href="{{ route('products.index') }}"
                   class="button back-button">
                    &larr; Kembali ke Produk
                </a>

                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('products.edit', $product->id) }}"
                       class="button edit-button">
                        Edit Produk
                    </a>
                @endif

            </div>

        </div>

        <section class="detail-card">

            <h2>Informasi Produk</h2>

            <div class="detail-grid">

                <div class="detail-item">
                    <label>ID Produk</label>
                    <p>{{ $product->id }}</p>
                </div>

                <div class="detail-item">
                    <label>SKU / Kode Produk</label>
                    <p>{{ $product->sku }}</p>
                </div>

                <div class="detail-item">
                    <label>Nama Produk</label>
                    <p>{{ $product->name }}</p>
                </div>

                <div class="detail-item">
                    <label>Kategori</label>
                    <p>{{ $product->category->name ?? 'Belum memiliki kategori' }}</p>
                </div>

                <div class="detail-item">
                    <label>Harga Produk</label>
                    <p>
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                </div>

                <div class="detail-item">
                    <label>Stok Tersedia</label>
                    <p>
                        <span class="stock-badge">
                            {{ number_format($product->stock) }} unit
                        </span>
                    </p>
                </div>

                <div class="detail-item">
                    <label>Stok Minimum</label>
                    <p>
                        <span class="minimum-badge">
                            {{ number_format($product->minimum_stock) }} unit
                        </span>
                    </p>
                </div>

                <div class="detail-item">
                    <label>Status Persediaan</label>
                    <p>
                        @if($product->stock <= $product->minimum_stock)
                            <span class="status-low">Stok Menipis</span>
                        @else
                            <span class="status-normal">Stok Aman</span>
                        @endif
                    </p>
                </div>

            </div>

        </section>

        <section class="info-note">
            <strong>Informasi:</strong>
            Halaman ini menampilkan informasi produk yang tersimpan
            dalam database StyleStock. Untuk mengubah informasi produk,
            gunakan tombol Edit Produk.
        </section>

    </main>

</body>
</html>
