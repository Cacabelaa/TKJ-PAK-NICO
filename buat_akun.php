<?php
include "koneksi.php";

if (isset($_POST['buat'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");

    if (mysqli_num_rows($cek) > 0) {
        $pesan = "Username sudah digunakan!";
    } else {
        mysqli_query($koneksi, "INSERT INTO users (username, password)
        VALUES ('$username', '$password')");

        $pesan = "Akun berhasil dibuat!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buat Akun</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-box">
    <h1>♡ BUAT AKUN ♡</h1>

    <?php if (isset($pesan)) echo "<p>$pesan</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username baru" required>

        <input type="password" name="password" placeholder="Password baru" required>

        <button type="submit" name="buat">BUAT AKUN</button>
    </form>

    <p><a href="login.php">← Kembali ke Login</a></p>
</div>

</body>
</html>
