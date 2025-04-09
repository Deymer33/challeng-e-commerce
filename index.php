<?php
require_once './src/controller/session.controller.php';
require_once './src/controller/index.controller.php';

$controller = new IndexController();
$login = $controller->loadLogin();

$session = new UserController();

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'register':
            $session->register();
            break;
        case 'login':
            $session->login();
            break;
        default:
            echo "Acción no válida.";
    }
} else {
    echo "";
}