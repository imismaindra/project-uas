<?php 
include 'config/connection.php';

class BankModel{
    public $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }
    public function cekSaldoBank($bank_id, $nominal) {
        $sql = "SELECT saldo FROM bank WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $bank_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            return $data['saldo'] >= $nominal; // True jika saldo cukup
        } else {
            return false; // Bank tidak ditemukan
        }
    }
    public function kurangiSaldoBank($bank_id, $nominal) {
        $sql = "UPDATE bank SET saldo = saldo - ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $nominal, $bank_id);
        return $stmt->execute();
    }
    public function updateStatusTransaksi($kodeVA) {
        $sql = "UPDATE transactions SET status = 1 WHERE kodeVA = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $kodeVA);
        return $stmt->execute();
    }
        
    
}
?>