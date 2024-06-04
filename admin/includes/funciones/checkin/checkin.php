<?php
// require_once ('../general/pdf.php');


// require_once ('../general/general.php');
// require_once ('templates.php');

// Clave de encriptación (debe ser segura y de longitud adecuada para el algoritmo)
$key = "Clav3 unica de 3ncryptac10n S3gUr4 256";
$response = array(
    'status' => false,
    'message' => "",
    'description' => "",
    'data' => []
);

if (isset($_POST["option"])) {
    require_once('../../../php/conexion.php');
    session_start();
    $id_user = $_SESSION['id_logueo'];
    // $response['idcli'] = $id_user;


    // try {
    // } catch (Exception $e) {
    //     echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    // }

    if ($_POST["option"] == 'busquedaManual') {
        $mysqli = conectar();
        $participant_number = $_POST["code"];
        $available = 1;
        $id_event = $_POST["code2"];


        // $response['id_event'] = $id_event;

        /*
            if($_POST["code2"]!=''){
                $id_event = decrypt($_POST["code2"]);
            }else{
                $query = $mysqli->prepare(" SELECT rol.id_event
                                            FROM users AS usr
                                            INNER JOIN roles AS rol ON usr.id_role=rol.id
                                            WHERE usr.id_user = ? AND usr.available = ?");
                $query -> bind_param('ii',$id_user,$available);
                $query -> execute();
                $query -> bind_result($id_event);
                $query -> fetch();
                $query -> close();
                
            }
            */

        // die(json_encode( (int)$participant_number  ));

        $strQuery = "";
        // if( is_int($participant_number) ) {
        if ((int)$participant_number > 0) {
            $strQuery = "SELECT del.participant_number, trans.cobroscata_idregcobro, cli.clientes_idsolicitud, cli.clientes_nombre,cli.clientes_apellido1,cli.clientes_apellido2, cli.clientes_email, cli.clientes_telefono, cli.clientes_photo, del.checkin, tranItem.modality, del.id_deliverable
                FROM deliverables AS del
                INNER JOIN catalogo_cobros_items AS tranItem ON (tranItem.id_deliverable = del.id_deliverable)
                LEFT JOIN catalogo_cobros AS trans ON (trans.idsystemcobrocat = tranItem.cobroscata_idsystemcobrocat)
                LEFT JOIN catalogo_clientes AS cli ON (cli.idsystemcli = tranItem.clientes_idsystemcli)
                WHERE tranItem.modality = 'Presencial'
                AND trans.cobroscata_status = 1
                AND tranItem.catalogo_productos_idsystemcatpro = $id_event
                AND trans.cobroscata_idregcobro = $participant_number ";
        } else {
            $strQuery = "SELECT del.participant_number, trans.cobroscata_idregcobro, cli.clientes_idsolicitud, cli.clientes_nombre,cli.clientes_apellido1,cli.clientes_apellido2, cli.clientes_email, cli.clientes_telefono, cli.clientes_photo, del.checkin, tranItem.modality, del.id_deliverable
            FROM deliverables AS del
            INNER JOIN catalogo_cobros_items AS tranItem ON (tranItem.id_deliverable = del.id_deliverable)
            INNER JOIN catalogo_cobros AS trans ON (trans.idsystemcobrocat = tranItem.cobroscata_idsystemcobrocat)
            INNER JOIN catalogo_clientes AS cli ON (cli.idsystemcli = tranItem.clientes_idsystemcli)
            WHERE tranItem.modality = 'Presencial'
            AND trans.cobroscata_status = 1
            AND tranItem.catalogo_productos_idsystemcatpro = $id_event
            AND del.participant_number = '$participant_number'";
        }

        // die(json_encode($strQuery));

        $query = $mysqli->prepare($strQuery);
        /*
            $query = $mysqli->prepare("SELECT del.id_deliverable,del.checkin,del.file_credential,
                                               cli.name,cli.lastname1,cli.lastname2,cli.file_photo, cli.email, cli.phone,
                                               tra.id_secondary,tra.status,
                                               tr.name AS tr_name,
                                               del.participant_number,
                                               ev.name AS ev_name,ev.domain
                                        FROM deliverables AS del
                                        INNER JOIN transaction_items AS ti ON ti.id_deliverable=del.id_deliverable
                                        INNER JOIN transactions AS tra ON tra.id_transaction=ti.id_transaction
                                        INNER JOIN events AS ev ON tra.id_event=ev.id_event
                                        INNER JOIN clients AS cli ON cli.id_client=tra.id_client
                                        INNER JOIN general_items AS gi ON gi.id_general_item=ti.id_general_item
                                        INNER JOIN detail_tickets AS dt ON dt.id_detail_ticket=gi.id_detail_ticket
                                        INNER JOIN ticket_roles AS tr ON tr.id_ticket_role=dt.id_ticket_role
                                        WHERE del.participant_number = ? AND del.available = ? AND tra.id_event = ?
                                        GROUP BY del.participant_number");
            */
        // Verificar si la preparación de la consulta tuvo éxito
        if (!$query) {
            $response['status'] = false;
            $response['message'] = "Error en la preparación de la consulta";
            $response['description'] = $mysqli->error;
            die(json_encode($response));
        }
        // $query->bind_param('sii',$participant_number,$available,$id_event);
        $query->execute();
        // Verificar si la ejecución de la consulta tuvo éxito
        if ($query->errno) {
            $response['status'] = false;
            $response['message'] = "Error al ejecutar la consulta";
            $response['description'] = $query->error;
            die(json_encode($response));
        }
        // $query -> bind_result($existRow,$checkin,$credential,$name,$lastname1,$lastname2,$photo,$email,$phone,$noTra,$status,$tr_name,$idParticipant,$ev_name,$domain);
        $query->bind_result($idParticipant, $idRegCobro, $idsolicitud, $name, $lastname1, $lastname2, $email, $phone, $photo, $checkin, $modality, $idDeliverable);
        // $query -> fetch();
        $dataResult = array();
        // Iterar sobre las filas de resultados
        while ($query->fetch()) {
            array_push($dataResult, [
                "idParticipant" => $idParticipant,
                "noTra" => $idRegCobro,
                "idsolicitud" => encrypt($idsolicitud, $key),
                "name" => $name,
                "lastname1" => $lastname1,
                "lastname2" => $lastname2,
                "email" => $email,
                "phone" => $phone,
                "photo" => $photo,
                "checkin" => $checkin,
                "modality" => $modality,
                "statusPay" => "Pagado",
                "idDeliverable" => encrypt($idDeliverable, $key),
            ]);
        }
        $response['status'] = true;
        $response['message'] = "Registros encontrados";
        $response['data'] = $dataResult;
        $query->close();
        $mysqli->close();
        die(json_encode($response));

        //<== Hasta aqui llegamos

        if ($existRow) {
            $queryNameRol = "SELECT tColor.color_code
                FROM deliverables AS deliver
                INNER JOIN transaction_items AS ti ON ti.id_deliverable = deliver.id_deliverable
                INNER JOIN transactions AS trans ON trans.id_transaction = ti.id_transaction
                INNER JOIN clients AS cli ON cli.id_client = trans.id_client
                INNER JOIN general_items AS gi ON gi.id_general_item = ti.id_general_item
                INNER JOIN detail_tickets AS detTicket ON detTicket.id_detail_ticket = gi.id_detail_ticket
                INNER JOIN ticket_roles AS tRole ON tRole.id_ticket_role = detTicket.id_ticket_role
                INNER JOIN ticket_colors AS tColor ON tColor.id_ticket_color = detTicket.id_ticket_color
                WHERE deliver.participant_number = ? AND deliver.available = 1 AND trans.id_event = ?";
            $queryResColor = $mysqli->prepare($queryNameRol);
            $queryResColor->bind_param('si', $participant_number, $id_event);
            $queryResColor->execute();
            $queryResColor->bind_result($color);
            $queryResColor->fetch();
            $queryResColor->close();

            $response = array();
            $response['response'] = 'success';

            $response['name'] = $name;
            $response['lastname1'] = $lastname1;
            $response['lastname2'] = $lastname2;
            $response['photo'] = $photo;
            $response['email'] = $email;
            $response['phone'] = $phone;
            $response['noTra'] = $noTra;
            $response['status'] = $status;
            $response['tr_name'] = $tr_name;
            $response['idParticipant'] = $idParticipant;
            $response['checkin'] = $checkin;
            $response['gafete'] = $credential;
            $response['pdf'] = '../images/clients/credentials/' . $credential;
            $response['ev_name'] = $ev_name;
            $response['domain'] = $domain;
            $response['code'] = encrypt($existRow);

            $response['color'] = $color;
        } else {
            $response = array();
            $response['response'] = 'error';
        }

        $mysqli->close();
        die(json_encode($response));
    } else if ($_POST["option"] == 'busquedaDetallada') {
        $mysqli = conectar();
        $available = 1;
        $id_event = $_POST["code"];
        // if ($_POST["code"] != '') {
        //     $id_event = decrypt($_POST["code"]);
        // } else {
        //     $query = $mysqli->prepare(" SELECT rol.id_event
        //                                     FROM users AS usr
        //                                     INNER JOIN roles AS rol ON usr.id_role=rol.id
        //                                     WHERE usr.id_user = ? AND usr.available = ?");
        //     $query->bind_param('ii', $id_user, $available);
        //     $query->execute();
        //     $query->bind_result($id_event);
        //     $query->fetch();
        //     $query->close();
        // }


        $status = 'pagado';
        $participant_number = '';


        $nameClient = $_POST["nameClient"];
        $lastName1 =  $_POST["lastNameClient1"];
        $lastName2 =  $_POST["lastNameClient2"];

        $filter_name = '';
        if ($nameClient != '' && is_null($nameClient) == false) {
            // $filter_name = 'AND <cli class="clientes_nombre"></cli> like "%' . $nameClient . '%"';
            $filter_name = "AND cli.clientes_nombre like '%$nameClient%' ";
        }

        $filter_lastname1 = '';
        if ($lastName1 != '' && is_null($lastName1) == false) {
            $filter_lastname1 = "AND cli.clientes_apellido1 like '%$lastName1%' ";
        }

        $filter_lastname2 = '';
        if ($lastName2 != '' && is_null($lastName2) == false) {
            $filter_lastname2 = "AND cli.clientes_apellido2 like '%$lastName2%' ";
        }

        // ? Correción en consulta [Moroni - 04Jun2024]
        $instruction = "SELECT del.participant_number, cli.clientes_nombre, cli.idsystemcli, cli.clientes_apellido1, cli.clientes_apellido2, 
cli.clientes_telefono, cli.clientes_email, cli.clientes_photo, ti.modality, del.id_deliverable, del.checkin, tra.cobroscata_idregcobro, tra.cobroscata_status 
FROM catalogo_cobros AS tra INNER JOIN catalogo_cobros_items AS ti ON (ti.cobroscata_idsystemcobrocat = tra.idsystemcobrocat) INNER JOIN catalogo_clientes AS cli ON (cli.idsystemcli = ti.clientes_idsystemcli) LEFT JOIN deliverables AS del ON (ti.id_deliverable=del.id_deliverable) WHERE ti.catalogo_productos_idsystemcatpro = $id_event AND tra.cobroscata_status = 1 $filter_name $filter_lastname1 $filter_lastname2
GROUP BY del.participant_number, cli.clientes_nombre, cli.idsystemcli, cli.clientes_apellido1, cli.clientes_apellido2, cli.clientes_telefono, cli.clientes_email, cli.clientes_photo, ti.modality, del.id_deliverable, del.checkin, tra.cobroscata_idregcobro, tra.cobroscata_status ORDER BY cli.clientes_nombre";

        // $instruction = "SELECT cli.idsystemcli, cli.clientes_nombre, cli.clientes_apellido1, cli.clientes_apellido2, 
        // cli.clientes_telefono, cli.clientes_email, cli.clientes_photo, del.participant_number, 
        // ti.modality, del.id_deliverable, del.checkin, tra.cobroscata_idregcobro, tra.cobroscata_status
        // FROM catalogo_cobros AS tra 
        // INNER JOIN catalogo_cobros_items AS ti ON (ti.cobroscata_idsystemcobrocat = tra.idsystemcobrocat)
        // INNER JOIN catalogo_clientes AS cli ON (cli.idsystemcli = ti.clientes_idsystemcli)
        // INNER JOIN deliverables AS del ON (ti.id_deliverable=del.id_deliverable) 
        // WHERE ti.catalogo_productos_idsystemcatpro = $id_event 
        // AND tra.cobroscata_status = 1
        // $filter_name $filter_lastname1 $filter_lastname2
        // GROUP BY del.participant_number ORDER BY cli.clientes_nombre";
        // die($instruction );

        $consulta = $mysqli->query($instruction);

        $table = '';
        while ($row = mysqli_fetch_array($consulta)) {
            $uriPhonto = "";
            if( $row['clientes_photo'] !== '' && $row['clientes_photo'] != '-' ) {
                $uriPhonto = '/images/clientes/fotos/' . $row['clientes_photo'];
            }
            $table = $table . '
                    <tr>
                        <td>
                            <div class="form-check radio_table">
                                <input type="radio" id="" value="' . $row['participant_number'] . '" data-id="' . $row['participant_number'] . '" name="radios">
                            </div>
                        </td>
                        <td>' . $row['clientes_nombre'] . '</td>
                        <td>' . $row['clientes_apellido1'] . '</td>
                        <td>' . $row['clientes_apellido2'] . '</td>
                        <td>' . $row['participant_number'] . '</td>
                        <td>
                            <figure>
                                <img class="img_avatar_search_avanced" src="'.$uriPhonto.'" alt="">
                            </figure>
                        </td>
                    </tr>
                ';
        }

        $mysqli->close();

        echo $table;
    } else if ($_POST["option"] == 'cambiarEstadoCheckin') { // Ralizar checkIn
        $dateCheckin = date('Y-m-d H:i:s');
        $id_deliverable = decrypt($_POST["code"], $key);
        $participant_number = $_POST["code2"];

        $mysqli = conectar();
        // $query = $mysqli->prepare(" SELECT participant_number
        //                             FROM deliverables
        //                             WHERE id_deliverable = ?");
        // $query -> bind_param('i',$id_deliverable);
        // $query -> execute();
        // $query -> bind_result($participant_number);
        // $query -> fetch();
        // $query -> close();

        $check = 1;
        $query = $mysqli->prepare("UPDATE deliverables SET checkin=?, date_checkin = ?  WHERE participant_number = ? ");
        $query->bind_param('iss', $check, $dateCheckin, $participant_number);
        $query->execute();
        //$query -> fetch();

        if ($query->affected_rows > 0) {
            $response['status'] = true;
            $response['message'] = "Bienvenido";
            $response['description'] = "Se actualizó el check in.";
        } else {
            $response['status'] = false;
            $response['message'] = "No se pudo actualizar check in.";
        }
        $query->close();
        $mysqli->close();
        die(json_encode($response));
    } else if ($_POST["option"] == 'generateCredential') {

        $mysqli = conectar();

        $id_deliverable = decrypt($_POST["code"]);
        $available = 1;


        if ($_POST["code2"] != '') {
            $id_event = decrypt($_POST["code2"]);
        } else {
            $query = $mysqli->prepare(" SELECT rol.id_event
                                            FROM users AS usr
                                            INNER JOIN roles AS rol ON usr.id_role=rol.id
                                            WHERE usr.id_user = ? AND usr.available = ?");
            $query->bind_param('ii', $id_user, $available);
            $query->execute();
            $query->bind_result($id_event);
            $query->fetch();
            $query->close();
        }


        $query = $mysqli->prepare(" SELECT ev.id_event,ev.domain,ev.show_qr2,credential_version,
                                               ow.phone, ow.email
                                        FROM events AS ev
                                        INNER JOIN owners AS ow ON ev.id_owner=ow.id_owner
                                        WHERE ev.id_event = ? AND ev.available = ?");
        $query->bind_param('ii', $id_event, $available);
        $query->execute();
        $query->bind_result($existEvent, $domain, $show_qr2, $justLabel, $ow_phone, $ow_email);
        $query->fetch();
        $query->close();

        $query = $mysqli->prepare(" SELECT del.id_deliverable,del.participant_number,
                                               cli.name,cli.lastname1,cli.lastname2,
                                               tr.name AS tr_name
                                        FROM deliverables AS del
                                        INNER JOIN transaction_items AS ti ON ti.id_deliverable=del.id_deliverable
                                        INNER JOIN transactions AS tra ON tra.id_transaction=ti.id_transaction
                                        INNER JOIN clients AS cli ON cli.id_client=tra.id_client
                                        INNER JOIN general_items AS gi ON gi.id_general_item=ti.id_general_item
                                        INNER JOIN detail_tickets AS dt ON dt.id_detail_ticket=gi.id_detail_ticket
                                        INNER JOIN ticket_roles AS tr ON tr.id_ticket_role=dt.id_ticket_role
                                        WHERE del.id_deliverable = ? AND del.available = ? AND tra.id_event = ?");
        $query->bind_param('iii', $id_deliverable, $available, $id_event);
        $query->execute();
        $query->bind_result($existRow, $idParticipant, $name, $lastname1, $lastname2, $typeTicket);
        $query->fetch();
        $query->close();

        if ($existRow && $existEvent) {

            $credential = array();
            $credential['id_deliverable'] = encrypt($id_deliverable);
            $credential['idParticipant'] = $idParticipant;
            $credential['name'] = $name;
            $credential['lastname1'] = $lastname1;
            $credential['lastname2'] = $lastname2;
            $credential['typeTicket'] = $typeTicket;

            $credential['domain'] = $domain;
            $credential['show_qr2'] = $show_qr2;
            $credential['ow_phone'] = $ow_phone;
            $credential['ow_email'] = $ow_email;

            if ($justLabel == 1) {
                $html = template_credential_justlabel($credential);
            } else {
                $html = template_credential($credential);
            }
            $namePdf = 'credential_' . $idParticipant . '.pdf';
            $pathPdf = '../../../images/clients/credentials/' . $namePdf;

            generatePDF($html, $pathPdf, 'letter', 'portrait');


            $query = $mysqli->prepare("UPDATE deliverables SET file_credential=?  WHERE participant_number = ? ");
            $query->bind_param('ss', $namePdf, $idParticipant);
            $query->execute();
            //$query -> fetch();
            $query->close();

            $data = array();
            $data['respuesta'] = 'success';
            $data['pdf'] = '../images/clients/credentials/' . $namePdf;
            $data['pdfName'] = $namePdf;
        } else {

            $data = array();
            $data['respuesta'] = 'error';
        }

        $mysqli->close();

        echo json_encode($data);
    } else if ($_POST["option"] == 'generateEmailCredential') {

        $mysqli = conectar();


        $id_deliverable = decrypt($_POST["code"]);
        $available = 1;


        if ($_POST["code2"] != '') {
            $id_event = decrypt($_POST["code2"]);
        } else {
            $query = $mysqli->prepare(" SELECT rol.id_event
                                            FROM users AS usr
                                            INNER JOIN roles AS rol ON usr.id_role=rol.id
                                            WHERE usr.id_user = ? AND usr.available = ?");
            $query->bind_param('ii', $id_user, $available);
            $query->execute();
            $query->bind_result($id_event);
            $query->fetch();
            $query->close();
        }


        $email = $_POST["email"];



        $query = $mysqli->prepare(" SELECT ev.id_event,ev.domain,ev.logo,ev.name,
                                               ow.whats_telegram
                                        FROM events AS ev
                                        INNER JOIN owners AS ow ON ev.id_owner=ow.id_owner
                                        WHERE ev.id_event = ? AND ev.available = ?");
        $query->bind_param('ii', $id_event, $available);
        $query->execute();
        $query->bind_result($existEvent, $domain, $logoEvent, $nameEvent, $ow_phone);
        $query->fetch();
        $query->close();

        $query = $mysqli->prepare(" SELECT del.id_deliverable,del.participant_number,del.file_credential,
                                               cli.name,cli.lastname1,cli.lastname2,
                                               tra.id_secondary
                                        FROM deliverables AS del
                                        INNER JOIN transaction_items AS ti ON ti.id_deliverable=del.id_deliverable
                                        INNER JOIN transactions AS tra ON tra.id_transaction=ti.id_transaction
                                        INNER JOIN clients AS cli ON cli.id_client=tra.id_client
                                        INNER JOIN general_items AS gi ON gi.id_general_item=ti.id_general_item
                                        INNER JOIN detail_tickets AS dt ON dt.id_detail_ticket=gi.id_detail_ticket
                                        INNER JOIN ticket_roles AS tr ON tr.id_ticket_role=dt.id_ticket_role
                                        WHERE del.id_deliverable = ? AND del.available = ? AND tra.id_event = ?");
        $query->bind_param('iii', $id_deliverable, $available, $id_event);
        $query->execute();
        $query->bind_result(
            $existRow,
            $idParticipant,
            $credential,
            $name,
            $lastname1,
            $lastname2,
            $folio
        );
        $query->fetch();
        $query->close();

        if ($existEvent && $existRow) {

            date_default_timezone_set('America/Mexico_City');
            $current_date = date("d/m/Y H:i:s");

            $dataEmail = array();
            $dataEmail['domain'] = $domain;
            $dataEmail['logoEvent'] = $logoEvent;
            $dataEmail['whats_telegram'] = $ow_phone;

            $dataEmail['idParticipant'] = $idParticipant;
            $dataEmail['credential'] = $credential;
            $dataEmail['name'] = $name;
            $dataEmail['folio'] = $folio;
            $dataEmail['current_date'] = $current_date;

            $html = template_email_credential($dataEmail);

            $data = array();
            $data['respuesta'] = 'success';
            $data['fromName'] = $nameEvent;
            $data['subject'] = 'Gafete para ' . $nameEvent;
            $data['bodyEmail'] = $html;
            $data['toEmail'] = $email;
            $data['toNameEmail'] = $name . ' ' . $lastname1 . ' ' . $lastname2;
        } else {
            $data = array();
            $data['respuesta'] = 'error';
        }

        $mysqli->close();

        echo json_encode($data);
    }
}


// Función para encriptar
function encrypt($plaintext, $key)
{
    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext = openssl_encrypt($plaintext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($iv . $ciphertext);
}

// Función para desencriptar
function decrypt($ciphertext, $key)
{
    $cipher = "aes-256-cbc";
    $ciphertext = base64_decode($ciphertext);
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = substr($ciphertext, 0, $ivlen);
    $ciphertext = substr($ciphertext, $ivlen);
    return openssl_decrypt($ciphertext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
}
