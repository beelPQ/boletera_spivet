( () => {
    'use strict'
    
    let btnBuscarNumero = null, swtSearchAvansed = null, btnSelectedClient = null,
        contentWrapper = null, contentSpinnerPrimary = null, contentSpinnerSecondaryEl = null,
        wrapper = null, contentCheckinEl = null;


    let btnClosedModaHeader;
    let btnClosedModal;
     
    
    const restartChekinTable = () =>{
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
        if( !document.querySelector(`#idEvent`) )return;
        const idEvent = document.querySelector(`#idEvent`).value;
        //if(sessionStorage.getItem('nameGafete')){sessionStorage.removeItem('nameGafete');}
        if (evalSearchClient.trim() != '') {
            //if( parseInt(evalSearchClient) != 'NaN' && parseInt(evalSearchClient) !== NaN ) evalSearchClient = parseInt(evalSearchClient);
            // let arrayURL = urlParams.get('id').split('/');
            $.ajax({
                url: 'includes/funciones/checkin/checkin.php',
                method: "POST",
                // data: { opcion: "coursesEvents" },
                data: { option: 'busquedaManual', code: evalSearchClient, code2: parseInt(idEvent) },
                dataType: "json",
                beforeSend: function () {
                    // console.log('Procesando info...');
                },
                success:function(response){
                    const { status, message, description, data } = response;
                    if( !status ) {
                        Swal.fire(message, description, 'warning', 'Aceptar');
                        return;
                    }
                    if(data.length==0)Swal.fire('Error', 'Registro no encontrado <br>Intentar de nuevo<br>', 'warning', 'Aceptar');
                    document.querySelector(`#txtNumeroCliente`).value = ``;//? Limpiamos caja de busqueda
                    createEstructura(data);
                },error:function(error){
                    console.log(error);
                }
            })
        }else{Swal.fire('Error','Favor de proporcionar un numero de registro<br>','warning','Aceptar'); }
        
    }
    
    /** Creacion de HTML de los datos obtenidos
     * 
     * @param {*} json 
     * @returns 
     */
    const createEstructura = (json) => {
        // ? Condificón agregada [Moroni - 04Jun2024]
        if( json.length == 0 )return;

        const { idParticipant, noTra, idsolicitud, idDeliverable, name, lastname1, lastname2, email, 
            phone, photo, checkin, modality, statusPay } = json[0];
        
        const dataClient = document.getElementById('dataClient');
        if(dataClient===null)return;
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
        
        const btnConfirmar = document.getElementById('btnConfirmar');
        if (checkin == 1) {
            // btnConfirmar.setAttribute('onclick', `generateGafete("${json.code}")`)
            btnConfirmar.closest(`.box1`).querySelector(`h4`).innerHTML = `Generar gafete`;
            btnConfirmar.innerHTML = `Generar`;
            if(!btnConfirmar.closest(`.box1`).querySelector(`figure`)) {
                const figureConfirm = document.createElement(`figure`);
                figureConfirm.innerHTML = `<img src="images/icons/icon_check.svg"> &nbsp;&nbsp;Asistencia confirmada.`;
                btnConfirmar.closest(`.box1`).appendChild(figureConfirm);
            }
        } else {
            if(btnConfirmar.closest(`.box1`).querySelector(`figure`))btnConfirmar.closest(`.box1`).removeChild(btnConfirmar.closest(`.box1`).querySelector(`figure`));
            // btnConfirmar.setAttribute('onclick', `confirmGenerateGafete("${json.code}")`)
            // btnConfirmar.innerHTML = `Confirmar y generar`;
            btnConfirmar.closest(`.box1`).querySelector(`h4`).innerHTML = `Confirmar asistencia`;
            btnConfirmar.innerHTML = `Confirmar `;
            btnConfirmar.addEventListener(`click`, () => confirmGenerateGafete(btnConfirmar, idDeliverable, idParticipant));
            btnConfirmar.removeAttribute('disabled');
            // btnConfirmar.closest(`.box1`).innerHTML = ``;
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
        setTimeout(() => recalcContentData() , 100);
        return;


        sessionStorage.setItem('nameGafete', json['gafete']);
        
        
        if(json.gafete != "null" && sessionStorage.getItem('nameGafete') != "null"){
            
            if(json.gafete != '' || sessionStorage.getItem('nameGafete') != ''){
                document.getElementById('btnDescargarGafete').setAttribute('onclick',`window.open('${json.pdf}', '_blank')`)
            }else{
                document.getElementById('btnDescargarGafete').setAttribute('onclick',`buttonDescarga();`)
            }
            
        }else{
            
            document.getElementById('btnDescargarGafete').setAttribute('onclick',`buttonDescarga();`)
            
        }
        
        document.getElementById('btnSendGafeteWhats').setAttribute('onclick',`sendGafeteWhats("${json.ev_name}","${json.domain}")`)
        document.getElementById('btnSendGafeteEmail').setAttribute('onclick',`sendGafeteEmail("${json.code}")`)
        
        
        document.getElementById('btnConfirmar').removeAttribute('disabled')
        document.getElementById('btnDescargarGafete').removeAttribute('disabled')
        document.getElementById('btnSendGafeteWhats').removeAttribute('disabled')
        document.getElementById('btnSendGafeteEmail').removeAttribute('disabled')
        
        document.getElementById('btnConfirmar').setAttribute('class','btn botonFormulario checkinBtnSize1')
        document.getElementById('btnDescargarGafete').setAttribute('class','btn botonFormulario checkinBtnSize1')
        document.getElementById('btnSendGafeteWhats').setAttribute('class','btn botonFormulario checkinBtnSize2')
        document.getElementById('btnSendGafeteEmail').setAttribute('class','btn botonFormulario checkinBtnSize2')

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
        } else {
            // console.log(`no checkeado`)
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
        if(idEvent===null && idEvent.value.trim() == '')return;
        const idEventVal = idEvent.value.trim();
        if(nameClient != '' || lastNameClient1 != '' || lastNameClient2 || ''){
            // let arrayURL = urlParams.get('id').split('/');
            const customForm1 = document.querySelector(`.custom-form1`);
            $.ajax({
                // url: 'controllers/checkin/checkin.php',
                url: 'includes/funciones/checkin/checkin.php',
                method: 'POST',
                data: {option:'busquedaDetallada', code:idEventVal, nameClient: nameClient, lastNameClient1: lastNameClient1, lastNameClient2: lastNameClient2},
                beforeSend: function(){
                    restartChekinTable();
                    // let table = $('#table_checkin').DataTable();
                    // table.destroy();
                    // $("#loader").show();
                },
                success:function(resp){
                    customForm1.querySelector(`#dataSearch`).innerHTML = resp;
                    // document.getElementById('dataSearch').innerHTML = resp;
                    $(document).ready(function() {
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
                error: function(erro) {
                    console.log(erro);
                    if(document.getElementById('btnSearchAvanced')) document.getElementById('btnSearchAvanced').addEventListener(`click`, searchAvancedClient);
                    // $("#loader").hide();
                }
            });
        }else{
            Swal.fire('','No se puede hacer una busqueda con valores vacios.<br>Favor de proporcionar un nombre o apellido.','warning','Aceptar');    
        }
    }
    /** Seleccion de la fila mediante el radio button de la tabla en el modal,
     * para buscar al participante
     */
    const getSelectionClient = () => {
        const radios = document.getElementsByName('radios');
        let seleccion = 0;
        let ite = 0;
        for (var i = 0; i <  radios.length; i++) {
            if (radios[i].checked) {
                seleccion = radios[i].value;
                document.getElementById('btnClosedModal').click();
                inputsVacios();
                break;
            }else{
                //Swal.fire('Error','No se a seleccionado ningun item<br>','warning','Aceptar');  
            }
        }
        if(seleccion != 0){
            document.getElementById('txtNumeroCliente').value = '';
            selectClient(seleccion);
            
        } else {
            Swal.fire('Aún no has seleccionado ningún participante.','<br>','warning','Aceptar');
        }
    }
    
    
    
    const buttonDescarga  =() => {
        Swal.fire('Error','Gafete no existente, favor de generar<br>','warning','Aceptar');
    }
    
    /** check-In y creacion de Gafete
     * 
     * @param {*} code 
     * @param {*} number 
     */
    const confirmGenerateGafete = (btnConfirmar,code, number) => {
        $.ajax({
            // url: 'controllers/checkin/checkin.php',
            url: 'includes/funciones/checkin/checkin.php',
            data: {option:"cambiarEstadoCheckin",code:code, code2:number},
            dataType: "json",
            type: 'POST',
            success: function(resultado){
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
                    const figureConfirm = document.createElement(`figure`) ;
                    figureConfirm.innerHTML = `<img src="images/icons/icon_check.svg"> &nbsp;&nbsp;Asistencia confirmada.`;
                    btnConfirmar.closest(`.box1`).appendChild(figureConfirm);
                    //? Recalculamos el alto del contenedor de datos
                    setTimeout(() => recalcContentData() , 100);
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
            error: function(){
                Swal.fire({
                    icon: 'error',
                    title: `Volver a intentar`,
                    text: `Error[0]: ocurrió un error al intentar hacer el checkin`,
                    confirmButtonText: "Aceptar",
                });
            }
        });  
        
    }
    
    
    const generateGafete = (code) => {
        
        let arrayURL = urlParams.get('id').split('/');
        
        $.ajax({
            url: 'controllers/checkin/checkin.php',
            method: "POST",
            data: {option:"generateCredential",code:code,code2:arrayURL[1]},
            dataType: "json",
            beforeSend: function(){
                $("#loader").show();
            },
            success: function (result) {
                if(result.respuesta == "success"){
                    $("#loader").hide();
                    
                    if(sessionStorage.getItem('nameGafete') != ''){
                        Swal.fire('Correcto','Gafete generado con éxito<br>','success','Aceptar'); 
                        //alert(`informacion de session  ${sessionStorage.getItem('nameGafete')}`)
                    }else{
                        Swal.fire('Correcto','Gafete generado con éxito<br>y asistencia confirmada.','success','Aceptar'); 
                        //alert(`informacion de session  ${sessionStorage.getItem('nameGafete')}  no tiene informacion`)
                    }
                    
                    document.getElementById('divConfirmCheckin').innerHTML = `
                        <div class="checkinMessageConfirm">
                            <img src="images/icons/icon_check.svg"> &nbsp;&nbsp;Asistencia confirmada.
                        </div>
                    `;
                    
                    document.getElementById('btnConfirmar').setAttribute('onclick',`generateGafete("${code}")`)
                    document.getElementById('btnConfirmar').innerHTML = `Generar`;
                    
                    sessionStorage.setItem('nameGafete', result.pdfName);
                    
                    document.getElementById('btnDescargarGafete').setAttribute('onclick',`window.open('${result.pdf}', '_blank')`)
                    
                }else{
                    $("#loader").hide();
                    Swal.fire('Error', 'No se pudo generar el gafete.<br>', 'error', 'Aceptar');
                }
                
    
            },
            error: function(err){
                $("#loader").hide();
                console.log(err);
                Swal.fire(
                    'Error',
                    'No se pudo generar el gafete.<br>',
                    'error',
                    'Aceptar'
                );
                
            }
            
        });
        
    }
    
    
    /**
     * *Funcion que se encarga de enviar un correo 
     
     */
    const sendGafeteEmail = (code) =>{
        
        let email = document.getElementById('email').value;
        if(email != ""){
            if(sessionStorage.getItem('nameGafete') != ''){
                if(sessionStorage.getItem('nameGafete') != 'null'){
                    if( sessionStorage.getItem('nameGafete') ){
                        
                        
                        $("#loader").show();
                    
                        let arrayURL = urlParams.get('id').split('/');
                       
                        $.ajax({
                            
                            url: `controllers/checkin/checkin.php`,
                            method: "POST",
                            data: {option: 'generateEmailCredential', code:code,code2:arrayURL[1],email:email},
                            dataType: "json",
                            success: function (res) {
                                //$("#loader").hide();
                                
                                if(res.respuesta=='success'){
                                    sendMail(res.fromName,res.subject,res.bodyEmail,res.toEmail,res.toNameEmail)
                                }else{
                                    $("#loader").hide();
                                    Swal.fire('Error', 'Error[1]: No se pudo enviar el correo del gafete.<br>', 'error', 'Aceptar');
                                }
                                
                            },error: function(err){
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
                        
                        
                    }else{
                        Swal.fire('Error','Informacion incompleta<br>Favor de intentar mas tarde<br>','warning','Aceptar');
                    }
                }else{
                    Swal.fire('Error','Gafete no existente<br>Favor de presionar "Confirmar y generar"<br>','warning','Aceptar');
                }
                
            }else{
                Swal.fire('Error','Gafete no existente<br>Favor de presionar "Confirmar y generar"<br>','warning','Aceptar');
            }
        }else{
            Swal.fire('Error','Campo email vacío<br>Favor de proporcionar un correo electronico válido<br>','warning','Aceptar');
        }
        
        
       
    }
    
    
    
    const sendGafeteWhats = (nameEvent,domain) =>{
        
        let numberWhats = document.getElementById('phone').value;
        
        let lada = document.querySelector(".iti__selected-flag").title.split(":");
       
        if(numberWhats != ''){
            if(sessionStorage.getItem('nameGafete') != 'null'){
                if(sessionStorage.getItem('nameGafete') != ''){
                    
                    if(sessionStorage.getItem('nameGafete')){
                        
                        let mensaje = "ENTREGA DE GAFETE | "+nameEvent+" %0A%0A Importante:%0A Agregue este número a sus contactos y proceda a descargar su gafete en el siguiente link: %0A";
                        let linkPdfGafete = `${domain}/images/clients/credentials/`;
                        
                        window.open(`https://api.whatsapp.com/send?phone=${lada[1].trim()}${numberWhats}&text=${mensaje}%0A%0A${linkPdfGafete}${sessionStorage.getItem('nameGafete')}%0A%0A En caso de asistencia diríjase con el staff del registro.%0A ¡Bienvenid@!`);
                    }
                    
                    
                }else{
                    Swal.fire('Error','Gafete no existente<br>Favor de presionar "Confirmar y generar"<br>','warning','Aceptar');
                }
                
            }else{
                Swal.fire('Error','Gafete no existente<br>Favor de generar su gafete<br>','warning','Aceptar');
            }
            
        }else{
            Swal.fire('Error','No es posible enviar el gafete<br>Favor de proporcionar un número de whatsapp<br>','warning','Aceptar');
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

                if(document.getElementById('btnConfirmar')) {
                    const btnConfirmar = document.getElementById('btnConfirmar');
                    btnConfirmar.classList.add(`btn`);
                    btnConfirmar.innerHTML = `Confirmar y generar`;
                    btnConfirmar.removeAttribute('onclick');
                    btnConfirmar.setAttribute('disabled', true);
                }

                if(document.getElementById('btnDescargarGafete')) {
                    const btnDescargarGafete = document.getElementById('btnDescargarGafete');
                    btnDescargarGafete.setAttribute('onclick', 'buttonDescarga();')
                    btnDescargarGafete.setAttribute('disabled', true)
                    btnDescargarGafete.setAttribute('class', 'btn btnDisabled checkinBtnSize1')
                }

                if(document.getElementById('phone') && document.getElementById('btnSendGafeteWhats')) {
                    document.getElementById('phone').value = "";
                    document.getElementById('phone').setAttribute('disabled', true)
                    document.getElementById('btnSendGafeteWhats').setAttribute('disabled', true)
                    document.getElementById('btnSendGafeteWhats').removeAttribute('onclick')
                    document.getElementById('btnSendGafeteWhats').setAttribute('class', 'btn btnDisabled checkinBtnSize2')
                }

                if( document.getElementById('email') && document.getElementById('btnSendGafeteEmail') ) {
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
        if( parseInt(selectEvet.value) == 0 ) return;
        const optionSelected = selectEvet.selectedOptions[0];
        const srtTitle = optionSelected.innerText.split(`|`);
        const lengthTitle = srtTitle.length;

        const navMainHeader = document.querySelector(`nav.main-header`);
        if( document.querySelector(`.content_title`) ) navMainHeader.removeChild(document.querySelector(`.content_title`));
        if (document.querySelector(`.content_change_title`)) navMainHeader.removeChild(document.querySelector(`.content_change_title`));

        const contentTitle = document.createElement('div');
        contentTitle.classList.add(`content_title`);
        if(lengthTitle > 1 )  {
            const titleEvent = document.createElement('h1');
            titleEvent.innerHTML = srtTitle[1];
            contentTitle.appendChild(titleEvent);
            if(lengthTitle == 3) {
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
            data: {opcion:"coursesEvents"},
            dataType: "json",
            beforeSend: function () {
                // console.log('Procesando info...');
            },
            success: function (result) {
                const { status, message, description, data } = result;
                if (!status) {
                    // console.log(message);
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

                data.forEach( item => {
                    const {id, sku, name} = item;
                    const optionDefault = document.createElement('option');
                    optionDefault.value = id;
                    optionDefault.innerText = `${sku} | ${name}`;
                    selectEvet.appendChild(optionDefault);
                });

                selectEvet.addEventListener(`change`, () => selectOptionEvent(selectEvet));
                formGroup.appendChild(selectEvet);
                modalBody.appendChild(formGroup);
                
                $(selectEvet).select2();
                $(selectEvet).on( "change", function() {
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
                            <button type="button" id="btnDescargarGafete" class="btn " disabled onclick="buttonDescarga();">Descargar</button>
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
        
        if( document.querySelector(`#modalEvent`) ) {
            const contentModal = document.querySelector(`#modalEvent`);
            // const templateModal = document.createElement('template');
            // templateModal.id = `templateModal`;
            // templateModal.innerHTML = contentModal.outerHTML;
            // sectionContent.appendChild(templateModal);
            sectionContent.appendChild(contentModal);
        }
        contentWrapper.innerHTML = sectionContent.outerHTML;
        getEventCourse();
    }
    
    /** Recalcular el alto de la seccion de datos del usuario
     * 
     * @param {*} remove 
     */
    const recalcContentData = (remove=false) => {
        const contentResultDataImginfo = document.querySelector(`.content-checkin-result-data--imginfo`) || document.querySelector(`.content-checkin-result-data .info_client`);
        const contentResultFiles = document.querySelector(`.content-checkin-result-files`);
        const contentResultSends = document.querySelector(`.content-checkin-result-sends`);
        const heightData = contentResultFiles.offsetHeight + contentResultSends.offsetHeight + 15;
        if(contentResultDataImginfo !== null) {
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
        if( window.screen.width >= 1024 )recalcContentData();
        
        if(document.getElementById('btnBuscarNumero') !== null ) {
            btnBuscarNumero = document.getElementById('btnBuscarNumero');
            btnBuscarNumero.addEventListener('click', (e) => {
                let idClient = document.getElementById('txtNumeroCliente').value;
                selectClient(idClient);
            });
        }
        
        if( document.getElementById('btnSelectedClient') !== null) {
            btnSelectedClient = document.getElementById('btnSelectedClient');
            btnSelectedClient.addEventListener('click', (e) => {
                getSelectionClient();
            })
        }
        
        if(document.getElementById('btnClosedModaHeader')!==null) {
            btnClosedModaHeader = document.getElementById('btnClosedModaHeader');
            btnClosedModaHeader.addEventListener('click', (e) => {
                inputsVacios();
            });
        }
        
        if(document.getElementById('btnClosedModal')!==null) {
            btnClosedModal = document.getElementById('btnClosedModal');
            btnClosedModal.addEventListener('click', (e) => {
               inputsVacios();
            });
        }
        
        getLibraries();

        clearSearchF();
        // customDataTable2('table_checkin');
    
    },false);
    
    window.addEventListener('load', () => {
        if (document.getElementById('swtSearchAdvansed') !== null) {
            swtSearchAvansed = document.getElementById('swtSearchAdvansed');
            swtSearchAvansed.addEventListener('change', validaCheckbox);
        }
        setTimeout(()=>{
            // contentSpinnerPrimary.removeAttribute(`style`);
            // console.clear()
        }, 0);
    });
    
    
})()

