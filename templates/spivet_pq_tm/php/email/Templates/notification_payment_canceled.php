<?php
    
    function getTemplatePayCanceledNotif($id_payment,$format,$id_notification){

        
        
        date_default_timezone_set('America/Mexico_City');
        $current_date =date("d/m/Y");

        $consulta = new ConsultaGeneral();

        $payment = $consulta->getPlanPayment($id_payment);
        $payement_item = $consulta->getPaymentItem($payment['id_payment_item']);
        $client = $consulta->getClient($payement_item['clientes_idsystemcli']);
        $product = $consulta->getProduct($payement_item['catalogo_productos_idsystemcatpro']);


        $dominio = $consulta->getConfig(9);

        // Provides: <body text='black'>
        $onlyDom = str_replace("https://", "", $dominio['configuracion_valor']);
        $onlyDom = str_replace("http://", "", $onlyDom);


        //la ruta es a partir del php que manda a llamar esta funcion
        $imgLogo = $dominio['configuracion_valor']."/images/logo_pdf.png";


        //$iconStatus = $dominio['configuracion_valor']."/images/icon_check_disabled.png";
    

        
        ob_start();
?>
        <head>
            <style type="text/css">

                @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@500;700&display=swap');
                
               
                *{
                    margin: 0;
                }

                .customButton{
                    padding: 10px 60px 11px;

                    background-color: #ff007a;
                    color: #fff !important;
                    text-decoration: none !important;

                    font-size: 14.4px;
                    font-family: 'Ubuntu', sans-serif;
                    font-weight: 700;

                    border-radius: 3px;
                }




                .content_header{
                    width: 100%;
                    height: 93px;

                    background-color: #16171b;
                }

                .header_logo{
                    width: 20%;
                    height: 100%;

                    padding-left: 18px;

                }

                .header_logo_text{

                    width: 47%;
                    height: 100%;

                    color: #fff;
                    font-size: 20px;
                    font-family: 'Ubuntu', sans-serif;
                    font-weight: 700;
                }

                .header_text{
                    width: 33%;
                    height: 100%;

                    padding-right: 18px;

                    color: #fff;
                    font-size: 20px;
                    font-family: 'Ubuntu', sans-serif;
                    font-weight: 700;
                    text-align: right;
                }






                .content_information{
                   padding-top: 5px;
                   padding-bottom: 50px;
                }

                .row_information{

                    padding-left: 12px;
                    padding-right: 12px;
                    padding-top: 30px;
                    padding-bottom: 15px;
                   
                    /*word-break: break-all;*/
                    word-wrap:break-word
                }

                .information_text1{
                    color: #000;
                    font-size: 14.4px;
                    font-family: 'Ubuntu', sans-serif;
                    font-weight: 500;
                }




                .header_table_info{
                    background-color: #000;
                    color: #fff;
                    font-family: 'Ubuntu', sans-serif;
                    font-weight: 700;
                    font-size: 14.4px;

                    text-align: center;
                    padding: 10px 20px;
                }

                .content_table_info{
                    
                    color: #000;
                    font-family: 'Ubuntu', sans-serif;
                    font-size: 14.4px;

                    text-align: center;

                    padding: 10px 20px;
                }




                .content_footer{
                    border-top: 1px solid #16171b;
                    padding-top: 48px;
                }

                .row_footer{
                    margin-bottom: 12px;
                    line-height: 1.1;
                }

                .footer_text1, .footer_text1 a {
                    font-size: 14.4px;
                    font-family: 'Ubuntu', sans-serif;
                    font-weight: 700;
                    color: #000 !important;
                    text-decoration: none !important;
                }

                .footer_text2, .footer_text2 a{
                    font-size: 14.4px;
                    font-family: 'Ubuntu', sans-serif;
                    font-weight: 700;
                    color: #ff007a !important;
                    text-decoration: none !important;
                }

                
                
            </style>
        </head>

        <body>
            <div class="content_header">

                <table class="content_header">
                    <tr>
                        <td class="header_logo">
                            
                            <img class="logo" src="<?php echo $dominio['configuracion_valor'];?>/templates/unity/common/scripts/notification_read.php?code=<?php echo $id_notification;?>" width="227px" height="52px"/>
                        </td>
                        <td class="header_logo_text">
                            Entrenamiento cancelado
                        </td>
                        <td class="header_text">
                            <?php echo $current_date;?>
                        </td>
                    </tr>
                </table>                
            </div>

            <div class="content_information">
                <div class="row_information">
                    <span class="information_text1">
                        Hola <?php echo $client["clientes_nombre"];?> <?php echo $client["clientes_apellido1"];?> <?php echo $client["clientes_apellido2"];?> sabemos que en ocasiones las metas se ven modificadas por circunstancias ajenas a nuestros atletas, cada uno de nuestros entrenadores continua haciendo su trabajo para ti. Sin embargo, tu plan de entrenamiento de 
                        <b><?php echo $product["catalogo_productos_nombre"];?></b> ha sido cancelado, por lo que si deseas volver a recibir estos entrenamientos debes realizar una nueva compra, te invitamos a reactivarte, sigue los siguientes pasos:
                    </span>
                </div>

                <div class="row_information">
                    <span class="information_text1">1.Da clic en el botón de abajo para iniciar sesión.</span><br>
                    <span class="information_text1">2.Inicia sesión proporcionando tus datos de acceso.</span><br>
                    <span class="information_text1">3.Al iniciar sesión, en el menú, da clic en la opción de <b>Planes de entrenamiento</b>.</span><br>
                    <span class="information_text1">4.Selecciona el plan de entrenamiento que deseas comprar y sigue el proceso de compra.</span><br>
                </div>


                <div class="row_information" align="center">
                    <a href="<?php echo $dominio['configuracion_valor'];?>/index.php/iniciar-sesion.html" class="customButton" target="_blank">Ir a inicio de sesión</a>
                </div>
            </div>


            <div class="content_footer">

                <div class="row_footer" align="center">
                    <span class="footer_text1">Ayuda y/o dudas</span><br>
                    <span class="footer_text1">Teléfono: 55 86 14 04 45</span><br>
                    <span class="footer_text1">suscripcion@erikaoly.com</span>
                </div>

                <div class="row_footer" align="center">
                    <span class="footer_text1">Políticas del servicio</span>
                </div>

                <div class="row_footer" align="center"> 
                    <span class="footer_text1">Consulta nuestro Aviso de Privacidad</span><br>
                    <span class="footer_text1"><a href="<?php echo $dominio['configuracion_valor'];?>/index.php/aviso-de-privacidad"><?php echo $onlyDom;?></a></span>
                </div>

                <div class="row_footer" align="center"> 
                    <span class="footer_text2">Powered by:</span>
                </div>

                <div class="row_footer" align="center"> 
                    <span class="footer_text1">Piquero Tecnología & Deportes</span><br>
                    <span class="footer_text2">www.piquero.com.mx</span><br>
                    <span class="footer_text1">LinkedIn: Piquero Tecnología & Deportes</span>
                </div>
                
            </div>

          
        </body>
        

<?php

        $html = ob_get_clean();
        //echo $html;
        return $html;
    }
?>