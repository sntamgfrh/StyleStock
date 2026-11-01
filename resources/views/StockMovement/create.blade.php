<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pergerakan Stok - StyleStock</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background: #FAF7F2;
            color: #292524;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: linear-gradient(180deg, #292524, #44403c);
            color: white;
            padding: 30px 18px;
            flex-shrink: 0;
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
            flex: 1;
            padding: 35px 40px;
            min-width: 0;
        }

        h1 {
            font-size: 27px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #78716c;
            margin-bottom: 25px;
            font-size: 14px;
        }

        /* FORM CARD */
        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            max-width: 750px;
            border: 1px solid #eee7df;
            box-shadow: 0 3px 12px rgba(0,0,0,0.05);
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 14px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d6d3d1;
            border-radius: 7px;
            font-size: 14px;
            background: white;
            color: #292524;
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #F97316;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .alert {
            background: #fee2e2;
            color: #991b1b;
            padding: 13px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        /* ACTION BUTTONS */
        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            border: none;
            border-radius: 7px;
            padding: 12px 18px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-primary {
            background: #F97316;
            color: white;
        }

        .btn-primary:hover {
            background: #ea580c;
        }

        .btn-secondary {
            background: #e7e5e4;
            color: #292524;
        }

        .btn-secondary:hover {
            background: #d6d3d1;
        }

        /* RESPONSIVE */
        @media (max-width: 700px) {
            body {
                display: block;
            }

            .sidebar {
                width: 100%;
                min-height: auto;
            }

            .main {
                padding: 22px 16px;
            }

            .card {
                padding: 18px;
            }

            .actions {
                flex-direction: column;
            }

            .actions .btn {
                width: 100%;
                text-align: center;
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

            <a href="{{ route('stock-movements.index') }}" class="active">
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

        <h1>Tambah Pergerakan Stok</h1>
        <p class="subtitle">
            Catat transaksi stok masuk atau stok keluar.
        </p>

        <section class="card">

            <!-- NOTIFIKASI ERROR -->
            @if($errors->any())
                <div class="alert">
                    <strong>Periksa kembali data yang dimasukkan:</strong>

                    <ul style="margin: 8px 0 0 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- FORM PERGERAKAN STOK -->
            <form action="{{ route('stock-movements.store') }}" method="POST">
                @csrf

                <!-- PRODUK -->
                <div class="form-group">
                    <label for="product_id">Pilih Produk</label>

                    <select name="product_id" id="product_id" required>
                        <option value="">-- Pilih Produk --</option>

                        @foreach($products as $product)
                            <option
                                value="{{ $product->id }}"
                                {{ old('product_id') == $product->id ? 'selected' : '' }}
                            >
                                {{ $product->name }} (Stok: {{ $product->stock }})
                            </option>
                        @endforeach
                    </select>

                    @error('product_id')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- JENIS PERGERAKAN -->
                <div class="form-group">
                    <label for="type">Jenis Pergerakan</label>

                    <select name="type" id="type" required>
                        <option value="">-- Pilih Jenis --</option>

                        <option value="IN" {{ old('type') == 'IN' ? 'selected' : '' }}>
                            Stok Masuk
                        </option>

                        <option value="OUT" {{ old('type') == 'OUT' ? 'selected' : '' }}>
                            Stok Keluar
                        </option>
                    </select>

                    @error('type')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- JUMLAH -->
                <div class="form-group">
                    <label for="quantity">Jumlah</label>

                    <input
                        type="number"
                        name="quantity"
                        id="quantity"
                        min="1"
                        value="{{ old('quantity') }}"
                        placeholder="Masukkan jumlah stok"
                        required
                    >

                    @error('quantity')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- SUPPLIER -->
                <div class="form-group">
                    <label for="supplier_id">Supplier (Opsional)</label>

                    <select name="supplier_id" id="supplier_id">
                        <option value="">-- Pilih Supplier --</option>

                        @foreach($suppliers as $supplier)
                            <option
                                value="{{ $supplier->id }}"
                                {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}
                            >
                                {{ $supplier->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('supplier_id')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- PETUGAS -->
                <div class="form-group">
                    <label for="user_id">Petugas</label>

                    <select name="user_id" id="user_id" required>
                        <option value="">-- Pilih Petugas --</option>

                        @foreach($users as $user)
                            <option
                                value="{{ $user->id }}"
                                {{ old('user_id') == $user->id ? 'selected' : '' }}
                            >
                                {{ $user->name }} ({{ $user->role }})
                            </option>
                        @endforeach
                    </select>

                    @error('user_id')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- KETERANGAN -->
                <div class="form-group">
                    <label for="notes">Keterangan</label>

                    <textarea
                        name="notes"
                        id="notes"
                        placeholder="Masukkan keterangan transaksi (opsional)"
                    >{{ old('notes') }}</textarea>

                    @error('notes')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- TOMBOL -->
                <div class="actions">
                    <button type="submit" class="btn btn-primary">
                        Simpan Transaksi
                    </button>

                    <a href="{{ route('stock-movements.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>

        </section>

    </main>

</body>
</html>
