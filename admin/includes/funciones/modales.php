<?php


if($_POST){
    
    if($_POST['opcion'] == 'modalProducto'){
        
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        
      
        $query = $mysqli->prepare(" SELECT descripcion,descripcion2 FROM producto WHERE IDsystempro=?");
        $query -> bind_param('i', $_POST['id']);
        $query -> execute();
        $query -> bind_result($descripcion,$descripcion2);
        $query -> fetch();
        $query -> close();
        
        $query = " SELECT descuentos_id_descuento FROM producto_descuento WHERE producto_IDsystempro=".$_POST['id'];
        $resultado2 = $mysqli->query($query);
        
        $html = '<div class="container">';
        $c=1;
        while($row2 = mysqli_fetch_array($resultado2)){
            
            $query = "SELECT * FROM descuentos WHERE id_descuento = ".$row2['descuentos_id_descuento'];
            $resultado = $mysqli->query($query);
            $row = mysqli_fetch_array($resultado);
            
            if($row['formato_descuento']=="Dinero"){
                $cantidad='
                    Cantidad(MXN): $'.$row['cantidad_descuento'].'<br>
                    Cantidad(USD): $'.$row['cantidad2_descuento'].'<br>
                ';
            }else{
                $cantidad='
                    Cantidad: '.$row['cantidad_descuento'].'% <br>
                ';
            }
            
            $fecha_desde = date("d/m/Y H:i:s",strtotime($row['valido_desde']));
            $fecha_hasta = date("d/m/Y H:i:s",strtotime($row['valido_hasta']));
            
            $html.= '
                        <b>DESCUENTO '.$c.'</b><br>
                        Tipo descuento: '.$row['formato_descuento'].'<br>
                        '.$cantidad.'
                        Existencia: '.$row['existencia_descuento'].'<br>
                        Válido desde: '.$fecha_desde.' hrs.<br>
                        Válido hasta: '.$fecha_hasta.' hrs.<br>
                        Código: '.$row['codigo_descuento'].'<br>
                        
                   ';
        
            $c++;
        }
        

        $html.= '<br>Descripción: '.$descripcion.'<br>';
        $html.= '<br>Descripción 2: '.$descripcion2.'<br>';
        
        
        $mysqli->close();
        
        echo $html;
        
    }else if($_POST['opcion'] == 'modalEstadoDescuento'){
        
        $numboton=$_POST['numboton'];
        
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        $query = "SELECT estatus_descuento FROM descuentos WHERE id_descuento = ".$_POST['id'];
        $resultado = $mysqli->query($query);
        $row = mysqli_fetch_array($resultado);
        
        if($row['estatus_descuento']==0){
            $opcion1="selected";
            $opcion2="";
        }else if($row['estatus_descuento']==1){
            $opcion1="";
            $opcion2="selected";
        }
        
        $html='      
          <select class="form-control" id="select_estado_descuento" >
            <option value="0" '.$opcion1.'>Desactivado</option>
            <option value="1" '.$opcion2.'>Activado</option> 
          </select><br>
          <button type="button" class="btn botonFormulario" data-dismiss="modal" onclick="cambiar_estado_descuento(select_estado_descuento.value,'.$_POST['id'].','.$numboton.')">Cambiar</button> 
        ';  
        
        $mysqli->close();

        echo $html;
        
        
    }else if($_POST['opcion'] == 'cambiarEstadoDescuento'){
        
        $estado=$_POST['estado'];
        $id=$_POST['id'];
        
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        
        $query = $mysqli->prepare("UPDATE descuentos SET estatus_descuento=?  WHERE id_descuento = ? ");
        $query -> bind_param('ii',$estado,$id);
        $query -> execute();
        //$query -> fetch();
        
        
        if($query->affected_rows>0){
            $query -> close();
            

            if( $estado=='1' || $estado==1 ){
                $btntexto="green";
            }
            else{
                $btntexto="red";
            }
            $respuesta = array(
                'respuesta' => 'success',
                'mensaje' => 'Se actualizó el estado del descuento.',
                'btntexto' => $btntexto
               
            );
            

        }else{
            $query -> close();
            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'No se pudo actualizar el estado del descuento.'
            );

        }
    
        $mysqli->close();
        echo die(json_encode($respuesta));
        
       
    }else if($_POST['opcion'] == 'modalEstadoPago'){
        $numboton=$_POST['numboton'];
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        $query = "SELECT Status FROM cobros WHERE IDfolioGral = ".$_POST['id'];
        $resultado = $mysqli->query($query);
        $row = mysqli_fetch_array($resultado);
        
        if($row['Status']==0){
            $opcion1="selected";
            $opcion2="";
        }else if($row['Status']==1){
            $opcion1="";
            $opcion2="selected";
        }
        
        $html='      
          <select class="form-control" id="select_estado_pago" >
            <option value="0" '.$opcion1.'>Pendiente</option>
            <option value="1" '.$opcion2.'>Pagado</option> 
          </select><br>
          <button type="button" class="btn botonFormulario" data-dismiss="modal" onclick="cambiar_estado_pago(select_estado_pago.value,'.$_POST['id'].','.$numboton.')">Cambiar</button> 
        ';  
        
        $mysqli->close();

        echo $html;
        
    }else if($_POST['opcion'] == 'cambiarEstadoPago'){
        
        $estado=$_POST['estado'];
        $id=$_POST['id'];
        
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        
        $query = $mysqli->prepare("UPDATE cobros SET Status=?  WHERE IDfolioGral = ? ");
        $query -> bind_param('ii',$estado,$id);
        $query -> execute();
        //$query -> fetch();
        
        
        if($query->affected_rows>0){
            $query -> close();
            
            $query = $mysqli->prepare(" SELECT cliente_IDuser,producto_IDproducto,descuento,descuentos_iddescuento  FROM cobros WHERE IDfolioGral = ?");
            $query -> bind_param('i',$id);
            $query -> execute();
            $query -> bind_result($idProspecto,$idProducto,$descuento,$iddescuento);
            $query -> fetch();
            $query -> close();
            
            
            
            if($estado=='1' || $estado==1 ){
                
                $query = $mysqli->prepare(" SELECT num_registro FROM clientes ORDER BY num_registro  DESC LIMIT 1");
                $query -> execute();
                $query -> bind_result($ultimoid);
                $query -> fetch();
                $query -> close();
                
                if($ultimoid){
                    $matricula = $ultimoid + 1;
                }else{
                    $matricula = 20000;
                }
                
                $estado_prospecto=3;
                
                $query = $mysqli->prepare("UPDATE clientes SET status = ?,num_registro=? WHERE IDuser = ? ");
                $query -> bind_param('isi', $estado_prospecto,$matricula,$idProspecto);
                $query -> execute();
                //$query -> fetch();
                
                
                if($query->affected_rows>0){
                    $query -> close();
                    
                    $btntexto="Pagado";
                
                    $respuesta = array(
                        'respuesta' => 'success',
                        'mensaje' => 'Se actualizó el estado del cobro y del cliente.',
                        'btntexto' => $btntexto,
                        'matricula' => $matricula,
                        'idProspecto' => $idProspecto
                    );
                    
                    if($descuento>0){
                        
                        $query = $mysqli->prepare(" SELECT existencia_descuento FROM descuentos WHERE id_descuento = ?");
                        $query -> bind_param('i',$iddescuento);
                        $query -> execute();
                        $query -> bind_result($existencia_actual);
                        $query -> fetch();
                        $query -> close();
                        
                        $existencia_actual--;
                        
                        $query = $mysqli->prepare("UPDATE descuentos SET existencia_descuento=?  WHERE id_descuento = ? ");
                        $query -> bind_param('ii',$existencia_actual,$iddescuento);
                        $query -> execute();
                        //$query -> fetch();
                        $query -> close();
                        
                    }
                        
                    
                    
        
                }else{
                    $query -> close();
                    $respuesta = array(
                        'respuesta' => 'error',
                        'mensaje' => 'Se actualizó el estado del cobro, pero ocurrió un error al actualizar el estado del cliente.'
                    );
        
                }
                
            }else{
               
                $btntexto="Pendiente";
                
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Se actualizó el estado del cobro.',
                    'btntexto' => $btntexto
                );
            }
    
            

        }else{
            $query -> close();
            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'No se actualizó el estado del pago.'
            );

        }
    
        $mysqli->close();
        echo die(json_encode($respuesta));
        
        
    }else if($_POST['opcion'] == 'cambiarEstadoFecha'){
        
        $numfecha=$_POST['numfecha'];
        $id=$_POST['id'];
        
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        
        if($numfecha==1){
            $estado=1;
            $query = $mysqli->prepare("UPDATE visitas SET fecha1_estado=?  WHERE IDsystemVisita = ? ");
            $query -> bind_param('ii',$estado,$id);
            $query -> execute();
            //$query -> fetch();
        }else if($numfecha==2){
            $estado=1;
            $query = $mysqli->prepare("UPDATE visitas SET fecha2_estado=?  WHERE IDsystemVisita = ? ");
            $query -> bind_param('ii',$estado,$id);
            $query -> execute();
            //$query -> fetch();
        }else if($numfecha==3){
            $estado=1;
            $query = $mysqli->prepare("UPDATE visitas SET fecha3_estado=?  WHERE IDsystemVisita = ? ");
            $query -> bind_param('ii',$estado,$id);
            $query -> execute();
            //$query -> fetch();
        }
        
        if($query->affected_rows>0){
            
            $respuesta = array(
                'respuesta' => 'success',
                'mensaje' => 'Se ha seleccionado la fecha de visita '.$numfecha.'.'
            );
          

        }else{
            $query -> close();
            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'No se pudo seleccionar la fecha de visita '.$numfecha.'.'
            );

        }
    
        $mysqli->close();
        echo die(json_encode($respuesta));
        
    }else if($_POST['opcion'] == 'modalDetallePedidoCanasta'){
        
        $code=$_POST['code'];
        
        require_once ('../../php/conexion.php');
        $mysqli = conectar();

        $query = "SELECT estatus_pago,estatus_pedido,monto_pagado,notas,subtotal,cantidad_descuento,total,moneda,id_canasta_cliente,id_canasta_sucursal,sucursal_fecha_recoleccion FROM canastas_pedidos WHERE id_canasta_pedido = ".$code;
        $resultado = $mysqli->query($query);
        $row = mysqli_fetch_array($resultado);
        
        if($row['estatus_pago']==1){
            $opcion1_pago="";
            $opcion2_pago="selected";
        }else{
            $opcion1_pago="selected";
            $opcion2_pago="";
        }

        if($row['estatus_pedido']==1){
            $opcion1_pedido="";
            $opcion2_pedido="selected";
        }else{
            $opcion1_pedido="selected";
            $opcion2_pedido="";
        }


        $query = "SELECT telefono,email,cpostal FROM canastas_clientes WHERE id_canasta_cliente = ".$row['id_canasta_cliente'];
        $resultado = $mysqli->query($query);
        $cliente = mysqli_fetch_array($resultado);

        $query = "SELECT nombre FROM canastas_sucursales WHERE id_canasta_sucursal = ".$row['id_canasta_sucursal'];
        $resultado = $mysqli->query($query);
        $sucursal = mysqli_fetch_array($resultado);

        $arrayFechaRec = explode('/', $row['sucursal_fecha_recoleccion']);

        if( count($arrayFechaRec)<2 ){

            $fecha_recoleccion = $row['sucursal_fecha_recoleccion'];

        }else{

            if($arrayFechaRec[0]<10){ $frDia = '0'.$arrayFechaRec[0]; }else{ $frDia = $arrayFechaRec[0]; }

            if( $arrayFechaRec[1]=='Enero' ){ $frMes='01'; }
            else if( $arrayFechaRec[1]=='Febrero' ){ $frMes='02'; }
            else if( $arrayFechaRec[1]=='Marzo' ){ $frMes='03'; }
            else if( $arrayFechaRec[1]=='Abril' ){ $frMes='04'; }
            else if( $arrayFechaRec[1]=='Mayo' ){ $frMes='05'; }
            else if( $arrayFechaRec[1]=='Junio' ){ $frMes='06'; }
            else if( $arrayFechaRec[1]=='Julio' ){ $frMes='07'; }
            else if( $arrayFechaRec[1]=='Agosto' ){ $frMes='08'; }
            else if( $arrayFechaRec[1]=='Septiembre' ){ $frMes='09'; }
            else if( $arrayFechaRec[1]=='Octubre' ){ $frMes='10'; }
            else if( $arrayFechaRec[1]=='Noviembre' ){ $frMes='11'; }
            else if( $arrayFechaRec[1]=='Diciembre' ){ $frMes='12'; }

            $fecha_recoleccion = $arrayFechaRec[2].'-'.$frMes.'-'.$frDia;

            $dayweek = date('w', strtotime($fecha_recoleccion)); 
            if($dayweek==1){ $daytext='Lunes'; }
            else if($dayweek==2){ $daytext='Martes'; }
            else if($dayweek==3){ $daytext='Miércoles'; }
            else if($dayweek==4){ $daytext='Jueves'; }
            else if($dayweek==5){ $daytext='Viernes'; }
            else if($dayweek==6){ $daytext='Sábado'; }
            else if($dayweek==7){ $daytext='Domingo'; }

            $fecha_recoleccion = $daytext.' - '.$row['sucursal_fecha_recoleccion'];

        }


        $query = "SELECT producto_nombre,cantidad_solicitada,unidad_medida,precio_descuento,precio_iva,cantidad_solicitada_descuento FROM canastas_pedidos_productos WHERE id_canasta_pedido = ".$code;
        $resultado = $mysqli->query($query);
        
        $html='    

          <div class="col-md-12">
            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="inputlabel">Status del pago</label>
                        <select class="form-control" id="select_status_pago" disabled>
                            <option value="0" '.$opcion1_pago.'>Pendiente</option>
                            <option value="1" '.$opcion2_pago.'>Pagado</option> 
                        </select>
                    </div>
                </div>
                <div class="col-sm-6"></div>


                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="inputlabel">Status del pedido</label>
                        <select class="form-control" id="select_status_pedido" disabled>
                            <option value="0" '.$opcion1_pedido.'>Pendiente</option>
                            <option value="1" '.$opcion2_pedido.'>Entregado</option> 
                        </select>
                    </div>
                </div>
                <div class="col-sm-6"></div>


                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="inputlabel">Monto</label>
                        <input class="form-control" id="inputmonto" value="'.$row['monto_pagado'].'" maxlength="10" disabled>
                    </div>
                </div>
                <div class="col-sm-6"></div>


                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="inputlabel">Notas</label>
                        <textarea class="form-control" id="inputnotas" rows="3" maxlength="490" disabled>'.$row['notas'].'</textarea>
                    </div>
                </div>

            </div>
          </div>

          <div class="card card-blue direct-chat direct-chat-dark collapsed-card">
                <div class="card-header card-personalizado" >
                    <h3 class="card-title">Detalle del pedido</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-footer" style="display:none;">

                    <div class="row">

                        <div class="col-sm-1 pedidos_lbltitlebuyer onlydesk"></div>
                        <div class="col-sm-11 cardtitle3label pedidos_lbltitlebuyer">Más datos del comprador</div>

                       
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <label class="cardtitlelabel">TELÉFONO</label><br>
                            <label class="cardtextlabel">'.$cliente['telefono'].'</label>
                        </div>
                        <div class="col-sm-4">
                            <label class="cardtitlelabel">EMAIL</label><br>
                            <label class="cardtextlabel">'.$cliente['email'].'</label>
                        </div>
                        <div class="col-sm-3">
                            <label class="cardtitlelabel">CÓDIGO POSTAL</label><br>
                            <label class="cardtextlabel">'.$cliente['cpostal'].'</label>
                        </div>

                        <div class="col-sm-1 pedidos_lbltitlebuyer onlydesk"></div>
                        <div class="col-sm-11 cardtitle3label pedidos_lbltitlebuyer">Punto de entrega</div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <label class="cardtitlelabel">SUCURSAL</label><br>
                            <label class="cardtextlabel">'.$sucursal['nombre'].'</label>
                        </div>
                        <div class="col-sm-4">
                            <label class="cardtitlelabel">FECHA RECOLECCIÓN</label><br>
                            <label class="cardtextlabel">'.$fecha_recoleccion.'</label>
                        </div>
                        <div class="col-sm-3">
                            
                        </div>
                        

                        <div class="col-sm-1 pedidos_lbltitledetailbuy onlydesk"></div>
                        <div class="col-sm-11 cardtitle3label pedidos_lbltitledetailbuy">Detalle la compra</div>

                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <label class="cardtitlelabel">PRODUCTO</label><br><br>';
                            while($row2 = mysqli_fetch_array($resultado)){
                                $html.='<label class="cardtextlabel">'.$row2['producto_nombre'].'</label><br><br>';
                            }
    $html.='
                        </div>

                        <div class="col-sm-4">
                            <label class="cardtitlelabel">CANTIDAD</label><br><br>';
                            mysqli_data_seek($resultado,0);
                            while($row2 = mysqli_fetch_array($resultado)){
                                $html.='<label class="cardtextlabel">'.$row2['cantidad_solicitada'].' '.$row2['unidad_medida'].'</label><br><br>';
                            }
    $html.='
                        </div>

                        <div class="col-sm-3">
                            <label class="cardtitlelabel">MONTO</label><br><br>';
                            $subtotal = 0;
                            $descuento = 0;
                            mysqli_data_seek($resultado,0);
                            while($row2 = mysqli_fetch_array($resultado)){
                                $monto = $row2['precio_iva'] * $row2['cantidad_solicitada'];
                                $subtotal = $subtotal + $monto;
                                $descuento = $descuento + $row2['cantidad_solicitada_descuento'] ;
                                $html.='<label class="cardtextlabel">$'.$monto.'</label><br><br>';
                            }
    $html.='
                        </div>

                        <div class="col-sm-12 linedrawed"></div>

                        <div class="col-sm-9" align="right">
                            <label class="cardtitle2label">SUBTOTAL:</label><br>
                            <label class="cardtitle2label">DESCUENTOS:</label><br>
                            <label class="cardtitle2label">TOTAL:</label><br>
                        </div>
                        <div class="col-sm-3">
                           <label class="cardtextlabel">'.$row['moneda'].' $'.$subtotal.'</label><br>
                           <label class="cardtextlabel">'.$row['moneda'].' $'.$descuento.'</label><br>
                           <label class="cardtitlelabel">'.$row['moneda'].' $'.$row['total'].'</label><br>
                        </div>
                    </div>

                </div>
          </div>

          <div class="col-md-12">
            <div class="row">
                <div class="col-sm-4" align="center">
                    <button type="button" id="btnSaveDetail" class="btn botonFormulario1" onclick="save_detail('.$code.')" disabled>Guardar</button> 
                </div>

                <div class="col-sm-4" align="center">
                    <button type="button" class="btn botonFormulario1" onclick="enable_detail(this)">Editar</button> 
                </div>

                <div class="col-sm-4" align="center">
                    <button type="button" id="btnCloseDetail" class="btn botonFormulario2" data-dismiss="modal">Cerrar</button> 
                </div>
            </div>
          </div>

          
          
        ';  
        
        $mysqli->close();

        echo $html;
        
        
    }else if($_POST['opcion'] == 'SaveDetallePedidoCanasta'){

        $cambios1= 0;
        $cambios2= 0;
        $cambios3= 0;

        $code=$_POST['code'];
        
        $spago=$_POST['spago'];
        $spedido=$_POST['spedido'];
        $monto=$_POST['monto'];
        $notas=$_POST['notas'];

        $monto = filter_var($monto, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        $notas = filter_var($notas, FILTER_SANITIZE_STRING);

        require_once ('../../php/conexion.php');
        $mysqli = conectar();

        $query = "SELECT estatus_pago,estatus_pedido,total FROM canastas_pedidos WHERE id_canasta_pedido = ".$code;
        $resultado = $mysqli->query($query);
        $row = mysqli_fetch_array($resultado);


        if($monto>$row['total']){

            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'El monto no puede ser mayor al total a pagar.'
            );
            echo die(json_encode($respuesta));

        }



        date_default_timezone_set('America/Mexico_City');
        $fecha=date("Y-m-d H:i:s");


        if($row['estatus_pago']!=$spago){

            if($spago==1){

                if($monto>=$row['total']){

                    $query = $mysqli->prepare("UPDATE canastas_pedidos SET 
                                                                        estatus_pago=?,
                                                                        fecha_estatus_pago=?
                                                WHERE id_canasta_pedido = ? ");
                    $query -> bind_param('isi',$spago,$fecha,$code);
                    $query -> execute();
                    //$query -> fetch();

                    if($query->affected_rows>0){
                        $query -> close();
                        $cambios1= 1;
                    }

                }else{

                    $respuesta = array(
                        'respuesta' => 'error',
                        'mensaje' => 'Para cambiar el status del pago a pagado, el monto debe ser igual al total a pagar.'
                    );
                    echo die(json_encode($respuesta));

                }
            }

        }


        if($row['estatus_pedido']!=$spedido){

            $query = $mysqli->prepare("UPDATE canastas_pedidos SET 
                                                                estatus_pedido=?,
                                                                fecha_estatus_pedido=?
                                        WHERE id_canasta_pedido = ? ");
            $query -> bind_param('isi',$spedido,$fecha,$code);
            $query -> execute();
            //$query -> fetch();

            if($query->affected_rows>0){
                $query -> close();
                $cambios2= 1;
            }

        }
        
       
        $query = $mysqli->prepare("UPDATE canastas_pedidos SET 
                                                            monto_pagado=?,
                                                            notas=?  
                                    WHERE id_canasta_pedido = ? ");
        $query -> bind_param('dsi',$monto,$notas,$code);
        $query -> execute();
        //$query -> fetch();

        if($query->affected_rows>0){
            $query -> close();
            $cambios3= 1;
        }
        


        $query = "SELECT estatus_pago,estatus_pedido FROM canastas_pedidos WHERE id_canasta_pedido = ".$code;
        $resultado = $mysqli->query($query);
        $row = mysqli_fetch_array($resultado);

        if($row['estatus_pago']==1){
            $lblpago = '<span class="textActive">Pagado</span>';
        }else{
            $lblpago = '<span class="textInactive">Pendiente</span>';
        }

        if($row['estatus_pedido']==1){
            $lblpedido = '<span class="textActive">Entregado</span>';
        }else{
            $lblpedido = '<span class="textInactive">Pendiente</span>';
        }
        
        if($cambios1==1 || $cambios2==1 || $cambios3==1){
            
            $respuesta = array(
                'respuesta' => 'success',
                'mensaje' => 'Se ha actualizarón correctamente los datos del pedido.',
                'lblpago' => $lblpago,
                'lblpedido' => $lblpedido
            );
          

        }else{
            
            $respuesta = array(
                'respuesta' => 'success',
                'mensaje' => 'No hubo cambios en los datos del pedido.',
                'lblpago' => $lblpago,
                'lblpedido' => $lblpedido
            );

        }
    
        $mysqli->close();
        echo die(json_encode($respuesta));

        
    }else if($_POST['opcion'] == 'modalDescProductoCanasta'){
        
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        
        $query = $mysqli->prepare(" SELECT
                                       preciomx_descuento,
                                       preciousd_descuento,
                                       id_descuento
                                      FROM canastas_productos WHERE id_canasta_producto=?");
        $query -> bind_param('i', $_POST['code']);
        $query -> execute();
        $query -> bind_result($preciomx,$preciousd,$iddescuento);
        $query -> fetch();
        $query -> close();

        $query = " SELECT * FROM descuentos WHERE id_descuento=".$iddescuento;
        $resultado = $mysqli->query($query);
        $descuento = mysqli_fetch_array($resultado);

        if($descuento['estatus_descuento']==1){
            $estado='Activado';
        }else{
            $estado='Desactivado';
        }

        $html = '<div class="container">
                    <b>Tipo descuento:</b><br>'.$descuento['formato_descuento'].'<br><br>
                ';

                if($descuento['formato_descuento']=='Porcentaje'){

                     $html.= '<b>Cantidad:</b><br>'.$descuento['cantidad_descuento'].'%<br><br>';

                }else if($descuento['formato_descuento']=='Dinero'){

                    $html.= '<b>Cantidad MX:</b><br>$'.number_format($descuento['cantidad_descuento'],2).'<br><br>';

                    if( is_null($descuento['cantidad2_descuento'])==false ){
                        $html.= '<b>Cantidad US:</b><br>$'.number_format($descuento['cantidad2_descuento'],2).'<br><br>';
                    }
                    

                }

                    $html.= '
                            <b>Válido desde:</b><br>'.date('d/m/Y H:i:s',strtotime($descuento['valido_desde'])).'<br><br>
                            <b>Válido hasta:</b><br>'.date('d/m/Y H:i:s',strtotime($descuento['valido_hasta'])).'<br><br>
                            <b>Estado:</b><br>'.$estado.'<br><br>
                            <b>Precio MX:</b><br>$'.number_format($preciomx,2).'<br><br>';

                            if(is_null($preciousd)==false){
                                //$html.= '<b>PrecioUSD:</b><br>$'.number_format($preciousd,2);
                            }
                     
        $html.= '
                </div>';
      
        $mysqli->close();
        
        echo $html;
        
    }else if($_POST['opcion'] == 'modalDetalleCursosCobro'){
        
        $code=$_POST['code'];

        $html='';

       
        
        require_once ('../../php/conexion.php');
        $mysqli = conectar();

        $query = "SELECT * FROM catalogo_cobros WHERE idsystemcobrocat = ".$code;
        $resultado = $mysqli->query($query);
        $row = mysqli_fetch_array($resultado);
        unset($resultado);


        $query = "SELECT * FROM catalogo_forma_depago WHERE IDsystemapades = ".$row['forma_depago_IDsystemapades'];
        $resultado = $mysqli->query($query);
        $formapago = mysqli_fetch_array($resultado);
        unset($resultado);


        $iva = $row['iva'] * 100;


        $constancia_factura = '';

        if($row['facturar']==1 ){
            $constancia_factura = '<a href="../files/constancias_fiscales/'.$row['facturacion_constancia'].'" target="_blank" ><img src="images/icon_download.svg" alt="Descargar constancia" title="Descargar constancia"></a>';
        }else{
            $constancia_factura = '<img src="images/icon_x.svg" alt="No requiere factura" title="No requiere factura" >';
        }

        //obtenemos el porcentaje de comision para repartirlo en los productos
        $total_sin_comision = $row['cobroscata_montotransaccion'] - $row['comision_total'];

        if($total_sin_comision<=0){
            $porcentaje_comision = 0;
        }else{
            $porcentaje_comision = ($row['comision_total'] * 100)/$total_sin_comision;
        }
        
        
        


        $html='
            <section class="table-responsive">
                <table class="table table-borderless tblOrderTable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Fecha del pago</th>
                            <th>ID VTP transacción</th>
                            <th>Sistema de pago</th>
                            <th>Forma de pago</th>
                            <th>Factura</th>
                            <th>Modalidad</th>
                            <th>SKU Producto</th>
                            <th class="tblOrderTable-price">Monto base</th>
                            <th class="tblOrderTable-price">Descuento</th>
                            <th class="tblOrderTable-price">Subtotal</th>
                            <th class="tblOrderTable-price">Cupón</th>
                            <th class="tblOrderTable-price">IVA ('.$iva.'%)</th>
                            <th class="tblOrderTable-price">Comisiones</th>
                            <th class="tblOrderTable-price">Monto Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img id="iconDeployItems" src="images/icon-plus-fill.svg" data-deploy="plus" style="cursor:pointer;"></td>
                            <td>'.date('d/m/Y H:i:s',strtotime($row['cobroscata_fechapago'])).'</td>
                            <td>'.$row['cobroscata_idtransaccion'].'</td>
                            <td>'.$formapago['plataforma'].'</td>
                            <td>'.$formapago['Nombrepago'].'</td>
                            <td>'.$constancia_factura.'</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
        ';
                    
                    $query = "SELECT * FROM catalogo_cobros_items WHERE cobroscata_idsystemcobrocat = ".$row['idsystemcobrocat'];
                    $resultado = $mysqli->query($query);

                    while($cobroitem = mysqli_fetch_array($resultado)){

                        $query = "SELECT catalogo_productos_sku,catalogo_productos_nombre,producto_modalidad_idsystemprodmod
                                  FROM catalogo_productos WHERE idsystemcatpro = ".$cobroitem['catalogo_productos_idsystemcatpro'];
                        $resultado2 = $mysqli->query($query);
                        $producto = mysqli_fetch_array($resultado2);
                        unset($resultado2);

                        

                        $precio_sin_comision = $cobroitem['cobroscata_items_preciodescuentopaquete'] - $cobroitem['cobroscata_items_descuentocompra'] + $cobroitem['cobroscata_items_ivadinero'];
                        $comision_precio = $precio_sin_comision * ($porcentaje_comision/100);
                        $preciofinal = $precio_sin_comision + $comision_precio;

                        $html.='
                            <tr class="payment_item" hidden>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td><span class="typeProduct">'.$cobroitem['modality'].'</span></td>
                                <td>'.$producto['catalogo_productos_sku'].'-'.$producto['catalogo_productos_nombre'].'</td>
                                <td>'.$row['cobroscata_moneda'].' $'.number_format($cobroitem['cobroscata_items_preciobase'],2).'</td>
                                <td>'.$row['cobroscata_moneda'].' $'.number_format($cobroitem['cobroscata_items_descuentoproducto'],2).'</td>
                                <td>'.$row['cobroscata_moneda'].' $'.number_format($cobroitem['cobroscata_items_preciodescuentopaquete'],2).'</td>
                                <td>'.$row['cobroscata_moneda'].' $'.number_format($cobroitem['cobroscata_items_descuentocompra'],2).'</td>
                                <td>'.$row['cobroscata_moneda'].' $'.number_format($cobroitem['cobroscata_items_ivadinero'],2).'</td>
                                <td>'.$row['cobroscata_moneda'].' $'.number_format($comision_precio,2).'</td>
                                <td><strong>'.$row['cobroscata_moneda'].' $'.number_format($preciofinal,2).'</strong></td>
                            </tr>
                        ';

                        unset($producto);
                        unset($modalidad);

                    }
                    unset($resultado);
                    

        $html.='
                        <tr class="invoiceRow" >
                            <td colspan="2"><span class="typeProduct">Notas:</span></td>
                            <td colspan="13"><textarea id="notesPayment" class="notesInvoice" disabled >'.$row['cobroscata_notas'].'</textarea></td>
                        </tr>

                    </tbody>
                </table>
            </section>

            <table class="table table-borderless tblOrderTable-aux tblTotal">
                <thead></thead>
                <tbody>
                    <tr>
                        <td colspan="2"><strong>Total: '.$row['cobroscata_moneda'].' $'.number_format($row['cobroscata_montotransaccion'],2).'</strong> </td>
                    </tr>
                </tbody>
            </table>

            <div class="modal_content_buttons" align="center" >
                <button type="button" class="btn botonFormulario_secondary" id="btnEditSave" data-process="false" data-idmodal="'.$row['idsystemcobrocat'].'">Editar</button>
                <button type="button" class="btn botonFormulario" data-dismiss="modal" style="margin-left:10px;">Cerrar</button>
            </div>
        ';

         
        $mysqli->close();


        echo $html;
        
        
    }else if($_POST['opcion'] == 'SaveDetalleCursosCobro'){

        /*

        $cambios1= 0;
        $cambios2= 0;
        $cambios3= 0;

        $code=$_POST['code'];
        
        $spago=$_POST['spago'];
        

        require_once ('../../php/conexion.php');
        $mysqli = conectar();

        $query = "SELECT cobroscata_status,descuentos_idsystemdescuento FROM catalogo_cobros WHERE idsystemcobrocat = ".$code;
        $resultado = $mysqli->query($query);
        $row = mysqli_fetch_array($resultado);


        date_default_timezone_set('America/Mexico_City');
        $fecha=date("Y-m-d H:i:s");


        if($row['cobroscata_status']!=$spago){

            if($spago==1){

                

                $query = $mysqli->prepare("UPDATE catalogo_cobros SET 
                                                                    cobroscata_status=?,
                                                                    cobroscata_fechapago=?
                                            WHERE idsystemcobrocat = ? ");
                $query -> bind_param('isi',$spago,$fecha,$code);
                $query -> execute();
                //$query -> fetch();

                if($query->affected_rows>0){
                    $query -> close();
                    $cambios1= 1;
                }


                if($row['descuentos_idsystemdescuento']!='' && is_null($row['descuentos_idsystemdescuento'])==false){

                    $query = "SELECT descuento_existencia FROM catalogo_descuentos WHERE idsystemdescuento = ".$row['descuentos_idsystemdescuento'];
                    $consultaDesc = $mysqli->query($query);
                    $rowDesc = mysqli_fetch_array($consultaDesc);

                    $existencias_descuento = $rowDesc['descuento_existencia'] - 1;

                    $query = $mysqli->prepare("UPDATE catalogo_descuentos SET descuento_existencia=? WHERE idsystemdescuento = ? ");
                    $query -> bind_param('ii',$existencias_descuento,$row['descuentos_idsystemdescuento']);
                    $query -> execute();
                    //$query -> fetch();
                    $query -> close();

                }

               
            }

        }


        $query = "SELECT cobroscata_status FROM catalogo_cobros WHERE idsystemcobrocat = ".$code;
        $resultado = $mysqli->query($query);
        $row = mysqli_fetch_array($resultado);

        if($row['cobroscata_status']==1){
            $lblpago = '<span class="textActive">Pagado</span>';
        }else{
            $lblpago = '<span class="textInactive">Pendiente</span>';
        }

        
        if($cambios1==1){
            
            $respuesta = array(
                'respuesta' => 'success',
                'mensaje' => 'Se ha actualizó correctamente el status del pago.',
                'lblpago' => $lblpago
                
            );
          

        }else{
            
            $respuesta = array(
                'respuesta' => 'success',
                'mensaje' => 'No hubo cambios en el status del pago.',
                'lblpago' => $lblpago
            );

        }
    
        $mysqli->close();
        echo die(json_encode($respuesta));

        */

        $code=$_POST['code'];
        
        $notesPayment=$_POST['notesPayment'];


        require_once ('../../php/conexion.php');
        $mysqli = conectar();


        $query = $mysqli->prepare("UPDATE catalogo_cobros SET 
                                                            cobroscata_notas=?
                                    WHERE idsystemcobrocat = ? ");
        $query -> bind_param('si',$notesPayment,$code);
        $query -> execute();
        //$query -> fetch();

        if($query->affected_rows>0){
            
            $respuesta = array(
                'respuesta' => 'success',
                'mensaje' => 'Se actualizaron las notas.'  
            );

        }else{

            $respuesta = array(
                'respuesta' => 'success',
                'mensaje' => 'No hubo actualizaciones en las notas.'  
            );

        }
        $query -> close();


        $mysqli->close();
        echo die(json_encode($respuesta));


        
    }else if($_POST['opcion'] == 'modalDescCursosTalleres'){
        
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        
        $query = $mysqli->prepare(" SELECT
                                       catalogo_productos_preciomx_descuento,
                                       catalogo_productos_preciousd_descuento,
                                       descuentos_idsystemdescuento
                                      FROM catalogo_productos WHERE idsystemcatpro=?");
        $query -> bind_param('i', $_POST['code']);
        $query -> execute();
        $query -> bind_result($preciomx,$preciousd,$iddescuento);
        $query -> fetch();
        $query -> close();

        $query = " SELECT * FROM catalogo_descuentos WHERE idsystemdescuento=".$iddescuento;
        $resultado = $mysqli->query($query);
        $descuento = mysqli_fetch_array($resultado);

        if($descuento['descuento_estatus']==1){
            $estado='Activado';
        }else{
            $estado='Desactivado';
        }

        $html = '<div class="container">
                    <b>Tipo descuento:</b><br>'.$descuento['descuento_formato'].'<br><br>
                ';

                if($descuento['descuento_formato']=='Porcentaje'){

                     $html.= '<b>Cantidad:</b><br>'.$descuento['descuento_cantidad'].'%<br><br>';

                }else if($descuento['descuento_formato']=='Dinero'){

                    $html.= '<b>Cantidad MX:</b><br>$'.number_format($descuento['descuento_cantidad'],2).'<br><br>';

                    if( is_null($descuento['descuento_cantidad2'])==false ){
                        //$html.= '<b>Cantidad US:</b><br>$'.number_format($descuento['descuento_cantidad2'],2).'<br><br>';
                    }
                    

                }

                    $html.= '
                            <b>Válido desde:</b><br>'.date('d/m/Y H:i:s',strtotime($descuento['descuento_valido_desde'])).'<br><br>
                            <b>Válido hasta:</b><br>'.date('d/m/Y H:i:s',strtotime($descuento['descuento_valido_hasta'])).'<br><br>
                            <b>Estado:</b><br>'.$estado.'<br><br>
                            <b>Precio MX:</b><br>$'.number_format($preciomx,2).'<br><br>';

                            if(is_null($preciousd)==false){
                                //$html.= '<b>PrecioUSD:</b><br>$'.number_format($preciousd,2);
                            }
                     
        $html.= '
                </div>';
      
        $mysqli->close();
        
        echo $html;
        
    }
    
    else if ($_POST['opcion'] == 'coursesEvents') {
        require_once('../../php/conexion.php');
        $mysqli = conectar();
        $response = array(
            'status'=> false,
            'message'=> '',
            'description'=> '',
            'data'=> []
        );
        $query = $mysqli->prepare("SELECT idsystemcatpro, catalogo_productos_sku, catalogo_productos_nombre FROM catalogo_productos ORDER BY catalogo_productos_sku DESC");
        // Verificar si la preparación de la consulta tuvo éxito
        if (!$query) {
            $response['status'] = false;
            $response['message'] = "Error en la preparación de la consulta";
            $response['description'] = $mysqli->error;
            die(json_encode($response));
            exit();
        }
        $query->execute();
        // Verificar si la ejecución de la consulta tuvo éxito
        if ($query->errno) {
            $response['status'] = false;
            $response['message'] = "Error al ejecutar la consulta";
            $response['description'] = $query->error;
            die(json_encode($response));
            exit();
        }
        $query->bind_result($idProd, $skuProd, $nameProd);
        // $query->fetch();
        $dataResult = array();
        // Iterar sobre las filas de resultados
        while ($query->fetch()) {
            array_push($dataResult, [
                "id" => $idProd,
                "sku" => $skuProd,
                "name" => $nameProd,
            ]);
        }
        $response['status'] = true;
        $response['message'] = "Registros encontrados";
        $response['data'] = $dataResult;
        $query->close();
        $mysqli->close();
        die(json_encode($response));
    }
    
    
    else if ($_POST['opcion'] == 'busquedaManual') {
        require_once('../../php/conexion.php');
        $mysqli = conectar();
        $response = array(
            'status'=> false,
            'message'=> 'Ingresamos... ',
            'description'=> '',
            'data'=> []
        );
        $mysqli->close();
        die(json_encode($response));
    }
}

?>