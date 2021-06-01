<?php

class productos{
    function per(){
        if (isset($_SESSION['health5toreUserPerfil'])){
            if ( $_SESSION['health5toreUserPerfil']=='a'){
                $permis = true;
            }else{
                $permis = false;
            }
        }else{
            $permis = false;
        }
        return $permis;
    }


   
    function pro($categoria){
        $productos = NEW productos();
        $per = new Conexion();
        $permis = $productos->per();
        if( $categoria == "Todas las categorías"){
            $categoria ="";
        }else{
            $categoria ="WHERE Categoria='".$categoria."'";
        }
        if ($permis){
            $sql ="SELECT * FROM productos WHERE  Id_categoria in (SELECT Id_categoria FROM categorias ".$categoria.")";
        }else{
            $sql ="SELECT * FROM productos WHERE Estado = 1 AND Id_categoria in (SELECT Id_categoria FROM categorias ".$categoria.")";
        }

        $conn=$per->Conectar();
        $pro=$conn->prepare($sql);
        $pro->execute();
        return $productos->ORDER($pro);
    }
    function buscarPro($dato,$categoria){
        $per= new Conexion();
        $productos = NEW productos();
        
        $dato = '%'.$dato.'%';
        $permis = $productos->per();

        if( $categoria == "Todas las categorías"){
            $categoria ="";
        }else{
            $categoria ="WHERE Categoria='".$categoria."'";
        }
        
        if ($permis){
            $sql ="SELECT * FROM productos  WHERE (Nombre_pre LIKE '".$dato."' OR   descripcion LIKE '".$dato."') AND  Id_categoria in (SELECT Id_categoria FROM categorias ".$categoria.")";
         }else{
            $sql ="SELECT * FROM productos  WHERE (Nombre_pre LIKE '".$dato."' OR   descripcion LIKE '".$dato."') AND Estado = 1 AND Id_categoria in (SELECT Id_categoria FROM categorias ".$categoria.")";
         }
        $conn=$per->Conectar();
        $res=$conn->prepare($sql);
        $res->bindParam(':dato',$dato);
        $res->execute();
        return $productos->ORDER($res);
    }



    function ORDER($res){
        $datos = null;
        while($info=$res->fetch()){
            $datos[] = $info;
        }
        return	$datos;
    }
}

?>