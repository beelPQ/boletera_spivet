<?php
use PHPMailer\PHPMailer\PHPMailer;  //Librerias para que envie correo
use PHPMailer\PHPMailer\Exception;  //Librerias para que envie correo

require 'PHPMailer/Exception.php';    //Se requiere para poder enviar el correo
require 'PHPMailer/PHPMailer.php';    //Se requiere para poder enviar el correo
require 'PHPMailer/SMTP.php';         //Se requiere para poder enviar el correo

$mail = new PHPMailer(true);    //Método para enviar correos.

    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'p3plcpnl0497.prod.phx3.secureserver.net';    //Specify main and backup SMTP servers,smtp.gmail.com,p3plcpnl0497.prod.phx3.secureserver.net
    $mail->SMTPAuth   = true;                                              // Enable SMTP authentication
    $mail->Username   = 'noreplay@piquero.com.mx';                     // SMTP username
    $mail->Password   = 'noreplay12';                               // SMTP password
    $mail->SMTPSecure = 'SSL';                                  // Enable TLS encryption, `ssl` also accepted,tls
    $mail->Port       = 587;

    
    
    
    
                                     // TCP port to connect to
	
    //Recipients
    $mail->setFrom('noreplay@piquero.com.mx',utf8_decode('CAI'));
    $mail->addAddress(''.'shosvaldo@gmail.com');     // Add a recipient

    // Attachments para imagenes.
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = utf8_decode('Prueba');
    $mail->Body    = utf8_decode('Hola');  //
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //$mail->send();  //Se envia el correo
    
    if(!$mail->send()) {
        $error = 'Mail error: '.$mail->ErrorInfo; 
        echo $error;
    } else {
        $error = 'Message sent!';
         echo $error;
    }
    


?>