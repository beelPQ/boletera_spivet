
(() => {
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
      
    
    const messageView = ( icon, title, message, textButton ) => {
        Swal.fire({
            icon: `${icon}`,
            title: `${title}`,
            html: `${message}`,
            confirmButtonText: `${textButton}`
        });
    }
    
    
    
    /**
     * Funcion que obtiene la configuracion de un documento en caso de que exista
     */
    const getDataDocumentIfExist = () => {

        const idCourse = document.querySelector(`#curso`).value || ""; 
        let frmData = new FormData();
        frmData.append("idCourse", idCourse);
        frmData.append("method", "getDocumentIfExist");
        asyncData(`/admin/includes/modelo/design_diploma/model.php`, `POST`, frmData)
            // asyncData2(`model.php`, `POST`, frmData)
            .then((result) => {
                if (result.status) {
                    if( result.information ){ 
                        sessionStorage.setItem( "previousDesign", JSON.stringify(result.information) ); 
                        if( result.information[0].structure != "-" ){
                            setDataDocumentIfExist( result.information );
                            sessionStorage.setItem("designPreviewFinished", "true");
                            
                            
                            
                        }else{
                            sessionStorage.setItem("designPreviewFinished", "false");
                            
                            const contentDesignGeneral = document.querySelector(`.content-desig-gen`);
                            const contentControls = document.querySelector(`.content-controls`);
                            
                        
                            const contentAlert = document.createElement("div");
                            contentAlert.id = "alertNewDesign";
                            contentAlert.classList.add("alert","alert-success","mt-5");
                            contentAlert.style.display = "flex"
                            contentAlert.style.flexDirection = "column"
                            contentAlert.innerHTML = `<h4 class="alert-heading">¡Bienvenido al diseñador de diploma!</h4>
                                  <p>Para poder iniciar es necesario presionar el botón <strong>"Configurar documento"</strong> que se encuentra en la parte inferior de opciones</p>
                                  <p>Selecciona una orientación y adjunta la imegen de fondo</p>`; 
                                  
                            // contentDesignGeneral.appendChild(contentAlert);
                            contentControls.insertAdjacentElement("beforebegin", contentAlert);
                            
                            const contentSections = document.querySelector(`.content-sections`);
                            contentSections.style.display = "none";
                            buttonsBehavior( "disabled" );
                             
                        }
                        setTimeout(() => {
                            const arrElements = document.querySelectorAll(`.anim-skeleton`);
                            arrElements.forEach(element => {
                                element.classList.remove("skeleton");
                            });
                        }, 2000);
                    } else {
                        // No hay informacion almacenada 
                        sessionStorage.setItem( "previousDesign", "[]");
                        sessionStorage.setItem("designPreviewFinished", "false");
                        
                        const contentDesignGeneral = document.querySelector(`.content-desig-gen`);
                        const contentControls = document.querySelector(`.content-controls`);
                        
                        const contentAlert = document.createElement("div");
                        contentAlert.id = "alertNewDesign";
                        contentAlert.classList.add("alert","alert-success","mt-5");
                        contentAlert.style.display = "flex"
                        contentAlert.style.flexDirection = "column"
                        contentAlert.innerHTML = `<h4 class="alert-heading">¡Bienvenido al diseñador de diploma!</h4>
                             <p>Para poder iniciar es necesario presionar el botón <strong>"Configurar documento"</strong> que se encuentra en la parte inferior de opciones</p>
                            <p>Selecciona una orientación y adjunta la imegen de fondo</p>`; 
                        // contentDesignGeneral.appendChild(contentAlert);
                        contentControls.insertAdjacentElement("beforebegin", contentAlert);
                        
                        const contentSections = document.querySelector(`.content-sections`);
                        contentSections.style.display = "none";
                        buttonsBehavior( "disabled" );
                        
                        
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
                console.error(err);
        });
    };
    
    
    /**
     * Funcion que habilida o deshabilita los botones de accion del menu superior
     * @param {string} action Tipo de accion
     */
    const buttonsBehavior = ( action = "disabled" ) => {
        if(action == "active"){
            document.querySelector(`#btnPrint`).disabled = false;
            document.querySelector(`#btnSaveStructureDocto`).disabled = false; 
            document.querySelector(`#btnCancelDesign`).disabled = false;
        }else{
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
    const setDataDocumentIfExist = ( arrayDataDocument ) => {
        
        const informationDocument = arrayDataDocument[0]; 
        const contentGeneral = document.querySelector(`#contentGeneral`);
        if( informationDocument.orientation == "portrait" ){
            contentGeneral.classList.add("gen-portrait");
        }else{
            contentGeneral.classList.add("gen-landscape");
        }
        contentGeneral.innerHTML = informationDocument.structure;
        const contentDiploma = document.querySelector(`#contentDiploma`);
        contentDiploma.classList.add("skeleton");
        const childElements = contentDiploma.childNodes;
        const contentControls = document.querySelector(`.content-columns-control`);
        childElements.forEach(element => {
            if( element.id == "tagtogNameUser" || element.id == "tagtogCredits"){ 
                
                const idControl = element.id.split(`tag`)[1];//Remueve la palabra tag
                document.querySelector(`#${idControl}`).checked = true;
                const contentTag = document.querySelector(`#con${element.id }`); 
                const tagAvailable = contentTag.querySelector(`#${element.id}`);
                contentTag.removeChild( tagAvailable );
                
                reinitInteract( element.id, element.dataset.x, element.dataset.y );
            }
        });
        const contentDesicionOrientation = document.querySelector(`#desicionOrientation`);
        if( informationDocument.orientation == "portrait" ){
            const btnPortrait = contentDesicionOrientation.querySelector(`#orientationPortrait`);
            btnPortrait.classList.add("btn-selected");
        } else if( informationDocument.orientation == "landscape" ) {
            const btnLandscape = contentDesicionOrientation.querySelector(`#orientationLandscape`);
            btnLandscape.classList.add("btn-selected");
        }
        
        const selectFont = document.querySelector(`#selectTypography`);
        selectFont.value = informationDocument.fontFamily;
        
        //const inputFile = document.querySelector(`#imageDocto`);
        //Creacion de boton para eliminar diseño 
        //content-sections-mockup
        const contentMockup = document.querySelector(`.content-sections-mockup`);
        const buttonDelete = document.createElement("button");
        buttonDelete.id = "btnDeleteDesign";
        buttonDelete.classList.add("btn", "btn-delete-design", "anim-skeleton", "skeleton");
        contentMockup.appendChild(buttonDelete);
        
    }
    
    
    /**
     * Funcion de inicializa a interact sobre un elemento para que pueda ser arrastrado en el area de diseño
     * @param {string} draggedElementId Id de elemento
     * @param {string} datax coordenadas de posicion
     * @param {string} datay coordenadas de posicion
     */
    const reinitInteract = (draggedElementId, datax = "", datay = "") => {
         // Iniciamos interact para poder arrastrar los elementos
         
        if( datax != "" && datay != "" ){ 
            const position = { x: parseFloat(datax), y: parseFloat(datay) }
            interact(`#${draggedElementId}`).draggable({ 
                listeners:{
                    start(event) {
                        //console.log(event.type, event.target)
                    },
                    move(event) {
                        position.x += event.dx
                        position.y += event.dy 
                        event.target.style.transform = `translate(${position.x}px, ${position.y}px)`
                        event.target.setAttribute("data-x", position.x);
                        event.target.setAttribute("data-y", position.y);
                    }
                },
            });
        } else {
            //console.log("cae en el else")
            interact(`#${draggedElementId}`).draggable({
                onmove: function (event) {
                    let target = event.target;
                    let x = "";
                    let y = "";
                    if( datax != "" && datay != "" ){
                        x = (parseFloat(datax) || 0) + event.dx;
                        y = (parseFloat(datay) || 0) + event.dy;
                    }else{
                        x = (parseFloat(target.getAttribute("data-x")) || 0) + event.dx;
                        y = (parseFloat(target.getAttribute("data-y")) || 0) + event.dy;
                    } 
                    // Actualizar la posición del elemento
                    target.style.transform = "translate(" + x + "px, " + y + "px)";
                    // Guardar la posición
                    target.setAttribute("data-x", x);
                    target.setAttribute("data-y", y);
                },
            });
        }
         
        
    }
    
    
    
    
    /**
     * Funcion que obtiene las fuentes permitidas para el diseño de documentos
     * y crea la etiqueta style con las fuentes obtenidas en el cabecera 
     */
    const getFontsForDesign = () => {
        let frmData = new FormData();
        frmData.append("method", "getFontsDesign");
        asyncData(`/admin/includes/modelo/design_diploma/model.php`, `POST`, frmData)
        // asyncData(`model.php`, `POST`, frmData)
        .then((result) => {
            if(result.status){  
                let fonts = ""; 
                // Llenado de opciones del select de fuentes
                const select = document.querySelector(`#selectTypography`);
                sessionStorage.setItem("fonts", JSON.stringify(result.data));
                const option = document.createElement("option");
                option.value = ``;
                option.innerText = `Seleccionar`;
                option.disabled = true;
                option.selected = true; 
                select.appendChild(option);
                
                result.data.forEach(element => {
                    const option = document.createElement("option");
                    option.value = `${element.numFont}|${element.nameFont}`;
                    option.innerText = `${element.nameFont}`;
                    select.appendChild(option);
                    fonts += `${element.linkFont}`;
                });

                // Creacion de etiqueta style 
                const head = document.querySelector("head");
                const newStyle = document.createElement("style");
                const fuentes = fonts;
                newStyle.innerText = fuentes;
                head.appendChild(newStyle);

            }else{
                messageView(`error`, `Fuentes no encontradas`, result.message, 'Entendido');
            }
        })
        .catch((err) => {
            console.error(err);
        });
    }
    
    const generatePreviewDocto = () => {
        document.querySelector(`#contentSpinnerPrimary`).style.display = "flex";
        const idCourse = document.querySelector(`#curso`).value || "";
        const contentGeneral = document.getElementById("contentGeneral");  
        const inputCreditos = document.getElementById("credits");
        const valueTemp = inputCreditos.value;
        // Remplazamos los valores que se desean retirar o poner
        const inputModificado = `<input id="credits" class="form-control-custom" type="text" value="${valueTemp}" maxlength="48">`;
        let divAImprimir = contentGeneral.innerHTML;
        let divStrucutre = divAImprimir.replace(/&quot;/g, '');
        
        if (divStrucutre.includes(`<input class="form-control-custom" type="text" id="credits" value="" maxlength="48">`)) 
        divStrucutre = divStrucutre.replace('<input class="form-control-custom" type="text" id="credits" value="" maxlength="48">', inputModificado);
        else
        divStrucutre = divStrucutre.replace('<input id="credits" type="text" class="form-control-custom" value="" maxlength="48">', inputModificado);  
        
        let orientation = "landscape";
        if( sessionStorage.getItem("configOrientation") ){
            const configOrientation = JSON.parse( sessionStorage.getItem("configOrientation") );
            orientation = configOrientation.orientation;
        }
        
        let selectedTypography = "";
        let typhography = document.querySelector(`#selectTypography`).value || "";
        if( typhography != "" ) selectedTypography = typhography.split("|")[1];
        else selectedTypography = "Ubuntu";
        
        let frmData = new FormData();
        frmData.append("structure", divStrucutre);
        frmData.append("idCourse", idCourse);
        frmData.append("orientation", orientation);
        frmData.append("fontFamily", selectedTypography);
        frmData.append("method", "previewDesignDocument");
        asyncData(`/admin/includes/modelo/design_diploma/model.php`, `POST`, frmData)
        // asyncData(`model.php`, `POST`, frmData)
        .then((result) => {
            if(result.status){ 
                window.open(`/admin/files/mockups/certificado/${result.nameDocto}`, '_blank');
                document.querySelector(`#contentSpinnerPrimary`).style.display = "none";
            }else{
                document.querySelector(`#contentSpinnerPrimary`).style.display = "none";
                messageView(`warning`, `Ha ocurrido un error`, result.message, 'Entendido'); 
            }
        })
        .catch((err) => {
            document.querySelector(`#contentSpinnerPrimary`).style.display = "none";
            console.error(err);
        });
    };
    
    /**
     * Funcion que almacena la estructura del diseño para el diploma/certificado
     */
    const saveStructureDocument = () => {
        document.querySelector(`#contentSpinnerPrimary`).style.display = "flex";
        const idCourse = document.querySelector(`#curso`).value || "";
        const contentGeneral = document.getElementById("contentGeneral");
        const inputCreditos = document.getElementById("credits");
        const valueTemp = inputCreditos.value;
        
        // Remplazamos los valores que se desean retirar o poner
        const inputModificado = `<input id="credits" class="form-control-custom" type="text" value="${valueTemp}" maxlength="48">`;
        let divAImprimir = contentGeneral.innerHTML;
        let divStrucutre = divAImprimir.replace(/&quot;/g, '');
        // Remplazamos los valores que se desean retirar o poner
        if (divStrucutre.includes(`<input class="form-control-custom" type="text" id="credits" value="" maxlength="48">`)) {
            divStrucutre = divStrucutre.replace('<input class="form-control-custom" type="text" id="credits" value="" maxlength="48">', inputModificado);
        }else{
            divStrucutre = divStrucutre.replace('<input id="credits" type="text" class="form-control-custom" value="" maxlength="48">', inputModificado);    
        }
        
        let orientation = "landscape";
        if( sessionStorage.getItem("configOrientation") ){
            const configOrientation = JSON.parse( sessionStorage.getItem("configOrientation") );
            orientation = configOrientation.orientation;
        }
        
        let selectedTypography = "";
        let typhography = document.querySelector(`#selectTypography`).value || "";
        if( typhography != "" ){
            selectedTypography = typhography;
        }else{
            selectedTypography = "Ubuntu";
        }
        
        let frmData = new FormData();
        frmData.append("structure", divStrucutre);
        frmData.append("idCourse", idCourse);
        frmData.append("orientation", orientation);
        frmData.append("fontFamily", selectedTypography);
        frmData.append("method", "saveDesignDocument");
        asyncData(`/admin/includes/modelo/design_diploma/model.php`, `POST`, frmData)
        // asyncData(`model.php`, `POST`, frmData)
        .then((result) => {
            if(result.status){ 
                document.querySelector(`#contentSpinnerPrimary`).style.display = "none";
                messageView(`success`, `Diseño almacenado`, `El diseño ha sido <strong> almacenado </strong> exitosamente`, 'Entendido');
                
            }else{
                document.querySelector(`#contentSpinnerPrimary`).style.display = "none";
                messageView(`warning`, `Ha ocurrido un error`, result.message, 'Entendido'); 
            }
        })
        .catch((err) => {
            messageView(`warning`, `Ha ocurrido un error`, err, 'Entendido'); 
            document.querySelector(`#contentSpinnerPrimary`).style.display = "none";
            console.error(err);
        });
    }
    
    
    
    /**
     * Funcion que almancena la orientacion seleccionada y  la imgen adjuntada para el documento
     * @param {string} orientation tipo de oritnacion seleccionada
     * @param {string} image imagen adjuntada
     */
    const saveOrientationBackground = ( orientation, image) => {
        const idCourse = document.querySelector(`#curso`).value || "";
        let divAImprimir = document.getElementById("contentGeneral").innerHTML;
        let frmData = new FormData();
        frmData.append("idCourse", idCourse);
        frmData.append("imagen", image);
        frmData.append("orientation", orientation)
        frmData.append("method", "saveOrientationBackground");
        asyncData(`/admin/includes/modelo/design_diploma/model.php`, `POST`, frmData)
        //asyncData(`model.php`, `POST`, frmData)
            .then((result) => {
                if (result.status) {
                    document.querySelector(`#btnCloseModalConfig`).click();
                    const contentDiploma = document.querySelector(`#contentDiploma`);
                    const horaActual = new Date().getTime(); 
                    contentDiploma.style.backgroundImage = `url('/admin/images/design_diploma/${result.nameImage}?v=${horaActual}')`;
                    
                    const contentDesignGeneral = document.querySelector(`.content-desig-gen`);
                    const alert = document.querySelector(`#alertNewDesign`);
                    contentDesignGeneral.removeChild( alert );
                    document.querySelector(`.content-sections`).style.display = "flex";
                    buttonsBehavior( "active" );
                    
                }else{ 
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
    const setClassOrientation = ( typeOrientation ) => {
    
        const contentDiploma = document.querySelector(`#contentDiploma`);
        const contentGeneral = document.querySelector(`#contentGeneral`);
        if( typeOrientation == "landscape" ){
            contentDiploma.classList.add("orien-landscape");
            contentDiploma.classList.remove("orien-portrait");
            contentGeneral.classList.add(`gen-landscape`);
            contentGeneral.classList.remove(`gen-portrait`);
        }else if(typeOrientation == "portrait" ){
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
    const saveConfigOrientation = ( idBtnSelected, elementImage ) => {
        const course = document.querySelector(`#curso`).value || "";
        let obj = {};
        obj.course = course;
        if( idBtnSelected == "orientationPortrait" )
        obj.orientation = "portrait"    
        if( idBtnSelected == "orientationLandscape" )
        obj.orientation = "landscape"; 

        sessionStorage.setItem( "configOrientation", JSON.stringify(obj) );
        setClassOrientation(obj.orientation);
        saveOrientationBackground(obj.orientation, elementImage.files[0]);
    }
    
    
    const deleteDesign = () => {
        const idCourse = document.querySelector(`#curso`).value || ""; 
        let frmData = new FormData();
        frmData.append("idCourse", idCourse);
        frmData.append("method", "deleteDesign");
        asyncData(`/admin/includes/modelo/design_diploma/model.php`, `POST`, frmData)
        .then((result) => {
            if( result.status ){
                // messageView(`success`, `Diseño eliminado`, `El diseño ha sido <strong> eliminado </strong> exitosamente`, 'Entendido');
                Swal.fire({
                    title: "Diseño eliminado",
                    html: `El diseño ha sido <strong> eliminado </strong> exitosamente </br>  <strong> ¿Deseas realizar un nuevo diseño ó ir a la lista de cursos? </strong>`,
                    icon: "success",
                    showCancelButton: true, 
                    // cancelButtonColor: "#d33",
                    confirmButtonText: "Seguir en el diseñador",
                    cancelButtonText: "Ir a cursos"
                }).then((result) => {
                    if (result.isConfirmed) { 
                        window.location.reload();
                    }else{
                        window.location.href = "/admin/index.php?id=lista-cursos-design";
                    }
                });
            }else{
                messageView(`error`, `Error`, result.message, 'Entendido');
            }
        }).catch((error) => {
            console.error(error);
        });
    }
        
        
    /**
     * Funcion que se encarga de cambiar la fuente de las etiquetas del diseñador de documento
     * @param {string} valueStyle Fuente seleccionada
     */
    const modifyFontStyle = (valueStyle) => {
        // console.log(valueStyle)
        if( valueStyle != "" ){
            const tags = document.querySelectorAll(`.element-tag`);
            tags.forEach(element => { 
                element.style.fontFamily = valueStyle;
            }); 
        }else{
            messageView("warning", "Cuidado", "Favor de seleccionar una fuente para las etiquetas");
        }
    }


    /**
     * Eveto que genera el pdf de previsualizacion
     */
    const btnPrint = document.querySelector(`#btnPrint`);
    btnPrint.addEventListener("click", generatePreviewDocto);
    
    
    window.addEventListener("click", (e) => {
        const idElement = e.target.id;
        if( idElement == "orientationPortrait" ){
            
            const element = document.querySelector(`#${idElement}`);
            if( element.classList.contains("btn-selected") ){
                element.classList.remove("btn-selected");
            }else{
                element.classList.add("btn-selected"); 
                const btnContra = document.querySelector(`#orientationLandscape`);
                btnContra.classList.remove("btn-selected")
            } 
        }

        if( idElement == "orientationLandscape" ){
            const element = document.querySelector(`#${idElement}`);
            if( element.classList.contains("btn-selected") ){
                element.classList.remove("btn-selected");
            }else{
                element.classList.add("btn-selected");
                const btnContra = document.querySelector(`#orientationPortrait`);
                btnContra.classList.remove("btn-selected")
            }
        }

        if( idElement == "addBackgDocument" ){
            const btnAddImage = document.querySelector(`#${idElement}`);
            const imageDocto = document.querySelector(`#imageDocto`);
            imageDocto.click();
            

            imageDocto.addEventListener('change', function(event) {
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
                    saveConfigOrientation( orientationSelect.id, inpBackgroundDocto);
                } else {
                    messageView(`warning`, `Información incompleta`, `Favor de proporcionar una <strong> imagen de fondo </strong> para el diseño`, 'Entendido');
                }
            } else {
                messageView(`warning`, `Información incompleta`, `Favor de seleccionar una <strong> orientación </strong> para el diseño`, 'Entendido');
            }
        }
        
        if( idElement == "btnSaveStructureDocto" ){
            const selectFont = document.querySelector(`#selectTypography`);
            if( selectFont.value != "" ){ 
                Swal.fire({
                    title: "Guardar",
                    text: "¿Seguro que deseas guardar el diseño previamente echo?",
                    icon: "question",
                    showCancelButton: true, 
                    cancelButtonColor: "#d33",
                    confirmButtonColor: "#000",
                    confirmButtonText: "Si guardar"
                }).then((result) => {
                    if (result.isConfirmed) {
                       saveStructureDocument();
                    }
                });
            }else{
                messageView(`warning`, `Sin fuente seleccionada`, `Favor de seleccionar una <strong> fuente </strong> para el diseño`, 'Entendido');
            }
        }
        
        if( idElement == "openConfigDocument" ){
            if( sessionStorage.getItem("designPreviewFinished") && sessionStorage.getItem("designPreviewFinished") == "true" ){
                Swal.fire({
                    title: "Cuidado, cambio de configuración",
                    html: `Si usted desea hacer una cambio sobre la configuración del documento <strong> será necesario seleccionar orientación y adjuntar imagen </strong></br> ¿Realmente desea continuar con la acción?`,
                    icon: "question",
                    showCancelButton: true, 
                    cancelButtonColor: "#d33",
                    confirmButtonColor: "#000",
                    confirmButtonText: "Si continuar",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) { 
                    }else{
                        document.querySelector(`#btnCloseModalConfig`).click();
                    }
                });
            }           
        }
        
        if( idElement == "btnCancelDesign" ){
            
            if( sessionStorage.getItem("designPreviewFinished") && sessionStorage.getItem("designPreviewFinished") == "true" ){
                Swal.fire({
                    title: "Cancelar",
                    html: `<strong>¿Seguro que deseas cancelar?</strong></br></br>Todos los cambios no guardados después del último guardado se perderán`,
                    icon: "question",
                    showCancelButton: true, 
                    cancelButtonColor: "#d33",
                    confirmButtonColor: "#000",
                    confirmButtonText: "Si cancelar",
                    cancelButtonText: "No cancelar"
                }).then((result) => {
                    if (result.isConfirmed) { 
                        window.location.href = "/admin/index.php?id=lista-cursos-design";
                    }
                });
            }else{
                Swal.fire({
                    title: "Cancelar",
                    html: `<strong>¿Seguro que deseas cancelar?</strong></br></br>Todos los cambios no guardados se perderán`,
                    icon: "question",
                    showCancelButton: true, 
                    cancelButtonColor: "#d33",
                    confirmButtonColor: "#000",
                    confirmButtonText: "Si cancelar",
                    cancelButtonText: "No cancelar"
                }).then((result) => {
                    if (result.isConfirmed) { 
                        window.location.href = "/admin/index.php?id=lista-cursos-design";
                    }
                });
            }
            
            
        }
        
        if( idElement == "btnDeleteDesign" ){
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
                    deleteDesign();
                }
            });
            
        }
        
    });
    
    
    /**
     * Evento de arrastre 
     */
    window.addEventListener("dragstart", (e) => {
        const idElement = e.target.id;
        if( idElement == "tagtogNameUser" || idElement == "tagtogCredits"){
            console.log(idElement);
            e.dataTransfer.setData('text/plain', idElement);
        }
    })
    
    // const contentDiploma = document.querySelector(`.content-diploma`);
    // contentDiploma.addEventListener("dragover", (e) => {
    //     e.preventDefault();
    // });

    // contentDiploma.addEventListener("drop", (e) => {
    //     e.preventDefault();
    //     let draggedElementId = e.dataTransfer.getData('text/plain');
    //     let draggedElement = document.getElementById(draggedElementId);
    //     contentDiploma.append(draggedElement);
    //     reinitInteract( draggedElementId );
    //     // interact(`#${draggedElementId}`).draggable({
    //     //     onmove: function (event) {
    //     //       var target = event.target;
    //     //       var x = (parseFloat(target.getAttribute("data-x")) || 0) + event.dx;
    //     //       var y = (parseFloat(target.getAttribute("data-y")) || 0) + event.dy;
          
    //     //       // Actualizar la posición del elemento
    //     //       target.style.transform = "translate(" + x + "px, " + y + "px)";
    //     //       // Guardar la posición
    //     //       target.setAttribute("data-x", x);
    //     //       target.setAttribute("data-y", y);
    //     //     },
    //     // });

    // });
    
    /**
     * Funcion que incializa el escuchador de arraste sobre el contenedor principal
     */
    const initDragContent = () => {
        /**
         * 
         */
        const contentDiploma = document.querySelector(`.content-diploma`);
        contentDiploma.addEventListener("dragover", (e) => {
            e.preventDefault();
        });


        /**
         * Evento de Arrastre
         */
        contentDiploma.addEventListener("drop", (e) => {
            e.preventDefault();
            let draggedElementId = e.dataTransfer.getData('text/plain');
            let draggedElement = document.getElementById(draggedElementId);
            contentDiploma.append(draggedElement); 

            reinitInteract( draggedElementId, "", "" );

            // Iniciamos interact para poder arrastrar los elementos
            // interact(`#${draggedElementId}`).draggable({
            //     onmove: function (event) {
            //         var target = event.target;
            //         var x = (parseFloat(target.getAttribute("data-x")) || 0) + event.dx;
            //         var y = (parseFloat(target.getAttribute("data-y")) || 0) + event.dy;

            //         // Actualizar la posición del elemento
            //         target.style.transform = "translate(" + x + "px, " + y + "px)";
            //         // Guardar la posición
            //         target.setAttribute("data-x", x);
            //         target.setAttribute("data-y", y);
            //     },
            // });
        });
    }
    

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
        if ( idElement == "selectTypography" ){
            const element = document.getElementById(idElement);
            const fontUse = element.value.split("|")[1];
            modifyFontStyle(fontUse);
        }
    })

    /**
     * Evento de carga del DOM
     */
    window.addEventListener("DOMContentLoaded", () => {
        // Obtenemos las fuentes disponibles 
        getFontsForDesign();
        
        const contentControls = document.querySelector(`.content-columns-control`);
        const arrayControls = contentControls.querySelectorAll(`input`);
        arrayControls.forEach(element => {
            element.checked = false;
        });
        
        getDataDocumentIfExist();
        
        
        
        if( document.querySelector(`#collapseMenu`) ){
            document.querySelector(`#collapseMenu`).click();
        }
        
        setTimeout(() => {
            initDragContent();
        }, 600);
    })


})();

