<?php

    require('../models/login.php');
    $login = new login();
    //aptura de bono 
    if(isset($_POST['Acceder'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        
        if(!isset($_GET['po'])){
            $p ='home';
        }else{
            $p = $_GET['po'];
        }

        if(isset($_GET['categoria'])){
            $categoria = "&categoria=".$_GET['categoria'];
        }else{
            $categoria = NULL;
        }
        
        if(isset($_GET['search'])){
            $search ="&search=". $_GET['search'];
        }else{
            $search = NULL;
        }
        
        
        // validacón de usuario
        $user = $login->log($email,$pass);
        
        if ($user != NULL){
            session_start();
            foreach($user as $datos){
                $_SESSION['health5toreUser'] = $datos['Id_usuario'];
                $_SESSION['health5toreUserPerfil'] = $datos['Perfil'];
            }
            header('Location:/index.php?p='.$p.$categoria.$search);
        }
        else{
            header('Location:/index.php?p=login&error="true"&email='.$email.$categoria.$search."&po=".$p);
            exit(); 
        }
    }
    
?>