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
}