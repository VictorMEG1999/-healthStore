<?php
if (!isset($_SESSION['health5toreUserPerfil'])|| !$_SESSION['health5toreUserPerfil']=='u'){
    header('Location:/healthStore/index.php?p=login&po=carritto');
    exit();
}  
require_once('conexion.php');
class agregaraCarrito{
    public function agregara($Id_pro){
        $per= new Conexion();
        $conn=$per->Conectar();
        $Id_carrito=[null];
        $id= $_SESSION['health5toreUser'];
        
                             
        $sql ="SELECT Id_carrito FROM carrito".$id ."  WHERE Id_pro = :Id_pro";
        $carito=$conn->prepare($sql);
        $carito->bindParam(':Id_pro',$Id_pro);
        $carito->execute();     
        while($info=$carito->fetch()){
            $Id_carrito = $info;
        }
       
            
   if($Id_carrito[0] == null){
            
            echo $sql ="INSERT INTO carrito".$id." (Id_pro, Cantidad, Estado, Costo) 
                                VALUES (:Id_pro,1,'e',(SELECT (Precio *1) from productos WHERE Id_pro =:Id_pro))" ;
            $carito=$conn->prepare($sql);
            $carito->bindParam(':Id_pro',$Id_pro);
            $carito->execute();
        }else{
            $sql = "UPDATE `carrito".$id."` c, productos p SET c.Cantidad = (c.Cantidad+1), c.Costo = ((c.Cantidad) * p.Precio) 
                    WHERE c.id_pro = p.Id_pro AND (c.Cantidad+1) < p.Stock AND c.Id_carrito =:Id_carrito";
            $carito=$conn->prepare($sql);
            $carito->bindParam(':Id_carrito',$Id_carrito[0]);
            $carito->execute();
        }
        
        
        // return	$carito;
    }
}
?>