<?php
    //getTemplateactivatedaccount("Cesar Osgual Velazquez","Velazquez Alvarez","","","","");
    function getTemplateactivatedaccount($nameUser,$uriAccountActivate, $userGenerate, $urlSite){

       

       /*  $client = $regUser->getClient(2);

        $dominio = $consulta->getConfig(9); */

        
       /*  if($format=='mail'){
            
            $imgLogo = $dominio['configuracion_valor']."/images/logo_carpey2.png";
            
        }else{ 
            $urlLogo = $dominio['configuracion_valor']."/images/logo_carpey2.png";
            $imgLogo = "data:image/png;base64," . base64_encode(file_get_contents($urlLogo));
            
        } */
        $imgLogo =  $urlSite . "/images/logo_email.png";
        date_default_timezone_set('America/Mexico_City');
        $current_date =date("d/m/Y H:i:s");

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
                    height: 70px;
                    background-color: #000;
                }
                .table__header{
                    width: 100%;
                    background: #000;
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
                    width: 15%;
                    text-align: center;
                    padding-top: 10px;
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

                .title__activate__account{
                    font-family: 'Ubuntu', sans-serif;
                    font-size: 25px;
                    font-weight: bold;
                    height: 80px;
                }

                .btn__activate__account{
                    width: 240px;
                    height: 38px;
                    border: none;
                    border-radius: 5px;
                    background-color: #ff007a;
                    color: white;
                    cursor: pointer;
                }
              
                
                .table__info__peronal{
                    width: 100%;
                }


             
                
                .table__info__peronal td{
                    height: 2.5rem;
                    padding-left: 2rem;
                    font-size: 16px;
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
                    color: #ff007a;
                }

                .text__bold{
                    font-family: 'Ubuntu', sans-serif;
                    font-weight: bold; 
                }



                .content_info{
                    margin-bottom: 30px;
                }

                .table_list_products{
                    width: 100%;

                    border-collapse: separate;
                    border-spacing: 0 45px;
                }

               

                .table_inputs{
                    width: 60%;
                }

               
                .table_inputs{
                    width: 60%;
                }
                

                .table_inputs td{
                    width: 33.3%;
                }

               

               
                    .custom-button1{
                       /*  width: 240px; 
                        height:38px; */ 
                        border-radius: 3px;
                        border: solid 1px  #01002f;
                        background-color:  #01002f;
                        color : white !important;   
                        font-size: 14px;
                        font-weight: bold; 
                        text-decoration: none;
                        text-align:center;
                        padding: 5px 9px;
                    }
                

                @media only screen and (max-width: 500px)  {
                    .title_header{
                        font-weight: bold; 
                        font-size: 15px;
                        color: white; 
                    }
                    .title_header__important{
                        font-size: 13px;
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

                    .custom-button1{
                        font-size: 11px; 
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
                                <img src="<?php echo $imgLogo;?>" 
                                alt="" width="75" >
                            </td>
                            <td class="td__title"> 
                                <span class="title_header__important"> 
                                    Activación de cuenta
                                </span>
                            </td>
                            <td class="td__title_date">
                                <span class="title_header__date"><?php echo $current_date; ?></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="content-body">
                    <table>
                        <tr>
                            <td class="title__email"> 
                                <span>
                                    <?php  
                                        echo "Hola $nameUser, tu registro se ha realizado con éxito. Haz click en el siguiente botón para activar tu cuenta.";
                                        echo "<br>";
                                        echo "<span class='text__bold'>Usuario:</span> <span class=' text__bold text__color'>$userGenerate</span>";
                                    ?> 
                                </span> 
                            </td>
                        </tr>
                        <tr>
                            <td class="title__activate__account">
                                <span>Activar cuenta:</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="<?php echo $uriAccountActivate ?>">
                                    <button class="btn__activate__account">Activar mi cuenta</button>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>


                



                <div class="line__separator"></div>
                <div class="content__footer">
                    <p> <strong>Políticas del servicio</strong> </p> 

                    <strong> <strong>Consulta nuestro Aviso de Privacidad </strong> </strong>  <br>
                    <strong> <strong> www.erikaoly.com </strong> </strong>
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