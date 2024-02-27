<?php
include_once('includes/templates/header.php');

  include_once('includes/templates/aside.php');

  include_once('includes/templates/contenido-superior.php');
  
  //AQUI IRA EL CONTENIDO CENTRAL PARA ACADA APARTADO DEPENDIENDO DEL ID.
  
  //$administrador es id usuario
  
  if($id === "clientes" && $_SESSION['id_rol'] == 1){

    include_once('includes/templates/tablas/lista-clientes.php');

  }else if($id === "empresas" && $_SESSION['id_rol'] == 1){

    include_once('includes/templates/lista-empresas.php');

  }else if($id === "cursos_cobros" && ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 3) ){

    include_once('includes/templates/tablas/lista-cursoscobros.php');

  }else if($id === "cupones" && ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 4) ){

    include_once('includes/templates/tablas/lista-cupones.php');

  }else if($id === "servicios" && ($_SESSION['id_rol'] == 1 ) ){

    include_once('includes/templates/tablas/lista-servicios.php');

  }else if($id === "configuracion" && $_SESSION['id_rol'] == 1){

    include_once('includes/templates/configuracion.php');

  }else if($id === "usuarios" && $_SESSION['id_rol'] == 1){

    include_once('includes/templates/lista-usuarios.php');

  }else if($id === "crear_empresa" && $_SESSION['id_rol'] == 1){

    include_once('includes/templates/crear-empresa.php');

  }else if($id === "crear_cupon" && ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 4) ){

    include_once('includes/templates/crear/crear-cupon.php');

  }else if($id === "crear_servicio" && ($_SESSION['id_rol'] == 1 ) ){

    include_once('includes/templates/forms/form-servicio.php');

  }else if($id === "crear_usuario" && $_SESSION['id_rol'] == 1){

    include_once('includes/templates/crear-usuario.php');

  }else if($id === "editar_configuracion" && $_SESSION['id_rol'] == 1){

    include_once('includes/templates/editar_configuracion.php');

  }
  else if($id === "diploma_curos_talleres" && ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 4) ){
    include_once('includes/templates/tablas/listaDiplomadosTalleres.php');
  }//vista de servicios
  else if($id === "servicios" && ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 4) ){
    include_once('includes/templates/tablas/lista-servicios.php');
  }//fin vista de servicios
  else if($id === "crear_diplomasCurosTaller" && ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 4) ){
    include_once('includes/templates/crear/crearDiplomadosTalleres.php');
  }
  
  if((substr($id,0,6)) === 'editar'){
    list($accion, $idregistro) = explode(":", $id);

    if($accion === 'editar-clientes' && ($_SESSION['id_rol'] == 1 ) ){
  
      include_once('includes/templates/editar/editar-cliente.php');
  
    }else if($accion === 'editar-empresa' && $_SESSION['id_rol'] == 1){
  
      include_once('includes/templates/editar-empresa.php');
  
    }else if($accion === 'editar-cupones' && ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 4) ){
  
      include_once('includes/templates/editar/editar-cupon.php');
  
    }else if($accion === 'editar-servicios' && ($_SESSION['id_rol'] == 1 ) ){
  
      include_once('includes/templates/forms/form-servicio.php');
  
    }else if($accion === 'editar-usuarios' && $_SESSION['id_rol'] == 1){
  
      include_once('includes/templates/editar-usuario.php');
  
    }
    else if($accion === 'editar-diplomasCurosTaller' && ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 4) ){ 
      include_once('includes/templates/editar/editarDiplomasCursosTalleres.php'); 
    }
    
  }
  //TERMINA CONTENIDO CENTRAL
  include_once('includes/templates/footer.php');
?>

  


