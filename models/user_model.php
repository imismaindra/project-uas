<?php
include 'config/connection.php';

class Users {
    protected $conn; 

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
    public function getUserById($userId) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            return $user['username'];
        } else {
            return false;
        }
    }
    public function getUser($userId) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            return $user;
        } else {
            return false;
        }
    }

    public function getAllUsers($search = '', $username = null, $limit = 5, $offsite = 0) {
        $sql = "SELECT users.*, roles.name AS role_name FROM users JOIN roles ON users.role_id = roles.id WHERE 1=1";
        $params = [];
        if (!empty($search)) {
            $sql .= " AND (users.username LIKE ? OR users.email LIKE ?)";
            $params[] = "%$search%";
            $params[] = "%$search%";
        }
        if (!empty($username)) {
            $sql .= " AND users.username = ?";
            $params[] = $username;
        }
        $sql .= " LIMIT ? OFFSET ?";
        $params[] = $limit;
        $params[] = $offsite;
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(str_repeat("s", count($params)), ...$params);
        $stmt->execute();
        $result = $stmt->get_result();
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    }

    public function checkLogin($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            return $user;
        } else {
            return false;
        }
    }
    public function checkRegister($data){
        $stmt = $this->conn->prepare("INSERT INTO users (username, email, password, role_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $data['username'], $data['email'], $data['password'], $data['role_id']);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } 
}
?>
