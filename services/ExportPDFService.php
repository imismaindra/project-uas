<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Jika menggunakan library seperti Dompdf
require_once 'models/product_model.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

use Dompdf\Dompdf;

class ExportPDFService

{
    // Dapatkan parameter dari URL
    
    public function export($transactions, $filter)
    {
        $productModel = new ProductModel();
        $dompdf = new Dompdf();

        // Buat konten PDF
        $html = '
        <h1>Laporan Transaksi</h1>
        <p>Filter: ' . htmlspecialchars($filter) . '</p>
        <table border="1" width="100%" cellspacing="0" cellpadding="5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>';
        //     echo '<pre>';
        // var_dump($transactions);
        // echo '</pre>';
        foreach ($transactions as $tsk) {
            $product= $productModel->getProductById($tsk['product_id']);
            $html .= '
                <tr>
                    <td>' . htmlspecialchars($tsk['id']) . '</td>
                    <td>' . htmlspecialchars($product['name']) . '</td>
                    <td>' . htmlspecialchars($tsk['amount']) . '</td>
                    <td>' . htmlspecialchars($tsk['total_price']) . '</td>
                    <td>' . ($tsk['status'] == 1 ? 'Paid' : 'Unpaid') . '</td>
                </tr>';
        }

        $html .= '
            </tbody>
        </table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Output PDF ke browser
        $dompdf->stream('laporan_transaksi.pdf', ['Attachment' => true]);
    }
    
}

