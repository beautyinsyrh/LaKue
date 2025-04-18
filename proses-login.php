<?php
session_start();

//Aktifkan error reporting
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form login
    $inputUsername = trim($_POST['username']);
    $inputPassword = trim($_POST['password']);

    // Cek apakah username dan password tidak kosong
    if (empty($inputUsername) || empty($inputPassword)) {
        $_SESSION['error'] = "Username atau password tidak boleh kosong.";
        header("Location: login.php?tab=login");
        exit;
    }

    //Baca file users.txt
    $users = file("users.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $loginSukses = false;

    foreach ($users as $user) {
        //Trim spasi atau karakter tak terlihat
        $user = trim($user);
        if (empty($user)) continue;

        //Pisahkan username, email, password, dan alamat yang disimpan
        list($savedUsername, $savedEmail, $savedPassword, $savedAlamat) = explode("|", $user);

        //Bandingkan username dan password
        if (strtolower($inputUsername) === strtolower(trim($savedUsername)) && $inputPassword === trim($savedPassword)) {
            // Set session jika login sukses
            $_SESSION['username'] = $savedUsername;
            $_SESSION['email'] = $savedEmail;  // Menyimpan email juga di session (opsional)
            $_SESSION['alamat'] = $savedAlamat;  // Menyimpan alamat juga di session (opsional)
            // Redirect ke halaman utama (index.php)
            header("Location: index.php");
            exit;
        }
    }

    //Jika login gagal
    $_SESSION['error'] = "Login gagal. Username atau password salah.";
    header("Location: login.php?tab=login");
    exit;
}
?>
