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
                            <h3 class="card-title">Agregar cupón</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="crear" action="index.php" method="post" autocomplete="off">
                                <div class="row">
                                    <!-- text input -->
                                    <div class="col-sm-12">

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Tipo descuento*:</label>
                                                <select id="tipo_descuento" class="form-control">
                                                        <option selected>----</option>
                                                        <option value="Porcentaje">% Porcentaje</option>
                                                        <option value="Dinero">$ Dinero</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Cantidad<span id="span_lblmxn" style="display:none;">(MXN)</span>*:</label>
                                                <input
                                                    type="text"
                                                    id="cantidad1"
                                                    class="form-control"
                                                    placeholder="número con o sin decimales"
                                                    maxlength="9">
                                            </div>
                                        </div>
                                        <div class="col-sm-12" id="div_cantidad2" style="display:none;">
                                            <div class="form-group">
                                                <label>Cantidad(USD)*:</label>
                                                <input
                                                    type="text"
                                                    id="cantidad2"
                                                    class="form-control"
                                                    placeholder="número con o sin decimales"
                                                    maxlength="9">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Existencia*:</label>
                                                <input
                                                    type="text"
                                                    id="stock"
                                                    class="form-control"
                                                    placeholder="número entero"
                                                    maxlength="8">
                                            </div>
                                        </div>

                                        <div class="col-sm-12 row">
                                            <?php
                                                date_default_timezone_set('America/Mexico_City');
                                                 $anio_actual=date('Y');
                                                 $anio_max= $anio_actual+10;
                                                echo inputs_fecha(1,'inicio*',$anio_actual,$anio_max,0,0,0);
                                            ?>
                                            <?php  
                                                echo inputs_hora(1,'inicio*',24,60); 
                                            ?>
                                            <div class="col-sm-4"></div>
                                        </div>
                                        
                                        <div class="col-sm-12 row">
                                             <?php
                                                date_default_timezone_set('America/Mexico_City');
                                                 $anio_actual=date('Y');
                                                 $anio_max= $anio_actual+10;
                                                echo inputs_fecha(2,'fin*',$anio_actual,$anio_max,0,0,0);
                                            ?>
                                             <?php  
                                                echo inputs_hora(2,'fin*',24,60); 
                                            ?>
                                            <div class="col-sm-4"></div>
                                        </div>


                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Código*:</label>
                                                <input
                                                    type="text"
                                                    id="codigo"
                                                    class="form-control"
                                                    placeholder="texto"
                                                    maxlength="5">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Motivo del cupón:</label>
                                                <input
                                                    type="text"
                                                    id="notas"
                                                    class="form-control"
                                                    placeholder="texto"
                                                    maxlength="150">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Estatus*:</label>
                                                <select id="descuento_estado" class="form-control">
                                                    <option selected>----</option>
                                                    <option value="0">Desactivado</option>
                                                    <option value="1">Activado</option>
                                                </select>
                                            </div>
                                        </div>

                                        
                                        <div class="col-sm-12">
                                            <input type="hidden" id="tipo" value="cupon">
                                                <button type="submit" class="btn botonFormulario">Crear</button>
                                                <a href="index.php?id=cupones" class="btn botonFormulario" >Cancelar</a>
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