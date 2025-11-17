<?php
include 'config.php';

$barang = mysqli_query($koneksi, "SELECT * FROM barang");
$peminjam = mysqli_query($koneksi, "SELECT * FROM peminjam");

if (isset($_POST['submit'])) {
    $id_barang = $_POST['id_barang'];
    $id_peminjam = $_POST['id_peminjam'];
    $tgl_pinjam = $_POST['tanggal_pinjam'];
    $tgl_kembali = $_POST['tanggal_kembali'];

    mysqli_query($koneksi,
        "INSERT INTO peminjaman (id_barang, id_peminjam, tanggal_pinjam, tanggal_kembali, status_pengembalian)
         VALUES ('$id_barang', '$id_peminjam', '$tgl_pinjam', '$tgl_kembali', 'Dipinjam')"
    );

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Peminjaman</title>
</head>
<body>

<h2>Tambah Data Peminjaman</h2>

<form method="POST">

    <label>Peminjam:</label><br>
    <select name="id_peminjam" required>
        <option value="">-- Pilih Peminjam --</option>
        <?php while ($p = mysqli_fetch_assoc($peminjam)) { ?>
            <option value="<?= $p['id_peminjam'] ?>">
                <?= $p['nama'] ?> (<?= $p['kelas'] ?>)
            </option>
        <?php } ?>
    </select><br><br>

    <label>Barang:</label><br>
    <select name="id_barang" required>
        <option value="">-- Pilih Barang --</option>
        <?php while ($b = mysqli_fetch_assoc($barang)) { ?>
            <option value="<?= $b['id_barang'] ?>">
                <?= $b['nama_barang'] ?> (<?= $b['jumlah'] ?> unit)
            </option>
        <?php } ?>
    </select><br><br>

    <label>Tanggal Pinjam:</label><br>
    <input type="date" name="tanggal_pinjam" required><br><br>

    <label>Tanggal Kembali:</label><br>
    <input type="date" name="tanggal_kembali" required><br><br>

    <button type="submit" name="submit">Simpan</button>
</form>

</body>
</html>