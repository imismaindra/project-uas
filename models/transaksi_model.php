<?php
include 'config/connection.php';

class TransaksiModel {
    public $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }
    public function generateInvoiceNumber() {
        $prefix = "RSD";
        $randomNumber = random_int(10000000, 99999999); // Menghasilkan angka acak 8 digit
        return $prefix . $randomNumber;
    }

    public function insertTransaksi($userid, $g_name, $g_email, $product_id, $amount, $total_price, $payment_method, $status) {
        $invoices = $this->generateInvoiceNumber();
        $sql = "INSERT INTO transactions (user_id, guest_name, guest_email, product_id, amount, total_price, payment_method, status, invoices) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            return "Error preparing statement: " . $this->conn->error;
        }

        $stmt->bind_param("issiiisis", $userid, $g_name, $g_email, $product_id, $amount, $total_price, $payment_method, $status, $invoices);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $error = "Error executing query: " . $stmt->error;
            $stmt->close();
            return $error;
        }
    }
    public function getAllTransaksi(){
        $sql = "SELECT * FROM transactions";
        $result = $this->conn->query($sql);
        $transaksi = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $transaksi[] = $row;
            }
        }
        return $transaksi;
    }
    public function getTransaksiById($id){
        $sql = "SELECT * FROM transactions WHERE id = '$id'";
        $result = $this->conn->query($sql);
        $transaksi = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $transaksi[] = $row;
            }
        }
        return $transaksi;
    }
}

?>
