<?php

    require '../../tools/PHPSpreadSheet/vendor/autoload.php';
    require '../../php/conexion.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $mysqli = conectar();
    $query = "SELECT * FROM empresa";
    $resultado = $mysqli->query($query);
    //VARIABLE EN QUE FILA INICIAREMOS A ESCRIBIR
    $fila = 2;

    //OBJETO
    $objPHPExcel = new Spreadsheet();
    $objPHPExcel->getProperties()->setCreator("")->setDescription("Reporte de empresa");
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle("EMPRESAS");
    
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'NOMBRE');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'NOMBRE CORTO');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'RFC');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'TELEFONO');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', 'EMAIL');
    //$objPHPExcel->getActiveSheet()->setCellValue('F1', 'PAYPAL CLIENTID');
    $objPHPExcel->getActiveSheet()->setCellValue('F1', 'OPENPAY MECHANTID');
    $objPHPExcel->getActiveSheet()->setCellValue('G1', 'OPENPAY LLAVE PRIVADA');
    $objPHPExcel->getActiveSheet()->setCellValue('H1', 'OPENPAY LLAVE PÚBLICA');
    $objPHPExcel->getActiveSheet()->setCellValue('I1', 'OPENPAY MODO SANDBOX');

    /*
    $objPHPExcel->getActiveSheet()->setCellValue('J1', 'CANASTAS BENEFICIARIO DE TRANSFERENCIA');
    $objPHPExcel->getActiveSheet()->setCellValue('K1', 'CANASTAS BANCO DE TRANSFERENCIA');
    $objPHPExcel->getActiveSheet()->setCellValue('L1', 'CANASTAS CLABE DE TRANSFERENCIA');

    $objPHPExcel->getActiveSheet()->setCellValue('M1', 'BENEFICIARIO DE TRANSFERENCIA');
    $objPHPExcel->getActiveSheet()->setCellValue('N1', 'BANCO DE TRANSFERENCIA');
    $objPHPExcel->getActiveSheet()->setCellValue('O1', 'CLABE DE TRANSFERENCIA');
    $objPHPExcel->getActiveSheet()->setCellValue('P1', 'BENEFICIARIO DE PAGO EN ESTABLECIMIENTO');
    $objPHPExcel->getActiveSheet()->setCellValue('Q1', 'BANCO DE PAGO EN ESTABLECIMIENTO');
    $objPHPExcel->getActiveSheet()->setCellValue('R1', 'NO. CTA. DE PAGO EN ESTABLECIMIENTO');
    $objPHPExcel->getActiveSheet()->setCellValue('S1', 'NO. TARJETA DE PAGO EN ESTABLECIMIENTO');
    */
    

    while($row = mysqli_fetch_array($resultado)){

        if($row['openpay_sandboxmode']==1){
            $openpay_sandboxmode='Si';
        }else{
            $openpay_sandboxmode='No';
        }
        
        
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row['nombre_empresa']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $row['nombre_corto_empresa']);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $row['rfc_empresa']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $row['telefono_empresa']);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $row['email_empresa']);
        //$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $row['paypal_clientid']);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $row['openpay_merchantid']);
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $row['openpay_llaveprivada']);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $row['openpay_llavepublica']);
        $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $openpay_sandboxmode);

        /*
        $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, $row['canastas_transferencia_beneficiario']);
        $objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, $row['canastas_transferencia_banco']);
        $objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, $row['canastas_transferencia_clabe']);

        $objPHPExcel->getActiveSheet()->setCellValue('M'.$fila, $row['transferencia_beneficiario']);
        $objPHPExcel->getActiveSheet()->setCellValue('N'.$fila, $row['transferencia_banco']);
        $objPHPExcel->getActiveSheet()->setCellValue('O'.$fila, $row['transferencia_clabe']);
        $objPHPExcel->getActiveSheet()->setCellValue('P'.$fila, $row['establecimiento_beneficiario']);
        $objPHPExcel->getActiveSheet()->setCellValue('Q'.$fila, $row['establecimiento_banco']);
        $objPHPExcel->getActiveSheet()->setCellValue('R'.$fila, $row['establecimiento_nocta']);
        $objPHPExcel->getActiveSheet()->setCellValue('S'.$fila, $row['establecimiento_notarjeta']);
        */
        
        $fila++;

    }

    header("Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment;filename="Reporte_Empresas.xlsx"');
    header('Cache-Control: max-age=0');

    $objWriter = new Xlsx($objPHPExcel);
    $objWriter->save('php://output');


?>