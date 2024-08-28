<?php


    require '../../tools/PHPSpreadSheet/vendor/autoload.php';
    require '../../php/conexion.php';
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


    $metodoGet = $_GET;
    $queDescargar = preg_split('/(:|,)/', $metodoGet['id']);

    $mysqli = conectar();
    
    if($queDescargar[0] === '0'){
        
        $query = "SELECT * FROM catalogo_clientes ORDER BY idsystemcli DESC";
        
    }else{
        $condicion='';
        $c=0;
        for($i = 0; $i<count($queDescargar); $i=$i+2){
            if($c>0){
                $condicion.=" OR ";
            }
            $condicion.="idsystemcli=".$queDescargar[($i+1)];
            $c++;
        }
        
        $query = "SELECT * FROM catalogo_clientes WHERE ".$condicion." ORDER BY idsystemcli DESC";
        
    }
    
    $resultado = $mysqli->query($query);
    //VARIABLE EN QUE FILA INICIAREMOS A ESCRIBIR
    $fila = 2;

    //OBJETO
    $objPHPExcel = new Spreadsheet();
    $objPHPExcel->getProperties()->setCreator("")->setDescription("Reporte de clientes");
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle("CLIENTES");
    
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'ID SOLICITUD');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'NOMBRE');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'APELLIDO PRIMARIO');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'APELLIDO SECUNDARIO');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', 'EMAIL');
    $objPHPExcel->getActiveSheet()->setCellValue('F1', 'TELÉFONO');
    $objPHPExcel->getActiveSheet()->setCellValue('G1', 'CÓDIGO POSTAL');
    $objPHPExcel->getActiveSheet()->setCellValue('H1', 'ESTADO');
    $objPHPExcel->getActiveSheet()->setCellValue('I1', 'MUNICIPIO');
    $objPHPExcel->getActiveSheet()->setCellValue('J1', 'FECHA SOLICITUD');
    

    while($row = mysqli_fetch_array($resultado)){
        
        $query = $mysqli->prepare(" SELECT m.municipio,e.estado
                                        FROM municipios AS m
                                        INNER JOIN estados_municipios AS em ON m.id=em.municipios_id
                                        INNER JOIN estados AS e ON e.id=em.estados_id
                                        WHERE m.id = ?");
            $query -> bind_param('i',$row['id_municipio']);
            $query -> execute();
            $query -> bind_result($municipio,$estado);
            $query -> fetch();
            $query -> close();

            

        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row['clientes_idsolicitud']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $row['clientes_nombre']);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $row['clientes_apellido1']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $row['clientes_apellido2']);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $row['clientes_email']);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $row['clientes_telefono']);
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $row['clientes_codigopostal']);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $estado);
        $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $municipio);
        $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, date('d/m/Y H:i:s',strtotime($row['clientes_fechacreacion'])) );
       
        $fila++;


        unset($estado);
        unset($municipio);

    }


    $mysqli -> close();

    header("Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment;filename="Reporte_Clientes.xlsx"');
    header('Cache-Control: max-age=0');

    $objWriter = new Xlsx($objPHPExcel);
    $objWriter->save('php://output');


?>