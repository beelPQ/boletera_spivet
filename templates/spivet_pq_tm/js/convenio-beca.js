


let nErrors = 0;
let form = document.querySelector(`#formConvenioBeca`);


/**
     * *Muestra un mensaje con sweetalert
     * @param {string} icon tipo de icono 
     * @param {string} title titlo del mensaje
     * @param {string} text texto a mostrar del mensaje
     * @param {string} textButton textto a mostrar en el boton 
     */
    const messageView = (icon, title, text, textButton = "Cerrar") => {
        Swal.fire({
            title: title,
            html: text,
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
* @returns json que contiene la respuesta del serividor
*/
const asyncData = async (url, method, formData) => {
    let options = [];
    if (method == "GET") {
        options = { method: "GET" };
    } else {
        let header = {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*' // O el dominio permitido
        }
        options = { method: "POST", headers: header, body: JSON.stringify(formData) };
    }
    const response = await fetch(url, options)
    return await response.json();
}



/**
 * *Funcion que inicializa el input de tipo telefono
 */
const initlTelInput = () => { 
    if(document.querySelector(`#numberPhone`)){
        const numberPhone = form.querySelector(`#numberPhone`);
        setTimeout(() => {
            valuePhone = window.intlTelInput(numberPhone, {
                preferredCountries: ['mx', 'us'],
                //utilsScript: "/modules/mod_buycarform/tmpl/plugin/js/utils.js",
            });
        }, 200);
    } 
}



/**
 * Funcion que valida que solo tenga entrada numeros y puntos en input al que pertenece el evento
 * @param {object} event evento de input
 */
const validateDecimal = (event) => {
    let valInput = event.target.value;
    valInput = valInput.replace(/[^0-9.]/g, '');
    event.target.value = valInput;
}



/** Función para eliminar el mensaje de error del formulario de contacto
     * @param Element elementForm : Elemento a evaluar
     */
const deleteMsgError = (elementForm) => {
    const contentEl = elementForm.parentElement;
    const idElementError = `${elementForm.id}Error`;
    if (contentEl.querySelector(`#${idElementError}`)) {
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
    if (contentEl.querySelector(`#${idElementError}`)) {
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




if(form.querySelector(`#numberPhone`)){
    const inputtel = form.querySelector(`#numberPhone`);
    inputtel.addEventListener('keypress', (e) => {
    if (!validateTel(e)) {
        e.preventDefault();
    }
});

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
        {input : "numberPhone", valMin : 9, valMax : 12, messageLengt: "Numero no valido", messageVacio: "Telefono requerido"},
        {input : "promUser", valMin : 1, valMax : 4, messageLengt: "Promedio no valido", messageVacio: "Promedio requerido"}
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
        {select : "typeConvenio", messageVacio: "Convenio requerido"}]; 
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
const select = form.querySelectorAll(`select`);
select.forEach(element => {
    element.addEventListener('blur', (e) => {
        const element = e.target; 
        validateSelect(element);
        
    }); 

});




/**
 * *Inicia la validacion del formulario solo en los input text 
 */
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
    const numberPhone = form.querySelector(`#numberPhone`).value || "";
    const period = form.querySelector(`#period`).value || "";
    const collageCareer = form.querySelector(`#collageCareer`).value || "";
    const level = form.querySelector(`#level`).value || "";
    const modality = form.querySelector(`#modality`).value || "";
    const typeBeca = form.querySelector(`#typeConvenio`).value || "";
    const acceptAviso = form.querySelector(`#checkAcceptConvenio`);
    
    let extPhone = '';
    const phoneConvenio = document.querySelector(`#numberPhone`);
    const nodeConvenio = phoneConvenio.parentNode;
    const tagCountryConvenio = nodeConvenio.querySelector(`.iti__selected-flag`);
    const extensionCountryConvenio = tagCountryConvenio.title.split(":")[1];
    if(extensionCountryConvenio != ""){
        extPhone = extensionCountryConvenio.trim();    
    }
    
    
    let boolAviso = false;
    if(acceptAviso.checked){
        boolAviso = true;
    }else{
        boolAviso = false;
    }
    
    objectPromotion.idCarrera = collageCareer;
    objectPromotion.promocionUsuario = "";
    //objectPromotion.promocionPromedio = promedio;
    objectPromotion.nivelId = level;
    objectPromotion.modId = modality;
    objectPromotion.catBecasId = typeBeca;
    
    arrayPromotion.push(objectPromotion);

    object.crmnombre = name;
    object.crmpaterno = lastNameOne;
    object.crmmaterno = lastNameTwo;
    object.idPlantel = 1;
    object.crmemail = email;
    object.crmcelular = `${extPhone}${numberPhone}`;
    object.crmregUsuario = "";
    object.crmperiodoreg = period;
    object.crmcertificado = true;
    object.promocion = arrayPromotion;
    object.politicaPrivacidad = boolAviso;
    
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
    console.log(nErrors);
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



document.addEventListener('keydown', (e) => {
    const idElement = e.target.id;
    if (idElement == "promUser") {
        validateDecimal(e);
    }
});


document.addEventListener(`click`, (e) => { 
    const idElement = e.target.id;
    if(idElement == "btnForm"){
        const formContent = document.querySelector(`.content-form-window`);
        formContent.classList.remove("form-hiden")
    }
    if(idElement == "btnCloseForm"){
        const formContent = document.querySelector(`.content-form-window`);
        formContent.classList.add("form-hiden");
        cleanForm();
    } 
    if(idElement == "btnSendDataConvenioBeca"){
        if(initValidation()){
            let json = createJsonData();
            let buttonSend = document.querySelector(`#${idElement}`);
            let checkAvisoConvenio = document.querySelector(`#checkAcceptConvenio`);
            if(checkAvisoConvenio.checked){ 
                buttonSend.disabled = true;
                buttonSend.textContent = `Enviando...`;
                asyncData(`https://plataforma.cip-puebla.edu.mx/apis/api/CRMBecaConvenio/Add`, `POST`, json)
                .then((result) => {
                    console.log(result.mensaje)
                    if(result.mensaje == "¡Nuevo aspirante agregado con éxito!"){
                        cleanForm();
                        messageView("success", "Información envida", "Su información a sido enviada con exito!", "Cerrar");
                        
                        buttonSend.disabled = false;
                        buttonSend.textContent = `Enviado`;
                    }else{
                        let errors = ``;
                        if(result.errores){
                            errors = result.errores[0];
                        } 
                        messageView("warning", "Lo sentimos", result.mensaje+" <br> "+errors, "Cerrar");
                        buttonSend.disabled = false;
                    }
                }).catch((err) => {
                    buttonSend.disabled = false;
                    console.error(err);
                });
            }else{
                messageView("warning", "Lo sentimos", "No es posible enviar su información hasta haber aceptado el Aviso de Privacidad", "Cerrar");
            }
        }
        
    }
    if(idElement == "checkAcceptConvenio"){
        const check = document.querySelector(`#${idElement}`);
        const buttonSend = document.querySelector(`#btnSendDataConvenioBeca`);

        if(check.checked){
            buttonSend.classList.remove(`btn-send-data-disabled`)
            buttonSend.removeAttribute("disabled");
        }else{
            buttonSend.classList.add(`btn-send-data-disabled`)
            buttonSend.setAttribute("disabled", true);
        }
    }
});


document.addEventListener("DOMContentLoaded", () => {
    initlTelInput();
});
