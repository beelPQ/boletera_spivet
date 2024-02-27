<?php

    function editar_cupon($id){
        $mysqli = conectar();
        $html = "";
    
        $idtipo=2;
        $query = $mysqli->prepare(" SELECT
                                    idsystemdescuento, 
                                    descuento_formato,
                                    descuento_cantidad,
                                    descuento_cantidad2,
                                    descuento_existencia,
                                    descuento_valido_desde,
                                    descuento_valido_hasta,
                                    descuento_codigo,
                                    descuento_estatus,
                                    descuento_notas           
                                    FROM catalogo_descuentos WHERE idsystemdescuento = ? AND descuento_tipo = ?");
                $query -> bind_param('ii',$id,$idtipo);
                $query -> execute();
                $query -> bind_result($iddescuento,$formato_descuento,$cantidad1,$cantidad2,$stock,$valido_desde,$valido_hasta,$codigo,$estatus,$notas);
                $query -> fetch();
                $query -> close();
        
        $existe = false;
        if($iddescuento){


            if($formato_descuento=='Porcentaje'){
                $opcion1_formato='';
                $opcion2_formato='selected';
                $opcion3_formato='';
                
                $mostrar_dinero='display:none;';

            }else if($formato_descuento=='Dinero'){
                $opcion1_formato='';
                $opcion2_formato='';
                $opcion3_formato='selected';
                
                $mostrar_dinero='';
            }else{
                $opcion1_formato='selected';
                $opcion2_formato='';
                $opcion3_formato='';
                
                $mostrar_dinero='display:none;';
            }

            $diai=date('d',strtotime($valido_desde));
            $mesi=date('m',strtotime($valido_desde));
            $anioi=date('Y',strtotime($valido_desde));
            $horai=date('H',strtotime($valido_desde));
            $mini=date('i',strtotime($valido_desde));
            

            $diaf=date('d',strtotime($valido_hasta));
            $mesf=date('m',strtotime($valido_hasta));
            $aniof=date('Y',strtotime($valido_hasta));
            $horaf=date('H',strtotime($valido_hasta));
            $minf=date('i',strtotime($valido_hasta));

            if($estatus==1){
                $opcion1_estatus='';
                $opcion2_estatus='selected';
            }else{
                $opcion1_estatus='selected';
                $opcion2_estatus='';
            }
            

           
        
            $html='
                <div class="col-sm-12">

                <div class="col-sm-12">

                    <div class="form-group">
                            <label>Tipo descuento*:</label>
                            <select id="tipo_descuento" class="form-control">
                                    <option '.$opcion1_formato.'>----</option>
                                    <option value="Porcentaje" '.$opcion2_formato.'>% Porcentaje</option>
                                    <option value="Dinero" '.$opcion3_formato.'>$ Dinero</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Cantidad<span id="span_lblmxn" style="'.$mostrar_dinero.'">(MXN)</span>*:</label>
                            <input
                                type="text"
                                id="cantidad1"
                                class="form-control"
                                value="'.$cantidad1.'"
                                placeholder="número con o sin decimales"
                                maxlength="9">
                        </div>
                    </div>
                    <div class="col-sm-12" id="div_cantidad2" style="display:none;">
                        <div class="form-group">
                            <label>Cantidad(USD)*:</label>
                            <input
                                type="text"
                                id="cantidad2"
                                class="form-control"
                                value="0"
                                placeholder="número con o sin decimales"
                                maxlength="9">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Existencia*:</label>
                            <input
                                type="text"
                                id="stock"
                                class="form-control"
                                value="'.$stock.'"
                                placeholder="número entero"
                                maxlength="8">
                        </div>
                    </div>


                    <div class="col-sm-12 row">';

                        date_default_timezone_set('America/Mexico_City');
                        $anio_actual=date('Y');
                        $anio_max= $anio_actual+10;

                        if($anioi>0 && $anioi<$anio_actual){
                            $anio_min=$anioi;
                        }else{
                            $anio_min=$anio_actual;
                        }
                        $html.=inputs_fecha(1,'inicio',$anio_min,$anio_max,$diai,$mesi,$anioi);
                        $html.=inputs_hora(1,'inicio',$horai,$mini); 

                    $html.='
                        <div class="col-sm-4"></div>
                    </div>


                    
                    <div class="col-sm-12 row">';

                        if($aniof>0 && $aniof<$anio_actual){
                            $anio_min=$aniof;
                        }else{
                            $anio_min=$anio_actual;
                        }

                        $html.=inputs_fecha(2,'fin',$anio_min,$anio_max,$diaf,$mesf,$aniof);
                        $html.=inputs_hora(2,'fin',$horaf,$minf); 

                    $html.='
                        <div class="col-sm-4"></div>
                    </div>


                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Código*:</label>
                            <input
                                type="text"
                                id="codigo"
                                class="form-control"
                                value="'.$codigo.'"
                                placeholder="texto"
                                maxlength="5">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Motivo del cupón:</label>
                            <input
                                type="text"
                                id="notas"
                                class="form-control"
                                value="'.$notas.'"
                                placeholder="texto"
                                maxlength="150">
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Estatus*:</label>
                            <select id="descuento_estado" class="form-control">
                                <option value="0" '.$opcion1_estatus.'>Desactivado</option>
                                <option value="1" '.$opcion2_estatus.'>Activado</option>
                            </select>
                        </div>
                    </div>
                    
            ';
                    
                    
            $html.=' <div class="col-sm-12">
                        <input type="hidden" id="tipo" value="cupon">
                        <input type="hidden" id="id_editar" value="' . $id . '">
                        <button type="submit" class="btn botonFormulario">Guardar</button>
                        <a href="index.php?id=cupones" class="btn botonFormulario" >Cancelar</a>
                    </div>
                </div>
            ';
            
            $existe = true;
        }
        
        $mysqli->close();
        
        if($existe === true) {
            echo $html;
        } else {
            echo '<label>No se ha encontrado ningún cupón</label>';
        }

    }

?>