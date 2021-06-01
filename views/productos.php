<div class="btn-group " >
  <div class=" d-flex justify-content-start" >         
    <h1 class="mr-3"> Productos </h1>
  </div>
</div>

<div class=" py-md-3  bg-light justify-content-around row">
  
    <?php
    
        include('controllers/productos.php');
    ?>
</div>

<?php
  if (isset($_SESSION['health5toreUserPerfil']) && $_SESSION['health5toreUserPerfil']=='a'){
  ?>
    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <div class="justify-content-center mr-4">
              <i class="fas fa-exclamation-triangle fa-5x "style="color: #dc3545;" ></i>
            </div>
            <h5 class="modal-title" id="exampleModalLabel">
              ¿Esta seguro de Descartar el producto del cataloga?  
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Los clientes ya no podrán adquirir el producto.</p>
          </div>
          <div class="modal-footer">
            <form  method="POST" action="controllers/accionpoducto.php<?php echo"?categoria=".$_GET['categoria']; echo (isset($_POST['search']))?"?search=".$_POST['search']:"";?>">
              <button type="submit" class="btn btn-danger"id="Descartar" name="Descartar" value="">Descartar</button>
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
    
  <?php
  }else{
    ?>
      <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <div class="justify-content-center mr-4">
              <img src="#" 
                class="img-thumbnail card-img-top muestraImg" 
                style="width: 6rem; height:6rem;">  
            </div>

            <h5 class="modal-title muestraNombre" id="exampleModalLabel"> 
              
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="muestraInfo">
              
            </p>
          </div>
          <div class="modal-footer">
          <form  method="POST" 
            action="controllers/agregaraCarrito.php<?php echo"?categoria=".$_GET['categoria']; echo (isset($_GET['search']))?"&search=".$_GET['search']:"";?>">
              <button type="submit" class="btn btn-info btn-sm mr-2 Agregar" name="Agregar">
                <i class="fas fa-cart-plus fa-fw "></i>
                  Agregar al carrito 
              </button>
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    <?php
  }
?>
<script src="public/js/productos.js"></script>