<?php
    /**
     * *Uso exclusivo del proceso de pago para mercado pago
     */
    
	// Obtener el contenido del cuerpo de la solicitud (datos JSON enviados)
    $json_data = file_get_contents("php://input"); 
    // Decodificar los datos JSON en un array asociativo
    $dataProcess = json_decode($json_data, true); 

    if( isset($dataProcess) ){
		require_once($_SERVER['DOCUMENT_ROOT']."/modules/mod_buycarform/tmpl/controllers/MercadoPago/actionsMP.php");
		require_once($_SERVER['DOCUMENT_ROOT']."/templates/spivet_pq_tm/php/common.php");

		$accion = new actionsMP();
		$generalf = new Common(); 
        $dataClient = $dataProcess["formSenData"];
        //$arrayProducts = $dataProcess["listProducts"];
		$response = $accion->createTransaction( $dataProcess );
        echo json_encode($response);
	}
?>