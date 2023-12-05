<?php

include_once 'UserController.php';

class HomeController {
    public function index() {

        $userController = new UserController();
        $data = $userController->listUsers(); // Asume que listUsers() es un método en UserController

        // require_once "app/views/home.php";
        include 'app/views/home.php';

        // $userController = new UserController();
        // $userController->listUsers(); // Esto cargará la vista de lista de usuarios
    }
}

?>