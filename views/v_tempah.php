<h1 class="page-title">Borang Tempahan</h1>

<form action="proses.php" method="POST">
    <div class="product-grid">
        <?php foreach ($data as $produk): ?>
            <div class="product-card">
                <img src="gambar/<?= htmlspecialchars($produk['gambar']) ?>" alt="<?= htmlspecialchars($produk['nama']) ?>" class="product-image">
                <h3 class="product-name"><?= htmlspecialchars($produk['nama']) ?></h3>
                
                <?php foreach ($produk['harga'] as $saiz_key => $harga): ?>
                    <div class="product-option">
                        <label for="produk_<?= $produk['id'] ?>_<?= $saiz_key ?>" class="option-label">
                            <span class="option-name"><?= htmlspecialchars(ucwords(str_replace('_', ' ', $saiz_key))) ?></span>
                            <span class="option-price">RM <?= number_format($harga, 2) ?></span>
                        </label>
                        <input type="number" 
                               id="produk_<?= $produk['id'] ?>_<?= $saiz_key ?>" 
                               name="tempahan[<?= $produk['id'] ?>][<?= $saiz_key ?>]" 
                               min="0" 
                               value="0" 
                               data-price="<?= $harga ?>" 
                               class="qty-input">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="checkout-section">
        <div class="total-display">
            <span class="total-label">Jumlah Harga:</span>
            <span class="total-amount" id="total-price">RM 0.00</span>
        </div>
        
        <div class="form-group">
            <label for="nama" class="input-label">Nama Penuh Anda:</label>
            <input type="text" id="nama" name="nama_pelanggan" placeholder="Contoh: Ali Bin Abu" required class="checkout-input">
        </div>
        
        <button type="submit" class="checkout-button">Teruskan</button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quantityInputs = document.querySelectorAll('.qty-input');
        const totalPriceEl = document.getElementById('total-price');
        const form = document.querySelector('form');

        function calculateTotal() {
            let total = 0;
            quantityInputs.forEach(input => {
                let quantity = parseInt(input.value, 10);
                if (isNaN(quantity) || quantity < 0) { quantity = 0; }
                const price = parseFloat(input.dataset.price) || 0;
                if (quantity > 0) { total += quantity * price; }
            });
            const formatter = new Intl.NumberFormat('ms-MY', { style: 'currency', currency: 'MYR' });
            totalPriceEl.textContent = formatter.format(total);
        }

        quantityInputs.forEach(input => {
            input.addEventListener('input', calculateTotal);
            input.addEventListener('blur', function () {
                const value = parseFloat(this.value);
                if (!isNaN(value) && value > 0) { this.value = Math.round(value); } else { this.value = 0; }
                calculateTotal();
            });
        });

        if (form) {
            form.addEventListener('submit', function(e) {
                let total = 0;
                quantityInputs.forEach(input => {
                    let quantity = parseInt(input.value, 10);
                    const price = parseFloat(input.dataset.price) || 0;
                    if (!isNaN(quantity) && quantity > 0) { total += quantity * price; }
                });
                if (total === 0) { 
                    e.preventDefault(); 
                    alert('Sila pilih sekurang-kurangnya satu jenis biskut sebelum meneruskan tempahan.'); 
                }
            });
        }
    });
</script>