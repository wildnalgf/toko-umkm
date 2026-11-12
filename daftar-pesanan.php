<?php
declare(strict_types=1);

require __DIR__ . "/data.php";
require __DIR__ . "/functions.php";

// Baca semua pesanan dari file JSON, tampilkan yang terbaru di atas
$daftarPesanan = array_reverse(bacaPesanan(FILE_PESANAN));
$totalOmzet    = array_sum(array_column($daftarPesanan, "total"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan - <?= e($namaToko) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="kepala">
        <h1><?= e($namaToko) ?></h1>
        <nav class="menu">
            <a href="index.php">Katalog</a>
            <a href="pesan.php">Pesan</a>
            <a href="daftar-pesanan.php" class="aktif">Daftar Pesanan</a>
        </nav>
    </header>

    <main class="wadah">
        <h2>Daftar Pesanan</h2>
        <p class="info">
            <?= count($daftarPesanan) ?> pesanan &bull; Total <?= formatRupiah($totalOmzet) ?>
        </p>

        <?php if (count($daftarPesanan) === 0): ?>
            <p class="kosong">Belum ada pesanan.</p>
        <?php else: ?>
            <table class="tabel">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Waktu</th>
                        <th>Nama</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($daftarPesanan as $pesanan): ?>
                        <tr>
                            <td><?= e($pesanan["kode"]) ?></td>
                            <td><?= e($pesanan["waktu"]) ?></td>
                            <td><?= e($pesanan["nama"]) ?></td>
                            <td><?= e($pesanan["produk"]) ?></td>
                            <td><?= $pesanan["jumlah"] ?></td>
                            <td><?= formatRupiah($pesanan["total"]) ?></td>
                            <td><?= e($pesanan["catatan"]) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>

    <footer class="kaki">
        <p>&copy; <?= date("Y") ?> Pemrograman Web Informatika TSU</p>
    </footer>
</body>
</html>