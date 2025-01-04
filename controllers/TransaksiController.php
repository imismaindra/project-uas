<?php
require_once 'models/transaksi_model.php';

class TransaksiController {
    public function list() {
        $transaksiModel = new TransaksiModel();
        $transactions = $transaksiModel->getAllTransaksi();
        include 'views/transaksi_list.php';
    }

    public function detail() {
        $transaksiModel = new TransaksiModel();
        $id = $_GET['id'] ?? null;

        if ($id) {
            $transaction = $transaksiModel->getTransaksiById($id);
            include 'views/transaksi_detail.php';
        } else {
            echo "ID transaksi tidak ditemukan.";
        }
    }

    public function add() {
        $transaksiModel = new TransaksiModel();
        $transaksiModel->insertTransaksi($_POST);
        header('Location: index.php?modul=transaksi&fitur=list');
    }
}
