<?php
require 'path_to_class/Pembelian.php'; // Sesuaikan dengan path class Pembelian

// Contoh inisialisasi PDO dan class Pembelian
$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');
$pembelian = new Pembelian($pdo);

// Create
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_pembelian'])) {
    $pembelian->addPembelian($_POST['jumlah'], $_POST['harga'], $_POST['id_pengguna'], $_POST['id_barang'], $_POST['tanggal']);
}

// Read
$allPembelian = $pdo->query("SELECT * FROM Pembelian")->fetchAll(PDO::FETCH_ASSOC);

// Update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_pembelian'])) {
    $pembelian->updatePembelian($_POST['id_pembelian'], $_POST['jumlah'], $_POST['harga'], $_POST['id_pengguna'], $_POST['id_barang'], $_POST['tanggal']);
}

// Delete
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_pembelian'])) {
    $pembelian->deletePembelian($_POST['id_pembelian']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Pembelian</title>
</head>
<body>
    <h1>CRUD Pembelian</h1>

    <h2>Create Pembelian</h2>
    <form method="POST" action="">
        <input type="number" name="jumlah" placeholder="Jumlah">
        <input type="number" name="harga" placeholder="Harga">
        <input type="number" name="id_pengguna" placeholder="ID Pengguna">
        <input type="number" name="id_barang" placeholder="ID Barang">
        <input type="date" name="tanggal" placeholder="Tanggal">
        <button type="submit" name="add_pembelian">Add Pembelian</button>
    </form>

    <h2>Read Pembelian</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>ID Pengguna</th>
            <th>ID Barang</th>
            <th>Tanggal</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($allPembelian as $pembelian) { ?>
        <tr>
            <td><?php echo $pembelian['id_pembelian']; ?></td>
            <td><?php echo $pembelian['jumlah_pembelian']; ?></td>
            <td><?php echo $pembelian['harga_beli']; ?></td>
            <td><?php echo $pembelian['id_pengguna']; ?></td>
            <td><?php echo $pembelian['id_barang']; ?></td>
            <td><?php echo $pembelian['tanggal_pembelian']; ?></td>
            <td>
                <form method="POST" action="" style="display:inline-block;">
                    <input type="hidden" name="id_pembelian" value="<?php echo $pembelian['id_pembelian']; ?>">
                    <button type="submit" name="delete_pembelian">Delete</button>
                </form>
                <form method="POST" action="" style="display:inline-block;">
                    <input type="hidden" name="id_pembelian" value="<?php echo $pembelian['id_pembelian']; ?>">
                    <input type="number" name="jumlah" placeholder="Jumlah" value="<?php echo $pembelian['jumlah_pembelian']; ?>">
                    <input type="number" name="harga" placeholder="Harga" value="<?php echo $pembelian['harga_beli']; ?>">
                    <input type="number" name="id_pengguna" placeholder="ID Pengguna" value="<?php echo $pembelian['id_pengguna']; ?>">
                    <input type="number" name="id_barang" placeholder="ID Barang" value="<?php echo $pembelian['id_barang']; ?>">
                    <input type="date" name="tanggal" placeholder="Tanggal" value="<?php echo $pembelian['tanggal_pembelian']; ?>">
                    <button type="submit" name="update_pembelian">Update</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>