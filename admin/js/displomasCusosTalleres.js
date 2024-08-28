
function modalDescuento(code){

    $('.loadingsalida').show();
    $('.noloadingsalida').hide();

    $.post('includes/funciones/modales.php', {code:code,opcion:"modalDescCursosTalleres"},function(data){
        $('.contentModal').html(data);
        $('#divModal').modal();
        $('#titleModal').html('Descuento');
        $('.noloadingsalida').show();
        $('.loadingsalida').hide();

        
    });

}


