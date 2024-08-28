<?php

    require '../../tools/PHPSpreadSheet/vendor/autoload.php';
    require '../../php/conexion.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 

    $metodoGet = $_GET;
    $queDescargar = preg_split('/(:|,)/', $metodoGet['id']);
    
    $mysqli = conectar();
    
    if($queDescargar[0] === '0'){
        
        $query = " SELECT
                        idsystemcobrocat,
                        cobroscata_idregcobro,
                        cobroscata_fechapago,
                        cobroscata_status,
                        clientes_idsystemcli,
                        cobroscata_idtransaccion,
                        forma_depago_IDsystemapades,
                        cobroscata_moneda,
                        cobroscata_montotransaccion,
                        comision_total,
                        facturar,
                        iva 
                    FROM catalogo_cobros ORDER BY cobroscata_idregcobro DESC";
        
    }else{
        $condicion='';
        $c=0;
        for($i = 0; $i<count($queDescargar); $i=$i+2){
            if($c>0){
                $condicion.=' OR ';
            }
            $condicion.='idsystemcobrocat='.$queDescargar[($i+1)];
            $c++;
        }
        
       
         $query = " SELECT
                        idsystemcobrocat,
                        cobroscata_idregcobro,
                        cobroscata_fechapago,
                        cobroscata_status,
                        clientes_idsystemcli,
                        cobroscata_idtransaccion,
                        forma_depago_IDsystemapades,
                        cobroscata_moneda,
                        cobroscata_montotransaccion,
                        comision_total,
                        facturar,
                        iva 
                    FROM catalogo_cobros
                    WHERE ".$condicion." 
                    ORDER BY cobroscata_idregcobro DESC";


        
    }
    
    
    $resultado = $mysqli->query($query);
    //VARIABLE EN QUE FILA INICIAREMOS A ESCRIBIR
    $fila = 2;

    //OBJETO
    $objPHPExcel = new Spreadsheet();
    $objPHPExcel->getProperties()->setCreator("")->setDescription("Reporte de cobros");
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle("COBROS");
    
    
    
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'ID COMPRA');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'FECHA PAGO');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'STATUS DEL PAGO');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'NOMBRE');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', 'APELLIDO PRIMARIO');
    $objPHPExcel->getActiveSheet()->setCellValue('F1', 'APELLIDO SECUNDARIO');
    $objPHPExcel->getActiveSheet()->setCellValue('G1', 'ID TRANSACCIÓN');
    $objPHPExcel->getActiveSheet()->setCellValue('H1', 'SISTEMA DE PAGO');
    $objPHPExcel->getActiveSheet()->setCellValue('I1', 'FORMA DE PAGO');
    $objPHPExcel->getActiveSheet()->setCellValue('J1', 'FACTURA');
    $objPHPExcel->getActiveSheet()->setCellValue('K1', 'MONEDA');
    $objPHPExcel->getActiveSheet()->setCellValue('L1', 'TOTAL');

    
    

    while($row = mysqli_fetch_array($resultado)){

        //obtenemos el porcentaje de comision para repartirlo en los productos
        $total_sin_comision = $row['cobroscata_montotransaccion'] - $row['comision_total'];

        if($total_sin_comision<=0){
            $porcentaje_comision = 0;
        }else{
            $porcentaje_comision = ($row['comision_total'] * 100)/$total_sin_comision;
        }

       


        if($row['cobroscata_status']==0){
               
            $status_pago='Pendiente';
  
        }else if($row['cobroscata_status']==1){

           $status_pago='Pagado';
           
        }

        if($row['facturar']==0){
               
           $facturar='Pendiente';
  
        }else if($row['facturar']==1){

           $facturar='Pagado';
           
        }

        $query = "SELECT 
                    clientes_nombre,
                    clientes_apellido1,
                    clientes_apellido2
                FROM catalogo_clientes WHERE idsystemcli=".$row['clientes_idsystemcli'];
        $consulta = $mysqli->query($query);
        $cliente = mysqli_fetch_array($consulta);
        unset($consulta);


        $query = "SELECT 
                    *
                FROM catalogo_forma_depago WHERE IDsystemapades=".$row['forma_depago_IDsystemapades'];
        $consulta = $mysqli->query($query);
        $formapago = mysqli_fetch_array($consulta);
        unset($consulta);


        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row['cobroscata_idregcobro']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, date('d/m/Y H:i:s',strtotime($row['cobroscata_fechapago'])));
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $status_pago);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $cliente['clientes_nombre']);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $cliente['clientes_apellido1']);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $cliente['clientes_apellido2']);
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $row['cobroscata_idtransaccion']);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $formapago['plataforma']);
        $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $formapago['Nombrepago']);
        $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, $facturar);
        $objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, $row['cobroscata_moneda']);
        $objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, $row['cobroscata_montotransaccion']);
      
         
        $fila++;



        $iva = $row['iva'] * 100;

        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, 'MODALIDAD');
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, 'SKU PRODUCTO');
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, 'MONTO BASE');
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, 'DESCUENTO');
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, 'SUBTOTAL');
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, 'CUPÓN');
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, 'IVA(%'.$iva.')');
        $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, 'COMISIONES');
        $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, 'MONTO TOTAL');

        $fila++;



        $query = "SELECT
                    *
                 FROM catalogo_cobros_items 
                 WHERE cobroscata_idsystemcobrocat = ".$row['idsystemcobrocat'];
        $resultado2 = $mysqli->query($query);

        while($cobroitem = mysqli_fetch_array($resultado2)){


            $query = "SELECT catalogo_productos_sku,catalogo_productos_nombre,producto_modalidad_idsystemprodmod
                      FROM catalogo_productos WHERE idsystemcatpro = ".$cobroitem['catalogo_productos_idsystemcatpro'];
            $resultado3 = $mysqli->query($query);
            $producto = mysqli_fetch_array($resultado3);
            unset($resultado3);


            $precio_sin_comision = $cobroitem['cobroscata_items_preciodescuentopaquete'] - $cobroitem['cobroscata_items_descuentocompra'] + $cobroitem['cobroscata_items_ivadinero'];
            $comision_precio = $precio_sin_comision * ($porcentaje_comision/100);
            $preciofinal = $precio_sin_comision + $comision_precio;
            

            $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $cobroitem['modality']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $producto['catalogo_productos_sku'].'-'.$producto['catalogo_productos_nombre']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, number_format($cobroitem['cobroscata_items_preciobase'],2));
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, number_format($cobroitem['cobroscata_items_descuentoproducto'],2));
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, number_format($cobroitem['cobroscata_items_preciodescuentopaquete'],2));
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, number_format($cobroitem['cobroscata_items_descuentocompra'],2));
            $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, number_format($cobroitem['cobroscata_items_ivadinero'],2));
            $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, number_format($comision_precio,2));
            $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, number_format($preciofinal,2));

            $fila++;

            unset($producto);
            unset($precio_sin_comision);
            unset($comision_precio);
            unset($preciofinal);

        }

        
        unset($total_sin_comision);
        unset($porcentaje_comision);
        unset($status_pago);
        unset($facturar);
        unset($cliente);
        unset($formapago);

        unset($iva);

        unset($resultado2);
       
    }

    $mysqli -> close();

    header("Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment;filename="Cobros.xlsx"');
    header('Cache-Control: max-age=0');

    $objWriter = new Xlsx($objPHPExcel);
    $objWriter->save('php://output');
?>