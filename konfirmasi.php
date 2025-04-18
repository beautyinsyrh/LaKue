<?php
session_start();
$isLoggedIn = isset($_SESSION['username']);
$username = $isLoggedIn ? $_SESSION['username'] : '';
$orderSuccess = true;

// Simpan ke userpesan.txt jika belum pernah pesan
if ($isLoggedIn && $orderSuccess) {
    $alreadyExists = false;
    if (file_exists("userpesan.txt")) {
        $lines = file("userpesan.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $data = explode("|", $line);
            if (trim($data[0]) === $username) {
                $alreadyExists = true;
                break;
            }
        }
    }

    if (!$alreadyExists) {
        file_put_contents("userpesan.txt", $username . "|" . date("Y-m-d H:i:s") . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi</title>
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
    <div class="receipt text-center">
        <h3 class="mb-4">Konfirmasi Berhasil</h3>
        <p>Terima kasih telah melakukan pemesanan dan pembayaran.</p>
        <p>Pesanan Anda sedang diproses dan akan segera dikirim.</p>
        <p class="mt-4"><strong>LaKue - Ready to Serve You!</strong></p>

        <!-- Tombol di tengah -->
        <div class="mt-4 d-flex justify-content-center gap-3">
            <a class="btn btn-secondary mt-3" href="index.php">Kembali</a>
            <?php if ($isLoggedIn): ?>
            <a href="testimoni.php" class="btn btn-success mt-3">Tulis Testimoni</a>
        <?php else: ?>
            <p class="text-danger mt-3">Silakan <a href="login.php">login</a> untuk menulis testimoni.</p>
        <?php endif; ?>
        </div>
    </div>


</body>
</html>