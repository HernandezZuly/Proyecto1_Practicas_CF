<?php
session_start();
require_once('../MODELOS/login.php');

if ($_POST) {
    $Correo = $_POST['correo'];
    $Clave = $_POST['clave'];
    $Modelo = new login();
    $entrada = $Modelo->login($Correo, $Clave);
    
    if ($entrada != false) {
        header('Location: ../VISTAS/listar.php');
    } else {
        $_SESSION['error_message'] = 'Usuario no existente'; // Almacena el mensaje de error
        header('Location: ../VISTAS/login.php');
    }
}
?>