<?php

defined('_JEXEC') or die;
define('JPATH_BASE', __DIR__);

require_once(JPATH_BASE . '/spivet_white/config.php');

require_once(JPATH_BASE . '/spivet_white/controllers/GeneralController.php');
require_once(JPATH_BASE . '/spivet_white/controllers/RoutesController.php');
require_once(JPATH_BASE . '/spivet_white/controllers/AccessController.php');
require_once(JPATH_BASE . '/spivet_white/models/AccessModel.php');

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

$gController = new GeneralController();
$accModel = new AccessModel();


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


<div class="container" style="padding-top:50px;">
    
    <?php
    
        $error_pagina = 0;
         
        if( $_GET['code'] ){
            
            $id_transaction = $gController->decrypt($_GET['code']);
            
            $querySql = "SELECT tra.id_transaction, tra.status, tra.id_method_payment, tra.file_receipt_attached, tra.id_client, tra.id_secondary, tra.shirt_size,
                                ps.subtotal, ps.discount_purchase, ps.total, ps.currency, ps.money_percentage_commission, ps.money_commission
                         FROM transactions AS tra
                         INNER JOIN payment_summaries AS ps ON ps.id_payment_summary=tra.id_payment_summary
                         WHERE tra.id_transaction = ".$id_transaction;
            $registers = $accModel->getData('', 0, $querySql);
            if( $registers['status'] ) {
                foreach( $registers['data'] as $register ) {
                    
                    $current_id_transaction = $register->id_transaction;
                    $status = $register->status;
                    $method_payment = $register->id_method_payment;
                    $attached = $register->file_receipt_attached;
                    $id_client = $register->id_client;
                    $numPurchase = $register->id_secondary;
                    $shirt_size = $register->shirt_size;
                    
                    $subtotal = $register->subtotal;
                    $discount_purchase = $register->discount_purchase;
                    $total = $register->total;
                    $currency = $register->currency;
                    
                    $money_percentage_commission = $register->money_percentage_commission;
                    $money_commission = $register->money_commission;
                }
            }
            
            
            if( isset($current_id_transaction) ){

                //SPEI
                if($method_payment==3){

                    if($status=='pagado'){

                        $error_pagina = 2;

                    }else if($status=='cancelado'){

                        $error_pagina = 4;

                    }else{

                        if($attached!='' && is_null($attached)==false){

                            ////eliminamos la primera diagonal de la ruta
                            //$ruta = substr($attached, 1);

                            if(file_exists('files/transactions/attached_receipts/'.$attached)){
                    
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
            
            $querySql = "SELECT cli.name, cli.lastname1, cli.lastname2, cli.email, cli.phone, cli.institution,
                         c.country,
                         s.state, 
                         adr.postal_code,
                         cp.name AS cp_name
                         FROM clients AS cli
                         INNER JOIN addresses AS adr ON cli.id_address=adr.id_address
                         INNER JOIN country_states AS cs ON cs.id_country_state=adr.id_country_state
                         INNER JOIN countries AS c ON cs.id_country=c.id_country
                         INNER JOIN states AS s ON cs.id_state=s.id_state
                         INNER JOIN client_positions AS cp ON cp.id_client_position=cli.id_client_position
                         WHERE cli.id_client = ".$id_client;
            $registers = $accModel->getData('', 0, $querySql);
            if( $registers['status'] ) {
                foreach( $registers['data'] as $register ) {
                    
                    $name = $register->name;
                    $lastname1 = $register->lastname1;
                    $lastname2 = $register->lastname2;
                    $email = $register->email;
                    $phone = $register->phone;
                    $institution = $register->institution;
                    $country = $register->country;
                    $state = $register->state;
                    $postal_code = $register->postal_code;
                    $cp_name = $register->cp_name;
                    
                }
            }
            
    ?>
    
            <form action="" id="formPagoProducts">
                
                <input type="hidden" name="code1" id="code1" value="<?php echo $gController->encrypt($current_id_transaction); ?>" readonly />
                
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
                        <div class="col-md-4 form-cell-field">
                            <div class="form-group mobil-center">
                                <label class="label_formulario">Institución:</label><br>
                                <label class="input_formulario"><?php echo $institution;  ?></label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 form-cell-field">
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
                        </div>
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
                        <div class="col-md-4 form-cell-field">
                            <div class="form-group mobil-center">
                                <label class="label_formulario">Talla de playera:</label><br>
                                <label class="input_formulario"><?php echo $shirt_size;  ?></label>
                            </div>
                        </div>
                        <div class="col-md-4 form-cell-field">
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 form-cell-field2 mobil-center">
                            <label for="comprobante" class="customButton"><span style="" id="spaninputfile">ADJUNTAR COMPROBANTE</span></label>
                            <span class="comprobante"><input type="file" id="comprobante" name="comprobante"  accept=".pdf,.jpg,.jpeg,.png"></span><br>
                            <span id="SpanNameFile" class="span_name_file_attached"></span>
                            <span id="BtnCleanInputFile" hidden onclick="cleanFilePay();" style="cursor:pointer;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#dd0b23" class="bi bi-x" viewBox="0 0 14 14">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </span>
                        </div>
                        <div class="col-md-4 form-cell-field2 space_desk">
                            
                        </div>
                        <div class="col-md-4 form-cell-field2 mobil-center">
                            <button type="button" class="customButton2" id="btnPreccedSend" onclick="preccedSend()">ENVIAR COMPROBANTE</button>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
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
                                            $discountItems=0;
                                            $querySql = "SELECT ti.discount_item, ti.sku_general_item, ti.name_general_item, ti.base_price, ti.iva_price, ti.id_general_item,
                                                                cat.name
                                                         FROM transactions AS tra
                                                         INNER JOIN transaction_items AS ti ON tra.id_transaction=ti.id_transaction
                                                         INNER JOIN general_items AS gi ON gi.id_general_item=ti.id_general_item
                                                         INNER JOIN categories AS cat ON cat.id_category=gi.id_category
                                                         WHERE tra.id_transaction = ".$id_transaction;
                                            $registers = $accModel->getData('', 0, $querySql);
                                            if( $registers['status'] ) {
                                                
                                                
                                                foreach( $registers['data'] as $register ) {
                                                    $discountItems = $discountItems + $register->discount_item ;
                                        ?>            
                                                    <tr>
                                                       <td class="celda1 cell-data" >
                                                          <label class="input_table"><?php echo $register->sku_general_item.' '.$register->name_general_item; ?></label>                                                       
                                                       </td>
                                                       <td class="celda1 cell-data" >
                                                          <label class="input_table"><?php echo $register->name; ?></label>
                                                       </td>
                                                       <td class="celda1 cell-data" >
                                                           <label class="input_table">$ <?php echo $register->base_price; ?></label>
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
                                                <label class="texto2">$ <?php echo number_format($subtotal,2);?></label>       
                                           </td>  
                                        </tr>
                                        
                                        <tr>
                                           <td class="celda1 cell-data-pay2" >
                                               
                                           </td>
                                           <td class="celda1_1 cell-data-pay2" align="right">
                                               <label class="label_formulario2">DESCUENTO:</label>
                                           </td>
                                           <td class="celda1_2 cell-data-pay2" align="left">
                                                <label class="texto2">$ <?php echo number_format($discountItems,2);?></label>       
                                           </td>
                                        </tr>
                                        
                                        <tr>
                                           <td class="celda1 cell-data-pay2" >
                                               
                                           </td>
                                           <td class="celda1_1 cell-data-pay2" align="right">
                                               <label class="label_formulario2">CUPONES:</label>
                                           </td>
                                           <td class="celda1_2 cell-data-pay2" align="left">
                                                <label class="texto2">$ <?php echo number_format($discount_purchase,2);?></label>       
                                           </td>
                                        </tr>
                                        
                                        <tr>
                                           <td class="celda1 cell-data-pay2" >
                                               
                                           </td>
                                           <td class="celda1_1 cell-data-pay2" align="right">
                                               <label class="label_formulario2">COMISIONES:</label>
                                           </td>
                                           <td class="celda1_2 cell-data-pay2" align="left">
                                                <label class="texto2">$ <?php echo number_format($money_percentage_commission + $money_commission,2);?></label>       
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
                                                        echo $currency.' $ '.number_format($total,2);
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
            
            echo '<div style="padding-top:100px;padding-bottom:300px;">'; 

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