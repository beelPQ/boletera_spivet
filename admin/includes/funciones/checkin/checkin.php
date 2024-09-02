<?php


// require_once ('../general/pdf.php');


// require_once ('../general/general.php');
// require_once ('templates.php');

// $pathRoot = $_SERVER['DOCUMENT_ROOT'];
// require_once("$pathRoot/templates/spivet_pq_tm/php/email/PHPMailer/PHPMailer.php");
// require_once("$pathRoot/templates/spivet_pq_tm/php/email/PHPMailer/SMTP.php");

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';



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

    if ($_POST["option"] == 'busquedaManual') {
        $mysqli = conectar();
        $participant_number = $_POST["code"];
        $available = 1;
        $id_event = $_POST["code2"];


        // $response['id_event'] = $id_event;

        $strQuery = "";
        // if( is_int($participant_number) ) {
        if ((int)$participant_number > 0) {
            $strQuery = "SELECT del.participant_number, trans.cobroscata_idregcobro, cli.clientes_idsolicitud, cli.clientes_nombre,cli.clientes_apellido1,cli.clientes_apellido2, cli.clientes_email, cli.clientes_telefono, cli.clientes_photo, del.checkin, tranItem.modality, del.id_deliverable, del.participant_pin, del.file_qr1, del.file_qr2, del.file_credential, del.file_certificate, del.file_lodging, prod.catalogo_productos_fechafin
                FROM deliverables AS del
                INNER JOIN catalogo_cobros_items AS tranItem ON (tranItem.id_deliverable = del.id_deliverable)
                LEFT JOIN catalogo_cobros AS trans ON (trans.idsystemcobrocat = tranItem.cobroscata_idsystemcobrocat)
                LEFT JOIN catalogo_clientes AS cli ON (cli.idsystemcli = tranItem.clientes_idsystemcli)
                LEFT JOIN catalogo_productos AS prod ON (tranItem.catalogo_productos_idsystemcatpro = prod.idsystemcatpro)     
                WHERE trans.cobroscata_status = 1
                AND tranItem.catalogo_productos_idsystemcatpro = $id_event
                AND trans.cobroscata_idregcobro = $participant_number ";
            // AND tranItem.modality = 'Presencial'
        } else {
            $strQuery = "SELECT del.participant_number, trans.cobroscata_idregcobro, cli.clientes_idsolicitud, cli.clientes_nombre,cli.clientes_apellido1,cli.clientes_apellido2, cli.clientes_email, cli.clientes_telefono, cli.clientes_photo, del.checkin, tranItem.modality, del.id_deliverable, del.participant_pin, del.file_qr1, del.file_qr2, del.file_credential, del.file_certificate, del.file_lodging, prod.catalogo_productos_fechafin
            FROM deliverables AS del
            INNER JOIN catalogo_cobros_items AS tranItem ON (tranItem.id_deliverable = del.id_deliverable)
            INNER JOIN catalogo_cobros AS trans ON (trans.idsystemcobrocat = tranItem.cobroscata_idsystemcobrocat)
            INNER JOIN catalogo_clientes AS cli ON (cli.idsystemcli = tranItem.clientes_idsystemcli)
            LEFT JOIN catalogo_productos AS prod ON (tranItem.catalogo_productos_idsystemcatpro = prod.idsystemcatpro)     
            WHERE trans.cobroscata_status = 1
            AND tranItem.catalogo_productos_idsystemcatpro = $id_event
            AND del.participant_number = '$participant_number'";
            // AND tranItem.modality = 'Presencial'
        }

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
        $query->bind_result($idParticipant, $idRegCobro, $idsolicitud, $name, $lastname1, $lastname2, $email, $phone, $photo, $checkin, $modality, $idDeliverable, $nip, $qr1, $qr2, $credential, $certificate, $lodging, $endDate);
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
                "certificate" => $certificate != '-' && $certificate != '' ? $certificate : '',
                "gafete" => $credential != '-' && $credential != '' ? $credential : '',
                "pdf" => $credential != '-' && $credential != '' ? '/admin/images/clients/credentials/' . $credential : '',
                "endDate" => "$endDate 23:59:59",
            ]);
        }
        $response['status'] = true;
        $response['message'] = "Registros encontrados";
        // $response['description'] = $strQuery;

        $response['data'] = $dataResult;
        $query->close();
        $mysqli->close();
        die(json_encode($response));

        //<== Hasta aqui llegamos

        // P-MPM4

        if ($idParticipant != '') {
            $queryNameRol = "SELECT tColor.color_code
                FROM deliverables AS deliver
                INNER JOIN catalogo_cobros_items AS ti ON ti.id_deliverable = deliver.id_deliverable
                INNER JOIN catalogo_cobros AS trans ON trans.id_transaction = ti.id_transaction
                INNER JOIN catalogo_clientes AS cli ON cli.id_client = trans.id_client
                INNER JOIN general_items AS gi ON gi.id_general_item = ti.id_general_item
                INNER JOIN detail_tickets AS detTicket ON detTicket.id_detail_ticket = gi.id_detail_ticket
                INNER JOIN ticket_roles AS tRole ON tRole.id_ticket_role = detTicket.id_ticket_role
                INNER JOIN ticket_colors AS tColor ON tColor.id_ticket_color = detTicket.id_ticket_color
                WHERE deliver.participant_number = ? AND deliver.available = 1 AND trans.id_event = ?";
            $queryResColor = $mysqli->prepare($queryNameRol);
            // Verificar si la preparación de la consulta tuvo éxito
            if (!$queryResColor) {
                $response['status'] = false;
                $response['message'] = "Error en la preparación de la consulta";
                $response['description'] = $mysqli->error;
                die(json_encode($response));
            }
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
            $response['gafete'] = $credential != '-' && $credential != '' ? $credential : '';
            $response['pdf'] = $credential != '-' && $credential != '' ? '../images/clients/credentials/' . $credential : '';
            $response['ev_name'] = $ev_name;
            $response['domain'] = $domain;
            $response['code'] = encrypt($existRow);

            $response['color'] = $color ?? '';
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
        // Considerar agregar la confición AND ti.modality = 'Presencial' para que solo se muestren los participantes que están en presencial [MOroni - 29Aug2024]
        // Se agregó la confición AND del.participant_number <> '' para que solo se muestren los participantes que hayan sido registrados correctamente [MOroni - 29Aug2024]
        $instruction = "SELECT del.participant_number, cli.clientes_nombre, cli.idsystemcli, cli.clientes_apellido1, cli.clientes_apellido2, cli.clientes_telefono, cli.clientes_email, cli.clientes_photo, ti.modality, del.id_deliverable, del.checkin, tra.cobroscata_idregcobro, tra.cobroscata_status, del.participant_pin, tra.cobroscata_idregcobro FROM catalogo_cobros AS tra INNER JOIN catalogo_cobros_items AS ti ON (ti.cobroscata_idsystemcobrocat = tra.idsystemcobrocat) INNER JOIN catalogo_clientes AS cli ON (cli.idsystemcli = ti.clientes_idsystemcli) LEFT JOIN deliverables AS del ON (ti.id_deliverable=del.id_deliverable) WHERE ti.catalogo_productos_idsystemcatpro = $id_event AND del.participant_number <> '' AND tra.cobroscata_status = 1 $filter_name $filter_lastname1 $filter_lastname2 GROUP BY del.participant_number, cli.clientes_nombre, cli.idsystemcli, cli.clientes_apellido1, cli.clientes_apellido2, cli.clientes_telefono, cli.clientes_email, cli.clientes_photo, ti.modality, del.id_deliverable, del.checkin, tra.cobroscata_idregcobro, tra.cobroscata_status, del.participant_pin, tra.cobroscata_idregcobro ORDER BY cli.clientes_nombre";

        // die($instruction);

        $consulta = $mysqli->query($instruction);

        $table = '';
        while ($row = mysqli_fetch_array($consulta)) {
            $uriPhonto = "";
            if ($row['clientes_photo'] !== '' && $row['clientes_photo'] != '-') {
                $uriPhonto = '/images/clientes/fotos/' . $row['clientes_photo'];
            }
            $isDisabled = ''; // $row['modality'] == 'Virtual' ? 'disabled' : ''; // ? Se desactiva la opción de participantes virtuales
            // $isDisabled = $row['participant_number'] == '' ? 'disabled' : ''; // ? Se desactiva la opción si no se detecta el número de participante

            $table = $table . '
                    <tr>
                        <td>
                            <div class="form-check radio_table">
                                <input type="radio" id="" value="' . $row['participant_number'] . '" data-id="' . $row['participant_number'] . '" data-pin="' . $row['cobroscata_idregcobro'] . '" data-modality="' . $row['modality'] . '" name="radios" ' . $isDisabled . ' >
                            </div>
                        </td>
                        <td>' . $row['clientes_nombre'] . '</td>
                        <td>' . $row['clientes_apellido1'] . '</td>
                        <td>' . $row['clientes_apellido2'] . '</td>
                        <td>' . $row['participant_number'] . '</td>
                        <td>
                            <figure>
                                <img class="img_avatar_search_avanced" src="' . $uriPhonto . '" alt="">
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
        $response['message'] = "La creación de la credencial no está disponible en este momento";
        die(json_encode($response));
    } else if ($_POST["option"] == 'sendEmailCredential') {
        $response = [
            'status' =>  false,
            'message' =>  "",
            'description' =>  "",
            'data' =>  [],
        ];
        // Crear una instancia de PHPMailer
        $mail = new PHPMailer(true);
        try {
            $uriFile = $_POST["uriFile"] ?? '';
            // $completePathFile = $_SERVER['DOCUMENT_ROOT'].$uriFile;
            $completePathFile = $_SERVER['HTTP_ORIGIN'] . $uriFile;
            $id_event = $_POST["course"] ?? '';
            $participantNumber = $_POST["code"] ?? '';

            $mysqli = conectar();
            $strQuery = "SELECT del.participant_number, trans.cobroscata_idregcobro, cli.clientes_idsolicitud, cli.clientes_nombre,cli.clientes_apellido1,cli.clientes_apellido2, cli.clientes_email, cli.clientes_telefono, cli.clientes_photo, del.checkin, tranItem.modality, del.id_deliverable, del.participant_pin, del.file_qr1, del.file_qr2, del.file_credential, del.file_certificate, del.file_lodging, prod.catalogo_productos_fechafin FROM deliverables AS del INNER JOIN catalogo_cobros_items AS tranItem ON (tranItem.id_deliverable = del.id_deliverable) INNER JOIN catalogo_cobros AS trans ON (trans.idsystemcobrocat = tranItem.cobroscata_idsystemcobrocat) INNER JOIN catalogo_clientes AS cli ON (cli.idsystemcli = tranItem.clientes_idsystemcli) LEFT JOIN catalogo_productos AS prod ON (tranItem.catalogo_productos_idsystemcatpro = prod.idsystemcatpro) WHERE trans.cobroscata_status = 1 AND tranItem.catalogo_productos_idsystemcatpro = $id_event AND del.participant_number = '$participantNumber'";
            $query = $mysqli->prepare($strQuery);

            // Verificar si la preparación de la consulta tuvo éxito
            if (!$query) {
                $response['message'] = "No se pudo enviar el correo";
                $response['description'] = "Error en la preparación de la consulta" . $mysqli->error;
                die(json_encode($response));
            }
            // $query->bind_param('sii',$participant_number,$available,$id_event);
            $query->execute();
            // Verificar si la ejecución de la consulta tuvo éxito
            if ($query->errno) {
                $response['message'] = "No se pudo enviar el correo";
                $response['description'] = "Error al ejecutar la consulta" . $query->error;
                die(json_encode($response));
            }
            // $query -> bind_result($existRow,$checkin,$credential,$name,$lastname1,$lastname2,$photo,$email,$phone,$noTra,$status,$tr_name,$idParticipant,$ev_name,$domain);
            $query->bind_result($idParticipant, $idRegCobro, $idsolicitud, $name, $lastname1, $lastname2, $email, $phone, $photo, $checkin, $modality, $idDeliverable, $nip, $qr1, $qr2, $credential, $certificate, $lodging, $endDate);
            // $query -> fetch();
            $dataResult = array();
            // Iterar sobre las filas de resultados
            while ($query->fetch()) {
                $dataResult = [
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
                    "certificate" => $certificate != '-' && $certificate != '' ? $certificate : '',
                    "gafete" => $credential != '-' && $credential != '' ? $credential : '',
                    "pdf" => $credential != '-' && $credential != '' ? '/admin/images/clients/credentials/' . $credential : '',
                    "endDate" => "$endDate 23:59:59",
                ];
            }

            $query->close();
            $mysqli->close();
            // Creación del HTML del correo
            $tmplMailFile = tmplMailFile($dataResult, $completePathFile);


            $hostMail = 'mail.spivet.com.mx';
            $portMail = 465;
            $smtpSecure = 'SSL';
            $nameMail = 'notificador@spivet.com.mx';
            $passMail = 'cin24.belmont';
            $fromMail = 'notificador@spivet.com.mx';

            // $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->CharSet = "utf-8";
            $mail->SMTPDebug  = 0;
            $mail->Host = $hostMail; //'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = $portMail; // 2525;
            $mail->Username =  $nameMail; // 'd0295f0adca216';
            $mail->Password = $passMail; //'4869fe0598e4b7';
            $mail->SMTPSecure = $smtpSecure;
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Habilitar encriptación
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Habilitar encriptación

            // Configuración del correo electrónico
            $mail->setFrom($fromMail, 'Notificador prueba');       // Dirección del remitente
            $mail->addAddress($dataResult['email'], 'Credencial el evento'); // Añadir un destinatario


            // Añadir archivo adjunto
            if($uriFile != '') $mail->addAttachment($_SERVER['DOCUMENT_ROOT'].$uriFile);    // Especifica la ruta al archivo adjunto

            // Contenido del correo
            $mail->isHTML(true);                             // Configurar el correo como HTML
            $mail->Subject = 'Prueba de credencial';         // Asunto del correo
            $mail->Body    = $tmplMailFile;                  // Cuerpo del mensaje en HTML
            $mail->AltBody = 'Este es el mensaje del correo en texto plano'; // Cuerpo del mensaje en texto plano (para clientes que no soportan HTML)

            // Enviar el correo
            // $mail->send();
            if (!$mail->send()) {
                $response['message'] = "No se pudo enviar el correo";
                $response['description'] = $mail->ErrorInfo;
                echo $error;
            } else {
                $response['status'] = true;
                $response['message'] = "El mensaje ha sido enviado";
                $response['description'] = $_SERVER;
            }

            
            $response['data'] = $dataResult;
            die(json_encode($response));
        } catch (Exception $e) {
            $response['message'] = "Exception:  El mensaje no se pudo enviar.";
            $response['description'] = $mail->ErrorInfo;
            die(json_encode($response));
        }
    }


    // ? Guardar el nombre del documento de la credencial en la tabla de deliverables
    else if ($_POST["option"] == 'saveNameDocto') {
        $mysqli = conectar();
        $id_deliverable = decrypt($_POST["code"], $key);
        $nameDocto = $_POST["name"];
        $type = $_POST["type"]; // ? diploma o credential
        $queryPut = $type == 'diploma' ? "UPDATE deliverables SET file_certificate=?  WHERE id_deliverable = ? " : "UPDATE deliverables SET file_credential=?  WHERE id_deliverable = ? ";
        $query = $mysqli->prepare($queryPut);
        $query->bind_param('ss', $nameDocto, $id_deliverable);
        $query->execute();
        //$query -> fetch();
        $query->close();

        $data = array();
        $data['respuesta'] = 'success';
        $data['nameDocto'] = $nameDocto;
        echo json_encode($data);
    }
}


function tmplMailFile($data, $uriFile)
{
    $fullName = $data['name'] . " " . $data['lastname1'] . " " . $data['lastname2'];
    $pathOrigin = $_SERVER['HTTP_ORIGIN'];
    $currentDate = new DateTime();
    $currentDate = $currentDate->format('d/m/Y');
    $html = "
    <head>
        <style>
            html {
                font-family: 'Ubuntu', sans-serif;
            }
            .header {
                width: 100%;
                min-height: 15px;
                background-color: #000;
                padding: 5px;
                color: #fff;
                display: flex;
                align-items: center;
                gap: 10px;
                justify-content: space-between;
            }
            .header h1 {
                margin: 0;
            }

            h3 span {
                color: #ffc300;
            }
        </style>
    </head>
    <body>
        <div class='header'>
            <img src='$pathOrigin/images/logos/spivet.png' alt='Boletera Spivet'>
            <h1>Credential</h1>
            <p>$currentDate </p>
        </div>
        <h4>Hola, $fullName!.</h4>
        <p>Te invitamos a descargar la credencial de tu participante mediante el archivo adjunto.</p>
        <p>Si no es posible descargar el archivo, pudes hacer click en el siguiente enlace: <a href='" . $uriFile . "' download >Descargar credencial</a></p>
        <h3>Código del participante: <span>" . $data['idParticipant'] . "</span></h3>
    </body>";
    $html = str_replace('\r\n', '', $html);
    return $html;
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
