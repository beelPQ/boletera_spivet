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
    
});


$('#cantidad1').on('input',function(e){
    var input = ($('#cantidad1').val().replace(/[^.0-9]/g, ''));

    var resarray = input.split('.');
    if(resarray.length>2){
        input = input.slice(0,-1)
    }

    $('#cantidad1').val(`${input}`);   
    
});

$('#cantidad2').on('input',function(e){
    var input = ($('#cantidad2').val().replace(/[^.0-9]/g, ''));

    var resarray = input.split('.');
    if(resarray.length>2){
        input = input.slice(0,-1)
    }

    $('#cantidad2').val(`${input}`); 

});


$('#stock').on('input',function(e){

    var input = ($('#stock').val().replace(/[^0-9]/g, ''));
    $('#stock').val(`${input}`); 

});





