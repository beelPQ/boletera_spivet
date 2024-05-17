<?php
    require_once ('../../php/conexion.php');
    
    
    
    if( isset($_POST["option"]) ){

        if($_POST["option"]=='getStatesCountry'){

            $id_country = $_POST["code"];

            $html='<option value="----">Seleccionar</option>';

            $mysqli = conectar();

            // $query = $mysqli->prepare(" SELECT m.id,m.municipio
            //                             FROM estados_municipios AS em
            //                             INNER JOIN municipios AS m ON em.municipios_id=m.id
            //                             WHERE em.estados_id = ?");
            // $query -> bind_param('i',$id_estado);
            // $query -> execute();
            // $result = $query -> get_result();
             $query = " SELECT st.id_state, st.state
                                        FROM country_states cs
                                        INNER JOIN states st ON st.id_state = cs.id_state
                                        WHERE cs.id_country = $id_country";
            $exect = $mysqli->query($query);

           
            if($exect->num_rows > 0){
                
                while($row=mysqli_fetch_array($exect) ){ 
                    $html.='<option value="'.$row['id_state'].'" >'.$row['state'].'</option>';
            
                }
            }
            
            //$query -> close();


            $mysqli -> close();
    
            $response = array();
            $response['munis']=$html;
            echo json_encode($response);

        }
    }
?>