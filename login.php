<?php
session_start();

// Redirect kalau sudah login
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

// Ambil pesan error jika ada
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']); // hapus setelah ditampilkan
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LaKue - Akun</title>
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
            <li class="nav-item"><a class="nav-link fw-bold active" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link fw-bold active" href="menu.php">Menu</a></li>
            <li class="nav-item"><a class="nav-link fw-bold active" href="pesan.php">Pesan</a></li>
            <li class="nav-item"><a class="nav-link fw-bold active" href="testimoni.php">Testimoni</a></li>
          </ul>
        </div>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active fw-bold" href="login.php"><i class="bi bi-person"></i> Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- CONTENT -->
  <div class="container mt-5">
    <?php if ($error): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <ul class="nav nav-tabs" id="authTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="daftar-tab" data-bs-toggle="tab" data-bs-target="#daftar" type="button"
          role="tab">Daftar</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button"
          role="tab">Login</button>
      </li>
    </ul>

    <div class="tab-content mt-3" id="authTabContent">
      <!-- Form Daftar -->
      <div class="tab-pane fade show active" id="daftar" role="tabpanel">
        <form action="proses-daftar.php" method="post">
          <div class="input-group mb-3">
            <span class="input-group-text">@</span>
            <input type="text" class="form-control" name="username" placeholder="Username" required>
          </div>

          <div class="input-group mb-3">
            <input type="text" class="form-control" name="email" placeholder="Email" required>
            <span class="input-group-text">@gmail.com</span>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">Alamat</span>
            <textarea class="form-control" name="alamat" required></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
      </div>

      <!-- Form Login -->
      <div class="tab-pane fade" id="login" role="tabpanel">
        <form action="proses-login.php" method="post">
          <div class="input-group mb-3">
            <span class="input-group-text">@</span>
            <input type="text" class="form-control" name="username" placeholder="Username" required>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>

          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="bg-light text-dark pt-5 pb-4 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-4">
          <img src="images/logo.png" alt="LaKue" style="height: 80px;">
          <span class="fw-bold">LaKue</span>
          <p class="mt-2">Ready to Serve You</p>
          <h6 class="fw-bold mt-4">Layanan Pelanggan</h6>
          <p><i class="bi bi-whatsapp"></i> 081-2345-6789</p>
          <p><i class="bi bi-envelope"></i> lakuecake@gmail.com</p>
          <h6 class="fw-bold mt-4">Ikuti Kami</h6>
          <a href="#"><i class="bi bi-instagram me-2"></i></a>
          <a href="#"><i class="bi bi-youtube me-2"></i></a>
          <a href="#"><i class="bi bi-tiktok"></i></a>
        </div>

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

        <div class="col-md-3 mb-4">
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

  <!-- BOOTSRAP JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
  <script>
  // Cek apakah URL punya parameter ?tab=login
  const params = new URLSearchParams(window.location.search);
  if (params.get("tab") === "login") {
    const loginTabTrigger = document.querySelector('#login-tab');
    const loginTab = new bootstrap.Tab(loginTabTrigger);
    loginTab.show();
  }
</script>
</body>
</html>
