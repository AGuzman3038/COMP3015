<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

require_once './app/config/Database.php';

require_once './app/models/UserModel.php';
require_once './app/controllers/UserController.php';

require_once './app/models/ProductModel.php';
require_once './app/controllers/ProductController.php';

require_once './app/models/SupplierModel.php';
require_once './app/controllers/SupplierController.php';

// Añadir aquí los controladores y modelos nuevos

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Captura todos los datos POST

    $url = isset($_GET['url']) ? explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)) : [];

    $controller = isset($url[0]) ? ucwords($url[0]) . 'Controller' : 'HomeController';
    $method = isset($url[1]) ? $url[1] : 'index';
    $id = isset($url[2]) ? $url[2] : null;
}
else {
    $url = isset($_GET['url']) ? explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)) : [];

    $controller = isset($url[0]) ? ucwords($url[0]) . 'Controller' : 'HomeController';
    $method = isset($url[1]) ? $url[1] : 'index';
    $id = isset($url[2]) ? $url[2] : null;

    $datos = $_POST;
}

if (file_exists('./app/controllers/' . $controller . '.php')) {
    require_once './app/controllers/' . $controller . '.php';
    $controller = new $controller;

    if (method_exists($controller, $method)) {

        if (isset($id)) {
            if (isset($datos)) {
                $controller->$method($datos);
            }
            else
                $controller->$method($id);
        } else {
            $controller->$method();
        }
    } else {
        // Método no encontrado, cargar vista de error o redirigir
    }
} else {
    // Controlador no encontrado, cargar vista de error o redirigir
    // Si no hay un controlador, cargar la pagina de inicio

    require_once './app/views/home.php';
}
?>

    
</body>
</html>
