<?php
include 'config/connection.php';

abstract class BaseModel {
    protected $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
}

?>
