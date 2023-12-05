<?php

class SupplierModel {
    private $db; // Objeto de conexión a base de datos

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function create($data) {
        $sql = "INSERT INTO suplidor (nombre, email, telefono) VALUES (:nombre, :email, :telefono)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindValue(':telefono', $data['telefono'], PDO::PARAM_STR);
        $stmt->execute();

        return $this->db->lastInsertId();
    }

    public function read($id) {
        $sql = "SELECT * FROM suplidor WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data) {
        $sql = "UPDATE suplidor SET nombre = :nombre, email = :email, telefono = :telefono WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindValue(':telefono', $data['telefono'], PDO::PARAM_STR);
        $stmt->bindValue(':id', $data['id'], PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function delete($id) {
        $sql = "DELETE FROM suplidor WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();
    }


    public function getAll() {
        $sql = "SELECT * FROM suplidor";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}

?>