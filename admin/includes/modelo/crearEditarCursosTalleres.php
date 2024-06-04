<?php

$method = '';
$id = 0;
$sku = '';
$category = 0;
$checkDescto = '';
$dateNoteBlog = '';
$duration = '';
$editorCorta = '';
$editorEsquema = '';
$editorIncluye = '';
$editorLarga = '';
$finalEndDate = '';
$finalStartDate = '';
$isPublished = 0;
$linkCourseWorks = '';
$linkNoteBlog = '';
$modality = 0;
$nameCourseWorks = '';
$nameFacilitador = '';
$nameFacilitadorNoteBlog = '';
$nameNoteBlog = '';
$oneDay = '';
$oneHour = '';
$oneMinute = '';
$oneMonth = '';
$oneYear = '';
$positionFacilitador = '';
$preciomx = 0;
$idDescto = 0;
$preciomxDescto = 0;
$quantityDescto = 0;
$statusDescto = 0;
$twoDay = '';
$twoHour = '';
$twoMinute = '';
$twoMonth = '';
$twoYear = '';
$typeDescto = '';

$thumsHead = '';
$thumsMini = '';
$profile = '';
$thumgBlog = '';

$stock = 0;

$direction = '';
$location = '';
$notes = '';
$linkConnection = '';

$whatsFacilitador = '';
$telFacilitador = '';
$emailFacilitador = '';

$typeTagImage = '';

//Verificamos el tipo de método para crear o actualizar datos
if( isset($_POST['methodUsed']) ) { $method = $_POST['methodUsed']; }

if( $method != '') {
    try {

        if( isset($_POST['id']) ) { $id = $_POST['id']; }
        if( isset($_POST['sku']) ) { $sku = $_POST['sku']; }
        if( isset($_POST['idDescto']) ) { $idDescto = $_POST['idDescto']; }
        if( isset($_POST['category']) ) { $category = $_POST['category']; }
        if( isset($_POST['checkDescto']) ) { $checkDescto = $_POST['checkDescto']; }
        if( isset($_POST['dateNoteBlog']) ) { $dateNoteBlog = $_POST['dateNoteBlog']; }
       
        if( isset($_POST['duration']) ) { $duration = $_POST['duration']; }
        if( isset($_POST['editorCorta']) ) { $editorCorta = $_POST['editorCorta']; }
        if( isset($_POST['editorEsquema']) ) { $editorEsquema = $_POST['editorEsquema']; }
        if( isset($_POST['editorIncluye']) ) { $editorIncluye = $_POST['editorIncluye']; }
        if( isset($_POST['editorLarga']) ) { $editorLarga = $_POST['editorLarga']; }
        
        if( isset($_POST['finalEndDate']) ) { $finalEndDate = $_POST['finalEndDate']; }
        if( isset($_POST['finalStartDate']) ) { $finalStartDate = $_POST['finalStartDate']; }
        if( isset($_POST['isPublished']) ) { $isPublished = $_POST['isPublished']; }
        if( isset($_POST['linkCourseWorks']) ) { $linkCourseWorks = $_POST['linkCourseWorks']; }
        if( isset($_POST['linkNoteBlog']) ) { $linkNoteBlog = $_POST['linkNoteBlog']; }
        if( isset($_POST['modality']) ) { $modality = $_POST['modality']; }
        
        if( isset($_POST['nameCourseWorks']) ) { $nameCourseWorks = $_POST['nameCourseWorks']; }
        if( isset($_POST['nameFacilitador']) ) { $nameFacilitador = $_POST['nameFacilitador']; }
        if( isset($_POST['nameFacilitadorNoteBlog']) ) { $nameFacilitadorNoteBlog = $_POST['nameFacilitadorNoteBlog']; }
        if( isset($_POST['nameNoteBlog']) ) { $nameNoteBlog = $_POST['nameNoteBlog']; }
        if( isset($_POST['oneDay']) ) { $oneDay = $_POST['oneDay']; }
        
        if( isset($_POST['oneHour']) ) { $oneHour = $_POST['oneHour']; }
        if( isset($_POST['oneMinute']) ) { $oneMinute = $_POST['oneMinute']; }
        if( isset($_POST['oneMonth']) ) { $oneMonth = $_POST['oneMonth']; }
        if( isset($_POST['oneYear']) ) { $oneYear = $_POST['oneYear']; }
        if( isset($_POST['positionFacilitador']) ) { $positionFacilitador = $_POST['positionFacilitador']; }
        if( isset($_POST['preciomx']) ) { $preciomx = $_POST['preciomx']; }
        
        if( isset($_POST['preciomxDescto']) ) { $preciomxDescto = $_POST['preciomxDescto']; }
        if( isset($_POST['quantityDescto']) ) { $quantityDescto = $_POST['quantityDescto']; }
        if( isset($_POST['statusDescto']) ) { $statusDescto = $_POST['statusDescto']; }
        if( isset($_POST['twoDay']) ) { $twoDay = $_POST['twoDay']; }
        if( isset($_POST['twoHour']) ) { $twoHour = $_POST['twoHour']; }
       
        if( isset($_POST['twoMinute']) ) { $twoMinute = $_POST['twoMinute']; }
        if( isset($_POST['twoMonth']) ) { $twoMonth = $_POST['twoMonth']; }
        if( isset($_POST['twoYear']) ) { $twoYear = $_POST['twoYear']; }
        if( isset($_POST['typeDescto']) ) { $typeDescto = $_POST['typeDescto']; }
        
        if( isset($_POST['stock']) ) { $stock = $_POST['stock']; }
        
    
        if( isset($_POST['thumsHead']) && count($_POST['thumsHead']) > 0 ) { $thumsHead = $_POST['thumsHead']; }
        // if( isset($_POST['thumsHead']) && $_POST['thumsHead'] != '' ) { $thumsHead = $_POST['thumsHead']; }
        if( isset($_POST['thumsMini']) && count($_POST['thumsMini']) > 0 ) { $thumsMini = $_POST['thumsMini']; }
        // if( isset($_POST['thumsMini']) && $_POST['thumsMini'] != '' ) { $thumsMini = $_POST['thumsMini']; }
        // if( isset($_POST['profile']) && count($_POST['profile']) > 0 ) { $profile = $_POST['profile']; }
        if( isset($_POST['profile']) ) {
            if( $_POST['profile'] != '' && $_POST['profile'] != null ) { $profile = $_POST['profile'];  }
        }
        
        //se comentaron estas validaciones ya que el count marca error  
        /* if( isset($_POST['thumgBlog']) && count($_POST['thumgBlog']) > 0 ) { 
            $thumgBlog = $_POST['thumgBlog'];
         } */
        /* if( isset($_POST['thumgBlog']) ) {
            //if( $_POST['thumgBlog'] != '' && $_POST['thumgBlog'] != null ) { $thumgBlog = $_POST['thumgBlog']; }
            $thumgBlog = $_POST['thumgBlog'];
        } */
        if( isset($_POST['thumgBlog']) && $_POST['thumgBlog'] !== "" ) {  $thumgBlog = $_POST['thumgBlog']; }
        //echo $_POST['thumgBlog'];
        /* echo "llega asta aqui";
        die(); */
        if( isset($_POST['existImageHead']) ) { $existImageHead = $_POST['existImageHead']; }
        if( isset($_POST['existImageBlog']) ) { $existImageBlog = $_POST['existImageBlog']; }
        if( isset($_POST['existImageProfil']) ) { $existImageProfil = $_POST['existImageProfil']; }
        if( isset($_POST['existImageThumd']) ) { $existImageThumd = $_POST['existImageThumd']; }
        
        if( isset($_POST['direction'])){
            $direction = $_POST['direction'];
        } 
        if( isset($_POST['location']) ){
            $location = $_POST['location'];
        }
        if( isset($_POST['notes']) ){
            $notes = $_POST['notes'];
        }
        if( isset($_POST['linkconection']) ){
            $linkConnection = $_POST['linkconection'];
        }

        if( isset($_POST['whatsFacilitador']) ){
            $whatsFacilitador = $_POST['whatsFacilitador'];
        }
        if( isset($_POST['telFacilitador']) ){
            $telFacilitador = $_POST['telFacilitador'];
        }
        if( isset($_POST['emailFacilitador']) ){
            $emailFacilitador = $_POST['emailFacilitador'];
        }
        
        if( isset($_POST["typeTagImage"]) ){
            $typeTagImage = $_POST["typeTagImage"];
        }


        $dataPost = [
            "id" => $id, 
            "sku" => $sku, 
            "idDescto" => $idDescto, 
            "category" => $category, 
            "checkDescto" => $checkDescto, 
            "dateNoteBlog" => $dateNoteBlog, 
            "duration" => $duration, 
            "editorCorta" => $editorCorta, 
            "editorEsquema" => $editorEsquema, 
            "editorIncluye" => $editorIncluye, 
            "editorLarga" => $editorLarga, 
            "finalEndDate" => $finalEndDate, 
            "finalStartDate" => $finalStartDate, 
            "isPublished" => $isPublished, 
            "linkCourseWorks" => $linkCourseWorks, 
            "linkNoteBlog" => $linkNoteBlog, 
            "modality" => $modality, 
            "nameCourseWorks" => $nameCourseWorks, 
            "nameFacilitador" => $nameFacilitador, 
            "nameFacilitadorNoteBlog" => $nameFacilitadorNoteBlog, 
            "nameNoteBlog" => $nameNoteBlog, 
            "oneDay" => $oneDay, 
            "oneHour" => $oneHour, 
            "oneMinute" => $oneMinute, 
            "oneMonth" => $oneMonth, 
            "oneYear" => $oneYear, 
            "positionFacilitador" => $positionFacilitador, 
            "preciomx" => $preciomx, 
            "preciomxDescto" => $preciomxDescto, 
            "quantityDescto" => $quantityDescto, 
            "statusDescto" => $statusDescto, 
            "twoDay" => $twoDay, 
            "twoHour" => $twoHour, 
            "twoMinute" => $twoMinute, 
            "twoMonth" => $twoMonth, 
            "twoYear" => $twoYear, 
            "typeDescto" => $typeDescto,
            "stock" => $stock,
    
            "thumsHead" => $thumsHead,
            "thumsMini" => $thumsMini,
            "profile" => $profile,
            "thumgBlog" => $thumgBlog,

            "existThumsHead" => $existImageHead,
            "existThumsMini" => $existImageThumd,
            "existProfile" => $existImageProfil,
            "existThumgBlog" => $existImageBlog,

            "direction" => $direction,
            "location" => $location,
            "notes" => $notes,
            "linkConnection" => $linkConnection,

            "whatsFacilitador" => $whatsFacilitador,
            "telFacilitador" => $telFacilitador,
            "emailFacilitador" => $emailFacilitador,
            "typeTagImage" => $typeTagImage
        ];
       
    
        $response = array();
        $response = processData($method, $dataPost);
        /*
         $response = [
            'status' => false,
            'message' => '???99119'
        ];
        */
        

        /*
        $response = [
            'status' => false,
            'message' => '???',
            'description' => $dataPost
        ];
        */
    
        // if( $method == 'create' ) {
        //     $response = create($dataPost);
        // }
        // if( $method == 'update' ) {
        //     $response = update($dataPost);
        // }
        
    
        // $response = [
        //     'status' => true,
        //     'message' => 'REvisando',
        //     'description' => $dataPost
        // ];
            
        echo json_encode($response);
    }
    catch (Exception $e) {
        $result = [
            'status' => false,
            'message' => 'Error encontrado',
            'description' => $e->getMessage()
        ];
        echo json_encode($result);
    }

}
else {
    $response = [
        'status' => false,
        'message' => 'No se encontraron datos para almacenar'
    ];
    // return $response;
    echo json_encode($response);
}

function processData($method, $data)
{
    $response = array();

    $id = $data['id'];
    $sku = $data['sku'];
    $idDescto = $data['idDescto'];
    $isPublished = $data['isPublished'];
    $categoria = $data['category'];
    $modalidad = $data['modality'];
    $nombre = $data['nameCourseWorks'];
    $duracion = $data['duration'];
    $descripcionCorta = $data['editorCorta'];
    $descripcionLarga = $data['editorLarga'];
    $descripcionEsquema = $data['editorEsquema'];
    $descripcionInclude = $data['editorIncluye'];
    $linkShare = $data['linkCourseWorks'];
    $nameFacilitador = $data['nameFacilitador'];
    $positionFacilitador = $data['positionFacilitador'];
    $nameNoteBlog = $data['nameNoteBlog'];
    $nameFacilitadorNoteBlog = $data['nameFacilitadorNoteBlog'];
    $linkNoteBlog = $data['linkNoteBlog'];

    
    $explodeStarDate = explode('-', $data['finalStartDate']);
    $inDay = 0; $inMonth = 0; $inYear = 0;
    $inDay = $explodeStarDate[2];
    $inMonth = $explodeStarDate[1];
    $inMonth = (int) $inMonth + 1;
    $inYear = $explodeStarDate[0];
    $finalStartDate = "$inYear-$inMonth-$inDay";

    $explodeEndDate = explode('-', $data['finalEndDate']);
    $endDay = 0; $endMonth = 0; $endYear = 0;
    $endDay = $explodeEndDate[2];
    $endMonth = $explodeEndDate[1];
    $endMonth = (int) $endMonth + 1;
    $endYear = $explodeEndDate[0];
    $finalEndDate = "$endYear-$endMonth-$endDay";

    $dateNoteBlog = $data['dateNoteBlog'];
    $dateNoteBlog = $data['dateNoteBlog'];
    $imagesHeader = $data['thumsHead'];
    $imagesMini = $data['thumsMini'];
    $imageProfile = $data['profile'];
    $imageBlog = $data['thumgBlog'];
    
    $stock = $data['stock'];


    $precio = '';
    if( $data['preciomx'] != '') { $precio = filter_var($data['preciomx'], FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION); }
    $preciomxDescto = '';
    if( $data['preciomxDescto'] != '' ) { $preciomxDescto = filter_var($data['preciomxDescto'], FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION); }


    $dataPost = array();
    $dataDesctos = array();

    /*
    $response = [
            'status' => false,
            'message' => '???999'
        ];
        return $response;
        */

    if($data['checkDescto'] == '1' ){
        
        $cantidad1 = '';
        $descuento_inicio = '1969-01-01'; $descuento_hora_inicio = '00:00:00';
        $descuento_fin = '1969-01-01'; $descuento_hora_fin = '00:00:00';
        $fecha_descuento_inicio = ''; $fecha_descuento_fin = '';

        
        if( $data['quantityDescto'] != '' ) { $cantidad1 = filter_var($data['quantityDescto'], FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION); }
        // $existencia = filter_var($existencia, FILTER_SANITIZE_NUMBER_INT);
        if( $data['oneDay'] != '' && $data['oneMonth'] != '' && $data['oneYear'] != '' ) {
            $descuento_inicio = $data['oneYear'].'-'.$data['oneMonth'].'-'.$data['oneDay'];    
        }

        if($data['oneHour'] != '' && $data['oneMinute'] != ''){
            $descuento_hora_inicio = $data['oneHour'].':'.$data['oneMinute'].':00';
        }

        if( $data['twoDay'] != '' && $data['twoMonth'] != '' && $data['twoYear'] != ''   ) {
            $descuento_fin = $data['twoYear'].'-'.$data['twoMonth'].'-'.$data['twoDay'];
            
        }
        
        if($data['twoHour'] != '' && $data['twoMinute'] != ''){
            $descuento_hora_fin = $data['twoHour'].':'.$data['twoMinute'].':00';
        }

        // $codigo_descuento = filter_var($codigo_descuento, FILTER_SANITIZE_STRING);

        //tipo de descuento, 1 es descuento de producto y 2 es descuento de compra
        $typeDesctoNum = 1; 

        $cantidad2 = 0;
        
        
        if( $descuento_inicio != '' && $descuento_hora_inicio != '' ){
            $fecha_descuento_inicio = $descuento_inicio.' '.$descuento_hora_inicio;
        }
        if( $descuento_fin != '' && $descuento_hora_fin != '' ){
            $fecha_descuento_fin = $descuento_fin.' '.$descuento_hora_fin;
        }


        $dataDesctos = [
            "typeDescto" => $typeDesctoNum,
            "formatDescto" => $data['typeDescto'],
            "quantityDescto" => $cantidad1,
            "validFrom" => $fecha_descuento_inicio,
            "validTo" => $fecha_descuento_fin,
            "status" => $data['statusDescto']
        ];
        

    }

    //{"whats":"1254875412", "tel":"3256895632","email":"correo@gmail.com"}
    $contact = new stdClass();
    $contact->whats = $data['whatsFacilitador'];
    $contact->tel = $data['telFacilitador'];
    $contact->email = $data['emailFacilitador'];

    $con = json_encode($contact);
    
    
    

    $dataPost = [
        "typePro" => 1,
        "idCompany" => 1,
        "category" => $categoria,
        "modality" => $modalidad,
        "idMdl" => 0,
        "idProspec" => 0,
        "nameCourseWors" => $nombre,
        "duration" => $duracion,
        "shortDescription" => $descripcionCorta,
        "longDescription" => $descripcionLarga,
        "esquemaDescription" => $descripcionEsquema,
        "includeDescription" => $descripcionInclude,
        "link" => $linkShare,
        "thumbFacilitador" => $imageProfile,
        "nameFacilitador" => $nameFacilitador,
        "positionFacilitador" => $positionFacilitador,
        "nameBlogNote" => $nameNoteBlog,
        "dateBlog" => $dateNoteBlog,
        "nameFacilitadorBlog" => $nameFacilitadorNoteBlog,
        "linkBlog" => $linkNoteBlog,
        "startDate" => $finalStartDate,
        "endDate" => $finalEndDate,
        "iva" => 0.16,
        "priceMxn" => $precio,
        "priceUsd" => 0,
        "priceMxnDescto" => $preciomxDescto,
        "priceUsdDescto" => 0,
        "fileFolleto" => '',
        "thumbsCours" => $imagesMini,
        "thumbsHeader" => $imagesHeader,
        "filePromotion" => '',
        "isPublish" => $isPublished,
        "id" => $id,
        "idDescto" => $idDescto,
        "checkDescto" => $data['checkDescto'],

        "sku" => $sku,
        
        "imageBlog" => $imageBlog,
        "stock" => $stock,

        "existThumsHead" => $data['existThumsHead'],
        "existThumsMini" => $data['existThumsMini'],
        "existProfile" => $data['existProfile'],
        "existThumgBlog" => $data['existThumgBlog'],

        "direction" => $data['direction'],
        "location" => $data['location'],
        "notes" => $data['notes'],
        "linkConnection" => $data['linkConnection'],
        "contacto" => $con,
        "typeTagImage" => $data['typeTagImage']

    ];
    
    if( $method == 'create' ) {
        $response = create($dataPost, $dataDesctos);
        
    }
    if( $method == 'update' ) {

        $response = update($dataPost, $dataDesctos);
    }

    if( $method == "deleteCertify"){

    }
    return $response;
}


function getFilenameType($pathFile) {

    $arrayPathFile = explode('/', $pathFile);
    $nameFile = $arrayPathFile[count($arrayPathFile)-1];
    $arrayNameFile = explode('_', $nameFile);
    $array2NameFile = explode('.', $arrayNameFile[1]);
    $nameNumberFile = $array2NameFile[0];

    return $nameNumberFile;

}


function update($dataPost, $dataDesctos)
{
    $result = array();
    try{
        //CREAMOS LA CONEXION A LA BASE DE DATOS
        require_once ('../../php/conexion.php');

        $mysqli = conectar();

        // $imagesCours = substr($imagesCours, 0, -1);
        $namesImagesHeader = '';
        if( $dataPost['thumbsHeader'] != ''  ) { 

            $newImages = saveImage( $dataPost['thumbsHeader'], $dataPost['sku'], 'banner' );
            
            if($dataPost['existThumsHead']!='' && is_null($dataPost['existThumsHead'])==false){

                $arrayExistingFiles = explode(',', $dataPost['existThumsHead']);
                $arrayNewFiles = explode(',', $newImages);
                $FinalarrayNewFiles = $arrayNewFiles;
                $currentIndex = count($FinalarrayNewFiles);

                for($i=0;$i<count($arrayExistingFiles);$i++){

                    if($arrayExistingFiles[$i]!=''){

                        $currentExistingFile = getFilenameType($arrayExistingFiles[$i]);

                        $hasPath = 0;
                        
                        for($j=0;$j<count($arrayNewFiles);$j++){

                            $currentNewFile = getFilenameType($arrayNewFiles[$j]);

                            if($currentExistingFile==$currentNewFile){

                                $hasPath = 1;
                                break;

                            }

                        }

                        if($hasPath==0){
                            //$namesImagesHeader.=$arrayExistingFiles[$i];
                            $FinalarrayNewFiles[$currentIndex] = $arrayExistingFiles[$i];
                            $currentIndex = $currentIndex + 1;
                        }

                    }

                }

                for($i=0;$i<count($FinalarrayNewFiles);$i++){
                    
                    if($FinalarrayNewFiles[$i]!='' && is_null($FinalarrayNewFiles[$i])==false){
                        $namesImagesHeader.= $FinalarrayNewFiles[$i].',';
                    }
                    
                }

            }else{
                $namesImagesHeader = $newImages;
            } 

        }
        else { $namesImagesHeader = $dataPost['existThumsHead']; }

        $imageProfile = '';
        if( $dataPost['thumbFacilitador'] != '' ) { $imageProfile = saveImage( $dataPost['thumbFacilitador'], $dataPost['sku'], 'profile'); }
        else { $imageProfile = $dataPost['existProfile']; }

        $imagesCours = '';
        if( $dataPost['thumbsCours'] != '' ) {

            $newImages = saveImage( $dataPost['thumbsCours'], $dataPost['sku'], 'thumbs'); 

            if($dataPost['existThumsMini']!='' && is_null($dataPost['existThumsMini'])==false){

                $arrayExistingFiles = explode(',', $dataPost['existThumsMini']);
                $arrayNewFiles = explode(',', $newImages);
                $FinalarrayNewFiles = $arrayNewFiles;
                $currentIndex = count($FinalarrayNewFiles);

                for($i=0;$i<count($arrayExistingFiles);$i++){

                    if($arrayExistingFiles[$i]!=''){

                        $currentExistingFile = getFilenameType($arrayExistingFiles[$i]);

                        $hasPath = 0;
                        
                        for($j=0;$j<count($arrayNewFiles);$j++){

                            $currentNewFile = getFilenameType($arrayNewFiles[$j]);

                            if($currentExistingFile==$currentNewFile){

                                $hasPath = 1;
                                break;

                            }

                        }

                        if($hasPath==0){
                           
                            $FinalarrayNewFiles[$currentIndex] = $arrayExistingFiles[$i];
                            $currentIndex = $currentIndex + 1;
                        }

                    }

                }

                for($i=0;$i<count($FinalarrayNewFiles);$i++){
                    
                    if($FinalarrayNewFiles[$i]!='' && is_null($FinalarrayNewFiles[$i])==false){
                        $imagesCours.= $FinalarrayNewFiles[$i].',';
                    }
                    
                }

            }else{
                $imagesCours = $newImages;
            }

        }
        else { $imagesCours = $dataPost['existThumsMini']; }

        $imagesBlog = '';
        if( $dataPost['imageBlog'] != '' ) { $imagesBlog = saveImage( $dataPost['imageBlog'], $dataPost['sku'], 'blog' ); }
        else { $imagesBlog = $dataPost['existThumgBlog']; }

        $querySql = "UPDATE `catalogo_productos` SET
            `catalogo_tipoproductos_idsystemtipopro`= ?,
            `empresa_idsystemEmpresa`= ?,
            `categorias_programasonline_idsystemcatproon`= ?,
            `producto_modalidad_idsystemprodmod`= ?,
            `catalogo_productos_idMdl`= ?,
            `catalogo_productos_idprospectus`= ?,
            `catalogo_productos_nombre`= ?,
            `catalogo_productos_duracion`= ?,
            `catalogo_productos_descripcioncorta`= ?,
            `catalogo_productos_descripcionlarga`= ?,
            `catalogo_productos_esquemacursos`= ?,
            `catalogo_productos_incluye`= ?,
            `catalogo_productos_link`= ?,
            `catalogo_productos_thumbfacilitador`= ?,
            `catalogo_productos_namefacilitador`= ?,
            `catalogo_productos_positionfacilitador`= ?,
            `catalogo_productos_nameBlogNote`= ?,
            `catalogo_productos_dateBlogNote`= ?,
            `catalogo_productos_nameFailitadorBlogNote`= ?,
            `catalogo_productos_linkBlogNote`= ?,
            `catalogo_productos_fechainicio`= ?,
            `catalogo_productos_fechafin`= ?,
            `catalogo_productos_iva`= ?,
            `catalogo_productos_preciomx`= ?,
            `catalogo_productos_preciousd`= ?,
            `catalogo_productos_preciomx_descuento`= ?,
            `catalogo_productos_preciousd_descuento`= ?,
            `catalogo_productos_file_folleto`= ?,
            `catalogo_productos_file_thumb`= ?,
            `catalogo_productos_thumb_encabezado`= ?,
            `catalogo_productos_file_promocion`= ?,
            `catalogo_productos_publicado` = ?,
            `catalogo_productos_stock` = ?,
            `presencial_direccion` = ?,
            `presencial_linklocation` = ?,
            `virtual_notas` = ?,
            `virtual_link` = ?,
            `contacto` = ?,
            `typeTagImage` = ?
        WHERE idsystemcatpro = ? ";
        $query = $mysqli->prepare($querySql);
        $query -> bind_param('iiiiiissssssssssssssssdddddssssiissssssi', 
            $dataPost['typePro'],
            $dataPost['idCompany'],
            $dataPost['category'],
            $dataPost['modality'],
            $dataPost['idMdl'],
            $dataPost['idProspec'],
            $dataPost['nameCourseWors'],
            $dataPost['duration'],
            $dataPost['shortDescription'],
            $dataPost['longDescription'],
            $dataPost['esquemaDescription'],
            $dataPost['includeDescription'],
            $dataPost['link'],
            $imageProfile,
            $dataPost['nameFacilitador'],
            $dataPost['positionFacilitador'],
            $dataPost['nameBlogNote'],
            $dataPost['dateBlog'],
            $dataPost['nameFacilitadorBlog'],
            $dataPost['linkBlog'],
            $dataPost['startDate'],
            $dataPost['endDate'],
            $dataPost['iva'],
            $dataPost['priceMxn'],
            $dataPost['priceUsd'],
            $dataPost['priceMxnDescto'],
            $dataPost['priceUsdDescto'],
            $dataPost['fileFolleto'],
            $imagesCours,
            $namesImagesHeader,
            $imagesBlog,
            $dataPost['isPublish'],
            $dataPost['stock'],
            $dataPost['direction'],
            $dataPost['location'],
            $dataPost['notes'],
            $dataPost['linkConnection'],
            $dataPost['contacto'],
            $dataPost['typeTagImage'],
            $dataPost['id']);
        $query -> execute();
        //$query -> fetch();

        $msjres = '';
        if( $query->affected_rows > 0){
            $msjres.='Datos actualizados correctamente<br>';
        }else{
            $msjres.='No hubo actualizaciones en los datos generales.<br>';
        }
        $query -> close();


        $query = $mysqli->prepare(" SELECT descuentos_idsystemdescuento FROM catalogo_productos WHERE idsystemcatpro = ?");
        $query -> bind_param('i',$dataPost['id']);
        $query -> execute();
        $query -> bind_result($iddescuento_actual);
        $query -> fetch();
        $query -> close();

        $iddescuento=NULL;
        $precioDescuento = 0;
        if( is_null($iddescuento_actual)==false && $iddescuento_actual!=''){

            $query = $mysqli->prepare(" UPDATE catalogo_productos SET descuentos_idsystemdescuento=?,catalogo_productos_preciomx_descuento=? WHERE idsystemcatpro = ? ");
            $query -> bind_param('idi', $iddescuento,$precioDescuento,$dataPost['id']);
            $query -> execute();
            //$query -> fetch();
            $query -> close();

            $query = $mysqli->prepare("DELETE FROM catalogo_descuentos WHERE idsystemdescuento = ?");
            $query -> bind_param('i',$iddescuento_actual);
            $query -> execute();
            //$query -> fetch();
            $query -> close();

        }

        if($dataPost['checkDescto'] == '1' ){

            //$mysqli2 = conectar();
            $insertSql = "INSERT INTO catalogo_descuentos (
                `descuento_tipo`,
                `descuento_formato`,
                `descuento_cantidad`,
                `descuento_valido_desde`,
                `descuento_valido_hasta`,
                `descuento_estatus` )
            VALUES (?,?,?,?,?,?)";
            $queryInsert = $mysqli->prepare($insertSql);
            $queryInsert->bind_param('isdssi', 
                $dataDesctos['typeDescto'],
                $dataDesctos['formatDescto'],
                $dataDesctos['quantityDescto'],
                $dataDesctos['validFrom'],
                $dataDesctos['validTo'],
                $dataDesctos['status']);

            $queryInsert->execute();
            //$queryInsert->fetch();

            if( $queryInsert->affected_rows > 0){

                $iddescuento = $queryInsert->insert_id;
                $queryInsert->close();

                
                $query = $mysqli -> prepare("UPDATE catalogo_productos SET descuentos_idsystemdescuento = ?, catalogo_productos_preciomx_descuento=? WHERE idsystemcatpro = ? ");
                $query -> bind_param('idi', $iddescuento, $dataPost['priceMxnDescto'],$dataPost['id']);
                $query -> execute();

                if($query->affected_rows>0){
                        
                    $query -> close();
                    $msjres.='Datos de descuento guardados correctamente.<br>';
                    
                }else{
                    $query -> close();
                    $msjres.='Los datos del descuento no pudieron ser guardados.<br>';
                    
                }

                
            }
            else {
                $queryInsert->close();
                $msjres.='Los datos del descuento no pudieron ser guardados.<br>';
               
            }

        }

        $result = [
            'status' => true,
            'message' =>  $msjres,
            'description' => ''
        ];
        return $result;
    }
    catch (Exception $e) {
        $result = [
            'status' => false,
            'message' => 'Error encontrado',
            'description' => $e->getMessage()
        ];
        return $result;
    } catch(PDOException $e) {
        $result = [
            'status' => false,
            'message' => 'Error encontrado',
            'description' => $e->getMessage()
        ];
        return $result;
    }

}


function create($dataPost, $dataDesctos) {
    $result = array();
    try{
        //CREAMOS LA CONEXION A LA BASE DE DATOS
        require_once ('../../php/conexion.php');

        $mysqli = conectar();


        $namesImagesHeader = '';
        if( $dataPost['thumbsHeader'] != ''  ) {
            $namesImagesHeader = saveImage( $dataPost['thumbsHeader'], $dataPost['sku'], 'banner' );
            // $namesImagesHeader = substr($namesImagesHeader, 0, -1); 
            
        }
        $imageProfile = '';
        if( $dataPost['thumbFacilitador'] != '' ) {
            $imageProfile = saveImage( $dataPost['thumbFacilitador'], $dataPost['sku'], 'profile');
            // $imageProfile = substr($imageProfile, 0, -1);
        }

        $imagesCours = '';
        if( $dataPost['thumbsCours'] != '' ) {
            $imagesCours = saveImage( $dataPost['thumbsCours'], $dataPost['sku'], 'thumbs');
            // $imagesCours = substr($imagesCours, 0, -1);
        }
        $imagesBlog = '';
        if( $dataPost['imageBlog'] != '' ) {
            $imagesBlog = saveImage( $dataPost['imageBlog'], $dataPost['sku'], 'blog' );
            // $imagesBlog = substr($imagesBlog, 0, -1);
        }

        /*
        $response = [
            'status' => false,
            'message' => '???5',
            'message2' => $namesImagesHeader,
            'message3' => $imageProfile,
            'message4' => $imagesCours,
            'message5' => $imagesBlog
            //'description' => $dataPost
        ];
        return $response;
        */
        
        //$nameHeader = explode(",",$namesImagesHeader);
        $precioDescuento = 0;

        $querySql = "INSERT INTO `catalogo_productos` (
            `catalogo_tipoproductos_idsystemtipopro`,
            `catalogo_productos_sku`,
            `empresa_idsystemEmpresa`,
            `categorias_programasonline_idsystemcatproon`,
            `producto_modalidad_idsystemprodmod`,
            `catalogo_productos_idMdl`,
            `catalogo_productos_idprospectus`,
            `catalogo_productos_nombre`,
            `catalogo_productos_duracion`,
            `catalogo_productos_descripcioncorta`,
            `catalogo_productos_descripcionlarga`,
            `catalogo_productos_esquemacursos`,
            `catalogo_productos_incluye`,
            `catalogo_productos_link`,
            `catalogo_productos_thumbfacilitador`,
            `catalogo_productos_namefacilitador`,
            `catalogo_productos_positionfacilitador`,
            `catalogo_productos_nameBlogNote`,
            `catalogo_productos_dateBlogNote`,
            `catalogo_productos_nameFailitadorBlogNote`,
            `catalogo_productos_linkBlogNote`,
            `catalogo_productos_fechainicio`,
            `catalogo_productos_fechafin`,
            `catalogo_productos_iva`,
            `catalogo_productos_preciomx`,
            `catalogo_productos_preciousd`,
            `catalogo_productos_preciomx_descuento`,
            `catalogo_productos_preciousd_descuento`,
            `catalogo_productos_file_folleto`,
            `catalogo_productos_file_thumb`,
            `catalogo_productos_thumb_encabezado`,
            `catalogo_productos_file_promocion`,
            `catalogo_productos_publicado`,
            `catalogo_productos_stock`,
            `presencial_direccion`,
            `presencial_linklocation`,
            `virtual_notas`,
            `virtual_link`,
            `contacto`,
            `typeTagImage`
             )
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $query = $mysqli->prepare($querySql);
        $query -> bind_param('isiiiiissssssssssssssssdddddssssiissssss',
            $dataPost['typePro'],
            $dataPost['sku'],
            $dataPost['idCompany'],
            $dataPost['category'],
            $dataPost['modality'],
            $dataPost['idMdl'],
            $dataPost['idProspec'],
            $dataPost['nameCourseWors'],
            $dataPost['duration'],
            $dataPost['shortDescription'],
            $dataPost['longDescription'],
            $dataPost['esquemaDescription'],
            $dataPost['includeDescription'],
            $dataPost['link'],
            $imageProfile,
            $dataPost['nameFacilitador'],
            $dataPost['positionFacilitador'],
            $dataPost['nameBlogNote'],
            $dataPost['dateBlog'],
            $dataPost['nameFacilitadorBlog'],
            $dataPost['linkBlog'],
            $dataPost['startDate'],
            $dataPost['endDate'],
            $dataPost['iva'],
            $dataPost['priceMxn'],
            $dataPost['priceUsd'],
            $precioDescuento,
            $dataPost['priceUsdDescto'],
            $dataPost['fileFolleto'],
            $imagesCours,
            $namesImagesHeader,
            $imagesBlog,
            $dataPost['isPublish'],
            $dataPost['stock'],
            $dataPost['direction'],
            $dataPost['location'],
            $dataPost['notes'],
            $dataPost['linkConnection'],
            $dataPost['contacto'],
            $dataPost['typeTagImage']
        );
        

        $query -> execute();
        //$query -> fetch();
        /* echo $query;
        echo "asta aqui llega proccess data";
        die(); */

        if( $query->affected_rows > 0){

            $idNewProduct = $query->insert_id;
            $query -> close();
            
            if($dataPost['checkDescto'] == '1' ){

                //$mysqli2 = conectar();
                $insertSql = "INSERT INTO catalogo_descuentos (
                    `descuento_tipo`,
                    `descuento_formato`,
                    `descuento_cantidad`,
                    `descuento_valido_desde`,
                    `descuento_valido_hasta`,
                    `descuento_estatus` )
                VALUES (?,?,?,?,?,?)";
                $queryInsert = $mysqli->prepare($insertSql);
                $queryInsert->bind_param('isdssi', 
                    $dataDesctos['typeDescto'],
                    $dataDesctos['formatDescto'],
                    $dataDesctos['quantityDescto'],
                    $dataDesctos['validFrom'],
                    $dataDesctos['validTo'],
                    $dataDesctos['status']);
    
                $queryInsert->execute();
                //$queryInsert->fetch();
    
                if( $queryInsert->affected_rows > 0){

                    $iddescuento = $queryInsert->insert_id;
                    $queryInsert->close();

                    
                    $query = $mysqli -> prepare("UPDATE catalogo_productos SET descuentos_idsystemdescuento = ?, catalogo_productos_preciomx_descuento=? WHERE idsystemcatpro = ? ");
                    $query -> bind_param('idi', $iddescuento, $dataPost['priceMxnDescto'],$idNewProduct);
                    $query -> execute();

                    if($query->affected_rows>0){
                            
                        $query -> close();
                        $result = [
                            'status' => true,
                            'message' => 'Datos guardados correctamente con descuento',
                            'description' => $dataPost
                        ];
                        
                    }else{
                        $query -> close();
                        $result = [
                            'status' => false,
                            'message' => 'ERROR[2]: Los datos del descuento no pudieron ser guardados',
                            'description' => $dataPost
                        ];
                    }

                    
                }
                else {
                    $queryInsert->close();
                    $result = [
                        'status' => false,
                        'message' => 'ERROR[1]: Los datos del descuento no pudieron ser guardados',
                        'description' => $dataPost
                    ];
                }

            }else{
                  $result = [
                    'status' => true,
                    'message' => 'Datos guardados correctamente SIN descuento',
                    'description' => $dataPost
                ]; 
            }


            //if( $dataPost['idDescto'] != '' ){
                
            //}
            //else {

                /* $result = [
                    'status' => true,
                    'message' => 'Datos guardados correctamente SIN descuento',
                    'description' => $dataPost
                ]; */
            //}
            
        }else{
            $result = [
                'status' => false,
                'message' => 'No se pudieron guardar los datos ',
                'description' => $dataDesctos
            ];
            $query -> close();
        }
        return $result;
    }
    catch (Exception $e) {
        $result = [
            'status' => false,
            'message' => 'Error encontrado',
            'description' => $e->getMessage()
        ];
        return $result;
    } catch(PDOException $e) {
        $result = [
            'status' => false,
            'message' => 'Error encontrado',
            'description' => $e->getMessage()
        ];
        return $result;
    }
}


function saveImage($arrImages, $sku, $type )
{
    $names = '';
    $carpeta = '';

    // Encabezados
    if( $type == 'banner' ) {
        $carpeta = "/archivos/cursos_talleres/banners";
        if( isset($arrImages['thumbHeader']) && $arrImages['thumbHeader'] != '' ) {
            if (!file_exists($carpeta)) { mkdir($carpeta, 0775, true); }
            $dataImgC = $arrImages['thumbHeader'];
            if( $dataImgC != '' ){
                $newSku = '';
                $newSku = $sku.'_'.$type.'01';
                $names .= proccessImage($arrImages['thumbHeader'], $dataImgC, $newSku, $carpeta);
                
            }
        }
        if( isset($arrImages['thumbHeader2']) && $arrImages['thumbHeader2'] != '' ) {
            if (!file_exists($carpeta)) { mkdir($carpeta, 0775, true); }
            $dataImgC = $arrImages['thumbHeader2'];
            if( $dataImgC != '' ){
                $newSku = '';
                $newSku = $sku.'_'.$type.'02';
                $names .= proccessImage($arrImages['thumbHeader2'], $dataImgC, $newSku, $carpeta);
            }
        }
        if( isset($arrImages['thumbHeader3']) && $arrImages['thumbHeader3'] != '' ) {
            if (!file_exists($carpeta)) { mkdir($carpeta, 0775, true); }
            $dataImgC = $arrImages['thumbHeader3'];
            if( $dataImgC != '' ){
                $newSku = '';
                $newSku = $sku.'_'.$type.'03';
                $names .= proccessImage($arrImages['thumbHeader3'], $dataImgC, $newSku, $carpeta);
            }
        }
    }

    // Imagen de facilitador
    if( $type == 'profile' ) {
        if( isset($arrImages) && $arrImages != '' ) {
            $carpeta = "/archivos/cursos_talleres/profile";
            if (!file_exists($carpeta)) { mkdir($carpeta, 0775, true); }
            $dataImgC = $arrImages;
            if( $dataImgC != '' ){
                $sku = $sku.'_'.$type;
                $names .= proccessImage($arrImages, $dataImgC, $sku, $carpeta);
            }
        }
    }

    // Imagenes a mostar en carrito
    if( $type == 'thumbs' ) {
        $carpeta = "/archivos/cursos_talleres/thumbs";
        if( isset($arrImages['thumbMini']) && $arrImages['thumbMini'] != '' ) {
            if (!file_exists($carpeta)) { mkdir($carpeta, 0775, true); }
            $dataImgC = $arrImages['thumbMini'];
            if( $dataImgC != '' ){
                $newSku = '';
                $newSku = $sku.'_'.$type.'01';
                $names .= proccessImage($arrImages['thumbMini'], $dataImgC, $newSku, $carpeta);
            }
        }
        if( isset($arrImages['thumbMini2']) && $arrImages['thumbMini2'] != '' ) {
            if (!file_exists($carpeta)) { mkdir($carpeta, 0775, true); }
            $dataImgC = $arrImages['thumbMini2'];
            if( $dataImgC != '' ){
                $newSku = '';
                $newSku = $sku.'_'.$type.'02';
                $names .= proccessImage($arrImages['thumbMini2'], $dataImgC, $newSku, $carpeta);
            }
        }
        if( isset($arrImages['thumbMini3']) && $arrImages['thumbMini3'] != '' ) {
            if (!file_exists($carpeta)) { mkdir($carpeta, 0775, true); }
            $dataImgC = $arrImages['thumbMini3'];
            if( $dataImgC != '' ){
                $newSku = '';
                $newSku = $sku.'_'.$type.'03';
                $names .= proccessImage($arrImages['thumbMini3'], $dataImgC, $newSku, $carpeta);
            }
        }
    }

    // Imagen de blog
    if( $type == 'blog' ) {
        if( isset($arrImages) && $arrImages != '' ) {
            $carpeta = "/archivos/cursos_talleres/banners";
            if (!file_exists($carpeta)) { mkdir($carpeta, 0775, true); }
            $dataImgC = $arrImages;
            if( $dataImgC != '' ){
                $sku = $sku.'_'.$type;
                $names .= proccessImage($arrImages, $dataImgC, $sku, $carpeta);
            }
        }
    }

    return $names;
}

function proccessImage($arrImages, $dataImgC, $sku, $carpeta)
{
    $names = '';
    $nameImg = '';
    // Obtener la extensión de la Imagen
    $img_extension = getB64Extension($arrImages);
    // Crear un nombre aleatorio para la imagen
    $img_name = "$sku.". $img_extension;
    list($type, $dataImgC) = explode(';', $dataImgC);
    list(, $dataImgC)      = explode(',', $dataImgC);
    $dataReqImg64 = base64_decode($dataImgC);
    $nombreImagen = $img_name;
    $rutaFull = "../../..$carpeta/".$nombreImagen;
    //$rutaFull = "../../../archivos/cursos_talleres/banners/nombreEjemplo.png";
    if( file_put_contents($rutaFull, $dataReqImg64) ) { $names = "$carpeta/$nombreImagen,"; }
    else{ $names = ''; }
    return $names;
}



function getB64Extension($base64_image, $full = null)
{
    // Obtener mediante una expresión regular la extensión imagen y guardarla
    // en la variable "img_extension"        
    preg_match("/^data:image\/(.*);base64/i", $base64_image, $img_extension);
    // Dependiendo si se pide la extensión completa o no retornar el arreglo con
    // los datos de la extensión en la posición 0 - 1
    return ($full) ?  $img_extension[0] : $img_extension[1];
}

?>