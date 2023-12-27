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
    <script src="https://kit.fontawesome.com/d17bb92425.js" crossorigin="anonymous"></script>
    <script src="JS/valiadaciones.js"></script>
    <link rel="stylesheet" href="CSS/estilos.css">
    <title>Credifamilia</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-light">
            <h2>Credifamilia CF</h2>
            <a class="navbar-brand mb-0 h1 nav" href="crear.php">Nuevo Registro</a>
        </nav>
    </header><br>
    <h1>Listado de Usuarios</h1>
    <section class="tabla">
        <label>Ordenar por:</label>
            <select id="ordenarPor" class="buscar" onchange="ordenarLista()">
                <option class="dropdown-item" id="opcion" value="numero_documento">Numero de documento</option>
                <option class="dropdown-item" id="opcion" value="nombre">Nombre</option>
                <option class="dropdown-item" id="opcion" value="apellido">Apellido</option>
                <option class="dropdown-item" id="opcion" value="fecha_nacimiento">Fecha de nacimiento</option>
                <option class="dropdown-item" id="opcion" value="ciudad">Ciudad</option>
                <option class="dropdown-item" id="opcion" value="correo">Correo</option>
                <option class="dropdown-item" id="opcion" value="telefono">Telefono</option>
                <option class="dropdown-item" id="opcion" value="ocupacion">Ocupación</option>
            </select><br><br>
        <table class="table table-bordered">
            <tr>
                <th cope="col">Numero de documento</th>
                <th cope="col">Nombre</th>
                <th cope="col">Apellido</th>
                <th cope="col">Fecha de nacimiento</th>
                <th cope="col">Ciudad</th>
                <th cope="col">Correo</th>
                <th cope="col">Telefono</th>
                <th cope="col">Ocupación</th>
                <th cope="col">Acciones</th>
            </tr>
            <?php
            // Obtener el criterio de ordenamiento desde la consulta GET
            $criterio = isset($_GET['criterio']) ? $_GET['criterio'] : 'numero_documento';

            // Consulta única que involucra las tres tablas y ordena por el criterio seleccionado
            $STH = $pdo->prepare("SELECT Usuario.idUsuario, Usuario.numero_documento, Usuario.nombre, Usuario.apellido, Usuario.fecha_nacimiento, Ciudad.ciudad, Usuario.correo, Usuario.telefono, Ocupacion.ocupacion
                FROM Usuario
                INNER JOIN Ciudad ON Usuario.idCiudad = Ciudad.idCiudad
                INNER JOIN Ocupacion ON Usuario.idOcupacion = Ocupacion.idOcupacion
                GROUP BY Usuario.numero_documento
                ORDER BY $criterio"); // Agrupar por número de documento para evitar duplicados
            $STH->execute();

            while ($resultado = $STH->fetch()) {
            ?>
                <tr>
                    <td><?php echo $resultado['numero_documento']; ?></td>
                    <td><?php echo $resultado['nombre']; ?></td>
                    <td><?php echo $resultado['apellido']; ?></td>
                    <td><?php echo $resultado['fecha_nacimiento']; ?></td>
                    <td><?php echo $resultado['ciudad']; ?></td>
                    <td><?php echo $resultado['correo']; ?></td>
                    <td><?php echo $resultado['telefono']; ?></td>
                    <td><?php echo $resultado['ocupacion']; ?></td>
                    <td>
                        <a class="enlace1" href="actualizar.php?idUsuario=<?php echo $resultado['idUsuario']; ?>"><i class="fa-solid fa-user-pen icono"></i> Editar</a><br>
                        <a class="enlace2" href="eliminar.php?idUsuario=<?php echo $resultado['idUsuario']; ?>"><i class="fa-solid fa-user-slash icono"></i>Eliminar</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </section>
</body>
</html>