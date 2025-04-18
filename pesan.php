<?php
session_start();
$isLoggedIn = isset($_SESSION['username']); // cek apakah user sudah login
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>LaKue - Form Pemesanan</title>
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

        <!-- Menu kanan -->
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

  <!-- FORM PESAN -->
  <div class="container mt-4 mb-4">
    <h2 class="text-center mb-4">Form Pemesanan Kue</h2>
    <form action="aksi.php" method="POST" class="border p-4 rounded shadow bg-light" id="formPemesanan">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="text" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="telepon" class="form-label">No. HP</label>
        <input type="tel" class="form-control" id="telepon" name="telepon" required>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat Pengiriman</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
      </div>
      <div class="mb-3">
        <label for="jenis_kue" class="form-label">Kue</label>
        <select class="form-select" id="jenis_kue" name="jenis_kue" required>
          <option value="">--Pilih Kue--</option>
          <option value="Pound Cake Vanilla">Pound Cake Vanilla</option>
          <option value="Pound Cake Almond">Pound Cake Almond</option>
          <option value="Chiffon Cake Coklat">Chiffon Cake Coklat</option>
          <option value="Chiffon Cake Vanilla">Chiffon Cake Vanilla</option>
          <option value="Chiffon Cake Pandan">Chiffon Cake Pandan</option>
          <option value="Sponge Cake Vanilla">Sponge Cake Vanilla</option>
          <option value="Tart Cake Coklat">Tart Cake Coklat</option>
          <option value="Tart Cake Stroberi">Tart Cake Stroberi</option>
          <option value="Tart Cake Mocha">Tart Cake Mocha</option>
          <option value="Tart Cake Caramel">Tart Cake Caramel</option>
          <option value="Black Forest Cake Coklat">Black Forest Cake Coklat</option>
          <option value="Black Forest Cake Ceri">Black Forest Cake Ceri</option>
          <option value="CheeseCake Keju">CheeseCake Keju</option>
          <option value="CheeseCake Stroberi">CheeseCake Stroberi</option>
          <option value="Rainbow Cake Coklat">Rainbow Cake Coklat</option>
          <option value="Rainbow Cake Matcha">Rainbow Cake Matcha</option>
          <option value="Rainbow Cake Red Velvet">Rainbow Cake Red Velvet</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah</label>
        <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" required>
      </div>
      <div class="mb-3">
        <label for="catatan" class="form-label">Catatan Tambahan</label>
        <textarea class="form-control" id="catatan" name="catatan" rows="2"
          placeholder="Contoh: tanpa kacang, delivery jam 3 sore"></textarea>
      </div>
      <div class="mb-3">
        <label for="pengiriman" class="form-label">Jenis Pengiriman</label>
        <select class="form-select" id="pengiriman" name="pengiriman" required>
          <option value="">--Pengiriman--</option>
          <option value="Paxel">Paxel</option>
          <option value="Kiriminaja">Kirimin Aja</option>
          <option value="SPX Instan">SPX Instan</option>
          <option value="Grab Instan">Grab Instan</option>
          <option value="Gosend Instan">Gosend Instan</option>
          <option value="Lalamove">Lalamove</option>
        </select>
      </div>

      <div class="mb-3">
        <button type="submit" class="btn btn-primary" <?= !$isLoggedIn ? 'onclick="alert(\'Silakan login terlebih dahulu untuk memesan.\'); return false;"' : '' ?>>
          Pesan Sekarang
        </button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>