<?php
include 'config/connection.php';

class Users {
    public $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }
    public function insertUser($username, $password, $email, $role) {
        $stmt = $this->conn->prepare("INSERT INTO users (username, password, email, role_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $password, $email, $role);

        if ($stmt->execute()) {
            return "User added successfully!";
        } else {
            return "Error: " . $stmt->error;
        }
    }
    public function updateUser($userId, $username, $password, $email, $role) {
        $stmt = $this->conn->prepare("UPDATE users SET username = ?, password = ?, email = ?, role_id = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $username, $password, $email, $role, $userId);

        if ($stmt->execute()) {
            return "User updated successfully!";
        } else {
            return "Error: " . $stmt->error;
        }
    }
    public function deleteUser($userId) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);

        if ($stmt->execute()) {
            return "User deleted successfully!";
        } else {
            return "Error: " . $stmt->error;
        }
    }

    public function searchUser($keyword) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username LIKE ? OR email LIKE ?");
        $searchTerm = "%" . $keyword . "%";
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC); // Kembalikan array asosiatif
        } else {
            return "No users found.";
        }
    }
    public function getAllUsers() {
        $stmt = $this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return "No users found.";
        }
    }
}
?>
