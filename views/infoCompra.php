<div class="container ">
    <div class="card col-md-10 mx-auto mt-5 mb-5 shadow ">
        <div class="card-header mt-2 "> Agregar domicilio  </div>
        <div class="card-body">
            <form method="POST" action="controllers/infoCompra.php">

                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" class="form-control" name="Estado" placeholder="Estado"
                            required="required" autofocus="autofocus">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" class="form-control" name="Delegación" placeholder="Delegación"
                            required="required" autofocus="autofocus">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" class="form-control" name="Calle" placeholder="Calle"
                            required="required" autofocus="autofocus">
                    </div>
                </div>
                <div class="row col d-flex justify-content-between ">
                    <div class="form-group col-4">
                        <div class="form-label-group">
                            <input type="text" class="form-control" name="No_exterior" placeholder="No. exterior"
                                required="required" autofocus="autofocus">
                        </div>
                    </div>
                    <div class="form-group col-4">
                        <div class="form-label-group">
                            <input type="text" class="form-control" name="No_Interior" placeholder="No. Interior (Opcional)"
                                autofocus="autofocus">
                        </div>
                    </div>
                    <div class="form-group col-4">
                        <div class="form-label-group">
                            <input type="text" class="form-control" name="Código_postal" placeholder="Código postal"
                                required="required" autofocus="autofocus">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" class="form-control" name="Teléfono" placeholder="Teléfono de contacto"
                            required="required" autofocus="autofocus">
                    </div>
                </div>
                
                <input type="submit" class="btn btn-primary btn-block "  name="Comprar"
                    value="Comprar"/>
            </form>
        </div>
    </div>
</div>
<script src="public/js/rejistrouser.js"></script>