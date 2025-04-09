<?php 

require_once '../controller/session.controller.php';
require_once '../model/home.model.php';

class HomeController extends UserController{
    public $service;

    public function __construct() {
        parent::__construct();
    }

    public function services(){
        $db = new Conection();
        $this->service = new HomeModel($db->getConection());
        return $this->service->getServices();
    }

}