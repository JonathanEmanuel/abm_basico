<?php
    require_once('conexion.php');


    if( isset( $_GET['id_usuario'] )  ){
        $id_usuario = $_GET['id_usuario'] ;
        
        $sql = "DELETE FROM usuarios
                WHERE id_usuario = $id_usuario";
        
        mysqli_query($conexion, $sql);
        
        header('Location: ../index.php');

    }
?>