<?php
session_start();
include('includes/functions.php');

// Ambil data biskut yang kita dah set kat functions.php
$data_biskut = dapatkanDataBiskut();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Ambil data dari borang (v_tempah.php)
    $nama_pelanggan = $_POST['nama_pelanggan'] ?? 'Pelanggan';
    $tempahan_masuk = $_POST['tempahan'] ?? [];
    
    $items_tempahan = [];
    $jumlah_besar = 0;

    // 2. Proses setiap tempahan yang dihantar
    foreach ($tempahan_masuk as $id_produk => $saiz_list) {
        foreach ($saiz_list as $saiz_key => $kuantiti) {
            
            $kuantiti = intval($kuantiti); // Pastikan nombor bulat

            if ($kuantiti > 0) {
                // Cari maklumat produk berdasarkan ID
                $produk_dijumpai = null;
                foreach ($data_biskut as $p) {
                    if ($p['id'] == $id_produk) {
                        $produk_dijumpai = $p;
                        break;
                    }
                }

                if ($produk_dijumpai) {
                    $nama_p = $produk_dijumpai['nama'];
                    $harga_u = $produk_dijumpai['harga'][$saiz_key];
                    $subtotal = $harga_u * $kuantiti;

                    // Simpan dalam array untuk dipaparkan di invois nanti
                    $items_tempahan[] = [
                        'nama_produk' => $nama_p,
                        'saiz' => ucwords(str_replace('_', ' ', $saiz_key)),
                        'harga_seunit' => $harga_u,
                        'kuantiti' => $kuantiti,
                        'jumlah_harga' => $subtotal
                    ];

                    $jumlah_besar += $subtotal;
                }
            }
        }
    }

    // 3. Simpan semua hasil kira-kira ke dalam SESSION
    // Kita simpan dalam session supaya page v_invois.php boleh baca
    $_SESSION['invois_data'] = [
        'no_invois' => 'BK-' . date('Ymd') . '-' . rand(100, 999),
        'tarikh' => date('d/m/Y H:i A'),
        'nama_pelanggan' => $nama_pelanggan,
        'items' => $items_tempahan,
        'jumlah_besar' => $jumlah_besar
    ];

    // 4. Lepas dah siap kira, hantar user ke page Invois
    header("Location: index.php?menu=invois");
    exit();
} else {
    // Kalau orang cuba buka proses.php secara direct tanpa POST, hantar balik ke page tempah
    header("Location: index.php?menu=tempah");
    exit();
}