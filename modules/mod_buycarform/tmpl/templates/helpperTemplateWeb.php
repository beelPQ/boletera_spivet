<?php

	class helpperTemplateWeb {


		public static function getConfirm($cobro){
			ob_start();
?>

            <input type="hidden" id="code" value="<?php echo $cobro['idsystemcobrocat']; ?>">

            <div style="margin:0 auto;">
                <table align="center" class="table__actions__success" style="margin-top: 0px;height: 60vh; background:#fff;">
                    <tr>
                        <td class="body_confirm" align="center">

                            <div class="title_confirm"><?php if($cobro['forma_depago_IDsystemapades']==2 || $cobro['forma_depago_IDsystemapades']==3 || $cobro['forma_depago_IDsystemapades']==5){ echo '¡SOLICITUD EXITOSA!';}else{ echo '¡COMPRA EXITOSA!';} ?></div>

                            <img class="icon_confirm" src="/images/Spivet/Header/logo_spivet_grande.png" style="width: 250px;"><br><br>

                            <div class="legend__registro__success">Número de compra: <?php echo $cobro['cobroscata_idregcobro']; ?></div>
                            <div class="legend__send__email">

                                <?php 
                                    if($cobro['forma_depago_IDsystemapades']==2 || $cobro['forma_depago_IDsystemapades']==3 || $cobro['forma_depago_IDsystemapades']==5 || $cobro['forma_depago_IDsystemapades']==6){ 
                                         echo 'Hemos enviado la solicitud de pago a su correo electrónico.<br>Favor revisar casilla de spam. ';
                                    }else{ 
                                        echo 'Hemos enviado el comprobante de compra a su correo electrónico.<br>Favor revisar casilla de spam. ';
                                    } 
                                ?>
                                
                            </div>

                            <div class="content__buttons">
                                <button type="button" id="btnExit" class="custom-button2"  >Salir</button>
                                <button type="button" class="custom-button1" onclick="enviarCorreo('', 'Payment', true)" >Reenviar correo</button>
                                <a href="/files/comprobantes/<?php echo $cobro['cobroscata_pdf']; ?>" download ><button type="button"  class="custom-button1" >Descargar</button></a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>


<?php
			$out = ob_get_contents();
	        ob_end_clean();
	        
	        return $out;
		}



        public static function getTemplateTicket($id_cobro_item){
            ob_start();


            $consulta = new Consulta();

            $dataCobroItem = $consulta->getPaymentItem($id_cobro_item);
            $dataCobro = $consulta->getPayement($dataCobroItem['cobroscata_idsystemcobrocat']);
            $dataProduct = $consulta->getProduct($dataCobroItem['catalogo_productos_idsystemcatpro']);
            $dataClient = $consulta->getClient($dataCobro['clientes_idsystemcli']);

            $dominio = $consulta->getConfig(9);

            $urlBarcode = $dominio['configuracion_valor']."/files/boletos/barcodes/".$dataCobro['cobroscata_idtransaccion']."_".$dataProduct['catalogo_productos_sku'].".png";
            $imgBarcode = "data:image/png;base64," . base64_encode(file_get_contents($urlBarcode));


            //$urlLogo = $dominio['configuracion_valor']."/images/logo_carpey.png";
            $urlLogo = $dominio['configuracion_valor']."/images/Spivet/Header/275290806_2458784477608685_3611484289664577033_n-Photoroom 1.png";
            $imgLogo = "data:image/png;base64," . base64_encode(file_get_contents($urlLogo));


            $diasem = gralFunctions::week_day($dataProduct['catalogo_productos_fechainicio']);
            $fecha = gralFunctions::date_to_string($dataProduct['catalogo_productos_fechainicio']);

            $fecha_cobro = gralFunctions::date_to_string($dataCobro['cobroscata_fechapago']);

            $category = $consulta->getCategory($dataProduct['categorias_programasonline_idsystemcatproon']);


            if( $dataCobro['cobroscata_status']==1 ){
                $status = 'Pagado';
            }else if( $dataCobro['cobroscata_status']==0 ){
                $status = 'Pendiente';
            }else{
                $status = 'Cancelado';
            }

?>
            <style>
                .title-text{
                    font-weight: bold;
                    color: #000!important;
                    font-size:13px;
                    font-family: Ubuntu, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                }

                .detail-text{
                    color:#1f1d1d;
                    font-size:12px;
                    font-family: Ubuntu, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                }



            </style>
            <table cellspacing="0" style="border: 5px solid #d2d7d9;" width="600px" align="center">
                <tr>
                    <td rowspan="4" width="100px">
                        <table width="100%" >
                           <tr><td align="center"> <img src="<?php echo $imgBarcode; ?>"/> </td></tr>
                           
                        </table>
                    </td>
                    <td colspan="2" width="400px" style="border: 5px solid #d2d7d9;">
                        <table width="100%">
                            <tr><td align="left" class="title-text" style="">Evento</td></tr>
                            <tr><td align="left" class="detail-text" style=""><?php echo $dataProduct['catalogo_productos_nombre']; ?></td></tr>
                        </table>
                    </td>
                    
                    <td rowspan="4" width="100px" align="center">
                        <img src="<?php echo $imgLogo; ?>" width="70px" height="70px" style="margin-top:-5px;">
                        <table width="100%" style="margin-top:30px;">
                           <tr><td align="center" class="title-text" >Estado pago</td></tr>
                           <tr><td align="center" class="detail-text"><?php echo $status; ?></td></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    
                    
                    <td colspan="2" width="400px" style="border: 5px solid #d2d7d9;">
                        <table width="100%" cellspacing="0" >
                            <tr >
                                <td align="left" class="title-text" style="border-right: 5px solid #d2d7d9;">Fecha y hora</td>
                                <td align="left" class="title-text" style="padding-left:10px;"><?php if($dataCobroItem['modality']=='Virtual'){ echo 'Link';}else if($dataCobroItem['modality']=='Presencial'){ echo 'Locación';} ?></td>
                            </tr>
                            <tr >
                                <td align="left" class="detail-text" style="border-right: 5px solid #d2d7d9;"><?php echo $diasem.', '.$fecha.' '.$dataProduct['catalogo_productos_duracion']; ?></td>
                                <td align="letf" class="detail-text" style="padding-left:10px;">
                                    <?php 
                                        if($dataCobroItem['modality']=='Virtual'){ 
                                    ?>   
                                            

                                            <a href="<?php echo $dataProduct['virtual_link']; ?>" target="_blank">Ingresar al evento</a><br>
                                            <label><?php echo $dataProduct['virtual_notas']; ?></label>
                                    <?php        
                                        }else if($dataCobroItem['modality']=='Presencial'){ 
                                    ?>
                                           <a href="<?php echo $dataProduct['presencial_linklocation']; ?>" target="_blank">Ubicación link</a><br>
                                           <label><?php echo $dataProduct['presencial_direccion']; ?></label>
                                    <?php 
                                        } 
                                    ?>
                                </td>                        
                            </tr>
                        </table>
                    </td>
                    
                   
                    
                   
                </tr>
                <tr>
                   
                    <td colspan="2" width="400px" style="border: 5px solid #d2d7d9;" >
                        <table width="100%">
                            <tr><td align="left" class="title-text">Información de orden</td></tr>
                            <tr><td align="left" class="detail-text" ><?php echo 'Orden #'.$dataCobro['cobroscata_idregcobro'].'. Ordenado por '.$dataClient['clientes_nombre'].' '.$dataClient['clientes_apellido1'].' '.$dataClient['clientes_apellido2'].' el '.$fecha_cobro.' a las '.date('H:i',strtotime($dataCobro['cobroscata_fechapago'])).' HRS' ; ?></td></tr>
                        </table>
                    </td>
                    
                </tr>
                <tr>
                    
                    <td colspan="2" width="400px" style="border: 5px solid #d2d7d9;" >
                        <table width="100%">
                            <tr><td align="left" class="title-text">Tipo</td></tr>
                            <tr><td align="left" class="detail-text"><?php echo $category['categorias_programas_nombre'] ; ?></td></tr>
                        </table>
                    </td>
                    
                </tr>
            </table>


<?php
            $out = ob_get_contents();
            ob_end_clean();
            
            return $out;
        }



	}

?>