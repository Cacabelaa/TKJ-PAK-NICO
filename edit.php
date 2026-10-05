<?php
include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id='$id'");

$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {

    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $no_absen = $_POST['no_absen'];

    mysqli_query($koneksi, "UPDATE siswa SET
        nama='$nama',
        kelas='$kelas',
        no_absen='$no_absen'
        WHERE id='$id'
    ");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Siswa</title>
</head>

<body>

<h1>Edit Data Siswa</h1>

<form method="POST">

    <label>Nama:</label><br>
    <input type="text" name="nama"
           value="<?= $row['nama']; ?>" required>

    <br><br>

    <label>Kelas:</label><br>
    <input type="text" name="kelas"
           value="<?= $row['kelas']; ?>" required>

    <br><br>

    <label>No Absen:</label><br>
    <input type="number" name="no_absen"
           value="<?= $row['no_absen']; ?>" required>

    <br><br>

    <button type="submit" name="update">Update</button>

</form>

<br>

<a href="index.php">Kembali</a>

</body>
</html>
