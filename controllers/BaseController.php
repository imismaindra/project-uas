<?php
require_once 'config/connection.php'; 
abstract class BaseController {
    protected $conn;

    public function __construct() {
        $this->conn = new mysqli('localhost', 'root', '', 'topup_store');
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    abstract public function list();

    public function redirect($url) {
        header("Location: $url");
        exit;
    }
}

