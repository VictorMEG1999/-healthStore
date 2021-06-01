<?php
session_start();
if(!isset($_GET['p'])){
	$p='home';
}else{
	$p = $_GET['p'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- estilos css  -->
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css">
    <!-- iconos -->
    <link rel="stylesheet" href="public/fontawesome/css/all.css">
    <link rel="shortcut icon" href="public/medios/icon.svg">
    <title>Health Store</title>
</head>
<script src="public/fontawesome/js/all.js"></script>
<script src="public/js/jQuery.js"></script>
<script src="public/bootstrap/js/bootstrap.js"></script>

<body class="bg-light">
    
    <!--  navbar -->
    <?php include("views/nav.php");?>
    <div class="mt-5"> <br> </div>
    <div class="col-md-9 mx-auto">
        <?php 
            /* inplementación de modulos */
            if(file_exists("views/".$p.".php")){
                include("views/".$p.".php");
            }else{
                //titulos de modulos no exitente 
                echo'<h1>El modulo "'.$p.'" no esta disponible </h1> ';
            }
        ?>

    </div>
</body>


</html>