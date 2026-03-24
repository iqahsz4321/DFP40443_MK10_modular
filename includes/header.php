<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biskut Klasik - Borang Tempahan</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Imperial+Script&family=Mulish:wght@200..1000&family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    
</head>
<body class="page-body">
    <div class="container">
        <div class="header-wrapper">
            <h2 class="site-title">Biskut Klasik</h2>
            <nav class="nav-menu">
                <?php 
                    $active = $_GET['menu'] ?? 'utama'; 
                ?>
                <a href="index.php?menu=utama" class="nav-link <?= ($active == 'utama') ? 'active' : '' ?>">Utama</a>
                <a href="index.php?menu=tempah" class="nav-link <?= ($active == 'tempah') ? 'active' : '' ?>">Tempah</a>
                <a href="index.php?menu=invois" class="nav-link <?= ($active == 'invois') ? 'active' : '' ?>">Invois</a>
            </nav>
        </div>