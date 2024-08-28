<?php

$accion = $_POST['accion'];

if(isset($accion)){

    if($accion === 'producto'){

        //GUARDAMOS LOS DATOS QUE NOS ENVIAN DEL FORMULARIO
        $id_editar = $_POST['id_editar'];
        
        $skuprograma = $_POST['skuprograma']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $categoria = $_POST['categoria']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $nombre = $_POST['nombre']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE EDITAR.JS
        $descripcion = $_POST['descripcion'];
        $descripcion2 = $_POST['descripcion2'];
        
        $periodo = $_POST['periodo'];
        $beneficios = $_POST['beneficios'];
        
        $precio = $_POST['precio']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE EDITAR.JS
        $precio2 = $_POST['precio2']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE EDITAR.JS
        $disponible = $_POST['disponible']; 
        
        $check_descuento = $_POST['check_descuento'];
        $tipo_descuento = $_POST['tipo_descuento'];
        $cantidad1 = $_POST['cantidad1'];
        $cantidad2 = $_POST['cantidad2'];
        $existencia = $_POST['existencia'];
        $descuento_inicio = $_POST['descuento_inicio'];
        $descuento_hora_inicio = $_POST['descuento_hora_inicio'];
        $descuento_fin = $_POST['descuento_fin'];
        $descuento_hora_fin = $_POST['descuento_hora_fin'];
        $codigo_descuento = $_POST['codigo_descuento'];
        
        if($check_descuento=='1'){
            $cantidad1 = filter_var($cantidad1, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
            $existencia = filter_var($existencia, FILTER_SANITIZE_NUMBER_INT);
            $descuento_inicio = filter_var($descuento_inicio, FILTER_SANITIZE_STRING);
            $descuento_hora_inicio = filter_var($descuento_hora_inicio, FILTER_SANITIZE_STRING);
            $descuento_fin = filter_var($descuento_fin, FILTER_SANITIZE_STRING);
            $descuento_hora_fin = filter_var($descuento_hora_fin, FILTER_SANITIZE_STRING);
            $codigo_descuento = filter_var($codigo_descuento, FILTER_SANITIZE_STRING);
            
            if($tipo_descuento=="Dinero"){
                $cantidad2 = filter_var($cantidad2, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
            }else{
                $cantidad2 = NULL;
            }
            
            $fecha_descuento_inicio=date("Y-m-d H:i:s",strtotime($descuento_inicio.' '.$descuento_hora_inicio));
            $fecha_descuento_fin=date("Y-m-d H:i:s",strtotime($descuento_fin.' '.$descuento_hora_fin));
        }
        
        
    
        $skuprograma = filter_var($skuprograma, FILTER_SANITIZE_STRING); //SANITIZAMOS EL ID
        $categoria = filter_var($categoria, FILTER_SANITIZE_STRING); //SANITIZAMOS EL ID
        $descripcion = filter_var($descripcion, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL NOMBRE
        $descripcion2 = filter_var($descripcion2, FILTER_SANITIZE_STRING); 
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        $precio = filter_var($precio, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);  //SANITIZAMOS EL PRECIO
        $precio2 = filter_var($precio2, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);  //SANITIZAMOS EL PRECIO
        
        
    
        //CREAMOS LA CONEXION A LA BASE DE DATOS
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        //INTENTE LA CONEXION Y SI MARCA ERROR LO CACHE
        try{
            $query = $mysqli->prepare(" UPDATE producto SET skuproducto = ?, categoria = ?, NombreProducto = ?, descripcion=?,descripcion2=?,PrecioMX = ?, PrecioUSD = ?, disponible=? WHERE IDsystempro = ? ");
            $query -> bind_param('sisssddii', $skuprograma, $categoria, $nombre,$descripcion,$descripcion2, $precio,$precio2,$disponible,$id_editar);
            $query -> execute();
            //$query -> fetch();

            if($query->affected_rows>0){
                $query -> close();
                $mensaje1='Se actualizarón los datos del producto.';

            }else{
                $query -> close();
                $mensaje1='No se actualizarón los datos del producto.';

            }
            
             $query = " SELECT descuentos_id_descuento FROM producto_descuento WHERE producto_IDsystempro=".$id_editar;
            $resultado2 = $mysqli->query($query);
            
            $c=1;
            $mensaje2='';
            while($row2 = mysqli_fetch_array($resultado2)){
                $check_descuenton = $_POST['check_descuento'.$c];
                
                if($check_descuenton=='1'){
                    
                    $tipo_descuento = $_POST['tipo_descuento_desc'.$c];
                    $cantidad1 = $_POST['cantidad1_desc'.$c];
                    $cantidad2 = $_POST['cantidad2_desc'.$c];
                    $existencia = $_POST['existencia_desc'.$c];
                    $descuento_inicio = $_POST['descuento_inicio_desc'.$c];
                    $descuento_hora_inicio = $_POST['descuento_hora_inicio_desc'.$c];
                    $descuento_fin = $_POST['descuento_fin_desc'.$c];
                    $descuento_hora_fin = $_POST['descuento_hora_fin_desc'.$c];
                    $codigo_descuento = $_POST['codigo_descuento_desc'.$c];
                    
                    $cantidad1 = filter_var($cantidad1, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
                    $existencia = filter_var($existencia, FILTER_SANITIZE_NUMBER_INT);
                    $descuento_inicio = filter_var($descuento_inicio, FILTER_SANITIZE_STRING);
                    $descuento_hora_inicio = filter_var($descuento_hora_inicio, FILTER_SANITIZE_STRING);
                    $descuento_fin = filter_var($descuento_fin, FILTER_SANITIZE_STRING);
                    $descuento_hora_fin = filter_var($descuento_hora_fin, FILTER_SANITIZE_STRING);
                    $codigo_descuento = filter_var($codigo_descuento, FILTER_SANITIZE_STRING);
                    
                    if($tipo_descuento=="Dinero"){
                        $cantidad2 = filter_var($cantidad2, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
                    }else{
                        $cantidad2 = NULL;
                    }
                    
                    $fecha_descuento_inicio=date("Y-m-d H:i:s",strtotime($descuento_inicio.' '.$descuento_hora_inicio));
                    $fecha_descuento_fin=date("Y-m-d H:i:s",strtotime($descuento_fin.' '.$descuento_hora_fin));
                    
                    $query = $mysqli->prepare(" UPDATE descuentos SET formato_descuento=?,cantidad_descuento=?,cantidad2_descuento=?,existencia_descuento=?,valido_desde=?,valido_hasta=?,codigo_descuento=? WHERE id_descuento = ? ");
                    $query -> bind_param('sddisssi', $tipo_descuento,$cantidad1,$cantidad2,$existencia,$fecha_descuento_inicio,$fecha_descuento_fin,$codigo_descuento,$row2['descuentos_id_descuento']);
                    $query -> execute();
                    //$query -> fetch();
                    
                    if($query->affected_rows>0){
                        $query -> close();
                        $mensaje2.='Se actualizarón los datos del descuento '.$c.'.<br>';
        
                    }else{
                        $query -> close();
                        $mensaje2.='No se actualizarón los datos del descuento '.$c.'.<br>';
        
                    }
                    
                }else{
                    $query = $mysqli->prepare(" DELETE FROM producto_descuento WHERE descuentos_id_descuento=? ");
                    $query -> bind_param('i',$row2['descuentos_id_descuento']);
                    $query -> execute();
                    //$query -> fetch();
                    
                    if($query->affected_rows>0){
                        $query -> close();
                        
                        $query = $mysqli->prepare(" DELETE FROM descuentos WHERE id_descuento=? ");
                        $query -> bind_param('i',$row2['descuentos_id_descuento']);
                        $query -> execute();
                        //$query -> fetch();
                        $query -> close();
                        
                        $mensaje2.='Se eliminó el descuento '.$c.' del producto.<br>';
        
                    }else{
                        $query -> close();
                        $mensaje2.='No se pudo eliminar el descuento '.$c.'.<br>';
        
                    }
                    
                }
                
                $c++;
                 
            }
            
            
            if($c<6){
                while($c<6){
                    $check_descuenton = $_POST['check_descuento'.$c];
                    
                    if($check_descuenton=='1'){
                        
                        $tipo_descuento = $_POST['tipo_descuento_desc'.$c];
                        $cantidad1 = $_POST['cantidad1_desc'.$c];
                        $cantidad2 = $_POST['cantidad2_desc'.$c];
                        $existencia = $_POST['existencia_desc'.$c];
                        $descuento_inicio = $_POST['descuento_inicio_desc'.$c];
                        $descuento_hora_inicio = $_POST['descuento_hora_inicio_desc'.$c];
                        $descuento_fin = $_POST['descuento_fin_desc'.$c];
                        $descuento_hora_fin = $_POST['descuento_hora_fin_desc'.$c];
                        $codigo_descuento = $_POST['codigo_descuento_desc'.$c];
                        
                        $cantidad1 = filter_var($cantidad1, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
                        $existencia = filter_var($existencia, FILTER_SANITIZE_NUMBER_INT);
                        $descuento_inicio = filter_var($descuento_inicio, FILTER_SANITIZE_STRING);
                        $descuento_hora_inicio = filter_var($descuento_hora_inicio, FILTER_SANITIZE_STRING);
                        $descuento_fin = filter_var($descuento_fin, FILTER_SANITIZE_STRING);
                        $descuento_hora_fin = filter_var($descuento_hora_fin, FILTER_SANITIZE_STRING);
                        $codigo_descuento = filter_var($codigo_descuento, FILTER_SANITIZE_STRING);
                        
                        if($tipo_descuento=="Dinero"){
                            $cantidad2 = filter_var($cantidad2, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
                        }else{
                            $cantidad2 = NULL;
                        }
                        
                        $fecha_descuento_inicio=date("Y-m-d H:i:s",strtotime($descuento_inicio.' '.$descuento_hora_inicio));
                        $fecha_descuento_fin=date("Y-m-d H:i:s",strtotime($descuento_fin.' '.$descuento_hora_fin));
                        
                        $query = $mysqli->prepare(" INSERT INTO descuentos (formato_descuento,cantidad_descuento,cantidad2_descuento,existencia_descuento,valido_desde,valido_hasta,codigo_descuento) VALUES (?,?,?,?,?,?,?)");
                        $query -> bind_param('sddisss', $tipo_descuento,$cantidad1,$cantidad2,$existencia,$fecha_descuento_inicio,$fecha_descuento_fin,$codigo_descuento);
                        $query -> execute();
                        //$query -> fetch();
                        $desc_insertado = $query->insert_id; 
                        
                        if($query->affected_rows>0){
                            $query -> close();
                            
                            $query = $mysqli->prepare(" INSERT INTO producto_descuento (producto_IDsystempro,descuentos_id_descuento)
                                            VALUES (?,?)");
                            $query -> bind_param('ii', $id_editar,$desc_insertado);
                            $query -> execute();
                            //$query -> fetch();
                            
                            if($query->affected_rows>0){
                                $query -> close();
                                
                                $mensaje2.='Se agregó el descuento '.$c.' al producto.<br>';
                                
                            }else{
                                $query -> close();
                                
                                $query = $mysqli->prepare("DELETE FROM descuentos WHERE id_descuento = ?");
                                $query -> bind_param('i',$desc_insertado);
                                $query -> execute();
                                //$query -> fetch();
                                $query -> close();
                                
                                $mensaje2.='No se pudo agregar el descuento '.$c.'.<br>';
                                
                            
                            }
                            
                            
                        }else{
                            $query -> close();
                            $mensaje2.='No se pudo agregar el descuento '.$c.'.<br>';
                          
                        }
                        
                    }
                    $c++;
                    
                }
            }
            
            $respuesta = array(
                'respuesta' => 'success',
                'mensaje' => $mensaje1.'<br>'.$mensaje2
            );
            
        }catch(Exception $e){

            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Vuelve a intentar...'
            );

        }
        $mysqli -> close();

    }else if($accion === 'cupon'){
        //GUARDAMOS LOS DATOS QUE NOS ENVIAN DEL FORMULARIO
        $id_editar = $_POST['id_editar'];
        
      
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
        $codigo = filter_var($codigo, FILTER_SANITIZE_STRING);
        if($notas!=''){
            $notas = filter_var($notas, FILTER_SANITIZE_STRING);
        }else{
            $notas = '';
        }
        
        
        //CREAMOS LA CONEXION A LA BASE DE DATOS
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        //INTENTE LA CONEXION Y SI MARCA ERROR LO CACHE


        $query = $mysqli->prepare(" SELECT descuento_codigo FROM catalogo_descuentos WHERE descuento_codigo = ? AND idsystemdescuento!=?");
        $query -> bind_param('si',$codigo,$id_editar);
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
            
            $query = $mysqli->prepare(" UPDATE catalogo_descuentos SET  
                                            descuento_formato=?,
                                            descuento_cantidad=?,
                                            descuento_cantidad2=?,
                                            descuento_existencia=?,
                                            descuento_valido_desde=?,
                                            descuento_valido_hasta=?,
                                            descuento_codigo=?,
                                            descuento_estatus=?,
                                            descuento_notas=?
                                        WHERE idsystemdescuento = ? ");
            $query -> bind_param('sddisssisi', $tipo_descuento,$cantidad1,$cantidad2,$stock,$fecha_descuento_inicio,$fecha_descuento_fin,$codigo,$descuento_estado,$notas,$id_editar);
            $query -> execute();
            //$query -> fetch();
            

           if($query->affected_rows>0){
               
                $query -> close();
                
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Cupón actualizado correctamente'
                );

            }else{
                $query -> close();
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'No hubo actualizaciones en los datos del cupón'
                );

            }
            
        }catch(Exception $e){

            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Error[1]:Sucedió un error al tratar de hacer el guardado de datos.'
            );

        }
         $mysqli -> close();


    }else if($accion === 'tienda_producto'){

        //GUARDAMOS LOS DATOS QUE NOS ENVIAN DEL FORMULARIO
        $id_editar = $_POST['id_editar'];
        $id_categoria = $_POST['id_categoria'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $tamaño = $_POST['tamaño'];

        //APLICAMOS UNA SANITIZACION
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        $precio = filter_var($precio, FILTER_SANITIZE_STRING);
        $tamaño = filter_var($tamaño, FILTER_SANITIZE_STRING);

        //CREAMOS LA CONEXION A LA BASE DE DATOS
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        //INTENTE LA CONEXION Y SI MARCA ERROR LO CACHE
        try{
            $query = $mysqli->prepare(" UPDATE tienda_producto SET id_categoria = ?, nombre_producto = ?, tamaño_producto = ?, precio_producto = ?, fecha_producto = now() WHERE id_producto = ? ");
            $query -> bind_param('isssi', $id_categoria, $nombre, $tamaño, $precio, $id_editar);
            $query -> execute();
            //$query -> fetch();

            if($query->affected_rows>0){

                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Producto actualizado correctamente'
                );

            }else{

                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'No se actualizo el producto, vuelva a intentar'
                );

            }

            $query -> close();
            $mysqli -> close();
        }catch(Exception $e){

            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Vuelve a intentar...'
            );

        }

    }else if($accion === 'tienda_categoria'){
        
        $id_editar = $_POST['id_editar'];

        $nombre = $_POST['nombre']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $id_categoria = $_POST['id_categoria'];

        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL NOMBRE

        //CREAMOS LA CONEXION A LA BASE DE DATOS
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        //INTENTE LA CONEXION Y SI MARCA ERROR LO CACHE
        try{
            $query = $mysqli->prepare(" UPDATE tienda_categoria SET id_global=?,nombre_categoria=? WHERE id_categoria = ? ");
            $query -> bind_param('isi', $id_categoria, $nombre, $id_editar);
            $query -> execute();
            //$query -> fetch();

            if($query->affected_rows>0){

                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Categoría actualizada correctamente'
                );

            }else{

                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'No se actualizarón los datos de la categoría, vuelva a intentar'
                );

            }

            $query -> close();
            $mysqli -> close();
        }catch(Exception $e){

            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Vuelve a intentar...'
            );

        }

    }else if($accion === 'prospecto'){
        //GUARDAMOS LOS DATOS QUE NOS ENVIAN DEL FORMULARIO
        $id_editar = $_POST['id_editar'];
        
      
        $nombre = $_POST['nombre']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE EDITAR.JS
        $apellido1 = $_POST['apellido1']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE EDITAR.JS
        $apellido2 = $_POST['apellido2']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE EDITAR.JS
        $whatsapp = $_POST['whatsapp']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE EDITAR.JS
        $email = $_POST['email'];
        $fecha_nacimiento = $_POST['fecha_nacimiento']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE EDITAR.JS
        $genero = $_POST['genero']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE EDITAR.JS
        $domicilio = $_POST['domicilio'];
        $cpostal = $_POST['cpostal'];
        $estado = $_POST['estado'];
        $municipio = $_POST['municipio'];
        
        
        
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL NOMBRE
        $apellido1 = filter_var($apellido1, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL PRECIO
        $apellido2 = filter_var($apellido2, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL PRECIO
        $whatsapp = filter_var($whatsapp, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL PRECIO
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);  //SANITIZAMOS EL PRECIO
        $redsocial = filter_var($redsocial, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL PRECIO
        $institucion = filter_var($institucion, FILTER_SANITIZE_STRING); 
        $domicilio = filter_var($domicilio, FILTER_SANITIZE_STRING); 
        $cpostal  = filter_var($cpostal, FILTER_SANITIZE_STRING); 
        
        
        //CREAMOS LA CONEXION A LA BASE DE DATOS
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        //INTENTE LA CONEXION Y SI MARCA ERROR LO CACHE
        
        
        try{
            
            $query = $mysqli->prepare(" UPDATE clientes SET  Nombre = ?, Apellido1  = ?, Apellido2 = ?, whatsapp = ?, Email = ?, fecha_nacimiento= ?,genero= ?,domicilio= ?,codigo_postal= ?, estado=?, municipio=?  WHERE IDuser = ? ");
            $query -> bind_param('ssssssissiii', $nombre, $apellido1, $apellido2,$whatsapp,$email,$fecha_nacimiento,$genero,$domicilio,$cpostal,$estado,$municipio,$id_editar);
            $query -> execute();
            //$query -> fetch();

           if($query->affected_rows>0){
               
                $query -> close();
                
             
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Cliente actualizado correctamente'
                );

            }else{

                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'No hubo actualizaciones en los datos del cliente.'
                );

            }
            
           
            
           
        }catch(Exception $e){

            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Vuelve a intentar...'
            );

        }
         $mysqli -> close();
        
    }else if($accion === 'formapago'){
        $id_editar = $_POST['id_editar'];
        
        $id = $_POST['id']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $plataforma = $_POST['plataforma'];
        $nombre = $_POST['nombre'];
        $comision_porcentaje = $_POST['comision_porcentaje']; 
        $comision_pesos = $_POST['comision_pesos']; 
        $comision_dolares = $_POST['comision_dolares']; 
        
        
        $id = filter_var($id, FILTER_SANITIZE_STRING); //SANITIZAMOS EL ID
        $plataforma = filter_var($plataforma, FILTER_SANITIZE_STRING); 
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL NOMBRE
        $comision_porcentaje= filter_var($comision_porcentaje,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        $comision_pesos= filter_var($comision_pesos,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        $comision_dolares= filter_var($comision_dolares,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        
        
        //CREAMOS LA CONEXION A LA BASE DE DATOS
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        
        try{
            $query = $mysqli->prepare(" UPDATE forma_depago SET IDformapago = ?,plataforma = ?,Nombrepago = ?,comision_porcentaje = ?,comision_pesos = ?,comision_dolares = ? WHERE IDsystemapades = ? ");
            $query -> bind_param('sssdddi', $id,$plataforma,$nombre,$comision_porcentaje,$comision_pesos,$comision_dolares,$id_editar);
            $query -> execute();
            //$query -> fetch();

            if($query->affected_rows>0){

                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Forma de pago actualizada correctamente'
                );

            }else{

                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'No se actualizo la forma de pago, vuelva a intentar'
                );

            }

            $query -> close();
            
        }catch(Exception $e){

            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Vuelve a intentar...'
            );

        }
        $mysqli -> close();
        
    }else if($accion === 'empresa'){
         $id_editar = $_POST['id_editar'];
        
       
        $nombre = $_POST['nombre'];
        $nombre_corto = $_POST['nombre_corto']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $rfc = $_POST['rfc']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $telefono = $_POST['telefono']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $email = $_POST['email']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $merchantid = $_POST['merchantid'];
        $llavepublica = $_POST['llavepublica'];
        $llaveprivada = $_POST['llaveprivada'];
        $openpay_sandbox = $_POST['openpay_sandbox'];

        /*
        $clientid = $_POST['clientid'];

        $canastas_traBen = $_POST['canastas_traBen'];
        $canastas_traBanco = $_POST['canastas_traBanco'];
        $canastas_traClabe = $_POST['canastas_traClabe'];

        $beneficiario = $_POST['beneficiario'];
        $banco = $_POST['banco'];
        $clabe = $_POST['clabe'];

        $beneficiario_est = $_POST['beneficiario_est'];
        $banco_est = $_POST['banco_est'];
        $nocta_est = $_POST['nocta_est'];
        $notarjeta_est = $_POST['notarjeta_est'];
        */
        
        $id = filter_var($id, FILTER_SANITIZE_STRING); //SANITIZAMOS EL ID
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL NOMBRE
        $nombre_corto = filter_var($nombre_corto, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL PRECIO
        $rfc = filter_var($rfc, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL NOMBRE
        $telefono = filter_var($telefono, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL NOMBRE
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);  //SANITIZAMOS EL PRECIO 
        
        $merchantid = filter_var($merchantid, FILTER_SANITIZE_STRING);
        $llavepublica = filter_var($llavepublica, FILTER_SANITIZE_STRING);
        $llaveprivada = filter_var($llaveprivada, FILTER_SANITIZE_STRING);

        /*
        $clientid = filter_var($clientid, FILTER_SANITIZE_STRING);

        $canastas_traBen = filter_var($canastas_traBen, FILTER_SANITIZE_STRING);
        $canastas_traBanco = filter_var($canastas_traBanco, FILTER_SANITIZE_STRING);
        $canastas_traClabe = filter_var($canastas_traClabe, FILTER_SANITIZE_STRING);

        $beneficiario = filter_var($beneficiario, FILTER_SANITIZE_STRING);
        $banco = filter_var($banco, FILTER_SANITIZE_STRING);
        $clabe = filter_var($clabe, FILTER_SANITIZE_STRING);

        $beneficiario_est = filter_var($beneficiario_est, FILTER_SANITIZE_STRING);
        $banco_est = filter_var($banco_est, FILTER_SANITIZE_STRING);
        $nocta_est = filter_var($nocta_est, FILTER_SANITIZE_STRING);
        $notarjeta_est = filter_var($notarjeta_est, FILTER_SANITIZE_STRING); 
        */
        
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        
        try{

            $clientid = '';

            $canastas_traBen = '';
            $canastas_traBanco = '';
            $canastas_traClabe = '';

            $beneficiario = '';
            $banco = '';
            $clabe = '';

            $beneficiario_est = '';
            $banco_est = '';
            $nocta_est = '';
            $notarjeta_est = '';
    
            $query = $mysqli->prepare(" UPDATE empresa SET nombre_empresa = ?,nombre_corto_empresa = ?,rfc_empresa = ?,telefono_empresa = ?,email_empresa = ?,paypal_clientid=?,openpay_merchantid=?,openpay_llaveprivada=?,openpay_llavepublica=?,transferencia_beneficiario=?,transferencia_banco=?,transferencia_clabe=?,establecimiento_beneficiario=?,establecimiento_banco=?,establecimiento_nocta=?,establecimiento_notarjeta=?,canastas_transferencia_beneficiario=?,canastas_transferencia_banco=?,canastas_transferencia_clabe=?,openpay_sandboxmode=? WHERE idsystemEmpresa = ? ");
            $query -> bind_param('sssssssssssssssssssii', $nombre,$nombre_corto,$rfc,$telefono,$email,$clientid,$merchantid,$llaveprivada,$llavepublica,$beneficiario,$banco,$clabe,$beneficiario_est,$banco_est,$nocta_est,$notarjeta_est,$canastas_traBen,$canastas_traBanco,$canastas_traClabe,$openpay_sandbox,$id_editar);
            $query -> execute();
            //$query -> fetch();
          
            
            if($query->affected_rows>0){
    
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Empresa actualizada correctamente'
                );
    
            }else{
    
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'No se actualizo la empresa, vuelva a intentar'
                );
    
            }
    
            $query -> close();
           
    
        }catch(Exception $e){
    
            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Vuelve a intentar...'
            );
    
        }
        $mysqli -> close();
        
        
    }else if($accion === 'expo'){
        $id_editar = $_POST['id_editar'];
        
        $nombre = $_POST['nombre'];
        $nombre_corto = $_POST['nombre_corto']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $contacto = $_POST['contacto']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $telefono = $_POST['telefono']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $email = $_POST['email']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $link = $_POST['link'];
        
    
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL NOMBRE
        $nombre_corto = filter_var($nombre_corto, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL PRECIO
        $contacto = filter_var($contacto, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL NOMBRE
        $telefono = filter_var($telefono, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL NOMBRE
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);  //SANITIZAMOS EL PRECIO 
        $link = filter_var($link, FILTER_SANITIZE_EMAIL); 
        
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        
        try{
    
            $query = $mysqli->prepare("UPDATE expos SET nombre=?,nombre_corto=?,contacto=?,telefono=?,email=?,link=? WHERE IDsystemExpo = ?");
            $query -> bind_param('ssssssi',$nombre,$nombre_corto,$contacto,$telefono,$email,$link,$id_editar);
            $query -> execute();
            //$query -> fetch();
          
            
            if($query->affected_rows>0){
    
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Expo actualizada correctamente'
                );
    
            }else{
    
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'Error[2]<br>Vuelve a intentar...'
                );
    
            }
    
            $query -> close();
           
    
        }catch(Exception $e){
    
            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Error[1]<br>Vuelve a intentar...'
            );
    
        }
        $mysqli -> close();
        
        
    }else if($accion === 'cobro'){
        include("funciones/funciones.php");
        
        $id_editar = $_POST['id_editar'];
        
        $idsolicitud = $_POST['idsolicitud'];
        $nombre = $_POST['nombre']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE EDITAR.JS
        $apellido1 = $_POST['apellido1']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE EDITAR.JS
        $apellido2 = $_POST['apellido2']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE EDITAR.JS
        
        $producto = $_POST['producto']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE EDITAR.JS
        $moneda = $_POST['moneda'];
        $monto = $_POST['monto']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE EDITAR.JS
        $formapago = $_POST['formapago']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE EDITAR.JS
        
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        
        try{
            
            $query = $mysqli->prepare(" SELECT skuprograma,NombrePrograma,No_dePagos FROM producto WHERE IDsystempro = ?");
            $query -> bind_param('i',$producto);
            $query -> execute();
            $query -> bind_result($skuprograma,$nombrePrograma,$num_pagos);
            $query -> fetch();
            $query -> close();
            
            $query = $mysqli->prepare(" SELECT Telefono,Email,matricula FROM prospectos WHERE IDsolicitud = ?");
            $query -> bind_param('i',$idsolicitud);
            $query -> execute();
            $query -> bind_result($telefono,$email,$matricula);
            $query -> fetch();
            $query -> close();
            
            
            if($formapago==2 || $formapago=='2'){
                
                $query = $mysqli->prepare(" SELECT idregcobro FROM cobros WHERE IDfolioGral = ?");
                $query -> bind_param('i',$id_editar);
                $query -> execute();
                $query -> bind_result($idcobro);
                $query -> fetch();
                $query -> close();
                
                $idtransaccion = $idsolicitud.$skuprograma.$idcobro;
                
            }else{
                $idtransaccion = NULL;
            }
            
            
            $estado=2;
            $query = $mysqli->prepare("UPDATE prospectos SET status = ? WHERE IDsolicitud = ? ");
            $query -> bind_param('ii', $estado,$idsolicitud);
            $query -> execute();
            //$query -> fetch();
            $query -> close();
    
            $query = $mysqli->prepare("UPDATE cobros SET IDtransaccion = ?,MontoTransaccion = ?, producto_IDproducto = ?, forma_depago_IDformapago = ?, TipoCambio=? WHERE IDfolioGral = ? ");
            $query -> bind_param('sdiisi',$idtransaccion,$monto,$producto,$formapago,$moneda,$id_editar);
            $query -> execute();
           //$query -> fetch();
            $query -> close();
            
            
            
            date_default_timezone_set('America/Mexico_City');
            $fecha=date("d/m/Y H:i:s");
            
            $id_editar=encrypt($id_editar);
            $idsolicitud_cifrado=encrypt($idsolicitud);
            $producto=encrypt($producto);
            
            if($formapago==2 || $formapago=='2'){
                
                $idempresa=1;
                $query = $mysqli->prepare(" SELECT datos_bancarios FROM empresa WHERE idsystemEmpresa = ?");
                $query -> bind_param('i',$idempresa);
                $query -> execute();
                $query -> bind_result($datos_bancarios);
                $query -> fetch();
                $query -> close();
            
                $mensaje='
                    <table>
                        <tr style="background-color:#a3a3a3;">
                            <td style="color:white;" colspan="3">
                                <p style="float:left;margin-left:20px;margin-top:15px;"><b>IESDE | Detalles para realización de pago</b></p>
                                <div style="margin-left:80%;margin-top:10px;" align="center">
                                    Fecha y hora<br>
                                    '.$fecha.'
                                </div>
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td colspan="3">
                                Estimad@ '.$nombre.' '.$apellido1.' '.$apellido2.', este es un correo informativo de pago, agradecemos ser parte de nuestra comunidad. Seguimos contigo, Atte. Administración IESDE.

                            </td>
                        </tr>
                        
                        
                        <tr style="background-color:#d1d1d1;">
                            <td style="border-left: 1px solid black;border-collapse: collapse;" >
                               Datos de la persona:
                            </td>
                            <td>
                              
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                              Solicitud #: '.$idsolicitud.'
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               Nombre:
                            </td>
                            <td style="padding-left:135px;">
                              Apellido paterno:
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                              Apellido materno:
                            </td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               <input type="text" readonly value="'.$nombre.'">
                            </td>
                            <td style="padding-left:135px;">
                              <input type="text" readonly value="'.$apellido1.'">
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                              <input type="text" readonly value="'.$apellido2.'">
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               Teléfono:
                            </td>
                            <td style="padding-left:135px;">
                              Correo electrónico:
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                              Matricula (nueva):
                            </td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               <input type="text" readonly value="'.$telefono.'">
                            </td>
                            <td style="padding-left:135px;">
                              <input type="text" readonly value="'.$email.'" style="width:280px;">
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                              <input type="text" readonly value="'.$matricula.'">
                            </td>
                        </tr>
                        
                        
                        <tr style="background-color:#d1d1d1;">
                            <td colspan="3" style="border-left: 1px solid black;border-right: 1px solid black;border-top: 1px solid black;border-collapse: collapse;">
                               Detalles del producto:
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               SKU programa:
                            </td>
                            <td style="padding-left:135px;">
                              Nombre programa:
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                              
                            </td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               <input type="text" readonly value="'.$skuprograma.'">
                            </td>
                            <td style="padding-left:135px;">
                              <input type="text" readonly value="'.$nombrePrograma.'" style="width:280px;">
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                              
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               Plazos:
                            </td>
                            <td style="padding-left:135px;">
                              Monto a pagar '.$moneda.':
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                              
                            </td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               <input type="text" readonly value="'.$num_pagos.'">
                            </td>
                            <td style="padding-left:135px;">
                              <input type="text" readonly value="'.$monto.'">
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                              
                            </td>
                        </tr>
                        
                        <tr style="background-color:#d1d1d1;">
                            <td colspan="3" style="border-left: 1px solid black;border-right: 1px solid black;border-top: 1px solid black;border-collapse: collapse;">
                               Transferencia interbancaria SPEI:
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="3" style="border-left: 1px solid black;border-right: 1px solid black;border-collapse: collapse;" align="center">
                               <b>Pasos para realizar el pago:</b><br>
                                1. Ingresa a la sección de transferencias o pagos a otros bancos y proporciona los datos de la transferencia:<br>
                                <table>
                                     '.$datos_bancarios.'
                                    <tr><td align="right"><b>Concepto de pago:</b></td><td align="left"> '.$idtransaccion.'</td></tr>
                                    <tr><td align="right"><b>Referencia:</b></td><td align="left"> '.$idtransaccion.'</td></tr>
                                    <tr><td align="right"><b>Monto:</b></td><td align="left"> '.number_format($monto,2).'</td></tr>
                                </table><br>
                               
                                2. Luego envía tu comprobante a través del siguiente link (pdf, jpeg, jpg):

                            </td>
                        </tr>
                        
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               
                            </td>
                            <td align="center" style="padding-top:30px;padding-bottom:30px;">
                               <a href="https://piquero.com.mx/iesde/iesde_prospectos/adjuntar_pago.php?code1='.$idsolicitud_cifrado.'&&code2='.$id_editar.'" ><button style="background-color:#6e0307;padding:10px 45px 10px 45px;color:white;">Enviar comprobante de pago</button></a>
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                               
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               
                            </td>
                            <td align="center">
                               
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                                
                            </td>
                        </tr>
                        
                        
                        <tr style="background-color:#a3a3a3;">
                            <td colspan="3" style="border: 1px solid black;border-collapse: collapse;" align="center">
                               El presente mensaje es una copia informativa de su solicitud de información. Si tienes dudas comunicate a IESDE al teléfono +52 (222) 246 4639<br>
                                /49/59 o por correo irma.sandoval@iesde.mx

                            </td>
                        </tr>
                    </table>
                ';
                
                $destinatario=$email;
                $asunto='Detalles para realización de pago | IESDE School of Management';
                
                $correo_enviado=enviar_correo($destinatario,$asunto,$mensaje);
                
                if($correo_enviado==1){
                    $notificacion='Se envió la notificación al prospecto';
                }else{
                    $notificacion='No se pudo enviar la notificación al prospecto';
                    
                }
                
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Se agregó el producto al cobro<br>'.$notificacion
                );
                
            }else{
                
                $mensaje='
                    <table>
                        <tr style="background-color:#a3a3a3;">
                            <td style="color:white;" colspan="3">
                                <p style="float:left;margin-left:20px;margin-top:15px;"><b>IESDE | Detalles para realización de pago</b></p>
                                <div style="margin-left:80%;margin-top:10px;" align="center">
                                    Fecha y hora<br>
                                    '.$fecha.'
                                </div>
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td colspan="3">
                                Estimad@ '.$nombre.', a continuación presentamos los detalles de pago para ti.<br>
                            </td>
                        </tr>
                        
                        
                        <tr style="background-color:#d1d1d1;">
                            <td style="border-left: 1px solid black;border-collapse: collapse;" >
                               Datos personales:
                            </td>
                            <td>
                              
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                              Solicitud #: '.$idsolicitud.'
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               Nombre:
                            </td>
                            <td style="padding-left:135px;">
                              Apellido paterno:
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                              Apellido materno:
                            </td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               <input type="text" readonly value="'.$nombre.'">
                            </td>
                            <td style="padding-left:135px;">
                              <input type="text" readonly value="'.$apellido1.'">
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                              <input type="text" readonly value="'.$apellido2.'">
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               Teléfono:
                            </td>
                            <td style="padding-left:135px;">
                              Correo electrónico:
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                              Matricula (nueva):
                            </td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               <input type="text" readonly value="'.$telefono.'">
                            </td>
                            <td style="padding-left:135px;">
                              <input type="text" readonly value="'.$email.'" style="width:280px;">
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                              <input type="text" readonly value="'.$matricula.'">
                            </td>
                        </tr>
                        
                        
                        <tr style="background-color:#d1d1d1;">
                            <td colspan="3" style="border-left: 1px solid black;border-right: 1px solid black;border-top: 1px solid black;border-collapse: collapse;">
                               Detalles de pago:
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               SKU programa:
                            </td>
                            <td style="padding-left:135px;">
                              Nombre programa:
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                              
                            </td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               <input type="text" readonly value="'.$skuprograma.'">
                            </td>
                            <td style="padding-left:135px;">
                              <input type="text" readonly value="'.$nombrePrograma.'" style="width:280px;">
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                              
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               # pagos:
                            </td>
                            <td style="padding-left:135px;">
                              Monto a pagar '.$moneda.':
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                              
                            </td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               <input type="text" readonly value="'.$num_pagos.'">
                            </td>
                            <td style="padding-left:135px;">
                              <input type="text" readonly value="'.$monto.'">
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                              
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               
                            </td>
                            <td align="center" style="padding-top:30px;padding-bottom:30px;">
                               <a href="https://piquero.com.mx/iesde/iesde_prospectos/continua_prospecto.php?code1='.$idsolicitud_cifrado.'&&code2='.$id_editar.'"><button style="background-color:#6e0307;padding:10px 45px 10px 45px;color:white;">Realizar pago AHORA</button></a>
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                              
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td style="border-left: 1px solid black;border-collapse: collapse;">
                               
                            </td>
                            <td align="center">
                               IMPORTANTE:<br>
                                Ud. será redirigido a nuestra plataforma de pago seguro con tecnología de OPEN PAY.
                            </td>
                            <td style="border-right: 1px solid black;border-collapse: collapse;">
                                
                            </td>
                        </tr>
                        
                        
                        <tr style="background-color:#a3a3a3;">
                            <td colspan="3" style="border: 1px solid black;border-collapse: collapse;" align="center">
                               El presente mensaje es un correo informativo para la realización de pago.<br>
                               Consulte nuestro aviso de privacidad en www.iesde.mx
                            </td>
                        </tr>
                    </table>
                ';
                
                $destinatario=$email;
                $asunto='Detalles para realización de pago | IESDE School of Management';
                
                $correo_enviado=enviar_correo($destinatario,$asunto,$mensaje);
                
                if($correo_enviado==1){
                    $notificacion='Se envió la notificación al prospecto';
                }else{
                    $notificacion='No se pudo enviar la notificación al prospecto';
                    
                }
                
                
                 //$notificacion=$correo_enviado;
                
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Se agregó el producto al cobro<br>'.$notificacion
                );
                
            }
            
    
        }catch(Exception $e){
    
            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Vuelve a intentar...'
            );
    
        }
        $mysqli -> close();
        
    }else if($accion === 'configuracion'){
        
        //GUARDAMOS LOS DATOS QUE NOS ENVIAN DEL FORMULARIO
       
        
        $iva = $_POST['iva'];
        $Dominio = $_POST['Dominio'];
        
        

        //APLICAMOS UNA SANITIZACION
        
       
        $iva = filter_var($iva, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        $Dominio = filter_var($Dominio, FILTER_SANITIZE_STRING);
        
        
        //CREAMOS LA CONEXION A LA BASE DE DATOS
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        $j =10;
        $datos =  array( $iva,$Dominio);
        
        try{
            for($i = 0 ; $i < 2 ; $i++){

                if($i==0){

                    $idconf = 7;
                    $query = $mysqli->prepare("UPDATE configuracion SET configuracion_valor = ? WHERE configuracion_id = ?");
                    $query -> bind_param('si',$datos[($i)],$idconf);
                    $query -> execute();
                    //$query -> fetch();
                    $query -> close();
                    

                }else if ($i==1) {

                    $idconf = 9;
                    $query = $mysqli->prepare("UPDATE configuracion SET configuracion_valor = ? WHERE configuracion_id = ?");
                    $query -> bind_param('si',$datos[($i)],$idconf);
                    $query -> execute();
                    //$query -> fetch();
                    $query -> close();
                }else{

                    $query = $mysqli->prepare("UPDATE configuracion SET configuracion_valor = ? WHERE configuracion_id = ?");
                    $query -> bind_param('si',$datos[($i)],($j));
                    $query -> execute();
                    //$query -> fetch();
                    $query -> close();
                    $j++;
                }

                
            }

                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Configuración actualizada correctamente'
                );

            
            $mysqli -> close();
        }catch(Exception $e){

            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Vuelve a intentar...'
            );

        }

    }else if($accion === 'usuario'){
        
        $id_editar = $_POST['id_editar'];

        //GUARDAMOS LOS DATOS QUE NOS ENVIAN DEL FORMULARIO
      
        
        $email = $_POST['email'];
        $usuario = $_POST['usuario'];
        $rol = $_POST['rol'];
        $contrasenia = $_POST['contrasenia'];

        
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        // $usuario = filter_var($usuario, FILTER_SANITIZE_STRING);

        //CREAMOS LA CONEXION A LA BASE DE DATOS
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        
        try{
        //VERIFICAMOS SI ES NECESARIO CAMBIAR LA CONTRASENA

            if($contrasenia!=''){
                revisarContrasena($contrasenia);
                $opcion = array('cost' => 12);
                $contrasenia = password_hash($contrasenia, PASSWORD_BCRYPT, $opcion);
                
            }
            
            $query = "UPDATE logueo SET email_logueo='$email',username_logueo='$usuario',logueoroles_IDsystemlogueorol=$rol WHERE id_logueo = $id_editar ";
            $putData = $mysqli->query($query);
            if( !$putData ) {
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'Error al actualizar los datos del usuario'
                );
                $mysqli -> close();
                echo die(json_encode($respuesta));
            }
            // $query = $mysqli->prepare(" UPDATE logueo SET email_logueo=?,username_logueo=?,logueoroles_IDsystemlogueorol=? WHERE id_logueo = ? ");
            // $query -> bind_param('ssii', $email,$usuario,$rol,$id_editar);
            // $query -> execute();
            // $query -> fetch();
            // $query -> close();
            
            if($contrasenia!=''){
                $queryPass = "UPDATE logueo SET password_logueo='$contrasenia' WHERE id_logueo = $id_editar ";
                $putDataPass = $mysqli->query($queryPass);

                // $query = $mysqli->prepare(" UPDATE logueo SET password_logueo=? WHERE id_logueo = ? ");
                // $query -> bind_param('si', $contrasenia,$id_editar);
                // $query -> execute();
                // $query -> fetch();
                // if($query->affected_rows>0){
                if($putDataPass){
                    // $query -> close();
                    $respuesta = array(
                        'respuesta' => 'success',
                        'mensaje' => 'Usuario actualizado correctamente'
                    );
                    
                }else{
                    $respuesta = array(
                        'respuesta' => 'error',
                        'mensaje' => 'Se actualizaron los datos del usuario, pero no se le pudo asignar una nueva contraseña, intente de nuevo'
                    );
                }
            }
            else{
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Usuario actualizado correctamente'
                );
                
            }

        }catch(Exception $e){
            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Vuelve a intentar...',
                'data' => $e->getMessage()
            );
        }
        $mysqli -> close();
    }
}

//RETORNAMOS EL ARRAY RESPUESTA.
echo die(json_encode($respuesta));

function revisarContrasena($pass){

    $error_clave = null;

    if(strlen($pass) < 8){    //Compara la contraseña si es mayor a 6 caracteres.

        $error_clave = "La clave debe tener al menos 8 caracteres"; //Se asigna valor a la variable error_clave.
        $respuesta = array(

            'respuesta' => 'error',   //En el array se guarda la respuesta que se leera desde app.js
            'mensaje' => $error_clave   //Además se envia un mensaje que es el error por el cual entro a esta condición.

        );
        die(json_encode($respuesta));   //Se cancela todo el proceso y se manda el array de la respuesta.
        
     }

     if(strlen($pass) > 16){  //Compara la contraseña si es menor a 16 caracteres.

        $error_clave = "La clave no puede tener más de 16 caracteres";  //Se asigna valor a la variable error_clave.
        $respuesta = array(

            'respuesta' => 'error',   //En el array se guarda la respuesta que se leera desde app.js
            'mensaje' => $error_clave   //Además se envia un mensaje que es el error por el cual entro a esta condición.

        );
        echo die(json_encode($respuesta));  //Se cancela todo el proceso y se manda el array de la respuesta.

     }

     if (!preg_match('`[a-z]`',$pass)){   //Se compara la contraseña si contiene algunas letra de la 'a' a la 'z' en minuscula.

        $error_clave = "La clave debe tener al menos una letra minúscula";  //Se asigna valor a la variable error_clave.
        $respuesta = array(

            'respuesta' => 'error',   //En el array se guarda la respuesta que se leera desde app.js
            'mensaje' => $error_clave   //Además se envia un mensaje que es el error por el cual entro a esta condición.

        );
        echo die(json_encode($respuesta));  //Se cancela todo el proceso y se manda el array de la respuesta.

     }

     if (!preg_match('`[A-Z]`',$pass)){   //Se compara la contraseña si contiene algunas letras de la 'A' a la 'Z' en mayuscula.

        $error_clave = "La clave debe tener al menos una letra mayúscula";//Se asigna valor a la variable error_clave.
        $respuesta = array(

            'respuesta' => 'error',   //En el array se guarda la respuesta que se leera desde app.js
            'mensaje' => $error_clave   //Además se envia un mensaje que es el error por el cual entro a esta condición.
            
        );
        echo die(json_encode($respuesta));  //Se cancela todo el proceso y se manda el array de la respuesta.

     }

     if (!preg_match('`[0-9]`',$pass)){   //Se compara la contraseña si contiene algun numero del '0' al '9'

        $error_clave = "La clave debe tener al menos un caracter numérico"; //Se asigna valor a la variable error_clave.
        $respuesta = array(

            'respuesta' => 'error',   //En el array se guarda la respuesta que se leera desde app.js
            'mensaje' => $error_clave   //Además se envia un mensaje que es el error por el cual entro a esta condición.

        );
        echo die(json_encode($respuesta));  //Se cancela todo el proceso y se manda el array de la respuesta.

     } 

     return $error_clave;

}

?>