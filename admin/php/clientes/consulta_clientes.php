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
            

            
            // $query = $mysqli->prepare(" SELECT m.municipio,e.estado
            //                             FROM municipios AS m
            //                             INNER JOIN estados_municipios AS em ON m.id=em.municipios_id
            //                             INNER JOIN estados AS e ON e.id=em.estados_id
            //                             WHERE m.id = ?");
            // $query -> bind_param('i',$row['id_municipio']);
            // $query -> execute();
            // $query -> bind_result($municipio,$estado);
            // $query -> fetch();
            // $query -> close();
            
             $query = $mysqli->prepare("SELECT co.country, st.state 
                                        FROM country_states AS cs 
                                        INNER JOIN countries AS co ON co.id_country = cs.id_country 
                                        INNER JOIN states AS st ON st.id_state = cs.id_state 
                                        WHERE co.id_country = ? and cs.id_state = ?");
            $query -> bind_param('ii',$row['id_country'], $row['id_state']);
            $query -> execute();
            $query -> bind_result($country,$state);
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
                <td>' . $country . '</td>
                <td>' . $state . '</td>
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


       $query = " SELECT cc.*, co.country, st.state FROM catalogo_clientes  cc
        INNER JOIN countries AS co ON co.id_country = cc.id_country
        INNER JOIN states AS st ON st.id_state = cc.id_state
        WHERE idsystemcli =".$id;
        $resultado = $mysqli->query($query);
        $row = mysqli_fetch_array($resultado);

        
        $existe = false;
        if( isset($row['idsystemcli']) ){
            if( is_null($row['idsystemcli'])==false ){


                // $query = $mysqli->prepare(" SELECT e.id
                //                             FROM municipios AS m
                //                             INNER JOIN estados_municipios AS em ON m.id=em.municipios_id
                //                             INNER JOIN estados AS e ON e.id=em.estados_id
                //                             WHERE m.id = ?");
                // $query -> bind_param('i',$row['id_municipio']);
                // $query -> execute();
                // $query -> bind_result($estado);
                // $query -> fetch();
                // $query -> close();
                
                
                
            
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
                                 <label>Pais*:</label>
                                <select  class="form-control " name="country" id="country">';

                                    $query = " SELECT id_country, country FROM countries ORDER BY id_country";
                                    $consulta = $mysqli->query($query);
                                    $default = '';
                                    while ($row2 = mysqli_fetch_array($consulta)) {
                                        if ($row["id_country"] == $row2['id_country']) {
                                            $default = 'selected';
                                        }
                                        $html .= '<option value="' . $row2['id_country'] . '" ' . $default . '>' . $row2['country'] . '</option>';
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
                                 <label>Estado*:</label>
                                <select  class="form-control " name="state" id="state">';

                                    $query = " SELECT st.id_state, st.state 
                                    FROM country_states AS cs
                                    INNER JOIN states AS st ON st.id_state = cs.id_state
                                    WHERE cs.id_country=".$row["id_country"]." ORDER BY st.id_state";
                                    $consulta = $mysqli->query($query);
                                    $default = '';
                                    while ($row2 = mysqli_fetch_array($consulta)) {
                                        if ($row['id_state'] == $row2['id_state']) {
                                            $default = 'selected';
                                        }
                                        $html .= '<option value="' . $row2['id_state'] . '" ' . $default . '>' . $row2['state'] . '</option>';
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

