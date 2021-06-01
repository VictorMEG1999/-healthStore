<?php

    if (!isset($_SESSION['health5toreUserPerfil'])|| !$_SESSION['health5toreUserPerfil']=='u'){
        header('Location:/index.php?p=login&po=carritto');
        exit();
    }   

    require('models/carrito.php');
    $construcTable = new construcTable();
    $carrito = new carrito();
    
    $resultado = null;
    if(!isset($_GET['SUP'])){
        $_GET['SUP']="Carrito";
      }

    $resultado = $carrito->contenCarrito($_GET['SUP']);
   
    if ($resultado==null){
        ?>
            <h3> No hay productos en el carrito. </h3>
        <?php
    }else{
        $infoGenerl=$carrito->infoGenerl();
        $construcTable->tabla($resultado,$infoGenerl);
        
    }
    class construcTable{
        
        function tabla($resultado,$infoGenerl){
          ?>
            <div class="container shadow bg-white">
            <?php
                foreach($resultado as $carrito){
                    ?>
                
                    <div class="row mt-3 mr-3 mb-3">
                        <div class="col-sm-2">
                            <img src='public\medios\<?php echo $carrito['Img'];?>'
                            class="img-thumbnail card-img-top"style="width: 7rem; height:7rem;">
                        </div>
                        <div class="col-sm-6 row align-items-center">
                            <h5> 
                                <?php echo $carrito['Nombre_pre'];?>
                            </h5>
                        </div>
                        <div class="col-sm-2 row align-items-center mt-5">
                            <div class="input-group ">
                                <form method="POST" class="input-group form" action="controllers/accionesCarrito.php?id=<?php echo $carrito['Id_carrito'];?>">
                                    
                                    <div class="input-group-append">
                                        <button type="submit"name="minus" class="btn btn-outline-primary btn-sm  minus">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    
                                    <input type="text" id="<?php echo $carrito['Id_carrito'];?>"value="<?php echo $carrito['Cantidad'];?>" class="form-control cantidad col-sm-4 col-form-label col-form-label-sm text-center">
                                    
                                    <div class="input-group-prepend">
                                        <button type="submit"name="plus" class="btn btn-outline-primary btn-sm plus">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    
                                </form>
                                <p class="text-muted"><small><?php echo $carrito['Stock'];?> disponibles </small></p>
                            </div>
                        </div>
                        <div class="col-sm-3 row align-items-center">
                            <h1>
                                $  <?php echo $carrito['Costo'];?>
                            </h1>
                        </div>
                    </div>
                    <div class="row col-sm-10 mt-3 mr-3 mb-3 d-flex justify-content-around">
                        <div class="col ">
                            <!-- <a class="text-primary text-decoration-none" href="controllers/accionesCarrito.php?Comprar=<?php echo $carrito['Id_carrito'];?>">
                                Comprar ahora
                            </a>  -->
                        </div>
                        <div class="col ">
                            <?php
                            if( $_GET['SUP']=="Carrito"){
                                ?>
                                    <a class="text-success text-decoration-none" href="controllers/accionesCarrito.php?Guardar=<?php echo $carrito['Id_carrito'];?>">
                                        Guardad para desesperes 
                                    </a>
                                <?php
                            }else if($_GET['SUP']=="Guardados"){
                                ?>
                                    <a class="text-success text-decoration-none" href="controllers/accionesCarrito.php?Agregar=<?php echo $carrito['Id_carrito'];?>">
                                        Agregar al carrito  
                                    </a>
                                <?php
                            }
                            ?>
                             
                        </div>
                        <div class="col text-danger">
                            <a class="text-danger text-decoration-none" href="controllers/accionesCarrito.php?Eliminar=<?php echo $carrito['Id_carrito'];?>" >
                                Eliminar
                            </a>
                        </div>
                    </div>
                    <div class=" container   dropdown-divider"></div>
                <?php
            }
            //carrito foter


            if( $_GET['SUP']=="Carrito"){
                  
                foreach($infoGenerl as $general){
                ?>
                    <div class="container  bg-whitev text-right mr-4">
                        <div class="row justify-content-end">
                            <div class="col-2">
                        <p  class="text-muted"> productos (<?php echo $general['Cantidad']?>)</p>
                            </div>
                            <div class="col-2">
                                $ <?php echo $general['Costo']?>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-6">
                                <a class="text-primary text-decoration-none" href="#">
                                    ¿Cuál es el costo de envío? 
                                </a> 
                            </div>
                            <div class="col-2"></div>
                        </div>
                        <div class="row justify-content-end mt-4">
                            <div class="col-2">
                            <h4>Total</h4>
                            </div>
                            <div class="col-2">
                            <h3>$ <?php echo $general['Costo']?></h3>
                            </div>
                        </div>
                    </div>
                    <div class=" container   dropdown-divider"></div>
                    <div class="container bg-white mb-4">
                        <div class="row justify-content-end">
                        <a href="?p=infoCompra">
                            <button type="button"  class="btn btn-primary btn-lg">
                                Continuar compora
                            </button>
                        </a>
                        </div>
                    </div>
                </div>
                <?php
                }
            }
        }
    }
?>