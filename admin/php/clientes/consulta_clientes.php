<?php
    
    
    
    function mostrar_clientes_cursos(){
        $mysqli = conectar();
        $html = "";

        /*
        $html .= '
            <tr>
                <td>
                    1
                </td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                
            </tr>
            ';
            */
        
        $query = " SELECT * FROM catalogo_clientes ORDER BY clientes_idsolicitud DESC";
        $resultado = $mysqli->query($query);

        while($row = mysqli_fetch_array($resultado)){
            

            
            $query = $mysqli->prepare(" SELECT m.municipio,e.estado
                                        FROM municipios AS m
                                        INNER JOIN estados_municipios AS em ON m.id=em.municipios_id
                                        INNER JOIN estados AS e ON e.id=em.estados_id
                                        WHERE m.id = ?");
            $query -> bind_param('i',$row['id_municipio']);
            $query -> execute();
            $query -> bind_result($municipio,$estado);
            $query -> fetch();
            $query -> close();
            
            
            $html .= '
            <tr>
                <td>
                    clientes:'.$row['idsystemcli'].'
                </td>
                <td>' . $row['clientes_idsolicitud'] . '</td>
                <td>' . $row['clientes_nombre'] . '</td>
                <td>' . $row['clientes_apellido1'] . '</td>
                <td>' . $row['clientes_apellido2'] . '</td>
                <td>' . $row['clientes_email'] . '</td>
                <td>' . $row['clientes_telefono'] . '</td>
                <td>' . $row['clientes_codigopostal'] . '</td>
                <td>' . $estado . '</td>
                <td>' . $municipio . '</td>
                <td>' . date('d/m/Y H:i:s',strtotime($row['clientes_fechacreacion'])) . '</td>
                
            </tr>
            ';

        }
        
        $mysqli -> close();

        echo $html;
    }


    function editar_cliente_cursos($id){
        $mysqli = conectar();
        $html = "";


        $query = " SELECT * FROM catalogo_clientes WHERE idsystemcli =".$id;
        $resultado = $mysqli->query($query);
        $row = mysqli_fetch_array($resultado);

        
        $existe = false;
        if( isset($row['idsystemcli']) ){
            if( is_null($row['idsystemcli'])==false ){


                $query = $mysqli->prepare(" SELECT e.id
                                            FROM municipios AS m
                                            INNER JOIN estados_municipios AS em ON m.id=em.municipios_id
                                            INNER JOIN estados AS e ON e.id=em.estados_id
                                            WHERE m.id = ?");
                $query -> bind_param('i',$row['id_municipio']);
                $query -> execute();
                $query -> bind_result($estado);
                $query -> fetch();
                $query -> close();
                
            
                $html='
                    <div class="col-sm-12 row">

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Nombre*:</label>
                                <input
                                    type="text"
                                    id="name"
                                    class="form-control"
                                    maxlength="49"
                                    placeholder="texto"
                                    value="'.$row['clientes_nombre'].'"
                                    >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Apellido primario*:</label>
                                <input
                                    type="text"
                                    id="lastname_1"
                                    class="form-control"
                                    maxlength="39"
                                    placeholder="texto"
                                    value="'.$row['clientes_apellido1'].'"
                                    >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Apellido secundario*:</label>
                                <input
                                    type="text"
                                    id="lastname_2"
                                    class="form-control"
                                    maxlength="39"
                                    placeholder="texto"
                                    value="'.$row['clientes_apellido2'].'"
                                    >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Teléfono*:</label>
                                <input
                                    type="text"
                                    id="phone"
                                    class="form-control"
                                    maxlength="19"
                                    placeholder=""
                                    value="+'.$row['clientes_telefono'].'"
                                    >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Email*:</label>
                                <input
                                    type="text"
                                    id="email"
                                    class="form-control"
                                    maxlength="60"
                                    placeholder="texto"
                                    value="'.$row['clientes_email'].'"
                                    >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Código postal*:</label>
                                <input
                                    type="text"
                                    id="cpostal"
                                    class="form-control"
                                    maxlength="5"
                                    placeholder="número"
                                    value="'.$row['clientes_codigopostal'].'"
                                    >
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                 <label>Estado*:</label>
                                <select  class="form-control " name="estado" id="estado">';

                                    $query = " SELECT id,estado FROM estados ORDER BY estado";
                                    $consulta = $mysqli->query($query);
                                    $default = '';
                                    while ($row2 = mysqli_fetch_array($consulta)) {
                                        if ($estado == $row2['id']) {
                                            $default = 'selected';
                                        }
                                        $html .= '<option value="' . $row2['id'] . '" ' . $default . '>' . $row2['estado'] . '</option>';
                                        if ($default != '') {
                                            $default = '';
                                        }
                                    }

                                    unset($consulta);
                            
                      $html .= '</select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                 <label>Municipio*:</label>
                                <select  class="form-control " name="municipio" id="municipio">';

                                    $query = " SELECT m.id,m.municipio FROM estados_municipios AS em INNER JOIN municipios AS m ON em.municipios_id=m.id WHERE em.estados_id=".$estado." ORDER BY m.municipio";
                                    $consulta = $mysqli->query($query);
                                    $default = '';
                                    while ($row2 = mysqli_fetch_array($consulta)) {
                                        if ($row['id_municipio'] == $row2['id']) {
                                            $default = 'selected';
                                        }
                                        $html .= '<option value="' . $row2['id'] . '" ' . $default . '>' . $row2['municipio'] . '</option>';
                                        if ($default != '') {
                                            $default = '';
                                        }
                                    }
                            
                      $html .= '</select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <input type="hidden" id="operation" value="edit">
                            <input type="hidden" id="code" value="' . $id . '">
                            <button type="submit" class="btn botonFormulario">Guardar</button>
                            <a href="index.php?id=clientes" class="btn botonFormulario" >Cancelar</a>
                        </div>


                    </div>


                ';
                
                $existe = true;
            }
        }
        
        $mysqli->close();
        
        if($existe === true) {
            echo $html;
        } else {
            echo '<label>No se ha encontrado ningún cliente</label>';
        }

    }

    
?>

