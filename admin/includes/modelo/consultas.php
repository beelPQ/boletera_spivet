<?php
    if(isset($_POST["opcion"])){
        
        if($_POST["opcion"]=='buscarMunicipios'){
            $idestado=$_POST["idestado"];
            
            $html='<option>----</option>';
            
            require_once ('../../php/conexion.php');
            $mysqli = conectar();
            
            $query = " SELECT m.id,m.municipio FROM estados_municipios AS em INNER JOIN municipios AS m ON em.municipios_id=m.id WHERE em.estados_id=".$idestado." ORDER BY m.municipio";
            $resultado = $mysqli->query($query);
            
            while($row = mysqli_fetch_array($resultado)){
                
                $html .= '<option value="'.$row['id'].'">'.$row['municipio'].'</option>';
    
            }
            
            $data = array();
            
            $data['html']=$html;
            
            $mysqli -> close();
            echo json_encode($data);
            
        }else if($_POST["opcion"]=='crearSkuProducto'){
            
            $categoria=$_POST["categoria"];
            
            require_once ('../../php/conexion.php');
            $mysqli = conectar();
            
            $query = $mysqli->prepare(" SELECT skuproducto FROM producto WHERE categoria=? ORDER BY skuproducto DESC LIMIT 1");
            $query -> bind_param('i', $categoria);
            $query -> execute();
            $query -> bind_result($ultimosku);
            $query -> fetch();
            $query -> close();
            
            if($ultimosku){
                
                $ultimonum = explode("-", $ultimosku);
    
                $proximonum=$ultimonum[1]+1;
                $proximonum=str_pad($proximonum, 4, "0", STR_PAD_LEFT);
                $proximosku=$ultimonum[0].'-'.$proximonum;
                
            }else{
                
                $query = $mysqli->prepare(" SELECT prefijo FROM categorias WHERE IDsystemCat=? ");
                $query -> bind_param('i', $categoria);
                $query -> execute();
                $query -> bind_result($prefijo);
                $query -> fetch();
                $query -> close();
                
                $proximosku=$prefijo.'-0001';
                
            }
            
            $data = array();
            
            $data['proximosku']=$proximosku;
             
            
            $mysqli -> close();
            echo json_encode($data);
            
        }
        
    }
?>