<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($koneksi, "UPDATE peminjaman SET status='Dikembalikan' WHERE id=$id");
}

header("Location: index.php");
exit;
?>