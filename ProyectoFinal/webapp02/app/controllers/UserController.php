<?php

include_once 'app/models/UserModel.php';
include_once 'app/config/Database.php';

class UserController {
    private $userModel;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->userModel = new UserModel($db);
    }

    public function index() {

        $userController = new UserController();
        $data = $userController->listUsers(); // listUsers() es un método en UserController

        include 'app/views/home.php';
    }

    public function create() {
           // Cargar la vista del formulario de actualización
           $data['view'] = 'app/views/user/create.php';
           include 'app/views/home.php';
    }

    public function read($id) {
        $user = $this->userModel->read($id);
        if ($user) {
            include 'app/views/user/read.php';
            // Cargar una vista para mostrar los datos del usuario
        } else {
            echo 'Error reading a record.';
            // Mostrar un mensaje de error o redirigir
        }
    }

    public function update($id) {
        
        // Cargar la vista del formulario de actualización
        $data['user'] = $this->userModel->read($id);
        $data['view'] = 'app/views/user/update.php';
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
            $result = $this->userModel->create($new_data);
        else
            $result = $this->userModel->update($new_data);

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

        $data['view'] = 'app/views/user/list.php';
        $data['users'] = $this->userModel->getAll();
        include 'app/views/home.php';
    }

    public function delete($id) {
        // Cargar la vista del formulario de actualización
        $data['user'] = $this->userModel->read($id);
        $data['view'] = 'app/views/user/delete.php';
        include 'app/views/home.php';
                
    }

    public function remove($id) 
    {
        $result = $this->userModel->delete($id);
        if ($result) {
            // Redirigir o mostrar un mensaje de éxito
        } else {
            // Mostrar un mensaje de error
        }
    }

    public function listUsers() {
        // $users = $this->userModel->getAll();
        $data['users'] = $this->userModel->getAll();
        $data['view'] = 'user/list.php';
        // $view = 'app/views/user/update.php';
        return $data;
    
        // Carga la vista y pasa los datos de los usuarios
        // include 'app/views/user/list.php';
    }
    
}

?>
