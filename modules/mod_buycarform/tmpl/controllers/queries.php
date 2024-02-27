<?php

	require_once($_SERVER['DOCUMENT_ROOT']."/templates/spivet_pq_tm/php/conect.php");


	class Consulta {

		public function commissionFormPay() {

			try{

				$total_before_commissions=$_POST["total_before_commissions"];
				$moneda=$_POST["moneda"];
				//$id_formapago=$_POST["code"];
				$id_formapago = 4;//El 4 es de mercado pago


				$myDatabase = new myDataBase();
				$mysqli = $myDatabase->conect_mysqli();

				if(is_null($mysqli)==false){


					$query = " SELECT 
									*
								FROM catalogo_forma_depago
								WHERE IDsystemapades=".$id_formapago."
								";
	        		$resultado = $mysqli->query($query);
	        		$formpago = mysqli_fetch_array($resultado);


	        		if( isset($formpago['IDsystemapades']) ){

	        			if( is_null($formpago['IDsystemapades'])==false ){

	        				$comision_dinero = 0;
	        				if( $moneda=='MXN' ){
	        					$comision_dinero = $formpago['comision_pesos'];
	        				}else if( $moneda=='USD' ){
	        					$comision_dinero = $formpago['comision_dolares'];
	        				}


	        				$comision_porcentaje = 0;
	        				$comision_porcentaje_monto = 0;
	        				if($id_formapago=='1' || $id_formapago=='2' || $id_formapago=='3'){

				        		if( $moneda=='MXN' ){
		        					
		        					$query = " SELECT 
													idsystemcomper,openpay_porcentaje
												FROM comisiones_porcentajes
												WHERE mxnlimiteinferior<=".$total_before_commissions." AND mxnlimitesuperior>=".$total_before_commissions."
												";
					        		$resultado = $mysqli->query($query);
					        		$row_comm_perc = mysqli_fetch_array($resultado);

		        				}else if( $moneda=='USD' ){
		        					
		        					$query = " SELECT 
													idsystemcomper,openpay_porcentaje
												FROM comisiones_porcentajes
												WHERE usdlimiteinferior<=".$total_before_commissions." AND usdlimitesuperior>=".$total_before_commissions."
												";
					        		$resultado = $mysqli->query($query);
					        		$row_comm_perc = mysqli_fetch_array($resultado);

		        				}


				        		if( isset($row_comm_perc['idsystemcomper']) ){

				        			if( is_null($row_comm_perc['idsystemcomper'])==false ){

				        				$comision_porcentaje = $row_comm_perc['openpay_porcentaje'];
				        				$comision_porcentaje_monto = $total_before_commissions * ($row_comm_perc['openpay_porcentaje']/100);
				        			}
				        		}

	        				}
	        				
	        				//Calculo de comision en porcentaje para mercado pago
							if($id_formapago == '4'){
								$queryComisionMP = "SELECT * FROM catalogo_forma_depago WHERE IDsystemapades = 4";
								$res = $mysqli->query($queryComisionMP);
						
								if($res->num_rows > 0){
									$obj = mysqli_fetch_assoc($res);
									//$comision_porcentaje_monto = $total_before_commissions * ($row_comm_perc['openpay_porcentaje']/100);
									$comision_porcentaje_monto = $total_before_commissions * ($obj['comision_porcentajeinicial']/100);
									$comision_total = $comision_porcentaje_monto + doubleval($obj["comision_pesos"]);
									$comision_porcentaje = doubleval($obj["comision_porcentajeinicial"]) ;
								}
							}

	        				$comision_total = $comision_porcentaje_monto + $comision_dinero;

	        				$response = [
								'result' => 'success',
								'comision' => $comision_total,
								'comision_porcentaje' => $comision_porcentaje
							];


	        			}else{

		        			$response = [
								'result' => 'error',
								'message' => '[2] No se pudo calcular las comisiones.'
							];

		        		}

	        		}else{

	        			$response = [
							'result' => 'error',
							'message' => '[1] No se pudo calcular las comisiones.'
						];

	        		}


				}else{
					$response = [
						'result' => 'error',
						'message' => 'No se pudo realizar la petición de las comisiones.'
					];
				}


			}catch (Exception $e) {

				$response = [
					'result' => 'error',
					'message' => $e->getMessage()
				];
	            
	        }

			return $response;

		}

		public function discountCupon() {

			try{


				$cupon=$_POST["cupon"];
	    	    $subtotal=$_POST["subtotal"];
	    	    $moneda=$_POST["moneda"];

	    	    date_default_timezone_set('America/Mexico_City');
	            $current_date =date("Y-m-d H:i:s");


				$myDatabase = new myDataBase();
				$mysqli = $myDatabase->conect_mysqli();

				

				if(is_null($mysqli)==false){

					$query = " SELECT 
									*
								FROM catalogo_descuentos
								WHERE descuento_tipo=2 AND descuento_existencia>0 AND descuento_estatus=1 AND descuento_codigo='".$cupon."' 
									  AND descuento_valido_desde<='".$current_date."' AND descuento_valido_hasta>='".$current_date."'
								";
	        		$resultado = $mysqli->query($query);
	        		$cupon = mysqli_fetch_array($resultado);

	        		if( isset($cupon['idsystemdescuento']) ){

	        			if( is_null($cupon['idsystemdescuento'])==false ){


	        				if($cupon['descuento_formato']=='Porcentaje'){

	        					$descuento = $subtotal * ($cupon['descuento_cantidad']/100);

	        					if($descuento>=$subtotal){
	        						$descuento=$subtotal;
	        						$descuento_aplicado = '100%';
	        					}else{
	        						$descuento_aplicado = $cupon['descuento_cantidad'].'%';
	        					}


	        				}else if($cupon['descuento_formato']=='Dinero'){

	        					if($moneda=='MXN'){
	        						$descuento = $cupon['descuento_cantidad'];
	        					}else if($moneda=='USD'){
	        						$descuento = $cupon['descuento_cantidad2'];
	        					}

	        					if($descuento>=$subtotal){
	        						$descuento=$subtotal;
	        					}

	        					$descuento_aplicado = '$'.number_format($descuento,2);

	        				}

	        				$tipo_descuento = $cupon['descuento_formato'];
	        				$code_descuento = $cupon['descuento_codigo'];
	        				$iddescuento = $cupon['idsystemdescuento'];

	        				$response = [
								'result' => 'success',
								'descuento' => $descuento,
								'descuento_aplicado' => $descuento_aplicado,
								'tipo_descuento' => $tipo_descuento,
								'code_descuento' => $code_descuento,
								'iddescuento' => $iddescuento
							];


	        			}else{
	        				$response = [
								'result' => 'error',
								'message' => '[2] El cupón no es válido.'
							];
	        			}

	        		}else{

	        			$response = [
							'result' => 'error',
							'message' => '[1] El cupón no es válido.'
						];

	        		}

	        		$mysqli -> close();

				}else{
					$response = [
						'result' => 'error',
						'message' => 'No se pudo realizar la petición del cupón.'
					];
				}


			}catch (Exception $e) {

				$response = [
					'result' => 'error',
					'message' => $e->getMessage()
				];
	            
	        }

			return $response;

		}


		public function infoCompany() {

			$myDatabase = new myDataBase();
			$mysqli = $myDatabase->conect_mysqli();

			$empresa = [];

			if(is_null($mysqli)==false){

				$query = " SELECT 
								*
							FROM empresa
							WHERE idsystemEmpresa = 1
							";
        		$resultado = $mysqli->query($query);
        		$empresa = mysqli_fetch_array($resultado);

        		$mysqli -> close();

			}

			return $empresa;

		}


		public function nextIDCobro() {

			$myDatabase = new myDataBase();
			$mysqli = $myDatabase->conect_mysqli();

			$nextid = 100;

			if(is_null($mysqli)==false){

				$query = " SELECT 
								cobroscata_idregcobro
							FROM catalogo_cobros
							ORDER BY cobroscata_idregcobro DESC
							LIMIT 1";
        		$resultado = $mysqli->query($query);
        		$lastreg = mysqli_fetch_array($resultado);


        		if(isset($lastreg['cobroscata_idregcobro'])){
        			if( is_null($lastreg['cobroscata_idregcobro'])==false ){
        				$nextid = $lastreg['cobroscata_idregcobro'] + 1;
        			}
        		}

        		$mysqli -> close();


			}

			return $nextid;

		}


		public function getFormPay($id) {
			
			$id = (int)$id;

			$myDatabase = new myDataBase();
			$mysqli = $myDatabase->conect_mysqli();

			$row = [];

			if(is_null($mysqli)==false){

				$query = " SELECT 
								*
							FROM catalogo_forma_depago
							WHERE IDsystemapades = ".$id."
							";
        		$resultado = $mysqli->query($query);
        		$row = mysqli_fetch_array($resultado);

        		$mysqli -> close();

			}

			return $row;

		}


		public function getDiscount($id) {

			$id = (int)$id;

			$myDatabase = new myDataBase();
			$mysqli = $myDatabase->conect_mysqli();

			$row = [];

			if(is_null($mysqli)==false){

				$query = " SELECT 
								*
							FROM catalogo_descuentos
							WHERE idsystemdescuento = ".$id."
							";
        		$resultado = $mysqli->query($query);
        		$row = mysqli_fetch_array($resultado);

        		$mysqli -> close();

			}

			return $row;

		}


		public function getProduct($id) {

			$id = (int)$id;

			$myDatabase = new myDataBase();
			$mysqli = $myDatabase->conect_mysqli();

			$row = [];

			if(is_null($mysqli)==false){

				$query = " SELECT 
								*
							FROM catalogo_productos
							WHERE idsystemcatpro = ".$id."
							";
        		$resultado = $mysqli->query($query);
        		$row = mysqli_fetch_array($resultado);

        		$mysqli -> close();

			}

			return $row;

		}


		public function getPayement($id) {

			$id = (int)$id;

			$myDatabase = new myDataBase();
			$mysqli = $myDatabase->conect_mysqli();

			$row = [];

			if(is_null($mysqli)==false){

				$query = " SELECT 
								*
							FROM catalogo_cobros
							WHERE idsystemcobrocat = ".$id."
							";
        		$resultado = $mysqli->query($query);
        		$row = mysqli_fetch_array($resultado);

        		$mysqli -> close();

			}

			return $row;

		}

		public function getPayementByTrans($id_transaccion) {


			$myDatabase = new myDataBase();
			$mysqli = $myDatabase->conect_mysqli();

			$row = [];

			if(is_null($mysqli)==false){

				$query = " SELECT 
								*
							FROM catalogo_cobros
							WHERE cobroscata_idtransaccion = '".$id_transaccion."'
							";
        		$resultado = $mysqli->query($query);
        		$row = mysqli_fetch_array($resultado);

        		$mysqli -> close();

			}

			return $row;

		}


		public function getPaymentItems($id_cobro) {

			$id_cobro = (int)$id_cobro;

			$myDatabase = new myDataBase();
			$mysqli = $myDatabase->conect_mysqli();

			$list = NULL;

			if(is_null($mysqli)==false){

				$query = " SELECT 
								*
							FROM catalogo_cobros_items
							WHERE cobroscata_idsystemcobrocat = ".$id_cobro."
							";
        		$list = $mysqli->query($query);
  

        		$mysqli -> close();

			}

			return $list;

		}


		public function getPaymentItem($id) {

			$id = (int)$id;

			$myDatabase = new myDataBase();
			$mysqli = $myDatabase->conect_mysqli();

			$row = [];

			if(is_null($mysqli)==false){

				$query = "  SELECT 
								*
							FROM catalogo_cobros_items
							WHERE idsystemcobrocataitem = ".$id."
							";
        		$resultado = $mysqli->query($query);
        		$row = mysqli_fetch_array($resultado);

        		$mysqli -> close();

			}

			return $row;

		}


		public function getClient($id) {

			$id = (int)$id;

			$myDatabase = new myDataBase();
			$mysqli = $myDatabase->conect_mysqli();

			$row = [];

			if(is_null($mysqli)==false){

				$query = "  SELECT 
								*
							FROM catalogo_clientes
							WHERE idsystemcli = ".$id."
							";
        		$resultado = $mysqli->query($query);
        		$row = mysqli_fetch_array($resultado);

        		$mysqli -> close();

			}

			return $row;

		}


		public function getConfig($id) {

			$id = (int)$id;

			$myDatabase = new myDataBase();
			$mysqli = $myDatabase->conect_mysqli();

			$row = [];

			if(is_null($mysqli)==false){

				$query = "  SELECT 
								*
							FROM configuracion
							WHERE configuracion_id = ".$id."
							";
        		$resultado = $mysqli->query($query);
        		$row = mysqli_fetch_array($resultado);

        		$mysqli -> close();

			}

			return $row;

		}


		public function getMunicipioState($id) {

			$id = (int)$id;

			$myDatabase = new myDataBase();
			$mysqli = $myDatabase->conect_mysqli();

			$row = [];

			if(is_null($mysqli)==false){

				$query = "  SELECT 
								m.municipio,est.estado
							FROM municipios AS m
							INNER JOIN estados_municipios AS em ON m.id=em.municipios_id
							INNER JOIN estados AS est ON est.id=em.estados_id
							WHERE m.id = ".$id."
							";
        		$resultado = $mysqli->query($query);
        		$row = mysqli_fetch_array($resultado);

        		$mysqli -> close();

			}

			return $row;

		}


		public function getCategory($id) {

			$id = (int)$id;

			$myDatabase = new myDataBase();
			$mysqli = $myDatabase->conect_mysqli();

			$row = [];

			if(is_null($mysqli)==false){

				$query = "  SELECT 
								*
							FROM catalogo_categorias_programas
							WHERE idsystemcatproon = ".$id."
							";
        		$resultado = $mysqli->query($query);
        		$row = mysqli_fetch_array($resultado);

        		$mysqli -> close();

			}

			return $row;

		}



		/**
		 * *Rebicion de tipo de pasarela activada
		 * TODO: verificar la estrucutra de la tabla de empresa 
		 * @return array 
		 */
		/* public function checkPasarela(){
			try {
				$response = [];
				$myDatabase = new myDataBase();
				$con = $myDatabase->conect_mysqli();
				$query = "SELECT type_pasarela FROM empresa WHERE idsystemempresa = 1";
				$exect = $con->query($query);
				if($exect->num_rows > 0){
					$arrayData = mysqli_fetch_assoc($exect);
					$typePasarela = $arrayData["type_pasarela"];
					$response = [
						"status" => true,
						"type" => $typePasarela
					];
				}else{
					$response = [
						"status" => false,
						"message" => "No se encontro información de tipo de pasarela"
					];
				}
				return $response;
			} catch (\Throwable $th) {
				return [
					"status" => false,
					"message" => $th->getMessage()
				];
			}
		} */


		/**
		 * *Obtencion de key publica
		 * Solo se ejecuta si el tipo de pasarela seleccionada es Mercado pago
		 * @return string key
		 */
		/* public function getKeyPublicMercadoPago()  {
			try {
				$response = [];
				$myDatabase = new myDataBase();
				$con = $myDatabase->conect_mysqli();
				$query = "SELECT key_public_mp FROM empresa WHERE idsystemempresa = 1";
				$exect = $con->query($query);
				if($exect->num_rows > 0){
					$arrayData = mysqli_fetch_assoc($exect); 
					$response = $arrayData["key_public_mp"];
				}else{
					$response = "no_key_registered";
				}
				return $response;
			} catch (\Throwable $th) {
				return $th->getMessage();
			}
		} */
	}


?>