<?php
    session_start();
    if(isset($_GET['categoria'])){
        $categoria = $_GET['categoria'];
    }
    if(isset($_GET['search'])){
        $search ="&search=". $_GET['search'];
    }else{
        $search = "";
    }
   
    if (!isset($_SESSION['health5toreUserPerfil']) || !$_SESSION['health5toreUserPerfil']=='u'){
        header('Location:/index.php?p=login&po=productos&categoria='. $categoria.$search);
        exit();
    }

    
    if(isset($_POST['Agregar'])){
        $id = $_POST['Agregar'];
        
        require('../models/agregaraCarrito.php');
        $agregaraCarrito = new agregaraCarrito();
        $agregaraCarrito->agregara($id);
        header('Location:/index.php?p=productos&categoria='.$categoria,$search );
        
    }
    ?>