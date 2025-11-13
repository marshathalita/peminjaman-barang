<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_peminjam'];
    $barang = $_POST['nama_barang'];
    $tgl_pinjam = $_POST['tanggal_pinjam'];
    $tgl_kembali = $_POST['tanggal_kembali'];

    mysqli_query($koneksi, "INSERT INTO peminjaman (nama_peminjam, nama_barang, tanggal_pinjam, tanggal_kembali, status) 
    VALUES ('$nama', '$barang', '$tgl_pinjam', '$tgl_kembali', 'Dipinjam')");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Peminjaman</title>
</head>
<body>
    <h2>Tambah Data Peminjaman</h2>
    <form method="POST">
        <label>Nama Peminjam:</label><br>
        <input type="text" name="nama_peminjam" required><br><br>

        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" required><br><br>

        <label>Tanggal Pinjam:</label><br>
        <input type="date" name="tanggal_pinjam" required><br><br>

        <label>Tanggal Kembali:</label><br>
        <input type="date" name="tanggal_kembali" required><br><br>

        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>