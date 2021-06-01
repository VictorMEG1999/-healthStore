<?php
if (!isset($_SESSION['health5toreUserPerfil'])|| !$_SESSION['health5toreUserPerfil']=='a'){
    header('Location:/healthStore/index.php?p=login');
    exit();
} 
require_once('conexion.php');
class accionpoducto{
    public function Activo($id)
    {
        $per= new Conexion();
        $conn=$per->Conectar();
        $sql ="UPDATE productos SET Estado=1 WHERE Id_pro=:Id_pro";
        $log=$conn->prepare($sql);
        $log->bindParam(':Id_pro',$id);
        $log->execute();
    }
    public function Inactivo($id)
    {
        $per= new Conexion();
        $conn=$per->Conectar();
        $sql ="UPDATE productos SET Estado=0 WHERE Id_pro=:Id_pro";
        $log=$conn->prepare($sql);
        $log->bindParam(':Id_pro',$id);
        $log->execute();
    }
}
?>