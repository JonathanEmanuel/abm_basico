<?php
    require_once('acciones/conexion.php');
    $sql = "SELECT id_rol, descripcion
            FROM roles";
    $resultado = mysqli_query($conexion, $sql);


    if( isset( $_GET['id_usuario'] )  ){
        $id_usuario = $_GET['id_usuario'] ;

        $sql2 = "SELECT id_usuario, nombre, apellido, email, id_rol
                FROM usuarios
                WHERE id_usuario = $id_usuario";

        $resultado2 = mysqli_query($conexion, $sql2);

        $arrayUsuario =  mysqli_fetch_assoc($resultado2  );

        $nombre = $arrayUsuario['nombre'];
        $apellido = $arrayUsuario['apellido'];
        $email = $arrayUsuario['email'];
        $id_rol = $arrayUsuario['id_rol'];

    }




?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM | Modificar </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1 class="text-white">Modificar Usuario</h1>
    </header>
    <main class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form  enctype="multipart/form-data" action="acciones/usuarioActualizar.php?id_usuario=<?php echo $id_usuario; ?>"  method="post" class="card p-3">
                    <label for="">Nombre</label>
                    <input value="<?php echo $nombre;  ?>" class="form-control mb-2" name="nombre" type="text">

                    <label for="">Apellido</label>
                    <input value="<?php echo $apellido;  ?>" class="form-control mb-2" name="apellido" type="text">

                    <label for="">Rol</label>
                    <select value="<?php echo $id_rol;  ?>" name="id_rol" class="form-control mb-2">
                        <?php

                            while(  $array = mysqli_fetch_assoc($resultado  )  ){ 
                                $id_rol = $array['id_rol'];
                                $descripcion = $array['descripcion'];
                                echo "<option  value='$id_rol'>$descripcion</option>";
                            }
                        ?>               
                    </select>

                    <label for="">Email</label>
                    <input value="<?php echo $email;  ?>" class="form-control mb-2" name="email" type="email" >

                    <label for="">Foto</label>
                    <input name="foto" type="file" class="form-control mb-2" >



                    <button type="submit" class="btn btn-success">Guardar</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </main>
    <footer>
        <p> DV | Plataformas de Desarrollo | DMT4BH</p>
    </footer>
</body>
</html>