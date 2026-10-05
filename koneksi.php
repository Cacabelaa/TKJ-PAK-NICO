<?php

$koneksi = mysqli_connect(
    "localhost",
    "webuser",
    "web123",
    "db_biodata"
);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

?>
