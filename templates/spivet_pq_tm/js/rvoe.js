// Button de modalidad
$(document).on('click', '.rvoe__modalidad a',  function(){
    $(".rvoe__modalidad a").removeClass("active");     
    $(this).addClass('active');     
    $(this).removeData('id_categoria');   
    var id_categoria = $(this).data('id_categoria');    
    $(".rvoe__categoria").css("display","none");
    $(".rvoe__categoria--"+id_categoria).removeAttr("style"); 
});