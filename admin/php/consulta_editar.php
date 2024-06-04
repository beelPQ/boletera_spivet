<?php

function editar_canastaproducto($id)
{

    $mysqli = conectar();
    $html = "";
    $query = $mysqli->prepare(" SELECT 
                                        sku,
                                        id_canasta_categoria,
                                        nombre,
                                        unidad_medida,
                                        stock,
                                        preciomx,
                                        preciomx_descuento,
                                        ruta_thumb,
                                        id_descuento,
                                        disponible,
                                        id_canasta_producto_estado   
                            FROM canastas_productos WHERE id_canasta_producto = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $query->bind_result($sku, $idcategoria, $nombre, $medida, $stock, $precio, $preciodescuento, $rutathumb, $iddescuento, $disponible, $idestado);
    $query->fetch();
    $query->close();

    $existe = false;
    if ($sku) {

        if ($medida == 'KG') {

            $cpcion1_medida = '';
            $cpcion2_medida = 'SELECTED';
            $cpcion3_medida = '';
            $cpcion4_medida = '';
        } else if ($medida == 'Pieza') {

            $cpcion1_medida = '';
            $cpcion2_medida = '';
            $cpcion3_medida = 'SELECTED';
            $cpcion4_medida = '';
        } else if ($medida == 'Racimo') {

            $cpcion1_medida = '';
            $cpcion2_medida = '';
            $cpcion3_medida = '';
            $cpcion4_medida = 'SELECTED';
        } else {

            $cpcion1_medida = 'SELECTED';
            $cpcion2_medida = '';
            $cpcion3_medida = '';
            $cpcion4_medida = '';
        }


        if ($rutathumb != '' && is_null($rutathumb) == false) {

            $arraythumb = explode('/', $rutathumb);
            $thumb = $arraythumb[count($arraythumb) - 1];
        } else {
            $thumb = '';
        }


        $html = '
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Sku</label>
                        <input
                            type="text"
                            id="sku"
                            class="form-control"
                            placeholder="Identificador"
                            maxlength="19"
                            value="' . $sku . '">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Categoria</label>
                        <select id="categoria" class="form-control">';
        $html .= lista_canastacategorias($idcategoria);
        $html .= '</select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input
                            type="text"
                            id="nombre"
                            class="form-control"
                            placeholder="texto"
                            maxlength="69"
                            value="' . $nombre . '">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Estado de producto</label>
                        <select id="estado" class="form-control">';
        $html .= lista_canastasProductosEstados($idestado);
        $html .= '</select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Unidad de medida</label>
                        <select id="medida" class="form-control">
                            <option ' . $cpcion1_medida . '>----</option>
                            <option ' . $cpcion2_medida . '>KG</option>
                            <option ' . $cpcion3_medida . '>Pieza</option>
                            <option ' . $cpcion4_medida . '>Racimo</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Stock</label>
                        <input
                            type="text"
                            id="stock"
                            class="form-control"
                            placeholder="texto"
                            maxlength="7"
                            value="' . $stock . '">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Precio(MX)</label>
                        <input
                            type="text"
                            id="preciomx_siniva"
                            class="form-control"
                            placeholder="Precio"
                            maxlength="13"
                            value="' . $precio . '">
                    </div>
                </div>

                <div class="col-sm-12">
                     <label>Actualizar thumb(jpg,jpeg,png - Máximo 5MB): ' . $thumb . '</label>                  
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <input id="thumb" type="file" accept=".jpg,.jpeg,.png"/>
                    </div>
                </div>

            ';


        if (is_null($iddescuento) == false && $iddescuento != '') {
            $opcion1_checkdesc = '';
            $opcion2_checkdesc = 'SELECTED';
        } else {
            $opcion1_checkdesc = 'SELECTED';
            $opcion2_checkdesc = '';
            $iddescuento = 0;
        }

        $html .= '
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Incluir descuento:</label>
                            <select id="check_descuento" class="form-control">
                                <option value="0" ' . $opcion1_checkdesc . '>No</option>
                                <option value="1" ' . $opcion2_checkdesc . '>Sí</option>
                            </select>
                        </div>
                    </div>
                    ';

        $html .= formulario_descuento_producto($mysqli, $iddescuento, $preciodescuento/*,$precio2descuento*/, 'descuentos');



        if ($disponible == 1) {
            $opcion2 = 'SELECTED';
            $opcion1 = '';
        } else {
            $opcion2 = '';
            $opcion1 = 'SELECTED';
        }

        $html .= '      
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Publicar:</label>
                            <select id="disponible" class="form-control">
                                <option value="0" ' . $opcion1 . '>No</option>
                                <option value="1" ' . $opcion2 . '>Sí</option>
                            </select>
                        </div>
                    </div>
                    ';



        $html .= '
                    <div class="col-sm-12">
                        <input type="hidden" id="tipo" value="canastaproducto">
                        <input type="hidden" id="id_editar" value="' . $id . '">
                        <button type="submit" class="btn botonFormulario">Guardar</button>
                        <a href="index.php?id=canasta_productos" class="btn botonFormulario" >Cancelar</a>
                    </div>
                </div>
            
            ';

        $existe = true;
    }

    $mysqli->close();

    if ($existe === true) {
        echo $html;
    } else {
        echo '<label>No se ha encontrado ningún producto con ese ID</label>';
    }
}


function formulario_descuento_producto($mysqli, $iddescuento, $precio1, $descBD)
{

    if ($descBD == 'catalogo_descuentos') {
        $mysqli = conectar();
    }


    if ($iddescuento == 0) {
        $mostrar_form = 'display:none;';

        $opcion1_formato = 'selected';
        $opcion2_formato = '';
        $opcion3_formato = '';

        $mostrar_dinero = 'display:none;';

        $cantidad1 = '';
        $cantidad2 = '';


        $diai = 0;
        $mesi = 0;
        $anioi = 0;
        $horai = 24;
        $mini = 60;

        $diaf = 0;
        $mesf = 0;
        $aniof = 0;
        $horaf = 24;
        $minf = 60;

        $opcion1_estatus = 'selected';
        $opcion2_estatus = '';
        $opcion3_estatus = '';
    } else {
        $mostrar_form = '';


        if ($descBD == 'descuentos') {

            $query = $mysqli->prepare(" SELECT 
                                        formato_descuento,
                                        cantidad_descuento,
                                        cantidad2_descuento,
                                        valido_desde,
                                        valido_hasta,
                                        estatus_descuento          
                            FROM descuentos WHERE id_descuento = ?");
        } else if ($descBD == 'catalogo_descuentos') {


            $query = $mysqli->prepare(" SELECT 
                                        descuento_formato,
                                        descuento_cantidad,
                                        descuento_cantidad2,
                                        descuento_valido_desde,
                                        descuento_valido_hasta,
                                        descuento_estatus          
                            FROM catalogo_descuentos WHERE idsystemdescuento = ?");
        }

        $query->bind_param('i', $iddescuento);
        $query->execute();
        $query->bind_result($formato_descuento, $cantidad1, $cantidad2, $valido_desde, $valido_hasta, $estatus);
        $query->fetch();
        $query->close();


        /*
            $formato_descuento='Porcentaje';
            $cantidad1=10;
            $cantidad2=0;
            $valido_desde='2022-09-01 07:20:00';
            $valido_hasta='2022-10-01 07:19:00';
            $estatus=1;
            */

        if ($formato_descuento == 'Porcentaje') {
            $opcion1_formato = '';
            $opcion2_formato = 'selected';
            $opcion3_formato = '';

            $mostrar_dinero = 'display:none;';
        } else if ($formato_descuento == 'Dinero') {
            $opcion1_formato = '';
            $opcion2_formato = '';
            $opcion3_formato = 'selected';

            $mostrar_dinero = '';
        } else {
            $opcion1_formato = 'selected';
            $opcion2_formato = '';
            $opcion3_formato = '';

            $mostrar_dinero = 'display:none;';
        }

        $diai = date('d', strtotime($valido_desde));
        $mesi = date('m', strtotime($valido_desde));
        $anioi = date('Y', strtotime($valido_desde));
        $horai = date('H', strtotime($valido_desde));
        $mini = date('i', strtotime($valido_desde));


        $diaf = date('d', strtotime($valido_hasta));
        $mesf = date('m', strtotime($valido_hasta));
        $aniof = date('Y', strtotime($valido_hasta));
        $horaf = date('H', strtotime($valido_hasta));
        $minf = date('i', strtotime($valido_hasta));

        if ($estatus == 1) {
            $opcion1_estatus = '';
            $opcion2_estatus = '';
            $opcion3_estatus = 'selected';
        } else {
            $opcion1_estatus = '';
            $opcion2_estatus = 'selected';
            $opcion3_estatus = '';
        }
    }



    $form_desc = '

            <div class="card card-blue direct-chat direct-chat-dark" id="div_descuento" style="' . $mostrar_form . '">
                <div class="card-header card-personalizado" >
                    <h3 class="card-title">Asignar descuento</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Tipo descuento:</label>
                                <select id="tipo_descuento" class="form-control">
                                        <option ' . $opcion1_formato . '>----</option>
                                        <option value="Porcentaje" ' . $opcion2_formato . '>% Porcentaje</option>
                                        <option value="Dinero" ' . $opcion3_formato . '>$ Dinero</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Cantidad<span id="span_lblmxn" style="' . $mostrar_dinero . '">(MXN)</span></label>
                                <input
                                    type="text"
                                    id="cantidad1"
                                    class="form-control"
                                    value="' . $cantidad1 . '"
                                    placeholder="número con o sin decimales"
                                    maxlength="9">
                            </div>
                        </div>

                        <div class="col-sm-4"></div>
                        ';

    /*
            $form_desc.='
                        <div class="col-sm-4" >
                            <div class="form-group" id="div_cantidad2" style="'.$mostrar_dinero.'">
                                <label>Cantidad(USD)</label>
                                <input
                                    type="text"
                                    id="cantidad2"
                                    class="form-control"
                                    value="'.$cantidad2.'"
                                    placeholder="número con o sin decimales"
                                    maxlength="9">
                            </div>
                        </div>';
            */

    date_default_timezone_set('America/Mexico_City');
    $anio_actual = date('Y');
    $anio_max = $anio_actual + 10;

    if ($anioi > 0 && $anioi < $anio_actual) {
        $anio_min = $anioi;
    } else {
        $anio_min = $anio_actual;
    }
    $form_desc .= inputs_fecha(1, 'inicio', $anio_min, $anio_max, $diai, $mesi, $anioi);
    $form_desc .= inputs_hora(1, 'inicio', $horai, $mini);
    $form_desc .= '<div class="col-sm-4" ></div>';



    if ($aniof > 0 && $aniof < $anio_actual) {
        $anio_min = $aniof;
    } else {
        $anio_min = $anio_actual;
    }

    $form_desc .= inputs_fecha(2, 'fin', $anio_min, $anio_max, $diaf, $mesf, $aniof);
    $form_desc .= inputs_hora(2, 'fin', $horaf, $minf);
    $form_desc .= '<div class="col-sm-4" ></div>';


    $form_desc .= '
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Estado:</label>
                                <select id="descuento_estado" class="form-control">
                                    <option ' . $opcion1_estatus . '>----</option>
                                    <option value="0" ' . $opcion2_estatus . '>Desactivado</option>
                                    <option value="1" ' . $opcion3_estatus . '>Activado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Precio(MXN) con descuento:</label>
                                <input
                                    type="text"
                                    id="preciodescuento"
                                    class="form-control"
                                    value="' . $precio1 . '"
                                    placeholder="se calcula automáticamente"
                                    readonly>
                            </div>
                        </div>';
    /*
        $form_desc.='
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Precio(USD) con descuento:</label>
                                <input
                                    type="text"
                                    id="precio2descuento"
                                    class="form-control"
                                    value="'.$precio2.'"
                                    placeholder="se calcula automáticamente"
                                    readonly>
                            </div>
                        </div>';
        */
    $form_desc .= '
                    </div>
                </div>
            </div>
        ';


    return $form_desc;
}


function editar_empresa2($id)
{
    $mysqli = conectar();
    $html = "";
    $query = $mysqli->prepare(" SELECT nombre_empresa,nombre_corto_empresa,rfc_empresa,telefono_empresa,email_empresa,paypal_clientid,openpay_merchantid,openpay_llaveprivada,openpay_llavepublica,transferencia_beneficiario,transferencia_banco,transferencia_clabe,establecimiento_beneficiario,establecimiento_banco,establecimiento_nocta,establecimiento_notarjeta,canastas_transferencia_beneficiario,canastas_transferencia_banco,canastas_transferencia_clabe,openpay_sandboxmode FROM empresa WHERE idsystemEmpresa = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $query->bind_result($nombre, $nombre_corto, $rfc, $telefono, $email, $paypal_clientid, $openpay_merchantid, $openpay_llaveprivada, $openpay_llavepublica, $beneficiario, $banco, $clabe, $beneficiario_est, $banco_est, $nocta_est, $notarjeta_est, $canastas_traBen, $canastas_traBanco, $canastas_traClabe, $openpay_sandboxmode);
    $query->fetch();
    $query->close();

    $existe === false;
    if ($nombre) {


        if ($openpay_sandboxmode == 1) {
            $openpay_sandbox_option1 = '';
            $openpay_sandbox_option2 = 'SELECTED';
        } else {
            $openpay_sandbox_option1 = 'SELECTED';
            $openpay_sandbox_option2 = '';
        }


        $html = '
                <!-- text input -->
                <div class="col-sm-12">
                    
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nombre empresa</label>
                            <input
                                type="text"
                                id="nombre"
                                class="form-control"
                                 value="' . $nombre . '"
                                placeholder="Nombre empresa">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nombre corto empresa</label>
                            <input
                                type="text"
                                id="nombre_corto"
                                class="form-control"
                                 value="' . $nombre_corto . '"
                                placeholder="Nombre corto empresa">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>RFC:</label>
                        <input
                            type="text"
                            id="rfc"
                            class="form-control"
                            maxlength="13"
                            value="' . $rfc . '"
                            placeholder="RFC">
                    </div>
                    <div class="form-group">
                        <label>Teléfono:</label>
                        <input
                            type="text"
                            id="telefono"
                            class="form-control"
                            maxlength="15"
                            value="' . $telefono . '"
                            placeholder="Teléfono">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input
                            type="text"
                            id="email"
                            class="form-control"
                            maxlength="40"
                            value="' . $email . '"
                            placeholder="Email">
                    </div>';

        /*
            $html.='     
                    <div class="form-group" >
                        <label>Paypal Client ID:</label>
                        <input
                            type="text"
                            id="clientid"
                            class="form-control"
                             maxlength="100"
                             value="'.$paypal_clientid.'"
                            placeholder="Paypal Client ID">
                    </div>';
            */

        $html .= '         
                    <div class="form-group">
                        <label>Openpay Merchant ID:</label>
                        <input
                            type="text"
                            id="merchantid"
                            class="form-control"
                            maxlength="35"
                            value="' . $openpay_merchantid . '"
                            placeholder="Openpay Merchant ID">
                    </div>
                    <div class="form-group" >
                        <label>Openpay llave pública:</label>
                        <input
                            type="text"
                            id="llavepublica"
                            class="form-control"
                            maxlength="100"
                            value="' . $openpay_llavepublica . '"
                            placeholder="Openpay llave pública">
                    </div>
                    <div class="form-group" >
                        <label>Openpay llave privada:</label>
                        <input
                            type="text"
                            id="llaveprivada"
                            class="form-control"
                            maxlength="100"
                            value="' . $openpay_llaveprivada . '"
                            placeholder="Openpay llave privada">
                    </div>
                    <div class="form-group" >
                        <label>Openpay modo sandbox:</label>
                        <select class="form-control" id="openpay_sandbox">
                            <option value="0" ' . $openpay_sandbox_option1 . '>No</option>
                            <option value="1" ' . $openpay_sandbox_option2 . '>Si</option>
                        </select>
                    </div>
                    ';

        /*
            $html.='
                    <div class="form-group" >
                        <label>Canastas beneficario de transferencia:</label>
                        <input
                            type="text"
                            id="canTra_beneficiario"
                            class="form-control"
                            maxlength="118"
                            value="'.$canastas_traBen.'"
                            placeholder="Beneficario">
                    </div>
                    <div class="form-group" >
                        <label>Canastas banco de transferencia:</label>
                        <input
                            type="text"
                            id="canTra_banco"
                            class="form-control"
                            maxlength="68"
                            value="'.$canastas_traBanco.'"
                            placeholder="Banco">
                    </div>

                    <div class="form-group" >
                        <label>Canastas clabe de transferencia:</label>
                        <input
                            type="text"
                            id="canTra_clabe"
                            class="form-control"
                            maxlength="18"
                            value="'.$canastas_traClabe.'"
                            placeholder="Clabe">
                    </div>
                    

                    <div class="form-group" >
                        <label>Beneficario de transferencia:</label>
                        <input
                            type="text"
                            id="beneficiario"
                            class="form-control"
                            maxlength="118"
                            value="'.$beneficiario.'"
                            placeholder="Beneficario">
                    </div>

                    <div class="form-group" >
                        <label>Banco de transferencia:</label>
                        <input
                            type="text"
                            id="banco"
                            class="form-control"
                            maxlength="68"
                            value="'.$banco.'"
                            placeholder="Banco">
                    </div>

                    <div class="form-group" >
                        <label>Clabe de transferencia:</label>
                        <input
                            type="text"
                            id="clabe"
                            class="form-control"
                            maxlength="18"
                            value="'.$clabe.'"
                            placeholder="Clabe">
                    </div>

                    <div class="form-group" >
                        <label>Beneficario de pago en establecimiento:</label>
                        <input
                            type="text"
                            id="beneficiario_est"
                            class="form-control"
                            maxlength="118"
                            value="'.$beneficiario_est.'"
                            placeholder="Beneficario">
                    </div>

                    <div class="form-group" >
                        <label>Banco de pago en establecimiento:</label>
                        <input
                            type="text"
                            id="banco_est"
                            class="form-control"
                            maxlength="68"
                            value="'.$banco_est.'"
                            placeholder="Banco">
                    </div>

                    <div class="form-group" >
                        <label>No. Cta. de pago en establecimiento:</label>
                        <input
                            type="text"
                            id="nocta_est"
                            class="form-control"
                            maxlength="20"
                            value="'.$nocta_est.'"
                            placeholder="No. Cta.">
                    </div>

                    <div class="form-group" >
                        <label>No. Tarjeta de pago en establecimiento:</label>
                        <input
                            type="text"
                            id="notarjeta_est"
                            class="form-control"
                            maxlength="20"
                            value="'.$notarjeta_est.'"
                            placeholder="No. Cta.">
                    </div>';
            */

        $html .= '        
                    <div class="col-sm-12">
                        <input type="hidden" id="tipo" value="empresa">
                        <input type="hidden" id="id_editar" value="' . $id . '">
                        <button type="submit" class="btn botonFormulario">Guardar</button>
                         <a href="index.php?id=empresas" class="btn botonFormulario" >Cancelar</a>
                    </div>
                </div>
            
            ';

        $existe = true;
    }

    $mysqli->close();

    if ($existe === true) {
        echo $html;
    } else {
        echo '<label>No se ha encontrado ninguna empresa </label>';
    }
}

function editar_diplomaCursoTaller($id)
{
    $sku = '';
    $idMadality = 0;
    $idCategory = 0;
    $nameProduct = '';
    $durationProduct = '';
    $shortDescription = '';
    $longDescription = '';
    $coursDescription = '';
    $indludeDescription = '';
    $linkProduct = '';
    $thumbFacilitador = '';
    $nameFacilitador = '';
    $positionFacilitador = '';
    $nameBlogNote = '';
    $dateBlogNote = '';
    $nameFailitadorBlogNote = '';
    $linkBlogNote = '';
    $fechaInicio = '';
    $fechaFin = '';
    $iva = 0;
    $precioMxn = 0;
    $precioMxnDescto = 0;
    $precioUsd = 0;
    $precioUsdDescto = 0;
    $thumbCours = '';
    $thumbHead = '';
    $isPublished = 0;
    $idDescto = 0;
    $thumbNote = '';
    $typeDescto = 0;
    $formatDescto = '';
    $quantityDescto  = 0;
    $quantityDescto2 = 0;
    $existenceDescto = 0;
    $validFrom = '';
    $validTo = '';
    $codeDescto = '';
    $statusDescto = '';
    $notesDescto = '';
    $stock = 0;

    $contacto = '';
    $direction = '';
    $linkLocation = '';
    $virtualNotes = '';
    $virtualLink = '';

    $mysqli = conectar();
    $html = "";
    /*
            $query = $mysqli->prepare("SELECT catPro.idsystemcatpro, catPro.catalogo_productos_sku AS sku, catProdModal.idsystemprodmod AS idMadality, catProdModal.modalidad_nombre, catCategProd.idsystemcatproon AS idCategory, 
            catCategProd.categorias_programas_nombre, catPro.catalogo_productos_nombre AS nameProduct, catPro.catalogo_productos_duracion AS durationProduct, catPro.catalogo_productos_descripcioncorta AS shortDescription, catPro.catalogo_productos_descripcionlarga AS longDescription, catPro.catalogo_productos_esquemacursos AS coursDescription, catPro.catalogo_productos_incluye, catPro.catalogo_productos_link, 
            catPro.catalogo_productos_thumbfacilitador, catPro.catalogo_productos_namefacilitador, catPro.catalogo_productos_positionfacilitador, catPro.catalogo_productos_fechainicio, catPro.catalogo_productos_fechafin, catPro.catalogo_productos_iva, catPro.catalogo_productos_preciomx, catPro.catalogo_productos_preciomx_descuento,  catPro.catalogo_productos_preciousd,
            catPro.catalogo_productos_preciousd_descuento, catPro.descuentos_idsystemdescuento, catPro.catalogo_productos_file_thumb, catPro.catalogo_productos_thumb_encabezado,
            catPro.catalogo_productos_publicado, catDescto.descuento_tipo, catDescto.descuento_formato, catDescto.descuento_cantidad, catDescto.descuento_cantidad2,
            catDescto.descuento_existencia, catDescto.descuento_valido_desde, catDescto.descuento_valido_hasta, catDescto.descuento_codigo, catDescto.descuento_estatus,
            catDescto.descuento_notas
            FROM catalogo_productos AS catPro
            LEFT JOIN catalogo_producto_modalidad AS catProdModal ON (catPro.producto_modalidad_idsystemprodmod = catProdModal.idsystemprodmod)
            LEFT JOIN catalogo_categorias_programas AS catCategProd ON (catPro.categorias_programasonline_idsystemcatproon = catCategProd.idsystemcatproon)
            LEFT JOIN catalogo_descuentos AS catDescto ON (catPro.descuentos_idsystemdescuento = catDescto.idsystemdescuento)
            WHERE catPro.idsystemcatpro = ?");
        */

    if ($query = $mysqli->prepare("SELECT catPro.catalogo_productos_sku AS sku, catProdModal.idsystemprodmod AS idMadality, catCategProd.idsystemcatproon AS idCategory, catPro.catalogo_productos_nombre AS nameProduct, catPro.catalogo_productos_duracion AS durationProduct, catPro.catalogo_productos_descripcioncorta AS shortDescription, catPro.catalogo_productos_descripcionlarga AS longDescription, catPro.catalogo_productos_esquemacursos AS coursDescription, catPro.catalogo_productos_incluye AS indludeDescription, catPro.catalogo_productos_link AS linkProduct, catPro.catalogo_productos_thumbfacilitador AS thumbFacilitador, catPro.catalogo_productos_namefacilitador AS nameFacilitador, catPro.catalogo_productos_positionfacilitador AS positionFacilitador,  catPro.catalogo_productos_nameBlogNote AS nameBlogNote,  catPro.catalogo_productos_dateBlogNote AS dateBlogNote,  catPro.catalogo_productos_nameFailitadorBlogNote AS nameFailitadorBlogNote, catPro.catalogo_productos_linkBlogNote AS linkBlogNote, catPro.catalogo_productos_fechainicio AS fechaInicio, catPro.catalogo_productos_fechafin AS fechaFin, catPro.catalogo_productos_iva AS iva, catPro.catalogo_productos_preciomx AS precioMxn, catPro.catalogo_productos_preciomx_descuento AS precioMxnDescto,  catPro.catalogo_productos_preciousd AS precioUsd, catPro.catalogo_productos_preciousd_descuento AS precioUsdDescto, catPro.catalogo_productos_file_thumb AS thumbCours, catPro.catalogo_productos_thumb_encabezado AS thumbHead, catPro.catalogo_productos_publicado AS isPublished, catPro.descuentos_idsystemdescuento AS idDescto, catPro.catalogo_productos_file_promocion AS thumbNote ,catDescto.descuento_tipo AS typeDescto, catDescto.descuento_formato AS formatDescto, catDescto.descuento_cantidad AS quantityDescto, catDescto.descuento_cantidad2 AS quantityDescto2, catDescto.descuento_existencia AS existenceDescto, catDescto.descuento_valido_desde AS validFrom, catDescto.descuento_valido_hasta AS validTo, catDescto.descuento_codigo AS codeDescto, catDescto.descuento_estatus AS statusDescto, catDescto.descuento_notas AS notesDescto, catPro.catalogo_productos_stock AS stock,
        catPro.contacto, presencial_direccion, presencial_linklocation, virtual_notas, virtual_link, catPro.typeTagImage
        FROM catalogo_productos AS catPro
        LEFT JOIN catalogo_producto_modalidad AS catProdModal ON (catPro.producto_modalidad_idsystemprodmod = catProdModal.idsystemprodmod)
        LEFT JOIN catalogo_categorias_programas AS catCategProd ON (catPro.categorias_programasonline_idsystemcatproon = catCategProd.idsystemcatproon)
        LEFT JOIN catalogo_descuentos AS catDescto ON (catPro.descuentos_idsystemdescuento = catDescto.idsystemdescuento)
        WHERE catPro.idsystemcatpro = ?")) {

        $query->bind_param('i', $id);
        $query->execute();
        $query->bind_result($sku, $idMadality, $idCategory, $nameProduct, $durationProduct, $shortDescription, $longDescription, $coursDescription, $indludeDescription, $linkProduct, $thumbFacilitador, $nameFacilitador, $positionFacilitador, $nameBlogNote, $dateBlogNote, $nameFailitadorBlogNote, $linkBlogNote, $fechaInicio, $fechaFin, $iva, $precioMxn, $precioMxnDescto, $precioUsd, $precioUsdDescto, $thumbCours, $thumbHead, $isPublished, $idDescto, $thumbNote, $typeDescto, $formatDescto, $quantityDescto, $quantityDescto2, $existenceDescto, $validFrom, $validTo, $codeDescto, $statusDescto, $notesDescto, $stock, $contacto, $direction, $linkLocation, $virtualNotes, $virtualLink, $typeTagImage);
        $query->fetch();

        $buttonCleanImg = "";

        $existe = false;
        if ($sku) {
            /*
                
                if($rutathumb!='' && is_null($rutathumb)==false){
    
                    $arraythumb = explode('/', $rutathumb);
                    $thumb = $arraythumb[count($arraythumb)-1];
    
                }else{
                    $thumb='';
                }
                */
            if (is_null($shortDescription) === false && $shortDescription != '') {
                $shortDescription = str_replace('&', '&amp;', $shortDescription);
            }
            if (is_null($longDescription) === false && $longDescription != '') {
                $longDescription = str_replace('&', '&amp;', $longDescription);
            }
            if (is_null($coursDescription) === false && $coursDescription != '') {
                $coursDescription = str_replace('&', '&amp;', $coursDescription);
            }
            if (is_null($indludeDescription) === false && $indludeDescription != '') {
                $indludeDescription = str_replace('&', '&amp;', $indludeDescription);
            }

            $lisCategories = '';
            $lisCategories = lista_diplomasCusrosCategorias($idCategory);

            $modalities = '';
            $modalities = lista_diplomasCusrosModalidad($idMadality);

            $optionDescto = '';
            if (is_null($idDescto) === false && $idDescto > 0) {
                $optionDescto = "<option value='0'>No</option><option value='1' selected >Sí</option>";
            } else {
                $optionDescto = "<option value='0' selected >No</option><option value='1'>Sí</option>";
            }

            $optionPublished = '';
            if ($isPublished) {
                $optionPublished = "<option value='0'>No</option><option value='1' selected >Sí</option>";
            } else {
                $optionPublished = "<option value='0' selected >No</option><option value='1'>Sí</option>";
            }


            /* [MOD OSW] */

            $imgThumbOne = 'images/logo_subir_imagen.png';
            $imgThumbTwo = 'images/logo_subir_imagen.png';
            $imgThumbThree = 'images/logo_subir_imagen.png';

            $imgThumbMinOne = 'images/logo_subir_imagen.png';
            $imgThumbMinTwo = 'images/logo_subir_imagen.png';
            $imgThumbMinThree = 'images/logo_subir_imagen.png';

            $imgThumbFacilitador = 'images/logo_subir_imagen.png';
            $imgThumbNote = 'images/logo_subir_imagen.png';

            if ($thumbHead != '') {

                $imgsThumbHeader = explode(',', $thumbHead);

                if ( count($imgsThumbHeader) == 1 && $imgsThumbHeader[0] != "") {

                    $arrayPathFile = explode('/', $imgsThumbHeader[0]);
                    $nameFile = $arrayPathFile[count($arrayPathFile) - 1];
                    $arrayNameFile = explode('_', $nameFile);
                    $array2NameFile = explode('.', $arrayNameFile[1]);
                    $nameNumberFile = $array2NameFile[0];


                    if ($nameNumberFile == 'banner01') {
                        $imgThumbOne = $imgsThumbHeader[0];
                    } elseif ($nameNumberFile == 'banner02') {
                        $imgThumbTwo = $imgsThumbHeader[0];
                    } elseif ($nameNumberFile == 'banner03') {
                        $imgThumbThree = $imgsThumbHeader[0];
                    }
                }

                if ( count($imgsThumbHeader) >= 2 && $imgsThumbHeader[1] != "") {


                    $arrayPathFile = explode('/', $imgsThumbHeader[1]);
                    $nameFile = $arrayPathFile[count($arrayPathFile) - 1];
                    $arrayNameFile = explode('_', $nameFile);
                    $array2NameFile = explode('.', $arrayNameFile[1]);
                    $nameNumberFile = $array2NameFile[0];

                    if ($nameNumberFile == 'banner01') {
                        $imgThumbOne = $imgsThumbHeader[1];
                    } elseif ($nameNumberFile == 'banner02') {
                        $imgThumbTwo = $imgsThumbHeader[1];
                    } elseif ($nameNumberFile == 'banner03') {
                        $imgThumbThree = $imgsThumbHeader[1];
                    }


                    //$imgThumbTwo = $imgsThumbHeader[1]; 
                }

                if ( count($imgsThumbHeader) >= 3 && $imgsThumbHeader[2] != "" ) {

                    $arrayPathFile = explode('/', $imgsThumbHeader[2]);
                    $nameFile = $arrayPathFile[count($arrayPathFile) - 1];
                    $arrayNameFile = explode('_', $nameFile);
                    $array2NameFile = explode('.', $arrayNameFile[1]);
                    $nameNumberFile = $array2NameFile[0];

                    if ($nameNumberFile == 'banner01') {
                        $imgThumbOne = $imgsThumbHeader[2];
                    } elseif ($nameNumberFile == 'banner02') {
                        $imgThumbTwo = $imgsThumbHeader[2];
                    } elseif ($nameNumberFile == 'banner03') {
                        $imgThumbThree = $imgsThumbHeader[2];
                    }

                    //$imgThumbThree = $imgsThumbHeader[2]; 
                }
            }


            if ($thumbCours != '') {
                $imgsThumbMin = explode(',', $thumbCours);

                if ($imgsThumbMin[0] != "") {

                    $arrayPathFile = explode('/', $imgsThumbMin[0]);
                    $nameFile = $arrayPathFile[count($arrayPathFile) - 1];
                    $arrayNameFile = explode('_', $nameFile);
                    $array2NameFile = explode('.', $arrayNameFile[1]);
                    $nameNumberFile = $array2NameFile[0];

                    if ($nameNumberFile == 'thumbs01') {
                        $imgThumbMinOne = $imgsThumbMin[0];
                    } elseif ($nameNumberFile == 'thumbs02') {
                        $imgThumbMinTwo = $imgsThumbMin[0];
                    } elseif ($nameNumberFile == 'thumbs03') {
                        $imgThumbMinThree = $imgsThumbMin[0];
                    }

                    //$imgThumbMinOne = $imgsThumbMin[0]; 
                }

                if ($imgsThumbMin[1] != "") {

                    $arrayPathFile = explode('/', $imgsThumbMin[1]);
                    $nameFile = $arrayPathFile[count($arrayPathFile) - 1];
                    $arrayNameFile = explode('_', $nameFile);
                    $array2NameFile = explode('.', $arrayNameFile[1]);
                    $nameNumberFile = $array2NameFile[0];

                    if ($nameNumberFile == 'thumbs01') {
                        $imgThumbMinOne = $imgsThumbMin[1];
                    } elseif ($nameNumberFile == 'thumbs02') {
                        $imgThumbMinTwo = $imgsThumbMin[1];
                    } elseif ($nameNumberFile == 'thumbs03') {
                        $imgThumbMinThree = $imgsThumbMin[1];
                    }

                    //$imgThumbMinTwo = $imgsThumbMin[1]; 
                }

                if ( count($imgsThumbMin) >= 3 && $imgsThumbMin[2] != "") {

                    $arrayPathFile = explode('/', $imgsThumbMin[2]);
                    $nameFile = $arrayPathFile[count($arrayPathFile) - 1];
                    $arrayNameFile = explode('_', $nameFile);
                    $array2NameFile = explode('.', $arrayNameFile[1]);
                    $nameNumberFile = $array2NameFile[0];

                    if ($nameNumberFile == 'thumbs01') {
                        $imgThumbMinOne = $imgsThumbMin[2];
                    } elseif ($nameNumberFile == 'thumbs02') {
                        $imgThumbMinTwo = $imgsThumbMin[2];
                    } elseif ($nameNumberFile == 'thumbs03') {
                        $imgThumbMinThree = $imgsThumbMin[2];
                    }

                    //$imgThumbMinThree = $imgsThumbMin[2]; 
                }
            }


            if ($thumbFacilitador != '') {
                $imgsThumbFacilit = explode(',', $thumbFacilitador);
                $imgThumbFacilitador = $imgsThumbFacilit[0];
            }
            if ($thumbNote != '') {
                $imgsThumbNot = explode(',', $thumbNote);
                $imgThumbNote = $imgsThumbNot[0];
                $buttonCleanImg = "<button type='button' class='btn botonFormulario' data-origin='update' id='btnDeleteImage' style='width:80%; margin:15px;' >Limpiar</button>";
            }


            if (is_null($idDescto) == true && $idDescto == '') {
                $idDescto = 0;
            }

            $contact = '';
            if ($contacto != '') {
                $contact = json_decode($contacto);
            }


            $inputsDinamic = '';
            if ($idMadality == 1) {
                $inputsDinamic = " 
                    <div class='col col-md-6 col-lg-4 ' id='contentDirection' >
                        <div class='form-group'>
                            <label>Direccion *</label>
                            <input type='text' id='direction' name='direction' value='$direction' class='form-control'>
                        </div>
                    </div> 

                    <div class='col col-md-6 col-lg-4' id='contentLinkLocation' >
                        <div class='form-group'>
                            <label>Link localizacion *</label>
                            <input type='text' id='location' name='location' value='$linkLocation' class='form-control'>
                        </div>
                    </div> 

                    <div class='col col-md-6 col-lg-4' id='contentNotes' style='display:none;'>
                        <div class='form-group'>
                            <label>Notas *</label>
                            <input type='text' id='notes' name='notes' class='form-control'>
                        </div>
                    </div>

                    <div class='col col-md-6 col-lg-4' id='contentLinkConecction' style='display:none;'>
                        <div class='form-group'>
                            <label>Link de conexion *</label>
                            <input type='text' id='linkconection' name='linkconection' class='form-control'>
                        </div>
                    </div>
                    ";
            } else if ($idMadality == 2) {
                $inputsDinamic = "
                    <div class='col col-md-6 col-lg-4 ' id='contentDirection' style='display:none;'>
                        <div class='form-group'>
                            <label>Direccion *</label>
                            <input type='text' id='direction' name='direction' class='form-control'>
                        </div>
                    </div> 

                    <div class='col col-md-6 col-lg-4' id='contentLinkLocation' style='display:none;'>
                        <div class='form-group'>
                            <label>Link localizacion *</label>
                            <input type='text' id='location' name='location' class='form-control'>
                        </div>
                    </div> 

                    <div class='col col-md-6 col-lg-4' id='contentNotes' >
                        <div class='form-group'>
                            <label>Notas *</label>
                            <input type='text' id='notes' name='notes' value='$virtualNotes' class='form-control'>
                        </div>
                    </div>

                    <div class='col col-md-6 col-lg-4' id='contentLinkConecction' >
                        <div class='form-group'>
                            <label>Link de conexion *</label>
                            <input type='text' id='linkconection' name='linkconection' value='$virtualLink' class='form-control'>
                        </div>
                    </div>
                    ";
            } else if ($idMadality == 3) {
                $inputsDinamic = "
                    <div class='col col-md-6 col-lg-4 ' id='contentDirection' >
                        <div class='form-group'>
                            <label>Direccion *</label>
                            <input type='text' id='direction' name='direction' value='$direction' class='form-control'>
                        </div>
                    </div> 

                    <div class='col col-md-6 col-lg-4' id='contentLinkLocation' >
                        <div class='form-group'>
                            <label>Link localizacion *</label>
                            <input type='text' id='location' name='location' value='$linkLocation'  class='form-control'>
                        </div>
                    </div> 

                    <div class='col col-md-6 col-lg-4' id='contentNotes' >
                        <div class='form-group'>
                            <label>Notas *</label>
                            <input type='text' id='notes' name='notes' value='$virtualNotes' class='form-control'>
                        </div>
                    </div>

                    <div class='col col-md-6 col-lg-4' id='contentLinkConecction' >
                        <div class='form-group'>
                            <label>Link de conexion *</label>
                            <input type='text' id='linkconection' value='$virtualLink' name='linkconection' class='form-control'>
                        </div>
                    </div>
                    ";
            }

            //$idDescto = 5;

            // include('includes/templates/crear/descuento-canastaproducto.php');
            //$formDescto = formDescto();

            //$formDescto = formulario_descuento_producto($mysqli,$idDescto,$precioMxnDescto,'catalogo_descuentos');

            $html = "
                    <input type='hidden' id='tipo' value='$id'>
                    <input type='hidden' id='thumbHead' value='$thumbHead'>
                    <input type='hidden' id='thumbCours' value='$thumbCours'>
                    <input type='hidden' id='thumbFacilitador' value='$thumbFacilitador'>
                    <input type='hidden' id='thumbNote' value='$thumbNote'>
                    <div class='col-sm-12'>
                        <div class='card card-blue direct-chat direct-chat-dark'>
    
                            <div class='card-header card-personalizado' >
                                <h3 class='card-title'>Datos</h3>
                                <div class='card-tools'>
                                    <button type='button' class='btn btn-tool' data-card-widget='collapse'><i class='fas fa-minus'></i>
                                    </button>
                                </div>
                            </div>
                            <div class='card-footer'>
                                <div class='row g-3'>
                                    <div class='col col-md-6 col-lg-4'>
                                        <div class='form-group'>
                                            <label>Sku</label>
                                            <input
                                                type='text'
                                                id='sku'
                                                class='form-control'
                                                placeholder='Identificador'
                                                maxlength='19'
                                                value='$sku'
                                                disabled
                                                >
                                        </div>
                                    </div>

                                    <div class='col col-md-6 col-lg-4'>
                                        <div class='form-group'>
                                            <label>Categoria *</label>
                                            <select id='category' class='form-control'>$lisCategories</select>
                                        </div>
                                    </div>

                                    <div class='col col-md-6 col-lg-4'>
                                        <div class='form-group'>
                                            <label>Modalidad *</label>
                                            <select id='modality' class='form-control'>$modalities</select>
                                        </div>
                                    </div>

                                    $inputsDinamic

                                    <div class='col col-md-6 col-lg-4'>
                                        <div class='form-group'>
                                            <label>Nombre *</label>
                                            <input
                                                type='text'
                                                id='nameCourseWorks'
                                                class='form-control'
                                                placeholder='texto'
                                                maxlength='69'
                                                value='$nameProduct'
                                                >
                                        </div>
                                    </div>

                                    <div class='col col-md-6 col-lg-4'>
                                        <div class='form-group'>
                                            <label>Duración *</label>
                                            <input
                                                type='text'
                                                id='duration'
                                                class='form-control'
                                                placeholder='texto'
                                                maxlength='69'
                                                value='$durationProduct'
                                                >
                                        </div>
                                    </div>

                                    <div class='col-sm-12'>
                                        <input type='hidden' value='$fechaInicio' id='inpputStartDate'>
                                        <div class='form-group'>
                                            <label>Fecha inicio *</label>
                                            <div id='startDate' class='start__date'>
                                                <select id='startDateDay' class='form-control'></select>
                                                <select id='startDateMonth' class='form-control'></select>
                                                <select id='startDateYear' class='form-control'></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='col-sm-12'>
                                        <input type='hidden' value='$fechaFin' id='inpputEndDate'>
                                        <div class='form-group'>
                                            <label>Fecha fin *</label>
                                            <div class='end__date' id='endDate'>
                                                <select id='endDateDay' class='form-control'></select>
                                                <select id='endDateMonth' class='form-control'></select>
                                                <select id='endDateYear' class='form-control'></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='col col-md-6 col-lg-4'>
                                        <div class='form-group'>
                                            <label>Disponibilidad *</label>
                                            <input
                                                type='number'
                                                id='stock'
                                                class='form-control'
                                                placeholder='Stock del producto'
                                                maxlength='4'
                                                value='$stock'
                                                >
                                        </div>
                                    </div>
                                
                                    <div class='col-sm-12'>
                                        <div class='form-group'>
                                            <label>Descripción corta</label>
                                            <textarea name='descripcion_corta' id='descripcion_corta'>$shortDescription</textarea>
                                            <div id='conteo1'></div>
                                        </div>
                                    </div>

                                    <div class='col-sm-12'>
                                        <div class='form-group'>
                                            <label>Objetivo del taller / evento</label>
                                            <textarea name='incluyeDescripcion' id='incluyeDescripcion'>$indludeDescription</textarea>
                                            <div id='conteo3'></div>
                                        </div>
                                    </div>

                                    <div class='col-sm-12'>
                                        <div class='form-group'>
                                            <label>Descripción larga</label>
                                            <textarea name='descripcion_larga' id='descripcion_larga'>$longDescription</textarea>
                                            <div id='conteo2'></div>
                                        </div>
                                    </div>

                                

                                    <div class='col-sm-12' style='display:none;'>
                                        <div class='form-group'>
                                            <label>Esquema del curso *</label>
                                            <textarea name='esquemaCurso' id='esquemaCurso'>$coursDescription</textarea>
                                            <div id='conteo4'></div>
                                        </div>
                                    </div>

                                    <div class='col-sm-12'>
                                        <label>Imagen de encabezado (jpg, jpeg, png - Máximo 5MB)</label>
                                    </div>
                                    <div class='col-sm-12 images__inputs'>
                                    
                                        <div class='row'>
                                            <div class='col'>
                                                <label class='label' data-toggle='tooltip' title='Change your avatar'>
                                                    <img class='rounded' id='avatarThumb1' src='$imgThumbOne' alt='avatar'>
                                                    <input type='file' class='sr-only' id='inputThumb1' name='image' accept='.png, .jpg, .jpeg'>
                                                </label>
                                            </div>
                                            <div class='col' style='display:none;'>
                                                <label class='label' data-toggle='tooltip' title='Change your avatar'>
                                                    <img class='rounded' id='avatarThumb2' src='$imgThumbTwo' alt='avatar'>
                                                    <input type='file' class='sr-only' id='inputThumb2' name='image' accept='.png, .jpg, .jpeg'>
                                                </label>
                                            </div>
                                            <div class='col' style='display:none;'>
                                                <label class='label' data-toggle='tooltip' title='Change your avatar'>
                                                    <img class='rounded' id='avatarThumb3' src='$imgThumbThree' alt='avatar'>
                                                    <input type='file' class='sr-only' id='inputThumb3' name='image' accept='.png, .jpg, .jpeg'>
                                                </label>
                                            </div>
                                        </div>

                                        <div class='container'>
                                                                
                                            <div class='modal fade' id='modalThumb1' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
                                                <div class='modal-dialog modal-lg' role='document'>
                                                    <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='modalLabel'>Recorte de imagen</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <div class='img-container'>
                                                        <img id='imageThumb1' src='https://avatars0.githubusercontent.com/u/3456749'>
                                                        </div>
                                                        <br>
                                                            <div class='content-btn-controls'>
                                                                <div class='btn-move'>
                                                                    <button id='btnMoveLeftT1' type='button' class='btn btn-primary' data-method='move' data-option='-10' data-second-option='0' title='Mover Izq.'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Izq.'>
                                                                            <span class='fa fa-arrow-left'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnMoveRightT1' type='button' class='btn btn-primary' data-method='move' data-option='10' data-second-option='0' title='Mover Derecha' >
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Derecha'>
                                                                            <span class='fa fa-arrow-right'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnMoveUpT1' type='button' class='btn btn-primary' data-method='move' data-option='0' data-second-option='-10' title='Mover Arriba'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Arriba'>
                                                                            <span class='fa fa-arrow-up'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnMoveDownT1' type='button' class='btn btn-primary' data-method='move' data-option='0' data-second-option='10' title='Mover Abajo'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Abajo'>
                                                                            <span class='fa fa-arrow-down'></span>
                                                                        </span>
                                                                    </button>
                                                                
                                                                    <button id='btnZoomPlusT1' type='button' class='btn btn-primary' data-method='zoom' data-option='0.1' title='Zoom In'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Zoom In'>
                                                                            <span class='fa fa-search-plus'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnZoomMinusT1' type='button' class='btn btn-primary' data-method='zoom' data-option='-0.1' title='Zoom Out'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Zoom Out)'>
                                                                            <span class='fa fa-search-minus'></span>
                                                                        </span>
                                                                    </button>
                                                            
                                                                    <button id='btnRotateLT1' type='button' class='btn btn-primary' title='Rotar a la izquierda'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Rotar a la izquierda'>
                                                                            <i class='fa fa-undo' aria-hidden='true'></i>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnRotateRT1' type='button' class='btn btn-primary' title='Rotar a la derecha'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Rotar a la derecha'>
                                                                            <i class='fa fa-repeat' aria-hidden='true'></i>
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        <br>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                                                        <button type='button' class='btn btn-primary' id='cropThumb1'>Recortar</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class='modal fade' id='modalThumb2' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
                                                <div class='modal-dialog modal-lg' role='document'>
                                                    <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='modalLabel'>Recorte de imagen</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <div class='img-container'>
                                                        <img id='imageThumb2' src='https://avatars0.githubusercontent.com/u/3456749'>
                                                        </div>
                                                        <br>
                                                            <div class='content-btn-controls'>
                                                                <div class='btn-move'>
                                                                    <button id='btnMoveLeftT2' type='button' class='btn btn-primary' data-method='move' data-option='-10' data-second-option='0' title='Mover Izq.'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Izq.'>
                                                                            <span class='fa fa-arrow-left'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnMoveRightT2' type='button' class='btn btn-primary' data-method='move' data-option='10' data-second-option='0' title='Mover Derecha' >
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Derecha'>
                                                                            <span class='fa fa-arrow-right'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnMoveUpT2' type='button' class='btn btn-primary' data-method='move' data-option='0' data-second-option='-10' title='Mover Arriba'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Arriba'>
                                                                            <span class='fa fa-arrow-up'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnMoveDownT2' type='button' class='btn btn-primary' data-method='move' data-option='0' data-second-option='10' title='Mover Abajo'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Abajo'>
                                                                            <span class='fa fa-arrow-down'></span>
                                                                        </span>
                                                                    </button>
                                                                
                                                                    <button id='btnZoomPlusT2' type='button' class='btn btn-primary' data-method='zoom' data-option='0.1' title='Zoom In'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Zoom In'>
                                                                            <span class='fa fa-search-plus'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnZoomMinusT2' type='button' class='btn btn-primary' data-method='zoom' data-option='-0.1' title='Zoom Out'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Zoom Out)'>
                                                                            <span class='fa fa-search-minus'></span>
                                                                        </span>
                                                                    </button>
                                                            
                                                                    <button id='btnRotateLT2' type='button' class='btn btn-primary' title='Rotar a la izquierda'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Rotar a la izquierda'>
                                                                            <i class='fa fa-undo' aria-hidden='true'></i>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnRotateRT2' type='button' class='btn btn-primary' title='Rotar a la derecha'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Rotar a la derecha'>
                                                                            <i class='fa fa-repeat' aria-hidden='true'></i>
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        <br>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                                                        <button type='button' class='btn btn-primary' id='cropThumb2'>Recortar</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class='modal fade' id='modalThumb3' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
                                                <div class='modal-dialog modal-lg' role='document'>
                                                    <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='modalLabel'>Recorte de imagen</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <div class='img-container'>
                                                        <img id='imageThumb3' src='https://avatars0.githubusercontent.com/u/3456749'>
                                                        </div>
                                                        <br>
                                                            <div class='content-btn-controls'>
                                                                <div class='btn-move'>
                                                                    <button id='btnMoveLeftT3' type='button' class='btn btn-primary' data-method='move' data-option='-10' data-second-option='0' title='Mover Izq.'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Izq.'>
                                                                            <span class='fa fa-arrow-left'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnMoveRightT3' type='button' class='btn btn-primary' data-method='move' data-option='10' data-second-option='0' title='Mover Derecha' >
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Derecha'>
                                                                            <span class='fa fa-arrow-right'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnMoveUpT3' type='button' class='btn btn-primary' data-method='move' data-option='0' data-second-option='-10' title='Mover Arriba'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Arriba'>
                                                                            <span class='fa fa-arrow-up'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnMoveDownT3' type='button' class='btn btn-primary' data-method='move' data-option='0' data-second-option='10' title='Mover Abajo'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Abajo'>
                                                                            <span class='fa fa-arrow-down'></span>
                                                                        </span>
                                                                    </button>
                                                                
                                                                    <button id='btnZoomPlusT3' type='button' class='btn btn-primary' data-method='zoom' data-option='0.1' title='Zoom In'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Zoom In'>
                                                                            <span class='fa fa-search-plus'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnZoomMinusT3' type='button' class='btn btn-primary' data-method='zoom' data-option='-0.1' title='Zoom Out'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Zoom Out)'>
                                                                            <span class='fa fa-search-minus'></span>
                                                                        </span>
                                                                    </button>
                                                            
                                                                    <button id='btnRotateLT3' type='button' class='btn btn-primary' title='Rotar a la izquierda'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Rotar a la izquierda'>
                                                                            <i class='fa fa-undo' aria-hidden='true'></i>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnRotateRT3' type='button' class='btn btn-primary' title='Rotar a la derecha'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Rotar a la derecha'>
                                                                            <i class='fa fa-repeat' aria-hidden='true'></i>
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        <br>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>    
                                                        <button type='button' class='btn btn-primary' id='cropThumb3'>Recortar</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        
                                    </div>
                                    <br>
                                    <div class='col-sm-12'>
                                        <label>Thumb (jpg, jpeg, png - Máximo de 5MB)</label>
                                    </div>
                                    <div class='col-sm-12 images__inputs'>
                                        <div class='row'>
                                            <div class='col'>
                                                <label class='label' data-toggle='tooltip' title='Change your avatar'>
                                                <img class='rounded' id='avatarThumbs1' src='$imgThumbMinOne' alt='avatar'>
                                                <input type='file' class='sr-only' id='inputThumbs1' name='image' accept='.png, .jpg, .jpeg'>
                                            </div>
                                            <div class='col'>
                                                <label class='label' data-toggle='tooltip' title='Change your avatar' style='display:none;'>
                                                <img class='rounded' id='avatarThumbs2' src='$imgThumbMinTwo' alt='avatar'>
                                                <input type='file' class='sr-only' id='inputThumbs2' name='image' accept='.png, .jpg, .jpeg'>
                                            </div>
                                            <div class='col'>
                                                <label class='label' data-toggle='tooltip' title='Change your avatar' style='display:none;'>
                                                <img class='rounded' id='avatarThumbs3' src='$imgThumbMinThree' alt='avatar'>
                                                <input type='file' class='sr-only' id='inputThumbs3' name='image' accept='.png, .jpg, .jpeg'>
                                            </div>
                                        </div>


                                        <div class='container'>
                                                                
                                            <div class='modal fade' id='modalThumbs1' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
                                                <div class='modal-dialog modal-lg' role='document'>
                                                    <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='modalLabel'>Recorte de imagen</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <div class='img-container'>
                                                        <img id='imageThumbs1' src='https://avatars0.githubusercontent.com/u/3456749'>
                                                        </div>
                                                        <br>
                                                            <div class='content-btn-controls'>
                                                                <div class='btn-move'>
                                                                    <button id='btnMoveLeftTs1' type='button' class='btn btn-primary' data-method='move' data-option='-10' data-second-option='0' title='Mover Izq.'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Izq.'>
                                                                            <span class='fa fa-arrow-left'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnMoveRightTs1' type='button' class='btn btn-primary' data-method='move' data-option='10' data-second-option='0' title='Mover Derecha' >
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Derecha'>
                                                                            <span class='fa fa-arrow-right'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnMoveUpTs1' type='button' class='btn btn-primary' data-method='move' data-option='0' data-second-option='-10' title='Mover Arriba'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Arriba'>
                                                                            <span class='fa fa-arrow-up'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnMoveDownTs1' type='button' class='btn btn-primary' data-method='move' data-option='0' data-second-option='10' title='Mover Abajo'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Abajo'>
                                                                            <span class='fa fa-arrow-down'></span>
                                                                        </span>
                                                                    </button>
                                                                
                                                                    <button id='btnZoomPlusTs1' type='button' class='btn btn-primary' data-method='zoom' data-option='0.1' title='Zoom In'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Zoom In'>
                                                                            <span class='fa fa-search-plus'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnZoomMinusTs1' type='button' class='btn btn-primary' data-method='zoom' data-option='-0.1' title='Zoom Out'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Zoom Out)'>
                                                                            <span class='fa fa-search-minus'></span>
                                                                        </span>
                                                                    </button>
                                                            
                                                                    <button id='btnRotateLTs1' type='button' class='btn btn-primary' title='Rotar a la izquierda'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Rotar a la izquierda'>
                                                                            <i class='fa fa-undo' aria-hidden='true'></i>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnRotateRTs1' type='button' class='btn btn-primary' title='Rotar a la derecha'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Rotar a la derecha'>
                                                                            <i class='fa fa-repeat' aria-hidden='true'></i>
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        <br>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                                                        <button type='button' class='btn btn-primary' id='cropThumbs1'>Recortar</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class='modal fade' id='modalThumbs2' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
                                                <div class='modal-dialog modal-lg' role='document'>
                                                    <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='modalLabel'>Recorte de imagen</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <div class='img-container'>
                                                        <img id='imageThumbs2' src='https://avatars0.githubusercontent.com/u/3456749'>
                                                        </div>
                                                        <br>
                                                            <div class='content-btn-controls'>
                                                                <div class='btn-move'>
                                                                    <button id='btnMoveLeftTs2' type='button' class='btn btn-primary' data-method='move' data-option='-10' data-second-option='0' title='Mover Izq.'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Izq.'>
                                                                            <span class='fa fa-arrow-left'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnMoveRightTs2' type='button' class='btn btn-primary' data-method='move' data-option='10' data-second-option='0' title='Mover Derecha' >
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Derecha'>
                                                                            <span class='fa fa-arrow-right'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnMoveUpTs2' type='button' class='btn btn-primary' data-method='move' data-option='0' data-second-option='-10' title='Mover Arriba'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Arriba'>
                                                                            <span class='fa fa-arrow-up'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnMoveDownTs2' type='button' class='btn btn-primary' data-method='move' data-option='0' data-second-option='10' title='Mover Abajo'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Abajo'>
                                                                            <span class='fa fa-arrow-down'></span>
                                                                        </span>
                                                                    </button>
                                                                
                                                                    <button id='btnZoomPlusTs2' type='button' class='btn btn-primary' data-method='zoom' data-option='0.1' title='Zoom In'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Zoom In'>
                                                                            <span class='fa fa-search-plus'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnZoomMinusTs2' type='button' class='btn btn-primary' data-method='zoom' data-option='-0.1' title='Zoom Out'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Zoom Out)'>
                                                                            <span class='fa fa-search-minus'></span>
                                                                        </span>
                                                                    </button>
                                                            
                                                                    <button id='btnRotateLTs2' type='button' class='btn btn-primary' title='Rotar a la izquierda'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Rotar a la izquierda'>
                                                                            <i class='fa fa-undo' aria-hidden='true'></i>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnRotateRTs2' type='button' class='btn btn-primary' title='Rotar a la derecha'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Rotar a la derecha'>
                                                                            <i class='fa fa-repeat' aria-hidden='true'></i>
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        <br>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                                                        <button type='button' class='btn btn-primary' id='cropThumbs2'>Recortar</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class='modal fade' id='modalThumbs3' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
                                                <div class='modal-dialog modal-lg' role='document'>
                                                    <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='modalLabel'>Recorte de imagen</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <div class='img-container'>
                                                        <img id='imageThumbs3' src='https://avatars0.githubusercontent.com/u/3456749'>
                                                        </div>
                                                        <br>
                                                            <div class='content-btn-controls'>
                                                                <div class='btn-move'>
                                                                    <button id='btnMoveLeftTs3' type='button' class='btn btn-primary' data-method='move' data-option='-10' data-second-option='0' title='Mover Izq.'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Izq.'>
                                                                            <span class='fa fa-arrow-left'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnMoveRightTs3' type='button' class='btn btn-primary' data-method='move' data-option='10' data-second-option='0' title='Mover Derecha' >
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Derecha'>
                                                                            <span class='fa fa-arrow-right'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnMoveUpTs3' type='button' class='btn btn-primary' data-method='move' data-option='0' data-second-option='-10' title='Mover Arriba'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Arriba'>
                                                                            <span class='fa fa-arrow-up'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnMoveDownTs3' type='button' class='btn btn-primary' data-method='move' data-option='0' data-second-option='10' title='Mover Abajo'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Abajo'>
                                                                            <span class='fa fa-arrow-down'></span>
                                                                        </span>
                                                                    </button>
                                                                
                                                                    <button id='btnZoomPlusTs3' type='button' class='btn btn-primary' data-method='zoom' data-option='0.1' title='Zoom In'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Zoom In'>
                                                                            <span class='fa fa-search-plus'></span>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnZoomMinusTs3' type='button' class='btn btn-primary' data-method='zoom' data-option='-0.1' title='Zoom Out'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Zoom Out)'>
                                                                            <span class='fa fa-search-minus'></span>
                                                                        </span>
                                                                    </button>
                                                            
                                                                    <button id='btnRotateLTs3' type='button' class='btn btn-primary' title='Rotar a la izquierda'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Rotar a la izquierda'>
                                                                            <i class='fa fa-undo' aria-hidden='true'></i>
                                                                        </span>
                                                                    </button>
                                                                    <button id='btnRotateRTs3' type='button' class='btn btn-primary' title='Rotar a la derecha'>
                                                                        <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Rotar a la derecha'>
                                                                            <i class='fa fa-repeat' aria-hidden='true'></i>
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        <br>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>    
                                                        <button type='button' class='btn btn-primary' id='cropThumbs3'>Recortar</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class='col col-md-6 col-lg-4'>
                                        <div class='form-group'>
                                            <label>Precio(MXN) *</label>
                                            <input
                                                type='text'
                                                id='preciomx'
                                                class='form-control'
                                                placeholder='Precio'
                                                maxlength='13'
                                                value='$precioMxn'>
                                        </div>
                                    </div>

                                    <div class='col col-md-6 col-lg-4'>
                                        <input type='hidden' id='existIdDescto' value='$idDescto' >
                                        <div class='form-group'>
                                            <label>Incluir descuento *</label>
                                            <select id='check_descuento' class='form-control'>
                                                $optionDescto
                                            </select>
                                        </div>
                                    </div>";
            //$formDescto
            $html .= formulario_descuento_producto($mysqli, $idDescto, $precioMxnDescto, 'catalogo_descuentos');
            $html .= "<div class='col col-md-6 col-lg-4'>
                                        <div class='form-group'>
                                            <label>Publicar *</label>
                                            <select id='disponible' class='form-control'>
                                                <option disabled >----</option>
                                                $optionPublished
                                            </select>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>

                        <!-- Datos de facilitador -->
                        <div class='card card-blue direct-chat direct-chat-dark'>
                            <div class='card-header card-personalizado' >
                                <h3 class='card-title'>Datos de facilitador</h3>
                                <div class='card-tools'>
                                    <button type='button' class='btn btn-tool' data-card-widget='collapse'><i class='fas fa-minus'></i>
                                    </button>
                                </div>
                            </div>
                            <div class='card-footer'>
                                <div class='row g-3'>
                                    <div class='col col-md-6 col-lg-4'>
                                        <div class='form-group'>
                                            <label>Nombre de facilitador</label>
                                            <input
                                                type='text'
                                                id='nameFacilitador'
                                                class='form-control'
                                                value='$nameFacilitador' >
                                        </div>
                                    </div>
        
                                    <div class='col-sm-12' style='display:none;'>
                                        <div class='form-group'>
                                            <label>Posición de facilitador</label>
                                            <input
                                                type='text'
                                                id='positionFacilitador'
                                                class='form-control'
                                                value='$positionFacilitador' >
                                        </div>
                                    </div>

                                    <div class='col col-md-6 col-lg-4'>
                                        <div class='form-group'>
                                            <label>Whatsapp</label>
                                            <input
                                                type='text'
                                                id='whatsFacilitador'
                                                value='" . $contact->whats . "'
                                                class='form-control'
                                                placeholder='1234567890'>
                                        </div>
                                    </div>

                                    <div class='col col-md-6 col-lg-4'>
                                        <div class='form-group'>
                                            <label>Telefono</label>
                                            <input
                                                type='text'
                                                id='telFacilitador'
                                                class='form-control'
                                                value='" . $contact->tel . "'
                                                placeholder='1234567890'>
                                        </div>
                                    </div>

                                    <div class='col col-md-6 col-lg-4'>
                                        <div class='form-group'>
                                            <label>Email</label>
                                            <input
                                                type='text'
                                                id='emailFacilitador'
                                                class='form-control'
                                                value='" . $contact->email . "'
                                                placeholder='correo@gmail.com'>
                                        </div>
                                    </div>


                                    <div class='col-sm-12' style='display:none'>
                                        <div class='form-group'>
                                            <label>Link facilitador</label>
                                            <input
                                                type='text'
                                                id='linkCourseWorks'
                                                class='form-control'
                                                placeholder='https://granjatequio.com/ejemplo-red-social.html'
                                                value='$linkProduct'>
                                        </div>
                                    </div>


                                    <div class='col-sm-12'>
                                        <label>Imagen de facilitador (jpg, jpeg, png - Máximo 5MB)</label>
                                    </div>
                                    <div class='col-sm-12 images__input'>
                                        <label class='label' data-toggle='tooltip' title='Change your avatar'>
                                            <img class='rounded' id='avatarFacilitador' src='$imgThumbFacilitador' alt='avatar'>
                                            <input type='file' class='sr-only' id='inputFacilitador' name='image' accept='.png, .jpg, .jpeg'>
                                        </label>
                                    </div>
                                    
                                    <div class='container'>
                                        <div class='modal fade' id='modalFacilitador' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
                                            <div class='modal-dialog modal-lg' role='document'>
                                                <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='modalLabel'>Crop the image</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                <div class='modal-body content__cropper'>
                                                    <div class='img-container'>
                                                    <img id='imageFacilitador' src='https://avatars0.githubusercontent.com/u/3456749'>
                                                    </div>
                                                    <br>
                                                        <div class='content-btn-controls'>
                                                            <div class='btn-move'>
                                                                <button id='btnMoveLeftFa' type='button' class='btn btn-primary' data-method='move' data-option='-10' data-second-option='0' title='Mover Izq.'>
                                                                    <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Izq.'>
                                                                        <span class='fa fa-arrow-left'></span>
                                                                    </span>
                                                                </button>
                                                                <button id='btnMoveRightFa' type='button' class='btn btn-primary' data-method='move' data-option='10' data-second-option='0' title='Mover Derecha' >
                                                                    <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Derecha'>
                                                                        <span class='fa fa-arrow-right'></span>
                                                                    </span>
                                                                </button>
                                                                <button id='btnMoveUpFa' type='button' class='btn btn-primary' data-method='move' data-option='0' data-second-option='-10' title='Mover Arriba'>
                                                                    <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Arriba'>
                                                                        <span class='fa fa-arrow-up'></span>
                                                                    </span>
                                                                </button>
                                                                <button id='btnMoveDownFa' type='button' class='btn btn-primary' data-method='move' data-option='0' data-second-option='10' title='Mover Abajo'>
                                                                    <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Abajo'>
                                                                        <span class='fa fa-arrow-down'></span>
                                                                    </span>
                                                                </button>
                                                            
                                                                <button id='btnZoomPlusFa' type='button' class='btn btn-primary' data-method='zoom' data-option='0.1' title='Zoom In'>
                                                                    <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Zoom In'>
                                                                        <span class='fa fa-search-plus'></span>
                                                                    </span>
                                                                </button>
                                                                <button id='btnZoomMinusFa' type='button' class='btn btn-primary' data-method='zoom' data-option='-0.1' title='Zoom Out'>
                                                                    <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Zoom Out)'>
                                                                        <span class='fa fa-search-minus'></span>
                                                                    </span>
                                                                </button>
                                                        
                                                                <button id='btnRotateLFa' type='button' class='btn btn-primary' title='Rotar a la izquierda'>
                                                                    <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Rotar a la izquierda'>
                                                                        <i class='fa fa-undo' aria-hidden='true'></i>
                                                                    </span>
                                                                </button>
                                                                <button id='btnRotateRFa' type='button' class='btn btn-primary' title='Rotar a la derecha'>
                                                                    <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Rotar a la derecha'>
                                                                        <i class='fa fa-repeat' aria-hidden='true'></i>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    <br>
                                                </div>
                                                <div class='modal-footer content__cropper'>
                                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                                                    <button type='button' class='btn btn-primary' id='cropFacilitador'>Recortar</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Datos de nota de blog -->
                        <div class='card card-blue direct-chat direct-chat-dark'>
                            <div class='card-header card-personalizado' >
                                <h3 class='card-title'>Datos del certificado</h3>
                                <div class='card-tools'>
                                    <button type='button' class='btn btn-tool' data-card-widget='collapse'><i class='fas fa-minus'></i>
                                    </button>
                                </div>
                            </div>
                            <div class='card-footer'>

                                <div class='col-sm-12' style='display:none;'>
                                    <div class='form-group'>
                                        <label>Nombre de nota</label>
                                        <input
                                            type='text'
                                            id='nameNoteBlog'
                                            class='form-control'
                                            value='$nameBlogNote' >
                                    </div>
                                </div>

                                <div class='col-sm-12' style='display:none;'>
                                    <div class='form-group'>
                                        <label>Fecha</label>
                                        <input
                                            type='text'
                                            id='dateNoteBlog'
                                            class='form-control'
                                            placeholder='1 - 5 enero de 2022'
                                            value='$dateBlogNote'>
                                    </div>
                                </div>

                                <div class='col-sm-12' style='display:none;'>
                                    <div class='form-group'>
                                        <label>Impartido por</label>
                                        <input
                                            type='text'
                                            id='nameFacilitadorNoteBlog'
                                            class='form-control'
                                            placeholder='Nombre del facilitador'
                                            value='$nameFailitadorBlogNote'>
                                    </div>
                                </div>
                                <div class='col-sm-3'>
                                    <label>Etiqueta de referencia</label>
                                    <input
                                            type='text'
                                            id='typeTagImage'
                                            class='form-control'
                                            value='$typeTagImage'
                                            placeholder='Diploma'>
                                </div>
                                <div class='col-sm-12'>
                                    <label> Imagen del certificado (jpg, jpeg, png - Máximo 5MB) </label>
                                </div>
                                <div class='col-sm-12 images__input'>
                                    <label class='label' data-toggle='tooltip' title='Change your avatar'>
                                        <img class='rounded' id='avatarNota' src='$imgThumbNote' alt='avatar'>
                                        <input type='file' class='sr-only' id='inputNota' name='image' accept='.png, .jpg, .jpeg'>
                                        $buttonCleanImg
                                    </label>

                                    <div class='container'>
                                        <div class='modal fade' id='modalNota' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
                                            <div class='modal-dialog modal-lg' role='document'>
                                                <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='modalLabel'>Recorte de imagen</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                <div class='modal-body content__cropper'>
                                                    <div class='img-container'>
                                                    <img id='imageNota' src='https://avatars0.githubusercontent.com/u/3456749'>
                                                    </div>
                                                    <br>
                                                        <div class='content-btn-controls'>
                                                            <div class='btn-move'>
                                                                <button id='btnMoveLeftNo' type='button' class='btn btn-primary' data-method='move' data-option='-10' data-second-option='0' title='Mover Izq.'>
                                                                    <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Izq.'>
                                                                        <span class='fa fa-arrow-left'></span>
                                                                    </span>
                                                                </button>
                                                                <button id='btnMoveRightNo' type='button' class='btn btn-primary' data-method='move' data-option='10' data-second-option='0' title='Mover Derecha' >
                                                                    <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Derecha'>
                                                                        <span class='fa fa-arrow-right'></span>
                                                                    </span>
                                                                </button>
                                                                <button id='btnMoveUpNo' type='button' class='btn btn-primary' data-method='move' data-option='0' data-second-option='-10' title='Mover Arriba'>
                                                                    <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Arriba'>
                                                                        <span class='fa fa-arrow-up'></span>
                                                                    </span>
                                                                </button>
                                                                <button id='btnMoveDownNo' type='button' class='btn btn-primary' data-method='move' data-option='0' data-second-option='10' title='Mover Abajo'>
                                                                    <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Mover Abajo'>
                                                                        <span class='fa fa-arrow-down'></span>
                                                                    </span>
                                                                </button>
                                                            
                                                                <button id='btnZoomPlusNo' type='button' class='btn btn-primary' data-method='zoom' data-option='0.1' title='Zoom In'>
                                                                    <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Zoom In'>
                                                                        <span class='fa fa-search-plus'></span>
                                                                    </span>
                                                                </button>
                                                                <button id='btnZoomMinusNo' type='button' class='btn btn-primary' data-method='zoom' data-option='-0.1' title='Zoom Out'>
                                                                    <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Zoom Out)'>
                                                                        <span class='fa fa-search-minus'></span>
                                                                    </span>
                                                                </button>
                                                        
                                                                <button id='btnRotateLNo' type='button' class='btn btn-primary' title='Rotar a la izquierda'>
                                                                    <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Rotar a la izquierda'>
                                                                        <i class='fa fa-undo' aria-hidden='true'></i>
                                                                    </span>
                                                                </button>
                                                                <button id='btnRotateRNo' type='button' class='btn btn-primary' title='Rotar a la derecha'>
                                                                    <span class='docs-tooltip' data-toggle='tooltip' title='' data-original-title='Rotar a la derecha'>
                                                                        <i class='fa fa-repeat' aria-hidden='true'></i>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    <br>
                                                </div>
                                                <div class='modal-footer content__cropper'>
                                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                                                    <button type='button' class='btn btn-primary' id='cropNota'>Recortar</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class='col-sm-12' style='display:none' >
                                    <div class='form-group'>
                                        <label>Link de nota</label>
                                        <input
                                            type='text'
                                            id='linkNoteBlog'
                                            class='form-control'
                                            placeholder='https://granjatequio.com/ejmplo-link -nota'
                                            value='$linkBlogNote' >
                                    </div>
                                </div>
    
                            </div>
                        </div>

                    </div>
                    <div class='col-sm-12'>
                        <button type='submit' class='btn botonFormulario'>Actualizar</button>
                        <a href='index.php?id=diploma_curos_talleres' class='btn botonFormulario' >Cerrar</a>
                    </div>
                ";

            $existe = true;
        }

        $query->close();
    }

    $mysqli->close();

    if ($existe === true) {
        echo $html;
    } else {
        echo "<label>No se ha encontrado ningún producto con ese ID </label>";
    }
}

function formDescto()
{

    date_default_timezone_set('America/Mexico_City');
    $anio_actual = date('Y');
    $anio_max = $anio_actual + 10;
    $startDate = inputs_fecha(1, 'inicio', $anio_actual, $anio_max, 0, 0, 0);
    $endDate = inputs_fecha(2, 'fin', $anio_actual, $anio_max, 0, 0, 0);

    $startTime = inputs_hora(1, 'inicio', 24, 60);
    $endTime = inputs_hora(2, 'fin', 24, 60);

    return "
            <div class='card card-blue direct-chat direct-chat-dark' id='div_descuento' style='display:none;'>
                <div class='card-header card-personalizado' >
                    <h3 class='card-title'>Asignar descuento</h3>
                    <div class='card-tools'>
                        <button type='button' class='btn btn-tool' data-card-widget='collapse'><i class='fas fa-minus'></i>
                        </button>
                    </div>
                </div>
                <div class='card-footer'>
                    <div class='row'>
                        <div class='col-sm-4'>
                            <div class='form-group'>
                                <label>Tipo descuento:</label>
                                <select id='tipo_descuento' class='form-control'>
                                        <option selected>----</option>
                                        <option value='Porcentaje'>% Porcentaje</option>
                                        <option value='Dinero'>$ Dinero</option>
                                </select>
                            </div>
                        </div>
                        <div class='col-sm-4'>
                            <div class='form-group'>
                                <label>Cantidad<span id='span_lblmxn' style='display:none;'>(MXN)</span>:</label>
                                <input
                                    type='text'
                                    id='cantidad1'
                                    class='form-control'
                                    placeholder='número con o sin decimales'
                                    maxlength='9'>
                            </div>
                        </div>
                        <div class='col-sm-4' >
                            <!--
                            <div class='form-group' id='div_cantidad2' style='display:none;'>
                                <label>Cantidad(USD)</label>
                                <input
                                    type='text'
                                    id='cantidad2'
                                    class='form-control'
                                    placeholder='número con o sin decimales'
                                    maxlength='9'>
                            </div>
                            -->
                        </div>

                        $startDate
                        $startTime
                        <div class='col-sm-4' ></div>

                        $endDate
                        $endTime
                        <div class='col-sm-4' ></div>
            
            
                        <div class='col-sm-4'>
                            <div class='form-group'>
                                <label>Estado:</label>
                                <select id='descuento_estado' class='form-control'>
                                    <option selected>----</option>
                                    <option value='0'>Desactivado</option>
                                    <option value='1'>Activado</option>
                                </select>
                            </div>
                        </div>
                        <div class='col-sm-4'>
                            <div class='form-group'>
                                <label>Precio(MXN) con descuento:</label>
                                <input
                                    type='text'
                                    id='preciodescuento'
                                    class='form-control'
                                    placeholder='se calcula automáticamente'
                                    readonly>
                            </div>
                        </div>
                        <div class='col-sm-4'>
                            <!--
                            <div class='form-group'>
                                <label>Precio(USD) con descuento:</label>
                                <input
                                    type='text'
                                    id='precio2descuento'
                                    class='form-control'
                                    placeholder='se calcula automáticamente'
                                    readonly>
                            </div>
                            -->
                        </div>
                    </div>
                </div>
            </div>
        ";
}
