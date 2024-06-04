<?php

    function mostrar_canasta_pedidos(){
        
        $mysqli1 = conectar();
        $canastasBeneficiario = '';
        $canastasNombreBanco = '';
        // Obtenemos datos bancatios de la empreasa para la sección de cansta
        $query = "SELECT canastas_transferencia_beneficiario, canastas_transferencia_banco FROM empresa";
        $resultado = $mysqli1->query($query);
        while($row = mysqli_fetch_array($resultado)){
            $canastasBeneficiario = $row['canastas_transferencia_beneficiario'];
            $canastasNombreBanco = $row['canastas_transferencia_banco'];
        }
        $mysqli1 -> close();

        $mysqli = conectar();
        $html = "";
        //Se obtiene el total de categorias con su nombre para impresion donde id_global = 1.
        $query = "SELECT cp.id_canasta_pedido,
                          cp.folio,
                          cp.estatus_pago,
                          cp.estatus_pedido,
                          cp.created_at,
                          cp.forma_pago,
                          cp.ruta_comprobante_pago,
                          cc.nombre,
                          cc.apellido1,
                          cc.apellido2,
                          cc.email,
                          cc.telefono,
                          cc.cpostal
                   FROM canastas_pedidos  AS cp
                   INNER JOIN canastas_clientes AS cc
                   ON cc.id_canasta_cliente = cp.id_canasta_cliente
                   ORDER BY cp.created_at DESC
                   ";
                //    ORDER BY cp.created_at
        $resultado = $mysqli->query($query);

        while($row = mysqli_fetch_array($resultado)){
            $paymentMethod = '';
            $typeInstitution = '';
            if($row['estatus_pago']==1){
                $status_pago='<span class="textActive">Pagado</span>';
            }else{
                $status_pago='<span class="textInactive">Pendiente</span>';
            }

            if($row['estatus_pedido']==1){
                $status_pedido='<span class="textActive">Entregado</span>';
            }else{
                $status_pedido='<span class="textInactive">Pendiente</span>';
            }
            // if( $row['forma_pago'] == 'transferencia' ) { $typeInstitution = "$canastasNombreBanco<br><small style='font-size: 12px;'>$canastasBeneficiario</small>"; }
            if( $row['forma_pago'] === 'efectivo' ) {
                $typeInstitution = "Caja";
                $paymentMethod = 'Efectivo';
            }
            if( $row['forma_pago'] === 'transferencia' ) {
                $typeInstitution = "$canastasNombreBanco";
                $paymentMethod = 'Transferencia';
            }
            
            
            $html.='<tr>
                <td>canastapedido:'.$row['id_canasta_pedido'].'</td>
                <td>'.date('d/m/Y H:i:s',strtotime($row['created_at'])).'</td>
                <td><button type="button" class="btn botonFormulario" onclick="modalDetalles('.$row['id_canasta_pedido'].')">+</button></td>
                <td>'.$row['folio'].'</td>
                <td>'.$row['nombre'].'</td>
                <td>'.$row['apellido1'].'</td>
                <td>'.$row['apellido2'].'</td>
                <td>'.$paymentMethod.'<br>'.$typeInstitution.'</td>
                <td id="cellStatusPago'.$row['id_canasta_pedido'].'">'.$status_pago.'</td>
                <td>';
                if( $row['forma_pago']==='transferencia' ){
                    if($row['ruta_comprobante_pago']!='' && is_null($row['ruta_comprobante_pago'])==false){
                        if( file_exists('../..'.$row['ruta_comprobante_pago']) ){
                            $html.='<a href="'.$row['ruta_comprobante_pago'].'" target="_blank"><button type="button" class="btn botonFormulario" >Ver</button></a>';
                        }
                        else{ $html.='Archivo no encontrado'; }
                    }
                    else{ $html.='Sin adjuntar'; }
                }
                else{ $html.='No aplica'; }
            $html.='
                </td>
                <td id="cellStatusPedido'.$row['id_canasta_pedido'].'">'.$status_pedido.'</td>
            ';
            $html.='</tr>';
            unset($status_pago);
            unset($status_pedido);
        }

        echo $html;
        $mysqli -> close();

    }


    function mostrar_canasta_productos(){
        
        $mysqli = conectar();
        $html = "";
        //Se obtiene el total de categorias con su nombre para impresion donde id_global = 1.
        $query = " SELECT cp.id_canasta_producto,
                          cp.sku,
                          cp.nombre,
                          cpe.nombre AS cpe_nombre,
                          cp.unidad_medida,
                          cp.stock,
                          cp.preciomx,
                          cp.id_descuento,
                          cp.disponible,
                          cp.ruta_thumb,
                          cc.nombre AS nombre_cat
                   FROM canastas_productos  AS cp
                   INNER JOIN canastas_categorias AS cc
                   ON cc.id_canasta_categoria = cp.id_canasta_categoria
                   INNER JOIN canastas_productos_estados AS cpe
                   ON cp.id_canasta_producto_estado = cpe.id_canasta_producto_estado
                   ORDER BY cp.sku DESC ";
        $resultado = $mysqli->query($query);

        while($row = mysqli_fetch_array($resultado)){
            
            if($row['disponible']==1){
                $disponible='Sí';
            }else{
                $disponible='No';
            }

            
            
            $html.='
                    <tr>
                        <td>canastaproducto:'.$row['id_canasta_producto'].'</td>
                        <td>'.$row['sku'].'</td>
                        <td>'.$row['nombre_cat'].'</td>
                        <td>'.$row['nombre'].'</td>
                        <td>'.$row['cpe_nombre'].'</td>
                        <td>'.$row['unidad_medida'].'</td>
                        <td>'.$row['stock'].'</td>
                        <td>'.$row['preciomx'].'</td>
                        <td>';
                            if($row['id_descuento']!='' && is_null($row['id_descuento'])==false){
                                $html.='<button type="button" class="btn botonFormulario" onclick="modalDescuento('.$row['id_canasta_producto'].')">Ver</button>';
                            }
                            
            $html.='
                        </td>
                        <td>';
                            if($row['ruta_thumb']!='' && is_null($row['ruta_thumb'])==false){

                                if( file_exists('../..'.$row['ruta_thumb']) ){
                                    $html.='<a href="'.$row['ruta_thumb'].'" target="_blank"><button type="button" class="btn botonFormulario" >Ver</button></a>';
                                }else{
                                    $html.='Thumb no encontrado';
                                }
                                
                            }else{
                                $html.='Sin thumb';
                            }
                            
            $html.='
                        </td>
                        <td>'.$disponible.'</td>
                        <td><a href="index.php?id=editar-canastaproducto:'.$row['id_canasta_producto'].'" ><button type="button" class="btn botonFormulario" >Editar</button></a></td>
            ';
                
            $html.='</tr>';

            unset($disponible);
            

        }

        echo $html;
        $mysqli -> close();

    }


    function mostrar_empresa2(){

        $mysqli = conectar();
        $html = "";
        
        $query = " SELECT * FROM empresa ORDER BY idsystemEmpresa";
        $resultado = $mysqli->query($query);

        while($row = mysqli_fetch_array($resultado)){

            if($row['openpay_sandboxmode']==1){
                $openpay_sandboxmode='Si';
            }else{
                $openpay_sandboxmode='No';
            }
            
            
            $html .= '
            <tr>
                <td>
                    <div >
                        <input type="checkbox" id="empresa:' . $row['idsystemEmpresa'] . '" data-id="editar-lista">
                        <label for="empresa:' . $row['idsystemEmpresa'] . '">
                        </label>
                    </div>
                </td>
                <td>
                    <button type="button" class="btn botonFormulario" data-toggle="modal" data-target="#modalempresa'.$i.'" >
                       +
                    </button>
                    <div class="modal fade" id="modalempresa'.$i.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Datos empresa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            
                            <b>Openpay merchantid:</b> '.$row['openpay_merchantid'].'<br>
                            <b>Openpay llave privada:</b> '.$row['openpay_llaveprivada'].'<br>
                            <b>Openpay llave pública:</b> '.$row['openpay_llavepublica'].'<br>
                            <b>Openpay modo sandbox:</b> '.$openpay_sandboxmode.'
                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn botonFormulario" data-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </td>
                <td>' . $row['nombre_empresa'] . '</td>
                <td>' . $row['nombre_corto_empresa'] . '</td>
                <td>' . $row['rfc_empresa'] . '</td>
                <td>' . $row['telefono_empresa'] . '</td>
                <td>' . $row['email_empresa'] . '</td>
            </tr>';

        }
        
        $mysqli -> close();

        echo $html;

    }

    function mostrar_solicitudes_terrenos2(){
        $mysqli = conectar();
        $html = "";
        
        $query = " SELECT * FROM solicitudes ORDER BY IDsystemSolicitud DESC";
        $resultado = $mysqli->query($query);

        while($row = mysqli_fetch_array($resultado)){
            

            
            $query = $mysqli->prepare(" SELECT NombreProducto FROM producto WHERE IDsystempro = ?");
            $query -> bind_param('i',$row['producto_IDsystempro']);
            $query -> execute();
            $query -> bind_result($producto);
            $query -> fetch();
            $query -> close();
            
            
            $html .= '
            <tr>
                
               
                <td>' . $row['IDsystemSolicitud'] . '</td>
                <td>' . $row['nombre'] . '</td>
                <td>' . $row['apellido1'] . '</td>
                <td>' . $row['apellido2'] . '</td>
                <td>' . $row['whatsapp'] . '</td>
                <td>' . $row['correo'] . '</td>
                <td>' . $row['codigo_postal'] . '</td>
                <td>' . $row['comentarios'] . '</td>
                <td>' . $producto . '</td>
                <td>';
                    if($row['fecha']!='' && is_null($row['fecha'])==false){
                        $html.=date('d/m/Y H:i:s',strtotime($row['fecha']));
                    }
         $html.='</td>
               
            </tr>';

        }
        
        $mysqli -> close();

        echo $html;
    }

    function mostrar_solicitudes_visitas2(){
        $mysqli = conectar();
        $html = "";
        
        $query = " SELECT * FROM visitas ORDER BY IDsystemVisita DESC";
        $resultado = $mysqli->query($query);

        $i=1;
        while($row = mysqli_fetch_array($resultado)){
            
            if($row['fecha1_estado']==1 || $row['fecha2_estado']==1 || $row['fecha3_estado']==1){
                
                $habilitar_fechas='disabled';
                
            }else if($row['fecha2_estado']==1){
                $habilitar_fechas='';
            }
            
            if($row['fecha1_estado']==1){
                $color_fecha1='background-color:green;';
            }
            else{
                $color_fecha1='';
            }
            
            if($row['fecha2_estado']==1){
                $color_fecha2='background-color:green;';
            }
            else{
                $color_fecha2='';
            }
            
            if($row['fecha3_estado']==1){
                $color_fecha3='background-color:green;';
            }
            else{
                $color_fecha3='';
            }
            
            $html .= '
            <tr>
                
               
                <td>' . $row['IDsystemVisita'] . '</td>
                <td>' . $row['nombre'] . '</td>
                <td>' . $row['apellido1'] . '</td>
                <td>' . $row['apellido2'] . '</td>
                <td>' . $row['whatsapp'] . '</td>
                <td>' . $row['correo'] . '</td>
                <td>' . $row['codigo_postal'] . '</td>
                <td>' . $row['comentarios'] . '</td>
                <td>' . $row['duracion'] . '</td>
                <td><button type="button" class="btn botonFormulario" style="'.$color_fecha1.'" id="btnvisita1'.$row['IDsystemVisita'].'" onclick="escoger_fecha('.$row['IDsystemVisita'].',1)" '.$habilitar_fechas.' >' . date('d/m/Y',strtotime($row['fecha1'])) . '</button></td>
                <td>';
                    if($row['fecha2']!='' && is_null($row['fecha2'])==false){
                        $html.='<button type="button" class="btn botonFormulario" style="'.$color_fecha2.'" id="btnvisita2'.$row['IDsystemVisita'].'" onclick="escoger_fecha('.$row['IDsystemVisita'].',2)" '.$habilitar_fechas.' >' . date('d/m/Y',strtotime($row['fecha2'])) . '</button>';
                    }
                    else{
                        $html.='No proporcionada';
                    }
        $html.='</td>
                <td>';
                    if($row['fecha3']!='' && is_null($row['fecha3'])==false){
                        $html.='<button type="button" class="btn botonFormulario" style="'.$color_fecha3.'" id="btnvisita3'.$row['IDsystemVisita'].'" onclick="escoger_fecha('.$row['IDsystemVisita'].',3)" '.$habilitar_fechas.' >' . date('d/m/Y',strtotime($row['fecha3'])) . '</button>';
                    }
                    else{
                        $html.='No proporcionada';
                    }
        $html.='</td>
                <td>';
                    if($row['fecha']!='' && is_null($row['fecha'])==false){
                        $html.=date('d/m/Y H:i:s',strtotime($row['fecha']));
                    }
        $html.='</td>
               
            </tr>';
            $i++;

        }
        
        $mysqli -> close();

        echo $html;
    }

    function mostrar_solicitudes_asesoria2(){
        $mysqli = conectar();
        $html = "";
        
        $query = " SELECT * FROM solicitudes_asesoria ORDER BY IDsystemAsesoria DESC";
        $resultado = $mysqli->query($query);

        $i=1;
        while($row = mysqli_fetch_array($resultado)){
            
            $html .= '
            <tr>
                
               
                <td>' . $row['IDsystemAsesoria'] . '</td>
                <td>' . $row['nombre'] . '</td>
                <td>' . $row['apellido1'] . '</td>
                <td>' . $row['apellido2'] . '</td>
                <td>' . $row['whatsapp'] . '</td>
                <td>' . $row['correo'] . '</td>
                <td>' . $row['codigo_postal'] . '</td>
                <td>' . $row['comentarios'] . '</td>
                <td>' . $row['medidas'] . '</td>
                <td>';
                    if($row['ubicacion']!='' && is_null($row['ubicacion'])==false){
                        $html.='<a href="'.$row['ubicacion'].'">Ubicación</a>';
                    }
                    
        $html.='</td>
                <td>';
                if($row['archivo']!='' && is_null($row['archivo'])==false){
                    $html.='<a class="btn botonFormulario" target="_blank" href="../../archivos/asesorias/'.$row['archivo'].'">Archivo</a>';
                    
                } 
                
               
        $html.='
                </td>
                <td>';
                    if($row['fecha']!='' && is_null($row['fecha'])==false){
                        $html.=date('d/m/Y H:i:s',strtotime($row['fecha']));
                    }
        $html.='</td>
            </tr>';
            $i++;

        }
        
        $mysqli -> close();

        echo $html;
    }



    function mostrar_diplomasCursos(){
        
        $mysqli = conectar();
        $html = "";
        //Se obtiene el total de categorias con su nombre para impresion donde id_global = 1.

        /*
        $query = "SELECT catPro.idsystemcatpro, catPro.catalogo_productos_sku, catProdModal.modalidad_nombre, catCategProd.idsystemcatproon, 
            catCategProd.categorias_programas_nombre, catPro.catalogo_productos_nombre, catPro.catalogo_productos_duracion, catPro.catalogo_productos_descripcioncorta, catPro.catalogo_productos_descripcionlarga, catPro.catalogo_productos_esquemacursos, catPro.catalogo_productos_incluye, catPro.catalogo_productos_link, 
            catPro.catalogo_productos_thumbfacilitador, catPro.catalogo_productos_namefacilitador, catPro.catalogo_productos_positionfacilitador, catPro.catalogo_productos_fechainicio, catPro.catalogo_productos_fechafin, catPro.catalogo_productos_iva, catPro.catalogo_productos_preciomx, catPro.catalogo_productos_preciomx_descuento,  catPro.catalogo_productos_preciousd,
            catPro.catalogo_productos_preciousd_descuento, catPro.descuentos_idsystemdescuento, catPro.catalogo_productos_file_thumb, catPro.catalogo_productos_thumb_encabezado,
            catPro.catalogo_productos_publicado, catDescto.descuento_tipo, catDescto.descuento_formato, catDescto.descuento_cantidad, catDescto.descuento_cantidad2,
            catDescto.descuento_existencia, catDescto.descuento_valido_desde, catDescto.descuento_valido_hasta, catDescto.descuento_codigo, catDescto.descuento_estatus,
            catDescto.descuento_notas
            FROM catalogo_productos AS catPro
            LEFT JOIN catalogo_producto_modalidad AS catProdModal ON (catPro.producto_modalidad_idsystemprodmod = catProdModal.idsystemprodmod)
            LEFT JOIN catalogo_categorias_programas AS catCategProd ON (catPro.categorias_programasonline_idsystemcatproon = catCategProd.idsystemcatproon)
            LEFT JOIN catalogo_descuentos AS catDescto ON (catPro.descuentos_idsystemdescuento = catDescto.idsystemdescuento)
            ORDER BY catPro.catalogo_productos_sku ASC";
        */
        
        $query = "SELECT catPro.idsystemcatpro, catPro.catalogo_productos_sku, 
            catCategProd.categorias_programas_nombre, catPro.catalogo_productos_nombre, 
            catPro.catalogo_productos_fechainicio, catPro.catalogo_productos_fechafin,
            catPro.catalogo_productos_preciomx, catPro.descuentos_idsystemdescuento,
            catPro.catalogo_productos_publicado, catPro.catalogo_productos_stock,
            catPro.catalogo_productos_duracion, catPro.catalogo_productos_descripcioncorta,
            cpm.modalidad_nombre,
            catPro.catalogo_productos_incluye
            
            FROM catalogo_productos AS catPro
            LEFT JOIN catalogo_categorias_programas AS catCategProd 
            ON (catPro.categorias_programasonline_idsystemcatproon = catCategProd.idsystemcatproon)
            LEFT JOIN catalogo_producto_modalidad AS cpm 
            ON cpm.idsystemprodmod = catPro.producto_modalidad_idsystemprodmod
            ORDER BY catPro.catalogo_productos_sku ASC";

        $resultado = $mysqli->query($query);

        while($row = mysqli_fetch_array($resultado)){

            $skuProd = '';
            $nameProd = '';
            $tipoProd = '';
            $initialDateProd ='';
            $EndDateProd ='';
            $preciomxProd = 0;
            $btnDescto = '';
            $btnAction = '';
            $stock = 0;
            $modality = "";
            $duration = "";
            $descCorta = "";
            $infoObjetivo = "";

            if( is_null($row['catalogo_productos_sku']) === false ) { $skuProd = $row['catalogo_productos_sku']; }
            if( is_null($row['catalogo_productos_nombre']) === false ) { $nameProd = $row['catalogo_productos_nombre']; }
            if( is_null($row['categorias_programas_nombre']) === false ) { $tipoProd = $row['categorias_programas_nombre']; }
            if( is_null($row['catalogo_productos_fechainicio']) === false ) { $initialDateProd = date('d/m/Y',strtotime($row['catalogo_productos_fechainicio'])); }
            if( is_null($row['catalogo_productos_fechafin']) === false ) { $EndDateProd = date('d/m/Y',strtotime($row['catalogo_productos_fechafin'])); }
            if( is_null($row['catalogo_productos_preciomx']) === false ) { $preciomxProd = number_format($row['catalogo_productos_preciomx'],2); }
            if( is_null($row['modalidad_nombre']) === false ) { $modality = $row['modalidad_nombre']; }
            if( is_null($row['catalogo_productos_duracion']) === false ) { $duration = $row['catalogo_productos_duracion']; }
            if( is_null($row['catalogo_productos_descripcioncorta']) === false ) { $descCorta = $row['catalogo_productos_descripcioncorta']; }
            if( is_null($row['catalogo_productos_incluye']) === false ) { $infoObjetivo = $row['catalogo_productos_incluye']; }
            if( is_null($row['descuentos_idsystemdescuento']) === false ) { 
                $btnDescto = '<button type="button" class="btn botonFormulario" onclick="modalDescuento('.$row['idsystemcatpro'].')">Ver</button>';
            }
            if( $row['catalogo_productos_publicado'] == 1){ $disponible='Sí'; }else{ $disponible='No'; }
            $stock = $row['catalogo_productos_stock'];

            $descriptionCorta = '';
            $objetivo = '';

            $desSinCharacters = strip_tags($descCorta);
            $objSinCharacters = strip_tags($infoObjetivo);
            if( strlen($desSinCharacters) > 49){
                $descriptionCorta = substr($desSinCharacters, 0, 50)."...";
            }else{
                $descriptionCorta = $desSinCharacters;
            }

            if( strlen($objSinCharacters) > 49 ){
                $objetivo = $objLimit = substr($objSinCharacters, 0, 50)."...";
            }else{
                $objetivo = $objSinCharacters;
            }

            
            $btnAction = '<a href="index.php?id=editar-diplomasCurosTaller:'.$row['idsystemcatpro'].'" ><button type="button" class="btn botonFormulario" >Editar</button></a>';

            $html.="
            <tr>
                <td>cursotaller:".$row['idsystemcatpro']."</td>
                
                <td>$nameProd</td>

                <td>$modality</td>
                <td>$initialDateProd</td>
                <td>$EndDateProd</td>
                <td>$preciomxProd</td>
                <td>$duration</td> 
                <td>$descriptionCorta</td> 
                <td>$objetivo</td>
                <td>$disponible</td>
                <td>$btnAction</td>
            </tr>";
            // <td>$stock</td>

            unset($disponible);
            

        }

        echo $html;
        $mysqli -> close();

    }
    
    /**
     * Funcion que retorna los registros de la tabla de diploma
     * la cual sirve para diseñar el diploma por taller
     **/ 
    function mostrar_diplomasCursosDesign(){
        
        $mysqli = conectar();
        $html = "";
        //Se obtiene el total de categorias con su nombre para impresion donde id_global = 1.

        
        
        $query = "SELECT catPro.idsystemcatpro, catPro.catalogo_productos_sku, 
            catCategProd.categorias_programas_nombre, catPro.catalogo_productos_nombre, 
            catPro.catalogo_productos_fechainicio, catPro.catalogo_productos_fechafin,
            cpm.modalidad_nombre,
            catPro.catalogo_productos_incluye 
            FROM catalogo_productos AS catPro
            LEFT JOIN catalogo_categorias_programas AS catCategProd 
            ON (catPro.categorias_programasonline_idsystemcatproon = catCategProd.idsystemcatproon)
            LEFT JOIN catalogo_producto_modalidad AS cpm 
            ON cpm.idsystemprodmod = catPro.producto_modalidad_idsystemprodmod
            ORDER BY catPro.catalogo_productos_sku ASC";

        $resultado = $mysqli->query($query);
        $index = 1;
        while($row = mysqli_fetch_array($resultado)){

            $skuProd = '';
            $nameProd = '';
            $tipoProd = '';
            $initialDateProd ='';
            $EndDateProd ='';
            $preciomxProd = 0;
            $btnDescto = '';
            $btnAction = '';
            $stock = 0;
            $modality = "";
            $duration = "";
            $descCorta = "";
            $infoObjetivo = "";

            // if( is_null($row['catalogo_productos_sku']) === false ) { $skuProd = $row['catalogo_productos_sku']; }
            if( is_null($row['catalogo_productos_nombre']) === false ) { $nameProd = $row['catalogo_productos_nombre']; }
            if( is_null($row['categorias_programas_nombre']) === false ) { $tipoProd = $row['categorias_programas_nombre']; }
            if( is_null($row['catalogo_productos_fechainicio']) === false ) { $initialDateProd = date('d/m/Y',strtotime($row['catalogo_productos_fechainicio'])); }
            if( is_null($row['catalogo_productos_fechafin']) === false ) { $EndDateProd = date('d/m/Y',strtotime($row['catalogo_productos_fechafin'])); }
            // if( is_null($row['catalogo_productos_preciomx']) === false ) { $preciomxProd = number_format($row['catalogo_productos_preciomx'],2); }
            if( is_null($row['modalidad_nombre']) === false ) { $modality = $row['modalidad_nombre']; }
            // if( is_null($row['catalogo_productos_duracion']) === false ) { $duration = $row['catalogo_productos_duracion']; }
            // if( is_null($row['catalogo_productos_descripcioncorta']) === false ) { $descCorta = $row['catalogo_productos_descripcioncorta']; }
            // if( is_null($row['catalogo_productos_incluye']) === false ) { $infoObjetivo = $row['catalogo_productos_incluye']; }
            // if( is_null($row['descuentos_idsystemdescuento']) === false ) { 
                // $btnDescto = '<button type="button" class="btn botonFormulario" onclick="modalDescuento('.$row['idsystemcatpro'].')">Ver</button>';
            // }
            // if( $row['catalogo_productos_publicado'] == 1){ $disponible='Sí'; }else{ $disponible='No'; }
            // $stock = $row['catalogo_productos_stock'];

            $descriptionCorta = '';
            $objetivo = '';

            $desSinCharacters = strip_tags($descCorta);
            $objSinCharacters = strip_tags($infoObjetivo);
            if( strlen($desSinCharacters) > 49){
                $descriptionCorta = substr($desSinCharacters, 0, 50)."...";
            }else{
                $descriptionCorta = $desSinCharacters;
            }

            if( strlen($objSinCharacters) > 49 ){
                $objetivo = $objLimit = substr($objSinCharacters, 0, 50)."...";
            }else{
                $objetivo = $objSinCharacters;
            }

            
            $btnAction = '<a href="index.php?id=design_diploma:'.$row['idsystemcatpro'].'" ><button type="button" class="btn botonFormulario" >Diseñar diploma</button></a>';
            $btnActionCred = '<a href="index.php?id=design_credencial:'.$row['idsystemcatpro'].'" ><button type="button" class="btn botonFormulario" >Diseñar credencial</button></a>';

            $html.="
            <tr>
                <td> $index </td> 
                <td>$nameProd</td> 
                <td>$modality</td>
                <td>$initialDateProd</td>
                <td>$EndDateProd</td>
                <td>$btnAction</td>
                <td>$btnActionCred</td>
            </tr>";
            // <td>$stock</td>

            unset($disponible);
            
         $index  ++;
        }

        echo $html;
        $mysqli -> close();

    }

    function mostrar_cursos_cobros(){

        $mysqli = conectar();
        $html = "";
        
        $query = " SELECT
                        idsystemcobrocat,
                        cobroscata_idregcobro,
                        cobroscata_idtransaccion,
                        cobroscata_status,
                        clientes_idsystemcli,
                        cobroscata_moneda,
                        forma_depago_IDsystemapades,
                        cobroscata_adjunto,
                        cobroscata_fechapago,
                        cobroscata_adjunto
                    FROM catalogo_cobros ORDER BY idsystemcobrocat DESC";
        $resultado = $mysqli->query($query);
        
        $i=1;
        while($row = mysqli_fetch_array($resultado)){

            $query = "SELECT 
                        clientes_idsolicitud,
                        clientes_nombre,
                        clientes_apellido1,
                        clientes_apellido2,
                        clientes_matricula,
                        clientes_status,
                        clientes_email,
                        clientes_telefono,
                        clientes_codigopostal 
                    FROM catalogo_clientes WHERE idsystemcli=".$row['clientes_idsystemcli'];
            $consulta = $mysqli->query($query);
            $cliente = mysqli_fetch_array($consulta);
            unset($consulta);

            if($row['cobroscata_status']==0){
               
                $status_pago='<span class="textInactive withClick" onclick="modalStatus('.$row['idsystemcobrocat'].','.$row['cobroscata_status'].','.$row['cobroscata_idregcobro'].')">Pendiente</span>';
      
            }
            else if($row['cobroscata_status']==1){

               $status_pago='<span class="textActive">Pagado</span>';
               
            }else if($row['cobroscata_status']==2){

               $status_pago='<span class="textCanceled">Cancelado</span>';

            }

            
            $html .= '
            <tr>
                <td>
                    cursocobro:'.$row['idsystemcobrocat'].' 
                </td>
                <td>
                   <button type="button" class="btn botonFormulario" onclick="modalDetalles('.$row['idsystemcobrocat'].')">+</button>
                </td>
                <td>' . $row['cobroscata_idregcobro'] . '</td>
                <td>'.date('d/m/Y H:i:s',strtotime($row['cobroscata_fechapago'])).'</td>
                <td id="cellStatusPago'.$row['idsystemcobrocat'].'">'.$status_pago.'</td>
                <td>' . $cliente['clientes_nombre'] . '</td>
                <td>' . $cliente['clientes_apellido1'] . '</td>
                <td>' . $cliente['clientes_apellido2'] . '</td>
                <td>
                ';
                    if($row['cobroscata_adjunto']!='' && is_null($row['cobroscata_adjunto'])==false){
                        
                        if( file_exists('../files/adjuntos/'.$row['cobroscata_adjunto']) ){
                            
                            $html.='<a href="../files/adjuntos/'.$row['cobroscata_adjunto'].'?v='.time().'" target="_blank"><button type="button" class="btn botonFormulario" >Ver</button></a>';
                            
                        }else{
                            $html.='No se encontró el adjunto';
                        }
                        
                    }else{
                         $html.='Sin adjunto';
                    }
                
        $html.='</td>';
                            
            $html.='
               
            </tr>';
            
            $i++;

            unset($cliente);
            unset($status_pago);
            //unset($nombre_cliente);
        }
        
        $mysqli -> close();

        echo $html;

    }


    function mostrar_cupones(){
        $mysqli = conectar();
        $html = "";
        
        $query = " SELECT * FROM catalogo_descuentos WHERE descuento_tipo=2 ORDER BY idsystemdescuento DESC";
        $resultado = $mysqli->query($query);

        while($row = mysqli_fetch_array($resultado)){
            
            
            if($row['descuento_estatus']==1){
                $status='Activo';
            }
            else{
                $status='Desactivado';
            }
            
            
            $html .= '
            <tr>
                <td>
                    cupones:'.$row['idsystemdescuento'].'
                </td>
                <td>' . $row['descuento_formato'] . '</td>';

                if($row['descuento_formato']=='Porcentaje'){

                    $html .= '<td>'.$row['descuento_cantidad'].'%</td>';
                   // $html .= '<td></td>';

                }else if($row['descuento_formato']=='Dinero'){

                    $html .= '<td>$'.number_format($row['descuento_cantidad'],2).'</td>';

                    /*
                    if( is_null($row['descuento_cantidad2'])==false &&  $row['descuento_cantidad2']!=''){
                        $html .= '<td>$'.number_format($row['descuento_cantidad2'],2).'</td>';
                    }else{
                         $html .= '<td></td>';
                    }
                    */
                }


            $html .= '
                <td>' . $row['descuento_existencia'] . '</td>
                <td>' . date('d/m/Y H:i:s',strtotime($row['descuento_valido_desde'])) . '</td>
                <td>' . date('d/m/Y H:i:s',strtotime($row['descuento_valido_hasta'])) . '</td>
                <td>' . $row['descuento_codigo'] . '</td>
                <td>' . $status . '</td>
                <td>' . $row['descuento_notas'] . '</td>
            </tr>';

            unset($status);

        }
        
        $mysqli -> close();

        echo $html;
    }


?>