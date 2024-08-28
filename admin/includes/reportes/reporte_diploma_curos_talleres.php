<?php

    require '../../tools/PHPSpreadSheet/vendor/autoload.php';
    require '../../php/conexion.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $metodoGet = $_GET;
    $queDescargar = preg_split('/(:|,)/', $metodoGet['id']);
    
    $mysqli = conectar();
    
    if($queDescargar[0] === '0'){
        
        $query = "SELECT catPro.idsystemcatpro, catPro.catalogo_productos_sku, 
            catCategProd.categorias_programas_nombre, catPro.catalogo_productos_nombre, 
            catPro.catalogo_productos_fechainicio, catPro.catalogo_productos_fechafin,catPro.catalogo_productos_preciomx,catPro.catalogo_productos_preciomx_descuento, catPro.descuentos_idsystemdescuento,
            catPro.catalogo_productos_publicado,catPro.catalogo_productos_duracion,catPro.catalogo_productos_descripcioncorta,catPro.catalogo_productos_incluye,
            cpm.modalidad_nombre
            FROM catalogo_productos AS catPro
            LEFT JOIN catalogo_categorias_programas AS catCategProd ON (catPro.categorias_programasonline_idsystemcatproon = catCategProd.idsystemcatproon)
            LEFT JOIN catalogo_producto_modalidad AS cpm ON (catPro.producto_modalidad_idsystemprodmod = cpm.idsystemprodmod)
            ORDER BY catPro.catalogo_productos_sku ASC";
        
    }else{
        $condicion='';
        $c=0;
        for($i = 0; $i<count($queDescargar); $i=$i+2){
            if($c>0){
                $condicion.=' OR ';
            }
            $condicion.='catPro.idsystemcatpro='.$queDescargar[($i+1)];
            $c++;
        }

        $query = "SELECT catPro.idsystemcatpro, catPro.catalogo_productos_sku, 
            catCategProd.categorias_programas_nombre, catPro.catalogo_productos_nombre, 
            catPro.catalogo_productos_fechainicio, catPro.catalogo_productos_fechafin,catPro.catalogo_productos_preciomx,catPro.catalogo_productos_preciomx_descuento, catPro.descuentos_idsystemdescuento,
            catPro.catalogo_productos_publicado,catPro.catalogo_productos_duracion,catPro.catalogo_productos_descripcioncorta,catPro.catalogo_productos_incluye,
            cpm.modalidad_nombre
            FROM catalogo_productos AS catPro
            LEFT JOIN catalogo_categorias_programas AS catCategProd ON (catPro.categorias_programasonline_idsystemcatproon = catCategProd.idsystemcatproon)
            LEFT JOIN catalogo_producto_modalidad AS cpm ON (catPro.producto_modalidad_idsystemprodmod = cpm.idsystemprodmod)
            WHERE ".$condicion."
            ORDER BY catPro.catalogo_productos_sku ASC";
        
    }
    
    
    $resultado = $mysqli->query($query);
    //VARIABLE EN QUE FILA INICIAREMOS A ESCRIBIR
    $fila = 2;

    //OBJETO
    $objPHPExcel = new Spreadsheet();
    $objPHPExcel->getProperties()->setCreator("")->setDescription("Reporte de cursos-talleres");
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle("CURSOS-TALLERES");
    
    
    
   // $objPHPExcel->getActiveSheet()->setCellValue('A1', 'SKU');
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'NOMBRE');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'MODALIDAD');
    //$objPHPExcel->getActiveSheet()->setCellValue('C1', 'TIPO');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'FECHA INICIO');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'FECHA FIN');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', 'COSTO');
    $objPHPExcel->getActiveSheet()->setCellValue('F1', 'DURACIÓN');
    $objPHPExcel->getActiveSheet()->setCellValue('G1', 'DESCRIPCIÓN CORTA');
    $objPHPExcel->getActiveSheet()->setCellValue('H1', 'OBJETIVO DEL CURSO');


    /*
    $objPHPExcel->getActiveSheet()->setCellValue('G1', 'TIPO DESCUENTO');
    $objPHPExcel->getActiveSheet()->setCellValue('H1', 'CANTIDAD DESCUENTO');
    $objPHPExcel->getActiveSheet()->setCellValue('I1', 'DESCUENTO VALIDO DESDE');
    $objPHPExcel->getActiveSheet()->setCellValue('J1', 'DESCUENTO VALIDO HASTA');
    $objPHPExcel->getActiveSheet()->setCellValue('K1', 'ESTADO DESCUENTO');
    $objPHPExcel->getActiveSheet()->setCellValue('L1', 'PRECIO DESCUENTO');
    */
    $objPHPExcel->getActiveSheet()->setCellValue('I1', 'PUBLICADO');
    
    
    
    while($row = mysqli_fetch_array($resultado)){
        
        if( $row['catalogo_productos_publicado'] == 1){ $disponible='Sí'; }else{ $disponible='No'; }

        /*
        if($row['descuentos_idsystemdescuento']!='' && is_null($row['descuentos_idsystemdescuento'])==false){
            
            $query = " SELECT * FROM catalogo_descuentos WHERE idsystemdescuento=".$row['descuentos_idsystemdescuento'];
            $resultado2 = $mysqli->query($query);
            $descuento = mysqli_fetch_array($resultado2);
            
            $tipoDesc = $descuento['descuento_formato'];

            if($descuento['descuento_formato']=='Porcentaje'){

                $cantidadDesc = $descuento['descuento_cantidad'].'%';

            }else if($descuento['descuento_formato']=='Dinero'){

                $cantidadDesc = number_format($descuento['descuento_cantidad'],2);
                
            }

            $fechaiDesc = date('d/m/Y H:i:s',strtotime($descuento['descuento_valido_desde']));
            $fechafDesc = date('d/m/Y H:i:s',strtotime($descuento['descuento_valido_hasta']));

            if($descuento['descuento_estatus']==1){
                $estadoDesc='Activado';
            }else{
                $estadoDesc='Desactivado';
            }

            $precioDesc = $row['catalogo_productos_preciomx_descuento'];
           
            unset($descuento);

        }else{
            $tipoDesc = '';
            $cantidadDesc = '';
            $fechaiDesc = '';
            $fechafDesc = '';
            $estadoDesc = '';
            $precioDesc = '';
        }
        */
        
        //$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row['catalogo_productos_sku']);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row['catalogo_productos_nombre']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $row['modalidad_nombre']);

        //$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $row['categorias_programas_nombre']);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, date('d/m/Y',strtotime($row['catalogo_productos_fechainicio'])));
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, date('d/m/Y',strtotime($row['catalogo_productos_fechafin'])));
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, number_format($row['catalogo_productos_preciomx'],2));

        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $row['catalogo_productos_duracion']);
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $row['catalogo_productos_descripcioncorta']);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $row['catalogo_productos_incluye']);
       

        /*
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $tipoDesc);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $cantidadDesc);
        $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $fechaiDesc);
        $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, $fechafDesc);
        $objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, $estadoDesc);
        $objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, $precioDesc);
        */
        $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $disponible);
        
         
        $fila++;

       
    }

    $mysqli->close();

    header("Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment;filename="Cursos-Talleres.xlsx"');
    header('Cache-Control: max-age=0');

    $objWriter = new Xlsx($objPHPExcel);
    $objWriter->save('php://output');
?>