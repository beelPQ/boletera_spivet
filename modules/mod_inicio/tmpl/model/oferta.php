<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/conect.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/common.php");

    class Oferta { 
        static function getCourses(){
            try {
                setlocale(LC_TIME, 'es_CO.UTF-8');
                $data = [];
                $comm = new Common();
                $database = new myDataBase();
                $con = $database->conect_mysqli();
                
                $queryCourses = "SELECT cp.idsystemcatpro, cp.catalogo_productos_nombre, cp.catalogo_productos_fechainicio, 
                cpm.modalidad_nombre, cp.categorias_programasonline_idsystemcatproon, cp.catalogo_productos_file_thumb
                FROM catalogo_productos cp
                INNER JOIN catalogo_producto_modalidad cpm ON cpm.idsystemprodmod = cp.producto_modalidad_idsystemprodmod 
                WHERE cp.catalogo_productos_publicado = 1";
                $exectCourse = $con->query($queryCourses);
                if($exectCourse->num_rows > 0){ 
                    while ($row = mysqli_fetch_array($exectCourse, MYSQLI_ASSOC)) {
                        $obj = new stdClass();  
                        //php 8.1 > 
                        //$fecha = new DateTime($row["catalogo_productos_fechainicio"]);
                        //$fmt = new IntlDateFormatter('es_ES', IntlDateFormatter::LONG, IntlDateFormatter::NONE, null, null, 'd \'de\' MMMM \'de\' y');
                        //$fecha_formateada = $fmt->format($fecha); 
                        //php < 8.1 
                        $fecha_formateada = strftime("%d de %B %G", strtotime($row["catalogo_productos_fechainicio"]));
                        $obj->idProduct = $comm->encrypt($row["idsystemcatpro"]);
                        $obj->date = $fecha_formateada;
                        $obj->modality = $row["modalidad_nombre"];
                        $obj->nameProduct = $row["catalogo_productos_nombre"];
                        $obj->type = $comm->encrypt($row["categorias_programasonline_idsystemcatproon"]);
                        $obj->imageThumb = $row["catalogo_productos_file_thumb"];
                        $obj->prod = $row["idsystemcatpro"];
                        array_push($data, $obj);
                    }
                    echo json_encode([
                        "status" => true,
                        "data" => $data
                    ]);
                }else{
                    echo json_encode([
                        "status" => true,
                        "message" => "No hay datos para mostrar"
                    ]);
                }
            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => false,
                    "message" => $th->getMessage()
                ]);
            } 
        } 

        static function getMenuType(){
            try { 
                $data = [];
                $comm = new Common();
                $database = new myDataBase();
                $con = $database->conect_mysqli();
                $queryType = "SELECT categorias_programasonline_idsystemcatproon, categorias_programas_nombre 
                FROM catalogo_productos cp
                LEft JOIN  catalogo_categorias_programas ct ON ct.idsystemcatproon = cp.categorias_programasonline_idsystemcatproon
                WHERE cp.catalogo_productos_publicado = 1
                GROUP BY categorias_programasonline_idsystemcatproon";
                $exectType = $con->query($queryType);
                if($exectType->num_rows > 0){
                    while ($row = mysqli_fetch_array($exectType, MYSQLI_ASSOC)) {
                        $obj = new stdClass(); 
                        $obj->idType = $comm->encrypt($row["categorias_programasonline_idsystemcatproon"]);
                        $obj->type = $row["categorias_programas_nombre"];
                        array_push($data, $obj);
                    }
                    
                    echo json_encode([
                        "status" => true,
                        "data" => $data
                    ]);
                }else{
                    echo json_encode([
                        "status" => true,
                        "message" => "No hay datos para mostrar"
                    ]);
                }

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => false,
                    "message" => $th->getMessage()
                ]);
            } 
        }
    }

    if(isset( $_POST )){
        $oferta = new Oferta();
        if(isset( $_POST["method"] ) && $_POST["method"] == "getOferta"){
            $oferta::getCourses();
        }
        if(isset( $_POST["method"] ) && $_POST["method"] == "getMenuTypeOferts"){
            $oferta::getMenuType();
        }
    }

?>