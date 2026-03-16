<?php
// Mula session supaya kita boleh bawa data invois ke merata tempat
session_start();

// 1. Panggil fail rujukan data (functions.php)
// Fail ni wajib ada supaya index boleh baca data biskut
include('includes/functions.php');

// 2. Ambil data biskut dari function yang ada dalam functions.php
$data = dapatkanDataBiskut();

// 3. Kenalpasti halaman mana yang user nak buka (berdasarkan URL ?menu=...)
// Kalau user baru buka website, dia akan automatik pergi ke 'utama'
$menu = isset($_GET['menu']) ? $_GET['menu'] : 'utama';

// 4. PAPARKAN HEADER (CSS & Menu Atas)
include('includes/header.php');

// 5. SISTEM ROUTING (Tentukan fail VIEW mana nak dipanggil)
// Ini adalah bahagian "Asingkan View" yang lecturer nak
switch ($menu) {
    case 'utama':
        include('views/v_utama.php');
        break;

    case 'tempah':
        include('views/v_tempah.php');
        break;

    case 'invois':
        include('views/v_invois.php');
        break;

    default:
        // Jika user taip menu yang pelik-pelik kat URL
        echo "<div style='text-align:center; padding:50px;'>";
        echo "<h2>Maaf, halaman tidak dijumpai!</h2>";
        echo "<a href='index.php?menu=utama' class='print-btn'>Kembali ke Utama</a>";
        echo "</div>";
        break;
}

// 6. PAPARKAN FOOTER (Copyright & Penutup Tag HTML)
include('includes/footer.php');
?>