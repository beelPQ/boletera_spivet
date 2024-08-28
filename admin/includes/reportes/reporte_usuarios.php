<?php

    require '../../tools/PHPSpreadSheet/vendor/autoload.php';
    require '../../php/conexion.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $metodoGet = $_GET;
    $queDescargar = preg_split('/(:|,)/', $metodoGet['id']);

    $mysqli = conectar();

    if($queDescargar[0] === '0'){
        
        $query = "SELECT * FROM logueo ORDER BY id_logueo DESC";
        
    }else{
        $condicion='';
        $c=0;
        for($i = 0; $i<count($queDescargar); $i=$i+2){
            if($c>0){
                $condicion.=" OR ";
            }
            $condicion.="id_logueo=".$queDescargar[($i+1)];
            $c++;
        }
        
        $query = "SELECT * FROM logueo WHERE ".$condicion." ORDER BY id_logueo DESC";
        
    }

    $resultado = $mysqli->query($query);
    //VARIABLE EN QUE FILA INICIAREMOS A ESCRIBIR
    $fila = 2;

    //OBJETO
    $objPHPExcel = new Spreadsheet();
    $objPHPExcel->getProperties()->setCreator("")->setDescription("Reporte de usuarios");
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle("Usuarios");
    
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'ID');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'EMAIL');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'USUARIO');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'CONTRASEÑA');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', 'ROL');
    

    while($row = mysqli_fetch_array($resultado)){
        
        $query = $mysqli->prepare(" SELECT tipo FROM logueoroles WHERE IDsystemlogueorol = ?");
        $query -> bind_param('i',$row['logueoroles_IDsystemlogueorol']);
        $query -> execute();
        $query -> bind_result($tipo_usuario);
        $query -> fetch();
        $query -> close();
        
        
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row['id_logueo']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $row['email_logueo']);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $row['username_logueo']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, '●●●●');
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $tipo_usuario);
        
        $fila++;

        unset($tipo_usuario);

    }

    $mysqli -> close();

    header("Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment;filename="Reporte_Usuarios.xlsx"');
    header('Cache-Control: max-age=0');

    $objWriter = new Xlsx($objPHPExcel);
    $objWriter->save('php://output');
    
     

?>