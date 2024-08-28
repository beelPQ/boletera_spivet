<?php


    require '../../tools/PHPSpreadSheet/vendor/autoload.php';
    require '../../php/conexion.php';
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


    $metodoGet = $_GET;
    $queDescargar = preg_split('/(:|,)/', $metodoGet['id']);

    $mysqli = conectar();
    
    if($queDescargar[0] === '0'){
        
        $query = "SELECT * FROM services ORDER BY id_service DESC";
        
    }else{
        $condicion='';
        $c=0;
        for($i = 0; $i<count($queDescargar); $i=$i+2){
            if($c>0){
                $condicion.=' OR ';
            }
            $condicion.='id_service='.$queDescargar[($i+1)];
            $c++;
        }
        
        $query = "SELECT * FROM services WHERE ".$condicion.' ORDER BY id_service DESC';
        
    }
    
    $resultado = $mysqli->query($query);
    //VARIABLE EN QUE FILA INICIAREMOS A ESCRIBIR
    $fila = 2;

    //OBJETO
    $objPHPExcel = new Spreadsheet();
    $objPHPExcel->getProperties()->setCreator("")->setDescription("Reporte de servicios");
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle("SERVICIOS");
    
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'NOMBRE');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'CATEGORÍA');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'DESCRIPCIÓN');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'IMAGEN');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', 'APARECER EN HOME');
    $objPHPExcel->getActiveSheet()->setCellValue('F1', 'ORDEN');
    $objPHPExcel->getActiveSheet()->setCellValue('G1', 'PUBLICADO');
    

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


        if( is_null($row['image_service'])==false && $row['image_service']!=''){
            $imagen = $row['image_service'];
        }else{
            $imagen = 'Sin imagen';
        }


        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row['service_name']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $categoria);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $row['service_description']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $imagen);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $inHome);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $row['order_public']);
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $publish);
       
       
        $fila++;


        unset($categoria);
        unset($inHome);
        unset($publish);
        unset($imagen);

    }


    $mysqli -> close();

    header("Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment;filename="Reporte_Servicios.xlsx"');
    header('Cache-Control: max-age=0');

    $objWriter = new Xlsx($objPHPExcel);
    $objWriter->save('php://output');


?>