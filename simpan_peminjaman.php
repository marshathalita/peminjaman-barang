<?php
include 'config.php';

$nama_peminjam = $_POST['nama_peminjam'];
$nama_barang = $_POST['nama_barang'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];

$query = "INSERT INTO peminjaman (nama_peminjam, nama_barang, tanggal_pinjam, tanggal_kembali, status)
          VALUES ('$nama_peminjam', '$nama_barang', '$tanggal_pinjam', '$tanggal_kembali', 'Dipinjam')";

if (mysqli_query($koneksi, $query)) {
    header("Location: index.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>