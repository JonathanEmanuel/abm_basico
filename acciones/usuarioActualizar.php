<?php
    require_once('conexion.php');

    if(  isset( $_POST['nombre']) && isset( $_POST['apellido']) && isset( $_POST['id_rol'])
        && isset( $_POST['email']) && isset( $_GET['id_usuario'])) {

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $id_rol = $_POST['id_rol'];
        $email = $_POST['email'];
        $id_usuario = $_GET['id_usuario'];

        // Obtengo el nombre del archivo
        $fotoNombre = $_FILES['foto']['name'];
        $rutaTemp = $_FILES['foto']['tmp_name'];
        $fotoUrl = 'images/'.$fotoNombre;

        // Muevo el archivo a la carpeta images
        move_uploaded_file($rutaTemp, '../' .$fotoUrl );

        
        $sql = "UPDATE usuarios
                SET nombre = '$nombre',
                    apellido = '$apellido',
                    id_rol = $id_rol,
                    email = '$email',
                    foto_url = '$fotoUrl'
                WHERE id_usuario = $id_usuario";
        


        mysqli_query($conexion, $sql);
        
        header('Location: ../index.php');
    }
?>