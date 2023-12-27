<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/estilosLogin.css">
    <title>Credifamilia</title>
</head>
<body>
    <section class="seccion">
        <form action="../CONTROLADORES/login.php" method="POST" enctype="multipart/form-data" class="form-group">
            <h1>Iniciar Sesion</h1>
            <div>
                <label>Correo</label>
                <input class="form-control" name="correo" type="email" required="true">
            </div><br>
            <div>
                <label>Contraseña</label>
                <input class="form-control" name="clave" type="password" required="true">
            </div><br>
            <div class="caja-boton">
                <button type="submit" class="btn boton">INGRESAR</button>
            </div><br>
        </form>
    </section>
</body>
</html>