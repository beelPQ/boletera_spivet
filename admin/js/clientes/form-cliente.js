

const validateFormFilled = (e) => {

    e.preventDefault();

    $("#contentSpinnerPrimary").show();
    
    let errores = 0;

    let formData = new FormData();

    const dataValidate = [
        { name: 'name', legend: 'Proporcione un nombre'},
        { name: 'lastname_1', legend: 'Proporcione un apellido primario'},
        { name: 'lastname_2', legend: 'Proporcione un apellido secundario'},
        { name: 'phone', legend: 'Proporcione un teléfono'},
        { name: 'email', legend: 'Proporcione un email'},
        { name: 'cpostal', legend: 'Proporcione un código postal'},
         { name: 'country', legend: 'Seleccione un pais'},
        { name: 'state', legend: 'Seleccione un estado'}

    ]
   
    dataValidate.every( elementID => {
        
        let validateField = 1;

        if(validateField==1){

            const inputForm = customForm.querySelector(`#${elementID.name}`)
            let inputValue = inputForm.value.trim();
            
            if( inputValue <= 0 || inputValue == '' || inputValue == '----' || inputValue == '.' ) {
                //console.log('error'+c);
               $("#contentSpinnerPrimary").hide();
                Swal.fire({
                  title:'Oops',
                  html:elementID.legend, 
                  icon:'info',
                  confirmButtonText:'Aceptar',
                  onAfterClose: () => {
                    $(`#${elementID.name}`).focus(); 
                  }
                });

                errores=1;
                return false;

            }else{
                formData.append(`${elementID.name}`,inputForm.value.trim());
                return true;
            }
            
        }else{
            return true;
        }
        
        
    });


    if(errores==0){
        validateFormIntegrity(formData);
    }

}


const validateFormIntegrity = (formData) => {

    let errores = 0;
    let msgerror = '';
    let idInputError = '';

    let email = customForm.querySelector('#email').value;

    let validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

    // Using test we can check if the text match the pattern
    if( validEmail.test(email) ){
        
    }else{
        errores = 1;
        msgerror = 'El email tiene un formato inválido';
        idInputError = 'email';
    }


    if(errores==0){
        sendFormData(formData);
    }else{

        $("#contentSpinnerPrimary").hide();
        Swal.fire({
          title:'Oops',
          html:msgerror, 
          icon:'info',
          confirmButtonText:'Aceptar',
          onAfterClose: () => {
            $(`#${idInputError}`).focus(); 
          }
        });

    }

}



const sendFormData = (formData) => {
 
    /*campos opcionales*/
    formData.append(`lada_phone`,telefonojs.getSelectedCountryData().dialCode);
    

    const operation = customForm.querySelector('#operation').value;

    if(operation==='edit'){
        formData.append(`code`,customForm.querySelector('#code').value);
    }
    
    
    formData.append(`operation`,operation);
    formData.append(`option`,'saveData');
    
    let xhr = new XMLHttpRequest(); //SE CREA UN OBJETO
    xhr.open('POST','controllers/clientes/ClienteController.php', true); //SE ESPECIFICA EL METODO, A DONDE Y SI ES ASINCRONO
    xhr.onload = function(){

        if(this.status === 200){    //SI LA RESPUESTA ES EXITOSA ENTRA

            let response = JSON.parse(xhr.responseText);
            if(response.response === 'success'){
                 $("#contentSpinnerPrimary").hide();
                Swal.fire(
                    'Correcto',
                    response.message,
                    response.response,
                    'Aceptar'
                ).then((result) => {
                    if(result.value){
                            window.location.href = 'index.php?id=clientes';
                    }
                }) 

            }else{
                $("#contentSpinnerPrimary").hide();
                Swal.fire(
                    'Error',
                    response.message,
                    response.response,
                    'Volver a intentar'
                )

            }

        }else{  //SI ES OTRA RESPUESTA MANDA ERROR
            $("#contentSpinnerPrimary").hide();
            Swal.fire(
                'Error',
                'Error[0]:Sucedio un error al tratar de realizar el guardado de datos.',
                'error',
                'Aceptar'
            )

        }

    }
    xhr.send(formData);   //ENVIAMOS LOS DATOS
    

}






document.getElementById('country').addEventListener("change", () => {

    let country = document.getElementById('country').value;
    let state = document.getElementById('state');
    
    if( country!="----" ){
        
        $.ajax({
            url: 'controllers/general/GeneralController.php',
            method: "POST",
            //data: {option: 'getEstadoMunicipios',code:estado},
            data: {option: 'getStatesCountry',code:country},
            dataType: "json",
            success: function (res) {
                
                state.innerHTML = res.munis;

            },error: function(){
                
                state.innerHTML = '<option value="----">Selecciona estado</option>';
                Swal.fire(
                    'Error',
                    'Hubo un error en la petición',
                    'error',
                    'Aceptar'
                );
                
            }
            
        });

    }else{
        
        municipio.innerHTML = '<option value="----">Selecciona estado</option>';

    }

}, false);




let customForm = document.querySelector(`#editarCampos`);

customForm.addEventListener('submit', validateFormFilled);



let inputTel = document.querySelector("#phone");
let telefonojs = window.intlTelInput(inputTel, {
    // allowDropdown: false,
    // autoHideDialCode: false,
    // autoPlaceholder: "off",
    // dropdownContainer: document.body,
    // excludeCountries: ["us"],
    // formatOnDisplay: false,
    //geoIpLookup: function(callback) {
    //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    //       var countryCode = (resp && resp.country) ? resp.country : "";
    //     callback(countryCode);
    //     });
    // },
    // hiddenInput: "full_number",
    initialCountry: "mx",
    // localizedCountries: { 'de': 'Deutschland' },
    // nationalMode: false,
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    // placeholderNumberType: "MOBILE",
    // preferredCountries: ['cn', 'jp'],
    // separateDialCode: true,
    utilsScript: "tools/inputtelephone/js/utils.js",
});