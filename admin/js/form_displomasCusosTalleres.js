
let editorCorta, editorLarga, editorIncluye, editorEsquema;
let datosForm = {}, finalStartDate = '', finalEndDate = '';
let dataThumbHeader = {}, dataThumbMini = {}, dataImageProfile = {}, dataImageBlog = {}


const dataCkeditor = () => {
    let initDataCkeditor = {}
    const items = [
        // 'exportPDF','exportWord', '|',
        'findAndReplace', 'selectAll', '|',
        'heading', '|',
        'bold', 'italic', 'strikethrough', 'underline', 'code', '|',
        'bulletedList', 'numberedList', 'todoList', '|',
        'outdent', 'indent', '|',
        'fontSize', 'fontFamily', 
        'alignment', 'blockQuote', '|', 'link'

        /*
            'exportPDF','exportWord', '|',
            'findAndReplace', 'selectAll', '|',
            'heading', '|',
            'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
            'bulletedList', 'numberedList', 'todoList', '|',
            'outdent', 'indent', '|',
            'undo', 'redo',
            '-',
            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
            'alignment', '|',
            'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
            'specialCharacters', 'horizontalLine', 'pageBreak', '|',
            'textPartLanguage', '|',
            'sourceEditing'
        */
    ];

    const properties= {
        styles: true,
        startIndex: true,
        reversed: true
    };

    const options = [
        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
    ];

    const optionsLetter = [
        'default',
        'Arial, Helvetica, sans-serif',
        'Courier New, Courier, monospace',
        'Georgia, serif',
        'Lucida Sans Unicode, Lucida Grande, sans-serif',
        'Tahoma, Geneva, sans-serif',
        'Times New Roman, Times, serif',
        'Trebuchet MS, Helvetica, sans-serif',
        'Verdana, Geneva, sans-serif'
    ];

    const removePlugins = [
    // These two are commercial, but you can try them out without registering to a trial.
    // 'ExportPdf',
    // 'ExportWord',
    'CKBox',
    'CKFinder',
    'EasyImage',
    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
    // Storing images as Base64 is usually a very bad idea.
    // Replace it on production website with other solutions:
    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
    // 'Base64UploadAdapter',
    'RealTimeCollaborativeComments',
    'RealTimeCollaborativeTrackChanges',
    'RealTimeCollaborativeRevisionHistory',
    'PresenceList',
    'Comments',
    'TrackChanges',
    'TrackChangesData',
    'RevisionHistory',
    'Pagination',
    'WProofreader',
    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
    // from a local file system (file://) - load this site via HTTP server if you enable MathType
    'MathType',

    ];

    const feeds =  [
        {
            marker: '@',
            feed: [
                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                '@sugar', '@sweet', '@topping', '@wafer'
            ],
            minimumCharacters: 1
        }
    ];

    initDataCkeditor = {
            
        toolbar: {
            items,
            shouldNotGroupWhenFull: true
        },
        language: 'es',
        list: {
            properties
        },
        
        heading: {
            options
        },
        
        placeholder: 'Redactar descripcion corta',
        
        fontFamily: {
            optionsLetter,
            supportAllValues: true
        },
        
        fontSize: {
            options: [ 10, 12, 14, 'default', 18, 20, 22 ],
            supportAllValues: true
        },
        
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
        },
        
        htmlEmbed: {
            showPreviews: true
        },
        
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        
        mention: {
            feeds
        },
        
        removePlugins
    }

    return initDataCkeditor
}

/**
 * 
 * @param {element} element : elemento a afectar
 * @param {string} message : mensaje a imprimir en el elemento afectado
*/
const createMessageError = (element, message) => {
    const contentElement = element.parentNode
    const spanError = document.createElement('span')
    spanError.classList.add('span__error')
    spanError.id = `${element.id}Err`
    spanError.innerHTML = message
    contentElement.appendChild(spanError)
    element.classList.add('is-invalid')
}
/** Eliminamos los mensajes de error que puedan existir de acuerdo al elemento seleccoinado
 * 
 * @param {integer} idForm : ID del formulario actual
 * @param {element} element : elemento a afectar
*/
const destroyMessageError = (idForm, element) => {
    if( idForm.querySelector(`#${element.id}Err`) ){
        const contentElement = element.parentNode
        const span = idForm.querySelector(`#${element.id}Err`)
        contentElement.removeChild(span)
        element.classList.remove('is-invalid')
    }
}

/** Retornamos un mensaje de acuerdo al id del elemento proporcionado
 * 
 * @param {integer} id : id del elemento a acomparar
 * @returns 
*/
const chengeNameToMessage = (id) => {
    if( id == 'nameCourseWorks' ) return `Ingrese un nombre para continuar`
    if( id == 'duration' ) return `Ingrese la duración`
    if( id == 'preciomx' ) return `Ingrese el precio`
    if( id == 'category' ) return `Selecciona una categoría para continuar`
    if( id == 'modality' ) return `Selecciona una modalidad para continuar`
    if( id == 'disponible' || id == 'check_descuento' ) return `Selecciona una opción para continuar`
    if( id == 'startDateDay' || id == 'endDateDay' ) return `` //return `Seleccione un día para continuar`
    if( id == 'startDateMonth' || id == 'endDateMonth' ) return `` //return `Seleccione un mes para continuar`
    if( id == 'startDateYear' ||  id == 'endDateYear' ) return `` //return `Seleccione un año para continuar`
    if( id == 'cantidad1' ) return `Ingrese una cantidad`
    if( id == 'tipo_descuento' ) return `Seleccione un tipo descuento`
    if( id == 'descuento_estado' ) return `Seleccione el estado del descuento`
    if( id == 'dia1' || id == 'mes1' || id == 'anio1' || id == 'hora1' || id == 'min1' || id == 'dia2' || id == 'mes2' || id == 'anio2' || id == 'hora2' || id == 'min2' ) return ``
    if( id == 'stock' ) return `Ingrese la cantidad disponible del producto`
    if( id == 'direction' ) return `Ingrese la dirección`
    if( id == 'location' ) return `Ingrese la localización`
    if( id == 'notes' ) return `Ingrese las notas`
    if( id == 'linkconection' ) return `Ingrese el link de conexión`
    

    // if( id == '' ) return ``
}

/** Varificar si la fecha fin es menor a la fecha de inicio seleccionada
 * 
 * @param {string} idForm : ID del formulario actual
 * @returns {integer} isError: retornamos dos valores posible
 *          0 = las fechas son correctas
 *          1 = La fecha fin el menor a la fecha inicio
 */
const validateDates = idForm => {
    let isError = 0
    const selectDayIn = idForm.querySelector(`#startDateDay`)
    const selectMonthIn = idForm.querySelector(`#startDateMonth`)
    const selectYearIn = idForm.querySelector(`#startDateYear`)
    const newDateIn = new Date( parseInt(selectYearIn.value), parseInt(selectMonthIn.value), parseInt(selectDayIn.value) )

    const selectDayEnd = idForm.querySelector(`#endDateDay`)
    const selectMonthEnd = idForm.querySelector(`#endDateMonth`)
    const selectYearEnd = idForm.querySelector(`#endDateYear`)
    const newDateEnd = new Date( parseInt(selectYearEnd.value), parseInt(selectMonthEnd.value), parseInt(selectDayEnd.value) )

    if( newDateEnd.getTime() < newDateIn.getTime() ) {
        selectDayEnd.classList.add('is-invalid')
        selectMonthEnd.classList.add('is-invalid')
        selectYearEnd.classList.add('is-invalid')
        isError++
    }
    finalStartDate = `${selectYearIn.value}-${selectMonthIn.value}-${selectDayIn.value}`
    finalEndDate = `${selectYearEnd.value}-${selectMonthEnd.value}-${selectDayEnd.value}`

    let check_descuento=$('#check_descuento').val();
    if(check_descuento=='1'){ check_descuento=true; }else{ check_descuento=false; }

    if(check_descuento==true){

        const diaInicioDesc = idForm.querySelector(`#dia1`)
        const mesInicioDesc = idForm.querySelector(`#mes1`)
        const anioInicioDesc = idForm.querySelector(`#anio1`)
        const horaInicioDesc = idForm.querySelector(`#hora1`)
        const minInicioDesc = idForm.querySelector(`#min1`)

        let diaFinDesc = idForm.querySelector(`#dia2`)
        let mesFinDesc = idForm.querySelector(`#mes2`)
        let anioFinDesc = idForm.querySelector(`#anio2`)
        let horaFinDesc = idForm.querySelector(`#hora2`)
        let minFinDesc = idForm.querySelector(`#min2`)

        if(anioInicioDesc.value!='----' && mesInicioDesc.value!='----' && diaInicioDesc.value!='----' && horaInicioDesc.value!='----' && minInicioDesc.value!='----' &&
           anioFinDesc.value!='----' && mesFinDesc.value!='----' && diaFinDesc.value!='----' && horaFinDesc.value!='----' && minFinDesc.value!='----'){

            diaFinDesc.classList.remove('is-invalid')
            mesFinDesc.classList.remove('is-invalid')
            anioFinDesc.classList.remove('is-invalid')
            horaFinDesc.classList.remove('is-invalid')
            minFinDesc.classList.remove('is-invalid')


            const newDateInDesc = new Date(  parseInt(anioInicioDesc.value), parseInt(mesInicioDesc.value)-1, parseInt(diaInicioDesc.value),parseInt(horaInicioDesc.value),parseInt(minInicioDesc.value) )
            //console.log('Fechai');
            //console.log(newDateInDesc);
            
            const newDateFinDesc = new Date( parseInt(anioFinDesc.value), parseInt(mesFinDesc.value)-1, parseInt(diaFinDesc.value), parseInt(horaFinDesc.value),parseInt(minFinDesc.value) )
            //console.log('Fechaf');
            //console.log(newDateFinDesc);

            if( newDateFinDesc.getTime() < newDateInDesc.getTime() ) {
                //console.log('invalido');
                diaFinDesc.classList.add('is-invalid')
                mesFinDesc.classList.add('is-invalid')
                anioFinDesc.classList.add('is-invalid')
                horaFinDesc.classList.add('is-invalid')
                minFinDesc.classList.add('is-invalid')
                isError++
            }else{
                //console.log('valido');
                diaFinDesc.classList.add('is-valid')
                mesFinDesc.classList.add('is-valid')
                anioFinDesc.classList.add('is-valid')
                horaFinDesc.classList.add('is-valid')
                minFinDesc.classList.add('is-valid')
            }
            

        }
        
        

    }
    

    return isError
}

/** Validamos datos requeridos del formulario
 * 
 * @param {*} idForm 
 * @param {*} type 
 * @returns 
*/
const validData = (idForm, type ) => {
    if( type == 0 ) {
        let countErrors = 0
        const inputsEval = idForm.querySelectorAll('input')
        //input tipo de modalidad
        const selectModality = document.querySelector("#modality");
        //console.log(inputsEval);
        inputsEval.forEach( (input, i) => {
            const valueElement = input.value
            const typeElement = input.type
            const idElement = input.id
            destroyMessageError(idForm, input)
            if( typeElement != 'hidden' ){
                if( idElement == 'nameCourseWorks' || idElement == 'duration' || idElement == 'preciomx' ) {
                    if( valueElement.trim() == '' ) {
                        createMessageError(input, chengeNameToMessage(idElement) )
                        countErrors++
                    }
                    else { input.classList.add('is-valid') }
                }
                if( idElement == 'stock' ) {
                    if( valueElement.trim() == '' || parseInt(valueElement) == 0 ) {
                        createMessageError(input, chengeNameToMessage(idElement) )
                        countErrors++
                    }
                    else { input.classList.add('is-valid') }
                }

                if( idElement == 'cantidad1' ) {

                    let check_descuento=$('#check_descuento').val();
                    if(check_descuento=='1'){ check_descuento=true; }else{ check_descuento=false; }

                    if(check_descuento==true){

                        let cantidad1Desc=valueElement.trim();
                        if(cantidad1Desc=='' || cantidad1Desc=='.'){
                            cantidad1=0;
                        }

                        if( parseFloat(cantidad1Desc)>0 ){
                            input.classList.add('is-valid')
                        }else{
                            createMessageError(input, chengeNameToMessage(idElement) )
                            countErrors++
                        }

                    }

                }

                if( idElement == 'linkCourseWorks' || idElement == 'nameFacilitador' || idElement == 'positionFacilitador'
                || idElement == 'nameNoteBlog' || idElement == 'dateNoteBlog' || idElement == 'nameFacilitadorNoteBlog' ) {
                    if( valueElement.trim() != '' ) { input.classList.add('is-valid') }
                }

                //valida los cmapos dinamicos de la modalidad
                if(selectModality.value == 1){
                    if(idElement == 'direction' || idElement == 'location'){
                        if( valueElement.trim() == '' ) {
                            createMessageError(input, chengeNameToMessage(idElement) )
                            countErrors++
                        }
                        else { input.classList.add('is-valid') }
                    }
                }else if(selectModality.value == 2){
                    if(idElement == 'notes' || idElement == 'linkconection'){
                        if( valueElement.trim() == '' ) {
                            createMessageError(input, chengeNameToMessage(idElement) )
                            countErrors++
                        }
                        else { input.classList.add('is-valid') }
                    }
                }else if(selectModality.value == 3){
                    if(idElement == 'direction' || idElement == 'location' || idElement == 'notes' || idElement == 'linkconection'){
                        if( valueElement.trim() == '' ) {
                            createMessageError(input, chengeNameToMessage(idElement) )
                            countErrors++
                        }
                        else { input.classList.add('is-valid') }
                    }
                }

                

                
            }
        });

        const selects = idForm.querySelectorAll('select')
        selects.forEach( (select, i) => {
            const valueElement = select.value
            const idElement = select.id
            destroyMessageError(idForm, select)
            if( idElement == 'category' || idElement == 'modality' || idElement == 'disponible' || idElement == 'check_descuento'
            || idElement == 'startDateDay' || idElement == 'startDateMonth' || idElement == 'startDateYear' 
            || idElement == 'endDateDay' || idElement == 'endDateMonth' || idElement == 'endDateYear'  ) {
                if( valueElement == '----' || valueElement.trim() == '' ) {
                    createMessageError(select, chengeNameToMessage(idElement) )
                    countErrors++
                }
                else { select.classList.add('is-valid') }
            }

            if( idElement == 'tipo_descuento' || idElement == 'descuento_estado' || 
                idElement == 'dia1' || idElement == 'mes1' || idElement == 'anio1' || idElement == 'hora1' || idElement == 'min1' || 
                idElement == 'dia2' || idElement == 'mes2' || idElement == 'anio2' || idElement == 'hora2' || idElement == 'min2' ) {

                let check_descuento = $('#check_descuento').val();
                if(check_descuento=='1'){ check_descuento=true; }else{ check_descuento=false; }

                if(check_descuento==true){

                    if( valueElement == '----' || valueElement.trim() == '' ) {
                        createMessageError(select, chengeNameToMessage(idElement) )
                        countErrors++
                    }
                    else { select.classList.add('is-valid') }

                }

            }
        });

        countErrors += validateDates(idForm)

        return countErrors
    }
}

/** Obtiene los valores de todos los input dentro de formulario actual
 * 
 * @param {string} idForm _ ID del formulario actual a interactuar
 * @returns 
 */
const getDataForm = (idForm) => {
    let exisData = false
    const inputsEval = idForm.querySelectorAll('input')
    inputsEval.forEach( (input, i) => {
        const valueElement = input.value
        const typeElement = input.type
        const idElement = input.id
        if( idElement == 'tipo' ) datosForm.id = valueElement
        
        if( idElement == 'thumbHead' ) datosForm.existImageHead = valueElement
        //if( idElement == 'thumbHead' ) datosForm.existThumsHead = valueElement
        if( idElement == 'thumbCours' ) datosForm.existImageThumd = valueElement
        if( idElement == 'thumbFacilitador' ) datosForm.existImageProfil = valueElement
        if( idElement == 'thumbNote' ) datosForm.existImageBlog = valueElement

        if( idElement == 'sku' ) datosForm.sku = valueElement
        if( idElement == 'nameCourseWorks' ) datosForm.nameCourseWorks = valueElement
        if( idElement == 'duration' ) datosForm.duration = valueElement 
        if( idElement == 'linkCourseWorks' ) datosForm.linkCourseWorks = valueElement
        if( idElement == 'preciomx' ) datosForm.preciomx = valueElement
        if( idElement == 'existIdDescto' ) datosForm.idDescto = valueElement
        if( idElement == 'cantidad1' ) datosForm.quantityDescto = valueElement
        if( idElement == 'preciodescuento' ) datosForm.preciomxDescto = valueElement

        if( idElement == 'nameFacilitador' ) datosForm.nameFacilitador = valueElement
        if( idElement == 'positionFacilitador' ) datosForm.positionFacilitador = valueElement
        if( idElement == 'nameNoteBlog' ) datosForm.nameNoteBlog = valueElement
        if( idElement == 'dateNoteBlog' ) datosForm.dateNoteBlog = valueElement
        if( idElement == 'nameFacilitadorNoteBlog' ) datosForm.nameFacilitadorNoteBlog = valueElement
        if( idElement == 'linkNoteBlog' ) datosForm.linkNoteBlog = valueElement
        if( idElement == 'stock' ) datosForm.stock = valueElement
        if( idElement == 'direction' ) datosForm.direction = valueElement
        if( idElement == 'location' ) datosForm.location = valueElement
        if( idElement == 'notes' ) datosForm.notes = valueElement
        if( idElement == 'linkconection' ) datosForm.linkconection = valueElement

        if( idElement == 'whatsFacilitador' ) datosForm.whatsFacilitador = valueElement
        if( idElement == 'telFacilitador' ) datosForm.telFacilitador = valueElement
        if( idElement == 'emailFacilitador' ) datosForm.emailFacilitador = valueElement

    });

    const selects = idForm.querySelectorAll('select')
    selects.forEach( (select, i) => {
        const valueElement = select.value
        const idElement = select.id
        if( idElement == 'category' ) datosForm.category = valueElement
        if( idElement == 'modality' ) datosForm.modality = valueElement
        
        if( idElement == 'check_descuento' ) datosForm.checkDescto = valueElement
        if( idElement == 'tipo_descuento' ) {
            valueElement == '----' ? datosForm.typeDescto = '' : datosForm.typeDescto = valueElement;
        }
        if( idElement == 'dia1' ) {
            valueElement == '----' ? datosForm.oneDay = '' : datosForm.oneDay = valueElement;
        }
        if( idElement == 'mes1' ) {
            valueElement == '----' ? datosForm.oneMonth = '' : datosForm.oneMonth = valueElement;
        }
        if( idElement == 'anio1' ) {
            valueElement == '----' ? datosForm.oneYear = '' : datosForm.oneYear = valueElement;
        }
        if( idElement == 'hora1' ) {
            valueElement == '----' ? datosForm.oneHour = '' : datosForm.oneHour = valueElement;
        }
        if( idElement == 'min1' ) {
            valueElement == '----' ? datosForm.oneMinute = '' : datosForm.oneMinute = valueElement;
        }
        if( idElement == 'dia2' ) {
            valueElement == '----' ? datosForm.twoDay = '' : datosForm.twoDay = valueElement;
        }
        if( idElement == 'mes2' ) {
            valueElement == '----' ? datosForm.twoMonth = '' : datosForm.twoMonth = valueElement;
        }
        if( idElement == 'anio2' ) {
            valueElement == '----' ? datosForm.twoYear = '' : datosForm.twoYear = valueElement;
        }
        if( idElement == 'hora2' ) {
            valueElement == '----' ? datosForm.twoHour = '' : datosForm.twoHour = valueElement;
        }
        if( idElement == 'min2' ) {
            valueElement == '----' ? datosForm.twoMinute = '' : datosForm.twoMinute = valueElement;
        }
        if( idElement == 'descuento_estado' ) {
            valueElement == '----' ? datosForm.statusDescto = '' : datosForm.statusDescto = valueElement;
        }
        //if( idElement == 'preciodescuento' ) datosForm.priceDescto = valueElement

        if( idElement == 'disponible' ) datosForm.isPublished = valueElement
    });

    datosForm.finalStartDate = finalStartDate
    datosForm.finalEndDate = finalEndDate
    
    datosForm.editorCorta = editorCorta.getData()
    datosForm.editorLarga = editorLarga.getData()
    datosForm.editorIncluye = editorIncluye.getData()
    datosForm.editorEsquema = editorEsquema.getData()

    let imagenThumbHeader = JSON.parse(sessionStorage.getItem('imgsThumb'));
    let imagenThumbMini = JSON.parse(sessionStorage.getItem('imgsThumbCub'));

    if(imagenThumbHeader != null){
        dataThumbHeader.thumbHeader = imagenThumbHeader.img_1;
        dataThumbHeader.thumbHeader2 = imagenThumbHeader.img_2;
        dataThumbHeader.thumbHeader3 = imagenThumbHeader.img_3;
    }

    if(imagenThumbMini != null){
        dataThumbMini.thumbMini = imagenThumbMini.img_1;
        dataThumbMini.thumbMini2 = imagenThumbMini.img_2;
        dataThumbMini.thumbMini3 = imagenThumbMini.img_3;
    }
    if( dataThumbHeader.thumbHeader != '' || dataThumbHeader.thumbHeader2 != '' || dataThumbHeader.thumbHeader3 != '' ) { datosForm.thumsHead = dataThumbHeader }
    if( dataThumbMini.thumbMini != '' ||  dataThumbMini.thumbMini2 != '' ||  dataThumbMini.thumbMini3 != '' ) { datosForm.thumsMini = dataThumbMini }

    if( sessionStorage.getItem('imgFacilitador') != '' ) { datosForm.profile = sessionStorage.getItem('imgFacilitador') }
    else { datosForm.profile = ''; }
    if( sessionStorage.getItem('imgNote') != '' ) { datosForm.thumgBlog = sessionStorage.getItem('imgNote') }
    else { datosForm.thumgBlog = ''; }

    if( datosForm.hasOwnProperty('linkNoteBlog') && datosForm.hasOwnProperty('isPublished') ) {
        exisData = true
    }
    return exisData
}

/** Inicializa las fechas de inicio de fin
 * 
 * @param {*} type 
*/
const initDates = (type, days, months, years) => {
    if( type == 0 ) {
        let optionsDay = `<option value='----' >DD</option>`, optionsDayEnd = `<option value='----'>DD</option>`;
        let splitDay = ''
        if( days != '' ) { splitDay = days.split('|') }
        for(let i = 1; i < 32; i++) {
            let optionSelected = '', optionSelected2 = '';
            if( days != '' ) {
                if( i == parseInt(splitDay[0]) ) optionSelected = 'selected'
                if( i == parseInt(splitDay[1]) ) optionSelected2 = 'selected'
            }
            if( i < 10 ) i = `0${i}`
            optionsDay += `<option value="${i}" ${optionSelected} >${i}</option>`;
            optionsDayEnd += `<option value="${i}" ${optionSelected2} >${i}</option>`;
        }
        document.querySelector(`#startDateDay`).innerHTML = optionsDay
        document.querySelector(`#endDateDay`).innerHTML = optionsDayEnd

        let optionsMonth = `<option value='----' >MM</option>`, optionsMonth2 = `<option value='----' >MM</option>`;
        const namesMonth = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
        let splitMonth = ''
        if( months != '' ) { splitMonth = months.split('|') }
        for(let i = 0; i < 12; i++) {
            let optionSelected = '', optionSelected2 = '';
            if( months != '' ) {
                let valueMonth = parseInt(splitMonth[0]) - 1
                let valueMonth2 = parseInt(splitMonth[1]) - 1
                if( i == valueMonth ) optionSelected = 'selected'
                if( i == valueMonth2 ) optionSelected2 = 'selected'
            }
            if( i < 10 ) i = `0${i}`
            optionsMonth += `<option value="${i}" ${optionSelected} >${namesMonth[parseInt(i)]}</option>`;
            optionsMonth2 += `<option value="${i}" ${optionSelected2} >${namesMonth[parseInt(i)]}</option>`;
        }
        document.querySelector(`#startDateMonth`).innerHTML = optionsMonth
        document.querySelector(`#endDateMonth`).innerHTML = optionsMonth2

        let optionsYear = `<option value='----' >YYYY</option>`, optionsYear2 = `<option value='----' >YYYY</option>`;
        let splitYears = ''
        if( years != '' ) { splitYears = years.split('|') }
        const today = new Date()
        const year = today.getFullYear()
        const maxYear = year + 6
        for(let i = year; i < maxYear; i++) {
            let optionSelected = '', optionSelected2 = '';
            if( years != '' ) {
                if( i == parseInt(splitYears[0]) ) optionSelected = 'selected'
                if( i == parseInt(splitYears[1]) ) optionSelected2 = 'selected'
            }
            if( i < 10 ) i = `0${i}`
            optionsYear += `<option value="${i}" ${optionSelected} >${i}</option>`;
            optionsYear2 += `<option value="${i}" ${optionSelected2} >${i}</option>`;
        }
        document.querySelector(`#startDateYear`).innerHTML = optionsYear
        document.querySelector(`#endDateYear`).innerHTML = optionsYear2
    }
    if( type == 1) {
        const inpputStartDate = document.querySelector(`#inpputStartDate`).value
        const inpputEndDate = document.querySelector(`#inpputEndDate`).value

        const splitInpputStartDate = inpputStartDate.split('-')
        const splitInpputEndDate = inpputEndDate.split('-')
        initDates(0, `${splitInpputStartDate[2]}|${splitInpputEndDate[2]}`, `${splitInpputStartDate[1]}|${splitInpputEndDate[1]}`, `${splitInpputStartDate[0]}|${splitInpputEndDate[0]}`) 
    }
}
/** Inicializa CKEditor
 * 
 * @param {*} idForm : ID del formulario a afectar
*/
const initCkeditor = (idForm) => {
    if( idForm.querySelector("#descripcion_corta") ) {
        CKEDITOR.ClassicEditor.create(idForm.querySelector("#descripcion_corta"), dataCkeditor())
        .then( editor => {
            editorCorta = editor
            const wordCountPlugin = editor.plugins.get( 'WordCount' );
            const wordCountWrapper = idForm.querySelector( '#conteo1' );
            wordCountWrapper.appendChild( wordCountPlugin.wordCountContainer );
        } )
        .catch( erro => {
            console.log(erro)
            Swal.fire({
                icon: 'error',
                title: 'Error al iniciaclizar editor de descripción corta',
                text: erro,
            })
        });
    }

    if( idForm.querySelector("#descripcion_larga") ) {
        CKEDITOR.ClassicEditor.create(idForm.querySelector("#descripcion_larga"),dataCkeditor())
        .then( editor => {
            editorLarga = editor
            const wordCountPlugin = editor.plugins.get( 'WordCount' );
            const wordCountWrapper = idForm.querySelector( '#conteo2' );
            wordCountWrapper.appendChild( wordCountPlugin.wordCountContainer );
        } )
        .catch( erro => {
            console.log(erro)
            Swal.fire({
                icon: 'error',
                title: 'Error al iniciaclizar editor de descripción larga',
                text: erro,
            })
        });
    }

    if( idForm.querySelector("#incluyeDescripcion") ) {
        CKEDITOR.ClassicEditor.create(idForm.querySelector("#incluyeDescripcion"), dataCkeditor())
        .then( editor => {
            editorIncluye = editor
            const wordCountPlugin = editor.plugins.get( 'WordCount' );
            const wordCountWrapper = idForm.querySelector( '#conteo3' );
            wordCountWrapper.appendChild( wordCountPlugin.wordCountContainer );
        } )
        .catch( erro => {
            console.log(erro)
            Swal.fire({
                icon: 'error',
                title: 'Error al iniciaclizar editor de lo que incluye el curso',
                text: erro,
            })
        });
    }

    if( idForm.querySelector("#esquemaCurso") ) {
        CKEDITOR.ClassicEditor.create(idForm.querySelector("#esquemaCurso"), dataCkeditor())
        .then( editor => {
            editorEsquema = editor
            const wordCountPlugin = editor.plugins.get( 'WordCount' );
            const wordCountWrapper = idForm.querySelector( '#conteo4' );
            wordCountWrapper.appendChild( wordCountPlugin.wordCountContainer );
        } )
        .catch( erro => {
            console.log(erro)
            Swal.fire({
                icon: 'error',
                title: 'Error al iniciaclizar editor de esquema de curso',
                text: erro,
            })
        });
    }
}


const loadAll = () => {
    let formCoursesWorks = '';
    if( document.querySelector(`#crearCoursesWorks`) ) {
        formCoursesWorks = document.querySelector(`#crearCoursesWorks`)
        datosForm.methodUsed = 'create'
        initDates(0, 0, 0, 0)
    }
    if( document.querySelector(`#editarCoursesWorks`) ) {
        formCoursesWorks = document.querySelector(`#editarCoursesWorks`)
        datosForm.methodUsed = 'update'
        initDates(1, 0, 0 ,0)
    }

    // Existe un formulario para mostrar
    if( formCoursesWorks != '' ) {
        initCkeditor(formCoursesWorks)

        dataThumbHeader.thumbHeader = ''
        dataThumbHeader.thumbHeader2 = ''
        dataThumbHeader.thumbHeader3 = ''
        dataThumbMini.thumbMini = ''
        dataThumbMini.thumbMini2 = ''
        dataThumbMini.thumbMini3 = ''

        formCoursesWorks.addEventListener('submit', (e) => {
            e.preventDefault()
            // console.log(datosForm);
            // console.log('validar')
            if( validData(formCoursesWorks, 0) == 0 ) {
                if( getDataForm(formCoursesWorks) ) {
                    document.querySelector(`#contentSpinner`).removeAttribute('style')
                    $.ajax({
                        type: 'POST',  // Envío con método POST
                        url: 'includes/modelo/crearEditarCursosTalleres.php',  // Fichero destino (el PHP que trata los datos)
                        // data: $(this).serialize(),
                        data: datosForm, // Datos que se envían
                        dataType  : 'json',
                    })
                    .done(function( response ) {  // Función que se ejecuta si todo ha ido bien
                        // console.log(response);
                        if( response.status ) {
                            document.querySelector(`#contentSpinner`).style.display = 'none'
                            Swal.fire({
                                icon: 'success',
                                html: response.message,
                                text: ``,
                            })
                            .then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                    if( datosForm.methodUsed == 'create' ) location.href = `index.php?id=diploma_curos_talleres`
                                    // if( datosForm.methodUsed == 'update' ) location.href = `/components/dashadmin/index.php?id=editar-diplomasCurosTaller:${datosForm.id}`
                                    if( datosForm.methodUsed == 'update' ) location.href = `index.php?id=diploma_curos_talleres`
                                }
                            })
                        }
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: response.message,
                                text: ``,
                            })
                            document.querySelector(`#contentSpinner`).style.display = 'none'
                        }

                    })
                    .fail(function (jqXHR, textStatus, errorThrown){ // Función que se ejecuta si algo ha ido mal
                        // console.log(jqXHR);
                        console.log(jqXHR, textStatus, errorThrown);
                        document.querySelector(`#contentSpinner`).style.display = 'none'
                   });


                }
            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'Se encontraron errores',
                    text: 'Verifique los datos ingresados',
                })
            }
        })
        formCoursesWorks.addEventListener('click', (e) => {
            if( e.target ) {
                const elementClick = e.target
                const idElement = elementClick.id
                const nameTag = elementClick.tagName
                if( elementClick.type != 'submit' ) {
                    // console.log('click');
                }
            }
        })
        formCoursesWorks.addEventListener('keyup', (e) => {
            if( e.target ) {
                const elementClick = e.target
                const idElement = elementClick.id
                const nameTag = elementClick.tagName
                if( elementClick.type != 'submit' ) {
                    if( idElement == 'cantidad1' ) {

                        /*
                        const preciomx = formCoursesWorks.querySelector(`#preciomx`)
                        const typeDescto = formCoursesWorks.querySelector(`#tipo_descuento`)
                        if( typeDescto.value != '----' ) {
                            if( typeDescto.value == 'Dinero' ){
                                let totalDesto = 0;
                                totalDesto = parseFloat(preciomx.value) - parseFloat(elementClick.value)
                                formCoursesWorks.querySelector(`#preciodescuento`).value = totalDesto
                            }
                            if( typeDescto.value == 'Porcentaje' ) {
                                let totalDesto = 0, porcentaje = 0;
                                porcentaje = (parseFloat(elementClick.value) * parseFloat(preciomx.value) ) / 100
                                totalDesto = parseFloat(preciomx.value) - parseFloat(porcentaje)
                                formCoursesWorks.querySelector(`#preciodescuento`).value = totalDesto
                            }
                        }
                        */
                    }
                }
            }
        })
        formCoursesWorks.addEventListener('change', (e) => {
            if( e.target ) {
                const elementChange = e.target
                const idElement = elementChange.id
                const nameTag = elementChange.tagName
                if( nameTag == 'SELECT' ) {
                    if( idElement == 'check_descuento' ) {
                        parseInt(elementChange.value) == 1 ? $(`#div_descuento`).fadeIn() : $(`#div_descuento`).fadeOut()
                    }
                }

            }
        })
    }

}


function limpiardescuento(){

  $('#tipo_descuento')[0].selectedIndex = 0;
  $('#cantidad1').val('');
  //$('#cantidad2').val('');

  $('#dia1')[0].selectedIndex = 0;
  $('#mes1')[0].selectedIndex = 0;
  $('#anio1')[0].selectedIndex = 0;
  $('#hora1')[0].selectedIndex = 0;
  $('#min1')[0].selectedIndex = 0;


  $('#dia2')[0].selectedIndex = 0;
  $('#mes2')[0].selectedIndex = 0;
  $('#anio2')[0].selectedIndex = 0;
  $('#hora2')[0].selectedIndex = 0;
  $('#min2')[0].selectedIndex = 0;
  
  $('#descuento_estado')[0].selectedIndex = 0;
  $('#preciodescuento').val('');
  //$('#precio2descuento').val('');
  
  $('#span_lblmxn').hide();
  //$('#div_cantidad2').hide();

}

function calcular_descuentomxn(){

    if( $('#tipo_descuento').val()!='----' ){

        if( /*$('#precio').val()!=''*/ $('#preciomx').val()!='' && $('#cantidad1').val()!='.' && $('#cantidad1').val()!='' ){

            if( $('#tipo_descuento').val()=='Porcentaje' ){

                var preciosiniva=parseFloat( $('#preciomx').val() );
                //var precio=parseFloat( $('#precio').val() );
                var cantidad_descuento= parseFloat( $('#cantidad1').val() ) / 100;

                var preciodescuento= /*precio*/ preciosiniva - ( preciosiniva * (cantidad_descuento) );

                $('#preciodescuento').val( (preciodescuento).toFixed(2) );

            }else if( $('#tipo_descuento').val()=='Dinero' ){

                //var precio=parseFloat( $('#precio').val() );
                var preciosiniva=parseFloat( $('#preciomx').val() );
                var cantidad_descuento= parseFloat( $('#cantidad1').val() ) ;

                var preciodescuento= /*precio*/ preciosiniva - cantidad_descuento;

                $('#preciodescuento').val( (preciodescuento).toFixed(2) );

            } 

        }

    }

}

$('#preciomx').on('input',function(e){
    var input = ($('#preciomx').val().replace(/[^.0-9]/g, ''));

    var resarray = input.split('.');
    if(resarray.length>2){
        input = input.slice(0,-1)
    }

    $('#preciomx').val(`${input}`);

    if( $('#preciomx').val()!='.' && $('#preciomx').val()!='' ){

        var preciomxbase = parseFloat($('#preciomx').val());
        //var iva = parseFloat($('#iva').val());

        //var preciomxiva=preciomxbase*(1+iva);
        //$('#precio').val((preciomxiva).toFixed(2));

        //$('#spanivamx').html(iva);

        
        if( $('#check_descuento').val()=='1' ) {

            calcular_descuentomxn();
  
        }
        

    }else{

        //$('#precio').val('');
        $('#preciodescuento').val('');

    }

    
    
});


$('#check_descuento').on('change', function (e){
 
  limpiardescuento();
  
});


$('#tipo_descuento').on('change', function (e){
   
    var tipo_descuento=$('#tipo_descuento').val();
    
    if(tipo_descuento=="Dinero"){
        $('#span_lblmxn').show();
        //$('#div_cantidad2').show();
    }else{
        $('#span_lblmxn').hide();
        //$('#div_cantidad2').hide();
        //$('#cantidad2').val('');
    }

    if(tipo_descuento!="----"){

        if( $('#tipo_descuento').val()=='Dinero' ){
            //$('#precio2descuento').val('');
        }

        if( $('#check_descuento').val()=='1' ) {

            calcular_descuentomxn();
            //calcular_descuentousd();
        }

    }else{

        $('#preciodescuento').val('');
        //$('#precio2descuento').val('');

    }
    
});

$('#cantidad1').on('input',function(e){
    var input = ($('#cantidad1').val().replace(/[^.0-9]/g, ''));

    var resarray = input.split('.');
    if(resarray.length>2){
        input = input.slice(0,-1)
    }

    $('#cantidad1').val(`${input}`);

    if( $('#cantidad1').val()!='.' && $('#cantidad1').val()!='' ){
        
        if( $('#check_descuento').val()=='1' ) {

            calcular_descuentomxn();

            if( $('#tipo_descuento').val()=='Porcentaje' ){
                //alcular_descuentousd();
            }
  
        }

    }else{

        $('#preciodescuento').val('');

        if( $('#tipo_descuento').val()=='Porcentaje' ){
           // $('#precio2descuento').val('');
        }

    }    
    
});


/** 
 * Evento de select modalidad
 */
const selectModality = document.querySelector('#modality');
selectModality.addEventListener('click', (e) =>{
    if(selectModality.value == 1){
        document.querySelector("#contentDirection").style.display = "block";
        document.querySelector("#contentLinkLocation").style.display = "block";
        document.querySelector("#contentNotes").style.display = "none";
        document.querySelector("#contentLinkConecction").style.display = "none";
    }else if(selectModality.value == 2){
        document.querySelector("#contentNotes").style.display = "block";
        document.querySelector("#contentLinkConecction").style.display = "block";
        document.querySelector("#contentDirection").style.display = "none";
        document.querySelector("#contentLinkLocation").style.display = "none";
    }else if(selectModality.value == 3){
        document.querySelector("#contentDirection").style.display = "block";
        document.querySelector("#contentLinkLocation").style.display = "block";
        document.querySelector("#contentNotes").style.display = "block";
        document.querySelector("#contentLinkConecction").style.display = "block";
    }else{
        document.querySelector("#contentDirection").style.display = "none";
        document.querySelector("#contentLinkLocation").style.display = "none";
        document.querySelector("#contentNotes").style.display = "none";
        document.querySelector("#contentLinkConecction").style.display = "none";
    }
});

if(document.querySelector(`#btnDeleteImage`)){
    const btnDeleteImage = document.querySelector(`#btnDeleteImage`);
    btnDeleteImage.addEventListener('click', (e) =>{
        const band = e.target.dataset.origin; 
        console.log(e.target.dataset);
        if(band == "create"){
            const avatar = document.querySelector('#avatarNota');
            avatar.src = "images/logo_subir_imagen.png";
            if(sessionStorage.getItem("imgNote")){
                sessionStorage.removeItem("imgNote");
            }
           
        }else{
            const avatar = document.querySelector('#avatarNota');
            avatar.src = "images/logo_subir_imagen.png";
            document.querySelector("#thumbNote").value = "";
            let id = document.querySelector("#tipo").value;
            let dataDelete = {};
            dataDelete.accion = "eliminarCertificado";
            dataDelete.course = id;
            

            $.ajax({
                type: 'POST',  
                url: 'includes/modelo/eliminar.php',   
                data: dataDelete, // Datos que se envían
                dataType  : 'json',
            })
            .done(function( response ) {  // Función que se ejecuta si todo ha ido bien
                console.log(response);
                if( response.respuesta == "success" ) {
                    
                    Swal.fire({
                        icon: 'success',
                        html: response.mensaje,
                        text: ``,
                    })
                    .then((result) => {
                        
                        if (result.isConfirmed) {
                            /* if( datosForm.methodUsed == 'create' ) location.href = `index.php?id=diploma_curos_talleres`
                            // if( datosForm.methodUsed == 'update' ) location.href = `/components/dashadmin/index.php?id=editar-diplomasCurosTaller:${datosForm.id}`
                            if( datosForm.methodUsed == 'update' ) location.href = `index.php?id=diploma_curos_talleres` */
                        }
                    })
                }
                else {
                    Swal.fire({
                        icon: 'error',
                        title: response.mensaje,
                        text: ``,
                    })
                    //document.querySelector(`#contentSpinner`).style.display = 'none'
                }

            })
            .fail(function (jqXHR, textStatus, errorThrown){ // Función que se ejecuta si algo ha ido mal
                // console.log(jqXHR);
                console.log(jqXHR, textStatus, errorThrown);
                document.querySelector(`#contentSpinner`).style.display = 'none'
           });

        }

        btnDeleteImage.style.display = "none";
        
    })
}



// Ejecutamos la funcion una vez la estructura de la página y el estilo esten listos
document.addEventListener("DOMContentLoaded", loadAll, false);

// Ejecutamos el código faltante una vez la estructura de la página, los estilos y los script esten listos
window.addEventListener("load", function(){
    document.querySelector(`#contentSpinner`).style.display = 'none'
    sessionStorage.removeItem('imgNote')
    sessionStorage.removeItem('imgsThumb')
    sessionStorage.removeItem('imgFacilitador')
    sessionStorage.removeItem('imgsThumbCub')
})