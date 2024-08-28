<?php

defined('_JEXEC') or die;
use Joomla\CMS\Factory; 
$document = Factory::getDocument(); 
require_once($_SERVER['DOCUMENT_ROOT']."/modules/mod_buycarform/tmpl/controllers/queries.php");
require_once($_SERVER['DOCUMENT_ROOT']."/modules/mod_buycarform/tmpl/controllers/pasarela.php");

    $consulta = new Consulta();
    $empresa = $consulta->infoCompany(); 
    $iva = $consulta->getConfig(7);
    $pasarela = new Pasarela();
    $typePasarela = $pasarela->checkPasarela();

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

<link rel="stylesheet" href="/modules/mod_buycar/tmpl/plugin/css/intlTelInput.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="modules/mod_buycar/tmpl/css/mod_buycar.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>


<?php 
    //validacion de openpay
    if( $typePasarela["type"] === "OpenPay" ){ ?>
    <script type="text/javascript" src="https://js.openpay.mx/openpay.v1.min.js"></script>
    <script type='text/javascript' src="https://js.openpay.mx/openpay-data.v1.min.js"></script>
<?php } ?>

<div class="buycar_content">

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

    <div id="titleContent" class="section_title1" align="center">
        SERVICIOS
    </div>

    <!-- Button trigger modal -->
    <button id="btnModality" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" hidden>
        Launch static backdrop modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Seleccionar tipo de modalidad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <span class="text-selected-modality">Seleccionar modalidad</span>
                    <div class="contentRadBtn-modality">
                        <input type="radio" id="addModalityPres" class="input__radio__invoice" name="addModality" value="Presencial">
                        <label for="addModalityPres">Presencial</label>

                        <input type="radio" id="addModalityVir" class="input__radio__invoice" name="addModality" value="Virtual" checked="" style="margin-left:50px;">
                        <label for="addModalityVir">Virtual</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary button-cerrar-modal" data-bs-dismiss="modal">Cerrar</button>
                    <button id="btnSelectionModality" type="button" class="btn btn-primary button-accept-modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mainContent"> 
       

        <div class="selectionProducts">

            <div class="contentFilters">
                <!-- INPUT MULTILSELECT SEARCH -->
                <div class="input-search">

                    <div class="input-search-filter flex">
                        <div id="contentSelectDesktop" class="content-multiselect">
                            <select id="typeFilterDesktop" multiple="multiple" class="input-select">
                                <option value="1">opcion 1</option>
                                <option value="2">opcion 2</option>
                            </select>
                        </div>
                        <span class="line-separator"></span>
                        <input type="text" class="form-control input-text" id="txtSearchDesktop" placeholder="Buscar servicio">

                        <svg id="btnSearchInputDesktop" class="input-icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.357 13.737a8.03 8.03 0 0 0 10.619.659l5.318 5.318a1 1 0 0 0 1.414-1.414l-5.318-5.318A8.04 8.04 0 0 0 2.357 2.36a8.042 8.042 0 0 0 0 11.376zm1.414-9.96A6.043 6.043 0 1 1 2 8.05a6 6 0 0 1 1.77-4.276v.002z" fill="#fff"/>
                        </svg>

                    </div>
                </div>
                <!-- INPUT MULTILSELECT SEARCH -->

            </div>


            <div class="contentProducts" id="contentProducts">

            </div>

            <div class="content-button">
                <button id="btnViewProducts" class="btn-views-products">Ver mas</button>
            </div>


        </div>


        
        <div class="divContentSumPayDesk" id="divContentSumPayDesk">


            <div class="accordion accordion-flush" id="contentSummaryPaymentDesktop"><?php //id se usa en el div de abajo 
                                                                                        ?>

                <div class="accordion-item border__decoration">

                    <h2 class="accordion-header" id="headingSumPayDesktop"> <?php //id se usa en el div de abajo 
                                                                            ?>

                        <button class="accordion-button clickDeploySumPayDesktop collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSumPayDesktop" aria-expanded="false" aria-controls="collapseSumPayDesktop">

                            <div type="button" class="position-relative clickDeploySumPayDesktop">
                                <img class="clickDeploySumPayDesktop" src="modules/mod_buycar/tmpl/img/icons/icon_counter.svg">
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-light text-dark clickDeploySumPayDesktop counterItems circle-count-items">0</span>
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

                                <div class="contentCupon step3" hidden>
                                    <!--
                                    <div class="labelCupon">Cupón</div>
                                    <div class="inputsCupon">
                                        <input type="text" class="form-control input_formulario input-cupon" name="cuponDesktop" id="cuponDesktop" maxlength="5"><button type="button" class="btn-cupon">Aplicar</button>
                                    </div>
                                    -->
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
                                <div align="right" style="font-weight: bold;"><span id="strCurrencyTotalCollapse" class="label-currency">MXN</span> <span class="label-total" data-totalmxn="$0.00" data-totalusd="$0.00">$0.00</span></div>
                            </div>

                        </div>

                    </div>



                </div>



            </div>

            <div class="content-payment">
                <button class="payment-button btn-payment-view-one">Pagar</button>
            </div>



        </div><!-- end divContentSumPayDesk -->



    </div><!-- end mainContent -->

    


</div>
<?php  if( $typePasarela["type"] === "MercadoPago" ){ ?>
    <input type="hidden" id="keyPublicMp" value="<?= $keyPublicMercadoPago ?>" readonly>
<?php } ?>
<div id="content-canvas" class="content-accordition-movil"></div>
<div class="space-content-movil"></div>
<div id="contentBtnMobilePay" class="content-button-payment">
    <div class="button-payment-sec">
        <button class="btn-payment-movil btn-disabled" disabled>PAGAR</button>
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
    <div class="modal-dialog modal-lg modal-dialog-centered">
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




<script src="/modules/mod_buycar/tmpl/plugin/js/intlTelInput.min.js"></script>
<script src="/modules/mod_buycarform/tmpl/assets/js/transactionMP.js?1.1"></script>
<script src="/modules/mod_buycarform/tmpl/assets/js/calculations.js"></script> 
<script src="/modules/mod_buycar/tmpl/js/default_functions.js?1.2" type="text/javascript"></script>
<script src="/modules/mod_buycar/tmpl/js/default_listeners.js" type="text/javascript"></script>
<script src="/modules/mod_buycarform/tmpl/assets/js/transaction.js?1.1"></script>