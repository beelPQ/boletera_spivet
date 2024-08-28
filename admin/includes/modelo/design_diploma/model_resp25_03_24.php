<?php
    // require_once 'dompdf/autoload.inc.php';
    // use Dompdf\Dompdf;
    // use Dompdf\Options;

    
    
    require_once '/admin/includes/modelo/design_diploma/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    use Dompdf\Options;
    

    if($_POST){
        
         // Crea una instancia de DOMPDF con las opciones de configuración
         
        $options = new Options();
        $options->set('isPhpEnabled', true); // Habilita la interpretación de PHP dentro del HTML
        $options->set('defaultFont', 'Arial'); // Establece la fuente predeterminada

        // Configura los márgenes de página a cero
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('chroot', realpath('.')); // Establece la raíz del directorio
        $options->set('defaultPaperSize', 'A4'); // Establece el tamaño de papel predeterminado
        $options->set('defaultPaperOrientation', 'landscape'); // Establece la orientación de la página predeterminada
        $options->set('isPhpEnabled', true); // Habilita la interpretación de PHP dentro del HTML
        $options->set('isHtml5ParserEnabled', true); // Habilita el parser HTML5
        $options->set('debugKeepTemp', true); // Habilita el modo de depuración
        $dompdf = new Dompdf($options);

        // Establecer el tamaño del papel como tamaño carta
        $dompdf->setPaper('letter', 'landscape');
        $image = $_POST["imagen"];
        // Texto que deseas reemplazar
        $textoAntiguo = 'Nombre completo del participante';
        // Nuevo texto
        $textoNuevo = 'Cesar Osgual Velazquez Alvarez';

        // Reemplazar el texto antiguo por el nuevo texto en la estructura HTML
        $html = str_replace($textoAntiguo, $textoNuevo, $image);

        

        // Cargar la estructura HTML del diseño
        $htmlData = '
        
        <!DOCTYPE html>
        <html lang="en">
        <style>
        @page {
            margin: 0;
        }
        .draggable {
            text-align: center;
            width: auto;
            max-width: 200px;
            min-height: 30px; 
            background-color: green;
            color: white;
            border-radius: 0.75em;
            padding: 4%;
            touch-action: none;
            user-select: none;
        }
        .content-diploma{ 
            margin-left:1.5px;
            width: 27.8cm; 
            height: 21.5cm; 
            // border: solid 1px #000;
            background-image: url("background_belm.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .content-diploma .element-tag{
            padding: 5px; 
            height: 30px;
            // border: 1px dotted black;
            font-size: 20px;
            text-align: center;
            font-weight: bold;
        }
        .content-diploma .tag-name{
            width: 350px;
        }
        .content-diploma .tag-date{
            width: 100px; 
        }
        .content-diploma .tag-credit{
            width: 300px; 
        }
        


        .btn-print{
            width: 140px;
            height: 38px;
            background: #000;
            color: #fff;
            cursor: pointer;
        }
        </style>
        <body>
            '.$html.' 
        </body>
        </html>
        ';



        $dompdf->loadHtml($htmlData);

        // Renderizar la estructura HTML
        $dompdf->render();

        // Salida del PDF al navegador
        //$dompdf->stream('design.pdf');

                // Guardar el PDF en la raíz del servidor
        $pdfOutput = $dompdf->output();
        file_put_contents('design.pdf', $pdfOutput);

        // Devolver la ruta del PDF almacenado
        //echo 'design.pdf';
        $respose = [
            "status" => true,
            "nameDocto" => "design.pdf"    
        ];

        echo json_encode($respose);
        
    }

?>