<?php

	require(dirname(__FILE__) . '/Openpay/Openpay.php');
	require_once($_SERVER['DOCUMENT_ROOT']."/modules/mod_buycarform/tmpl/controllers/queries.php");


	class controllerOpenpay{


		public function transaction($type){

			try {

				$consulta = new Consulta();

				$empresa = $consulta->infoCompany();

				$openpay = Openpay::getInstance($empresa['openpay_merchantid'],$empresa['openpay_llaveprivada']);

				$customer = array(
				    'name' => $_POST["name"],
				    'last_name' => $_POST["lastname1"].' '.$_POST["lastname2"],
				    'phone_number' => $_POST["tellada"].$_POST["telwhat"],
				    'email' => $_POST["email"]
				);


				$products = json_decode($_POST["concepto"]);
				$concepto = '';
				for($i=0;$i<count($products);$i++){

					if($concepto!=''){
						$concepto.=',';
					}

					$concepto.=$products[$i]->name;

				}
				$concepto = substr($concepto, 0, 240);


				$consulta = new Consulta();
				$idregcobro = $consulta->nextIDCobro();


				if($type=='tdd'){

					$chargeData = array(
					    'method' => 'card',
					    'source_id' => $_POST["token_id"],
					    'amount' => (float)$_POST["amount"], // formato númerico con hasta dos dígitos decimales, maximo 10000.
					    'currency' => $_POST["moneda"],
					    'description' => $idregcobro.': '.$concepto,
					    //'order_id' => $idregcobro, //opcional, cualquier id pero debe ser unico, longitud hasta 100 caracteres
					    //'use_card_points' => $_POST["use_card_points"], // Opcional, si estamos usando puntos
					    'device_session_id' => $_POST["deviceIdHiddenFieldName"],
					    'customer' => $customer
					);

				}else if($type=='spei'){

					date_default_timezone_set('America/Mexico_City');
					$current_date= date('Y-m-d H:i:s'); 

					$due_date = strtotime ( '+36 hour' , strtotime ($current_date) ) ; 
					$due_date = date ( 'Y-m-d H:i:s' , $due_date);

					$due_date = explode(' ', $due_date);
					$due_date = $due_date[0].'T'.$due_date[1];  


					$chargeData = array(
		            	'method' => 'bank_account',
		            	'amount' => (float)$_POST["amount"],  // formato númerico con hasta dos dígitos decimales, sin limite de monto.
		            	'description' => $idregcobro.': '.$concepto,
		            	'due_date' => $due_date,
		                //'order_id' => $idregcobro, //opcional, cualquier id pero debe ser unico, longitud hasta 100 caracteres
		                'customer' => $customer //opcional
			       	);

				}else if($type=='paynet'){

					date_default_timezone_set('America/Mexico_City');
					$current_date= date('Y-m-d H:i:s'); 

					$due_date = strtotime ( '+36 hour' , strtotime ($current_date) ) ; 
					$due_date = date ( 'Y-m-d H:i:s' , $due_date);

					$due_date = explode(' ', $due_date);
					$due_date = $due_date[0].'T'.$due_date[1];

					$chargeData = array(
		            	'method' => 'store',
		            	'amount' => (float)$_POST["amount"],  // formato númerico con hasta dos dígitos decimales, sin limite de monto. 
		            	'description' => $idregcobro.': '.$concepto,
		            	'due_date' => $due_date,
		                //'order_id' => $idregcobro, //opcional, cualquier id pero debe ser unico, longitud hasta 100 caracteres
		                'customer' => $customer //opcional
			       	);

				}

				
				$charge = $openpay->charges->create($chargeData);

				$resStatus = 200;
				$mensaje = '';
				$code = $charge->id;

				$code2 = '';
				if($type=='paynet'){
					$code2 = $charge->payment_method->reference;
				}

			}catch (OpenpayApiTransactionError $e) {

		        error_log('ERROR on the transaction: ' . $e->getMessage() .
		                ' [error code: ' . $e->getErrorCode() .
		                ', error category: ' . $e->getCategory() .
		                ', HTTP code: ' . $e->getHttpCode() .
		                ', request ID: ' . $e->getRequestId() . ']', 0);
		        $mensaje_console = $e->getErrorCode().' Error [1]: '.$e->getMessage();
		        $mensaje = 'Error ['.$e->getErrorCode().']';
		        $resStatus = 400;
		        $code = '';
		        $code2 = '';

		        //echo "ERROR A";
		    } catch (OpenpayApiRequestError $e) {

		        error_log('ERROR on the request: ' . $e->getMessage(), 0);
		        $mensaje_console = 'Error [2]: '.$e->getMessage();
		        $mensaje = 'Error ['.$e->getErrorCode().']';
		        $resStatus = 400;
		        $code = '';
		        $code2 = '';

		    } catch (OpenpayApiConnectionError $e) {

		        $mensaje_console = 'Error [3]: '.$e->getMessage();
		        $mensaje = 'Error ['.$e->getErrorCode().']';
		        $resStatus = 400;
		        $code = '';
		        $code2 = '';

		    } catch (OpenpayApiAuthError $e) {

		        $mensaje_console = 'Error [4]: '.$e->getMessage();
		        $mensaje = 'Error ['.$e->getErrorCode().']';
		        $resStatus = 400;
		        $code = '';
		        $code2 = '';

		    } catch (OpenpayApiError $e) {

		        $mensaje_console = 'Error [5]: '.$e->getMessage();
		        $mensaje = 'Error ['.$e->getErrorCode().']';
		        $resStatus = 400;
		        $code = '';
		        $code2 = '';

		    } catch (Exception $e) {
		        $mensaje_console = 'Error [6]: '.$e->getMessage();
		        $mensaje = 'Error ['.$e->getErrorCode().']';
		        $resStatus = 400;
		        $code = '';
		        $code2 = '';
		    }


		    $response = [
	            'status' => $resStatus,
	            'message' => $mensaje,
	            'message_console' => $mensaje_console,
	            'code' => $code,
	            'code2' => $code2
	        ];

			
			return $response;

			
		}



	}



?>
