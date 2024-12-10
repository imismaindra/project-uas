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

    public function insertTransaksi($userid, $g_email, $product_id, $amount, $total_price, $payment_method, $status) {
        $invoices = $this->generateInvoiceNumber();
        $sql = "INSERT INTO transactions (user_id, guest_email, product_id, amount, total_price, payment_method, status, invoices) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            return "Error preparing statement: " . $this->conn->error;
        }

        $stmt->bind_param("isiiisis", $userid, $g_email, $product_id, $amount, $total_price, $payment_method, $status, $invoices);

        if ($stmt->execute()) {
            $stmt->close();
            return $invoices;
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
    public function updateTransaksi($id, $status) {
        // Query dengan placeholder untuk parameter
        $sql = "UPDATE transactions SET status = ? WHERE id = ?";
        
        // Persiapkan statement
        $stmt = $this->conn->prepare($sql);
        
        // Periksa jika statement berhasil dipersiapkan
        if ($stmt === false) {
            throw new Exception("Error preparing statement: " . $this->conn->error);
        }
        
        // Bind parameter ke statement (keduanya bertipe integer)
        $stmt->bind_param("ii", $status, $id);
        
        // Eksekusi statement
        $stmt->execute();
        
        // Periksa jika ada error saat eksekusi
        if ($stmt->error) {
            throw new Exception("Error executing statement: " . $stmt->error);
        }
        
        // Tutup statement
        $stmt->close();
        
        // Return jumlah baris yang terpengaruh
        return $this->conn->affected_rows;
    }
    
    public function getTransaksiByInvoice($invoices){
        $sql = "SELECT * FROM transactions WHERE invoices = '$invoices'";
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
