<?php

use Joomla\CMS\Factory;

$pathExternalModule = "/modules/mod_buycarform/tmpl";
$PATH_MODULE = '/modules/mod_my_profile';
$PATH_MODULE_SRC = "$PATH_MODULE/tmpl/src";
$document = Factory::getDocument();
$document->addStyleSheet("https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css", array('version' => 'auto'));
$document->addStyleSheet("$pathExternalModule/assets/plugin/css/intlTelInput.min.css", array('version' => 'auto'));
$document->addStyleSheet("$PATH_MODULE_SRC/css/mdlMyProfile.min.css", array('version' => 'auto'));

$document->addScript("https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js",  array('version' => 'auto'));
$document->addScript("$pathExternalModule/assets/plugin/js/intlTelInput.min.js");
$document->addScript("$PATH_MODULE_SRC/js/mdlMyProfile.min.js",  array('version' => 'auto'));

$sectionTitle = $params->get('sectionTitle') ?? 'Compras';

?>


<section class="my_profile">
    <div class="container my_profile-content py-4 px-3">
        <h1 class="my_profile-title"><?= $sectionTitle ?></h1>
        
        <div class="my_profile-left">
            <div class="contentphoto">
                <img class="rounded" id="avatar" width="100" height="100" src="<?=$pathExternalModule?>/assets/plugin/img/logo_subir_imagen.png" alt="avatar">
                <section class="content_preview_image" style="display:none;" >
                    <input type="file" class="sr-only" id="inputCropFile" name="image" accept="image/*">
                    <button type="button" class="btn " id="btnDeleteImg" >Cambiar fotografia</button>
                </section>
            </div>
            <div class="contentadvertising">
            </div>
        </div>
        <div class="my_profile-right">
            <div class="contentform">
                <h5 class="form-title">DATOS PERSONALES</h5>
                <form id="formDataProfile" class="form">
                    <div class="form_contentItem mb-3">
                        <label for="name" class="form-label">NOMBRE</label>
                        <input type="text" class="form-control" id="name" name="name" maxlength="20">
                    </div>
                    <div class="form_contentItem mb-3">
                        <label for="lastname1" class="form-label">APELLIDO PRIMARIO</label>
                        <input type="text" class="form-control" id="lastname1" name="lastname1" maxlength="30">
                    </div>
                    <div class="form_contentItem mb-3">
                        <label for="lastname2" class="form-label">APELLIDO SECUNDARIO</label>
                        <input type="email" class="form-control" id="lastname2" name="lastname2" maxlength="30">
                    </div>
                    <div class="form_contentItem mb-3">
                        <label for="email" class="form-label">EMAIL</label>
                        <input type="email" class="form-control" id="email" name="email" maxlength="30">
                    </div>
                    <div class="form_contentItem mb-3 flex flex-col">
                        <label for="telwhat" class="form-label">WHATSAPP</label>
                        <input type="text" class="form-control" id="telwhat" name="telwhat" maxlength="12"  placeholder="222 123 45">
                    </div>
                    <div class="form_contentItem mb-3">
                        <label for="cp" class="form-label">CODIGO POSTAL</label>
                        <input type="text" class="form-control" id="cp" name="cp" maxlength="6">
                    </div>
                    <div class="form_contentItem mb-3">
                        <label for="inputPassword4" class="form-label">PAIS</label>
                        <select name="country" id="country" class="form-control">
                            <option value="no_selected" disabled="" selected="">Seleccionar</option>
                        </select>
                        <svg class="icon-select" width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.983 6.65c.007-.007.01-.018.017-.027l4.8-5.303a.827.827 0 0 0 0-1.08.029.029 0 0 0-.009-.006.643.643 0 0 0-.49-.234h-9.6a.652.652 0 0 0-.497.242L.2.239a.826.826 0 0 0 0 1.081l4.811 5.33a.638.638 0 0 0 .971 0z" fill="#000"></path>
                        </svg>
                    </div>
                    <div class="form_contentItem mb-3">
                        <label for="inputPassword4" class="form-label">ESTADO</label>
                        <select name="state" id="state" class="form-control">
                            <option value="no_selected" selected="" disabled="">Seleccionar</option>
                        </select>
                        <svg class="icon-select" width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.983 6.65c.007-.007.01-.018.017-.027l4.8-5.303a.827.827 0 0 0 0-1.08.029.029 0 0 0-.009-.006.643.643 0 0 0-.49-.234h-9.6a.652.652 0 0 0-.497.242L.2.239a.826.826 0 0 0 0 1.081l4.811 5.33a.638.638 0 0 0 .971 0z" fill="#000"></path>
                        </svg>
                    </div>
                </form>
            </div>
        </div>

        <div class="my_profile-btnActions" id="btnActionsContent">
            <button type="button" class="btn btn_update" >Actualizar</button>
        </div>
    </div>
</section>


<button id="btnModalCrop" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCropperProfile" hidden ></button>
<div class="modal fade" id="modalCropperProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Recorte su foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModalx"></button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <img id="imageCropper" src="/modules/mod_buycarform/tmpl/assets/plugin/img/logo_subir_imagen.png">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn_cancel" data-bs-dismiss="modal" id="closeCropProfile">Cancelar</button>
                <button type="button" class="btn btn_primary" data-bs-dismiss="modal" id="btnSaveCropProfile">Guardar</button>
            </div>
        </div>
    </div>
</div>
