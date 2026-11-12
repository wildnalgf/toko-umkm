<?php
declare(strict_types=1);

require __DIR__ . "/data.php";
require __DIR__ . "/functions.php";

// 1. Tangkap parameter GET dari URL
$katakunci = trim((string) filter_input(INPUT_GET, "q"));
$kategoriDipilih = (string) filter_input(INPUT_GET, "kategori");

// 2. Validasi: kategori harus ada di daftar putih
if (!in_array($kategoriDipilih, $daftarKategori, true)) {
    $kategoriDipilih = "Semua";
}

// 3. Olah data: filter kategori, lalu cari nama
$produkTampil = filterKategori($daftarProduk, $kategoriDipilih);
$produkTampil = cariProduk($produkTampil, $katakunci);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog <?= e($namaToko) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="kepala">
        <h1><?= e($namaToko) ?></h1>
        <nav class="menu">
            <a href="index.php" class="aktif">Katalog</a>
            <a href="pesan.php">Pesan</a>
            <a href="daftar-pesanan.php">Daftar Pesanan</a>
        </nav>
    </header>

    <main class="wadah">
        <!-- Form pencarian: method GET agar hasilnya bisa di-bookmark dan dibagikan -->
        <form action="index.php" method="get" class="cari">
            <input type="search" name="q" placeholder="Cari produk..." value="<?= e($katakunci) ?>">
            <select name="kategori">
                <?php foreach ($daftarKategori as $kategori): ?>
                    <option value="<?= e($kategori) ?>" <?= $kategori === $kategoriDipilih ? "selected" : "" ?>>
                        <?= e($kategori) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Cari</button>
        </form>

        <?php if ($katakunci !== ""): ?>
            <p class="info">Hasil pencarian "<?= e($katakunci) ?>": <?= count($produkTampil) ?> produk.</p>
        <?php endif; ?>

        <section class="grid">
            <?php if (count($produkTampil) === 0): ?>
                <p class="kosong">Produk tidak ditemukan.</p>
            <?php endif; ?>

            <?php foreach ($produkTampil as $produk): ?>
                <?php $status = statusStok($produk["stok"]); ?>
                <article class="kartu">
                    <span class="<?= kelasBadge($status) ?>"><?= $status ?></span>
                    <h2><?= e($produk["nama"]) ?></h2>
                    <p class="kategori"><?= e($produk["kategori"]) ?> &bull; <?= e($produk["kode"]) ?></p>
                    <p class="harga"><?= formatRupiah($produk["harga"]) ?></p>
                    <?php if ($produk["stok"] > 0): ?>
                        <a class="tombol" href="pesan.php?produk=<?= urlencode($produk["kode"]) ?>">Pesan</a>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </section>
    </main>

    <footer class="kaki">
        <p>&copy; <?= date("Y") ?> Pemrograman Web Informatika TSU</p>
    </footer>
</body>
</html>