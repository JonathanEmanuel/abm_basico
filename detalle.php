<?php
    require_once('acciones/conexion.php');

    if( isset( $_GET['id_usuario'] )  ){
        $id_usuario = $_GET['id_usuario'] ;

        $sql = "SELECT id_usuario, nombre, apellido, email, foto_url,
                        usuarios.id_rol, descripcion AS rol
                FROM usuarios
                INNER JOIN roles ON roles.id_rol = usuarios.id_rol
                WHERE id_usuario = $id_usuario";

        $resultado = mysqli_query($conexion, $sql);

        $arrayUsuario =  mysqli_fetch_assoc($resultado  );

        $nombre = $arrayUsuario['nombre'];
        $apellido = $arrayUsuario['apellido'];
        $email = $arrayUsuario['email'];
        $foto_url = $arrayUsuario['foto_url'];
        $id_rol = $arrayUsuario['id_rol'];
        $rol = $arrayUsuario['rol'];

    }


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios | Detalle</title>
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
            <div class="col-md-5">
                <div class="card p-3">
                    <img src="<?php echo $foto_url; ?>" alt="<?php echo $nombre; ?>">
                </div>
            </div>
            <div class="col-md-7">
                <a href="index.php" class="btn btn-success"> <i class="fa-solid fa-left-long"></i> Regresar</a>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td><?php echo $id_usuario; ?></td>
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo $apellido; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $rol; ?></td>
                            <td>
                                <a href='acciones/usuarioBaja.php?id_usuario=<?php echo $id_usuario; ?>' class='btn btn-danger btn-sm'> <i class='fa-solid fa-trash'></i> </a>
                                <a href='editar.php?id_usuario=<?php echo $id_usuario; ?>' class='btn btn-info btn-sm'> <i class='fa-solid fa-user-pen'></i> </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
               

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
