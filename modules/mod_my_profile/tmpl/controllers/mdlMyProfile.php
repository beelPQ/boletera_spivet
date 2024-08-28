<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/conect.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/modules/mod_buycarform/tmpl/controllers/MercadoPago/actionsMP.php");

$response = [];
if (isset($_POST)) {
    if ($_POST['method'] == "updateProfile") {
        $actionsMpago = new actionsMP();
        // $response = $actionsMpago->createMessageResponse(true, "Prueba de ingreso a actionsMP...", "", $_POST);
        $response = $actionsMpago->createClient($_POST, 'PutJoomla');
    }
}
die(json_encode($response));
