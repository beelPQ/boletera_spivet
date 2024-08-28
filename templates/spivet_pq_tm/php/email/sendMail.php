<?php


    /**
     * TODO se incluye la libreria de phpMailer
     */
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/Exception.php';

    require_once($_SERVER['DOCUMENT_ROOT']."/templates/spivet_pq_tm/php/common.php"); 

    require_once "Templates/receipt.php"; 
    require_once "Templates/reception.php";
    

    
    



    $generalf = new Common();
    //$reg = new ConfigInformationEmail(); 
    $origen = "";
    $regisval = "";
    $userGenerate = "";
    $id_cobro = 0;

    if(isset($_POST["requestOrigin"])){ 
        $origen = $_POST["requestOrigin"];
        if( isset($_POST["code"]) && $_POST["code"] != ""){
            if( $origen=="Payment" ){
                require_once($_SERVER['DOCUMENT_ROOT']."/modules/mod_buycarform/tmpl/controllers/actions.php");
                require_once($_SERVER['DOCUMENT_ROOT']."/modules/mod_buycarform/tmpl/controllers/queries.php");
                $id_cobro = $_POST["code"]; 
            }  
        } 
        
    }

    $urlSite = '';
    $email = '';
    $dataUser = '';  
    $emailsBCC = [];
    $template = '';
    $asuntMessage = "";
    $titleMessage = "Notificador";
    $subjetMail = "";
    
    $bandReception = 0;


    if($origen == "confirmAccount"){
        $asuntMessage = "Activación de cuenta | Erika Oly";
        $titleMessage = "Creacion de usuario"; 
        $userLogin = $generalf::decrypt($userGenerate); 
        $template = getTemplateactivatedaccount($name,$urlActivateAccount,$userLogin, $urlSite); 
        $subjetMail = "Activación de cuenta | Erika Oly"; 
        $bandReception = 1;

    } else if($origen == "Payment"){ 
        
        $consulta = new Consulta();
        $cobro = $consulta->getPayement($id_cobro);
        $client = $consulta->getClient($cobro['clientes_idsystemcli']); 
        $email = $client['clientes_email'];//obtenemos el email y desencriptamos
        
        if($cobro['cobroscata_status']==1){
            $subjetMail = "Comprobante de pago|Boletera Spivet";  
            $titleMessage = "Notificador|Boletera Spivet";
        }else{
            
            if($cobro['forma_depago_IDsystemapades']==5){
                
                $subjetMail = "Solicitud de pago|Boletera Spivet";  
                $titleMessage = "Notificador|Boletera Spivet";
            }
            
            if($cobro['forma_depago_IDsystemapades']==6){
                
                $subjetMail = "Solicitud de pago|Boletera Spivet";  
                $titleMessage = "Notificador|Boletera Spivet";
            }
            
        }  
        $templatePDF = getTemplateReceipt($id_cobro,'pdf');  
        Common::generatePDF($templatePDF,'../../../../files/comprobantes/'.$cobro['cobroscata_pdf']); 
        $template = getTemplateReceipt($id_cobro,'mail'); 
    } 
    /**
     * !IMPORTANTE
     * *Configuracion del correo para el envio de mensaje
     * 
     */ 
    $hostMail = 'sandbox.smtp.mailtrap.io'; //'mail.spivet.com.mx';
    $portMail = 2525; // 587;
    $smtpSecure = 'SSL';
    $nameMail = 'd0295f0adca216'; //'notificador@spivet.com.mx';
    $passMail = '4869fe0598e4b7'; // 'cin24.belmont'; 
    $fromMail = 'notificador@boletera.test'; // 'notificador@spivet.com.mx';
    $fromNameMail = $titleMessage;
    $bodyMail = $template;
    $toMail = $email;
    $toNameMail = "A quien corresponda";

    try {


        //echo "     $email,    $subjetMail,     $hostMail,    $portMail,    $nameMail,   $passMail,    $smtpSecure,   $fromMail                       ";
        $respApplicant = sendEmailActivateAccount($template,  $email, $subjetMail, $hostMail, $portMail, $nameMail, $passMail, $smtpSecure, $fromMail,$emailsBCC);
       
        if($respApplicant){

            if($origen == "notifyTraining"){

                $accion = new AccionGeneral();
                $send_update = $accion->updateTrainingSending($id_training);

            }else if ($origen == "notify_payment" || $origen == "notify_payment_canceled") {

                if($id_notification!=0){
                    $send_update = $accion->updateNotificationSending($id_notification);
                }

                
            }


            $response =[
                'status_code' => 200,
                'message' => "Correo enviado exitosamente a: $toMail"
            ];
            echo json_encode($response);  
        }else{
            $response =[
                'status_code' => 500,
                'message' => "No se pudo enviar el mensaje"
            ];
            echo json_encode($response);
        }

    
    } catch (Exception $e) {
        $response =[
            'status_code' => 500,
            'message' => "Error inesperado.  $e"
        ];
        echo json_encode($response);
    }


    /**
     * *Funcion para enviar el correo a persona client
     * @param template :estructura html del correo a enviar
     * @param email : correo destino
     * @param objEmail : Objeto que contiene la configuracion del envio del email
     * @return bool : status del envio de correo
     */
    function sendEmailActivateAccount($template, $email, $subjetMail, $hostMail, $portMail, $nameMail, $passMail, $smtpSecure, $fromMail, $addBCC=[]){
        try { 
            //!CONFICURACION INICIAL
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->isHTML(true);
            $mail->CharSet = "utf-8";
            $mail->SMTPDebug  = 0;
            $mail->Host = $hostMail; 
            $mail->SMTPAuth = true;
            $mail->Port = $portMail; 
            $mail->Username = $nameMail; 
            $mail->Password = $passMail; 
            //$mail->SMTPSecure = $smtpSecure;
            //Recipients
            $mail->setFrom($fromMail, "Notificador | Spivet"); 
            $mail->addAddress($email, "");

            /* for ($i=0;$i<count($addBCC);$i++) { 
                $mail->addBCC($addBCC[$i]);
            } */

            $mail->addBCC("shosvaldo@hotmail.com");
            $mail->isHTML(true);                                 
            $mail->Subject = $subjetMail; 
            //$mail->Subject = "Prueba"; 
            $mail->Body    = $template;
            $mail->AltBody = 'www';
            //echo "Hola mundo";
            if($mail->send()){
                return true;
            }else{
                return false;
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
?>

