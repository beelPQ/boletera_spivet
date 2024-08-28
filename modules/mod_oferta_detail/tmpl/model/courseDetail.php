<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/conect.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/common.php");

    class courseDetail{

        public function getCourse($code){

            try {
                $data = [];
                $myDatabase = new myDataBase();
                $generalf = new Common();
			    $mysql = $myDatabase->conect_mysqli();
                //$idCouse = $generalf::decrypt($code);
                $idCouse = $code;

                $queryCourse = "SELECT 
                idsystemcatpro,
                catalogo_productos_sku,
                catalogo_productos_file_thumb,
                catalogo_productos_nombre,
                catalogo_productos_stock,
                catalogo_productos_preciomx,
                catalogo_productos_preciomx_descuento,
                catalogo_productos_incluye,
                descuentos_idsystemdescuento,
                catalogo_productos_fechainicio,
                modalidad_nombre,
                catalogo_productos_descripcioncorta, 
                catalogo_productos_thumbfacilitador,
                catalogo_productos_descripcionlarga,
                catalogo_productos_namefacilitador,
                catalogo_productos_thumb_encabezado,
                catalogo_productos_duracion,
                catalogo_productos_file_promocion,
                contacto
                FROM catalogo_productos
                INNER JOIN catalogo_producto_modalidad cpm ON cpm.idsystemprodmod = catalogo_productos.producto_modalidad_idsystemprodmod
                WHERE catalogo_productos_publicado = 1 and  idsystemcatpro = $idCouse
                ORDER BY catalogo_productos_fechainicio";
                $execCourses = $mysql->query($queryCourse);

                if($execCourses){
                    $course = mysqli_fetch_assoc($execCourses);

                    $dia_inicio = date('d',strtotime($course['catalogo_productos_fechainicio']));
                    $mes_inicio = date('m',strtotime($course['catalogo_productos_fechainicio']));
                    $anio_inicio = date('Y',strtotime($course['catalogo_productos_fechainicio']));

                    if($mes_inicio=='01'){ $mes_inicio = 'ENERO'; }
                    else if($mes_inicio=='02'){ $mes_inicio = 'FEBRERO'; }
                    else if($mes_inicio=='03'){ $mes_inicio = 'MARZO'; }
                    else if($mes_inicio=='04'){ $mes_inicio = 'ABRIL'; }
                    else if($mes_inicio=='05'){ $mes_inicio = 'MAYO'; }
                    else if($mes_inicio=='06'){ $mes_inicio = 'JUNIO'; }
                    else if($mes_inicio=='07'){ $mes_inicio = 'JULIO'; }
                    else if($mes_inicio=='08'){ $mes_inicio = 'AGOSTO'; }
                    else if($mes_inicio=='09'){ $mes_inicio = 'SEPTIEMBRE'; }
                    else if($mes_inicio=='10'){ $mes_inicio = 'OCTUBRE'; }
                    else if($mes_inicio=='11'){ $mes_inicio = 'NOVIEMBRE'; }
                    else if($mes_inicio=='12'){ $mes_inicio = 'DICIEMBRE'; }
                    
                    //$row['fecha'] = $dia_inicio.' DE '.$mes_inicio.' DE '.$anio_inicio;

                    /* unset($dia_inicio);
                    unset($mes_inicio);
                    unset($anio_inicio); */
                    $contacto = json_decode($course["contacto"]);


                    $obj = new stdClass();
                    $obj->code = $generalf::encrypt($course["idsystemcatpro"]);
                    $obj->name = $course["catalogo_productos_nombre"];
                    $obj->stock = $course["catalogo_productos_stock"];
                    $obj->fecha = $dia_inicio.' DE '.$mes_inicio.' DE '.$anio_inicio;
                    $obj->modality = $course["modalidad_nombre"];
                    $obj->timeDuration = $course["catalogo_productos_duracion"];
                    $obj->description = $course["catalogo_productos_descripcionlarga"];
                    $obj->preciomxn = number_format($course["catalogo_productos_preciomx"], 2);
                    $obj->objetivo = $course["catalogo_productos_incluye"];
                    $obj->stock = $course["catalogo_productos_stock"];
                    $obj->impartidopor = $course["catalogo_productos_namefacilitador"];
                    $obj->imgBackgroudHead = $course["catalogo_productos_thumb_encabezado"];
                    $obj->imgTeacher = $course["catalogo_productos_thumbfacilitador"];
                    if($contacto->tel === ""){ $obj->tel = "no_data"; }else{ $obj->tel = $contacto->tel; }
                    if($contacto->whats === ""){ $obj->whats = "no_data"; }else{ $obj->whats = $contacto->whats; }
                    if($contacto->email === ""){ $obj->email = "no_data"; }else{ $obj->email = $contacto->email; }
                    if($course["catalogo_productos_file_promocion"] === ""){ $obj->certificado = "no_data"; }
                    else{ $obj->certificado = $course["catalogo_productos_file_promocion"]; }
                    $obj->dateInitCourse = $course['catalogo_productos_fechainicio'];
                    $obj->currentDate = date('Y-m-d');

                    $obj->image = $course["catalogo_productos_thumb_encabezado"];


                    array_push($data, $obj);

                    
                    echo json_encode(["status" => true,
                                    "title" => "datos obtenidos",
                                    "data" => $obj]);
                }else{
                    echo json_encode(["status" => false,
                                    "title" => "Error al obtener los datos del curso",
                                    "message" => "Error : ERRCON_GTCOU"]);
                }

            
            } catch (\Throwable $th) {
                echo json_encode(["status" => false,
                                "title" => "Error al obtener la informacion", 
                                "message" => "Error : ".$th->getMessage()]);
            }  

        }

    }

    /**
     * Accedemos a la funcion que deseamos jecutar
     */
    $course = new courseDetail();

    /**
     * Validamos que la peticion sea post
     * y el methodo al cual se quiere acceder
     */
    if(isset($_POST)){
        if(isset($_POST["method"]) && $_POST["method"] == "getCouseDetail"){
            $course->getCourse($_POST["code"]);    
        }
    }


?>