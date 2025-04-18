<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Pembayaran</title>
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
    <h3 class="text-center mb-4">Informasi Pembayaran</h3>
    <p>Silakan lakukan pembayaran ke rekening berikut:</p>
    <p><strong>Bank:</strong> BCA</p>
    <p><strong>Nomor Rekening:</strong> 1234567890</p>
    <p><strong>Atas Nama:</strong> LaKue Cake</p>
    <p><strong>Total:</strong> Akan dikonfirmasi oleh admin</p>

    <div class="text-center mt-4">
      <a href="konfirmasi.php" class="btn btn-success">Konfirmasi</a>
    </div>
  </div>
</body>
</html>
