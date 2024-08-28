<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/modules/mod_buycarform/tmpl/model/vendor/autoload.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/conect.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/modules/mod_buycarform/tmpl/controllers/queries.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/modules/mod_buycarform/tmpl/templates/helpperTemplateWeb.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/common.php");


class Accion
{


	public function create_payment_tickets($id_cobro)
	{

		$consulta = new Consulta();
		$dataCobro = $consulta->getPayement($id_cobro);

		$cobro_items = $consulta->getPaymentItems($id_cobro);

		if (is_null($cobro_items) == false) {

			while ($row = mysqli_fetch_array($cobro_items)) {

				$dataProduct = $consulta->getProduct($row['catalogo_productos_idsystemcatpro']);


				$text_barcode = $dataCobro['cobroscata_idregcobro'] . '_' . $dataProduct['catalogo_productos_sku'];

				//Common::barcode('../../../../files/boletos/barcodes/'.$dataCobro['cobroscata_idtransaccion'].'_'.$dataProduct['catalogo_productos_sku'].'.png', $text_barcode,'70','vertical','Code128',false,2);


				$htmlBoleto = helpperTemplateWeb::getTemplateTicket($row['idsystemcobrocataitem']);

				//la ruta es a partir del sendMail.php, que es desde donde se llama esta funcion
				//Common::generatePDF($htmlBoleto,'../../../../files/boletos/pdfs/'.$row['file_boleto']);


			}
		}
	}

	public function decrease_stock_discount($id_discount)
	{

		$myDatabase = new myDataBase();
		$mysqli = $myDatabase->conect_mysqli();

		if (is_null($mysqli) == false) {


			$query = " SELECT 
								idsystemdescuento,descuento_existencia
							FROM catalogo_descuentos
							WHERE idsystemdescuento = " . $id_discount . "
							";
			$resultado = $mysqli->query($query);
			$row = mysqli_fetch_array($resultado);

			if (isset($row['idsystemdescuento'])) {
				if (is_null($row['idsystemdescuento']) == false) {

					$new_stock = $row['descuento_existencia'] - 1;

					$query = $mysqli->prepare(" UPDATE catalogo_descuentos SET 
			                                                descuento_existencia=?
			                                        WHERE idsystemdescuento = ? ");
					$query->bind_param('ii', $new_stock, $id_discount);
					$query->execute();
					//$query -> fetch();
					$query->close();
				}
			}


			$mysqli->close();
		}
	}

	function createMessageResponse($staus, $msg = '', $desc = '', $data = [])
	{
		return [
			"status" => $staus,
			"message" => $msg,
			"descripcion" => $desc,
			"data" => $data,
		];
	}

	// ? CCAMBIOS EN LA TABLA
	/** 
	 * Se modificó el campo clientes_password de la tabla catalogo_clientes, a una longitud de 255 caracteres
	 * 
	 * Los siguiente campos de modificarón para no ser requeridos, permitiendo el NULL o vacío:
	 * 
	 * clientes_apellido1 >> Vacío
	 * clientes_apellido2 >> Vacío
	 * clientes_telefono >> NULL
	 * clientes_pais >> Vacío
	 * clientes_codigopostal >> 00000
	 * id_municipio >> NULL
	 * id_country >> 247
	 * id_state >> 2204
	 * clientes_photo >> -
	 * 
	 */
	public function createClient()
	{

		try {
			/*
				$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
				$lastname1 = filter_var($_POST['lastname1'], FILTER_SANITIZE_STRING);
				$lastname2 = filter_var($_POST['lastname2'], FILTER_SANITIZE_STRING);
				$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
				$telwhat = filter_var($_POST['telwhat'], FILTER_SANITIZE_STRING);
				$telwhat = $_POST['tellada'].' '.$telwhat;
				$cp = filter_var($_POST['cp'], FILTER_SANITIZE_STRING);
				$towns = $_POST['towns'];
				*/

			$userId = Common::decrypt($_POST["userid"]) ?? 0; // ? ID de usuario logeado [Moroni // 13-May-2024]
			$name = $_POST['name'];
			$lastname1 = $_POST['lastname1'];
			$lastname2 = $_POST['lastname2'];
			$email = $_POST['email'];
			$telwhat = $_POST['telwhat'];
			$telwhat = $_POST['tellada'] . ' ' . $telwhat;
			$cp = $_POST['cp'];
			//$towns = $_POST['towns'];
			$country = $_POST['country'];
			$state = $_POST['state'];

			date_default_timezone_set('America/Mexico_City');
			$current_date = date("Y-m-d H:i:s");

			$myDatabase = new myDataBase();
			$mysqli = $myDatabase->conect_mysqli();

			if (is_null($mysqli) == false) {
				if ($userId > 0) { // ? ACtualización de usuario [Moroni // 13-May-2024]
					$includePhotoName  = '';
					// $includePhotoName = trim($photoName) != '' ?  'clientes_photo = ?, ' : '';
					$queryUpdate = "UPDATE catalogo_clientes SET clientes_nombre = ?, clientes_apellido1 = ?, clientes_apellido2 = ?, clientes_email = ?, clientes_telefono = ?, clientes_codigopostal = ?, id_country = ?, id_state = ?, $includePhotoName clientes_idsolicitud=? WHERE idsystemcli = ? ";
					$query = $mysqli->prepare($queryUpdate);
					// trim($photoName) != '' ?  $query->bind_param('sssssssssii', $name, $lastname1, $lastname2, $email, $telwhat, $cp, $country, $state, $photoName, $userId, $userId) : 
					$query->bind_param('ssssssssii', $name, $lastname1, $lastname2, $email, $telwhat, $cp, $country, $state, $userId, $userId);
					$query->execute();

					$id = $dataProcess["tmiduser"] ?? 0;
					$emailJ = $dataProcess["tmemailuser"] ?? '';
					if( $id > 0 && trim($emailJ) != '' ) { // ? Actualización de de datos en Joomla
						$myDataBaseJoom = new myDataBaseJoom();
						$mysqliJoom = $myDataBaseJoom->conect_mysqli();
						if (is_null($mysqliJoom) == false) {
							$nameJoom = "$name $lastname1 $lastname2";
							// $queryUpdateJoom = "UPDATE bol96_users SET name = ?, email = ? WHERE id = ? ";
							$queryUpdateJoom = "UPDATE bol96_users SET name = IF(name <> ?, ?, name), email = IF(email <> ?, ?, email) WHERE id = ?";
							$queryJoom = $mysqliJoom->prepare($queryUpdateJoom);
							// $queryJoom->bind_param('ssi', $nameJoom, $email, $id);
							$queryJoom->bind_param('ssssi', $nameJoom, $nameJoom, $email, $email, $id);
							$queryJoom->execute();
							if ($queryJoom->affected_rows > 0) {
								$response = [
									'result' => 'success',
									'message' => "Actualización de datos",
									"description" => "Actalización en Joomla",
									'id_client' => $userId
								];
							} else {
								// No se actualizó ninguna fila
								if ($mysqliJoom->error) {
									// Si hay un error, imprímelo para depurar
									$response = [
										'result' => 'error',
										'message' => "No se pudo actualizar los datos del usuario: ".$mysqliJoom->error,
										"description" => "Actalización en Joomla",
										'id_client' => '',
									];
									$query = $mysqli->prepare("UPDATE catalogo_clientes SET clientes_email = ? WHERE idsystemcli = ? ");
									$query->bind_param('si',$emailJ, $userId);
									$query->execute();
								} else {
									// Si no hay error, significa que la actualización no fue necesaria
									$response = [
										'result' => 'success',
										'message' => "Actualización de datos",
										"description" => "No fue necesario la actualización en Joomla",
										'id_client' => $userId
									];
								}
							}
							// Cierres la consulta
							$queryJoom->close();
							$mysqliJoom->close();
						}
					}
					else {
						// Verificas si la consulta se realizó con éxito
						if ($query->affected_rows > 0) {
							$response = [
								'result' => 'success',
								'message' => "Actualización de datos",
								'id_client' => $userId
							];
						} else {
							$response = [
								'result' => 'error',
								'message' => "No se pudo actualizar los datos del usuario: ".$mysqli->error,
								'id_client' => '',
							];
						}
					}
					// Cierres la consulta
					$query->close();
					$mysqli->close();
					return $response;
				} else {
					$query = $mysqli->prepare(" INSERT INTO catalogo_clientes (
																			clientes_nombre,
																			clientes_apellido1,
																			clientes_apellido2,
																			clientes_email,
																			clientes_telefono,
																			clientes_codigopostal,
																			id_state,
																			id_country,
																			clientes_fechacreacion
																		)
													VALUES (?,?,?,?,?,?,?,?,?)");
					$query->bind_param('ssssssiis', $name, $lastname1, $lastname2, $email, $telwhat, $cp, $state, $country, $current_date);
					$query->execute();
					//$query -> fetch();

					if ($query->affected_rows > 0) {

						$id_client = $query->insert_id;
						$query->close();

						$query = $mysqli->prepare(" UPDATE catalogo_clientes SET 
																clientes_idsolicitud=?
														WHERE idsystemcli = ? ");
						$query->bind_param('ii', $id_client, $id_client);
						$query->execute();
						$query->close();

						$response = [
							'result' => 'success',
							'message' => '',
							'id_client' => $id_client
						];
					} else {
						$query->close();

						$response = [
							'result' => 'error',
							'message' => 'No se pudo crear el cliente',
							'id_client' => ''
						];
					}
				}

				$mysqli->close();
			} else {

				$response = [
					'result' => 'error',
					'message' => 'No se pudo conectar a la base de datos',
					'id_client' => ''
				];
			}
		} catch (Exception $e) {
			//$e->getMessage()
			$response = [
				'result' => 'error',
				'message' => $e->getMessage(),
				'id_client' => ''
			];
		}

		return $response;
	}

	public function createPayment($id_client)
	{

		try {

			$consulta = new Consulta();
			$idregcobro = $consulta->nextIDCobro();


			$id_formpay = $_POST['formpay'];


			if ($id_formpay == 'no_selected' || $id_formpay == '0' || $id_formpay == 0) {

				$idtransaccion = $id_client . $idregcobro;
				$id_formpay = 0;
			} else if ($id_formpay == '5' || $id_formpay == '6') {

				$idtransaccion = $id_client . $idregcobro;
			} else if ($id_formpay == '1' || $id_formpay == '2' || $id_formpay == '3') {
				$idtransaccion = $_POST['code1'];
				$id_formpay = (int)$id_formpay;
			}



			$idtransaccion_secondary = $_POST['code2'];

			$moneda = $_POST['moneda'];

			$cambiomoneda = NULL;


			$dataFormpay = $consulta->getFormPay($id_formpay);


			$montobase = $_POST['subtotal'];
			$montotransaccion = $_POST['amount'];
			$iva = 0;
			$amountIVA = $_POST['amountIVA'];
			if ($amountIVA > 0) {
				$iva = $_POST['iva'];
			}
			$comision_porcentaje = $_POST['comision_porcentaje'];

			if ($moneda == 'MXN') {
				$comision_dinero = $dataFormpay['comision_pesos'];
			} elseif ($moneda == 'USD') {
				$comision_dinero = $dataFormpay['comision_dolares'];
			}

			$comision = $_POST['comision'];



			$descuento = 0;
			$iddescuento = NULL;
			$code_descuento = NULL;
			$notas_descuento = '';

			if ($_POST['iddescuento'] != '') {

				$iddescuento = $_POST['iddescuento'];
				$descuento = (float)$_POST['descuento'];
				$code_descuento = $_POST['code_descuento'];

				$dataDiscount = $consulta->getDiscount($iddescuento);
				$notas_descuento = $dataDiscount['descuento_notas'];

				if ($id_formpay == 0 || $id_formpay == 1) {

					$this->decrease_stock_discount($iddescuento);
				}
			}

			if (is_null($notas_descuento) == true) {
				$notas_descuento = '';
			}



			date_default_timezone_set('America/Mexico_City');
			$current_date = date("Y-m-d H:i:s");


			if ($id_formpay == 0 || $id_formpay == 1) {
				$status = 1;
			} else {
				$status = 0;
			}

			$idtablausd = NULL;

			$facturar = $_POST['addInvoice'];
			$terminos = 1;


			$cobro_pdf = $idtransaccion . '.pdf';



			$myDatabase = new myDataBase();
			$mysqli = $myDatabase->conect_mysqli();

			if (is_null($mysqli) == false) {

				$query = $mysqli->prepare(" INSERT INTO catalogo_cobros (
                                                                       cobroscata_idregcobro,
                                                                       cobroscata_idtransaccion,
                                                                       cobroscata_idtransaccion_secondary,
                                                                       cobroscata_moneda,
                                                                       cobroscata_intercambiomoneda,
                                                                       cobroscata_ivaformapago,
                                                                       cobroscata_preciobase,
                                                                       cobroscata_montotransaccion,
                                                                       iva,
                                                                       iva_amount,
																	   cobroscata_comisionporcentaje,
																	   cobroscata_comisionporcentajeinicial,
																	   cobroscata_comisiondinero,
																	   comision_total,
																	   cobroscata_descuento,
																	   descuentos_idsystemdescuento,
																	   descuento_code,
																	   cobroscata_fechapago,
																	   cobroscata_status,
																	   clientes_idsystemcli,
																	   forma_depago_IDsystemapades,
																	   tablausd_idsystemusd,
																	   facturar,
																	   cobroscata_terminosycondiciones,
																	   cobroscata_pdf,
																	   cobroscata_notas
                                                                    )
                                                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				$query->bind_param('isssdddddddddddissiiiiiiss', $idregcobro, $idtransaccion, $idtransaccion_secondary, $moneda, $cambiomoneda, $dataFormpay['iva'], $montobase, $montotransaccion, $iva, $amountIVA, $comision_porcentaje, $dataFormpay['comision_porcentajeinicial'], $comision_dinero, $comision, $descuento, $iddescuento, $code_descuento, $current_date, $status, $id_client, $id_formpay, $idtablausd, $facturar, $terminos, $cobro_pdf, $notas_descuento);
				$query->execute();
				//$query -> fetch();

				if ($query->affected_rows > 0) {

					$id_cobro = $query->insert_id;
					$query->close();

					$response = [
						'result' => 'success',
						'message' => '',
						'id_cobro' => $id_cobro
					];
				} else {
					$query->close();

					$response = [
						'result' => 'error',
						'message' => 'No se pudo crear el cobro',
						'id_cobro' => ''
					];
				}

				$mysqli->close();
			} else {

				$response = [
					'result' => 'error',
					'message' => 'No se pudo conectar a la base de datos',
					'id_cobro' => ''
				];
			}
		} catch (Exception $e) {

			//$e->getMessage()
			$response = [
				'result' => 'error',
				'message' => $e->getMessage(),
				'id_cobro' => ''
			];
		}

		return $response;
	}



	public function createPaymentItems($id_client, $id_cobro)
	{

		try {

			$consulta = new Consulta();
			$dataCobro = $consulta->getPayement($id_cobro);

			$porcentaje_desc_cupon = 0;
			if ($dataCobro['cobroscata_descuento'] > 0) {

				if ($dataCobro['cobroscata_preciobase'] > 0) {
					$porcentaje_desc_cupon = ($dataCobro['cobroscata_descuento'] * 100) / $dataCobro['cobroscata_preciobase'];
				}
			}


			$products = json_decode($_POST["list_products"]);

			$errormsg = '';
			for ($i = 0; $i < count($products); $i++) {



				$id_product = Common::decrypt($products[$i]->code);

				$moneda = $_POST['moneda'];

				$dataProduct = $consulta->getProduct($id_product);


				if ($moneda == 'MXN') {
					$preciobase = $dataProduct['catalogo_productos_preciomx'];

					$preciodescuento = $preciobase;

					if (is_null($dataProduct['descuentos_idsystemdescuento']) == false) {

						if (($preciobase - $products[$i]->pricemxn) > 0) {
							$preciodescuento = $products[$i]->pricemxn;
						}
					}
				}

				$preciodescuentopaquete = $preciodescuento;
				$preciounitario = $preciodescuentopaquete;
				$subtotal = $preciounitario * 1;

				$descuentoproducto = $preciobase - $preciodescuentopaquete;

				if ($dataCobro['cobroscata_descuento'] > 0) {
					$descuentocompra = $preciodescuentopaquete * ($porcentaje_desc_cupon / 100);
				} else {
					$descuentocompra = 0;
				}



				if ($dataCobro['iva_amount'] > 0) {

					$ivaporcentaje = $dataCobro['iva'];

					$preciodescuentopaquete_desc_cupon = $preciodescuentopaquete - $descuentocompra;
					$ivadinero = $preciodescuentopaquete_desc_cupon * $dataCobro['iva'];
				} else {
					$ivaporcentaje = 0;
					$ivadinero = 0;
				}



				$preciofinal = $preciodescuentopaquete - $descuentocompra + $ivadinero;




				if ($dataCobro['cobroscata_status'] == 1) {
					$boleto_pdf = $dataCobro['cobroscata_idtransaccion'] . '_' . $dataProduct['catalogo_productos_sku'] . '.pdf';
				} else {
					$boleto_pdf = NULL;
				}


				$modality =  $products[$i]->modality;


				$myDatabase = new myDataBase();
				$mysqli = $myDatabase->conect_mysqli();

				if (is_null($mysqli) == false) {


					$query = $mysqli->prepare(" INSERT INTO catalogo_cobros_items (
	                                                                cobroscata_idsystemcobrocat,
	                                                                catalogo_productos_idsystemcatpro,
	                                                                clientes_idsystemcli,
	                                                                cobroscata_items_moneda,
	                                                                cobroscata_items_preciobase,
	                                                                cobroscata_items_preciodescuento,
	                                                                cobroscata_items_preciodescuentopaquete,
	                                                                cobroscata_items_preciounitario,
	                                                                cobroscata_items_subtotal,
	                                                                cobroscata_items_descuentoproducto,
	                                                                cobroscata_items_descuentocompra,
	                                                                cobroscata_items_ivaporcentaje,
	                                                                cobroscata_items_ivadinero,
	                                                                cobroscata_items_preciofinal,
	                                                                file_boleto,
	                                                                modality       
	                                                            )
	                                                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
					$query->bind_param('iiisddddddddddss', $id_cobro, $id_product, $id_client, $moneda, $preciobase, $preciodescuento, $preciodescuentopaquete, $preciounitario, $subtotal, $descuentoproducto, $descuentocompra, $ivaporcentaje, $ivadinero, $preciofinal, $boleto_pdf, $modality);
					$query->execute();
					//$query -> fetch();

					if ($query->affected_rows > 0) {

						$id_cobro_item = $query->insert_id;
						$query->close();
					} else {
						$query->close();

						if ($errormsg != '') {
							$errormsg .= ',';
						}

						$errormsg .= '[I]' . $products[$i]->name;
					}

					$mysqli->close();
				} else {

					if ($errormsg != '') {
						$errormsg .= ',';
					}

					$errormsg .= '[B]' . $products[$i]->name;
				}
			}


			if ($errormsg == '') {

				$response = [
					'result' => 'success',
					'message' => ''
				];
			} else {

				$response = [
					'result' => 'error',
					'message' => 'Hubo un error al relacionar los siguientes productos a tu cobro: ' . $errormsg
				];
			}
		} catch (Exception $e) {

			//$e->getMessage()
			$response = [
				'result' => 'error',
				'message' => $e->getMessage()
			];
		}

		return $response;
	}

	public function saveTransaction()
	{
		try {
			$response_user = [];
			$userId = Common::decrypt($_POST["userid"]) ?? 0;
			if( $userId == 0 ) { // ? Creamos usuario cliente si no se encuentra el ID de usario cliente [Moroni - 14/May/2024]
				$response_user = $this->createClient();
				if ($response_user['result'] == 'success') {
					$userId  = $response_user['id_client'];
				}
			}
			if ($userId > 0) { // ? Continuamos si existe el ID de usuario cliente [Moroni - 14/May/2024]
				$response_payment = $this->createPayment($userId);
				if ($response_payment['result'] == 'success') {
					$response_payment_items = $this->createPaymentItems($userId, $response_payment['id_cobro']);
					if ($response_payment_items['result'] == 'success') {
						$consulta = new Consulta();
						$cobro = $consulta->getPayement($response_payment['id_cobro']);
						$bodyConfirm = helpperTemplateWeb::getConfirm($cobro);
						$response = [
							'status' => 200,
							'message' => $bodyConfirm,
							'code' => $response_payment['id_cobro']
						];
					} else {
						$response = [
							'status' => 400,
							'message' => $response_payment_items['message']
						];
					}
				} else {
					$response = [
						'status' => 400,
						'message' => $response_payment['message']
					];
				}
			} else {
				$response = [
					'status' => 400,
					'message' => $response_user['message']
				];
			}
		} catch (Exception $e) {
			$response = [
				'status' => 400,
				'message' => $e->getMessage()
			];
		}
		return $response;
	}

	public function uploadFiles()
	{

		try {

			$response = [
				'status' => 200,
				'message' => ''
			];

			if ($_POST["inputConsFiscalFile"] == 'adjuntado') {

				$consulta = new Consulta();
				$dataCobro = $consulta->getPayement($_POST["code"]);

				$carpeta = "../../../../files/constancias_fiscales/";
				if (!file_exists($carpeta)) {
					mkdir($carpeta, 0777, true);
				}

				$fileext = pathinfo($_FILES["inputConsFiscal_data"]["name"], PATHINFO_EXTENSION);

				$nombrefile = $dataCobro['cobroscata_idtransaccion'] . '.' . $fileext;
				$target_file = $carpeta . $nombrefile;

				if (move_uploaded_file($_FILES["inputConsFiscal_data"]["tmp_name"], $target_file)) {


					$myDatabase = new myDataBase();
					$mysqli = $myDatabase->conect_mysqli();

					if (is_null($mysqli) == false) {

						$query = $mysqli->prepare(" UPDATE catalogo_cobros SET 
				                                                facturacion_constancia=?
				                                        WHERE idsystemcobrocat = ? ");
						$query->bind_param('si', $nombrefile, $dataCobro['idsystemcobrocat']);
						$query->execute();
						//$query -> fetch();
						$query->close();


						$mysqli->close();
					}
				} else {

					$response = [
						'status' => 400,
						'message' => 'No se pudo subir la constancia fiscal'
					];
				}
			}
		} catch (Exception $e) {

			//$e->getMessage()

			$response = [
				'status' => 400,
				'message' => $e->getMessage()
			];
		}


		return $response;
	}

	public function pay_payment($id_transaccion)
	{

		try {
			$mensaje = 'No se pudo actualizar el cobro ' . $id_transaccion;

			$consulta = new Consulta();
			$cobro = $consulta->getPayementByTrans($id_transaccion);

			if (isset($cobro['idsystemcobrocat'])) {

				if (is_null($cobro['idsystemcobrocat']) == false) {



					//actualizamos el estado del cobro
					date_default_timezone_set('America/Mexico_City');
					$current_date = date("Y-m-d H:i:s");

					$status = 1;

					$myDatabase = new myDataBase();

					$mysqli = $myDatabase->conect_mysqli();

					if (is_null($mysqli) == false) {

						$query = $mysqli->prepare(" UPDATE catalogo_cobros SET 
		                                                        cobroscata_fechapago=?,
		                                                        cobroscata_status=?
		                                                WHERE idsystemcobrocat = ? ");
						$query->bind_param('sii', $current_date, $status, $cobro['idsystemcobrocat']);
						$query->execute();
						$query->close();

						$mysqli->close();
					}


					//si se aplico un cupon, restamos la existencia de ese cupon
					if (is_null($cobro['descuentos_idsystemdescuento']) == false) {

						$this->decrease_stock_discount($cobro['descuentos_idsystemdescuento']);
					}


					//se generan los nombres de los boletos por producto
					$cobro_items = $consulta->getPaymentItems($cobro['idsystemcobrocat']);

					if (is_null($cobro_items) == false) {

						while ($row = mysqli_fetch_array($cobro_items)) {

							$product = $consulta->getProduct($row['catalogo_productos_idsystemcatpro']);

							$boleto_pdf = $cobro['cobroscata_idtransaccion'] . '_' . $product['catalogo_productos_sku'] . '.pdf';


							$mysqli = $myDatabase->conect_mysqli();

							if (is_null($mysqli) == false) {
								$query = $mysqli->prepare(" UPDATE catalogo_cobros_items SET 
				                                                        file_boleto=?
				                                                WHERE idsystemcobrocataitem = ? ");
								$query->bind_param('si', $boleto_pdf, $row['idsystemcobrocataitem']);
								$query->execute();
								$query->close();

								$mysqli->close();
							}
						}
					}


					$dominio = $consulta->getConfig(9);

					$urlRequest = $dominio['configuracion_valor'] . '/templates/unity/common/envioEmail/sendMail.php';
					$parametros = array('modalOrigin' => 'receipt', 'code' => $cobro['idsystemcobrocat']);

					//$respuesta_mail=Common::postRequest($urlRequest,$parametros);

					$mensaje = 'Se actualizó el cobro ' . $id_transaccion;

					//$mensaje = $respuesta_mail;

				}
			}
		} catch (Exception $e) {

			$mensaje = '[E]No se pudo actualizar el cobro ' . $id_transaccion . ' ' . $e->getMessage();
		}

		return $mensaje;
	}
}
