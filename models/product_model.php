<?php 
include 'config/connection.php';

class ProductModel{
    public function GetProducts(){
        global $conn;
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        $products = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $products[] = $row;
            }
        }
        return $products;
    }
}
?>