<?php

    require '../../tools/PHPSpreadSheet/vendor/autoload.php';
    require '../../php/conexion.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $metodoGet = $_GET;
    $queDescargar = preg_split('/(:|,)/', $metodoGet['id']);
    
    $mysqli = conectar();
    $query = " SELECT * FROM configuracion ";
    $resultado = $mysqli->query($query);
    
    //OBJETO
    $objPHPExcel = new Spreadsheet();
    $objPHPExcel->getProperties()->setCreator("")->setDescription("Reporte de configuración");
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle("CONFIGURACIÓN");
    
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'CAMPO');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'VALOR');
    
    $fila=2;
    while ($row = mysqli_fetch_array($resultado)) {
        
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row['configuracion_nombre']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $row['configuracion_valor']);
        
        $fila++;
    }

    
    $mysqli->close();    

    header("Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment;filename="Configuración.xlsx"');
    header('Cache-Control: max-age=0');

    $objWriter = new Xlsx($objPHPExcel);
    $objWriter->save('php://output');
?>
