<?php
$accion = $_POST['accion']; //Se guarda accion en una variable global para validar que proceso debera tomar

if(isset($accion)){ //Si accion no esta vacia...

    if($accion === 'login'){    //Si accion es === login
        
        //Se guarda USERNAME Y PASSWORD del formulario
        $email = $_POST['email'];
        $password = $_POST['password'];
            
        //Se le aplica una sanitizacion al correo.
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        //Se hace conexion a la base de datos.
        require_once ('../../php/conexion.php');
        $mysqli = conectar();

        try{
            
            $stmt = $mysqli->prepare(" SELECT * FROM logueo WHERE email_logueo = ? ");
            $stmt -> bind_param('s', $email);
            $stmt -> execute();
            $stmt -> bind_result($id_logueo, $email_logueo, $username_logueo, $password_logueo,$rolid);
            $stmt -> fetch();
            $stmt -> close();
            if($email_logueo){ //Si existe un dato en la base de datos con ese correo entra

                if(password_verify($password, $password_logueo)){   //Validamos que las contraseñas sean iguales

                    session_start();    //SE INICIALIZA EL VALOR DE SESSION Y SE LE ASIGNA VALORES
                    $_SESSION['id_logueo'] = $id_logueo;
                    $_SESSION['email_logueo'] = $email_logueo;
                    $_SESSION['username_logueo'] = $username_logueo;
                    $_SESSION['login'] = true;
                    $_SESSION['id_rol'] = $rolid;

                    $respuesta = array(
                            'respuesta' => 'success',
                            'mensaje' => 'Bienvenid@ '.$username_logueo
                    );

                }else{  //Si las contraseñas no son iguales

                    $respuesta = array(
                        'respuesta' => 'error',
                        'mensaje' => 'En 1email o contraseña'
                    );
                        
                }

            }else{  //Si no existio dato se retornara el siguiente valor

                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'En 2email o contraseña'
                );

            }
        }catch(Exception $e){

            $respuesta = array(
                'respuesta' => 'error',
                'mensaje' => 'Error en la conexion'
            );
    
        }

    $mysqli -> close();
        echo json_encode($respuesta);


    }

}


?>