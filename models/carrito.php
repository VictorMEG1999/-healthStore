<?php
if (!isset($_SESSION['health5toreUserPerfil'])|| !$_SESSION['health5toreUserPerfil']=='u'){
    header('Location:/healthStore/index.php?p=login&po=carritto');
    exit();
}  
require_once('conexion.php');
class carrito{
    public function contenCarrito($tipo){
            $per= new Conexion();
            $conn=$per->Conectar();
            $id= $_SESSION['health5toreUser'];
            $datos=null;
            switch($tipo){
                case "Carrito":
                    $sql ="SELECT * FROM carrito".$id ." c ,productos p WHERE c.Id_pro = p.Id_pro AND c.Estado = 'e'";
                break;
                case "Guardados":
                    $sql ="SELECT * FROM carrito".$id ." c ,productos p WHERE c.Id_pro = p.Id_pro  AND c.Estado = 'p'";
                break;
            }
            
            $carito=$conn->prepare($sql);
            $carito->execute();
            while($info=$carito->fetch()){
                $datos[] = $info;
            }
            return	$datos;
    }
    public function infoGenerl(){
        $per= new Conexion();
        $conn=$per->Conectar();
        $id= $_SESSION['health5toreUser'];
        $datos=null;
        $sql =" SELECT SUM(Cantidad) as Cantidad,SUM(Costo) as Costo FROM carrito".$id ;
        $carito=$conn->prepare($sql);
       
        $carito->bindParam(':id',$id);
        $carito->execute();
        
        while($info=$carito->fetch()){
            $datos[] = $info;
        }
        return	$datos;
}
}
?>