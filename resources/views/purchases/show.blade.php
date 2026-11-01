<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembelian - StyleStock</title>

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
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .topbar h2 {
            font-size: 25px;
        }

        .welcome {
            background: white;
            padding: 22px;
            border-radius: 12px;
            margin-bottom: 25px;
            border-left: 5px solid #F97316;
        }

        .welcome h3 {
            margin-bottom: 7px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.04);
            margin-bottom: 22px;
        }

        .section-title {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .info-item label {
            display: block;
            color: #78716c;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .info-item p {
            font-size: 15px;
            font-weight: bold;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e7e5e4;
            font-size: 14px;
        }

        th {
            background: #FAF7F2;
            color: #57534e;
        }

        .text-right {
            text-align: right;
        }

        .total-row {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 35px;
            padding-top: 22px;
            font-size: 16px;
        }

        .total-row strong {
            color: #ea580c;
            font-size: 23px;
        }

        .badge {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
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

        .btn {
            display: inline-block;
            text-decoration: none;
            border: none;
            padding: 11px 17px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-orange {
            background: #F97316;
            color: white;
        }

        .btn-orange:hover {
            background: #ea580c;
        }

        .btn-cancel {
            background: #b91c1c;
            color: white;
        }

        .btn-cancel:hover {
            background: #991b1b;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
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

            .info-grid {
                grid-template-columns: 1fr;
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

    <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="logout-button">Logout</button>
    </form>

</aside>

<main class="main">

    <div class="topbar">
        <h2>Detail Pembelian</h2>
    </div>

    <div class="welcome">
        <h3>Informasi Transaksi Pembelian</h3>
        <p>Berikut adalah rincian transaksi pembelian produk.</p>
    </div>

    <div class="card">
        <h3 class="section-title">Informasi Transaksi</h3>

        <div class="info-grid">

            <div class="info-item">
                <label>Nomor Pembelian</label>
                <p>{{ $purchase->purchase_number }}</p>
            </div>

            <div class="info-item">
                <label>Tanggal Pembelian</label>
                <p>{{ $purchase->purchased_at?->format('d-m-Y H:i') ?? '-' }}</p>
            </div>

            <div class="info-item">
                <label>Supplier</label>
                <p>{{ $purchase->supplier->name ?? '-' }}</p>
            </div>

            <div class="info-item">
                <label>Petugas</label>
                <p>{{ $purchase->user->name ?? $purchase->user->username ?? '-' }}</p>
            </div>

            <div class="info-item">
                <label>Status Transaksi</label>
                <p>
                    @if ($purchase->status === 'completed')
                        <span class="badge completed">Selesai</span>
                    @else
                        <span class="badge cancelled">Dibatalkan</span>
                    @endif
                </p>
            </div>

        </div>
    </div>

    <div class="card">

        <h3 class="section-title">Daftar Produk yang Dibeli</h3>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>SKU</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga Beli</th>
                        <th class="text-right">Subtotal</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($purchase->items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->product->sku ?? '-' }}</td>
                            <td>{{ $item->product->name ?? 'Produk tidak tersedia' }}</td>
                            <td>{{ number_format($item->quantity, 0, ',', '.') }}</td>
                            <td>
                                Rp {{ number_format($item->unit_cost, 2, ',', '.') }}
                            </td>
                            <td class="text-right">
                                Rp {{ number_format($item->subtotal, 2, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center;">
                                Belum ada detail produk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="total-row">
            <span>Total Pembelian</span>
            <strong>
                Rp {{ number_format($purchase->total, 2, ',', '.') }}
            </strong>
        </div>

        <div class="actions">

            @if (auth()->user()->role === 'admin' && $purchase->status === 'completed')
                <form
                    action="{{ route('purchases.cancel', $purchase->id) }}"
                    method="POST"
                    onsubmit="return confirm('Apakah kamu yakin ingin membatalkan transaksi pembelian ini? Stok produk akan disesuaikan.');"
                >
                    @csrf

                    <button type="submit" class="btn btn-cancel">
                        Batalkan Pembelian
                    </button>
                </form>
            @endif

            <a href="{{ route('purchases.index') }}" class="btn btn-orange">
                Kembali ke Pembelian
            </a>

        </div>

    </div>

</main>

</body>
</html>
