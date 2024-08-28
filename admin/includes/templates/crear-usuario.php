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
                            <h3 class="card-title">Agregar usuario</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="crear" action="index.php" method="post" autocomplete="off">
                                <div class="row">
                                    <!-- text input -->
                                    <div class="col-sm-12">
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input
                                                    type="text"
                                                    id="email"
                                                    class="form-control"
                                                    maxlength="40"
                                                    placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Usuario</label>
                                                <input
                                                    type="text"
                                                    id="usuario"
                                                    class="form-control"
                                                    placeholder="Usuario">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Rol</label>
                                                <select id="rol" class="form-control">
                                                    <option selected>----</option>
                                                    <?php  buscar_roles(); ?>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Contraseña</label>
                                                <input
                                                    type="password"
                                                    id="contrasenia"
                                                    class="form-control"
                                                    placeholder="Contraseña">
                                            </div>
                                        </div>
                                       
                                        <div class="col-sm-12">
                                            <input type="hidden" id="tipo" value="usuario">
                                                <button type="submit" class="btn botonFormulario">Crear</button>
                                                <a href="index.php?id=usuarios" class="btn botonFormulario" >Cancelar</a>
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