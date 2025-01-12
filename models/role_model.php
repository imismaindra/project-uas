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
    public function deleteRole($id) {
        global $conn;
        $sql = "DELETE FROM roles WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function updateRole($id, $name, $description, $is_aktif) {
        global $conn;
        $sql = "UPDATE roles SET name = ?, description = ?, is_aktif = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $name, $description, $is_aktif, $id);
        $stmt->execute();
        $stmt->close();
    }
    public function getRole($id) {
        global $conn;
        $sql = "SELECT * FROM roles WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $role = $result->fetch_assoc();
        $stmt->close();
        return $role;
    }
}