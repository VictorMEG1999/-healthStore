<?php
    if(isset($_GET['categoria'])){
        $categoria=$_GET['categoria'];
    }else{
        $_GET['categoria']= $categoria ="Todas las categorías";
    }
    if(isset($_POST['search'])){
        header('Location:/healthStore/index.php?p=productos&categoria='.$categoria."&search=".$_POST['search']);
    }
    
    
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top">
    <a class="navbar-brand" href="#">
        <img src="public\medios\icon.svg" width="30" height="30" alt="" loading="lazy">
    </a>
    <a class="navbar-brand ">Health Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="?p=home">
                    <i class="fas fa-home fa-fw"></i>
                    Inicio
                </a>
            </li>


            <li class="nav-item ">
                    <a class="nav-link " href="?p=productos&categoria=<?php echo $categoria;?>">
                        <i class="fas fa-store fa-fw"></i>
                        Productos
                    </a>
            </li>

            <?php
              if(isset($_SESSION['health5toreUserPerfil'])&& $_SESSION['health5toreUserPerfil']=="a"){           
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-plus-circle fa-fw"></i>
                            Nuevo
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="?p=nuevoProducto">producto</a>
                            <a class="dropdown-item" href="?p=nuevaCategoria">categoría</a>
                        </div>
                    </li>
                <?php 
              }      
              if(isset($_SESSION['health5toreUser'])&&$_SESSION['health5toreUserPerfil']=="u"){
                  ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?p=carrito">
                            <i class="fas fa-shopping-cart fa-fw"></i>
                            Carrito
                        </a>
                    </li>  
                  <?php
              }        
            ?>
                  
        </ul>

        <form class="form-inline  my-4 my-lg-0" method="POST" action="views/nav.php?categoria=<?php echo $categoria;?>">
            
            <div class="btn-group">
                <button type="button"style="width: 12em;" class="btn btn-light"><?php echo $categoria;?></button>
                <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                <?php
                        require('controllers/categorias.php');
                        $categarias = new categariasconst();
                        ?>
                            <a class="dropdown-item <?php if($_GET['categoria'] =="Todas las categorías"){echo "active";}?>" href="?p=productos&categoria=Todas las categorías"<?php echo(isset($_GET['search']))?"&search=".$_GET['search']:"";?>>Todas las categorías</a>
                        <?php
                        $categaria = $categarias->categarias();
                        foreach($categaria as $cat){
                            ?>
                            <a class="dropdown-item <?php if($_GET['categoria'] == $cat['Categoria']){echo "active";}?>" href="?p=productos&categoria=<?php echo $cat['Categoria']; echo(isset($_GET['search']))?"&search=".$_GET['search']:"";?>"><?php echo $cat['Categoria'];?></a>
                            <?php
                        }
                        ?>
                </div>
            </div>
      
            <input class="form-control  mr-sm-2 Search" name="search" type="search" 
                placeholder="Search" aria-label="Search"value="<?php echo (isset($_GET['search']))?$_GET['search']:null;?>">
            <button class="btn btn-info my-2 my-sm-0" type="submit">
                <i class="fas fa-search fa-fw"></i>
                Bscar
            </button>
        </form>

        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <?php
                      if(isset($_SESSION['health5toreUser'])){
                    ?>
                    <a class="dropdown-item" href="controllers/salir.php">
                        <i class="fas fa-sign-out-alt fa-fw"></i>
                        Serra sesión
                    </a>
                    <?php
                      }else{
                        
                    ?>
                    <a class="dropdown-item" href="?p=registro">
                        <i class="fas fa-user-edit fa-fw"></i>
                        Rejistrarse</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?p=login">
                        <i class="fas fa-user-lock fa-fw"></i>
                        Iniciar sesión
                    </a>
                    <?php
                      }
                    ?>
                </div>
            </li>
        </ul>


    </div>
</nav>