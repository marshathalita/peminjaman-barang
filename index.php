<?php
include 'config.php';

// Filter status
$filter = "";
if (isset($_GET['status']) && $_GET['status'] != "semua") {
    $filter = "WHERE p.status_pengembalian='" . $_GET['status'] . "'";
}

$query = mysqli_query($koneksi,
"SELECT pm.id_peminjaman, b.nama_barang, pj.nama, pj.kelas,
pm.tanggal_pinjam, pm.tanggal_kembali, pm.status_pengembalian
FROM peminjaman pm
JOIN barang b ON pm.id_barang = b.id_barang
JOIN peminjam pj ON pm.id_peminjam = pj.id_peminjam
$filter
ORDER BY pm.tanggal_pinjam DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Peminjaman</title>
</head>
<body>

<h2>📋 Daftar Peminjaman Barang</h2>
<a href="pinjam.php">+ Tambah Peminjaman</a> | 
<a href="riwayat.php">Riwayat</a>
<br><br>

<form method="get">
    <label>Filter Status:</label>
    <select name="status" onchange="this.form.submit()">
        <option value="semua">Semua</option>
        <option value="Dipinjam">Belum Dikembalikan</option>
        <option value="Dikembalikan">Sudah Dikembalikan</option>
    </select>
</form>

<table border="1" cellpadding="6">
    <tr>
        <th>ID</th>
        <th>Peminjam</th>
        <th>Kelas</th>
        <th>Barang</th>
        <th>Tgl Pinjam</th>
        <th>Tgl Kembali</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
    <tr>
        <td><?= $row['id_peminjaman'] ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['kelas'] ?></td>
        <td><?= $row['nama_barang'] ?></td>
        <td><?= $row['tanggal_pinjam'] ?></td>
        <td><?= $row['tanggal_kembali'] ?></td>
        <td><?= $row['status_pengembalian'] ?></td>
        <td>
            <?php if ($row['status_pengembalian'] == 'Dipinjam') { ?>
                <a href="kembalikan.php?id=<?= $row['id_peminjaman'] ?>">Kembalikan</a>
            <?php } else { echo "-"; } ?>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>