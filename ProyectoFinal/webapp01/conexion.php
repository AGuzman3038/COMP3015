<?php

    include 'conexion.php';

    $conexion = new mysqli("localhost", "student", "contraseña_segura", "inventario");
    if($conexion->connect_error) {
        die ("Conexión fallida: " . $conexion->connect_error);
    }
    echo "Conexión exitosa<br>";
?>