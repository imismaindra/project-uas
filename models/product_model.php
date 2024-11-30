<?php 
include 'config/connection.php';

class ProductModel {
    
    public $conn;
    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function GetProducts($search = '', $category_id = null, $limit = 5, $offset = 0) {
        $sql = "SELECT products.*, categories.name AS category_name 
                FROM products 
                JOIN categories ON products.id_catagories = categories.id 
                WHERE 1=1";
    
        if (!empty($search)) {
            $sql .= " AND products.name LIKE ?";
        }
    
        if (!empty($category_id)) {
            $sql .= " AND products.id_catagories = ?";
        }
    
        $sql .= " LIMIT ? OFFSET ?";
    
        $stmt = $this->conn->prepare($sql);
    
        if (!empty($search) && !empty($category_id)) {
            $searchTerm = "%" . $search . "%";
            $stmt->bind_param("siii", $searchTerm, $category_id, $limit, $offset);
        } elseif (!empty($search)) {
            $searchTerm = "%" . $search . "%";
            $stmt->bind_param("sii", $searchTerm, $limit, $offset);
        } elseif (!empty($category_id)) {
            $stmt->bind_param("iii", $category_id, $limit, $offset);
        } else {
            $stmt->bind_param("ii", $limit, $offset);
        }
    
        $stmt->execute();
        $result = $stmt->get_result();
    
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    
        return $products;
    }
    
    public function GetTotalProducts($search = '', $category_id = null) {
        global $conn;
        
        $sql = "SELECT COUNT(*) AS total FROM products 
                JOIN categories ON products.id_catagories = categories.id 
                WHERE 1=1";
        
        if (!empty($search)) {
            $sql .= " AND products.name LIKE ?";
        }
        
        if (!empty($category_id)) {
            $sql .= " AND products.id_catagories = ?";
        }
    
        $stmt = $this->conn->prepare($sql);
        
        if (!empty($search) && !empty($category_id)) {
            $searchTerm = "%" . $search . "%";
            $stmt->bind_param("si", $searchTerm, $category_id);
        } elseif (!empty($search)) {
            $searchTerm = "%" . $search . "%";
            $stmt->bind_param("s", $searchTerm);
        } elseif (!empty($category_id)) {
            $stmt->bind_param("i", $category_id);
        }
    
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    
        return $row['total'];
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
    public function deleteProductByid($id){
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        return $this->conn->affected_rows;
    
    }

    public function updateProduct($id, $name, $price, $stock, $category_id) {
        $sql = "UPDATE products SET name = ?, price = ?, stock = ?, id_catagories = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssiii", $name, $price, $stock, $category_id, $id); // Correct format string
        $stmt->execute();
        $stmt->close();
        return $this->conn->affected_rows;
    }
    
    
}
?>