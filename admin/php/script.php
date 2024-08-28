<?php

	//phpinfo();

	date_default_timezone_set('America/Mexico_City');
	$mifecha= date('Y-m-d H:i:s'); 

	echo $mifecha.'<br><br>';

	$NuevaFecha = strtotime ( '+36 hour' , strtotime ($mifecha) ) ; 
	$NuevaFecha = date ( 'Y-m-d H:i:s' , $NuevaFecha); 

	$NuevaFecha = explode(' ', $NuevaFecha);
	$NuevaFecha = $NuevaFecha[0].'T'.$NuevaFecha[1]; 

	echo $NuevaFecha;

?>