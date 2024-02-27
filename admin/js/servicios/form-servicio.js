let customForm;
let editorLongDescription;

// Ejecutamos la funcion una vez la estructura de la página y el estilo esten listos
document.addEventListener("DOMContentLoaded", () => {

    customForm = document.querySelector(`#editarCampos`)

    customForm.addEventListener('submit', validateFormFilled);

    fillForm();


}, false);



const validateFormFilled = (e) => {
    console.log('validar');
    e.preventDefault();
    
    $("#contentSpinnerPrimary").show();
    
    let errores = 0;

    let formData = new FormData();
    
    const dataValidate = [
        { name: 'name', legend: 'Proporcione un nombre'}, 
        { name: 'categorie', legend: 'Seleccione una categoría'}, 
        { name: 'show_home', legend: 'Seleccione si se va a mostrar en el home.'},
        { name: 'orden', legend: 'Proporcione un prioridad en el orden junto a los otros servicios'},
        { name: 'publish', legend: 'Seleccione si quiere publicar'}
    ]
    

    dataValidate.every( elementID => {
        
        let validateField = 1;
       
        if(validateField==1){

            const inputForm = customForm.querySelector(`#${elementID.name}`)
            let inputValue = inputForm.value.trim();
            
            if(elementID.name=="show_home" || elementID.name=="publish" ){
                if(inputValue == 0){
                    inputValue = 'cero';
                }
            }

            if( inputValue <= 0 || inputValue == '' || inputValue == '----' || inputValue == '.' ) {
                //console.log('error'+c);
                $("#contentSpinnerPrimary").hide();
                Swal.fire({
                  title:'Oops',
                  html:elementID.legend, 
                  icon:'info',
                  confirmButtonText:'Aceptar',
                  onAfterClose: () => {
                    $(`#${elementID.name}`).focus(); 
                  }
                });

                errores=1;
                return false;

            }else{
                formData.append(`${elementID.name}`,inputForm.value.trim());
                return true;
            }
            
        }else{
            return true;
        }
        
        
    });


    if(errores==0){
        validateFormIntegrity(formData);
    }
    
}


const validateFormIntegrity = (formData) => {

    let errores = 0;
    let msgerror = '';
    let idInputError = '';

    if(errores==0){
        sendFormData(formData);
    }else{

        $("#contentSpinnerPrimary").hide();
        Swal.fire({
          title:'Oops',
          html:msgerror, 
          icon:'info',
          confirmButtonText:'Aceptar',
          onAfterClose: () => {
            $(`#${idInputError}`).focus(); 
          }
        });

    }

}


const sendFormData = (formData) => {
    
    /*campos opcionales*/
    let previewImage1 = customForm.querySelector('#previewImage1');
    if(previewImage1.src.includes('empty_image.png')){ formData.append(`previewImage1`,''); }else{ formData.append(`previewImage1`,previewImage1.src); }
    
   
    formData.append(`longDescription`,editorLongDescription.getData());
    

    
    const operation = customForm.querySelector('#operation').value;

    if(operation==='edit'){
        formData.append(`code`,customForm.querySelector('#code').value);
    }
    
    
    formData.append(`operation`,operation);
    formData.append(`option`,'saveData');
    
    let xhr = new XMLHttpRequest(); //SE CREA UN OBJETO
    xhr.open('POST','controllers/servicios/ServiciosController.php', true); //SE ESPECIFICA EL METODO, A DONDE Y SI ES ASINCRONO
    xhr.onload = function(){

        if(this.status === 200){    //SI LA RESPUESTA ES EXITOSA ENTRA

            let response = JSON.parse(xhr.responseText);
            if(response.response === 'success'){
                 $("#contentSpinnerPrimary").hide();
                Swal.fire(
                    'Correcto',
                    response.message,
                    response.response,
                    'Aceptar'
                ).then((result) => {
                    if(result.value){
                            window.location.href = 'index.php?id=servicios';
                    }
                }) 

            }else{
                $("#contentSpinnerPrimary").hide();
                Swal.fire(
                    'Error',
                    response.message,
                    response.response,
                    'Volver a intentar'
                )

            }

        }else{  //SI ES OTRA RESPUESTA MANDA ERROR
            $("#contentSpinnerPrimary").hide();
            Swal.fire(
                'Error',
                'Error[0]:Sucedio un error al tratar de realizar el guardado de datos.',
                'error',
                'Aceptar'
            )

        }

    }
    xhr.send(formData);   //ENVIAMOS LOS DATOS
    
}



/** Inicializa CKEditor
 * 
 * @param {*} idForm : ID del formulario a afectar
*/
const initCkeditor = (idForm,idInput) => {

    if( idForm.querySelector("#"+idInput) ) {
        CKEDITOR.ClassicEditor.create(idForm.querySelector("#"+idInput), dataCkeditor())
        .then( editor => {
            if(idInput=='longDescription'){ editorLongDescription = editor }
            const wordCountPlugin = editor.plugins.get( 'WordCount' );
            const wordCountWrapper = idForm.querySelector( '#'+idInput+'_count' );
            wordCountWrapper.appendChild( wordCountPlugin.wordCountContainer );
        } )
        .catch( erro => {
            console.log(erro)
            Swal.fire({
                icon: 'error',
                title: 'Error al inicializar editor de '+idInput,
                text: erro,
            })
        });
    }
    
}


const fillForm = () => {

    const operation = customForm.querySelector('#operation').value;
    

    if(operation==='edit'){

    	
        const code = customForm.querySelector('#code').value;

        $.ajax({
            url: 'controllers/servicios/ServiciosController.php',
            method: "POST",
            data: {option: 'getDataEdit',code:code},
            dataType: "json",
            success: function (res) {
                
                if(res.response=='success'){

                	customForm.querySelector('#name').value=res.name;
                    customForm.querySelector('#categorie').value=res.categoria;
                    customForm.querySelector('#longDescription').value=res.descripcion;
                    customForm.querySelector('#show_home').value=res.showHome;
                    customForm.querySelector('#orden').value=res.orden;
                    customForm.querySelector('#publish').value=res.publish;

                    if(res.image!=''){
                        customForm.querySelector('#currentImagen').innerHTML=`<a class="linkForm" href="../images/services/${res.image}" target="_blank">Ver actual</a>`;
                    }
                    

                    initCkeditor(customForm,'longDescription');

                }else{

                    window.location.href = 'index.php?id=servicios';

                }

            },error: function(){
                
                Swal.fire(
                    'Error',
                    'Hubo un error al tratar de obtener los datos del registro.',
                    'error',
                    'Aceptar'
                );
                
            }
            
        });
		

    }else{
        initCkeditor(customForm,'longDescription');
    }

}




$('#orden').on('input',function(e){
    let input = ($('#orden').val().replace(/[^0-9]/g, ''));

    $('#orden').val(`${input}`);
 
});



let urlCropper= 'tools/cropper/cropper.css';
    
let link_cropper = document.createElement( 'link' );

link_cropper.href = urlCropper;

document.getElementsByTagName('head')[0].appendChild(link_cropper);


urlCropper= 'tools/cropper/crop.css';
    
link_cropper = document.createElement( 'link' );

link_cropper.href = urlCropper;

document.getElementsByTagName('head')[0].appendChild(link_cropper);