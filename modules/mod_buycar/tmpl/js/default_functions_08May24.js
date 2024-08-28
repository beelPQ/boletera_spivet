
let valuePhone;
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

/** Método para envío asíncrono de datos a través de formulario
 * 
 * @param {*} uri : url a donde apuntar la petición
 * @param {*} method : Método HTTP para la petición
 * @param {*} type : Tipo de respuesta. json o text
 * @param {*} formData : Objeto con los datos enviados a través de los formularios
 * @returns 
*/
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

let nErrors = 0;
let corusesItemsList = 0;
let nErrosStep3 = 0;

let finalStep1 = 1;
let finalStep2 = 1;
let finalStep3 = 1;


$(document).ready(function () {
    $('#typeFilter').multiselect();

    $('#typeFilterMovil').multiselect();
    //getListServices();
    //sessionStorage.setItem("numItems", 6);
});

const formatMoney = (quantity) => {
    return new Intl.NumberFormat('en-Latn-US', {
        style: "currency",
        currency: "USD",
        maximumFractionDigits: 2,
    }).format(quantity);
}

const movTopScroll = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}


const btnSumPayChange = (mode) => {

    if (document.querySelector('#label-deploySumPay' + mode).innerHTML == 'Ver') {
        document.querySelector('#label-deploySumPay' + mode).innerHTML = 'Cerrar';
        //document.querySelector('#label-deploySumPay').style.marginLeft='15px';
    } else {
        document.querySelector('#label-deploySumPay' + mode).innerHTML = 'Ver';
        //document.querySelector('#label-deploySumPay').style.marginLeft='30px';
    }

}


const setLocalVars = () => {
    /* if(localStorage.getItem("otherView") && localStorage.getItem("otherView") == "true"){
        //alert('es redirigido')
        getPreviousProducts();
    } */

    if (localStorage.getItem("nextView") && localStorage.getItem("nextView") == 1 || localStorage.getItem("otherView") && localStorage.getItem("otherView") == "true") {
        localStorage.setItem("amount", localStorage.getItem("subtotal"));
        getPreviousProducts();
        //localStorage.removeItem("nextView");
    } else {
        localStorage.removeItem("userData");
        localStorage.setItem("moneda", "MXN");
        localStorage.setItem("amount", 0);
        localStorage.setItem("subtotal", 0);
        let cart_products = [];
        localStorage.setItem("cart_products", JSON.stringify(cart_products));
    }

    /*
    console.log( localStorage.getItem("cart_products") );
 
    // Retrieved array
    let retArray = JSON.parse(localStorage.getItem("cart_products"));
    console.log(retArray);
    console.log(retArray.length);
 
    let producto = {id:'1',name:'aaa'}
    retArray.push(producto);
 
    console.log(retArray)
 
    localStorage.setItem("cart_products", JSON.stringify(retArray));
 
    retArray = JSON.parse(localStorage.getItem("cart_products"));
    producto = {id:'2',name:'bbb'}
    retArray.push(producto);
 
    console.log(retArray)
 
    localStorage.setItem("cart_products", JSON.stringify(retArray));
 
    retArray = JSON.parse(localStorage.getItem("cart_products"));
 
    retArray.splice(1, 1)
 
    console.log(retArray)
 
    localStorage.setItem("cart_products", JSON.stringify(retArray));
    */


}


const getPreviousProducts = () => {

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

        //Actualizamos los carritos movil y de escritorio con el nuevo item 
        let contentsListItems = document.querySelectorAll('.contentItemsPayment');
        contentsListItems.forEach(function (contentItem) {
            let currentItems = contentItem.innerHTML;
            currentItems += itemProduct;
            contentItem.innerHTML = currentItems;
        });

        if (localStorage.getItem("subtotal")) {
            let currentSubTotal = parseFloat(localStorage.getItem("subtotal"));

            let labelsSubTotal = document.querySelectorAll('.label-subtotal');
            labelsSubTotal.forEach(function (lblsubtotal) {
                lblsubtotal.innerHTML = formatMoney(currentSubTotal);
            });
        }




        //Actualizmos todos los inputs o labels que muestran la suma total 
        if (localStorage.getItem("amount")) {
            let currentTotal = parseFloat(localStorage.getItem("amount"));

            let labelsTotal = document.querySelectorAll('.label-total');
            labelsTotal.forEach(function (lbltotal) {
                lbltotal.innerHTML = formatMoney(currentTotal);
            });
        }

        setTimeout(() => {
            if (localStorage.getItem("cart_products")) {
                let products = JSON.parse(localStorage.getItem("cart_products"));
                let countersItems = document.querySelectorAll('.counterItems');
                countersItems.forEach(element => {
                    element.innerHTML = products.length;
                });
                calculate_total();
            }
        }, 500);
    }
}


const getAllProducts = (selectFilter = "", inputFilter = "", statusBtn = "", limit = 0, origin = "") => {

    let frmData = new FormData();
    frmData.append('select', selectFilter);
    frmData.append('input', inputFilter);
    frmData.append('method', 'getProducts');
    if (limit != 0) {
        frmData.append('limit', limit);
    } else {
        frmData.append('limit', "not_limit");
    }
    frmData.append('code', 1);

    //Agregamos skeleton a tarjetas 
    const itemsCards = document.querySelectorAll(`.card__gt`);
    itemsCards.forEach(element => {
        element.classList.add("skeleton-loader");
    });
    //asycData(`/modules/mod_buycar/tmpl/requests/request_queries.php`, 'POST', 'json', frmData)
    setTimeout(() => {

        asycData(`/modules/mod_buycar/tmpl/controllers/queries.php`, 'POST', 'json', frmData)
            .then((response) => {
                if (response.status_code == 200) {
                    let path = window.location.origin;
                    let arrayProducts = response.products;
                    let arrayProductsAll = response.productsAll;

                    let listProducts = ``;
                    let listProductsMovil = ``;
                    let sessionProductList = ``;

                    if (localStorage.getItem(`cart_products`) && JSON.parse(localStorage.getItem(`cart_products`)).length > 0) {
                        sessionProductList = JSON.parse(localStorage.getItem(`cart_products`));
                    }


                    if (selectFilter == '' && inputFilter == '') {
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
                        //Actualizamos los carritos movil y de escritorio con el nuevo item 
                        let contentsListItems = document.querySelectorAll('.contentItemsPayment');
                        contentsListItems.forEach(function (contentItem) {
                            contentItem.innerHTML = '';
                        });
                        getPreviousProducts();
                    }
                    //se muestran las card de los productos que estan publicados
                    arrayProducts.forEach(function (product) {
                        if (product.catalogo_productos_publicado == 1) {
                            let buttonStatus = '';
                            let buttonActive = '';
                            let buttonAnimation = 'btn-animation';
                            let textButton = `Agregar al carrito`;
                            let classFinal = ``;
                            /* if(localStorage.getItem(`otherView`) ){
                                sessionProductList.forEach(element => {
                                    if(element.code == product.code){
                                        buttonStatus = `disabled`;
                                        buttonActive = `style="opacity: 0.7;"`;
                                        buttonAnimation = ''
                                    }
                                });
                            } */
                            if (localStorage.getItem(`cart_products`) && JSON.parse(localStorage.getItem(`cart_products`)).length > 0) {
                                sessionProductList.forEach(element => {
                                    if (element.code == product.code) {
                                        buttonStatus = `disabled`;
                                        buttonActive = `style="opacity: 0.7;"`;
                                        buttonAnimation = ''
                                        textButton = "Agregado";
                                        classFinal = `btn-curso-not-available`;
                                    }
                                });
                            }
                            if (Date.parse(product.catalogo_productos_fechainicio) < Date.parse(product.currentDate)) {
                                buttonStatus = `disabled`;
                                buttonActive = `style="opacity: 0.7;"`;
                                buttonAnimation = ''
                                textButton = "Curso no habilitado"
                                classFinal = `btn-curso-not-available`;
                            }
                            let labelPrice = `<span>${formatMoney(product.catalogo_productos_preciomx)} MXN</span>`;
                            let pricemxn = product.pricemxn;
                            if (parseFloat(product.pricemxn_discount) > 0) {
                                labelPrice = `<s>${formatMoney(product.catalogo_productos_preciomx)} MXN</s> <span>${formatMoney(product.catalogo_productos_preciomx_descuento)} MXN</span>`;
                                pricemxn = product.pricemxn_discount;
                            }

                            let btnAdd = `<button type="button" class="btnAdd btnPrimary btnSize1 btnWeight1 btnRadius1 ${buttonAnimation} ${classFinal}" 
                    data-code="${product.code}" data-name="${product.catalogo_productos_nombre}" data-pricemxn="${pricemxn}" 
                    data-priceusd="0" data-modality="${product.modality}" ${buttonStatus} ${buttonActive} >${textButton}</button>`;
                            if (product.catalogo_productos_stock <= 0) {
                                btnAdd = `<button type="button" class="btnRed btnSize1 btnWeight1 btnRadius1" style="cursor:not-allowed;" >Agotado</button>`;
                            }
                            let image = '';
                            if (product.catalogo_productos_file_thumb === "") {
                                image = '/images/common/thumb.png';
                            } else {
                                if (product.catalogo_productos_file_thumb.includes(",")) {
                                    let partName = product.catalogo_productos_file_thumb.split(",");
                                    image = partName[0];
                                } else {
                                    image = product.catalogo_productos_file_thumb;
                                }
                            }
                            let nameProduct = "";
                            if (product.catalogo_productos_nombre != "") {
                                nameProduct = product.catalogo_productos_nombre.replace(/\s+/g, "_");
                            }
                            listProducts += `
                        <div class="card__gt " id="card_${product.catalogo_productos_sku}">
                            <div class="card__gt__slider_image">
                                <img class="imgFile" src="${image}">
                            </div>
                            <div class="card__gt__content" >
                                 <div class="card__gt__stock" >
                                    ${product.stock}
                                 </div>
                                <div class="card__gt__amountPrice" >
                                    ${labelPrice}
                                </div>
                                <div class="card__gt__details" >
                                    <div class="card__gt__details__name" >
                                        <a target="_blank" href="${path}/oferta/?oferta=${product.modality}-${product.idsystemcatpro}-${nameProduct}">
                                            ${product.catalogo_productos_nombre}
                                        </a>
                                    </div>
                                    <div class="card__gt__details__prices" >${product.fecha}</div>
                                    <div class="card__gt__details__description" >
                                        ${product.descripcion}...
                                        <a target="_blank" href="${path}/oferta/?oferta=${product.modality}-${product.idsystemcatpro}-${nameProduct}">MÁS INFO</a>
                                    </div>
                                </div>
                                <div class="card__gt__modal" align="right">
                                    ${btnAdd}
                                </div>
                            </div>
                        </div>
                    `;
                            listProductsMovil += `
                    <div class="content-course">
                        <div class="course-info flex flex-col">
                            <div class="course-info-name" >
                                <a target="_blank" href="${path}/oferta/?oferta=${product.modality}-${product.idsystemcatpro}-${nameProduct}">
                                    ${product.catalogo_productos_nombre}
                                </a>    
                            </div>
                            <div class="course-info-date" >${product.fecha}</div>
                            <div class="course-info-description" >
                                ${product.descripcion}...
                                <a target="_blank" href="${path}/oferta/?oferta=${product.modality}-${product.idsystemcatpro}-${nameProduct}">
                                   MÁS INFO
                                </a>
                            </div>
                            <div class="course-info-stock" >
                                ${product.stock}
                            </div>
                            <div class="course-info-amountPrice" >
                                ${labelPrice}
                            </div>
                            <div class="course-info-button" align="center">
                                ${btnAdd}
                            </div>
                        </div> 
                    </div>
                    `;
                        }
                    })
                    //document.querySelector("#contentProducts").innerHTML = listProducts;
                    //document.querySelector(".content-cards-courses").innerHTML = listProductsMovil;
                    if (arrayProducts.length > 0) {
                        document.querySelector("#contentProducts").innerHTML = listProducts;
                        document.querySelector(".content-cards-courses").innerHTML = listProductsMovil;
                    } else {
                        document.querySelector("#contentProducts").innerHTML = `<h5>No se han encontrado resultados para tu búsqueda.</h5>`;
                        document.querySelector(".content-cards-courses").innerHTML = `<h5>No se han encontrado resultados para tu búsqueda.</h5>`;
                    }

                    setTimeout(() => {
                        if (document.querySelector(`.spinner`)) {
                            document.querySelector(`.spinner`).style.display = "none";
                        }
                    }, 800);
                    /*
                    $("#loader").hide();
                    
                    var done = function (url) {
                        input.value = '';
                        image.src = url;
        
                        modal.modal('show');
                    };
                    var reader;
                    var file;
                    var url;
                    if (files && files.length > 0) {
                        file = files[0];
                        attachedPhoto = files[0]; //variable global en listeners.js
                        if (URL) {
                            done(URL.createObjectURL(file));
                        } else if (FileReader) {
                            reader = new FileReader();
                            reader.onload = function (e) {
                                done(reader.result);
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                    */
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
                    },
                })
                return false;
            });
    }, 1000);
}


const verifyProductInCart = (code) => {
    let currentListCart = JSON.parse(localStorage.getItem("cart_products"));
    let isInCart = 0;
    currentListCart.every(function (item) {
        if (item.code == code) {
            isInCart = 1;
            return false;
        } else {
            return true;
        }
    })
    return isInCart;
}

const addItem = (code, name, pricemxn, priceusd, typeItem, modality) => {
    //si se agrega un producto, marcamos como selecionado
    if (typeItem == 'Product') {
        const btnsAddProducts = document.querySelectorAll('.btnAdd');
        if (btnsAddProducts.length > 0) {
            btnsAddProducts.forEach(function (btnAdd) {
                if (btnAdd.dataset.code == code) {
                    btnAdd.innerText = "Seleccionado";
                    btnAdd.setAttribute("disabled", "");
                    btnAdd.style.opacity = 0.7;
                    btnAdd.classList.remove('btn-animation')
                    btnAdd.classList.add('btn-curso-not-available')
                    btnAdd.innerHTML = "Agregado"
                }
            });
        }
    }

    const rec = /,/gi
    pricemxn = pricemxn.replace(rec, '');
    priceusd = priceusd.replace(rec, '');
    //Preparamos el renglon del nuevo item que se va a sumar al carrito 
    pricemxn = parseFloat(pricemxn);
    priceusd = parseFloat(priceusd);
    let currency = localStorage.getItem("moneda");
    let price;
    if (currency == 'USD') {
        price = priceusd;
    } else {
        price = pricemxn;
    }
    let newItem = `
        <div class="rowItemPayment ${typeItem}">
            <div class="itemPayment_name"><span class="concept_pay">${name}</span><br><span class="delete${typeItem}" data-code="${code}" data-pricemxn="${pricemxn}" data-priceusd="${priceusd}" >Eliminar</span></div>
            <div class="itemPayment_price"><span class="label-currency">${currency}<span> <span class="label-price" data-pricemxn="${formatMoney(pricemxn)}" data-priceusd="${formatMoney(priceusd)}" >${formatMoney(price)}</span></div>
        </div>
    `;

    //Actualizamos los carritos movil y de escritorio con el nuevo item 
    let contentsListItems = document.querySelectorAll('.contentItemsPayment');
    contentsListItems.forEach(function (contentItem) {
        let currentItems = contentItem.innerHTML;
        currentItems += newItem;
        contentItem.innerHTML = currentItems;
    });
    //Actualizmos todos los inputs o labels que muestran el subtotal 
    let currentSubTotal = parseFloat(localStorage.getItem("subtotal"));
    currentSubTotal = currentSubTotal + price;
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
    currentTotal = currentTotal + price;
    //currentTotalMXN = currentTotalMXN + pricemxn;
    //currentTotalUSD = currentTotalUSD + priceusd;
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

    //Actualizamos el contador de items(movil y desk)
    /* let countersItems = document.querySelectorAll('.counterItems');
    countersItems.forEach(function(counterItems) {
        let currentCounter = parseInt(counterItems.innerHTML);
        currentCounter = currentCounter + 1;
        counterItems.innerHTML = currentCounter;
    }); */


    //si se agrega un producto, actualizamos el la variable que guarda la lista del carrito
    if (typeItem == 'Product') {
        let currentListCart = JSON.parse(localStorage.getItem("cart_products"));
        let newProduct = { code: code, name: name, pricemxn: pricemxn, priceusd: priceusd, typeItem: typeItem, modality: modality }
        currentListCart.push(newProduct);
        localStorage.setItem("cart_products", JSON.stringify(currentListCart));
    }
    setTimeout(() => {
        if (localStorage.getItem("cart_products")) {
            let products = JSON.parse(localStorage.getItem("cart_products"));
            let countersItems = document.querySelectorAll('.counterItems');
            countersItems.forEach(element => {
                element.innerHTML = products.length;
            });
        }
    }, 500);
    refreshStatusCollapseOne();
    verifyFormPayIsRequired();

    setTimeout(() => {
        //recalculamos los totales
        let condescuento = document.querySelector('#descuento_aplicado').value;
        if (condescuento != "") {
            calculate_cupon();
        } else {
            calculate_total();
        }
    }, 200);
}

const refreshStatusCollapseOne = () => {
    //cambiamos el semaforo del primer collapse cuando 
    //por lo menos hay un servicio seleccionado
    setTimeout(() => {
        if (localStorage.getItem("cart_products")) {
            const jsonCard = JSON.parse(localStorage.getItem("cart_products"));
            const status = document.querySelector(`.status-selected-course`);
            if (jsonCard.length > 0) {
                corusesItemsList = 1;
                status.classList.remove("status-section-unfinished");
                status.classList.add("status-section-final");
                finalStep1 = 0;
                validateStepsComplete();
            } else {
                corusesItemsList = 0;
                status.classList.add("status-section-unfinished");
                status.classList.remove("status-section-final");
                finalStep1 = 1;
                validateStepsComplete();
            }
        }
    }, 500);
}

const refreshStatusCollapseTwo = () => {
    let errors = 0;
    const form = document.querySelector(`#formPaymentCourses`);
    const inputs = form.querySelectorAll(`input`);
    const inputInvoiceYes = form.querySelector(`#addInvoice_yes`);
    const select = form.querySelectorAll(`select`);
    inputs.forEach(element => {
        if (element.value == "" || element.classList.contains(`is-invalid`)) {
            /*  if(element.id === "inputConsFiscal"){
                 if(inputInvoiceYes.checked ){
                     errors ++
                 }
             }else{ */
            errors++;
            /* } */
        }
    });

    select.forEach(element => {
        if (element.value == "" || element.classList.contains(`is-invalid`)) {
            errors++;
        }
    });
    return errors;
}


const deleteProduct = (btnDelPro) => {
    /*
    //quitamos la comision del total
    delete_commission();
    //borramos descuento
    let inputscupon = document.querySelectorAll('.input-cupon');
    inputscupon.forEach(function(inputcupon) {
        inputcupon.removeAttribute("disabled");
        inputcupon.value = '';
    });
    let btnscupon = document.querySelectorAll('.btn-cupon');
    btnscupon.forEach(function(btncupon) {
        btncupon.removeAttribute("hidden");
    });
    delete_discount();
    if( document.querySelector('#addInvoice_yes') ) {
        if(document.querySelector('#addInvoice_yes').checked) delete_iva();
    }
    */
    pricemxn = parseFloat(btnDelPro.dataset.pricemxn);
    priceusd = parseFloat(btnDelPro.dataset.priceusd);
    let currency = localStorage.getItem("moneda");
    let price;
    if (currency == 'USD') {
        price = priceusd;
    } else {
        price = pricemxn;
    }
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
            btnAdd.classList.add('btn-animation');
            btnAdd.classList.remove("btn-curso-not-available");
        }
    });

    //Actualizamos el contador de items(movil y desk)
    /* let countersItems = document.querySelectorAll('.counterItems');
    countersItems.forEach(function(counterItems) {
        let currentCounter = parseInt(counterItems.innerHTML);
        currentCounter = currentCounter - 1;
        counterItems.innerHTML = currentCounter;
    }); */

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

    if (localStorage.getItem("nextView")) {
        localStorage.removeItem("nextView");
    }

    setTimeout(() => {
        if (localStorage.getItem("cart_products")) {
            let products = JSON.parse(localStorage.getItem("cart_products"));
            let countersItems = document.querySelectorAll('.counterItems');
            countersItems.forEach(element => {
                element.innerHTML = products.length;
            });
        }
    }, 500);

    /*
    if( document.querySelector('#addInvoice_yes') ){
        if(document.querySelector('#addInvoice_yes').checked ) calculate_iva(); 
    }
    //si estamos en el paso 3, verificamos que en caso de solo quedar hospedaje, la forma de pago de paypal no este disponible
    if(document.querySelector('#currentStepText').innerHTML=='PASO 3'){
        if( parseFloat( document.querySelector('#preciobase').value )<=0 && parseFloat( document.querySelector('#totalHospedaje').value )>0 ){
            //si la forma de pago seleccionada era paypal, limpiamos todos los campos que hacen uso de paypal
            if(document.querySelector('#select_formapago').value=='1' || document.querySelector('#select_formapago').value==1 ){
                document.querySelector('#select_formapago').value='----';
                document.querySelector('#paypal-button-container').innerHTML='';
                $('#paypal-button-container').hide();
                let payButtons = document.querySelectorAll('.contentPayButton');
                payButtons.forEach(function(payButton) {
                    payButton.removeAttribute("hidden")
                });
            }
            //quitamos la opcion de pago de paypal
            if( document.querySelector('#formpay_1')!==null){
                document.querySelector('#formpay_1').setAttribute("hidden", "");
            }
        }
    }
    //recalculamos comision en caso de haber una forma de pago seleccionada
    if(document.querySelector('#select_formapago').value!='----'){
        calculate_commission();
    }
    //si ya no hay productos en el carrito, obligamos al usuario a regresar al paso 1
    if(document.querySelector('#currentStepText').innerHTML!='PASO 1'){
        if(parseFloat(document.querySelector('#preciobase').value)<=0 && parseFloat(document.querySelector('#totalHospedaje').value)<=0 ){
            showStep1();
        }
    }
    */
    refreshStatusCollapseOne();
    //si se borraron todos los productos del carrito
    if ((localStorage.getItem(`cart_products`) && JSON.parse(localStorage.getItem(`cart_products`)).length <= 0) || (localStorage.getItem(`subtotal`) && parseFloat(localStorage.getItem(`subtotal`)) <= 0)) {
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

    //setTimeout(() => {
    //console.log('osv_asfdsfre');
    //verificamos si es necesaria la forma de pago
    verifyFormPayIsRequired();
    //}, 1000);
    setTimeout(() => {
        //recalculamos los totales
        let condescuento = document.querySelector('#descuento_aplicado').value;
        if (condescuento != "") {
            calculate_cupon();
        } else {
            calculate_total();
        }
    }, 200);
}

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
    asycData(`/modules/mod_buycarform/tmpl/model/buyCarForm.php`, `POST`, `json`, formData)
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
    //alert("hola");
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
 * *Funcion que se encarga de obtener todos los metodos de pago
 * Crea las opciones del select de metodos de pago
 */
const getOptionsPayment = () => {
    let formData = new FormData();
    formData.append("method", "paymentMethods")
    asycData(`/modules/mod_buycarform/tmpl/model/buyCarForm.php`, `POST`, `json`, formData)
        .then((result) => {
            if (result.status) {
                let options = ``;
                options += `<option value="no_selected" disabled selected>Seleccionar</option>`;
                result.data.forEach(element => {
                    options += `<option value="${element.id}">${element.namePayment}</option>`;
                });
                document.querySelector(`#optionsPayment`).innerHTML = options;
                document.querySelector(`#optionsPayment`).removeAttribute("disabled");
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
    setTimeout(() => {
        valuePhone = window.intlTelInput(inputPhone, {
            preferredCountries: ['mx', 'us'],
            //utilsScript: "/modules/mod_buycarform/tmpl/plugin/js/utils.js",
        });
    }, 200);
}

/**
 * *Funcion que obtiene todos los municipios 
 * @param {int} idState Id del estado
 */
const getTowns = (idState) => {
    let formData = new FormData();
    formData.append("method", "getTowns");
    formData.append("idState", idState);
    asycData(`/modules/mod_buycarform/tmpl/model/buyCarForm.php`, `POST`, `json`, formData)
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
 * *Valida que todos los campos del formulario del paso 2 esten correctos
 * En caso contrario crea un variable de errores la cual nos ayuda a validar
 * cuando el usuario quiere cambiar al paso 3
 */
const validateFormDataPersonStatus = () => {
    const form = document.querySelector(`#formPaymentCourses`);
    const inputName = form.querySelectorAll(`input`);
    const selectName = form.querySelectorAll(`select`);
    let noErrors = 0;
    inputName.forEach(element => {
        if (element.value.trim() != "" && !element.classList.contains("is-invalid")) {
        } else {
            noErrors++;
        }
    });
    selectName.forEach(element => {
        if (element.value.trim() == "" || element.value == "no_selected" /* && !element.classList.contains("is-invalid") */) {
            noErrors++;
        }
    });
    //modificamos el status del fomulario cambiando el icono de la parte susperior
    const statusForm = document.querySelector(`.status-form`);
    if (noErrors === 0) {
        statusForm.classList.remove(`status-section-unfinished`);
        statusForm.classList.add(`status-section-final`);
        finalStep2 = 0;
        validateStepsComplete();
    } else {
        statusForm.classList.add(`status-section-unfinished`);
        statusForm.classList.remove(`status-section-final`);
        finalStep2 = 1;
        validateStepsComplete();
    }
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
                    nErrors++;
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
                    nErrors++;
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
        { select: "state", messageVacio: "Estado requerido" },
        { select: "towns", messageVacio: "Municipio requerido" }];
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


const showErrors = () => {
    const form = document.querySelector(`#formPaymentCourses`);
    const inputs = form.querySelectorAll(`input`);
    const selects = form.querySelectorAll(`select`);
    inputs.forEach(element => validateInput(element));
    selects.forEach(element => validateSelect(element));
}

/**
 * *Funcion que valida el tipo de archivo adjuntado
 * @param {input} idFile input file element
 * @returns boolean
 */
const fileValidation = (idFile) => {
    let fileInput = document.querySelector('#' + idFile);
    let filePath = fileInput.value;
    let allowedExtensions = new RegExp(fileInput.dataset.regularext, 'i');
    if (!allowedExtensions.exec(filePath)) {
        fileInput.value = '';
        document.querySelector('#delete_' + idFile).value = '';
        document.querySelector('#delete_' + idFile).setAttribute("hidden", "");
        Swal.fire({
            title: 'Adjunto no aceptable',
            html: 'Solo se permiten archivos con la extencion .' + fileInput.dataset.extensions,
            icon: 'warning',
            confirmButtonText: 'Cerrar',
            customClass: { confirmButton: 'confirm-btn-alert' },
        });
        finalStep3 = 1;
        validateStepsComplete();
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
                        title: 'Oops',
                        html: 'El tamaño máximo admitido es de ' + fileInput.dataset.maxsizemb + 'MB',
                        icon: 'info',
                        confirmButtonText: 'Cerrar',
                        customClass: { confirmButton: 'confirm-btn-alert' },
                    });
                    //finalStep3 = 1;
                    //validateStepsComplete();
                    validateStep3();
                    return false;
                } else {
                    document.querySelector('#delete_' + idFile).innerHTML = fileInput.value.split('\\').pop() + '<img data-idfile="' + idFile + '" class="btnCleanFile" src="/modules/mod_buycarform/tmpl/assets/img/icons/icon_delete_file.svg">';
                    document.querySelector('#delete_' + idFile).removeAttribute("hidden");
                    //finalStep3 = 0;
                    //validateStepsComplete();
                    validateStep3();
                }
            }
        }
    }
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

/**
 **Funcion encargada de obtener los servicios que coincidan con los filtros aplicados
 * @param {string} selectFilter tipo de filtro del select
 * @param {string} inputFilter texto del input de filtro
 * ?usado en filtros input, select, button
 */
const getServicesFilter = (selectFilter, inputFilter, statusBtn = "", limit = 0, origin = "") => {
    let frmData = new FormData();
    frmData.append('select', selectFilter);
    frmData.append('input', inputFilter);
    frmData.append('method', 'getFilters');
    if (limit != 0) {
        frmData.append('limit', limit);
    } else {
        frmData.append('limit', "not_limit");
    }
    asyncData(`/modules/mod_buycar/tmpl/controllers/queries.php`, `POST`, `json`, frmData)
        .then((result) => {
            if (result.status) {
                let cardService = ``;
                result.data.forEach(element => {
                    /* cardService += `
                    <div class="card-service flex">
                        <div class="card-service-image">
                            <img src="/modules/mod_services_page/tmpl/assets/img/bg_card.png" alt="">
                        </div>
                        <div class="card-service-info flex">
                            <div class="card-service-info-title"> 
                                ${element.nameService}
                            </div>
                            <div class="card-service-info-description"> 
                                ${element.descriptionService}
                            </div>
                            <div class="card-service-info-button">
                                <button id="">Solicitar servicio</button>
                            </div>
                        </div>
                    </div>
                    `; */
                });
                document.querySelector(`#contentCardsServices`).innerHTML = cardService;
                if (origin === "init") {

                    if (sessionStorage.getItem("numItems")) {
                        if (result.data.length < parseInt(sessionStorage.getItem("numItems"))) {
                            document.querySelector(`#btnShowItems`).style.display = "none";
                        }
                    }
                }
            } else {
                console.error(result);
            }
        }).catch((err) => {
            console.error(err);
        });
}

/**
 * *Funcion encargada de obtener las categorias para los Multiselect
 * obtiene la informacion e inicializa el componente multiselect
 * Descktop y Movil
 */
const getCategories = () => {
    let formData = new FormData();
    formData.append("method", "getCategories")
    asycData(`/modules/mod_buycar/tmpl/controllers/queries.php`, `POST`, `json`, formData)
        .then((result) => {
            if (result.status) {
                let selectDescktop = `<select id="typeFilterDesktop" class="input-select" multiple="multiple">`;
                let selectMovil = `<select id="typeFilterMovil" class="input-select" multiple="multiple">`;
                let categories = ``;
                result.data.forEach(element => {
                    categories += `<option value="${element.id}">${element.nameCategory}</option>`;
                });
                selectDescktop += `${categories}</select>`;
                selectMovil += `${categories}</select>`;
                //seteamos la estructura de todo el multiselect al div que lo contendra     DESKTOP
                document.querySelector(`#contentSelectDesktop`).innerHTML = selectDescktop;
                const inputSearchDesktop = document.querySelector(`#txtSearchDesktop`);
                //seteamos la estructura de todo el multiselect al div que lo contendra    MOVIL
                document.querySelector(`#contentSelectMovil`).innerHTML = selectMovil;
                const inputSearchMovil = document.querySelector(`#txtSearchMovil`);
                //inicializamos el componente multiselect Deskotop
                $('#typeFilterDesktop').multiselect({
                    nonSelectedText: 'FILTRAR POR',
                    onChange: function (option, checked, select) {
                        const selectedFilter = [...$("#typeFilterDesktop :selected")].map(e => e.value);
                        if (selectedFilter != "") {
                            //alert(`se ejecuta esta parte de la aplicacion`)
                            getAllProducts(selectedFilter, inputSearchDesktop.value, '', 0, "init");
                            document.querySelector(`#btnViewProducts`).style.display = "none";
                        } else {
                            //alert(`el filtro va vacio`)
                            getAllProducts(selectedFilter, inputSearchDesktop.value, 'Activo', 3, "init");
                            document.querySelector(`#btnViewProducts`).style.display = "block";
                            //sessionStorage.setItem("numItems", 6);
                        }
                    }
                });
                //inicializamos el componente multiselect movil
                $('#typeFilterMovil').multiselect({
                    nonSelectedText: 'FILTRAR POR',
                    onChange: function (option, checked, select) {
                        const selectedFilter = [...$("#typeFilterMovil :selected")].map(e => e.value);
                        if (selectedFilter != "") {
                            //alert(`se ejecuta esta parte de la aplicacion`)
                            getAllProducts(selectedFilter, inputSearchMovil.value, '', 0, "init");
                            document.querySelector(`#btnViewProductsMovil`).style.display = "none";
                        } else {
                            getAllProducts(selectedFilter, inputSearchMovil.value, 'Activo', 3, "init");
                            document.querySelector(`#btnViewProductsMovil`).style.display = "block";
                            //sessionStorage.setItem("numItems", 6);
                        }
                    }
                });
            }
        }).catch((err) => {
            console.error(err)
        });
}

/**
 * TODO esta funcion es nueva revisar, es llamda en los eventos de los check de factura, select de metodos de pago y en la funcion que valida el file
 * *Funcion que valida que los campos del formulario 3 esten llenos
 */
const validateStep3 = () => {
    const form3 = document.querySelector(`#formDataPayment`);
    const selectPaymentMethod = form3.querySelector(`#optionsPayment`);
    const checkInvoiceYes = form3.querySelector(`#addInvoice_yes`);
    const checkInvoiceNo = form3.querySelector(`#addInvoice_no`);
    const inputFile = form3.querySelector(`#inputConsFiscal`);
    const button = document.querySelector(`#collapPaymentFinal`);
    const statusStep3 = button.querySelector(`.status-form`);
    if (selectPaymentMethod.value !== "no_selected") {
        if (checkInvoiceNo.checked) {
            if (statusStep3.classList.contains('status-section-unfinished')) {
                statusStep3.classList.add("status-section-final");
                statusStep3.classList.remove("status-section-unfinished");
                nErrosStep3 = 0;
                finalStep3 = 0;
                validateStepsComplete();
            }
        } else if (checkInvoiceYes.checked) {
            if (inputFile.value !== "") {
                if (statusStep3.classList.contains('status-section-unfinished')) {
                    statusStep3.classList.add("status-section-final");
                    statusStep3.classList.remove("status-section-unfinished");
                    nErrosStep3 = 0;
                    finalStep3 = 0;
                    validateStepsComplete();
                }
            } else {
                if (statusStep3.classList.contains('status-section-final')) {
                    statusStep3.classList.remove("status-section-final");
                    statusStep3.classList.add("status-section-unfinished");

                    nErrosStep3++;
                    finalStep3 = 1;
                    validateStepsComplete();
                }
            }
        }
        deleteMsgError(selectPaymentMethod);
    } else {
        createMsgError(selectPaymentMethod, "Favor de seleccionar una metodo de pago");
        finalStep3 = 1;
    }
}


const validateStepsComplete = () => {
    if (finalStep1 === 0 && finalStep2 === 0 && finalStep3 === 0) {
        document.querySelector(`.btn-payment-movil`).classList.remove("btn-disabled");
        document.querySelector(`.btn-payment-movil`).disabled = false;
    } else {
        if (!document.querySelector(`.btn-payment-movil`).classList.contains("btn-disabled")) {
            document.querySelector(`.btn-payment-movil`).classList.add("btn-disabled");
        }
        document.querySelector(`.btn-payment-movil`).disabled = true;
    }
}

