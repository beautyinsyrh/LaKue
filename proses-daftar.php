<?php
//Ambil data dari form
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];

//Cek jika file belum ada, buat file users.txt
$filename = 'users.txt';
if (!file_exists($filename)) {
    file_put_contents($filename, '');
}

//Cek apakah username atau email sudah terdaftar
$users = file($filename, FILE_IGNORE_NEW_LINES);
foreach ($users as $user) {
    list($u, $e) = explode('|', $user);
    if ($u == $username || $e == $email) {
        echo "<script>alert('Username atau Email sudah terdaftar!'); window.location.href='login.php';</script>";
        exit;
    }
}

//Simpan data ke file users.txt
$data = "$username|$email|$password|$alamat" . PHP_EOL;
file_put_contents($filename, $data, FILE_APPEND);

//Redirect ke login
echo "<script>alert('Pendaftaran berhasil! Silakan login.'); window.location.href='login.php';</script>";
?>
