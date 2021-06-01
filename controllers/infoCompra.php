<?php
session_start();
if (!isset($_SESSION['health5toreUserPerfil'])|| !$_SESSION['health5toreUserPerfil']=='u'){
    header('Location:/index.php?p=login');
    exit();
} 

if(isset($_POST['Comprar'])){

    require('../models/infoCompra.php');
    $compra = new compra();
    $Estado = $_POST['Estado'];
    $Delegacion = $_POST['Delegación'];
    $Calle = $_POST['Calle'];
    $No_exterior = $_POST['No_exterior'];
    $No_Interior = $_POST['No_Interior'];
    $Codigo_postal = $_POST['Código_postal'];
    $Telefono = $_POST['Teléfono'];
    try{
        $compra->incoCompra($Estado, $Delegacion, $Calle, $No_exterior, $No_Interior,  $Codigo_postal, $Telefono);
        header('Location:/index.php?p=productos');
    }catch(Exception $e){
        // echo $e;
        header('Location:/index.php?p=carrito&error=true');
    }
}

?>