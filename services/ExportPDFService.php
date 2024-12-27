<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Jika menggunakan library seperti Dompdf
require_once 'models/product_model.php';

use Dompdf\Dompdf;

class ExportPDFService
{
    /**
     * Mengekspor laporan transaksi ke PDF.
     *
     * @param array $transactions Daftar transaksi.
     * @param string $filter Filter laporan.
     * @return void
     */
    public function export(array $transactions, string $filter): void
    {
        // Inisialisasi model produk dan Dompdf
        $productModel = new ProductModel();
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

    /**
     * Membuat konten HTML untuk PDF.
     *
     * @param array $transactions Daftar transaksi.
     * @param string $filter Filter laporan.
     * @param ProductModel $productModel Model untuk mendapatkan data produk.
     * @return string HTML yang telah di-generate.
     */
    private function generateHTMLContent(array $transactions, string $filter, ProductModel $productModel): string
    {
        $totalHargaSemua = 0; // Variabel untuk menghitung total harga semua transaksi

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

        // Tambahkan baris untuk total harga semua transaksi
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
