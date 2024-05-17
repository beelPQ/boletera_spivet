<?php

defined('_JEXEC') or die;
define('JPATH_BASE', __DIR__);

require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/conect.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/common.php");


/**require_once(JPATH_BASE . '/spivet_white/controllers/GeneralController.php');
require_once(JPATH_BASE . '/spivet_white/controllers/RoutesController.php');
require_once(JPATH_BASE . '/spivet_white/controllers/AccessController.php');
require_once(JPATH_BASE . '/spivet_white/models/AccessModel.php');*/

$jsJQuery = '/modules/mod_form_attach_file/tmpl/js/jquery-3.4.1.min.js';
$jsModule = '/modules/mod_form_attach_file/tmpl/js/mod_form_attach_file.js';
$jsSweetalert2 = 'https://cdn.jsdelivr.net/npm/sweetalert2@11';
$cssModule = '/modules/mod_form_attach_file/tmpl/css/mod_form_attach_file.css';

$document = JFactory::getDocument();
$document->addStyleSheet($cssModule);
$document->addScript($jsJQuery);
$document->addScript($jsSweetalert2);

date_default_timezone_set('America/Mexico_City');
$fecha=date("d/m/Y H:i:s");

//$gController = new GeneralController();
//$accModel = new AccessModel();


?>

<div id="spinner" class="content-spinner" style="display:none;">
    <div class="spinner-body">
        <span id="txtSpanSpinner" class="txtSpanSpinner" >Cargando</span>
        <div class="spinner-circle"></div>
        <div class="spinner-circle1"></div>
        <div class="spinner-circle2"></div>
        <div class="spinner-circle3"></div>
        <div class="spinner-circle4"></div>
        <div class="spinner-circle5"></div>
    </div>
</div>

<div class="content-page content-min" style="">
<div class="container" style="padding-top:50px;">
    
    <?php
    
        $error_pagina = 0;
        
        $comm = new Common();
        $database = new myDataBase();
        $con = $database->conect_mysqli();
        
        if( $_GET['code'] ){
            //$id_cobro = $comm->encrypt($_GET['code']);
            //echo $id_cobro;
            $id_transaction = $comm->decrypt($_GET['code']);
            //$id_transaction = $comm->decrypt( $id_cobro);
            
            if( $id_transaction != ""){ 
                $querySql = "SELECT idsystemcobrocat,forma_depago_IDsystemapades , cobroscata_status, cobroscata_adjunto FROM catalogo_cobros WHERE idsystemcobrocat = $id_transaction"; 
                $exectSql = $con->query($querySql);
                $result = "";
                if($exectSql->num_rows > 0){
                    $result = mysqli_fetch_assoc($exectSql);
                    $current_id_transaction = $result["idsystemcobrocat"];
                    $method_payment = $result["forma_depago_IDsystemapades"];
                    $status = $result["cobroscata_status"];
                    
                    $attached = $result["cobroscata_adjunto"];
                }else{
                    
                   
                }
            }else{
                 $error_pagina = 1;
            }
            
            
            
            if( isset($current_id_transaction) ){

                //SPEI
                if($method_payment==5){
                    
                    if($status==1){// 1 es pagado

                        $error_pagina = 2;

                    }else if($status==2){ //2 es cancelado

                        $error_pagina = 4;

                    }else{
                  
                        if($attached!='' && is_null($attached)==false){

                            if(file_exists('files/adjuntos/'.$attached)){
                    
                                $error_pagina = 3;
                            }

                        }

                    }

                }else{
                    $error_pagina = 1;
                }
            
            }else{
                $error_pagina = 1;
            }
            
        
        }else{
            $error_pagina = 1;
        }
    
    
        if( $error_pagina == 0 ){
            
             
            $querySql = "SELECT ccl.clientes_nombre, ccl.clientes_apellido1, ccl.clientes_apellido2, ccl.clientes_email, ccl.clientes_telefono, ccl.clientes_codigopostal, cc.cobroscata_idregcobro,
                        mu.municipio, es.estado
                        FROM catalogo_cobros cc 
                        INNER JOIN catalogo_clientes ccl ON ccl.idsystemcli = cc.clientes_idsystemcli
                        INNER JOIN estados_municipios em ON em.municipios_id = ccl.id_municipio
                        INNER JOIN municipios mu ON mu.id = ccl.id_municipio
                        INNER JOIN estados es ON es.id = em.estados_id
                        WHERE cc.idsystemcobrocat = $current_id_transaction";
            $exectSql = $con->query($querySql);
            
            //echo json_encode($resultSql);
            if($exectSql->num_rows > 0 ){
                $resultSql = mysqli_fetch_assoc($exectSql);
                $name =  $resultSql["clientes_nombre"];
                $lastname1 = $resultSql["clientes_apellido1"];
                $lastname2 = $resultSql["clientes_apellido2"];
                $phone = $resultSql["clientes_telefono"];
                $email = $resultSql["clientes_email"];
                $postal_code = $resultSql["clientes_codigopostal"];
                $state = $resultSql["estado"];
                $numPurchase = $resultSql["cobroscata_idregcobro"];
                
            }
            
    ?>
    
            <form action="" id="formPagoProducts">
                
                <input type="hidden" name="code1" id="code1" value="<?php echo $comm->encrypt($current_id_transaction); ?>" readonly />
                
                <div class="row">
                    <div class="col-md-6 mobil-center">
                        
                    </div>
                    <div class="col-md-6 texto1 textsubheader mobil-center" align="right">
                        NÚMERO DE COMPRA: <?php echo $numPurchase; ?><br>
                        <?php echo $fecha; ?><br>
                    </div>
        
                </div>
                
                <div id="divContent">
                    
                    <h5 class="mobil-center">DATOS PERSONALES</h5>
                    <!-- Nombre y primer apellido -->
                    <div class="row">
                        <div class="col-md-4 form-cell-field">
                            <div class="form-group mobil-center">
                                <label class="label_formulario">Nombre:</label><br>
                                <label class="input_formulario"><?php echo $name;  ?></label>
                            </div>
                        </div>
                        <div class="col-md-4 form-cell-field">
                            <div class="form-group mobil-center">
                                <label class="label_formulario">Apellido primario:</label><br>
                                <label class="input_formulario"><?php echo $lastname1; ?></label>
                            </div>
                        </div>
                        <div class="col-md-4 form-cell-field">
                            <div class="form-group mobil-center">
                                <label class="label_formulario">Apellido secundario:</label><br>
                                <label class="input_formulario"><?php  echo $lastname2;  ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 form-cell-field">
                            <div class="form-group mobil-center">
                                <label class="label_formulario">Teléfono:</label><br>
                                <label class="input_formulario"><?php echo $phone;  ?></label>
                            </div>
                        </div>
                        <div class="col-md-4 form-cell-field">
                            <div class="form-group mobil-center">
                                <label class="label_formulario">Email:</label><br>
                                <label class="input_formulario"><?php echo $email;  ?></label>
                            </div>
                        </div>
                        <!--<div class="col-md-4 form-cell-field">
                            <div class="form-group mobil-center">
                                <label class="label_formulario">Institución:</label><br>
                                <label class="input_formulario"><?php echo $institution;  ?></label>
                            </div>
                        </div>-->
                    </div>
                    
                    <div class="row">
                        <!--<div class="col-md-4 form-cell-field">
                            <div class="form-group mobil-center">
                                <label class="label_formulario">Cargo:</label><br>
                                <label class="input_formulario"><?php echo $cp_name;  ?></label>
                            </div>
                        </div>
                        <div class="col-md-4 form-cell-field">
                            <div class="form-group mobil-center">
                                <label class="label_formulario">País:</label><br>
                                <label class="input_formulario"><?php echo $country;  ?></label>
                            </div>
                        </div>-->
                        <div class="col-md-4 form-cell-field">
                            <div class="form-group mobil-center">
                                <label class="label_formulario">Estado:</label><br>
                                <label class="input_formulario"><?php echo $state;  ?></label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 form-cell-field">
                            <div class="form-group mobil-center">
                                <label class="label_formulario">Código postal:</label><br>
                                <label class="input_formulario"><?php echo $postal_code;  ?></label>
                            </div>
                        </div>
                        <!--<div class="col-md-4 form-cell-field">
                            <div class="form-group mobil-center">
                                <label class="label_formulario">Talla de playera:</label><br>
                                <label class="input_formulario"><?php echo $shirt_size;  ?></label>
                            </div>
                        </div>-->
                        <div class="col-md-4 form-cell-field">
                            
                        </div>
                    </div>

                    <div class="row-buttons-actions">
                        <div class="col-md-4 form-cell-field2 mobil-center ali-left">
                            <label for="comprobante" class="customButton"><span style="" id="spaninputfile">ADJUNTAR COMPROBANTE</span></label>
                            <span class="comprobante"><input type="file" id="comprobante" name="comprobante"  accept=".pdf,.jpg,.jpeg,.png"></span><br>
                            <div>
                                <span id="SpanNameFile" class="span_name_file_attached"></span>
                                <span id="BtnCleanInputFile" hidden onclick="cleanFilePay();" style="cursor:pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#dd0b23" class="bi bi-x" viewBox="0 0 14 14">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <!--<div class="col-md-4 form-cell-field2 space_desk">
                            
                        </div>-->
                        <div class="col-md-4 form-cell-field2 mobil-center ali-right">
                            <button type="button" class="customButton2" id="btnPreccedSend" onclick="preccedSend()">ENVIAR COMPROBANTE</button>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-card-content">
                            <div class="card card-blue direct-chat direct-chat-dark collapsed-card">
                                <div class="card-header card-personalizado" >
                                    Detalles de la compra
                                    
                                    <span id="svg-plus" onclick="showDetails();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>
                                    </span>
                                    <span id="svg-minus" style="display: none;" onclick="hideDetails();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                          <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                        </svg>
                                    </span>
                                </div>
                                
                                <div id="details_purchase" class="card-footer" style="display: none;">
                                    <table class="table-products-info">
                                        
                                        <tr>
                                            <td class="celda1 cell-data">
                                                <label class="label_table">ITEM</label>            
                                            </td>
                                            <td class="celda1 cell-data">
                                                <label class="label_table">TIPO</label>
                                            </td>
                                            <td class="celda1 cell-data">
                                                <label class="label_table">PRECIO</label>
                                            </td>
                                        </tr>
                                        
                                       
                                        <?php
                                            
                                             
                                            /*$discountItems=0;
                                            $querySql = "SELECT ti.discount_item, ti.sku_general_item, ti.name_general_item, ti.base_price, ti.iva_price, ti.id_general_item,
                                                                ti.sku_packet,ti.name_packet, ti.discount_packet,
                                                                cat.name
                                                         FROM transactions AS tra
                                                         INNER JOIN transaction_items AS ti ON tra.id_transaction=ti.id_transaction
                                                         INNER JOIN general_items AS gi ON gi.id_general_item=ti.id_general_item
                                                         INNER JOIN categories AS cat ON cat.id_category=gi.id_category
                                                         WHERE tra.id_transaction = ".$id_transaction." 
                                                         ORDER BY ti.sku_packet DESC";
                                            $registers = $accModel->getData('', 0, $querySql);*/
                                            $queryCobro = "SELECT cobroscata_preciobase, cobroscata_montotransaccion, comision_total, cobroscata_descuento  FROM catalogo_cobros WHERE idsystemcobrocat = $current_id_transaction";
                                            $exectCobro = $con->query($queryCobro);
                                            $resultCobro = mysqli_fetch_assoc($exectCobro);
                                            
                                            $querySqlItems = "SELECT cp.catalogo_productos_nombre, ccp.categorias_programas_nombre, cpm.modalidad_nombre, cci.cobroscata_items_preciobase, cci.cobroscata_items_descuentoproducto 
                                                                FROM catalogo_cobros_items cci 
                                                                INNER JOIN catalogo_productos cp ON cp.idsystemcatpro = cci.catalogo_productos_idsystemcatpro
                                                                INNER JOIN catalogo_categorias_programas ccp ON ccp.idsystemcatproon = cp.categorias_programasonline_idsystemcatproon
                                                                INNER JOIN catalogo_producto_modalidad cpm ON cpm.idsystemprodmod = cp.producto_modalidad_idsystemprodmod
                                                                WHERE cobroscata_idsystemcobrocat = $current_id_transaction ";
                                            $exectItems = $con->query($querySqlItems);
                                           
                                            if( $exectItems->num_rows > 0 ) {
                                                $totalDescuetoItem = 0;
                                                while( $register = mysqli_fetch_array($exectItems, MYSQLI_ASSOC)) {
                                                     $totalDescuetoItem += floatval($register["catalogo_productos_nombre"]);
                                                
                                        ?>
                                                    <tr>
                                                       <td class="celda1 cell-data" >
                                                          <label class="input_table"><?php echo $register["catalogo_productos_nombre"] ?></label>                                                       
                                                       </td>
                                                       <td class="celda1 cell-data" >
                                                          <label class="input_table"><?php echo $register["categorias_programas_nombre"]."-".$register["modalidad_nombre"] ?></label>
                                                       </td>
                                                       <td class="celda1 cell-data" >
                                                           <label class="input_table">$<?php echo $register["cobroscata_items_preciobase"] ?></label>
                                                       </td>
                                                    </tr>
                                          
                                                        
                                        <?php
                                                   
                                        
                                                }
                                                
                                               
  
                                            }
                                        
                                        ?>
                                        
                                        <tr>
                                            <td class="celda3 linea_separador" colspan="3" ></td>
                                        </tr>

                                        <tr>
                                           <td class="celda1 cell-data-pay">
                                               
                                           </td>
                                           <td class="celda1_1 cell-data-pay" align="right">
                                               <label class="label_formulario2">SUBTOTAL:</label>
                                           </td>
                                           <td class="celda1_2 cell-data-pay" align="left">
                                                <label class="texto2">$ <?php echo $resultCobro["cobroscata_preciobase"]; ?></label>       
                                           </td>  
                                        </tr>
                                        
                                        <tr>
                                           <td class="celda1 cell-data-pay2" >
                                               
                                           </td>
                                           <td class="celda1_1 cell-data-pay2" align="right">
                                               <label class="label_formulario2">DESCUENTO:</label>
                                           </td>
                                           <td class="celda1_2 cell-data-pay2" align="left">
                                                <label class="texto2">$ <?php echo number_format($totalDescuetoItem, 2);?></label>       
                                           </td>
                                        </tr>
                                        
                                        <tr>
                                           <td class="celda1 cell-data-pay2" >
                                               
                                           </td>
                                           <td class="celda1_1 cell-data-pay2" align="right">
                                               <label class="label_formulario2">CUPONES:</label>
                                           </td>
                                           <td class="celda1_2 cell-data-pay2" align="left">
                                                <label class="texto2">$ <?php echo $resultCobro["cobroscata_descuento"];?></label>       
                                           </td>
                                        </tr>
                                        
                                        <tr>
                                           <td class="celda1 cell-data-pay2" >
                                               
                                           </td>
                                           <td class="celda1_1 cell-data-pay2" align="right">
                                               <label class="label_formulario2">COMISIONES:</label>
                                           </td>
                                           <td class="celda1_2 cell-data-pay2" align="left">
                                                <label class="texto2">$ <?php echo $resultCobro["comision_total"];?></label>       
                                           </td>
                                        </tr>
                                        
                                        
                                        <tr>
                                           <td class="celda1 cell-data-pay2" >
                                               
                                           </td>
                                           <td align="right" class="celda1_1 cell-data-pay2" >
                                               <label class="label_formulario2">TOTAL:</label>
                                           </td>
                                           <td class="celda1_2 cell-data-pay2" style="<?php echo $monto_spacetop; ?>" align="left">
                                                <label class="texto3">
                                                    <?php
                                                        echo $currency.' $ '.$resultCobro["cobroscata_montotransaccion"];
                                                    ?>
                                                </label>       
                                           </td>
                                        </tr>
                                        
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </form>
            
            <script>

                $('#comprobante').change(function(){
               
                    var filename = $(this).val().split('\\').pop();
                    var idname = jQuery(this).attr('id');
                    if(filename!=''){

                        Swal.fire({
                            title: '',
                            html: '<span class="alertsw2_text1">Adjuntaste: '+filename+'</span><br><br><span class="alertsw2_text2">¿Estás seguro que el archivo adjunto es el correcto?</span>',
                            icon: 'warning',
                            customClass: {
                                popup: 'swal-big',
                                confirmButton: 'swal2-customBtn1',
                                cancelButton: 'swal2-customBtn2'
                            },
                            showCancelButton: true,
                            cancelButtonText: `VOLVER A ADJUNTAR`,
                            confirmButtonText: `SÍ, ES EL CORRECTO`,
                            reverseButtons: true
                        }).then((result) => {
                            if (result.value) {
                    
                                //jQuery('#spaninputfile').html(filename);
                                $('#SpanNameFile').html(filename);
                                document.getElementById('BtnCleanInputFile').hidden=false;           
                    
                            } else {
                                document.querySelector('#comprobante').value='';
                                $('#SpanNameFile').html('');
                                document.getElementById('BtnCleanInputFile').hidden=true;
                            }
                        });

                        
                    }
                    else{
                        //jQuery('#spaninputfile').html('ADJUNTAR COMPROBANTE');
                        $('#SpanNameFile').html('');
                        document.getElementById('BtnCleanInputFile').hidden=true;
                    }
                 
                });


            </script>

            <?php
                $document->addScript($jsModule);
            ?>
            
    <?php
    
        }else{
            
            echo '<div class="final-message" style="padding-top:100px;padding-bottom:300px;">'; 

                        if($error_pagina==1){
                            echo 'Página no encontrada';
                        }elseif ($error_pagina==2) {
                            echo 'Su pago ya ha sido verificado.';
                        }elseif ($error_pagina==3) {
                            echo 'Ya ha adjuntado su comprobante de pago.';
                        }elseif ($error_pagina==4) {
                            echo 'Su solicitud de pago ha sido cancelada.';
                        }

            echo '</div>';
            
        }
    
    ?>
    
    
</div>
</div>
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>