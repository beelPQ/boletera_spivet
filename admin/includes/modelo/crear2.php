<?php

$accion = $_POST['accion']; //Se guarda accion en una variable global para validar que proceso debera tomar

if(isset($accion)){
    
    if($accion === 'cupon'){

        require_once ('../../php/conexion.php');
        $mysqli = conectar();

        $tipo_descuento = $_POST['tipo_descuento'];
        $cantidad1 = $_POST['cantidad1'];
        $cantidad2 = $_POST['cantidad2'];
        $stock = $_POST['stock'];
        $descuento_inicio = $_POST['descuento_inicio'];
        $descuento_hora_inicio = $_POST['descuento_hora_inicio'];
        $descuento_fin = $_POST['descuento_fin'];
        $descuento_hora_fin = $_POST['descuento_hora_fin'];
        $codigo = $_POST['codigo'];
        $notas = $_POST['notas'];
        $descuento_estado = $_POST['descuento_estado'];


        $cantidad1 = filter_var($cantidad1, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        if($tipo_descuento=="Dinero"){
            
            $cantidad2 = filter_var($cantidad2, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
            
        }else{
            $cantidad2 = NULL;
        }
        $stock = filter_var($stock, FILTER_SANITIZE_NUMBER_INT);
        $fecha_descuento_inicio=date("Y-m-d H:i:s",strtotime($descuento_inicio.' '.$descuento_hora_inicio));
        $fecha_descuento_fin=date("Y-m-d H:i:s",strtotime($descuento_fin.' '.$descuento_hora_fin));
        // $codigo = filter_var($codigo, FILTER_SANITIZE_STRING);
        if($notas!=''){
            // $notas = filter_var($notas, FILTER_SANITIZE_STRING);
        }else{
            $notas = '';
        }


        $query = $mysqli->prepare(" SELECT descuento_codigo FROM catalogo_descuentos WHERE descuento_codigo = ?");
        $query -> bind_param('s',$codigo);
        $query -> execute();
        $query -> bind_result($codigo_existente);
        $query -> fetch();
        $query -> close();
        
        if($codigo_existente){
            $mysqli -> close();
            $respuesta = array(
                    'respuesta' => 'error',
                    'type' => 'error',
                    'mensaje' => 'El código del cupón ya esta asignado a otro.',
                    'boton' => 'Volver a intentar'
                            );
            die(json_encode($respuesta));
        }

        try{
            $cantidad2 = 0;

            $tipodesc=2; // 1 es decuento de producto y 2 es para descuento de compra
            $query = $mysqli->prepare(" INSERT INTO catalogo_descuentos (
                                                                descuento_tipo,
                                                                descuento_formato,
                                                                descuento_cantidad,
                                                                descuento_cantidad2,
                                                                descuento_existencia,
                                                                descuento_valido_desde,
                                                                descuento_valido_hasta,
                                                                descuento_codigo,
                                                                descuento_estatus,
                                                                descuento_notas
                                                                )
                                        VALUES (?,?,?,?,?,?,?,?,?,?)");
            $query -> bind_param('isddisssis',$tipodesc, $tipo_descuento,$cantidad1,$cantidad2,$stock,$fecha_descuento_inicio,$fecha_descuento_fin,$codigo,$descuento_estado,$notas);
            $query -> execute();
            //$query -> fetch();
            

            if($query->affected_rows>0){

                $query -> close();
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Cupón creado correctamente.'
                );
                echo die(json_encode($respuesta));

            }else{
                $query -> close();
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'Ocurrió un error al tratar de guardar los datos del cupón, intente de nuevo.'
                );
                echo die(json_encode($respuesta));

            } 

        }catch(Exception $e){
    
            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Error[1]:Sucedio un error al tratar de realizar el guardado de datos.'
            );
    
        }
        
        $mysqli -> close();

    }

}

echo die(json_encode($respuesta));


?>
