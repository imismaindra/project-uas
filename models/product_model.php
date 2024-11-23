<?php 
include 'config/connection.php';

class ProductModel {
    
    public $conn;
    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function GetProducts($search = '', $category_id = null) {
        global $conn;
    
        // Start the SQL query
        $sql = "SELECT products.*, categories.name AS category_name 
                FROM products 
                JOIN categories ON products.id_catagories = categories.id 
                WHERE 1=1";  // Default condition to apply all filters dynamically
    
        // Add search condition if search term is provided
        if (!empty($search)) {
            $sql .= " AND products.name LIKE ?";
        }
    
        // Add category filter condition if category_id is provided
        if (!empty($category_id)) {
            $sql .= " AND products.id_catagories = ?";
        }
    
        // Prepare the SQL statement
        $stmt = $this->conn->prepare($sql);
    
        // Bind the parameters based on the conditions
        if (!empty($search) && !empty($category_id)) {
            $searchTerm = "%" . $search . "%";
            $stmt->bind_param("si", $searchTerm, $category_id);
        } elseif (!empty($search)) {
            $searchTerm = "%" . $search . "%";
            $stmt->bind_param("s", $searchTerm);
        } elseif (!empty($category_id)) {
            $stmt->bind_param("i", $category_id);
        }
    
        // Execute the statement and get the result
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Fetch the products into an array
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    
        return $products;
    }
    

    public function InsertProduct($name, $id_catagories, $stock, $price) {
        $sql = "INSERT INTO products (name, id_catagories, stock, price) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssis", $name, $id_catagories, $stock, $price); // Bind parameter);
        $stmt->execute();
        $stmt->close();
        return $this->conn->insert_id;
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

    public function getProductById($id){
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row;
        
    }
    
}
?>