<?php
include 'config/connection.php';

class ProductModel {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection;
    }

    public function getProducts($search = '', $category_id = null, $limit = 5, $offset = 0) {
        $sql = "SELECT products.*, categories.name AS category_name 
        FROM products 
        JOIN categories ON products.id_catagories = categories.id 
        WHERE 1=1";

        $params = [];
        $types = '';

        // Tambahkan filter jika ada
        if (!empty($search)) {
            $sql .= " AND products.name LIKE ?";
            $types .= 's';
            $params[] = '%' . $search . '%';
        }

        if (!empty($category_id)) {
            $sql .= " AND products.id_catagories = ?";
            $types .= 'i';
            $params[] = $category_id;
        }

        $sql .= " LIMIT ? OFFSET ?";
        $types .= 'ii';
        $params[] = $limit;
        $params[] = $offset;

        $stmt = $this->conn->prepare($sql);

        // Bind parameter
        $stmt->bind_param($types, ...$params);

        $stmt->execute();
        $result = $stmt->get_result();

        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }

        return $products;
    }

    /**
     * Get the total count of products with optional search and category filtering.
     */
    public function getTotalProducts($search = '', $category_id = null) {
        $sql = "SELECT COUNT(*) AS total FROM products 
        JOIN categories ON products.id_catagories = categories.id 
        WHERE 1=1";

        $params = [];
        $types = '';

        // Tambahkan filter jika ada
        if (!empty($search)) {
            $sql .= " AND products.name LIKE ?";
            $types .= 's';
            $params[] = '%' . $search . '%';
        }

        if (!empty($category_id)) {
            $sql .= " AND products.id_catagories = ?";
            $types .= 'i';
            $params[] = $category_id;
        }

        $stmt = $this->conn->prepare($sql);

        // Bind parameter hanya jika ada
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row['total'];

    }

    /**
     * Insert a new product.
     */
    public function insertProduct($name, $id_catagories, $stock, $price) {
        try {
            $sql = "INSERT INTO products (name, id_catagories, stock, price) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("siii", $name, $id_catagories, $stock, $price);

            $stmt->execute();
            return $this->conn->insert_id;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    /**
     * Get a product by ID.
     */
    public function getProductById($id) {
        try {
            $sql = "SELECT * FROM products WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $id);

            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        } catch (Exception $e) {
            error_log($e->getMessage());
            return null;
        }
    }

    /**
     * Update a product.
     */
    public function updateProduct($id, $name, $price, $stock, $category_id) {
        try {
            $sql = "UPDATE products 
                    SET name = ?, price = ?, stock = ?, id_catagories = ? 
                    WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssiii", $name, $price, $stock, $category_id, $id);

            $stmt->execute();
            return $stmt->affected_rows;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    /**
     * Delete a product by ID.
     */
    public function deleteProductById($id) {
        try {
            $sql = "DELETE FROM products WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $id);

            $stmt->execute();
            return $stmt->affected_rows;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
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
