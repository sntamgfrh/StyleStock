# StyleStock – Inventory Management System

StyleStock adalah aplikasi **Inventory Management System** berbasis Laravel yang dikembangkan sebagai proyek Mini Project 3 mata kuliah Web 4. Aplikasi ini membantu mengelola data persediaan barang, supplier, serta transaksi barang masuk dan barang keluar.

## Fitur Utama

- **Autentikasi:** Login, logout, dan pengelolaan sesi pengguna.
- **Hak Akses:** Pembagian peran pengguna menjadi Admin dan Staff.
- **Dashboard:** Menampilkan ringkasan informasi persediaan.
- **Kategori:** Mengelola data kategori produk.
- **Produk:** Mengelola data produk, SKU, harga, dan stok.
- **Supplier:** Mengelola informasi supplier.
- **Relasi Produk dan Supplier:** Mendukung hubungan banyak-ke-banyak.
- **Barang Masuk:** Mencatat transaksi pembelian dan penambahan stok.
- **Barang Keluar:** Mencatat transaksi penjualan dan pengurangan stok.
- **Riwayat Transaksi:** Menampilkan informasi transaksi yang tercatat.
- **Laporan Persediaan:** Menampilkan informasi stok dan ringkasan barang masuk serta barang keluar.
- **Pencarian dan Pagination:** Membantu pengguna menemukan data dengan lebih mudah.

## Teknologi yang Digunakan

- PHP
- Laravel
- MySQL / MariaDB
- HTML
- CSS
- JavaScript
- Composer

## Hak Akses Pengguna

| Admin | Staff |
|---|---|
| Mengelola pengguna | Melihat data produk |
| Mengelola kategori | Membuat transaksi barang masuk |
| Mengelola produk | Membuat transaksi barang keluar |
| Mengelola supplier | Melihat transaksi sesuai hak akses |
| Melihat dashboard dan laporan | Tidak dapat mengelola hak akses pengguna |

## Struktur Modul

- Authentication
- Dashboard
- Categories
- Products
- Suppliers
- Stock Movements
- Purchases
- Sales
- Inventory Reports

## Persyaratan Sistem

- PHP 8.3 atau lebih baru
- Composer
- MySQL atau MariaDB
- Laravel 13
- Web browser

## Cara Menjalankan Proyek

1. Clone repository:

   ```bash
   git clone https://github.com/sntamgfrh/StyleStock.git
   ```

2. Masuk ke folder proyek:

   ```bash
   cd StyleStock
   ```

3. Install dependency:

   ```bash
   composer install
   ```

4. Salin file konfigurasi:

   ```bash
   copy .env.example .env
   ```

5. Buat application key:

   ```bash
   php artisan key:generate
   ```

6. Atur konfigurasi database pada file `.env` sesuai lingkungan masing-masing.

7. Jalankan aplikasi:

   ```bash
   php artisan serve
   ```

8. Buka alamat berikut pada browser:

   ```text
   http://127.0.0.1:8000
   ```

   ## Akun Demo

| Role | Username | Password |
|---|---|---|
| Admin | admin | StyleStock123! |
| Staff | staff | Staff12345 |

**Catatan:** Database harus disiapkan terlebih dahulu sesuai struktur database proyek. Jangan memasukkan file `.env` atau password database ke repository.

## Tujuan Proyek

Proyek ini dibuat untuk menerapkan konsep pengembangan aplikasi web menggunakan Laravel, meliputi pengelolaan database, autentikasi, otorisasi, CRUD, relasi tabel, transaksi persediaan, validasi, dan laporan.

## Repository

[https://github.com/sntamgfrh/StyleStock](https://github.com/sntamgfrh/StyleStock)

---


