<?php
require_once('conexion.php');
class categorias{
    public function seleccategorias(){
            
            $per= new Conexion();
            $conn=$per->Conectar();
            $datos=null;
            $sql ="SELECT * FROM categorias";
            $log=$conn->prepare($sql);
            $log->execute();
            while($info=$log->fetch()){
                $datos[] = $info;
            }
            return	$datos;
    }
}
?>