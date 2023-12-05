<?php

    include 'conexion.php';

    $sql = "UPDATE usuarios SET nombre='Angeline Guzmán Ramos', email = 'aguzman3038@arecibointer.edu' WHERE nombre like 'Angeline Guzmán'"; 
    if ($conexion->query($sql) === TRUE) { 
        echo "Registro actualizado con éxito"; 
    } else { 
        echo "Error actualizando el registro: ";
        echo  $conexion->error; 
    }

?>