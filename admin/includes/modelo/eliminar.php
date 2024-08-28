<?php

$accion = $_POST['accion'];

if($accion === 'eliminar'){
    
    $respuesta = array();
    $queEliminar = preg_split( '/(,|:)/', $_POST['arrayId']);

    require_once ('../../php/conexion.php');
    $mysqli = conectar();
    $contador=0;
    try{
        
        if($queEliminar[0] === 'productos'){
            
            $concobro=0;
            for($i = 0; $i<= count($queEliminar) ;$i=$i+2){
                
                
                $query = $mysqli->prepare('SELECT producto_IDproducto FROM cobros WHERE producto_IDproducto = ? ');
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> bind_result($cobroProducto);
                $query -> fetch();
                $query -> close();
                
                if($cobroProducto){
                    $concobro=1;
                    break;
                }
                
                $contador++;
                $query = $mysqli->prepare("DELETE FROM producto WHERE IDsystempro = ?");
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> fetch();
                if($query->affected_rows>0){
                    $mensaje = "registro";
                    if($i>1){
                        $mensaje = "registros";
                    }
                    $respuesta = array(
                        'respuesta' => 'success',
                        'mensaje' => 'Se elimino '.$contador.' '.$mensaje,
                        'retorno' => 'producto'
                    );
                }
                $query -> close();
                
                
            }
            
            if($concobro==1 && $contador==0){
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'Uno de los productos tiene cobros relacionados',
                    
                );
            }else if($concobro==1 && $contador>0){
                $respuesta = array(
                    'respuesta' => 'error_conborrado',
                    'mensaje' => 'Algunos productos tienen cobros relacionados y no pudieron ser eliminados',
                    'retorno' => 'producto'
                );
            }
            
        }else if($queEliminar[0] === 'tiendaproducto'){
            
            $concobro=0;
            for($i = 0; $i<= count($queEliminar) ;$i=$i+2){
                
                
                $query = $mysqli->prepare('SELECT tienda_producto_id_producto FROM cobros WHERE tienda_producto_id_producto = ? ');
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> bind_result($cobroProducto);
                $query -> fetch();
                $query -> close();
                
                if($cobroProducto){
                    $concobro=1;
                    break;
                }
                
                $contador++;
                $query = $mysqli->prepare("DELETE FROM tienda_producto WHERE id_producto = ?");
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> fetch();
                if($query->affected_rows>0){
                    $mensaje = "registro";
                    if($i>1){
                        $mensaje = "registros";
                    }
                    $respuesta = array(
                        'respuesta' => 'success',
                        'mensaje' => 'Se elimino '.$contador.' '.$mensaje,
                        'retorno' => 'tienda_producto'
                    );
                }
                $query -> close();
                
                
            }
            
            if($concobro==1 && $contador==0){
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'Uno de los productos tiene cobros relacionados',
                    
                );
            }else if($concobro==1 && $contador>0){
                $respuesta = array(
                    'respuesta' => 'error_conborrado',
                    'mensaje' => 'Algunos productos tienen cobros relacionados y no pudieron ser eliminados',
                    'retorno' => 'tienda_producto'
                );
            }
            
        }else if($queEliminar[0] === 'canastaproducto'){
            
            $conpedido=0;
            for($i = 0; $i<= count($queEliminar) ;$i=$i+2){
                
                
                $query = $mysqli->prepare('SELECT id_canasta_producto FROM canastas_pedidos_productos WHERE id_canasta_producto = ? ');
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> bind_result($pedidoProducto);
                $query -> fetch();
                $query -> close();
                
                if($pedidoProducto){
                    $conpedido=1;
                    break;
                }

                $query = $mysqli->prepare('SELECT ruta_thumb,id_descuento FROM canastas_productos WHERE id_canasta_producto = ? ');
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> bind_result($imgThumb,$iddesc);
                $query -> fetch();
                $query -> close();
                if($imgThumb!='' && is_null($imgThumb)==false){
                    //unlink('../../images/icono_cafeteria/'.$imgCat);
                    unlink('../../../..'.$imgThumb);
                }

                if($iddesc!='' && is_null($iddesc)==false){

                    $query = $mysqli->prepare("DELETE FROM descuentos WHERE id_descuento = ?");
                    $query -> bind_param('i',$iddesc);
                    $query -> execute();
                    $query -> fetch();
                    $query -> close();

                }

                
                $query = $mysqli->prepare("DELETE FROM canastas_productos WHERE id_canasta_producto = ?");
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> fetch();
                if($query->affected_rows>0){
                
                    $contador++;
                
                    $mensaje = "registro";
                    if($i>1){
                        $mensaje = "registros";
                    }
                    $respuesta = array(
                        'respuesta' => 'success',
                        'mensaje' => 'Se elimino '.$contador.' '.$mensaje,
                        'retorno' => 'canasta_productos'
                    );
                }
                $query -> close();
                
                
            }
            
            if($conpedido==1 && $contador==0){
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'Uno de los productos tiene pedidos relacionados',
                    
                );
            }else if($conpedido==1 && $contador>0){
                $respuesta = array(
                    'respuesta' => 'error_conborrado',
                    'mensaje' => 'Algunos productos tienen pedidos relacionados y no pudieron ser eliminados',
                    'retorno' => 'canasta_productos'
                );
            }
            
        }else if($queEliminar[0] === 'cursotaller'){
            
            $concobro=0;
            for($i = 0; $i<= count($queEliminar) ;$i=$i+2){
                
                
                $query = $mysqli->prepare('SELECT catalogo_productos_idsystemcatpro FROM catalogo_cobros_items WHERE catalogo_productos_idsystemcatpro = ? ');
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> bind_result($cobroProducto);
                $query -> fetch();
                $query -> close();
                
                if($cobroProducto){
                    $concobro=1;
                    break;
                }
                

                $query = $mysqli->prepare('SELECT catalogo_productos_thumbfacilitador,catalogo_productos_file_thumb,catalogo_productos_thumb_encabezado,catalogo_productos_file_promocion,descuentos_idsystemdescuento FROM catalogo_productos WHERE idsystemcatpro = ? ');
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> bind_result($pathFile1,$pathFile2,$pathFile3,$pathFile4,$iddesc);
                $query -> fetch();
                $query -> close();
                
                if($pathFile1!='' && is_null($pathFile1)==false){

                    $arrayPathFile = explode(',', $pathFile1);
                    //echo '../../..'.$arrayPathFile[0];
                    unlink('../../..'.$arrayPathFile[0]);
                    //unlink('/archivos/cursos_talleres/profile/DCT105_profile.png')
                }
                
                if($pathFile2!='' && is_null($pathFile2)==false){

                    $arrayPathFile = explode(',', $pathFile2);
                    for($j=0;$j<(count($arrayPathFile)-1);$j++){

                        unlink('../../..'.$arrayPathFile[$j]);

                    }

                }

                if($pathFile3!='' && is_null($pathFile3)==false){

                    $arrayPathFile = explode(',', $pathFile3);
                    for($j=0;$j<(count($arrayPathFile)-1);$j++){

                        unlink('../../..'.$arrayPathFile[$j]);

                    }

                }

                if($pathFile4!='' && is_null($pathFile4)==false){

                    $arrayPathFile = explode(',', $pathFile4);
                    unlink('../../..'.$arrayPathFile[0]);
                }

                if($iddesc!='' && is_null($iddesc)==false){

                    $query = $mysqli->prepare("DELETE FROM catalogo_descuentos WHERE idsystemdescuento = ?");
                    $query -> bind_param('i',$iddesc);
                    $query -> execute();
                    //$query -> fetch();
                    $query -> close();

                }

                
                $query = $mysqli->prepare("DELETE FROM catalogo_productos WHERE idsystemcatpro = ?");
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                //$query -> fetch();
                if($query->affected_rows>0){
                
                    $contador++;
                
                    $mensaje = "registro";
                    if($i>1){
                        $mensaje = "registros";
                    }
                    $respuesta = array(
                        'respuesta' => 'success',
                        'mensaje' => 'Se elimino '.$contador.' '.$mensaje,
                        'retorno' => 'diploma_curos_talleres'
                    );
                }
                $query -> close();
                
                
            }
            
            if($concobro==1 && $contador==0){
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'Uno de los elementos tiene cobros relacionados',
                    
                );
            }else if($concobro==1 && $contador>0){
                $respuesta = array(
                    'respuesta' => 'error_conborrado',
                    'mensaje' => 'Algunos elementos tienen cobros relacionados y no pudieron ser eliminados',
                    'retorno' => 'diploma_curos_talleres'
                );
            }
            
            /*
            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Sucedio un error66'
            );
            */
           
            
        }else if($queEliminar[0] === 'cupones'){

            $concobro=0;
            for($i = 0; $i<= count($queEliminar) ;$i=$i+2){
                
                
                $query = $mysqli->prepare('SELECT descuentos_idsystemdescuento FROM catalogo_cobros WHERE descuentos_idsystemdescuento = ? ');
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> bind_result($cobroDescuento);
                $query -> fetch();
                $query -> close();
                
                if($cobroDescuento){
                    $concobro=1;
                    break;
                }
                
                $tipodesc=2;
                $query = $mysqli->prepare("DELETE FROM catalogo_descuentos WHERE idsystemdescuento = ? AND descuento_tipo=?");
                $query -> bind_param('ii',$queEliminar[($i+1)],$tipodesc);
                $query -> execute();
                //$query -> fetch();
                if($query->affected_rows>0){
                    
                    $contador++;
                    $mensaje = "registro";
                    if($i>1){
                        $mensaje = "registros";
                    }
                    $respuesta = array(
                        'respuesta' => 'success',
                        'mensaje' => 'Se elimino '.$contador.' '.$mensaje,
                        'retorno' => 'cupones'
                    );
                }
                $query -> close();
            }
            
            if($concobro==1){
                $query = $mysqli->prepare('SELECT descuento_codigo FROM catalogo_descuentos WHERE idsystemdescuento = ? ');
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> bind_result($nombre);
                $query -> fetch();
                $query -> close();
                
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'El cupón con código '.$nombre.' no se puede eliminar debido a que tiene cobros relacionados.<br>El número de registros eliminados fue de '.$contador,
                    'retorno' => 'cupones'
                    
                );
            }
                
        }else if($queEliminar[0] === 'servicios'){

           
            for($i = 0; $i<= count($queEliminar) ;$i=$i+2){
                
                
                $query = $mysqli->prepare('SELECT image_service FROM services WHERE id_service = ? ');
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> bind_result($imgSer);
                $query -> fetch();
                $query -> close();
                if($imgSer!='' && is_null($imgSer)==false){
                    unlink('../../../images/services/'.$imgSer);
                }
                
                
                $query = $mysqli->prepare("DELETE FROM services WHERE id_service=?");
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                //$query -> fetch();
                if($query->affected_rows>0){
                    
                    $contador++;
                    $mensaje = "registro";
                    if($i>1){
                        $mensaje = "registros";
                    }
                    $respuesta = array(
                        'respuesta' => 'success',
                        'mensaje' => 'Se elimino '.$contador.' '.$mensaje,
                        'retorno' => 'servicios'
                    );
                }
                $query -> close();
            }
            
           
                
        }else if($queEliminar[0] === 'prospectos'){
            
            $concobro=0;
            for($i = 0; $i<= count($queEliminar) ;$i=$i+3){
                
                
                $query = $mysqli->prepare('SELECT prospectos_IDprospecto FROM cobros WHERE prospectos_IDprospecto = ? ');
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> bind_result($cobroProspecto);
                $query -> fetch();
                $query -> close();
                
                if($cobroProspecto){
                    $concobro=1;
                    break;
                }
                
                $contador++;
                $query = $mysqli->prepare("DELETE FROM prospectos WHERE IDuser = ?");
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> fetch();
                if($query->affected_rows>0){
                    $mensaje = "registro";
                    if($i>1){
                        $mensaje = "registros";
                    }
                    $respuesta = array(
                        'respuesta' => 'success',
                        'mensaje' => 'Se elimino '.$contador.' '.$mensaje,
                        'retorno' => 'prospecto'
                    );
                }
                $query -> close();
            }
            
            if($concobro==1 && $contador==0){
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'Uno de los prospectos tiene cobros relacionados',
                    
                );
            }else if($concobro==1 && $contador>0){
                $respuesta = array(
                    'respuesta' => 'error_conborrado',
                    'mensaje' => 'Algunos prospectos tienen cobros relacionados y no pudieron ser eliminados',
                    'retorno' => 'prospecto'
                );
            }
            
        }else if($queEliminar[0] === 'formaspago'){
            $concobro=0;
            for($i = 0; $i<= count($queEliminar) ;$i=$i+2){
                
                
                $query = $mysqli->prepare('SELECT forma_depago_IDformapago FROM cobros WHERE forma_depago_IDformapago = ? ');
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> bind_result($cobroFormaPago);
                $query -> fetch();
                $query -> close();
                
                if($cobroFormaPago){
                    $concobro=1;
                    break;
                }
                
                $contador++;
                $query = $mysqli->prepare("DELETE FROM forma_depago WHERE IDsystemapades = ?");
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> fetch();
                if($query->affected_rows>0){
                    $mensaje = "registro";
                    if($i>1){
                        $mensaje = "registros";
                    }
                    $respuesta = array(
                        'respuesta' => 'success',
                        'mensaje' => 'Se elimino '.$contador.' '.$mensaje,
                        'retorno' => 'formaspago'
                    );
                }
                $query -> close();
            }
            
            if($concobro==1 && $contador==0){
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'Una de las formas de pago tiene cobros relacionados',
                    
                );
            }else if($concobro==1 && $contador>0){
                $respuesta = array(
                    'respuesta' => 'error_conborrado',
                    'mensaje' => 'Algunas formas de pago tienen cobros relacionados y no pudieron ser eliminadas',
                    'retorno' => 'formaspago'
                );
            }
            
        }else if($queEliminar[0] === 'empresa'){
            
            $conprospecto=0;
            for($i = 0; $i<= count($queEliminar) ;$i=$i+2){
                
                
                $query = $mysqli->prepare('SELECT empresa_id_empresa FROM prospectos WHERE empresa_id_empresa = ? ');
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> bind_result($prospectoEmpresa);
                $query -> fetch();
                $query -> close();
                
                if($prospectoEmpresa){
                    $conprospecto=1;
                    break;
                }
                
                $contador++;
                $query = $mysqli->prepare("DELETE FROM empresa WHERE idsystemEmpresa = ?");
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> fetch();
                if($query->affected_rows>0){
                    $mensaje = "registro";
                    if($i>1){
                        $mensaje = "registros";
                    }
                    $respuesta = array(
                        'respuesta' => 'success',
                        'mensaje' => 'Se elimino '.$contador.' '.$mensaje,
                        'retorno' => 'empresas'
                    );
                }
                $query -> close();
            }
            if($conprospecto==1 && $contador==0){
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'Una de las empresas tiene prospectos asignados'
                );
            }
            else if($conprospecto==1 && $contador>0){
                $respuesta = array(
                    'respuesta' => 'error_conborrado',
                    'mensaje' => 'Algunas empresas tiene prospectos asignados y no pudieron ser eliminadas',
                    'retorno' => 'empresas'
                );
            }
            
        }else if($queEliminar[0] === 'tiendacategoria'){
            
            $conproducto=0;
            for($i = 0; $i<= count($queEliminar) ;$i=$i+2){
                
                
                $query = $mysqli->prepare('SELECT id_categoria FROM tienda_producto WHERE id_categoria = ? ');
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> bind_result($productoCat);
                $query -> fetch();
                $query -> close();
                
                if($productoCat){
                    $conproducto=1;
                    break;
                }
                
                $contador++;
                $query = $mysqli->prepare('SELECT icono_categoria FROM tienda_categoria WHERE id_categoria = ? ');
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> bind_result($imgCat);
                $query -> fetch();
                $query -> close();
                if($imgCat!='' && is_null($imgCat)==false){
                    unlink('../../images/icono_cafeteria/'.$imgCat);
                }
                $query = $mysqli->prepare("DELETE FROM tienda_categoria WHERE id_categoria = ?");
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> fetch();
                if($query->affected_rows>0){
                    $mensaje = "registro";
                    if($i>1){
                        $mensaje = "registros";
                    }
                    $respuesta = array(
                        'respuesta' => 'success',
                        'mensaje' => 'Se elimino '.$contador.' '.$mensaje,
                        'retorno' => 'tienda_categoria'
                    );
                }
                $query -> close();
            }
            if($conproducto==1 && $contador==0){
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'Una de las categorías tiene productos en la tienda asignados'
                );
            }
            else if($conproducto==1 && $contador>0){
                $respuesta = array(
                    'respuesta' => 'error_conborrado',
                    'mensaje' => 'Algunas categorías tiene productos en la tienda asignados y no pudieron ser eliminadas',
                    'retorno' => 'tienda_categoria'
                );
            }
            
        }else if($queEliminar[0] === 'cobro'){
            
            $pagado=0;
            $conarchivo=0;
            for($i = 0; $i<= count($queEliminar) ;$i=$i+5){
                
                
                $query = $mysqli->prepare('SELECT Status,prospectos_IDprospecto,adjunto FROM cobros WHERE IDfolioGral = ? ');
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> bind_result($status,$idprospecto,$adjunto);
                $query -> fetch();
                $query -> close();
                
                if($status==1){
                    $pagado=1;
                    break;
                }
                if($adjunto!='' && is_null($adjunto)==false){
                    $conarchivo=1;
                    break;
                }
                
                $contador++;
                $query = $mysqli->prepare("DELETE FROM cobros WHERE IDfolioGral = ?");
                $query -> bind_param('i',$queEliminar[($i+1)]);
                $query -> execute();
                $query -> fetch();
                if($query->affected_rows>0){
                    
                    $query -> close();
                    
                    $query = $mysqli->prepare('SELECT matricula FROM prospectos WHERE IDuser = ? ');
                    $query -> bind_param('i',$idprospecto);
                    $query -> execute();
                    $query -> bind_result($matricula);
                    $query -> fetch();
                    $query -> close();
                    
                    if($matricula=='' || is_null($matricula)==true){
                        $estado=4;
                        $query = $mysqli->prepare("UPDATE prospectos SET status = ? WHERE IDuser = ? ");
                        $query -> bind_param('ii', $estado,$idprospecto);
                        $query -> execute();
                        $query -> fetch();
                        $query -> close();
                        
                    }
                    
                    $mensaje = "registro";
                    if($i>1){
                        $mensaje = "registros";
                    }
                    $respuesta = array(
                        'respuesta' => 'success',
                        'mensaje' => 'Se elimino '.$contador.' '.$mensaje,
                        'retorno' => 'cobro'
                    );
                }else{
                    $query -> close();
                }
               
            }
            
            if($pagado==1 && $contador==0){
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'Uno de los cobros ya ha sido pagado'
                );
            }
            else if($pagado==1 && $contador>0){
                $respuesta = array(
                    'respuesta' => 'error_conborrado',
                    'mensaje' => 'Algunos de los cobros ya han sido pagados y no pudieron ser eliminados',
                    'retorno' => 'cobro'
                );
            }else if($conarchivo==1 && $contador==0){
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'Uno de los cobros tiene comprobantes adjuntados.'
                );
            }else if($conarchivo==1 && $contador>0){
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'Algunos de los cobros tiene comprobantes adjuntados y no pudieron ser eliminados.'
                );
            }
            
        }else if($queEliminar[0] === 'usuarios'){
            
            if( count($queEliminar) > 2 ) {
                for($i = 0; $i<= count($queEliminar) ;$i=$i+2){
                    $idUser = $queEliminar[$i+1];
                    $contador++;
                    $query = "DELETE FROM logueo WHERE id_logueo = $idUser ";
                    $deleteData = $mysqli->query($query);
                    echo die(json_encode($deleteData));
    
                    // $query = $mysqli->prepare("DELETE FROM logueo WHERE id_logueo = ?");
                    // $query -> bind_param('i',$queEliminar[($i+1)]);
                    // $query -> execute();
                    // $query -> fetch();
                    // if($query->affected_rows>0){
                    if( $deleteData ) {
                        $mensaje = "registro";
                        if($i>1){
                            $mensaje = "registros";
                        }
                        $respuesta = array(
                            'respuesta' => 'success',
                            'mensaje' => "$contador $mensaje eliminados",
                            'retorno' => 'usuarios'
                        );
                    }
                    else {
                        $respuesta = array(
                            'respuesta' => 'error',
                            'mensaje' => "No se pudo eliminar el usuario",
                            'retorno' => 'usuarios'
                        );
                    }
    
                    // $query -> close();
                }
            }
            else {
                $idUser = $queEliminar[1];
                $query = "DELETE FROM logueo WHERE id_logueo = $idUser ";
                $deleteData = $mysqli->query($query);
                // echo die(json_encode($deleteData));

                if( $deleteData ) {
                    $respuesta = array(
                        'respuesta' => 'success',
                        'mensaje' => "Usuario eliminado corrrectamente",
                        'retorno' => 'usuarios'
                    );
                }
                else {
                    $respuesta = array(
                        'respuesta' => 'error',
                        'mensaje' => "No se pudo eliminar el usuario",
                        'retorno' => 'usuarios'
                    );
                }
            }

        }

    }catch(Exception $e){
        $respuesta = array(
            'respuesta' => 'error',
            'mensaje' => 'Sucedio un error',
            'data' => $e->getMessage()
        );
    }

    //$query -> close();
    $mysqli -> close();

}

if($accion === 'eliminarCertificado'){

    $respuesta = array();
    require_once ('../../php/conexion.php');
    $mysqli = conectar();

    try{
        $idCourse = $_POST['course'];
        $certificado = '';
        $query = $mysqli->prepare('SELECT catalogo_productos_file_promocion FROM catalogo_productos WHERE idsystemcatpro = ? ');
        $query -> bind_param('i',$idCourse);
        $query -> execute();
        $query -> bind_result($certificado);
        
        $query -> fetch();
        $query -> close();

        if($certificado != ''){

            $arrayPathFile = explode(',', $certificado); 
            unlink('../../..'.$arrayPathFile[0]);
            $vacio = '';
            $querySql = "UPDATE `catalogo_productos` SET `catalogo_productos_file_promocion`= ? WHERE idsystemcatpro = ? ";
            $query = $mysqli->prepare($querySql);
            $query -> bind_param('si', $vacio, $idCourse);
            $query -> execute();
            if( $query->affected_rows > 0){

                $msjres.='la imagen de certificado<br>';
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Se elimino '.$msjres,
                    'retorno' => 'delete imagen certificado'
                );
            }else{
                $msjres.='No fue posible eliminar de base.<br>';
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Se elimino '.$msjres,
                    'retorno' => 'delete imagen certificado'
                );
            }
        }else{
            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'no se encontro la imagen de certificado',
                'retorno' => 'delete imagen certificado'
            );
        }


    }catch(Exception $e){
        $respuesta = array(
            'respuesta' => 'error',
            'mensaje' => 'Sucedio un error',
            'data' => $e->getMessage()
        );
    }
}

echo die(json_encode($respuesta));

?>