<?php
session_start();
$isLoggedIn = isset($_SESSION['username']);
$username = $isLoggedIn ? $_SESSION['username'] : '';
$canGiveTestimoni = false;

if ($isLoggedIn && file_exists("userpesan.txt")) {
    $lines = file("userpesan.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $data = explode("|", $line);
        if (trim($data[0]) === $username) {
            $canGiveTestimoni = true;
            break;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && $isLoggedIn && $canGiveTestimoni) {
    $testimoni = trim($_POST['testimoni']);
    if (!empty($testimoni)) {
        $entry = $username . "|" . $testimoni . PHP_EOL;
        file_put_contents("testimoni.txt", $entry, FILE_APPEND | LOCK_EX);
        header("Location: testimoni.php");
        exit;
    }
}


$hasGivenTestimoni = false;
if (file_exists("testimoni.txt")) {
    $testimoniLines = file("testimoni.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($testimoniLines as $line) {
        list($user, $msg) = explode("|", $line, 2);
        if (trim($user) === $username) {
            $hasGivenTestimoni = true;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Testimoni - LaKue</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    .testimoni-box {
      border: 1px solid #ccc;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 15px;
      background-color: #f8f9fa;
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg" style="z-index: 1050; position: relative;" data-bs-theme="light">
    <div class="container" style="background-color: #BC8F8F; border-radius: 20px; padding-left: 30px; padding-right: 30px;">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a class="navbar-brand fw-bold" href="LaKue.php">LaKue</a>

        <div class="mx-auto">
          <ul class="navbar-nav flex-row gap-3">
            <li class="nav-item"><a class="nav-link fw-bold" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link fw-bold" href="menu.php">Menu</a></li>
            <li class="nav-item"><a class="nav-link fw-bold" href="pesan.php">Pesan</a></li>
            <li class="nav-item"><a class="nav-link fw-bold" href="testimoni.php">Testimoni</a></li>
          </ul>
        </div>
        

        <ul class="navbar-nav mb-2 mb-lg-0">
          <?php if ($isLoggedIn): ?>
            <li class="nav-item"><span class="nav-link fw-bold">Hi, <?= htmlspecialchars($username); ?></span></li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-danger" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
            </li>
          <?php else: ?> 
            <li class="nav-item">
              <a class="nav-link active fw-bold" href="login.php">
                <i class="bi bi-person"></i> Login</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- CONTENT -->
  <div class="container my-5">
    <h3 class="text-center mb-4">Testimoni Pelanggan</h3>

    <!-- Testimoni List -->
    <div class="mb-5">
      <?php
      if (file_exists("testimoni.txt")) {
          $testimoniList = file("testimoni.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
          foreach ($testimoniList as $testi) {
              list($user, $message) = explode("|", $testi, 2);
              echo '<div class="testimoni-box">';
              echo '<strong>' . htmlspecialchars($user) . ':</strong><br>';
              echo nl2br(htmlspecialchars($message));
              echo '</div>';
          }
      } else {
          echo "<p class='text-muted'>Belum ada testimoni.</p>";
      }
      ?>
    </div>

    <!-- Form Testimoni -->
    <?php if ($isLoggedIn && $canGiveTestimoni && !$hasGivenTestimoni): ?>
  <div class="card p-4 mb-3">
    <form action="testimoni.php" method="POST">
      <div class="mb-3">
        <label for="testimoni" class="form-label">Tulis testimoni kamu:</label>
        <textarea name="testimoni" id="testimoni" class="form-control" rows="4" required></textarea>
      </div>
      <button type="submit" class="btn btn-success">Kirim Testimoni</button>
    </form>
    <?php elseif ($isLoggedIn && $hasGivenTestimoni): ?>
      <p class="text-info">Kamu sudah mengirim testimoni. Terima kasih atas feedback-nya!</p>
    <?php elseif ($isLoggedIn): ?>
      <p class="text-warning">Kamu harus melakukan pemesanan terlebih dahulu sebelum bisa memberikan testimoni.</p>
    <?php else: ?>
      <p class="text-danger">Silakan <a href="login.php">login</a> untuk mengisi testimoni.</p>
    <?php endif; ?>
  </div>
</div>

  <!-- FOOTER -->
   <footer class="bg-light text-dark pt-5 pb-4">
    <div class="container">
      <div class="row">

        <!-- Logo dan Kontak -->
        <div class="col-md-6 mb-4">
          <img src="images/logo.png" alt="LaKue" style="height: 80px;">
          <span style="font-size: 15px; font-weight: bold;">LaKue</span>
          <p class="mt-2">Ready to Serve You</p>
          <h6 class="mt-4 fw-bold">Layanan Pelanggan</h6>
          <p><i class="bi bi-whatsapp"></i> 081-2345-6789</p>
          <p><i class="bi bi-envelope"></i> lakuecake@gmail.com</p>
          <h6 class="fw-bold mt-4">Ikuti Kami</h6>
          <a href="#"><i class="bi bi-instagram me-2"></i></a>
          <a href="#"><i class="bi bi-youtube me-2"></i></a>
          <a href="#"><i class="bi bi-tiktok"></i></a>
        </div>

        <!-- Informasi -->
        <div class="col-md-3 mb-4">
          <h6 class="fw-bold">Informasi</h6>
          <ul class="list-unstyled">
            <li><a href="#" class="text-dark text-decoration-none">Tentang Kami</a></li>
            <li><a href="#" class="text-dark text-decoration-none">Kota Pengiriman</a></li>
            <li><a href="#" class="text-dark text-decoration-none">Inspirasi dan Tips</a></li>
            <li><a href="#" class="text-dark text-decoration-none">Karir</a></li>
            <li><a href="#" class="text-dark text-decoration-none">Press Release</a></li>
            <li><a href="#" class="text-dark text-decoration-none">Corporate</a></li>
            <li><a href="#" class="text-dark text-decoration-none">Join Mitra</a></li>
          </ul>
        </div>

        <!-- Bantuan -->
        <div class="col-md-3 mb-6">
          <h6 class="fw-bold">Bantuan</h6>
          <ul class="list-unstyled">
            <li><a href="carapesan.php" class="text-dark text-decoration-none">Cara Pemesanan</a></li>
            <li><a href="infokirim.php" class="text-dark text-decoration-none">Info Pengiriman</a></li>
            <li><a href="#" class="text-dark text-decoration-none">Metode Pembayaran</a></li>
            <li><a href="#" class="text-dark text-decoration-none">Kebijakan Pengembalian Dana</a></li>
            <li><a href="#" class="text-dark text-decoration-none">Testimoni Pelanggan</a></li>
            <li><a href="#" class="text-dark text-decoration-none">FAQ</a></li>
            <li><a href="#" class="text-dark text-decoration-none">Syarat dan Ketentuan</a></li>
            <li><a href="#" class="text-dark text-decoration-none">Privacy Policy</a></li>
            <li><a href="#" class="text-dark text-decoration-none">Layanan Pengaduan</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
