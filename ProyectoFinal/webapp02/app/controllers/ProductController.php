<?php

include_once 'app/models/ProductModel.php';
include_once 'app/config/Database.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->productModel = new ProductModel($db);
    }

    public function index() {

        $productController = new ProductController();
        $data = $productController->listProducts(); // listProducts() es un método en ProductController

        include 'app/views/home.php';
    }

    public function create() {
           // Cargar la vista del formulario de actualización
           $data['view'] = 'app/views/product/create.php';
           include 'app/views/home.php';
    }

    public function read($id) {
        $product = $this->productModel->read($id);
        if ($product) {
            include 'app/views/product/read.php';
            // Cargar una vista para mostrar los datos del usuario
        } else {
            echo 'Error reading a record.';
            // Mostrar un mensaje de error o redirigir
        }
    }

    public function update($id) {
        
        // Cargar la vista del formulario de actualización
        $data['product'] = $this->productModel->read($id);
        $data['view'] = 'app/views/product/update.php';
        include 'app/views/home.php';
        
    }

    public function save($data) {
        $new_data = [
            'id' => $data['id'],
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'clave' => $data['clave']
        ];

        if ($data['id'] == 0)
            $result = $this->productModel->create($new_data);
        else
            $result = $this->productModel->update($new_data);

        if ($result) {
            if ($data['id'] == 0)
                // Se pudo añadir con éxito
                $data['message'] = 'Récord añadido con éxito.';
            else 
                // Se pudo actualizar, mensaje de éxito
                $data['message'] = 'Récord actualizado con éxito.';
        } else {
            // No se pudo actualizar, mensaje de error
            $data['message'] = 'Récord NO pudo ser actualizado.';
        }

        $data['view'] = 'app/views/product/list.php';
        $data['products'] = $this->productModel->getAll();
        include 'app/views/home.php';
    }

    public function delete($id) {
        // Cargar la vista del formulario de actualización
        $data['product'] = $this->productModel->read($id);
        $data['view'] = 'app/views/product/delete.php';
        include 'app/views/home.php';
                
    }

    public function remove($id) 
    {
        $result = $this->productModel->delete($id);
        if ($result) {
            // Redirigir o mostrar un mensaje de éxito
        } else {
            // Mostrar un mensaje de error
        }
    }

    public function listProduct
    s() {
        // $products = $this->productModel->getAll();
        $data['products'] = $this->productModel->getAll();
        $data['view'] = 'product/list.php';
        // $view = 'app/views/product/update.php';
        return $data;
    
        // Carga la vista y pasa los datos de los usuarios
        // include 'app/views/product/list.php';
    }
    
}

?>