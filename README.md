# Katalog & Pemesanan UMKM Sekar Jagad Solo (`toko-umkm`)

Proyek ini merupakan hasil praktikum mata kuliah **Pemrograman Web – Pertemuan 9 (Form Handling)** oleh **Wildan Maulana Al-Ghifari** (S1 Informatika, Tiga Serangkai University).

## Fitur & Konsep yang Diterapkan
* **Pencarian & Filter Produk (`index.php`):** Menggunakan metode HTTP `GET`, pencarian *case-insensitive* dengan `stripos()`, dan validasi kategori berbasis *whitelist* (`in_array()`).
* **Form Pemesanan & Validasi Server (`pesan.php`):** Menggunakan metode `POST`, pengambilan input dengan `filter_input()`, validasi di sisi server menggunakan `filter_var()`, serta sanitasi output menggunakan `htmlspecialchars()` untuk mencegah serangan XSS.
* **Pola Post/Redirect/Get (`pesan.php` vs `pesan-tanpa-prg.php`):** Menerapkan pengalihan HTTP `303 See Other` setelah proses simpan agar *refresh* browser (`F5`) tidak menyebabkan pengiriman pesanan ganda (*double submission*).
* **Penyimpanan & Daftar Pesanan (`daftar-pesanan.php` & `data/pesanan.json`):** Menyimpan riwayat transaksi dalam format JSON dan menampilkannya secara terurut dari transaksi terbaru beserta total omzet.

## Cara Menjalankan di Lokal (Laragon)
1. Letakkan folder `toko-umkm` di dalam direktori `C:\laragon\www\`.
2. Jalankan layanan Apache pada Laragon.
3. Buka browser dan akses `http://localhost/toko-umkm/`.
