<?php
    require_once ('../../php/conexion.php');
    
    
    
    if( isset($_POST["option"]) ){

        if($_POST["option"]=='getEstadoMunicipios'){

            $id_estado = $_POST["code"];

            $html='<option value="----">Seleccionar</option>';

            $mysqli = conectar();

            $query = $mysqli->prepare(" SELECT m.id,m.municipio
                                        FROM estados_municipios AS em
                                        INNER JOIN municipios AS m ON em.municipios_id=m.id
                                        WHERE em.estados_id = ?");
            $query -> bind_param('i',$id_estado);
            $query -> execute();
            $result = $query -> get_result();

            while($row=$result->fetch_assoc() ){

                $html.='<option value="'.$row['id'].'" >'.$row['municipio'].'</option>';
            
            }
            $query -> close();


            $mysqli -> close();
    
            $response = array();
            $response['munis']=$html;
            echo json_encode($response);

        }
    }
?>