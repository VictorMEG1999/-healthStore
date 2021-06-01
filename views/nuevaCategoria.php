<div class="container ">
    <div class="card col-md-5 mx-auto mt-5  shadow">
        <div class="card-header mt-2 ">Nueva Categoria </div>
        <div class="card-body">
            
            <form method="POST" action="controllers/nuevaCategoria.php">
                <div class="form-group">
                        <div class="form-label-group">
                            <input type="text"
                                class="form-control <?php if(isset($_GET['error'])){echo "is-invalid";} ?>"
                                name="categoria" placeholder="Nombre de la categoría   " required="required" autofocus="autofocus">
                            <div class="invalid-feedback">
                                La categoría ya existe.
                            </div>
                        </div>
                    </div>

                <button type="submit" class="btn btn-primary btn-block" name="Agregar">
                    <i class="fas fa-plus fa-fw"></i>
                    Acceder
                </button>
            </form>

        </div>
    </div>
</div>
