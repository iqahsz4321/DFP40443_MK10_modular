/* assets/script.js */
document.addEventListener('DOMContentLoaded', function () {
    const quantityInputs = document.querySelectorAll('.qty-input');
    const totalPriceEl = document.getElementById('total-price');
    const form = document.querySelector('form');

    // Fungsi kira jumlah harga secara live
    function calculateTotal() {
        let total = 0;
        quantityInputs.forEach(input => {
            let quantity = parseInt(input.value, 10) || 0;
            if (quantity < 0) quantity = 0;
            
            const price = parseFloat(input.dataset.price) || 0;
            total += quantity * price;
        });

        // Format ke RM
        const formatter = new Intl.NumberFormat('ms-MY', { 
            style: 'currency', 
            currency: 'MYR' 
        });
        
        if (totalPriceEl) {
            totalPriceEl.textContent = formatter.format(total);
        }
    }

    // Listeners untuk input kuantiti
    quantityInputs.forEach(input => {
        input.addEventListener('input', calculateTotal);
        input.addEventListener('blur', function () {
            const value = Math.round(parseFloat(this.value) || 0);
            this.value = value > 0 ? value : 0;
            calculateTotal();
        });
    });

    // Validasi sebelum submit
    if (form) {
        form.addEventListener('submit', function(e) {
            let totalTempahan = 0;
            quantityInputs.forEach(input => {
                totalTempahan += (parseInt(input.value, 10) || 0);
            });

            if (totalTempahan === 0) { 
                e.preventDefault(); 
                alert('Sila pilih sekurang-kurangnya satu jenis biskut.'); 
            }
        });
    }
});