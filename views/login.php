<div class="container ">
    <div class="card col-md-5 mx-auto mt-5 shadow ">
        <div class="card-header mt-2 ">Login</div>
        <div class="card-body">
            <?php
            if(!isset($_GET['po'])){
              $po ='home';
            }else{
              $po = $_GET['po'];
            }

            if(!isset($_GET['email'])){
              $email = false;
            }else{
              $email = $_GET['email'];
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
          ?>
            <form method="POST" action="controllers/login.php?po=<?php echo $po.$categoria.$search?>">
                <div class="form-group">
                    <div class="form-label-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user fa-fw"></i>
                                </span>
                            </div>
                            <input type="email " value="<?php if($email==TRUE){echo $email;} ?>"
                                class="form-control rounded-right <?php if($email==TRUE){echo "is-invalid";} ?> "
                                name="email" placeholder="E-mail" required="required" autofocus="autofocus">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-label-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-key fa-fw"></i>
                                </span>
                            </div>
                            <input type="password"
                                class="form-control  rounded-right <?php if($email==TRUE){echo "is-invalid";} ?>"
                                name="pass" placeholder="Password" required="required">
                        </div>
                    </div>
                </div>





                <?php 
            if(isset($_GET['error'])){
              echo "Usuario o contraseña incorrectos";
            }
          ?>
                <input type="submit" class="btn btn-primary btn-block" name="Acceder" value="Acceder" />
            </form>

            <div class="text-center">
                <a class="d-block small mt-3" href="?p=registro">Registrar una cuenta.</a>
            </div>

        </div>
    </div>
</div>
