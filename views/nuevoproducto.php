<?php
if (!isset($_SESSION['health5toreUserPerfil'])|| !$_SESSION['health5toreUserPerfil']=='a'){
    header('Location:/healthStore/index.php?p=login&po=nuevoProducto');
    exit();
}   
?>

<div class="container">
    <div class="card col-md-5 mx-auto mt-5 mb-5 shadow ">
        <div class="card-header mt-2 "> Nevo producto </div>
        <div class="card-body">
            <form method="POST" action="controllers/nuevoproducto.php" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-label-group">
                        <label for="exampleFormControlTextarea1"> Nombre de producto </label>
                        <input type="text"
                            class="form-control nombre <?php echo(isset($_GET['error1']))?"is-invalid":""; ?>"
                            name="Nombtrproducto" placeholder="Nombre de producto" required="required"
                            autofocus="autofocus">
                        <div class="invalid-feedback">
                            El producto ya existe en el catalogo.
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="form-label-group">
                        <label for="exampleFormControlTextarea1 "> Precio </label>
                        <input type="number"class="form-control precio"  name="Precio" placeholder="Precio" required="required"
                            autofocus="autofocus">
                    </div>
                </div>
                <div class="col-auto my-1">
                    <div class="custom-control custom-checkbox mr-sm-2 checkOferta">
                        <input type="checkbox" class="custom-control-input" id="checkOferta">
                        <label class="custom-control-label" for="checkOferta">Oferta</label>
                    </div>
                </div>

                
                <div class="oferta ">
                    <div class="form-group">
                        <div class="form-label-group ">
                            <label for="exampleFormControlTextarea1 "> Precio anterior </label>
                            <input type="number"class="form-control anterior " value="null" name="oferta" placeholder="Precio anterior" 
                                autofocus="autofocus">
                            <div class="invalid-feedback">
                                El producto ya existe en el catalogo.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <div class="form-label-group">
                            <label >Existencia</label>
                            <input type="number" class="form-control" name="Stock"
                                placeholder="Cantidad de producto en almacén" required="required" autofocus="autofocus">
                        </div>
                    </div>
    
                    <div class="form-group col-6">
                        <label for="inputState" value="a" >Categoría</label>
                        <select id="inputState"name="categoria" class="form-control">

                        <?php
                            foreach($categaria as $cat){
                                ?>
                                    <option><?php echo $cat['Categoria'];?></option>
                                <?php
                            }
                            ?>
                           
                        </select>
                    </div>
                </div>
               

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descripción   </label>
                    <textarea class="form-control"  name="descripcion" rows="3" required="required"></textarea>
                </div>

                <div class="form-group <?php if(isset($_GET['error2'])||isset($_GET['error3'])){echo"is-invalid";}?>">
                    <label for="exampleFormControlFile1">Imagen de producto</label>
                    <input type="file" class="form-control-file" name="imagen" title="Imagen de product"
                        placeholder="Imagen de product">
                </div>
                <div class="invalid-feedback">
                     
                    <?php 
                        if(isset($_GET['error2']))
                        {echo"El tamaño es del archivo invalido.";}
                        if (isset($_GET['error3']))
                        {echo"El formato es del archivo invalido. ";}
                        
                        if (isset($_GET['error4']))
                        {echo"Es neceara agregar una imagen.";}
                    ?>

                </div>

                <input type="submit" class="btn btn-primary btn-block " name="Agregar" value="Agregar" />

                <div class="text-center">
                    <a class="d-block small mt-3" href="?p=home">Inicio</a>
                </div>

            </form>
        </div>
    </div>
</div>
<script src="public/js/nuevoproducto.js"></script>
