
const eventModalMP = (tipo) => {
    document.querySelector("#btnModalPayment").click();
    initSdkMP(tipo);
}

window.addEventListener('load', (event) => {



    const inputSearch = `
    <div class="input-search"> 
        <div class="input-search-filter flex">
            <div id="contentSelectMovil" class="content-multiselect">
                <select id="typeFilterMovil" multiple="multiple" class="input-select">
                    <option value="1">opcion 1</option>
                    <option value="2">opcion 2</option>
                </select>
            </div>
            <span class="line-separator"></span>
            <input type="text" class="form-control input-text" id="txtSearchMovil" placeholder="Buscar servicio">
            <svg id="btnSearchInputMovil" class="input-icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.357 13.737a8.03 8.03 0 0 0 10.619.659l5.318 5.318a1 1 0 0 0 1.414-1.414l-5.318-5.318A8.04 8.04 0 0 0 2.357 2.36a8.042 8.042 0 0 0 0 11.376zm1.414-9.96A6.043 6.043 0 1 1 2 8.05a6 6 0 0 1 1.77-4.276v.002z" fill="#fff"/>
            </svg>
        </div>
    </div> 
    `;

    const formRegisterPayment = `
    <div class="content-form-payment flex">
        <div class="form content-form-collapse">
            <span class="title-form">DATOS PERSONALES</span>
            <form id="formPaymentCourses" class="row g-3">
            
                <div class="col-md-6">
                    <label for="name" class="form-label">NOMBRE</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="col-md-6">
                    <label for="lastname1" class="form-label">APELLIDO PRIMARIO</label>
                    <input type="text" class="form-control" id="lastname1" name="lastname1">
                </div>
                <div class="col-md-6">
                    <label for="lastname2" class="form-label">APELLIDO SECUNDARIO</label>
                    <input type="email" class="form-control" id="lastname2" name="lastname2">
                </div>
                <!--<div class="col-md-6">

                </div>-->
                <div class="col-md-6">
                    <label for="email" class="form-label">EMAIL</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="col-md-6 flex flex-col">
                    <label for="telwhat" class="form-label">WHATSAPP</label>
                    <input type="text" class="form-control" id="telwhat" name="telwhat" maxlength="13">
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
                        <option value="no_selected" selected disabled>Seleccionar</option>
                        <!-- content dinamyc -->
                    </select>
                    <svg class="icon-select" width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.983 6.65c.007-.007.01-.018.017-.027l4.8-5.303a.827.827 0 0 0 0-1.08.029.029 0 0 0-.009-.006.643.643 0 0 0-.49-.234h-9.6a.652.652 0 0 0-.497.242L.2.239a.826.826 0 0 0 0 1.081l4.811 5.33a.638.638 0 0 0 .971 0z" fill="#000"/>
                    </svg>
                </div>
                
                <!--<div class="col-md-6">

                </div>-->

                

           

            </form>

        </div>
    </div>
    `

    const methoPaymentInvoice = `
    <div class="content-form-invoice flex">
        <div class="form content-form-collapse">
            <form id="formDataPayment" class="row g-3">
            <span class="subtitle-action">FORMA DE PAGO</span>
                <div class="col-md-6 select-mod">
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
                        <img src="/images/openpay/cards1.png">
                    </div>

                    <div class="col-md-8">
                        <label style="font-weight: 400;font-size: 16px;color: #444;">Tarjetas de débito</label><br>
                        <img src="/images/openpay/cards2.png">
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
                        <img src="/images/openpay/openpay.png" width="118.2px" height="36.24px">
                    </div>

                    <div class="col-md-1" style="border-left: 1px solid #ccc;padding-top:7px;text-align:right;@media(max-width: 550px) {text-align:center;}">
                        <img src="/images/openpay/security.png">
                    </div>

                    <div class="col-md-4">
                        <label style="font-weight: 400;font-size: 12px;color: #444;padding-top:7px;">Tus pagos se realizan de forma segura con encriptación de 256 bits</label>
                    </div>
                    
                    <input type="hidden" name="token_id" id="token_id">
                </div>

                <span class="subtitle-action" style="display:none;">¿DESEA AGREGAR FACTURA?</span>
                <div class="contentRadBtn-invoice" style="display:none;">
                    <input type="radio" id="addInvoice_yes" class="input__radio__invoice" name="addInvoice" value="1" > 
                    <label for="addInvoice_yes">Sí requiero factura</label>
                
                    <input type="radio" id="addInvoice_no" class="input__radio__invoice"  name="addInvoice" value="0" checked style="margin-left:100px;">
                    <label for="addInvoice_no">No requiero factura</label>
                </div>

                <div class="form-group content-attach-file hidden" style="display:none;" >
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
    `;

    let cartMobile = `
        <div class="accordion accordion-flush" id="contentSummaryPaymentMobile"><?php //id se usa en el div de abajo ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSumPayMobile"> <?php //id se usa en el div de abajo ?>
                    <button  class="accordion-button clickDeploySumPayMobile collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSumPayMobile" aria-expanded="false" aria-controls="collapseSumPayMobile">
                        <div type="button" class="position-relative clickDeploySumPayMobile" >
                          <img class="clickDeploySumPayMobile" src="/modules/mod_buycar/tmpl/img/icons/icon_counter.svg">
                          <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-light text-dark clickDeploySumPayMobile counterItems" >0</span>
                        </div>

                        <div class="accordion-header-text clickDeploySumPayMobile" >
                            Total: <span class="label-currency clickDeploySumPayMobile">MXN</span> <span class="label-total clickDeploySumPayMobile" data-totalmxn="$0.00" data-totalusd="$0.00">$0.00</span>
                        </div>
                        
                        <span class="clickDeploySumPayMobile label-deploySumPay" id="label-deploySumPayMobile">Ver</span> <?php //id se usa en js ?>
                   
                    </button>

                </h2>


                <div id="collapseSumPayMobile" class="accordion-collapse collapse" aria-labelledby="headingSumPayMobile" data-bs-parent="#contentSummaryPaymentMobile"> <?php //id se usa en el button de arriba ?>
                    <div class="accordion-body">
                        
                        <div class="contentItemsCupon">
                            
                            <div class="contentItemsPayment">
                            </div>
                            
                            <div class="contentCupon step3" >
                                <div class="labelCupon">Cupón</div>
                                <div class="inputsCupon">
                                    <input type="text" class="form-control input_formulario input-cupon" name="cuponMobile" id="cuponMobile" maxlength="5"><button type="button" class="btn-cupon">Aplicar</button>
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
                            <div style="font-weight: bold;" >Total</div>
                            <div align="right" style="font-weight: bold;"><span class="label-currency">MXN</span> <span class="label-total" data-totalmxn="$0.00" data-totalusd="$0.00">$0.00</span></div>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>  
    `;

    const accordition = `
    <div class="accordion" id="accoritionCarBuyForm">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button id="collapStepSelectedCourse" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        <span class="mark-important">Paso 1:</span>&nbsp;Seleccion del curso
                        <span class="status-section-unfinished status-selected-course"></span>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accoritionCarBuyForm">
                    <div class="accordion-body">

                        ${inputSearch}

                        <div class="content-cards-courses">
                        
                        </div>
                        <div class="content-button">
                            <button id="btnViewProductsMovil" class="btn-views-products">Ver todas</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button id="collapStepDataPerson" class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <span class="mark-important">Paso 2:</span>&nbsp;Datos personales
                        <span class="status-section-unfinished status-form"></span>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accoritionCarBuyForm">
                    <div class="accordion-body">
                        ${formRegisterPayment}
                    </div>
                </div>
            </div>
            <div class="accordion-item" >
                <h2 class="accordion-header">
                    <button id="collapPaymentFinal" class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <span class="mark-important">Paso 3:</span>&nbsp;Método de pago
                        <span class="status-section-unfinished status-form "></span>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accoritionCarBuyForm">
                    <div class="accordion-body">
                       ${methoPaymentInvoice}
                    </div>
                </div>
            </div>
        </div>
    
    `;

    const contenetAcordition = document.querySelector(`.content-accordition-movil`).innerHTML = accordition;

    //console.log(document.querySelector("#headerContent"));
    //let contentHeaderSite = document.querySelector("#headerContent");
    //document.querySelector("#headerContent").innerHTML += cartMobile; 
    document.querySelector("#headerContent").insertAdjacentHTML("afterend", cartMobile);
    //console.log(document.querySelector("#headerContent"));
    $('#typeFilterMovil').multiselect();



    const validateRecaptcha = (tipo) => {
        grecaptcha.ready(function () {
            grecaptcha.execute('6LevnX0pAAAAAM8b4qITJ6OHfpRdAZN1DF32xdpt', { action: 'formulario_pago' }).then(function (token) {
                //console.log(token);
                const dataVelidateR = new FormData();    //Se crea un objeto de tipo FormData para almacenar la informacion que se validara.
                dataVelidateR.append('token', token);   //Se agrega la variable tipo al formdata.
                const xhrValRecaptcha = new XMLHttpRequest(); //Se crea un objeto XML
                xhrValRecaptcha.open('POST', '/modules/mod_buycarform/tmpl/model/validateRecaptcha.php', true);   //Se especifica en que metodo, a donde y si es asincrono.
                xhrValRecaptcha.onload = function () {
                    const response = JSON.parse(this.response);
                    console.log(response);
                    if (!response.reqStatus) {
                        Swal.fire(
                            'Error en reCaptcha',    //TITLE
                            'El reCaptcha no fue reconocido para este sitio',  //TEXT
                            'error',  //TYPE
                            'Aceptar'   //CONFIRMBUTTONTEXT
                        );
                        return;
                    } else {
                        //eventModalMP(tipo);
                        proccessPago(tipo);
                    }

                }
                xhrValRecaptcha.send(dataVelidateR);   //Enviamos los datos
            });
        });
    }


    document.addEventListener("click", (e) => {
        if (e.target) {

            let element = e.target;
            let elementID = e.target.id;
            let elementClass = e.target.classList;

            if (elementClass.contains('clickDeploySumPayMobile')) {
                btnSumPayChange('Mobile');
            } else if (elementClass.contains('clickDeploySumPayDesktop')) {
                btnSumPayChange('Desktop');
            } else if (elementClass.contains('btnAdd')) {
                let isInCart = verifyProductInCart(element.dataset.code);
                if (isInCart == 0) {
                    if (element.dataset.modality == "Mixto") {
                        document.querySelector(`#btnModality`).click();
                        document.querySelector(`.modal-backdrop`).style.zIndex = "0";
                        document.querySelector(`.modal-backdrop`).style.background = "transparent";
                        document.querySelector(`.main-backimage`).style.zIndex = "1";
                        document.querySelector(`#staticBackdrop`).style.background = "#0000009e";
                        const btnAccept = document.querySelector("#btnSelectionModality");
                        btnAccept.dataset.code = element.dataset.code;
                        btnAccept.dataset.name = element.dataset.name;
                        btnAccept.dataset.pricemxn = element.dataset.pricemxn;
                        btnAccept.dataset.priceusd = element.dataset.priceusd;
                        btnAccept.dataset.modality = "Virtual";

                        //addItem(element.dataset.code,element.dataset.name,element.dataset.pricemxn,element.dataset.priceusd,'Product');  
                    } else {
                        addItem(element.dataset.code, element.dataset.name, element.dataset.pricemxn, element.dataset.priceusd, 'Product', element.dataset.modality);
                    }
                    //addItem(element.dataset.code,element.dataset.name,element.dataset.pricemxn,element.dataset.priceusd,'Product');
                }


            } else if (elementClass.contains('deleteProduct')) {
                deleteProduct(element);
            } else if (elementClass.contains(`btn-payment-view-one`)) {
                // ? Verificamos primero si existe un usario logeado [Moroni - 15May2024]
                const inlogin = localStorage.getItem('inlogin') || '';
                const dataId = document.body.getAttribute('data-id') || '';
                const dataName = document.body.getAttribute('data-name') || '';
                const dataEmail = document.body.getAttribute('data-email') || '';
                localStorage.setItem('nextView', 1);
                if (dataId == '' && dataName == '' && dataEmail == '') {
                    // Verificamos que se haya seleccionado un producto
                    const textContentTotal = document.querySelector('.label-total')?.textContent;
                    const textTotalValue = textContentTotal !== undefined && parseFloat(textContentTotal.replace('$', '')) > 0 ? 
                        parseFloat(textContentTotal.replace('$', '')) : 0;
                    const subtotalTmp = localStorage.getItem('subtotal')??0;
                    const amountTmp = localStorage.getItem('amount')??0;
                    if( textTotalValue == 0 || parseFloat(textTotalValue) == 0 || parseFloat(textTotalValue) == 0) {
                        Swal.fire({
                            title: "No hay productos en el carrito",
                            text: "Agregue al menos un producto al carrito para continuar",
                            icon: "warning",
                            confirmButtonText: "Aceptar",
                            confirmButtonColor: "#000",
                            allowOutsideClick: false,
                            allowEscapeKey: false
                        });
                        localStorage.removeItem('nextView');
                        return;
                    }
                    // Validación si la sesión esta activa pero los datos del usuario no
                    if(inlogin.trim() == '' ) {
                        Swal.fire({
                            title: "No se puede acceder al sguiente paso del proceso",
                            text: "Consulte al administrador del sitio [ERR_00S51ON_U2]",
                            icon: "warning",
                            confirmButtonText: "Aceptar",
                            confirmButtonColor: "#000",
                            allowOutsideClick: false,
                            allowEscapeKey: false
                        });
                        localStorage.removeItem('nextView');
                        return;
                    }
                    // Mandamos al usuario al login antes de continuar
                    const spinner = document.querySelector(`.spinner`);
                    spinner.classList.add('logUser');
                    spinner.removeAttribute('style');

                    // Abrir una nueva ventana del navegador
                    // window.open(inlogin, '_blank');
                    window.open(inlogin, '_self');

                }
                else{
                    //if(localStorage.getItem("nextView")){}
                    let path = window.location.origin;
                    // localStorage.setItem("nextView", 1); // ? Comentado [Moroni - 15May2024]
                    location.href = `${path}/formulario-de-pago`;
                }

            } else if (elementID == "btnSelectionModality") {
                let isInCart = verifyProductInCart(element.dataset.code);
                if (isInCart == 0) {
                    addItem(element.dataset.code, element.dataset.name, element.dataset.pricemxn, element.dataset.priceusd, 'Product', element.dataset.modality);
                }
                $('#staticBackdrop').modal('hide')

            } else if (elementClass.contains('btnCleanFile')) {
                document.querySelector('#' + element.dataset.idfile).value = '';

                document.querySelector('#delete_' + element.dataset.idfile).value = '';
                document.querySelector('#delete_' + element.dataset.idfile).setAttribute("hidden", "");
                validateStep3();

            } else if (elementClass.contains('btn-payment-movil')) {
                //document.querySelector(`.spinner`).style.display = 'flex'

                //proccessPago();
                //document.querySelector("#btnModalPayment").click();
                //initSdkMP("Movil");
                validateRecaptcha("Movil");

            } else if (elementID == 'btnExit') {
                location.href = '/';
            } else if (elementClass.contains('btn-cupon')) {
                document.querySelector(`.spinner`).style.display = 'flex';
                apply_cupon();
            }
            if (elementID == "btnClosedModal") {
                location.reload();
            }
        }
    })

    document.addEventListener("error", (e) => {
        if (e.target) {
            let element = e.target;
            let elementID = e.target.id;
            let elementClass = e.target.classList;
            if (elementClass.contains('imgFile')) {
                element.src = 'modules/mod_buycar/tmpl/img/notfound.jpg';
            }
        }
    })

    /**
     * *Evento para setear el tipo de modalidad seleccionada
     */
    document.addEventListener('change', (e) => {
        const btnAccept = document.querySelector(`#btnSelectionModality`);
        btnAccept.dataset.modality = e.target.value;
    });


    /**
     * *Evento de enter en inputfilter Desktop
     */
    const inputSearchDesktop = document.querySelector(`#txtSearchDesktop`);
    inputSearchDesktop.addEventListener('keyup', (event) => {
        if (event.keyCode === 13) {
            const selectedFilterDescktop = [...$("#typeFilterDesktop :selected")].map(e => e.value);
            if (selectedFilterDescktop == "" && inputSearchDesktop.value == "") {

                getAllProducts(selectedFilterDescktop, inputSearchDesktop.value, "activo", 3, "init");

                document.querySelector(`#btnViewProducts`).style.display = "block";
            } else {
                document.querySelector(`#btnViewProducts`).style.display = "none";
                getAllProducts(selectedFilterDescktop, inputSearchDesktop.value);
            }

        }
    });

    const iconDescktop = document.querySelector(`#btnSearchInputDesktop`);
    iconDescktop.addEventListener(`click`, (e) => {
        const selectedFilterDescktop = [...$("#typeFilterDesktop :selected")].map(e => e.value);
        if (selectedFilterDescktop == "" && inputSearchDesktop.value == "") {

            getAllProducts(selectedFilterDescktop, inputSearchDesktop.value, "activo", 3, "init");

            document.querySelector(`#btnViewProducts`).style.display = "block";
        } else {
            document.querySelector(`#btnViewProducts`).style.display = "none";
            getAllProducts(selectedFilterDescktop, inputSearchDesktop.value);
        }
    });




    /**
     * *Evento de enter en inputfilter Movil
     */
    const inputSearchMovil = document.querySelector(`#txtSearchMovil`);
    inputSearchMovil.addEventListener('keyup', (event) => {
        if (event.keyCode === 13) {
            const selectedFilterDescktop = [...$("#typeFilterDesktop :selected")].map(e => e.value);
            if (selectedFilterDescktop == "" && inputSearchMovil.value == "") {

                getAllProducts(selectedFilterDescktop, inputSearchMovil.value, "activo", 3, "init");
                document.querySelector(`#btnViewProductsMovil`).style.display = "block";
            } else {
                document.querySelector(`#btnViewProductsMovil`).style.display = "none";
                getAllProducts(selectedFilterDescktop, inputSearchMovil.value);
            }

        }
    });


    const iconMovil = document.querySelector(`#btnSearchInputMovil`);
    iconMovil.addEventListener(`click`, (e) => {
        const selectedFilterMovil = [...$("#typeFilterMovil :selected")].map(e => e.value);
        if (selectedFilterMovil == "" && inputSearchMovil.value == "") {

            getAllProducts(selectedFilterMovil, inputSearchMovil.value, "activo", 3, "init");

            document.querySelector(`#btnViewProductsMovil`).style.display = "block";
        } else {
            document.querySelector(`#btnViewProductsMovil`).style.display = "none";
            getAllProducts(selectedFilterMovil, inputSearchMovil.value);
        }
    });


    const btnViewAllProducts = document.querySelector(`#btnViewProducts`);
    btnViewAllProducts.addEventListener('click', (e) => {
        getAllProducts("", "", "", 0, "");
        btnViewAllProducts.style.display = "none";
    });

    const btnViewAllProductsMovil = document.querySelector(`#btnViewProductsMovil`);
    btnViewAllProductsMovil.addEventListener('click', (e) => {
        getAllProducts("", "", "", 0, "");
        btnViewAllProductsMovil.style.display = "none";
    });


    //Eventos de formulario paso 2
    const form = document.querySelector(`#formPaymentCourses`);
    const selectCountry = form.querySelector(`#country`);
    selectCountry.addEventListener('change', (e) => {

        if (selectCountry.value !== "") {
            //getTowns(selectCountry.value);
            getStates(selectCountry.value);
        } else {
        }

    });




    const inputName = form.querySelectorAll(`input`);
    inputName.forEach(element => {
        element.addEventListener('blur', (e) => {
            const element = e.target;
            validateInput(element);
            //console.log(nErrors);
            validateFormDataPersonStatus();
        });


    });



    const selectName = form.querySelectorAll(`select`);
    selectName.forEach(element => {
        element.addEventListener('blur', (e) => {
            const element = e.target;
            validateSelect(element);
            console.log(nErrors);
            validateFormDataPersonStatus();
        });
    });



    const inputtel = form.querySelector(`#telwhat`);
    inputtel.addEventListener('keypress', (e) => {
        if (!validateTel(e)) {
            e.preventDefault();
        }
    });

    const checkWithView = () => {
        const ancho = window.innerWidth;
        const header = document.querySelector(`#headerContent`);
        if (ancho < 980) {
            if (!header.classList.contains("header-black")) {
                header.classList.add("header-black");
            }
        } else {
            if (header.classList.contains("header-black")) {
                header.classList.remove("header-black");
            }
        }
    }


    //Eventos de formulario paso 3 

    const button = document.querySelector(`#collapPaymentFinal`);
    const statusStep3 = button.querySelector(`.status-form`);



    const formPayment = document.querySelector(`#formDataPayment`);
    const selectPayment = formPayment.querySelector(`#optionsPayment`);
    selectPayment.addEventListener(`blur`, (e) => {
        validateStep3();
        /* const checkInvoiceNo = formPayment.querySelector(`#addInvoice_no`);
        
        
        if(selectPayment.value != "no_selected"){
            if(checkInvoiceNo.checked){
                
                statusStep3.classList.add("status-section-final");
                statusStep3.classList.remove("status-section-unfinished");
                finalStep3 = 0;
                validateStepsComplete();
            }
            deleteMsgError(selectPayment);
        }else{ 
            createMsgError(selectPayment, "Favor de seleccionar una metodo de pago");     
            finalStep3 = 1;
            validateStepsComplete();
        } */
    });


    const inputAttach = formPayment.querySelector(`.inputAttach`);
    inputAttach.addEventListener('change', (e) => {
        validateStep3();
        return fileValidation(inputAttach.id);


    });


    const inputAddInvoie = formPayment.querySelector(`#addInvoice_yes`);
    inputAddInvoie.addEventListener('change', (e) => {
        formPayment.querySelector(`.content-attach-file`).classList.add('show');
        formPayment.querySelector(`.content-attach-file`).classList.remove('hidden');
        const selectPaymentMethods = document.querySelector(`#optionsPayment`);
        validateStep3();
        /*if(selectPaymentMethods.value !== "no_selected"){

        
            if(statusStep3.classList.contains('status-section-final')){
                statusStep3.classList.remove("status-section-final");
                statusStep3.classList.add("status-section-unfinished");
                
                nErrosStep3++;
                finalStep3 = 1;
                validateStepsComplete();
            }else{
            
                finalStep3 = 0;
                validateStepsComplete();
                nErrosStep3 = 0;
            }
        }else{
            nErrosStep3++;
            validateStepsComplete();
            finalStep3 = 1;
        }*/
        calculate_total();
    });


    const inputInvoieNo = formPayment.querySelector(`#addInvoice_no`);
    inputInvoieNo.addEventListener('change', (e) => {
        formPayment.querySelector(`.content-attach-file`).classList.remove('show');
        formPayment.querySelector(`.content-attach-file`).classList.add('hidden');

        if (document.querySelector(`.btnCleanFile`) !== null) {
            document.querySelector(`.btnCleanFile`).click();
        }

        validateStep3();
        /* if(selectPayment.value != 0){
            if(statusStep3.classList.contains('status-section-unfinished')){
                statusStep3.classList.add("status-section-final");
                statusStep3.classList.remove("status-section-unfinished");
                nErrosStep3 = 0;
                finalStep3 = 0;
                validateStepsComplete();
            }
        }else{
            nErrosStep3++;  
            finalStep3 = 1;
            validateStepsComplete();
        } */

        calculate_total();
    });



    const collapseSteptwo = document.querySelector(`#collapStepDataPerson`);
    collapseSteptwo.addEventListener('click', (e) => {
        const collapseSteoOne = document.querySelector(`#collapStepSelectedCourse`);
        const buttonStepOne = document.querySelector(`#collapStepSelectedCourse`);
        if (corusesItemsList === 0) {
            setTimeout(() => {

                collapseSteptwo.classList.remove('show')
                buttonStepOne.classList.add('collapsed');
                buttonStepOne.click();


            }, 500);

            Swal.fire({
                title: 'Seleccion de curso incompleto',
                html: 'Para continuar es necesario seleccionar un curso',
                icon: 'warning',
                confirmButtonText: 'Cerrar',
                customClass: { confirmButton: 'confirm-btn-alert' },
            });
            setTimeout(() => {
                movTopScroll();
            }, 600);
            //movTopScroll();
        } else {
            movTopScroll();
        }

    });

    const collapseFinal = document.querySelector(`#collapPaymentFinal`);
    collapseFinal.addEventListener(`click`, (e) => {

        const buttonCollapseSelectCourse = document.querySelector(`#collapStepSelectedCourse`);
        const buttonCollapseDataPerson = document.querySelector(`#collapStepDataPerson`);
        const buttonCollpaseFinal = document.querySelector(`#collapPaymentFinal`);
        const collpseFinal = document.querySelector(`#collapseThree`);



        e.preventDefault();
        const errorsCollapseTwo = refreshStatusCollapseTwo();

        if (corusesItemsList != 0) {
            if (errorsCollapseTwo === 0) {

                validateStep3();

                const statusForm = document.querySelector(`.status-form`);
                statusForm.classList.remove(`status-section-unfinished`);
                statusForm.classList.add(`status-section-final`);

            } else {
                setTimeout(() => {
                    collpseFinal.classList.remove('show')
                    buttonCollpaseFinal.classList.add('collapsed');
                    showErrors();
                    buttonCollapseDataPerson.click();
                }, 500);
                Swal.fire({
                    title: 'Datos personales incompleto',
                    html: 'Para continuar es necesario llenar todos los campos',
                    icon: 'warning',
                    confirmButtonText: 'Cerrar',
                    customClass: { confirmButton: 'confirm-btn-alert' },
                });

            }
        } else {
            setTimeout(() => {
                collpseFinal.classList.remove('show')
                buttonCollpaseFinal.classList.add('collapsed');
                buttonCollapseSelectCourse.click();
            }, 500);
            Swal.fire({
                title: 'Seleccion de curso incompleto',
                html: 'Para continuar es necesario agregar minimo un curso al carrito',
                icon: 'warning',
                confirmButtonText: 'Cerrar',
                customClass: { confirmButton: 'confirm-btn-alert' },
            });
        }
    });


    const buttonPayment = document.querySelector(`.btn-payment-movil`);
    buttonPayment.addEventListener('click', (e) => {
        /* 
            ==============================
            ========Evento de cobro=======
        */
    })


    const optionsPayment = document.querySelector(`#optionsPayment`);
    optionsPayment.addEventListener('change', (e) => {

        clean_openpay_tdc();

        if (optionsPayment.value !== "") {

            if (optionsPayment.value == "1") {

                document.querySelector(`#content_openpay_tdc`).removeAttribute("hidden");

            }

        }

        calculate_total();

        validateStep3();

    });

    window.addEventListener('resize', (e) => {
        const ancho = window.innerWidth;
        const header = document.querySelector(`#headerContent`);
        if (ancho < 980) {
            if (!header.classList.contains("header-black")) {
                header.classList.add("header-black");
            }
        } else {
            if (header.classList.contains("header-black")) {
                header.classList.remove("header-black");
            }
        }
    });

    checkWithView();

    setLocalVars();

    getAllProducts("", "", "", 3, "");

    getCategories();

    refreshStatusCollapseOne();

    //getStates();
    getCountries();

    //getOptionsPayment();

    initlTelInput();

    setTimeout(function () {
        verifyFormPayIsRequired('load');
    }, 200);



});





