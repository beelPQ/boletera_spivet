<div class="card card-blue direct-chat direct-chat-dark" id="div_descuento" style="display:none;">
    <div class="card-header card-personalizado" >
        <h3 class="card-title">Asignar descuento</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Tipo descuento:</label>
                    <select id="tipo_descuento" class="form-control">
                            <option selected>----</option>
                            <option value="Porcentaje">% Porcentaje</option>
                            <option value="Dinero">$ Dinero</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Cantidad<span id="span_lblmxn" style="display:none;">(MXN)</span>:</label>
                    <input
                        type="text"
                        id="cantidad1"
                        class="form-control"
                        placeholder="número con o sin decimales"
                        maxlength="9">
                </div>
            </div>
            <div class="col-sm-4" >
                <!--
                <div class="form-group" id="div_cantidad2" style="display:none;">
                    <label>Cantidad(USD)</label>
                    <input
                        type="text"
                        id="cantidad2"
                        class="form-control"
                        placeholder="número con o sin decimales"
                        maxlength="9">
                </div>
                -->
            </div>
            
           
            <?php
                date_default_timezone_set('America/Mexico_City');
                 $anio_actual=date('Y');
                 $anio_max= $anio_actual+10;
                echo inputs_fecha(1,'inicio',$anio_actual,$anio_max,0,0,0);
            ?>
            <?php  
                echo inputs_hora(1,'inicio',24,60); 
            ?>
            <div class="col-sm-4" ></div>
            
            
             <?php
                date_default_timezone_set('America/Mexico_City');
                 $anio_actual=date('Y');
                 $anio_max= $anio_actual+10;
                echo inputs_fecha(2,'fin',$anio_actual,$anio_max,0,0,0);
            ?>
             <?php  
                echo inputs_hora(2,'fin',24,60); 
            ?>
            <div class="col-sm-4" ></div>


            <div class="col-sm-4">
                <div class="form-group">
                    <label>Estado:</label>
                    <select id="descuento_estado" class="form-control">
                        <option selected>----</option>
                        <option value="0">Desactivado</option>
                        <option value="1">Activado</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Precio(MXN) con descuento:</label>
                    <input
                        type="text"
                        id="preciodescuento"
                        class="form-control"
                        placeholder="se calcula automáticamente"
                        readonly>
                </div>
            </div>
            <div class="col-sm-4">
                <!--
                <div class="form-group">
                    <label>Precio(USD) con descuento:</label>
                    <input
                        type="text"
                        id="precio2descuento"
                        class="form-control"
                        placeholder="se calcula automáticamente"
                        readonly>
                </div>
                -->
            </div>
        </div>
    </div>
</div>