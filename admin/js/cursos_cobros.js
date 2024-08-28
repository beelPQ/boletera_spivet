
function modalDetalles(code){
    
    document.querySelector("#divModalSize").setAttribute("class","modal-dialog modal-xll");

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

const modalStatus = (code,status,idCompra) => {
    
    if(status==0){
        
        document.querySelector("#divModalSize").setAttribute("class","modal-dialog");
        
        let modalContent = `
            <div class="col-md-12" align="center">
            
                <div class="col-sm-6">
            	    <select class="form-control" id="select_status_pago">
            	        <option value="0" >Pendiente</option>
            	        <option value="1" >Pagado</option>
            	        <option value="2" >Cancelado</option>
            	    </select>
        	    </div>
        	    
        	    <div class="col-sm-12" style="padding-top:20px;">
        	        <button type="button" class="btn botonFormulario" onclick="validateAction(${code},${idCompra})">Guardar</button>
        	    </div>
    	    </div>
	    `;
	    
	    $('.modal-body').html(modalContent);
        $('#divModal').modal();
        $('#titleModal').html('Cambiar estado del pago');
        $('.noloadingsalida').show();
        $('.loadingsalida').hide();
        
    }

	

}



const send_mail_payment = (code,extraMessage='') =>{
    
    $("#contentSpinnerPrimary").show();
    
    if(extraMessage!=''){
        extraMessage=extraMessage+'<br>';
    }
    
    
    let formData = new FormData();

	formData.append('requestOrigin',"Payment");
	formData.append('code',code);
	
	$.ajax({
		data: formData,
		url: '../templates/spivet_pq_tm/php/email/sendMail.php',
		processData: false,
   		contentType: false,
   		dataType: 'json',
		type: 'POST',
		success: function(result){

			if(result.status_code==200){
			    
                $("#contentSpinnerPrimary").hide();
    
                Swal.fire({
                   title:'Correcto',
                   html: extraMessage+result.message, 
                   icon:'success',
                   confirmButtonText:'Aceptar',
                   customClass: {  confirmButton: 'confirm-btn-alert' },
                });
    
            }else{
    
                //console.log('Correo no enviado');
    
                $("#contentSpinnerPrimary").hide();
    
                Swal.fire({
                   title:'Error',
                   html:extraMessage+"No se pudo enviar el correo del pago<br>", 
                   icon:'error',
                   confirmButtonText:'Aceptar',
                   customClass: {  confirmButton: 'confirm-btn-alert' },
                });
    
            }
		    
		   
		},
		error: function(error){
		   
		    $("#contentSpinnerPrimary").hide();
		    
		    Swal.fire(
                'Error',
                extraMessage+'Ocurrió un error al tratar enviar el correo del pago',
                'error',
                'Volver a intentar'
            );
		   
		}
    });
    
}


const validateAction = (code, idCompra) => {
    const actionSelected = document.querySelector(`#select_status_pago`).value || "";
    let textMessageAction = "";
    if( actionSelected == 0 ){
        textMessageAction = "<strong>pendiente</strong>";
    }else if( actionSelected == 1 ){
        textMessageAction = "<strong>pagado</strong>";
    }else if( actionSelected == 2 ){
        textMessageAction = "<strong>cancelado</strong>";
    }
    Swal.fire({
      title: "Cambiar status de pago",
      html: `¿Seguro que deseas cambiar el status de la copra ${idCompra} a ${textMessageAction} ?`,
      icon: "question",
      showCancelButton: true,
      //confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si cambiar status",
      cancelButtonText : "Cancelar"
    }).then((result) => {
      if (result.isConfirmed) {
        save_status(code);
      }
    });
}

const save_status = (code) =>{
    
    $("#contentSpinnerPrimary").show();
    
    let select_status_pago = document.getElementById('select_status_pago').value;
    
    let formData = new FormData();

	formData.append('spago',select_status_pago);
	formData.append('code',code);
	formData.append('option','SaveStatusCobro');
	
	$.ajax({
		data: formData,
		url: 'controllers/cobros/CobroController.php',
		processData: false,
   		contentType: false,
   		dataType: 'json',
		type: 'POST',
		success: function(resultado){

			//$("#cellStatusPago"+code).html(resultado.lblpago);
		

		    /*
		    if(resultado.respuesta=='success'){
		    	$("#btnCloseDetail").click();
		    }
		    */
		    
		    if(resultado.respuesta=='success'){
		        
		        $("#divModalCloseBtn").click();
		 
		        if(select_status_pago=='1'){
		        
    		        document.querySelector("#cellStatusPago"+code).innerHTML = '<span class="textActive">Pagado</span>';
    		        
    		        send_mail_payment(code,resultado.mensaje);
    		        
    		    }else if(select_status_pago=='2'){
    		        
    		        $("#contentSpinnerPrimary").hide();
    		        
    		        document.querySelector("#cellStatusPago"+code).innerHTML = '<span class="textCanceled">Cancelado</span>';
    		        
    		        Swal.fire(
                        'Guardado',
                        resultado.mensaje,
                        resultado.respuesta,
                        'Volver a intentar'
                    );
    		        
    		    }else{
    		        
    		        $("#contentSpinnerPrimary").hide();
    		        
    		        Swal.fire(
                        'Guardado',
                        resultado.mensaje,
                        resultado.respuesta,
                        'Volver a intentar'
                    );
    		        
    		    }
    		    
    		    
		    }else{
		        
		        $("#contentSpinnerPrimary").hide();
		        
		         Swal.fire(
                    'Guardado',
                    resultado.mensaje,
                    resultado.respuesta,
                    'Volver a intentar'
                );
		        
		    }
		    
		   
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

