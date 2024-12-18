<?php
include 'config/connection.php';

class DashboardModel{
    public $conn;
    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function getTop5Transaksi(){
        $query = "SELECT user_id, SUM(total_price) AS total_price 
              FROM transactions 
              WHERE `status` = 1 
              GROUP BY user_id 
              ORDER BY total_price DESC 
              LIMIT 5";
        $result = $this->conn->query($query);
        $top5 = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $top5[] = $row;
            }
        }
        return $top5;
    }
}
?>