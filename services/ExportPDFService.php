<?php

require_once __DIR__ . '/../vendor/autoload.php'; 
require_once 'models/product_model.php';

use Dompdf\Dompdf;

class ExportPDFService
{
    private $conn;
    private $productModel;
    public function __construct($connection) {
        $this->conn = $connection;
        $this->productModel = new ProductModel($connection);
    }
    public function export(array $transactions, string $filter): void
    {
        $productModel = $this->productModel;
        $dompdf = new Dompdf();

        // Buat konten HTML untuk PDF
        $html = $this->generateHTMLContent($transactions, $filter, $productModel);

        // Load konten HTML ke Dompdf
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Output PDF ke browser
        $dompdf->stream('laporan_transaksi.pdf', ['Attachment' => true]);
    }

      private function generateHTMLContent(array $transactions, string $filter, ProductModel $productModel): string
    {
        $totalHargaSemua = 0; 

        $html = '
            <h1 style="text-align: center;">Laporan Transaksi</h1>
            <p>Filter: ' . htmlspecialchars($filter) . '</p>
            <table border="1" width="100%" cellspacing="0" cellpadding="5">
                <thead>
                    <tr style="background-color: #f2f2f2; text-align: left;">
                        <th>ID</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($transactions as $transaction) {
            $product = $productModel->getProductById($transaction['product_id']);
            $totalHargaSemua += $transaction['total_price']; // Menambahkan total harga transaksi ke total keseluruhan

            $html .= '
                <tr>
                    <td>' . htmlspecialchars($transaction['id']) . '</td>
                    <td>' . htmlspecialchars($product['name']) . '</td>
                    <td>' . htmlspecialchars($transaction['amount']) . '</td>
                    <td>' . number_format($transaction['total_price'], 2, ',', '.') . '</td>
                    <td>' . ($transaction['status'] == 1 ? 'Paid' : 'Unpaid') . '</td>
                </tr>';
        }

        $html .= '
                <tr style="font-weight: bold;">
                    <td colspan="3" style="text-align: right;">Total Harga Semua Transaksi:</td>
                    <td colspan="2">' . number_format($totalHargaSemua, 2, ',', '.') . '</td>
                </tr>';

        $html .= '
                </tbody>
            </table>';

        return $html;
    }
}
