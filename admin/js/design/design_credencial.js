
const path = `https://cin24.spivet.com.mx/admin/index.php?id=`;
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


const messageView = (icon, title, message, textButton) => {
    Swal.fire({
        icon: `${icon}`,
        title: `${title}`,
        html: `${message}`,
        confirmButtonText: `${textButton}`
    });
}


const skeletonTemp = status => {
    if (status) {
        const arrElements = document.querySelectorAll(`.anim-skeleton`);
        arrElements.forEach(element => {
            element.classList.add("skeleton");
        });
    } else {
        setTimeout(() => {
            const arrElements = document.querySelectorAll(`.anim-skeleton`);
            arrElements.forEach(element => {
                element.classList.remove("skeleton");
            });
        }, 200);
    }
}


// const getImageConfigEvent = () => {
//     const idEvent = document.querySelector(`#event`).value || ""; 
//     let frmData = new FormData();
//     frmData.append("idEvent", idEvent);
//     frmData.append("method", "getImageConfig");
//     asyncData(`/admin/includes/modelo/designCredencial/designCredencialModel.php`, `POST`, frmData)
//     .then((result) => {
//         if( result.status ){ 
//         }else{ 
//         }
//     }).catch((err) => {
//         messageView("error", "Error", err, "Entendido")
//     });
// }


/**
 * Funcion que obtiene la configuracion de un documento en caso de que exista
 */
const getDataDocumentIfExist = () => {

    const idCourse = document.querySelector(`#curso`).value || "";
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
                        setDataDocumentIfExist(result.information);

                        const contentSections = document.querySelector(`.content-sections`);
                        contentSections.style.display = "flex";



                    } else {
                        sessionStorage.setItem("designPreviewFinishedCred", "false");

                        const contentDesignGeneral = document.querySelector(`.content-desig-gen`);
                        const contentControls = document.querySelector(`.content-controls`);


                        const contentAlert = document.createElement("div");
                        contentAlert.id = "alertNewDesign";
                        contentAlert.classList.add("alert", "alert-success", "mt-5");
                        contentAlert.style.display = "flex"
                        contentAlert.style.flexDirection = "column"
                        contentAlert.innerHTML = `<h4 class="alert-heading">¡Bienvenido al diseñador de credencial/gafete!</h4>
                                <p>Para poder iniciar es necesario presionar el botón <strong>"Iniciar configuración"</strong> que se encuentra en la parte inferior de opciones</p>
                                `;

                        // contentDesignGeneral.appendChild(contentAlert);
                        contentControls.insertAdjacentElement("beforebegin", contentAlert);

                        const contentSections = document.querySelector(`.content-sections`);
                        contentSections.style.display = "none";
                        buttonsBehavior("active");

                    }
                    setTimeout(() => {
                        const arrElements = document.querySelectorAll(`.anim-skeleton`);
                        arrElements.forEach(element => {
                            element.classList.remove("skeleton");
                        });
                    }, 2000);
                } else {
                    // No hay informacion almacenada 
                    sessionStorage.setItem("previousDesign", "[]");
                    sessionStorage.setItem("designPreviewFinishedCred", "false");

                    const contentDesignGeneral = document.querySelector(`.content-desig-gen`);
                    const contentControls = document.querySelector(`.content-controls`);

                    const contentAlert = document.createElement("div");
                    contentAlert.id = "alertNewDesign";
                    contentAlert.classList.add("alert", "alert-success", "mt-5");
                    contentAlert.style.display = "flex"
                    contentAlert.style.flexDirection = "column"
                    contentAlert.innerHTML = `<h4 class="alert-heading">¡Bienvenido al diseñador de credencial/gafete!</h4>
                            <p>Para poder iniciar es necesario presionar el botón <strong>"Iniciar configuración"</strong> que se encuentra en la parte inferior de opciones</p>
                        `;
                    // contentDesignGeneral.appendChild(contentAlert);
                    contentControls.insertAdjacentElement("beforebegin", contentAlert);

                    const contentSections = document.querySelector(`.content-sections`);
                    contentSections.style.display = "none";
                    buttonsBehavior("desactive");


                    setTimeout(() => {
                        const arrElements = document.querySelectorAll(`.anim-skeleton`);
                        arrElements.forEach(element => {
                            element.classList.remove("skeleton");
                        });
                    }, 2000);
                }


            }
        })
        .catch((err) => {
            messageView("error", "Error", err, "Entendido")
        });
};


/**
 * *Funcion encargada de iniciar el diseño con el codigoQr de acceso seleccionado
 * Esta funcion inicia mostrando el codigo Qr de acceso y y dehabilita el toggle 
 * para que no sea retirado ese codigo QR
 * @param {element} inputToggle input toggle de codigo de accesos
 */
const initCheckToggleAccess = (inputToggle) => {
    inputToggle.click();
    inputToggle.checked = true;
    inputToggle.disabled = true;
}

/**
 * *Funcion que obtiene la informacion del pie de la credencial 
 * Obtiene la informacion de owneres
 */
const getDataOwner = () => {
    const idCourse = document.querySelector(`#curso`).value || "";
    const frmData = new FormData();
    frmData.append("method", "getOwner");
    frmData.append("idCourse", idCourse);
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

/**
 * Funcion que habilida o deshabilita los botones de accion del menu superior
 * @param {string} action Tipo de accion
 */
const buttonsBehavior = (action = "disabled") => {

    if (action == "active") {
        document.querySelector(`#btnPrint`).disabled = false;
        document.querySelector(`#btnSaveStructureDocto`).disabled = false;
        document.querySelector(`#btnCancelDesign`).disabled = false;
    } else {
        document.querySelector(`#btnPrint`).disabled = true;
        document.querySelector(`#btnSaveStructureDocto`).disabled = true;
        document.querySelector(`#btnCancelDesign`).disabled = true;
    }

}


/**
 * Funcion que setea la informacion de una configuracion anterior de documento 
 * para que se muestren los controles activados o en uso
 * @param {array} arrayDataDocument Datos de una cofiguracion anterior
 */
const setDataDocumentIfExist = (arrayDataDocument) => {

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
        console.log(`${domain}/admin/images/design_credencial/${props.previewImage1}?v=${currentDate.getTime()}`);
        document.querySelector(`#imgLogoSelected`).src = `${domain}/admin/images/design_credencial/${props.previewImage1}?v=${currentDate.getTime()}`;
        document.querySelector(`#previewImage1`).src = `${informationDocument.logoBase64}`
        document.querySelector(`#previewImage1_delete`).style.display = "flex";
    } else {
        document.querySelector(`#imgLogoSelected`).src = `${domain}/images/${logo}`;
    }


    if (props.previewImage2 != "noImage") {
        document.querySelector(`#imgBgSelectedSec2`).src = `${domain}/admin/images/design_credencial/${props.previewImage2}?v=${currentDate.getTime()}`;
        document.querySelector(`#previewImage2`).src = `${informationDocument.logoBase64bgSec2}`
        document.querySelector(`#previewImage2_delete`).style.display = "flex";
    } else {
        document.querySelector(`#imgBgSelectedSec2`).src = ``;
    }


    if (props.colorBgTop != "") {
        document.querySelector(`#colorTopDesing`).value = props.colorBgTop;
        document.querySelector(`#bgTop`).style.background = props.colorBgTop;
    }

    if (props.toggleAccess) {
        document.querySelector(`#togAccess`).checked = props.toggleAccess;
        document.querySelector(`#togAccess`).click();
    }
    if (props.toggleMyData)
        document.querySelector(`#togMyData`).click();
    if (props.toggleAgenda)
        document.querySelector(`#togAgenda`).click();


    const contentMockup = document.querySelector(`.content-sections-mockup`);
    const buttonDelete = document.createElement("button");
    buttonDelete.id = "btnDeleteDesignCredencial";
    buttonDelete.classList.add("btn", "btn-delete-design", "anim-skeleton", "skeleton");
    contentMockup.appendChild(buttonDelete);

    setTimeout(() => {
        const arrElements = document.querySelectorAll(`.anim-skeleton`);
        arrElements.forEach(element => {
            element.classList.remove("skeleton");
        });
    }, 2000);

    const arrayControlsDinamyc = document.querySelectorAll(".control-dinamyc");
    if (informationDocument.statusTagOnly == "0") {
        document.querySelector(`#allDesign`).click();
        // document.querySelector(`#imgLogoSelected`).src = informationDocument.;
    } else {
        document.querySelector(`#tagOnly`).click();

    }

}






/**
 * *Funcion encarga de enviar el html para hacer la impreción del documento
 */
const generatePreviewDocto = () => {
    const rdbTagOnly = document.querySelector(`#tagOnly`);
    let srcBase = "";
    let srcBaseBgSec2 = "";

    if (rdbTagOnly.checked) {
        const imgLogo = document.querySelector(`#imgLogoSelected`);
        srcBase = imgLogo.src;
        imgLogo.src = "";
        const imgBgSec2 = document.querySelector(`#imgBgSelectedSec2`);
        srcBaseBgSec2 = imgBgSec2.src;
        imgBgSec2.src = "";
    }




    const arrElements = document.querySelectorAll(`.anim-skeleton`);
    skeletonTemp(true);


    const idCourse = document.querySelector(`#curso`).value || "";
    const contentGeneral = document.getElementById("contentGeneral");

    let divAImprimir = contentGeneral.innerHTML;
    let divStrucutre = divAImprimir.replace(/&quot;/g, '');
    let orientation = "portrait";

    let frmData = new FormData();
    frmData.append("structure", divStrucutre);
    frmData.append("idCourse", idCourse);
    frmData.append("orientation", orientation);
    frmData.append("method", "previewDesignDocument");

    asyncData(`/admin/includes/modelo/design_credencial/designCredencialModel.php`, `POST`, frmData)
        .then((result) => {
            if (result.status) {
                window.open(`/admin/files/mockups/credencial/${result.nameDocto}`, '_blank');
                skeletonTemp(false);
                if (srcBase != "") {
                    const imgLogo = document.querySelector(`#imgLogoSelected`);
                    imgLogo.src = srcBase;
                    const imgBgSec2 = document.querySelector(`#imgBgSelectedSec2`);
                    imgBgSec2.src = srcBaseBgSec2;
                }
            } else {
                skeletonTemp(false);
                if (srcBase != "") {
                    const imgLogo = document.querySelector(`#imgLogoSelected`);
                    imgLogo.src = srcBase;
                    const imgBgSec2 = document.querySelector(`#imgBgSelectedSec2`);
                    imgBgSec2.src = srcBaseBgSec2;
                }
            }
        })
        .catch((err) => {
            skeletonTemp(false);
        });
};

/**
 * Funcion que almacena la estructura del diseño para la credencial
 */
const saveStructureDocument = () => {
    skeletonTemp(true);
    const idCourse = document.querySelector(`#curso`).value || "";
    const contentGeneral = document.getElementById("contentGeneral");

    let divAImprimir = contentGeneral.innerHTML;
    let divStrucutre = divAImprimir.replace(/&quot;/g, '');
    const orientation = "portrait";

    const controls1 = document.querySelector(`#controlsPageTab1`);
    const previewImage1 = controls1.querySelector(`#previewImage1`).src || "";
    const colorBgTop = controls1.querySelector(`#colorTopDesing`).value || "";
    const toggleAccess = controls1.querySelector(`#togAccess`).checked || false;
    const toggleMyData = controls1.querySelector(`#togMyData`).checked || false;
    const toggleAgenda = controls1.querySelector(`#togAgenda`).checked || false;

    const controls2 = document.querySelector(`#controlsPageTab2`);
    previewImage2 = controls2.querySelector(`#previewImage2`).src || "";

    const tagOnly = document.querySelector(`#tagOnly`).checked || false;

    const objSec = {};
    objSec.previewImage1 = previewImage1;
    objSec.colorBgTop = colorBgTop;
    objSec.toggleAccess = toggleAccess;
    objSec.toggleMyData = toggleMyData;
    objSec.toggleAgenda = toggleAgenda;
    objSec.previewImage2 = previewImage2;
    objSec.tagOnlyStatus = tagOnly;

    const frmData = new FormData();
    frmData.append("idCourse", idCourse);
    frmData.append("orientation", orientation);
    frmData.append("controlsSect", JSON.stringify(objSec));

    frmData.append("method", "saveDesignDocument");
    asyncData(`/admin/includes/modelo/design_credencial/designCredencialModel.php`, `POST`, frmData)
        .then((result) => {
            if (result.status) {
                skeletonTemp(false);
                messageView(`success`, `Diseño almacenado`, `El diseño ha sido <strong> almacenado </strong> exitosamente`, 'Entendido');
            } else {
                skeletonTemp(false);
                messageView(`warning`, `Ha ocurrido un error`, result.message, 'Entendido');
            }
        })
        .catch((err) => {

            console.error(err);
        });
}



/**
 * Funcion que almancena la orientacion seleccionada y  la imgen adjuntada para el documento
 * @param {string} orientation tipo de oritnacion seleccionada
 * @param {string} image imagen adjuntada
 */
const saveOrientationBackground = (orientation, image) => {
    const idEvent = document.querySelector(`#event`).value || "";
    let divAImprimir = document.getElementById("contentGeneral").innerHTML;
    let frmData = new FormData();
    frmData.append("idEvent", idEvent);
    frmData.append("imagen", image);
    frmData.append("orientation", orientation)
    frmData.append("method", "saveOrientationBackground");
    asyncData(`/admin/includes/modelo/designDiploma/designDiplomaModel.php`, `POST`, frmData)
        //asyncData(`model.php`, `POST`, frmData)
        .then((result) => {
            if (result.status) {
                document.querySelector(`#btnCloseModalConfig`).click();
                const contentDiploma = document.querySelector(`#contentDiploma`);
                const horaActual = new Date().getTime();
                contentDiploma.style.backgroundImage = `url('/admin/images/design_diploma/${result.nameImage}?v=${horaActual}')`;

                const contentDesignGeneral = document.querySelector(`.content-desig-gen`);
                const alert = document.querySelector(`#alertNewDesign`);
                contentDesignGeneral.removeChild(alert);
                document.querySelector(`.content-sections`).style.display = "flex";
                buttonsBehavior("active");

            } else {
                messageView(`error`, result.title, result.message, 'Entendido');
            }
        })
        .catch((err) => {
            console.error(err);
        });
}


/**
 * Funcion que agrega la clase que cambia las medidas del boceto de diploma(contenedor diploma)
 * @param {string} typeOrientation tipo de orientacion ( portrait, landscape )
 */
const setClassOrientation = (typeOrientation) => {

    const contentDiploma = document.querySelector(`#contentDiploma`);
    const contentGeneral = document.querySelector(`#contentGeneral`);
    if (typeOrientation == "landscape") {
        contentDiploma.classList.add("orien-landscape");
        contentDiploma.classList.remove("orien-portrait");
        contentGeneral.classList.add(`gen-landscape`);
        contentGeneral.classList.remove(`gen-portrait`);
    } else if (typeOrientation == "portrait") {
        contentDiploma.classList.add("orien-portrait");
        contentDiploma.classList.remove("orien-landscape");
        contentGeneral.classList.add(`gen-portrait`);
        contentGeneral.classList.remove(`gen-landscape`);
    }

}



/**
 * Funcion que recontruye el elemento que fue eliminado del area de diseño en su contenedor inicial
 * @param {string} idElement id del elemento que se va a reconstruir
 */
const buildElement = (idElement) => {
    const contentTag = document.querySelector(`#con${idElement}`);
    const divTag = document.createElement("div");
    divTag.classList.add("element-tag", "tag-disabled");
    divTag.id = idElement;
    if (idElement == "tagtogNameUser") {
        divTag.classList.add("tag-name");
        divTag.innerText = "Nombre completo del participante"
    } else if (idElement == "tagtogCredits") {
        const input = document.createElement("input");
        input.classList.add("form-control-custom");
        input.type = "text";
        input.id = "credits";
        // input.value = "";
        input.setAttribute('value', '');
        input.setAttribute('maxlength', '48');
        divTag.classList.add("tag-credit");
        // divTag.innerHtml = `<input id="credits" type="text" class="form-control-custom" value="" maxlength="48">`;
        divTag.appendChild(input);
    }
    contentTag.appendChild(divTag);
}


/**
 * Funcion que almacena la orientacion del documento 
 * @param {string} idBtnSelected id del boton seleccionado
 */
const saveConfigOrientation = (idBtnSelected, elementImage) => {
    const course = document.querySelector(`#event`).value || "";
    let obj = {};
    obj.course = course;
    if (idBtnSelected == "orientationPortrait")
        obj.orientation = "portrait"
    if (idBtnSelected == "orientationLandscape")
        obj.orientation = "landscape";

    sessionStorage.setItem("configOrientation", JSON.stringify(obj));
    setClassOrientation(obj.orientation);
    saveOrientationBackground(obj.orientation, elementImage.files[0]);
}


const deleteDesignCredencial = () => {
    skeletonTemp(true);
    const idCourse = document.querySelector(`#curso`).value || "";
    let frmData = new FormData();
    frmData.append("idCourse", idCourse);
    frmData.append("method", "deleteDesign");
    asyncData(`/admin/includes/modelo/design_credencial/designCredencialModel.php`, `POST`, frmData)
        .then((result) => {
            if (result.status) {
                skeletonTemp(false);
                // messageView(`success`, `Diseño eliminado`, `El diseño ha sido <strong> eliminado </strong> exitosamente`, 'Entendido');
                Swal.fire({
                    title: "Diseño eliminado",
                    html: `El diseño ha sido <strong> eliminado </strong> exitosamente`,
                    icon: "success",
                    // showCancelButton: true, 
                    // cancelButtonColor: "#d33",
                    confirmButtonText: "Entendido",
                    // cancelButtonText: "Ir a cursos"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
            } else {
                skeletonTemp(false);
                messageView(`error`, `Error`, result.message, 'Entendido');
            }
        }).catch((error) => {
            skeletonTemp(false);
            console.error(error);
        });
}


/**
 * Funcion que se encarga de cambiar la fuente de las etiquetas del diseñador de documento
 * @param {string} valueStyle Fuente seleccionada
 */
const modifyFontStyle = (valueStyle) => {
    // console.log(valueStyle)
    if (valueStyle != "") {
        const tags = document.querySelectorAll(`.element-tag`);
        tags.forEach(element => {
            element.style.fontFamily = valueStyle;
        });
    } else {
        messageView("warning", "Cuidado", "Favor de seleccionar una fuente para las etiquetas");
    }
}

/**
 * *Funcion quer hace la transicion entre contenedores de controles de configuracion
 * muestra o esconde las secciones
 * @param {string} idSelected id del elemento clickeado
 */
const transitionSecControls = idSelected => {
    const tagId = idSelected.split("btn")[1];
    const elementBtn = document.getElementById(idSelected);
    const secControls = document.getElementById(`controls${tagId}`);
    const arraySecControls = document.querySelectorAll(`.content-sections-elements`);
    arraySecControls.forEach(element => {
        element.classList.remove("active");
        element.classList.add("desactive");
    });
    secControls.classList.add("active");
    secControls.classList.remove("desactive");
    const arrayBtnTabs = document.querySelectorAll(`.btn-pagetab`);
    arrayBtnTabs.forEach(element => {
        element.classList.remove("pagetab-selected");
    });
    elementBtn.classList.add("pagetab-selected");
    // if( secControls.classList.includes("inactive") )

}

/**
 * *Funcion que verifica cuantos toggle estan activados
 * y crea los codigos Qr en el previsualizador de la credencial
 */
const checkToggleAvailable = () => {
    const arrayToggles = document.querySelectorAll(".custom-control-input");
    const contentQrs = document.querySelector(`.bg-center`)
    contentQrs.innerHTML = ``;
    let countToggleChekeds = 0;
    let codesQrSelected = "";
    codesQrSelected = `<div class="cont-2-qr">`
    arrayToggles.forEach(element => {
        if (element.checked) {
            countToggleChekeds++;
            codesQrSelected += ` 
                <div class="qr-code1">
                    <span>${element.dataset.title}</span><br>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/d/d0/QR_code_for_mobile_English_Wikipedia.svg" alt="">
                </div> 
            `
        }
    });
    codesQrSelected += `</div>`;
    contentQrs.innerHTML = codesQrSelected;
}

/**
 * *Funcion que oculta o muestra los elementos de la seccion de boceto
 * @param {string} type show / hide
 */
const showElementsMockup = type => {
    if (type == "show") {
        document.querySelector(`#imgLogoSelected`).style.display = "block";
        document.querySelector(`.bg-center`).style.display = "block";
        document.querySelector(`.bg-footer`).style.display = "block";
        const inputcolor = document.querySelector(`#colorTopDesing`).value || "#000";;
        document.querySelector(`.bg-top`).style.background = inputcolor;

        document.querySelector(`#imgBgSelectedSec2`).style.display = "block";

        document.querySelector(`#btnPageTab2`).disabled = false;
        document.querySelector(`#btnPageTab2`).style.opacity = 1;
        const arrayControlsDinamyc = document.querySelectorAll(`.control-dinamyc`);
        arrayControlsDinamyc.forEach(element => {
            // console.log(element);
            element.style.display = "block";
            //Manitiene el toggle de agenda oculto
            // if(element.classList.contains("togg-optional"))
            // element.style.display = "none"; 
        });


    } else if (type == "hide") {
        document.querySelector(`#imgLogoSelected`).style.display = "none";
        document.querySelector(`.bg-center`).style.display = "none";
        document.querySelector(`.bg-footer`).style.display = "none";
        document.querySelector(`.bg-top`).style.background = "#fff";

        document.querySelector(`#imgBgSelectedSec2`).style.display = "none";

        document.querySelector(`#btnPageTab2`).disabled = true;
        document.querySelector(`#btnPageTab2`).style.opacity = 0;

        const arrayControlsDinamyc = document.querySelectorAll(`.control-dinamyc`);
        arrayControlsDinamyc.forEach(element => {
            element.style.display = "none";
        });

    }
}






/**
 * Eveto que genera el pdf de previsualizacion
 */
const btnPrint = document.querySelector(`#btnPrint`);
btnPrint.addEventListener("click", generatePreviewDocto);


window.addEventListener("click", (e) => {
    const idElement = e.target.id;

    if (idElement == "btnPageTab1" || idElement == "btnPageTab2") {
        transitionSecControls(idElement);
    }


    // if( idElement == "orientationPortrait" ){

    //     const element = document.querySelector(`#${idElement}`);
    //     if( element.classList.contains("btn-selected") ){
    //         element.classList.remove("btn-selected");
    //     }else{
    //         element.classList.add("btn-selected"); 
    //         const btnContra = document.querySelector(`#orientationLandscape`);
    //         btnContra.classList.remove("btn-selected")
    //     } 
    // }

    // if( idElement == "orientationLandscape" ){
    //     const element = document.querySelector(`#${idElement}`);
    //     if( element.classList.contains("btn-selected") ){
    //         element.classList.remove("btn-selected");
    //     }else{
    //         element.classList.add("btn-selected");
    //         const btnContra = document.querySelector(`#orientationPortrait`);
    //         btnContra.classList.remove("btn-selected")
    //     }
    // }

    if (idElement == "addBackgDocument") {
        const btnAddImage = document.querySelector(`#${idElement}`);
        const imageDocto = document.querySelector(`#imageDocto`);
        imageDocto.click();


        imageDocto.addEventListener('change', function (event) {
            const file = event.target.files[0];

            if (file) {
                console.log(file);
                btnAddImage.innerText = file.name;
                // const reader = new FileReader();

                // reader.onload = function(e) {
                //     // previewImage.src = e.target.result;
                //     // previewImage.style.display = 'block';
                // };

                // reader.readAsDataURL(file);
            }
        });
    }

    if (idElement == "btnSaveOrientationBack") {
        const contentOrientation = document.querySelector(`#desicionOrientation`);
        const orientationSelect = contentOrientation.querySelector(`.btn-selected`);
        const inpBackgroundDocto = document.querySelector(`#imageDocto`);
        if (orientationSelect) {
            if (inpBackgroundDocto.files.length > 0) {
                saveConfigOrientation(orientationSelect.id, inpBackgroundDocto);
            } else {
                messageView(`warning`, `Información incompleta`, `Favor de proporcionar una <strong> imagen de fondo </strong> para el diseño`, 'Entendido');
            }
        } else {
            messageView(`warning`, `Información incompleta`, `Favor de seleccionar una <strong> orientación </strong> para el diseño`, 'Entendido');
        }
    }

    if (idElement == "btnSaveStructureDocto") {

        const imageLogo = document.querySelector(`#previewImage1`);
        const tagOnly = document.querySelector(`#tagOnly`);
        if (tagOnly.checked) {
            Swal.fire({
                title: "Guardar",
                text: "¿Seguro que deseas guardar el diseño previamente hecho?",
                icon: "question",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonText: "Si guardar"
            }).then((result) => {
                if (result.isConfirmed) {
                    saveStructureDocument();
                }
            });
        } else {
            if (imageLogo.src.includes("data:image/png;base64,")) {
                Swal.fire({
                    title: "Guardar",
                    text: "¿Seguro que deseas guardar el diseño previamente hecho?",
                    icon: "question",
                    showCancelButton: true,
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si guardar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        saveStructureDocument();
                    }
                });
            } else {
                messageView(`warning`, `Información incompleta`, `Favor de seleccionar un <strong>logo principal </strong> para el diseño`, 'Entendido');
            }
        }



    }

    if (idElement == "openConfigDocument") {
        document.querySelector(`.content-sections`).style.display = "flex";
        document.querySelector(`#alertNewDesign`).style.display = "none";
        document.querySelector(`#allDesign`).click();
        buttonsBehavior("active");


        if (sessionStorage.getItem("designPreviewFinishedCred") &&
            sessionStorage.getItem("designPreviewFinishedCred") == "false") {
            if (sessionStorage.getItem("dataOwner")) {
                const dataOwner = JSON.parse(sessionStorage.getItem("dataOwner"));
                document.querySelector(`#imgLogoSelected`).src = `${dataOwner[0].domain}/images/${dataOwner[0].logo}`;
            }

        } else if (sessionStorage.getItem("designPreviewFinishedCred") &&
            sessionStorage.getItem("designPreviewFinishedCred") == "true") {
        }

    }

    if (idElement == "btnCancelDesign") {

        if (sessionStorage.getItem("designPreviewFinishedCred") && sessionStorage.getItem("designPreviewFinishedCred") == "true") {
            Swal.fire({
                title: "Cancelar",
                html: `<strong>¿Seguro que deseas cancelar?</strong></br></br>Todos los cambios no guardados después del último guardado se perderán`,
                icon: "question",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonText: "Si cancelar",
                cancelButtonText: "No cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    // const param1 = document.querySelector(`#idus`).value || "";
                    // const param2 = document.querySelector(`#event`).value || "";
                    window.location.href = `/admin/index.php?id=lista-cursos-design`;
                }
            });
        } else {
            Swal.fire({
                title: "Cancelar",
                html: `<strong>¿Seguro que deseas cancelar?</strong></br></br>Todos los cambios no guardados se perderán`,
                icon: "question",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonText: "Si cancelar",
                cancelButtonText: "No cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    // const param1 = document.querySelector(`#idus`).value || "";
                    // const param2 = document.querySelector(`#curso`).value || "";
                    window.location.href = `/admin/index.php?id=lista-cursos-design`;
                }
            });
        }


    }

    if (idElement == "btnDeleteDesignCredencial") {
        Swal.fire({
            title: "Eliminar",
            html: `<strong>¿Seguro que deseas eliminar el diseño guardado?</strong></br></br>Todos los cambios se perderán`,
            icon: "question",
            showCancelButton: true,
            cancelButtonColor: "#d33",
            confirmButtonText: "Si eliminar",
            cancelButtonText: "cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                deleteDesignCredencial();
            }
        });

    }

    if (idElement == "allDesign") {
        const element = document.getElementById(idElement);
        if (element.checked) {
            showElementsMockup("show");
        }
    }
    if (idElement == "tagOnly") {
        const element = document.getElementById(idElement);
        if (element.checked) {
            showElementsMockup("hide");
        }
    }
});


/**
 * Evento de arrastre 
 */
window.addEventListener("dragstart", (e) => {
    const idElement = e.target.id;
    if (idElement == "tagtogNameUser" || idElement == "tagtogCredits") {
        // console.log(idElement);
        e.dataTransfer.setData('text/plain', idElement);
    }
})






/**
 * Evento de change cambio
 */
window.addEventListener("change", (e) => {
    const idElement = e.target.id;
    if (idElement == "togNameUser" || idElement == "togCredits") {
        const element = document.querySelector(`#${idElement}`);
        const elementTag = document.querySelector(`#tag${idElement}`);
        if (element.checked) {
            elementTag.classList.remove("tag-disabled");
            elementTag.draggable = "true";
        } else {
            const contentDip = document.querySelector(`#contentDiploma`);
            if (contentDip.contains(elementTag)) {
                // Eliminamos la instancia sobre el elemtno arrastrable
                interact(`#tag${idElement}`).unset();

                contentDip.removeChild(elementTag);
                buildElement(`tag${idElement}`);
            } else {
                elementTag.classList.add("tag-disabled");
                elementTag.draggable = "false";
            }
        }

    }
    if (idElement == "colorTopDesing") {
        const element = document.getElementById(idElement);
        const contentBg = document.getElementById("bgTop");
        contentBg.style.backgroundColor = element.value;
    }

    if (idElement == "togMyData" || idElement == "togAccess" || idElement == "togAgenda") {
        checkToggleAvailable();
    }


})



/**
 * Evento de carga del DOM
 */
window.addEventListener("DOMContentLoaded", () => {
    const contentControls = document.querySelector(`.content-columns-control`);
    const arrayControls = contentControls.querySelectorAll(`input`);
    arrayControls.forEach(element => element.checked = false);

    getDataDocumentIfExist();

    if (document.getElementById("togAccess")) {
        const input = document.getElementById("togAccess");
        initCheckToggleAccess(input);
    }
    getDataOwner();
})




const asyncDataExterno = async (url, method, formData) => {
    let options = [];
    if (method == "GET") {
        options = { method: "GET" };
    } else {
        options = { method: "POST", body: formData };
    }
    const response = await fetch(url, options);
    return await response.json();
};





