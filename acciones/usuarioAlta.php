<?php
    require_once('conexion.php');

    if(  isset( $_POST['nombre']) && isset( $_POST['apellido']) && isset( $_POST['id_rol'])
        && isset( $_POST['email']) && isset( $_POST['clave'])) {

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $id_rol = $_POST['id_rol'];
        $email = $_POST['email'];
        $clave = $_POST['clave'];

        $sql = "INSERT INTO usuarios(nombre, apellido, email, clave, id_rol)
                VALUES('$nombre', '$apellido', '$email', '$clave', $id_rol )";
        
        mysqli_query($conexion, $sql);
        
        header('Location: ../index.php');
    }
?>