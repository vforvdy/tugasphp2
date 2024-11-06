<?php

class PelangganController {
    private $pelangganModel;

    public function __construct($pelangganModel) {
        $this->pelangganModel = $pelangganModel;
    }

    public function createPelanggan($nama, $alamat, $telepon, $email) {
        return $this->pelangganModel->addPelanggan($nama, $alamat, $telepon, $email);
    }

    public function getPelanggan($id) {
        return $this->pelangganModel->getPelangganById($id);
    }

    public function updatePelanggan($id, $nama, $alamat, $telepon, $email) {
        return $this->pelangganModel->updatePelanggan($id, $nama, $alamat, $telepon, $email);
    }

    public function deletePelanggan($id) {
        return $this->pelangganModel->deletePelanggan($id);
    }
}
?>
