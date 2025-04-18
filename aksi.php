<?php
session_start();

$nama = $_POST['nama'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];
$jenis_kue = $_POST['jenis_kue'];
$jumlah = $_POST['jumlah'];
$catatan = $_POST['catatan'];
$pengiriman = $_POST['pengiriman'];

$data = "Nama: $nama\nEmail: $email\nTelepon: $telepon\nAlamat: $alamat\nKue: $jenis_kue\nJumlah: $jumlah\nCatatan: $catatan\nPengiriman: $pengiriman\nTanggal: " . date("Y-m-d H:i:s") . "\n---------------------------\n";

file_put_contents('userpesan.txt', $data, FILE_APPEND | LOCK_EX);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Struk Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .receipt {
            max-width: 500px;
            margin: 50px auto;
            border: 2px dashed #000;
            padding: 30px;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <h3 class="text-center mb-4">Struk Pemesanan</h3>
        <p><strong>Nama:</strong> <?= htmlspecialchars($nama) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
        <p><strong>No. HP:</strong> <?= htmlspecialchars($telepon) ?></p>
        <p><strong>Alamat:</strong><br><?= nl2br(htmlspecialchars($alamat)) ?></p>
        <p><strong>Kue:</strong> <?= htmlspecialchars($jenis_kue) ?></p>
        <p><strong>Jumlah:</strong> <?= htmlspecialchars($jumlah) ?></p>
        <?php if (!empty($catatan)): ?>
            <p><strong>Catatan:</strong><br><?= nl2br(htmlspecialchars($catatan)) ?></p>
        <?php endif; ?>
        <p><strong>Pengiriman:</strong> <?= htmlspecialchars($pengiriman) ?></p>

        <div class="text-center mt-4">
            <a href="pembayaran.php" class="btn btn-primary">Next: Pembayaran</a>
        </div>
    </div>
</body>
</html>