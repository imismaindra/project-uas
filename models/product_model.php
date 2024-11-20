<?php 
include 'config/connection.php';

class ProductModel {
    
    public $conn;
    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function GetProducts() {
        global $conn;
        $sql = "SELECT products.*, categories.name AS category_name FROM products JOIN categories ON products.id_catagories = categories.id;"; 
        $result = $conn->query($sql);

        $products = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }
        return $products;
    }

    public function getProductsByCategorySlug($slug) {
        
        $stmt = $this->conn->prepare("
            SELECT products.*, categories.name AS category_name, categories.slug AS category_slug, categories.description AS category_description, categories.image AS category_image
            FROM products
            JOIN categories ON products.id_catagories = categories.id
            WHERE categories.slug = ?
        ");
        $stmt->bind_param("s", $slug); // Bind parameter untuk menghindari SQL Injection
        $stmt->execute();
        $result = $stmt->get_result();
    
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products; // Return array produk
    }
    
}
?>