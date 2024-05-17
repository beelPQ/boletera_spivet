<?php
    use Joomla\CMS\Factory; 
    $document = Factory::getDocument(); 
    require_once($_SERVER['DOCUMENT_ROOT']."/modules/mod_buycarform/tmpl/controllers/queries.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/modules/mod_buycarform/tmpl/controllers/pasarela.php");

    $consulta = new Consulta();
    $pasarela = new Pasarela();
    $typePasarela = $pasarela->checkPasarela();
    $empresa = $consulta->infoCompany();
    $iva = $consulta->getConfig(7);
    $domain = $_SERVER["HTTP_HOST"];
    
    $keyPublicMercadoPago = "";
    //Verificacion de tipo de pasarela seleccionada
    if( $typePasarela["type"] === "MercadoPago" ){ 
        $document->addScript('https://sdk.mercadopago.com/js/v2',  array('version' => 'auto'));
        $key = $pasarela->getKeyPublicMercadoPago();
        if($key != "no_key_registered"){
            $keyPublicMercadoPago = $key;
        }  
    } 
?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="/modules/mod_buycarform/tmpl/assets/plugin/css/intlTelInput.min.css">
<link rel="stylesheet" type="text/css" href="modules/mod_buycarform/tmpl/assets/css/buyCarForm.min.css" />

    <?php 
    //validacion de openpay
    if( $typePasarela["type"] === "OpenPay" ){ ?>
    <script type="text/javascript" src="https://js.openpay.mx/openpay.v1.min.js"></script>
    <script type='text/javascript' src="https://js.openpay.mx/openpay-data.v1.min.js"></script>
    <?php } ?>

<div id="content-canvas" class="content-buycar-form">
    <div class="buycar flex flex-col">
        <div class="buycar-header flex flex-row">
            <div class="button-back">
                
                <a href="http://<?= $domain ?>/servicios">
                    <svg class="flecha-atras" width="16" height="28" viewBox="0 0 16 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="m13.8.6 2 2L4 14.3 15.8 26l-2 2L0 14.3 13.8.6z" fill="#000"/>
                    </svg>    
                    Regresar
                </a>
            </div>
            <div class="title-section">
                <span>PROCEDER AL PAGO</span>
            </div>
            <div class="" style="color:white">
                0000
            </div>
        </div>
        
        <?php  if( $typePasarela["type"] === "MercadoPago" ){ ?>
            <input type="hidden" id="keyPublicMp" value="<?= $keyPublicMercadoPago ?>" readonly>
        <?php } ?>

        <div class="buycar-body flex flex-row">
            <div class="content-form flex">
                <div class="form">
                    <span class="title-form">DATOS PERSONALES</span>
                    <form id="formDataPayment" class="row g-3">

                        <input type="hidden" id="code1_op" readonly value="<?php echo $empresa['openpay_merchantid'];?>" >
                        <input type="hidden" id="code2_op" readonly value="<?php echo $empresa['openpay_llavepublica'];?>" >
                        <input type="hidden" id="code3_op" readonly value="<?php echo $empresa['openpay_sandboxmode'];?>" >

                        <input type="text" name="iva" id="iva" value="<?php echo $iva['configuracion_valor'];?>" autocomplete="off" hidden readonly/>
                        <input type="text" name="amountIVA" id="amountIVA" value="0" data-moneymxn="0" data-moneyusd="0" autocomplete="off" hidden readonly />

                        <input type="text" name="comision" id="comision" value="0" data-moneymxn="0" data-moneyusd="0" autocomplete="off" hidden readonly />
                        <input type="text" name="comision_porcentaje" id="comision_porcentaje" value="0" data-moneymxn="0" data-moneyusd="0" autocomplete="off" hidden readonly />

                        <input type="text" name="descuento_aplicado" id="descuento_aplicado" autocomplete="off" hidden readonly />
                        <input type="text" name="descuento" id="descuento" value="0" data-moneymxn="0" data-moneyusd="0" autocomplete="off" hidden readonly />
                        <input type="text" name="tipo_descuento" id="tipo_descuento"  autocomplete="off" hidden readonly />
                        <input type="text" name="code_descuento" id="code_descuento"  autocomplete="off" hidden readonly />
                        <input type="text" name="iddescuento" id="iddescuento"  autocomplete="off" hidden readonly />

                        <div class="col-md-6">
                            <label for="name" class="form-label">NOMBRE</label>
                            <input type="text" class="form-control" id="name" name="name" maxlength="20">
                        </div>
                        <div class="col-md-6">
                            <label for="lastname1" class="form-label">APELLIDO PRIMARIO</label>
                            <input type="text" class="form-control" id="lastname1" name="lastname1" maxlength="30">
                        </div>
                        <div class="col-md-6">
                            <label for="lastname2" class="form-label">APELLIDO SECUNDARIO</label>
                            <input type="email" class="form-control" id="lastname2" name="lastname2" maxlength="30">
                        </div>
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">EMAIL</label>
                            <input type="email" class="form-control" id="email" name="email" maxlength="30">
                        </div>
                        <div class="col-md-6 flex flex-col">
                            <label for="telwhat" class="form-label">WHATSAPP</label>
                            <input type="text" class="form-control" id="telwhat" name="telwhat" maxlength="10">
                        </div>
                        <div class="col-md-6">
                            <label for="cp" class="form-label">CODIGO POSTAL</label>
                            <input type="text" class="form-control" id="cp" name="cp" maxlength="5">
                        </div>
                        <div class="col-md-6 select-mod">
                            <label for="inputPassword4" class="form-label">PAIS</label>
                            <select name="country" id="country" class="form-control">
                                <!-- content dinamyc -->
                            </select>

                            <svg class="icon-select" width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.983 6.65c.007-.007.01-.018.017-.027l4.8-5.303a.827.827 0 0 0 0-1.08.029.029 0 0 0-.009-.006.643.643 0 0 0-.49-.234h-9.6a.652.652 0 0 0-.497.242L.2.239a.826.826 0 0 0 0 1.081l4.811 5.33a.638.638 0 0 0 .971 0z" fill="#000"/>
                            </svg>

                        </div>
                        <div class="col-md-6 select-mod">
                            <label for="inputPassword4" class="form-label">ESTADO</label>
                            <select name="state" id="state" class="form-control">
                                <!-- content dinamyc -->
                                <option value="no_selected" selected disabled>Seleccionar</option>
                            </select> 
                            <svg class="icon-select" width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.983 6.65c.007-.007.01-.018.017-.027l4.8-5.303a.827.827 0 0 0 0-1.08.029.029 0 0 0-.009-.006.643.643 0 0 0-.49-.234h-9.6a.652.652 0 0 0-.497.242L.2.239a.826.826 0 0 0 0 1.081l4.811 5.33a.638.638 0 0 0 .971 0z" fill="#000"/>
                            </svg>
                        </div>
                        <div class="col-md-6">

                        </div>
                        <span class="subtitle-action" >FORMA DE PAGO</span>
                        <div class="col-md-6 select-mod" >
                            <label for="inputPassword4" class="form-label">FORMA DE PAGO</label>
                            <select name="optionsPayment" id="optionsPayment" class="form-control">
                                <!-- content dinamyc -->
                            </select>
                            <svg class="icon-select" width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.983 6.65c.007-.007.01-.018.017-.027l4.8-5.303a.827.827 0 0 0 0-1.08.029.029 0 0 0-.009-.006.643.643 0 0 0-.49-.234h-9.6a.652.652 0 0 0-.497.242L.2.239a.826.826 0 0 0 0 1.081l4.811 5.33a.638.638 0 0 0 .971 0z" fill="#000"/>
                            </svg>
                        </div>
                        <div class="col-md-6">
                        </div>

                        <div id="content_openpay_tdc" class="col-md-12 row g-3" hidden>

                            <div class="col-md-4" style="border-right: 1px solid #ccc;">
                                <label style="font-weight: 400;font-size: 16px;color: #444;">Tarjetas de crédito</label><br>
                                <img src="images/openpay/cards1.png">
                            </div>

                            <div class="col-md-8">
                                <label style="font-weight: 400;font-size: 16px;color: #444;">Tarjetas de débito</label><br>
                                <img src="images/openpay/cards2.png">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">NOMBRE DEL TITULAR:</label>
                                <input type="text" id="openpay_name" class="form-control" placeholder="Como aparece en la tarjeta" autocomplete="off" data-openpay-card="holder_name" maxlength="80">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">NÚMERO DE TARJETA:</label>
                                <input type="text" id="openpay_card" class="form-control" autocomplete="off" data-openpay-card="card_number" maxlength="19">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">FECHA DE EXPIRACIÓN:</label>
                                <div class="col-md-12 row">
                                    <div class="col-md-6">
                                        <input type="text" id="openpay_month" class="form-control" placeholder="MES (MM)" data-openpay-card="expiration_month" maxlength="2">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" id="openpay_year" class="form-control" placeholder="AÑO (AA)" data-openpay-card="expiration_year" maxlength="2">
                                    </div>
                                </div> 
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">CVV:</label>
                                <input type="text" id="openpay_cvv" placeholder="3 o 4 dígitos" autocomplete="off" data-openpay-card="cvv2" maxlength="4">
                            </div>

                            <div class="col-md-3">
                            </div>


                            <div class="col-md-3">
                            </div>

                            <div class="col-md-4"  style="text-align:right;" >
                                <label style="font-weight: 400;font-size: 12px;color: #444;">Transacciones realizadas vía:</label><br>
                                <img src="images/openpay/openpay.png" width="118.2px" height="36.24px">
                            </div>

                            <div class="col-md-1" style="border-left: 1px solid #ccc;padding-top:7px;text-align:right;@media(max-width: 550px) {text-align:center;}">
                                <img src="images/openpay/security.png">
                            </div>

                            <div class="col-md-4">
                                <label style="font-weight: 400;font-size: 12px;color: #444;padding-top:7px;">Tus pagos se realizan de forma segura con encriptación de 256 bits</label>
                            </div>
                            
                            <input type="hidden" name="token_id" id="token_id">
                        </div>

                        <span class="subtitle-action" style="display: none;">¿DESEA AGREGAR FACTURA?</span>
                        <div class="contentRadBtn-invoice" style="display: none;">
                            <input type="radio" id="addInvoice_yes" class="input__radio__invoice" name="addInvoice" value="1" > 
                            <label for="addInvoice_yes">Sí requiero factura</label>
                        
                            <input type="radio" id="addInvoice_no" class="input__radio__invoice"  name="addInvoice" value="0" checked style="margin-left:100px;">
                            <label for="addInvoice_no">No requiero factura</label>
                        </div>

                        <div class="form-group content-attach-file hidden" >
                            <label class="label_formulario">ADJUNTAR CONSTANCIA </label>
                            <br>
                            <label for="inputConsFiscal" class="btn labelAttach">
                                <span id="span_inputConsFiscal" class="textAttach">Adjuntar</span>
                            </label>
                            <span class="inputConsFiscal">
                                <?php 
                                    //en data-regularext van las extensiones que se quieren admitir en forma de expresion regular, por ejemplo ".pdf|\.png|\.jpg" o ".pdf"
                                    //en data-extensions van las extensiones que se quieren admitir en forma de texto(aqui puede ir cualquier texto)
                                    //en data-maxsizemb va el tamaño maximo en MB que se quiere admitir
                                    
                                    //en css hay estilos para las clases Attach, deleteFile y cleanFile
                                    //en js hay un escuchador del evento change para la clase inputAttach
                                    //en js hay una funcion llamada fileValidation
                                    //en js hay un escuchador del evento click para la clase btnCleanFile 
                                ?>
                                <input type="file" class="inputAttach" name="inputConsFiscal" id="inputConsFiscal"  data-regularext=".pdf" data-extensions="pdf" data-maxsizemb="2" accept=".pdf" >
                            </span>
                            <br>
                            <span class="deleteFile" id="delete_inputConsFiscal" hidden></span> 
                        </div>

                    </form>

                </div>
            </div>


            <div class="content-car">
                <div class="car">
                    <div class="divContentSumPayDesk" id="divContentSumPayDesk">


                        <div class="accordion accordion-flush" id="contentSummaryPaymentDesktop"><?php //id se usa en el div de abajo 
                                                                                                    ?>

                            <div class="accordion-item border__decoration">

                                <h2 class="accordion-header" id="headingSumPayDesktop"> <?php //id se usa en el div de abajo 
                                                                                        ?>

                                    <button class="accordion-button clickDeploySumPayDesktop collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSumPayDesktop" aria-expanded="false" aria-controls="collapseSumPayDesktop">

                                        <div type="button" class="position-relative clickDeploySumPayDesktop">
                                            <img class="clickDeploySumPayDesktop" src="modules/mod_buycar/tmpl/img/icons/icon_counter.svg">
                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-light text-dark clickDeploySumPayDesktop counterItems">0</span>
                                        </div>

                                        <div class="accordion-header-text clickDeploySumPayDesktop">
                                            Total: <span id="strCurrencyTotal" class="label-currency clickDeploySumPayDesktop">MXN</span> <span class="label-total clickDeploySumPayDesktop" data-totalmxn="$0.00" data-totalusd="$0.00">$0.00</span>
                                        </div>

                                        <span class="clickDeploySumPayDesktop label-deploySumPay" id="label-deploySumPayDesktop">Ver</span> <?php //id se usa en js 
                                                                                                                                            ?>

                                    </button>

                                </h2>


                                <div id="collapseSumPayDesktop" class="accordion-collapse collapse" aria-labelledby="headingSumPayDesktop" data-bs-parent="#contentSummaryPaymentDesktop"> <?php //id se usa en el button de arriba 
                                                                                                                                                                                            ?>
                                    <div class="accordion-body">

                                        <div class="contentItemsCupon">

                                            <div class="contentItemsPayment">
                                            </div>

                                            <div class="contentCupon step3" >
                                                <div class="labelCupon">Cupón</div>
                                                <div class="inputsCupon">
                                                    <input type="text" class="form-control input_formulario input-cupon" name="cuponDesktop" id="cuponDesktop" maxlength="5"><button type="button" class="btn-cupon">Aplicar</button>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="contentItemsTotal">
                                            <div>Subtotal</div>
                                            <div align="right"><span class="label-subtotal" data-moneymxn="$0.00" data-moneyusd="$0.00">$0.00</span></div>
                                            <div>Descuento</div>
                                            <div align="right"><span class="label-discount" data-moneymxn="$0.00" data-moneyusd="$0.00">$0.00</span></div>
                                            <div>IVA</div>
                                            <div align="right"><span class="label-iva" data-moneymxn="$0.00" data-moneyusd="$0.00">$0.00</span></div>
                                            <div>Comisión</div>
                                            <div align="right"><span class="label-commission" data-moneymxn="$0.00" data-moneyusd="$0.00">$0.00</span></div>
                                            <div style="font-weight: bold;">Total</div>
                                            <div style="font-weight: bold;" align="right"><span id="strCurrencyTotalCollapse" class="label-currency">MXN</span> <span class="label-total" data-totalmxn="$0.00" data-totalusd="$0.00">$0.00</span></div>
                                        </div>

                                    </div>

                                </div>



                            </div>



                        </div>
                        
                        <div class="content-aviso">
                            <div class="aviso-privacity">
                                <div class="contentcheck-aviso">
                                    <input type="checkbox" id="checkAviso" class="input__check__aviso" name="checkAviso" value="1" > 
                                    <label for="checkAviso">He leído y estoy de acuerdo con el Aviso de Privacidad</label>
                                </div>    
                            </div>
                        </div>

                        <div class="content-payment">
                            <button id="btnPaymentDesktop" class="payment-button btn-payment-view-one">Pagar</button>
                        </div>

                    </div><!-- end divContentSumPayDesk -->
                </div>
            </div>
        </div>

    </div>
</div>


<?php
    /**
     * *MERCADO PAGO
     * Modal para fomrulario de pago
     */
    if( $typePasarela["type"] === "MercadoPago" ){
?>
<button type="button" id="btnModalPayment" data-bs-toggle="modal" data-bs-target="#mdlPayment" hidden> abrir modal</button>
<div class="modal fade" id="mdlPayment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdlContributionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlContributionLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="btnClosedModal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="bodyFormMP">
                <div class="mdlHeader mb-4">
                    <!-- <h3 class="mdlHeader-title mb-4">Datos de pago</h3> -->
                    
                </div>
                <div class="mdlForm">
                    <!-- <h3 class="mdlForm-title">Datos personales</h3> -->
                    

                    <!-- <section class="mdlForm-cardform my-4"></section> -->
                    <div id="cardPaymentBrick_container"></div>  <!-- contenedor de fomulario mpsdk -->

                    <div class="mdlForm-paybtn flex justify-content-center align-items-center p-4">
                        <input type="submit" value="Proceder al pago" class="btn btn_modalmp" id="btnContinuePay" disabled hidden>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php } ?>



<?php
    /**
     * *MERCADO PAGO
     * Template de formulario
     */
    if( $typePasarela["type"] === "MercadoPago" ){
?>
<template id="tmpFormMp">
    <form id="form-checkout" class="pb-2" style="display: none;">
        <h3 class="mdlForm-title mb-3">Datos de pago</h3>
        <div id="form-checkout__cardNumber" class="container"></div>
        <div id="form-checkout__expirationDate" class="container"></div>
        <div id="form-checkout__securityCode" class="container"></div>
        <input type="text" id="form-checkout__cardholderName" class="form-control" />
        <select id="form-checkout__issuer" class="form-select"></select>
        <select id="form-checkout__installments" class="form-select"></select>
        <input type="email" id="form-checkout__cardholderEmail" class="form-control" />

        <button type="submit" id="form-checkout__submit">Pagar</button>
        <progress value="0" class="progress-bar">Cargando...</progress>
    </form>
</template>
<?php } ?>

<script src="/modules/mod_buycarform/tmpl/assets/plugin/js/intlTelInput.min.js"></script>
<script src="/modules/mod_buycarform/tmpl/assets/js/transactionMP.js?1.1"></script>
<script src="/modules/mod_buycarform/tmpl/assets/js/calculations.js"></script> 
<script src="/modules/mod_buycarform/tmpl/assets/js/buycarform.js?1.2"></script>
<script src="/modules/mod_buycarform/tmpl/assets/js/transaction.js?1.1"></script>
