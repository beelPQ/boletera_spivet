<?php

    function lista_canastacategorias($id){

        $mysqli = conectar();
        
        if($id==0){
            $seleccionar="SELECTED";
        }else{
            $seleccionar="";
        }
        
        $html = "<option ".$seleccionar.">----</option>";
        //Se obtiene el total de categorias con su nombre para impresion donde id_global = 1.
        $query = "SELECT id_canasta_categoria,nombre FROM canastas_categorias ORDER BY nombre";
        $resultado = $mysqli->query($query);
        
        $seleccionar="";
        while ($row = mysqli_fetch_array($resultado)) {

            if($row['id_canasta_categoria']==$id){
                $seleccionar="SELECTED";
            }
            $html .= '<option value="' . $row['id_canasta_categoria'] . '" '.$seleccionar.'>' . $row['nombre']. '</option>';
            if($seleccionar!=''){
                $seleccionar="";
            }

        }
        
        $mysqli->close();
        return $html;
    
    }

    function lista_diplomasCusrosCategorias($id){

        $mysqli = conectar();
        
        if($id==0){
            $seleccionar="SELECTED";
        }else{
            $seleccionar="";
        }
        
        $html = "<option ".$seleccionar.">----</option>";
        //Se obtiene el total de categorias con su nombre para impresion donde id_global = 1.
        $query = "SELECT idsystemcatproon, categorias_programas_nombre FROM catalogo_categorias_programas ORDER BY categorias_programas_nombre";
        $resultado = $mysqli->query($query);
        
        $seleccionar="";
        while ($row = mysqli_fetch_array($resultado)) {

            if($row['idsystemcatproon']==$id){
                $seleccionar="SELECTED";
            }
            $html .= '<option value="' . $row['idsystemcatproon'] . '" '.$seleccionar.'>' . $row['categorias_programas_nombre']. '</option>';
            if($seleccionar!=''){
                $seleccionar="";
            }

        }
        
        $mysqli->close();
        return $html;
    }
    function lista_diplomasCusrosModalidad($id){

        $mysqli = conectar();
        
        if($id==0){
            $seleccionar="SELECTED";
        }else{
            $seleccionar="";
        }
        
        $html = "<option ".$seleccionar.">----</option>";
        //Se obtiene el total de categorias con su nombre para impresion donde id_global = 1.
        $query = "SELECT idsystemprodmod, modalidad_nombre FROM catalogo_producto_modalidad ORDER BY modalidad_nombre";
        $resultado = $mysqli->query($query);
        
        $seleccionar="";
        while ($row = mysqli_fetch_array($resultado)) {

            if($row['idsystemprodmod']==$id){
                $seleccionar="SELECTED";
            }
            $html .= '<option value="' . $row['idsystemprodmod'] . '" '.$seleccionar.'>' . $row['modalidad_nombre']. '</option>';
            if($seleccionar!=''){
                $seleccionar="";
            }

        }
        
        $mysqli->close();
        return $html;
    }

    function lista_generaSKu($id)
    {
        $mysqli = conectar();
        $sku = '';
        $newSku = '';
        $query = "SELECT catalogo_productos_sku FROM catalogo_productos ORDER BY catalogo_productos_sku ASC";
        $resultado = $mysqli->query($query);
        
        $seleccionar="";
        while ($row = mysqli_fetch_array($resultado)) { $sku = $row['catalogo_productos_sku']; }
        if( $sku == '' ) { $newSku = 'DCT100'; }
        else {
            $replaceSku = str_replace('DCT', '', $sku);
            $numberSku = 0;
            $numberSku = (int) $replaceSku;
            $numberSku = $numberSku + 1;
            $newSku = "DCT$numberSku";
        }

        $mysqli->close();
        return $newSku;
    }


    function lista_canastasProductosEstados($id){

        $mysqli = conectar();
        
        if($id==0){
            $seleccionar="SELECTED";
        }else{
            $seleccionar="";
        }
        
        //$html = "<option ".$seleccionar.">----</option>";

        $query = "SELECT id_canasta_producto_estado,nombre FROM canastas_productos_estados ORDER BY nombre";
        $resultado = $mysqli->query($query);
        
        $seleccionar="";
        while ($row = mysqli_fetch_array($resultado)) {

            if($id==0){

                if($row['id_canasta_producto_estado']==1){
                    $seleccionar="SELECTED";
                }

            }else{
                if($row['id_canasta_producto_estado']==$id){
                    $seleccionar="SELECTED";
                }
            }
            

            $html .= '<option value="'.$row['id_canasta_producto_estado'].'" '.$seleccionar.'>' . $row['nombre']. '</option>';

            if($seleccionar!=''){
                $seleccionar="";
            }

        }
        
        $mysqli->close();
        return $html;
    
    }

?>