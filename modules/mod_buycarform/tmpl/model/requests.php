<?php
if ($_POST) {
	require_once($_SERVER['DOCUMENT_ROOT'] . "/modules/mod_buycarform/tmpl/controllers/controller_openpay.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/modules/mod_buycarform/tmpl/controllers/actions.php");
	if ($_POST['option'] == 'openpayTDD') {
		$openpay = new controllerOpenpay();
		$respuesta = $openpay->transaction('tdd');
		echo json_encode($respuesta);
	} else if ($_POST['option'] == 'openpaySPEI') {
		$openpay = new controllerOpenpay();
		$respuesta = $openpay->transaction('spei');
		echo json_encode($respuesta);
	} else if ($_POST['option'] == 'openpayPaynet') {
		$openpay = new controllerOpenpay();
		$respuesta = $openpay->transaction('paynet');
		echo json_encode($respuesta);
	} else if ($_POST['option'] == 'saveData') {
		$accion = new Accion();
		$respuesta = $accion->saveTransaction();
		echo json_encode($respuesta);
	} else if ($_POST['option'] == 'uploadFiles') {
		$accion = new Accion();
		$respuesta = $accion->uploadFiles();
		echo json_encode($respuesta);
	} else if ($_POST['option'] == 'applyCupon') {
		$consulta = new Consulta();
		$respuesta = $consulta->discountCupon();
		echo json_encode($respuesta);
	} else if ($_POST['option'] == 'verifyCommissions') {
		$consulta = new Consulta();
		$respuesta = $consulta->commissionFormPay();
		echo json_encode($respuesta);
	}
}
