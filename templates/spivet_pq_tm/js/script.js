(() => {
    'use strict'

    // Obtener la URL actual
    const currentUrlSite = new URL(window.location.href);
    let headerContentGenSite = null, footerLog = null, spinnerGenSite = null,
        optionValue = '', viewUri = '', layoutUri = '';


    const authUser = async(url, method, formData) => {
        let options = [];
        if (method == "GET") {
            options = { method: "GET" };
        } else {
            options = { method: "POST", body: formData };
        }
        const response = await fetch(url, options);
        return await response.json();
    }

    document.addEventListener('DOMContentLoaded', () => {
        try {
            headerContentGenSite = document.querySelector(`#headerContent`) || null;
            footerLog = document.querySelector(`footer`) || null;
            spinnerGenSite = document.querySelector(`.spinner`) || null;

            if (currentUrlSite.searchParams.size > 0) {
                // Obtener el valor del parámetro 'option'
                optionValue = currentUrlSite.searchParams.get('option') || '';
                viewUri = currentUrlSite.searchParams.get('view') || '';
                layoutUri = currentUrlSite.searchParams.get('layout') || '';
            }

            // Verificando si existe algún formulario de logeo, deslogeo o registro
            if (document.querySelector('main') || document.querySelector(`.mod-login`) || document.querySelector(`form.mod-login-logout`)) {
                const contentLoginLogout = document.querySelector(`form.mod-login-logout`) || null;
                const contentLogin = document.querySelector(`.mod-login`) || null; // ? Login Form
                const contentRegist = document.querySelector(`.com-users-registration__form`) || null;
                const mainContent = document.querySelector('main') || null;

                const newMain = mainContent === null ? document.createElement('main') : mainContent; // * Creación de main

                if (contentLogin !== null && contentLogin.querySelector(`ul.mod-login__options`)) { // ? Verificamos si existe el formulario de logeo
                    contentLogin.classList.add('login');
                    const loginOptions = contentLogin.querySelector(`ul.mod-login__options`);
                    const items = loginOptions.querySelectorAll(`li`);
                    items.forEach(item => {
                        if (item.classList.contains('forgot_your_username')) loginOptions.removeChild(item); // ? Eiminamos la opción para recuperar el usuario
                    });
                }
                // ! Formulario de logeo desde la recuperación de contraseña 
                if (document.querySelector(`.com-users-login`) && document.querySelector(`.com-users-login`).querySelector(`.com-users-login__options`)) { // ? Verificamos si existe el formulario de logeo
                    const loginOptions = document.querySelector(`.com-users-login`).querySelector(`.com-users-login__options`);
                    const items = loginOptions.querySelectorAll(`a`);
                    items.forEach(item => {
                        if (item.classList.contains('com-users-login__remind')) loginOptions.removeChild(item); // ? Eiminamos la opción para recuperar el usuario
                        if (item.classList.contains('com-users-login__register')) {
                            item.addEventListener('click', () => {
                                currentUrlSite.pathname.includes('iniciar-sesion') ? localStorage.setItem('frmlog', 1) : localStorage.setItem('frmlog', 2);
                            });
                        }
                    });
                }

                // Verificamos si se ha creado el elmento main y si existe el footer
                if (footerLog !== null && newMain !== null) {
                    newMain.classList.add('loginContent');
                    if (contentLogin !== null) newMain.appendChild(contentLogin); // ? Agregamos el formulario de logeo a la etiqueta main
                    // document.body.appendChild(newMain)
                    document.body.insertBefore(newMain, footerLog); // ? Agregamos la etiqueta main entre el header y footer


                    // ? Verificamos si existe algun error en el login
                    if (sessionStorage.getItem('errorinlog') && sessionStorage.getItem('errorinlog') == 'ok') {
                        const mainContentParent = contentLogin.closest('main');
                        const alertError = document.createElement('div');
                        alertError.classList.add('alert', 'alert-danger', 'alert-dismissible', 'fade', 'show');
                        alertError.setAttribute('role', 'alert');
                        alertError.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" style="display: none;"><symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></symbol><symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></symbol><symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16"><path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></symbol></svg><div><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><strong>¡Acceso denegado!</strong> Revise sus credenciales de acceso.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
                        if (mainContentParent !== null) { // ? Agregamos el mensaje de error antes del formulario
                            mainContentParent.insertBefore(alertError, contentLogin);
                            sessionStorage.removeItem('errorinlog');
                        }
                    }

                    // ? Verificación si ingresamos al formulario de registro
                    if( contentRegist !== null ) {
                        const btnRegisterUser = contentRegist.querySelector('#btnRegisterUser') || null; // ? Boton normal del formulario
                        const btnReguser = contentRegist.querySelector('#btn_reguser') || null;
                        btnReguser.addEventListener('click', e => {
                            e.preventDefault();
                            let formData = new FormData();
                            formData.append("method", "user_auth");
                            
                            let errorInForm = 0;
                            const inputs = contentRegist.querySelectorAll(`input`);
                            inputs.forEach(input => {
                                const attrName = input.getAttribute('name');
                                if(attrName.includes('[name]') ) {
                                    input.value.trim() != '' ? formData.append("name", input.value.trim())
                                        : errorInForm+=1;
                                }
                                // if(attrName.includes('[username]') ) {
                                //     input.value.trim() != '' ? formData.append("username", input.value.trim())
                                //         : errorInForm+=1;
                                // }
                                // if(attrName.includes('[password1]') && input.value.trim() != '' ) {}
                                if(attrName.includes('[password2]') ) {
                                    input.value.trim() != '' ? formData.append("password", input.value.trim())
                                        : errorInForm+=1;
                                }
                                if(attrName.includes('[email1]') ) {
                                    input.value.trim() != '' ? formData.append("email", input.value.trim())
                                        : errorInForm+=1;
                                }
                            });

                            if( errorInForm > 0 ) return;

                            authUser(`/modules/mod_buycarform/tmpl/model/buyCarForm.php`, `POST`, formData)
                            .then( response => {
                                // console.clear();
                                const { status, message, description, data} = response;
                                if( !status ) {
                                    Swal.fire({
                                        title: message,
                                        text: description,
                                        icon: "warning",
                                        confirmButtonText: "Aceptar",
                                        confirmButtonColor: "#000",
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                    });
                                    return;
                                }
                                localStorage.setItem('userid', data.user_id)
                                btnRegisterUser.click(); // ? Click en boton real de creacion de usuario en Joomla
                            })
                            .catch( error => {
                                console.warn(error);
                                Swal.fire({
                                    title: "Error inesperado",
                                    text: "Consulte al adminstrador del sitio o intente más tarde",
                                    icon: "info",
                                    confirmButtonText: "Aceptar",
                                    confirmButtonColor: "#000",
                                    allowOutsideClick: false,
                                    allowEscapeKey: false
                                });
                            });
                        });
                    }

                    // ? Verificamos si se ha completado el registro
                    if( document.querySelector(`.registration-complete`) ) {
                        const registrationComplete = document.querySelector(`.registration-complete`);
                        registrationComplete.innerHTML = `<h1>Usuario registrado</h1><p>Revise su correo electrónico para activar al usuario</p>`;
                        const frmlog = localStorage.getItem('frmlog') ?? 0;
                        const inlogin = localStorage.getItem('inlogin') ?? '/';
                        if (localStorage.getItem('frmlog')) localStorage.removeItem('frmlog'); // ? Eliminamos indicador de uri sesion
                        if (localStorage.getItem('inlogin')) localStorage.removeItem('inlogin'); // ? Eliminamos la url de inicio de sesión
                        setTimeout(() => {
                            // Cerrar la ventana actual
                            window.close();

                            //  similar behavior as an HTTP redirect
                            // window.location.replace(url);

                            // similar behavior as clicking on a link
                            // window.location.href = 'http://boletera_spivet.test/';

                            localStorage.setItem('loginRegisUser', 'success'); // ? Variable indicadora de usuario registrado
                            // Recargar la página actual
                            // window.opener.location.reload(); // ? Recargar la página anterior
                            frmlog == 1 ? location.href = '/iniciar-sesion' : location.href =  inlogin;
                            // ? Redireccionamos al login
                        }, 2800);
                    }

                    // if(document.querySelector(`.reset-confirm`)) document.querySelector(`.reset-confirm`).classList.add('container');
                    // if(document.querySelector(`.reset-complete`)) document.querySelector(`.reset-complete`).classList.add('container');

                    // ? Mostrar iconos eye con font awesome
                    if( document.querySelector(`.input-password-toggle`) ) {
                        const inputsPassToggle = document.querySelectorAll(`.input-password-toggle`);
                        inputsPassToggle.forEach(inputPassToggle => {
                            const contentPass = inputPassToggle.closest('.input-group');
                            const iconEye = document.createElement('i');
                            if( inputPassToggle.querySelector(`.icon-fw.icon-eye`) ) {
                                iconEye.classList.add('fas', 'fa-eye');
                                inputPassToggle.querySelector(`.icon-fw.icon-eye`).style.display = 'none';
                            }
                            if( inputPassToggle.querySelector(`.icon-fw.icon-eye-slash`) ) {
                                iconEye.classList.add('fas', 'fa-eye-slash');
                                inputPassToggle.querySelector(`.icon-fw.icon-eye-slash`).style.display = 'none';
                            }
    
                            if( inputPassToggle.querySelector(`.visually-hidden`) ) {
                                // inputPassToggle.querySelector(`.visually-hidden`).style.display = 'none';
                                inputPassToggle.removeChild(inputPassToggle.querySelector(`.visually-hidden`));
                            }
    
                            if( iconEye !== null) inputPassToggle.appendChild(iconEye);
                            inputPassToggle.addEventListener('click', () => {
                                const inputPass = contentPass.querySelector('input');
                                iconEye.classList.add('op-1');
                                if( inputPass.type == 'password' ) { // ? Mostrar contraseña
                                    iconEye.classList.add('fa-eye-slash');
                                    iconEye.classList.remove('fa-eye');
                                }
                                else { // ? Ocultar contraseña
                                    iconEye.classList.add('fa-eye');
                                    iconEye.classList.remove('fa-eye-slash');
                                }
                                setTimeout(() => {
                                    iconEye.innerHTML = '';
                                    iconEye.classList.remove('op-1');
                                }, 10);
                            });
                        });
                    }


                }
                else {
                    if (mainContent !== null) mainContent.classList.add('loginContent');
                }
            }


            const verUserid = localStorage.getItem('userid') || '';
            if( localStorage.getItem('userid') !== null || verUserid != '' ) {
                const toPqoverlay = headerContentGenSite!==null ? headerContentGenSite.querySelector(`#to_pqoverlay`) : null;
                if( toPqoverlay !== null ) {
                    headerContentGenSite.classList.add('registered');
                    const hamburger = toPqoverlay.querySelector(`.hamburger`) || null;
                    if(hamburger!==null) hamburger.classList.add('invertcolor');
                    const pqOverlayScreen = toPqoverlay.querySelector(`#pqOverlayScreen`) || null;
                    if(pqOverlayScreen!==null) pqOverlayScreen.classList.add('registered');
                    // ? Verificamos que haya una sesión inciada
                    // if( document.body.getAttribute('data-id') && document.body.getAttribute('data-name') && document.body.getAttribute('data-email')) {
                    //     const urlSite = new URL(window.location.href);
                    //     const uriUserProfile = localStorage.getItem('user_profile') || '';
                    //     if (urlSite.pathname == '/') window.location.replace(uriUserProfile);
                    // }
                }
            }
            setTimeout(() => {
                let header = document.querySelector(`#headerContent`);
                if (document.querySelector(`#tapeAnouncements`)) {
                    if (header.classList.contains("anouncement-available")) {
                        header.classList.remove("anouncement-available")
                    }
                } else {
                    if (header.classList.contains("anouncement-available")) {
                    } else {
                        header.classList.add("anouncement-available")
                    }
                }
            }, 500);
        }
        catch (error) {
            console.error('Algo salio mal  ', error);
            Swal.fire({
                title: "Error inesperado",
                text: `Consulte al adminstrador del sitio o intente más tarde. ${error}`,
                icon: "info",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#000",
                allowOutsideClick: false,
                allowEscapeKey: false
            });
        }
    });

    window.addEventListener('load', () => {
        setTimeout(() => {
            const dataEmail = document.body.getAttribute('data-email') || '';
            if( dataEmail.trim() != '') {
                const formDataUserAuth = new FormData();
                formDataUserAuth.append("method", "get_user_auth");
                formDataUserAuth.append("id", localStorage.getItem('userid') || '');
                formDataUserAuth.append("email", dataEmail);
                authUser(`/modules/mod_buycarform/tmpl/model/buyCarForm.php`, `POST`, formDataUserAuth)
                .then( response => {
                    const { status, message, description, data } = response;
                    if( !status ) return;
                    localStorage.setItem('userid', data.id);
                })
                .catch( error => {
                    console.log( error );
                })
            }

            // if (localStorage.getItem('user_profile') !== null && !headerContentGenSite.classList.contains('registered')) { // ? Rediriguimos al perfil de usuario si estamos en la ruta inicial
            //     spinnerGenSite.style.display = 'flex';
            //     location.reload();
            // } else spinnerGenSite.style.display = 'none';

            spinnerGenSite.style.display = 'none';
            console.clear();
        }, 500);
    });

})();