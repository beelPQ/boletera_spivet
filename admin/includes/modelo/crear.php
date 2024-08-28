<?php

$accion = $_POST['accion']; //Se guarda accion en una variable global para validar que proceso debera tomar

if(isset($accion)){
    
    if($accion === 'tienda_categoria'){

        $nombre = $_POST['nombre']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $id_categoria = $_POST['id_categoria'];
    
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL NOMBRE
    
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
    
        try{
    
            $query = $mysqli->prepare(" INSERT INTO tienda_categoria (id_global, nombre_categoria) VALUES (?,?)");
            $query -> bind_param('is', $id_categoria, $nombre);
            $query -> execute();
            //$query -> fetch();
            $id_insertado = $query->insert_id;   //Se guarda el id que se inserto para posteriormente hacer la insersion en la otra taba
            
            if($query->affected_rows>0){
    
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Categoría insertada correctamente',
                    'id_insertado' => $id_insertado
                );
    
            }else{
    
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'Vuelve a intentar...'
                );
    
            }
    
            $query -> close();
            $mysqli -> close();
    
        }catch(Exception $e){
    
            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Vuelve a intentar...',
                'data' => $e->getMessage()
            );
    
        }
    }else if($accion === 'tienda_producto'){

        $nombre = $_POST['nombre']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $id_categoria = $_POST['id_categoria'];
        
        $tamaño = $_POST['tamaño']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $precio = $_POST['precio']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
    
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL NOMBRE
        $tamaño = filter_var($tamaño, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL TAMANO
        $precio = filter_var($precio, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL PRECIO
    
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
    
        try{
    
            $query = $mysqli->prepare(" INSERT INTO tienda_producto (id_categoria, nombre_producto, tamaño_producto, precio_producto)
                                        VALUES (?,?,?,?)");
            $query -> bind_param('isss', $id_categoria, $nombre,$tamaño,$precio);
            $query -> execute();
            //$query -> fetch();
            $id_insertado = $query->insert_id;   //Se guarda el id que se inserto para posteriormente hacer la insersion en la otra taba
            
            if($query->affected_rows>0){
    
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Producto insertado correctamente'
                );
    
            }else{
    
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'Vuelve a intentar...'
                );
    
            }
    
            $query -> close();
            $mysqli -> close();
    
        }catch(Exception $e){
    
            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Vuelve a intentar...',
                'data' => $e->getMessage()
            );
    
        }
    }else if($accion === 'producto'){
    
        $skuprograma = $_POST['skuprograma']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $categoria = $_POST['categoria']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $descripcion2 = $_POST['descripcion2'];
        $precio = $_POST['precio']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $precio2 = $_POST['precio2']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $disponible = $_POST['disponible']; 
        
        $check_descuento = $_POST['check_descuento'];
        
    
        $skuprograma = filter_var($skuprograma, FILTER_SANITIZE_STRING); //SANITIZAMOS EL ID
        $categoria = filter_var($categoria, FILTER_SANITIZE_STRING); //SANITIZAMOS EL ID
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL NOMBRE
        $descripcion = filter_var($descripcion, FILTER_SANITIZE_STRING);
        $descripcion2 = filter_var($descripcion2, FILTER_SANITIZE_STRING);
        $precio = filter_var($precio, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);  //SANITIZAMOS EL PRECIO
        $precio2 = filter_var($precio2, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);  //SANITIZAMOS EL PRECIO
        
        
        
        
    
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
    
        try{
    
            $query = $mysqli->prepare(" INSERT INTO producto (skuproducto,categoria,NombreProducto,descripcion,descripcion2,PrecioMX,PrecioUSD,disponible)
                                        VALUES (?,?,?,?,?,?,?,?)");
            $query -> bind_param('sisssddi', $skuprograma,$categoria,$nombre,$descripcion,$descripcion2,$precio,$precio2,$disponible);
            $query -> execute();
            //$query -> fetch();
            $id_insertado = $query->insert_id;   //Se guarda el id que se inserto para posteriormente hacer la insersion en la otra taba
            
            if($query->affected_rows>0){
                $query -> close();
                
                $msjdesc1='';
                if($check_descuento=='1'){
                    $tipo_descuento = $_POST['tipo_descuento'];
                    $cantidad1 = $_POST['cantidad1'];
                    $cantidad2 = $_POST['cantidad2'];
                    $existencia = $_POST['existencia'];
                    $descuento_inicio = $_POST['descuento_inicio'];
                    $descuento_hora_inicio = $_POST['descuento_hora_inicio'];
                    $descuento_fin = $_POST['descuento_fin'];
                    $descuento_hora_fin = $_POST['descuento_hora_fin'];
                    $codigo_descuento = $_POST['codigo_descuento'];
                    
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
                    
                    $query = $mysqli->prepare(" INSERT INTO descuentos (formato_descuento,cantidad_descuento,cantidad2_descuento,existencia_descuento,valido_desde,valido_hasta,codigo_descuento)
                                        VALUES (?,?,?,?,?,?,?)");
                    $query -> bind_param('sddisss', $tipo_descuento,$cantidad1,$cantidad2,$existencia,$fecha_descuento_inicio,$fecha_descuento_fin,$codigo_descuento);
                    $query -> execute();
                    //$query -> fetch();
                    $iddescuento = $query->insert_id; 
                    
                    if($query->affected_rows>0){
                        $query -> close();
                        
                        $query = $mysqli->prepare(" INSERT INTO producto_descuento (producto_IDsystempro,descuentos_id_descuento)
                                        VALUES (?,?)");
                        $query -> bind_param('ii', $id_insertado,$iddescuento);
                        $query -> execute();
                        //$query -> fetch();
                        
                        if($query->affected_rows>0){
                            $query -> close();
                            
                            $msjdesc1='Se agregó el descuento 1 al producto.';
                            
                        }else{
                            $query -> close();
                            
                            
                            $query = $mysqli->prepare("DELETE FROM descuentos WHERE id_descuento = ?");
                            $query -> bind_param('i',$iddescuento);
                            $query -> execute();
                            //$query -> fetch();
                            $query -> close();
                            
                            $msjdesc1='No se pudo agregar el descuento 1';
                        }
                        
                        
                    }else{
                        $query -> close();
                
                        $msjdesc1='No se pudo agregar el descuento 1';
                        
                    }
                    
                    
                }
                
                
                $msjdescs='';
                for($i=2;$i<=5;$i++){
                    $check_descuenton = $_POST['check_descuento'.$i];
                    if($check_descuenton=='1'){
                        
                        $tipo_descuento = $_POST['tipo_descuento_desc'.$i];
                        $cantidad1 = $_POST['cantidad1_desc'.$i];
                        $cantidad2 = $_POST['cantidad2_desc'.$i];
                        $existencia = $_POST['existencia_desc'.$i];
                        $descuento_inicio = $_POST['descuento_inicio_desc'.$i];
                        $descuento_hora_inicio = $_POST['descuento_hora_inicio_desc'.$i];
                        $descuento_fin = $_POST['descuento_fin_desc'.$i];
                        $descuento_hora_fin = $_POST['descuento_hora_fin_desc'.$i];
                        $codigo_descuento = $_POST['codigo_descuento_desc'.$i];
                        
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
                        
                        $query = $mysqli->prepare(" INSERT INTO descuentos (formato_descuento,cantidad_descuento,cantidad2_descuento,existencia_descuento,valido_desde,valido_hasta,codigo_descuento)
                                            VALUES (?,?,?,?,?,?,?)");
                        $query -> bind_param('sddisss', $tipo_descuento,$cantidad1,$cantidad2,$existencia,$fecha_descuento_inicio,$fecha_descuento_fin,$codigo_descuento);
                        $query -> execute();
                        //$query -> fetch();
                        $iddescuento = $query->insert_id; 
                        
                        if($query->affected_rows>0){
                            $query -> close();
                            
                            $query = $mysqli->prepare(" INSERT INTO producto_descuento (producto_IDsystempro,descuentos_id_descuento)
                                            VALUES (?,?)");
                            $query -> bind_param('ii', $id_insertado,$iddescuento);
                            $query -> execute();
                            //$query -> fetch();
                            
                            if($query->affected_rows>0){
                                $query -> close();
                                
                                $msjdescs.='Se agregó el descuento '.$i.' al producto.<br>';
                                
                            }else{
                                $query -> close();
                                
                                
                                $query = $mysqli->prepare("DELETE FROM descuentos WHERE id_descuento = ?");
                                $query -> bind_param('i',$iddescuento);
                                $query -> execute();
                                //$query -> fetch();
                                $query -> close();
                                
                                $msjdescs.='No se pudo agregar el descuento '+$i+'<br>';
                            }
                            
                            
                            
                        }else{
                            $query -> close();
                            
                            $msjdescs.='No se pudo agregar el descuento '+$i+'<br>';
                        }
                        
                        
                    }
                }
                
                
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Producto insertado correctamente<br>'.$msjdesc1.'<br>'.$msjdescs,
                    'idInsertado' => $id_insertado
                );
                    
               
            }else{
                $query -> close();
    
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'Vuelve a intentar...'
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
        
        $id = $_POST['id']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $plataforma = $_POST['plataforma'];
        $nombre = $_POST['nombre'];
        $comision_porcentaje = $_POST['comision_porcentaje']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $comision_pesos = $_POST['comision_pesos']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $comision_dolares = $_POST['comision_dolares']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        
        
        $id = filter_var($id, FILTER_SANITIZE_STRING); //SANITIZAMOS EL ID
        $plataforma = filter_var($plataforma, FILTER_SANITIZE_STRING); 
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL NOMBRE
        $comision_porcentaje= filter_var($comision_porcentaje,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        $comision_pesos= filter_var($comision_pesos,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        $comision_dolares= filter_var($comision_dolares,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        
        
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        
        try{
    
            $query = $mysqli->prepare(" INSERT INTO forma_depago (IDformapago,plataforma,Nombrepago,comision_porcentaje,comision_pesos,comision_dolares)
                                        VALUES (?,?,?,?,?,?)");
            $query -> bind_param('sssddd', $id,$plataforma,$nombre,$comision_porcentaje,$comision_pesos,$comision_dolares);
            $query -> execute();
            //$query -> fetch();
            
          
            
            if($query->affected_rows>0){
    
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Forma de pago insertada correctamente'
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
        $mysqli -> close();
        
    }else if($accion === 'empresa'){
        
        $id = $_POST['id']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $nombre = $_POST['nombre'];
        $nombre_corto = $_POST['nombre_corto']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $rfc = $_POST['rfc']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $telefono = $_POST['telefono']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        $email = $_POST['email']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE CREAR.JS
        
        $id = filter_var($id, FILTER_SANITIZE_STRING); //SANITIZAMOS EL ID
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL NOMBRE
        $nombre_corto = filter_var($nombre_corto, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL PRECIO
        $rfc = filter_var($rfc, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL NOMBRE
        $telefono = filter_var($telefono, FILTER_SANITIZE_STRING);  //SANITIZAMOS EL NOMBRE
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);  //SANITIZAMOS EL PRECIO 
        
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        
        try{
    
            $query = $mysqli->prepare(" INSERT INTO empresa (idempresa,nombre_empresa,nombre_corto_empresa,rfc_empresa,telefono_empresa,email_empresa)
                                        VALUES (?,?,?,?,?,?)");
            $query -> bind_param('ssssss', $id, $nombre,$nombre_corto,$rfc,$telefono,$email);
            $query -> execute();
            //$query -> fetch();
          
            
            if($query->affected_rows>0){
    
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Empresa insertada correctamente'
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
        $mysqli -> close();
        
        
    }else if($accion === 'expo'){
        
        
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
    
            $query = $mysqli->prepare(" INSERT INTO expos (nombre,nombre_corto,contacto,telefono,email,link)
                                        VALUES (?,?,?,?,?,?)");
            $query -> bind_param('ssssss',$nombre,$nombre_corto,$contacto,$telefono,$email,$link);
            $query -> execute();
            //$query -> fetch();
          
            
            if($query->affected_rows>0){
    
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Expo insertada correctamente'
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
        
        
    }else if($accion === 'usuario'){

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

            revisarContrasena($contrasenia);
            $opcion = array('cost' => 12);
            $contrasenia = password_hash($contrasenia, PASSWORD_BCRYPT, $opcion);

            $query = "INSERT INTO logueo (email_logueo,username_logueo,password_logueo,logueoroles_IDsystemlogueorol) VALUES ('$email','$usuario','$contrasenia',$rol)";
            $resultado2 = $mysqli->query($query);

            if( $resultado2 ) {
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Usuario creado correctamente'
                );
            }
            else {
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'No se creo el usuario, vuelva a intentar'
                );
            }


            // $query = $mysqli->prepare("INSERT INTO logueo (email_logueo,username_logueo,password_logueo,logueoroles_IDsystemlogueorol) VALUES (?,?,?,?)");
            // $query->bind_param('sssi',$email,$usuario,$contrasenia,$rol);
            // $query->execute();
            // $query->fetch();

            // if($query->affected_rows>0){

            //     $respuesta = array(
            //         'respuesta' => 'success',
            //         'mensaje' => 'Usuario creado correctamente'
            //     );

            // }else{

            //     $respuesta = array(
            //         'respuesta' => 'error',
            //         'mensaje' => 'No se creo el usuario, vuelva a intentar'
            //     );

            // }

            // $query->close();
            
        }catch(Exception $e){

            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Vuelve a intentar...',
                'data' => $e->getMessage()
            );

        }
        $mysqli -> close();

    }else if($accion === 'cobro'){
        include("funciones/funciones.php");
        
        
        
        $idsolicitud = $_POST['idsolicitud'];
        $nombre = $_POST['nombre']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE EDITAR.JS
        $apellido1 = $_POST['apellido1']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE EDITAR.JS
        $apellido2 = $_POST['apellido2']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE EDITAR.JS
        $moneda = $_POST['moneda'];
        $producto = $_POST['producto']; //OBTENEMOS EL VALOR QUE RECIBIMOS DE EDITAR.JS
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
            
            $query = $mysqli->prepare(" SELECT idregcobro FROM cobros ORDER BY idregcobro DESC LIMIT 1");
            $query -> execute();
            $query -> bind_result($ultimoid);
            $query -> fetch();
            $query -> close();
            
            $query = $mysqli->prepare(" SELECT Telefono,Email,matricula FROM prospectos WHERE IDsolicitud = ?");
            $query -> bind_param('i',$idsolicitud);
            $query -> execute();
            $query -> bind_result($telefono,$email,$matricula);
            $query -> fetch();
            $query -> close();
            
            if($ultimoid){
                $idcobro = $ultimoid+1;
            }else{
                $idcobro = 100;
            }
            
           if($formapago==2 || $formapago=='2'){
                
                $idtransaccion = $matricula.$skuprograma.$idcobro;
                
            }else{
                $idtransaccion = NULL;
            }
            
            $estado=0;
            $terminos=1;
            $query = $mysqli->prepare("INSERT INTO cobros (idregcobro,IDtransaccion,MontoTransaccion,TipoCambio,Status,prospectos_IDprospecto,producto_IDproducto,forma_depago_IDformapago,TerminosyCondiciones1)
                                        VALUES (?,?,?,?,?,?,?,?,?)");
            $query -> bind_param('isdsiiiii',$idcobro,$idtransaccion,$monto,$moneda,$estado,$idsolicitud,$producto,$formapago,$terminos);
            $query -> execute();
            //$query -> fetch();
            
            
            
            
            if($query->affected_rows>0){
                $id_editar = $query->insert_id;
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
                        'mensaje' => 'Se creó el cobro.<br>'.$notificacion
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
                                   <a href="http://piquero.com.mx/iesde/iesde_prospectos/continua_prospecto.php?code1='.$idsolicitud_cifrado.'&&code2='.$id_editar.'"><button style="background-color:#6e0307;padding:10px 45px 10px 45px;color:white;">Realizar pago AHORA</button></a>
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
                    
                    $respuesta = array(
                        'respuesta' => 'success',
                        'mensaje' => 'Se creó el cobro.<br>'.$notificacion
                    );
                    
                }
                
            }else{
                 $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'No se pudo crear el cobro, vuelva a intentar'
                );
            }
                
    
        }catch(Exception $e){
    
            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Vuelve a intentar...'
            );
    
        }
        $mysqli -> close();
        
    }
    
    
}

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
