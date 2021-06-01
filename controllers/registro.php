<?php
    require('../models/registro.php');
    require('../models/login.php');
    $rejistro = new rejistro();
    $login = new login();
    //aptura de bono 
    if(isset($_POST['Acceder'])){

        $Nombtr = $_POST['Nombtr'];
        $Ap_paterno = $_POST['Ap_paterno'];
        $Ap_materno = $_POST['Ap_materno'];
        $Email = $_POST['Email'];
        $pass = $_POST['pass'];
        try {
            $user = $rejistro->newUser($Nombtr,$Ap_paterno,$Ap_materno,$Email,$pass);
            if ($user != null){

                $user = $login->log($Email,$pass);
                session_start();
                foreach($user as $datos){
                    $_SESSION['health5toreUser'] = $datos['Id_usuario'];
                    $_SESSION['health5toreUserPerfil'] = $datos['Perfil'];
                    $rejistro->createCarrito($datos['Id_usuario']);
                }
               header('Location:/index.php?p=home');
            }
            else{
               header('Location:/index.php?p=registro');
               exit(); 
            }
        } catch (Exception $e) {
            header('Location:/index.php?p=registro&Nombtr='.$Nombtr.'&Ap_paterno='.$Ap_paterno.'&Ap_materno='.$Ap_materno);
        }

    
    }
?>