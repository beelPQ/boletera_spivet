<?php
    //getTemplateContact("Cesar Osgual","Velazquez Alvarez","");
    function getTemplateContact($name, $full_name, $email, $phone, $legendSector, $serviceInteresting){ 
        $date = date("d/m/Y");
    ob_start();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>

            @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap');

            body{
                margin: 0; 
            }
            .content-header{
                width: 100%;
                height: 93px;
                background-color: #01002f;
            }
            .table__header{
                width: 100%;
                background: #01002f;
            }
            .title_header__important{
                font-weight: bold;
                font-stretch: normal;
                font-style: normal;
                line-height: normal;
                font-size: 15px;
                color: white;
                font-family: 'Ubuntu', sans-serif;
                font-weight: bold;
            }
            .title_header__date{
                font-weight: bold;
                font-stretch: normal;
                font-style: normal;
                line-height: normal;
                font-size: 15px;
                color: white;
                font-family: 'Ubuntu', sans-serif;
                font-weight: bold;
            }
            .td__icon{
                width: 10%;
                text-align: center;
            }
            .td__icon img{
                margin-top: 5px;
            }
            .td__title, .td__title_date{
                width: 70%;
            }
            .content-body{
                padding: 2rem;
            }
            .title__email{
                font-family: 'Ubuntu', sans-serif;
                font-size: 15px;
                font-weight: lighter;
            }
            .table__info__peronal{
                width: 100%;
            }
            .table__info__peronal td{
                height: 3rem;
                padding-left: 2rem;
                font-size: 15px;
                font-family: 'Ubuntu', sans-serif;
                font-weight: bold;
                background-color: rgba(114, 170, 190, 0.19);
                border-bottom: solid 1px #01002f;
                border-top: solid 1px #01002f;
            }
            .table__info__personal td span{
                margin-left: 2rem;
            }
            .table__info__detail{
                width: 50%;
                margin-top: 2rem;
                margin-left: 2rem;
                font-family: 'Ubuntu', sans-serif;
            }
            .table__info__detail tr{
               height: 1.5rem;
            }
            .table__info__detail td{
                font-size: 15px;
                width: 2rem;
                height: 3.5rem;
            }

            .line__separator{
                width: 98%;
                border-bottom: solid 1px #01002f;
                margin: 3rem 1rem;
            }
            .content__footer{
                font-family: 'Ubuntu', sans-serif;
                margin-top: 1rem;
                width: 100%;
                text-align: center;
            }
            .text__color{
                color: #72aabe;
            }

            @media only screen and (max-width: 500px)  {
                .title_header{
                    font-weight: bold; 
                    font-size: 15px;
                    color: white; 
                }
                .title_header__important{
                    font-size: 14px;
                }
                .title_header__date{
                    font-size: 10px;
                }
                .td__title, .td__title_date{
                    width: 60%;
                }
                .title__email{
                    font-size: 12px;
                }
                .table__info__peronal td{
                    font-size: 14px;
                }
                .table__info__detail td{
                    font-size: 12px;
                }
                .table__info__detail{
                    width: 100%;
                }
                .content__footer{
                    font-size: 14px;
                }
            }

        </style>
    </head>
    <body>
        <div class="content">
            <div class="content-header">
                <table class="table__header">
                    <tr>
                        <td class="td__icon">
                            <img src="https://carpey.mx/images/logo_carpey2.png" 
                            alt="" width="68" height="68">
                        </td>
                        <td class="td__title"> 
                            <span class="title_header__important">Solicitud de contacto</span>
                        </td>
                        <td class="td__title_date">
                            <span class="title_header__date">Fecha de solicitud : <?php echo $date?></span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="content-body">
                <table>
                    <tr>
                        <td class="title__email"> <span> Hola <?php echo $name;?> <?php echo $full_name;?>, gracias por escribirnos. Un integrante del equipo de Carpey se pondrá en contacto contigo.</span> </td>
                    </tr>
                    <tr></tr>
                </table>
            </div>
            <div class="">
                <table class="table__info__peronal">
                    <tr>
                        <td>
                            <span>Datos personales </span>
                        </td>
                    </tr>
                </table> 
                
            </div>
            <div>
                <table class="table__info__detail">
                    <tr>
                        <td>
                            <span> <strong> Nombre</strong> </span> <br>
                            <span> <?php echo $name; ?> </span>
                        </td>
                        <td>
                            <span> <strong> Apellidos</strong> </span> <br>
                            <span> <?php echo $full_name; ?> </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span> <strong> Email:</strong> </span> <br>
                            <span> <?php echo $email; ?> </span>
                        </td>
                        <td>
                            <span> <strong> Whatsapp</strong> </span> <br>
                            <span> <?php echo $phone; ?> </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span> <strong> Sector:</strong> </span> <br>
                            <span> <?php echo $legendSector; ?> </span>
                        </td>
                        <td>
                            <span> <strong> Ineteresado en:</strong> </span> <br>
                            <span> <?php echo $serviceInteresting; ?> </span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="line__separator"></div>
            <div class="content__footer">
                <p> <strong>Políticas del servicio</strong> </p> 

                <strong> <strong>Consulta nuestro Aviso de Privacidad </strong> </strong>  <br>
                <strong> <strong> www.Carpey.com.mx </strong> </strong>
                <p class="text__color"> <strong> Powered by: </strong> </p>
                <strong> <strong> Piquero Tecnología & Deportes </strong> </strong> <br>
                <strong class="text__color"> <strong> www.piquero.com.mx </strong> </strong> <br>
                <strong> <strong> Linkedin: Piquero Tecnología & Deportes </strong> </strong>
            </div>
        </div>

        
    </body>
    </html>

<?php

    $html = ob_get_clean();
    //echo $html;
    return $html;
    }
?>