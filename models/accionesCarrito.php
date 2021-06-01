<?php
if (!isset($_SESSION['health5toreUserPerfil'])|| !$_SESSION['health5toreUserPerfil']=='u'){
    header('Location:/healthStore/index.php?p=login');
    exit();
} 
require_once('conexion.php');


class accionesCarrito{
    public function Guardar($Id_carrito)
    {
        $per= new Conexion();
        $conn=$per->Conectar();
        $id= $_SESSION['health5toreUser'];
        $sql ="UPDATE carrito".$id." SET Estado = 'p' WHERE Id_carrito=:Id_carrito";
        $log=$conn->prepare($sql);
        $log->bindParam(':Id_carrito',$Id_carrito);
        $log->execute();
    }
    public function Eliminar($Id_carrito)
    {
        $per= new Conexion();
        $conn=$per->Conectar();
        $id= $_SESSION['health5toreUser'];
        $sql ="DELETE FROM carrito".$id." WHERE Id_carrito =:Id_carrito";
        $log=$conn->prepare($sql);
        $log->bindParam(':Id_carrito',$Id_carrito);
        $log->execute();
    }
    public function plus($Id_carrito)
    {
        $per= new Conexion();
        $conn=$per->Conectar();
        $id= $_SESSION['health5toreUser'];
        $sql="UPDATE `carrito".$id."` c, productos p SET c.Cantidad = (c.Cantidad+1), c.Costo = ((c.Cantidad) * p.Precio) 
                    WHERE c.id_pro = p.Id_pro AND (c.Cantidad+1) < p.Stock AND c.Id_carrito =:Id_carrito";
         $log=$conn->prepare($sql);
         $log->bindParam(':Id_carrito',$Id_carrito);
         $log->execute();
    }
    public function minus($Id_carrito)
    {
        $per= new Conexion();
        $conn=$per->Conectar();
        $id= $_SESSION['health5toreUser'];
        $sql="UPDATE `carrito".$id."` c, productos p SET c.Cantidad = (c.Cantidad-1), c.Costo = ((c.Cantidad) * p.Precio) 
                    WHERE c.id_pro = p.Id_pro AND (c.Cantidad-1) > 0 AND c.Id_carrito =:Id_carrito";
         $log=$conn->prepare($sql);
         $log->bindParam(':Id_carrito',$Id_carrito);
         $log->execute();
    }
    public function cantidadManual($Id_carrito,$cantidad)
    {
        $per= new Conexion();
        $conn=$per->Conectar();
        $id= $_SESSION['health5toreUser'];
        $sql="UPDATE `carrito".$id."` c, productos p SET c.Cantidad=:cantidad, c.Costo = (c.Cantidad * p.Precio) 
        WHERE c.id_pro = p.Id_pro AND c.Cantidad > 0 AND  p.Stock >= :cantidad  AND c.Id_carrito =:Id_carrito";
        $log=$conn->prepare($sql);
        $log->bindParam(':Id_carrito',$Id_carrito);
        $log->bindParam(':cantidad',$cantidad);
        return$resultado=$log->execute();
        // if ($resultado==null){
        //     return $cantidad; 
        // }else{
        //     return "fallo";
        // }
    }
    public function Agregar($Id_carrito)
    {
        $per= new Conexion();
        $conn=$per->Conectar();
        $id= $_SESSION['health5toreUser'];
        $sql ="UPDATE carrito".$id." SET Estado = 'e' WHERE Id_carrito=:Id_carrito";
        $log=$conn->prepare($sql);
        $log->bindParam(':Id_carrito',$Id_carrito);
        $log->execute();
    }
}
?>