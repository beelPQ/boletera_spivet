<!-- Content Wrapper. Contains page content -->
<div class="content">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->

                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Agregar empresa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="crear" action="index.php" method="post" autocomplete="off">
                                <div class="row">
                                    <!-- text input -->
                                    <div class="col-sm-12">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>ID empresa</label>
                                                <input
                                                    type="text"
                                                    id="id"
                                                    class="form-control"
                                                    placeholder="ID empresa">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Nombre empresa</label>
                                                <input
                                                    type="text"
                                                    id="nombre"
                                                    class="form-control"
                                                    placeholder="Nombre empresa">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Nombre corto empresa</label>
                                                <input
                                                    type="text"
                                                    id="nombre_corto"
                                                    class="form-control"
                                                    placeholder="Nombre corto empresa">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>RFC:</label>
                                            <input
                                                type="text"
                                                id="rfc"
                                                class="form-control"
                                                maxlength="13"
                                                placeholder="RFC">
                                        </div>
                                        <div class="form-group">
                                            <label>Teléfono:</label>
                                            <input
                                                type="text"
                                                id="telefono"
                                                class="form-control"
                                                 maxlength="15"
                                                placeholder="Teléfono">
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input
                                                type="text"
                                                id="email"
                                                class="form-control"
                                                 maxlength="40"
                                                placeholder="Email">
                                        </div>
                                        
                                        <div class="form-group" >
                                            <label>Paypal Client ID:</label>
                                            <input
                                                type="text"
                                                id="clientid"
                                                class="form-control"
                                                 maxlength="100"
                                                placeholder="Paypal Client ID">
                                        </div>
                                        <div class="form-group">
                                            <label>Openpay Merchant ID:</label>
                                            <input
                                                type="text"
                                                id="merchantid"
                                                class="form-control"
                                                 maxlength="35"
                                                placeholder="Openpay Merchant ID">
                                        </div>
                                        <div class="form-group" >
                                            <label>Openpay llave pública:</label>
                                            <input
                                                type="text"
                                                id="llavepublica"
                                                class="form-control"
                                                 maxlength="100"
                                                placeholder="Openpay llave pública">
                                        </div>
                                        <div class="form-group" >
                                            <label>Openpay llave privada:</label>
                                            <input
                                                type="text"
                                                id="llaveprivada"
                                                class="form-control"
                                                 maxlength="100"
                                                placeholder="Openpay llave privada">
                                        </div>
                                        
                                        
                                        
                                        <div class="col-sm-12">
                                            <input type="hidden" id="tipo" value="empresa">
                                                <button type="submit" class="btn botonFormulario">Crear</button>
                                                <a href="index.php?id=empresas" class="btn botonFormulario" >Cancelar</a>
                                        </div>
                                       
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->