<?php
include './config/connection.php';

class RoleModel {
    public function getRoles() {
        global $conn;
        $sql = "SELECT * FROM roles";  
        $result = $conn->query($sql);

        $roles = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $roles[] = $row;
            }
        }
        return $roles;
    }
    public function insertRole($name, $description, $is_aktif) {
        global $conn;
        $sql = "INSERT INTO roles (name, description, is_aktif) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $description, $is_aktif);
        $stmt->execute();
        $stmt->close();
    }
}