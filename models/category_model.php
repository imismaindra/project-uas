<?php 
include 'config/connection.php';
class CategoryModel{
    public function getCategories(){
        global $conn;
        $sql = "SELECT * FROM categories";
        $result = $conn->query($sql);

        $categories =[];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $categories[] = $row;
            }
        }
        return $categories;
    }

    public function insertCategory($name, $description, $slug){
        global $conn;
        $sql = "INSERT INTO categories (name, description, slug) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $description, $slug);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteCategory($id){
        global $conn;
        $sql = "DELETE FROM categories WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function getCategoryById($id){
        global $conn;
        $sql = "SELECT * FROM categories WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $category = $result->fetch_assoc();
        $stmt->close();
        return $category;
    }

    public function updateCategory($id, $name, $description, $slug){
        global $conn;
        $sql = "UPDATE categories SET name = ?, description = ?, slug = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $name, $description, $slug, $id);
        $stmt->execute();
        $stmt->close();
    }
}


?>