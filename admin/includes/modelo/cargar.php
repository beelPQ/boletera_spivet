<?php

//echo count($_FILES["file0"]["name"]);exit;
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["fileToUpload"]["type"])){
    
    $target_dir = "../../images/icono_cafeteria/";
    $carpeta=$target_dir;
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }

    $eliminar = $_POST["id"];
    $imageFileType = pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION);
    $nombre = 'tiendacategoria'.$eliminar.'.'.$imageFileType;
    
    require_once ('../../php/conexion.php');
    
    $mysqli = conectar();
    $query = $mysqli -> prepare (" UPDATE tienda_categoria set icono_categoria = ? WHERE id_categoria = ? ");
    $query -> bind_param('si', $nombre, $_POST['id']);
    $query -> execute();
    $query -> close();
    $mysqli -> close();

    $target_file = $carpeta . $nombre;
    $uploadOk = 1;
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $errors[]= "El archivo es una imagen - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $errors[]= "El archivo no es una imagen.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 100000) {
        eliminar($eliminar);
        $respuesta = array(
                    'respuesta' => 'error',
                    'type' => 'error',
                    'mensaje' => 'Imagen muy grande.  Tamaño máximo admitido: 1 MB',
                    'boton' => 'Volver a intentar'
                            );
                die(json_encode($respuesta));
    }
    // Allow certain file formats
    if($imageFileType != "png" ) {
        eliminar($eliminar);
         $respuesta = array(
                    'respuesta' => 'error',
                    'type' => 'error',
                    'mensaje' => 'Solo archivos png son admitidos',
                    'boton' => 'Volver a intentar'
                            );
                die(json_encode($respuesta));
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        eliminar($eliminar);
        $respuesta = array(
                    'respuesta' => 'error',
                    'type' => 'error',
                    'mensaje' => 'Archivo no subido',
                    'boton' => 'Volver a intentar'
                            );
                die(json_encode($respuesta));
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
           $messages[]= "El Archivo ha sido subido correctamente.";
    	   
    	   
        } else {
            eliminar($eliminar);
           $respuesta = array(
                    'respuesta' => 'error',
                    'type' => 'error',
                    'mensaje' => 'Hubo un error subiendo el archivo',
                    'boton' => 'Volver a intentar'
                            );
                die(json_encode($respuesta));
        }
    }
    
    $respuesta = array(
                    'respuesta' => 'Correcto',
                    'type' => 'success',
                    'mensaje' => 'Archivo(s) cargado(s) correctamente',
                    'boton' => 'Aceptar'
                            );
                die(json_encode($respuesta));


}

function eliminar($eliminar){
    
    require_once ('../../php/conexion.php');
    
    $mysqli = conectar();
    $query = $mysqli -> prepare ("DELETE FROM tienda_categoria where id_categoria = ?");
    $query -> bind_param('i', $eliminar);
    $query -> execute();
    $query -> close();

    $mysqli ->close();
}
?> 

