
 /**
 * Limpia los campos que tienen que ver con pago TDD/TDC openpay
 * @param 
 */
const clean_openpay_tdc = () => {

    let content_openpay_tdc = document.querySelector(`#content_openpay_tdc`);

    content_openpay_tdc.setAttribute("hidden","");

    const inputsOpPay = content_openpay_tdc.querySelectorAll(`input`);
    inputsOpPay.forEach(element => {
        element.value='';
    });
    
}

/**
 * Limpia los campos que tienen que ver con la forma de pago
 * @param 
 */
const cleanFormPay = () =>{

    document.querySelector(`#optionsPayment`).innerHTML=`<option value="0" selected >Ninguna</option>`;
    document.querySelector(`#optionsPayment`).setAttribute("disabled","");
    document.querySelector(`#optionsPayment`).setAttribute("class","form-control");

    
    if(document.querySelector(`#optionsPaymentError`)!==null){
        document.querySelector(`#optionsPaymentError`).remove();
    }
    

    //limpiamos cualquier campo relacionado a una forma de pago
    document.querySelector(`#content_openpay_tdc`).setAttribute("hidden","");
    clean_openpay_tdc();

}

/**
 * Verifica si la forma de pago es requerida, dependiendo de si la suma de los productos en el carrito es 0
 * @param 
 */
const verifyFormPayIsRequired = (executedFrom='') => {
    //console.log('osv_veryformpay');

    let showFormsPay = 0;
    if( localStorage.getItem(`cart_products`) && JSON.parse(localStorage.getItem(`cart_products`)).length > 0 ){
        if( localStorage.getItem(`subtotal`) && parseFloat(localStorage.getItem(`subtotal`)) <= 0 ){
            //console.log('osv_veryformpay_clean');
            if(document.querySelector(`#optionsPayment`).value!="0"){
                //console.log('osv_La forma de pago tenia la lista de formas de pago');
                cleanFormPay();
            }

            
        }else{
            showFormsPay = 1;
        }
    }else{
        showFormsPay = 1;
    }

    if(showFormsPay==1){
       // console.log('osv_consultando formaspago');
        if(document.querySelector(`#optionsPayment`).value=="0" || executedFrom=='load'){
            //console.log('osv_La forma de pago tenia seleccionado NINGUNA o no tenia opciones');
            getOptionsPayment();

            if(location.pathname.includes('/carrito-de-capacitaciones-form')){
            
            }else if(location.pathname.includes('/carrito-de-capacitaciones')){

                if(executedFrom!='load'){
                   // console.log('osv_reseteando paso3');
                    const button = document.querySelector(`#collapPaymentFinal`);
                    const statusStep3 = button.querySelector(`.status-form`);
                    if(statusStep3.classList.contains('status-section-final')){
                        statusStep3.classList.remove("status-section-final");
                        statusStep3.classList.add("status-section-unfinished");   
                    }

                    finalStep3=1;

                    if(!document.querySelector(`.btn-payment-movil`).classList.contains("btn-disabled")){
                        document.querySelector(`.btn-payment-movil`).classList.add("btn-disabled");
                    } 
                    document.querySelector(`.btn-payment-movil`).disabled = true;
                }
                

            }

        }
        

    }
    
}

const enablePayButton = (setValue) =>{

    const btnsPay = document.querySelectorAll(`.payment-button`);
    btnsPay.forEach(element => {

        if(setValue){
            element.removeAttribute("disabled");
        }else{
            element.setAttribute("disabled","");
        }

    });

}

let success_callbak = function(response) {
    let token_id = response.data.id;
    document.querySelector(`#token_id`).value = token_id;

    //$('#token_id').val(token_id);
    //$('#payment-form').submit();
    processOpenPay('tdd');
};


let error_callbak = function(response) {
    let desc = response.data.description != undefined ? response.data.description : response.message;

    document.querySelector("#deviceIdHiddenFieldName").remove();

    enablePayButton(true);

    document.querySelector(`.spinner`).style.display = 'none';

    /* Swal.fire({
       title:'No se pudo realizar la transacción',
       html:"ERROR [" + response.status + "] " + desc, 
       icon:'error',
       confirmButtonText:'Aceptar'
    }); */

    if(response.status==400){
        desc = 'Datos de tarjeta incompletos.'
    }


    Swal.fire({
        icon: 'error',
        title: 'No se pudo realizar la transacción',
        html: "ERROR [" + response.status + "] " + desc,
        confirmButtonText: 'Cerrar',
        customClass: { 
            confirmButton: 'confirm-btn-alert',
        },
    });

    //alert("ERROR [" + response.status + "] " + desc);
    //$("#pay-button").prop("disabled", false);
   
};





/**
 * Dependiendo de la forma de pago, procesa el pago
 * @param 
 */
const proccessPago = () =>{

    //console.log('osv_pay2')

    enablePayButton(false);

    let formapago=$("#optionsPayment").val();

    if(formapago=='1'){

        //console.log('osv_tdd1')

        OpenPay.setId(document.querySelector("#code1_op").value);
        OpenPay.setApiKey(document.querySelector("#code2_op").value);

        if(document.querySelector("#code3_op").value=='1'){
            OpenPay.setSandboxMode(true);
        }else{
            OpenPay.setSandboxMode(false);
        }

        //el primer parametro es el id del formulario, el segundo parametro es el atributo name que tendra el campo oculto
        let deviceSessionId = OpenPay.deviceData.setup("formDataPayment", "deviceIdHiddenFieldName");
        OpenPay.token.extractFormAndCreate('formDataPayment', success_callbak, error_callbak);

    }else if(formapago=='2'){

        processOpenPay('spei');

    }else if(formapago=='3'){

        processOpenPay('paynet');

    }else if(formapago=='0' && parseFloat(localStorage.getItem("amount"))<=0  ){

        save_data('','');

    }

}


/**
 * Se encarga de realizar la transaccion con tdd openpay
 * @param 
 */
const processOpenPay = (type) =>{

    let formData = new FormData();

    if(type=='tdd'){
        formData.append("option", "openpayTDD")
        formData.append("token_id", document.querySelector('input[name=token_id]').value )
        formData.append("deviceIdHiddenFieldName", document.querySelector('input[name=deviceIdHiddenFieldName]').value )
        formData.append("moneda",  localStorage.getItem("moneda") )
    }else if(type=='spei'){
        formData.append("option", "openpaySPEI")
    }else if(type=='paynet'){
        formData.append("option", "openpayPaynet")
    }

    formData.append("name", document.querySelector(`#name`).value)
    formData.append("lastname1", document.querySelector(`#lastname1`).value)
    formData.append("lastname2", document.querySelector(`#lastname2`).value)
    formData.append("email", document.querySelector(`#email`).value )
    formData.append("telwhat", document.querySelector(`#telwhat`).value )
    formData.append("tellada", valuePhone.getSelectedCountryData().dialCode )
    formData.append("amount", ( parseFloat(localStorage.getItem("amount")) ).toFixed(2) )
    formData.append("concepto", localStorage.getItem("cart_products") )
    


    asyncData2(`/modules/mod_buycarform/tmpl/model/requests.php`, `POST`, formData)
    .then((result) => {

        //console.log('osv_tdd');
        console.log(result);

        if(result.status==200){
            
            //document.querySelector(`.spinner`).style.display = 'none';
            console.log('transaccion existosa');

            save_data(result.code,result.code2)

        }else{
            console.log('transaccion erronea');
            
            if(type=='tdd'){
                document.querySelector("#deviceIdHiddenFieldName").remove();
            }
            enablePayButton(true);

            document.querySelector(`.spinner`).style.display = 'none';

            Swal.fire({
                icon:'error',
                title:'No se pudo realizar la transacción',
                html:result.message,  
                confirmButtonText:'Aceptar',
                customClass: { 
                    confirmButton: 'confirm-btn-alert',
                },
            });
            
            
            //save_data('iiii','')

        }
    }).catch((err) => {
        
        if(type=='tdd'){
            document.querySelector("#deviceIdHiddenFieldName").remove();
        }
        enablePayButton(true);
        console.error(err)

        document.querySelector(`.spinner`).style.display = 'none';

        Swal.fire({
            icon:'error',
            title:'No se pudo realizar la transacción',
            html:"Ocurrió un error al tratar de realizar la petición de la transacción",  
            confirmButtonText:'Aceptar',
            customClass: {  confirmButton: 'confirm-btn-alert' },
        });
        

    });

}


/**
 * Se encarga de guardar los datos
 * @param 
 */
const save_data = (code1,code2) =>{
    console.log('guardando datos');


    let formData = new FormData();

    formData.append("option", "saveData")

    formData.append("code1", code1)
    formData.append("code2", code2)

    formData.append("name", document.querySelector(`#name`).value)
    formData.append("lastname1", document.querySelector(`#lastname1`).value)
    formData.append("lastname2", document.querySelector(`#lastname2`).value)
    formData.append("email", document.querySelector(`#email`).value )
    formData.append("telwhat", document.querySelector(`#telwhat`).value )
    formData.append("tellada", valuePhone.getSelectedCountryData().dialCode )
    formData.append("cp", document.querySelector(`#cp`).value )
    formData.append("towns", document.querySelector(`#towns`).value )
    formData.append("formpay", document.querySelector(`#optionsPayment`).value )

    if( document.querySelector('#addInvoice_yes').checked ){
        formData.append("addInvoice", 1)
    }else{
        formData.append("addInvoice", 0)
    }

    
    formData.append("moneda",  localStorage.getItem("moneda") )

    formData.append("iva", document.querySelector(`#iva`).value)
    formData.append("amountIVA", document.querySelector(`#amountIVA`).value)
    formData.append("comision_porcentaje", document.querySelector(`#comision_porcentaje`).value)
    formData.append("comision", document.querySelector(`#comision`).value)
    formData.append("descuento", document.querySelector(`#descuento`).value)
    formData.append("code_descuento", document.querySelector(`#code_descuento`).value)
    formData.append("iddescuento", document.querySelector(`#iddescuento`).value)

    formData.append("subtotal", localStorage.getItem("subtotal") )
    formData.append("amount", ( parseFloat(localStorage.getItem("amount")) ).toFixed(2) )


    formData.append("list_products", localStorage.getItem("cart_products") )
    
    //console.log('osv_savedata1');

    asyncData2(`/modules/mod_buycarform/tmpl/model/requests.php`, `POST`, formData)
    .then((result) => {

        //console.log('osv_savedata2');
        console.log(result);

        if(result.status==200){
            
            
            console.log('Guardado existoso');

            //reseteamos las variables locales
            localStorage.setItem("moneda", "MXN");
            localStorage.setItem("amount", 0);
            localStorage.setItem("subtotal", 0);

            let cart_products = [];
            localStorage.setItem("cart_products", JSON.stringify(cart_products));


            if( document.querySelector('#addInvoice_yes').checked && document.querySelector('#inputConsFiscal').value!='' ){
                //si se adjunto la constancia fiscal

                let formDataFiles = new FormData();

                formDataFiles.append("option", "uploadFiles");
                formDataFiles.append("code", result.code);
                formDataFiles.append("inputConsFiscalFile", 'adjuntado');
                formDataFiles.append("inputConsFiscal_data",  document.getElementById("inputConsFiscal").files[0] );

                $.ajax({
                    url: '/modules/mod_buycarform/tmpl/model/requests.php',
                    method: "POST",
                    data: formDataFiles,
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,
                    success: function (respuesta) {

                        respuesta = JSON.parse(respuesta);

                        console.log(respuesta)
                        console.log(respuesta.status)

                        if(respuesta.status==200){
                            console.log('Archivo subido');
                            console.log('Confirm');

                            if (document.querySelector('#contentSummaryPaymentMobile') !== null) {
                                document.querySelector('#contentSummaryPaymentMobile').remove();
                            }
                            
                            if (document.querySelector('#contentBtnMobilePay') !== null) {
                                document.querySelector('#contentBtnMobilePay').remove();
                            }

                            document.querySelector(`#content-canvas`).innerHTML = result.message;

                            enviarCorreo();
                        }else{
                            console.log('No se pudo subir el archivo 1');
                            console.log('Confirm');

                            if (document.querySelector('#contentSummaryPaymentMobile') !== null) {
                                document.querySelector('#contentSummaryPaymentMobile').remove();
                            }

                            if (document.querySelector('#contentBtnMobilePay') !== null) {
                                document.querySelector('#contentBtnMobilePay').remove();
                            }

                            document.querySelector(`#content-canvas`).innerHTML = result.message;
                            enviarCorreo('No se pudo subir la constancia fiscal');
                        }
                        
                    
                    },error: function(jqXHR, exception){
                        
                        console.log('No se pudo subir el archivo 2');
                        console.log('Confirm');

                        if (document.querySelector('#contentSummaryPaymentMobile') !== null) {
                            document.querySelector('#contentSummaryPaymentMobile').remove();
                        }

                        if (document.querySelector('#contentBtnMobilePay') !== null) {
                            document.querySelector('#contentBtnMobilePay').remove();
                        }

                        document.querySelector(`#content-canvas`).innerHTML = result.message;
                        enviarCorreo('No se pudo subir la constancia fiscal');
                        
                    }
                    
                });

            }else{

                console.log('Sin archivo');
                console.log('Confirm');

                if (document.querySelector('#contentSummaryPaymentMobile') !== null) {
                    document.querySelector('#contentSummaryPaymentMobile').remove();
                }

                if (document.querySelector('#contentBtnMobilePay') !== null) {
                    document.querySelector('#contentBtnMobilePay').remove();
                }
                
                document.querySelector(`#content-canvas`).innerHTML = result.message;
                enviarCorreo();

            }

        }else{

            document.querySelector(`.spinner`).style.display = 'none';

            Swal.fire({
               title:'No se pudo realizar el guardado',
               html:"Tu transacción se realizó con exito, pero ocurrió un error al guardar los datos de tu compra en nuestra plataforma.", 
               icon:'error',
               confirmButtonText:'Aceptar',
               customClass: {  confirmButton: 'confirm-btn-alert' },
            });

        }
    }).catch((err) => {
       
        //enablePayButton(true);
        console.error(err)

        document.querySelector(`.spinner`).style.display = 'none';

        Swal.fire({
           title:'Error',
           html:"Tu transacción se realizó con exito, pero ocurrió un error al guardar los datos de tu compra en nuestra plataforma.", 
           icon:'error',
           confirmButtonText:'Aceptar',
           customClass: {  confirmButton: 'confirm-btn-alert' },
        });

    });

}


/**
 * Se encarga de enviar el correo
 * @param 
 */
const enviarCorreo = (extraMessage='', typeSend = "", alert = false) =>{ 
    document.querySelector(`.spinner`).style.display = 'flex';

    let formData = new FormData();
    if(typeSend == "Payment"){
        formData.append("requestOrigin", "Payment")
        formData.append("code", document.querySelector(`#code`).value)
    }  
    asyncData2(`/templates/spivet_pq_tm/php/email/sendMail.php`, `POST`, formData)
    .then((result) => { 
        if(result.status_code==200){
            document.querySelector(`.spinner`).style.display = 'none';

            Swal.fire({
               title:'Correcto',
               html: result.message, 
               icon:'success',
               confirmButtonText:'Aceptar',
               customClass: {  confirmButton: 'confirm-btn-alert' },
            });

        }else{

            //console.log('Correo no enviado');

            document.querySelector(`.spinner`).style.display = 'none';

            Swal.fire({
               title:'Error',
               html:"No se pudo enviar el correo de compra<br>"+extraMessage, 
               icon:'error',
               confirmButtonText:'Aceptar',
               customClass: {  confirmButton: 'confirm-btn-alert' },
            });

        }
    }).catch((err) => {
       
        console.error(err)

        document.querySelector(`.spinner`).style.display = 'none';

        Swal.fire({
           title:'Error',
           html:"No se pudo enviar el correo de confimación<br>"+extraMessage, 
           icon:'error',
           confirmButtonText:'Aceptar',
           customClass: {  confirmButton: 'confirm-btn-alert' },
        });

    });

}




