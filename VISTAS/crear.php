<?php
require_once('../MODELOS/usuario.php');
require_once('../MODELOS/conexion.php');
$ModeloUsuario = new Usuario();
$model = new Usuario();
$pdo = Conexion::StartUp();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="JS/valiadaciones.js"></script>
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
    <section class="contenedor">
        <div class="imagen">
            <img src="IMG/Agregar.png" alt="">
        </div>
        <form action="../CONTROLADORES/agregar.php" method="POST" enctype="multipart/form-data" class="form-group">
            <h1>Registrar Usuario</h1>
            <div>
                <label>Nombre</label>
                <input type="text" name="nombre" required="true" class="form-control">
            </div><br>
            <div>
                <label>Apellido</label>
                <input type="text" name="apellido" required="true" class="form-control">
            </div><br>
            <div>
                <label>Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" required="true" class="form-control">
            </div><br>
            <div>
                <label>Numero de documento</label>
                <input type="number" name="numero_documento" required="true" class="form-control">
            </div><br>
            <div>
                <label>Correo</label>
                <input type="email" name="correo" required="true" class="form-control">
            </div><br>
            <div>
                <label>Contraseña</label>
                <input type="text" name="clave" required="true" class="form-control">
            </div><br>
            <div>
                <label>Telefono</label>
                <input type="number" name="telefono" required="true" class="form-control">
            </div><br>
            <div>
                <label>Ciudad</label>
                <select name="idCiudad" required class="form-control">
                    <option value="" disabled selected></option>
                    <?php
                    try {
                        //preparar la sentencia
                        $STH = $pdo->prepare("SELECT * FROM Ciudad");
                        $STH->execute();
                        
                        //Realizar ciclo para que recorra el arreglo
                        while ($row = $STH->fetch()) {
                            //creacion de variable en la cual se va guardar el array
                            $idciudad = $row["idCiudad"];
                            echo "<option value='$idciudad' >";
                            echo $row["ciudad"];
                            echo "</option>";
                        }
                    } catch (PDOException $e) {
                        echo "I'm sorry, Dave. I'm afraid I can't do that.";
                        file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
                    }
                    ?>
                </select>
            </div><br>
            <div>
                <label>Ocupación</label>
                <select name="idOcupacion" required class="form-control">
                    <option value="" disabled selected></option>
                    <?php
                    try {
                        //preparar la sentencia
                        $STH = $pdo->prepare("SELECT * FROM Ocupacion");
                        $STH->execute();
                        
                        //Realizar ciclo para que recorra el arreglo
                        while ($row = $STH->fetch()) {
                            //creacion de variable en la cual se va guardar el array
                            $idocupacion = $row["idOcupacion"];
                            echo "<option value='$idocupacion' >";
                            echo $row["ocupacion"];
                            echo "</option>";
                        }
                    } catch (PDOException $e) {
                        echo "I'm sorry, Dave. I'm afraid I can't do that.";
                        file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
                    }
                    ?>
                </select>
            </div><br>
            <div class="caja-boton">
                <button type="submit" class="btn boton" onclick="return registro()">GUARDAR</button>
            </div>
        </form>
    </section>
</body>

</html>