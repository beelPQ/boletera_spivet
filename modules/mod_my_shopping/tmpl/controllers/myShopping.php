<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/conect.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/common.php");

$response = [];
$myShopp = new MyShopping();
if (isset($_POST)) {
    if ($_POST['method'] == "my_shopping") {
        $response = $myShopp->myShoppings($_POST);
    }
    if ($_POST['method'] == "uploadVoucher") {
        $response = $myShopp->uploadFiles($_POST, $_FILES["fileVoucher"]);
        // $response = $myShopp->formatMessage(true, "Verificando carga de archivo", $_POST, $_FILES["fileVoucher"]);
    }
}
die(json_encode($response));

class MyShopping
{
    private function formatMessage($status, $message = '', $description  = '', $data = [])
    {
        return [
            "status" => $status,
            "message" => $message,
            "description" => $description,
            "data" => $data,
        ];
    }

    public function myShoppings($dataPost)
    {
        try {
            $dataResponse = [];
            $userid = isset($dataPost['id']) && Common::decrypt($dataPost['id']) !== null ? Common::decrypt($dataPost['id']) : 0;
            if ((int)$userid > 0) {
                $myDatabase = new myDataBase();
                $con = $myDatabase->conect_mysqli();
                $query = "SELECT payment.idsystemcobrocat, payment.cobroscata_idregcobro AS idPay, payment.cobroscata_idtransaccion AS idtransaccion, payment.cobroscata_idtransaccion_secondary AS idtransaccion_secondary, payment.cobroscata_moneda AS moneda, payment.cobroscata_montotransaccion AS montotransaccion,
                payment.comision_total, payment.cobroscata_fechapago AS fechapago, payment.cobroscata_status AS status, payment.cobroscata_pdf AS pdf, payment.cobroscata_adjunto AS adjunto, payment.cobroscata_notas AS notes FROM catalogo_cobros AS payment WHERE payment.clientes_idsystemcli = $userid";
                $exect = $con->query($query);
                if ($exect->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($exect)) {
                        $idPayment = $row['idsystemcobrocat'];
                        $row['id'] = Common::encrypt($idPayment);
                        unset($row['idsystemcobrocat']);


                        $paymentItems = [];
                        $queryItems = "SELECT payItems.idsystemcobrocataitem,
                        payItems.paquetes_idsystempaquete AS idsystempaquete, payItems.cobroscata_items_skupaquete AS skupaquete, payItems.cobroscata_items_moneda AS itemMoneda, payItems.cobroscata_items_preciobase AS itemPreciobase, payItems.cobroscata_items_preciodescuento AS itemPreciodescuento, payItems.cobroscata_items_preciodescuentopaquete AS itemPreciodescuentopaquete, payItems.cobroscata_items_preciounitario AS itemPreciounitario, payItems.cobroscata_items_subtotal, payItems.cobroscata_items_descuentoproducto, payItems.cobroscata_items_descuentocompra, payItems.cobroscata_items_ivaporcentaje, payItems.cobroscata_items_ivadinero, payItems.cobroscata_items_preciofinal, payItems.file_boleto, payItems.modality, payItems.id_deliverable,
                        product.catalogo_productos_sku, product.catalogo_tipoproductos_idsystemtipopro, product.empresa_idsystemEmpresa, product.catalogo_productos_nombre, product.catalogo_productos_duracion, product.catalogo_productos_descripcioncorta, product.catalogo_productos_descripcionlarga, product.catalogo_productos_esquemacursos, product.catalogo_productos_incluye, product.catalogo_productos_link, product.catalogo_productos_thumbfacilitador, product.catalogo_productos_namefacilitador, product.catalogo_productos_positionfacilitador
                        FROM catalogo_cobros_items AS payItems
                        LEFT JOIN catalogo_cobros AS payment ON (payItems.cobroscata_idsystemcobrocat = payment.idsystemcobrocat)
                        LEFT JOIN catalogo_productos AS product ON (payItems.catalogo_productos_idsystemcatpro = product.idsystemcatpro)
                        WHERE payment.idsystemcobrocat = $idPayment";
                        $exectItems = $con->query($queryItems);
                        if ($exectItems->num_rows > 0) {
                            while ($rowItem = mysqli_fetch_assoc($exectItems)) {
                                $idPaymentItem = $rowItem['idsystemcobrocataitem'];
                                $rowItem['idItem'] = Common::encrypt($idPaymentItem);
                                unset($rowItem['idsystemcobrocataitem']);
                                $rowItem['product'] = [
                                    'name' => $rowItem['catalogo_productos_nombre'],
                                    'sku' => $rowItem['catalogo_productos_sku'],
                                    'duration' => $rowItem['catalogo_productos_duracion'],
                                    'shortDescription' => $rowItem['catalogo_productos_descripcioncorta'],
                                    'longDescription' => $rowItem['catalogo_productos_descripcionlarga'],
                                    'esquemacursos' => $rowItem['catalogo_productos_esquemacursos'],
                                    'incluye' => $rowItem['catalogo_productos_incluye'],
                                    'link' => $rowItem['catalogo_productos_link'],
                                    'thumbfacilitador' => $rowItem['catalogo_productos_thumbfacilitador'],
                                    'namefacilitador' => $rowItem['catalogo_productos_namefacilitador'],
                                    'positionfacilitador' => $rowItem['catalogo_productos_positionfacilitador'],
                                ];
                                unset($rowItem['catalogo_productos_nombre']);
                                unset($rowItem['catalogo_productos_sku']);
                                unset($rowItem['catalogo_productos_duracion']);
                                unset($rowItem['catalogo_productos_descripcioncorta']);
                                unset($rowItem['catalogo_productos_descripcionlarga']);
                                unset($rowItem['catalogo_productos_esquemacursos']);
                                unset($rowItem['catalogo_productos_incluye']);
                                unset($rowItem['catalogo_productos_link']);
                                unset($rowItem['catalogo_productos_thumbfacilitador']);
                                unset($rowItem['catalogo_productos_namefacilitador']);
                                unset($rowItem['catalogo_productos_positionfacilitador']);

                                $paymentItems = $rowItem;
                            }
                        }
                        $row['paymentItems'][] = $paymentItems;

                        $dataResponse[] = $row;
                    }
                    $con->close(); // Cerrar la conexión aquí
                    return $this->formatMessage(true, "Cobros registrados", $userid, $dataResponse);
                }
                $con->close(); // Cerrar la conexión en caso de que no haya registros
                return $this->formatMessage(true, "No hay cobros registrados");
            }
            return $this->formatMessage(false, "Error al obtener las compras", "Recargue la página nuevamente o vuelva iniciar sesión");
        } catch (Exception $e) {
            return $this->formatMessage(false, "Exception encontrada", $e->getMessage());
        }
    }

    public function uploadFiles($dataPost, $file)
    {

        try {
            $explodeDAtaId = explode('-', $dataPost['idFile']);
            $idPayment = Common::decrypt($explodeDAtaId[0]) ?? 0;
            $idFile = $explodeDAtaId[1];
            $response = [];

            $carpeta = $_SERVER['DOCUMENT_ROOT']."/files/adjuntos/";
            if (!file_exists($carpeta)) mkdir($carpeta, 0777, true);

            $fileext = pathinfo($file["name"], PATHINFO_EXTENSION);

            $includeType = ["png", "jpg", "jpeg", "webp", "PNG", "JPG", "JPEG", "WEBP"];
            $typeFile = in_array(strtolower($fileext), $includeType) ? "image" : "docto";

            $nombrefile = "Adjunto_$idFile.".$fileext;
            $target_file = $carpeta . $nombrefile;

            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                // return $this->formatMessage(true, "Archivo $nombrefile adjuntado correctamente :: $idPayment ", $dataPost, $idFile);
                $myDatabase = new myDataBase();
                $mysqli = $myDatabase->conect_mysqli();

                if (is_null($mysqli) == false) {
                    $query = $mysqli->prepare(" UPDATE catalogo_cobros SET cobroscata_adjunto = ? WHERE idsystemcobrocat = ? ");
                    $query->bind_param('si', $nombrefile, $idPayment);
                    $query->execute();
                    // Verificas si la consulta se realizó con éxito
                    if ($query->affected_rows > 0) {
                        return $this->formatMessage(true, "Archivo registrado correctamente", "", [
                            "filename" => $nombrefile,
                            "type" => $typeFile,
                            "id" => $explodeDAtaId[0]
                        ]);
                    } else {
                        return $this->formatMessage(false, "No se pudo cargar el archivo");
                    }
                    $query->close(); // Cerramos la consulta
                    $mysqli->close(); // Cerramos la conexión
                }
            } else {
                $response = $this->formatMessage(false, "No se pudo cargar el archivo" );
            }
        
            return $response;
        } catch (Exception $e) {
            return $this->formatMessage(false, "Exception encontrada", $e->getMessage());
        }
    }
}
