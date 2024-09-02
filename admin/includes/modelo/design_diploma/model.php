<?php
// require_once 'dompdf/autoload.inc.php';
// use Dompdf\Dompdf;
// use Dompdf\Options;
require_once($_SERVER['DOCUMENT_ROOT'] . "/admin/php/conexion.php");


require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;


class Model
{

    public function getStructureDocument($idCourse)
    {
        try {

            $data = [];
            $response = [];
            $con = conectar();
            $querySelect = "SELECT ds.*, ffg.name_font FROM document_settings ds
                                INNER JOIN fonts_for_desgin ffg ON ffg.id_font = ds.id_font
                                WHERE id_producto = $idCourse AND type_document = 'Certificado' AND ds.available = 1 ORDER BY id_document DESC LIMIT 1";
            // echo $querySelect;
            $exectSelect = $con->query($querySelect);
            if ($exectSelect->num_rows > 0) {

                $objectDoc = $exectSelect->fetch_assoc();

                $obj = new stdClass();
                $obj->typeDocument = $objectDoc["type_document"];
                $obj->orientation = $objectDoc["orientation"];
                $obj->imageBackground = $objectDoc["image_background"];
                $obj->structure = $objectDoc["structure_document"];
                $obj->fontFamily = $objectDoc["id_font"] . "|" . $objectDoc["name_font"];
                array_push($data, $obj);
                $response = [
                    "status" => true,
                    "information" => $data
                ];
            } else {
                $response = [
                    "status" => true,
                    "message" => "No se encontro un diseño de documento anterior"
                ];
            }
            echo json_encode($response);
        } catch (\Throwable $th) {
            echo json_encode(["status" => false, "message" => $th->getMessage()]);
        }
    }

    public function createPreviewDocument($idCourse, $structure, $orientation, $fontFamily, $fileName = '')
    {
        try {
            $con = conectar();
            $nameImage = "";
            $querySelect = "SELECT id_document, image_background FROM document_settings WHERE id_producto = $idCourse AND available = 1 and type_document = 'Certificado' ORDER BY id_document DESC LIMIT 1";
            $exectSelect = $con->query($querySelect);
            if ($exectSelect->num_rows > 0) {
                $objectDoc = $exectSelect->fetch_assoc();
                $nameImage = $objectDoc["image_background"];
            } else {
                $respose = [
                    "status" => false,
                    "message" => "No se encontro la imagen asignada al documento"
                ];
            }

            //obtenemos las fuentes almacenadas
            $AllFonts = $this->getFontsForDesign("model");
            $importFonts = "";
            foreach ($AllFonts as $font) {
                $importFonts .= $font->linkFontHtml;
            }


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
            $image = $structure;
            // Texto que deseas reemplazar
            $textoAntiguo = 'Nombre completo del participante';
            // Nuevo texto
            $textoNuevo = 'Cesar Osgual Velazquez Alvarez';

            // Reemplazar el texto antiguo por el nuevo texto en la estructura HTML
            // $html = str_replace($textoAntiguo, $textoNuevo, $image);
            $html = $structure;


            // background-image: url("https://boletera.spivet.com.mx/admin/images/design_diploma/' . $nameImage . '")!important;
            // background-image: url("https://boletera.spivet.com.mx/admin/images/design_diploma/' . $nameImage . '")!important;

            // Cargar la estructura HTML del diseño
            $htmlData = '
                <!DOCTYPE html>
                <html lang="en">
                ' . $importFonts . '
                    <style>
                    
                    @page {
                        margin: 0;
                    }
                    .draggable {
                        text-align: center;
                        width: auto;
                        max-width: 200px;
                        min-height: 30px; 
                        background-color: green;
                        color: white;
                        border-radius: 0.75em;
                        padding: 4%;
                        touch-action: none;
                        user-select: none;
                    }
                    .content-diploma.orien-landscape{ 
                        margin-left:1.5px;
                        width: 27.8cm; 
                        height: 21.5cm; 
                        
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: cover;
                    } 
                    .content-diploma.orien-portrait{
                        margin-left:1.5px;
                        height: 27.8cm!important; 
                        width: 21.5cm!important; 
                        
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: cover;
                    }
                    .content-diploma .element-tag{
                        padding: 0px; 
                        height: 30px;
                        // border: 1px dotted black;
                        font-size: 20px;
                        text-align: center;
                    }
                    .content-diploma .tag-name{
                        width: 500px;
                        font-family: "' . $fontFamily . '";
                    }
                    .content-diploma .tag-date{
                        width: 100px; 
                    }
                    .content-diploma .tag-credit{ 
                        width: 500px; 
                        /**border: 1px dotted black;**/
                    }
                    .content-diploma .tag-credit input{
                        text-align: center;
                        padding: 0!important;
                        width: 495px;
                        height: 30px;
                        border: none;
                        background: transparent;
                        font-family: "' . $fontFamily . '";
                    }
                    
                    </style>
                <body>
                    ' . $html . '
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
                //Ruta de alamcenado de mockups de diploma
                $pathSave = "../../../files/mockups/certificado/";
                $nameDocument = "Diploma_" . $idCourse . ".pdf";
            }
            else {
                // ? Si se ha generado la credencial desde el checkin, se alamcena en la carpeta de credenciales para su descarga
                //Ruta para lamacenar el diploma
                $pathSave = "../../../images/clients/diplomas/";
                $nameDocument = $fileName;
            }

            if( !file_exists($pathSave) ) { mkdir($pathSave, 0777, true); }
            $doctoSave = file_put_contents($pathSave . $nameDocument, $pdfOutput);


            /* //Ruta de alamcenado de mockups de diploma
            $pathSave = "../../../files/mockups/certificado/";
            $nameDocument = "Diploma_" . $idCourse . ".pdf";
            $doctoSave = file_put_contents($pathSave . $nameDocument, $pdfOutput); */
            if ($doctoSave) {
                $respose = [
                    "status" => true,
                    "message" => "",
                    "nameDocto" => $nameDocument
                ];
            } else {
                $respose = [
                    "status" => false,
                    "message" => "Error al almacenar el documento",
                    "nameDocto" => ""
                ];
            }
            echo json_encode($respose);
        } catch (\Throwable $th) {
            echo json_encode(["status" => false, "message" => $th->getMessage()]);
        }
    }

    public function saveImageBackgroudOrientation($idCourse, $orientation, $imagen = "")
    {
        try {
            $response = [];
            $con = conectar();

            if ($imagen == "") {
                $querySelect = "SELECT id_document, id_producto, image_background ,type_document FROM document_settings WHERE id_producto = $idCourse AND type_document = 'Certificado' AND available = 1 ORDER BY id_document DESC LIMIT 1";
                $exectSelect = $con->query($querySelect);
                if ($exectSelect->num_rows > 0) {
                    $objectDoc = $exectSelect->fetch_assoc();
                    $nameImage = $objectDoc["image_background"];
                    $idDocument = $objectDoc["id_document"];
                    $queryUpdate = "UPDATE document_settings SET orientation = '$orientation' WHERE id_document = $idDocument";
                    $exectUpdate = $con->query($queryUpdate);
                    if ($exectUpdate === TRUE) {
                        if ($con->affected_rows > 0) {
                            $response = [
                                "status" => true,
                                "message" => "La información ha sido actualizada",
                                "nameImage" => $nameImage
                            ];
                        } else {
                            $response = [
                                "status" => true,
                                "message" => "La información ya se encuentra actualizada",
                                "nameImage" => $nameImage
                            ];
                        }
                    } else {
                        $response = [
                            "status" => false,
                            "message" => "Lo sentimos ha ocurrido un error al acutalizar la información"
                        ];
                    }
                } else {
                    $newNameImage = $nameImage = $imagen["name"] ?? ''; // ? Se incializó el nombre de la imagen [Moroni - 30Ago2024]
                    $queryInsert = "INSERT INTO document_settings VALUES (null, $idCourse, 'Certificado', '$orientation', '$newNameImage', '-', 1)";
                    $exectInsert = $con->query($queryInsert);
                    if ($con->affected_rows > 0) {
                        $response = [
                            "status" => true,
                            "message" => "Orientacion e imagen almacenadas correctamente",
                            "nameImage" => $newNameImage
                        ];
                    } else {
                        $response = [
                            "status" => false,
                            "message" => "Lo sentimos ha ocurrido un error"
                        ];
                    }
                }
            } else {
                $nameImage = $imagen["name"];
                $extension = pathinfo($nameImage, PATHINFO_EXTENSION);
                $newNameImage = "Background_Certificado_" . $idCourse . "." . $extension;
                $pahtSaveImage = "../../../images/design_diploma/" . $newNameImage;
                if (move_uploaded_file($imagen['tmp_name'], $pahtSaveImage)) {

                    $querySelect = "SELECT id_document, id_producto, type_document FROM document_settings WHERE id_producto = $idCourse and type_document = 'Certificado' AND available = 1 ORDER BY id_document DESC LIMIT 1";
                    $exectSelect = $con->query($querySelect);
                    if ($exectSelect->num_rows > 0) {
                        $objectDoc = $exectSelect->fetch_assoc();

                        $idDocument = $objectDoc["id_document"];
                        $queryUpdate = "UPDATE document_settings SET orientation = '$orientation', image_background = '$newNameImage' WHERE id_document = $idDocument";
                        $exectUpdate = $con->query($queryUpdate);
                        if ($exectUpdate === TRUE) {
                            if ($con->affected_rows > 0) {
                                $response = [
                                    "status" => true,
                                    "message" => "La información ha sido actualizada",
                                    "nameImage" => $newNameImage
                                ];
                            } else {
                                $response = [
                                    "status" => true,
                                    "message" => "La información ya se encuentra actualizada",
                                    "nameImage" => $newNameImage
                                ];
                            }
                        } else {
                            $response = [
                                "status" => false,
                                "message" => "Lo sentimos ha ocurrido un error al acutalizar la información"
                            ];
                        }
                    } else {
                        $queryInsert = "INSERT INTO document_settings VALUES (null, $idCourse, 'Certificado', '$orientation', '$newNameImage', '-', 0, 1)";
                        $exectInsert = $con->query($queryInsert);
                        if ($con->affected_rows > 0) {
                            $response = [
                                "status" => true,
                                "message" => "Orientacion e imagen almacenadas correctamente",
                                "nameImage" => $newNameImage
                            ];
                        } else {
                            $response = [
                                "status" => false,
                                "message" => "Lo sentimos ha ocurrido un error"
                            ];
                        }
                    }
                } else {
                    $response = [
                        "status" => false,
                        "message" => "Lo sentimos ha ocurrido un error al intentar almacenar la imagen, favor de intentarlo mas tarde"
                    ];
                }
            }


            echo json_encode($response);
        } catch (\Throwable $th) {
            echo json_encode(["status" => false, "message" => $th->getMessage()]);
        }
    }

    public function saveStructureDesignDocument($idCourse, $structure, $orientation, $fontFamily)
    {
        try {

            $response = [];
            $con = conectar();
            $querySelect = "SELECT id_document, id_producto, type_document FROM document_settings WHERE id_producto = $idCourse AND type_document = 'Certificado' AND available = 1 ORDER BY id_document DESC LIMIT 1";
            $exectSelect = $con->query($querySelect);
            if ($exectSelect->num_rows > 0) {
                $objectDoc = $exectSelect->fetch_assoc();
                $idDocument = $objectDoc["id_document"];
                $idFont = explode("|", $fontFamily)[0];
                $queryUpdate = "UPDATE document_settings SET structure_document = '$structure', id_font = $idFont WHERE id_document = $idDocument";
                $exectUpdate = $con->query($queryUpdate);
                if ($exectUpdate === TRUE) {
                    if ($con->affected_rows > 0) {
                        $response = [
                            "status" => true,
                            "message" => "El diseño fue almacenado con exito"
                        ];
                    } else {
                        $response = [
                            "status" => true,
                            "message" => "El diseño fue ya ha sido almacenado"
                        ];
                    }
                } else {
                    $response = [
                        "status" => false,
                        "message" => "El diseño no pudo ser almacenado, favor de intentarlo mas tarde"
                    ];
                }
            } else {
                $response = [
                    "status" => false,
                    "message" => "Lo sentimos no hay un diseño previmente configurado"
                ];
            }
            echo json_encode($response);
        } catch (\Throwable $th) {
            echo json_encode(["status" => false, "message" => $th->getMessage()]);
        }
    }


    public function deleteDesignDocument($idCourse)
    {
        try {

            $response = [];
            $con = conectar();
            $querySelect = "SELECT id_document FROM document_settings WHERE id_producto = $idCourse AND type_document = 'Certificado' AND available = 1 ORDER BY id_document DESC LIMIT 1";
            $exectSelect = $con->query($querySelect);
            if ($exectSelect->num_rows > 0) {
                $objectDoc = $exectSelect->fetch_assoc();
                $idDocument = $objectDoc["id_document"];
                $queryUpdate = "UPDATE document_settings SET available = 0 WHERE id_document = $idDocument";
                $exectUpdate = $con->query($queryUpdate);
                if ($exectUpdate === TRUE) {
                    if ($con->affected_rows > 0) {
                        $response = [
                            "status" => true,
                            "message" => "El diseño fue eliminado con exito"
                        ];
                    } else {
                        $response = [
                            "status" => true,
                            "message" => "El diseño fue ya ha sido eliminado"
                        ];
                    }
                } else {
                    $response = [
                        "status" => false,
                        "message" => "El diseño no pudo ser eliminado, favor de intentarlo mas tarde"
                    ];
                }
            } else {
                $response = [
                    "status" => false,
                    "message" => "Lo sentimos no hay un diseño previmente configurado"
                ];
            }
            echo json_encode($response);
        } catch (\Throwable $th) {
            echo json_encode(["status" => false, "message" => $th->getMessage()]);
        }
    }


    public function getFontsForDesign($origin = "view")
    {
        try {
            $data = [];
            $response = [];
            $con = conectar();
            $querySelect = "SELECT * FROM fonts_for_desgin WHERE available = 1";
            $exectSelect = $con->query($querySelect);
            if ($exectSelect->num_rows > 0) {
                while ($row = mysqli_fetch_array($exectSelect)) {
                    $obj = new stdClass();
                    $obj->numFont = $row["id_font"];
                    $obj->nameFont = $row["name_font"];
                    $obj->linkFont = $row["link_font"];
                    $obj->linkFontHtml = $row["linkhtml"];
                    array_push($data, $obj);
                }
                $response = [
                    "status" => true,
                    "data" => $data
                ];
            } else {
                $response = [
                    "status" => false,
                    "message" => "Lo sentimos no se encontro ninguna fuente almacenada, favor de comunicarse con el administrador del sistema"
                ];
            }
            if ($origin == "view") {
                echo json_encode($response);
            } else {
                return $data;
            }
        } catch (\Throwable $th) {
            echo json_encode(["status" => false, "message" => $th->getMessage()]);
        }
    }
}



if ($_POST) {
    $model = new Model();
    if ($_POST["method"]  == "saveOrientationBackground") {
        if ($_FILES["imagen"]) {
            $model->saveImageBackgroudOrientation($_POST["idCourse"], $_POST["orientation"], $_FILES["imagen"]);
        } else {
            $model->saveImageBackgroudOrientation($_POST["idCourse"], $_POST["orientation"]);
        }
    }
    if ($_POST["method"]  == "previewDesignDocument") {
        $fileName = isset($_POST["filename"]) ? $_POST["filename"] : '';
        $model->createPreviewDocument($_POST["idCourse"], $_POST["structure"], $_POST["orientation"], $_POST["fontFamily"], $fileName);
    }
    if ($_POST["method"] == "getDocumentIfExist") {
        $model->getStructureDocument($_POST["idCourse"]);
    }
    if ($_POST["method"] == "saveDesignDocument") {
        $model->saveStructureDesignDocument($_POST["idCourse"], $_POST["structure"], $_POST["orientation"], $_POST["fontFamily"]);
    }
    if ($_POST["method"] == "deleteDesign") {
        $model->deleteDesignDocument($_POST["idCourse"]);
    }
    if ($_POST["method"] == "getFontsDesign") {
        $model->getFontsForDesign();
    }
}
