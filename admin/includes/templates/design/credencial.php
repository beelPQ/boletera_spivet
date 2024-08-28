<?php
    $param = $_GET["id"];
    $idCurso = explode(":", $param)[1]; 
?>
<?php
    // $param = $_GET["id"];
    // $arrayParams = explode("/",$param);
    // $idEvent = $arrayParams[1];
    // $idUs = $arrayParams[0];
    // echo $idUs;
    //echo json_encode($idEvent);
    // $idCurso = explode(":", $param)[1]; 
?>
<div class="content-desig-gen">
    <input type="hidden" value="<?= $idCurso ?>" id="curso">
    <input type="hidden" value="<?= $idUs ?>" id="idus">
    <div class="content-controls mb-3 p-3 d-flex justify-content-center" >
        <button class="btn btn-p-control btn-long anim-skeleton skeleton" id="openConfigDocument">Iniciar configuración</button>
        <button class="btn btn-p-control anim-skeleton skeleton" type="button" id="btnPrint">Previsualizar</button>
        <button class="btn btn-p-control anim-skeleton skeleton" type="button" id="btnSaveStructureDocto">Guardar</button>
        <button class="btn btn-p-control anim-skeleton skeleton" type="button" id="btnCancelDesign">Cancelar</button>
    </div>
    <div class="content-sections" style="display:none;">
        <div class="content-sections-elements-tabs">
            <div class="content-sections-buttons-pagetab">
                <button id="btnPageTab1" class="btn-pagetab pagetab-selected">Sección 1</button>
                <button id="btnPageTab2" class="btn-pagetab">Sección 2</button>
            </div>
            <div id="controlsPageTab1" class="content-sections-elements d-flex p-3  flex-column active">

                <div class="mb-3"> <strong class="anim-skeleton skeleton"> Controles de edición </strong> </div>
                <div class="content-columns d-flex">

                    <div class="content-columns-control d-flex flex-column">
                        <div class="mb-3 anim-skeleton skeleton">
                            <label class="col-form-label" for="">Tipo de diseño</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="allDesign">
                                <label class="form-check-label" for="allDesign" >
                                    Diseño digital/impresión
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="tagOnly">
                                <label class="form-check-label" for="tagOnly">
                                    Solo impresión
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 anim-skeleton skeleton control-dinamyc">
                            <label class="col-form-label" for="">Logo principal</label>
                            <br>

                            <img class="rounded" id="previewImage1" width="100" height="100" src="images/components/empty_image.png" alt="preview" onclick="previewCropper(this,'inputImage1')" style="cursor: pointer;">

                            <?php
                            //parametros inputCropper: inputFile,IDpreview,widthPreview,heightPreview,widthSaved,heightSaved,typeCrop,minWidthCrop,minHeightCrop,maxWidthCrop,maxHeightCrop,event
                            // (cuando se quiere una imagen cuadrada) si typeCrop es 1 no se usan los valores de los parametros minWidthCrop,minHeightCrop,maxWidthCrop,maxHeightCrop
                            // (cuando se quiere una imagen rectangular) si typeCrop es 2 se usan los valores de los parametros minWidthCrop,minHeightCrop,maxWidthCrop,maxHeightCrop
                            ?>
                            <input type="file" class="sr-only" id="inputImage1" name="image" accept="image/*" data-imagetype="imageLogoSec1" onchange="inputCropper(this,'previewImage1',200,200,200,200,2,200,200,2000,2000,event)">
                            <br>
                            <button type="button" class="btn botonFormulario" id="previewImage1_delete" data-deleteimagetype="imageLogoSec1" style="display:none;margin-top:5px;" onclick="cleanPreview(this,'previewImage1',event)">Cambiar imagen</button>

                        </div>

                        <div class="mb-3 anim-skeleton skeleton control-dinamyc">
                            <label for="colorTopDesing" class="form-label">Color de fondo superior</label>
                            <input type="color" class="form-control form-control-color input-color" id="colorTopDesing" 
                            value="#000" title="Choose your color">
                        </div>

                        <div class="custom-control custom-switch mb-4 anim-skeleton skeleton control-dinamyc">
                            <input type="checkbox" class="custom-control-input" id="togAccess" data-title="ACCESSO">
                            <label class="custom-control-label" for="togAccess">Codigo Qr Acceso</label>
                        </div>
                        <div class="custom-control custom-switch mb-4 anim-skeleton skeleton control-dinamyc">
                            <input type="checkbox" class="custom-control-input" id="togMyData" data-title="MIS DATOS">
                            <label class="custom-control-label" for="togMyData">Codigo Qr Mis datos</label>
                        </div>
                        <div class="custom-control custom-switch mb-4 anim-skeleton skeleton control-dinamyc togg-optional" style="display: none;">
                            <input type="checkbox" class="custom-control-input" id="togAgenda" data-title="AGENDA" disabled>
                            <label class="custom-control-label" for="togAgenda">Codigo Qr Agenda</label>
                        </div>

                        
                    </div>
                </div>
            </div>
            <div id="controlsPageTab2" class="content-sections-elements d-flex p-3  flex-column desactive">

                <div class="mb-3"> <strong class="anim-skeleton skeleton"> Controles de edición </strong> </div>
                <div class="content-columns d-flex">

                    <div class="content-columns-control d-flex flex-column">
                        <div class="mb-3 anim-skeleton skeleton">
                            <label class="col-form-label" for="">Logos partners</label>
                            <br>

                            <img class="rounded" id="previewImage2" width="100" height="100" src="images/components/empty_image.png"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top" alt="preview" onclick="previewCropper(this,'inputImage2')" style="cursor: pointer;">

                            <?php
                            //parametros inputCropper: inputFile,IDpreview,widthPreview,heightPreview,widthSaved,heightSaved,typeCrop,minWidthCrop,minHeightCrop,maxWidthCrop,maxHeightCrop,event
                            // (cuando se quiere una imagen cuadrada) si typeCrop es 1 no se usan los valores de los parametros minWidthCrop,minHeightCrop,maxWidthCrop,maxHeightCrop
                            // (cuando se quiere una imagen rectangular) si typeCrop es 2 se usan los valores de los parametros minWidthCrop,minHeightCrop,maxWidthCrop,maxHeightCrop
                            ?>
                            <input type="file" class="sr-only" id="inputImage2" name="image" accept="image/*" data-imagetype="imageBgSec2" onchange="inputCropper(this,'previewImage2',248,300,800,1500,2,348,500,2000,3050,event)">
                            <br>
                            <button type="button" class="btn botonFormulario" id="previewImage2_delete" data-deleteimagetype="imageBgSec2" style="display:none;margin-top:5px;" onclick="cleanPreview(this,'previewImage2',event)">Cambiar imagen</button>

                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content-sections-mockup p-3 mt-4">
            <div class="mb-3"> <strong class="anim-skeleton skeleton"> Boceto de Credencial </strong> </div>
            <div class="content-general-dip gen-portrait" id="contentGeneral">
                <div class="content-diploma anim-skeleton skeleton orien-portrait" id="contentDiploma">  
                    <div class="section1">
                        <span class="sp-float">Sección 1</span>
                        <div id="bgTop" class="bg-top">
                            <div class="cont-logo">
                                <!--<img id="imgLogoSelected" src="https://cin24.spivet.com.mx/images/CIN2024.png" alt="">-->
                                <img id="imgLogoSelected" src="" alt="">
                                <div class="data-user">
                                    <span class="title"> Nombre Completo de Usuario </span><br>
                                    <span class="text-normal"> PIQUERO TECNOLOGÍA & DEPORTES </span><br>
                                    <span class="text-normal"> CÓDIGO DE PARTICIPANTE: </span><br>
                                    <span class="title"> COD-001 </span><br>
                                </div>
                            </div> 
                        </div> 
                        <div class="bg-center">
                        </div>
                        <div class="bg-footer">
                                
                        </div>
                    </div>
                    <div class="section2">
                        <span class="sp-float">Sección 2</span>
                        <div id="bgAll" class="bg-all">
                            <img id="imgBgSelectedSec2" src="" alt="">
                        </div> 
                    </div>
                    <div class="section3">
                        <span class="sp-float">Sección 3</span> 
                    </div>
                    <div class="section4">
                        <span class="sp-float">Sección 4</span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    

    <!-- CROPPER -->
    <button type="button" id="showModalCropper" class="btn btn-primary" data-toggle="modal" data-target="#modalCropper" hidden></button>

    <div class="modal fade" id="modalCropper" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Recorte su foto</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" id="closeModalx">X</button>
                </div>
                <input type="text" id="useCredencial" value="use_credencial" hidden>
                <div class="modal-body">
                    <div class="img-container">
                        <img id="visorCropper" src="https://avatars0.githubusercontent.com/u/3456749">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn_cancel" data-dismiss="modal" id="closeCrop">Cancelar</button>
                    <button type="button" class="btn btn_primary" id="btnSaveCrop">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- CROPPER -->
</div>