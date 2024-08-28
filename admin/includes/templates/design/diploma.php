<?php
    $param = $_GET["id"];
    $idCurso = explode(":", $param)[1]; 
?>
<div class="content-desig-gen">
    <input type="hidden" value="<?= $idCurso ?>" id="curso">
    <div class="content-controls mb-3 p-3 d-flex justify-content-center" >
        <button class="btn btn-p-control btn-long anim-skeleton skeleton" data-toggle="modal" data-target="#modalAddImage" id="openConfigDocument">Configurar documento</button>
        <button class="btn btn-p-control anim-skeleton skeleton" type="button" id="btnPrint">Previsualizar</button>
        <button class="btn btn-p-control anim-skeleton skeleton" type="button" id="btnSaveStructureDocto">Guardar</button>
        <button class="btn btn-p-control anim-skeleton skeleton" type="button" id="btnCancelDesign">Cancelar</button>
    </div>
    <div class="content-sections">

        <div class="content-sections-elements d-flex p-3  flex-column">
            <div class="mb-3"> <strong class="anim-skeleton skeleton"> Activacion de elementos </strong> </div>
            <div class="content-columns d-flex ">

                <div class="content-columns-control d-flex flex-column">
                    <div class="custom-control custom-switch mb-4 anim-skeleton skeleton">
                        <input type="checkbox" class="custom-control-input" id="togNameUser">
                        <label class="custom-control-label" for="togNameUser">Nombre</label>
                    </div>
                    <!--<div class="custom-control custom-switch mb-4 anim-skeleton skeleton">-->
                    <!--    <input type="checkbox" class="custom-control-input" id="togDate">-->
                    <!--    <label class="custom-control-label" for="togDate">Fecha</label>-->
                    <!--</div>-->
                    <div class="custom-control custom-switch mb-4 anim-skeleton skeleton">
                        <input type="checkbox" class="custom-control-input" id="togCredits">
                        <label class="custom-control-label" for="togCredits">Creditos</label>
                    </div>
                    <div class="mb-3 row anim-skeleton skeleton">
                        <label for="selTipografia" class="col-sm-2 col-form-label">Tipografía</label> 
                    </div>
                </div>
                <div class="content-columns-tag d-flex d-flex flex-column">
                    <div class="content-tag" id="contagtogNameUser">    
                        <div class="element-tag tag-name tag-disabled anim-skeleton skeleton" id="tagtogNameUser">
                            Nombre completo del participante
                        </div>
                    </div>
                    <!--<div class="content-tag">    -->
                    <!--    <div class="element-tag tag-date tag-disabled anim-skeleton skeleton" id="tagtogDate">-->
                    <!--        01/01/2024-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="content-tag" id="contagtogCredits">    
                        <div class="element-tag tag-credit tag-disabled anim-skeleton skeleton" id="tagtogCredits">
                            
                            <!--<input id="credits" type="text" class="form-control-custom" maxlength="48">-->
                            <input class="form-control-custom" type="text" id="credits" value="" maxlength="48">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <div class="col-sm-10">
                            <select id='selectTypography' class="form-control select-typography anim-skeleton skeleton">
                               
                          </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        <div class="content-sections-mockup p-3 ">
            <div class="mb-3"> <strong class="anim-skeleton skeleton"> Boceto de diploma </strong> </div>
            <div class="content-general-dip" id="contentGeneral">
                <div class="content-diploma anim-skeleton skeleton" id="contentDiploma">  
               
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="modalAddImage" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Configuración de documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnCloseModalConfig">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body-controls">
                    <div class="title-control mt-3 mb-4" > 
                        <span> <strong> Seleccionar orientacion de documento </strong> </span> 
                    </div>
                    <div id="desicionOrientation" class="content-desicion d-flex flex-row">
                        <div class="content-desicion-portrat">
                            <button id="orientationLandscape" class="btn btn-orientation btn-l"> 
                            </button>
                        </div>
                        <div class="content-desicion-landscape">
                            <button id="orientationPortrait"  class="btn btn-orientation btn-p">
                            </button>
                        </div>
                    </div>
                    <div class="title-control mt-4 mb-5" > 
                        <span> <strong> Adjuntar imagen de documento </strong> </span> 
                    </div>
                    <div class="content-desicion d-flex flex-row">
                        <input type="file" id="imageDocto" style="display: none;" accept="image/png, image/jpeg, image/jpg">
                        <button id="addBackgDocument" class="btn btn-add-docto">Adjuntar</button>
                    </div>
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary"  id="btnSaveOrientationBack">Guardar</button>
            </div>
            </div>
        </div>
    </div>
</div>