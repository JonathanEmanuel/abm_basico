<?php
    require_once('acciones/conexion.php');
    $sql = "SELECT id_usuario, nombre, email, foto_url, usuarios.id_rol, roles.descripcion AS rol
            FROM usuarios
            INNER JOIN roles ON roles.id_rol = usuarios.id_rol";
    $resultado = mysqli_query($conexion, $sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <header>
        <h1 class="text-white">ABM de Usuarios</h1>

    </header>
    <main class="container">
 

        <div class="row m-4">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <a href="registro.php" class="btn btn-success"> <i class="fa-solid fa-user-plus"></i> Nuevo</a>
        </div>

        <div class="row mt-2">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        
                        <?php

                            while(  $array = mysqli_fetch_assoc($resultado  )  ){
                                // print_r($array);

                                $id_usuario = $array['id_usuario'];
                                $nombre = $array['nombre'];
                                $email = $array['email'];
                                $foto_url = $array['foto_url'];
                                $rol = $array['rol'];

                                echo "<tr>
                                        <td>$id_usuario</td>
                                        <td> <img  src='$foto_url'> </td>
                                        <td>$nombre </td>
                                        <td>$email</td>
                                        <td>$rol</td>
                                        <td>
                                            <a href='acciones/usuarioBaja.php?id_usuario=$id_usuario' class='btn btn-danger btn-sm' title='Eliminar'> <i class='fa-solid fa-trash'></i> </a>
                                            <a href='editar.php?id_usuario=$id_usuario' class='btn btn-info btn-sm' title='Editar'> <i class='fa-solid fa-user-pen'></i> </a>
                                            <a href='detalle.php?id_usuario=$id_usuario' class='btn btn-secondary btn-sm' title='Ver detalle'> <i class='fa-solid fa-eye'></i> </a>
                                        </td>
                                    </tr>";

                            }


                        ?>




                    </tbody>
                </table>

            </div>
            <div class="col-md-2">

            </div>
        </div>
    </main>
    <footer>
        <p> DV | Plataformas de Desarrollo | DMT4BH</p>
    </footer>

</body>
</html>


