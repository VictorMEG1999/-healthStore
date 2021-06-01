<?php
require_once('conexion.php');
class rejistro{
    public function newUser($Nombtr,$Ap_paterno,$Ap_materno,$Email,$Password){
     
            $per= new Conexion();
            $conn=$per->Conectar();
            $sql ="INSERT INTO `usuarios`( `Nombtr`, `Ap_paterno`, `Ap_materno`, `Email`, `Password`, `Perfil`) 
                                        VALUES(:Nombtr,:Ap_paterno,:Ap_materno,:Email,:Password,'u')";
            $newUser=$conn->prepare($sql);
            $newUser->bindParam(':Nombtr',$Nombtr);
            $newUser->bindParam(':Ap_paterno',$Ap_paterno);
            $newUser->bindParam(':Ap_materno',$Ap_materno);
            $newUser->bindParam(':Email',$Email);
            $newUser->bindParam(':Password',$Password);
            $newUser->execute();
            return $newUser;
    }
    public function createCarrito($id)
    {
        $per= new Conexion();
        $conn=$per->Conectar();
        $sql ="	
        CREATE table carrito".$id."(
                Id_carrito int (11) PRIMARY key AUTO_INCREMENT,
                Id_pro int (11) NOT NULL,
                Cantidad int(11) NOT NULL,
                Costo	decimal(19,2) NOT NULL,
                Estado CHAR(1) NOT NULL,
                Id_compra int,
                FOREIGN KEy(Id_pro) REFERENCES productos (Id_pro),
                FOREIGN KEy(Id_compra) REFERENCES compras (Id_compra)
            )       
        ";
        $createCarrito=$conn->prepare($sql);
        $createCarrito->execute();
        return $createCarrito;
    }
}
?>