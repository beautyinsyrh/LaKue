<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $testimoni = trim($_POST['testimoni']);

    if ($username && $testimoni) {
        $entry = "$username | $testimoni\n";
        file_put_contents("testimoni.txt", $entry, FILE_APPEND);
        echo "<script>alert('Terima kasih atas testimoninya!'); window.location='testimoni.php';</script>";
    } else {
        echo "<script>alert('Data tidak lengkap.'); window.history.back();</script>";
    }
} else {
    header("Location: index.php");
    exit();
}
