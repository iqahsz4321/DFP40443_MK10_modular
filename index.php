<?php
session_start();
include('includes/functions.php');

$data = dapatkanDataBiskut();

$menu = isset($_GET['menu']) ? $_GET['menu'] : 'utama';

include('includes/header.php');

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
        echo "<div style='text-align:center; padding:50px;'>";
        echo "<h2>Maaf, halaman tidak dijumpai!</h2>";
        echo "<a href='index.php?menu=utama' class='print-btn'>Kembali ke Utama</a>";
        echo "</div>";
        break;
}

include('includes/footer.php');
?>