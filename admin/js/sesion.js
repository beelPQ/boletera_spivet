
function eventListeners(){
    document.querySelector('#sesion').addEventListener('submit', iniciarsesion);
}
/** Proceso de logeo en el Dashboard */
const login = (tipo) => {
    const email = document.querySelector('#email').value;
    const password = document.querySelector('#password').value;
    if(email != ''){ //PRIMER MENSAJE DE ERROR
        if(password != ''){    //SEGUNDO MENSAJE DE ERROR
            //CONTENIDO SI LOS CAMPOS FUERON DIFERENTES DE VACIO

            var DatosLogin = new FormData();    //Se crea un objeto de tipo FormData para almacenar la informacion que se validara.
            DatosLogin.append('email',email);  //Se agrega la variable email al formdata
            DatosLogin.append('password', password);    //Se agrega la variable password al formdata
            DatosLogin.append('accion', tipo);   //Se agrega la variable tipo al formdata.

            var xhr = new XMLHttpRequest(); //Se crea un objeto XML
            xhr.open('POST', 'includes/modelo/sesion.php', true);   //Se especifica en que metodo, a donde y si es asincrono.
            xhr.onload = function(){
                
                if(this.status === 200){    //Se valida que el estado haya sido exitoso, de aceptacion.

                    var respuesta = JSON.parse(xhr.responseText);   //Se guarda la respuesta que retorna sesion.php
                    //console.log(respuesta); //OPCION PARA VER QUE RETORNA SESION.PHP
                    if(respuesta.respuesta === 'success'){

                        setTimeout("location.href='index.php'", 1000); //Se redirigira al index.

                        const Toast = Swal.mixin({  ////Se asigna propiedades al Toast que se mostrara.
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        
                        Toast.fire({    ////Mensaje exitoso
                            icon: respuesta.respuesta,
                            title: respuesta.mensaje
                        })

                    }else{

                        Swal.fire(
                            'Error',
                            respuesta.mensaje,
                            respuesta.respuesta,
                            'Volver a intentar'
                        )

                    }

                }else{  //Si no fue un estado exitoso mostrar un mensaje de error.

                    Swal.fire(
                        'Error',
                        'Sucedio un error',
                        'error',
                        'Aceptar'
                    )

                }

            }
            xhr.send(DatosLogin);   //Enviamos los datos

        }else{
            Swal.fire( //SEGUNDO MENSAJE DE ERROR
                'Completa el campo',    //TITLE
                'Contrase単a',   //TEXT
                'error',    //TYPE
                'Aceptar'   //CONFIRMBUTTONTEXT
            )
        }
    }else{  //PRIMER MENSAJE DE ERROR
        Swal.fire(
            'Completa el campo',    //TITLE
            'Email',  //TEXT
            'error',  //TYPE
            'Aceptar'   //CONFIRMBUTTONTEXT
        )
    }
}
/*** Funcion para la validacion del reCaptcho V3 */
const validateRecaptcha = (tipo) => {
    grecaptcha.ready(function() {
        grecaptcha.execute('6LevnX0pAAAAAM8b4qITJ6OHfpRdAZN1DF32xdpt', {action: 'formulario_pago'}).then(function(token) {
            // add token to form
            const inputRec = document.createElement('input');
            inputRec.type = 'hidden';
            inputRec.name = 'g-recaptcha-response';
            inputRec.value = token;
            document.querySelector(`#sesion`).appendChild(inputRec);
            // $('#sesion').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
            const dataVelidateR = new FormData();    //Se crea un objeto de tipo FormData para almacenar la informacion que se validara.
            dataVelidateR.append('token', token);   //Se agrega la variable tipo al formdata.
            const xhrValRecaptcha = new XMLHttpRequest(); //Se crea un objeto XML
            xhrValRecaptcha.open('POST', 'includes/modelo/verificar_captcha.php', true);   //Se especifica en que metodo, a donde y si es asincrono.
            xhrValRecaptcha.onload = function(){
                const response = JSON.parse(this.response);
                if( !response.reqStatus ) {
                    Swal.fire(
                        'Error en reCaptcha',    //TITLE
                        'El reCaptcha no fue reconocido para este sitio',  //TEXT
                        'error',  //TYPE
                        'Aceptar'   //CONFIRMBUTTONTEXT
                    );
                    return;
                }
                login(tipo);
            }
            xhrValRecaptcha.send(dataVelidateR);   //Enviamos los datos
        });
    });
}

function iniciarsesion(e){
    //PARA LOS MENSAJES SE ESTA UTILIZANDO SWEETALERT2
    e.preventDefault();
    const tipo = document.querySelector('#tipo').value; //Se obtiene el valor del formulario, para corroborar que si viene de ahi.

    if(tipo === 'login'){
        //validateRecaptcha(tipo);
        login(tipo);
    }

}

/** Funci���n para modificar el tipo de input en el password
 */
const changeViewPass = () => {
    
    let passInput = document.querySelector(`#password`);
    let btnChangeEye = document.querySelector(`#btnChangeEye img`);
    
    if( passInput.type == 'password' ) {
        passInput.type = 'text';
        btnChangeEye.src = `images/icons/icon_eye.svg`;
    }
    else {
        passInput.type = 'password';
        btnChangeEye.src = `images/icons/icon_eye_slash.svg`;
    }
}


document.addEventListener('DOMContentLoaded', () => {
    
    if( document.querySelector(`#btnChangeEye`) ) {
        let btnChangeEye = document.querySelector(`#btnChangeEye`);
        btnChangeEye.addEventListener(`click`, changeViewPass );
    }
   
    
    eventListeners();
});





