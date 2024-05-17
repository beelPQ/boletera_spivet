

const cleanFilePay = () => {

    document.querySelector('#comprobante').value='';
    $('#SpanNameFile').html('');
    document.getElementById('BtnCleanInputFile').hidden=true;

}


const showDetails = () => {

    document.getElementById('svg-plus').style.display='none';
    document.getElementById('details_purchase').style.display='block';
    document.getElementById('svg-minus').style.display='block';

}

const hideDetails = () => {

    document.getElementById('svg-plus').style.display='block';
    document.getElementById('details_purchase').style.display='none';
    document.getElementById('svg-minus').style.display='none';

}

const preccedSend = () => {
    try {

        let inputfile = document.querySelector('#comprobante').value;
    
        if( inputfile=="" ){

            Swal.fire({
                icon: 'error',
                // title: 'Oops...',
                customClass: {
                    confirmButton: 'swal2-customBtn1'
                },
                text: 'Debe adjuntar su comprobante',
                allowOutsideClick: false,
                allowEscapeKey: false
            })

        }else{

            sendForm();            

        }



    } catch ( err ){
        console.log("Catch - Al procesar el envio: ", err);
    }
}


const sendForm = () => {

    document.querySelector('.spinner').style.display = 'flex'
    console.log("si llega asta aqui");
    let inputFile = document.getElementById("comprobante");
    let file = inputFile.files[0];

    let code1= document.getElementById("code1").value;

    let datos = new FormData();
    
    datos.append('comprobante',file);
    datos.append('code1',code1);
    
    $.ajax({
        url: '/modules/mod_form_attach_file/tmpl/acciones/save_comprobante.php',
        method: "POST",
        data:datos,
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false, 
        success: function (respuesta) {
            const response = JSON.parse(respuesta);
            if(response.status){
                
                document.querySelector('.spinner').style.display = 'none'
                Swal.fire({
                    icon: 'success', 
                    customClass: {
                        confirmButton: 'swal2-customBtn2'
                    },
                    html: '<span class="alertsw2_text1">¡Comprobante de pago enviado con éxito!</span>',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    confirmButtonText: `CERRAR`
                }).then((result) => {
                    if(result.value){ 
                        window.location.href = '/'; 
                    }
                }) 
                
                
            }else{
                
                document.querySelector('.spinner').style.display = 'none'
                Swal.fire({
                    icon: 'error',
                    // title: 'Oops...',
                    customClass: {
                        confirmButton: 'swal2-customBtn1'
                    },
                    html: response.message,
                    confirmButtonText: `CERRAR`,
                    allowOutsideClick: false,
                    allowEscapeKey: false
                })
                
            }
        
        },error: function(){
           document.querySelector('.spinner').style.display = 'none'
           Swal.fire({
                icon: 'error',
                // title: 'Oops...',
                customClass: {
                    confirmButton: 'swal2-customBtn1'
                },
                text: 'Error[0]: ocurrió un error al tratar de subir el comprobante.',
                allowOutsideClick: false,
                allowEscapeKey: false
            })
            
        }
        
    });

}


window.addEventListener("DOMContentLoaded", () => {
    const contenedor = document.querySelector(".content-page");
    if(document.querySelector(".card-personalizado")){
        contenedor.classList.remove("content-min");
        console.log("existe")
    }else{
        contenedor.classList.add("content-min");
        console.log("no existe")
    }
})