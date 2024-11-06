<?php
class Supplier {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Menambahkan data supplier baru
    public function addSupplier($nama, $alamat, $telepon, $email) {
        $sql = "INSERT INTO Supplier (NamaSupplier, Alamat, Telepon, Email) VALUES (:nama, :alamat, :telepon, :email)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'nama' => $nama, 
            'alamat' => $alamat, 
            'telepon' => $telepon, 
            'email' => $email
        ]);
    }

    // Mengambil data supplier berdasarkan ID
    public function getSupplierById($id) {
        $sql = "SELECT * FROM Supplier WHERE SupplierID = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Memperbarui data supplier yang ada
    public function updateSupplier($id, $nama, $alamat, $telepon, $email) {
        $sql = "UPDATE Supplier SET NamaSupplier = :nama, Alamat = :alamat, Telepon = :telepon, Email = :email 
                WHERE SupplierID = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'nama' => $nama, 
            'alamat' => $alamat, 
            'telepon' => $telepon, 
            'email' => $email, 
            'id' => $id
        ]);
    }

    // Menghapus data supplier berdasarkan ID
    public function deleteSupplier($id) {
        $sql = "DELETE FROM Supplier WHERE SupplierID = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
?>
