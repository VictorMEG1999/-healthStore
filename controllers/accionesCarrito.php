<?php
    session_start();
    if (!isset($_SESSION['health5toreUserPerfil'])|| !$_SESSION['health5toreUserPerfil']=='u'){
        header('Location:/index.php?p=login&po=carritto');
        exit();
    }
    require('../models/accionesCarrito.php');
    $accionCarrito = new accionesCarrito();

    if(isset($_GET['Comprar'])){
        echo $_GET['Comprar'];
    }
    if(isset($_GET['Guardar'])){
        $accionCarrito->Guardar($_GET['Guardar']);
        header('Location:/index.php?p=carrito');
        exit();
    }
    if(isset($_GET['Eliminar'])){
        $accionCarrito->Eliminar($_GET['Eliminar']) ;
        header('Location:/index.php?p=carrito');
        exit();
    }
    if(isset($_POST['plus'])){
        $accionCarrito->plus ($_GET['id']);
        header('Location:/index.php?p=carrito');
        exit();
    }
    if(isset($_POST['minus'])){
        $accionCarrito->minus ($_GET['id']);
        header('Location:/index.php?p=carrito');
        exit();
    }

    if(isset($_GET['Agregar'])){
        $accionCarrito->Agregar ($_GET['Agregar']);
        header('Location:/index.php?p=carrito');
        exit();
    }
    if(isset($_POST['cantidad'])){
        echo $accionCarrito-> cantidadManual($_POST['id'],$_POST['cantidad']);
        
    }
?>