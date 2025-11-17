<?php
include 'config.php';

$result = mysqli_query($koneksi,
"SELECT pm.id_peminjaman, b.nama_barang, pj.nama, pj.kelas,
pm.tanggal_pinjam, pm.tanggal_kembali, pm.status_pengembalian
FROM peminjaman pm
JOIN barang b ON pm.id_barang = b.id_barang
JOIN peminjam pj ON pm.id_peminjam = pj.id_peminjam
ORDER BY pm.tanggal_pinjam DESC");
?>

<!DOCTYPE html>
<html>
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
    <th>Peminjam</th>
    <th>Kelas</th>
    <th>Barang</th>
    <th>Tgl Pinjam</th>
    <th>Tgl Kembali</th>
    <th>Status</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['id_peminjaman'] ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['kelas'] ?></td>
    <td><?= $row['nama_barang'] ?></td>
    <td><?= $row['tanggal_pinjam'] ?></td>
    <td><?= $row['tanggal_kembali'] ?></td>
    <td><?= $row['status_pengembalian'] ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>