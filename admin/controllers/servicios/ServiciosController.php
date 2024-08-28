<?php

	require_once ('../../php/conexion.php');


	if( isset($_POST["option"]) ){



		if($_POST["option"]=='getDataEdit'){

            $id_servicio = $_POST["code"];
            

            $mysqli = conectar();

           

            $query = $mysqli->prepare(" SELECT id_service,service_name,service_description,id_category,image_service,priority_home,order_public,available
                                        FROM services
                                        WHERE id_service = ? ");
            $query -> bind_param('i',$id_servicio);
            $query -> execute();
            $query -> bind_result($currentService,$name,$descripcion,$categoria,$image,$showHome,$orden,$publish);
            $query -> fetch();
            $query -> close();

            if($currentService){

            	if(is_null($image)==true || $image==''){
            		$image = '';
            	}

                $response = array();
                $response['response']='success';
                
                $response['name']=$name;
                $response['descripcion']=$descripcion;
                $response['categoria']=$categoria;
                $response['image']=$image;
                $response['showHome']=$showHome;
                $response['orden']=$orden;
                $response['publish']=$publish;


            }else{
                $response = array();
                $response['response']='error';
            }


            $mysqli->close();

            echo json_encode($response);

        }else if($_POST["option"]=='saveData'){


			$operation = $_POST["operation"];


			$name = $_POST['name'];
			$name = filter_var($name, FILTER_SANITIZE_STRING);

			$categorie = $_POST['categorie'];

			$longDescription = $_POST['longDescription'];

			$show_home = $_POST['show_home'];

			$orden = $_POST['orden'];
			$orden = filter_var($orden, FILTER_SANITIZE_NUMBER_INT);

			$publish = $_POST['publish'];

			$previewImage1 = $_POST['previewImage1'];

			date_default_timezone_set('America/Mexico_City');
            $current_date =date("Y-m-d H:i:s");


			if( $operation==='create'){

				try{
				


					$mysqli = conectar();


					$query = $mysqli->prepare(" INSERT INTO services (
                                                                        service_name,
                                                                        service_description,
                                                                        id_category,
                                                                        priority_home,
                                                                        order_public,
                                                                        created_at,
                                                                        available
                                                                    )
                                                VALUES (?,?,?,?,?,?,?)");
                    $query -> bind_param('ssiiisi',$name,$longDescription,$categorie,$show_home,$orden,$current_date,$publish);
                    $query -> execute();
                    //$query -> fetch();
                    
                    $msgImagen = '';
                    if($query->affected_rows>0){

                        $id_servicio = $query->insert_id;
                        $query -> close();


                        $imagen='';
	                    if($previewImage1!=''){
	                        
	                        $Base64Img = $previewImage1;
	                        list(, $Base64Img) = explode(';', $Base64Img);
	                        list(, $Base64Img) = explode(',', $Base64Img);
	                        
	                        //Decodificamos $Base64Img codificada en base64.
	                        $Base64Img = base64_decode($Base64Img);
	                        
	                        //escribimos la información obtenida en un archivo llamado 
	                        //unodepiera.png para que se cree la imagen correctamente
	                        $newName = $id_servicio."_servicio.png";
	                        $fileComplete = file_put_contents("../../../images/services/".$newName, $Base64Img);
	                        if($fileComplete){
	                             $imagen = $newName;

	                            $query = $mysqli->prepare(" UPDATE services SET 
			                                                        image_service=?		                                                        
			                                                WHERE id_service = ? ");
			                    $query -> bind_param('si',$imagen,$id_servicio);
			                    $query -> execute();
			                    //$query -> fetch();
			                    $query -> close();

	                        }else{
	                            
	    						$msgImagen = '<br>No se pudo subir la imagen.';
	                            
	                        }
	                        
	                    }


                    }else{
                        $query -> close();

                        $respuesta = array(
                            'response' => 'error',
                            'message' => 'Ocurrió un error al tratar de guardar los datos del servicio, intente de nuevo.'
                        );

                        $mysqli -> close();

                        echo die(json_encode($respuesta));

                    }



					$respuesta = array(
                        'response' => 'success',
                        'message' => 'Servicio creado correctamente'.$msgImagen
                    );

                    $mysqli -> close();



				}catch(Exception $e){

	                $respuesta = array(
	                    'response' => 'error',
	                    'message' => 'Error[1]:Sucedio un error al tratar de realizar el guardado de datos. '//.$e
	                );
	        
                }

			}else if( $operation==='edit'){

				try{


					$id_servicio = $_POST["code"];

					$mysqli = conectar();


					$query = $mysqli->prepare(" UPDATE services SET 
                                                        service_name=?,
                                                        service_description=?,
                                                        id_category=?,
                                                        priority_home=?,
                                                        order_public=?,
                                                        updated_at=?,
                                                        available=?
                                                WHERE id_service = ? ");
                    $query -> bind_param('ssiiisii',$name,$longDescription,$categorie,$show_home,$orden,$current_date,$publish,$id_servicio);
                    $query -> execute();
                    //$query -> fetch();

                    if($query->affected_rows>0){
                       
                        $query -> close();
                        $message.='Datos del servicio actualizados correctamente.';
                     
                    }else{
                        $query -> close();
                        $message.='<br>No hubo actualizaciones en los datos del servicio.';
                    }


                    if($previewImage1!=''){
                        
                        $Base64Img = $previewImage1;
                        list(, $Base64Img) = explode(';', $Base64Img);
                        list(, $Base64Img) = explode(',', $Base64Img);
                        
                        //Decodificamos $Base64Img codificada en base64.
                        $Base64Img = base64_decode($Base64Img);
                        
                        //escribimos la información obtenida en un archivo llamado 
                        //unodepiera.png para que se cree la imagen correctamente
                        $newName = $id_servicio."_servicio.png";
                        $fileComplete = file_put_contents("../../../images/services/".$newName, $Base64Img);

                        if($fileComplete){

                            $imagen = $newName;

                            $query = $mysqli->prepare(" UPDATE services SET 
		                                                        image_service=?		                                                        
		                                                WHERE id_service = ? ");
		                    $query -> bind_param('si',$imagen,$id_servicio);
		                    $query -> execute();
		                    //$query -> fetch();
		                    $query -> close();

                        }else{
                            $respuesta = array(
                                'response' => 'error',
                                'message' => $message.'<br>No se pudo subir la imagen.'
                            );
    
                            $mysqli -> close();
    
                            echo die(json_encode($respuesta));
                        }
                        
                    }

                    $respuesta = array(
                        'response' => 'success',
                        'message' => $message
                    );

                    $mysqli -> close();


				}catch(Exception $e){

	                $respuesta = array(
	                    'response' => 'error',
	                    'message' => 'Error[1]:Sucedio un error al tratar de realizar el guardado de datos. '//.$e
	                );
	        
                }

			}


            echo die(json_encode($respuesta));



		}


	}

?>