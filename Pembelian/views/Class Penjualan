<?php
class Penjualan {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Menambahkan data penjualan baru
    public function addPenjualan($jumlah, $harga, $idPengguna, $idBarang, $tanggal) {
        $sql = "INSERT INTO Penjualan (jumlah_penjualan, harga_jual, id_pengguna, id_barang, tanggal_penjualan) 
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

    // Mengambil data penjualan berdasarkan ID
    public function getPenjualanById($id) {
        $sql = "SELECT * FROM Penjualan WHERE id_penjualan = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Memperbarui data penjualan yang ada
    public function updatePenjualan($id, $jumlah, $harga, $idPengguna, $idBarang, $tanggal) {
        $sql = "UPDATE Penjualan SET jumlah_penjualan = :jumlah, harga_jual = :harga, id_pengguna = :idPengguna, 
                id_barang = :idBarang, tanggal_penjualan = :tanggal WHERE id_penjualan = :id";
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

    // Menghapus data penjualan berdasarkan ID
    public function deletePenjualan($id) {
        $sql = "DELETE FROM Penjualan WHERE id_penjualan = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    // Mendapatkan total penjualan per pengguna
    public function getTotalSalesPerUser($idPengguna) {
        $sql = "SELECT COUNT(*) as jumlah_transaksi, SUM(jumlah_penjualan) as total_barang, 
                SUM(jumlah_penjualan * harga_jual) as total_penjualan 
                FROM penjualan WHERE id_pengguna = :idPengguna";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['idPengguna' => $idPengguna]);
        return $stmt->fetch();
    }

    // Mendapatkan tren penjualan harian
    public function getSalesTrend() {
        $sql = "SELECT tanggal_penjualan, COUNT(*) as jumlah_transaksi, 
                SUM(jumlah_penjualan * harga_jual) as total_penjualan 
                FROM penjualan GROUP BY tanggal_penjualan ORDER BY tanggal_penjualan";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    // Mendapatkan produk yang paling laris
    public function getTopSellingProducts($limit = 5) {
        $sql = "SELECT id_barang, SUM(jumlah_penjualan) as total_penjualan 
                FROM penjualan GROUP BY id_barang ORDER BY total_penjualan DESC LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
