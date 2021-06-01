<?php
if (!isset($_SESSION['health5toreUserPerfil'])|| !$_SESSION['health5toreUserPerfil']=='u'){
    header('Location:/healthStore/index.php?p=login&po=carritto');
    exit();
}   
if(isset($_GET['error'])){
  echo'<script type="text/javascript">
    alert("Algo a salido mal");
    </script>';
}
if(!isset($_GET['SUP'])){
  $_GET['SUP']="Carrito";
}
?>



          
    <h1 class="mr-5">   Carrito </h1>
    
    <div class="btn-group btn-group-sm" role="group" >
    <a href="?p=carrito&SUP=Carrito">
      <button type="button" class="btn  <?php echo ($_GET['SUP']=="Carrito")?"btn-primary":"btn-outline-primary";?>  btn-sm mr-3">Carrito</button>
    </a>
    <a  href="?p=carrito&SUP=Guardados">
      <button type="button" class="btn <?php echo ($_GET['SUP']=="Guardados")?"btn-primary":"btn-outline-primary";?> btn-sm">Guardados</button>
    </a  href="?p=carrito&SUP=Carrito">
    </div>
 

<div class=" py-md-3  bg-light justify-content-around row">
  
    <?php
        include('controllers/carrito.php');
    ?>
</div>

<!-- 
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
            <form  method="POST" action="controllers/accionpoducto.php<?php// echo"?categoria=".$_GET['categoria']; echo (isset($_POST['search']))?"?search=".$_POST['search']:"";?>">
              <button type="submit" class="btn btn-danger"id="Descartar" name="Descartar" value="">Descartar</button>
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
     -->
 
<script src="public/js/carrito.js"></script>