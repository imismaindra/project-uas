<?php
require_once 'user_model.php';

class Member extends Users {
    public function updateSaldo($userId, $newSaldo) {
        $stmt = $this->conn->prepare("UPDATE members SET saldo = ? WHERE user_id = ?");
        $stmt->bind_param("di", $newSaldo, $userId);

        if ($stmt->execute()) {
            return "Saldo updated successfully!";
        } else {
            return "Error: " . $stmt->error;
        }
    }

    public function getSaldoMember($userId) {
        $stmt = $this->conn->prepare("SELECT saldo FROM members WHERE user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $saldo = $result->fetch_assoc();
            return $saldo['saldo'];
        } else {
            return 0;
        }
    }

    public function addTransaction($userId, $amount, $type) {
        $stmt = $this->conn->prepare("INSERT INTO transactions (user_id, amount, type) VALUES (?, ?, ?)");
        $stmt->bind_param("ids", $userId, $amount, $type);

        if ($stmt->execute()) {
            return "Transaction added successfully!";
        } else {
            return "Error: " . $stmt->error;
        }
    }

    public function getTransactions($userId) {
        $stmt = $this->conn->prepare("SELECT * FROM transactions WHERE user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
}
?>
