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

    public function insertCategory($name, $description){
        global $conn;
        $sql = "INSERT INTO categories (name, description) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $description);
        $stmt->execute();
        $stmt->close();
    }

}
?>