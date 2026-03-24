<h1 class="page-title">Invois Tempahan Biskut Klasik</h1>

<div class="invoice-box">
    <div class="invoice-header-flex">
        <div>
            <strong>Kepada:</strong><br>
            <?= htmlspecialchars($invois['nama_pelanggan']) ?>
        </div>
        <div class="text-right">
            <strong>No. Invois:</strong> <?= $invois['no_invois'] ?><br>
            <strong>Tarikh:</strong> <?= $invois['tarikh'] ?>
        </div>
    </div>

    <table class="invoice-table">
        <td class="text-right">RM <?= number_format($item['harga_seunit'], 2) ?></td>
        <td class="text-center"><?= $item['kuantiti'] ?></td>
        <td class="text-right">RM <?= number_format($item['jumlah_harga'], 2) ?></td>
    </table>
    
    <div class="text-center mt-40">
        <button onclick="window.print()" class="print-btn">Cetak Invois</button>
    </div>
</div>