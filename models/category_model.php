<?php 
include 'config/connection.php';

class CategoryModel {
    public $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function getCategories($search = '', $limit = 5, $offset = 0) {
        $sql = "SELECT * FROM categories WHERE 1=1";
        if ($search != '') {
            $sql .= " AND name LIKE ?";
        }
        $sql .= " LIMIT ? OFFSET ?";

        $stmt = $this->conn->prepare($sql);

        if ($search != '') {
            $searchParam = "%$search%";
            $stmt->bind_param("sii", $searchParam, $limit, $offset);
        } else {
            $stmt->bind_param("ii", $limit, $offset);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $categories = [];

        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }

        $stmt->close();
        return $categories;
    }

    public function getTotalCategories($search = '') {
        $sql = "SELECT COUNT(*) as total FROM categories WHERE 1=1";
        if ($search != '') {
            $sql .= " AND name LIKE ?";
        }

        $stmt = $this->conn->prepare($sql);

        if ($search != '') {
            $searchParam = "%$search%";
            $stmt->bind_param("s", $searchParam);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $stmt->close();
        return $row['total'] ?? 0;
    }

    public function insertCategory($name, $description, $slug, $image,$tipe) {
        $uploadDir = 'assets/';
        $fileName = isset($image['name']) ? basename($image['name']) : null;
        $targetFile = $fileName ? $uploadDir . $fileName : null;
        if ($fileName && move_uploaded_file($image['tmp_name'], $targetFile)) {
        } else { 
            $targetFile = null;
        }
    
        $sql = "INSERT INTO categories (name, description, slug, image,tipe) VALUES (?, ?, ?, ?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $description, $slug, $targetFile,$tipe);
        $stmt->execute();
        $stmt->close();
    }
    
    public function deleteCategory($id) {
        $sql = "DELETE FROM categories WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function getCategoryById($id) {
        $sql = "SELECT * FROM categories WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $category = $result->fetch_assoc();
        $stmt->close();
        return $category;
    }

    public function updateCategory($id, $name, $description, $slug, $image, $tipe) {
        $sql = "UPDATE categories SET name = ?, description = ?, slug = ?, image = ?, tipe = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("sssssi", $name, $description, $slug, $image, $tipe, $id);
    
        $stmt->execute();
        $stmt->close();
    }
    

public function getFilteredCategoriesByTipe($tipe) {
    $sql = "SELECT *  FROM categories WHERE tipe = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $tipe);
    $stmt->execute();
    $result = $stmt->get_result();
    $categories = [];

    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }

    $stmt->close();
    return $categories;
}
    
}
?>
