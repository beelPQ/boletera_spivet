<?php
    require_once ('../../php/conexion.php');
    
    
    if( isset($_POST["option"]) ){

        if($_POST["option"]=='saveData'){


            $operation = $_POST["operation"];

            $name = $_POST['name'];
            //$name = filter_var($name, FILTER_SANITIZE_STRING);
            $lastname1 = $_POST['lastname_1'];
            //$lastname1 = filter_var($lastname1, FILTER_SANITIZE_STRING);
            $lastname2 = $_POST['lastname_2'];
            //$lastname2 = filter_var($lastname2, FILTER_SANITIZE_STRING);


            $phone = $_POST['phone'];
            //$phone = filter_var($phone, FILTER_SANITIZE_STRING);
            $phone = $_POST['lada_phone'].' '.$phone;

            $email = $_POST['email'];
            //$email = filter_var($email, FILTER_SANITIZE_STRING);
            $cpostal = $_POST['cpostal'];
            //$cpostal = filter_var($cpostal, FILTER_SANITIZE_STRING);
            // $estado = $_POST['estado'];
            // $municipio = $_POST['municipio'];
            $id_country = $_POST['country'];
            $id_state = $_POST['state'];
            
            

            if( $operation==='edit'){

                try{

                    $id_client = $_POST["code"];

                    $message = '';

                    $mysqli = conectar();

                    
                    $query = $mysqli->prepare(" UPDATE catalogo_clientes SET 
                                                        clientes_nombre=?,
                                                        clientes_apellido1=?,
                                                        clientes_apellido2=?,
                                                        clientes_email=?,
                                                        clientes_telefono=?,
                                                        clientes_codigopostal=?,
                                                        id_country=?,
                                                        id_state=?
                                                WHERE idsystemcli = ? ");
                    $query -> bind_param('ssssssiii',$name,$lastname1,$lastname2,$email,$phone,$cpostal,$id_country,$id_state,$id_client);
                    $query -> execute();
                    //$query -> fetch();

                   if($query->affected_rows>0){
                       
                        $query -> close();
                        $message.='<br>Datos del cliente actualizados correctamente.';
                     
                    }else{
                        $query -> close();
                        $message.='<br>No hubo actualizaciones en los datos del cliente.';
                    }


                    $respuesta = array(
                        'response' => 'success',
                        'message' => $message
                    );

                    $mysqli -> close();


                }catch(Exception $e){
    
                    $respuesta = array(
                        'response' => 'error',
                        'message' => 'Error[1]:Sucedio un error al tratar de realizar el guardado de datos. '.$e
                    );
            
                }
                
            }//end if: edit
            
            echo die(json_encode($respuesta));

        }//end if: saveData

       
    }
?>