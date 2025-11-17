<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($koneksi,
        "UPDATE peminjaman SET status_pengembalian='Dikembalikan'
         WHERE id_peminjaman=$id"
    );
}

header("Location: index.php");
exit;
?>