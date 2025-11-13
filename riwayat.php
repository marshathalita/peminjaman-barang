<?php
include 'config.php';
$result = mysqli_query($koneksi, "SELECT * FROM peminjaman ORDER BY tanggal_pinjam DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Peminjaman</title>
</head>
<body>
    <h2>Riwayat Peminjaman Barang</h2>
    <a href="index.php">← Kembali</a>
    <table border="1" cellpadding="6">
        <tr>
            <th>ID</th>
            <th>Nama Peminjam</th>
            <th>Barang</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama_peminjam'] ?></td>
            <td><?= $row['nama_barang'] ?></td>
            <td><?= $row['tanggal_pinjam'] ?></td>
            <td><?= $row['tanggal_kembali'] ?></td>
            <td><?= $row['status'] ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>