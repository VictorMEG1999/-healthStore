<?php
session_start();
if (!isset($_SESSION['health5toreUserPerfil'])|| !$_SESSION['health5toreUserPerfil']=='a'){
    header('Location:/index.php?p=login');
    exit();
} 
    //aptura de bono 
    if(isset($_POST['Agregar'])){

  
     
        $Nombtrproducto = $_POST['Nombtrproducto'];
        $Precio = $_POST['Precio'];
        $Stock = $_POST['Stock'];
        $oferta = $_POST['oferta'];
        $descripcion = $_POST['descripcion'];
        $categoia = $_POST['categoria'];
        //gestion de imagen 
        $imagen = null;
        if ($_FILES['imagen']!=null){
            $imagen=$Nombtrproducto.rand(0,10000).".png";
            $taye = $_FILES['imagen']['type'];
            $size = $_FILES['imagen']['size'];
            
            if ($size<=25165824){
                if($taye=="image/jpeg"||$taye=="image/jpg"||$taye=="image/png"||$taye=="image/jfif"){
                    
                    $direction =$_SERVER['DOCUMENT_ROOT'].'/healthStore/public/medios/';
                    try{
                        require('../models/nuevoproducto.php');
                        $newpro = new nuevoproducto();
                        $resultado = $newpro->newPro($Nombtrproducto,$descripcion,$imagen,$Precio,$oferta,$Stock,$categoia);
                        move_uploaded_file($_FILES['imagen']['tmp_name'],$direction.$imagen);
                        $_FILES['imagen']=null;
                        header('Location:/index.php?p=productos&categoria='.$categoia);
                    }catch(Exception $e){
                        header('Location:/index.php?p=nuevoproducto&error1');
                    }
                   
                }else{
                    $_FILES['imagen']=null;
                    header('Location:/index.php?p=nuevoproducto&error3');
                }
            }else{
                $_FILES['imagen']=null;
                header('Location:/index.php?p=nuevoproducto&error2');
            }
        }else{
            header('Location:/index.php?p=nuevoproducto&error4');
        }
    }
?>