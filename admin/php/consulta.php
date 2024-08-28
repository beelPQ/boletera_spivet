<?php


function ver_total_categorias()
{

    $mysqli = conectar();

    $query = $mysqli->prepare(" SELECT COUNT(id_categoria) from categoria ");
    $query->execute();
    $query->bind_result($total_categorias);
    $query->fetch();
    $query->close();
    $mysqli->close();

    echo $total_categorias;
}

function ver_total_productos()
{

    $mysqli = conectar();

    $query = $mysqli->prepare(" SELECT COUNT(id_producto) from producto ");
    $query->execute();
    $query->bind_result($total_producto);
    $query->fetch();
    $query->close();
    $mysqli->close();

    echo $total_producto;
}

function mostrar_tiendacategoria()
{
    $administrador = $_SESSION['id_logueo'];

    $mysqli = conectar();
    $html = "";
    //Se obtiene el total de categorias con su nombre para impresion donde id_global = 1.
    $query = " SELECT id_categoria, id_global, nombre_categoria, icono_categoria FROM tienda_categoria";
    $resultado = $mysqli->query($query);

    while ($row = mysqli_fetch_array($resultado)) {
        if ($row['id_global'] === '1') {
            $nombre_global = 'Cafeteria';
        } else {
            $nombre_global = 'Tienda Orgánica';
        }
        $html .= '
            <tr>
                <td>
                    <div >
                        <input type="checkbox" id="tiendacategoria:' . $row['id_categoria'] . '" data-id="editar-lista">
                        <label for="tiendacategoria:' . $row['id_categoria'] . '">
                        </label>
                    </div>
                </td>
                <td>' . $nombre_global . '</td>
                <td>' . $row['nombre_categoria'] . '</td>
                <td>' . $row['icono_categoria'] . '</td>
                ';


        $html .= '</tr>';
    }

    echo $html;
    $mysqli->close();
}

function mostrar_producto()
{


    $mysqli = conectar();
    $html = "";
    //Se obtiene el total de categorias con su nombre para impresion donde id_global = 1.
    $query = " SELECT * FROM producto ORDER BY IDsystempro";
    $resultado = $mysqli->query($query);

    $i = 1;
    while ($row = mysqli_fetch_array($resultado)) {

        $query = $mysqli->prepare(" SELECT nombre_categoria FROM categorias WHERE IDsystemCat = ?");
        $query->bind_param('i', $row['categoria']);
        $query->execute();
        $query->bind_result($categoria);
        $query->fetch();
        $query->close();



        if ($row['PrecioUSD'] == 0) {
            $precioUSD = "";
        } else {
            $precioUSD = $row['PrecioUSD'];
        }

        if ($row['disponible'] == 1) {
            $publicado = "Sí";
        } else {
            $publicado = "No";
        }


        $html .= '
            <tr>
                <td>
                    <div >
                        <input type="checkbox" id="productos:' . $row['IDsystempro'] . '" data-id="editar-lista">
                        <label for="productos:' . $row['IDsystempro'] . '">
                        </label>
                    </div>
                </td>
                <td><button type="button" class="btn botonFormulario" onclick="modalLista(' . $row['IDsystempro'] . ')">+</button></td>
                <td>' . $row['skuproducto'] . '</td>
                <td>' . $categoria . '</td>
                <td>' . $row['NombreProducto'] . '</td>
                <td>';
        if ($row['imagen'] != '' && is_null($row['imagen']) == false) {
            $html .= '<a href="images/producto/' . $row['imagen'] . '"></a>';
        }
        $html .= '</td>
                <td>' . $row['PrecioMX'] . '</td>
                <td>' . $precioUSD . '</td>
                ';

        $html .= '
                <td>' . $publicado . '</td>
               <td>';



        $query = " SELECT descuentos_id_descuento FROM producto_descuento WHERE producto_IDsystempro=" . $row['IDsystempro'];
        $resultado2 = $mysqli->query($query);
        $c = 1;
        while ($row2 = mysqli_fetch_array($resultado2)) {

            $query = $mysqli->prepare(" SELECT estatus_descuento FROM descuentos WHERE id_descuento=?");
            $query->bind_param('i', $row2['descuentos_id_descuento']);
            $query->execute();
            $query->bind_result($estatus_descuento);
            $query->fetch();
            $query->close();
            if ($estatus_descuento == 1) {
                $estatus_descuento = 'background-color:green;';
            } else {
                $estatus_descuento = 'background-color:red;';
            }
            $html .= ' <button type="button" class="btn botonFormulario" id="btnestado' . $row2['descuentos_id_descuento'] . '" style="' . $estatus_descuento . 'font-size:12px;" onclick="modalStatus(' . $row2['descuentos_id_descuento'] . ',' . $i . ')"  >D' . $c . '</button>';
            $c++;
        }


        $html .= '</td>
            </tr>';

        $i++;
    }

    $mysqli->close();

    echo $html;
}

function mostrar_tiendaproducto()
{

    $mysqli = conectar();
    $html = "";
    //Se obtiene el total de categorias con su nombre para impresion donde id_global = 1.
    $query = " SELECT id_producto, tpro.id_categoria, nombre_producto, tamaño_producto, precio_producto,
                nombre_categoria, id_global from tienda_producto AS tpro
                inner join tienda_categoria AS tcat on tpro.id_categoria = tcat.id_categoria ";
    $resultado = $mysqli->query($query);

    while ($row = mysqli_fetch_array($resultado)) {
        if ($row['id_global'] === '1') {
            $nombre_global = 'Cafeteria';
        } else {
            $nombre_global = 'Tienda Orgánica';
        }
        $html .= '
            <tr>
                <td>
                    <div >
                        <input type="checkbox" id="tiendaproducto:' . $row['id_producto'] . '" data-id="editar-lista">
                        <label for="tiendaproducto:' . $row['id_producto'] . '">
                        </label>
                    </div>
                </td>
                <td>' . $nombre_global . '</td>
                <td>' . $row['nombre_categoria'] . '</td>
                <td>' . $row['nombre_producto'] . '</td>
                <td>' . $row['tamaño_producto'] . '</td>
                <td>' . $row['precio_producto'] . '</td>
                ';

        $html .= '</tr>';
    }

    echo $html;
    $mysqli->close();
}

function mostrar_preorden()
{

    $mysqli = conectar();

    $html = "";
    $query = " SELECT id_formpreorden, nombre_formpreorden, apellidos_formpreorden, email_formpreorden, whatsapp_formpreorden,
                    nombre_categoria, nombre_producto, interes_formpreorden, codigopostal_formpreorden, direccion1_sucursal, contacto_formpreorden
                    FROM tienda_formpreorden 
                    INNER JOIN tienda_categoria ON tienda_formpreorden.id_categoria_formpreorden = tienda_categoria.id_categoria 
                    INNER JOIN tienda_producto ON tienda_formpreorden.id_producto_formpreorden = tienda_producto.id_producto 
                    INNER JOIN tienda_sucursales ON tienda_formpreorden.id_sucursal_formpreorden = tienda_sucursales.id_sucursal 
                    ORDER BY id_formpreorden";

    $resultado = $mysqli->query($query);
    while ($row = mysqli_fetch_array($resultado)) {

        $html .= '
            <tr>
                <td>' . $row['nombre_formpreorden'] . ' ' . $row['apellidos_formpreorden'] . '</td>
                <td>' . $row['email_formpreorden'] . '</td>
                <td>' . $row['whatsapp_formpreorden'] . '</td>
                <td>' . $row['nombre_categoria'] . '</td>
                <td>' . $row['nombre_producto'] . '</td>
                <td>' . $row['interes_formpreorden'] . '</td>
                <td>' . $row['direccion1_sucursal'] . '</td>';

        if ($row['contacto_formpreorden'] === '0') {
            $html .= '<td><a class="enviar" id="' . $row['id_formpreorden'] . '" data-id="formpreorden" data-id2="' . $row['whatsapp_formpreorden'] . '">
                    <img src="images/whats_rojo.png" alt="whats_rojo" style="opacity: .8"></a></td>
                    </tr>';
        } else {
            $html .= '<td><a class="enviar" id="' . $row['id_formpreorden'] . '" data-id="formpreorden" data-id2="' . $row['whatsapp_formpreorden'] . '">
                    <img src="images/whats_verde.png" alt="whats_verde" style="opacity: .8"></a></td>
                    </tr>';
        }
    }

    echo $html;
    $mysqli->close();
}

function mostrar_prospectos()
{
    $mysqli = conectar();
    $html = "";

    $query = " SELECT * FROM clientes ORDER BY IDuser";
    $resultado = $mysqli->query($query);

    while ($row = mysqli_fetch_array($resultado)) {



        $query = $mysqli->prepare(" SELECT estado FROM estados WHERE id = ?");
        $query->bind_param('i', $row['estado']);
        $query->execute();
        $query->bind_result($estado);
        $query->fetch();
        $query->close();

        $query = $mysqli->prepare(" SELECT municipio FROM municipios WHERE id = ?");
        $query->bind_param('i', $row['municipio']);
        $query->execute();
        $query->bind_result($municipio);
        $query->fetch();
        $query->close();



        if ($row['status'] == 1) {
            $status = 'En espera';
        } else if ($row['status'] == 2) {
            $status = 'Contactado';
        } else if ($row['status'] == 3) {
            $status = 'Registrado';
        } else if ($row['status'] == 4) {
            $status = 'No concretado';
        }

        if ($row['genero'] == 1) {
            $genero = 'Masculino';
        } else if ($row['genero'] == 2) {
            $genero = 'Femenino';
        } else {
            $genero = '';
        }


        $html .= '
            <tr>
                <td>
                    <div >
                        <input type="checkbox" id="prospectos:' . $row['IDuser'] . ':' . $row['status'] . '" data-id="editar-lista">
                        <label for="prospectos:' . $row['IDuser'] . '">
                        </label>
                    </div>
                </td>
                <td>' . $row['IDsolicitud'] . '</td>
                <td>' . $row['fecha_solicitud'] . '</td>
                <td>' . $row['num_registro'] . '</td>
                <td>' . $row['Nombre'] . '</td>
                <td>' . $row['Apellido1'] . '</td>
                <td>' . $row['Apellido2'] . '</td>
                <td>' . $row['whatsapp'] . '</td>
                <td>
                    <a class="enviar" id="' . $row['IDuser'] . '" data-id="' . $row['Nombre'] . ' ' . $row['Apellido1'] . ' ' . $row['Apellido2'] . '" data-id2="' . $row['whatsapp'] . '" >
                        <img src="images/whats_verde.png" alt="whats_verde" style="opacity: .8">
                    </a>
                </td>
                <td>' . $row['Email'] . '</td>
                <td>' . $row['fecha_nacimiento'] . '</td>
                <td>' . $genero . '</td>
                <td>' . $row['domicilio'] . '</td>
                <td>' . $row['codigo_postal'] . '</td>
                <td>' . $municipio . '</td>
                <td>' . $estado . '</td>
                <!-- <td> -->';
        /*
                    if($row['foto']!='' && is_null($row['foto'])==false){
                         $html.='<a href="../fotos/'.$row['foto'].'" target="_blank">Foto</a>';
                    }
                    */

        $html .= '<!-- </td> -->
                <td>' . $status . '</td>
            </tr>';
    }

    $mysqli->close();

    echo $html;
}

function mostrar_cobros()
{

    $mysqli = conectar();
    $html = "";

    $query = " SELECT * FROM cobros ORDER BY IDfolioGral";
    $resultado = $mysqli->query($query);

    $i = 1;
    while ($row = mysqli_fetch_array($resultado)) {

        $sistema_pago = '';
        if ($row['forma_depago_IDformapago'] != '' && is_null($row['forma_depago_IDformapago']) == false) {
            $query = "SELECT IDformapago,Nombrepago,plataforma FROM forma_depago WHERE IDsystemapades=$row[forma_depago_IDformapago]";
            $consulta_formapago = $mysqli->query($query);
            $formapago = mysqli_fetch_array($consulta_formapago);
            $idformapago = $formapago['Nombrepago'];
            if ($formapago['plataforma'] != 'Ninguna') {
                $sistema_pago = $formapago['plataforma'];
            }
        } else {
            $idformapago = '';
        }

        $query = "SELECT IDsolicitud,Nombre,Apellido1,Apellido2,num_registro FROM clientes WHERE IDuser=$row[cliente_IDuser]";
        $consulta_prospecto = $mysqli->query($query);
        $prospecto = mysqli_fetch_array($consulta_prospecto);

        $nombre_prospecto = $prospecto['Nombre'] . ' ' . $prospecto['Apellido1'] . ' ' . $prospecto['Apellido2'];

        if ($row['producto_IDproducto'] != '' && is_null($row['producto_IDproducto']) == false) {
            $query = "SELECT skuproducto,NombreProducto,categoria FROM producto WHERE IDsystempro=$row[producto_IDproducto]";
            $consulta_producto = $mysqli->query($query);
            $producto = mysqli_fetch_array($consulta_producto);

            $skuprograma = $producto['skuproducto'];
            $programa = $producto['NombreProducto'];



            $num_solicitud = $prospecto['IDsolicitud'];
        } else {
            $num_solicitud = $prospecto['IDsolicitud'];
            $skuprograma = '';
            $programa = '';
        }

        if ($row['facturar'] == 0 && is_null($row['facturar']) == false) {
            $facturar = 'No';
        } else if ($row['facturar'] == 1) {
            $facturar = 'Sí';
        } else if ($row['facturar'] == '' && is_null($row['facturar']) == true) {
            $facturar = '';
        }

        if ($row['Status'] == 0) {
            $status = 'Pendiente';
            $habilitar_btnacceso = 'disabled';
            if ($row['forma_depago_IDformapago'] == 2 || $row['forma_depago_IDformapago'] == 3) {
                $desactivar_status = '';
            } else {
                $desactivar_status = 'disabled';
            }
        } else {
            $status = 'Pagado';
            $desactivar_status = 'disabled';
            $habilitar_btnacceso = '';
        }

        if ($row['Nacional'] == 0 && is_null($row['Nacional']) == false) {
            $nacional = 'No';
        } else if ($row['Nacional'] == 1) {
            $nacional = 'Sí';
        } else if ($row['Nacional'] == '' && is_null($row['Nacional']) == true) {
            $nacional = '';
        }


        $precio_base = $row['montobase'];
        $precio_base_descuento = $row['montobase'] - $row['descuento'];

        $iva = $precio_base_descuento * $row['iva'];
        $comision_total = ($precio_base_descuento * $row['ComisionPorcentaje']) + $row['ComisionDinero'];

        $porcentajeiva = $row['iva'] * 100;

        $html .= '
            <tr>
                <td>
                    <div >
                        <input type="checkbox" id="cobro:' . $row['IDfolioGral'] . ':' . $row['Status'] . ':' . $prospecto['matricula'] . ':' . $row['adjunto'] . '" data-id="editar-lista">
                        <label for="cobro:' . $row['IDfolioGral'] . '">
                        </label>
                    </div>
                </td>
                <td>
                    <button type="button" class="btn botonFormulario" data-toggle="modal" data-target="#modalpago' . $i . '" >
                       +
                    </button>
                    <div class="modal fade" id="modalpago' . $i . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pago Pedido</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" align="center">
                            <table align="center" >
                                <tr>
                                    <td align="right">SKU-Producto:</td>
                                    <td align="left">' . $skuprograma . ' - ' . $programa . '</td>
                                </tr>
                                <tr>
                                    <td align="right">Fecha del Pago:</td>
                                    <td align="left">' . $row['FechaPago'] . '</td>
                                </tr>
                                <tr>
                                    <td align="right">Sistema de Pago:</td>
                                    <td align="left">' . $formapago['plataforma'] . '</td>
                                </tr>
                                <tr>
                                    <td align="right">Forma de Pago:</td>
                                    <td align="left">' . $idformapago . '</td>
                                </tr>
                                <tr>
                                    <td align="right">Tipo Moneda:</td>
                                    <td align="left">' . $row['TipoCambio'] . '</td>
                                </tr>
                                <tr>
                                    <td align="right">Monto base:</td>
                                    <td align="left">$' . number_format($precio_base, 2) . '</td>
                                </tr>
                                <tr>
                                    <td align="right">Descuento:</td>
                                    <td align="left">$' . number_format($row['descuento'], 2) . '</td>
                                </tr>
                                 <tr>
                                    <td align="right">Monto base con descuento:</td>
                                    <td align="left">$' . number_format($precio_base_descuento, 2) . '</td>
                                </tr>
                                <tr>
                                    <td align="right">IVA(' . $porcentajeiva . '%):</td>
                                    <td align="left"> $' . number_format($iva, 2) . '</td>
                                </tr>
                                <tr>
                                    <td align="right">Comisiones:</td>
                                    <td align="left">$' . number_format($comision_total, 2) . '</td>
                                </tr>
                                <tr>
                                    <td align="right">Monto Transacción:</td>
                                    <td align="left">$' . number_format($row['MontoTransaccion'], 2) . '</td>
                                </tr>
                               
                            </table>
                        
                             <!-- Monto con comisión: $' . number_format($monto_comision, 2) . '<br> -->
                            <!-- Descuento: $' . number_format($row['descuento'], 2) . '<br> -->
                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </td>
                <td>
                    <button type="button" class="btn botonFormulario btncorreo" onclick="enviar_comprobante(' . $row['IDfolioGral'] . ',' . $row['cliente_IDuser'] . ')" ></button>
                </td>
               
                <td>' . $row['idregcobro'] . '</td>
                <td>' . $num_solicitud . '</td>
                <td>' . $row['IDtransaccion'] . '</td>
                <td>' . $programa . '</td>
                <td> <button type="button" class="btn botonFormulario" id="btnestadopago' . $i . '" onclick="modalLista(' . $row['IDfolioGral'] . ',' . $i . ')" ' . $desactivar_status . ' >' . $status . '</button></td>
                <td id="tdmatricula' . $i . '">' . $prospecto['num_registro'] . '</td>
                <td>' . $prospecto['Nombre'] . '</td>
                <td>' . $prospecto['Apellido1'] . '</td>
                <td>' . $prospecto['Apellido2'] . '</td>
                <td>' . $nacional . '</td>
                <td>' . $facturar . '</td>
                <td>';
        if ($row['forma_depago_IDformapago'] == 2) {
            $nombre_formapago = 'SPEI';
        } else if ($row['forma_depago_IDformapago'] == 3) {
            $nombre_formapago = 'PAYNET';
        }
        if ($row['adjunto'] != '' && is_null($row['adjunto']) == false) {
            $html .= '<a class="btn botonFormulario" target="_blank" href="../checkout/comprobantes/' . $nombre_formapago . '/' . $row['adjunto'] . '">Adjunto</a>';
        }
        $html .= '</td>
                
            </tr>';

        $i++;
    }

    $mysqli->close();

    echo $html;
}

function mostrar_formaspago()
{

    $mysqli = conectar();
    $html = "";

    $query = " SELECT * FROM forma_depago ORDER BY IDsystemapades";
    $resultado = $mysqli->query($query);

    while ($row = mysqli_fetch_array($resultado)) {


        $html .= '
            <tr>
                
                <td>
                    <div >
                        <input type="checkbox" id="formaspago:' . $row['IDsystemapades'] . '" data-id="editar-lista">
                        <label for="formaspago:' . $row['IDsystemapades'] . '">
                        </label>
                    </div>
                </td>
                <td>' . $row['IDsystemapades'] . '</td>
                <td>' . $row['IDformapago'] . '</td>
                <td>' . $row['plataforma'] . '</td>
                <td>' . $row['Nombrepago'] . '</td>
                <td>' . $row['comision_porcentaje'] . '</td>
                <td>' . $row['comision_pesos'] . '</td>
                <td>' . $row['comision_dolares'] . '</td>
            </tr>';
    }

    $mysqli->close();

    echo $html;
}

function mostrar_facturacion()
{

    $mysqli = conectar();
    $html = "";

    $query = " SELECT * FROM facturacion ORDER BY id_facturacion";
    $resultado = $mysqli->query($query);

    while ($row = mysqli_fetch_array($resultado)) {

        $query = $mysqli->prepare(" SELECT IDtransaccion,cliente_IDuser,producto_IDproducto,facturar,MontoTransaccion,montobase,iva,descuento FROM cobros WHERE facturacion_id_facturacion = ?");
        $query->bind_param('i', $row['id_facturacion']);
        $query->execute();
        $query->bind_result($idtransaccion, $idprospecto, $idproducto, $facturar, $montoTransaccion, $montobase, $iva, $descuento);
        $query->fetch();
        $query->close();

        $montoiva = ($montobase - $descuento) * $iva;

        $query = $mysqli->prepare(" SELECT IDsolicitud,num_registro FROM clientes WHERE IDuser = ?");
        $query->bind_param('i', $idprospecto);
        $query->execute();
        $query->bind_result($idsolicitud, $num_registro);
        $query->fetch();
        $query->close();

        $query = $mysqli->prepare(" SELECT skuproducto FROM producto WHERE IDsystempro = ?");
        $query->bind_param('i', $idproducto);
        $query->execute();
        $query->bind_result($skuproducto);
        $query->fetch();
        $query->close();

        $query = $mysqli->prepare(" SELECT estado FROM estados WHERE id = ?");
        $query->bind_param('i', $row['estado']);
        $query->execute();
        $query->bind_result($estado);
        $query->fetch();
        $query->close();

        $query = $mysqli->prepare(" SELECT municipio FROM municipios WHERE id = ?");
        $query->bind_param('i', $row['ciudad']);
        $query->execute();
        $query->bind_result($municipio);
        $query->fetch();
        $query->close();

        if ($facturar == 0 && is_null($facturar) == false) {
            $facturar = 'No';
        } else if ($facturar == 1) {
            $facturar = 'Sí';
        } else if ($facturar == '' && is_null($facturar) == true) {
            $facturar = '';
        }

        $html .= '
            <tr>
                <td>' . $idsolicitud . '</td>
                <td>' . $idtransaccion . '</td>
                <td>' . $skuproducto . '</td>
                <td>' . number_format($montoTransaccion, 2) . '</td>
                <td>' . number_format($montoiva, 2) . '</td>
                <td>' . $num_registro . '</td>
                <td>' . $facturar . '</td>
                <td>' . $row['razon_social'] . '</td>
                <td>' . $row['rfc'] . '</td>
                <td>' . $row['cfdi'] . '</td>
                <td>' . $municipio . '</td>
                <td>' . $estado . '</td>
                <td>' . $row['direccion'] . '</td>
                <td>' . $row['codigo_postal'] . '</td>
                <td>' . $row['email'] . '</td>
                
            </tr>';
    }

    $mysqli->close();

    echo $html;
}

function mostrar_empresa()
{

    $mysqli = conectar();
    $html = "";

    $query = " SELECT * FROM empresa ORDER BY idsystemEmpresa";
    $resultado = $mysqli->query($query);

    while ($row = mysqli_fetch_array($resultado)) {


        $html .= '
            <tr>
                <td>
                    <div >
                        <input type="checkbox" id="empresa:' . $row['idsystemEmpresa'] . '" data-id="editar-lista">
                        <label for="empresa:' . $row['idsystemEmpresa'] . '">
                        </label>
                    </div>
                </td>
                <td>
                    <button type="button" class="btn botonFormulario" data-toggle="modal" data-target="#modalempresa' . $i . '" >
                       +
                    </button>
                    <div class="modal fade" id="modalempresa' . $i . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Datos empresa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Paypal clientid:' . $row['paypal_clientid'] . '<br>
                            Openpay merchantid:' . $row['openpay_merchantid'] . '<br>
                            Openpay llave privada:' . $row['openpay_llaveprivada'] . '<br>
                            Openpay llave pública:' . $row['openpay_llavepublica'] . '<br>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </td>
                <td>' . $row['nombre_empresa'] . '</td>
                <td>' . $row['nombre_corto_empresa'] . '</td>
                <td>' . $row['rfc_empresa'] . '</td>
                <td>' . $row['telefono_empresa'] . '</td>
                <td>' . $row['email_empresa'] . '</td>
            </tr>';
    }

    $mysqli->close();

    echo $html;
}


function mostrar_solicitudes_terrenos()
{
    $mysqli = conectar();
    $html = "";

    $query = " SELECT * FROM solicitudes ORDER BY IDsystemSolicitud DESC";
    $resultado = $mysqli->query($query);

    while ($row = mysqli_fetch_array($resultado)) {



        $query = $mysqli->prepare(" SELECT NombreProducto FROM producto WHERE IDsystempro = ?");
        $query->bind_param('i', $row['producto_IDsystempro']);
        $query->execute();
        $query->bind_result($producto);
        $query->fetch();
        $query->close();


        $html .= '
            <tr>
                
               
                <td>' . $row['IDsystemSolicitud'] . '</td>
                <td>' . $row['nombre'] . '</td>
                <td>' . $row['apellido1'] . '</td>
                <td>' . $row['apellido2'] . '</td>
                <td>' . $row['whatsapp'] . '</td>
                <td>' . $row['correo'] . '</td>
                <td>' . $row['codigo_postal'] . '</td>
                <td>' . $row['comentarios'] . '</td>
                <td>' . $producto . '</td>
                <td>';
        if ($row['fecha'] != '' && is_null($row['fecha']) == false) {
            $html .= date('d/m/Y H:i:s', strtotime($row['fecha']));
        }
        $html .= '<td>
               
            </tr>';
    }

    $mysqli->close();

    echo $html;
}

function mostrar_solicitudes_visitas()
{
    $mysqli = conectar();
    $html = "";

    $query = " SELECT * FROM visitas ORDER BY IDsystemVisita DESC";
    $resultado = $mysqli->query($query);

    $i = 1;
    while ($row = mysqli_fetch_array($resultado)) {

        if ($row['fecha1_estado'] == 1 || $row['fecha2_estado'] == 1 || $row['fecha3_estado'] == 1) {

            $habilitar_fechas = 'disabled';
        } else if ($row['fecha2_estado'] == 1) {
            $habilitar_fechas = '';
        }

        if ($row['fecha1_estado'] == 1) {
            $color_fecha1 = 'background-color:green;';
        } else {
            $color_fecha1 = '';
        }

        if ($row['fecha2_estado'] == 1) {
            $color_fecha2 = 'background-color:green;';
        } else {
            $color_fecha2 = '';
        }

        if ($row['fecha3_estado'] == 1) {
            $color_fecha3 = 'background-color:green;';
        } else {
            $color_fecha3 = '';
        }

        $html .= '
            <tr>
                
               
                <td>' . $row['IDsystemVisita'] . '</td>
                <td>' . $row['nombre'] . '</td>
                <td>' . $row['apellido1'] . '</td>
                <td>' . $row['apellido2'] . '</td>
                <td>' . $row['whatsapp'] . '</td>
                <td>' . $row['correo'] . '</td>
                <td>' . $row['codigo_postal'] . '</td>
                <td>' . $row['comentarios'] . '</td>
                <td>' . $row['duracion'] . '</td>
                <td><button type="button" class="btn botonFormulario" style="' . $color_fecha1 . '" id="btnvisita1' . $row['IDsystemVisita'] . '" onclick="escoger_fecha(' . $row['IDsystemVisita'] . ',1)" ' . $habilitar_fechas . ' >' . date('d/m/Y', strtotime($row['fecha1'])) . '</button></td>
                <td>';
        if ($row['fecha2'] != '' && is_null($row['fecha2']) == false) {
            $html .= '<button type="button" class="btn botonFormulario" style="' . $color_fecha2 . '" id="btnvisita2' . $row['IDsystemVisita'] . '" onclick="escoger_fecha(' . $row['IDsystemVisita'] . ',2)" ' . $habilitar_fechas . ' >' . date('d/m/Y', strtotime($row['fecha2'])) . '</button>';
        } else {
            $html .= 'No proporcionada';
        }
        $html .= '</td>
                <td>';
        if ($row['fecha3'] != '' && is_null($row['fecha3']) == false) {
            $html .= '<button type="button" class="btn botonFormulario" style="' . $color_fecha3 . '" id="btnvisita3' . $row['IDsystemVisita'] . '" onclick="escoger_fecha(' . $row['IDsystemVisita'] . ',3)" ' . $habilitar_fechas . ' >' . date('d/m/Y', strtotime($row['fecha3'])) . '</button>';
        } else {
            $html .= 'No proporcionada';
        }
        $html .= '</td>
                <td>';
        if ($row['fecha'] != '' && is_null($row['fecha']) == false) {
            $html .= date('d/m/Y H:i:s', strtotime($row['fecha']));
        }
        $html .= '<td>
               
            </tr>';
        $i++;
    }

    $mysqli->close();

    echo $html;
}

function mostrar_solicitudes_asesoria()
{
    $mysqli = conectar();
    $html = "";

    $query = " SELECT * FROM solicitudes_asesoria ORDER BY IDsystemAsesoria DESC";
    $resultado = $mysqli->query($query);

    $i = 1;
    while ($row = mysqli_fetch_array($resultado)) {

        $html .= '
            <tr>
                
               
                <td>' . $row['IDsystemAsesoria'] . '</td>
                <td>' . $row['nombre'] . '</td>
                <td>' . $row['apellido1'] . '</td>
                <td>' . $row['apellido2'] . '</td>
                <td>' . $row['whatsapp'] . '</td>
                <td>' . $row['correo'] . '</td>
                <td>' . $row['codigo_postal'] . '</td>
                <td>' . $row['comentarios'] . '</td>
                <td>' . $row['medidas'] . '</td>
                <td>';
        if ($row['ubicacion'] != '' && is_null($row['ubicacion']) == false) {
            $html .= '<a href="' . $row['ubicacion'] . '">Ubicación</a>';
        }

        $html .= '</td>
                <td>';
        if ($row['archivo'] != '' && is_null($row['archivo']) == false) {
            $html .= '<a class="btn botonFormulario" target="_blank" href="../../archivos/asesorias/' . $row['archivo'] . '">Archivo</a>';
        }


        $html .= '
                </td>
                <td>';
        if ($row['fecha'] != '' && is_null($row['fecha']) == false) {
            $html .= date('d/m/Y H:i:s', strtotime($row['fecha']));
        }
        $html .= '<td>
            </tr>';
        $i++;
    }

    $mysqli->close();

    echo $html;
}

function mostrar_configuraciones()
{

    $mysqli = conectar();

    $html = "";
    $query = " SELECT * FROM configuracion";

    $resultado = $mysqli->query($query);
    while ($row = mysqli_fetch_array($resultado)) {

        $html .= '
            <tr>
                <th scope="row" width="100px">' . $row['configuracion_nombre'] . '</th>
                <td>' . $row['configuracion_valor'] . '</td>
            </tr>';
    }

    echo $html;
    $mysqli->close();
}

function mostrar_usuarios()
{

    $mysqli = conectar();

    $html = "";
    $query = " SELECT * FROM logueo";

    $resultado = $mysqli->query($query);
    while ($row = mysqli_fetch_array($resultado)) {

        $query = $mysqli->prepare(" SELECT tipo FROM logueoroles WHERE IDsystemlogueorol = ?");
        $query->bind_param('i', $row['logueoroles_IDsystemlogueorol']);
        $query->execute();
        $query->bind_result($tipo_usuario);
        $query->fetch();
        $query->close();

        $html .= '
                <tr>
                    <td>
                        usuarios:' . $row['id_logueo'] . '
                    </td>
                    <td>' . $row['id_logueo'] . '</td>
                    <td>' . $row['email_logueo'] . '</td>
                    <td>' . $row['username_logueo'] . '</td>
                    <td>●●●●</td>
                    <td>' . $tipo_usuario . '</td>
                </tr>';
    }

    echo $html;
    $mysqli->close();
}

function mostrar_acciones_adicionales($valor)
{

    //VARIABLE QUE LLEVARA IMPRESO
    $nombre = "";
    $html = "";

    for ($i = 0; $i < 4; $i++) {

        if ($i === 0 && $valor != "cobro" && $valor != "facturacion" && $valor != "configuracion" && $valor != "prospectos2" && $valor != "tienda_pedidos" && $valor != "solicitudes_terrenos" && $valor != "solicitudes_visitas" && $valor != "solicitudes_asesoria") {
            $nombre = "Editar";

            $html .= '
                    <div class="col-lg-2 col-12">
                        <!-- small box -->
                        <div class="small-box bg-info boton-background">
                            <a  href="#" id="editarRegistro" class="small-box-footer"><img src="images/edit.svg" alt="' . $nombre . '" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" >  ' . $nombre . ' </a>
                        </div>
                    </div>';
        } elseif ($i === 1 && $valor != "facturacion" && $valor != "prospecto" && $valor != "configuracion" && $valor != "cobro" && $valor != "empresas" && $valor != "prospectos2" && $valor != "tienda_pedidos" && $valor != "solicitudes_terrenos" && $valor != "solicitudes_visitas" && $valor != "solicitudes_asesoria") {
            $nombre = "Eliminar";

            $html .= '
                    <div class="col-lg-2 col-12">
                        <!-- small box rrrrrr -->
                        <div class="small-box bg-info boton-background">
                            <a  href="#" id="eliminarRegistro" class="small-box-footer"><img src="images/delete.svg" alt="' . $nombre . '" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" >  ' . $nombre . ' </a>
                        </div>
                    </div>';
        } elseif ($i === 2) {
            $nombre = "Imprimir";

            $html .= '
                <div class="col-lg-2 col-12">
                    <!-- small box -->
                    <div class="small-box bg-info boton-background">
                        <a href="javascript:window.print()"  class="small-box-footer"><img src="images/printer.svg" alt="' . $nombre . '" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" >  ' . $nombre . '</a>
                    </div>
                </div>';
        } elseif ($i === 3) {
            $nombre = "Descargar";

            $html .= '
                <div class="col-lg-2 col-12">
                    <!-- small box -->
                    <div class="small-box bg-info boton-background">
                        <a  href="includes/reportes/reporte_' . $valor . '.php"  class="small-box-footer"><img src="images/download.svg" alt="' . $nombre . '" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" >  ' . $nombre . ' </a>
                    </div>
                </div>';
        }
    }

    echo $html;
}

function mostrar_categoria_crear()
{

    $mysqli = conectar();
    $html = "";
    //Se obtiene el total de categorias con su nombre para impresion donde id_global = 1.
    $query = " SELECT id_categoria, id_global, nombre_categoria FROM tienda_categoria ORDER BY id_categoria";
    $resultado = $mysqli->query($query);

    while ($row = mysqli_fetch_array($resultado)) {

        $html .= '<option value="' . $row['id_categoria'] . '">' . $row['nombre_categoria'] . '</option>';
    }
    echo $html;
    $mysqli->close();
}

function editar_productos($id)
{
    $mysqli = conectar();
    $html = "";
    $query = $mysqli->prepare(" SELECT skuproducto,categoria,NombreProducto,descripcion,descripcion2,PrecioMX,PrecioUSD,disponible FROM producto WHERE IDsystempro = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $query->bind_result($skuprograma, $categoria, $nombre, $descripcion, $descripcion2, $precio, $precio2, $disponible);
    $query->fetch();
    $query->close();

    $existe === false;
    if ($nombre) {

        if ($disponible == 0) {
            $option1_disponible = 'selected';
            $option2_disponible = '';
        } else {
            $option1_disponible = '';
            $option2_disponible = 'selected';
        }

        $query = $mysqli->prepare(" SELECT COUNT(*) FROM producto_descuento WHERE producto_IDsystempro = ?");
        $query->bind_param('i', $id);
        $query->execute();
        $query->bind_result($nums_descuentos);
        $query->fetch();
        $query->close();

        $activar_check1 = "";
        $activar_check2 = "";
        $activar_check3 = "";
        $activar_check4 = "";
        $activar_check5 = "";
        if ($nums_descuentos == 1) {
            $activar_check1 = "checked";
        } else if ($nums_descuentos == 2) {
            $activar_check1 = "checked";
            $activar_check2 = "checked";
        } else if ($nums_descuentos == 3) {
            $activar_check1 = "checked";
            $activar_check2 = "checked";
            $activar_check3 = "checked";
        } else if ($nums_descuentos == 4) {
            $activar_check1 = "checked";
            $activar_check2 = "checked";
            $activar_check3 = "checked";
            $activar_check4 = "checked";
        } else if ($nums_descuentos == 5) {
            $activar_check1 = "checked";
            $activar_check2 = "checked";
            $activar_check3 = "checked";
            $activar_check4 = "checked";
            $activar_check5 = "checked";
        }

        if ($precio2 == 0) {
            $precio2 = "";
        }

        $html = '
                <!-- text input -->
                <div class="col-sm-12">
                    <div class="card card-blue direct-chat direct-chat-dark">
                        <div class="card-header card-personalizado" >
                            <h3 class="card-title">Datos del producto</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Categoria</label>
                                   <select id="categoria" class="form-control" >
                                            ';
        $query = " SELECT IDsystemCat,nombre_categoria FROM categorias ORDER BY nombre_categoria";
        $consulta_categorias = $mysqli->query($query);
        $default = '';
        while ($opcioncat = mysqli_fetch_array($consulta_categorias)) {
            if ($categoria == $opcioncat['IDsystemCat']) {
                $default = 'selected';
            }
            $html .= '<option value="' . $opcioncat['IDsystemCat'] . '" ' . $default . '>' . $opcioncat['nombre_categoria'] . '</option>';
            if ($default != '') {
                $default = '';
            }
        }
        $html .= '</select>
                                </div>
                            </div>
                             <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Skupublicación</label>
                                    <input
                                        type="text"
                                        id="skuprograma"
                                        class="form-control"
                                        value="' . $skuprograma . '"
                                        placeholder="Skupublicación"
                                        readonly>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nombre publicación</label>
                                    <input
                                        type="text"
                                        id="nombre"
                                        class="form-control"
                                        value="' . $nombre . '"
                                        placeholder="Publicación">
                                </div>
                            </div>
                           
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <input
                                        type="text"
                                        id="descripcion"
                                        class="form-control"
                                        value="' . $descripcion . '"
                                        placeholder="Descripción">
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Descripción 2</label>
                                    <input
                                        type="text"
                                        id="descripcion2"
                                        class="form-control"
                                        value="' . $descripcion2 . '"
                                        placeholder="Descripción">
                                </div>
                            </div>
                            
                           
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Precio(MX) Producto</label>
                                    <input
                                        type="number"
                                        id="precio"
                                        class="form-control"
                                        placeholder="Precio"
                                        value=' . $precio . '
                                    >
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Precio(USD) Producto</label>
                                    <input
                                        type="number"
                                        id="precio2"
                                        class="form-control"
                                        placeholder="Precio"
                                        value=' . $precio2 . '
                                    >
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Publicar:</label>
                                    <select id="disponible" class="form-control">
                                        <option value="0" ' . $option1_disponible . '>No</option>
                                        <option value="1" ' . $option2_disponible . '>Sí</option>
                                    </select>
                                </div>
                            </div>
                            
                             <div class="col-sm-12 campo_depaga row" >
                                <div class="col-sm-2">
                                    <label for="openpay">Incluir descuento 1</label>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="check_descuento" id="check_descuento" class="form control" ' . $activar_check1 . '>
                                        <label for="check_descuento">
                                    </div>
                                </div>
                                 <div class="col-sm-2" >
                                    <div class="form-group">
                                        <label for="openpay">Incluir descuento 2</label>
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" name="check_descuento2" id="check_descuento2" class="form control" ' . $activar_check2 . '>
                                            <label for="check_descuento">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2" >
                                    <div class="form-group">
                                        <label for="openpay">Incluir descuento 3</label>
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" name="check_descuento3" id="check_descuento3" class="form control" ' . $activar_check3 . '>
                                            <label for="check_descuento">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2" >
                                    <div class="form-group">
                                        <label for="openpay">Incluir descuento 4</label>
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" name="check_descuento4" id="check_descuento4" class="form control" ' . $activar_check4 . '>
                                            <label for="check_descuento">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2" >
                                    <div class="form-group">
                                        <label for="openpay">Incluir descuento 5</label>
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" name="check_descuento5" id="check_descuento5" class="form control" ' . $activar_check5 . '>
                                            <label for="check_descuento">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';

        $query = " SELECT descuentos_id_descuento FROM producto_descuento WHERE producto_IDsystempro=" . $id;
        $resultado2 = $mysqli->query($query);
        $c = 1;
        $fi = 1;
        $ff = 2;
        while ($row2 = mysqli_fetch_array($resultado2)) {

            if ($c == 1) {
                $i = '';
                $n = '';
            } else {
                $i = '_desc' . $c;
                $n = $c;
            }

            $html .= formulario_descuento($row2['descuentos_id_descuento'], $i, $c, $n, $fi, $ff);
            $fi = $fi + 2;;
            $ff = $ff + 2;
            $c++;
        }

        if ($c < 6) {
            while ($c < 6) {
                if ($c == 1) {
                    $i = '';
                    $n = '';
                } else {
                    $i = '_desc' . $c;
                    $n = $c;
                }

                $html .= formulario_descuento(0, $i, $c, $n, $fi, $ff);
                $fi = $fi + 2;;
                $ff = $ff + 2;
                $c++;
            }
        }


        $html .= '<div class="col-sm-12">
                                <input type="hidden" id="tipo" value="producto">
                                <input type="hidden" id="id_editar" value="' . $id . '">
                                <button type="submit" class="btn botonFormulario">Guardar</button>
                                <a href="index.php?id=producto" class="btn botonFormulario" >Cancelar</a>
                            </div>
                        </div>
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

function editar_tiendaproducto($id)
{

    $mysqli = conectar();
    $html = "";
    $query = $mysqli->prepare(" SELECT id_categoria, nombre_producto, tamaño_producto, precio_producto FROM tienda_producto WHERE id_producto = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $query->bind_result($id_categoria_bd, $nombre_producto_bd, $tamaño_producto_bd, $precio_producto_bd);
    $query->fetch();
    $query->close();

    $query = " SELECT id_categoria, id_global, nombre_categoria FROM tienda_categoria ORDER BY id_categoria";
    $resultado = $mysqli->query($query);

    $html .= '<!-- text input -->
        <div class="col-sm-12">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Seleccionar Categoría</label>
                    <select id="categoria" class="form-control select2" style="width: 100%;">';

    while ($row = mysqli_fetch_array($resultado)) {
        if ($id_categoria_bd == $row['id_categoria']) {
            $select = "selected";
        } else {
            $select = "";
        }
        $html .= '<option ' . $select . ' value="' . $row['id_categoria'] . '">' . $row['nombre_categoria'] . '</option>';
    }

    $html .= '</select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nombre Producto</label>
                    <input
                        type="text"
                        id="nombre"
                        class="form-control"
                        placeholder="Nombre Categoría"
                        value="' . $nombre_producto_bd . '">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Tamaño Producto</label>
                    <input
                        type="text"
                        id="tamaño"
                        class="form-control"
                        placeholder="Tamaño Producto"
                        value="' . $tamaño_producto_bd . '">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Precio Producto</label>
                    <input
                        type="number"
                        id="precio"
                        class="form-control"
                        placeholder="Precio Producto"
                        value="' . $precio_producto_bd . '">
                </div>
            </div>
            <div class="col-sm-12">
                <input type="hidden" id="tipo" value="tienda_producto">
                <input type="hidden" id="id_editar" value="' . $id . '">
                    <button type="submit" class="btn botonFormulario">Guardar</button>
                    <a href="index.php?id=tienda_producto" class="btn botonFormulario" >Cancelar</a>
                </div>
            </div>
        </div>';

    echo $html;

    $mysqli->close();
}

function editar_tiendacategoria($id)
{

    $mysqli = conectar();
    $html = "";
    $query = $mysqli->prepare(" SELECT id_global,nombre_categoria FROM tienda_categoria WHERE id_categoria = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $query->bind_result($idglobal, $nombreCat);
    $query->fetch();
    $query->close();

    $query = " SELECT id_global,nombre_global FROM tienda_categoria_global ORDER BY id_global";
    $resultado = $mysqli->query($query);

    $html .= '<!-- text input -->
        <div class="col-sm-12">
            
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nombre Categoría</label>
                    <input
                        type="text"
                        id="nombre"
                        class="form-control"
                        value="' . $nombreCat . '"
                        placeholder="Nombre Categoría"></div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Seleccionar Categoría Global</label>
                    <select id="categoria" class="form-control select2" style="width: 100%;">';

    while ($row = mysqli_fetch_array($resultado)) {
        if ($idglobal == $row['id_global']) {
            $select = "selected";
        } else {
            $select = "";
        }
        $html .= '<option ' . $select . ' value="' . $row['id_global'] . '">' . $row['nombre_global'] . '</option>';
    }

    $html .= '</select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="exampleInputFile">Actualizar Imagen</label>
                   
                            <input
                                type="file"
                                class="form-control"
                                id="exampleInputFile"
                                accept="image/*">
                                
                    </div>
                </div>
                
            </div>
            <div class="col-sm-12">
                <input type="hidden" id="tipo" value="tienda_categoria">
                <input type="hidden" id="id_editar" value="' . $id . '">
                    <button type="submit" class="btn botonFormulario">Guardar</button>
                    <a href="index.php?id=tienda_categoria" class="btn botonFormulario" >Cancelar</a>
                </div>
            </div>
        </div>';

    echo $html;

    $mysqli->close();
}

function editar_prospecto($id)
{
    $mysqli = conectar();
    $html = "";
    $query = $mysqli->prepare(" SELECT Nombre,Apellido1,Apellido2,fecha_nacimiento,genero,domicilio,codigo_postal,municipio,estado,whatsapp,Email FROM clientes WHERE IDuser = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $query->bind_result($nombre, $ap1, $ap2, $fecha_nacimiento, $genero, $domicilio, $codigo_postal, $municipio, $estado, $whatsapp, $email);
    $query->fetch();
    $query->close();

    if ($genero == 1) {
        $opcion1_genero = 'selected';
        $opcion2_genero = '';
    } else {
        $opcion1_genero = '';
        $opcion2_genero = 'selected';
    }




    $existe = false;
    if ($nombre) {


        $html = '
                <div class="col-sm-12">
                    
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nombre prospecto:</label>
                            <input
                                type="text"
                                id="nombre"
                                class="form-control"
                                placeholder="Nombre"
                                value="' . $nombre . '"
                            >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Apellido Uno:</label>
                            <input
                                type="text"
                                id="apellido1"
                                class="form-control"
                                placeholder="Apellido Uno"
                                value="' . $ap1 . '"
                            >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Apellido Dos:</label>
                            <input
                                type="text"
                                id="apellido2"
                                class="form-control"
                                placeholder="Apellido Dos"
                                value="' . $ap2 . '"
                            >
                        </div>
                       
                        <div class="form-group">
                            <label>Whatsapp:</label>
                            <input
                                type="text"
                                id="whatsapp"
                                class="form-control"
                                placeholder="Whatsapp"
                                value="' . $whatsapp . '"
                                maxlength="15"
                            >
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input
                                type="text"
                                id="email"
                                class="form-control"
                                placeholder="Email"
                                value="' . $email . '"
                                maxlength="50"
                            >
                        </div>';


        date_default_timezone_set('America/Mexico_City');
        $anio_actual = date('Y');
        $aniomin = $anio_actual - 110;

        $dian = date('d', strtotime($fecha_nacimiento));
        $mesn = date('m', strtotime($fecha_nacimiento));
        $anion = date('Y', strtotime($fecha_nacimiento));
        $html .= inputs_fecha_actualizar(1, 'de nacimiento', $aniomin, $anio_actual, $dian, $mesn, $anion);

        $html .= '<div class="form-group">
                            <label>Genero:</label>
                            <select class="form-control" id="genero">
                                <option value="1" ' . $opcion1_genero . '>Masculino</option>
                                <option value="2" ' . $opcion2_genero . '>Femenino</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Domicilio:</label>
                            <input
                                type="text"
                                id="domicilio"
                                class="form-control"
                                placeholder="Domicilio"
                                value="' . $domicilio . '"
                                maxlength="80"
                            >
                        </div>
                        <div class="form-group">
                            <label>Código postal:</label>
                            <input
                                type="text"
                                id="cpostal"
                                class="form-control"
                                placeholder="Código postal"
                                value="' . $codigo_postal . '"
                                maxlength="5"
                            >
                        </div>
                        
                        <div class="form-group">
                             <label>Estado(*):</label>
                            <select  class="form-control " name="estado" id="estado">';

        $query = " SELECT id,estado FROM estados ORDER BY estado";
        $consulta = $mysqli->query($query);
        $default = '';
        while ($row = mysqli_fetch_array($consulta)) {
            if ($estado == $row['id']) {
                $default = 'selected';
            }
            $html .= '<option value="' . $row['id'] . '" ' . $default . '>' . $row['estado'] . '</option>';
            if ($default != '') {
                $default = '';
            }
        }

        $html .= '</select>
                        </div>
                        
                        <div class="form-group">
                             <label>Municipio(*):</label>
                            <select  class="form-control " name="municipio" id="municipio">';

        $query = " SELECT m.id,m.municipio FROM estados_municipios AS em INNER JOIN municipios AS m ON em.municipios_id=m.id WHERE em.estados_id=" . $estado . " ORDER BY m.municipio";
        $consulta = $mysqli->query($query);
        $default = '';
        while ($row = mysqli_fetch_array($consulta)) {
            if ($municipio == $row['id']) {
                $default = 'selected';
            }
            $html .= '<option value="' . $row['id'] . '" ' . $default . '>' . $row['municipio'] . '</option>';
            if ($default != '') {
                $default = '';
            }
        }

        $html .= '</select>
                        </div>
                        
                        
                        
                        
                    </div>';


        $html .= ' <div class="col-sm-12">
                        <input type="hidden" id="tipo" value="prospecto">
                        <input type="hidden" id="id_editar" value="' . $id . '">
                        <button type="submit" class="btn botonFormulario">Guardar</button>
                        <a href="index.php?id=prospecto" class="btn botonFormulario" >Cancelar</a>
                    </div>
                </div>
            ';

        $existe = true;
    }

    $mysqli->close();

    if ($existe === true) {
        echo $html;
    } else {
        echo '<label>No se ha encontrado ningún prospecto</label>';
    }
}

function editar_formapago($id)
{
    $mysqli = conectar();
    $html = "";
    $query = $mysqli->prepare(" SELECT IDformapago , plataforma ,Nombrepago, comision_porcentaje, comision_pesos,comision_dolares FROM forma_depago WHERE IDsystemapades = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $query->bind_result($idformapago, $plataforma, $nombre, $comision_porcentaje, $comision_pesos, $comision_dolares);
    $query->fetch();
    $query->close();

    $existe === false;
    if ($nombre) {

        $html = '
                <!-- text input -->
                <div class="col-sm-12">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>ID Forma de pago:</label>
                            <input
                                type="text"
                                id="id"
                                class="form-control"
                                value="' . $idformapago . '"
                                placeholder="ID Forma de pago">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Plataforma:</label>
                            <input
                                type="text"
                                id="plataforma"
                                class="form-control"
                                value="' . $plataforma . '"
                                placeholder="Plataforma">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nombre forma de pago:</label>
                            <input
                                type="text"
                                id="nombre"
                                class="form-control"
                                value="' . $nombre . '"
                                placeholder="Nombre forma de pago">
                        </div>
                    </div>
                  
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Comisión Porcentaje(decimales):</label>
                            <input
                                type="text"
                                id="comision_porcentaje"
                                class="form-control"
                                 value="' . $comision_porcentaje . '"
                                placeholder="decimales">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Comisión Pesos:</label>
                            <input
                                type="text"
                                id="comision_pesos"
                                class="form-control"
                                value="' . $comision_pesos . '"
                                placeholder="$">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Comisión Dolares:</label>
                            <input
                                type="text"
                                id="comision_dolares"
                                class="form-control"
                                value="' . $comision_dolares . '"
                                placeholder="$">
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <input type="hidden" id="tipo" value="formapago">
                        <input type="hidden" id="id_editar" value="' . $id . '">
                        <button type="submit" class="btn botonFormulario">Guardar</button>
                        <a href="index.php?id=formaspago" class="btn botonFormulario" >Cancelar</a>
                    </div>
                </div>
            
            ';

        $existe = true;
    }

    $mysqli->close();

    if ($existe === true) {
        echo $html;
    } else {
        echo '<label>No se ha encontrado ninguna forma de pago </label>';
    }
}

function editar_empresa($id)
{
    $mysqli = conectar();
    $html = "";
    $query = $mysqli->prepare(" SELECT nombre_empresa,nombre_corto_empresa,rfc_empresa,telefono_empresa,email_empresa,paypal_clientid,openpay_merchantid,openpay_llaveprivada,openpay_llavepublica FROM empresa WHERE idsystemEmpresa = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $query->bind_result($nombre, $nombre_corto, $rfc, $telefono, $email, $paypal_clientid, $openpay_merchantid, $openpay_llaveprivada, $openpay_llavepublica);
    $query->fetch();
    $query->close();

    $existe === false;
    if ($nombre) {

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
                    </div>
                    
                    <div class="form-group" >
                        <label>Paypal Client ID:</label>
                        <input
                            type="text"
                            id="clientid"
                            class="form-control"
                             maxlength="100"
                             value="' . $paypal_clientid . '"
                            placeholder="Paypal Client ID">
                    </div>
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

function editar_expo($id)
{
    $mysqli = conectar();
    $html = "";
    $query = $mysqli->prepare(" SELECT nombre,nombre_corto,contacto,telefono,email,link FROM expos WHERE IDsystemExpo = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $query->bind_result($nombre, $nombre_corto, $contacto, $telefono, $email, $link);
    $query->fetch();
    $query->close();

    $existe === false;
    if ($nombre) {

        $html = '
                <div class="col-sm-12">
                                        
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input
                                type="text"
                                id="nombre"
                                class="form-control"
                                maxlength="60"
                                value="' . $nombre . '"
                                placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nombre corto:</label>
                            <input
                                type="text"
                                id="nombre_corto"
                                class="form-control"
                                maxlength="30"
                                value="' . $nombre_corto . '"
                                placeholder="Nombre corto">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Contacto:</label>
                        <input
                            type="text"
                            id="contacto"
                            class="form-control"
                            maxlength="120"
                            value="' . $contacto . '"
                            placeholder="contacto">
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
                             maxlength="60"
                             value="' . $email . '"
                            placeholder="Email">
                    </div>
                    
                    <div class="form-group" >
                        <label>Link:</label>
                        <input
                            type="text"
                            id="link"
                            class="form-control"
                             maxlength="100"
                             value="' . $link . '"
                            placeholder="Link">
                    </div>
                    
                    
                    <div class="col-sm-12">
                        <input type="hidden" id="tipo" value="expo">
                        <input type="hidden" id="id_editar" value="' . $id . '">
                        <button type="submit" class="btn botonFormulario">Guardar</button>
                         <a href="index.php?id=expos" class="btn botonFormulario" >Cancelar</a>
                    </div>
                   
                </div>
            
            ';

        $existe = true;
    }

    $mysqli->close();

    if ($existe === true) {
        echo $html;
    } else {
        echo '<label>No se ha encontrado ninguna expo </label>';
    }
}

function editar_cobro($id)
{
    $mysqli = conectar();
    $html = "";
    $query = $mysqli->prepare(" SELECT prospectos_IDprospecto,Status FROM cobros WHERE IDfolioGral = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $query->bind_result($idprospecto, $estado_pago);
    $query->fetch();
    $query->close();

    $existe === false;
    if ($idprospecto) {

        if ($estado_pago == 0) {
            $status_pago = 'Pendiente';
        } else {
            $status_pago = 'Pagado';
        }

        $query = $mysqli->prepare(" SELECT IDsolicitud,Nombre,Apellido1,Apellido2,matricula FROM prospectos WHERE IDuser = ?");
        $query->bind_param('i', $idprospecto);
        $query->execute();
        $query->bind_result($idsolicitud, $nombre, $ap1, $ap2, $matricula);
        $query->fetch();
        $query->close();

        $html = '
                <!-- text input -->
                <div class="col-sm-12">
                    <div class="row right" id="align-right">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>ID Solicitud:</label>
                                <input
                                    type="text"
                                    id="idsolicitud"
                                    class="form-control"
                                    disabled
                                    value="' . $idsolicitud . '"
                                    placeholder="ID Solicitud">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Matricula</label>
                                <input
                                    type="text"
                                    id="matricula"
                                    class="form-control"
                                    disabled
                                    value="' . $matricula . '"
                                    placeholder="Matricula">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Estado</label>
                                <input
                                    type="text"
                                    id="estado"
                                    class="form-control"
                                    disabled
                                    value="' . $status_pago . '"
                                    placeholder="Estado">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row right" id="align-right">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input
                                    type="text"
                                    id="nombre"
                                    class="form-control"
                                    disabled
                                    value="' . $nombre . '"
                                    placeholder="Nombre">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Apellido Uno</label>
                                <input
                                    type="text"
                                    id="apellido1"
                                    class="form-control"
                                    disabled
                                    value="' . $ap1 . '"
                                    placeholder="Apellido Uno">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Apellido Dos</label>
                                <input
                                    type="text"
                                    id="apellido2"
                                    class="form-control"
                                    disabled
                                    value="' . $ap2 . '"
                                    placeholder="Apellido Dos">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row right" id="align-right">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Añadir Producto</label>
                                <select id="producto_select" class="form-control">
                                    <option selected>----</option>
                                ';
        $query = " SELECT IDsystempro,skuprograma,NombrePrograma,categoria FROM producto WHERE categoria='1' ORDER BY IDsystempro";
        $consulta_producto = $mysqli->query($query);
        while ($producto = mysqli_fetch_array($consulta_producto)) {
            if ($producto['categoria'] == 1) {
                if ($matricula == '' || is_null($matricula) == true) {
                    $html .= '<option value="' . $producto['IDsystempro'] . '">' . $producto['skuprograma'] . ' - ' . $producto['NombrePrograma'] . '</option>';
                }
            } else {
                $html .= '<option value="' . $producto['IDsystempro'] . '">' . $producto['skuprograma'] . ' - ' . $producto['NombrePrograma'] . '</option>';
            }
        }

        $html .= '</select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Número de pagos</label>
                                <input
                                    type="text"
                                    id="num_pagos"
                                    class="form-control"
                                    disabled
                                    placeholder="Número de pagos">
                            </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                                <label>Moneda</label>
                                <select id="moneda" class="form-control" disabled>
                                    <option>----</option>
                                    <option>MXN</option>
                                    <option>USD</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row right" id="align-right">
                        <div class="col-sm-6">
                            
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Método de pago</label>
                                <select id="formapago" class="form-control" disabled>
                                    <option>----</option>
                                    ';
        $query = " SELECT IDsystemapades,Nombrepago FROM forma_depago ORDER BY Nombrepago";
        $consulta_formapago = $mysqli->query($query);
        while ($formapago = mysqli_fetch_array($consulta_formapago)) {
            $html .= '<option value="' . $formapago['IDsystemapades'] . '">' . $formapago['Nombrepago'] . '</option>';
        }
        $html .= '</select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                             <div class="form-group">
                                <label>Referencia:</label>
                                <input
                                    type="text"
                                    id="referencia"
                                    class="form-control"
                                    disabled
                                    placeholder="Referencia">
                            </div>
                            
                        </div>
                        <div class="col-sm-2">
                             <div class="form-group">
                                <label>Precio</label>
                                <input
                                    type="text"
                                    id="precio"
                                    class="form-control"
                                    disabled
                                    placeholder="Precio">
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="row right" id="align-right">
                        <div class="col-sm-5">
                            
                        </div>
                        
                        <div class="col-sm-3">
                            <input type="hidden" id="tipo" value="cobro">
                            <input type="hidden" id="id_editar" value="' . $id . '">
                            <button type="submit" class="btn botonFormulario">Asignar y Enviar</button>
                        
                            <a href="index.php?id=cobro" class="btn botonFormulario" >Cancelar</a>
                        </div>
                    </div>
                </div>
            
            ';

        $existe = true;
    }

    $mysqli->close();

    if ($existe === true) {
        echo $html;
    } else {
        echo '<label>No se ha encontrado ningún registro </label>';
    }
}

function editar_configuracion()
{

    $mysqli = conectar();
    $html = "";
    $query = " SELECT * FROM configuracion";
    $resultado = $mysqli->query($query);
    $atributo = '';
    while ($row = mysqli_fetch_array($resultado)) {
        if ($row['configuracion_id'] == 1 || $row['configuracion_id'] == 4) {
            $atributo = ' maxlength="40"';
        }
        $html .= '
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>' . $row['configuracion_nombre'] . '</label>';
        if ($row['configuracion_id'] == 6) {
            if ($row['configuracion_valor'] == 'Sí') {
                $opcion1 = 'selected';
                $opcion2 = '';
            } else {
                $opcion1 = '';
                $opcion2 = 'selected';
            }
            $html .= '<select id="' . $row['configuracion_idForm'] . '" class="form-control">
                                            <option ' . $opcion1 . '>Sí</option>
                                            <option ' . $opcion2 . '>No</option>
                                       </select>
                             ';
        } else {
            $html .= '<input
                                type="text"
                                id="' . $row['configuracion_idForm'] . '"
                                ' . $atributo . '
                                class="form-control"
                                placeholder="' . $row['configuracion_nombre'] . '"
                                value="' . $row['configuracion_valor'] . '">';
        }
        $html .= '  </div>
                </div>
                ';
        if ($atributo != '') {
            $atributo = '';
        }
    }

    $html .= '<div class="col-sm-12">
                    <input type="hidden" id="tipo" value="configuracion">
                        <button type="submit" class="btn botonFormulario">Guardar</button>
                        <a href="index.php?id=configuracion" class="btn botonFormulario" >Cancelar</a>
                    </div>
               </div>';


    echo $html;
    $mysqli->close();
}

function editar_usuario($id)
{
    $mysqli = conectar();
    $html = "";
    $query = $mysqli->prepare(" SELECT email_logueo,username_logueo,logueoroles_IDsystemlogueorol FROM logueo WHERE id_logueo = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $query->bind_result($email, $usuario, $idrol);
    $query->fetch();
    $query->close();

    $existe = false;
    if ($email) {

        $html = '
                <!-- text input -->
                <div class="col-sm-12">
                    
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input
                                type="text"
                                id="email"
                                class="form-control"
                                value="' . $email . '"
                                maxlength="40"
                                placeholder="Email">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input
                                type="text"
                                id="usuario"
                                value="' . $usuario . '"
                                class="form-control"
                                placeholder="Usuario">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Rol</label>
                            <select id="rol" class="form-control">';
        $query = " SELECT IDsystemlogueorol,tipo FROM logueoroles ORDER BY tipo";
        $consulta = $mysqli->query($query);
        $default = '';
        while ($row = mysqli_fetch_array($consulta)) {
            if ($idrol == $row['IDsystemlogueorol']) {
                $default = 'selected';
            }
            $html .= '<option value="' . $row['IDsystemlogueorol'] . '" ' . $default . '>' . $row['tipo'] . '</option>';
            if ($default != '') {
                $default = '';
            }
        }

        $html .= '</select>
                            
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Asignar nueva contraseña(opcional)</label>
                            <input
                                type="password"
                                id="contrasenia"
                                class="form-control"
                                placeholder="Contraseña">
                        </div>
                    </div>
                   
                    <div class="col-sm-12">
                        <input type="hidden" id="tipo" value="usuario">
                            <input type="hidden" id="tipo" value="usuario">
                            <input type="hidden" id="id_editar" value="' . $id . '">
                            <button type="submit" class="btn botonFormulario">Guardar</button>
                            <a href="index.php?id=usuarios" class="btn botonFormulario" >Cancelar</a>
                    </div>
                   
                </div>
            
            ';

        $existe = true;
    }

    $mysqli->close();

    if ($existe === true) {
        echo $html;
    } else {
        echo '<label>No se ha encontrado ningún usuario </label>';
    }
}

function formulario_descuento($iddescuento, $i, $c, $n, $fi, $ff)
{
    $mysqli = conectar();

    if ($iddescuento == 0) {
        $mostrar = 'display:none;';

        $opcion1 = 'selected';
        $opcion2 = '';
        $opcion3 = '';

        $mostrar_dinero = 'display:none;';

        $cantidad1 = '';
        $cantidad2 = '';
        $existencia = '';

        $fecha_desde = '';
        $hora_desde = '';
        $diai = 'DD';
        $mesi = 'MM';
        $anioi = 'AAAA';
        $fecha_hasta = '';
        $hora_hasta = '';
        $diaf = 'DD';
        $mesf = 'MM';
        $aniof = 'AAAA';

        $codigo_descuento = '';
    } else {
        $mostrar = '';

        $query = $mysqli->prepare(" SELECT formato_descuento,cantidad_descuento,cantidad2_descuento,existencia_descuento,valido_desde,valido_hasta,codigo_descuento FROM descuentos WHERE id_descuento = ?");
        $query->bind_param('i', $iddescuento);
        $query->execute();
        $query->bind_result($formato_descuento, $cantidad1, $cantidad2, $existencia, $valido_desde, $valido_hasta, $codigo_descuento);
        $query->fetch();
        $query->close();

        if ($formato_descuento == 'Porcentaje') {
            $opcion1 = '';
            $opcion2 = 'selected';
            $opcion3 = '';

            $mostrar_dinero = 'display:none;';
        } else {
            $opcion1 = '';
            $opcion2 = '';
            $opcion3 = 'selected';

            $mostrar_dinero = '';
        }

        $fecha_desde = date('Y-m-d', strtotime($valido_desde));
        $hora_desde = date('H:i', strtotime($valido_desde));
        $diai = date('d', strtotime($fecha_desde));
        $mesi = date('m', strtotime($fecha_desde));
        $anioi = date('Y', strtotime($fecha_desde));

        $fecha_hasta = date('Y-m-d', strtotime($valido_hasta));
        $hora_hasta = date('H:i', strtotime($valido_hasta));
        $diaf = date('d', strtotime($fecha_hasta));
        $mesf = date('m', strtotime($fecha_hasta));
        $aniof = date('Y', strtotime($fecha_hasta));
    }
    $form_desc = '
            <div class="card card-blue direct-chat direct-chat-dark" id="div_descuento' . $n . '" style="' . $mostrar . '">
                <div class="card-header card-personalizado" >
                    <h3 class="card-title">Asignar descuento ' . $c . '</h3>
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
                                <select id="tipo_descuento' . $i . '" class="form-control">
                                        <option ' . $opcion1 . '>----</option>
                                        <option value="Porcentaje" ' . $opcion2 . '>% Porcentaje</option>
                                        <option value="Dinero" ' . $opcion3 . '>$ Dinero</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Cantidad<span id="span_lblmxn' . $i . '" style="' . $mostrar_dinero . '">(MXN)</span></label>
                                <input
                                    type="text"
                                    id="cantidad1' . $i . '"
                                    value="' . $cantidad1 . '"
                                    class="form-control"
                                    placeholder="Cantidad">
                            </div>
                        </div>
                        <div class="col-sm-4" id="div_cantidad2' . $i . '" style="' . $mostrar_dinero . '">
                            <div class="form-group">
                                <label>Cantidad(USD)</label>
                                <input
                                    type="text"
                                    id="cantidad2' . $i . '"
                                    value="' . $cantidad2 . '"
                                    class="form-control"
                                    placeholder="Cantidad">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Existencia</label>
                                <input
                                    type="text"
                                    id="existencia' . $i . '"
                                    value="' . $existencia . '"
                                    class="form-control"
                                    placeholder="Existencia">
                            </div>
                        </div>';

    date_default_timezone_set('America/Mexico_City');
    $anio_actual = date('Y');
    $aniomax = $anio_actual + 10;

    $form_desc .= inputs_fecha_actualizar($fi, 'inicio', $anio_actual, $aniomax, $diai, $mesi, $anioi);


    $form_desc .= ' <div class="col-sm-2">
                            <div class="form-group">
                                <label>Hora inicio:</label>
                                <input
                                    type="time"
                                    value="' . $hora_desde . '"
                                    id="descuento_hora_inicio' . $i . '"
                                    class="form-control"
                                    placeholder="HH:MM">
                            </div>
                        </div>';

    date_default_timezone_set('America/Mexico_City');
    $anio_actual = date('Y');
    $aniomax = $anio_actual + 10;

    $form_desc .= inputs_fecha_actualizar($ff, 'fin', $anio_actual, $aniomax, $diaf, $mesf, $aniof);

    $form_desc .= '<div class="col-sm-2">
                            <div class="form-group">
                                <label>Hora fin:</label>
                                <input
                                    type="time"
                                    value="' . $hora_hasta . '"
                                    id="descuento_hora_fin' . $i . '"
                                    class="form-control"
                                    placeholder="HH:MM">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Código descuento</label>
                                <input
                                    type="text"
                                    id="codigo_descuento' . $i . '"
                                    value="' . $codigo_descuento . '"
                                    class="form-control"
                                    maxlength="5"
                                    placeholder="Código descuento">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';
    $mysqli->close();
    return $form_desc;
}

function opciones_pago()
{
    $mysqli = conectar();
    $i = 1;
    $html = "<option>----</option>";
    //Se obtiene el total de categorias con su nombre para impresion donde id_global = 1.
    $query = "SELECT IDsystemapades,Nombrepago FROM forma_depago ORDER BY Nombrepago";
    $resultado = $mysqli->query($query);

    while ($row = mysqli_fetch_array($resultado)) {
        $html .= '<option value="' . $row['IDsystemapades'] . '" id="opcion_pago' . $i . '">' . $row['Nombrepago'] . '</option>';
        $i++;
    }
    $mysqli->close();
    echo $html;
}

function prospectos_matriculados()
{
    $mysqli = conectar();
    $i = 1;
    $html = "";
    //Se obtiene el total de categorias con su nombre para impresion donde id_global = 1.
    $query = "SELECT IDuser,Nombre,Apellido1,Apellido2,matricula FROM prospectos WHERE matricula!='' AND matricula IS NOT NULL ORDER BY matricula";
    $resultado = $mysqli->query($query);

    while ($row = mysqli_fetch_array($resultado)) {
        //$html .= '<option value="' . $row['IDuser'] . '" id="opcion_prospecto'.$i.'">'. $row['Nombre'].' '.$row['Apellido1'].' '.$row['Apellido2'].'</option>';
        $html .= '<option value="' . $row['IDuser'] . '" id="opcion_prospecto' . $i . '">' . $row['matricula'] . '</option>';
        $i++;
    }
    $mysqli->close();
    echo $html;
}

function buscar_productos()
{
    $mysqli = conectar();
    $i = 1;
    $html = "";
    //Se obtiene el total de categorias con su nombre para impresion donde id_global = 1.
    $query = " SELECT IDsystempro,skuprograma,NombrePrograma FROM producto WHERE categoria!='1' ORDER BY IDsystempro";

    $consulta_producto = $mysqli->query($query);
    while ($producto = mysqli_fetch_array($consulta_producto)) {
        $html .= '<option value="' . $producto['IDsystempro'] . '" id="opcion_producto' . $i . '">' . $producto['skuprograma'] . ' - ' . $producto['NombrePrograma'] . '</option>';
        $i++;
    }
    $mysqli->close();
    echo $html;
}

function inputs_fecha_agregar($num, $cadena, $anio_minimo, $anio_maximo)
{

    $html = '
            <div class="col-sm-4">
            <div class="form-group">
            <label>Fecha ' . $cadena . ':</label>
            <div class="row">
               
                   <select id="dia' . $num . '" class="form-control col-sm-3">
                        <option value="----" selected>DD</option>';
    $d = 1;
    while ($d <= 31) {

        if ($d < 10) {
            $d2 = '0' . $d;
        } else {
            $d2 = $d;
        }
        $html .= '<option value="' . $d2 . '" ' . $default . '>' . $d2 . '</option>';

        $d++;
    }

    $html .= ' </select>
                  
               
           
        ';

    $html .= '
            
                
                   
                   <select id="mes' . $num . '" class="form-control col-sm-3">
                        <option value="----" selected>MM</option>';
    $m = 1;

    while ($m <= 12) {

        if ($m < 10) {
            $m2 = '0' . $m;
        } else {
            $m2 = $m;
        }
        $html .= '<option value="' . $m2 . '" ' . $default . '>' . $m2 . '</option>';

        $m++;
    }

    $html .= ' </select>
                  
               
            
        ';

    $html .= '
            
               
                   
                   <select id="anio' . $num . '" class="form-control col-sm-5">
                        <option value="----" selected>AAAA</option>';
    $a = $anio_minimo;
    while ($a <= $anio_maximo) {

        $html .= '<option value="' . $a . '" ' . $default . '>' . $a . '</option>';
        $a++;
    }

    $html .= ' </select>
                  
               
            </div>
            </div>
            </div>
        ';


    echo $html;
}

function inputs_fecha_actualizar($num, $cadena, $anio_minimo, $anio_maximo, $dia, $mes, $anio)
{

    $html = '
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Fecha ' . $cadena . ':</label>
                    <div class="row">
               
                       <select id="dia' . $num . '" class="form-control col-sm-3">
                            <option value="----" selected>DD</option>';
    $d = 1;
    $default = '';
    while ($d <= 31) {

        if ($d < 10) {
            $d2 = '0' . $d;
        } else {
            $d2 = $d;
        }

        if ($d2 == $dia) {
            $default = 'selected';
        }
        $html .= '<option value="' . $d2 . '" ' . $default . '>' . $d2 . '</option>';
        if ($default != '') {
            $default = '';
        }

        $d++;
    }

    $html .= ' </select>
        ';

    $html .= '
            
                       <select id="mes' . $num . '" class="form-control col-sm-3">
                            <option value="----" selected>MM</option>';
    $m = 1;
    $default = '';
    while ($m <= 12) {

        if ($m < 10) {
            $m2 = '0' . $m;
        } else {
            $m2 = $m;
        }
        if ($m2 == $mes) {
            $default = 'selected';
        }
        $html .= '<option value="' . $m2 . '" ' . $default . '>' . $m2 . '</option>';
        if ($default != '') {
            $default = '';
        }

        $m++;
    }

    $html .= ' </select>
        ';

    $html .= '
                       <select id="anio' . $num . '" class="form-control col-sm-5">
                            <option value="----" selected>AAAA</option>';
    $a = $anio_minimo;
    $default = '';
    while ($a <= $anio_maximo) {
        if ($a == $anio) {
            $default = 'selected';
        }
        $html .= '<option value="' . $a . '" ' . $default . '>' . $a . '</option>';
        if ($default != '') {
            $default = '';
        }
        $a++;
    }

    $html .= ' </select>
                  
               
                    </div>
                </div>
            </div>
        ';


    return $html;
}

function buscar_roles()
{

    $mysqli = conectar();

    $html = "";
    //Se obtiene el total de categorias con su nombre para impresion donde id_global = 1.
    $query = " SELECT IDsystemlogueorol,tipo FROM logueoroles ORDER BY tipo";

    $consulta = $mysqli->query($query);
    while ($row = mysqli_fetch_array($consulta)) {
        $html .= '<option value="' . $row['IDsystemlogueorol'] . '" >' . $row['tipo'] . '</option>';
    }
    $mysqli->close();
    echo $html;
}

function eventos_empresa()
{
    $mysqli = conectar();
    $i = 1;
    $html = "";
    //Se obtiene el total de categorias con su nombre para impresion donde id_global = 1.
    $query = " SELECT IDsystempro,NombreProducto,skuproducto FROM producto ORDER BY NombreProducto";

    $consulta_producto = $mysqli->query($query);

    while ($producto = mysqli_fetch_array($consulta_producto)) {
        $html .= '<option value="' . $producto['IDsystempro'] . '" id="opcion_evento' . $i . '">' . $producto['skuproducto'] . '-' . $producto['NombreProducto'] . '</option>';
        $i++;
    }
    $mysqli->close();
    echo $html;
}

function buscar_categorias()
{
    $mysqli = conectar();
    $i = 1;
    $html = "";
    //Se obtiene el total de categorias con su nombre para impresion donde id_global = 1.
    $query = " SELECT IDsystemCat,nombre_categoria FROM categorias ORDER BY nombre_categoria";

    $consulta_producto = $mysqli->query($query);
    while ($producto = mysqli_fetch_array($consulta_producto)) {
        $html .= '<option value="' . $producto['IDsystemCat'] . '" id="opcion_categoria' . $i . '">' . $producto['nombre_categoria'] . '</option>';
        $i++;
    }
    $mysqli->close();
    echo $html;
}

function buscar_rolespaquetes()
{
    $mysqli = conectar();
    $i = 1;
    $html = "";
    //Se obtiene el total de categorias con su nombre para impresion donde id_global = 1.
    $query = " SELECT IDsystemRolPaq,nombre_rolpaq FROM roles_paquetes ORDER BY nombre_rolpaq";

    $consulta_producto = $mysqli->query($query);
    while ($producto = mysqli_fetch_array($consulta_producto)) {
        $html .= '<option value="' . $producto['IDsystemRolPaq'] . '" >' . $producto['nombre_rolpaq'] . '</option>';
        $i++;
    }
    $mysqli->close();
    echo $html;
}

function buscar_tipospaquetes()
{
    $mysqli = conectar();
    $i = 1;
    $html = "";
    //Se obtiene el total de categorias con su nombre para impresion donde id_global = 1.
    $query = " SELECT IDsystemTipoPaq,nombre_tipopaq FROM tipos_paquetes ORDER BY nombre_tipopaq";

    $consulta_producto = $mysqli->query($query);
    while ($producto = mysqli_fetch_array($consulta_producto)) {
        $html .= '<option value="' . $producto['IDsystemTipoPaq'] . '" >' . $producto['nombre_tipopaq'] . '</option>';
        $i++;
    }
    $mysqli->close();
    echo $html;
}
