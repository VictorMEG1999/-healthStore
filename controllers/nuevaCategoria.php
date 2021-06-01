<?php
    session_start();
    if (!isset($_SESSION['health5toreUserPerfil'])|| !$_SESSION['health5toreUserPerfil']=='a'){
        header('Location:/index.php?p=login');
        exit();
    } 
    require('../models/nuevaCategoria.php');
    $nuevaCategoria = new nuevaCategoria();
    //aptura de bono 
    if(isset($_POST['Agregar'])){
        $categoria = $_POST['categoria'];
       try{
        $resultado = $nuevaCategoria->new($categoria);
        header('Location:/index.php?p=productos&categoria='.$categoria);
       }
       catch(Exception $e){
        header('Location://index.php?p=nuevaCategoria&error="true"');
       }
        
    }
?>