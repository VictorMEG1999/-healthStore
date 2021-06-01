<?php
if (!isset($_SESSION['health5toreUserPerfil'])|| !$_SESSION['health5toreUserPerfil']=='a'){
    header('Location:/healthStore/index.php?p=login&po=nuevoProducto');
    exit();
}
require_once('conexion.php');
class nuevoproducto{
    public function newPro($Nombre_pre,$descripcion,$Img,$Precio,$Oferta,$Stock,$categoia){
        
            $per= new Conexion();
            $conn=$per->Conectar();
            
            $datos=null;
            $sql ="SELECT Id_categoria FROM categorias  WHERE Categoria =  '".$categoia."'";
            $categoia=$conn->prepare($sql);
            $categoia->execute();
            while($info=$categoia->fetch()){
                 $datos[] = $info;
            }
            $Id_categoria = $datos[0][0];

          
           if($Oferta == "" || $Oferta == " "|| $Oferta == 0){
            $Oferta=0.00;
           }
            $sql ="INSERT INTO productos(Nombre_pre,Descripcion,Img,Precio,Oferta,Stock,Id_categoria,Estado) 
                        VALUES (:Nombre_pre,:descripcion,:Img,:Precio, :Oferta,:Stock,:Id_categoria,1)";
            $newUser=$conn->prepare($sql);
            $newUser->bindParam(':Nombre_pre',$Nombre_pre);
            $newUser->bindParam(':descripcion',$descripcion);
            $newUser->bindParam(':Img',$Img);
            $newUser->bindParam(':Precio',$Precio);
            $newUser->bindParam(':Oferta',$Oferta);
            $newUser->bindParam(':Stock',$Stock);
            $newUser->bindParam(':Id_categoria',$Id_categoria);
            
            $newUser->execute();
            return $newUser;
    }
}
?>