<?php

include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM files WHERE id='$id'");

$row = mysqli_fetch_assoc($data);

$file = "uploads/" . $row['nama_simpan'];

if (file_exists($file)) {
    unlink($file);
}

mysqli_query($koneksi, "DELETE FROM files WHERE id='$id'");

header("Location: index.php");

?>
