<?php

class PembelianController {
    private $pembelianModel;

    public function __construct($pembelianModel) {
        $this->pembelianModel = $pembelianModel;
    }

    public function createPembelian($jumlah, $harga, $idPengguna, $idBarang, $tanggal) {
        return $this->pembelianModel->addPembelian($jumlah, $harga, $idPengguna, $idBarang, $tanggal);
    }

    public function getPembelian($id) {
        return $this->pembelianModel->getPembelianById($id);
    }

    public function updatePembelian($id, $jumlah, $harga, $idPengguna, $idBarang, $tanggal) {
        return $this->pembelianModel->updatePembelian($id, $jumlah, $harga, $idPengguna, $idBarang, $tanggal);
    }

    public function deletePembelian($id) {
        return $this->pembelianModel->deletePembelian($id);
    }

    public function getTotalPurchasesPerUser($idPengguna) {
        return $this->pembelianModel->getTotalPurchasesPerUser($idPengguna);
    }

    public function getPurchasesByDate($date) {
        return $this->pembelianModel->getPurchasesByDate($date);
    }

    public function getTopPurchasedProducts($limit = 5) {
        return $this->pembelianModel->getTopPurchasedProducts($limit);
    }
}
?>
