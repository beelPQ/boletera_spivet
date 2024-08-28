var checkbox = $('input[data-id="editar-lista"]'); 
var datosArray = [];
// for(var i=0 ; i<checkbox.length ; i++){
//     checkbox[i].addEventListener("change", validaCheckbox, false);
// }

function validaCheckbox(){
    
    datosArray.push($(this).attr('id')); //AGREGAMOS EL VALOR DE ID 
    if( $(this).prop('checked') ) { //SI SE SELECCIONA ENTRA
        
        document.getElementById('numeroAccion').innerHTML = `<span>${datosArray}</span>`; //AGREGAMOS AL HTML ESPECIFICAMENTE AL ID="numeroaccion" EL SPAN CON datosArray.
    }else{  //SI NO SE PRESIONO SELECCIONO Y MAS BIEN SE DESELECCIONO

        datosArray = removeItemFromArr(datosArray, `${$(this).attr('id')}`);   //LLAMAMOS AL METODO Y MANDAMOS LOS DATOS DEL ARRAY Y EL VALOR QUE QUEREMOS QUE SE ELIMINE Y LO SOBREESCRIBIMOS EN EL ARRAY
        document.getElementById('numeroAccion').innerHTML = `<span>${datosArray}</span>`;   //AGREGAMOS AL SPAN EL NUEVO ARRAY CON EL DATO QUE SE ELIMINO POR MEDIO DE LA FUNCION
        
    }

  
}

//FUNCION PARA ELIMINAR UN REGISTRO DEL ARRAY QUE OBTENEMOS DE LAS TABLAS
function removeItemFromArr( arr, item ) {
    return arr.filter( function( e ) {
        return e !== item;
    } );
}