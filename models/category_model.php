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

    public function insertCategory($name, $description, $slug,$image){
        global $conn;
       // Path untuk menyimpan file
        $uploadDir = 'assets/';
        $fileName = basename($image['name']);
        $targetFile = $uploadDir . $fileName;

        // Validasi dan pindahkan file
        if (move_uploaded_file($image['tmp_name'], $targetFile)) {
            // Jika berhasil diupload, simpan path ke database
            $sql = "INSERT INTO categories (name, description, slug, image) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $name, $description, $slug, $targetFile);
            $stmt->execute();
            $stmt->close();
        } else {
            // Tangani error upload
            die("Error uploading file.");
        }
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

    public function updateCategory($id, $name, $description, $slug, $image){
        global $conn;
        $sql = "UPDATE categories SET name = ?, description = ?, slug = ?, image = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $name, $description, $slug, $image, $id);
        $stmt->execute();
        $stmt->close();
    }
    
}


?>