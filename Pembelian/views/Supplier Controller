<?php

class SupplierController {
    private $supplierModel;

    public function __construct($supplierModel) {
        $this->supplierModel = $supplierModel;
    }

    public function createSupplier($nama, $alamat, $telepon, $email) {
        return $this->supplierModel->addSupplier($nama, $alamat, $telepon, $email);
    }

    public function getSupplier($id) {
        return $this->supplierModel->getSupplierById($id);
    }

    public function updateSupplier($id, $nama, $alamat, $telepon, $email) {
        return $this->supplierModel->updateSupplier($id, $nama, $alamat, $telepon, $email);
    }

    public function deleteSupplier($id) {
        return $this->supplierModel->deleteSupplier($id);
    }
}
?>