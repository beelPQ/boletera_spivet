<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/templates/spivet_pq_tm/php/conect.php");
    
    class Pasarela{

        /**
		 * *Rebicion de tipo de pasarela activada
		 * TODO: verificar la estrucutra de la tabla de empresa 
		 * @return array 
		 */
		public function checkPasarela(){
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
		}


		/**
		 * *Obtencion de key publica
		 * Solo se ejecuta si el tipo de pasarela seleccionada es Mercado pago
		 * @return string key
		 */
		public function getKeyPublicMercadoPago()  {
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
		}


    }

?>