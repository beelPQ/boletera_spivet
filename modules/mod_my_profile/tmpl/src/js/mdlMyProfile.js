
(() => {
    'use strict'

    const PATHEXTERNAL_MODULE_TMPL = '/modules/mod_buycarform/tmpl';
    const PATH_MODULE_TMPL = '/modules/mod_my_profile/tmpl';
    let formDataProfile = null, contentLeft = null, contentPreviewImg = null, inputCropFile = null, avatarImg = null,
        btnDeleteImg = null, btnModal = null, imageCropper = null, btnSaveCropProfile = null, closeCropProfile = null,
        srcDefaultImg = `/modules/mod_buycarform/tmpl/assets/plugin/img/logo_subir_imagen.png`, tmpPhotoUser = '',
        btnActionsContent = null, formUserDataG = new FormData();
    let cropper;

    // localStorage.setItem('userid', data.id)
    const myPrifileData = async (url, method, formData) => {
        let options = [];
        if (method == "GET") {
            options = { method: "GET" };
        } else {
            options = { method: "POST", body: formData };
        }
        const response = await fetch(url, options);
        return await response.json();
    }

    /**
     * *Funcion que inicializa el input de tipo telefono
     */
    const initlTelInput = () => {
        const inputPhone = formDataProfile.querySelector(`#telwhat`);
        window.intlTelInput(inputPhone, {
            preferredCountries: ['mx', 'us'],
            utilsScript: `${PATHEXTERNAL_MODULE_TMPL}/assets/plugin/js/utils.js`,
        });
    }
    // * Obtener paises
    const getCountries = () => {
        let formData = new FormData();
        formData.append("method", "getCountries")
        myPrifileData(`/modules/mod_buycarform/tmpl/model/buyCarForm.php`, `POST`, formData)
            .then((result) => {
                if (result.status) {
                    let options = ``;
                    options += `<option value="no_selected" disabled selected>Seleccionar</option>`;
                    result.data.forEach(element => {
                        options += `<option value="${element.id}">${element.country}</option>`;
                    });
                    formDataProfile.querySelector(`#country`).innerHTML = options;
                }
            }).catch((err) => {
                console.error(err)
                Swal.fire({
                    title: "Error al cargar los paises",
                    text: "No se pudo optener la información completa de los paises",
                    icon: 'warning',
                    confirmButtonText: "Aceptar",
                    confirmButtonColor: "#000",
                    allowOutsideClick: false,
                    allowEscapeKey: false
                });
            });
    }
    /**
     * *Descargamos la informacion de los estados
     * Cremos las opciones del select de estados
     */
    const getStates = (idCountry = 0, stateDefault = 0) => {
        let formData = new FormData();
        if (idCountry != 0) {
            formData.append("method", "getStatesForCountry")
            formData.append("idCountry", idCountry)
        } else {
            formData.append("method", "getStates")
        }
        myPrifileData(`/modules/mod_buycarform/tmpl/model/buyCarForm.php`, `POST`, formData)
            .then((result) => {
                if (result.status) {
                    let options = ``;
                    options += `<option value="no_selected" disabled selected>Seleccionar</option>`;
                    result.data.forEach(element => {
                        let selected = stateDefault > 0 && stateDefault == element.id ? 'selected' : '';
                        options += `<option value="${element.id}" ${selected} >${element.state}</option>`;
                    });
                    document.querySelector(`#state`).innerHTML = options;
                }
            }).catch((err) => {
                console.error(err)
                Swal.fire({
                    title: "Error al cargar los estados",
                    text: "No se pudo optener la información completa de los estados",
                    icon: 'warning',
                    confirmButtonText: "Aceptar",
                    confirmButtonColor: "#000",
                    allowOutsideClick: false,
                    allowEscapeKey: false
                });
            });
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



    const initProfileCrop = () => {
        // const imgModal = imageCropper === null ? document.createElement('img') : imageCropper;
        cropper = new Cropper(imageCropper, {
            aspectRatio: 1,
            viewMode: 1,
            dragMode: 'move',
            responsive: true,
            movable: true,
            zoomable: true,
            scalable: true,
            zoomOnWheel: true,
            minContainerWidth: 200,
            minContainerHeight: 200,
            minCanvasWidth: 20,
            minCanvasHeight: 20,
        });
    }
    const destroyCrop = () => {
        if (cropper !== null) cropper.destroy();
        cropper = null;
        imageCropper.src = srcDefaultImg;
    }
    const saveImgCrop = () => {
        let initialAvatarURL;
        let canvas;
        if (cropper) {
            canvas = cropper.getCroppedCanvas({
                width: 260,
                height: 260,
            });
            contentPreviewImg.removeAttribute(`style`);
            initialAvatarURL = avatarImg.src;
            avatarImg.src = canvas.toDataURL();
            canvas.toBlob(function (blob) {
                // console.log(blob);
            });
        }
        destroyCrop();
        btnDeleteImg.style.display = "block";
        avatarImg.classList.remove('changeimg')
    }
    const done = function (tmpUrl) {
        inputCropFile.value = '';
        imageCropper.src = tmpUrl;
        btnModal.click();
    }
    const changeUploadFile = (inputFile) => {
        const fileUpload = inputFile.files;
        if (fileUpload && fileUpload.length > 0) {
            const file = fileUpload[0];
            const tmpUrl = URL.createObjectURL(file) ?? '';
            if (imageCropper !== null) {
                if (typeof cropper == 'object') destroyCrop();
                if (tmpUrl !== '') {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
                setTimeout(() => initProfileCrop(), 250);
            }
        }
    }
    const deleteImageCropPreview = () => {
        contentPreviewImg.style.display = 'none';
        if (avatarImg.src.includes('data:image')) {
            avatarImg.src = tmpPhotoUser.trim() != '' ? tmpPhotoUser : srcDefaultImg;
        }
        else avatarImg.src = srcDefaultImg;
        avatarImg.classList.add('changeimg');
        btnDeleteImg.style.display = "none";
    }
    const initCropperJs = (avatar) => {
        if (avatar !== null) {
            if (!avatar.src.includes('data:image')) inputCropFile.click();
        }
    }


    /** Verificación de formulario de perfil para editar los datos
     * 
     * @returns 
     */
    const verifyFormData = () => {
        let error = 0;
        const inputs = formDataProfile.querySelectorAll(`input`);
        const selects = formDataProfile.querySelectorAll(`select`);

        inputs.forEach( input => {
            const idInput = input.id;
            const valueInput = input.value;
            input.classList.remove(`is-invalid`);
            if( valueInput.trim() != '') {
                if( idInput == 'telwhat' ) {
                    const itiElement = input.closest(`.iti`);
                    const flag = itiElement.querySelector(`.iti__selected-flag`) || null;
                    if( flag !== null ) {
                        const titleSplit = flag.getAttribute('title').split(':')[1].trim();
                        // formUserDataG.append(`${idInput}`, `${titleSplit}${valueInput.replaceAll(' ', '')}`);
                        formUserDataG.append(`lada`, `${titleSplit.replaceAll(' ', '')}`);
                    }
                    else formUserDataG.append(`lada`, `+52`);
                    formUserDataG.append(`phoneNumber`, `${valueInput.replaceAll(' ', '')}`);
                }
                else {
                    if( idInput == 'cp' ) formUserDataG.append(`postlaCode`, valueInput);
                    else formUserDataG.append(`${idInput}`, valueInput);
                }
            }
            else {
                input.classList.add(`is-invalid`);
            }
        });
        selects.forEach( select => {
            const idSelect = select.id;
            const valueSelect = select.value;
            select.classList.remove(`is-invalid`);
            if( valueSelect.trim() != 'no_selected') formUserDataG.append(`${idSelect}`, parseInt(valueSelect));
            else {
                select.classList.add(`is-invalid`);
            }
        });

        avatarImg.classList.remove(`invalid`);
        if( avatarImg.src.includes(srcDefaultImg) ) {
            avatarImg.classList.add(`invalid`);
            error+=1;
        }
        else formUserDataG.append(`${avatarImg.id}`, avatarImg.src);

        return error;
    }
    /** Procesamos los datos a actualizar
     * 
     */
    const processSaveData = () => {
        formUserDataG.append(`method`, 'updateProfile');
        formUserDataG.append(`userid`, localStorage.getItem('userid') || '');
        formUserDataG.append(`tmiduser`, document.body.getAttribute('data-id') || 0);
        formUserDataG.append(`tmemailuser`, document.body.getAttribute('data-email') || '');
        myPrifileData(`${PATH_MODULE_TMPL}/controllers/mdlMyProfile.php`, `POST`, formUserDataG)
        .then( response => {
            const { result, message, id_client } = response;
            const msgAlert = message.trim() != '' ? message : `Datos actualizados correctamenete`;
            Swal.fire({
                title: msgAlert,
                // text: "Será redireccionada a la sección de servicios",
                icon: result,
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#000",
                allowOutsideClick: false,
                allowEscapeKey: false
            });

        })
        .catch( error => {
            console.log(error);
            Swal.fire({
                title: "Error inespera",
                text: error,
                icon: 'error',
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#000",
                allowOutsideClick: false,
                allowEscapeKey: false
            });
        })
    }

    /** Obtener los datos del usuario logeado
     * 
     * @param {*} dataName 
     * @param {*} dataEmail 
     */
    const processDataUser = (dataName, dataEmail) => {
        const formData = new FormData();
        formData.append("method", "get_user_auth")
        formData.append("id", localStorage.getItem('userid') || '');
        formData.append("name", dataName);
        formData.append("email", dataEmail);
        myPrifileData(`/modules/mod_buycarform/tmpl/model/buyCarForm.php`, `POST`, formData)
            .then((result) => {
                const { status, message, description, data } = result;
                if (!status) {
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
                let nameUser = ``;
                let surnameUser = '';
                let secondSurnameUser = '';
                let phoneUser = '';
                let cPostalUser = '';
                let countryIdUser = '';
                let stateIdUser = '';
                let photoUser = '';
                if (data.length == 0) {
                    const splitName = dataName.split(' '); // Obtenemos el nombre de usuario en Joomla
                    if (splitName.length > 0) {
                        nameUser = `${splitName[0]}`;
                        surnameUser = '';
                        secondSurnameUser = '';

                        if (splitName.length == 2) {
                            nameUser = `${splitName[0]}`;
                            surnameUser = `${splitName[1]}`;
                        }
                        if (splitName.length == 3) {
                            nameUser = `${splitName[0]}`;
                            surnameUser = `${splitName[1]}`;
                            secondSurnameUser = `${splitName[2]}`;
                        }
                        if (splitName.length > 3) {
                            nameUser = `${splitName[0]} ${splitName[1]}`;
                            surnameUser = `${splitName[2]}`;
                            secondSurnameUser = `${splitName[3]}`;
                        }
                    }
                }
                else {
                    nameUser = data.name ?? '';
                    surnameUser = data.surname ?? '';
                    secondSurnameUser = data.secsurname ?? '';
                    dataEmail = data.email ?? '';
                    phoneUser = data.phone ?? '';
                    cPostalUser = parseInt(data.cPostal) == 0 ? '' : data.cPostal;
                    countryIdUser = parseInt(data.countryId) == 0 ? '' : data.countryId;
                    stateIdUser = parseInt(data.stateId) == 0 ? '' : data.stateId;
                    photoUser = data.photo ?? '';
                    photoUser = photoUser == '-' || photoUser == '--' ? '' : photoUser;
                }

                const name = formDataProfile.querySelector(`#name`);
                if (nameUser.trim() != '') {
                    name.value = nameUser;
                    // name.setAttribute('disabled', true);
                }
                const lastname1 = formDataProfile.querySelector(`#lastname1`);
                if (surnameUser.trim() != '') {
                    lastname1.value = surnameUser;
                    // lastname1.setAttribute('disabled', true);
                }
                const lastname2 = formDataProfile.querySelector(`#lastname2`);
                if (secondSurnameUser.trim() != '') {
                    lastname2.value = secondSurnameUser;
                    // lastname2.setAttribute('disabled', true);
                }
                const email = formDataProfile.querySelector(`#email`);
                if (dataEmail.trim() != '') {
                    email.value = dataEmail;
                    // email.setAttribute('disabled', true);
                }
                const telwhat = formDataProfile.querySelector(`#telwhat`);
                if (phoneUser.trim() != '') {
                    telwhat.value = phoneUser.replaceAll(' ', '');
                    // telwhat.setAttribute('disabled', true);
                }
                const cp = formDataProfile.querySelector(`#cp`);
                if (cPostalUser.trim() != '') {
                    cp.value = cPostalUser;
                    // cp.setAttribute('disabled', true);
                }
                const country = formDataProfile.querySelector(`#country`);
                if (countryIdUser.trim() != '') {
                    // country.setAttribute('disabled', true);
                    setTimeout(() => {
                        const options = country.querySelectorAll(`option`);
                        options.forEach(option => {
                            if (option.value == countryIdUser) {
                                option.setAttribute('selected', 'selected');
                                if (stateIdUser.trim() != '') {
                                    // state.setAttribute('disabled', true);
                                    getStates(countryIdUser, stateIdUser);
                                }
                            }
                        });
                    }, 500);
                }
                const avatar = contentLeft.querySelector(`#avatar`);
                if (photoUser.trim() != '') {
                    tmpPhotoUser = `/images/clientes/fotos/${photoUser}`;
                    avatar.src = tmpPhotoUser;
                    // avatar.setAttribute('disabled', true);
                    contentPreviewImg.removeAttribute('style');
                    btnDeleteImg.removeAttribute('style');
                }

            }).catch((err) => {
                console.error(err)
                Swal.fire({
                    title: "Error al cargar la información del usuario",
                    text: "Vuelva a recargar la página",
                    icon: 'warning',
                    confirmButtonText: "Aceptar",
                    confirmButtonColor: "#000",
                    allowOutsideClick: false,
                    allowEscapeKey: false
                });
            });

    }
    document.addEventListener('DOMContentLoaded', () => {
        contentLeft = document.querySelector(`.my_profile-left`);
        formDataProfile = document.querySelector(`#formDataProfile`);
        contentPreviewImg = contentLeft.querySelector(`.content_preview_image`);
        inputCropFile = contentLeft.querySelector(`#inputCropFile`);
        avatarImg = contentLeft.querySelector(`img#avatar`) || null;
        btnDeleteImg = contentLeft.querySelector(`#btnDeleteImg`) || null;

        btnActionsContent = document.querySelector('#btnActionsContent');

        const dataName = document.body.getAttribute('data-name') || '';
        const dataEmail = document.body.getAttribute('data-email') || '';

        btnModal = document.getElementById('btnModalCrop') || null;
        imageCropper = document.querySelector('#imageCropper') || null;
        btnSaveCropProfile = document.querySelector('#btnSaveCropProfile') || null;
        closeCropProfile = document.querySelector('#closeCropProfile') || null;


        initlTelInput(); // ? Cargamos inputtel
        getCountries(); // ? Cargamos paises
        const selectCountries = formDataProfile.querySelector(`#country`);
        selectCountries.addEventListener('change', (e) => {
            if (selectCountries.value !== "") {
                //getTowns(selectStates.value);
                getStates(selectCountries.value);
            } else {
            }

        });


        if( formDataProfile.querySelector('#telwhat') !== null ) {
            formDataProfile.querySelector('#telwhat').addEventListener('keypress', (e) => {
                if (!validateTel(e)) {
                    e.preventDefault();
                }
            });
        }

        processDataUser(dataName, dataEmail); // ? Obtenemos los datos del usuario logeado

        if (inputCropFile !== null) {
            inputCropFile.addEventListener('change', (e) => {
                changeUploadFile(inputCropFile);
            });
        }
        if (avatarImg !== null) {
            avatarImg.addEventListener('click', (e) => {
                e.preventDefault();
                btnDeleteImg.style.display = "block";
                // avatarImg.src.includes('data:image') ? btnDeleteImg.style.display = "block" : btnDeleteImg.style.display = "none";
                if( avatarImg.classList.contains('changeimg') ) initCropperJs(avatarImg)
            });
        }
        if (btnDeleteImg !== null) { // ? Eliminar preview de imagen
            btnDeleteImg.addEventListener('click', deleteImageCropPreview);
        }
        if (btnSaveCropProfile !== null) { // ? Guardar imagen y cerrar modal
            btnSaveCropProfile.addEventListener('click', saveImgCrop);
        }
        if (closeCropProfile !== null) { // ? Eliminar Cropper y cerrar modal
            closeCropProfile.addEventListener('click', destroyCrop);
        }

    })
    window.addEventListener('load', () => {
        if( btnActionsContent !== null ) {
            btnActionsContent.addEventListener('click', () => {
                if( verifyFormData() == 0 ) processSaveData();
                else {
                    Swal.fire({
                        title: "Verifique sus datos",
                        text: "",
                        icon: 'info',
                        confirmButtonText: "Aceptar",
                        confirmButtonColor: "#000",
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    });
                }
            });
        }
    });
})()