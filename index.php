<?php
include 'config.php';

// Filter barang belum dikembalikan
$filter = "";
if (isset($_GET['status']) && $_GET['status'] != "semua") {
    $filter = "WHERE status='" . $_GET['status'] . "'";
}

$query = mysqli_query($koneksi, "SELECT * FROM peminjaman $filter ORDER BY tanggal_pinjam DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Peminjaman Barang</title>
</head>
<body>
    <h2>📋 Daftar Peminjaman Barang Sekolah</h2>
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
            <th>Nama Peminjam</th>
            <th>Barang</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
        <?php
        $hari_ini = date('Y-m-d');
        $style = "";
        if ($row['status'] == 'Dipinjam' && $row['tanggal_kembali'] < $hari_ini) {
            $style = "style='background-color: #ffcccc;'";
        }
        ?>
        <tr <?= $style ?>>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama_peminjam'] ?></td>
            <td><?= $row['nama_barang'] ?></td>
            <td><?= $row['tanggal_pinjam'] ?></td>
            <td><?= $row['tanggal_kembali'] ?></td>
            <td><?= $row['status'] ?></td>
            <td>
                <?php if ($row['status'] == 'Dipinjam') { ?>
                    <a href="kembalikan.php?id=<?= $row['id'] ?>">Kembalikan</a>
                <?php } else { echo "-"; } ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>