<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/conect.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/common.php");


class CurtainMenuController
{
    function prepareMessage($status, $message, $description = "", $data = [])
    {
        return [
            "status" => $status,
            "message" => $message,
            "description" => $description,
            "data" => $data,
        ];
    }

    function getServices()
    {
        try {
            $statusReq = false;
            $categories = [];
            $services = [];
            $genFunctions = new Common();
            $myDatabase = new myDataBase();
            $conn = $myDatabase->conect_mysqli();
            if (!is_null($conn)) {
                //$sentence = "SELECT id_category, category_name FROM categories_services ORDER By category_name ASC ";
                $sentence = "SELECT idsystemcatproon, categorias_programas_nombre FROM catalogo_categorias_programas ORDER By categorias_programas_nombre ASC ";
                $exec = $conn->query($sentence);
                while ($row = $exec->fetch_array(MYSQLI_ASSOC)) {
                    $idCategory = $row['idsystemcatproon'];
                    $categoryName = $row['categorias_programas_nombre'];
                    $categories['category'] = $categoryName;
                    $service = [];
                    $sentenceService = "SELECT cp.idsystemcatpro, cp.catalogo_productos_nombre, cpm.modalidad_nombre FROM catalogo_productos cp
                    INNER JOIN catalogo_producto_modalidad cpm ON cpm.idsystemprodmod = cp.producto_modalidad_idsystemprodmod 
                    WHERE cp.categorias_programasonline_idsystemcatproon = $idCategory AND cp.catalogo_productos_publicado = 1";
                    $execService = $conn->query($sentenceService);
                    while ($rowService = $execService->fetch_array(MYSQLI_ASSOC)) {
                        $obj = new stdClass;
                        $obj->id = $genFunctions->encrypt($rowService["idsystemcatpro"]);
                        $obj->name = $rowService["catalogo_productos_nombre"];
                        $obj->number = $rowService["idsystemcatpro"];
                        $obj->modality = $rowService["modalidad_nombre"];
                        array_push($service, $obj);
                    }
                    $categories['services'] = $service;
                    array_push($services, $categories);
                }
                if( count($categories) > 0 && count($services) > 0 ) {
                    $statusReq = true;
                }
                return $this->prepareMessage($statusReq, "Obteniendo Servicios", '', $services);
            } else {
                return $this->prepareMessage($statusReq, "Error de conexion", "No se pudo establecer conexión con la base de datos");
            }
        } catch (\Throwable $th) {
            return $this->prepareMessage(false, "Error inesperado", "Err. " . $th->getMessage());
        }
    }

    function getCourses()
    {
        try {
            $statusReq = true;
            $courses = [];
            $categories = [];
            $genFunctions = new Common();
            $myDatabase = new myDataBase();
            $conn = $myDatabase->conect_mysqli();
            if (!is_null($conn)) {
                $sentence = "SELECT idsystemcatproon, categorias_programas_nombre FROM catalogo_categorias_programas ORDER By categorias_programas_nombre ASC ";
                $exec = $conn->query($sentence);
                while ($row = $exec->fetch_array(MYSQLI_ASSOC)) {
                    $idCategory = $row["idsystemcatproon"];
                    $nameCategory = $row["categorias_programas_nombre"];
                    $categories['category'] = $nameCategory;
                    $course = [];
                    $sentenceCourses = "SELECT idsystemcatpro, catalogo_productos_nombre FROM catalogo_productos WHERE categorias_programasonline_idsystemcatproon = $idCategory AND catalogo_productos_publicado=1";
                    $execCourse = $conn->query($sentenceCourses);
                    while ($rowCourse = $execCourse->fetch_array(MYSQLI_ASSOC)) {
                        $obj = new stdClass;
                        $obj->id = $genFunctions->encrypt($rowCourse["idsystemcatpro"]);
                        $obj->name = $rowCourse["catalogo_productos_nombre"];
                        array_push($course, $obj);
                    }
                    $categories['courses'] = $course;
                    array_push($courses, $categories);
                }
                if( count($categories) > 0 && count($courses) > 0 ) {
                    $statusReq = true;
                }
                return $this->prepareMessage($statusReq, "Obteniendo Cursos", '', $courses);
            } else {
                return $this->prepareMessage($statusReq, "Error de conexion", "No se pudo establecer conexión con la base de datos");
            }
        } catch (\Throwable $th) {
            return $this->prepareMessage(false, "Error inesperado", "Err. " . $th->getMessage());
        }
    }

    function deliverFunction()
    {
        $reponse = [];

        if (isset($_GET)) {
            if ($_GET['typeProduct'] == 'courses') $reponse = $this->getCourses();
            if ($_GET['typeProduct'] == 'services') $reponse = $this->getServices();
        }
        if (isset($_POST)) {
            // if($_POST['method'] == "getStates"){
            //     $buyCar->getStates();
            // }else if($_POST['method'] == "paymentMethods"){
            //     $buyCar->getOptionsPayment();
            // }else if($_POST['method'] == "getTowns"){
            //     $buyCar->getTowns($_POST['idState']);
            // }
        }
        return json_encode($reponse);
    }
}

$curtainMC = new CurtainMenuController();
echo $curtainMC->deliverFunction();
