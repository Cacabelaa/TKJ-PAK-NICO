<?php

include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM files WHERE id='$id'");

$row = mysqli_fetch_assoc($data);

$file = "uploads/" . $row['nama_simpan'];

if (file_exists($file)) {

    header("Content-Disposition: attachment; filename=\"" . $row['nama_file'] . "\"");
    header("Content-Length: " . filesize($file));
    readfile($file);

} else {

    echo "File tidak ditemukan.";

}

?>
