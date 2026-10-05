<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM users 
        WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {

        $_SESSION['username'] = $username;

        header("Location: index.php");
        exit;

    } else {

        $error = "Username atau password salah!";

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Caca</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="login-box">

    <h1>♡ LOGIN ♡</h1>
    <p>Masuk ke website kamu</p>

    <?php if (isset($error)) { ?>
        <p><?= $error; ?></p>
    <?php } ?>

    <form method="POST">

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit" name="login">
            LOGIN
        </button>

    </form>
<p>
    <a href="buat_akun.php">♡ Buat Akun</a>
</p>

<p>
    <a href="ganti_password.php">♡ Ganti Password</a>
</p>

</div>

</body>
</html>
