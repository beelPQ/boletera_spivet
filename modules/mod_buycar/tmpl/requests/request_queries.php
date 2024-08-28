<?php

	if($_POST){

		require_once($_SERVER['DOCUMENT_ROOT']."/modules/mod_buycar/tmpl/controllers/queries.php");

		if($_POST['code']==1){

			$consulta = new Consulta();

			$products = $consulta->products();

			$response =[
	            'status_code' => 200,
	            'products' => $products
	        ];
	        echo json_encode($response);
			
		}





	}
	
    


?>
	
	