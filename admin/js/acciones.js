$(document).ready(function () {
    
    //esta función es para los Datatables con checkbox implementados manualmente
    $('#editarRegistro').on('click', function (e) {
        var id = $('div#numeroAccion span').text(); //OBTENEMOS LO QUE TIENE EL SPAN
        if (id === '') {
          Swal.fire(
            'Ops',
            'Debes seleccionar primero un registro',
            'error',
            'Aceptar'
          );
        } else {
    
          var arrayId = id.split(',');
          if (arrayId.length > 1) {
    
            Swal.fire(
              'Oops',
              'Para editar solo tienes que seleccionar 1 registro',
              'error',
              'Aceptar'
            );
    
          }else{
              var tipo = arrayId[0].split(':')[0];
              if(tipo=='prospectos'){
                  var estado=arrayId[0].split(':')[2];
                  if(estado==4){
                     Swal.fire(
                      'Oops',
                      'Este prospecto está deshabilitado',
                      'error',
                      'Aceptar'
                    ); 
                  }
                  else{
                      window.location.href = `index.php?id=editar-${arrayId[0]}`;
                  }
              }else if(tipo=='cobro'){
                  var estado=arrayId[0].split(':')[2];
                  if(estado==1){
                     Swal.fire(
                      'Oops',
                      'Este cobro ya ha sido pagado',
                      'error',
                      'Aceptar'
                    ); 
                  }
                  else{
                      var matriculado=arrayId[0].split(':')[3];
                      if(matriculado!='' && matriculado!=null){
                          Swal.fire(
                              'Oops',
                              'El prospecto ya está matriculado',
                              'error',
                              'Aceptar'
                          ); 
                          
                      }else{
                          var adjunto=arrayId[0].split(':')[4];
                          if(adjunto!='' && adjunto!=null){
                              Swal.fire(
                                  'Oops',
                                  'Al cobro ya le han adjuntado un comprobante de pago.',
                                  'error',
                                  'Aceptar'
                              ); 
                              
                          }else{
                              window.location.href = `index.php?id=editar-${arrayId[0]}`;
                          }
                          
                      }
                      
                  }
                  
              }else{
                  
                  window.location.href = `index.php?id=editar-${arrayId[0]}`;
              }
              
          }
    
        }
    
    });

    //esta función es para los Datatables con checkbox implementados de la propia libreria de los datatables
    $('#editarRegistro2').on('click', function (e) {

        var rows_selected = table.column(0).checkboxes.selected();
        var cadenaids='';
        var c=0;
        $.each(rows_selected, function(index, rowId){
            //alert(rowId);
            if(c>0){
               cadenaids+=','; 
            }
            cadenaids+=rowId;
            c++;
        });

        //var id = $('div#numeroAccion span').text(); //OBTENEMOS LO QUE TIENE EL SPAN
        var id = cadenaids;

        if (id === '') {
          Swal.fire(
            'Ops',
            'Debes seleccionar primero un registro',
            'error',
            'Aceptar'
          );
        } else {
    
          var arrayId = id.split(',');
          if (arrayId.length > 1) {
    
            Swal.fire(
              'Oops',
              'Para editar solo tienes que seleccionar 1 registro',
              'error',
              'Aceptar'
            );
    
          }else{
              var tipo = arrayId[0].split(':')[0];
              if(tipo=='prospectos'){
                  var estado=arrayId[0].split(':')[2];
                  if(estado==4){
                     Swal.fire(
                      'Oops',
                      'Este prospecto está deshabilitado',
                      'error',
                      'Aceptar'
                    ); 
                  }
                  else{
                      window.location.href = `index.php?id=editar-${arrayId[0]}`;
                  }
              }else if(tipo=='cobro'){
                  var estado=arrayId[0].split(':')[2];
                  if(estado==1){
                     Swal.fire(
                      'Oops',
                      'Este cobro ya ha sido pagado',
                      'error',
                      'Aceptar'
                    ); 
                  }
                  else{
                      var matriculado=arrayId[0].split(':')[3];
                      if(matriculado!='' && matriculado!=null){
                          Swal.fire(
                              'Oops',
                              'El prospecto ya está matriculado',
                              'error',
                              'Aceptar'
                          ); 
                          
                      }else{
                          var adjunto=arrayId[0].split(':')[4];
                          if(adjunto!='' && adjunto!=null){
                              Swal.fire(
                                  'Oops',
                                  'Al cobro ya le han adjuntado un comprobante de pago.',
                                  'error',
                                  'Aceptar'
                              ); 
                              
                          }else{
                              window.location.href = `index.php?id=editar-${arrayId[0]}`;
                          }
                          
                      }
                      
                  }
                  
              }else{
                  
                  window.location.href = `index.php?id=editar-${arrayId[0]}`;
              }
              
          }
    
        }
    
    });


    //esta función es para los Datatables con checkbox implementados manualmente
    $('#eliminarRegistro').on('click', function (e) {
        var id = $('div#numeroAccion span').text(); //OBTENEMOS LO QUE TIENE EL SPAN
    
        if (id === '') {
          Swal.fire(
            'Ops',
            'Debes seleccionar primero un registro',
            'error',
            'Aceptar'
          );
        } else {
    
          var arrayId = id.split(',');
          var mensaje = "registro";
          if (arrayId.length > 1) {
            mensaje = "registros";
          }
          Swal.fire({
            title: 'ATENCIÓN',
            text: `¿Deseas borrar ${arrayId.length} ${mensaje}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: `Si, borrar ${arrayId.length} ${mensaje}`
          }).then((result) => {
            if (result.value) {
    
              var eliminarRegistros = new FormData();
              eliminarRegistros.append('arrayId', arrayId);
              eliminarRegistros.append('accion', "eliminar");
              var xhr = new XMLHttpRequest();
              xhr.open('POST', 'includes/modelo/eliminar.php', true);
              xhr.onload = function () {
    
                if (this.status === 200) {
    
                  var respuesta = JSON.parse(xhr.responseText);
                  console.log(respuesta);
                  if (respuesta.respuesta === 'success') {
                    Swal.fire('Correcto', respuesta.mensaje, respuesta.respuesta, 'Aceptar').then((result) => {
                      if (result.value) {
                        window.location.href = `index.php?id=${respuesta.retorno}`;
                      }
                    });
                  }else if(respuesta.respuesta === 'error_conborrado'){
                      Swal.fire('Error', respuesta.mensaje, 'error' , 'Volver a intentar').then((result) => {
                      if (result.value) {
                        window.location.href = `index.php?id=${respuesta.retorno}`;
                      }
                    });
                  } else {
                    Swal.fire('Error', respuesta.mensaje, respuesta.respuesta, 'Volver a intentar');
                  }
    
                } else {
    
                  Swal.fire('Oops', 'Sucedio un error', 'error', 'Aceptar');
    
                }
    
              }
              xhr.send(eliminarRegistros);
    
    
            } else {
              Swal.fire('', 'Ningún registro eliminado', 'info', 'Aceptar');
            }
          });
    
        }
    
    });

    //esta función es para los Datatables con checkbox implementados de la propia libreria de los datatables
    $('#eliminarRegistro2').on('click', function (e) {
        var rows_selected = table.column(0).checkboxes.selected();
        var cadenaids='';
        var c=0;
        $.each(rows_selected, function(index, rowId){
            //alert(rowId);
            if(c>0){
               cadenaids+=','; 
            }
            cadenaids+=rowId;
            c++;
        });

        //var id = $('div#numeroAccion span').text(); //OBTENEMOS LO QUE TIENE EL SPAN
        var id = cadenaids;
    
        if (id === '') {
          Swal.fire(
            'Ops',
            'Debes seleccionar primero un registro',
            'error',
            'Aceptar'
          );
        } else {
          
          var arrayId = id.split(',');
          var mensaje = "registro";
          if (arrayId.length > 1) {
            mensaje = "registros";
          }
          Swal.fire({
            title: 'ATENCIÓN',
            text: `¿Deseas borrar ${arrayId.length} ${mensaje}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: `Si, borrar ${arrayId.length} ${mensaje}`
          }).then((result) => {
            if (result.value) {
    
              var eliminarRegistros = new FormData();
              eliminarRegistros.append('arrayId', arrayId);
              eliminarRegistros.append('accion', "eliminar");
              var xhr = new XMLHttpRequest();
              xhr.open('POST', 'includes/modelo/eliminar.php', true);
              xhr.onload = function () {
    
                if (this.status === 200) {
    
                  var respuesta = JSON.parse(xhr.responseText);
                  console.log(respuesta);
                  if (respuesta.respuesta === 'success') {
                    Swal.fire('Correcto', respuesta.mensaje, respuesta.respuesta, 'Aceptar').then((result) => {
                      if (result.value) {
                        window.location.href = `index.php?id=${respuesta.retorno}`;
                      }
                    });
                  }else if(respuesta.respuesta === 'error_conborrado'){
                      Swal.fire('Error', respuesta.mensaje, 'error' , 'Volver a intentar').then((result) => {
                      if (result.value) {
                        window.location.href = `index.php?id=${respuesta.retorno}`;
                      }
                    });
                  } else {
                    Swal.fire('Error', respuesta.mensaje, respuesta.respuesta, 'Volver a intentar');
                  }
    
                } else {
    
                  Swal.fire('Oops', 'Sucedio un error', 'error', 'Aceptar');
    
                }
    
              }
              xhr.send(eliminarRegistros);
    
    
            } else {
              Swal.fire('', 'Ningún registro eliminado', 'info', 'Aceptar');
            }
          });
    
        }
    
    });


    $('#descargar').on('click', function (e) {
        
        var rows_selected = table.column(0).checkboxes.selected();
        var cadenaids='';
        var c=0;
        $.each(rows_selected, function(index, rowId){
            //alert(rowId);
            if(c>0){
               cadenaids+=','; 
            }
            cadenaids+=rowId;
            c++;
        });
        
        //var id = $('div#numeroAccion span').text(); //OBTENEMOS LO QUE TIENE EL SPAN
        var id = cadenaids;
        if (id === '') {
          id = 0;
        }
        var sPaginaURL = window.location.search.substring(1);
        var separacion = sPaginaURL.split('=');
        console.log(`id: ${id} y accion: ${separacion[1]}`);
        
       
        window.location.href = (`includes/reportes/reporte_${separacion[1]}.php?id=${id}`);
        
    
        
    });


    $('.delete').on('click', function (e) {

        e.preventDefault();

        Swal.fire({
            title: 'Seguro que deseas eliminar?',
            text: "No podras recuperar este registro!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.value) {
              
                var id = $(this).attr('id');
                var objeto = $(this).attr('data-id');
                console.log(objeto);
                var datosEliminar = new FormData();
                datosEliminar.append('id', id);
                datosEliminar.append('objeto', objeto);
                datosEliminar.append('accion', "eliminar");

                var xhr = new XMLHttpRequest(); //SE CREA UN OBJETO
                xhr.open('POST', 'includes/modelo/acciones.php', true); //SE ESPECIFICA EL METODO, A DONDE Y SI ES ASINCRONO
                xhr.onload = function () {

                    if (this.status === 200) { //SI LA RESPUESTA ES EXITOSA ENTRA

                        var respuesta = JSON.parse(xhr.responseText);
                        console.log(respuesta);
                        if (respuesta.respuesta === 'success') {

                            Swal.fire('Correcto', respuesta.mensaje, respuesta.respuesta, 'Aceptar')
                                .then((result) => {
                                    if (result.value) {
                                        window.location.href = 'index.php?id='+objeto;
                                    }
                                })

                        } else {

                            Swal.fire('Error', respuesta.mensaje, respuesta.respuesta, 'Volver a intentar')

                        }
                    } else { //SI ES OTRA RESPUESTA MANDA ERROR

                        Swal.fire('Error', 'Sucedio un error', 'error', 'Aceptar')

                    }

                }
                xhr.send(datosEliminar);

            }else{
                Swal.fire('', 'No se elimino el registro', 'info', 'Aceptar')
            }
                })
        

    });


    $('.enviar').on('click', function (e) {

        e.preventDefault();

        Swal.fire({
            title: 'Seguro que deseas contactar al cliente?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, contactar!',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.value) {
              
                var id = $(this).attr('id');
                var cliente = $(this).attr('data-id');
                var numero = $(this).attr('data-id2');
                
                

                //window.location.href = 'index.php?id='+direccion;
                var mensaje='Hola '+cliente;
                window.open('https://api.whatsapp.com/send?phone='+numero+'&text='+mensaje);

                       

            }else{
                Swal.fire('', 'No se contacto con el cliente', 'info', 'Aceptar')
            }
                })
        

    });
    
    
    

     $('.mi-selector').select2();

});