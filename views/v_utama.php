<h1 class="page-title">Galeri Biskut Klasik</h1>

<div style="text-align: center; margin-bottom: 30px;">
    <p>Selamat datang ke Biskut Klasik. Kami menyediakan pelbagai jenis biskut tradisional yang pastinya menambat selera anda.</p>
</div>

<div class="gallery-row">
    <?php foreach ($data as $produk): ?>
        <div class="gallery-item" style="margin-bottom: 20px;">
            <img src="gambar/<?= htmlspecialchars($produk['gambar']) ?>" 
                 alt="<?= htmlspecialchars($produk['nama']) ?>" 
                 class="gallery-img">
            <h3 style="margin-top: 10px; color: #333;"><?= htmlspecialchars($produk['nama']) ?></h3>
            <p style="color: #e44d26; font-weight: bold;">Mula dari RM <?= number_format($produk['harga']['pek_mini'], 2) ?></p>
        </div>
    <?php endforeach; ?>
</div>

<div style="text-align: center; margin-top: 40px; margin-bottom: 50px;">
    <a href="index.php?menu=tempah" 
       style="background-color: #e44d26; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-size: 1.2rem; transition: background-color 0.3s;">
       Tempah Sekarang
    </a>
</div>