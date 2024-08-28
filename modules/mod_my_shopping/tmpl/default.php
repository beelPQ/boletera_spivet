<?php

use Joomla\CMS\Factory;

$PATH_MODULE = '/modules/mod_my_shopping';
$PATH_MODULE_SRC = "$PATH_MODULE/tmpl/src";
$document = Factory::getDocument();
$document->addStyleSheet("$PATH_MODULE_SRC/css/mdlMyShopping.min.css", array('version' => 'auto'));
$document->addScript("$PATH_MODULE_SRC/js/mdlMyShopping.js",  array('version' => 'auto'));

$sectionTitle = $params->get('sectionTitle') ?? 'Compras';

?>


<section class="my_shopping">
    <div class="container py-4 px-3">
        <h1 class="my_shopping-title"><?= $sectionTitle ?></h1>
        <table class="table my_shopping-table" id="tblPaymentsUser">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID compra</th>
                    <th scope="col">Fecha de pago</th>
                    <th scope="col">Estado depago</th>
                    <th scope="col">Comprobante adjunto</th>
                    <!-- <th scope="col"></th> -->
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</section>

<!-- <button type="button" class="btn btn-primary" id="btnMdlFilePayment" data-bs-toggle="modal" data-bs-target="#staticMdlFilePayment"></button> -->

<div class="modal fade" id="staticMdlFilePayment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticMdlFilePaymentLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticMdlFilePaymentLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

