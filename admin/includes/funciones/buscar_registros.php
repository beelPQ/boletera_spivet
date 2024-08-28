<?php


if($_POST){
    
    if($_POST['opcion'] == 'Utilidad'){
        
        require_once ('../../php/conexion.php');
        $mysqli = conectar();
        
        $evento=$_POST['evento'];
        $rol=$_POST['rol'];
        $moneda=$_POST['moneda'];
        $pagado=$_POST['pagado'];
        
        $fechaminima = $_POST['fechaminima'];
        $fechamaxima = $_POST['fechamaxima'];
        
        
        $instruccion='SELECT cob.*,pro.skuproducto,pro.NombreProducto,cli.num_registro FROM cobros AS cob INNER JOIN producto AS pro ON cob.producto_IDproducto=pro.IDsystempro INNER JOIN clientes AS cli ON cob.cliente_IDuser=cli.IDuser';
        
        if($evento!='----' || $moneda!='----' || $pagado!='----' || $fechaminima!='' || $fechamaxima!=''){
             
            $instruccion.=' WHERE';
            
            $c=0;
            if($evento!='----'){
                $instruccion.=' cob.producto_IDproducto='.$evento;
                $c++;
            }
            if($rol!='----'){
                if($c>0){
                    $instruccion.=' AND';
                }
                $instruccion.=' pro.rol ="'.$rol.'"';
                $c++;
            }
            if($moneda!='----'){
                if($c>0){
                    $instruccion.=' AND';
                }
                $instruccion.=' cob.TipoCambio ="'.$moneda.'"';
                $c++;
            }
            if($pagado!='----'){
                 if($c>0){
                    $instruccion.=' AND';
                }
                $instruccion.=' cob.Status ='.$pagado;
                $c++;
            }
            if($fechaminima!=''){
                 if($c>0){
                    $instruccion.=' AND';
                }
                $instruccion.=' cob.FechaPago>="'.$fechaminima.'"';
                $c++;
            }
            if($fechamaxima!=''){
                 if($c>0){
                    $instruccion.=' AND';
                }
                $instruccion.=' cob.FechaPago<="'.$fechamaxima.'"';
                $c++;
            }
            
        }
        
        $consulta = $mysqli->query($instruccion);
        
        $regs=array();
        while ($row = mysqli_fetch_array($consulta)){
            
            $preciobase= $row['montobase'];
            $preciobase_descuento = $row['montobase'] - $row['descuento'];
            $iva = $preciobase_descuento * $row['iva'];
            $comision_total = ($preciobase_descuento * $row['ComisionPorcentaje']) + $row['ComisionDinero'];
            
          
            if($row['Status']==1){
                $status_pago='Sí';
            }else{
                 $status_pago='No';
            }
           
            $registro = new stdClass();
            $registro->sku = $row['skuproducto'];
            $registro->producto = $row['NombreProducto'];
            $registro->folio = $row['num_registro'];
            $registro->fechafolio = $row['FechaPago'];
            $registro->transaccion = $row['IDtransaccion'];
            $registro->moneda = $row['TipoCambio'];
            $registro->montobase = number_format($preciobase, 2);
            $registro->descuento = number_format($row['descuento'], 2);
            $registro->montobasedesc = number_format($preciobase_descuento, 2);
            $registro->iva = number_format($iva, 2);
            $registro->comision = number_format( $comision_total, 2);
            $registro->precio = number_format( $row['MontoTransaccion'], 2);
            $registro->status_pago = $status_pago;
            
            
            array_push($regs, $registro);
        }
        
        $regs=json_encode($regs);
        
        date_default_timezone_set('America/Mexico_City');
        $fecha=date("d/m/Y H:i:s");
        
        $mysqli -> close();
        echo json_encode(array('data'=>$regs,'fecha'=>$fecha));
        
        
    }
    
    
}

?>