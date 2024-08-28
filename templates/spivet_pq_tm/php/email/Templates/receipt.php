<?php

require_once($_SERVER['DOCUMENT_ROOT']."/templates/spivet_pq_tm/php/common.php");
require_once($_SERVER['DOCUMENT_ROOT']."/modules/mod_buycarform/tmpl/controllers/queries.php");



    //getTemplateReceipt(15,"mail");
    function getTemplateReceipt($id_cobro,$format){
        $generalf = new Common();
        $consulta = new Consulta();
        $cobro = $consulta->getPayement($id_cobro);
        $client = $consulta->getClient($cobro['clientes_idsystemcli']);
        
        

        $dominio = $consulta->getConfig(9); 

        if($format=='mail'){
            
            $imgLogo = $dominio['configuracion_valor']."/images/Spivet/Header/logo_spivet_grande.png";
            
        }else{
            
            $urlLogo = $dominio['configuracion_valor']."/images/Spivet/Header/logo_spivet_grande.png";
            $imgLogo = "data:image/png;base64," . base64_encode(file_get_contents($urlLogo));
            //$imgLogo = "";
        }

        date_default_timezone_set('America/Mexico_City');
        $current_date =date("d/m/Y H:i:s");


        $name = $client['clientes_nombre'];
        $full_name = '';
        $email = '';
        $phone = '';
        $legendSector = '';
        $serviceInteresting = ''; 

        
        ob_start();
?>
        <!DOCTYPE html>
        <html lang="en">

        <?php if($format=='mail'){ ?>
        <head>
        <?php } ?>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>

                @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap');
                <?php if($format == "pdf"){ ?>
                    @page {
                        margin-left: 0!important;
                        margin-right: 0!important;
                    }
                    body{
                        margin: 0; 
                    }
                <?php }else{ ?>
                    body{
                        margin: 0; 
                    }
                <?php } ?>
                
                .content-header{
                    width: 100%;
                    height: 93px;
                    background-color: #000;
                }
                .table__header{
                    width: 100%;
                    height: 100%;
                    background: #000;
                }
                .table__header tr, .table__header td{
                    
                    height: 100%;
                    
                }
                .table__header td{
                    vertical-align: middle;
                }
                <?php if($format=='pdf'){ ?>
                    .title_header__important{
                        font-weight: bold;
                        font-stretch: normal;
                        font-style: normal;
                        line-height: normal;
                        font-size: 13px;
                        color: white;
                        font-family: 'Ubuntu', sans-serif;
                        font-weight: bold;
                    }

                    .title_header__date{
                        font-weight: bold;
                        font-stretch: normal;
                        font-style: normal;
                        line-height: normal;
                        font-size: 13px;
                        color: white;
                        font-family: 'Ubuntu', sans-serif;
                        font-weight: bold;
                    }
                <?php }else { ?>
                .title_header__important{
                    font-weight: bold;
                    font-stretch: normal;
                    font-style: normal;
                    line-height: normal;
                    font-size: 15px;
                    color: white;
                    font-family: 'Ubuntu', sans-serif;
                    font-weight: bold;
                }

                .title_header__date{
                    font-weight: bold;
                    font-stretch: normal;
                    font-style: normal;
                    line-height: normal;
                    font-size: 15px;
                    color: white;
                    font-family: 'Ubuntu', sans-serif;
                    font-weight: bold;
                }
                <?php } ?>
                
                .td__icon{
                    width: 10%;
                    text-align: center;
                }
                .td__icon img{
                    margin-top: 5px;
                }
                .td__title, .td__title_date{
                    width: 70%;
                }
                
                <?php if($format == "pdf"){ ?>

                    .content-body{
                        padding: 1rem 2rem;
                    }

                    .title__email{
                        font-family: 'Ubuntu', sans-serif;
                        font-size: 13px;
                        font-weight: lighter;
                    }

                    .td__title_date{
                        text-align: right;
                        margin-right: 6px;
                        padding-right: 1rem;
                    }
                <?php }else{ ?>
                    .content-body{
                        padding: 2rem;
                    }

                    .title__email{
                        font-family: 'Ubuntu', sans-serif;
                        font-size: 15px;
                        font-weight: lighter;
                    }
                <?php } ?>
                
                .table__info__peronal{
                    width: 100%;
                }

                .title__activate__account{
                    font-family: 'Ubuntu', sans-serif;
                    font-size: 25px;
                    font-weight: bold;
                    height: 80px;
                }

                .btn__activate__account{
                    width: 240px;
                    height: 38px;
                    border: none;
                    border-radius: 5px;
                    background-color: #000;
                    color: white;
                    cursor: pointer!important;
                    position: relative;
                }


              
                <?php if( $format == "pdf" ){ ?>
                    .table__info__peronal td{
                        height: 2rem;
                        padding-left: 2rem;
                        font-size: 13px;
                        font-family: 'Ubuntu', sans-serif;
                        font-weight: bold;
                        background-color: #f9c809;/**mod_color */
                        border-bottom: solid 1px #01002f;
                        border-top: solid 1px #01002f;
                    }
                <?php }else { ?>
                    .table__info__peronal td{
                        height: 2.5rem;
                        padding-left: 2rem;
                        font-size: 16px;
                        font-family: 'Ubuntu', sans-serif;
                        font-weight: bold;
                        background-color: #f9c809;/**mod_color */
                        border-bottom: solid 1px #01002f;
                        border-top: solid 1px #01002f;
                    }
                <?php } ?>



                .table__info__personal td span{
                    margin-left: 2rem;
                }
                .table__info__detail{
                    width: 50%;
                    margin-top:1rem;
                    margin-bottom:1rem;
                    /*margin-left: 2rem;
                    margin-right: 2rem;*/
                    font-family: 'Ubuntu', sans-serif;
                }
                .table__info__detail tr{
                   height: 1.5rem;
                }

                <?php if($format == "pdf"){ ?>
                    .table__info__detail td{
                        font-size: 13px;
                        width: 2rem;
                        height: 2.5rem;
                    }
                <?php }else{ ?>
                    .table__info__detail td{
                        font-size: 15px;
                        width: 2rem;
                        height: 3.5rem;
                    }
                <?php } ?>
                

                <?php if($format == "pdf"){ ?>
                    .space-pdf{
                        margin-top: -2rem;
                    }
                <?php } ?>
               
                

                <?php if($format == "pdf"){ ?>
                    .tr-datos-payment{
                        font-size: 13px;
                    }
                <?php }?>


                 <?php if($format == "pdf"){ ?>

                            .line__separator{
                                width: 98%;
                                border-bottom: solid 1px #01002f;
                                margin: 2rem 1rem;
                            }
                    
                <?php }else{ ?>

                            .line__separator{
                                width: 98%;
                                border-bottom: solid 1px #01002f;
                                margin: 2.5rem 1rem;
                            }

                <?php }?>


               
                .content__footer{
                    font-family: 'Ubuntu', sans-serif;
                    margin-top: 1rem;
                    width: 100%;
                    text-align: center;
                }

                <?php if($format == "pdf"){ ?>
                    .content__footer{
                        font-family: 'Ubuntu', sans-serif;
                        font-size: 13px;
                    }
                <?php } ?>
                .text__color{
                    color: #f1d600;/**mod_color */
                }


                .icono {
                    position: absolute;
                    top: 50%;
                    right: 5px; /* Ajustar la posición del icono */
                    transform: translateY(-50%);
                    width: 20px; /* Ajustar el tamaño del icono */
                    height: 20px; /* Ajustar el tamaño del icono */
                    background: url('/templates/spivet_pq_tm/php/email/Templates/img/ir_sitio.svg') no-repeat center; /* Ruta a la imagen del icono */
                    color: #fff;
                }


                .table_list_products{
                    width: 100%;

                    border-collapse: separate;
                    border-spacing: 0 45px;
                }

                <?php if($format=='pdf'){ ?>
                            .table_list_products td{
                                width: 50%;
                            }
                <?php } ?>

                

                <?php if($format=='mail'){ ?>
                            .table_inputs{
                                width: 100%;
                            }
                <?php }else{ ?>
                            .table_inputs{
                                width: 100%;
                            }
                <?php } ?>

                .table_inputs td{
                    width: 33.3%;
                }

                


                <?php if($format=='mail'){ ?>
                    .custom-button1{
                       /*  width: 240px; 
                        height:38px; */ 
                        border-radius: 3px;
                        border: solid 1px  #01002f;
                        background-color:  #01002f;
                        color : white !important;   
                        font-size: 14px;
                        font-weight: bold; 
                        text-decoration: none;
                        text-align:center;
                        padding: 5px 9px;
                    }
                    

                <?php }else{ ?>

                    .custom-button1{
                       /*  width: 140px; 
                        height:38px; */ 
                        border-radius: 3px;
                        border: solid 1px  #01002f;
                        background-color:  #01002f;
                        color : white !important;   
                        font-size: 13px;
                        font-weight: bold; 
                        text-decoration: none;
                        text-align:center;
                        padding: 5px 9px;
                        
                    }
                <?php  } ?>
                
                .td-min {
                        text-align : center!important;
                }
                
                .detail_compra{
                    padding : 0rem 2rem;
                }
                
                .td_collapse_title{
                    height: 26px !important;
                }

                @media only screen and (max-width: 500px)  {
                    .title_header{
                        font-weight: bold; 
                        font-size: 15px;
                        color: white; 
                    }
                    .title_header__important{
                        font-size: 14px;
                    }
                    .title_header__date{
                        font-size: 10px;
                    }
                    .td__title, .td__title_date{
                        width: 60%;
                    }
                    .title__email{
                        font-size: 12px;
                    }
                    .table__info__peronal td{
                        font-size: 11px;
                    }
                    .table__info__detail td{
                        font-size: 10px;
                    }
                    .table__info__detail{
                        width: 100%;
                    }
                    .content__footer{
                        font-size: 14px;
                    }

                    .custom-button1{
                        font-size: 11px; 
                    }
                    .td-min{
                        width: 250px; 
                    }
                    .td-min {
                        text-align : left!important;
                    }
                    
                    .table_inputs td{
                        width: 30%;
                    }

                    
                }

            </style>
        <?php if($format=='mail'){ ?>
        </head>
        <?php } ?>
        <body>
            <div class="content">
                <div class="content-header">
                    <table class="table__header">
                        <tr>
                            <td class="td__icon">
                                <img src="<?php echo $imgLogo;?>" 
                                alt="" width="75" >
                            </td>
                            <td class="td__title"> 
                                <span class="title_header__important">
                                    <?php 
                                        if($cobro['cobroscata_status']==1){
                                            echo 'Comprobante de pago';
                                        }else{

                                            if($cobro['forma_depago_IDsystemapades']==2 || $cobro['forma_depago_IDsystemapades']==3 || $cobro['forma_depago_IDsystemapades']==5 || $cobro['forma_depago_IDsystemapades']==6){
                                                echo 'Solicitud de pago';
                                            }

                                        } 

                                    ?>   
                                    - Boletera Spivet
                                </span>
                            </td>
                            <td class="td__title_date">
                                <span class="title_header__date">Folio compra: <?php echo $cobro['cobroscata_idregcobro']; ?> <br> <?php echo $current_date; ?></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="content-body" >
                    <table >
                        <tr>
                            <td class="title__email" > 
                                <!-- <span>
                                    <?php 
                                        if($cobro['cobroscata_status']==1){
                                            echo 'Hola '.$client['clientes_nombre'].', gracias por tu pago. A continuación verás los detalles de tu compra. ';
                                        } 
                                    ?> 
                                </span>  -->
                            </td>
                            
                        </tr>
                        <!-- <tr>
                            <td class="title__activate__account">
                                <span>Activar cuenta:</span>
                            </td>
                        </tr> -->
                        <?php if($format == "mail"){ ?>
                       
                                    <tr>
                                        <td></td>
                                    </tr>
                                    
                                    <tr>
                                        <?php if($cobro['cobroscata_status']==1){?>
                                        <td style="width: 200px;" >
                                            <!-- <a href="<?php echo $dominio['configuracion_valor'] ?>/index.php/inicio.html">
                                                <button class="btn__activate__account">Ir al sitio <span class="icono"></span> </button>
                                            </a> -->
                                            <?php if($cobro['cobroscata_status']==1){?>
                                                <img class="qr" src="https://chart.googleapis.com/chart?chs=160x160&cht=qr&chl=<?= urlencode($dominio['configuracion_valor']) ?>&choe=UTF-8&chld=1" />
                                            <?php } ?>
                                        </td>
                                        <?php } ?>
                                        <td   >
                                            <!-- <a href="<?php echo $dominio['configuracion_valor'] ?>/files/comprobantes/<?php echo $cobro['cobroscata_pdf'] ?>">
                                                <button class="btn__activate__account">Descargar comprobante</button>
                                            </a> -->
                                            <span>
                                                <?php 
                                                    if($cobro['cobroscata_status']==1){
                                                        echo 'Hola '.$client['clientes_nombre'].', gracias por tu pago. A continuación verás los detalles de tu compra. ';
                                                        echo "<br>";
                                                        echo "<br>";
                                                    }
                                                    else{
                                                        
                                                        if($cobro['forma_depago_IDsystemapades']==2 || $cobro['forma_depago_IDsystemapades']==3 || $cobro['forma_depago_IDsystemapades']==5 || $cobro['forma_depago_IDsystemapades']==6){
                                                            echo 'Hola '.$client['clientes_nombre'].', a continuación verás los detalles de tu solicitud de pago. ';
                                                            echo "<br>";
                                                            echo "<br>";
                                                        }
                                                        
                                                    }
                                                ?>
                                                
                                                    <a href="<?php echo $dominio['configuracion_valor'] ?>/files/comprobantes/<?php echo $cobro['cobroscata_pdf'] ?>">
                                                    <button class="btn__activate__account" style="">Imprimir comprobante</button>
                                            </a>
                                            </span> 
                                        </td>
                                    </tr>
                                    <tr><td>
                                    
                                    </td></tr>
                                    <tr>
                                        <!-- <td>
                                            <a href="<?php echo $dominio['configuracion_valor'] ?>/files/comprobantes/<?php echo $cobro['cobroscata_pdf'] ?>">
                                                <button class="btn__activate__account">Descargar comprobante</button>
                                            </a>
                                        </td> -->
                                    </tr>
                        <?php }?>
                        
                    </table>
                </div>


                <?php 
                    if($cobro['cobroscata_status']==1){
                ?> 
                        <!--
                        <div class="space-pdf">
                            <table class="table__info__detail table_list_products">

                                

                            </table>
                        </div>
                        -->
                <?php 
                    }
                ?>


                <div class="">
                    <table class="table__info__peronal">
                        <tr>
                            <td>
                                <span>Datos personales </span>
                            </td>
                        </tr>
                    </table> 
                    
                </div>
                <div class="content_info detail_compra">
                    <table class="table__info__detail table_inputs">
                        <tr>
                            <td >
                                <span> <strong>Nombre</strong> </span> <br>
                                <span> <?php echo $client['clientes_nombre']; ?> </span>
                            </td>
                            <td >
                                <span> <strong>Apellido primario</strong> </span> <br>
                                <span> <?php echo $client['clientes_apellido1']; ?> </span>
                            </td>
                            <td >
                                <span> <strong>Apellido secundario</strong> </span> <br>
                                <span> <?php echo $client['clientes_apellido2']; ?> </span>
                            </td>
                        </tr>

                        <tr>
                            <td >
                                <span> <strong>Email:</strong> </span> <br>
                                <?php  
                                    $emailMin = substr($client['clientes_email'], 0, 15);
                                ?>
                                <span> <?php echo $emailMin."..." ?> </span>
                            </td>
                            <td >
                                <span> <strong>Whatsapp</strong> </span> <br>
                                <span> <?php echo $client['clientes_telefono'] ?> </span>
                            </td>
                            <td >
                                <span> <strong>Código postal:</strong> </span> <br>
                                <span> <?php echo $client['clientes_codigopostal']; ?> </span>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="">
                    <table class="table__info__peronal">
                        <tr>
                            <td>
                                <span>Detalles de compra</span>
                            </td>
                        </tr>
                    </table> 
                    
                </div>
                <div class="content_info detail_compra">
                    <table class="table__info__detail table_inputs" style="border-collapse: collapse;">
                        <tr>
                            <td>
                                <span> <strong>ID Transacción</strong> </span> <br>
                                <span> <?php echo $cobro['cobroscata_idtransaccion']; ?> </span>
                            </td>
                            <td>
                                <span> <strong>ID Cobro</strong> </span> <br>
                                <span> <?php echo $cobro['cobroscata_idregcobro']; ?> </span>
                            </td>
                            <td>
                                <?php
                                    $formapago = $consulta->getFormPay($cobro['forma_depago_IDsystemapades']);
                                ?>

                                <span> <strong>Forma de pago</strong> </span> <br>
                                <span> 
                                    <?php 
                                        if( $cobro['forma_depago_IDsystemapades']==1 || $cobro['forma_depago_IDsystemapades']==2 || $cobro['forma_depago_IDsystemapades']==3 ){

                                            echo $formapago['plataforma'].'-'.$formapago['Nombrepago'];

                                        }else{
                                            echo $formapago['Nombrepago'];
                                        }
                                         
                                    ?> 
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="td_collapse_title">
                                <span> <strong>Item</strong> </span> 
                            </td>
                            <td class="td_collapse_title">
                                <span> <strong>Tipo</strong> </span> 
                            </td>
                            <td class="td_collapse_title">
                                <span> <strong>Precio</strong> </span> 
                            </td>
                        </tr>

                        <?php 
                            $cobro_items = $consulta->getPaymentItems($cobro['idsystemcobrocat']);
                            if(is_null($cobro_items)==false){

                                while ($row = mysqli_fetch_array($cobro_items)) {

                                    $product = $consulta->getProduct($row['catalogo_productos_idsystemcatpro']);
                                    $category = $consulta->getCategory($product['categorias_programasonline_idsystemcatproon']);
                        ?>
                                    <tr>
                                        <td>
                                            <span> <?php echo $product['catalogo_productos_nombre']; ?> </span>
                                        </td>
                                        <td>
                                            <span> <?php echo $category['categorias_programas_nombre'].' - '.$row['modality']; ?> </span>
                                        </td>
                                        <td>
                                            <span>
                                                <?php 
                                                    echo $cobro['cobroscata_moneda'].' $'.number_format($row['cobroscata_items_preciofinal'],2); //50% de descuento proporcionado, mod_buycarform/queries.php,action.php - mod_buycar/queries.php - common/envioEmail/Templates/receipt.php.php - mod_detail_course/courseDetail.php
                                                ?>
                                            </span>
                                        </td>
                                    </tr>

                        <?php 
                                }
                            }
                        ?>

                        <tr class="tr-datos-payment">
                            <td style="border-top:1px solid #72aabe;padding-top:20px;">
                                
                            </td>
                            <td style="border-top:1px solid #72aabe;padding-top:20px;">
                                <span> <strong>SUBTOTAL</strong> </span><br>
                                <span> <strong>DESCUENTO</strong> </span><br>
                                <span> <strong>IVA</strong> </span><br>
                                <span> <strong>COMISIONES</strong> </span>   
                            </td>
                            <td style="border-top:1px solid #72aabe;padding-top:20px;">
                                <span><?php echo $cobro['cobroscata_moneda']; ?> $<?php echo number_format($cobro['cobroscata_preciobase'],2); ?></span><br>
                                <span><?php echo $cobro['cobroscata_moneda']; ?> $<?php echo number_format($cobro['cobroscata_descuento'],2); ?></span><br>
                                <span><?php echo $cobro['cobroscata_moneda']; ?> $<?php echo number_format($cobro['iva_amount'],2); ?></span><br>
                                <span><?php echo $cobro['cobroscata_moneda']; ?> $<?php echo number_format($cobro['comision_total'],2); ?></span>
                            </td>
                        </tr>

                        <tr class="tr-datos-payment">
                            <td>
                                
                            </td>
                            <td>
                                <span> <strong>TOTAL</strong> </span> 
                            </td>
                            <td>
                                <span><strong><?php echo $cobro['cobroscata_moneda']; ?> $<?php echo number_format($cobro['cobroscata_montotransaccion'],2); ?></strong></span>
                            </td>
                        </tr>

                    </table>
                </div>


                <?php 
                    if($cobro['cobroscata_status']==0){
                        if($cobro['forma_depago_IDsystemapades']==2 || $cobro['forma_depago_IDsystemapades']==3 || $cobro['forma_depago_IDsystemapades']==5 || $cobro['forma_depago_IDsystemapades']==6){
                ?>

                            <div class="">
                                <table class="table__info__peronal">
                                    <tr>
                                        <td>
                                            <!--<span>Hoja de solicitud de pago</span>-->
                                            <span>Instrucciones</span>
                                        </td>
                                    </tr>
                                </table>   
                            </div>
                            <div class="content_info detail_compra">
                                <table class="table__info__detail table_inputs">
                                    <tr>
                                        <td align="" class="td-min">

                                            <?php
                                                if($cobro['forma_depago_IDsystemapades']==2 || $cobro['forma_depago_IDsystemapades']==3){
                                                    $empresa = $consulta->infoCompany();
    
                                                    if($empresa['openpay_sandboxmode']==1){
                                                        $urlDashboard = 'https://sandbox-dashboard.openpay.mx';
                                                    }else{
                                                        $urlDashboard = 'https://dashboard.openpay.mx';
                                                    }
    
    
                                                    if($cobro['forma_depago_IDsystemapades']==2){
    
                                                        $urlHoja = $urlDashboard.'/spei-pdf/'.$empresa['openpay_merchantid'].'/'.$cobro['cobroscata_idtransaccion']; 
    
                                                    }else if($cobro['forma_depago_IDsystemapades']==3){
                                                        
                                                        $urlHoja = $urlDashboard.'/paynet-pdf/'.$empresa['openpay_merchantid'].'/'.$cobro['cobroscata_idtransaccion_secondary']; 
                                                    }

                                                
                                            ?>

                                                    <a class="custom-button1" href="<?php echo $urlHoja; ?>" target="_blank">Descargar solicitud</a>
                                            
                                            <?php
                                                }else if($cobro['forma_depago_IDsystemapades']==5){
                                                    $empresa = $consulta->infoCompany();
                                            ?>
                                                    <span><strong>Pasos para realizar el pago:</strong></span><br>
                                                    <span><strong>1. Ingresa a la sección de transferencias o pagos a otros bancos y proporciona los datos de la transferencia:</strong></span><br><br>
                                                    <span><strong>Beneficiario: </strong></span><span><?php echo $empresa['transferencia_beneficiario']; ?></span><br><br>
                                                    <span><strong>Banco: </strong></span><span><?php echo $empresa['transferencia_banco']; ?></span><br><br>
                                                    <span><strong>CABLE interbancaria: </strong></span><span><?php echo $empresa['transferencia_clabe']; ?></span><br><br>
                                                    <span><strong>Concepto de pago: </strong></span><span><?php echo $cobro['cobroscata_idregcobro']; ?></span><br><br>
                                                    <span><strong>Referencia: </strong></span><span><?php echo $cobro['cobroscata_idregcobro']; ?></span><br><br>
                                                    <span><strong>Monto: </strong></span><span>$<?php echo number_format($cobro['cobroscata_montotransaccion'],2); ?></span><br><br>
                                                    
                                                    <span><strong>2. Luego envía tu comprobante a través del siguiente link (pdf, jpeg, jpg):</strong></span><br><br>
                                                    <a class="" href="<?php echo $dominio['configuracion_valor']; ?>index.php/adjuntar-comprobante.html/?code=<?php echo Common::encrypt($cobro['idsystemcobrocat']); ?>" target="_blank"><button class="btn__activate__account">Enviar comprobante de pago</button></a>
                                            
                                            <?php       
                                                } else if($cobro['forma_depago_IDsystemapades']==6) {
                                            ?>
                                                    <span><strong>Al elegir el método de pago "Efectivo" ud. debe presentarse para efectuar el pago y le otorgarán el acceso correspondiente y 
                                                    de acuerdo a las políticas de pago vigente del organizador <a href="<?= $dominio['configuracion_valor']."/aviso-de-privacidad" ?>"> (ver aquí)</a>.</strong></span><br>
                                                   
                                            <?php
                                            
                                                }
                                            ?>
                                            
                                        </td>
                                        
                                    </tr>

                                </table>
                            </div>

                <?php
                        } 
                    
                    }
                ?>

                <!--<div class="">
                    <table class="table__info__peronal">
                        <tr>
                            <td>
                                <span>Detalles de la transacción</span>
                            </td>
                        </tr>
                    </table> 
                    
                </div>-->
                <!--<div class="content_info detail_compra">
                    <table class="table__info__detail table_inputs">
                        <tr>
                            <td>
                                <span> <strong>ID Transacción</strong> </span> <br>
                                <span> <?php echo $cobro['cobroscata_idtransaccion']; ?> </span>
                            </td>
                            <td>
                                <span> <strong>ID Cobro</strong> </span> <br>
                                <span> <?php echo $cobro['cobroscata_idregcobro']; ?> </span>
                            </td>
                            <td>
                                <?php
                                    $formapago = $consulta->getFormPay($cobro['forma_depago_IDsystemapades']);
                                ?>

                                <span> <strong>Forma de pago</strong> </span> <br>
                                <span> 
                                    <?php 
                                        if( $cobro['forma_depago_IDsystemapades']==1 || $cobro['forma_depago_IDsystemapades']==2 || $cobro['forma_depago_IDsystemapades']==3 ){

                                            echo $formapago['plataforma'].'-'.$formapago['Nombrepago'];

                                        }else{
                                            echo $formapago['Nombrepago'];
                                        }
                                         
                                    ?> 
                                </span>
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <span> <strong>Solicitud de factura:</strong> </span> <br>
                                <span> <?php if($cobro['facturar']==1){ echo 'Si'; }else{ echo 'No'; }  ?> </span>
                            </td>
                            <?php 
                                if($cobro['facturar']==1){
                            ?> 
                                    <td>
                                        <span> <strong>Constancia fiscal:</strong> </span> <br>

                                        <?php if($format=='pdf'){ ?>
                                                <br>
                                        <?php } ?>

                                        <a class="custom-button1" href="<?php echo $dominio['configuracion_valor']; ?>/files/constancias_fiscales/<?php echo $cobro['facturacion_constancia']; ?>" target="_blank" style="margin-left:20px;">Ver</a>
                                    </td>
                                   
                            <?php       
                                } 
                            ?>
                        </tr> 

                        

                    </table>
                </div>-->


                <div class="line__separator"></div>
                <div class="content__footer">
                    <p> <strong>Políticas del servicio</strong> </p> 

                    <strong> <strong>Consulta nuestro Aviso de Privacidad </strong> </strong>  <br>
                    <strong> <strong> <?= $dominio['configuracion_valor'] ?>aviso-de-privacidad </strong> </strong>
                    <p class="text__color"> <strong> Powered by: </strong> </p>
                    <strong> <strong> Piquero Tecnología & Deportes </strong> </strong> <br>
                    <strong class="text__color"> <strong> www.piquero.com.mx </strong> </strong> <br>
                    <strong> <strong> Linkedin: Piquero Tecnología & Deportes </strong> </strong>
                </div>
            </div>

            
        </body>
        </html>

<?php

        $html = ob_get_clean();
        //echo $html;
        return $html;
    }
?>