<?php
    use PHPMailer\PHPMailer\PHPMailer;  //Librerias para que envie correo
    use PHPMailer\PHPMailer\Exception;  //Librerias para que envie correo

    require 'PHPMailer/Exception.php';    //Se requiere para poder enviar el correo
    require 'PHPMailer/PHPMailer.php';    //Se requiere para poder enviar el correo
    require 'PHPMailer/SMTP.php';         //Se requiere para poder enviar el correo
    
	function enviar_correo($destinatario,$asunto,$mensaje){
	    session_start();
	   require_once ('../../php/conexion.php');
	   $mysqli = conectar();
	   
        
		$idconfig=1;
		$query = $mysqli->prepare(" SELECT configuracion_valor FROM configuracion WHERE configuracion_id = ?");
        $query -> bind_param('i',$idconfig);
        $query -> execute();
        $query -> bind_result($emailNotificador);
        $query -> fetch();
        $query -> close();
        
        $idconfig=2;
		$query = $mysqli->prepare(" SELECT configuracion_valor FROM configuracion WHERE configuracion_id = ?");
        $query -> bind_param('i',$idconfig);
        $query -> execute();
        $query -> bind_result($protocoloSMTP);
        $query -> fetch();
        $query -> close();
        
        $idconfig=3;
		$query = $mysqli->prepare(" SELECT configuracion_valor FROM configuracion WHERE configuracion_id = ?");
        $query -> bind_param('i',$idconfig);
        $query -> execute();
        $query -> bind_result($servidor);
        $query -> fetch();
        $query -> close();
        
        $idconfig=4;
		$query = $mysqli->prepare(" SELECT configuracion_valor FROM configuracion WHERE configuracion_id = ?");
        $query -> bind_param('i',$idconfig);
        $query -> execute();
        $query -> bind_result($usuarioSMTP);
        $query -> fetch();
        $query -> close();
        
        $idconfig=5;
		$query = $mysqli->prepare(" SELECT configuracion_valor FROM configuracion WHERE configuracion_id = ?");
        $query -> bind_param('i',$idconfig);
        $query -> execute();
        $query -> bind_result($passSMTP);
        $query -> fetch();
        $query -> close();
        
        $mail = new PHPMailer(true);    //Método para enviar correos.
		try {
		    //Server settings
		    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
		    $mail->isSMTP();                                            // Set mailer to use SMTP
		    $mail->Host       = $servidor;    //Specify main and backup SMTP servers,smtp.gmail.com,p3plcpnl0497.prod.phx3.secureserver.net
		    $mail->SMTPAuth   = true;                                              // Enable SMTP authentication
		    $mail->Username   = $usuarioSMTP;                     // SMTP username
		    $mail->Password   = $passSMTP;                               // SMTP password
		    $mail->SMTPSecure = $protocoloSMTP;                                  // Enable TLS encryption, `ssl` also accepted,tls
		    $mail->Port       = 587;

		                                     // TCP port to connect to
			
		    //Recipients
		    $mail->setFrom($emailNotificador,utf8_decode('IESDE'));
		    $mail->addAddress(''.$destinatario);     // Add a recipient
		    //$mail->addBCC('noreply@iesde.mx');
		    $mail->addBCC('junior.piquero2@gmail.com');
		    //$mail->addBCC($_SESSION['email_logueo']);

		    // Attachments para imagenes.
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = utf8_decode($asunto);
		    $mail->Body    = utf8_decode($mensaje);  //
		    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();  //Se envia el correo
		    
		} catch (Exception $e) {    //Si lo que intento no fue exitoso entra a la siguiente opcion.
		   
		   //die(json_encode($e->error));
		    //console.log($e->error);
			return 0;
		}
		return 1;
		
	}
	
	function encrypt($string, $key = 'PrivateKey', $secret = 'SecretKey', $method = 'AES-256-CBC') {
	    // hash
	    $key = hash('sha256', $key);
	    // create iv - encrypt method AES-256-CBC expects 16 bytes
	    $iv = substr(hash('sha256', $secret), 0, 16);
	    // encrypt
	    $output = openssl_encrypt($string, $method, $key, 0, $iv);
	    // encode
	    return base64_encode($output);
	}

	function decrypt($string, $key = 'PrivateKey', $secret = 'SecretKey', $method = 'AES-256-CBC') {
	    // hash
	    $key = hash('sha256', $key);
	    // create iv - encrypt method AES-256-CBC expects 16 bytes
	    $iv = substr(hash('sha256', $secret), 0, 16);
	    // decode
	    $string = base64_decode($string);
	    // decrypt
	    return openssl_decrypt($string, $method, $key, 0, $iv);
	}

?>