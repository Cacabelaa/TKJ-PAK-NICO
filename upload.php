<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $judul = $_POST['judul'];

    $nama_file = $_FILES['file']['name'];
    $nama_tmp = $_FILES['file']['tmp_name'];
    $ukuran = $_FILES['file']['size'];

    $folder = "uploads/";

    // Membuat nama file unik
    $nama_simpan = time() . "_" . $nama_file;

    // Upload file ke folder uploads
    move_uploaded_file($nama_tmp, $folder . $nama_simpan);

    // Simpan informasi file ke database
    mysqli_query($koneksi, "INSERT INTO files
        (judul, nama_file, nama_simpan, ukuran)
        VALUES
        ('$judul', '$nama_file', '$nama_simpan', '$ukuran')");

    header("Location: index.php");
    exit;
}
?>
