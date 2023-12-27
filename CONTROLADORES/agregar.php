<?php
require_once('../MODELOS/usuario.php');
if ($_POST) {
    $ModeloUsuario = new Usuario();
    $numero_documento = $_POST['numero_documento'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $idCiudad = $_POST['idCiudad'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $telefono = $_POST['telefono'];
    $idOcupacion = $_POST['idOcupacion'];

    // Crea objetos DateTime para la fecha actual y la fecha de nacimiento
    $fechaActual = new DateTime();
    $fechaNacimiento = new DateTime($fecha_nacimiento);

    // Calcula la diferencia entre las dos fechas con el diff
    $diferencia = $fechaActual->diff($fechaNacimiento);

    // Obtiene la edad desde el objeto de diferencia y extrae el componente de años
    $edad = $diferencia->y;

    if ($edad>=18 & $edad<=65) {
        $viabilidad = "Viable";
    } else {
        $viabilidad = "No viable";
    }

    $ModeloUsuario->Agregar($numero_documento, $nombre, $apellido, $fecha_nacimiento, $idCiudad, $correo, $clave, $telefono, $idOcupacion, $viabilidad);
} else {
    header('Location: ../VISTAS/crear.php');
}
