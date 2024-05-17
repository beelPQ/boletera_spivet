
( () => {
    'use strict'

    const PATH_MODULE_TMPL = '/modules/mod_my_shopping/tmpl';
    let tblPaymentsUser = null, staticMdlFilePayment = null, tooltipThisPage = null;

    // localStorage.setItem('userid', data.id)
    const myShopData = async(url, method, formData) => {
        let options = [];
        if (method == "GET") {
            options = { method: "GET" };
        } else {
            options = { method: "POST", body: formData };
        }
        const response = await fetch(url, options);
        return await response.json();
    }

    const initialTooltipThispage = () => {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            tooltipThisPage = new bootstrap.Tooltip(tooltipTriggerEl);
            return tooltipThisPage
        })
    }

    /** Preparamos los archivos a previsualizar el en modal
     * 
     * @param {*} currentElement 
     */
    const generateFileInModal = (currentElement) => {
        const idFile = currentElement.getAttribute('data-id');
        const uriFile = currentElement.getAttribute('data-uri');
        const nameFile = currentElement.getAttribute('data-name') || '';
        staticMdlFilePayment.querySelector(`#staticMdlFilePaymentLabel`).innerHTML = nameFile.trim();
        const modalDialog = staticMdlFilePayment.querySelector('.modal-dialog');
        const mdlBody = staticMdlFilePayment.querySelector(`.modal-body`);
        mdlBody.innerHTML = '';
        // if( !mdlBody.querySelector(`#${idFile}`) ){
            const contentFile = document.createElement('div');
            contentFile.classList.add('content_file');
            contentFile.id = idFile;
            const getExten = uriFile.split('.')[1]
            const extensions =  ["png", "jpg", "jpeg", "webp", "PNG", "JPG", "JPEG", "WEBP"]; 
            const filterExtens = extensions.filter(item => item == getExten);
            modalDialog.classList.remove('modal-lg');
            if( filterExtens.length > 0 ) {
                const imgFile = document.createElement('img');
                imgFile.src = uriFile;
                imgFile.classList.add('file');
                contentFile.appendChild(imgFile);
            }
            else {
                modalDialog.classList.add('modal-lg')
                let fileElement = null;
                if(getExten.toUpperCase() == 'PDF') {
                    fileElement = document.createElement('embed');
                    fileElement.type = "application/pdf";
                }
                else fileElement = document.createElement('iframe');
                fileElement.src = uriFile;
                fileElement.setAttribute('width', "100%");
                fileElement.setAttribute('height', "600px");

                // <embed src="ruta_del_pdf/archivo.pdf" type="application/pdf" width="100%" height="600px" />
                // <iframe src="ruta_del_documento/archivo.doc" width="100%" height="600px"></iframe>

                contentFile.appendChild(fileElement);
            }
            mdlBody.appendChild(contentFile);
        // }
    }
    /** Inicializamos el botón para seleccionar el archivo a cargar
     * 
     * @param {*} btnCancelFile 
     * @param {*} btnSendFile 
     * @param {*} iconFile 
     * @param {*} colUploadFile 
     * @param {*} btnUpload 
     */
    const initialBtnUpload = (btnCancelFile, btnSendFile, iconFile, colUploadFile, btnUpload) => {
        iconFile.classList.remove('success');
        iconFile.innerHTML = `<i class="fas fa-file-upload"></i>`;
        colUploadFile.removeChild(btnCancelFile);
        colUploadFile.removeChild(btnSendFile);

        btnUpload.setAttribute("data-bs-toggle", "tooltip");
        btnUpload.setAttribute("title", "Adjuntar comprobante");
        btnUpload.setAttribute("data-bs-delay", "100");
    }
    /** Carga de archivo con barra de progreso
     * 
     * @param {*} btnUpload 
     * @param {*} inputFileRow 
     */
    const prepareProcessUploadFile = (btnUpload, inputFileRow) => {
        let file = null;
        if( inputFileRow.files.length > 0 ) {
            file = inputFileRow.files[0];
            const idFile = inputFileRow.id;
            const colUploadFile = btnUpload.closest('td');
            btnUpload.removeAttribute('title');
            btnUpload.removeAttribute('aria-label');
            btnUpload.removeAttribute('data-bs-original-title');
            const iconFile = btnUpload.querySelector(`.icon_file`);
            iconFile.classList.add('success');
            iconFile.innerHTML = `<i class="fas fa-check-circle"></i> ${file.name}`;

            const btnCancelFile = document.createElement('span'); // ? Botón para eliminar el archivo seleccionado
            const btnSendFile = document.createElement('button'); // ? Boton para importar el archivo
            const contentProgress = document.createElement('div'); // ? Contenedor de barra de progreso
            contentProgress.classList.add('contentProgress');
            if( !colUploadFile.querySelector(`.cancel_file`)) {
                btnCancelFile.classList.add('cancel_file');
                btnCancelFile.innerHTML = `<i class="fas fa-times-circle"></i>`;
                // btnCancelFile.setAttribute("data-bs-toggle", "tooltip" );
                // btnCancelFile.setAttribute('title', "Cambiar archivo");
                // btnCancelFile.setAttribute("data-bs-delay", "100");
                btnCancelFile.addEventListener('click', () => {
                    // tooltipThisPage.hide();
                    // tooltip.hide()
                    initialBtnUpload(btnCancelFile, btnSendFile, iconFile, colUploadFile, btnUpload);
                });
                colUploadFile.appendChild(btnCancelFile);
            }
            if( !colUploadFile.querySelector(`.uploadFile`)) {
                btnSendFile.classList.add('uploadFile');
                btnSendFile.innerHTML = `<i class="fas fa-file-import"></i>`;
                // btnSendFile.setAttribute("data-bs-toggle", "tooltip" );
                // btnSendFile.setAttribute('title', "Cambiar archivo");
                // btnSendFile.setAttribute("data-bs-delay", "100");
                btnSendFile.addEventListener('click', () => { // ? Click para importar el archivo seleccionado
                    const importFile = new FormData();
                    importFile.append('method', 'uploadVoucher');
                    importFile.append('fileVoucher', file);
                    importFile.append('idFile', idFile);

                    const progressBar = document.createElement('progress');
                    progressBar.id = 'progressBar';
                    progressBar.value = "0";
                    progressBar.max = "100";
                    const statusEl = document.createElement('p');
                    statusEl.id = 'status';
                    
                    contentProgress.appendChild(progressBar);
                    contentProgress.appendChild(statusEl);
                    colUploadFile.appendChild(contentProgress);

                    btnUpload.style.display = "none";
                    btnCancelFile.style.display = "none";
                    btnSendFile.style.display = "none";

                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', `${PATH_MODULE_TMPL}/controllers/myShopping.php`, true);
                    xhr.upload.onprogress = function(event) {
                        const percent = (event.loaded / event.total) * 100;
                        progressBar.value = percent;
                        statusEl.textContent = `Subiendo: ${percent.toFixed(2)}%`;
                    };
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            // const btnMdlFilePayment = document.querySelector(`#btnMdlFilePayment`);
                            let idPayment ='', fileName = '', typeFile = '';
                            // status.textContent = '¡Subida completa!';
                            if( xhr.responseText.includes('status') ) {
                                const responseJson = JSON.parse(xhr.responseText);
                                const { status, message, description, data} = responseJson;
                                if( !status ) {
                                    statusEl.textContent = 'Error al subir el archivo.';
                                    setTimeout(() => {
                                        btnUpload.removeAttribute("style");
                                        btnCancelFile.removeAttribute("style");
                                        btnSendFile.removeAttribute("style");
                                        colUploadFile.removeChild(contentProgress);
                                    }, 2500);
                                    return;
                                }
                                statusEl.textContent = message;
                                if( data.hasOwnProperty("id") ) idPayment = data.id;
                                if( data.hasOwnProperty("filename") ) fileName = data.filename;
                                if( data.hasOwnProperty("type") ) typeFile = data.type;
                            }
                            setTimeout(() => {
                                colUploadFile.innerHTML = '';
                                // colUploadFile.removeChild(contentProgress);

                                const modalDialog = staticMdlFilePayment.querySelector('.modal-dialog');
                                typeFile == 'docto' ? modalDialog.classList.add('modal-lg') : modalDialog.classList.remove('modal-lg');

                                // ? Botón para visualizar el adjunto
                                const btnViewFile = document.createElement('button');
                                btnViewFile.type = "button";
                                btnViewFile.id = "viewFilePay";
                                btnViewFile.setAttribute("data-id", idPayment);
                                btnViewFile.setAttribute("data-uri", `/files/adjuntos/${fileName}`);
                                btnViewFile.setAttribute("data-name", fileName);
                                btnViewFile.setAttribute("data-bs-toggle", "modal");
                                btnViewFile.setAttribute("data-bs-target", "#staticMdlFilePayment");
                                btnViewFile.innerHTML = `<i class="fas fa-eye"></i>`;
                                btnViewFile.addEventListener('click', () => generateFileInModal(btnViewFile));
                                btnViewFile.classList.add('iconFileView', 'download');
                                
                                colUploadFile.appendChild(btnViewFile);
                                const linkFileDown = document.createElement('a');
                                linkFileDown.href = `/files/adjuntos/${fileName}`;
                                linkFileDown.classList.add('iconFileDownUp', 'download');
                                linkFileDown.setAttribute("download", fileName);
                                linkFileDown.setAttribute("data-id", idPayment);
                                linkFileDown.setAttribute("data-bs-toggle", "tooltip");
                                linkFileDown.setAttribute("title", "Descargar comprobante");
                                linkFileDown.setAttribute("data-bs-delay", "100");
                                linkFileDown.innerHTML = `<i class="fas fa-file-download"></i>`;
                                colUploadFile.appendChild(linkFileDown);
                            }, 2000);

                        } else {
                            statusEl.textContent = 'Error al subir el archivo.';
                            setTimeout(() => {
                                btnUpload.removeAttribute("style");
                                btnCancelFile.removeAttribute("style");
                                btnSendFile.removeAttribute("style");
                                colUploadFile.removeChild(contentProgress);
                            }, 2500);
                        }
                    };
                    xhr.onerror = function() {
                        statusEl.textContent = 'Error al subir el archivo.';
                        setTimeout(() => {
                            btnUpload.removeAttribute("style");
                            btnCancelFile.removeAttribute("style");
                            btnSendFile.removeAttribute("style");
                            colUploadFile.removeChild(contentProgress);
                        }, 2500);
                    };
                    xhr.send(importFile);

                    // Swal.fire({
                    //     title: message,
                    //     text: description,
                    //     icon: "warning",
                    //     confirmButtonText: "Aceptar",
                    //     confirmButtonColor: "#000",
                    //     allowOutsideClick: false,
                    //     allowEscapeKey: false
                    // });
                    // return;
                });
                colUploadFile.appendChild(btnSendFile);
            }
            setTimeout(() => {
                initialTooltipThispage();
            }, 300);

        }
    }
    /** Lista de compras realizadas por el usuario
     * 
     */
    const getPayments = () => {
        const userid = localStorage.getItem('userid') ?? '';
        const formData = new FormData();
        formData.append('method', 'my_shopping');
        formData.append('id', userid);
        myShopData(`${PATH_MODULE_TMPL}/controllers/myShopping.php`, 'POST', formData)
        .then( response => {
            const { status, message, description, data } = response;
            const tbodyPayments = tblPaymentsUser.querySelector('tbody');
            if( !status ) {
                return;
            }
            if( data.length > 0 ) {
                tbodyPayments.innerHTML = '';
                data.forEach(({id,idPay, idtransaccion, idtransaccion_secondary, moneda, montotransaccion, comision_total, fechapago, status, pdf, adjunto, notes, paymentItems}, index) => {
                    const row = document.createElement('tr');
                    const colNumber = document.createElement('td');
                    colNumber.innerHTML = `<div>${index+=1}</div>`;
                    const colPay = document.createElement('td');
                    colPay.innerHTML = `<div>${idPay}</div>`;
                    const colDatePay = document.createElement('td');
                    // Convertir la cadena de fecha en un objeto de fecha
                    const date = new Date(fechapago);
                    // Extraer los componentes de la fecha (día, mes, año)
                    const day = date.getDate();
                    const formatDay = parseInt(day) < 10 ? `0${day}` : day;
                    const motnh = date.getMonth() + 1; // Se suma 1 porque en JavaScript los meses comienzan desde 0
                    const formatMotnh = parseInt(motnh) < 10 ? `0${motnh}` : motnh;
                    const year = date.getFullYear();
                    const hours = date.getHours();
                    // Convertir las horas de formato de 24 horas a formato de 12 horas
                    const horas12 = hours % 12 || 12; // Si es 0, se convierte en 12
                    const formatHoras12 = parseInt(horas12) < 10 ? `0${horas12}` : horas12;
                    // Determinar si es AM o PM
                    const periodo = hours < 12 ? 'AM' : 'PM';
                    const minutes = date.getMinutes();
                    const formatMinutes = parseInt(minutes) < 10 ? `0${minutes}` : minutes;
                    const seconds = date.getSeconds();
                    const formatSeconds = parseInt(seconds) < 10 ? `0${seconds}` : seconds;
                    const formatDate = `${formatDay}/${formatMotnh}/${year}  ${formatHoras12}:${formatMinutes}:${formatSeconds}`;
                    colDatePay.innerHTML = `<div>${formatDate}</div>`;
                    const colStatusPay = document.createElement('td');
                    colStatusPay.innerHTML = status == 1 ? `<div class="success" >✅ Pagado</div>` : `<div class="panding" >⚠️ Pendiente</div>`;
                    const colFilePay = document.createElement('td');
                    colFilePay.innerHTML = adjunto !== null && adjunto.trim() != '' ? `<div class="contentBtnsVU" ><button type="button" id="viewFilePay"  data-id="${id}" data-uri="/files/adjuntos/${adjunto}" data-name="${adjunto}" data-bs-toggle="modal" data-bs-target="#staticMdlFilePayment" class="iconFileView download"><i class="fas fa-eye"></i></button><a href="/files/adjuntos/${adjunto}" download class="iconFileDownUp download" data-id="${id}" data-bs-toggle="tooltip" title="Descargar comprobante" data-bs-delay="100" ><i class="fas fa-file-download"></i><a></div>` 
                        : `<button type="button" id="uploadFilePay" class="iconFileDownUp upload" data-id="${id}-${idPay}" data-bs-toggle="tooltip" title="Adjuntar comprobante" data-bs-delay="100" ><input id="${id}-${idPay}" type="file" accept=".pdf, .png, .jpg, .jpeg" hidden ><span class="icon_file" ><i class="fas fa-file-upload"></i></span></button>`;
                    
                    row.appendChild(colNumber);
                    row.appendChild(colPay);
                    row.appendChild(colDatePay);
                    row.appendChild(colStatusPay);
                    row.appendChild(colFilePay);
                    // const colDetailsPay = document.createElement('td'); // ? Mostrar detalles (Pendiente)
                    // if( paymentItems.length > 0 ) {
                    //     paymentItems.forEach( item => {
                    //         console.info( item );
                    //         // colDetailsPay.innerHTML = ``;
                    //         row.appendChild(colDetailsPay);
                    //     });
                    // }
                    tbodyPayments.appendChild(row);

                    setTimeout(() => {
                        const uploadFilePay = tbodyPayments.querySelectorAll(`#uploadFilePay`);
                        uploadFilePay.forEach( btnUpload => {
                            const idBtnRowFile = btnUpload.getAttribute('data-id') || '';
                            const inputFileRow = btnUpload.querySelector(`input#${idBtnRowFile}`);
                            inputFileRow.addEventListener('change', (e) => {
                                e.preventDefault();
                                prepareProcessUploadFile(btnUpload, inputFileRow);
                            });
                            btnUpload.addEventListener(`click`, () => inputFileRow.click() );
                        });
                        const viewFilePay = tbodyPayments.querySelectorAll(`#viewFilePay`);
                        viewFilePay.forEach( btnView => {
                            btnView.addEventListener(`click`, () => generateFileInModal(btnView) );
                        });
                    }, 500);
                });
            }
            else {
                const row = document.createElement('tr');
                const colNumber = document.createElement('td');
                colNumber.setAttribute('colspan', 5);
                colNumber.innerHTML = `<div class="justify-content-center" style="font-size: 1rem;" >🤷‍♂️No se tiene compras registradas</div>`;
                row.appendChild(colNumber);
                tbodyPayments.appendChild(row);
            }
        })
        .catch( error => {
            console.log(error);
            Swal.fire({
                title: "Error inesperado",
                text: "Tuvimos problemas al obtener las compras",
                icon: "error",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#000",
                allowOutsideClick: false,
                allowEscapeKey: false
            });
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        tblPaymentsUser = document.querySelector('#tblPaymentsUser') || null;
        staticMdlFilePayment = document.querySelector(`#staticMdlFilePayment`) || null;
        if(tblPaymentsUser!==null) getPayments();
    })
    window.addEventListener('load', () => {
        initialTooltipThispage();
    });
})()
