<?php
require_once 'models/transaksi_model.php';

function handleTransaksi() {
    $transaksiModel = new TransaksiModel();
    $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;

    switch ($fitur) {
        case 'list':
            $transaksi = $transaksiModel->getAllTransaksi();
            include 'views/transaksi_list.php';
            break;
        case 'detail':
            $id = $_GET['id'] ?? null;
            $detail = $transaksiModel->getTransaksiById($id);
            include 'views/transaksi_detail.php';
            break;
        default:
            echo "Fitur Transaksi tidak valid.";
            break;
    }
}
