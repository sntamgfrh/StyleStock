<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori - StyleStock</title>

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

        /* SECTION */
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
            margin-bottom: 22px;
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

        /* FORM TAMBAH DAN EDIT */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 2fr auto;
            gap: 15px;
            align-items: end;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: bold;
            color: #57534e;
            margin-bottom: 9px;
        }

        .form-group input {
            width: 100%;
            min-width: 0;
            padding: 12px 14px;
            border: 1px solid #e7e5e4;
            border-radius: 8px;
            outline: none;
            font-size: 13px;
            color: #292524;
        }

        .form-group input:focus {
            border-color: #F97316;
            box-shadow: 0 0 0 3px #F973161c;
        }

        /* PENCARIAN */
        .search-form {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        .search-form input,
        .search-form select {
            padding: 11px 13px;
            border: 1px solid #e7e5e4;
            border-radius: 8px;
            outline: none;
            font-size: 12px;
            color: #292524;
            background: white;
        }

        .search-form input {
            flex: 1;
            min-width: 200px;
        }

        .search-form select {
            min-width: 145px;
        }

        .search-form input:focus,
        .search-form select:focus {
            border-color: #F97316;
            box-shadow: 0 0 0 3px #F973161c;
        }

        /* BUTTON */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            border: none;
            border-radius: 8px;
            padding: 10px 13px;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
            transition: 0.2s;
        }

        .btn-add,
        .btn-edit,
        .btn-search {
            background: #F97316;
        }

        .btn-add:hover,
        .btn-edit:hover,
        .btn-search:hover {
            background: #ea580c;
        }

        .btn-detail,
        .btn-reset {
            background: #57534e;
        }

        .btn-detail:hover,
        .btn-reset:hover {
            background: #44403c;
        }

        .btn-delete {
            background: #dc2626;
        }

        .btn-delete:hover {
            background: #b91c1c;
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

        .alert-error ul {
            margin-left: 20px;
        }

        /* TABLE */
        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
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

        .category-name {
            font-weight: bold;
            color: #292524;
        }

        .count-badge {
            display: inline-block;
            background: #fff0e5;
            color: #c2410c;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 6px;
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
        @media (max-width: 1000px) {
            .main {
                padding: 28px;
            }

            .form-grid {
                grid-template-columns: 1fr 1fr;
            }

            .form-grid .btn {
                grid-column: 1 / -1;
                justify-self: start;
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

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-grid .btn {
                grid-column: auto;
            }

            .search-form {
                align-items: stretch;
                flex-direction: column;
            }

            .search-form input,
            .search-form select,
            .search-form button,
            .search-form a {
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

        <!-- FORM LOGOUT -->
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
                <h1>Data Kategori</h1>
                <p>Kelola dan atur pengelompokan produk StyleStock.</p>
            </div>

            <div class="date">
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </div>
        </div>

        <section class="welcome">
            <h2>Manajemen Kategori Produk</h2>
            <p>
                Kelompokkan produk berdasarkan jenisnya agar data inventaris
                lebih teratur dan mudah dikelola melalui
                <strong>StyleStock Inventory Management System</strong>.
            </p>
        </section>

        <div class="section-heading">
            <div>
                <h2>Pengelolaan Kategori</h2>
                <p>Tambah, lihat, dan kelola kategori produk.</p>
            </div>
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

        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORM TAMBAH KATEGORI: ADMIN SAJA -->
        @if (auth()->user()->role === 'admin')
            <section class="container">

                <div class="container-header">
                    <h2>Tambah Kategori</h2>
                </div>

                <div class="container-desc">
                    Masukkan nama kategori dan deskripsi jika diperlukan.
                </div>

                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    <div class="form-grid">

                        <div class="form-group">
                            <label for="name">Nama Kategori</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Contoh: Pakaian"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <input
                                type="text"
                                id="description"
                                name="description"
                                value="{{ old('description') }}"
                                placeholder="Deskripsi kategori (opsional)"
                            >
                        </div>

                        <button type="submit" class="btn btn-add">
                            + Simpan Kategori
                        </button>

                    </div>
                </form>

            </section>
        @endif

        <!-- DAFTAR KATEGORI -->
        <section class="container">

            <div class="container-header">
                <h2>Semua Kategori</h2>
            </div>

            <div class="container-desc">
                Daftar kategori yang tersimpan di database.
            </div>

            <!-- FORM PENCARIAN DAN PENGURUTAN -->
            <form action="{{ route('categories.index') }}" method="GET" class="search-form">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama atau deskripsi kategori..."
                >

                <select name="sort">
                    <option value="latest" {{ request('sort', 'latest') == 'latest' ? 'selected' : '' }}>
                        Terbaru
                    </option>

                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>
                        Nama A - Z
                    </option>

                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>
                        Nama Z - A
                    </option>
                </select>

                <button type="submit" class="btn btn-search">
                    Cari
                </button>

                <a href="{{ route('categories.index') }}" class="btn btn-reset">
                    Reset
                </a>

            </form>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Jumlah Produk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($categories as $category)
                            <tr>

                                <td>
                                    {{ $categories->firstItem() + $loop->index }}
                                </td>

                                <td class="category-name">
                                    {{ $category->name }}
                                </td>

                                <td>
                                    {{ $category->description ?: '-' }}
                                </td>

                                <td>
                                    <span class="count-badge">
                                        {{ $category->products_count }} Produk
                                    </span>
                                </td>

                                <td>
                                    <div class="actions">

                                        <a href="{{ route('categories.show', $category->id) }}"
                                           class="btn btn-detail">
                                            Detail
                                        </a>

                                        @if (auth()->user()->role === 'admin')
                                            <button
                                                type="button"
                                                class="btn btn-edit"
                                                onclick="editCategory(
                                                    {{ $category->id }},
                                                    {{ Illuminate\Support\Js::from($category->name) }},
                                                    {{ Illuminate\Support\Js::from($category->description ?? '') }}
                                                )">
                                                Edit
                                            </button>

                                            <form
                                                action="{{ route('categories.destroy', $category->id) }}"
                                                method="POST"
                                                class="delete-form"
                                                onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-delete">
                                                    Hapus
                                                </button>

                                            </form>
                                        @endif

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty">
                                    @if (request('search'))
                                        Kategori dengan kata kunci "{{ request('search') }}" tidak ditemukan.
                                    @else
                                        Belum ada kategori yang tersimpan.
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                {{ $categories->links() }}
            </div>

        </section>

        <!-- FORM EDIT KATEGORI: ADMIN SAJA -->
        @if (auth()->user()->role === 'admin')
            <section class="container" id="edit-section" style="display: none;">

                <div class="container-header">
                    <h2>Edit Kategori</h2>
                </div>

                <div class="container-desc">
                    Ubah nama atau deskripsi kategori yang dipilih.
                </div>

                <form id="edit-form" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-grid">

                        <div class="form-group">
                            <label for="edit-name">Nama Kategori</label>
                            <input
                                type="text"
                                id="edit-name"
                                name="name"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="edit-description">Deskripsi</label>
                            <input
                                type="text"
                                id="edit-description"
                                name="description"
                            >
                        </div>

                        <div class="actions">
                            <button type="submit" class="btn btn-edit">
                                Simpan Perubahan
                            </button>

                            <button
                                type="button"
                                class="btn btn-delete"
                                onclick="cancelEdit()">
                                Batal
                            </button>
                        </div>

                    </div>
                </form>

            </section>
        @endif

        <div class="footer">
            StyleStock &copy; {{ date('Y') }} — Inventory Management System
        </div>

    </main>

    @if (auth()->user()->role === 'admin')
        <script>
            function editCategory(id, name, description) {
                const form = document.getElementById('edit-form');

                form.action = '/categories/' + id;

                document.getElementById('edit-name').value = name;
                document.getElementById('edit-description').value = description;

                const section = document.getElementById('edit-section');

                section.style.display = 'block';
                section.scrollIntoView({ behavior: 'smooth' });
            }

            function cancelEdit() {
                document.getElementById('edit-section').style.display = 'none';
            }
        </script>
    @endif

</body>
</html>
