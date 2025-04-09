<?php
require_once '../config/conexion.php';

class UserModel{
    public $name;
    public $email;
    public $password;
    protected $name_table = 'usuarios';
    protected $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register(){
        $query = "INSERT INTO " . $this->name_table . "(nombre_usuario, email, contrasena_hash)
        VALUES(:nombre_usuario, :email, :contrasena_hash)";

        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));

        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        
        $stmt->bindParam(':nombre_usuario', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':contrasena_hash',  $hashedPassword);

        if($stmt->execute()){
            rheader("Location: ./index.php?registro=ok"); // o alguna página de confirmación
exit();
        }
        return false;
    }

    public function login(){
        $query = "SELECT email, contrasena_hash FROM " . $this->name_table . " WHERE email = :email LIMIT 1";
        
        $stmt = $this->conn->prepare($query);
        
        $this->email = htmlspecialchars(strip_tags($this->email));
    
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if(password_verify($this->password, $row['contrasena_hash'])){
                return $row;
            }
        }
        return false;
    }
    
}
