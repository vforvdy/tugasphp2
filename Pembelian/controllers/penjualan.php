<?php

class PenjualanController {
    private $penjualanModel;

    public function __construct($penjualanModel) {
        $this->penjualanModel = $penjualanModel;
    }

    public function createPenjualan($jumlah, $harga, $idPengguna, $idBarang, $tanggal) {
        return $this->penjualanModel->addPenjualan($jumlah, $harga, $idPengguna, $idBarang, $tanggal);
    }

    public function getPenjualan($id) {
        return $this->penjualanModel->getPenjualanById($id);
    }

    public function updatePenjualan($id, $jumlah, $harga, $idPengguna, $idBarang, $tanggal) {
        return $this->penjualanModel->updatePenjualan($id, $jumlah, $harga, $idPengguna, $idBarang, $tanggal);
    }

    public function deletePenjualan($id) {
        return $this->penjualanModel->deletePenjualan($id);
    }

    public function getTotalSalesPerUser($idPengguna) {
        return $this->penjualanModel->getTotalSalesPerUser($idPengguna);
    }

    public function getSalesTrend() {
        return $this->penjualanModel->getSalesTrend();
    }

    public function getTopSellingProducts($limit = 5) {
        return $this->penjualanModel->getTopSellingProducts($limit);
    }
}
?>