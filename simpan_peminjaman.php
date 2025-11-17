<?php
include 'config.php';

$id_peminjam = $_POST['id_peminjam'];
$id_barang = $_POST['id_barang'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];

$query = "INSERT INTO peminjaman (id_barang, id_peminjam, tanggal_pinjam, tanggal_kembali, status_pengembalian)
          VALUES ('$id_barang', '$id_peminjam', '$tanggal_pinjam', '$tanggal_kembali', 'Dipinjam')";

if (mysqli_query($koneksi, $query)) {
    header("Location: index.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>