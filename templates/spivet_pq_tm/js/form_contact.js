
(() => {
    'use-strict'

    let nErrors = 0;
    let form = document.querySelector(`#formContact`);
    
    
    const messageView = (icon, title, text, textButton = "Cerrar") => {
        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            confirmButtonText: textButton,
            customClass: {
                confirmButton: "btn-send-data-sweet", 
              }
        })
    }
    
    /**
     **Funcion encargada de ejecutar una peticion al servidor
     * @param {string} url direccion 
     * @param {string} method tipo de metodo post o get
     * @param {object} formData objeto FormData que contiene los parametros a enviar
     *
    */
	const asyncData = async (url, method, formData) => {
        let options = {};
        if(method == "GET"){
            options = {method: "GET"};
        }else {
            const headers = new Headers({
              //'Content-Type': 'application/json', // Especificar el tipo de contenido
              //'Access-Control-Allow-Origin': '*', // O ajusta seg��n el dominio permitido
              'Accept':'*/*',
              'User-Agent': 'Thunder Client (https://www.thunderclient.com)'
            });
            options = { 
                method: "POST", 
                headers: headers,
                mode: 'cors',
                cache: 'no-cache',
                body:JSON.stringify(formData)  };
        } 
        /*const response = await fetch(url, options)
        return await response.json();*/
        // Realizar la solicitud fetch
        fetch(url, options)
      .then(response => response.json())
      .then(data => console.log('Respuesta exitosa:', data))
      .catch(error => console.error('Error:', error));
    }
    
    /**
     **Funcion encargada de ejecutar una peticion al servidor
     * @param {string} url direccion 
     * @param {string} method tipo de metodo post o get
     * @param {object} formData objeto FormData que contiene los parametros a enviar
     * @returns json que contiene la respuesta del serividor
     */
    const asyncData2 = async (url, method, formData) => {
        let options = [];
        if (method == "GET") {
            options = { method: "GET" };
        } else {
            let header = {
                'Content-Type': 'application/json',
                'Access-Control-Allow-Origin': '*'
            }
            options = { method: "POST", headers: header, body: JSON.stringify(formData) };
        }
        const response = await fetch(url, options)
        return await response.json();
    }

    
    
    const ajaxData = (url, method, json) => {
        
        const headers = {
            'Content-Type': 'application/json', // Especificar el tipo de contenido
            'Access-Control-Allow-Origin': '*', // O ajusta seg��n el dominio permitido
            'mode': 'cors',
            'cache': 'no-cache',
        };
            
        // Configuraci��n de la solicitud AJAX con jQuery
        $.ajax({
            url: url,//'https://plataforma.cip-puebla.edu.mx/apis/api/CRMgeneral/Add',
            type: method, //'POST', // Puedes ajustar seg��n tu tipo de solicitud
            headers: headers,
            contentType: 'application/json', // Tipo de contenido
            data: JSON.stringify(json), // Convertir datos a JSON si es necesario
            success: function(data) {
                //console.log('Respuesta exitosa:', data);
                messageView('success', 'Registro exitoso', 'En breve nos pondremos en contacto contigo');
                const buttonClose = document.querySelector(`#btnCloseForm`);
                buttonClose.click();
            },
            error: function(error) {
                //console.error('Error:', error);
                messageView('error', 'Erro de registro', error);
            }
        });
        
    }
    
    
    
    
    
    /** Función para eliminar el mensaje de error del formulario de contacto
     * @param Element elementForm : Elemento a evaluar
     */
    const deleteMsgError = (elementForm) => {
        const contentEl = elementForm.parentElement;
        const idElementError = `${elementForm.id}Error`;
        if( contentEl.querySelector(`#${idElementError}`) ) {
            elementForm.classList.remove('is-invalid');
            const spanError = contentEl.querySelector(`#${idElementError}`);
            contentEl.removeChild(spanError);
        }
    }



    /** Crear un mensaje de error en cada elemento del formulario
     * @param Element elementForm : Elemento a evaluar
     */
    const createMsgError = (elementForm, message) => {
        const contentEl = elementForm.parentElement;
        const idElementError = `${elementForm.id}Error`;
        if( contentEl.querySelector(`#${idElementError}`) ) {
            elementForm.classList.remove('is-invalid');
            const spanError = contentEl.querySelector(`#${idElementError}`);
            contentEl.removeChild(spanError);
        }
        elementForm.classList.add('is-invalid');
        const spanError = document.createElement('span');
        spanError.id = idElementError;
        spanError.classList.add(`msg_error`);
        spanError.innerHTML = message;
        contentEl.appendChild(spanError);

    }


    /**
     * *Funcion que solo permite escribir numeros e un input text
     * @param {Event} e evento change
     * @returns keys validos
     */
    const validateTel = (e) => {
        let key = e.charCode;
        return key >= 48 && key <= 57;
    }

    const inputtel = document.querySelector(`#numberPhoneGeneral`);
    inputtel.addEventListener('keypress', (e) => {
        if (!validateTel(e)){
            e.preventDefault();
        }
    });



     /**
     * *Funcion que inicializa el input de tipo telefono
     */
    const initlTelInput = () => { 
        if(document.querySelector(`#numberPhoneGeneral`)){
            const numberPhoneGeneral = form.querySelector(`#numberPhoneGeneral`);
            setTimeout(() => {
                valuePhone = window.intlTelInput(numberPhoneGeneral, {
                    preferredCountries: ['mx', 'us'],
                    //utilsScript: "/modules/mod_buycarform/tmpl/plugin/js/utils.js",
                });
            }, 200);
        } 
    }

    /**
     * Valida todos los input por medio de un arreglo
     * @param {element} input elemento 
     */
    const validateInput = (input) => {

        const stringValidatorEmail = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

        const arrayInputValidation = [  
            {input : "name", valMin : 2, messageLengt: "Numero de caracteres mayor a 2", messageVacio: "Nombre requerido"},
            {input : "lastNameOne", valMin : 2, valMax : 30, messageLengt: "Numero de caracteres mayor a 4", messageVacio: "Apellido requerido"},
            {input : "lastNameTwo", valMin : 2, valMax : 30, messageLengt: "Numero de caracteres mayor a 4", messageVacio: "Apellido requerido"},
            {input : "email", valMin : 4, valMax : 30, messageLengt: "Correo no valido", messageVacio: "Correo requerido"},
            {input : "numberPhoneGeneral", valMin : 9, valMax : 12, messageLengt: "Numero no valido", messageVacio: "Teléfono requerido"},
            /* {input : "cp", valMin : 4, valMax : 30, messageLengt: "Codigo postal no valido", messageVacio: "Codigo postal requerido"} */
            ];

        arrayInputValidation.forEach(element => {
            if(input.id == element.input){
                if(input.id === "email"){
                    
                    if (stringValidatorEmail.test(input.value)) {
                        deleteMsgError(input)
                    } else {
                        createMsgError(input, element.messageLengt);
                        nErrors ++;
                    }
                }else{
                    if(input.value.trim() != ""){ 
                        if(input.value.length > element.valMin){
                            deleteMsgError(input)
                        }else{
                            createMsgError(input, element.messageLengt);
                            nErrors ++;
                        }  
                    }else{
                        createMsgError(input, element.messageVacio);
                        nErrors ++;
                    }  
                }

                
            }
        });
        
    }



    /**
     * Valida todos los select encontrados por medio de un arreglo
     * @param {element} select elementos select
     */
    const validateSelect = (select) => {
        const arraySelectValidation = [  
            {select : "period", messageVacio: "Perido requerido"},
            {select : "collageCareer", messageVacio: "Carrera requerida"},
            {select : "level", messageVacio: "Nivel requerido"},
            {select : "modality", messageVacio: "Modalidad requerida"},
            {select : "certify", messageVacio: "Cuenta con certificado"}
            ]; 
            arraySelectValidation.forEach(element => {
            if(select.id == element.select){  
                if(select.value.trim() !== "no_selected"){  
                    deleteMsgError(select) 
                }else{  
                    createMsgError(select, element.messageVacio);
                    nErrors ++;
                } 
            }
        });
    }



    /**
     * *Inicia la validacion del formulario solo en los input text 
     */
     //const form = document.querySelector(`#formContact`); 
    const inputName = form.querySelectorAll(`input`);
    inputName.forEach(element => {
        element.addEventListener('blur', (e) => {
            const element = e.target; 
            validateInput(element);
            
        }); 
    
    });


    /**
     * *Crea la estrucutura del json que sera enviado al endpoint
     * @returns json con datos a enviar
     */
    const createJsonData = () => {
        let object = {};
        let arrayPromotion = [];
        let objectPromotion = {};
        const name = form.querySelector(`#name`).value || "";  
        const lastNameOne = form.querySelector(`#lastNameOne`).value || "";  
        const lastNameTwo = form.querySelector(`#lastNameTwo`).value || ""; 
        const email = form.querySelector(`#email`).value || "";
        const numberPhoneGeneral = form.querySelector(`#numberPhoneGeneral`).value || "";
        const period = form.querySelector(`#period`).value || "";
        const collageCareer = form.querySelector(`#collageCareer`).value || "";
        const level = form.querySelector(`#level`).value || "";
        const modality = form.querySelector(`#modality`).value || "";
        const certify = form.querySelector(`#certify`).value || 0;
        const checkAviso = form.querySelector(`#checkAcceptInfoContact`);
        
        let ext = '';
        const phone = document.querySelector(`#numberPhoneGeneral`);
        const node = phone.parentNode;
        const tagCountry = node.querySelector(`.iti__selected-flag`);
        const extensionCountry = tagCountry.title.split(":")[1];
        if(extensionCountry != ""){
            ext = extensionCountry.trim();    
        }
        
        let certifyBool = false;
        if(certify == 1){
            certifyBool = true;
        }else{
            certifyBool = false;
        }
        
        let avisoBool = false;
        if(checkAviso.checked){
            avisoBool = true;
        }else{
            avisoBool = false;
        }

        objectPromotion.idCarrera = collageCareer;
        objectPromotion.promocionUsuario = "";
        objectPromotion.nivelId = level;
        objectPromotion.modId = modality;

        arrayPromotion.push(objectPromotion);

        object.crmnombre = name;
        object.crmpaterno = lastNameOne;
        object.crmmaterno = lastNameTwo;
        object.idPlantel = 1;
        object.crmemail = email;
        object.crmcelular = `${ext}${numberPhoneGeneral}`;
        object.crmregUsuario = "";
        object.crmperiodoreg = period;
        object.crmcertificado = certifyBool;
        object.promocion = arrayPromotion;
        object.politicaPrivacidad = avisoBool;
        
        object.idclient = "05541";
        object.username = "CMC_441";
        object.pass = "01140";
        object.key = "5C76C9A7E15BC68FE991B976E89B4F46ACF99E3A0D0EB00E34994F747656FCCE";
        
        return object;
    }    

    /**
     * *Validacion de formulario completo
     * Ejecuta las funciones que validan por separado 
     * los select e inputs para mostrar los errores y hacer un conteo de ellos
     * @returns boolean : estatus de la validacion
     */
    const initValidation = () => {
        let statusValidation = false;
        nErrors = 0;
        const inputName = form.querySelectorAll(`input`); 
        inputName.forEach(element => {
            validateInput(element); 
        });

        const selectName = form.querySelectorAll(`select`);
        selectName.forEach(element => {
            validateSelect(element);
        });
        
        if(nErrors == 0 ){
            statusValidation = true;
        }else{
            statusValidation = false;
        }
        return statusValidation;
    }



    /**
      * *Limpiado del formulario
      * Se encarga de eliminar la informacion de los inputs
      * y de eliminar todos los span de error
      */
    const cleanForm = () => {
        const inputs = form.querySelectorAll(`input`);
        inputs.forEach(element => deleteMsgError(element));
        const select = form.querySelectorAll(`select`);
        select.forEach(element => deleteMsgError(element));
        form.reset();
    }



    document.addEventListener(`click`, (e) => { 
        const idElement = e.target.id;
        if(idElement == "btnFormShowSection"){
            const formContent = document.querySelector(`.content-form-window`);
            formContent.classList.remove("form-hiden");
            const icons = document.querySelectorAll(`.contacto_flotante__item`);
            icons.forEach(element => {
                if(element.classList.contains(`flotante__show`)){ 
                    element.classList.remove(`flotante__show`);
                }
            });
        }
        if(idElement == "btnCloseForm"){
            const formContent = document.querySelector(`.content-form-window`);
            formContent.classList.add("form-hiden");
            cleanForm();
        } 
        if(idElement == "btnSendDataContact"){
            let check = document.querySelector(`#checkAcceptInfoContact`);
            if(initValidation()){
                let json = createJsonData();
                let buttonSend = document.querySelector(`#${idElement}`);
                let avisoGeneral = document.querySelector(`#checkAcceptInfoContact`);
                //console.log(json);
                if(avisoGeneral.checked){ 
                    buttonSend.disabled = true; 
                    buttonSend.textContent = `Enviando...`;
                    asyncData2(`https://plataforma.cip-puebla.edu.mx/apis/api/CRMgeneral/Add`, `POST`, json)
                    .then((result) => {
                        if(result.mensaje == "¡Nuevo aspirante agregado con éxito!"){
                            cleanForm();
                            messageView("success", "Información envida", "Su información ha sido enviada con exito!", "Cerrar"); 
                            buttonSend.disabled = false; 
                            buttonSend.textContent = `Enviado`;
                        }else{
                            let errors = ``;
                            if(result.errores){
                                errors = result.errores[0];
                            } 
                            messageView("warning", "Lo sentimos", result.mensaje+" <br> "+errors, "Cerrar");
                            buttonSend.disabled = false; 
                            buttonSend.textContent = `Enviado`;
                        }
                    }).catch((err) => {
                        console.error(err);
                        buttonSend.disabled = false; 
                        buttonSend.textContent = `Enviado`;
                    });
                }else{
                    messageView("warning", "Lo sentimos", "No es posible enviar su información hasta haber aceptado el Aviso de Privacidad", "Cerrar");
                }
                
                //ajaxData(`https://plataforma.cip-puebla.edu.mx/apis/api/CRMgeneral/Add`, `POST`, json); 
            } 
        }
    });
    
    document.addEventListener(`click`, (e) => {
        const idElement = e.target.id;
        if(idElement == "checkAcceptInfoContact"){
            //alert(`cambio de estado...`);
            let check = document.querySelector(`#${idElement}`);
            let buttonSendData = document.querySelector(`#btnSendDataContact`);
            
            if(check.checked){ 
                console.log(buttonSendData)
                buttonSendData.classList.remove(`btn-send-data-disabled`);
                buttonSendData.classList.add(`btn-send-data-contact`);
                buttonSendData.removeAttribute("disabled");
            }else{
                buttonSendData.classList.add(`btn-send-data-disabled`);
                buttonSendData.classList.remove(`btn-send-data-contact`);
                buttonSendData.setAttribute("disabled", true);
            }
        }
    });
    
    document.addEventListener(`DOMContentLoaded`, () => {
       initlTelInput(); 
    });


})();


