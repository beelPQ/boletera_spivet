(() => {
    'use strict'

    let btnBuscarNumero = null, swtSearchAvansed = null, btnSelectedClient = null,
        contentWrapper = null, contentSpinnerPrimary = null, contentSpinnerSecondaryEl = null,
        wrapper = null, contentCheckinEl = null;


    let btnClosedModaHeader;
    let btnClosedModal;

    const asyncData = async (url, method, formData) => {
        let options = [];
        if (method == "GET") {
            options = { method: "GET" };
        } else {
            options = { method: "POST", body: formData };
        }
        const response = await fetch(url, options);
        return await response.json();
    };


    const restartChekinTable = () => {
        // let table = $('#table_checkin').DataTable();
        // table.clear().draw();

        // table.destroy();
        // customDataTable2('table_checkin');

        // $("#loader").hide();
        const customForm1 = document.querySelector(`.custom-form1`);
        const htmlTable = `<div class="col-sm-12 row">
                <div class="col-sm-3">
                    <div class="form-group"><label>Nombre</label><input type="text" id="txtNameClient" class="form-control content__input__checkin"></div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group"><label>Primer apellido</label><input type="text" id="txtLastNameClient1" class="form-control content__input__checkin"></div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group"><label>Segundo apellido</label><input type="text" id="txtLastNameClient2" class="form-control content__input__checkin"></div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group"><button id="btnSearchAvanced" class="btn botonFormulario" style="margin-top:29px;">Buscar</button></div>
                </div>
            </div>
            <table id="table_checkin" class="table" style="width: 100%;"><thead><tr align="center" role="row"><th>Seleccion</th><th>Nombre</th><th>Apellido Uno</th><th>Apellido Dos</th><th>Número de participante</th><th>Foto</th></tr></thead><tbody id="dataSearch"><tr class="odd"><td colspan="6" class="dataTables_empty" valign="top" style="text-align:center;" >No hay datos disponibles en la tabla</td></tr></tbody></table>`;
        customForm1.innerHTML = htmlTable;
    }


    const inputsVacios = () => {
        document.getElementById('txtNameClient').value = '';
        document.getElementById('txtLastNameClient1').value = '';
        document.getElementById('txtLastNameClient2').value = '';
        swtSearchAvansed.checked = false;
        restartChekinTable();
        // document.getElementById('dataSearch').innerHTML = '<tr class="odd"><td colspan="6" class="dataTables_empty" valign="top">No hay datos disponibles en la tabla</td></tr>';

    }

    /** Click al boton de busqueda manual
     * 
     * @param {*} evalSearchClient 
     * @returns 
     */
    const selectClient = (evalSearchClient) => {
        if (!document.querySelector(`#idEvent`)) return;
        const idEvent = document.querySelector(`#idEvent`).value;
        //if(sessionStorage.getItem('nameGafete')){sessionStorage.removeItem('nameGafete');}
        if (evalSearchClient.trim() != '') {
            $.ajax({
                url: 'includes/funciones/checkin/checkin.php',
                method: "POST",
                // data: { opcion: "coursesEvents" },
                data: { option: 'busquedaManual', code: evalSearchClient, code2: parseInt(idEvent) },
                dataType: "json",
                beforeSend: function () {
                    // console.log('Procesando info...');
                },
                success: function (response) {
                    const { status, message, description, data } = response;
                    if (!status) {
                        Swal.fire(message, description, 'warning', 'Aceptar');
                        return;
                    }
                    if (data.length == 0) Swal.fire('Error', 'Registro no encontrado <br>Intentar de nuevo<br>', 'warning', 'Aceptar');
                    document.querySelector(`#txtNumeroCliente`).value = ``;//? Limpiamos caja de busqueda
                    createEstructura(response);
                }, error: function (error) {
                    console.log(error);
                }
            })
        } else { Swal.fire('Error', 'Favor de proporcionar un número de registro<br>', 'warning', 'Aceptar'); }
    }



    /**
     * Funcion que setea la informacion de una configuracion anterior de documento 
     * para que se muestren los controles activados o en uso
     * @param {array} arrayDataDocument Datos de una cofiguracion anterior
     */
    const setDataDocumentIfExist = (arrayDataDocument, idParticipant = '', idDeliverable = '', idsolicitud = '') => {

        const informationDocument = arrayDataDocument[0];
        const contentGeneral = document.querySelector(`#contentGeneral`);
        if (informationDocument.orientation == "portrait") {
            contentGeneral.classList.add("gen-portrait");
        }

        const props = JSON.parse(informationDocument.structure);
        const domain = informationDocument.domain || "";
        const logo = informationDocument.logo || "";
        const currentDate = new Date();

        if (props.previewImage1 != "noImage") {
            document.querySelector(`#imgLogoSelected`).src = `${informationDocument.logoBase64}`; // `${domain}/admin/images/design_credencial/${props.previewImage1}?v=${currentDate.getTime()}`;
            // document.querySelector(`#previewImage1`).src = `${informationDocument.logoBase64}`
            // document.querySelector(`#previewImage1_delete`).style.display = "flex";
        } else {
            document.querySelector(`#imgLogoSelected`).src = `${domain}/images/${logo}`;
        }


        if (props.previewImage2 != "noImage") {
            document.querySelector(`#imgBgSelectedSec2`).src = `${informationDocument.logoBase64bgSec2}`; // `${domain}/admin/images/design_credencial/${props.previewImage2}?v=${currentDate.getTime()}`;
            // document.querySelector(`#previewImage2`).src = `${informationDocument.logoBase64bgSec2}`
            // document.querySelector(`#previewImage2_delete`).style.display = "flex";
        } else {
            document.querySelector(`#imgBgSelectedSec2`).src = ``;
        }


        if (props.colorBgTop != "") {
            // document.querySelector(`#colorTopDesing`).value = props.colorBgTop;
            document.querySelector(`#bgTop`).style.background = props.colorBgTop;
        }

        // ? Obtenemos la informacion del participante
        const infoClient = document.querySelector('.info_client') || null;
        if (infoClient !== null) {
            const name = infoClient.querySelector(`h3`).innerText || '';
            const codePart = infoClient.querySelectorAll(`.value_cli`)[1].innerText || '';
            // ? Agregamos informacion del participante en la credencial
            const dataUser = document.querySelector('.data-user') || null;
            if (dataUser !== null) {
                const spanChild = dataUser.querySelectorAll(`span`) || [];
                spanChild[0].innerText = name;
                spanChild[3].innerText = codePart;
            }
        }

        // ? Creamos el/los códigos QR

        const toggleAccess = 'toggleAccess' in props ? props.toggleAccess : false;
        const toggleMyData = 'toggleMyData' in props ? props.toggleMyData : false;
        const toggleAgenda = 'toggleAgenda' in props ? props.toggleAgenda : false;

        const contentDiploma = document.querySelector(`#contentDiploma`) || null;
        if (contentDiploma === null) return;
        const section1 = contentDiploma.querySelector(`.section1`) || null;
        if (section1 === null) return
        const bgCenter = section1.querySelector(`.bg-center`) || null;
        if (bgCenter === null) return;

        const contentQrs = document.createElement(`div`);
        contentQrs.classList.add(`cont-2-qr`);

        if (toggleAccess) {
            const qrCode1 = document.createElement(`div`);
            qrCode1.classList.add(`qr-code1`);
            qrCode1.innerHTML = `<span>ACCESSO</span><br>`;
            const qrcode = new QRCode(qrCode1, {
                width: 100,
                height: 100
            });
            qrcode.makeCode(`${idParticipant}.${idDeliverable}`);
            contentQrs.appendChild(qrCode1);
        }

        if (toggleMyData) {
            const qrCode1 = document.createElement(`div`);
            qrCode1.classList.add(`qr-code1`);
            qrCode1.innerHTML = `<span>MIS DATOS</span><br>`;
            const qrcode = new QRCode(qrCode1, {
                width: 100,
                height: 100
            });
            qrcode.makeCode(`${idParticipant}.${idDeliverable}.${idsolicitud}`);
            contentQrs.appendChild(qrCode1);
        }

        if (toggleAgenda) {
            const qrCode1 = document.createElement(`div`);
            qrCode1.classList.add(`qr-code1`);
            qrCode1.innerHTML = `<span>AGENDA</span><br>`;
            const qrcode = new QRCode(qrCode1, {
                width: 100,
                height: 100
            });
            qrcode.makeCode(`url de agenda....`);
            contentQrs.appendChild(qrCode1);
        }
        bgCenter.appendChild(contentQrs);
        setTimeout(() => {
            bgCenter.querySelectorAll('canvas').forEach(element => element.remove());
            bgCenter.querySelectorAll('img').forEach(element => element.removeAttribute('style'));
        }, 300);



        // const qrcode = new QRCode(divtest, {
        //     text: 'Prueba de acceso',
        //     width: 180,
        //     height: 180,
        //     colorDark : "#000000",
        //     colorLight : "#ffffff",
        //     correctLevel : QRCode.CorrectLevel.H
        // });

    }
    /**
     * *Funcion que obtiene la informacion del pie de la credencial 
     * Obtiene la informacion de owneres
     */
    const getDataOwner = () => {
        const idEvent = document.querySelector(`#idEvent`).value || "";
        const frmData = new FormData();
        frmData.append("method", "getOwner");
        frmData.append("idCourse", idEvent);
        asyncData(`/admin/includes/modelo/design_credencial/designCredencialModel.php`, `POST`, frmData)
            .then((result) => {
                if (result.status) {
                    sessionStorage.setItem("dataOwner", JSON.stringify(result.data));
                    const footer = document.querySelector(`.bg-footer`);
                    let owner = result.data[0];
                    const spanTitle = document.createElement("span");
                    spanTitle.innerText = "Comunicación";
                    spanTitle.classList.add("text-bold");
                    const spanEmail = document.createElement("span");
                    spanEmail.innerText = owner.email;
                    const spanPhone = document.createElement("span");
                    spanPhone.innerText = owner.phone;
                    const spanDomain = document.createElement("span");
                    spanDomain.innerText = owner.domain;
                    const salto0 = document.createElement("br");
                    const salto1 = document.createElement("br");
                    const salto2 = document.createElement("br");
                    const salto3 = document.createElement("br");
                    footer.appendChild(spanTitle);
                    footer.appendChild(salto1);
                    footer.appendChild(spanEmail);
                    footer.appendChild(salto2);
                    footer.appendChild(spanPhone);
                    footer.appendChild(salto3);
                    footer.appendChild(spanDomain);
                } else {

                }
            }).catch((err) => {
                messageView("error", "Error", err, "Entendido")
            });
    }
    /** // * Funcion que obtiene la configuracion de un documento en caso de que exista
     * 
     */
    const getDataDocumentIfExist = (idParticipant = '', idDeliverable = '', idsolicitud = '') => {
        const idCourse = document.querySelector(`#idEvent`).value || "";
        let frmData = new FormData();
        frmData.append("idCourse", idCourse);
        frmData.append("method", "getDocumentIfExist");
        asyncData(`/admin/includes/modelo/design_credencial/designCredencialModel.php`, `POST`, frmData)
            .then((result) => {
                if (result.status) {
                    if (result.information) {
                        sessionStorage.setItem("previousDesign", JSON.stringify(result.information));
                        if (result.information[0].structure != "-") {
                            sessionStorage.setItem("designPreviewFinishedCred", "true");
                            setDataDocumentIfExist(result.information, idParticipant, idDeliverable, idsolicitud);

                            // const contentSections = document.querySelector(`.content-sections`);
                            // contentSections.style.display = "flex";
                        } else {
                            sessionStorage.setItem("designPreviewFinishedCred", "false");

                            console.log('No exite un diseño ');
                        }
                    } else {
                        // No hay informacion almacenada 
                        sessionStorage.setItem("previousDesign", "[]");
                        sessionStorage.setItem("designPreviewFinishedCred", "false");
                        console.log('No exite un diseño ');
                    }
                }
            })
            .catch((err) => {
                // messageView("error", "Error", err, "Entendido")
                console.log(err);
            });
    };

    /** Creacion de HTML de los datos obtenidos
     * 
     * @param {*} json 
     * @returns 
     */
    const createEstructura = (dataUser) => {
        if (dataUser.data.length == 0) {
            Swal.fire('¡Atención!', dataUser.message, 'warning', 'Aceptar');
            return;
        }

        const json = dataUser.data;
        const { idParticipant, noTra, idsolicitud, idDeliverable, name, lastname1, lastname2, email,
            phone, photo, checkin, modality, statusPay, gafete, pdf } = json[0];

        const dataClient = document.getElementById('dataClient');
        if (dataClient === null) return;
        dataClient.innerHTML = `<div class="info_client" >
            <h4>Datos del participante</h4>
            <figure>
                <img class="mx-auto d-block" src="/images/clientes/fotos/${photo}">
            </figure>
            <h3>${name} ${lastname1} ${lastname2}</h3>

            <div class="info_client_bloque">
                <div class="form-group ">
                    <p class="labelTitle" ><strong>ID cobro:</strong></p>
                    <p class="value_cli" >${noTra}</p>
                </div>
                <div class="form-group ">
                    <p class="labelTitle" ><strong>ID participante:</strong></p>
                    <p class="value_cli" >${idParticipant}</p>
                </div>
            </div>

            <div class="info_client_bloque">
                <div class="form-group ">
                    <p class="labelTitle" ><strong>Modalidad:</strong></p>
                    <p class="value_cli" >${modality}</p>
                </div>
                <div class="form-group ">
                    <p class="labelTitle" ><strong>Estado:</strong></p>
                    <p class="value_cli" >${statusPay}</p>
                </div>
            </div>

            <div class="info_client_bloque">
                <div class="form-group ">
                    <p class="labelTitle" ><strong>Email:</strong></p>
                    <p class="value_cli" >${email}</p>
                </div>
                <div class="form-group ">
                    <p class="labelTitle" ><strong>Whatsapp:</strong></p>
                    <p class="value_cli" >${phone}</p>
                </div>
            </div>
        </div>`;

        // Obtenemos el Botón para confirmar asistencia y generar gafete
        const btnConfirmar = document.getElementById('btnConfirmar') || null;
        if (btnConfirmar != null) {
            btnConfirmar.removeAttribute('disabled');
            if (checkin == 1) {
                // btnConfirmar.setAttribute('onclick', `generateGafete("${json.code}")`)
                btnConfirmar.closest(`.box1`).querySelector(`h4`).innerHTML = `Generar gafete`;
                btnConfirmar.innerHTML = `Generar`;
                if (!btnConfirmar.closest(`.box1`).querySelector(`figure`)) {
                    const figureConfirm = document.createElement(`figure`);
                    figureConfirm.innerHTML = `<img src="images/icons/icon_check.svg"> &nbsp;&nbsp;Asistencia confirmada.`;
                    btnConfirmar.closest(`.box1`).appendChild(figureConfirm);
                }
                if (!btnConfirmar.eventAssigned) {
                    btnConfirmar.addEventListener(`click`, () => {
                        generateGafete(idDeliverable, idParticipant);
                    });
                    btnConfirmar.eventAssigned = true; // Marca el evento como asignado
                }


                const templateCredDiploma = document.getElementById('templateCredDiploma');
                // Clona el contenido del template
                const htmlCredDiploma = templateCredDiploma.content.cloneNode(true);
                templateCredDiploma.parentNode.appendChild(htmlCredDiploma);
                setTimeout(() => { // ? Inicializar el template de la credencial
                    getDataOwner();
                    getDataDocumentIfExist(idParticipant, idDeliverable, idsolicitud);
                }, 500);
            } else {
                if (btnConfirmar.closest(`.box1`).querySelector(`figure`)) btnConfirmar.closest(`.box1`).removeChild(btnConfirmar.closest(`.box1`).querySelector(`figure`));
                // btnConfirmar.setAttribute('onclick', `confirmGenerateGafete("${json.code}")`)
                // btnConfirmar.innerHTML = `Confirmar y generar`;
                btnConfirmar.closest(`.box1`).querySelector(`h4`).innerHTML = `Confirmar asistencia`;
                btnConfirmar.innerHTML = `Confirmar `;
                if (!btnConfirmar.eventAssigned) {
                    btnConfirmar.addEventListener(`click`, () => confirmGenerateGafete(btnConfirmar, idDeliverable, idParticipant));
                    btnConfirmar.eventAssigned = true; // Marca el evento como asignado
                }
                // btnConfirmar.removeAttribute('disabled');
                // btnConfirmar.closest(`.box1`).innerHTML = ``;
            }
        }

        const phoneInput = document.getElementById('phone');
        const emailInput = document.getElementById('email');
        phoneInput.value = phone;
        emailInput.value = email;

        // phoneInput.removeAttribute('disabled');
        // emailInput.removeAttribute('disabled');

        window.intlTelInput(phoneInput, {
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

        //? Recalculamos el alto del contenedor de datos
        setTimeout(() => recalcContentData(), 100);


        // sessionStorage.setItem('nameGafete', json['gafete']);

        const btnDescargarGafete = document.getElementById('btnDescargarGafete') || null;
        if (btnDescargarGafete != null) {
            if (!btnDescargarGafete.eventAssigned) {
                btnDescargarGafete.removeAttribute('disabled');
                btnDescargarGafete.setAttribute('style', 'opacity: .7');
                btnDescargarGafete.addEventListener('click', (e) => {
                    const { download, type } = btnDescargarGafete.dataset;
                    if (gafete != '' && pdf != '' || type !== undefined && download !== undefined) {
                        btnDescargarGafete.setAttribute('style', 'opacity: 1');
                        if( type === 'gafete' ){
                            // window.open(`/images/clients/credentials/${download}`, '_blank')
                            const link = document.createElement("a");
                            link.href = `${location.origin }/admin/images/clients/credentials/${download}`;
                            link.download = `${download}`;
                            link.click();
                            setTimeout(() => {
                                link.remove();
                            }, 500);
                        }else{
                            window.open(pdf, '_blank')
                        }
                        
                    } else {
                        buttonDescarga();
                    }
                });
                btnDescargarGafete.eventAssigned = true; // Marca el evento como asignado
            }
            
            btnDescargarGafete.setAttribute('class', 'btn botonFormulario checkinBtnSize1')
        }
        return;

        document.getElementById('btnSendGafeteWhats').setAttribute('onclick', `sendGafeteWhats("${json.ev_name}","${json.domain}")`)
        document.getElementById('btnSendGafeteEmail').setAttribute('onclick', `sendGafeteEmail("${json.code}")`)


        document.getElementById('btnConfirmar').removeAttribute('disabled')

        document.getElementById('btnSendGafeteWhats').removeAttribute('disabled')
        document.getElementById('btnSendGafeteEmail').removeAttribute('disabled')

        document.getElementById('btnConfirmar').setAttribute('class', 'btn botonFormulario checkinBtnSize1')

        document.getElementById('btnSendGafeteWhats').setAttribute('class', 'btn botonFormulario checkinBtnSize2')
        document.getElementById('btnSendGafeteEmail').setAttribute('class', 'btn botonFormulario checkinBtnSize2')

    }

    //? Activar modal con tabla al activar switch
    const validaCheckbox = () => {
        let checked = swtSearchAvansed.checked;
        if (checked) {
            document.getElementById('btnClickModal').click();
            // btnSearchAvanced = document.getElementById('btnSearchAvanced');
            restartChekinTable();
            document.getElementById('btnSearchAvanced')
                .addEventListener(`click`, searchAvancedClient);
        }
    }

    //? Boton de busqueda en la tabla de busqueda avanzada
    /** 
     * 
     */
    const searchAvancedClient = () => {
        let nameClient = document.getElementById('txtNameClient').value;
        let lastNameClient1 = document.getElementById('txtLastNameClient1').value;
        let lastNameClient2 = document.getElementById('txtLastNameClient2').value;
        const idEvent = document.querySelector(`#idEvent`) || null;
        if (idEvent === null && idEvent.value.trim() == '') return;
        const idEventVal = idEvent.value.trim();
        if (nameClient != '' || lastNameClient1 != '' || lastNameClient2 || '') {
            // let arrayURL = urlParams.get('id').split('/');
            const customForm1 = document.querySelector(`.custom-form1`);
            $.ajax({
                // url: 'controllers/checkin/checkin.php',
                url: 'includes/funciones/checkin/checkin.php',
                method: 'POST',
                data: { option: 'busquedaDetallada', code: idEventVal, nameClient: nameClient, lastNameClient1: lastNameClient1, lastNameClient2: lastNameClient2 },
                beforeSend: function () {
                    restartChekinTable();
                    // let table = $('#table_checkin').DataTable();
                    // table.destroy();
                    // $("#loader").show();
                },
                success: function (resp) {
                    customForm1.querySelector(`#dataSearch`).innerHTML = resp;
                    // document.getElementById('dataSearch').innerHTML = resp;
                    $(document).ready(function () {
                        // customDataTable2('table_checkin');
                        document.getElementById('btnSearchAvanced')
                            .addEventListener(`click`, searchAvancedClient);
                        $('#table_checkin').DataTable();
                        document.getElementById('txtNameClient').value = '';
                        document.getElementById('txtLastNameClient1').value = '';
                        document.getElementById('txtLastNameClient2').value = '';
                    });
                    // $("#loader").hide();
                },
                error: function (erro) {
                    console.log(erro);
                    if (document.getElementById('btnSearchAvanced')) document.getElementById('btnSearchAvanced').addEventListener(`click`, searchAvancedClient);
                    // $("#loader").hide();
                }
            });
        } else {
            Swal.fire('', 'No se puede hacer una busqueda con valores vacios.<br>Favor de proporcionar un nombre o apellido.', 'warning', 'Aceptar');
        }
    }
    /** Seleccion de la fila mediante el radio button de la tabla en el modal,
     * para buscar al participante
     */
    const getSelectionClient = () => {
        const tblCheckin = document.getElementById('table_checkin') || null;
        if (tblCheckin === null) return;
        const radios = tblCheckin.querySelectorAll('input[type="radio"]') || [];
        if (radios.length == 0) return;
        const radiosArray = Array.from(radios);
        let selection = radiosArray.filter(radio => radio.checked)[0];

        if (selection === undefined) {
            Swal.fire('Aún no has seleccionado ningún participante.', '<br>', 'warning', 'Aceptar');
            return;
        }
        if (selection.value == '') {
            Swal.fire('No se ha detectado ningún participante.', '<br>', 'warning', 'Aceptar');
            return;
        }
        document.getElementById('txtNumeroCliente').value = '';
        document.getElementById('btnClosedModal').click();
        inputsVacios();
        selectClient(selection.value);
    }



    const buttonDescarga = () => {
        Swal.fire('Error', 'Gafete no existente, favor de generar<br>', 'warning', 'Aceptar');
    }

    /** check-In y creacion de Gafete
     * 
     * @param {*} code 
     * @param {*} number 
     */
    const confirmGenerateGafete = (btnConfirmar, code, number) => {
        $.ajax({
            // url: 'controllers/checkin/checkin.php',
            url: 'includes/funciones/checkin/checkin.php',
            data: { option: "cambiarEstadoCheckin", code: code, code2: number },
            dataType: "json",
            type: 'POST',
            success: function (resultado) {
                const { status, message, description, data } = resultado;
                if (status) {
                    btnConfirmar.setAttribute(`disabled`, `disabled`);
                    Swal.fire({
                        icon: 'success',
                        title: message,
                        text: description,
                        // showDenyButton: true,
                        // showCancelButton: true,
                        confirmButtonText: "Aceptar",
                        // denyButtonText: `Don't save`
                    });
                    const figureConfirm = document.createElement(`figure`);
                    figureConfirm.innerHTML = `<img src="images/icons/icon_check.svg"> &nbsp;&nbsp;Asistencia confirmada.`;
                    btnConfirmar.closest(`.box1`).appendChild(figureConfirm);
                    //? Recalculamos el alto del contenedor de datos
                    setTimeout(() => recalcContentData(), 100);
                    // generateGafete(code);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: message,
                        text: description,
                        confirmButtonText: "Aceptar",
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: `Volver a intentar`,
                    text: `Error[0]: ocurrió un error al intentar hacer el checkin`,
                    confirmButtonText: "Aceptar",
                });
            }
        });

    }
    // ? Guardar el nombre del documento de la credencial
    const saveNameCredential = (idDeliverable, nameDocto) => {
        const frmData = new FormData();
        frmData.append("code", idDeliverable);
        frmData.append("name", nameDocto);
        frmData.append("type", 'credential');
        frmData.append("option", "saveNameDocto");
        console.log('====================== saveNameDocto ==================');
        asyncData(`includes/funciones/checkin/checkin.php`, `POST`, frmData)
        .then((response) => {
            console.log( response );
        }).catch((err) => {
            console.log(err);
        });
    }
    // ? Crear el Gafete
    const generateGafete = (idDeliverable, idParticipant = '') => {
        console.log('generateGafete');
        const idCourse = document.querySelector(`#idEvent`).value || '';


        let srcBase = "";
        let srcBaseBgSec2 = "";

        const imgLogo = document.querySelector(`#imgLogoSelected`);
        srcBase = imgLogo.src;
        const imgBgSec2 = document.querySelector(`#imgBgSelectedSec2`);
        srcBaseBgSec2 = imgBgSec2.src;

        const contentGeneral = document.getElementById("contentGeneral");
        let divAImprimir = contentGeneral.innerHTML;
        let divStrucutre = divAImprimir.replace(/&quot;/g, '');

        let orientation = "portrait";
        const frmData = new FormData();
        frmData.append("structure", divStrucutre);
        frmData.append("idCourse", idCourse);
        frmData.append("orientation", orientation);
        if( idParticipant !== '' ) frmData.append("filename", `credential_${idParticipant}.pdf`);
        frmData.append("method", "previewDesignDocument");


        asyncData(`/admin/includes/modelo/design_credencial/designCredencialModel.php`, `POST`, frmData)
            .then((result) => {
                const { status, message, nameDocto } = result;
                if (!status) {
                    Swal.fire({
                        icon: 'error',
                        title: message,
                        text: `Recargue la página e intente descargar el gadete`,
                        confirmButtonText: "Aceptar",
                    });
                    return;
                }
                const btnDescargarGafete = document.querySelector('#btnDescargarGafete') || null;
                if (btnDescargarGafete !== null) {
                    btnDescargarGafete.setAttribute('data-download', nameDocto);
                    btnDescargarGafete.setAttribute('data-type', 'gafete');
                    btnDescargarGafete.setAttribute('style', 'opacity: 1');
                }

                saveNameCredential(idDeliverable, nameDocto);
            })
            .catch((err) => {
                // skeletonTemp(false);
            });
        /* 
        
         */
        /* console.log({ option: "generateCredential", code, code2: idEvent });
        $.ajax({
            url: 'includes/funciones/checkin/checkin.php',
            method: "POST",
            data: { option: "generateCredential", code: code, code2: idEvent },
            dataType: "json",
            beforeSend: function () {
                // $("#loader").show();
                console.log('Procesando info...');
            },
            success: function (result) {
                console.info(result);
                return;

                if (result.respuesta == "success") {
                    $("#loader").hide();

                    if (sessionStorage.getItem('nameGafete') != '') {
                        Swal.fire('Correcto', 'Gafete generado con éxito<br>', 'success', 'Aceptar');
                        //alert(`informacion de session  ${sessionStorage.getItem('nameGafete')}`)
                    } else {
                        Swal.fire('Correcto', 'Gafete generado con éxito<br>y asistencia confirmada.', 'success', 'Aceptar');
                        //alert(`informacion de session  ${sessionStorage.getItem('nameGafete')}  no tiene informacion`)
                    }

                    document.getElementById('divConfirmCheckin').innerHTML = `
                        <div class="checkinMessageConfirm">
                            <img src="images/icons/icon_check.svg"> &nbsp;&nbsp;Asistencia confirmada.
                        </div>
                    `;

                    document.getElementById('btnConfirmar').setAttribute('onclick', `generateGafete("${code}")`)
                    document.getElementById('btnConfirmar').innerHTML = `Generar`;

                    sessionStorage.setItem('nameGafete', result.pdfName);

                    document.getElementById('btnDescargarGafete').setAttribute('onclick', `window.open('${result.pdf}', '_blank')`)

                } else {
                    $("#loader").hide();
                    Swal.fire('Error', 'No se pudo generar el gafete.<br>', 'error', 'Aceptar');
                }


            },
            error: function (err) {
                $("#loader").hide();
                console.log(err);
                Swal.fire(
                    'Error',
                    'No se pudo generar el gafete.<br>',
                    'error',
                    'Aceptar'
                );

            }

        }); */

    }


    /**
     * *Funcion que se encarga de enviar un correo 
     */
    const sendGafeteEmail = (code) => {

        let email = document.getElementById('email').value;
        if (email != "") {
            if (sessionStorage.getItem('nameGafete') != '') {
                if (sessionStorage.getItem('nameGafete') != 'null') {
                    if (sessionStorage.getItem('nameGafete')) {


                        $("#loader").show();

                        let arrayURL = urlParams.get('id').split('/');

                        $.ajax({

                            url: `controllers/checkin/checkin.php`,
                            method: "POST",
                            data: { option: 'generateEmailCredential', code: code, code2: arrayURL[1], email: email },
                            dataType: "json",
                            success: function (res) {
                                //$("#loader").hide();

                                if (res.respuesta == 'success') {
                                    sendMail(res.fromName, res.subject, res.bodyEmail, res.toEmail, res.toNameEmail)
                                } else {
                                    $("#loader").hide();
                                    Swal.fire('Error', 'Error[1]: No se pudo enviar el correo del gafete.<br>', 'error', 'Aceptar');
                                }

                            }, error: function (err) {
                                $("#loader").hide();
                                console.log(err)
                                Swal.fire(
                                    'Error',
                                    `No se pudo enviar el correo del gafete<br>`,
                                    'error',
                                    'Aceptar'
                                );

                            }
                        });


                    } else {
                        Swal.fire('Error', 'Informacion incompleta<br>Favor de intentar mas tarde<br>', 'warning', 'Aceptar');
                    }
                } else {
                    Swal.fire('Error', 'Gafete no existente<br>Favor de presionar "Confirmar y generar"<br>', 'warning', 'Aceptar');
                }

            } else {
                Swal.fire('Error', 'Gafete no existente<br>Favor de presionar "Confirmar y generar"<br>', 'warning', 'Aceptar');
            }
        } else {
            Swal.fire('Error', 'Campo email vacío<br>Favor de proporcionar un correo electronico válido<br>', 'warning', 'Aceptar');
        }



    }



    const sendGafeteWhats = (nameEvent, domain) => {

        let numberWhats = document.getElementById('phone').value;

        let lada = document.querySelector(".iti__selected-flag").title.split(":");

        if (numberWhats != '') {
            if (sessionStorage.getItem('nameGafete') != 'null') {
                if (sessionStorage.getItem('nameGafete') != '') {

                    if (sessionStorage.getItem('nameGafete')) {

                        let mensaje = "ENTREGA DE GAFETE | " + nameEvent + " %0A%0A Importante:%0A Agregue este número a sus contactos y proceda a descargar su gafete en el siguiente link: %0A";
                        let linkPdfGafete = `${domain}/images/clients/credentials/`;

                        window.open(`https://api.whatsapp.com/send?phone=${lada[1].trim()}${numberWhats}&text=${mensaje}%0A%0A${linkPdfGafete}${sessionStorage.getItem('nameGafete')}%0A%0A En caso de asistencia diríjase con el staff del registro.%0A ¡Bienvenid@!`);
                    }


                } else {
                    Swal.fire('Error', 'Gafete no existente<br>Favor de presionar "Confirmar y generar"<br>', 'warning', 'Aceptar');
                }

            } else {
                Swal.fire('Error', 'Gafete no existente<br>Favor de generar su gafete<br>', 'warning', 'Aceptar');
            }

        } else {
            Swal.fire('Error', 'No es posible enviar el gafete<br>Favor de proporcionar un número de whatsapp<br>', 'warning', 'Aceptar');
        }

    }


    //*Evento de boton para limpiar la busqueda ccompleta
    /**
     * *Evento de boton para limpiar la busqueda ccompleta
     */
    const clearSearchF = () => {
        const btnCleanSearch = document.getElementById('btnCleanSearch') || null;
        if (btnCleanSearch !== null) {
            btnCleanSearch.addEventListener('click', (e) => {
                document.getElementById('dataClient').innerHTML = `<div class="content-checkin-result-data--imginfo" >
                    <img src="images/icons/icon_lupa.svg">
                    <p>Aquí se mostrará la información del participante</p>
                </div>`;

                if (document.getElementById('btnConfirmar')) {
                    const btnConfirmar = document.getElementById('btnConfirmar');
                    btnConfirmar.classList.add(`btn`);
                    btnConfirmar.innerHTML = `Confirmar y generar`;
                    btnConfirmar.removeAttribute('onclick');
                    btnConfirmar.setAttribute('disabled', true);
                }

                if (document.getElementById('btnDescargarGafete')) {
                    const btnDescargarGafete = document.getElementById('btnDescargarGafete');
                    if (!btnDescargarGafete.eventAssigned) {
                        btnDescargarGafete.addEventListener('click', (e) => {
                            buttonDescarga();
                        });
                        btnDescargarGafete.eventAssigned = true; // Marca el evento como asignado
                    }
                    // btnDescargarGafete.setAttribute('onclick', 'buttonDescarga();')
                    btnDescargarGafete.setAttribute('disabled', true)
                    btnDescargarGafete.setAttribute('class', 'btn btnDisabled checkinBtnSize1')
                }

                if (document.getElementById('phone') && document.getElementById('btnSendGafeteWhats')) {
                    document.getElementById('phone').value = "";
                    document.getElementById('phone').setAttribute('disabled', true)
                    document.getElementById('btnSendGafeteWhats').setAttribute('disabled', true)
                    document.getElementById('btnSendGafeteWhats').removeAttribute('onclick')
                    document.getElementById('btnSendGafeteWhats').setAttribute('class', 'btn btnDisabled checkinBtnSize2')
                }

                if (document.getElementById('email') && document.getElementById('btnSendGafeteEmail')) {
                    document.getElementById('email').value = "";
                    document.getElementById('email').setAttribute('disabled', true)
                    document.getElementById('btnSendGafeteEmail').setAttribute('disabled', true)
                    document.getElementById('btnSendGafeteEmail').removeAttribute('onclick')
                    document.getElementById('btnSendGafeteEmail').setAttribute('class', 'btn btnDisabled checkinBtnSize2')
                }

                //? Recalculamos el alto del contenedor de datos
                setTimeout(() => recalcContentData(), 100);

            });
        }
    }

    /** Funcion para mostrar el evento seleccionando
     * 
     * @param {*} selectEvet 
     * @returns 
     */
    const selectOptionEvent = (selectEvet) => {
        if (parseInt(selectEvet.value) == 0) return;
        const optionSelected = selectEvet.selectedOptions[0];
        const srtTitle = optionSelected.innerText.split(`|`);
        const lengthTitle = srtTitle.length;

        const navMainHeader = document.querySelector(`nav.main-header`);
        if (document.querySelector(`.content_title`)) navMainHeader.removeChild(document.querySelector(`.content_title`));
        if (document.querySelector(`.content_change_title`)) navMainHeader.removeChild(document.querySelector(`.content_change_title`));

        const contentTitle = document.createElement('div');
        contentTitle.classList.add(`content_title`);
        if (lengthTitle > 1) {
            const titleEvent = document.createElement('h1');
            titleEvent.innerHTML = srtTitle[1];
            contentTitle.appendChild(titleEvent);
            if (lengthTitle == 3) {
                const subTitleEvent = document.createElement('span');
                subTitleEvent.innerText = srtTitle[2];
                contentTitle.appendChild(subTitleEvent);
            }
        }
        const idEvent = document.createElement('input');
        idEvent.id = `idEvent`;
        idEvent.type = `hidden`;
        idEvent.value = parseInt(selectEvet.value);
        contentTitle.appendChild(idEvent);
        navMainHeader.appendChild(contentTitle);

        const contentChangeTitle = document.createElement('div');
        contentChangeTitle.classList.add(`content_change_title`);
        const btnChangeTitle = document.createElement('button');
        btnChangeTitle.innerText = `Cambiar de evento`;
        btnChangeTitle.addEventListener(`click`, getEventCourse);
        contentChangeTitle.appendChild(btnChangeTitle);
        navMainHeader.appendChild(contentChangeTitle);

        const modalEventInClose = document.querySelector(`#modalEventInClose`);
        modalEventInClose.click();//? Cerramos el modal
        contentCheckinEl = document.querySelector(`#contentCheckin`);
        contentCheckinEl.classList.remove(`skeleton`);

    }
    //** Obtenemos la lista de los eventos catuales */
    const getEventCourse = () => {
        const modalEventIn = document.querySelector(`#modalEventIn`);
        const modalEventInLabel = modalEventIn.querySelector(`#modalEventInLabel`);
        const modalBody = modalEventIn.querySelector(`.modal-body`);
        modalBody.innerHTML = ``;
        $.ajax({
            url: 'includes/funciones/modales.php',
            method: "POST",
            data: { opcion: "coursesEvents" },
            dataType: "json",
            beforeSend: function () {
                // console.log('Procesando info...');
            },
            success: function (result) {
                const { status, message, description, data } = result;
                if (!status) {
                    console.log(message);
                    return;
                }

                modalEventInLabel.innerHTML = `Seleccione un evento`;
                const formGroup = document.createElement('div');
                formGroup.classList.add(`form-group`);

                const selectEvet = document.createElement('select');
                selectEvet.id = `selectEvet`;
                selectEvet.classList.add(`form-control`);
                const optionDefault = document.createElement('option');
                // optionDefault.setAttribute(`selected`, `disabled`);
                optionDefault.selected = `selected`;
                optionDefault.disabled = `disabled`;
                optionDefault.value = 0;
                optionDefault.innerText = `Seleccione un evento`;
                selectEvet.appendChild(optionDefault);

                data.forEach(item => {
                    const { id, sku, name } = item;
                    const optionDefault = document.createElement('option');
                    optionDefault.value = id;
                    optionDefault.innerText = `${sku} | ${name}`;
                    selectEvet.appendChild(optionDefault);
                });

                selectEvet.addEventListener(`change`, () => selectOptionEvent(selectEvet));
                formGroup.appendChild(selectEvet);
                modalBody.appendChild(formGroup);

                $(selectEvet).select2();
                $(selectEvet).on("change", function () {
                    selectOptionEvent(selectEvet)
                });

                const btnModalEventIn = document.querySelector(`#btnModalEventIn`);
                btnModalEventIn.click(); //? Mostrar el modal
                document.querySelector(`#contentSpinnerSecondary`).setAttribute(`style`, `display: none;`);
            },
            error: function (err) {
                console.log(err);
            }

        });
    }
    /** Creacion del HTML del Check-In
     * 
     * @returns 
     */
    const createHTMLCheckin = () => {
        return `
            <div class="content-checkin-buscable d-flex  align-content-center mb-3"  >
                <input type="text" id="txtNumeroCliente" class="form-control boxSearch" placeholder="ID de cobro o Núm. participante" maxlength="50">
                <button type="button" id="btnBuscarNumero" class="btn " >Buscar</button>
                <button type="button" id="btnCleanSearch" class="btn  btn-secontary " >Limpiar búsqueda</button>

                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="swtSearchAdvansed">
                    <label class="custom-control-label" for="swtSearchAdvansed">Activar búsqueda avanzada</label>
                </div>
            </div>
            
            <div class="content-checkin-result mb-3"  >
                <div id="dataClient" class="content-checkin-result-data checkinDivClient"  >
                    <div class="content-checkin-result-data--imginfo" >
                        <img src="images/icons/icon_lupa.svg">
                        <p>Aquí se mostrará la información del participante</p>
                    </div>
                </div>
                <div class="content-checkin-result-filesend mb-3" >
                    <section class="content-checkin-result-files mb-3" >
                        <div class="box box1" >
                            <h4>Confirmar asistencia y generar gafete:</h4>
                            <button type="button" id="btnConfirmar" class="btn" disabled>Confirmar y generar</button>
                        </div>
                        <div class="box box2" >
                            <h4>Descargar gafete:</h4>
                            <button type="button" id="btnDescargarGafete" class="btn " disabled >Descargar</button>
                        </div>
                    </section>
                    <section class="content-checkin-result-sends mb-3"  >
                        <h4>Enviar gafete</h4>
                        <div class="form-group mb-3">
                            <label>Whatsapp:</label>
                            <div class="content_action" >
                                <input
                                    type="text"
                                    id="phone"
                                    class="form-control"
                                    placeholder=""
                                    maxlength="20"
                                    disabled
                                    >
                                <button type="button" id="btnSendGafeteWhats" class="btn " disabled  >Enviar</button>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Email:</label>
                            <div class="content_action" >
                                <input
                                    type="text"
                                    id="email"
                                    class="form-control"
                                    placeholder=""
                                    maxlength="55"
                                    disabled
                                    >
                                <button type="button" id="btnSendGafeteEmail" class="btn " disabled  >Enviar</button>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        `;
    }
    /**
     * Funcion para inicializar la creacion del skeleton del Check-In
     * preparando la funcion para seleccionar el evento
     */
    const initialCheck = () => {

        contentWrapper = document.querySelector(`.content-wrapper`);
        const sectionContent = document.createElement('section');
        sectionContent.classList.add(`content`, `container-fluid`, `p-4`);

        const contentCheckin = document.createElement('div');
        contentCheckin.id = `contentCheckin`;
        contentCheckin.classList.add(`content-checkin`, `skeleton`);
        contentCheckin.innerHTML = createHTMLCheckin();
        sectionContent.appendChild(contentCheckin);

        if (document.querySelector(`#modalEvent`)) {
            const contentModal = document.querySelector(`#modalEvent`);
            // const templateModal = document.createElement('template');
            // templateModal.id = `templateModal`;
            // templateModal.innerHTML = contentModal.outerHTML;
            // sectionContent.appendChild(templateModal);
            sectionContent.appendChild(contentModal);
        }

        if (document.querySelector(`#contentGeneral`)) {
            const contentGenCredDip = document.querySelector(`#contentGeneral`);
            const templateModal = document.createElement('template');
            templateModal.id = `templateCredDiploma`;
            templateModal.innerHTML = contentGenCredDip.outerHTML;
            // sectionContent.appendChild(contentGenCredDip);
            sectionContent.appendChild(templateModal);
        }
        contentWrapper.innerHTML = sectionContent.outerHTML;
        getEventCourse();
    }

    /** Recalcular el alto de la seccion de datos del usuario
     * 
     * @param {*} remove 
     */
    const recalcContentData = (remove = false) => {
        const contentResultDataImginfo = document.querySelector(`.content-checkin-result-data--imginfo`) || document.querySelector(`.content-checkin-result-data .info_client`);
        const contentResultFiles = document.querySelector(`.content-checkin-result-files`);
        const contentResultSends = document.querySelector(`.content-checkin-result-sends`);
        const heightData = contentResultFiles.offsetHeight + contentResultSends.offsetHeight + 15;
        if (contentResultDataImginfo !== null) {
            remove ? contentResultDataImginfo.removeAttribute(`style`) : contentResultDataImginfo.style.height = `${heightData}px`;
        }
    }
    const desktopMediaQuery = window.matchMedia('(min-width: 1024px)');
    desktopMediaQuery.addEventListener('change', e => {
        e.matches ? recalcContentData() : recalcContentData(true);
    });


    const getLibraries = () => {
        const linkIntlTelInput = document.createElement(`link`);
        linkIntlTelInput.rel = `stylesheet`;
        linkIntlTelInput.href = `tools/inputtelephone/css/intlTelInput.min.css`;
        document.head.appendChild(linkIntlTelInput);
        const scriptIntlTelInput = document.createElement(`script`);
        scriptIntlTelInput.src = `tools/inputtelephone/js/intlTelInput.min.js`;
        document.head.appendChild(scriptIntlTelInput);

        const linkSelect2 = document.createElement(`link`);
        linkSelect2.rel = `stylesheet`;
        linkSelect2.href = `https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css`;
        document.head.appendChild(linkSelect2);
        const scriptSelect2 = document.createElement(`script`);
        scriptSelect2.src = `https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js`;
        document.head.appendChild(scriptSelect2);
        const qrCode = document.createElement(`script`);
        qrCode.src = `https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js`;
        document.head.appendChild(qrCode);
    }
    // Ejecutamos la funcion una vez la estructura de la página y el estilo esten listos
    document.addEventListener("DOMContentLoaded", () => {
        if (document.getElementById('contentSpinnerPrimary') !== null) {
            contentSpinnerPrimary = document.getElementById('contentSpinnerPrimary');
        }
        const contentSpinnerSecondary = document.createElement('div');
        contentSpinnerSecondary.id = `contentSpinnerSecondary`;
        contentSpinnerSecondary.classList.add(`spinner`);
        contentSpinnerSecondary.innerHTML = `<span class="loader"></span>`;
        document.body.insertBefore(contentSpinnerSecondary, document.body.firstChild);
        contentSpinnerSecondaryEl = contentSpinnerSecondary;


        initialCheck();
        if (window.screen.width >= 1024) recalcContentData();

        if (document.getElementById('btnBuscarNumero') !== null) {
            btnBuscarNumero = document.getElementById('btnBuscarNumero');
            if (!btnBuscarNumero.eventAssigned) {
                btnBuscarNumero.addEventListener('click', (e) => {
                    let idClient = document.getElementById('txtNumeroCliente').value;
                    selectClient(idClient);
                });
                btnBuscarNumero.eventAssigned = true; // Marca el evento como asignado
            }
        }

        if (document.getElementById('btnSelectedClient') !== null) {
            btnSelectedClient = document.getElementById('btnSelectedClient');
            if (!btnSelectedClient.eventAssigned) {
                btnSelectedClient.addEventListener('click', (e) => {
                    getSelectionClient();
                })
                btnSelectedClient.eventAssigned = true; // Marca el evento como asignado
            }
        }

        if (document.getElementById('btnClosedModaHeader') !== null) {
            btnClosedModaHeader = document.getElementById('btnClosedModaHeader');
            if (!btnClosedModaHeader.eventAssigned) {
                btnClosedModaHeader.addEventListener('click', (e) => {
                    inputsVacios();
                });
                btnClosedModaHeader.eventAssigned = true; // Marca el evento como asignado
            }
        }

        if (document.getElementById('btnClosedModal') !== null) {
            btnClosedModal = document.getElementById('btnClosedModal');
            if (!btnClosedModal.eventAssigned) {
                btnClosedModal.addEventListener('click', (e) => {
                    inputsVacios();
                });
                btnClosedModal.eventAssigned = true; // Marca el evento como asignado
            }
        }

        getLibraries();

        clearSearchF();
        // customDataTable2('table_checkin');

    }, false);

    window.addEventListener('load', () => {

        if (document.getElementById('swtSearchAdvansed') !== null) {
            swtSearchAvansed = document.getElementById('swtSearchAdvansed');
            swtSearchAvansed.addEventListener('change', validaCheckbox);
        }

        setTimeout(() => {
            // contentSpinnerPrimary.removeAttribute(`style`);
            // console.clear()
        }, 0);
    });


})()

