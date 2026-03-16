<?php
if (!isset($_SESSION['invois_data'])) {
    echo "<script>
            alert('Invois belum ada kerana belum ada tempahan.');
            window.location.href = 'index.php?menu=tempah';
          </script>";
    exit();
}

$invois = $_SESSION['invois_data'];
?>

<h1 class="page-title">Invois Tempahan Biskut Klasik</h1>

<div class="invoice-box">
    <div class="invoice-header" style="display: flex; justify-content: space-between; margin-bottom: 30px; padding-bottom: 20px; border-bottom: 2px solid #f0f0f0;">
        <div class="invoice-info">
            <strong>Kepada:</strong><br>
            <?= htmlspecialchars($invois['nama_pelanggan']) ?>
        </div>
        <div class="invoice-info" style="text-align: right;">
            <strong>No. Invois:</strong> <?= $invois['no_invois'] ?><br>
            <strong>Tarikh:</strong> <?= $invois['tarikh'] ?>
        </div>
    </div>

    <table class="invoice-table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Saiz</th>
                <th style="text-align: right;">Harga</th>
                <th style="text-align: center;">Kuantiti</th>
                <th style="text-align: right;">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($invois['items'])): ?>
                <tr>
                    <td colspan="5" style="text-align: center;">Tiada item tempahan.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($invois['items'] as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['nama_produk']) ?></td>
                        <td><?= htmlspecialchars($item['saiz']) ?></td>
                        <td style="text-align: right;">RM <?= number_format($item['harga_seunit'], 2) ?></td>
                        <td style="text-align: center;"><?= $item['kuantiti'] ?></td>
                        <td style="text-align: right;">RM <?= number_format($item['jumlah_harga'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align: right; font-weight: bold; font-size: 1.2rem;">Jumlah Besar</td>
                <td class="total-amount-cell">RM <?= number_format($invois['jumlah_besar'], 2) ?></td>
            </tr>
        </tfoot>
    </table>

    <div class="invoice-note" style="text-align: center; color: #777; margin-bottom: 30px; font-style: italic; border-top: 1px solid #eee; padding-top: 20px;">
        <p>* Sila cetak invois ini dan serahkan semasa mengambil tempahan.</p>
        <p>* Bayaran boleh dibuat secara tunai atau imbas Kod QR semasa pengambilan.</p>
    </div>

    <div class="action-buttons" style="text-align: center;">
        <button onclick="window.print()" class="print-btn">Cetak Invois</button>
    </div>
</div>