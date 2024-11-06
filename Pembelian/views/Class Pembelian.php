<?php
class Pembelian {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Menambahkan data pembelian baru
    public function addPembelian($jumlah, $harga, $idPengguna, $idBarang, $tanggal) {
        $sql = "INSERT INTO Pembelian (jumlah_pembelian, harga_beli, id_pengguna, id_barang, tanggal_pembelian) 
                VALUES (:jumlah, :harga, :idPengguna, :idBarang, :tanggal)";
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
        $sql = "SELECT * FROM Pembelian WHERE id_pembelian = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Memperbarui data pembelian yang ada
    public function updatePembelian($id, $jumlah, $harga, $idPengguna, $idBarang, $tanggal) {
        $sql = "UPDATE Pembelian SET jumlah_pembelian = :jumlah, harga_beli = :harga, id_pengguna = :idPengguna, 
                id_barang = :idBarang, tanggal_pembelian = :tanggal WHERE id_pembelian = :id";
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

    // Menghapus data pembelian berdasarkan ID
    public function deletePembelian($id) {
        $sql = "DELETE FROM Pembelian WHERE id_pembelian = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    // Mendapatkan total pembelian per pengguna
    public function getTotalPurchasesPerUser($idPengguna) {
        $sql = "SELECT COUNT(*) as jumlah_transaksi, SUM(jumlah_pembelian) as total_barang, 
                SUM(jumlah_pembelian * harga_beli) as total_pembelian 
                FROM pembelian WHERE id_pengguna = :idPengguna";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['idPengguna' => $idPengguna]);
        return $stmt->fetch();
    }

    // Mendapatkan pembelian berdasarkan tanggal
    public function getPurchasesByDate($date) {
        $sql = "SELECT tanggal_pembelian, COUNT(*) as jumlah_transaksi, SUM(jumlah_pembelian) as total_barang, 
                SUM(jumlah_pembelian * harga_beli) as total_pembelian 
                FROM pembelian WHERE tanggal_pembelian = :date GROUP BY tanggal_pembelian";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['date' => $date]);
        return $stmt->fetch();
    }

    // Mendapatkan produk yang paling banyak dibeli
    public function getTopPurchasedProducts($limit = 5) {
        $sql = "SELECT id_barang, SUM(jumlah_pembelian) as total_pembelian 
                FROM pembelian GROUP BY id_barang ORDER BY total_pembelian DESC LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
