<?php

include_once 'app/models/SupplierModel.php';
include_once 'app/config/Database.php';

class SupplierController {
    private $supplierModel;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->supplierModel = new SupplierModel($db);
    }

    public function index() {

        $supplierController = new SupplierController();
        $data = $supplierController->listSuppliers(); // listSuppliers() es un método en UserController

        include 'app/views/home.php';
    }

    public function create() {
           // Cargar la vista del formulario de actualización
           $data['view'] = 'app/views/supplier/create.php';
           include 'app/views/home.php';
    }

    public function read($id) {
        $supplier = $this->supplierModel->read($id);
        if ($supplier) {
            include 'app/views/supplier/read.php';
            // Cargar una vista para mostrar los datos del usuario
        } else {
            echo 'Error reading a record.';
            // Mostrar un mensaje de error o redirigir
        }
    }

    public function update($id) {
        
        // Cargar la vista del formulario de actualización
        $data['supplier'] = $this->supplierModel->read($id);
        $data['view'] = 'app/views/supplier/update.php';
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
            $result = $this->supplierModel->create($new_data);
        else
            $result = $this->supplierModel->update($new_data);

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

        $data['view'] = 'app/views/supplier/list.php';
        $data['suppliers'] = $this->supplierModel->getAll();
        include 'app/views/home.php';
    }

    public function delete($id) {
        // Cargar la vista del formulario de actualización
        $data['supplier'] = $this->supplierModel->read($id);
        $data['view'] = 'app/views/supplier/delete.php';
        include 'app/views/home.php';
                
    }

    public function remove($id) 
    {
        $result = $this->supplierModel->delete($id);
        if ($result) {
            // Redirigir o mostrar un mensaje de éxito
        } else {
            // Mostrar un mensaje de error
        }
    }

    public function listSuppliers() {
        // $suppliers = $this->supplierModel->getAll();
        $data['suppliers'] = $this->supplierModel->getAll();
        $data['view'] = 'supplier/list.php';
        // $view = 'app/views/supplier/update.php';
        return $data;
    
        // Carga la vista y pasa los datos de los usuarios
        // include 'app/views/supplier/list.php';
    }
    
}

?>
