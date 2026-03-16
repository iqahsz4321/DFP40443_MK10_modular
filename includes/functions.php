<?php
/**
 * Fungsi ini menyimpan semua maklumat produk biskut.
 * Senang nak maintain kalau ada perubahan harga atau nama produk.
 */
function dapatkanDataBiskut() {
    return [
        [
            'id' => 1,
            'nama' => 'Kuih Semperit',
            'gambar' => 'kuih_semperit.png', // Pastikan nama fail gambar betul
            'harga' => [
                'pek_mini' => 2.00,
                'kecil' => 17.00,
                'besar' => 34.00
            ]
        ],
        [
            'id' => 2,
            'nama' => 'Biskut Mazola',
            'gambar' => 'biskut_mazola.png',
            'harga' => [
                'pek_mini' => 2.00,
                'kecil' => 20.00,
                'besar' => 40.00
            ]
        ],
        [
            'id' => 3,
            'nama' => 'Buah Pinggang',
            'gambar' => 'buah_pinggang.jpg',
            'harga' => [
                'pek_mini' => 2.00,
                'kecil' => 22.00,
                'besar' => 44.00
            ]
        ],
        [
            'id' => 4,
            'nama' => 'Tart Nanas',
            'gambar' => 'tart_nanas.png',
            'harga' => [
                'pek_mini' => 2.00,
                'kecil' => 25.00,
                'besar' => 50.00
            ]
        ]
    ];
}

/**
 * Fungsi tambahan jika anda mahu buat pengiraan di luar proses.php 
 * (Optional, tapi bagus untuk tunjuk skil kat lecturer)
 */
function formatRM($nilai) {
    return "RM " . number_format($nilai, 2);
}
?>