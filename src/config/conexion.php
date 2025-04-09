<?php 

class Conection {
    private $conn;
    private $host = 'localhost';
    private $db_name = 'ecommerce_servicios';
    private $username = 'root';  
    private $password = '';

    public function getConection(){
        $this->conn = null;    
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "error in conection: " . $e->getMessage();
        }
        return $this->conn;
    }
}