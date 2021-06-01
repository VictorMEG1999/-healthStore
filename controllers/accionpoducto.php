<?php
    session_start();
    if (!isset($_SESSION['health5toreUserPerfil'])|| !$_SESSION['health5toreUserPerfil']=='a'){
        header('Location:/index.php?p=login');
        exit();
    } 
    require('../models/accionpoducto.php');
    $accionpoducto =new accionpoducto();
    $ruta="Location:/index.php?p=productos&categoria=".$_GET['categoria'];
    if(isset($_GET['search'])){
        $ruta +='&search='.$_GET['search'];
    }

    if(isset($_POST['Descartar'])){
        $accionpoducto->Inactivo($_POST['Descartar']);
        header($ruta);
        exit();
    }
    if(isset($_POST['Actvar'])){
        $accionpoducto->Activo($_POST['Actvar']);
        header($ruta);
        exit();
    }
?>