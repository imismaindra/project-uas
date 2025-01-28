<?php

require_once 'models/transaksi_model.php';
require_once 'models/product_model.php';
require_once 'services/ExportPDFService.php';
require_once 'BaseController.php';

class TransaksiController extends BaseController{
    private $productModel;
    private $categoryModel;

    public function __construct() {
        parent::__construct();
        $this->productModel = new ProductModel($this->conn);
        $this->categoryModel = new CategoryModel();
    }
    public function list() {
    
        $transaksiModel = new TransaksiModel();
        $transaksis = $transaksiModel->getAllTransaksi();
        include './views/transaction/transaction_list.php';
    }

    public function add() {
        $memberId = isset($_SESSION['user']['id']) && $_SESSION['user']['id']  !== NULL ? $_SESSION['user']['id'] : NULL;
                $akungame_id = isset($_POST['akungame_id']) ? $_POST['akungame_id'] : NULL;
                $bank_id = isset($_POST['bank_id']) ? $_POST['bank_id'] : NULL;


                $total_price = $_POST['totalAmount'];
                $productId = $_POST['product_id'];
                $pembayaran = $_POST['pembayaran'];
                $accountId = $_POST['id'];
                $qty = $_POST['amount'];
                $email = $_POST['email'];
                $transaksiModel = new TransaksiModel();
                $invoiceId = $transaksiModel->insertTransaksi($memberId, $email, $productId, $qty, $total_price, $pembayaran,$akungame_id,$bank_id, 0);   
                if ($invoiceId) {
                    header("Location: /transaksi/checkinvoice/$invoiceId");
                    exit();
                } else {
                    echo "Error: " . $invoiceId;
                }
    }

    public function get_detail($id) {
        $transaksiModel = new TransaksiModel();
        // if (isset($_GET['id'])) {
            // $id = intval($_GET['id']);
            $transaksi = $transaksiModel->getTransaksiById($id);
            if ($transaksi) {
                echo json_encode($transaksi[0]); // Kirim data transaksi sebagai JSON
            } else {
                echo json_encode(['error' => 'Transaksi tidak ditemukan']);
            }
        // } else {
        //     echo json_encode(['error' => 'ID tidak valid']);
        // }
    }

    public function forminvoice() {
        include 'views/store/transactions.php';
    }

    public function checkinvoice($invoiceId) {
        $productModel = $this->productModel;
        $userModel = new Users();
        $transaksiModel = new TransaksiModel();
         $categoryModel = $this->categoryModel;
        $transaksibyInvoices = $transaksiModel->getTransaksiByInvoice($invoiceId);
        if ($transaksibyInvoices) {
            include 'views/store/transactions.php';
        } else {
            include 'views/store/transactions.php';
          
        }
    }

    public function exportPDF() {
        require_once 'services/ExportPDFService.php';
        $status = $_GET['status'] ?$_GET['status']: '';
        $status = (int) $status;
        $timeframe = $_GET['timeframe'] ?? '';
        $exportPDFService = new ExportPDFService($this->conn);
         $productModel =  $this->productModel;
        $transaksiModel = new TransaksiModel();
        $transaksis = $transaksiModel->getAllTransaksi();
        $filter = isset($timeframe) ? $timeframe : '';
        $transactions = $transaksiModel->getFilteredTransactions($filter,$status);
        $exportPDFService->export($transactions, $filter);
    }
}
