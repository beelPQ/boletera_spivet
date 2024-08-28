const messgaeView = (icon = "succes", title = "", message = "", textButton = "Aceptar", redirect = "not_redirect") => {
    Swal.fire({
        icon: icon,
        title: title,
        html: message,
        confirmButtonText: textButton,
        customClass: {
            confirmButton: 'confirm-btn-alert',
            denyButton: 'deny-btn-alert',
            cancelButton: 'cancel-btn-alert',
        },
    });
}

const getDataFormClient = (type = "") => {
    let objectData = {};
    let formPayment = "";
    if (type == "Desktop") {
        formPayment = document.querySelector(`#formDataPayment`);
    }
    if (type == "Movil") {
        formPayment = document.querySelector(`#formPaymentCourses`);
    }
    let nameClient = formPayment.querySelector("#name").value || "";
    let lastName1 = formPayment.querySelector("#lastname1").value || "";
    let lastName2 = formPayment.querySelector("#lastname2").value || "";
    let email = formPayment.querySelector("#email").value || "";
    let phoneNumber = formPayment.querySelector("#telwhat").value || "";
    let postlaCode = formPayment.querySelector("#cp").value || "";
    //let state = formPayment.querySelector("#state").value || "";
    //let town = formPayment.querySelector("#towns").value || "";
    let country = formPayment.querySelector("#country").value || "";
    let state = formPayment.querySelector("#state").value || "";
    let localLada = formPayment.querySelector(".iti__selected-flag");
    let arrayLada = localLada.title.split(":");
    let lada = arrayLada[1].trim();


    objectData.name = nameClient;
    objectData.lastName1 = lastName1;
    objectData.lastName2 = lastName2;
    objectData.email = email;
    objectData.phoneNumber = phoneNumber;
    objectData.postlaCode = postlaCode;
    objectData.state = state;
    //objectData.town = town; 
    objectData.country = country;
    objectData.state = state;
    objectData.lada = lada;

    objectData.photo = document.querySelector("img#avatar").src;
    return objectData;
}
const getDataAmounts = () => {
    let objectData = {};
    if (localStorage.getItem("amount"))
        objectData.amountTotal = localStorage.getItem("amount") || 0.0;
    if (localStorage.getItem("subtotal"))
        objectData.amountSubtotal = localStorage.getItem("subtotal") || 0.0;
    if (localStorage.getItem("moneda"))
        objectData.moneda = localStorage.getItem("moneda") || "MXN";
    objectData.iva = document.querySelector(`#iva`).value || 0;
    objectData.amountIVA = document.querySelector(`#amountIVA`).value || 0;
    objectData.comision = document.querySelector(`#comision`).value || 0;
    objectData.comision_porcentaje = document.querySelector(`#comision_porcentaje`).value || 0;
    objectData.comision = document.querySelector(`#comision`).value || 0;
    objectData.descuento_aplicado = document.querySelector(`#descuento_aplicado`).value || "";
    objectData.descuento = document.querySelector(`#descuento`).value || 0;
    objectData.tipo_descuento = document.querySelector(`#tipo_descuento`).value || "";
    objectData.code_descuento = document.querySelector(`#code_descuento`).value || "";
    objectData.iddescuento = document.querySelector(`#iddescuento`).value || "";
    return objectData;
}

const initSdkMP = (type) => {
    //Inicializamos a mercado pago
    let KEYAPP = "";
    if (document.querySelector(`#keyPublicMp`))
        KEYAPP = document.querySelector(`#keyPublicMp`).value || "";
    let mp = new MercadoPago(KEYAPP, { locale: 'es-AR' });

    //Obtenemos los productos seleccionados
    let arrayProducts = [];
    if (localStorage.getItem("cart_products"))
        arrayProducts = localStorage.getItem("cart_products");
    let dataClient = getDataFormClient(type);
    let amountTotal = 0.0;
    if (localStorage.getItem("amount"))
        amountTotal = localStorage.getItem("amount");
    let arrayAmounts = getDataAmounts();

    const bricksBuilder = mp.bricks();
    const renderCardPaymentBrick = async (bricksBuilder) => {
        const settings = {
            initialization: {
                amount: amountTotal, // monto a ser pagado
                payer: {
                    email: dataClient.email,//Correo de persona que esta pagando
                },
            },
            customization: {
                visual: {
                    style: {
                        customVariables: {
                            theme: 'default', // | 'dark' | 'bootstrap' | 'flat'
                        }
                    }
                },
                paymentMethods: {
                    maxInstallments: 1,
                }
            },
            callbacks: {
                onReady: () => { },
                onSubmit: (cardFormData) => {
                    //Evento que se ejeucta cuando se preciona pagar
                    cardFormData.method = "paymentMP";
                    cardFormData.formSenData = dataClient;
                    cardFormData.listProducts = arrayProducts;
                    cardFormData.dataAmounts = arrayAmounts;
                    // ? Agregamos ID de usuario logeado
                    if( localStorage.getItem('userid') ) cardFormData.userid = localStorage.getItem('userid') || '';
                    // ? Datos del usuario desde Joomla
                    const tmiduser = document.body.getAttribute('data-id') || 0;
                    const tmemailuser = document.body.getAttribute('data-email') || '';
                    cardFormData.tmiduser = tmiduser;
                    cardFormData.tmemailuser = tmemailuser;



                    //  callback llamado cuando el usuario haga clic en el botón enviar los datos
                    //  ejemplo de envío de los datos recolectados por el Brick a su servidor
                    return new Promise((resolve, reject) => {
                        fetch(`/modules/mod_buycarform/tmpl/model/MercadoPago/request.php`, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify(cardFormData)
                        })
                      /* .then((response) => {
                        // recibir el resultado del pago
                        resolve();
                      }) */.then(response => response.json())
                            .then(data => {

                                if (data.status == 200) {
                                    //messgaeView("success", "Cobro exitoso", "El cobro ha sido efectuado", "Aceptar");

                                    // if (localStorage.getItem(`cart_products`))
                                    //     localStorage.removeItem(`cart_products`);

                                    // if (localStorage.getItem(`amount`))
                                    //     localStorage.removeItem(`amount`)

                                    // if (localStorage.getItem(`nextView`))
                                    //     localStorage.removeItem(`nextView`)

                                    // if (localStorage.getItem(`subtotal`))
                                    //     localStorage.removeItem(`subtotal`)

                                    //reseteamos las variables locales
                                    localStorage.setItem("moneda", "MXN");
                                    localStorage.setItem("amount", 0);
                                    localStorage.setItem("subtotal", 0);
                                    let cart_products = [];
                                    localStorage.setItem("cart_products", JSON.stringify(cart_products));
                                    let structure = data.message;
                                    //document.querySelector(`#btnClosedModal`).click();
                                    $('#mdlPayment').modal('hide');
                                    setTimeout(() => {
                                        document.querySelector(`#content-canvas`).innerHTML = structure;
                                        enviarCorreo("", "Payment", false);
                                    }, 500);
                                    if (type == "Movil") {
                                        document.querySelector(`#contentSummaryPaymentMobile`).style.display = `none`;
                                        document.querySelector(`.space-content-movil`).style.display = `none`;
                                        document.querySelector(`.button-payment-sec`).style.display = `none`;
                                        document.querySelector(`.content-canvas`).marginTop = "5px";
                                    }
                                } else {
                                    messgaeView("warning", "Ha ocurrido un error!", "Error", "Cerrar");
                                }
                            })
                            .catch((error) => {
                                // tratar respuesta de error al intentar crear el pago
                                reject();
                            })
                    });
                },
                onError: (error) => {
                    // callback llamado para todos los casos de error de Brick
                },
            },
        };
        window.cardPaymentBrickController = await bricksBuilder.create('cardPayment', 'cardPaymentBrick_container', settings);
    };
    renderCardPaymentBrick(bricksBuilder);

}
