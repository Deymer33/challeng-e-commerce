<?php
require_once '../config/conexion.php';
require_once '../model/user.model.php';

class UserController{

    private $model;

    public function __construct() {
        $db = new Conection();
        $this->model = new UserModel($db->getConection());
    }
    

    public function register(){
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['name'], $_POST['email'], $_POST['password'])){
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $password = ($_POST['password']);

            $this->model->name = $name;
            $this->model->email = $email;
            $this->model->password = $password;

            if($this->model->register()){
                return true;
            }
        }
      }  
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST['email'], $_POST['password'])){
                $email = htmlspecialchars($_POST['email']);
                $password = $_POST['password'];

                $this->model->email = $email;
                $this->model->password = $password;

                if ($this->model->login()){
                    session_start();
                    $_SESSION['email'] = $this->model->email;

                    header("Location: ./src/view/home.php"); 
                    exit();
                } 
                else {
                    // Login fallido, redirigir con error
                    header("Location: ./src/view/fail.php");
                    exit();
                }
            }
        }
    }
}
