<?php
require_once('conexion.php');
class nuevaCategoria{
    public function new($categoria){
            
            $per= new Conexion();
            $conn=$per->Conectar();
            $datos=null;
            $sql ="INSERT INTO categorias (Categoria) VALUES (:categoria)";
            $new=$conn->prepare($sql);
            $new->bindParam(':categoria',$categoria);
            $new->execute();
            
            return	$new;
    }
}
?>