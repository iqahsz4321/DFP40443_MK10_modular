<h1 class="page-title">Galeri Biskut Klasik</h1>

<div class="text-center mb-30">
    <p>Selamat datang ke Biskut Klasik. Kami menyediakan pelbagai jenis biskut tradisional yang pastinya menambat selera anda.</p>
</div>

<div class="gallery-row">
    <?php foreach ($data as $produk): ?>
        <div class="gallery-item mb-30">
            <img src="gambar/<?= htmlspecialchars($produk['gambar']) ?>" 
                 alt="<?= htmlspecialchars($produk['nama']) ?>" 
                 class="gallery-img">
            <h3 class="mt-10"><?= htmlspecialchars($produk['nama']) ?></h3>
            <p class="price-tag">Mula dari RM <?= number_format($produk['harga']['pek_mini'], 2) ?></p>
        </div>
    <?php endforeach; ?>
</div>

<div class="text-center mt-40 mb-50">
    <a href="index.php?menu=tempah" class="btn-order">
       Tempah Sekarang
    </a>
</div>