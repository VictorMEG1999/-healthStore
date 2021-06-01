<?php
if (!isset($_SESSION['health5toreUserPerfil'])|| !$_SESSION['health5toreUserPerfil']=='a'){
    header('Location:/healthStore/index.php?p=login&po=nuevoProducto');
    exit();
}
require_once('conexion.php');
class compra{
    public function incoCompra($Estado, $Delegacion, $Calle, $No_exterior, $No_Interior,  $Codigo_postal, $Telefono){
            
        $per= new Conexion();
        $conn=$per->Conectar();
        $Id_usuario = $_SESSION['health5toreUser'];
        $Id_compra = $Id_usuario.rand(0,10000);
        if($No_Interior == "" || $No_Interior == " " ){
            $No_Interior=null;
           }
        $sql ="INSERT INTO compras (Id_compra,Id_usuario,Estado,Delegacion,Calle,No_exterior,No_Interior,Codigo_postal,Telefono) 
                VALUES(:Id_compra,:Id_usuario, :Estado, :Delegacion, :Calle, :No_exterior, :No_Interior, :Codigo_postal, :Telefono)";
        $log=$conn->prepare($sql);
        $log->bindParam(':Id_compra',$Id_compra);
        $log->bindParam(':Id_usuario',$Id_usuario);
        $log->bindParam(':Estado',$Estado);
        $log->bindParam(':Delegacion',$Delegacion);
        $log->bindParam(':Calle',$Calle);
        $log->bindParam(':No_exterior',$No_exterior);
        $log->bindParam(':No_Interior',$No_Interior);
        $log->bindParam(':Codigo_postal',$Codigo_postal);
        $log->bindParam(':Telefono',$Telefono);
        $log->execute();

        $sql ="SELECT * FROM carrito".$Id_usuario." WHERE Estado = 'e'";
        $productos=$conn->prepare($sql);
        $productos->execute();
        while($info=$productos->fetch()){
            
            $sql = "UPDATE productos SET Stock= (Stock -:Stock) WHERE Stock>=:Stock and Id_pro =:Id_pro";
            $upproductos=$conn->prepare($sql);
            $upproductos->bindParam(':Stock',$info['Cantidad']);
            $upproductos->bindParam(':Id_pro',$info['Id_pro']);
            $upproductos->execute();
           //actualisasion de carrito
           $sql = "UPDATE carrito".$Id_usuario." SET Estado= 'c' , Id_compra = :Id_compra WHERE Id_carrito =:Id_carrito";
           $upproductos=$conn->prepare($sql);
           $upproductos->bindParam(':Id_carrito',$info['Id_carrito']);
           $upproductos->bindParam(':Id_compra',$Id_compra);
           $upproductos->execute();
        }
        
            
    }
}
?>