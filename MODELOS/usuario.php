<?php
require_once('conexion.php');
class Usuario{
    private $pdo;
    public $idUsuario;
    public $numero_documento;
    public $nombre;
    public $apellido;
    public $fecha_nacimiento;
    public $idCiudad;
    public $correo;
    public $clave;
    public $telefono;
    public $idOcupacion;
    public $viabilidad;

    //CONECTAR BD
    public function __construct(){
        try{
            $this->pdo = Conexion::StartUp();
        }
        catch(Exception $e){
            echo "No se pudo conectar con la bd";
            die($e->getMessage());
        }
    }

    //METODO PARA AGREGAR
    public function Agregar($numero_documento, $nombre, $apellido, $fecha_nacimiento, $idCiudad, $correo, $clave, $telefono, $idOcupacion, $viabilidad){
        $stm = $this->pdo->prepare("call pa_insertarUsuario( :numero_documento, :nombre, :apellido, :fecha_nacimiento, :idCiudad, :correo, :clave, :telefono, :idOcupacion, :viabilidad)");
        $stm->bindParam(':numero_documento', $numero_documento);
        $stm->bindParam(':nombre', $nombre);
        $stm->bindParam(':apellido', $apellido);
        $stm->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stm->bindParam(':idCiudad', $idCiudad);
        $stm->bindParam(':correo', $correo);
        $stm->bindParam(':clave', $clave);
        $stm->bindParam(':telefono', $telefono);
        $stm->bindParam(':idOcupacion', $idOcupacion);
        $stm->bindParam(':viabilidad', $viabilidad);
        if ($stm->execute()){
            header('Location:../VISTAS/listar.php');
        } else {
            header('Location:../VISTAS/crear.php');
        }
    }

    //METODO PARA CONSULTAR UN USUARIO
    public function Listar(){
        $rows=null;
        $stm=$this->pdo->prepare("call pa_consultarUsuario()");
        $stm->execute();
        while($result=$stm->fetch()){
                $rows[]=$result;
        }
        return $rows;
    }

    //METODO PARA OBTENER EL DOCUMENTO DE UN USUARIO
    public function Obtener($idUsuario){
        $rows=null;
        $stm=$this->pdo->prepare("call pa_consultarUsuarioPorId (:idUsuario)");
        $stm->bindParam(':idUsuario',$idUsuario);
        $stm->execute();
        while($result=$stm->fetch()){
                $rows[]=$result;
        }
        return $rows;
    }

    //METODO PARA ACTUALIZAR UN USUARIO
    public function Actualizar($numero_documento, $nombre, $apellido, $fecha_nacimiento, $idCiudad, $correo, $clave, $telefono, $idOcupacion, $viabilidad, $idUsuario){
        $stm=$this->pdo->prepare("call pa_actualizarUsuario (:idUsuario, :numero_documento, :nombre, :apellido, :fecha_nacimiento, :idCiudad, :correo, :clave, :telefono, :idOcupacion, :viabilidad)");
        $stm->bindParam(':numero_documento', $numero_documento);
        $stm->bindParam(':nombre', $nombre);
        $stm->bindParam(':apellido', $apellido);
        $stm->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stm->bindParam(':idCiudad', $idCiudad);
        $stm->bindParam(':correo', $correo);
        $stm->bindParam(':clave', $clave);
        $stm->bindParam(':telefono', $telefono);
        $stm->bindParam(':idOcupacion', $idOcupacion);
        $stm->bindParam(':viabilidad', $viabilidad);
        $stm->bindParam(':idUsuario', $idUsuario);
        if ($stm->execute()){
            header('Location:../VISTAS/listar.php');
        } else {
            header('Location:../VISTAS/actualizar.php');
        }
    }

    //METODO PARA ELIMINAR UN USUARIO
    public function Eliminar($idUsuario){
        $stm=$this->pdo->prepare("call pa_eliminarUsuario(:idUsuario)");
        $stm->bindParam(':idUsuario', $idUsuario);
        if ($stm->execute()){
            header('Location:../VISTAS/listar.php');
        } else {
            header('Location:../VISTAS/eliminar.php');
        }
    }
}
?>