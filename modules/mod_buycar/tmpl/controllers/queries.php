<?php

	require_once($_SERVER['DOCUMENT_ROOT']."/templates/spivet_pq_tm/php/conect.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/templates/spivet_pq_tm/php/common.php");

	class Consulta {

		
		public function products($select, $input, $limit) {

			$products = [];
			$data = [];
			$dataAll = [];
			$myDatabase = new myDataBase();
			$mysqli = $myDatabase->conect_mysqli();

			if(is_null($mysqli)==false){
				$query = "";
				if($select == "" && $input == ""){
					$query = " SELECT 
								idsystemcatpro,
								catalogo_productos_sku,
								catalogo_productos_file_thumb,
								catalogo_productos_nombre,
								catalogo_productos_stock,
								catalogo_productos_preciomx,
								catalogo_productos_preciomx_descuento,
								descuentos_idsystemdescuento,
								catalogo_productos_fechainicio,
								catalogo_productos_file_thumb,
								modalidad_nombre,
								catalogo_productos_descripcioncorta,
								catalogo_productos_publicado,
								producto_modalidad_idsystemprodmod 
							FROM catalogo_productos
							INNER JOIN catalogo_producto_modalidad cpm ON cpm.idsystemprodmod = catalogo_productos.producto_modalidad_idsystemprodmod
							ORDER BY catalogo_productos_fechainicio";
					//if($limit != "not_limit" && $limit > 0){
                    //    $query .= " LIMIT $limit";
                    //}

					$resultado = $mysqli->query($query);

					$i=0;
					while ($row = mysqli_fetch_assoc($resultado)) {

						$row['code'] = Common::encrypt($row['idsystemcatpro']);


						if( $row['catalogo_productos_stock']>1 ){
							$row['stock'] = $row['catalogo_productos_stock'].' lugares disponibles';
						}else if($row['catalogo_productos_stock']==1){
							$row['stock'] = $row['catalogo_productos_stock'].' lugar disponible';
						}else{
							$row['stock'] = 'Sin lugares disponibles';
						}


						$dia_inicio = date('d',strtotime($row['catalogo_productos_fechainicio']));
						$mes_inicio = date('m',strtotime($row['catalogo_productos_fechainicio']));
						$anio_inicio = date('Y',strtotime($row['catalogo_productos_fechainicio']));

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
						
						$row['fecha'] = $dia_inicio.' DE '.$mes_inicio.' DE '.$anio_inicio;

						unset($dia_inicio);
						unset($mes_inicio);
						unset($anio_inicio);

						$row['modality'] = $row["modalidad_nombre"];

						
						$row['descripcion'] = strip_tags(substr($row['catalogo_productos_descripcioncorta'], 0, 150));
						$row['currentDate'] = date('Y-m-d');

						$row['pricemxn'] = number_format($row['catalogo_productos_preciomx'],2);
						$row['pricemxn_discount'] = number_format(0,2);

						if($row['catalogo_productos_file_thumb'] === ""){
							$row['imageCard'] = "no_image";
						}else{
							$row['imageCard'] = $row['catalogo_productos_file_thumb'];
						}

						if($row['descuentos_idsystemdescuento']!=0 && is_null($row['descuentos_idsystemdescuento'])==false ){
							
							date_default_timezone_set('America/Mexico_City');
							$currentDate = date("Y-m-d H:i:s");

							$query = " SELECT 
											idsystemdescuento
										FROM catalogo_descuentos
										WHERE descuento_estatus=1 AND descuento_valido_desde<='".$currentDate."' AND descuento_valido_hasta>='".$currentDate."'
										";
							$resultado2 = $mysqli->query($query);

							$row2 = mysqli_fetch_array($resultado2);

							if( isset($row2['idsystemdescuento']) ){
								if(is_null($row2['idsystemdescuento'])==false){

									$row['pricemxn_discount'] = number_format($row['catalogo_productos_preciomx_descuento'],2);
								}

							}

							unset($row2);
							unset($resultado2);

						}

						


						$products[$i] = $row;


						if($limit != "not_limit" && $limit > 0){
	                        if($i<$limit){
	                        	if($row['catalogo_productos_publicado']==1){
	                        		array_push($data, $row);
	                        		$i++;
	                        	}
							}
	                    }else{
	                    	array_push($data, $row);
	                    }


	                    array_push($dataAll, $row);

						

	
					}
 
				} else {
					if($select != ""){ 
						$itemsFilter = explode(',',$select);
						
						for ($x=0; $x < count($itemsFilter) ; $x++) { 
							
							$idCategory = $itemsFilter[$x];
							$query = " SELECT 
								idsystemcatpro,
								catalogo_productos_sku,
								catalogo_productos_file_thumb,
								catalogo_productos_nombre,
								catalogo_productos_stock,
								catalogo_productos_preciomx,
								catalogo_productos_preciomx_descuento,
								descuentos_idsystemdescuento,
								catalogo_productos_file_thumb,
								catalogo_productos_fechainicio,
								modalidad_nombre,
								catalogo_productos_descripcioncorta,
								catalogo_productos_publicado 
							FROM catalogo_productos
							INNER JOIN catalogo_producto_modalidad cpm ON cpm.idsystemprodmod = catalogo_productos.producto_modalidad_idsystemprodmod
							WHERE catalogo_productos_publicado = 1 
							AND categorias_programasonline_idsystemcatproon = $idCategory";
							

							if($input != ""){   
								$query .= " AND catalogo_productos_nombre LIKE '%".$input."%' ";  
							}
							$query .= " ORDER BY catalogo_productos_fechainicio";
							if($limit != "not_limit" && $limit > 0){
                                $query .= " LIMIT $limit";
                            }

							
							
							$resultado = $mysqli->query($query);

							$i=0;
							while ($row = mysqli_fetch_assoc($resultado)) {

								$row['code'] = Common::encrypt($row['idsystemcatpro']);


								if( $row['catalogo_productos_stock']>1 ){
									$row['stock'] = $row['catalogo_productos_stock'].' lugares disponibles';
								}else if($row['catalogo_productos_stock']==1){
									$row['stock'] = $row['catalogo_productos_stock'].' lugar disponible';
								}else{
									$row['stock'] = 'Sin lugares disponibles';
								}


								$dia_inicio = date('d',strtotime($row['catalogo_productos_fechainicio']));
								$mes_inicio = date('m',strtotime($row['catalogo_productos_fechainicio']));
								$anio_inicio = date('Y',strtotime($row['catalogo_productos_fechainicio']));

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
								
								$row['fecha'] = $dia_inicio.' DE '.$mes_inicio.' DE '.$anio_inicio;

								unset($dia_inicio);
								unset($mes_inicio);
								unset($anio_inicio);

								$row['modality'] = $row["modalidad_nombre"];
								$row['currentDate'] = date('Y-m-d');

								$row['descripcion'] = strip_tags(substr($row['catalogo_productos_descripcioncorta'], 0, 150));


								$row['pricemxn'] = number_format($row['catalogo_productos_preciomx'],2);
								$row['pricemxn_discount'] = number_format(0,2);

								if($row['descuentos_idsystemdescuento']!=0 && is_null($row['descuentos_idsystemdescuento'])==false ){

									date_default_timezone_set('America/Mexico_City');
									$currentDate = date("Y-m-d H:i:s");

									$query = " SELECT 
													idsystemdescuento
												FROM catalogo_descuentos
												WHERE descuento_estatus=1 AND descuento_valido_desde<='".$currentDate."' AND descuento_valido_hasta>='".$currentDate."'
												";
									$resultado2 = $mysqli->query($query);

									$row2 = mysqli_fetch_array($resultado2);

									if( isset($row2['idsystemdescuento']) ){
										if(is_null($row2['idsystemdescuento'])==false){

											$row['pricemxn_discount'] = number_format($row['catalogo_productos_preciomx_descuento'],2);
										}

									}

									unset($row2);
									unset($resultado2);

								}


								$products[$i] = $row;
								$i++;
								array_push($data, $row);
							}

						}

					} else {

						$query = " SELECT 
								idsystemcatpro,
								catalogo_productos_sku,
								catalogo_productos_file_thumb,
								catalogo_productos_nombre,
								catalogo_productos_stock,
								catalogo_productos_preciomx,
								catalogo_productos_preciomx_descuento,
								catalogo_productos_file_thumb,
								descuentos_idsystemdescuento,
								catalogo_productos_fechainicio,
								modalidad_nombre,
								catalogo_productos_descripcioncorta,
								catalogo_productos_publicado 
							FROM catalogo_productos
							INNER JOIN catalogo_producto_modalidad cpm ON cpm.idsystemprodmod = catalogo_productos.producto_modalidad_idsystemprodmod
							WHERE catalogo_productos_publicado = 1 ";

							if($input != ""){   
								$query .= " AND catalogo_productos_nombre LIKE '%".$input."%' ";  
							}
							
							$query .= " ORDER BY catalogo_productos_fechainicio";

							if($limit != "not_limit" && $limit > 0){
                                $query .= " LIMIT $limit";
                            }

							
							
							$resultado = $mysqli->query($query);

							$i=0;
							while ($row = mysqli_fetch_assoc($resultado)) {

								$row['code'] = Common::encrypt($row['idsystemcatpro']);


								if( $row['catalogo_productos_stock']>1 ){
									$row['stock'] = $row['catalogo_productos_stock'].' lugares disponibles';
								}else if($row['catalogo_productos_stock']==1){
									$row['stock'] = $row['catalogo_productos_stock'].' lugar disponible';
								}else{
									$row['stock'] = 'Sin lugares disponibles';
								}


								$dia_inicio = date('d',strtotime($row['catalogo_productos_fechainicio']));
								$mes_inicio = date('m',strtotime($row['catalogo_productos_fechainicio']));
								$anio_inicio = date('Y',strtotime($row['catalogo_productos_fechainicio']));

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
								
								$row['fecha'] = $dia_inicio.' DE '.$mes_inicio.' DE '.$anio_inicio;

								unset($dia_inicio);
								unset($mes_inicio);
								unset($anio_inicio);

								$row['modality'] = $row["modalidad_nombre"];
								$row['currentDate'] = date('Y-m-d');
								$row['descripcion'] = strip_tags(substr($row['catalogo_productos_descripcioncorta'], 0, 150));


								$row['pricemxn'] = number_format($row['catalogo_productos_preciomx'],2);
								$row['pricemxn_discount'] = number_format(0,2);

								if($row['descuentos_idsystemdescuento']!=0 && is_null($row['descuentos_idsystemdescuento'])==false ){

									date_default_timezone_set('America/Mexico_City');
									$currentDate = date("Y-m-d H:i:s");

									$query = " SELECT 
													idsystemdescuento
												FROM catalogo_descuentos
												WHERE descuento_estatus=1 AND descuento_valido_desde<='".$currentDate."' AND descuento_valido_hasta>='".$currentDate."'
												";
									$resultado2 = $mysqli->query($query);

									$row2 = mysqli_fetch_array($resultado2);

									if( isset($row2['idsystemdescuento']) ){
										if(is_null($row2['idsystemdescuento'])==false){

											$row['pricemxn_discount'] = number_format($row['catalogo_productos_preciomx_descuento'],2);
										}

									}

									unset($row2);
									unset($resultado2);

								}


								$products[$i] = $row;
								$i++;
								array_push($data, $row);
							}

					}

				}


				
        	
        		//$products = mysqli_fetch_array($resultado);

        		

			    $mysqli -> close();

			}

			/* 
			$response =[
	            'status_code' => 200,
	            'products' => $products
	        ]; */
			//return $products;
			$dataFinal = [];
			$dataFinal = array_unique($data, SORT_REGULAR);
			$dataFinalAll = array_unique($dataAll, SORT_REGULAR);
			/* $dat = [];
			$dat = $dataFinal; */

			echo json_encode(
				["status_code" => 200,
				"products" => $dataFinal,
			    "productsAll" => $dataFinalAll],);
			
	    }

		public function getCategories(){
            try {

                $data = [];
                $myDatabase = new myDataBase();
                $con = $myDatabase->conect_mysqli();
                if( !is_null($con) ){
                    $sentence = "SELECT idsystemcatproon, categorias_programas_nombre FROM catalogo_categorias_programas ccp
                    INNER JOIN catalogo_productos cp ON cp.categorias_programasonline_idsystemcatproon = ccp.idsystemcatproon 
                    WHERE cp.catalogo_productos_publicado = 1 GROUP BY idsystemcatproon";
                    $exec = $con->query($sentence);

                    while ($row = $exec->fetch_array(MYSQLI_ASSOC)) {

                        $obj = new stdClass;
                        $obj->id =  $row["idsystemcatproon"];
                        $obj->nameCategory = $row["categorias_programas_nombre"];
                        array_push($data, $obj);

                    }

                    echo json_encode([
                        "status" => true,
                        "title" => "datos obtenidos con exito",
                        "data" => $data
                    ]);
                }else{
                    echo json_encode([
                        "status" => false,
                        "title" => "Error de conexion",
                        "message" => "La conexion es nula"
                    ]);
                }

            } catch (\Throwable $th) {
                echo json_encode([
                    "status"=> false,
                    "title" => "Error",
                    "message" => "[ERROR_TRY]: ".$th->getMessage()
                ]);
            } 
            
        }

	}

	$consultas = new Consulta;
	if( isset($_POST["method"]) && $_POST["method"] == "getCategories" ){ 
		$consultas->getCategories();
	}else if(isset($_POST["method"]) && $_POST["method"] == "getProducts" ){
		$consultas->products($_POST["select"], $_POST["input"], $_POST["limit"]);
	}
    


?>
	
	