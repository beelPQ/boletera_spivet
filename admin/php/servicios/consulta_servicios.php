<?php


	function mostrar_servicios_cursos(){
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
        
        $query = " SELECT * FROM services ORDER BY id_service DESC";
        $resultado = $mysqli->query($query);

        while($row = mysqli_fetch_array($resultado)){
            

            
            $query = $mysqli->prepare(" SELECT category_name
                                        FROM categories_services 
                                        WHERE id_category = ?");
            $query -> bind_param('i',$row['id_category']);
            $query -> execute();
            $query -> bind_result($categoria);
            $query -> fetch();
            $query -> close();

            if($row['priority_home']==1){
            	$inHome='Si';
            }else{
            	$inHome='No';
            }

            if($row['available']==1){
                $publish='Si';
            }else{
                $publish='No';
            }
            
            
            $html .= '
            <tr>
                <td>
                    servicios:'.$row['id_service'].'
                </td>
                <td>' . $row['service_name'] . '</td>
                <td>' . $categoria . '</td>
                <td>' . strip_tags(substr($row['service_description'],0,50)) . '...</td>
                <td>';

                	if( is_null($row['image_service'])==false && $row['image_service']!=''){

                		$html .= '<a href="../images/services/'.$row['image_service'].'" target="_blank" ><button type="button" class="btn botonFormulario" >Ver</button></a>';

                	}else{
                		$html .= 'Sin imagen';
                	}

            $html .= 
                '</td>
                <td>' . $inHome . '</td>
                <td>' . $row['order_public'] . '</td>
                <td>' . $publish . '</td>
                
                
            </tr>
            ';

        }
        
        $mysqli -> close();

        echo $html;
    }



    function list_categories_services($id,$textempty) {

        $mysqli = conectar();

        if ($id == 0) {
            $seleccionar = "SELECTED";
        }
        else {
            $seleccionar = "";
        }

        $html = "<option ".$seleccionar." value='----' >".$textempty."</option>";
        
        $query     = "SELECT * FROM categories_services ORDER BY category_name";
        $resultado = $mysqli->query($query);

        $seleccionar = "";
        while ($row = mysqli_fetch_array($resultado)) {

            if ($row['id_category'] == $id) {
                $seleccionar = "SELECTED";
            }

            $html .= '<option value="' . $row['id_category'] . '" ' . $seleccionar . '>' . $row['category_name'] . '</option>';

            if ($seleccionar != '') {
                $seleccionar = "";
            }

        }

        $mysqli->close();

        return $html;

    }

?>