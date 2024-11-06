<?php
require '../config/config.php';
require '../models/Pembelian.php';

$pembelian = new Pembelian($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $pembelian->addPembelian($_POST['jumlah'], $_POST['harga'], $_POST['id_pengguna'], $_POST['id_barang'], $_POST['tanggal']);
    } elseif (isset($_POST['update'])) {
        $pembelian->updatePembelian($_POST['id'], $_POST['jumlah'], $_POST['harga'], $_POST['id_pengguna'], $_POST['id_barang'], $_POST['tanggal']);
    } elseif (isset($_POST['delete'])) {
        $pembelian->deletePembelian($_POST['id']);
    }
}

$allPembelian = $pembelian->getAllPembelian();
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Pembelian</title>
</head>
<body>
    <h2>Tambah Pembelian</h2>
    <form method="POST">
        <input type="number" name="jumlah" placeholder="Jumlah" required>
        <input type="number" name="harga" placeholder="Harga" required>
        <input type="number" name="id_pengguna" placeholder="ID Pengguna" required>
        <input type="number" name="id_barang" placeholder="ID Barang" required>
        <input type="date" name="tanggal" required>
        <button type="submit" name="add">Tambah</button>
    </form>

    <h2>Daftar Pembelian</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>ID Pengguna</th>
            <th>ID Barang</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($allPembelian as $p) : ?>
        <tr>
            <td><?= $p['id_pembelian']; ?></td>
            <td><?= $p['jumlah_pembelian']; ?></td>
            <td><?= $p['harga_beli']; ?></td>
            <td><?= $p['id_pengguna']; ?></td>
            <td><?= $p['id_barang']; ?></td>
            <td><?= $p['tanggal_pembelian']; ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $p['id_pembelian']; ?>">
                    <button type="submit" name="delete">Hapus</button>
                </form>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $p['id_pembelian']; ?>">
                    <input type="number" name="jumlah" value="<?= $p['jumlah_pembelian']; ?>">
                    <input type="number" name="harga" value="<?= $p['harga_beli']; ?>">
                    <input type="number" name="id_pengguna" value="<?= $p['id_pengguna']; ?>">
                    <input type="number" name="id_barang" value="<?= $p['id_barang']; ?>">
                    <input type="date" name="tanggal" value="<?= $p['tanggal_pembelian']; ?>">
                    <button type="submit" name="update">Update</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>