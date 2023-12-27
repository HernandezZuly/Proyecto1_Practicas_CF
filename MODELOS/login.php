<?php
session_start();
require_once('conexion.php');

class login {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = conexion::StartUp();
        } catch (Exception $e) {
            echo "HAY PROBLEMAS DE CONEXION";
            die($e->getMessage());
        }
    }

    public function login($Correo, $Clave) {
        $stm = $this->pdo->prepare("SELECT * FROM Usuario WHERE correo = :correoI AND clave = :claveI");
        $stm->bindParam(':correoI', $Correo, PDO::PARAM_STR);
        $stm->bindParam(':claveI', $Clave, PDO::PARAM_STR);
        $stm->execute();

        if ($stm->rowCount() == 1) {
            $result = $stm->fetch();
            
            $_SESSION['correo'] = $result["correo"];
            $_SESSION['idUsuario'] = $result['idUsuario'];
            return $result['correo'];
        }

        return false; // Usuario no encontrado
    }

    public function GetIdUsuario() {
        return $_SESSION['idUsuario'];
    }
}
?>