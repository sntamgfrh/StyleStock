<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembelian - StyleStock</title>

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
        }

        .section-title {
            font-size: 18px;
            margin-bottom: 18px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #d6d3d1;
            border-radius: 7px;
            background: white;
            font-size: 14px;
            color: #292524;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #F97316;
        }

        .items-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 25px 0 15px;
        }

        .btn {
            border: none;
            padding: 11px 17px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-orange {
            background: #F97316;
            color: white;
        }

        .btn-orange:hover {
            background: #ea580c;
        }

        .btn-gray {
            background: #e7e5e4;
            color: #292524;
        }

        .btn-red {
            background: #fee2e2;
            color: #b91c1c;
        }

        .item-row {
            display: grid;
            grid-template-columns: 2fr 1fr 1.3fr 1.3fr auto;
            gap: 12px;
            align-items: end;
            padding: 16px;
            background: #FAF7F2;
            border-radius: 9px;
            margin-bottom: 12px;
        }

        .item-row label {
            display: block;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 7px;
        }

        .subtotal {
            font-weight: bold;
            padding: 12px 0;
            white-space: nowrap;
        }

        .total-box {
            margin-top: 20px;
            padding: 20px;
            background: #fff7ed;
            border-radius: 9px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total-box strong {
            font-size: 22px;
            color: #ea580c;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 25px;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 200px;
            }

            .main {
                margin-left: 200px;
                padding: 20px;
            }

            .item-row {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                display: none;
            }

            .main {
                margin-left: 0;
                padding: 15px;
            }

            .form-grid {
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
            <button type="submit" class="logout-button">
                Logout
            </button>
        </form>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="main">

        <div class="topbar">
            <h2>Tambah Pembelian</h2>
        </div>

        <div class="welcome">
            <h3>Form Transaksi Pembelian</h3>
            <p>Masukkan supplier dan produk yang dibeli untuk menambahkan stok barang.</p>
        </div>

        <div class="card">

            @if ($errors->any())
                <div style="background:#fee2e2; color:#991b1b; padding:15px; border-radius:8px; margin-bottom:20px;">
                    <strong>Periksa kembali data berikut:</strong>
                    <ul style="margin:8px 0 0 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('purchases.store') }}" method="POST" id="purchaseForm">
                @csrf

                <h3 class="section-title">Informasi Pembelian</h3>

                <div class="form-grid">

                    <div class="form-group">
                        <label for="supplier_id">Supplier</label>

                        <select name="supplier_id" id="supplier_id" required>
                            <option value="">-- Pilih Supplier --</option>

                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}"
                                    {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="purchased_at">Tanggal Pembelian</label>

                        <input
                            type="date"
                            name="purchased_at"
                            id="purchased_at"
                            value="{{ old('purchased_at', date('Y-m-d')) }}"
                            required
                        >
                    </div>

                </div>

                <div class="items-header">
                    <h3 class="section-title" style="margin:0;">
                        Daftar Produk
                    </h3>

                    <button type="button" class="btn btn-orange" onclick="addItem()">
                        + Tambah Produk
                    </button>
                </div>

                <div id="itemsContainer"></div>

                <div class="total-box">
                    <span>Total Pembelian</span>
                    <strong id="grandTotal">Rp 0</strong>
                </div>

                <div class="actions">

                    <a href="{{ route('purchases.index') }}" class="btn btn-gray">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-orange">
                        Simpan Pembelian
                    </button>

                </div>
            </form>
        </div>

    </main>

    <script>
        const products = @json($products);

        let itemIndex = 0;

        function formatRupiah(number) {
            return 'Rp ' + Number(number || 0).toLocaleString('id-ID');
        }

        function addItem() {
            const container = document.getElementById('itemsContainer');
            const row = document.createElement('div');

            row.className = 'item-row';
            row.dataset.index = itemIndex;

            const productGroup = document.createElement('div');
            const productLabel = document.createElement('label');
            productLabel.textContent = 'Produk';

            const productSelect = document.createElement('select');
            productSelect.name = `items[${itemIndex}][product_id]`;
            productSelect.className = 'product-select';
            productSelect.required = true;

            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = '-- Pilih Produk --';
            productSelect.appendChild(defaultOption);

            products.forEach(product => {
                const option = document.createElement('option');

                option.value = product.id;
                option.textContent = `${product.sku} - ${product.name}`;
                option.dataset.price = product.purchase_price ?? 0;

                productSelect.appendChild(option);
            });

            productGroup.appendChild(productLabel);
            productGroup.appendChild(productSelect);

            const quantityGroup = document.createElement('div');
            const quantityLabel = document.createElement('label');
            quantityLabel.textContent = 'Jumlah';

            const quantityInput = document.createElement('input');
            quantityInput.type = 'number';
            quantityInput.name = `items[${itemIndex}][quantity]`;
            quantityInput.className = 'quantity-input';
            quantityInput.min = '1';
            quantityInput.value = '1';
            quantityInput.required = true;

            quantityGroup.appendChild(quantityLabel);
            quantityGroup.appendChild(quantityInput);

            const priceGroup = document.createElement('div');
            const priceLabel = document.createElement('label');
            priceLabel.textContent = 'Harga Beli (Rp)';

            const priceInput = document.createElement('input');
            priceInput.type = 'number';
            priceInput.name = `items[${itemIndex}][unit_cost]`;
            priceInput.className = 'price-input';
            priceInput.min = '0';
            priceInput.step = '0.01';
            priceInput.required = true;

            priceGroup.appendChild(priceLabel);
            priceGroup.appendChild(priceInput);

            const subtotalGroup = document.createElement('div');
            const subtotalLabel = document.createElement('label');
            subtotalLabel.textContent = 'Subtotal';

            const subtotalElement = document.createElement('div');
            subtotalElement.className = 'subtotal';
            subtotalElement.textContent = 'Rp 0';

            subtotalGroup.appendChild(subtotalLabel);
            subtotalGroup.appendChild(subtotalElement);

            const deleteGroup = document.createElement('div');
            const deleteButton = document.createElement('button');

            deleteButton.type = 'button';
            deleteButton.className = 'btn btn-red';
            deleteButton.textContent = 'Hapus';

            deleteButton.addEventListener('click', function () {
                removeItem(deleteButton);
            });

            deleteGroup.appendChild(deleteButton);

            row.appendChild(productGroup);
            row.appendChild(quantityGroup);
            row.appendChild(priceGroup);
            row.appendChild(subtotalGroup);
            row.appendChild(deleteGroup);

            container.appendChild(row);

            productSelect.addEventListener('change', function () {
                const selected = this.options[this.selectedIndex];
                priceInput.value = selected.dataset.price || 0;
                calculateTotal();
            });

            quantityInput.addEventListener('input', calculateTotal);
            priceInput.addEventListener('input', calculateTotal);

            itemIndex++;

            calculateTotal();
        }

        function removeItem(button) {
            const rows = document.querySelectorAll('.item-row');

            if (rows.length <= 1) {
                alert('Minimal harus ada satu produk.');
                return;
            }

            button.closest('.item-row').remove();

            calculateTotal();
        }

        function calculateTotal() {
            let grandTotal = 0;

            document.querySelectorAll('.item-row').forEach(row => {
                const quantity = Number(
                    row.querySelector('.quantity-input').value
                ) || 0;

                const price = Number(
                    row.querySelector('.price-input').value
                ) || 0;

                const subtotal = quantity * price;

                grandTotal += subtotal;

                row.querySelector('.subtotal').textContent =
                    formatRupiah(subtotal);
            });

            document.getElementById('grandTotal').textContent =
                formatRupiah(grandTotal);
        }

        addItem();
    </script>

</body>
</html>
