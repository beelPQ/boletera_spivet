<?php

require_once($_SERVER['DOCUMENT_ROOT']."/templates/spivet_pq_tm/php/common.php");
require_once($_SERVER['DOCUMENT_ROOT']."/modules/mod_buycarform/tmpl/controllers/queries.php");



    //getTemplateReceipt(15,"mail");
    function getTemplateReceipt($id_cobro,$format){
        $generalf = new Common();
        $consulta = new Consulta();
        $cobro = $consulta->getPayement($id_cobro);
        $client = $consulta->getClient($cobro['clientes_idsystemcli']);
        
      

        $dominio = $consulta->getConfig(9); 

        if($format=='mail'){
            
            $imgLogo = $dominio['configuracion_valor']."/images/Spivet/Logos/logo_spivet.png";
            
        }else{
            
            $urlLogo = $dominio['configuracion_valor']."/images/Spivet/Logos/logo_spivet.png";
            $imgLogo = "data:image/png;base64," . base64_encode(file_get_contents($urlLogo));
            //$imgLogo = "";
        }

        date_default_timezone_set('America/Mexico_City');
        $current_date =date("d/m/Y H:i:s");


        $name = $client['clientes_nombre'];
        $full_name = '';
        $email = '';
        $phone = '';
        $legendSector = '';
        $serviceInteresting = ''; 

        
        ob_start();
?>
        <!DOCTYPE html>
        <html lang="en">

        <?php if($format=='mail'){ ?>
        <head>
        <?php } ?>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>

                @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap');
                <?php if($format == "pdf"){ ?>
                    @page {
                        margin-left: 0!important;
                        margin-right: 0!important;
                    }
                    body{
                        margin: 0; 
                    }
                <?php }else{ ?>
                    body{
                        margin: 0; 
                    }
                <?php } ?>
                
                .content-header{
                    width: 100%;
                    height: 93px;
                    background-color: #000;
                }
                .table__header{
                    width: 100%;
                    height: 100%;
                    background: #000;
                }
                .table__header tr, .table__header td{
                    
                    height: 100%;
                    
                }
                .table__header td{
                    vertical-align: middle;
                }
                
                
                
                /**#####################################################**/
                <?php if($format=='pdf'){ ?>
                    .title_header__important{
                        font-weight: bold;
                        font-stretch: normal;
                        font-style: normal;
                        line-height: normal;
                        font-size: 13px;
                        color: white;
                        font-family: 'Ubuntu', sans-serif;
                        font-weight: bold;
                    }

                    .title_header__date{
                        font-weight: bold;
                        font-stretch: normal;
                        font-style: normal;
                        line-height: normal;
                        font-size: 13px;
                        color: white;
                        font-family: 'Ubuntu', sans-serif;
                        font-weight: bold;
                    }
                    
                <?php }else { ?>
                
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
                    
                <?php } ?>
                
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
                    
                
                <?php if($format == "pdf"){ ?>

                    .content-body{
                        padding: 1rem 2rem;
                    }

                    .title__email{
                        font-family: 'Ubuntu', sans-serif;
                        font-size: 13px;
                        font-weight: lighter;
                    }

                    .td__title_date{
                        text-align: right;
                        margin-right: 6px;
                        padding-right: 1rem;
                    }
                    
                <?php }else{ ?>
                
                    .content-body{
                        padding: 2rem;
                    }

                    .title__email{
                        font-family: 'Ubuntu', sans-serif;
                        font-size: 15px;
                        font-weight: lighter;
                    }
                    
                <?php } ?>
                
                .table__info__peronal{
                    width: 100%;
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
                    background-color: #000;
                    color: white;
                    cursor: pointer;
                    position: relative;
                }


                
                <?php if( $format == "pdf" ){ ?>
                
                    .table__info__peronal td{
                        height: 2rem;
                        padding-left: 2rem;
                        font-size: 13px;
                        font-family: 'Ubuntu', sans-serif;
                        font-weight: bold;
                        background-color: #000;
                        border-bottom: solid 1px #01002f;
                        border-top: solid 1px #01002f;
                    }
                    
                <?php }else { ?>
                
                    .table__info__peronal td{
                        height: 2.5rem;
                        padding-left: 2rem;
                        font-size: 16px;
                        font-family: 'Ubuntu', sans-serif;
                        font-weight: bold;
                        background-color: #000;
                        border-bottom: solid 1px #01002f;
                        border-top: solid 1px #01002f;
                    }
                    
                <?php } ?>

                    .table__info__personal td span{
                        margin-left: 2rem;
                    }
                    .table__info__detail{
                        width: 50%;
                        margin-top:1rem;
                        margin-bottom:1rem;
                        margin-left: 2rem;
                        font-family: 'Ubuntu', sans-serif;
                    }
                    .table__info__detail tr{
                       height: 1.5rem;
                    }

                <?php if($format == "pdf"){ ?>
                
                    .table__info__detail td{
                        font-size: 13px;
                        width: 2rem;
                        height: 2.5rem;
                    }
                    
                <?php }else{ ?>
                
                    .table__info__detail td{
                        font-size: 15px;
                        width: 2rem;
                        height: 3.5rem;
                    }
                    
                <?php } ?>
                

                <?php if($format == "pdf"){ ?>
                
                    .space-pdf{
                        margin-top: -2rem;
                    }
                    
                <?php } ?>
               
                

                <?php if($format == "pdf"){ ?>
                
                    .tr-datos-payment{
                        font-size: 13px;
                    }
                    
                <?php } ?>


                 <?php if($format == "pdf"){ ?>

                    .line__separator{
                        width: 98%;
                        border-bottom: solid 1px #01002f;
                        margin: 2rem 1rem;
                    }
                    
                <?php }else{ ?>

                    .line__separator{
                        width: 98%;
                        border-bottom: solid 1px #01002f;
                        margin: 2.5rem 1rem;
                    }

                <?php }?>

                .content__footer{
                    font-family: 'Ubuntu', sans-serif;
                    margin-top: 1rem;
                    width: 100%;
                    text-align: center;
                }

                <?php if($format == "pdf"){ ?>
                    .content__footer{
                        font-family: 'Ubuntu', sans-serif;
                        font-size: 13px;
                    }
                <?php } ?>
                .text__color{
                    color: #f1d600;/**mod_color */
                }


                .icono {
                    position: absolute;
                    top: 50%;
                    right: 5px; /* Ajustar la posición del icono */
                    transform: translateY(-50%);
                    width: 20px; /* Ajustar el tamaño del icono */
                    height: 20px; /* Ajustar el tamaño del icono */
                    background: url('/templates/spivet_pq_tm/php/email/Templates/img/ir_sitio.svg') no-repeat center; /* Ruta a la imagen del icono */
                    color: #fff;
                }


                .table_list_products{
                    width: 100%;

                    border-collapse: separate;
                    border-spacing: 0 45px;
                }

                <?php if($format=='pdf'){ ?>
                            .table_list_products td{
                                width: 50%;
                            }
                <?php } ?>

                .table_inputs{
                    width: 60%;
                }

                <?php if($format=='mail'){ ?>
                            .table_inputs{
                                width: 60%;
                            }
                <?php }else{ ?>
                            .table_inputs{
                                width: 100%;
                            }
                <?php } ?>

                .table_inputs td{
                    width: 33.3%;
                }

                
            </style>
        <?php if($format=='mail'){ ?>
        </head>
        <?php } ?>
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
                                    <?php 
                                        if($cobro['cobroscata_status']==1){
                                            echo 'Comprobante de pago';
                                        }else{

                                            if($cobro['forma_depago_IDsystemapades']==2 || $cobro['forma_depago_IDsystemapades']==3 || $cobro['forma_depago_IDsystemapades']==5){
                                                echo 'Solicitud de pago';
                                            }

                                        } 

                                    ?>   
                                    - Boletera Spivet
                                </span>
                            </td>
                            <td class="td__title_date">
                                <span class="title_header__date">Folio compra: <?php echo $cobro['cobroscata_idregcobro']; ?> <br> <?php echo $current_date; ?></span>
                            </td>
                        </tr>
                    </table>
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