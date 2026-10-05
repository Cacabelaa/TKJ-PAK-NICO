<?php
include "koneksi.php";

if (isset($_POST['ganti'])) {
    $username = $_POST['username'];
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];

    $cek = mysqli_query($koneksi, "SELECT * FROM users
        WHERE username='$username' AND password='$password_lama'");

    if (mysqli_num_rows($cek) > 0) {

        mysqli_query($koneksi, "UPDATE users
            SET password='$password_baru'
            WHERE username='$username'");

        $pesan = "Password berhasil diganti!";
    } else {
        $pesan = "Username atau password lama salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ganti Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-box">
    <h1>♡ GANTI PASSWORD ♡</h1>

    <?php if (isset($pesan)) echo "<p>$pesan</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password_lama" placeholder="Password lama" required>

        <input type="password" name="password_baru" placeholder="Password baru" required>

        <button type="submit" name="ganti">GANTI PASSWORD</button>
    </form>

    <p><a href="login.php">← Kembali ke Login</a></p>
</div>

</body>
</html>
