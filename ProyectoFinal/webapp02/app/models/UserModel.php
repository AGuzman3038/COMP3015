<?php

class UserModel {
    private $db; // Objeto de conexión a base de datos

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function create($data) {
        $sql = "INSERT INTO usuarios (nombre, email, clave) VALUES (:nombre, :email, :clave)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindValue(':clave', password_hash($data['clave'], PASSWORD_DEFAULT), PDO::PARAM_STR);
        $stmt->execute();

        return $this->db->lastInsertId();
    }

    public function read($id) {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data) {
        $sql = "UPDATE usuarios SET nombre = :nombre, email = :email, clave = :clave WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindValue(':clave', $data['clave'], PDO::PARAM_STR);
        $stmt->bindValue(':id', $data['id'], PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function delete($id) {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();
    }


    public function getAll() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}

?>