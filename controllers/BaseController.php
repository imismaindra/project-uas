<?php
require_once 'config/connection.php'; // Memuat file koneksi
abstract class BaseController {
    protected $conn;

    public function __construct() {
        // Membuka koneksi database
        $this->conn = new mysqli('localhost', 'root', '', 'topup_store');
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    // Abstract method, wajib diimplementasikan oleh kelas turunan
    abstract public function list();

    // Optional method, bisa digunakan langsung atau di-overridden
    public function redirect($url) {
        header("Location: $url");
        exit;
    }
}

