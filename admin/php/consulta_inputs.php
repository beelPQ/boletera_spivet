<?php
    
    
    function mostrar_acciones_adicionales2($valor){

        //VARIABLE QUE LLEVARA IMPRESO
        $nombre = "";
        $html = "";

        for($i = 0; $i < 4 ; $i++){

            if ($i === 0 && $valor!="cobro" && $valor!="facturacion" && $valor!="configuracion" && $valor!="prospectos2" && $valor!="tienda_pedidos" && $valor!="solicitudes_terrenos" && $valor!="solicitudes_visitas" && $valor!="solicitudes_asesoria" && $valor!="canasta_pedidos" && $valor!="canasta_productos" && $valor!="diploma_curos_talleres" && $valor!="cursos_cobros") {
                $nombre = "Editar";
    
                $html .= '
                    <div class="col-lg-2 col-12">
                        <!-- small box -->
                        <div class="small-box bg-info boton-background">
                            <a  href="#" id="editarRegistro2" class="small-box-footer"><img src="images/edit.svg" alt="' . $nombre . '" style="opacity: .8; margin: 0px 3px 0px 0px"  width="30" >  ' . $nombre . ' </a>
                        </div>
                    </div>';
            } elseif ($i === 1 && $valor!="facturacion" && $valor!="prospecto" && $valor!="configuracion" && $valor!="cobro" && $valor!="empresas" && $valor!="prospectos2" && $valor!="tienda_pedidos" && $valor!="solicitudes_terrenos" && $valor!="solicitudes_visitas" && $valor!="solicitudes_asesoria" && $valor!="canasta_pedidos" && $valor!="cursos_cobros"  ) {
                $nombre = "Eliminar";
    
                $html .= '
                    <div class="col-lg-2 col-12">
                        <!-- small box -->
                        <div class="small-box bg-info boton-background">
                            <a  href="#" id="eliminarRegistro2" class="small-box-footer"><img src="images/delete.svg" alt="' . $nombre . '" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" >  ' . $nombre . ' </a>
                        </div>
                    </div>';
            } elseif ($i === 2){
                $nombre = "Imprimir";

                $html .= '
                <div class="col-lg-2 col-12">
                    <!-- small box -->
                    <div class="small-box bg-info boton-background">
                        <a href="javascript:window.print()"  class="small-box-footer"><img src="images/printer.svg" alt="' . $nombre . '" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" >  '.$nombre.'</a>
                    </div>
                </div>';
            }elseif($i === 3){
                $nombre = "Descargar";

                 $html .= '
                <div class="col-lg-2 col-12">
                    <!-- small box -->
                    <div class="small-box bg-info boton-background">
                        <a  id="descargar" href="#"  class="small-box-footer"><img src="images/download.svg" alt="' . $nombre . '" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" >  '.$nombre.' </a>
                    </div>
                </div>';
            }

        }

        echo $html;

    }


     function inputs_fecha($num,$cadena,$aniomin,$aniomax,$dia,$mes,$anio){
    

        $html='
            <div class="col-sm-4">
            <div class="form-group">
            <label>Fecha '.$cadena.':</label>
            <div class="row">
               
                   <select id="dia'.$num.'" class="form-control col-sm-3">
                        <option value="----" selected>DD</option>';
                        $d=1;
                        $default='';
                        while($d<=31){
        
                            if($d<10){ $d2='0'.$d; }else{ $d2=$d; }
                            if($dia==$d2){
                                $default='SELECTED';
                            }
                            $html.='<option value="'.$d2.'" '.$default.'>'.$d2.'</option>';
                            if($default!=''){
                                $default='';
                            }
                            
                            $d++;
                        }
                        
           $html.=' </select>
                  
               
           
        ';
        
        $html.='
            
                
                   
                   <select id="mes'.$num.'" class="form-control col-sm-3">
                        <option value="----" selected>MM</option>';
                        $m=1;
                         $default='';
                        while($m<=12){
                            
                            if($m<10){ $m2='0'.$m; }else{ $m2=$m; }
                            if($mes==$m2){
                                $default='SELECTED';
                            }
                            $html.='<option value="'.$m2.'" '.$default.'>'.$m2.'</option>';
                            if($default!=''){
                                $default='';
                            }
                            
                            $m++;
                        }
                        
           $html.=' </select>
                  
               
            
        ';
        
        $html.='
            
               
                   
                   <select id="anio'.$num.'" class="form-control col-sm-5">
                        <option value="----" selected>AAAA</option>';
                        $a=$aniomin;
                        $default='';
                        while($a<=$aniomax){
                           
                            if($anio==$a){
                                $default='SELECTED';
                            }
                            $html.='<option value="'.$a.'" '.$default.'>'.$a.'</option>';
                            if($default!=''){
                                $default='';
                            }
                            $a++;
                        }
                        
           $html.=' </select>
                  
               
            </div>
            </div>
            </div>
        ';
    
        
        return $html;
        
    }
    
    function inputs_hora($num,$cadena,$hora,$minuto){
    
        $html='
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Hora '.$cadena.':</label>
                    <div class="row">
               
                        <select id="hora'.$num.'" class="form-control col-sm-3">
                            <option value="----" selected>hh</option>';
                            $h=0;
                            $default='';
                            while($h<=23){
            
                                if($h<10){ $h2='0'.$h; }else{ $h2=$h; }
                                if($hora==$h2){
                                    $default='SELECTED';
                                }
                                $html.='<option value="'.$h2.'" '.$default.'>'.$h2.'</option>';
                                if($default!=''){
                                    $default='';
                                }
                                
                                $h++;
                            }
                $html.='</select> <span style="padding-top:5px;margin-left:5px;margin-right:5px;">:</span> 
        ';
        
        $html.='
                       <select id="min'.$num.'" class="form-control col-sm-3">
                            <option value="----" selected>mm</option>';
                            $m=0;
                            $default='';
                            while($m<=59){
                                
                                if($m<10){ $m2='0'.$m; }else{ $m2=$m; }
                                if($minuto==$m2){
                                    $default='SELECTED';
                                }
                                $html.='<option value="'.$m2.'" '.$default.'>'.$m2.'</option>';
                                if($default!=''){
                                    $default='';
                                }
                                
                                $m++;
                            }
                            
               $html.='</select>
                    </div> 
                </div>
            </div>
               
        ';
        
        return $html;
        
    }

    

?>

