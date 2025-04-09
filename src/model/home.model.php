<?php
require_once '../model/user.model.php';

class HomeModel extends UserModel {

   public function __construct($db) {
    parent::__construct($db);
    $this->conn = $db;
   }

   public function getServices(){

    $sql = "SELECT * FROM `servicios` WHERE 1";
    $stmt = $this->conn->prepare($sql);
    
    if($stmt->execute()){
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return null;
    }

   }
}
