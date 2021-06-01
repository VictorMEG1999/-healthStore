<?php
require_once('conexion.php');
class login{
    public function log($email, $pass){
            
            $per= new Conexion();
            $conn=$per->Conectar();
            $datos=null;
            $sql ="SELECT * FROM usuarios WHERE Email=:email AND Password=:pass";
            $log=$conn->prepare($sql);
            $log->bindParam(':email',$email);
            $log->bindParam(':pass',$pass);
            $log->execute();
            
            while($info=$log->fetch()){
                $datos[] = $info;
            }
            return	$datos;
    }
}
?>