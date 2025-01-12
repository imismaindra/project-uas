<?php
include 'config/connection.php';

abstract class BaseModel {
    protected $conn;

    public function __construct($connection) {
        $this->conn = $connection;
    }

    abstract public function findById($id); // Harus diimplementasikan oleh semua turunan

    public function deleteById($id) {
        $stmt = $this->conn->prepare("DELETE FROM " . $this->getTableName() . " WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    abstract protected function getTableName(); // Nama tabel harus didefinisikan oleh turunan
}

?>
