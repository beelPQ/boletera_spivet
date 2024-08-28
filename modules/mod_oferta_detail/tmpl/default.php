<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/conect.php");



use Joomla\CMS\Factory; 

$document = Factory::getDocument(); 
$document->addStyleSheet("/modules/mod_oferta_detail/tmpl/assets/css/detail_course.min.css", array('version' => 'auto'));

$urlImage = "";
$titleOferta  = '';
$descriptionOferta = "";
$course = ''; 

if( isset($_GET["oferta"]) && $_GET["oferta"] != "" ){ 
    $course = $_GET["oferta"];
    $cadena = explode("-", $course);
    $idOferta = $cadena[1]; 
    $titleOferta = $cadena[2];
    $myDatabase = new myDataBase();
    $mysql = $myDatabase->conect_mysqli();
    $queryImage = "SELECT catalogo_productos_thumb_encabezado, catalogo_productos_descripcioncorta FROM catalogo_productos WHERE idsystemcatpro = $idOferta";
    $exec = $mysql->query($queryImage);
    if( $exec ){
        $obj = mysqli_fetch_assoc($exec);
        $imageOferta = $cadenaSinComas = str_replace(",", "",  $obj["catalogo_productos_thumb_encabezado"]);
        $urlImage = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$imageOferta ;
        $descriptionOferta = strip_tags($obj["catalogo_productos_descripcioncorta"]);
    }
}else{
    //echo "Cae en el else";
    $url = $_SERVER["HTTP_HOST"];
    header("Location:  http://".$url."/");
    die();
}
    
    $config = JFactory::getConfig();
    $site_name = $config->get('sitename');
    

    // Obtén la instancia de la aplicación Joomla
    $app = JFactory::getApplication();
    
    // Obtén el objeto de la página activa
    $document = JFactory::getDocument();
    $titleFormat = str_replace("_", " ", $titleOferta);
    $document->setTitle($site_name." - ".$titleFormat);
    // Establece la nueva descripción en la etiqueta meta
    $document->setDescription($descriptionOferta);
    // Establece la etiqueta meta og:image
    $document->setMetaData('og:image', $urlImage);

    //$document->setDescription(); 
    //$document->setMetaData('og:image', $urlImage);

?>
<link href="https://cdn.jsdelivr.net/npm/shareon@2/dist/shareon.min.css?v=<?= time() ?>" rel="stylesheet"/>
<!-- <script src="https://cdn.jsdelivr.net/npm/shareon@2/dist/shareon.iife.js" defer init></script> -->


<!-- <link rel="stylesheet" href="/modules/mod_oferta_detail/tmpl/assets/css/detail_course.min.css"> -->
<input type="text" id="codeCourse" value="<?=$idOferta?>" hidden>
<div class="course flex">
    
    <div class="course-header" id="imageBackgroudHead" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6QEo8JhCL3ksI6OrL0bNbwzUwUpBd5MfIzYSie3Fze8263bjiB6xXWRDAHsrpFd_D_Hw&usqp=CAU');">
        <div class="capa-obscura"></div>
        <div class="course-title">
            <span class="title" id="titleCourse"></span>
        </div>
        <div class="course-header-title">

        </div> 
        <div class="course-header-desc flex">
            <div class="date">
                <span class="title">FECHA</span><br>
                <span class="text" id="dateCourse"></span>
            </div>
            <div class="line">

            </div>
            <div class="duration">
                <span class="title">DURACIÓN</span><br>
                <span class="text" id="durationTime"></span>
            </div>
            <div class="line">

            </div>
            <div class="cost">
                <span class="title">COSTO</span><br>
                <span class="text" id="costPayment"></span>
            </div>
            <div class="line">

            </div>
            <div class="modality">
                <span class="title">MODALIDAD</span><br>
                <span class="text" id="modalityType"></span>
            </div>
        </div>
        <div class="course-header-buttons flex">
            <button class="btn-add-car" id="btnAddCar">AGREGAR AL CARRITO</button>
            <button class="btn-shared" id="btnShareNoti">COMPARTIR</button>
        </div>
    </div>

    <div class="content-shared desactive" id="contentShareLink" >
            
        <div class="button">
            <button class="button-closed" id="button-closed">X</button>
        </div>
        
        <div class="shareon flex" data-url="<?php echo JURI::current()."?oferta=".$course ?>">
            <a class="facebook"></a>
            <button class="twitter"></button>
            <a class="linkedin"></a>
            <button class="whatsapp"></button>
            <button class="telegram"></button>
        </div>
        
        <input type="text" id="txtInputHash" class="input-contain-url" readonly value="<?php echo JURI::current()."?oferta=".$course ?>">
        
        <div class="copy">
            <button type="button" id="btnCopyHash" class="copy-button" >
                Copiar
            </button>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button id="btnModality" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" hidden>
        Launch static backdrop modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Seleccionar tipo de modalidad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="btnClosedModal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <span class="text-selected-modality">Seleccionar modalidad</span>
                    <div class="contentRadBtn-modality">
                        <input type="radio" id="addModalityPres" class="input__radio__invoice" name="addModality" value="Presencial">
                        <label for="addModalityPres">Presencial</label>

                        <input type="radio" id="addModalityVir" class="input__radio__invoice" name="addModality" value="Virtual" checked="" style="margin-left:50px;">
                        <label for="addModalityVir">Virtual</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnCerrarModal" type="button" class="btn btn-secondary button-cerrar-modal" data-bs-dismiss="modal">Cerrar</button>
                    <button id="btnSelectionModality" type="button" class="btn btn-primary button-accept-modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="course-info flex">
        <div class="course-info-content flex">
            <div class="content-description flex">
                <div class="content-title flex">
                    <span>DESCRIPCIÓN</span>
                </div>
                <div class="content-descript" id="descriptCourse">

                </div>
                <div class="content-certify">
                    <span>CERTIFICADO POR:</span> <br>
                    <img src="https://coyomeapan.com/wp-content/uploads/2022/05/LogotipoSPF3.png" alt="" width="200" height="150">
                </div>
            </div>
            
            <div class="content-detail flex">
                <div class="content-title flex">
                    <span>OBJETIVO DEL CURSO</span>
                </div>
                <div class="content-descript" id="objCourse">

                </div>
                <div class="content-title space-extra  flex">
                    <span>IMPARTIDO POR</span>
                </div>
                <div class="content-teacher flex" >
                    <div class="image-teacher">

                    </div>
                    <div class="name-teacher flex">
                        <span class="name-teacher-course">

                        </span>
                    </div>
                </div>

                <div class="content-title space-extra  flex">
                    <span>CONTACTO</span>
                </div>
                <div class="content-datos-teacher" id="objCourse">
                    <div class="item-datos flex " id="itemDatosTeacher">
                        <div class="icon">
                            
                        </div>
                        <div class="text">

                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
</div>


<script src="/modules/mod_oferta_detail/tmpl/assets/js/detail_course.js"></script>