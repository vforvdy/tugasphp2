<?php
require 'path_to_class/Penjualan.php'; // Sesuaikan dengan path class Penjualan

// Contoh inisialisasi PDO dan class Penjualan
$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');
$penjualan = new Penjualan($pdo);

// Create
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_penjualan'])) {
    $penjualan->addPenjualan($_POST['jumlah'], $_POST['harga'], $_POST['id_pengguna'], $_POST['id_barang'], $_POST['tanggal']);
}

// Read
$allPenjualan = $pdo->query("SELECT * FROM Penjualan")->fetchAll(PDO::FETCH_ASSOC);

// Update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_penjualan'])) {
    $penjualan->updatePenjualan($_POST['id_penjualan'], $_POST['jumlah'], $_POST['harga'], $_POST['id_pengguna'], $_POST['id_barang'], $_POST['tanggal']);
}

// Delete
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_penjualan'])) {
    $penjualan->deletePenjualan($_POST['id_penjualan']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Penjualan</title>
</head>
<body>
    <h1>CRUD Penjualan</h1>

    <h2>Create Penjualan</h2>
    <form method="POST" action="">
        <input type="number" name="jumlah" placeholder="Jumlah">
        <input type="number" name="harga" placeholder="Harga">
        <input type="number" name="id_pengguna" placeholder="ID Pengguna">
        <input type="number" name="id_barang" placeholder="ID Barang">
        <input type="date" name="tanggal" placeholder="Tanggal">
        <button type="submit" name="add_penjualan">Add Penjualan</button>
    </form>

    <h2>Read Penjualan</h2>
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
        <?php foreach ($allPenjualan as $penjualan) { ?>
        <tr>
            <td><?php echo $penjualan['id_penjualan']; ?></td>
            <td><?php echo $penjualan['jumlah_penjualan']; ?></td>
            <td><?php echo $penjualan['harga_jual']; ?></td>
            <td><?php echo $penjualan['id_pengguna']; ?></td>
            <td><?php echo $penjualan['id_barang']; ?></td>
            <td><?php echo $penjualan['tanggal_penjualan']; ?></td>
            <td>
                <form method="POST" action="" style="display:inline-block;">
                    <input type="hidden" name="id_penjualan" value="<?php echo $penjualan['id_penjualan']; ?>">
                    <button type="submit" name="delete_penjualan">Delete</button>
                </form>
                <form method="POST" action="" style="display:inline-block;">
                    <input type="hidden" name="id_penjualan" value="<?php echo $penjualan['id_penjualan']; ?>">
                    <input type="number" name="jumlah" placeholder="Jumlah" value="<?php echo $penjualan['jumlah_penjualan']; ?>">
                    <input type="number" name="harga" placeholder="Harga" value="<?php echo $penjualan['harga_jual']; ?>">
                    <input type="number" name="id_pengguna" placeholder="ID Pengguna" value="<?php echo $penjualan['id_pengguna']; ?>">
                    <input type="number" name="id_barang" placeholder="ID Barang" value="<?php echo $penjualan['id_barang']; ?>">
                    <input type="date" name="tanggal" placeholder="Tanggal" value="<?php echo $penjualan['tanggal_penjualan']; ?>">
                    <button type="submit" name="update_penjualan">Update</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
