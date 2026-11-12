<?php
declare(strict_types=1);

// Zona waktu WIB agar jam pesanan sesuai
date_default_timezone_set("Asia/Jakarta");

$namaToko = "UMKM Sekar Jagad Solo";

// Lokasi file penyimpanan pesanan sementara
const FILE_PESANAN = __DIR__ . "/data/pesanan.json";

$daftarKategori = ["Semua", "Makanan", "Minuman", "Fashion"];

$daftarProduk = [
    ["kode" => "P01", "nama" => "Keripik Tempe Original", "kategori" => "Makanan", "harga" => 15000, "stok" => 40],
    ["kode" => "P02", "nama" => "Sambal Bawang Pedas", "kategori" => "Makanan", "harga" => 25000, "stok" => 0],
    ["kode" => "P03", "nama" => "Kopi Robusta Lereng Lawu", "kategori" => "Minuman", "harga" => 45000, "stok" => 8],
    ["kode" => "P04", "nama" => "Batik Tulis Parang", "kategori" => "Fashion", "harga" => 350000, "stok" => 3],
    ["kode" => "P05", "nama" => "Wedang Uwuh Instan", "kategori" => "Minuman", "harga" => 18000, "stok" => 25],
    ["kode" => "P06", "nama" => "Serabi <Notosuman>", "kategori" => "Makanan", "harga" => 30000, "stok" => 12],
];