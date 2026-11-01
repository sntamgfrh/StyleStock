<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Supplier - StyleStock</title>

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

        .container {
            background: white;
            border: 1px solid #eee7df;
            border-radius: 13px;
            padding: 25px;
            margin-bottom: 22px;
            box-shadow: 0 4px 15px rgba(41,37,36,0.035);
        }

        .container-header {
            margin-bottom: 8px;
        }

        .container-header h2 {
            font-size: 17px;
        }

        .container-desc {
            color: #78716c;
            font-size: 12px;
            margin-bottom: 22px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .detail-item {
            padding: 17px;
            background: #FAF7F2;
            border: 1px solid #eee7df;
            border-radius: 9px;
        }

        .detail-item span {
            display: block;
            color: #78716c;
            font-size: 12px;
            margin-bottom: 9px;
        }

        .detail-item strong {
            display: block;
            color: #292524;
            font-size: 14px;
            overflow-wrap: anywhere;
        }

        .full {
            grid-column: 1 / -1;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            border: none;
            border-radius: 8px;
            padding: 11px 16px;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-back {
            background: #57534e;
        }

        .btn-back:hover {
            background: #44403c;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            padding: 13px 16px;
            border-radius: 9px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .footer {
            text-align: center;
            color: #a8a29e;
            font-size: 11px;
            margin-top: 25px;
        }

        @media (max-width: 1000px) {
            .main {
                padding: 28px;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding: 20px 18px;
            }

            .brand {
                margin-bottom: 12px;
            }

            .menu-title {
                padding-top: 15px;
            }

            .main {
                margin-left: 0;
                padding: 22px 16px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .welcome::after {
                display: none;
            }

            .container {
                padding: 16px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
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

            <a href="{{ route('suppliers.index') }}" class="active">
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

    <main class="main">

        <div class="topbar">
            <div>
                <h1>Detail Supplier</h1>
                <p>Informasi lengkap pemasok produk StyleStock.</p>
            </div>

            <div class="date">
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </div>
        </div>

        <section class="welcome">
            <h2>Informasi Supplier</h2>
            <p>
                Berikut adalah informasi lengkap supplier yang tersimpan
                dalam <strong>StyleStock Inventory Management System</strong>.
            </p>
        </section>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <section class="container">

            <div class="container-header">
                <h2>{{ $supplier->name }}</h2>
            </div>

            <div class="container-desc">
                Detail informasi supplier.
            </div>

            <div class="detail-grid">

                <div class="detail-item">
                    <span>Nama Supplier</span>
                    <strong>{{ $supplier->name }}</strong>
                </div>

                <div class="detail-item">
                    <span>Nama Kontak</span>
                    <strong>{{ $supplier->contact ?: '-' }}</strong>
                </div>

                <div class="detail-item">
                    <span>Nomor Telepon</span>
                    <strong>{{ $supplier->phone ?: '-' }}</strong>
                </div>

                <div class="detail-item">
                    <span>Email</span>
                    <strong>{{ $supplier->email ?: '-' }}</strong>
                </div>

                <div class="detail-item full">
                    <span>Alamat Supplier</span>
                    <strong>{{ $supplier->address ?: '-' }}</strong>
                </div>

            </div>

            <div style="margin-top: 25px;">
                <a href="{{ route('suppliers.index') }}" class="btn btn-back">
                    Kembali ke Daftar Supplier
                </a>
            </div>

        </section>

        <div class="footer">
            StyleStock &copy; {{ date('Y') }} - Inventory Management System
        </div>

    </main>

</body>
</html>
