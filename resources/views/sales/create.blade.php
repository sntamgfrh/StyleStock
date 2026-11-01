<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penjualan - StyleStock</title>

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
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 28px;
        }

        .welcome h2 {
            font-size: 23px;
            margin-bottom: 10px;
        }

        .welcome p {
            color: #e7e5e4;
            font-size: 13px;
            line-height: 1.7;
            max-width: 600px;
        }

        .welcome strong {
            color: #fb923c;
        }

        .section {
            background: white;
            border: 1px solid #eee7df;
            border-radius: 13px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(41,37,36,0.035);
            margin-bottom: 22px;
        }

        .section h2 {
            font-size: 17px;
            margin-bottom: 7px;
        }

        .section-description {
            color: #78716c;
            font-size: 12px;
            margin-bottom: 22px;
            line-height: 1.6;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 9px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #e7e0d7;
            border-radius: 8px;
            background: #FAF7F2;
            color: #292524;
            font-size: 13px;
            outline: none;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #F97316;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 650px;
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
            padding: 13px 12px;
            border-bottom: 1px solid #f0ebe5;
            font-size: 12px;
        }

        td select,
        td input {
            width: 100%;
            min-width: 100px;
            padding: 10px;
            border: 1px solid #e7e0d7;
            border-radius: 7px;
            background: #FAF7F2;
            font-size: 12px;
            color: #292524;
        }

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

        .btn-secondary {
            background: #57534e;
        }

        .btn-secondary:hover {
            background: #44403c;
        }

        .btn-danger {
            background: #dc2626;
            padding: 9px 12px;
        }

        .btn-danger:hover {
            background: #b91c1c;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .total-box {
            background: #fff7ed;
            border: 1px solid #fed7aa;
            border-radius: 10px;
            padding: 18px;
            text-align: right;
            margin-top: 20px;
        }

        .total-box p {
            color: #78716c;
            font-size: 12px;
            margin-bottom: 7px;
        }

        .total-box h2 {
            color: #ea580c;
            font-size: 24px;
            margin: 0;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 13px 15px;
            border-radius: 9px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .stock-info {
            color: #78716c;
            font-size: 11px;
            margin-top: 5px;
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
                flex-direction: column;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .actions {
                align-items: stretch;
                flex-direction: column;
            }

            .actions a,
            .actions button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR DASHBOARD -->
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

            <a href="{{ route('sales.index') }}" class="active">
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
            <button type="submit" class="logout-button">Logout</button>
        </form>

    </aside>

    <!-- KONTEN UTAMA -->
    <main class="main">

        <div class="topbar">
            <div>
                <h1>Tambah Penjualan</h1>
                <p>Masukkan informasi transaksi penjualan produk.</p>
            </div>

            <div class="date">
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </div>
        </div>

        <section class="welcome">
            <h2>Formulir Transaksi Penjualan</h2>
            <p>
                Pilih produk dan jumlah barang yang dibeli pelanggan.
                Sistem akan menghitung total dan mengurangi stok setelah
                transaksi berhasil disimpan.
            </p>
        </section>

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

        <form action="{{ route('sales.store') }}" method="POST" id="saleForm">
            @csrf

            <section class="section">

                <h2>Informasi Transaksi</h2>
                <p class="section-description">
                    Isi nama pembeli dan tanggal transaksi penjualan.
                </p>

                <div class="form-grid">

                    <div class="form-group">
                        <label for="buyer_name">Nama Pembeli</label>
                        <input
                            type="text"
                            id="buyer_name"
                            name="buyer_name"
                            value="{{ old('buyer_name') }}"
                            placeholder="Masukkan nama pembeli"
                            maxlength="255"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="sold_at">Tanggal Penjualan</label>
                        <input
                            type="datetime-local"
                            id="sold_at"
                            name="sold_at"
                            value="{{ old('sold_at', now()->format('Y-m-d\TH:i')) }}"
                            required
                        >
                    </div>

                </div>

            </section>

            <section class="section">

                <h2>Produk yang Dijual</h2>
                <p class="section-description">
                    Pilih produk dan masukkan jumlah barang yang dijual.
                    Stok tersedia ditampilkan untuk setiap produk.
                </p>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 40%;">Produk</th>
                                <th>Harga Jual</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody id="productRows">
                            <tr class="product-row">
                                <td>
                                    <select
                                        name="items[0][product_id]"
                                        class="product-select"
                                        required
                                    >
                                        <option value="">Pilih Produk</option>

                                        @foreach($products as $product)
                                            @if((float) $product->selling_price > 0)
                                                <option
                                                    value="{{ $product->id }}"
                                                    data-price="{{ $product->selling_price }}"
                                                    data-stock="{{ $product->stock }}"
                                                >
                                                    {{ $product->name }}
                                                    (Stok: {{ $product->stock }})
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>

                                <td class="unit-price">Rp 0</td>

                                <td>
                                    <input
                                        type="number"
                                        name="items[0][quantity]"
                                        class="quantity-input"
                                        min="1"
                                        value="1"
                                        required
                                    >
                                    <div class="stock-info"></div>
                                </td>

                                <td class="subtotal">Rp 0</td>

                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-danger remove-row"
                                    >
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="margin-top: 18px;">
                    <button type="button" class="btn btn-secondary" id="addRow">
                        + Tambah Produk
                    </button>
                </div>

                <div class="total-box">
                    <p>Total Penjualan</p>
                    <h2 id="grandTotal">Rp 0</h2>
                </div>

            </section>

            <div class="actions">
                <a href="{{ route('sales.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

                <button type="submit" class="btn">
                    Simpan Transaksi Penjualan
                </button>
            </div>

        </form>

    </main>

    <script>
        let rowIndex = 1;

        const productRows = document.getElementById('productRows');
        const grandTotal = document.getElementById('grandTotal');

        function formatRupiah(value) {
            return 'Rp ' + Number(value).toLocaleString('id-ID', {
                maximumFractionDigits: 2
            });
        }

        function updateTotals() {
            let total = 0;

            document.querySelectorAll('.product-row').forEach(row => {
                const select = row.querySelector('.product-select');
                const quantityInput = row.querySelector('.quantity-input');
                const selectedOption = select.options[select.selectedIndex];

                const price = Number(selectedOption?.dataset.price || 0);
                const stock = Number(selectedOption?.dataset.stock || 0);
                const quantity = Number(quantityInput.value || 0);

                const subtotal = price * quantity;

                row.querySelector('.unit-price').textContent =
                    formatRupiah(price);

                row.querySelector('.subtotal').textContent =
                    formatRupiah(subtotal);

                const stockInfo = row.querySelector('.stock-info');

                if (select.value) {
                    stockInfo.textContent = 'Stok tersedia: ' + stock;
                    quantityInput.max = stock;
                } else {
                    stockInfo.textContent = '';
                    quantityInput.removeAttribute('max');
                }

                total += subtotal;
            });

            grandTotal.textContent = formatRupiah(total);
        }

        function updateProductOptions() {
            const selectedIds = Array.from(
                document.querySelectorAll('.product-select')
            )
            .map(select => select.value)
            .filter(value => value !== '');

            document.querySelectorAll('.product-select').forEach(select => {
                Array.from(select.options).forEach(option => {
                    if (!option.value) return;

                    option.disabled =
                        selectedIds.includes(option.value) &&
                        select.value !== option.value;
                });
            });
        }

        function attachRowEvents(row) {
            row.querySelector('.product-select')
                .addEventListener('change', () => {
                    updateProductOptions();
                    updateTotals();
                });

            row.querySelector('.quantity-input')
                .addEventListener('input', updateTotals);

            row.querySelector('.remove-row')
                .addEventListener('click', () => {
                    const rows = document.querySelectorAll('.product-row');

                    if (rows.length === 1) {
                        alert('Minimal harus ada satu produk.');
                        return;
                    }

                    row.remove();
                    updateProductOptions();
                    updateTotals();
                });
        }

        document.getElementById('addRow').addEventListener('click', () => {
            const firstRow = document.querySelector('.product-row');
            const newRow = firstRow.cloneNode(true);

            newRow.querySelector('.product-select').name =
                `items[${rowIndex}][product_id]`;

            newRow.querySelector('.product-select').value = '';

            newRow.querySelector('.quantity-input').name =
                `items[${rowIndex}][quantity]`;

            newRow.querySelector('.quantity-input').value = 1;
            newRow.querySelector('.unit-price').textContent = 'Rp 0';
            newRow.querySelector('.subtotal').textContent = 'Rp 0';
            newRow.querySelector('.stock-info').textContent = '';

            newRow.querySelector('.quantity-input').removeAttribute('max');

            productRows.appendChild(newRow);

            attachRowEvents(newRow);
            updateProductOptions();
            updateTotals();

            rowIndex++;
        });

        document.querySelectorAll('.product-row').forEach(attachRowEvents);

        document.getElementById('saleForm').addEventListener('submit', function(event) {
            let valid = true;

            document.querySelectorAll('.product-row').forEach(row => {
                const select = row.querySelector('.product-select');
                const quantityInput = row.querySelector('.quantity-input');

                const stock = Number(
                    select.options[select.selectedIndex]?.dataset.stock || 0
                );

                const quantity = Number(quantityInput.value);

                if (!select.value || quantity < 1 || quantity > stock) {
                    valid = false;
                }
            });

            if (!valid) {
                event.preventDefault();
                alert('Periksa kembali produk dan jumlah barang. Jumlah tidak boleh melebihi stok tersedia.');
            }
        });

        updateTotals();
    </script>

</body>
</html>
