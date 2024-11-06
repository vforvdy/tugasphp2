<?php
require 'path_to_class/Pelanggan.php'; // Sesuaikan dengan path class Pelanggan

// Contoh inisialisasi PDO dan class Pelanggan
$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');
$pelanggan = new Pelanggan($pdo);

// Create
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_pelanggan'])) {
    $pelanggan->addPelanggan($_POST['nama'], $_POST['alamat'], $_POST['telepon'], $_POST['email']);
}

// Read
$allPelanggan = $pdo->query("SELECT * FROM Pelanggan")->fetchAll(PDO::FETCH_ASSOC);

// Update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_pelanggan'])) {
    $pelanggan->updatePelanggan($_POST['id_pelanggan'], $_POST['nama'], $_POST['alamat'], $_POST['telepon'], $_POST['email']);
}

// Delete
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_pelanggan'])) {
    $pelanggan->deletePelanggan($_POST['id_pelanggan']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Pelanggan</title>
</head>
<body>
    <h1>CRUD Pelanggan</h1>

    <h2>Create Pelanggan</h2>
    <form method="POST" action="">
        <input type="text" name="nama" placeholder="Nama Pelanggan">
        <input type="text" name="alamat" placeholder="Alamat">
        <input type="tel" name="telepon" placeholder="Telepon">
        <input type="email" name="email" placeholder="Email">
        <button type="submit" name="add_pelanggan">Add Pelanggan</button>
    </form>

    <h2>Read Pelanggan</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($allPelanggan as $pelanggan) { ?>
        <tr>
            <td><?php echo $pelanggan['PelangganID']; ?></td>
            <td><?php echo $pelanggan['NamaPelanggan']; ?></td>
            <td><?php echo $pelanggan['Alamat']; ?></td>
            <td><?php echo $pelanggan['Telepon']; ?></td>
            <td><?php echo $pelanggan['Email']; ?></td>
            <td>
                <form method="POST" action="" style="display:inline-block;">
                    <input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan['PelangganID']; ?>">
                    <button type="submit" name="delete_pelanggan">Delete</button>
                </form>
                <form method="POST" action="" style="display:inline-block;">
                    <input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan['PelangganID']; ?>">
                    <input type="text" name="nama" placeholder="Nama Pelanggan" value="<?php echo $pelanggan['NamaPelanggan']; ?>">
                    <input type="text" name="alamat" placeholder="Alamat" value="<?php echo $pelanggan['Alamat']; ?>">
                    <input type="tel" name="telepon" placeholder="Telepon" value="<?php echo $pelanggan['Telepon']; ?>">
                    <input type="email" name="email" placeholder="Email" value="<?php echo $pelanggan['Email']; ?>">
                    <button type="submit" name="update_pelanggan">Update</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
