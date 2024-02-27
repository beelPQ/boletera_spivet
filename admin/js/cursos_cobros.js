
function modalDetalles(code){

    $('.loadingsalida').show();
    $('.noloadingsalida').hide();

    $.post('includes/funciones/modales.php', {code:code,opcion:"modalDetalleCursosCobro"},function(data){
        $('.modal-body').html(data);
        $('#divModal').modal();
        $('#titleModal').html('Detalles del pago');
        $('.noloadingsalida').show();
        $('.loadingsalida').hide();

        
    });

}

/*
const enable_detail = (thisbtn) => {

	let select_status_pago = document.getElementById('select_status_pago');

	if(select_status_pago.value!='1'){

		select_status_pago.disabled=false;
		
	}  

	document.getElementById('btnSaveDetail').disabled=false;
	thisbtn.disabled=true;

}
*/


const save_detail = (code) =>{

	$("#contentSpinnerPrimary").show();

	let formData = new FormData();

	//formData.append('spago',document.getElementById('select_status_pago').value);
	formData.append('notesPayment',document.querySelector('#notesPayment').value);
	formData.append('code',code);
	formData.append('opcion','SaveDetalleCursosCobro');


	$.ajax({
		data: formData,
		url: 'includes/funciones/modales.php',
		processData: false,
   		contentType: false,
   		dataType: 'json',
		type: 'POST',
		success: function(resultado){

			//$("#cellStatusPago"+code).html(resultado.lblpago);
		
		    $("#contentSpinnerPrimary").hide();

		    /*
		    if(resultado.respuesta=='success'){
		    	$("#btnCloseDetail").click();
		    }
		    */
		    
	        Swal.fire(
                'Guardado',
                resultado.mensaje,
                resultado.respuesta,
                'Volver a intentar'
            );
		    
		   
		},
		error: function(error){
		   
		    $("#contentSpinnerPrimary").hide();
		    
		    Swal.fire(
                'Error',
                'Ocurrió un error al tratar de guardar los datos',
                'error',
                'Volver a intentar'
            );
		   
		}
    });

}


document.addEventListener("click", (e) => {
    
   
        
    if( e.target ) {

        let element = e.target;
        let elementID = e.target.id;
        let elementClass = e.target.classList;
        
        if(elementID=='btnEditSave'){

            if(element.dataset.process=="false"){

            	document.querySelector('#notesPayment').removeAttribute("disabled");
            	document.querySelector('#notesPayment').setAttribute("placeholder","Ingrese las notas del cobro...");
            	document.querySelector('#notesPayment').focus();

            	element.dataset.process="true";
            	element.innerHTML='Guardar';


            }else if(element.dataset.process=="true"){

            	save_detail(element.dataset.idmodal);

            }

        }else if( elementID=='iconDeployItems' ){

        	if(element.dataset.deploy=="plus"){

            	element.src='images/icon-minus-fill.svg';
            	element.dataset.deploy="minus";


            	let rowItems = document.querySelectorAll('.payment_item');

			    rowItems.forEach(function(rowItem) {
			        rowItem.removeAttribute("hidden");
			    });


            }else if(element.dataset.deploy=="minus"){

            	element.src='images/icon-plus-fill.svg';
            	element.dataset.deploy="plus";
            	
            	let rowItems = document.querySelectorAll('.payment_item');

			    rowItems.forEach(function(rowItem) {
			        rowItem.setAttribute("hidden","");
			    });

            }


        }
        
        
        
    }
    
    
})

