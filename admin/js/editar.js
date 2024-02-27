eventListeners();
function eventListeners(){
    document.querySelector('#editarCampos').addEventListener('submit', editar);
}

function editar(e){

    e.preventDefault();
    var tipo = document.querySelector('#tipo').value;   //SE OBTIENE EL VALOR DE TIPO

    if(tipo === 'producto'){

        
        var skuprograma = $('#skuprograma').val();
        var categoria = $('#categoria').val();
        var nombre = $("#nombre").val();
        var descripcion = $("#descripcion").val();
        var descripcion2 = $("#descripcion2").val();
        
        
        var precio = $("#precio").val();
        var precio2 = $("#precio2").val();
        var disponible = $("#disponible").val();
        
        var check_descuento=$('#check_descuento').prop('checked');
        var tipo_descuento=$("#tipo_descuento").val();
        var cantidad1=$("#cantidad1").val();
        var cantidad2=$("#cantidad2").val();
        var existencia=$("#existencia").val();
        var diai = $("#dia1").val();
        var mesi = $("#mes1").val();
        var anioi = $("#anio1").val();
        if(diai!='----' && mesi!='----' && anioi!='----'){
             var descuento_inicio = anioi+'-'+mesi+'-'+diai;
        }else{
            var descuento_inicio = '';
        }
        var descuento_hora_inicio=$("#descuento_hora_inicio").val();
        var diaf = $("#dia2").val();
        var mesf = $("#mes2").val();
        var aniof = $("#anio2").val();
        if(diaf!='----' && mesf!='----' && aniof!='----'){
             var descuento_fin = aniof+'-'+mesf+'-'+diaf;
        }else{
            var descuento_fin = '';
        }
        var descuento_hora_fin=$("#descuento_hora_fin").val();
        var codigo_descuento=$("#codigo_descuento").val();
        
       
        var id_editar = $('#id_editar').val();
        
        if(skuprograma != ''){   //SI NO TIENE NOMBRE MANDA ERROR
            if(categoria!='----'){
                if(nombre != ''){ //SI NO TIENE CATEGORIA MANDA ERROR
                    if(precio!= ''){
                        if( (check_descuento==true && tipo_descuento!='----') || check_descuento==false ){
                            if( (check_descuento==true && cantidad1!='') || check_descuento==false ){
                                if( (check_descuento==true && tipo_descuento=="Dinero" && cantidad2!='') || (check_descuento==true && tipo_descuento!="Dinero") || check_descuento==false ){
                                    if( (check_descuento==true && existencia!='') || check_descuento==false ){
                                        if( (check_descuento==true && descuento_inicio!='') || check_descuento==false ){
                                            if( (check_descuento==true && descuento_hora_inicio!='') || check_descuento==false ){
                                                if( (check_descuento==true && descuento_fin!='') || check_descuento==false ){
                                                    if( (check_descuento==true && descuento_hora_fin!='') || check_descuento==false ){
                                                        if( (check_descuento==true && codigo_descuento!='') || check_descuento==false ){
                                                            if( revisardescuento(2,3,4)==true ){
                                                                if( revisardescuento(3,5,6)==true ){
                                                                    if( revisardescuento(4,7,8)==true ){
                                                                        if( revisardescuento(5,9,10)==true ){
                                                                            
                                                                            if(check_descuento==true){
                                                                                check_descuento='1';
                                                                            }else{
                                                                                check_descuento='0';
                                                                            }
                                                                            
                                                                            
                                                                            var check_descuento2=$('#check_descuento2').prop('checked');
                                                                            var check_descuento3=$('#check_descuento3').prop('checked');
                                                                            var check_descuento4=$('#check_descuento4').prop('checked');
                                                                            var check_descuento5=$('#check_descuento5').prop('checked');
                                                                            
                                                                            if(check_descuento2==true){
                                                                                check_descuento2='1';
                                                                            }else{
                                                                                check_descuento2='0';
                                                                            }
                                                                            
                                                                            if(check_descuento3==true){
                                                                                check_descuento3='1';
                                                                            }else{
                                                                                check_descuento3='0';
                                                                            }
                                                                            
                                                                            if(check_descuento4==true){
                                                                                check_descuento4='1';
                                                                            }else{
                                                                                check_descuento4='0';
                                                                            }
                                                                            
                                                                            if(check_descuento5==true){
                                                                                check_descuento5='1';
                                                                            }else{
                                                                                check_descuento5='0';
                                                                            }
                                                                            
                                                                             //SI TIENE DATOS COMPLETOS ENTRA.
                                                                            var enviarDatos = new FormData(); //SE CREA UN OBJET
                                                                            enviarDatos.append('skuprograma',skuprograma); //SE AGREGA ID
                                                                            enviarDatos.append('categoria',categoria); //SE AGREGA ID
                                                                            enviarDatos.append('nombre',nombre); //SE AGREGA NOMBRE
                                                                            enviarDatos.append('descripcion',descripcion);
                                                                            enviarDatos.append('descripcion2',descripcion2);
                                                                            enviarDatos.append('precio',precio); //SE AGREGA PRECIO
                                                                            enviarDatos.append('precio2',precio2); //SE AGREGA PRECIO
                                                                            enviarDatos.append('disponible',disponible);
                                                                            
                                                                            enviarDatos.append('check_descuento1',check_descuento);
                                                                            enviarDatos.append('check_descuento2',check_descuento2);
                                                                            enviarDatos.append('check_descuento3',check_descuento3);
                                                                            enviarDatos.append('check_descuento4',check_descuento4);
                                                                            enviarDatos.append('check_descuento5',check_descuento5);
                                                                            
                                                                            enviarDatos.append('tipo_descuento_desc1',tipo_descuento);
                                                                            enviarDatos.append('cantidad1_desc1',cantidad1);
                                                                            enviarDatos.append('cantidad2_desc1',cantidad2);
                                                                            enviarDatos.append('existencia_desc1',existencia);
                                                                            enviarDatos.append('descuento_inicio_desc1',descuento_inicio);
                                                                            enviarDatos.append('descuento_hora_inicio_desc1',descuento_hora_inicio);
                                                                            enviarDatos.append('descuento_fin_desc1',descuento_fin);
                                                                            enviarDatos.append('descuento_hora_fin_desc1',descuento_hora_fin);
                                                                            enviarDatos.append('codigo_descuento_desc1',codigo_descuento);
                                                                            
                                                                            var f=3;
                                                                            for(var i=2;i<=5;i++){
                                                                                enviarDatos.append('tipo_descuento_desc'+i,$('#tipo_descuento_desc'+i).val());
                                                                                enviarDatos.append('cantidad1_desc'+i,$('#cantidad1_desc'+i).val());
                                                                                enviarDatos.append('cantidad2_desc'+i,$('#cantidad2_desc'+i).val());
                                                                                enviarDatos.append('existencia_desc'+i,$('#existencia_desc'+i).val());
                                                                                
                                                                                var descuento_inicio_desc = $('#anio'+f).val()+'-'+$('#mes'+f).val()+'-'+$('#dia'+f).val();
                                                                                f++;
                                                                                enviarDatos.append('descuento_inicio_desc'+i,descuento_inicio_desc);
                                                                                
                                                                                enviarDatos.append('descuento_hora_inicio_desc'+i,$('#descuento_hora_inicio_desc'+i).val());
                                                                                
                                                                                var descuento_fin_desc = $('#anio'+f).val()+'-'+$('#mes'+f).val()+'-'+$('#dia'+f).val();
                                                                                f++;
                                                                                enviarDatos.append('descuento_fin_desc'+i,descuento_fin_desc);
                                                                                
                                                                                enviarDatos.append('descuento_hora_fin_desc'+i,$('#descuento_hora_fin_desc'+i).val());
                                                                                enviarDatos.append('codigo_descuento_desc'+i,$('#codigo_descuento_desc'+i).val());
                                                                            }
                                                                            
                                                                            enviarDatos.append('id_editar',id_editar);   //SE AGREGA EL id_editar QUE SERA EL TIPO
                                                                            enviarDatos.append('accion',tipo);   //SE AGREGA LA CCION QUE SERA EL TIPO
                                                                            
                                                                            var xhr = new XMLHttpRequest(); //SE CREA UN OBJETO
                                                                            xhr.open('POST','includes/modelo/editar.php', true); //SE ESPECIFICA EL METODO, A DONDE Y SI ES ASINCRONO
                                                                            xhr.onload = function(){
                                                            
                                                                                if(this.status === 200){    //SI LA RESPUESTA ES EXITOSA ENTRA
                                                            
                                                                                    var respuesta = JSON.parse(xhr.responseText);
                                                                                    if(respuesta.respuesta === 'success'){
                                                            
                                                                                        Swal.fire(
                                                                                            'Correcto',
                                                                                            respuesta.mensaje,
                                                                                            respuesta.respuesta,
                                                                                            'Aceptar'
                                                                                        ).then((result) => {
                                                                                            if(result.value){
                                                                                                    window.location.href = 'index.php?id=producto';
                                                                                            }
                                                                                        }) 
                                                            
                                                                                    }else{
                                                            
                                                                                        Swal.fire(
                                                                                            'Error',
                                                                                            respuesta.mensaje,
                                                                                            respuesta.respuesta,
                                                                                            'Volver a intentar'
                                                                                        )
                                                            
                                                                                    }
                                                            
                                                                                }else{  //SI ES OTRA RESPUESTA MANDA ERROR
                                                            
                                                                                    Swal.fire(
                                                                                        'Error',
                                                                                        'Sucedio un error',
                                                                                        'error',
                                                                                        'Aceptar'
                                                                                    )
                                                            
                                                                                }
                                                            
                                                                            }
                                                                            xhr.send(enviarDatos);   //ENVIAMOS LOS DATOS
                                                                                
                                                                    
                      
                                                                           
         
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                            
                                                        }
                                                        else{
                                                            $("#loader").hide();
                                                            Swal.fire({
                                                              title:'Oops',
                                                              html:'Campo código descuento vacío...', 
                                                              icon:'info',
                                                              confirmButtonText:'Aceptar',
                                                              onAfterClose: () => {
                                                                $('#codigo_descuento').focus(); 
                                                              }
                                                            });
                                                        }
                            
                                                    }
                                                    else{
                                                        $("#loader").hide();
                                                        Swal.fire({
                                                          title:'Oops',
                                                          html:'Campo hora fin vacío...', 
                                                          icon:'info',
                                                          confirmButtonText:'Aceptar',
                                                          onAfterClose: () => {
                                                            $('#descuento_hora_fin').focus(); 
                                                          }
                                                        });
                                                    }
                            
                                                }
                                                else{
                                                    $("#loader").hide();
                                                    Swal.fire({
                                                      title:'Oops',
                                                      html:'Campo hasta vacío...', 
                                                      icon:'info',
                                                      confirmButtonText:'Aceptar',
                                                      onAfterClose: () => {
                                                        $('#descuento_fin').focus(); 
                                                      }
                                                    });
                                                }
                            
                                            }
                                            else{
                                                $("#loader").hide();
                                                Swal.fire({
                                                  title:'Oops',
                                                  html:'Campo hora inicio vacío...', 
                                                  icon:'info',
                                                  confirmButtonText:'Aceptar',
                                                  onAfterClose: () => {
                                                    $('#descuento_hora_inicio').focus(); 
                                                  }
                                                });
                                            }
                            
                                        }
                                        else{
                                            $("#loader").hide();
                                            Swal.fire({
                                              title:'Oops',
                                              html:'Campo disponible desde vacío...', 
                                              icon:'info',
                                              confirmButtonText:'Aceptar',
                                              onAfterClose: () => {
                                                $('#descuento_inicio').focus(); 
                                              }
                                            });
                                        }
                            
                                    }
                                    else{
                                        $("#loader").hide();
                                        Swal.fire({
                                          title:'Oops',
                                          html:'Campo existencia vacío...', 
                                          icon:'info',
                                          confirmButtonText:'Aceptar',
                                          onAfterClose: () => {
                                            $('#existencia').focus(); 
                                          }
                                        });
                                    }
                                }
                                else{
                                    $("#loader").hide();
                                    Swal.fire({
                                      title:'Oops',
                                      html:'Campo cantidad(usd) vacío...', 
                                      icon:'info',
                                      confirmButtonText:'Aceptar',
                                      onAfterClose: () => {
                                        $('#cantidad2').focus(); 
                                      }
                                    });
                                }
                            }
                            else{
                                $("#loader").hide();
                                Swal.fire({
                                  title:'Oops',
                                  html:'Campo cantidad vacío...', 
                                  icon:'info',
                                  confirmButtonText:'Aceptar',
                                  onAfterClose: () => {
                                    $('#cantidad1').focus(); 
                                  }
                                });
                            }
                            
                        }
                        else{
                            $("#loader").hide();
                            Swal.fire({
                              title:'Oops',
                              html:'Campo tipo descuento vacío...', 
                              icon:'info',
                              confirmButtonText:'Aceptar',
                              onAfterClose: () => {
                                $('#tipo_descuento').focus(); 
                              }
                            });
                        }
                        
                       
                        
                    }
                    else{
                        Swal.fire({
                          title:'Oops',
                          html:'Campo precio vacío...', 
                          icon:'info',
                          confirmButtonText:'Aceptar',
                          onAfterClose: () => {
                            $('#precio').focus(); 
                          }
                        }); 
                    }
        
            
                            

                }else{
                    Swal.fire({
                      title:'Oops',
                      html:'Campo nombre vacío...', 
                      icon:'info',
                      confirmButtonText:'Aceptar',
                      onAfterClose: () => {
                        $('#nombre').focus(); 
                      }
                    }); 
                    
                }
                
            }else{
                Swal.fire({
                  title:'Oops',
                  html:'Campo categoría vacío...', 
                  icon:'info',
                  confirmButtonText:'Aceptar',
                  onAfterClose: () => {
                    $('#categoria').focus(); 
                  }
                }); 
                
            }
        }else{
            
            Swal.fire({
              title:'Oops',
              allowOutsideClick: false,
              html:'Campo skuprograma vacío...', 
              icon:'info',
              confirmButtonText:'Aceptar',
              onAfterClose: () => {
                $('#skuprograma').focus(); 
              }
            }); 
            
        }
    }else if(tipo === 'tienda_producto'){

        
        var id_categoria = ($('select[id=categoria]').val());
        var nombre = $("#nombre").val();
        var tamaño = $("#tamaño").val();
        var precio = $("#precio").val();
        var id_editar = $('#id_editar').val();

        if(id_categoria != '----'){   //SI NO TIENE NOMBRE MANDA ERROR    
            if(nombre != ''){ //SI NO TIENE CATEGORIA MANDA ERROR
                if(precio != ''){

                    //SI TIENE DATOS COMPLETOS ENTRA.
                var editarProducto = new FormData(); //SE CREA UN OBJET
                editarProducto.append('nombre',nombre); //SE AGREGA NOMBRE
                editarProducto.append('id_categoria',id_categoria); //SE AGREGA ID_CATEGORIA
                editarProducto.append('id_editar',id_editar);   //SE AGREGA EL id_editar QUE SERA EL TIPO
                editarProducto.append('tamaño',tamaño); //SE AGREGA TAMANO
                editarProducto.append('precio',precio); //SE AGREGA PRECIO
                editarProducto.append('accion',tipo);   //SE AGREGA LA CCION QUE SERA EL TIPO

                var xhr = new XMLHttpRequest(); //SE CREA UN OBJETO
                xhr.open('POST','includes/modelo/editar.php', true); //SE ESPECIFICA EL METODO, A DONDE Y SI ES ASINCRONO
                xhr.onload = function(){

                    if(this.status === 200){    //SI LA RESPUESTA ES EXITOSA ENTRA

                        var respuesta = JSON.parse(xhr.responseText);
                        console.log(respuesta);
                        if(respuesta.respuesta === 'success'){

                            Swal.fire(
                                'Correcto',
                                respuesta.mensaje,
                                respuesta.respuesta,
                                'Aceptar'
                            ).then((result) => {
                                if(result.value){
                                        window.location.href = 'index.php?id=tienda_producto';
                                }
                            }) 

                        }else{

                            Swal.fire(
                                'Error',
                                respuesta.mensaje,
                                respuesta.respuesta,
                                'Volver a intentar'
                            )

                        }

                    }else{  //SI ES OTRA RESPUESTA MANDA ERROR

                        Swal.fire(
                            'Error',
                            'Sucedio un error',
                            'error',
                            'Aceptar'
                        )

                    }

                }
                xhr.send(editarProducto);   //ENVIAMOS LOS DATOS

                }else{

                    Swal.fire(
                        'Completa el campo',    //TITLE
                        'Precio',  //TEXT
                        'error',  //TYPE
                        'Aceptar'   //CONFIRMBUTTONTEXT
                    )

                }
                
            }else{
                Swal.fire(
                    'Completa el campo',    //TITLE
                    'Nombre Categoria',  //TEXT
                    'error',  //TYPE
                    'Aceptar'   //CONFIRMBUTTONTEXT
                )
                
            }
        }else{
            Swal.fire(
                'Completa el campo',    //TITLE
                'Categoria',  //TEXT
                'error',  //TYPE
                'Aceptar'   //CONFIRMBUTTONTEXT
            )
        }
    }else if(tipo === 'tienda_categoria'){

        
        var nombre = $("#nombre").val();
        var id_categoria = ($('select[id=categoria]').val());
        var inputFileImage = document.getElementById("exampleInputFile");
        var file = inputFileImage.files[0];
        
        var id_editar = $('#id_editar').val();

        if(nombre != ''){   //SI NO TIENE NOMBRE MANDA ERROR    
            if(id_categoria != '----'){ //SI NO TIENE CATEGORIA MANDA ERROR
                //SI TIENE DATOS COMPLETOS ENTRA.

                var enviarDatos = new FormData(); //SE CREA UN OBJET
                enviarDatos.append('nombre',nombre); //SE AGREGA NOMBRE
                enviarDatos.append('id_categoria',id_categoria); //SE AGREGA ID_CATEGORIA
                enviarDatos.append('accion',tipo);   //SE AGREGA LA CCION QUE SERA EL TIPO
                enviarDatos.append('id_editar',id_editar);

                var xhr = new XMLHttpRequest(); //SE CREA UN OBJETO
                xhr.open('POST','includes/modelo/editar.php', true); //SE ESPECIFICA EL METODO, A DONDE Y SI ES ASINCRONO
                xhr.onload = function(){

                    if(this.status === 200){    //SI LA RESPUESTA ES EXITOSA ENTRA

                        var respuesta = JSON.parse(xhr.responseText);
                        if(respuesta.respuesta === 'success'){

                            if(file != undefined){

                                var data = new FormData();
                    			data.append('fileToUpload',file);
                    			data.append('id',id_editar);

                                $.ajax({
                                    url: "includes/modelo/cargar.php",        // Url to which the request is send
                                    type: "POST",             // Type of request to be send, called as method
                                    data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                                    dataType: 'json',
                                    contentType: false,       // The content type used when sending data to the server.
                                    cache: false,             // To unable request pages to be cached
                                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                                    success: function(data)   // A function to be called if request succeeds
                                    {
                                    
                                        Swal.fire(
                                            data.respuesta,
                                            respuesta.mensaje+'<br>'+data.mensaje,
                                            data.type,
                                            'Aceptar'
                                        ).then((result) => {
                                            if(result.value){
                                                if(data.respuesta === 'Correcto'){
                                                    window.location.href = 'index.php?id=tienda_categoria';
                                                }
                                                    
                                            }
                                        }) 
                                    }
                                });
                            }else{

                                Swal.fire(
                                    'Correcto',
                                    respuesta.mensaje,
                                    respuesta.respuesta,
                                    'Aceptar'
                                ).then((result) => {
                                    if(result.value){
                                            window.location.href = 'index.php?id=tienda_categoria';
                                    }
                                }) 

                            }

                        }else{

                            Swal.fire(
                                'Error',
                                respuesta.mensaje,
                                respuesta.respuesta,
                                'Volver a intentar'
                            )

                        }

                    }else{  //SI ES OTRA RESPUESTA MANDA ERROR

                        Swal.fire(
                            'Error',
                            'Error[0]<br>Sucedio un error',
                            'error',
                            'Aceptar'
                        )

                    }

                }
                xhr.send(enviarDatos);   //ENVIAMOS LOS DATOS
            }else{
                Swal.fire(
                    'Completa el campo',    //TITLE
                    'Categoria',  //TEXT
                    'error',  //TYPE
                    'Aceptar'   //CONFIRMBUTTONTEXT
                )
            }
        }else{
            Swal.fire(
                'Completa el campo',    //TITLE
                'Nombre Categoria',  //TEXT
                'error',  //TYPE
                'Aceptar'   //CONFIRMBUTTONTEXT
            )
        }
    }else if(tipo === 'canastaproducto'){

        $("#loader").show();

        let sku = $('#sku').val();
        let categoria = $('#categoria').val();
        let nombre = $("#nombre").val();

        let estado = $("#estado").val();

        let medida = $("#medida").val();
        let stock = $("#stock").val();

        let precio = $("#preciomx_siniva").val();
        if(precio==''){
            precio=0;
        }

        let disponible = $("#disponible").val();

        let thumb = $("#thumb").val();



        let check_descuento=$('#check_descuento').val();
        if(check_descuento=='1'){ check_descuento=true; }else{ check_descuento=false; }

        let tipo_descuento=$("#tipo_descuento").val();
        let cantidad1=$("#cantidad1").val();
        if(cantidad1=='' || cantidad1=='.'){
            cantidad1=0;
        }

        /*
        var cantidad2=$("#cantidad2").val();
        if(cantidad2=='' || cantidad2=='.'){
            cantidad2=0;
        }
        */
        
        let diai = $("#dia1").val();
        let mesi = $("#mes1").val();
        let anioi = $("#anio1").val();
        let descuento_inicio = '';
        if(diai!='----' && mesi!='----' && anioi!='----'){
            descuento_inicio = anioi+'-'+mesi+'-'+diai;
        }

        let horai = $("#hora1").val();
        let mini = $("#min1").val();
        let descuento_hora_inicio = '';
        if(horai!='----' && mini!='----'){
            descuento_hora_inicio = horai+':'+mini+':00';
        }

        let descuento_fechainicio = '';
        if(descuento_inicio!='' && descuento_hora_inicio!=''){
            descuento_fechainicio = descuento_inicio+' '+descuento_hora_inicio;
        }


       
        let diaf = $("#dia2").val();
        let mesf = $("#mes2").val();
        let aniof = $("#anio2").val();
        let descuento_fin = '';
        if(diaf!='----' && mesf!='----' && aniof!='----'){
            descuento_fin = aniof+'-'+mesf+'-'+diaf;
        }

        let horaf = $("#hora2").val();
        let minf = $("#min2").val();
        let descuento_hora_fin = '';
        if(horaf!='----' && minf!='----'){
            descuento_hora_fin = horaf+':'+minf+':00';
        }

        let descuento_fechafin = '';
        if(descuento_fin!='' && descuento_hora_fin!=''){
           descuento_fechafin = descuento_fin+' '+descuento_hora_fin;
        }


       
        let descuento_estado=$("#descuento_estado").val();

        let preciodescuento = $("#preciodescuento").val();
        if(preciodescuento==''){
            preciodescuento=0;
        }

        /*
        var precio2descuento = $("#precio2descuento").val();
        if(precio2descuento==''){
            precio2descuento=0;
        }
        */


        var id_editar = $('#id_editar').val();

        let datos_correctos = 0;

        if(sku != ''){ 
            if(categoria != '----'){ 
                if(nombre != ''){ 
                    if(medida != '----'){ 
                        if(stock != ''){ 
                            if(parseFloat(precio)>0){  
                                
                                if( (check_descuento==true && tipo_descuento!='----') || check_descuento==false ){
                                    if( (check_descuento==true && parseFloat(cantidad1)>0) || check_descuento==false ){
                                        if( (check_descuento==true && descuento_inicio!='') || check_descuento==false ){
                                            
                                            if( (check_descuento==true && revisarfechas(diai, mesi,anioi)==true) || check_descuento==false ){
                                                if( (check_descuento==true && descuento_hora_inicio!='') || check_descuento==false ){
                                                    if( (check_descuento==true && descuento_fin!='') || check_descuento==false ){
                                                        if( (check_descuento==true && revisarfechas(diaf, mesf,aniof)==true) || check_descuento==false ){
                                                            if( (check_descuento==true && descuento_hora_fin!='') || check_descuento==false ){
                                                                if( (check_descuento==true && descuento_fechafin>descuento_fechainicio) || check_descuento==false ){
                                                                    if( (check_descuento==true && descuento_estado!='----') || check_descuento==false ){
                                                                        if( (check_descuento==true && parseFloat(preciodescuento)>0) || check_descuento==false ){
                                                                            if(disponible!='----'){
                                            
                                                                                 datos_correctos = 1;
                                                                                 
                                                                            }else{
                                                                                $("#loader").hide();
                                                                                Swal.fire({
                                                                                      title:'Oops',
                                                                                      html:'Campo publicado vacío...', 
                                                                                      icon:'info',
                                                                                      confirmButtonText:'Aceptar',
                                                                                      onAfterClose: () => {
                                                                                        $('#disponible').focus(); 
                                                                                      }
                                                                                });
                                                                            }

                                                                        }else{
                                                                            $("#loader").hide();
                                                                            Swal.fire({
                                                                              title:'Oops',
                                                                              html:'Campo Precio(MXN) con descuento debe ser mayor a 0...', 
                                                                              icon:'info',
                                                                              confirmButtonText:'Aceptar',
                                                                              onAfterClose: () => {
                                                                                $('#preciodescuento').focus(); 
                                                                              }
                                                                            });
                                                                        }

                                                                    }else{
                                                                        $("#loader").hide();
                                                                        Swal.fire({
                                                                          title:'Oops',
                                                                          html:'Campo estado descuento vacío...', 
                                                                          icon:'info',
                                                                          confirmButtonText:'Aceptar',
                                                                          onAfterClose: () => {
                                                                            $('#descuento_estado').focus(); 
                                                                          }
                                                                        });
                                                                    }

                                                                }else{
                                                                    $("#loader").hide();
                                                                    Swal.fire({
                                                                      title:'Oops',
                                                                      html:'Campo fecha y hora fin deben ser mayor a la fecha y hora inicio del descuento.', 
                                                                      icon:'info',
                                                                      confirmButtonText:'Aceptar',
                                                                      onAfterClose: () => {
                                                                        $('#dia2').focus(); 
                                                                      }
                                                                    });
                                                                }

                                                            }
                                                            else{
                                                                $("#loader").hide();
                                                                Swal.fire({
                                                                  title:'Oops',
                                                                  html:'Campo hora fin incompleto...', 
                                                                  icon:'info',
                                                                  confirmButtonText:'Aceptar',
                                                                  onAfterClose: () => {
                                                                    $('#hora2').focus(); 
                                                                  }
                                                                });
                                                            }
                                                        }else{
                                                            $("#loader").hide();
                                                             Swal.fire({
                                                                  title:'Oops',
                                                                  html:'Campo fecha fin incorrecto...', 
                                                                  icon:'info',
                                                                  confirmButtonText:'Aceptar',
                                                                  onAfterClose: () => {
                                                                    $('#dia2').focus(); 
                                                                  }
                                                                });
                                                        }
                                
                                                    }
                                                    else{
                                                        $("#loader").hide();
                                                        Swal.fire({
                                                          title:'Oops',
                                                          html:'Campo fecha fin incompleto...', 
                                                          icon:'info',
                                                          confirmButtonText:'Aceptar',
                                                          onAfterClose: () => {
                                                            $('#dia2').focus(); 
                                                          }
                                                        });
                                                    }
                                
                                                }
                                                else{
                                                    $("#loader").hide();
                                                    Swal.fire({
                                                      title:'Oops',
                                                      html:'Campo hora inicio incompleto...', 
                                                      icon:'info',
                                                      confirmButtonText:'Aceptar',
                                                      onAfterClose: () => {
                                                        $('#hora1').focus(); 
                                                      }
                                                    });
                                                }
                                            }else{
                                                $("#loader").hide();
                                                 Swal.fire({
                                                      title:'Oops',
                                                      html:'Campo fecha inicio incorrecto...', 
                                                      icon:'info',
                                                      confirmButtonText:'Aceptar',
                                                      onAfterClose: () => {
                                                        $('#dia1').focus(); 
                                                      }
                                                    });
                                            }
                                            
                                        }
                                        else{
                                            $("#loader").hide();
                                            Swal.fire({
                                              title:'Oops',
                                              html:'Campo fecha inicio incompleto...', 
                                              icon:'info',
                                              confirmButtonText:'Aceptar',
                                              onAfterClose: () => {
                                                $('#dia1').focus(); 
                                              }
                                            });
                                        }

                                    }else{
                                        $("#loader").hide();
                                        Swal.fire({
                                          title:'Oops',
                                          html:'Campo cantidad debe ser mayor a 0...', 
                                          icon:'info',
                                          confirmButtonText:'Aceptar',
                                          onAfterClose: () => {
                                            $('#cantidad1').focus(); 
                                          }
                                        });
                                    }

                                }else{
                                     $("#loader").hide();
                                    Swal.fire({
                                      title:'Oops',
                                      html:'Campo tipo descuento vacío...', 
                                      icon:'info',
                                      confirmButtonText:'Aceptar',
                                      onAfterClose: () => {
                                        $('#tipo_descuento').focus(); 
                                      }
                                    });
                                }
                               

                            }else{
                                
                                $("#loader").hide();
                                Swal.fire({
                                  title:'Oops',
                                  html:'Campo precio(MX) debe ser mayor a 0...', 
                                  icon:'info',
                                  confirmButtonText:'Aceptar',
                                  onAfterClose: () => {
                                    $('#precio').focus(); 
                                  }
                                }); 
                                
                            }

                        }else{
                            
                            $("#loader").hide();
                            Swal.fire({
                              title:'Oops',
                              html:'Campo stock vacío...', 
                              icon:'info',
                              confirmButtonText:'Aceptar',
                              onAfterClose: () => {
                                $('#stock').focus(); 
                              }
                            }); 
                            
                        }

                    }else{
                        
                        $("#loader").hide();
                        Swal.fire({
                          title:'Oops',
                          html:'Campo unidad de medida vacío...', 
                          icon:'info',
                          confirmButtonText:'Aceptar',
                          onAfterClose: () => {
                            $('#medida').focus(); 
                          }
                        }); 
                        
                    }

                }else{
                    
                    $("#loader").hide();
                    Swal.fire({
                      title:'Oops',
                      html:'Campo nombre vacío...', 
                      icon:'info',
                      confirmButtonText:'Aceptar',
                      onAfterClose: () => {
                        $('#nombre').focus(); 
                      }
                    }); 
                    
                }

            }else{
                
                $("#loader").hide();
                Swal.fire({
                  title:'Oops',
                  html:'Campo categoría vacío...', 
                  icon:'info',
                  confirmButtonText:'Aceptar',
                  onAfterClose: () => {
                    $('#categoria').focus(); 
                  }
                }); 
                
            }

        }else{

            $("#loader").hide();
            Swal.fire({
              title:'Oops',
              html:'Campo sku vacío...', 
              icon:'info',
              confirmButtonText:'Aceptar',
              onAfterClose: () => {
                $('#sku').focus(); 
              }
            }); 
            
        }


        if(datos_correctos==1){
           

             //SI TIENE DATOS COMPLETOS ENTRA.
            let enviarDatos = new FormData(); //SE CREA UN OBJET

            enviarDatos.append('sku',sku);
            enviarDatos.append('categoria',categoria);
            enviarDatos.append('nombre',nombre);

            enviarDatos.append('estado',estado);

            enviarDatos.append('medida',medida);
            enviarDatos.append('stock',stock);
            enviarDatos.append('precio',precio);
            enviarDatos.append('disponible',disponible);

            if(thumb!=''){
                thumb='con archivo';
                let inputthumb = document.getElementById("thumb");
                let filethumb = inputthumb.files[0];
                enviarDatos.append('filethumb',filethumb);
            }
            enviarDatos.append('thumb',thumb);

            if(check_descuento==true){
                check_descuento='1';
            }else{
                check_descuento='0';
            }

            enviarDatos.append('check_descuento',check_descuento);
            enviarDatos.append('tipo_descuento',tipo_descuento);
            enviarDatos.append('cantidad1',cantidad1);
           // enviarDatos.append('cantidad2',cantidad2);
            enviarDatos.append('descuento_inicio',descuento_inicio);
            enviarDatos.append('descuento_hora_inicio',descuento_hora_inicio);
            enviarDatos.append('descuento_fin',descuento_fin);
            enviarDatos.append('descuento_hora_fin',descuento_hora_fin);
            enviarDatos.append('descuento_estado',descuento_estado);
            enviarDatos.append('preciodescuento',preciodescuento);
            //enviarDatos.append('precio2descuento',precio2descuento);

            enviarDatos.append('id_editar',id_editar);
            enviarDatos.append('accion',tipo);   //SE AGREGA LA CCION QUE SERA EL TIPO
           
            let xhr = new XMLHttpRequest(); //SE CREA UN OBJETO
            xhr.open('POST','includes/modelo/editar_canasta.php', true); //SE ESPECIFICA EL METODO, A DONDE Y SI ES ASINCRONO
            xhr.onload = function(){

                if(this.status === 200){    //SI LA RESPUESTA ES EXITOSA ENTRA

                    var respuesta = JSON.parse(xhr.responseText);
                    if(respuesta.respuesta === 'success'){
                         $("#loader").hide();
                        Swal.fire(
                            'Correcto',
                            respuesta.mensaje,
                            respuesta.respuesta,
                            'Aceptar'
                        ).then((result) => {
                            if(result.value){
                                    window.location.href = 'index.php?id=canasta_productos';
                            }
                        }) 

                    }else{
                        $("#loader").hide();
                        Swal.fire(
                            'Error',
                            respuesta.mensaje,
                            respuesta.respuesta,
                            'Volver a intentar'
                        )

                    }

                }else{  //SI ES OTRA RESPUESTA MANDA ERROR
                    $("#loader").hide();
                    Swal.fire(
                        'Error',
                        'Error[0]:Sucedio un error al tratar de realizar el guardado de datos.',
                        'error',
                        'Aceptar'
                    )

                }

            }
            xhr.send(enviarDatos);   //ENVIAMOS LOS DATOS

        }


    }else if(tipo === 'cupon'){

        $("#contentSpinnerPrimary").show();

        var id_editar = $('#id_editar').val();

        var tipo_descuento=$("#tipo_descuento").val();
        var cantidad1=$("#cantidad1").val();
        if(cantidad1=='' || cantidad1=='.'){
            cantidad1=0;
        }
        var cantidad2=$("#cantidad2").val();
        if(cantidad2=='' || cantidad2=='.'){
            cantidad2=0;
        }
        var stock=$("#stock").val();
        
        var diai = $("#dia1").val();
        var mesi = $("#mes1").val();
        var anioi = $("#anio1").val();
        if(diai!='----' && mesi!='----' && anioi!='----'){
             var descuento_inicio = anioi+'-'+mesi+'-'+diai;
        }else{
            var descuento_inicio = '';
        }
        var horai = $("#hora1").val();
        var mini = $("#min1").val();
        if(horai!='----' && mini!='----'){
             var descuento_hora_inicio = horai+':'+mini+':00';
        }else{
            var descuento_hora_inicio = '';
        }

        if(descuento_inicio!='' && descuento_hora_inicio!=''){
            var descuento_fechainicio = descuento_inicio+' '+descuento_hora_inicio;
        }else{
            var descuento_fechainicio = '';
        }
       
        var diaf = $("#dia2").val();
        var mesf = $("#mes2").val();
        var aniof = $("#anio2").val();
        if(diaf!='----' && mesf!='----' && aniof!='----'){
             var descuento_fin = aniof+'-'+mesf+'-'+diaf;
        }else{
            var descuento_fin = '';
        }
        var horaf = $("#hora2").val();
        var minf = $("#min2").val();
        if(horaf!='----' && minf!='----'){
             var descuento_hora_fin = horaf+':'+minf+':00';
        }else{
            var descuento_hora_fin = '';
        }

        if(descuento_fin!='' && descuento_hora_fin!=''){
            var descuento_fechafin = descuento_fin+' '+descuento_hora_fin;
        }else{
            var descuento_fechafin = '';
        }
       
        var codigo=$("#codigo").val();
        var notas=$("#notas").val();
        var descuento_estado=$("#descuento_estado").val();

        if( tipo_descuento!='----' ){
            if( parseFloat(cantidad1)>0 ){
                //if( ( tipo_descuento=="Dinero" && parseFloat(cantidad2)>0 ) || tipo_descuento!="Dinero" ){
                    if(stock!=''){
                        if( descuento_inicio!='' ){
                            if( revisarfechas(diai, mesi,anioi) ){
                                if( descuento_hora_inicio!='' ){
                                    if( descuento_fin!='' ){
                                        if( revisarfechas(diaf, mesf,aniof)==true ){
                                            if( descuento_hora_fin!='' ){
                                                if( descuento_fechafin>descuento_fechainicio ){
                                                    if(codigo!=''){
                                                        if( descuento_estado!='----' ){

                                                            var enviarDatos = new FormData();
                                                                   
                                                            enviarDatos.append('tipo_descuento',tipo_descuento);
                                                            enviarDatos.append('cantidad1',cantidad1);
                                                            enviarDatos.append('cantidad2',cantidad2);
                                                            enviarDatos.append('stock',stock);
                                                            enviarDatos.append('descuento_inicio',descuento_inicio);
                                                            enviarDatos.append('descuento_hora_inicio',descuento_hora_inicio);
                                                            enviarDatos.append('descuento_fin',descuento_fin);
                                                            enviarDatos.append('descuento_hora_fin',descuento_hora_fin);
                                                            enviarDatos.append('codigo',codigo);
                                                            enviarDatos.append('notas',notas);
                                                            enviarDatos.append('descuento_estado',descuento_estado);

                                                            enviarDatos.append('id_editar',id_editar);
                                                            enviarDatos.append('accion',tipo);   //SE AGREGA LA CCION QUE SERA EL TIPO
                                                             
                                                            var xhr = new XMLHttpRequest(); //SE CREA UN OBJETO
                                                            xhr.open('POST','includes/modelo/editar.php', true); //SE ESPECIFICA EL METODO, A DONDE Y SI ES ASINCRONO
                                                            xhr.onload = function(){
                                            
                                                                if(this.status === 200){    //SI LA RESPUESTA ES EXITOSA ENTRA
                                            
                                                                    var respuesta = JSON.parse(xhr.responseText);
                                                                    if(respuesta.respuesta === 'success'){
                                                                         $("#contentSpinnerPrimary").hide();
                                                                        Swal.fire(
                                                                            'Correcto',
                                                                            respuesta.mensaje,
                                                                            respuesta.respuesta,
                                                                            'Aceptar'
                                                                        ).then((result) => {
                                                                            if(result.value){
                                                                                    window.location.href = 'index.php?id=cupones';
                                                                            }
                                                                        }) 
                                            
                                                                    }else{
                                                                        $("#contentSpinnerPrimary").hide();
                                                                        Swal.fire(
                                                                            'Error',
                                                                            respuesta.mensaje,
                                                                            respuesta.respuesta,
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
                                                            xhr.send(enviarDatos);   //ENVIAMOS LOS DATOS
                                                
                                                        }else{
                                                            $("#contentSpinnerPrimary").hide();
                                                            Swal.fire({
                                                              title:'Oops',
                                                              html:'Campo estado descuento vacío...', 
                                                              icon:'info',
                                                              confirmButtonText:'Aceptar',
                                                              onAfterClose: () => {
                                                                $('#descuento_estado').focus(); 
                                                              }
                                                            });
                                                        }

                                                    }else{
                                                        $("#contentSpinnerPrimary").hide();
                                                        Swal.fire({
                                                          title:'Oops',
                                                          html:'Campo código vacío...', 
                                                          icon:'info',
                                                          confirmButtonText:'Aceptar',
                                                          onAfterClose: () => {
                                                            $('#codigo').focus(); 
                                                          }
                                                        });
                                                    }

                                                }else{
                                                    $("#contentSpinnerPrimary").hide();
                                                    Swal.fire({
                                                      title:'Oops',
                                                      html:'Campo fecha y hora fin deben ser mayor a la fecha y hora inicio del descuento.', 
                                                      icon:'info',
                                                      confirmButtonText:'Aceptar',
                                                      onAfterClose: () => {
                                                        $('#dia2').focus(); 
                                                      }
                                                    });
                                                }

                                            }
                                            else{
                                                $("#contentSpinnerPrimary").hide();
                                                Swal.fire({
                                                  title:'Oops',
                                                  html:'Campo hora fin incompleto...', 
                                                  icon:'info',
                                                  confirmButtonText:'Aceptar',
                                                  onAfterClose: () => {
                                                    $('#hora2').focus(); 
                                                  }
                                                });
                                            }
                                        }else{
                                            $("#contentSpinnerPrimary").hide();
                                             Swal.fire({
                                                  title:'Oops',
                                                  html:'Campo fecha fin incorrecto...', 
                                                  icon:'info',
                                                  confirmButtonText:'Aceptar',
                                                  onAfterClose: () => {
                                                    $('#dia2').focus(); 
                                                  }
                                                });
                                        }
                
                                    }
                                    else{
                                        $("#contentSpinnerPrimary").hide();
                                        Swal.fire({
                                          title:'Oops',
                                          html:'Campo fecha fin incompleto...', 
                                          icon:'info',
                                          confirmButtonText:'Aceptar',
                                          onAfterClose: () => {
                                            $('#dia2').focus(); 
                                          }
                                        });
                                    }
                
                                }
                                else{
                                    $("#contentSpinnerPrimary").hide();
                                    Swal.fire({
                                      title:'Oops',
                                      html:'Campo hora inicio incompleto...', 
                                      icon:'info',
                                      confirmButtonText:'Aceptar',
                                      onAfterClose: () => {
                                        $('#hora1').focus(); 
                                      }
                                    });
                                }
                            }else{
                                $("#contentSpinnerPrimary").hide();
                                 Swal.fire({
                                      title:'Oops',
                                      html:'Campo fecha inicio incorrecto...', 
                                      icon:'info',
                                      confirmButtonText:'Aceptar',
                                      onAfterClose: () => {
                                        $('#dia1').focus(); 
                                      }
                                    });
                            }
            
                        }
                        else{
                            $("#contentSpinnerPrimary").hide();
                            Swal.fire({
                              title:'Oops',
                              html:'Campo fecha inicio incompleto...', 
                              icon:'info',
                              confirmButtonText:'Aceptar',
                              onAfterClose: () => {
                                $('#dia1').focus(); 
                              }
                            });
                        }

                    }else{
                        $("#contentSpinnerPrimary").hide();
                        Swal.fire({
                          title:'Oops',
                          html:'Campo existencia vacío...', 
                          icon:'info',
                          confirmButtonText:'Aceptar',
                          onAfterClose: () => {
                            $('#stock').focus(); 
                          }
                        });
                    }
                /*
                }
                else{
                    $("#contentSpinnerPrimary").hide();
                    Swal.fire({
                      title:'Oops',
                      html:'Campo cantidad(usd) debe ser mayor a 0...', 
                      icon:'info',
                      confirmButtonText:'Aceptar',
                      onAfterClose: () => {
                        $('#cantidad2').focus(); 
                      }
                    });
                }
                */
            }
            else{
                $("#contentSpinnerPrimary").hide();
                Swal.fire({
                  title:'Oops',
                  html:'Campo cantidad debe ser mayor a 0...', 
                  icon:'info',
                  confirmButtonText:'Aceptar',
                  onAfterClose: () => {
                    $('#cantidad1').focus(); 
                  }
                });
            }
            
        }
        else{
            $("#contentSpinnerPrimary").hide();
            Swal.fire({
              title:'Oops',
              html:'Campo tipo descuento vacío...', 
              icon:'info',
              confirmButtonText:'Aceptar',
              onAfterClose: () => {
                $('#tipo_descuento').focus(); 
              }
            });
        }



    }else if(tipo === 'prospecto'){
            
        
        var nombre = $("#nombre").val();
        var apellido1 = $("#apellido1").val();
        var apellido2 = $("#apellido2").val();
        var whatsapp = $("#whatsapp").val();
        var email = $("#email").val();
        var dian = $("#dia1").val();
        var mesn = $("#mes1").val();
        var anion = $("#anio1").val();
        if(dian!='----' && mesn!='----' && anion!='----'){
             var fecha_nacimiento = anion+'-'+mesn+'-'+dian;
        }else{
            var fecha_nacimiento = '';
        }
        var genero = $("#genero").val();
        var domicilio = $("#domicilio").val();
        var cpostal = $("#cpostal").val();
        var municipio = $("#municipio").val();
        var estado = $("#estado").val();
       
        var id_editar = $('#id_editar').val();
        
        var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
        
        var fechacorrecta;
        
        if(nombre){
            if(apellido1){
                if(whatsapp.length>=10){
                    if(caract.test(email)==true){
                        if(fecha_nacimiento!=''){
                            fechacorrecta=revisarfechas(dian, mesn,anion);
                            if(fechacorrecta==true){
                                if(domicilio!=''){
                                    if(cpostal!=''){
                                        if(municipio!='----'){
                                            
                                             //SI TIENE DATOS COMPLETOS ENTRA.
                                            var editarProspecto = new FormData(); //SE CREA UN OBJET
                                            
                                            editarProspecto.append('nombre',nombre); //SE AGREGA NOMBRE
                                            editarProspecto.append('apellido1',apellido1); //SE AGREGA NUMERO DE PAGOS
                                            editarProspecto.append('apellido2',apellido2); //SE AGREGA PRECIO
                                            editarProspecto.append('whatsapp',whatsapp); //SE AGREGA ID
                                            editarProspecto.append('email',email); //SE AGREGA NOMBRE
                                            editarProspecto.append('fecha_nacimiento',fecha_nacimiento);
                                            editarProspecto.append('genero',genero);
                                            editarProspecto.append('domicilio',domicilio);
                                            editarProspecto.append('cpostal',cpostal);
                                            editarProspecto.append('estado',estado); //SE AGREGA PRECIO
                                            editarProspecto.append('municipio',municipio);
                                            
                                            
                                            editarProspecto.append('id_editar',id_editar);   //SE AGREGA EL id_editar QUE SERA EL TIPO
                                            editarProspecto.append('accion',tipo);   //SE AGREGA LA CCION QUE SERA EL TIPO
                            
                                            var xhr = new XMLHttpRequest(); //SE CREA UN OBJETO
                                            xhr.open('POST','includes/modelo/editar.php', true); //SE ESPECIFICA EL METODO, A DONDE Y SI ES ASINCRONO
                                            xhr.onload = function(){
                            
                                                if(this.status === 200){    //SI LA RESPUESTA ES EXITOSA ENTRA
                            
                                                    var respuesta = JSON.parse(xhr.responseText);
                                                    console.log(respuesta);
                                                    if(respuesta.respuesta === 'success'){
                            
                                                        Swal.fire(
                                                            'Correcto',
                                                            respuesta.mensaje,
                                                            respuesta.respuesta,
                                                            'Aceptar'
                                                        ).then((result) => {
                                                            if(result.value){
                                                                    window.location.href = 'index.php?id=prospecto';
                                                            }
                                                        }) 
                            
                                                    }else{
                            
                                                        Swal.fire(
                                                            'Error',
                                                            respuesta.mensaje,
                                                            respuesta.respuesta,
                                                            'Volver a intentar'
                                                        )
                            
                                                    }
                            
                                                }else{  //SI ES OTRA RESPUESTA MANDA ERROR
                            
                                                    Swal.fire(
                                                        'Error',
                                                        'Sucedio un error',
                                                        'error',
                                                        'Aceptar'
                                                    )
                            
                                                }
                            
                                            }
                                            xhr.send(editarProspecto);   //ENVIAMOS LOS DATOS
                                            
                                        }else{
                                            Swal.fire({
                                              title:'Oops',
                                              html:'Campo municipio vacío...', 
                                              icon:'info',
                                              confirmButtonText:'Aceptar',
                                              onAfterClose: () => {
                                                $('#municipio').focus(); 
                                              }
                                            });
                                        }
                                    }else{
                                        Swal.fire({
                                          title:'Oops',
                                          html:'Campo código postal vacío...', 
                                          icon:'info',
                                          confirmButtonText:'Aceptar',
                                          onAfterClose: () => {
                                            $('#cpostal').focus(); 
                                          }
                                        });
                                    }
                                }else{
                                    Swal.fire({
                                      title:'Oops',
                                      html:'Campo domicilio vacío...', 
                                      icon:'info',
                                      confirmButtonText:'Aceptar',
                                      onAfterClose: () => {
                                        $('#domicilio').focus(); 
                                      }
                                    });
                                }
                                
                            }else{
                                Swal.fire({
                                  title:'Oops',
                                  html:'Campo fecha de nacimiento incorrecta...', 
                                  icon:'info',
                                  confirmButtonText:'Aceptar',
                                  onAfterClose: () => {
                                    $('#dia1').focus(); 
                                  }
                                });
                            }
                            
                        }else{
                             Swal.fire({
                              title:'Oops',
                              html:'Campo fecha de nacimiento incompleta...', 
                              icon:'info',
                              confirmButtonText:'Aceptar',
                              onAfterClose: () => {
                                $('#dia1').focus(); 
                              }
                            });
                        }
                           
                    }else{
                       
                        Swal.fire({
                          title:'Oops',
                          html:'Campo email, formato inválido...', 
                          icon:'error',
                          confirmButtonText:'Aceptar',
                          onAfterClose: () => {
                            $('#email').focus(); 
                          }
                        }); 
                    }
        
                }else{
                   
                    Swal.fire({
                      title:'Oops',
                      html:'Campo whatsapp, 10 dígitos mínimo...', 
                      icon:'info',
                      confirmButtonText:'Aceptar',
                      onAfterClose: () => {
                        $('#telefono').focus(); 
                      }
                    }); 
                }
                
                
            
            }else{
               
                Swal.fire({
                  title:'Oops',
                  html:'Campo apellido 1 vacío...', 
                  icon:'info',
                  confirmButtonText:'Aceptar',
                  onAfterClose: () => {
                    $('#apellido1').focus(); 
                  }
                }); 
            }
            
        }else{
           
            Swal.fire({
              title:'Oops',
              html:'Campo nombre prospecto vacío...', 
              icon:'info',
              confirmButtonText:'Aceptar',
              onAfterClose: () => {
                $('#nombre').focus(); 
              }
            }); 
        }
        
    }else if(tipo === 'formapago'){
       var id = $('#id').val();
        var plataforma = $("#plataforma").val();
        var nombre = $("#nombre").val();
        var comision_porcentaje = $("#comision_porcentaje").val();
        var comision_pesos = $("#comision_pesos").val();
        var comision_dolares = $("#comision_dolares").val();
        
       var id_editar = $('#id_editar').val();

        if(id != ''){   //SI NO TIENE NOMBRE MANDA ERROR  
            if(plataforma!=''){
                if(nombre != ''){ //SI NO TIENE CATEGORIA MANDA ERROR
                    if(comision_porcentaje != ''){
                        if(comision_pesos != ''){
                            if(comision_dolares != ''){
                                
                                //SI TIENE DATOS COMPLETOS ENTRA.
                                var editarRegistro = new FormData(); //SE CREA UN OBJET
                                editarRegistro.append('id',id); //SE AGREGA ID
                                editarRegistro.append('plataforma',plataforma);
                                editarRegistro.append('nombre',nombre); //SE AGREGA NOMBRE
                                editarRegistro.append('comision_porcentaje',comision_porcentaje); 
                                editarRegistro.append('comision_pesos',comision_pesos); 
                                editarRegistro.append('comision_dolares',comision_dolares); 
                                
                                editarRegistro.append('id_editar',id_editar);   //SE AGREGA EL id_editar QUE SERA EL TIPO
                                editarRegistro.append('accion',tipo);   //SE AGREGA LA CCION QUE SERA EL TIPO
                                
                                
                                var xhr = new XMLHttpRequest(); //SE CREA UN OBJETO
                                xhr.open('POST','includes/modelo/editar.php', true); //SE ESPECIFICA EL METODO, A DONDE Y SI ES ASINCRONO
                                xhr.onload = function(){
                
                                    if(this.status === 200){    //SI LA RESPUESTA ES EXITOSA ENTRA
                
                                        var respuesta = JSON.parse(xhr.responseText);
                                        if(respuesta.respuesta === 'success'){
                
                                            Swal.fire(
                                                'Correcto',
                                                respuesta.mensaje,
                                                respuesta.respuesta,
                                                'Aceptar'
                                            ).then((result) => {
                                                if(result.value){
                                                        window.location.href = 'index.php?id=formaspago';
                                                }
                                            }) 
                
                                        }else{
                
                                            Swal.fire(
                                                'Error',
                                                respuesta.mensaje,
                                                respuesta.respuesta,
                                                'Volver a intentar'
                                            )
                
                                        }
                
                                    }else{  //SI ES OTRA RESPUESTA MANDA ERROR
                
                                        Swal.fire(
                                            'Error',
                                            'Sucedio un error',
                                            'error',
                                            'Aceptar'
                                        )
                
                                    }
                
                                }
                                xhr.send(editarRegistro);   //ENVIAMOS LOS DATOS
                            
                            }else{
            
                                 Swal.fire({
                                  title:'Oops',
                                  html:'Campo comisión dolares vacío...', 
                                  icon:'info',
                                  confirmButtonText:'Aceptar',
                                  onAfterClose: () => {
                                    $('#comision_dolares').focus(); 
                                  }
                                }); 
                            }
                            
                        }else{
        
                             Swal.fire({
                              title:'Oops',
                              html:'Campo comisión pesos vacío...', 
                              icon:'info',
                              confirmButtonText:'Aceptar',
                              onAfterClose: () => {
                                $('#comision_pesos').focus(); 
                              }
                            }); 
                        }
                         
                    }else{
                         Swal.fire({
                              title:'Oops',
                              html:'Campo comisión porcentaje vacío...', 
                              icon:'info',
                              confirmButtonText:'Aceptar',
                              onAfterClose: () => {
                                $('#comision_porcentaje').focus(); 
                              }
                            });
                    }
    
                }else{
                     Swal.fire({
                      title:'Oops',
                      html:'Campo nombre vacío...', 
                      icon:'info',
                      confirmButtonText:'Aceptar',
                      onAfterClose: () => {
                        $('#nombre').focus(); 
                      }
                    }); 
                    
                }
                    
            }else{
                Swal.fire({
                  title:'Oops',
                  html:'Campo plataforma vacío...', 
                  icon:'info',
                  confirmButtonText:'Aceptar',
                  onAfterClose: () => {
                    $('#plataforma').focus(); 
                  }
                });
            }
        }else{
            
            Swal.fire({
              title:'Oops',
              html:'Campo id vacío...', 
              icon:'info',
              confirmButtonText:'Aceptar',
              onAfterClose: () => {
                $('#id').focus(); 
              }
            }); 
            
        }
        
    }else if(tipo === 'empresa'){
        
        var nombre = $("#nombre").val();
        var nombre_corto = $("#nombre_corto").val();
        var rfc= $("#rfc").val();
        var telefono = $("#telefono").val();
        var email = $("#email").val();
        
        var merchantid = $("#merchantid").val();
        var llavepublica = $("#llavepublica").val();
        var llaveprivada = $("#llaveprivada").val();
        var openpay_sandbox = $("#openpay_sandbox").val();

        /*
        var clientid = $("#clientid").val();

        var canTra_beneficiario = $("#canTra_beneficiario").val();
        var canTra_banco = $("#canTra_banco").val();
        var canTra_clabe = $("#canTra_clabe").val();

        var beneficiario = $("#beneficiario").val();
        var banco = $("#banco").val();
        var clabe = $("#clabe").val();

        var beneficiario_est = $("#beneficiario_est").val();
        var banco_est = $("#banco_est").val();
        var nocta_est = $("#nocta_est").val();
        var notarjeta_est = $("#notarjeta_est").val();
        */
        
        var id_editar = $('#id_editar').val();
        
        
        
        var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
        
        
        if(nombre){
            if(nombre_corto){
                if(rfc.length>=12){
                    if(telefono.length>=8){
                        if(caract.test(email)==true){
                                                            //SI TIENE DATOS COMPLETOS ENTRA.
                            var envioDatos = new FormData(); //SE CREA UN OBJET
                           
                            envioDatos.append('nombre',nombre); //SE AGREGA NOMBRE
                            envioDatos.append('nombre_corto',nombre_corto); //SE AGREGA NUMERO DE PAGOS
                            envioDatos.append('rfc',rfc); //SE AGREGA PRECIO
                            envioDatos.append('telefono',telefono); //SE AGREGA ID
                            envioDatos.append('email',email); //SE AGREGA NOMBRE
                            envioDatos.append('merchantid',merchantid);
                            envioDatos.append('llavepublica',llavepublica);
                            envioDatos.append('llaveprivada',llaveprivada);
                            envioDatos.append('openpay_sandbox',openpay_sandbox);


                            /*
                            envioDatos.append('clientid',clientid);

                            envioDatos.append('canastas_traBen',canTra_beneficiario);
                            envioDatos.append('canastas_traBanco',canTra_banco);
                            envioDatos.append('canastas_traClabe',canTra_clabe);

                            envioDatos.append('beneficiario',beneficiario);
                            envioDatos.append('banco',banco);
                            envioDatos.append('clabe',clabe);
                            envioDatos.append('beneficiario_est',beneficiario_est);
                            envioDatos.append('banco_est',banco_est);
                            envioDatos.append('nocta_est',nocta_est);
                            envioDatos.append('notarjeta_est',notarjeta_est);
                            */
                           
                            envioDatos.append('id_editar',id_editar);   //SE AGREGA EL id_editar QUE SERA EL TIPO
                            envioDatos.append('accion',tipo);   //SE AGREGA LA CCION QUE SERA EL TIPO
            
                            var xhr = new XMLHttpRequest(); //SE CREA UN OBJETO
                            xhr.open('POST','includes/modelo/editar.php', true); //SE ESPECIFICA EL METODO, A DONDE Y SI ES ASINCRONO
                            xhr.onload = function(){
            
                                if(this.status === 200){    //SI LA RESPUESTA ES EXITOSA ENTRA
            
                                    var respuesta = JSON.parse(xhr.responseText);
                                    console.log(respuesta);
                                    if(respuesta.respuesta === 'success'){
            
                                        Swal.fire(
                                            'Correcto',
                                            respuesta.mensaje,
                                            respuesta.respuesta,
                                            'Aceptar'
                                        ).then((result) => {
                                            if(result.value){
                                                    window.location.href = 'index.php?id=empresas';
                                            }
                                        }) 
            
                                    }else{
            
                                        Swal.fire(
                                            'Error',
                                            respuesta.mensaje,
                                            respuesta.respuesta,
                                            'Volver a intentar'
                                        )
            
                                    }
            
                                }else{  //SI ES OTRA RESPUESTA MANDA ERROR
            
                                    Swal.fire(
                                        'Error',
                                        'Sucedio un error',
                                        'error',
                                        'Aceptar'
                                    )
            
                                }
            
                            }
                            xhr.send(envioDatos);   //ENVIAMOS LOS DATOS

                        }else{
                           
                            Swal.fire({
                              title:'Oops',
                              html:'Campo email, formato inválido...', 
                              icon:'error',
                              confirmButtonText:'Aceptar',
                              onAfterClose: () => {
                                $('#email').focus(); 
                              }
                            }); 
                        }
            
                    }else{
                       
                        Swal.fire({
                          title:'Oops',
                          html:'Campo teléfono, 8 dígitos mínimo...', 
                          icon:'info',
                          confirmButtonText:'Aceptar',
                          onAfterClose: () => {
                            $('#telefono').focus(); 
                          }
                        }); 
                    }
            
                }else{
                   
                    Swal.fire({
                      title:'Oops',
                      html:'Campo RFC, 12 caracteres mínimo...', 
                      icon:'info',
                      confirmButtonText:'Aceptar',
                      onAfterClose: () => {
                        $('#rfc').focus(); 
                      }
                    }); 
                }
            
            }else{
               
                Swal.fire({
                  title:'Oops',
                  html:'Campo nombre corto empresa vacío...', 
                  icon:'info',
                  confirmButtonText:'Aceptar',
                  onAfterClose: () => {
                    $('#nombre_corto').focus(); 
                  }
                }); 
            }
            
        }else{
           
            Swal.fire({
              title:'Oops',
              html:'Campo nombre empresa vacío...', 
              icon:'info',
              confirmButtonText:'Aceptar',
              onAfterClose: () => {
                $('#nombre').focus(); 
              }
            }); 
        }
            
       
    }else if(tipo === 'expo'){
        
        var nombre = $("#nombre").val();
        var nombre_corto = $("#nombre_corto").val();
        var contacto= $("#contacto").val();
        var telefono = $("#telefono").val();
        var email = $("#email").val();
        var link = $("#link").val();
        
        var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
        
        var id_editar = $('#id_editar').val();
        
        if(nombre){
            if(nombre_corto){
                if(contacto){
                    if(telefono.length>=10){
                        if(caract.test(email)==true){
                            if(link){
                                
                                 //SI TIENE DATOS COMPLETOS ENTRA.
                                var envioDatos = new FormData(); //SE CREA UN OBJET
                               
                                envioDatos.append('nombre',nombre); //SE AGREGA NOMBRE
                                envioDatos.append('nombre_corto',nombre_corto); //SE AGREGA NUMERO DE PAGOS
                                envioDatos.append('contacto',contacto); //SE AGREGA PRECIO
                                envioDatos.append('telefono',telefono); //SE AGREGA ID
                                envioDatos.append('email',email); //SE AGREGA NOMBRE
                                envioDatos.append('link',link);
                               
                                envioDatos.append('id_editar',id_editar);  
                                envioDatos.append('accion',tipo);   //SE AGREGA LA CCION QUE SERA EL TIPO
                
                                var xhr = new XMLHttpRequest(); //SE CREA UN OBJETO
                                xhr.open('POST','includes/modelo/editar.php', true); //SE ESPECIFICA EL METODO, A DONDE Y SI ES ASINCRONO
                                xhr.onload = function(){
                
                                    if(this.status === 200){    //SI LA RESPUESTA ES EXITOSA ENTRA
                
                                        var respuesta = JSON.parse(xhr.responseText);
                                        console.log(respuesta);
                                        if(respuesta.respuesta === 'success'){
                
                                            Swal.fire(
                                                'Correcto',
                                                respuesta.mensaje,
                                                respuesta.respuesta,
                                                'Aceptar'
                                            ).then((result) => {
                                                if(result.value){
                                                        window.location.href = 'index.php?id=expos';
                                                }
                                            }) 
                
                                        }else{
                
                                            Swal.fire(
                                                'Error',
                                                respuesta.mensaje,
                                                respuesta.respuesta,
                                                'Volver a intentar'
                                            )
                
                                        }
                
                                    }else{  //SI ES OTRA RESPUESTA MANDA ERROR
                
                                        Swal.fire(
                                            'Error',
                                            'Sucedio un error',
                                            'error',
                                            'Aceptar'
                                        )
                
                                    }
                
                                }
                                xhr.send(envioDatos);   //ENVIAMOS LOS DATOS
                                
                            }else{
                               Swal.fire({
                                  title:'Oops',
                                  html:'Campo link vacío...', 
                                  icon:'info',
                                  confirmButtonText:'Aceptar',
                                  onAfterClose: () => {
                                    $('#link').focus(); 
                                  }
                                }); 
                            }


                        }else{
                           
                            Swal.fire({
                              title:'Oops',
                              html:'Campo email, formato inválido...', 
                              icon:'error',
                              confirmButtonText:'Aceptar',
                              onAfterClose: () => {
                                $('#email').focus(); 
                              }
                            }); 
                        }
            
                    }else{
                       
                        Swal.fire({
                          title:'Oops',
                          html:'Campo teléfono, 10 dígitos mínimo...', 
                          icon:'info',
                          confirmButtonText:'Aceptar',
                          onAfterClose: () => {
                            $('#telefono').focus(); 
                          }
                        }); 
                    }
            
                }else{
                   
                    Swal.fire({
                      title:'Oops',
                      html:'Campo contacto vacío...', 
                      icon:'info',
                      confirmButtonText:'Aceptar',
                      onAfterClose: () => {
                        $('#contacto').focus(); 
                      }
                    }); 
                }
            
            }else{
               
                Swal.fire({
                  title:'Oops',
                  html:'Campo nombre corto vacío...', 
                  icon:'info',
                  confirmButtonText:'Aceptar',
                  onAfterClose: () => {
                    $('#nombre_corto').focus(); 
                  }
                }); 
            }
            
        }else{
           
            Swal.fire({
              title:'Oops',
              html:'Campo nombre vacío...', 
              icon:'info',
              confirmButtonText:'Aceptar',
              onAfterClose: () => {
                $('#nombre').focus(); 
              }
            }); 
        }
            
            
       
    }else if(tipo === 'cobro'){
        
        $("#loader").show();
        
        var idsolicitud = $("#idsolicitud").val();
        var nombre = $("#nombre").val();
        var apellido1 = $("#apellido1").val();
        var apellido2 = $("#apellido2").val();
        
        var producto = $("#producto_select").val();
        var moneda = $("#moneda").val();
        var monto = $("#precio").val();
        var formapago = $("#formapago").val();
        
        var id_editar = $('#id_editar').val();
        
        if(producto!='----'){
            if(formapago!='----'){
                if(moneda!='----'){
                    
                    if(monto!=''){
                        var envioDatos = new FormData(); //SE CREA UN OBJET
                        envioDatos.append('idsolicitud',idsolicitud); //SE AGREGA ID
                        envioDatos.append('nombre',nombre); //SE AGREGA NOMBRE
                        envioDatos.append('apellido1',apellido1); //SE AGREGA NUMERO DE PAGOS
                        envioDatos.append('apellido2',apellido2); //SE AGREGA PRECIO
                        
                        envioDatos.append('producto',producto); //SE AGREGA ID
                        envioDatos.append('moneda',moneda); //SE AGREGA NOMBRE
                        envioDatos.append('monto',monto); //SE AGREGA NOMBRE
                        envioDatos.append('formapago',formapago); //SE AGREGA NOMBRE
                       
                        envioDatos.append('id_editar',id_editar);   //SE AGREGA EL id_editar QUE SERA EL TIPO
                        envioDatos.append('accion',tipo);   //SE AGREGA LA CCION QUE SERA EL TIPO
        
                        var xhr = new XMLHttpRequest(); //SE CREA UN OBJETO
                        xhr.open('POST','includes/modelo/editar.php', true); //SE ESPECIFICA EL METODO, A DONDE Y SI ES ASINCRONO
                        xhr.onload = function(){
        
                            if(this.status === 200){    //SI LA RESPUESTA ES EXITOSA ENTRA
        
                                var respuesta = JSON.parse(xhr.responseText);
                                console.log(respuesta);
                                if(respuesta.respuesta === 'success'){
                                    $("#loader").hide();
                                    Swal.fire(
                                        'Correcto',
                                        respuesta.mensaje,
                                        respuesta.respuesta,
                                        'Aceptar'
                                    ).then((result) => {
                                        if(result.value){
                                                window.location.href = 'index.php?id=cobro';
                                        }
                                    }) 
        
                                }else{
                                     $("#loader").hide();
                                    Swal.fire(
                                        'Error',
                                        respuesta.mensaje,
                                        respuesta.respuesta,
                                        'Volver a intentar'
                                    )
        
                                }
        
                            }else{  //SI ES OTRA RESPUESTA MANDA ERROR
                                 $("#loader").hide();
                                Swal.fire(
                                    'Error',
                                    'Sucedio un error',
                                    'error',
                                    'Aceptar'
                                )
        
                            }
        
                        }
                        xhr.send(envioDatos);   //ENVIAMOS LOS DATOS
                        
                    }
                    else{
                        $("#loader").hide();
                        Swal.fire({
                          title:'Oops',
                          html:'Campo precio vacío...', 
                          icon:'info',
                          confirmButtonText:'Aceptar',
                          onAfterClose: () => {
                            $('#producto_select').focus(); 
                          }
                        }); 
                        
                    }
                    
                }else{
                    $("#loader").hide();
                    Swal.fire({
                      title:'Oops',
                      html:'Campo moneda vacío...', 
                      icon:'info',
                      confirmButtonText:'Aceptar',
                      onAfterClose: () => {
                        $('#moneda').focus(); 
                      }
                    }); 
                    
                }

            }else{
                 $("#loader").hide();
                Swal.fire({
                  title:'Oops',
                  html:'Campo forma de pago vacío...', 
                  icon:'info',
                  confirmButtonText:'Aceptar',
                  onAfterClose: () => {
                    $('#formapago').focus(); 
                  }
                }); 
                
            }
            
        }else{
            $("#loader").hide();
            Swal.fire({
              title:'Oops',
              html:'Campo producto vacío...', 
              icon:'info',
              confirmButtonText:'Aceptar',
              onAfterClose: () => {
                $('#producto_select').focus(); 
              }
            }); 
            
        }
        
        
    }else if (tipo === 'configuracion') {

       $("#contentSpinnerPrimary").show();
      
      let iva = $('#iva').val();
      let Dominio = $('#Dominio').val();
      
      
       var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

        
        if(iva!=''){
            if(Dominio!=''){

                var editarConfiguracion = new FormData();
    
                
                editarConfiguracion.append('iva', iva);
                editarConfiguracion.append('Dominio', Dominio);
                
                editarConfiguracion.append('accion', tipo);

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'includes/modelo/editar.php', true);
                xhr.onload = function () {

                  if (this.status === 200) {

                    var respuesta = JSON.parse(xhr.responseText);
                    $("#contentSpinnerPrimary").hide();
                    if (respuesta.respuesta === 'success') {
                      Swal.fire('Éxito', respuesta.mensaje, respuesta.respuesta, 'Aceptar').then((result) => {
                        if (result.value) {
                          window.location.href = 'index.php?id=configuracion';
                        }
                      });
                    } else {
                      Swal.fire(respuesta.respuesta, respuesta.mensaje, respuesta.respuesta, 'Volver a intentar');
                    }

                  } else {
                    $("#contentSpinnerPrimary").hide();
                    Swal.fire('Error', 'Sucedio un error', 'error', 'Aceptar');
                  }

                }
                xhr.send(editarConfiguracion);

            }else{
                $("#contentSpinnerPrimary").hide();
                Swal.fire('Oops', 'Campo dominio vacío', 'error', 'Volver a intentar');
            }
            
        }else{
            $("#contentSpinnerPrimary").hide();
            Swal.fire('Oops', 'Campo iva vacío', 'error', 'Volver a intentar');
        }
                    
               
      

    }else if(tipo === 'usuario'){
        
    
        var email = $("#email").val();
        var usuario = $("#usuario").val();
        var rol = $("#rol").val();
        var contrasenia= $("#contrasenia").val();
        
        var id_editar = $('#id_editar').val();
        
        var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
        
        
        if(caract.test(email)==true){
            if(usuario!=''){
                if(rol!='----'){
                    
                                        //SI TIENE DATOS COMPLETOS ENTRA.
                    var envioDatos = new FormData(); //SE CREA UN OBJET
                    envioDatos.append('email',email); //SE AGREGA ID
                    envioDatos.append('usuario',usuario); //SE AGREGA NOMBRE
                    envioDatos.append('rol',rol);
                    envioDatos.append('contrasenia',contrasenia); //SE AGREGA NUMERO DE PAGOS
                    
                    envioDatos.append('id_editar',id_editar);   //SE AGREGA LA CCION QUE SERA EL TIPO
                    envioDatos.append('accion',tipo);   //SE AGREGA LA CCION QUE SERA EL TIPO
        
                    var xhr = new XMLHttpRequest(); //SE CREA UN OBJETO
                    xhr.open('POST','includes/modelo/editar.php', true); //SE ESPECIFICA EL METODO, A DONDE Y SI ES ASINCRONO
                    xhr.onload = function(){
        
                        if(this.status === 200){    //SI LA RESPUESTA ES EXITOSA ENTRA
        
                            var respuesta = JSON.parse(xhr.responseText);
                            console.log(respuesta);
                            if(respuesta.respuesta === 'success'){
        
                                Swal.fire(
                                    'Correcto',
                                    respuesta.mensaje,
                                    respuesta.respuesta,
                                    'Aceptar'
                                ).then((result) => {
                                    if(result.value){
                                            window.location.href = 'index.php?id=usuarios';
                                    }
                                }) 
        
                            }else{
        
                                Swal.fire(
                                    'Error',
                                    respuesta.mensaje,
                                    respuesta.respuesta,
                                    'Volver a intentar'
                                )
        
                            }
        
                        }else{  //SI ES OTRA RESPUESTA MANDA ERROR
        
                            Swal.fire(
                                'Error',
                                'Sucedio un error',
                                'error',
                                'Aceptar'
                            )
        
                        }
        
                    }
                    xhr.send(envioDatos);   //ENVIAMOS LOS DATOS
                    
                }else{
                     Swal.fire({
                      title:'Oops',
                      html:'Campo rol vacío...', 
                      icon:'info',
                      confirmButtonText:'Aceptar',
                      onAfterClose: () => {
                        $('#rol').focus(); 
                      }
                    });
                }
                
            }else{
                Swal.fire({
                  title:'Oops',
                  html:'Campo usuario vacío...', 
                  icon:'info',
                  confirmButtonText:'Aceptar',
                  onAfterClose: () => {
                    $('#usuario').focus(); 
                  }
                });
            }

        }else{
           
            Swal.fire({
              title:'Oops',
              html:'Campo email, formato inválido...', 
              icon:'error',
              confirmButtonText:'Aceptar',
              onAfterClose: () => {
                $('#email').focus(); 
              }
            }); 
        }
                
        
    }
}

function revisarfechas(dia, mes,anio){
    
    if(mes=='04' || mes=='06' || mes=='09' || mes=='11'){
        if( parseInt(dia)>30 ){
            return false;
        }
        else{
            return true;
        }
        
    }else if(mes=='02'){
        var res = parseInt(anio)%4;
        
        if(res==0){
            //AÑO BISIESTO
            if( parseInt(dia)>29 ){
                return false;
            }
            else{
                return true;
            }
            
        }else{
            //AÑO NO BISIESTO
            if( parseInt(dia)>28 ){
                return false;
            }
            else{
                return true;
            }
            
        }
        
    }else{
        return true;
    }
    
}


function revisardescuento(i, fi,ff){
    
    var check_descuento=$('#check_descuento'+i).prop('checked');
    var tipo_descuento=$("#tipo_descuento_desc"+i).val();
    var cantidad1=$("#cantidad1_desc"+i).val();
    var cantidad2=$("#cantidad2_desc"+i).val();
    var existencia=$("#existencia_desc"+i).val();
    var diai = $("#dia"+fi).val();
    var mesi = $("#mes"+fi).val();
    var anioi = $("#anio"+fi).val();
    if(diai!='----' && mesi!='----' && anioi!='----'){
         var descuento_inicio = anioi+'-'+mesi+'-'+diai;
    }else{
        var descuento_inicio = '';
    }
    var descuento_hora_inicio=$("#descuento_hora_inicio_desc"+i).val();
    var diaf = $("#dia"+ff).val();
    var mesf = $("#mes"+ff).val();
    var aniof = $("#anio"+ff).val();
    if(diaf!='----' && mesf!='----' && aniof!='----'){
         var descuento_fin = aniof+'-'+mesf+'-'+diaf;
    }else{
        var descuento_fin = '';
    }
    var descuento_hora_fin=$("#descuento_hora_fin_desc"+i).val();
    var codigo_descuento=$("#codigo_descuento_desc"+i).val();
    
    if( (check_descuento==true && tipo_descuento!='----') || check_descuento==false ){
        if( (check_descuento==true && cantidad1!='') || check_descuento==false ){
            if( (check_descuento==true && tipo_descuento=="Dinero" && cantidad2!='') || (check_descuento==true && tipo_descuento!="Dinero") || check_descuento==false ){
                if( (check_descuento==true && existencia!='') || check_descuento==false ){
                    if( (check_descuento==true && descuento_inicio!='') || check_descuento==false ){
                        if( (check_descuento==true && revisarfechas(diai, mesi,anioi)==true) || check_descuento==false ){
                            if( (check_descuento==true && descuento_hora_inicio!='') || check_descuento==false ){
                                if( (check_descuento==true && descuento_fin!='') || check_descuento==false ){
                                    if( (check_descuento==true && revisarfechas(diaf, mesf,aniof)==true) || check_descuento==false ){
                                        if( (check_descuento==true && descuento_hora_fin!='') || check_descuento==false ){
                                            if( (check_descuento==true && codigo_descuento!='') || check_descuento==false ){
                                                
                                               return true;
                
                                            }
                                            else{
                                                $("#loader").hide();
                                                Swal.fire({
                                                  title:'Oops',
                                                  html:'Campo código descuento vacío...', 
                                                  icon:'info',
                                                  confirmButtonText:'Aceptar',
                                                  onAfterClose: () => {
                                                    $('#codigo_descuento_desc'+i).focus(); 
                                                  }
                                                });
                                                return false;
                                            }
                
                                        }
                                        else{
                                            $("#loader").hide();
                                            Swal.fire({
                                              title:'Oops',
                                              html:'Campo hora fin vacío...', 
                                              icon:'info',
                                              confirmButtonText:'Aceptar',
                                              onAfterClose: () => {
                                                $('#descuento_hora_fin_desc'+i).focus(); 
                                              }
                                            });
                                            return false;
                                        }
                                    }else{
                                         Swal.fire({
                                              title:'Oops',
                                              html:'Campo fecha fin incorrecto...', 
                                              icon:'info',
                                              confirmButtonText:'Aceptar',
                                              onAfterClose: () => {
                                                $('#dia'+ff).focus(); 
                                              }
                                            });
                                        return false;
                                    }
            
                                }
                                else{
                                    $("#loader").hide();
                                    Swal.fire({
                                      title:'Oops',
                                      html:'Campo fecha fin incompleto...', 
                                      icon:'info',
                                      confirmButtonText:'Aceptar',
                                      onAfterClose: () => {
                                        $('#descuento_fin_desc'+i).focus(); 
                                      }
                                    });
                                    return false;
                                }
            
                            }
                            else{
                                $("#loader").hide();
                                Swal.fire({
                                  title:'Oops',
                                  html:'Campo hora inicio vacío...', 
                                  icon:'info',
                                  confirmButtonText:'Aceptar',
                                  onAfterClose: () => {
                                    $('#descuento_hora_inicio_desc'+i).focus(); 
                                  }
                                });
                                return false;
                            }
                        }else{
                             Swal.fire({
                                  title:'Oops',
                                  html:'Campo fecha inicio incorrecto...', 
                                  icon:'info',
                                  confirmButtonText:'Aceptar',
                                  onAfterClose: () => {
                                    $('#dia'+fi).focus(); 
                                  }
                                });
                                return false;
                        }
        
                    }
                    else{
                        $("#loader").hide();
                        Swal.fire({
                          title:'Oops',
                          html:'Campo fecha inicio incompleto...', 
                          icon:'info',
                          confirmButtonText:'Aceptar',
                          onAfterClose: () => {
                            $('#descuento_inicio_desc'+i).focus(); 
                          }
                        });
                        return false;
                    }
        
                }
                else{
                    $("#loader").hide();
                    Swal.fire({
                      title:'Oops',
                      html:'Campo existencia vacío...', 
                      icon:'info',
                      confirmButtonText:'Aceptar',
                      onAfterClose: () => {
                        $('#existencia_desc'+i).focus(); 
                      }
                    });
                    return false;
                }
            }
            else{
                $("#loader").hide();
                Swal.fire({
                  title:'Oops',
                  html:'Campo cantidad(usd) vacío...', 
                  icon:'info',
                  confirmButtonText:'Aceptar',
                  onAfterClose: () => {
                    $('#cantidad2_desc'+i).focus(); 
                  }
                });
                return false;
            }
        }
        else{
            $("#loader").hide();
            Swal.fire({
              title:'Oops',
              html:'Campo cantidad vacío...', 
              icon:'info',
              confirmButtonText:'Aceptar',
              onAfterClose: () => {
                $('#cantidad1_desc'+i).focus(); 
              }
            });
            return false;
        }
        
    }
    else{
        $("#loader").hide();
        Swal.fire({
          title:'Oops',
          html:'Campo tipo descuento vacío...', 
          icon:'info',
          confirmButtonText:'Aceptar',
          onAfterClose: () => {
            $('#tipo_descuento_desc'+i).focus(); 
          }
        });
        return false;
    }
    
}