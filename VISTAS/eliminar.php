<?php
require_once('../MODELOS/usuario.php');
$model = new Usuario();
$model->idUsuario=$_GET["idUsuario"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/estilos.css">
    <title>Credifamilia</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-light">
            <h2>Credifamilia CF</h2>
            <a class="navbar-brand mb-0 h1" href="listar.php">Volver</a>
        </nav>
    </header>
    <section class="contenedor-eliminar">
        <form action="../CONTROLADORES/eliminar.php" method="POST" enctype="multipart/form-data">
            <div>
                <h1>Eliminar Usuario</h1>
                <p>Esta seguro que quiere eliminar este registro ¿Desea Continuar?</p>
                <input type="hidden" name="idUsuario" value="<?php echo $model->idUsuario;?>">
            </div>
            <div class="caja-boton">
                <button type="submit" class="btn boton">ELIMINAR</button>
            </div>
        </form>
    </section>
</body>
</html>