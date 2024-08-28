<?php

$accion = $_POST['accion'];

if($accion === 'eliminar'){
    
    $id = $_POST['id'];
    $objeto = $_POST['objeto'];

    require_once ('../../../templates/protostar/php/conexion.php');
    $mysqli = conectar();
    try{
        
        if($objeto === "producto"){$query = $mysqli->prepare(" DELETE FROM producto WHERE id_producto = ?");}
        elseif($objeto === "categoria"){$query = $mysqli->prepare(" DELETE FROM categoria WHERE id_categoria = ?");}
        $query -> bind_param('i',$id);
        $query -> execute();
        $query -> fetch();
        if($query->affected_rows>0){
            
            $respuesta = array(
                'respuesta' => 'success',
                'mensaje' => 'Su '.$objeto.' fue eliminado correctamente'
            );

        }else{

            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Vuelve a intentar...'
            );    

        }

        $query -> close();


    }catch(Exception $e){

        $respuesta = array(
            'respuesta' => 'error',
            'mensaje' => 'Vuelve a intentar...'
        );

    }

}else if($accion === 'contactar'){
    
    $id = $_POST['id'];
    $objeto = $_POST['objeto'];

    require_once ('../../../templates/protostar/php/conexion.php');
    $mysqli = conectar();
    try{
        $insertar = 1;
        if($objeto === "formescribenos"){$query = $mysqli->prepare(" UPDATE formescribenos SET contacto_formescribenos = ?, fecha_formescribenos = now() where id_formescribenos = ?");}
        elseif($objeto === "formpreorden"){$query = $mysqli->prepare(" UPDATE formpreorden SET contacto_formpreorden = ?, fecha_formpreorden = now() where id_formpreorden = ?");}
        $query -> bind_param('ii',$insertar,$id);
        $query -> execute();
        $query -> fetch();
        if($query->affected_rows>0){
            
            $respuesta = array(
                'respuesta' => 'success',
                'mensaje' => 'Se esta contactando al cliente'
            );

        }else{

            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Vuelve a intentar...'
            );    

        }

        $query -> close();


    }catch(Exception $e){

        $respuesta = array(
            'respuesta' => 'error',
            'mensaje' => 'Vuelve a intentar...'
        );

    }

}

$mysqli -> close();
echo die(json_encode($respuesta));

?>