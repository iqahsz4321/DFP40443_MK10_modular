<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biskut Klasik - Borang Tempahan</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Imperial+Script&family=Mulish:wght@200..1000&family=Questrial&display=swap" rel="stylesheet">
    
    <style>
        .page-body { font-family: 'Questrial', sans-serif; background-color: #f0f2f5; margin: 0; padding: 20px; min-height: 100vh; display: flex; flex-direction: column; box-sizing: border-box; }
        .container { max-width: 1200px; margin: 0 auto; flex: 1; width: 100%; }
        .header-wrapper { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; background-color: #333; padding: 20px; border-radius: 8px; }
        .site-title { font-family: 'Imperial Script', cursive; font-size: 4.5rem; color: #fff; margin: 0; padding: 0; line-height: 1; }
        
        /* Navigation */
        .nav-menu { display: flex; gap: 20px; align-items: center; }
        .nav-link { text-decoration: none; color: #fff; font-weight: normal; font-size: 1.4rem; }
        .nav-link:hover { color: #e44d26; }
        .nav-link.active { color: #e44d26; border-bottom: 2px solid #e44d26; }
        
        .page-title { color: #333; border-bottom: 2px solid #ddd; padding-bottom: 10px; text-align: center; }

        /* Product Grid & Card */
        .product-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; margin-top: 20px; }
        .product-card { background-color: #fff; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); padding: 20px; display: flex; flex-direction: column; }
        .product-image { width: 100%; height: 200px; object-fit: contain; border-radius: 5px; margin-bottom: 15px; }
        .product-option { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #f0f0f0; }
        .qty-input { width: 60px; padding: 5px; text-align: center; border: 1px solid #ccc; border-radius: 4px; }

        /* Checkout & Total */
        .checkout-section { background-color: #fff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); padding: 25px; margin-top: 40px; max-width: 550px; margin-left: auto; margin-right: auto; }
        .total-display { display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 20px; }
        .total-amount { font-size: 2em; font-weight: normal; color: #28a745; }
        .checkout-input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-size: 16px; margin-bottom: 15px; }
        .checkout-button { width: 100%; background-color: #e44d26; color: white; padding: 15px; border: none; border-radius: 5px; cursor: pointer; font-size: 20px; }

        /* Invoice Styles */
        .invoice-box { background-color: #fff; padding: 40px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); margin-top: 20px; max-width: 800px; margin-left: auto; margin-right: auto; }
        .invoice-table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        .invoice-table th, .invoice-table td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
        .total-amount-cell { font-weight: bold; font-size: 1.4rem; color: #28a745; text-align: right; }
        .print-btn { background-color: #333; color: #fff; border: none; padding: 12px 30px; border-radius: 5px; cursor: pointer; }

        /* Gallery Page (Utama) */
        .gallery-row { display: flex; justify-content: center; gap: 20px; margin-top: 30px; flex-wrap: wrap; }
        .gallery-item { text-align: center; }
        .gallery-img { width: 200px; height: 200px; object-fit: cover; border-radius: 10px; border: 3px solid #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }

        @media print { 
            .header-wrapper, .main-footer, .action-buttons, .nav-menu { display: none !important; } 
            .invoice-box { box-shadow: none; border: none; width: 100%; }
        }
    </style>
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