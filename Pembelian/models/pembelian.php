<?php
class Pembelian {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Menambahkan data pembelian baru
    public function addPembelian($jumlah, $harga, $idPengguna, $idBarang, $tanggal) {
        $sql = "INSERT INTO pembelian (jumlah_pembelian, harga_beli, id_pengguna, id_barang, tanggal_pembelian) VALUES (:jumlah, :harga, :idPengguna, :idBarang, :tanggal)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'jumlah' => $jumlah,
            'harga' => $harga,
            'idPengguna' => $idPengguna,
            'idBarang' => $idBarang,
            'tanggal' => $tanggal
        ]);
    }

    // Mengambil data pembelian berdasarkan ID
    public function getPembelianById($id) {
        $sql = "SELECT * FROM pembelian WHERE id_pembelian = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Memperbarui data pembelian
    public function updatePembelian($id, $jumlah, $harga, $idPengguna, $idBarang, $tanggal) {
        $sql = "UPDATE pembelian SET jumlah_pembelian = :jumlah, harga_beli = :harga, id_pengguna = :idPengguna, id_barang = :idBarang, tanggal_pembelian = :tanggal WHERE id_pembelian = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'jumlah' => $jumlah,
            'harga' => $harga,
            'idPengguna' => $idPengguna,
            'idBarang' => $idBarang,
            'tanggal' => $tanggal,
            'id' => $id
        ]);
    }

    // Menghapus data pembelian
    public function deletePembelian($id) {
        $sql = "DELETE FROM pembelian WHERE id_pembelian = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    // Mengambil semua data pembelian
    public function getAllPembelian() {
        $sql = "SELECT * FROM pembelian";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
}
?>