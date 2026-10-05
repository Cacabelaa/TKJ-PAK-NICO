<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $no_absen = $_POST['no_absen'];

    mysqli_query($koneksi, "INSERT INTO siswa (nama, kelas, no_absen)
    VALUES ('$nama', '$kelas', '$no_absen')");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Siswa</title>
</head>

<body>

<h1>Tambah Data Siswa</h1>

<form method="POST">

    <label>Nama:</label><br>
    <input type="text" name="nama" required>
    <br><br>

    <label>Kelas:</label><br>
    <input type="text" name="kelas" required>
    <br><br>

    <label>No Absen:</label><br>
    <input type="number" name="no_absen" required>
    <br><br>

    <button type="submit" name="simpan">Simpan</button>

</form>

<br>

<a href="index.php">Kembali</a>

</body>
</html>
