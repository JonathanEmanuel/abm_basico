<?php
    require_once('acciones/conexion.php');
    $sql = "SELECT id_rol, descripcion
            FROM roles";
    $resultado = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM | Alta</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1 class="text-white">Registro</h1>
    </header>
    <main class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form action="acciones/usuarioAlta.php"  method="post" class="card p-3">
                    <label for="">Nombre</label>
                    <input name="nombre" class="form-control mb-2" type="text">

                    <label for="">Apellido</label>
                    <input name="apellido" class="form-control mb-2" type="text">

                    <label for="">Rol</label>
                    <select name="id_rol" class="form-control mb-2">
                        <?php

                            while(  $array = mysqli_fetch_assoc($resultado  )  ){ 
                                $id_rol = $array['id_rol'];
                                $descripcion = $array['descripcion'];
                                echo "<option  value='$id_rol '>$descripcion</option>";
                            }
                        ?>               
                    </select>

                    <label for="">Email</label>
                    <input name="email" class="form-control mb-2" type="email">

                    <label for="">Contraseña</label>
                    <input name="clave" class="form-control mb-2" type="password">

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