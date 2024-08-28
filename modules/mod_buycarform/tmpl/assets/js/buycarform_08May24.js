let valuePhone;

localStorage.setItem("amount", localStorage.getItem("subtotal"));

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
        options = { method: "POST", body: formData };
    }
    const response = await fetch(url, options)
    return await response.json();
}

const asycData = async (uri, method, type, formData) => {
    let result = '', params = {}

    if (method == "POST") {
        params = {
            method: "POST",
            body: formData,
            /*
            headers: {
                // 'Content-Type': 'application/json',
                // 'Authorization': `Bearer ${token}`
                // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                "X-CSRF-TOKEN": document
                    .querySelector("#csrfToken")
                    .getAttribute("content"),
            },
            */

            // headers: {
            //     'Accept': 'application/json',
            //     'Content-Type': 'application/json'
            // },
            // body: JSON.stringify({'mi_dato_1':data2, 'mi_dato_2':'Hola', }) ,
            /* headers: {
                pragma: 'no-cache',
                cache: 'reload',
                'Cache-Control': 'no-cache',
            }, */

        };
    }

    const response = await fetch(uri, params);
    if (type == "json") result = await response.json();
    else result = await response.text();
    return result;
};

/**
* *Funcion encargada de dar formado de monea a cantidades
* 
* @param {} quantity cantidad
* @returns formato de cantidad en moneda
*/
const formatMoney = (quantity) => {
    return new Intl.NumberFormat('en-Latn-US', {
        style: "currency",
        currency: "USD",
        maximumFractionDigits: 2,
    }).format(quantity);
}

/**
 * *Valida que todos los campos del formulario del paso 2 esten correctos
 * En caso contrario crea un variable de errores la cual nos ayuda a validar
 * cuando el usuario quiere cambiar al paso 3
 */
const validateFormFinal = () => {
    const form = document.querySelector(`#formDataPayment`);
    const inputName = form.querySelectorAll(`input`);
    const selectName = form.querySelectorAll(`select`);
    let noErrors = 0;
    let checkInvoice = 0;
    let noErrorsSelect = 0;
    inputName.forEach(element => {
        if (element.id == "inputConsFiscal") {
            if (document.querySelector(`#addInvoice_yes`).checked) {
                if (element.value != "") {
                } else {
                    noErrors++;
                }
            } else {
            }
        } else if (element.id == "openpay_name" || element.id == "openpay_card" || element.id == "openpay_month" ||
            element.id == "openpay_year" || element.id == "openpay_cvv" || element.id == "token_id" ||
            element.id == "code1_op" || element.id == "code2_op" || element.id == "code3_op" || element.id == "iva" ||
            element.id == "amountIVA" || element.id == "comision" || element.id == "comision_porcentaje" ||
            element.id == "descuento_aplicado" || element.id == "descuento" || element.id == "tipo_descuento" ||
            element.id == "code_descuento" || element.id == "iddescuento" || element.id == `input`) { }
        else {
            if (element.value.trim() != "" && !element.classList.contains("is-invalid")) {
            } else {
                noErrors++;
            }
        }
    });

    selectName.forEach(element => {
        //if(element.id != "optionsPayment"){ 
        if (element.value != "no_selected" && !element.classList.contains("is-invalid")) {
        } else {
            noErrorsSelect++;
        }
        //}
    });
    const checkAviso = document.querySelector(`#checkAviso`);
    if (noErrors === 0 && noErrorsSelect === 0 /* && checkAviso.checked */) {
        statusErrorForm = 0;
        document.querySelector(`#btnPaymentDesktop`).disabled = false;
        document.querySelector(`#btnPaymentDesktop`).classList.remove("btn-disabled")
    } else {
        statusErrorForm = 1;
        document.querySelector(`#btnPaymentDesktop`).disabled = true;
        document.querySelector(`#btnPaymentDesktop`).classList.add("btn-disabled")
    }
}

/**
* *Funcion que se encarga de obtener todos los metodos de pago
* Crea las opciones del select de metodos de pago
*/
const getOptionsPayment = () => {
    let formData = new FormData();
    formData.append("method", "paymentMethods")
    asyncData2(`/modules/mod_buycarform/tmpl/model/buyCarForm.php`, `POST`, formData)
        .then((result) => {
            if (result.status) {
                let options = ``;
                options += `<option value="no_selected" disabled selected>Seleccionar</option>`;
                result.data.forEach(element => {
                    options += `<option value="${element.id}">${element.namePayment}</option>`;
                });
                document.querySelector(`#optionsPayment`).innerHTML = options;
            }
        }).catch((err) => {
            console.error(err)
        });
}

/*const initSdkMP = ( type ) => {
    //Inicializamos a mercado pago
    console.log(type);
}*/


const eventModalMP = (tipo) => {
    document.querySelector("#btnModalPayment").click();
    initSdkMP(tipo);
}

(() => {

    /**
     * @author Osgual Velazquez
     * @date 14/08/2023
     */

    /*   $(document).ready(function() {
          $('#typeFilter').multiselect();
          getListServices();
          sessionStorage.setItem("numItems", 6);
      }); */
    let statusErrorForm = 1;
    let nErrors = 0;


    /**
     * *Descargamos la informacion de los estados
     * Cremos las opciones del select de estados
     */
    const getStates = (idCountry = 0) => {
        let formData = new FormData();
        if (idCountry != 0) {
            formData.append("method", "getStatesForCountry")
            formData.append("idCountry", idCountry)
        } else {
            formData.append("method", "getStates")
        }
        asyncData2(`/modules/mod_buycarform/tmpl/model/buyCarForm.php`, `POST`, formData)
            .then((result) => {
                if (result.status) {
                    let options = ``;
                    options += `<option value="no_selected" disabled selected>Seleccionar</option>`;
                    result.data.forEach(element => {
                        options += `<option value="${element.id}">${element.state}</option>`;
                    });
                    document.querySelector(`#state`).innerHTML = options;
                } else {
                    console.error(result);
                }
            }).catch((err) => {
                console.error(err)
            });
    }

    const getCountries = () => {
        let formData = new FormData();
        formData.append("method", "getCountries")
        asyncData2(`/modules/mod_buycarform/tmpl/model/buyCarForm.php`, `POST`, formData)
            .then((result) => {
                if (result.status) {
                    let options = ``;
                    options += `<option value="no_selected" disabled selected>Seleccionar</option>`;
                    result.data.forEach(element => {
                        options += `<option value="${element.id}">${element.country}</option>`;
                    });
                    document.querySelector(`#country`).innerHTML = options;
                } else {
                    console.error(result);
                }
            }).catch((err) => {
                console.error(err)
            });
    }

    /**
     * *Funcion que inicializa el input de tipo telefono
     */
    const initlTelInput = () => {
        const inputPhone = document.querySelector(`#telwhat`);
        valuePhone = window.intlTelInput(inputPhone, {
            preferredCountries: ['mx', 'us'],
            utilsScript: "/modules/mod_buycarform/tmpl/assets/plugin/js/utils.js",
        });
    }

    /**
     * *Funcion que obtiene todos los municipios 
     * @param {int} idState Id del estado
     */
    const getTowns = (idState) => {
        let formData = new FormData();
        formData.append("method", "getTowns");
        formData.append("idState", idState);
        asyncData2(`/modules/mod_buycarform/tmpl/model/buyCarForm.php`, `POST`, formData)
            .then((result) => {
                if (result.status) {
                    let options = ``;
                    options += `<option value="no_selected" disabled selected>Seleccionar</option>`;
                    result.data.forEach(element => {
                        options += `<option value="${element.id}">${element.town}</option>`;
                    });
                    document.querySelector(`#towns`).innerHTML = options;
                } else {
                    console.error(result);
                }
            }).catch((err) => {
                console.error(err)
            });
    }

    /**
     * *Funcion que valida el tipo de archivo adjuntado
     * @param {input} idFile input file element
     * @returns boolean
     */
    const fileValidation = (idFile) => {
        let fileInput = document.querySelector('#' + idFile);
        let filePath = fileInput.value;
        let allowedExtensions = new RegExp(fileInput.dataset.regularext, 'i')
        if (!allowedExtensions.exec(filePath)) {
            fileInput.value = '';
            document.querySelector('#delete_' + idFile).value = '';
            document.querySelector('#delete_' + idFile).setAttribute("hidden", "");
            Swal.fire({
                title: 'Adjunto no aceptable',
                html: 'Solo se permiten archivos con la extencion .<strong>' + fileInput.dataset.extensions + '</strong>',
                icon: 'warning',
                confirmButtonText: 'Cerrar',
                customClass: {
                    confirmButton: 'confirm-btn-alert',
                    denyButton: 'deny-btn-alert',
                    cancelButton: 'cancel-btn-alert',
                },
            });
            return false;
        }
        else {
            if (fileInput.files.length > 0) {
                for (const i = 0; i <= fileInput.files.length - 1; i++) {
                    const fsize = fileInput.files.item(i).size;
                    const file = Math.round((fsize / 1024));
                    let maxsize = 1024 * parseFloat(fileInput.dataset.maxsizemb);
                    // The size of the file.
                    if (file > maxsize) {
                        //alert("File too Big, please select a file less than 4mb");
                        fileInput.value = '';
                        document.querySelector('#delete_' + idFile).value = '';
                        document.querySelector('#delete_' + idFile).setAttribute("hidden", "");
                        Swal.fire({
                            title: 'Cuidado',
                            html: 'El tamaño máximo admitido es de ' + fileInput.dataset.maxsizemb + 'MB',
                            icon: 'warning',
                            confirmButtonText: 'Cerrar',
                            customClass: {
                                confirmButton: 'confirm-btn-alert',
                                denyButton: 'deny-btn-alert',
                                cancelButton: 'cancel-btn-alert',
                            },
                        });
                        return false;
                    } else {
                        document.querySelector('#delete_' + idFile).innerHTML = fileInput.value.split('\\').pop() + '<img data-idfile="' + idFile + '" class="btnCleanFile" src="/modules/mod_buycarform/tmpl/assets/img/icons/icon_delete_file.svg">';
                        document.querySelector('#delete_' + idFile).removeAttribute("hidden");
                        validateFormFinal();
                    }
                }
            }
        }
    }
    const deleteProduct = (btnDelPro) => {
        pricemxn = parseFloat(btnDelPro.dataset.pricemxn);
        priceusd = parseFloat(btnDelPro.dataset.priceusd);
        let currency = localStorage.getItem("moneda");
        let price;
        currency == 'USD' ? price = priceusd : price = pricemxn;
        //Actualizmos todos los inputs o labels que muestran el subtotal 
        let currentSubTotal = parseFloat(localStorage.getItem("subtotal"));
        currentSubTotal = currentSubTotal - price;
        localStorage.setItem("subtotal", currentSubTotal);
        let labelsSubTotal = document.querySelectorAll('.label-subtotal');
        labelsSubTotal.forEach(function (lblsubtotal) {
            lblsubtotal.innerHTML = formatMoney(currentSubTotal);
        });

        /*
        //Actualizmos todos los inputs o labels que muestran la suma total 
        let currentTotal = parseFloat(localStorage.getItem("amount"));
        //let currentTotalMXN = parseFloat(document.querySelector('#amount').dataset.totalmxn);
        //let currentTotalUSD = parseFloat(document.querySelector('#amount').dataset.totalusd);
    
        currentTotal = currentTotal - price;
        //currentTotalMXN = currentTotalMXN - pricemxn;
        //currentTotalUSD = currentTotalUSD - priceusd;
    
        localStorage.setItem("amount", currentTotal);
        //document.querySelector('#amount').dataset.totalmxn = currentTotalMXN; 
        //document.querySelector('#amount').dataset.totalusd = currentTotalUSD; 
    
        let labelsTotal = document.querySelectorAll('.label-total');
    
        labelsTotal.forEach(function(lbltotal) {
    
            lbltotal.innerHTML=formatMoney(currentTotal);
            //lbltotal.dataset.totalmxn=formatMoney(currentTotalMXN);
            //lbltotal.dataset.totalusd=formatMoney(currentTotalUSD);
            
        });
        */

        //eliminamos el item de los carritos movil y desk
        let btnsDeleteProducts = document.querySelectorAll('.deleteProduct');
        btnsDeleteProducts.forEach(function (btnDelete) {
            if (btnDelete.dataset.code == btnDelPro.dataset.code) {
                let rowItem = btnDelete.parentElement.parentElement;
                rowItem.remove();
            }
        });

        //Ponemos como disponible el boton para añadirel producto que se acaba de borrar
        let btnsAddProducts = document.querySelectorAll('.btnAdd');
        btnsAddProducts.forEach(function (btnAdd) {
            if (btnAdd.dataset.code == btnDelPro.dataset.code) {
                btnAdd.innerHTML = "Agregar al carrito";
                btnAdd.removeAttribute("disabled");
                btnAdd.style.opacity = 'unset';
            }
        });

        //Actualizamos el contador de items(movil y desk)
        let countersItems = document.querySelectorAll('.counterItems');
        countersItems.forEach(function (counterItems) {
            let currentCounter = parseInt(counterItems.innerHTML);
            currentCounter = currentCounter - 1;
            counterItems.innerHTML = currentCounter;
        });

        //eliminamos el producto de la variable que contiene la lista de productos del carrito
        let currentListCart = JSON.parse(localStorage.getItem("cart_products"));
        let indexProductCart = 0;
        currentListCart.every(function (item) {
            if (item.code == btnDelPro.dataset.code) {
                return false;
            } else {
                indexProductCart++;
                return true;
            }
        })
        currentListCart.splice(indexProductCart, 1)
        localStorage.setItem("cart_products", JSON.stringify(currentListCart));
        if (localStorage.getItem(`cart_products`) && JSON.parse(localStorage.getItem(`cart_products`)).length <= 0) {
            location.href = "/servicios";
        }

        //si se borraron todos los productos del carrito
        if (localStorage.getItem(`subtotal`) && parseFloat(localStorage.getItem(`subtotal`)) <= 0) {
            if (document.querySelector(`#descuento_aplicado`).value != '') {
                //habilitamos los campos del cupon
                let inputscupon = document.querySelectorAll('.input-cupon');
                inputscupon.forEach(function (inputcupon) {
                    inputcupon.removeAttribute("disabled");
                    inputcupon.value = '';
                });
                let btnscupon = document.querySelectorAll('.btn-cupon-dis');
                btnscupon.forEach(function (btncupon) {
                    btncupon.removeAttribute("disabled");
                    btncupon.setAttribute("class", "btn-cupon");
                    btncupon.innerHTML = "Aplicar";
                });
                //llenamos los campos relacionados al descuento
                document.querySelector(`#descuento_aplicado`).value = '';
                document.querySelector(`#descuento`).value = 0;
                document.querySelector(`#tipo_descuento`).value = '';
                document.querySelector(`#code_descuento`).value = '';
                document.querySelector(`#iddescuento`).value = '';
                //actualizamos los labels que muestran el descuento
                let labelsDiscounts = document.querySelectorAll('.label-discount');
                labelsDiscounts.forEach(function (lbldiscount) {
                    lbldiscount.innerHTML = '$0.00';
                });
            }
        }
        verifyFormPayIsRequired();
        //recalculamos los totales
        setTimeout(() => {
            let condescuento = document.querySelector('#descuento_aplicado').value;
            if (condescuento != "") {
                calculate_cupon();
            } else {
                calculate_total();
            }
        }, 200);
    }

    const updateProductsCart = () => {
        if (localStorage.getItem(`cart_products`) && JSON.parse(localStorage.getItem(`cart_products`)).length > 0) {
            let frmData = new FormData();
            frmData.append('select', '');
            frmData.append('input', '');
            frmData.append('method', 'getProducts');
            frmData.append('limit', 3);
            frmData.append('code', 1);
            //asycData(`/modules/mod_buycar/tmpl/requests/request_queries.php`, 'POST', 'json', frmData)
            asycData(`/modules/mod_buycar/tmpl/controllers/queries.php`, 'POST', 'json', frmData)
                .then((response) => {
                    if (response.status_code == 200) {
                        let arrayProductsAll = response.productsAll;
                        let sessionProductList = ``;
                        if (localStorage.getItem(`cart_products`) && JSON.parse(localStorage.getItem(`cart_products`)).length > 0) {
                            sessionProductList = JSON.parse(localStorage.getItem(`cart_products`));
                        }
                        let subtotal = 0;
                        arrayProductsAll.forEach(function (product) {
                            //verificamos que productos hay en el carrito y si sus datos siguen siendo validos
                            if (localStorage.getItem(`cart_products`) && JSON.parse(localStorage.getItem(`cart_products`)).length > 0) {
                                let indexProductCart = 0;
                                let deleteProductCart = 0;
                                sessionProductList.every(element => {
                                    if (element.code == product.code) {
                                        if (product.catalogo_productos_stock > 0 && product.catalogo_productos_publicado == 1 && (Date.parse(product.catalogo_productos_fechainicio) >= Date.parse(product.currentDate))) {
                                            //verificamos si la modalidad que se habia seleccionado sigue siendo valida
                                            let isValidModality = 0;
                                            if (element.modality == 'Virtual') {
                                                //si el producto tiene asignado la modalidad Virtual o Mixta, sigue siendo valida la modalidad seleccionada
                                                if (product.producto_modalidad_idsystemprodmod == 2 || product.producto_modalidad_idsystemprodmod == 3) {
                                                    isValidModality = 1;
                                                }
                                            } else if (element.modality == 'Presencial') {
                                                //si el producto tiene asignado la modalidad Presencial o Mixta, sigue siendo valida la modalidad seleccionada
                                                if (product.producto_modalidad_idsystemprodmod == 1 || product.producto_modalidad_idsystemprodmod == 3) {
                                                    isValidModality = 1;
                                                }
                                            }
                                            if (isValidModality == 1) {
                                                element.name = product.catalogo_productos_nombre;
                                                let finalPriceMxn = product.pricemxn;
                                                if (parseFloat(product.pricemxn_discount) > 0) {
                                                    finalPriceMxn = product.pricemxn_discount;
                                                }
                                                const rec = /,/gi
                                                finalPriceMxn = finalPriceMxn.replace(rec, '');
                                                finalPriceMxn = parseFloat(finalPriceMxn);
                                                element.pricemxn = finalPriceMxn.toFixed(2);
                                                element.priceusd = 0;
                                                subtotal = subtotal + finalPriceMxn;
                                            } else {
                                                deleteProductCart = 1;
                                            }
                                        } else {
                                            deleteProductCart = 1;
                                        }
                                        return false;

                                    } else {
                                        indexProductCart++;
                                        return true;
                                    }

                                });
                                if (deleteProductCart == 1) {
                                    sessionProductList.splice(indexProductCart, 1);
                                }
                                localStorage.setItem("cart_products", JSON.stringify(sessionProductList));
                            }
                        })
                        localStorage.setItem("subtotal", subtotal);
                        localStorage.setItem("amount", subtotal);
                        //if(subtotal<=0){
                        //    location.href = '/index.php/carrito-de-capacitaciones';
                        //}
                    }
                    else {
                        Swal.fire({
                            title: 'Error encontrado!',
                            text: 'Ocurrio un error al consultar los datos del carrito',
                            icon: 'error',
                            confirmButtonText: 'Cerrar',
                            customClass: {
                                confirmButton: 'confirm-btn-alert',
                            }
                        }).then((result) => {
                            location.href = '/servicios';
                        })
                    }
                })
                .catch((err) => {
                    Swal.fire({
                        title: 'Error encontrado!',
                        text: err,
                        icon: 'error',
                        confirmButtonText: 'Cerrar',
                        customClass: {
                            confirmButton: 'confirm-btn-alert',
                        }
                    }).then((result) => {
                        location.href = '/servicios';
                    })
                    //return false;
                });
        }
    }
    /**
     * *Funcion que obtiene los producto seleccionados que estan almacenados en session
     * setea la informacion de la session local cart_products al carrito de compra
     */
    const getProductsSession = () => {
        if (localStorage.getItem("cart_products")) {
            let itemProduct = ``;
            const jsonProducts = localStorage.getItem("cart_products");
            const products = JSON.parse(jsonProducts);
            const typeItem = "Product";
            const currency = "MXN";
            const amountTotal = formatMoney(localStorage.getItem("amount"));
            const subtotal = formatMoney(localStorage.getItem("subtotal"));
            products.forEach(element => {
                itemProduct += `
                <div class="rowItemPayment ${typeItem}">
                    <div class="itemPayment_name">
                        <span class="concept_pay">${element.name}</span><br>
                        <span class="delete${typeItem}" data-code="${element.code}" data-pricemxn="${element.pricemxn}" data-priceusd="${element.priceusd}" >Eliminar</span>
                    </div>
                    <div class="itemPayment_price">
                        <span class="label-currency">${currency}</span> 
                        <span class="label-price" data-pricemxn="${formatMoney(element.pricemxn)}" data-priceusd="${formatMoney(element.priceusd)}" >${formatMoney(element.pricemxn)}</span>
                    </div>
                </div>
                `;
            });
            document.querySelector(`.label-total`).innerText = `${amountTotal}`;
            document.querySelector(`.contentItemsPayment`).innerHTML = itemProduct;
            document.querySelector(`.label-subtotal`).innerText = subtotal;
            document.querySelector(`.label-total`).innerText = amountTotal;
            //seteamos la cantidad de items obtenidos
            const counterItems = document.querySelectorAll(`.counterItems`);
            counterItems.forEach(element => {
                element.innerText = products.length;
            });
            const totals = document.querySelectorAll(`.label-total`);
            totals.forEach(element => {
                element.innerText = amountTotal;
            });
            setTimeout(() => { document.querySelector(`.clickDeploySumPayDesktop`).click(); }, 2000);
            calculate_total();
        }
    }

    /**
     * TODO Se agrego esta funcion que cambia el texto del carrito cuando es contraido o desplegado
     * @param {string} mode 
     */
    const btnSumPayChange = (mode) => {
        if (document.querySelector('#label-deploySumPay' + mode).innerHTML == 'Ver') {
            document.querySelector('#label-deploySumPay' + mode).innerHTML = 'Cerrar';
            //document.querySelector('#label-deploySumPay').style.marginLeft='15px';
        } else {
            document.querySelector('#label-deploySumPay' + mode).innerHTML = 'Ver';
            //document.querySelector('#label-deploySumPay').style.marginLeft='30px';
        }
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
     * Valida todos los input por medio de un arreglo
     * @param {element} input elemento 
     */
    const validateInput = (input) => {
        const stringValidatorEmail = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        const arrayInputValidation = [
            { input: "name", valMin: 2, messageLengt: "Numero de caracteres mayor a 2", messageVacio: "Nombre requerido" },
            { input: "lastname1", valMin: 2, valMax: 30, messageLengt: "Numero de caracteres mayor a 4", messageVacio: "Apellido requerido" },
            { input: "lastname2", valMin: 2, valMax: 30, messageLengt: "Numero de caracteres mayor a 4", messageVacio: "Apellido requerido" },
            { input: "email", valMin: 4, valMax: 30, messageLengt: "Correo no valido", messageVacio: "Correo requerido" },
            { input: "telwhat", valMin: 9, valMax: 12, messageLengt: "Numero no valido", messageVacio: "Telefono requerido" },
            { input: "cp", valMin: 4, valMax: 30, messageLengt: "Codigo postal no valido", messageVacio: "Codigo postal requerido" }
        ];
        arrayInputValidation.forEach(element => {
            if (input.id == element.input) {
                if (input.id === "email") {
                    if (stringValidatorEmail.test(input.value)) {
                        deleteMsgError(input)
                    } else {
                        createMsgError(input, element.messageLengt);
                    }
                } else {
                    if (input.value.trim() != "") {
                        if (input.value.length > element.valMin) {
                            deleteMsgError(input)
                        } else {
                            createMsgError(input, element.messageLengt);
                        }
                    } else {
                        createMsgError(input, element.messageVacio);
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
            { select: "country", messageVacio: "Pais requerido" },
            { select: "towns", messageVacio: "Municipio requerido" },
            { select: "optionsPayment", messageVacio: "Metodo de pago requerido" }];

        arraySelectValidation.forEach(element => {
            if (select.id == element.select) {
                if (select.value.trim() !== "no_selected") {
                    deleteMsgError(select)
                } else {
                    createMsgError(select, element.messageVacio);
                    nErrors++;
                }
            }
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


    const validateRecaptcha = (tipo) => {
        grecaptcha.ready(function () {
            grecaptcha.execute('6LevnX0pAAAAAM8b4qITJ6OHfpRdAZN1DF32xdpt', { action: 'formulario_pago' }).then(function (token) {
                const dataVelidateR = new FormData();    //Se crea un objeto de tipo FormData para almacenar la informacion que se validara.
                dataVelidateR.append('token', token);   //Se agrega la variable tipo al formdata.
                const xhrValRecaptcha = new XMLHttpRequest(); //Se crea un objeto XML
                xhrValRecaptcha.open('POST', '/modules/mod_buycarform/tmpl/model/validateRecaptcha.php', true);   //Se especifica en que metodo, a donde y si es asincrono.
                xhrValRecaptcha.onload = function () {
                    const response = JSON.parse(this.response);
                    if (!response.reqStatus) {
                        Swal.fire(
                            'Error en reCaptcha',    //TITLE
                            'El reCaptcha no fue reconocido para este sitio',  //TEXT
                            'error',  //TYPE
                            'Aceptar'   //CONFIRMBUTTONTEXT
                        );
                        return;
                    } else {
                        //eventModalMP(tipo);
                        proccessPago(tipo);
                    }
                }
                xhrValRecaptcha.send(dataVelidateR);   //Enviamos los datos
            });
        });
    }

    window.addEventListener('click', (e) => {
        if (e.target) {
            let element = e.target;
            let elementID = e.target.id;
            let elementClass = e.target.classList;
            if (elementClass.contains('deleteProduct')) {
                deleteProduct(element);
            } else if (elementClass.contains('clickDeploySumPayDesktop')) {
                btnSumPayChange('Desktop');
            } else if (elementClass.contains('btnCleanFile')) {
                document.querySelector('#' + element.dataset.idfile).value = '';
                document.querySelector('#delete_' + element.dataset.idfile).value = '';
                document.querySelector('#delete_' + element.dataset.idfile).setAttribute("hidden", "");
                validateFormFinal();
            } else if (elementClass.contains('payment-button')) {
                const avatar = document.querySelector(`img#avatar`) || null;
                if (!avatar.src.includes('data:image')) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Foto de usuario',
                        html: 'Agregue una foto para continuar',
                        confirmButtonText: 'Cerrar',
                        customClass: {
                            confirmButton: 'confirm-btn-alert',
                            denyButton: 'deny-btn-alert',
                            cancelButton: 'cancel-btn-alert',
                        },
                    });
                    return;
                }
                const aviso = document.querySelector(`#checkAviso`);
                if (aviso.checked) {
                    //document.querySelector(`.spinner`).style.display = 'flex';
                    //proccessPago();
                    //let formData = new FormData();
                    //let tokenRec = document.querySelector(`#recaptcha-token`);
                    //formData.append("token", tokenRec.value);
                    //Verificamos el rechapcha
                    validateRecaptcha("Desktop");
                    //document.querySelector("#btnModalPayment").click();
                    //initSdkMP("Desktop");
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Aviso de Privacidad',
                        html: 'Para continuar es necesario <strong> aceptar el Aviso de Privacidad </strong>',
                        confirmButtonText: 'Cerrar',
                        customClass: {
                            confirmButton: 'confirm-btn-alert',
                            denyButton: 'deny-btn-alert',
                            cancelButton: 'cancel-btn-alert',
                        },
                    });
                }
            } else if (elementClass.contains('btn-cupon')) {
                document.querySelector(`.spinner`).style.display = 'flex';
                apply_cupon();
            }
            if (elementID == 'btnExit') {
                location.href = '/';
            }
            if (elementID == "btnClosedModal") {
                location.reload();
            }
        }
    });

    const initfun = () => {
        if (localStorage.getItem(`cart_products`) && JSON.parse(localStorage.getItem(`cart_products`)).length > 0) {
            initlTelInput();
            updateProductsCart();
            setTimeout(function () {
                getProductsSession();
            }, 200);

            //getStates();
            getCountries();
            //getOptionsPayment();
            validateFormFinal();
            setTimeout(function () {
                verifyFormPayIsRequired('load');
            }, 200);
            setTimeout(() => {
                if (document.querySelector(`.spinner`)) {
                    document.querySelector(`.spinner`).style.display = "none";
                }
            }, 800);
        } else {
            location.href = '/servicios';
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        initlTelInput();
        /**
         * *Inicia la validacion del formulario solo en los input text 
         */
        const form = document.querySelector(`#formDataPayment`);
        const inputName = form.querySelectorAll(`input`);
        inputName.forEach(element => {
            element.addEventListener('blur', (e) => {
                const element = e.target;
                validateInput(element);
                validateFormFinal();
            });
        });
        const selectName = form.querySelectorAll(`select`);
        selectName.forEach(element => {
            element.addEventListener('blur', (e) => {
                const element = e.target;
                validateSelect(element);
                validateFormFinal();
            });
        });
        const inputAttach = form.querySelector(`.inputAttach`);
        inputAttach.addEventListener('change', (e) => {
            return fileValidation(inputAttach.id);
        });
        const inputAddInvoie = form.querySelector(`#addInvoice_yes`);
        inputAddInvoie.addEventListener('change', (e) => {
            form.querySelector(`.content-attach-file`).classList.add('show');
            form.querySelector(`.content-attach-file`).classList.remove('hidden');
            validateFormFinal();
            if (document.querySelector(`.btnCleanFile`) !== null) {
                document.querySelector(`.btnCleanFile`).click();
            }
            calculate_total();
        });
        const inputInvoieNo = form.querySelector(`#addInvoice_no`);
        inputInvoieNo.addEventListener('change', (e) => {
            form.querySelector(`.content-attach-file`).classList.remove('show');
            form.querySelector(`.content-attach-file`).classList.add('hidden');
            validateFormFinal();
            calculate_total();
        });
        const selectCountries = form.querySelector(`#country`);
        selectCountries.addEventListener('change', (e) => {
            if (selectCountries.value !== "") {
                //getTowns(selectStates.value);
                getStates(selectCountries.value);
            } else {
            }

        });
        const checkAviso = document.querySelector(`#checkAviso`);
        checkAviso.addEventListener('change', (e) => {
            validateFormFinal();
        });
        const optionsPayment = document.querySelector(`#optionsPayment`);
        optionsPayment.addEventListener('change', (e) => {
            clean_openpay_tdc();
            if (optionsPayment.value !== "") {
                if (optionsPayment.value == "1") {
                    document.querySelector(`#content_openpay_tdc`).removeAttribute("hidden");
                }
            }
            calculate_total();
            validateFormFinal();
        });

        const inputtel = document.querySelector(`#telwhat`);
        inputtel.addEventListener('keypress', (e) => {
            if (!validateTel(e)) {
                e.preventDefault();
            }
        });

        const avatarImg = document.querySelector(`img#avatar`) || null;
        if (avatarImg !== null) {
            avatarImg.addEventListener('click', () => {
                avatarImg.src.includes('data:image') ?
                    btnDeleteImg.style.display = "block" : btnDeleteImg.style.display = "none";
                import(`/modules/mod_buycarform/tmpl/assets/js/init_cropper.js?v=${new Date().getTime()}`)
                    .then(response => {
                        const { initCropperJs } = response;
                        initCropperJs(avatarImg);
                    })
                    .catch(error => {
                        console.log(error);
                    });
            });
        }
    });
    window.addEventListener('load', () => {
        initfun();
    });
})()