<?php 

    include 'conexion.php';

    $sql = "SELECT id, nombre, email, clave FROM usuarios"; 
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) { 
        while($row = $resultado->fetch_assoc()) { 
            echo "id: ". $row["id"]. " - Nombre: ";
            echo $row["nombre"]. " - Email: " . $row["email"];
            echo " - Clave: " . $row["clave"] . "<br>"; 
        } 
    } else { 
        echo "0 resultados"; 
    }

?>