<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
include "koneksi.php";

$data = mysqli_query($koneksi, "SELECT * FROM files ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Upload & Kelola File</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="header">
        <h1>UPLOAD & KELOLA FILE ♡</h1>
        <p>Simpan file, lebih mudah!</p>

        <div class="identity">
            <b>Salsabila Syarifa Wibowo</b> · XI TKJ 4 · Absen 30
        </div>
    </div>

    <div class="content">

        <!-- KIRI: UPLOAD -->
        <div class="upload-box">

            <h2>☁ UPLOAD FILE</h2>

            <form action="upload.php" method="POST" enctype="multipart/form-data">

                <label>Judul / Deskripsi File</label>

                <input
                    type="text"
                    name="judul"
                    placeholder="Contoh: Tugas Pemrograman"
                    required
                >

                <label>Pilih File</label>

                <input
                    type="file"
                    name="file"
                    required
                >

                <button type="submit">
                    ↑ UPLOAD
                </button>

            </form>

        </div>


        <!-- KANAN: DAFTAR FILE -->
        <div class="file-box">

            <h2>▣ DAFTAR FILE</h2>

            <table>

                <tr>
                    <th>No</th>
                    <th>Preview</th>
                    <th>Judul / Deskripsi</th>
                    <th>Tanggal Upload</th>
                    <th>Aksi</th>
                </tr>

                <?php
                $no = 1;

                while ($row = mysqli_fetch_assoc($data)) {

                    $nama_simpan = $row['nama_simpan'];
                    $nama_file = $row['nama_file'];

                    $ekstensi = strtolower(
                        pathinfo($nama_file, PATHINFO_EXTENSION)
                    );

                    $gambar = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                ?>

                <tr>

                    <td>
                        <?= $no++; ?>
                    </td>

                    <!-- PREVIEW -->
                    <td>

                        <?php if (in_array($ekstensi, $gambar)) { ?>

                            <img
                                class="preview"
                                src="uploads/<?= htmlspecialchars($nama_simpan); ?>"
                                alt="Preview"
                            >

                        <?php } else { ?>

                            <div class="file-icon">
                                📄
                            </div>

                        <?php } ?>

                    </td>

                    <td>
                        <?= htmlspecialchars($row['judul']); ?>
                    </td>

                    <td>
                        <?= $row['tanggal_upload']; ?>
                    </td>

                    <td>

                        <a
                            class="download"
                            href="download.php?id=<?= $row['id']; ?>"
                        >
                            Download
                        </a>

                        <a
                            class="edit"
                            href="edit_file.php?id=<?= $row['id']; ?>"
                        >
                            Edit
                        </a>

                        <a
                            class="hapus"
                            href="hapus_file.php?id=<?= $row['id']; ?>"
                            onclick="return confirm('Yakin ingin menghapus file ini?')"
                        >
                            Hapus
                        </a>

                    </td>

                </tr>

                <?php } ?>

            </table>

        </div>

    </div>

    <div class="footer">
        ♡ Semangat terus! ♡
    </div>

</div>

</body>
</html>
