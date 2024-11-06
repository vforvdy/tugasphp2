<?php
class Pelanggan {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Menambahkan data pelanggan baru
    public function addPelanggan($nama, $alamat, $telepon, $email) {
        $sql = "INSERT INTO Pelanggan (NamaPelanggan, Alamat, Telepon, Email) VALUES (:nama, :alamat, :telepon, :email)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'nama' => $nama, 
            'alamat' => $alamat, 
            'telepon' => $telepon, 
            'email' => $email
        ]);
    }

    // Mengambil data pelanggan berdasarkan ID
    public function getPelangganById($id) {
        $sql = "SELECT * FROM Pelanggan WHERE PelangganID = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Memperbarui data pelanggan yang ada
    public function updatePelanggan($id, $nama, $alamat, $telepon, $email) {
        $sql = "UPDATE Pelanggan SET NamaPelanggan = :nama, Alamat = :alamat, Telepon = :telepon, Email = :email 
                WHERE PelangganID = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'nama' => $nama, 
            'alamat' => $alamat, 
            'telepon' => $telepon, 
            'email' => $email, 
            'id' => $id
        ]);
    }

    // Menghapus data pelanggan berdasarkan ID
    public function deletePelanggan($id) {
        $sql = "DELETE FROM Pelanggan WHERE PelangganID = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
?>