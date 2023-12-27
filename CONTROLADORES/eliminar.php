<?php
require_once('../MODELOS/usuario.php');
    if($_POST){
        $ModeloUsuario=new Usuario();
        $idUsuario=$_POST['idUsuario'];
        $ModeloUsuario->Eliminar($idUsuario);
    }else{
        header('Location:../VISTAS/listar.php');
    }
?>