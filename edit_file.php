<?php

include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM files WHERE id='$id'");

$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {

    $judul = $_POST['judul'];

    mysqli_query($koneksi, "UPDATE files SET
        judul='$judul'
        WHERE id='$id'
    ");

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit File</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <div class="upload-box">

        <h2>✎ EDIT FILE</h2>

        <form method="POST">

            <label>Judul / Deskripsi File</label>

            <input
                type="text"
                name="judul"
                value="<?= htmlspecialchars($row['judul']); ?>"
                required
            >

            <p>
                File:
                <b><?= htmlspecialchars($row['nama_file']); ?></b>
            </p>

            <button type="submit" name="update">
                SIMPAN PERUBAHAN
            </button>

        </form>

        <br>

        <a href="index.php">← Kembali</a>

    </div>

</div>

</body>

</html>
