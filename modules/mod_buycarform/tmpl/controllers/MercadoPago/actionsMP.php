<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/modules/mod_buycarform/tmpl/model/vendor/autoload.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/conect.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/modules/mod_buycarform/tmpl/controllers/queries.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/modules/mod_buycarform/tmpl/templates/helpperTemplateWeb.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/common.php");


class actionsMP
{

	function createMessageResponse($staus, $msg = '', $desc = '', $data = [])
	{
		return [
			"status" => $staus,
			"message" => $msg,
			"descripcion" => $desc,
			"data" => $data,
		];
	}


	/**
	 * *Obtencion de Token secreto de Mercago Pago
	 * Se retorna el token de mercado pago para hacer el cobro
	 * @return string token
	 */
	private function getTokenSecretMercadoPago()
	{
		try {
			$response = [];
			$myDatabase = new myDataBase();
			$con = $myDatabase->conect_mysqli();
			$query = "SELECT token_secret_mp FROM empresa WHERE idsystemempresa = 1";
			$exect = $con->query($query);
			if ($exect->num_rows > 0) {
				$arrayData = mysqli_fetch_assoc($exect);
				$response = $arrayData["token_secret_mp"];
			} else {
				$response = "no_token_registered";
			}
			return $response;
		} catch (\Throwable $th) {
			return $th->getMessage();
		}
	}

	public function createItems($arrayData)
	{
		$items = [];
		$array = json_decode($arrayData);
		foreach ($array as $value) {

			$objItem = new stdClass();
			$objItem->name = $value->name;
			$objItem->quantity = 1;
			$objItem->unit_price = $value->pricemxn;
			array_push($items, $objItem);
		}
		return $items;
	}


	public function getstatus($status)
	{
		$messageStatus = "";
		$arrayStatus = [
			"pending: El usuario no ha concluido el proceso de pago",
			"approved: El pago ha sido aprobado y acreditado",
			"authorized: El pago ha sido autorizado pero aún no capturado",
			"in_process: El pago está en análisis",
			"in_mediation: El usuario inició una disputa",
			"rejected: El pago fue rechazado",
			"cancelled: El pago fue cancelado por una de las partes o expiró",
			"refunded: El pago fue devuelto al usuario"
		];
		foreach ($arrayStatus as  $value) {
			$statusItem = explode(":", $value);
			if ($status == $statusItem[0]) {
				$messageStatus = $statusItem[1];
			}
		}
		return $messageStatus;
	}


	/**
	 * *Creacion de pago con Mercado Pago
	 * Ejecuta el Pago con la pasarela
	 * @return array response
	 */
	public function createPaymentMPSDK($dataProcess)
	{
		try {
			/* $TOKEN_APP = $this->getTokenSecretMercadoPago(); 
				MercadoPago\SDK::setAccessToken($TOKEN_APP);
				
				//Informacion de la compra
				$sendForm = json_encode($dataProcess["formSenData"]);
				$dataSend =  json_decode($sendForm); 
				//$items = [];
				//$items = $this->createItems($dataProcess["listProducts"]);
				$payment = new MercadoPago\Payment(); 
				$payment->transaction_amount = $dataProcess["transaction_amount"];
				$payment->token = $dataProcess['token'];
				$payment->installments = $dataProcess['installments'];
				$payment->payment_method_id = $dataProcess['payment_method_id'];
				$payment->issuer_id = $dataProcess['issuer_id'];
				

				//Object Payer
				$payer = new MercadoPago\Payer(); 
				$payer->email = $dataSend->email;
				$payer->identification = array(
					"type" => "RFC",
					"number" => "XAXX010101".mt_rand(100, 300)
				);
				$payment->payer = $payer;
				$payment->save(); 
				$response = array(
					'status' => $payment->status,
					'statusMessage' => $this->getstatus( $payment->status ),
					'status_detail' => $payment->status_detail,
					'id' => $payment->id
				); */


			$response = array(
				'status' => 'approved',
				'status_detail' => "TRANSACCION FORZADA",
				'id' => "12345" . time()
			);
			return $response;
		} catch (\Throwable $th) {
			return $this->createMessageResponse(false, "Error encontrado.", "ERR[CA]", $th->getMessage());
		}
	}


	/**
	 * *Proceso de pago con pasarela de Mercado Pago
	 * Esta funcion solo es usada en el proceso de compra de mercado pago
	 */
	public function createTransaction($dataProcess)
	{
		try {
			$response = [];
			//revisar resupuesta
			//https://api.mercadopago.com/v1/payments/72442256906
			$userId = $dataProcess["userid"] ?? 0;
			if( $userId != 0 ) {
				$userId = Common::decrypt($userId) ?? 0;
			}
			
			$responsePayment = $this->createPaymentMPSDK($dataProcess);
			if ($responsePayment['status'] == 'approved') {
				$responseClient = [];
				// ? Verificamos primero si es necesario crear o actualizar el usuario cliente [MOroni - 14 / May / 2024]
				if( $userId == 0 ) {
					$responseClient = $this->createClient($dataProcess);
					if ($responseClient["result"] == "success") {
						$userId = $responseClient['id_client'];
					}
				}

				if ( $userId > 0 ) {
					$response_payment = $this->createPayment($userId, $responsePayment['id'], $dataProcess);
					if ($response_payment["result"] == "success") {

						$response_payment_items = $this->createPaymentItems($userId, $response_payment['id_cobro'], $dataProcess);
						if ($response_payment_items['result'] == 'success') {

							$consulta = new Consulta();
							$cobro = $consulta->getPayement($response_payment['id_cobro']);
							//Creamos el html que aparecera como referecia de cobro exitoso
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
						'message' => $responseClient['message']
					];
				}
			} else {
				$response = [
					'status' => 400,
					'id' => $responsePayment["id"],
					'message' => $responsePayment['statusMessage']
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

	// !NOTA
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
	public function createClient($dataProcess, $updateInJommla = '')
	{
		try {
			$dataClient = [];
			$userId = $dataProcess["userid"] ?? 0;
			if( $userId != 0 ) {
				$userId = Common::decrypt($userId) ?? 0;
			}
			// ? Validación para recibir datos del formulario de pago y actualización de perfil [13-May-2024 / Moroni Perez]
			if( isset($dataProcess["formSenData"]) ) $dataClient = $dataProcess["formSenData"];
			else {
				$dataClient['name'] = $dataProcess['name'];
				$dataClient['lastName1'] = $dataProcess['lastname1'];
				$dataClient['lastName2'] = $dataProcess['lastname2'];
				$dataClient['email'] = $dataProcess['email'];
				$dataClient['phoneNumber'] = $dataProcess['phoneNumber'];
				$dataClient['lada'] = $dataProcess['lada'];
				$dataClient['postlaCode'] = $dataProcess['postlaCode'];
				// // $dataClient['town'] = $dataProcess['town'];
				$dataClient['country'] = $dataProcess['country'];
				$dataClient['state'] = $dataProcess['state'];
				$dataClient['photo'] = $dataProcess['avatar'];
			}
			
			$name = $dataClient['name'];
			$lastname1 = $dataClient['lastName1'];
			$lastname2 = $dataClient['lastName2'];
			$email = $dataClient['email'];
			$telwhat = $dataClient['phoneNumber'];
			$telwhat = $dataClient['lada'] . ' ' . $telwhat;
			$cp = $dataClient['postlaCode'];
			//$towns = $dataClient['town'];
			$country = $dataClient['country'];
			$state = $dataClient['state'];

			$acronymName = trim(substr($name,0,2)).trim(substr($lastname1,0,1));
			$acronymName = strtoupper($acronymName).time();
			// $idSolicitud = $dataProcess["issuer_id"];
			$photo = $dataClient['photo'];
			$photoName = '';
			/** Proceso de guardado de foto de perfil */
			if( !str_contains($photo, '/images/clientes/fotos') ) { 
				$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/images/clientes/fotos/";
				$base_to_php = explode(',', $photo);
				$data = base64_decode($base_to_php[1]);
				$photoName = 'fotoperfil_' . $acronymName . '.jpg';
				$carpeta = $target_dir;
				if (!file_exists($carpeta)) {
					mkdir($carpeta, 0777, true);
				}
				$target_file = $carpeta . $photoName;
				if (!file_put_contents($target_file, $data)) {
					//! Agregar mensaje de error al intentar guardar la foto
					//      $response = [
					// 		'result' => 'error',
					// 		'message' => 'No se pudo subir la foto de perfil.',
					// 		'id_client' => ''
					// 	];
					// 	return $response;
				}
			}

			date_default_timezone_set('America/Mexico_City');
			$current_date = date("Y-m-d H:i:s");

			$myDatabase = new myDataBase();
			$mysqli = $myDatabase->conect_mysqli();
			if (is_null($mysqli) == false) {
				if( $userId > 0 ) { // ? ACtualización de usuario
					$includePhotoName = trim($photoName) != '' ?  'clientes_photo = ?, ': '';
					$queryUpdate = "UPDATE catalogo_clientes SET clientes_nombre = ?, clientes_apellido1 = ?, clientes_apellido2 = ?, clientes_email = ?, clientes_telefono = ?, clientes_codigopostal = ?, id_country = ?, id_state = ?, $includePhotoName clientes_idsolicitud=? WHERE idsystemcli = ? ";
					$query = $mysqli->prepare($queryUpdate);
					trim($photoName) != '' ?  $query->bind_param('sssssssssii', $name, $lastname1, $lastname2, $email, $telwhat, $cp, $country, $state, $photoName, $userId, $userId) : $query->bind_param('ssssssssii', $name, $lastname1, $lastname2, $email, $telwhat, $cp, $country, $state, $userId, $userId);
					$query->execute();
					
					
					if($updateInJommla == 'PutJoomla' ) { // ? Actualización de de datos en Joomla
						$id = $dataProcess["tmiduser"] ?? 0;
						$emailJ = $dataProcess["tmemailuser"] ?? '';
						$myDataBaseJoom = new myDataBaseJoom();
						$mysqliJoom = $myDataBaseJoom->conect_mysqli();
						if (is_null($mysqliJoom) == false) {
							$nameJoom = "$name $lastname1 $lastname2";
							// $queryUpdateJoom = "UPDATE bol96_users SET name = ?, email = ? WHERE id = ? ";
							$queryUpdateJoom = "UPDATE bol96_users SET 
								name = IF(name <> ?, ?, name),
								email = IF(email <> ?, ?, email)
							WHERE id = ?";
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
					}else {
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

					return $response;
				}
				else { // * Creación de nuevo usuario
					$query = $mysqli->prepare(" INSERT INTO catalogo_clientes (
														clientes_nombre,
														clientes_apellido1,
														clientes_apellido2,
														clientes_email,
														clientes_telefono,
														clientes_codigopostal,
														id_country,
														id_state,
														clientes_photo,
														clientes_fechacreacion
																		)
													VALUES (?,?,?,?,?,?,?,?,?,?)");
					$query->bind_param('ssssssiiss', $name, $lastname1, $lastname2, $email, $telwhat, $cp, $country, $state, $photoName, $current_date);
					$query->execute();
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
			$response = [
				'result' => 'error',
				'message' => $e->getMessage(),
				'id_client' => ''
			];
		}
		return $response;
	}

	public function create_payment_tickets($id_cobro)
	{

		$consulta = new Consulta();
		$dataCobro = $consulta->getPayement($id_cobro);

		$cobro_items = $consulta->getPaymentItems($id_cobro);

		if (is_null($cobro_items) == false) {

			while ($row = mysqli_fetch_array($cobro_items)) {

				$dataProduct = $consulta->getProduct($row['catalogo_productos_idsystemcatpro']);


				$text_barcode = $dataCobro['cobroscata_idregcobro'] . '_' . $dataProduct['catalogo_productos_sku'];

				Common::barcode('../../../../files/boletos/barcodes/' . $dataCobro['cobroscata_idtransaccion'] . '_' . $dataProduct['catalogo_productos_sku'] . '.png', $text_barcode, '70', 'vertical', 'Code128', false, 2);


				$htmlBoleto = helpperTemplateWeb::getTemplateTicket($row['idsystemcobrocataitem']);

				//la ruta es a partir del sendMail.php, que es desde donde se llama esta funcion
				Common::generatePDF($htmlBoleto, '../../../../files/boletos/pdfs/' . $row['file_boleto']);
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

	public function createPayment($id_client, $idTransaction, $dataProcess)
	{

		try {
			$dataClient = $dataProcess["formSenData"];
			$dataAmounts = $dataProcess["dataAmounts"];
			$consulta = new Consulta();
			$idregcobro = $consulta->nextIDCobro();


			$id_formpay = 4; //MercadoPago


			/* if($id_formpay=='no_selected' || $id_formpay=='0' || $id_formpay==0 ){

					$idtransaccion = $id_client.$idregcobro;
					$id_formpay = 0;

				}else if($id_formpay=='1' || $id_formpay=='2' || $id_formpay=='3' || $id_formpay=='4'){
					$idtransaccion = $_POST['code1'];
					$id_formpay = (int)$id_formpay;
				} */

			$idtransaccion = $idTransaction;

			$idtransaccion_secondary = $idtransaccion . "TDD";

			$moneda = "MXN";

			$cambiomoneda = NULL;

			//Esta funcion se encuentra en otro archivo
			$dataFormpay = $consulta->getFormPay($id_formpay);


			$montobase = $dataAmounts['amountSubtotal'];
			$montotransaccion = $dataAmounts['amountTotal'];
			$iva = 0;
			//$amountIVA = $_POST['amountIVA'];
			$amountIVA = 0;
			if ($amountIVA > 0) {
				$iva = $_POST['iva'];
			}
			$comision_porcentaje = $dataAmounts['comision_porcentaje'];

			if ($moneda == 'MXN') {
				$comision_dinero = $dataFormpay['comision_pesos'];
			} elseif ($moneda == 'USD') {
				$comision_dinero = $dataFormpay['comision_dolares'];
			}

			$comision = $dataAmounts['comision'];



			$descuento = 0;
			$iddescuento = NULL;
			$code_descuento = NULL;
			$notas_descuento = '';

			if ($dataAmounts['iddescuento'] != '') {

				$iddescuento = $dataAmounts['iddescuento'];
				$descuento = (float)$dataAmounts['descuento'];
				$code_descuento = $dataAmounts['code_descuento'];

				$dataDiscount = $consulta->getDiscount($iddescuento);
				$notas_descuento = $dataDiscount['descuento_notas'];

				if ($id_formpay == 0 || $id_formpay == 1 || $id_formpay == 4) {

					$this->decrease_stock_discount($iddescuento);
				}
			}

			if (is_null($notas_descuento) == true) {
				$notas_descuento = '';
			}



			date_default_timezone_set('America/Mexico_City');
			$current_date = date("Y-m-d H:i:s");


			if ($id_formpay == 0 || $id_formpay == 1 || $id_formpay == 4) {
				$status = 1;
			} else {
				$status = 0;
			}

			$idtablausd = NULL;

			//$facturar = $_POST['addInvoice'];
			$facturar = 0;
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

	public function createPaymentItems($id_client, $id_cobro, $dataProcess)
	{

		try {

			$consulta = new Consulta();
			//Esta funcion se encuentra en otro archivo
			$dataCobro = $consulta->getPayement($id_cobro);

			$dataClient = $dataProcess["formSenData"];
			$dataAmounts = $dataProcess["dataAmounts"];
			$dataProducts = $dataProcess["listProducts"];

			//? Obtenemos el nuevo número de participante
			$participantNumber = '';
			$name = trim($dataClient['name']);
			$lastname1 = trim($dataClient['lastName1']);
			$lastname2 = trim($dataClient['lastName2']);
			if($name != '') $name = substr($name,0,1);
			if($lastname1 != '') $lastname1 = substr($lastname1,0,1);
			if($lastname2 != '') $lastname2 = substr($lastname2,0,1);
			$nameInitials = $name.$lastname1.$lastname2;
			$nameInitialsMayus = strtoupper($nameInitials);
			$genParticipantNumber = $this->generateParticipantNumber();
			if($genParticipantNumber[0] == 1) {
				$participantNumber = "P-$nameInitialsMayus".$genParticipantNumber[1];
			}

			$porcentaje_desc_cupon = 0;
			if ($dataCobro['cobroscata_descuento'] > 0) {
				if ($dataCobro['cobroscata_preciobase'] > 0) {
					$porcentaje_desc_cupon = ($dataCobro['cobroscata_descuento'] * 100) / $dataCobro['cobroscata_preciobase'];
				}
			}

			//$products = json_decode($_POST["list_products"]);
			$products = json_decode($dataProducts);
			$errormsg = '';
			for ($i = 0; $i < count($products); $i++) {
				$newParticipantNumber = 0; $msgErrParticipant = "";
				$newParticipant = $this->newParticipant($participantNumber);
				$newParticipant[0]==0 ? $msgErrParticipant = $newParticipant[1] : $newParticipantNumber = $newParticipant[1];

				$id_product = Common::decrypt($products[$i]->code);
				$moneda = $dataAmounts['moneda'];
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
	                                                                modality,
																	id_deliverable
	                                                            )
	                                                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
					$query->bind_param('iiisddddddddddssi', $id_cobro, $id_product, $id_client, $moneda, $preciobase, $preciodescuento, $preciodescuentopaquete, $preciounitario, $subtotal, $descuentoproducto, $descuentocompra, $ivaporcentaje, $ivadinero, $preciofinal, $boleto_pdf, $modality, $newParticipantNumber);
					$query->execute();
					//$query -> fetch();
					if ($query->affected_rows > 0) {
						$this->decrease_stock_lugares($id_product);
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
					'message' => '',
					'description' => $msgErrParticipant
				];
			} else {
				$response = [
					'result' => 'error',
					'message' => 'Hubo un error al relacionar los siguientes productos a tu cobro: ' . $errormsg,
					'description' => $msgErrParticipant
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


	public function decrease_stock_lugares($id_product)
	{
		try {
			$response = [];
			$myDatabase = new myDataBase();
			$con = $myDatabase->conect_mysqli();
			$query = "SELECT catalogo_productos_stock FROM catalogo_productos WHERE idsystemcatpro = $id_product";
			$exect = $con->query($query);
			if ($exect->num_rows > 0) {
				$resultQuery = mysqli_fetch_assoc($exect);
				$stock = $resultQuery["catalogo_productos_stock"];
				if ($stock != 0 && $stock > 0) {
					$newStock = (intval($stock) - 1);
					$queryUpdate = "UPDATE catalogo_productos SET catalogo_productos_stock = $newStock WHERE idsystemcatpro = $id_product";
					$exectUpdate = $con->query($queryUpdate);
					if ($con->affected_rows > 0) {
						$response = [
							'result' => true,
						];
					} else {
						$response = [
							'result' => false,
							'message' => "No fue posible hacer el decremento del stock",
						];
					}
				} else {
					$response = [
						'result' => false,
						'message' => "Lo sentimos no hay stock o lugares disponibles",
					];
				}
			} else {
				$response = [
					'result' => false,
					'message' => "No se encontro el stock disponible del producto",
				];
			}
			return $response;
		} catch (\Throwable $th) {
			$response = [
				'result' => 'error',
				'message' => $e->getMessage(),
				'id_cobro' => ''
			];
		}
	}


	private function generateParticipantNumber()
	{
		try {
			$response = [];
			$myDatabase = new myDataBase();
			$con = $myDatabase->conect_mysqli();
			$query = "SELECT COUNT(`id_deliverable`) AS countV FROM `deliverables`";
			$exect = $con->query($query);
			if ($exect->num_rows > 0) {
				$arrayData = mysqli_fetch_assoc($exect);
				$response = (int)$arrayData["countV"] + 1;
			} else {
				$response = 1;
			}
			return [1,$response];
		} catch (\Throwable $th) {
			return [0,$th->getMessage()];
		}
	}
	private function newParticipant($participantNumber)
	{
		try {
			$myDatabase = new myDataBase();
			$con = $myDatabase->conect_mysqli();

			$query = $con->prepare("INSERT INTO `deliverables`(`participant_number`) VALUES (?)");
			// Verificar si la preparación de la consulta tuvo éxito
			if (!$query) {
				return [0,"Error en la preparación de la consulta: " . $con->error];
			}
			$query->bind_param('s', $participantNumber);
			$query->execute();
			// Verificar si la ejecución de la consulta tuvo éxito
			if ($query->errno) {
				return [0,"Error al ejecutar la consulta: " . $query->error];
			}

			if ($query->affected_rows > 0) {
				$insertId = $query->insert_id;
				$query->close();
				$con->close();
				return [1, $insertId];
			} else {
				$query->close();
				$con->close();
				return [0, "La inserción no afectó ninguna fila."];
			}
		} catch (\Throwable $th) {
			return [0,$th->getMessage()];
		}
	}
}
