<?php
session_start();
$isLoggedIn = isset($_SESSION['username']); // cek apakah user sudah login
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LaKue</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
            <li class="nav-item">
              <span class="nav-link fw-bold">Hi, <?= htmlspecialchars($_SESSION['username']) ?></span>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-danger" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link active fw-bold" href="login.php">
                <i class="bi bi-person"></i> Login
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
  
  <!--CONTENT-->
  <div class="container my-4">
    <img src="images/LaKue.png" class="d-block w-100" style="height: 100%; object-fit: cover;" alt="LaKue">
  </div> 

  <div class="my-4">
    <h3 class="text-center">Alur Pemesanan Kue</h3>
  </div>
  <div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title fw-bold mb-3">Langkah-langkah Pemesanan</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">1. Lakukan pendaftaran terlebih dahulu.</li>
                <li class="list-group-item">2. Klik tombol login di kanan atas website. Jika belum memiliki akun, klik daftar. Jika telah memiliki akun, klik login.</li>
                <li class="list-group-item">3. Login dan masuk ke akun.</li>
                <li class="list-group-item">4. Isi form pemesanan dengan baik dan benar.</li>
                <li class="list-group-item">5. Submit form pemesanan.</li>
            </ul>
        </div>
    </div>
</div>

  <!--FOOTER-->
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