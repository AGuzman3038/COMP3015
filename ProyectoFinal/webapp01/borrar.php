<?php

    include 'conexion.php';

    $sql = "DELETE FROM usuarios WHERE nombre like 'Angeline Guzmán Ramos'"; 
    if ($conexion->query($sql) === TRUE) { 
        echo "Registro eliminado con éxito"; 
    } else { 
        echo "Error al eliminar el registro: ";
        echo $conexion->error; 
    }

?>