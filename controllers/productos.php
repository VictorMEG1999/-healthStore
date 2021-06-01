<?php
    require('models/productos.php');
    $construcTable = new construcTable();
    $productos = new productos();
    
    //se berifica si existe una busqueda y se realisa la consulta
    if (isset($_GET['search'])){
        $resultado= $productos->buscarPro($_GET['search'], $_GET['categoria']);
    }else{
        $resultado= $productos->pro( $_GET['categoria']);
    }
    if ($resultado==null){
        ?>
            <h3> No se han encontrado resultados </h3>
        <?php
    }else{
        //se evaluan los permisos
        $per=null;
        if(isset($_SESSION['health5toreUserPerfil'])){
            if ($_SESSION['health5toreUserPerfil']=='a'){
            $per=true;
            }else{
            $per=false;
            }
        }
        if($per){
            //taba de administrador
            $construcTable->tabla($resultado);
        }else{
            //card de usuarios
            $construcTable->card($resultado);
        }
    }
    class construcTable{
        function card($resultado){
            foreach($resultado as $producto){
                ?>
                <div style=" height:37rem;">
                    <div class="card bg shadow "  style="width: 20rem; height:26rem;">
                        <div class="bg-info text-white">
                            <h5 class="card-title ml-4 mt-2 nombre<?php echo $producto['Id_pro'];?>"><?php echo $producto['Nombre_pre'];?></h5>
                        </div>
                        <div class="card-body " style="width: 20rem; height:18rem;">
                            <ul class="list-group list-group-flush">
                                <img src='public\medios\<?php echo $producto['Img'];?>'
                                class="img-thumbnail card-img-top img<?php echo $producto['Id_pro'];?>"style="width: 20rem; height:18rem;">
                            <div class="overflow-auto d-lg-none descripcion<?php echo $producto['Id_pro'];?>" style="width: 18rem; height:4rem;">
                                    <?php echo $producto['descripcion'];?>
                                </div>
                                <li class="list-group-item input-group-prepend">


                                    <div class="row col d-flex align-items-center  ">
                                        <div class="col-10  justify-content-around">
                                            <p class="card-text ">
                                                <?php 
                                                if($producto['Oferta']>0){
                                                    echo '<del class="text-secondary mr-1 Oferta'.$producto['Id_pro'].'">$ ' . $producto['Oferta'].' </del>';
                                                    echo '<i class="fas fa-angle-right"></i>  ';
                                                    echo '<i class="text-success Precio'.$producto['Id_pro'].'"> $ '.$producto['Precio'].'</i>';
                                                }else{
                                                    echo '<i class="text-success Precio'.$producto['Id_pro'].'"> $ '.$producto['Precio'].'</i>'; 
                                                }
                                                ?>
                                            </p>
                                        </div>
                                        
                                        <div class="col-1 ">
                                            <button type="submit" class="btn btn-info agregar" value="<?php echo $producto['Id_pro'];?>"data-toggle="modal" data-target="#exampleModal">
                                                <i class="fas fa-cart-plus fa-fw"></i>
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div >  
                <?php
            }
        }
        function tabla($resultado){
            ?>
           
            <div class="overflow-auto" style="height:30rem;">
                <table class="table table-sm">
                    <thead class="thead-dark">
                        <tr >
                            <th scope="col"> Producto</th>
                            <th scope="col"> Nombre</th>
                            <th scope="col"> Descripción </th>
                            <th scope="col"> Precio </th>
                            <th scope="col"> Precio anterior </th>
                            <th scope="col"> Stock </th>
                            <th scope="col"> Acciones </th>
                        </tr>
                    </thead>    
                    <tbody>
                        <?php
                            foreach($resultado as $producto){
                        ?>
                        <tr class="<?php if($producto['Activo']){echo"table-light";}else{echo"table-active";}?>">
                            <td>
                                <img src='public\medios\<?php echo $producto['Img'];?>'
                                    class="img-thumbnail card-img-top"style="width: 5rem; height:5rem;">
                            </td>
                            <td style="vertical-align:middle;">
                                <?php echo $producto['Nombre_pre'];?>
                            </td>
                            <td  style="vertical-align:middle;">
                                <?php echo $producto['descripcion'];?>
                            </td>
                            <td class="text-right" style="vertical-align:middle;">
                                $ <?php echo $producto['Precio'];?>
                            </td>
                            <td class="text-right" style="vertical-align:middle;">
                                $ <?php echo $producto['Oferta'];?>
                            </td>
                            <td class="text-right" style="vertical-align:middle;">
                                <?php echo $producto['Stock'];?>
                            </td>
                            <td class="align-self-center" style="vertical-align:middle;">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <form method="POST" action="">
                                        <button type="button" class="btn btn-secondary mr-2">
                                            <i class="fas fa-pencil-alt fa-fw"></i>
                                        </button>
                                    </form>
                                    <?php
                                    if($producto['Estado']){
                                        ?>
                                            <button type="submit" class="btn btn-danger Descartar" value="<?php echo $producto['Id_pro'];?>"data-toggle="modal" data-target="#exampleModal">
                                                <i class="fas fa-eye-slash "></i>
                                            </button>
                                        <?php
                                    }else{
                                        ?>
                                        <form method="POST" action="controllers\accionpoducto.php<?php echo"?categoria=".$_GET['categoria']; echo (isset($_POST['search']))?"&search=".$_POST['search']:"";  ?>">
                                            <button type="submit" class="btn btn-info" name="Actvar" value="<?php echo $producto['Id_pro'];?>">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </form>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        }
    }