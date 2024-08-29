<?php
    // require_once 'dompdf/autoload.inc.php';
    // use Dompdf\Dompdf;
    // use Dompdf\Options;
    require_once($_SERVER['DOCUMENT_ROOT'] . "/admin/php/conexion.php");
    // require_once($_SERVER['DOCUMENT_ROOT'] . "/admin/controllers/general/general.php"); 
    
    require_once '../dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    use Dompdf\Options;
    

    class designCredencialModel{
        
        public function getStructureDocument( $product ){
            try {
                // $idEvent = decrypt($event);
                $idProduct = $product;
                $data = [];
                $response = []; 
                $con = conectar();
                $querySelect = "SELECT ds.* FROM document_settings ds
                                INNER JOIN catalogo_productos cp ON cp.idsystemcatpro = ds.id_producto 
                                WHERE ds.id_producto = $idProduct  AND ds.type_document = 'Credencial' AND ds.available = 1 
                                ORDER BY id_document DESC LIMIT 1";      
                
                $exectSelect = $con->query($querySelect);
                if( $exectSelect->num_rows > 0 ){ 
                    $objectDoc = $exectSelect->fetch_assoc();
                    $strucutreJson = json_decode($objectDoc["structure_document"], true);
                    
                    $domain = "";
                    $querySelectDomain = "SELECT * FROM configuracion WHERE configuracion_nombre = 'Dominio'";
                    $exectQueryDomain = $con->query($querySelectDomain);
                    if($exectQueryDomain->num_rows > 0){
                        $result = $exectQueryDomain->fetch_assoc();
                        $domain = $result["configuracion_valor"];
                    }
                    
                    $obj = new stdClass();
                    $obj->statusTagOnly = $strucutreJson["tagOnlyStatus"]; 
                    $obj->structure = $objectDoc["structure_document"];
                    $obj->typeDocument = $objectDoc["type_document"];
                    $obj->orientation = $objectDoc["orientation"];  
                    $obj->domain = $domain;
                    // $obj->logo = $objectDoc["logo"];
                    
                    if( $strucutreJson["previewImage1"] != "noImage" ){
                        $pathLogo = "../../../images/design_credencial/".$strucutreJson["previewImage1"];
                        $contenidoImagen = file_get_contents($pathLogo);  
                        $imagenBase64 = "data:image/png;base64,".base64_encode($contenidoImagen);
                        $obj->logoBase64 = $imagenBase64;
                    }else{
                        $obj->logoBase64 = "noImage";
                    }
                    
                    if( $strucutreJson["previewImage2"] != "noImage" ){
                        $pathLogo = "../../../images/design_credencial/".$strucutreJson["previewImage2"];
                        $contenidoImagen = file_get_contents($pathLogo);  
                        $imagenBase64 = "data:image/png;base64,".base64_encode($contenidoImagen);
                        $obj->logoBase64bgSec2 = $imagenBase64;
                    }else{
                        $obj->logoBase64bgSec2 = "noImage";
                    }
                    
                    array_push( $data, $obj );
                    $response = [
                        "status" => true,
                        "information" => $data
                    ];
                }else{
                    $response = [
                        "status" => true,
                        "message" => "No se encontro un diseño de documento anterior"
                    ];
                }
                echo json_encode( $response );
            } catch (\Throwable $th) {
                echo json_encode( ["status" => false, "message" => $th->getMessage() ] );
            }
        }
        
        public function createPreviewDocument( $course, $structure, $orientation, $fileName = '' ){
            
            try {
                // $idEvent = decrypt($event);
                $idCourse = $course;
                $con = conectar();
                $nameImage = "";
                
                 // Crea una instancia de DOMPDF con las opciones de configuración
                $options = new Options();
                $options->set('isPhpEnabled', true); // Habilita la interpretación de PHP dentro del HTML
                $options->set('defaultFont', 'Arial'); // Establece la fuente predeterminada

                // Configura los márgenes de página a cero
                $options->set('isHtml5ParserEnabled', true);
                $options->set('isRemoteEnabled', true);
                $options->set('chroot', realpath('.')); // Establece la raíz del directorio
                $options->set('defaultPaperSize', 'A4'); // Establece el tamaño de papel predeterminado
                $options->set('defaultPaperOrientation', $orientation); // Establece la orientación de la página predeterminada
                $options->set('isPhpEnabled', true); // Habilita la interpretación de PHP dentro del HTML
                $options->set('isHtml5ParserEnabled', true); // Habilita el parser HTML5
                $options->set('debugKeepTemp', true); // Habilita el modo de depuración
                $dompdf = new Dompdf($options); 
                // Establecer el tamaño del papel como tamaño carta
                $dompdf->setPaper('letter', $orientation);
                //$almacena el html
                $html = $structure; 
                
                // Contar ocurrencias de la palabra 
                $repeticiones = substr_count($html, "qr-code1");
                $styleAux = "";
                if( $repeticiones > 1 ){
                    $styleAux = '.section1 .bg-center .cont-2-qr{
                                    padding-top: 6.6rem;
                                    width: 100%;
                                    text-align: center; 
                                }';
                }else{
                    $styleAux = '.section1 .bg-center .cont-2-qr{
                                    padding-top: 5rem;
                                    width: 100%;
                                    text-align: center; 
                                }';
                }
                
                // Cargar la estructura HTML del diseño
                $htmlData = '
                
                <!DOCTYPE html>
                
                <html lang="en">
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&family=Staatliches&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
                <style>
                    *{
                        margin: 0 0 0 0.1px;
                        padding: 0;
                    }
                    @page {
                        margin: 0;
                    }
                    
                    .draggable {
                        text-align: center;
                        width: auto;
                        max-width: 200px;
                        min-height: 30px;
                        background-color: $background-color_3;
                        color: $color_2;
                        border-radius: .75em;
                        padding: 4%;
                        touch-action: none;
                        user-select: none;
                    }
                    
                    .content-general-dip {
                        max-height: 720px;
                        position: relative;
                    }
                    
                    .content-general-dip.gen-landscape {
                        height: 500px !important;
                    }
                    
                    .content-general-dip.gen-portrait {
                        height: 650px !important;
                    }
                    
                    .content-diploma {
                        border: solid 1px #000;
                        // background-image: url("/background_belm.png");
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: cover;
                        // transform: scale(0.6);
                        transform-origin: top left;
                        position: absolute;
                    }
                    
                    .content-diploma.orien-landscape {
                        width: 27.8cm;
                        height: 21.5cm;
                    }
                    
                    .content-diploma.orien-portrait {
                        height: 27.8cm;
                        width: 21.5cm;
                    }
                    
                    .section1 {
                        width: 50%;
                        height: 50%;
                        box-sizing: border-box;
                        border: 0.1px solid black;
                        box-sizing: border-box;
                        top: 0;
                        left: 0;
                        position: absolute;
                    }
                    .section2 {
                        width: 50%;
                        height: 50%;
                        box-sizing: border-box;
                        border: 0.1px solid black;
                        box-sizing: border-box;
                        top: 0;
                        right: 0;
                        position: absolute;
                    }
                    .section3 {
                        width: 50%;
                        height: 50%;
                        box-sizing: border-box;
                        border: 0.1px solid black;
                        box-sizing: border-box;
                        bottom: 0;
                        left: 0;
                        position: absolute;
                    }
                    .section4 {
                        width: 50%;
                        height: 50%;
                        box-sizing: border-box;
                        border: 0.1px solid black;
                        box-sizing: border-box;
                        bottom: 0;
                        right: 0;
                        position: absolute;
                    }
                    .sp-float{
                        position: absolute;
                        color: #217e6d;
                        font-weight: bold;
                    }
                    
                    .section1 .bg-top{
                        width: 100%;
                        height: 42%;
                        background: #000;
                        position: relative;
                    }
                    .section1 .bg-top .cont-logo{
                        width: 100%;
                        height: 100%;
                        position: relative;
                    }
                    .section1 .bg-top .cont-logo img{
                        // width: 150px;
                        width: 120px;
                        position: absolute;
                        // top: 50%;
                        top: 38%;
                        left: 50%;
                        transform: translate(-50%, -50%); 
                    }
                    
                    .section1 .bg-top .cont-logo .data-user{
                        top: 215px;
                        left: 50%;
                        transform: translate(-50%, -50%); 
                        width: 80%;
                        border: solid 1px #6e6e6e;
                        border-radius: 15px;
                        text-align: center;
                        min-height: 130px;
                        background-color: #fff;
                        position: absolute;
                        padding: 8px 2px;
                        font-family: Ubuntu;
                    }
                    
                    .section1 .bg-top .cont-logo .data-user .title{
                        font-weight: bold;
                        font-size: 18px;
                    }
                    .section1 .bg-top .cont-logo .data-user .text-normal{ 
                        font-size: 15px;
                    }
                    
                    .section1 .bg-center{
                        position: relative;
                        height: 40%; 
                    }
                    
                    '.$styleAux.'
                    
                    .section1 .bg-center .cont-2-qr .qr-code1, .qr-code2{
                        display: inline-block;
                        width: 110px; /* Ancho de tus divs */
                        height: 110px; /* Alto de tus divs */
                        background-color: #fff; /* Color de fondo para visualizar los divs */
                        margin: 0 10px; /* Espacio horizontal entre los divs */
                        padding: auto;
                        border: solid 1px #6e6e6e;
                        border-radius: 5px; 
                    }
                    
                    .section1 .bg-center .cont-2-qr .qr-code1 span{
                        font-family: Staatliches!important;
                        color: #29e;
                    }
                    
                    .section1 .bg-center .cont-2-qr .qr-code1 img, .qr-code2 img{
                        width: 80px;
                    }
                    
                    .section1 .bg-footer{
                        text-align: center;
                        width: 100%;
                        height: 65px;
                        font-family: Ubuntu;
                        line-height: normal!important;
                        font-size : 11px
                    }
                    
                    .section1 .bg-footer .text-bold{
                        font-weight: bold;
                    }
                    .section2 .bg-all{
                        width: 100%;
                        height: 100%;
                    }
                    .section2 .bg-all #imgBgSelectedSec2{
                        width: 100%;
                        height: 100%;
                    }


                
                </style>
                <body>
                    '.$html.'
                </body>
                </html>
                ';

                

                $dompdf->loadHtml($htmlData);

                // Renderizar la estructura HTML
                $dompdf->render();

                $pdfOutput = $dompdf->output();

                $pathSave = '';
                $nameDocument = '';
                if( $fileName == '' ){
                    //Ruta de alamcenado de mockups de la credencial
                    $pathSave = "../../../files/mockups/credencial/";
                    $nameDocument = "Credencial_mockup_$idCourse.pdf";
                }
                else {
                    // ? Si se ha generado la credencial desde el checkin, se alamcena en la carpeta de credenciales para su descarga
                    //Ruta de alamcenado de mockups de la credencial
                    $pathSave = "../../../images/clients/credentials/";
                    $nameDocument = $fileName;
                }
                $doctoSave = file_put_contents($pathSave.$nameDocument, $pdfOutput);

                if( !file_exists($pathSave) ) { mkdir($pathSave, 0777, true); }

                // $doctoSave = file_put_contents($pathSave.$nameDocument, $pdfOutput);
                // if( $fileName !== '') file_put_contents("../../../images/clients/credentials/$nameDocument", $pdfOutput);
                if($doctoSave){
                    $respose = [
                        "status" => true,
                        "message" => '',
                        "nameDocto" => $nameDocument   
                    ]; 
                }else{
                    $respose = [
                        "status" => false,
                        "message" => "Error al almacenar el documento"    
                    ]; 
                }
                echo json_encode($respose);
        
            } catch (\Throwable $th) {
                echo json_encode( ["status" => false, "message" => $th->getMessage() ] );
            }
        }
        
        
        public function saveLogoCredencial( $course, $previewImage1 ){
            try {
                // $idEvent = decrypt($event);
                $idCourse = $course;
                $response = [];
                $con = conectar();
                
                $Base64Img = $previewImage1;
                list(, $Base64Img) = explode(';', $Base64Img);
                list(, $Base64Img) = explode(',', $Base64Img); 
                $Base64Img = base64_decode($Base64Img); 
                $nameLogoCredencial = "imageLogoCredEvent_".$idCourse.".png"; 
                $filepath = "../../../images/design_credencial/$nameLogoCredencial";
                
                if( file_put_contents( $filepath, $Base64Img ) ){
                    $querySelect = "SELECT id_document, id_producto, type_document FROM document_settings 
                    WHERE id_producto = $idCourse and type_document = 'Credencial' AND available = 1 ORDER BY id_document DESC LIMIT 1";
                    $exectSelect = $con->query($querySelect);
                    if($exectSelect->num_rows > 0){
                        $response = [
                                "status" => true,
                                "message" => "La imagen ya fue almacenada previamente",
                                "nameImage" => $nameLogoCredencial
                            ];
                    
                    }else{
                        $objImages = new stdClass();
                        $objImages->logoPrincipal = $nameLogoCredencial;
                        $objImages->logoPartners = ""; 
                        $jsonImages = json_encode($objImages);
                        $queryInsert = "INSERT INTO document_settings VALUES (null, $idEvent, 'Credencial', 'portrait', '$jsonImages', '-', 0, 1)";
                        $exectInsert = $con->query( $queryInsert );
                        if( $con->affected_rows > 0 ){
                            $response = [
                                "status" => true,
                                "message" => "Orientacion e imagen almacenadas correctamente",
                                "nameImage" => $nameLogoCredencial
                            ];
                        }else{
                            $response = [
                                "status" => false,
                                "message" => "Lo sentimos ha ocurrido un error"
                            ];
                        }
                    }
                }else{
                    $response = [
                        "status" => false,
                        "message" => "Lo sentimos ha ocurrido un error al intentar guardar el logo principal"
                    ];
                }



                    // $nameImage = $imagen["name"]; 
                    // $extension = pathinfo($nameImage, PATHINFO_EXTENSION);
                    // $newNameImage = "Background_Certificado_".$idEvent.".".$extension; 
                    // $pahtSaveImage = "../../../images/design_diploma/".$newNameImage; 
                    // if (move_uploaded_file($imagen['tmp_name'], $pahtSaveImage)) { 
                       
                    //     $querySelect = "SELECT id_document, id_event, type_document FROM document_settings WHERE id_event = $idEvent and type_document = 'Certificado' AND available = 1 ORDER BY id_document DESC LIMIT 1";
                    //     $exectSelect = $con->query($querySelect);
                    //     if( $exectSelect->num_rows > 0 ){
                    //         $objectDoc = $exectSelect->fetch_assoc();
                            
                    //         $idDocument = $objectDoc["id_document"]; 
                    //         $queryUpdate = "UPDATE document_settings SET orientation = '$orientation', image_background = '$newNameImage' WHERE id_document = $idDocument"; 
                    //         $exectUpdate = $con->query( $queryUpdate );
                    //         if( $exectUpdate === TRUE ){
                    //             if( $con->affected_rows > 0 ){
                    //                 $response = [
                    //                     "status" => true,
                    //                     "message" => "La información ha sido actualizada",
                    //                     "nameImage" => $newNameImage
                    //                 ];
                    //             }else{
                    //                 $response = [
                    //                     "status" => true,
                    //                     "message" => "La información ya se encuentra actualizada",
                    //                     "nameImage" => $newNameImage
                    //                 ];
                    //             }
                    //         }else{
                    //             $response = [
                    //                 "status" => false,
                    //                 "message" => "Lo sentimos ha ocurrido un error al acutalizar la información"
                    //             ];
                    //         }
                            
                    //     }else{  
                    //         $queryInsert = "INSERT INTO document_settings VALUES (null, $idEvent, 'Certificado', '$orientation', '$newNameImage', '-', 0, 1)";
                    //         $exectInsert = $con->query( $queryInsert );
                    //         if( $con->affected_rows > 0 ){
                    //             $response = [
                    //                 "status" => true,
                    //                 "message" => "Orientacion e imagen almacenadas correctamente",
                    //                 "nameImage" => $newNameImage
                    //             ];
                    //         }else{
                    //             $response = [
                    //                 "status" => false,
                    //                 "message" => "Lo sentimos ha ocurrido un error"
                    //             ];
                    //         }
                              
                    //     }
                    // }else{
                    //     $response = [
                    //         "status" => false,
                    //         "message" => "Lo sentimos ha ocurrido un error al intentar almacenar la imagen, favor de intentarlo mas tarde"
                    //     ];
                    // } 
                
                
                    
                echo json_encode( $response );
            } catch (\Throwable $th) {
                echo json_encode( ["status" => false, "message" => $th->getMessage() ] );
            }
        }

        public function saveStructureDesignDocument( $course, $orientation, $controlSec ){
            try {
                // $idEvent = decrypt($event);
                $idCourse = $course;
                $response = [];
                $con = conectar(); 
                $querySelect = "SELECT id_document, id_producto, type_document FROM document_settings 
                                WHERE id_producto = $idCourse AND type_document = 'Credencial' AND available = 1 
                                ORDER BY id_document DESC LIMIT 1";
                $exectSelect = $con->query($querySelect);
                
                $objControls = json_decode($controlSec, true);
                $Base64Img = $objControls["previewImage1"];
                list(, $Base64Img) = explode(';', $Base64Img);
                list(, $Base64Img) = explode(',', $Base64Img); 
                $Base64Img = base64_decode($Base64Img); 
                $nameLogoCredencial = "imageLogoCredEvent_".$idCourse.".png"; 
                $filepath = "../../../images/design_credencial/".$nameLogoCredencial;
                if( file_put_contents( $filepath, $Base64Img ) ){
                    $objControls["previewImage1"] = $nameLogoCredencial;
                }else{
                    $objControls["previewImage1"] = "noImage";
                }
                
                $Base64Img = $objControls["previewImage2"];
                list(, $Base64Img) = explode(';', $Base64Img);
                list(, $Base64Img) = explode(',', $Base64Img); 
                $Base64Img = base64_decode($Base64Img); 
                $nameLogoCredencial = "imagebgSec2CredEvent_".$idCourse.".png"; 
                $filepath = "../../../images/design_credencial/".$nameLogoCredencial;
                if( file_put_contents( $filepath, $Base64Img ) ){
                    $objControls["previewImage2"] = $nameLogoCredencial;
                }else{
                    $objControls["previewImage2"] = "noImage";
                }
                
                // if( $objControls["tagOnlyStatus"] == true ){
                //     $queryUpdate = "UPDATE events SET credential_version = 1 WHERE id_event =  $idEvent ";
                // }else{
                //     $queryUpdate = "UPDATE events SET credential_version = 0 WHERE id_event =  $idEvent ";
                // }
                // $exectUpdate = $con->query( $queryUpdate );
                // if( $exectUpdate === TRUE ){
                //     if( $con->affected_rows > 0 ){
                //         $response = [
                //             "status" => true,
                //             "message" => "Formato de impresión almacenado" 
                //         ];
                //     }else{ 
                //         $response = [
                //             "status" => true,
                //             "message" => "Formato de impresión almacenado" 
                //         ];
                //     }
                // }else{
                //     $response = [
                //         "status" => false,
                //         "message" => "No fue posible almacenar el formato de impresión" 
                //     ];
                //     echo json_encode( $response );
                // }
                
                
                $objControls = json_encode($objControls);
                if( $exectSelect->num_rows > 0 ){
                    $objectDoc = $exectSelect->fetch_assoc();
                    $idDocument = $objectDoc["id_document"];
                    
                    
                    
                    $queryUpdate = "UPDATE document_settings SET structure_document = '$objControls' WHERE id_document = $idDocument"; 
                    $exectUpdate = $con->query( $queryUpdate );
                    if( $exectUpdate === TRUE ){
                        if( $con->affected_rows > 0 ){
                            $response = [
                                "status" => true,
                                "message" => "El diseño fue almacenado con exito" 
                            ];
                        }else{
                            $response = [
                                "status" => true,
                                "message" => "El diseño fue ya ha sido almacenado" 
                            ];
                        }
                    }else{
                        $response = [
                            "status" => false,
                            "message" => "El diseño no pudo ser almacenado, favor de intentarlo mas tarde" 
                        ];
                    } 
                }else{
                    $queryInsert = "INSERT INTO document_settings (id_producto, type_document, orientation, image_background, structure_document, id_font, available) 
                                                            VALUES ($idCourse, 'Credencial', '$orientation', 'noBackground', '$objControls', 1, 1)";
                                                            // echo $queryInsert;
                    $exectInsert = $con->query($queryInsert);
                    if( $con->affected_rows > 0 ){
                        
                        
                        
                        
                        $response = [
                            "status" => true,
                            "message" => "El diseño fue almacenado con exito" 
                        ];
                    }else{
                        $response = [
                            "status" => false,
                            "message" => "Lo sentimos no hay un diseño previmente configurado" 
                        ];
                    }
                    
                }
                echo json_encode( $response );
            } catch (\Throwable $th) {
                echo json_encode( ["status" => false, "message" => $th->getMessage() ] );
            }
        }
        
        public function deleteDesignDocument( $course ){
            try {
                // $idEvent = decrypt($event);
                $idCourse = $course;
                $response = [];
                $con = conectar();
                $querySelect = "SELECT id_document FROM document_settings WHERE id_producto = $idCourse AND type_document = 'Credencial' AND available = 1 ORDER BY id_document DESC LIMIT 1";
                
                $exectSelect = $con->query($querySelect);
                if( $exectSelect->num_rows > 0 ){
                    $objectDoc = $exectSelect->fetch_assoc();
                    $idDocument = $objectDoc["id_document"]; 
                        $queryUpdate = "UPDATE document_settings SET available = 0 WHERE id_document = $idDocument"; 
                        $exectUpdate = $con->query( $queryUpdate );
                        if( $exectUpdate === TRUE ){
                            if( $con->affected_rows > 0 ){
                                $response = [
                                    "status" => true,
                                    "message" => "El diseño fue eliminado con exito" 
                                ];
                            }else{
                                $response = [
                                    "status" => true,
                                    "message" => "El diseño fue ya ha sido eliminado" 
                                ];
                            }
                        }else{
                            $response = [
                                "status" => false,
                                "message" => "El diseño no pudo ser eliminado, favor de intentarlo mas tarde" 
                            ];
                        } 
                }else{
                    $response = [
                        "status" => false,
                        "message" => "Lo sentimos no hay un diseño previmente configurado" 
                    ];
                }
                echo json_encode( $response );
            } catch (\Throwable $th) {
                echo json_encode( ["status" => false, "message" => $th->getMessage() ] );
            }
        }
        
        public function getDataOwner($course, $bandReturn = false){
            try {
                $data = [];
                $response = [];
                $con = conectar(); 
                $idCourse = $course;
                $domain = ""; 
                $numberPhone = "";
                $email = "";
                $querySelectDomain = "SELECT * FROM configuracion WHERE configuracion_nombre = 'Dominio'";
                $exectQueryDomain = $con->query($querySelectDomain);
                if( $exectQueryDomain->num_rows > 0 ){
                    $result = $exectQueryDomain->fetch_assoc();
                    $domain = $result["configuracion_valor"];
                }
                $querySelectCompany = "SELECT telefono_empresa, email_empresa FROM empresa WHERE idsystemEmpresa = 1";
                $exectQueryCompany = $con->query($querySelectCompany);
                if($exectQueryCompany->num_rows > 0){
                    $result = $exectQueryCompany->fetch_assoc();
                    $numberPhone = $result["telefono_empresa"];
                    $email = $result["email_empresa"];
                }
                
                if( $domain != "" && $email != "" && $numberPhone != "" ){
                    
                    $obj = new stdClass();
                    $obj->email = $email;
                    $obj->phone = $numberPhone;
                    $obj->domain = $domain; 
                    $obj->logo = ""; 
                    array_push($data, $obj);
                    
                    $response = [
                        "status" => true,
                        "data" => $data
                    ];
                }else{
                    $response = [
                        "status" => false,
                        "data" => "Lo sentimos no fue posible obtener la información de la empresa"
                    ];
                }
                
                
                
                if( $bandReturn ){
                    return $response;
                }else{
                    echo json_encode( $response );
                } 
            } catch (\Throwable $th) {
                echo json_encode( ["status" => false, "message" => $th->getMessage() ] );
            }
        }
    
        
    }

    

    if($_POST){
        $model = new designCredencialModel();
        if( $_POST["method"]  == "saveLogoCredencial" ){
            $model->saveLogoCredencial( $_POST["idCourse"], $_POST["previewImage1"] ); 
        }
        if( $_POST["method"]  == "previewDesignDocument" ){
            $fileName = isset($_POST["filename"]) ?$_POST["filename"] : '';
            $model->createPreviewDocument( $_POST["idCourse"], $_POST["structure"], $_POST["orientation"], $fileName );
        }
        if( $_POST["method"] == "getDocumentIfExist" ){
            $model->getStructureDocument( $_POST["idCourse"] );
        }
        if( $_POST["method"] == "saveDesignDocument" ){
            $model->saveStructureDesignDocument( $_POST["idCourse"], $_POST["orientation"], $_POST["controlsSect"]);
        }
        if( $_POST["method"] == "deleteDesign" ){
            $model->deleteDesignDocument( $_POST["idCourse"]);
        }
        if( $_POST["method"] == "getOwner" ){
            $model->getDataOwner($_POST["idCourse"]);
        }
    }

?>