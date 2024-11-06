<?php
require '../models/supplier.php'; // Sesuaikan dengan path class Supplier

// Contoh inisialisasi PDO dan class Supplier
$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');
$supplier = new Supplier($pdo);

// Create
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_supplier'])) {
    $supplier->addSupplier($_POST['nama'], $_POST['alamat'], $_POST['telepon'], $_POST['email']);
}

// Read
$allSuppliers = $pdo->query("SELECT * FROM Supplier")->fetchAll(PDO::FETCH_ASSOC);

// Update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_supplier'])) {
    $supplier->updateSupplier($_POST['id_supplier'], $_POST['nama'], $_POST['alamat'], $_POST['telepon'], $_POST['email']);
}

// Delete
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_supplier'])) {
    $supplier->deleteSupplier($_POST['id_supplier']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Supplier</title>
</head>
<body>
    <h1>CRUD Supplier</h1>

    <h2>Create Supplier</h2>
    <form method="POST" action="">
        <input type="text" name="nama" placeholder="Nama Supplier">
        <input type="text" name="alamat" placeholder="Alamat">
        <input type="tel" name="telepon" placeholder="Telepon">
        <input type="email" name="email" placeholder="Email">
        <button type="submit" name="add_supplier">Add Supplier</button>
    </form>

    <h2>Read Supplier</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($allSuppliers as $supplier) { ?>
        <tr>
            <td><?php echo $supplier['SupplierID']; ?></td>
            <td><?php echo $supplier['NamaSupplier']; ?></td>
            <td><?php echo $supplier['Alamat']; ?></td>
            <td><?php echo $supplier['Telepon']; ?></td>
            <td><?php echo $supplier['Email']; ?></td>
            <td>
                <form method="POST" action="" style="display:inline-block;">
                    <input type="hidden" name="id_supplier" value="<?php echo $supplier['SupplierID']; ?>">
                    <button type="submit" name="delete_supplier">Delete</button>
                </form>
                <form method="POST" action="" style="display:inline-block;">
                    <input type="hidden" name="id_supplier" value="<?php echo $supplier['SupplierID']; ?>">
                    <input type="text" name="nama" placeholder="Nama Supplier" value="<?php echo $supplier['NamaSupplier']; ?>">
                    <input type="text" name="alamat" placeholder="Alamat" value="<?php echo $supplier['Alamat']; ?>">
                    <input type="tel" name="telepon" placeholder="Telepon" value="<?php echo $supplier['Telepon']; ?>">
                    <input type="email" name="email" placeholder="Email" value="<?php echo $supplier['Email']; ?>">
                    <button type="submit" name="update_supplier">Update</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
