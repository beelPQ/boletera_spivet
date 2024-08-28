<?php

    require '../../tools/PHPSpreadSheet/vendor/autoload.php';
    require '../../php/conexion.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $metodoGet = $_GET;
    $queDescargar = preg_split('/(:|,)/', $metodoGet['id']);

    $mysqli = conectar();
    
    if($queDescargar[0] === '0'){
        
        $query = "SELECT * FROM catalogo_descuentos WHERE descuento_tipo=2 ORDER BY idsystemdescuento DESC";
        
    }else{
        $condicion='';
        $c=0;
        for($i = 0; $i<count($queDescargar); $i=$i+2){
            if($c>0){
                $condicion.=' OR ';
            }
            $condicion.='idsystemdescuento='.$queDescargar[($i+1)];
            $c++;
        }
        
        $query = "SELECT * FROM catalogo_descuentos WHERE ".$condicion.' ORDER BY idsystemdescuento DESC';
        
    }
    
    $resultado = $mysqli->query($query);
    //VARIABLE EN QUE FILA INICIAREMOS A ESCRIBIR
    $fila = 2;

    //OBJETO
    $objPHPExcel = new Spreadsheet();
    $objPHPExcel->getProperties()->setCreator("")->setDescription("Reporte de cupones");
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle("CUPONES");
    
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'TIPO');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'CANTIDAD(MXN Ó %)');
    //$objPHPExcel->getActiveSheet()->setCellValue('C1', 'CANTIDAD(USD)');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'EXISTENCIAS');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'VÁLIDO DESDE');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', 'VÁLIDO HASTA');
    $objPHPExcel->getActiveSheet()->setCellValue('F1', 'CÓDIGO');
    $objPHPExcel->getActiveSheet()->setCellValue('G1', 'ESTATUS');
    $objPHPExcel->getActiveSheet()->setCellValue('H1', 'MOTIVO');
    

    while($row = mysqli_fetch_array($resultado)){
        
        if($row['descuento_estatus']==1){
            $status='Activo';
        }
        else{
            $status='Desactivado';
        }


        $descuento_cantidad = '';
        if($row['descuento_formato']=='Porcentaje'){

           $descuento_cantidad = $row['descuento_cantidad'].'%';

        }else if($row['descuento_formato']=='Dinero'){

            $descuento_cantidad = '$'.number_format($row['descuento_cantidad'],2);
        }

        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row['descuento_formato']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $descuento_cantidad);
        //$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $row['descuento_cantidad2']);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $row['descuento_existencia']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, date('d/m/Y H:i:s',strtotime($row['descuento_valido_desde'])));
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, date('d/m/Y H:i:s',strtotime($row['descuento_valido_hasta'])));
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $row['descuento_codigo']);
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $status);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $row['descuento_notas']);
       
        $fila++;


        unset($status);

    }

    $mysqli -> close();

    header("Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment;filename="Reporte_Cupones.xlsx"');
    header('Cache-Control: max-age=0');

    $objWriter = new Xlsx($objPHPExcel);
    $objWriter->save('php://output');


?>