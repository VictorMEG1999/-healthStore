<div class="container ">
    <div class="card col-md-5 mx-auto mt-5 mb-5 shadow ">
        <div class="card-header mt-2 "> Registro </div>
        <div class="card-body">
            <form method="POST" action="controllers/registro.php">

                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" class="form-control" name="Nombtr" placeholder="Introduces nombre"
                            required="required" autofocus="autofocus"
                            value="<?php if(isset($_GET['Nombtr'])){echo $_GET['Nombtr'];}?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" class="form-control" name="Ap_paterno"
                            placeholder="Introduces apellido paterno" required="required" autofocus="autofocus"
                            value="<?php if(isset($_GET['Ap_paterno'])){echo $_GET['Ap_paterno'];}?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" class="form-control" name="Ap_materno"
                            placeholder="Introduces apellido materno" required="required" autofocus="autofocus"
                            value="<?php if(isset($_GET['Ap_materno'])){echo $_GET['Ap_materno'];}?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-label-group">
                        <input type="email"
                            class="form-control email <?php if(isset($_GET['Nombtr'])){echo "is-invalid";} ?>"
                            name="Email" placeholder="Introduces email" required="required" autofocus="autofocus">
                        <div class="invalid-feedback">
                            El correo ya está registrado.
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" class="form-control pass" name="pass"
                            placeholder="Introduces contraseña " required="required" autofocus="autofocus">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" class="form-control passv" placeholder="Confirme contraseña "
                            required="required" autofocus="autofocus">
                    </div>
                </div>

                <input type="submit" class="btn btn-primary btn-block Acceder" disabled="disabled" name="Acceder"
                    value="Acceder" />

                <div class="text-center">
                    <a class="d-block small mt-3" href="?p=home">Inicio</a>
                </div>

            </form>
        </div>
    </div>
</div>
<script src="public/js/rejistrouser.js"></script>