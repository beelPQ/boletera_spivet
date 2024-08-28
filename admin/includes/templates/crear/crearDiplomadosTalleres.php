<div id="contentSpinner" class="content-spinner" >
    <div class="spinner-body">
        <span id="txtSpanSpinner" class="txtSpanSpinner" >Cargando</span>
        <div class="spinner-circle"></div>
        <div class="spinner-circle1"></div>
        <div class="spinner-circle2"></div>
        <div class="spinner-circle3"></div>
        <div class="spinner-circle4"></div>
        <div class="spinner-circle5"></div>
    </div>
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Agregar diploma o curso-taller</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="crearCoursesWorks" action="index.php" method="post" autocomplete="off">
                                <div class="row">
                                    <!-- text input -->
                                    <div class="col-sm-12">
                                        <div class="card card-blue direct-chat direct-chat-dark">

                                            <div class="card-header card-personalizado" >
                                                <h3 class="card-title">Datos</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row g-3">
                                                    <div class="col col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Sku</label>
                                                            <input
                                                                type="text"
                                                                id="sku"
                                                                class="form-control"
                                                                placeholder="Identificador"
                                                                maxlength="19"
                                                                value="<?=lista_generaSKu(0)?>"
                                                                disabled
                                                                >
                                                        </div>
                                                    </div>

                                                    <div class="col col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Categoria *</label>
                                                            <select id="category" class="form-control">
                                                                    <?=lista_diplomasCusrosCategorias(0)?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Modalidad *</label>
                                                            <select id="modality" class="form-control">
                                                                    <?=lista_diplomasCusrosModalidad(0)?>
                                                            </select>
                                                        </div>
                                                    </div>
                            
                                                    <div class="col col-md-6 col-lg-4 " id="contentDirection" style="display : none;">
                                                        <div class="form-group">
                                                            <label>Direccion *</label>
                                                            <input type="text" id="direction" name="direction" class="form-control">
                                                        </div>
                                                    </div> 

                                                    <div class="col col-md-6 col-lg-4" id="contentLinkLocation" style="display:none;">
                                                        <div class="form-group">
                                                            <label>Link localizacion *</label>
                                                            <input type="text" id="location" name="location" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col col-md-6 col-lg-4" id="contentNotes" style="display:none;">
                                                        <div class="form-group">
                                                            <label>Notas *</label>
                                                            <input type="text" id="notes" name="notes" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col col-md-6 col-lg-4" id="contentLinkConecction" style="display:none;">
                                                        <div class="form-group">
                                                            <label>Link de conexion *</label>
                                                            <input type="text" id="linkconection" name="linkconection" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Nombre *</label>
                                                            <input
                                                                type="text"
                                                                id="nameCourseWorks"
                                                                class="form-control"
                                                                placeholder="texto"
                                                                maxlength="69"
                                                                >
                                                        </div>
                                                    </div>

                                                    <div class="col col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Duración *</label>
                                                            <input
                                                                type="text"
                                                                id="duration"
                                                                class="form-control"
                                                                placeholder="texto"
                                                                maxlength="69"
                                                                >
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Fecha inicio *</label>
                                                            <div id="startDate" class="start__date">
                                                                <select id="startDateDay" class="form-control"></select>
                                                                <select id="startDateMonth" class="form-control"></select>
                                                                <select id="startDateYear" class="form-control"></select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Fecha fin *</label>
                                                            <div class="end__date" id="endDate">
                                                                <select id="endDateDay" class="form-control"></select>
                                                                <select id="endDateMonth" class="form-control"></select>
                                                                <select id="endDateYear" class="form-control"></select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Disponibilidad *</label>
                                                            <input
                                                                type="number"
                                                                id="stock"
                                                                class="form-control"
                                                                placeholder="Stock del producto"
                                                                maxlength="4"
                                                                >
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <div class="contenedor">
                                                            <div class="form-group">
                                                                <label>Descripción corta</label>
                                                                <textarea name="descripcion_corta" id="descripcion_corta" ></textarea>
                                                                <div id="conteo1"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Objetivo del taller / evento</label>
                                                            <textarea name="incluyeDescripcion" id="incluyeDescripcion"></textarea>
                                                            <div id="conteo3"></div>
                                                        </div>
                                                    </div> 

                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Descripción larga</label>
                                                            <textarea name="descripcion_larga" id="descripcion_larga"></textarea>
                                                            <div id="conteo2"></div>
                                                        </div>
                                                    </div> 

                                                    <div class="col-sm-12" style="display: none;">
                                                        <div class="form-group">
                                                            <label>Esquema del curso *</label>
                                                            <textarea name="esquemaCurso" id="esquemaCurso"></textarea>
                                                            <div id="conteo4"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Precio(MXN) *</label>
                                                            <input
                                                                type="text"
                                                                id="preciomx"
                                                                class="form-control"
                                                                placeholder="Precio"
                                                                maxlength="13">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <label>Imagen de encabezado (jpg, jpeg, png - Máximo 5MB)</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="row row__content__image">
                                                            <div class="col">
                                                                <label class="label" data-toggle="tooltip" title="Change your avatar">
                                                                    <img class="rounded" id="avatarThumb1" src="images/logo_subir_imagen.png" alt="avatar">
                                                                    <input type="file" class="sr-only" id="inputThumb1" name="image" accept=".png, .jpg, .jpeg">
                                                                </label>
                                                            </div>
                                                            <div class="col" style="display:none;">
                                                                <label class="label" data-toggle="tooltip" title="Change your avatar">
                                                                    <img class="rounded" id="avatarThumb2" src="images/logo_subir_imagen.png" alt="avatar">
                                                                    <input type="file" class="sr-only" id="inputThumb2" name="image" accept=".png, .jpg, .jpeg">
                                                                </label>
                                                            </div>
                                                            <div class="col" style="display:none;">
                                                                <label class="label" data-toggle="tooltip" title="Change your avatar">
                                                                    <img class="rounded" id="avatarThumb3" src="images/logo_subir_imagen.png" alt="avatar">
                                                                    <input type="file" class="sr-only" id="inputThumb3" name="image" accept=".png, .jpg, .jpeg">
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="container">
                                                            <div class="modal fade" id="modalThumb1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalLabel">Recorte de imagen</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body content__cropper">
                                                                        <div class="img-container">
                                                                        <img id="imageThumb1" src="https://avatars0.githubusercontent.com/u/3456749">
                                                                        </div>
                                                                        <br>
                                                                            <div class="content-btn-controls">
                                                                                <div class="btn-move">
                                                                                    <button id="btnMoveLeftT1" type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Mover Izq.">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Izq.">
                                                                                            <span class="fa fa-arrow-left"></span>
                                                                                        </span>
                                                                                    </button>
                                                                                    <button id="btnMoveRightT1" type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Mover Derecha" >
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Derecha">
                                                                                            <span class="fa fa-arrow-right"></span>
                                                                                        </span>
                                                                                    </button>
                                                                                    <button id="btnMoveUpT1" type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Mover Arriba">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Arriba">
                                                                                            <span class="fa fa-arrow-up"></span>
                                                                                        </span>
                                                                                    </button>
                                                                                    <button id="btnMoveDownT1" type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Mover Abajo">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Abajo">
                                                                                            <span class="fa fa-arrow-down"></span>
                                                                                        </span>
                                                                                    </button>
                                                                                
                                                                                    <button id="btnZoomPlusT1" type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Zoom In">
                                                                                            <span class="fa fa-search-plus"></span>
                                                                                        </span>
                                                                                    </button>
                                                                                    <button id="btnZoomMinusT1" type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Zoom Out)">
                                                                                            <span class="fa fa-search-minus"></span>
                                                                                        </span>
                                                                                    </button>
                                                                            
                                                                                    <button id="btnRotateLT1" type="button" class="btn btn-primary" title="Rotar a la izquierda">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Rotar a la izquierda">
                                                                                            <i class="fa fa-undo" aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </button>
                                                                                    <button id="btnRotateRT1" type="button" class="btn btn-primary" title="Rotar a la derecha">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Rotar a la derecha">
                                                                                            <i class="fa fa-repeat" aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        <br>
                                                                    </div>
                                                                    <div class="modal-footer content__cropper">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                        <button type="button" class="btn btn-primary" id="cropThumb1">Recortar</button>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal fade" id="modalThumb2" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalLabel">Recorte de imagen</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body content__cropper">
                                                                        <div class="img-container">
                                                                        <img id="imageThumb2" src="https://avatars0.githubusercontent.com/u/3456749">
                                                                        </div>
                                                                        <br>
                                                                            <div class="content-btn-controls">
                                                                                <div class="btn-move">
                                                                                    <button id="btnMoveLeftT2" type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Mover Izq.">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Izq.">
                                                                                            <span class="fa fa-arrow-left"></span>
                                                                                        </span>
                                                                                    </button>
                                                                                    <button id="btnMoveRightT2" type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Mover Derecha" >
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Derecha">
                                                                                            <span class="fa fa-arrow-right"></span>
                                                                                        </span>
                                                                                    </button>
                                                                                    <button id="btnMoveUpT2" type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Mover Arriba">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Arriba">
                                                                                            <span class="fa fa-arrow-up"></span>
                                                                                        </span>
                                                                                    </button>
                                                                                    <button id="btnMoveDownT2" type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Mover Abajo">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Abajo">
                                                                                            <span class="fa fa-arrow-down"></span>
                                                                                        </span>
                                                                                    </button>
                                                                                
                                                                                    <button id="btnZoomPlusT2" type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Zoom In">
                                                                                            <span class="fa fa-search-plus"></span>
                                                                                        </span>
                                                                                    </button>
                                                                                    <button id="btnZoomMinusT2" type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Zoom Out)">
                                                                                            <span class="fa fa-search-minus"></span>
                                                                                        </span>
                                                                                    </button>
                                                                            
                                                                                    <button id="btnRotateLT2" type="button" class="btn btn-primary" title="Rotar a la izquierda">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Rotar a la izquierda">
                                                                                            <i class="fa fa-undo" aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </button>
                                                                                    <button id="btnRotateRT2" type="button" class="btn btn-primary" title="Rotar a la derecha">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Rotar a la derecha">
                                                                                            <i class="fa fa-repeat" aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        <br>
                                                                    </div>
                                                                    <div class="modal-footer content__cropper">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                        <button type="button" class="btn btn-primary" id="cropThumb2">Recortar</button>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal fade" id="modalThumb3" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalLabel">Recorte de imagen</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body content__cropper">
                                                                        <div class="img-container">
                                                                        <img id="imageThumb3" src="https://avatars0.githubusercontent.com/u/3456749">
                                                                        </div>
                                                                        <br>
                                                                            <div class="content-btn-controls">
                                                                                <div class="btn-move">
                                                                                    <button id="btnMoveLeftT3" type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Mover Izq.">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Izq.">
                                                                                            <span class="fa fa-arrow-left"></span>
                                                                                        </span>
                                                                                    </button>
                                                                                    <button id="btnMoveRightT3" type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Mover Derecha" >
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Derecha">
                                                                                            <span class="fa fa-arrow-right"></span>
                                                                                        </span>
                                                                                    </button>
                                                                                    <button id="btnMoveUpT3" type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Mover Arriba">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Arriba">
                                                                                            <span class="fa fa-arrow-up"></span>
                                                                                        </span>
                                                                                    </button>
                                                                                    <button id="btnMoveDownT3" type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Mover Abajo">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Abajo">
                                                                                            <span class="fa fa-arrow-down"></span>
                                                                                        </span>
                                                                                    </button>
                                                                                
                                                                                    <button id="btnZoomPlusT3" type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Zoom In">
                                                                                            <span class="fa fa-search-plus"></span>
                                                                                        </span>
                                                                                    </button>
                                                                                    <button id="btnZoomMinusT3" type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Zoom Out)">
                                                                                            <span class="fa fa-search-minus"></span>
                                                                                        </span>
                                                                                    </button>
                                                                            
                                                                                    <button id="btnRotateLT3" type="button" class="btn btn-primary" title="Rotar a la izquierda">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Rotar a la izquierda">
                                                                                            <i class="fa fa-undo" aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </button>
                                                                                    <button id="btnRotateRT3" type="button" class="btn btn-primary" title="Rotar a la derecha">
                                                                                        <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Rotar a la derecha">
                                                                                            <i class="fa fa-repeat" aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        <br>
                                                                    </div>
                                                                    <div class="modal-footer content__cropper">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>    
                                                                        <button type="button" class="btn btn-primary" id="cropThumb3">Recortar</button>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <br>
                                                    <div class="col-sm-12">
                                                        <label>Thumb (jpg, jpeg, png - Máximo de 5MB c/u)</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="row row__content__image">
                                                            <div class="col">
                                                                <label class="label" data-toggle="tooltip" title="Change your avatar">
                                                                <img class="rounded" id="avatarThumbs1" src="images/logo_subir_imagen.png" alt="avatar">
                                                                <input type="file" class="sr-only" id="inputThumbs1" name="image" accept=".png, .jpg, .jpeg">
                                                            </div>
                                                            <div class="col" style="display:none;">
                                                                <label class="label" data-toggle="tooltip" title="Change your avatar">
                                                                <img class="rounded" id="avatarThumbs2" src="images/logo_subir_imagen.png" alt="avatar">
                                                                <input type="file" class="sr-only" id="inputThumbs2" name="image" accept=".png, .jpg, .jpeg">
                                                            </div>
                                                            <div class="col" style="display:none;">
                                                                <label class="label" data-toggle="tooltip" title="Change your avatar">
                                                                <img class="rounded" id="avatarThumbs3" src="images/logo_subir_imagen.png" alt="avatar">
                                                                <input type="file" class="sr-only" id="inputThumbs3" name="image" accept=".png, .jpg, .jpeg">
                                                            </div>
                                                        </div>
                                                        <!-- <input id="thumbMini" type="file" accept=".jpg,jpeg,png"/>
                                                        <input id="thumbMini2" type="file" accept=".jpg,jpeg,png"/>
                                                        <input id="thumbMini3" type="file" accept=".jpg,jpeg,png"/> -->
                                                    </div>
                                                    <div class="container">
                                                        <div class="modal fade" id="modalThumbs1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalLabel">Recorte de imagen</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body content__cropper">
                                                                    <div class="img-container">
                                                                    <img id="imageThumbs1" src="https://avatars0.githubusercontent.com/u/3456749">
                                                                    </div>
                                                                    <br>
                                                                        <div class="content-btn-controls">
                                                                            <div class="btn-move">
                                                                                <button id="btnMoveLeftTs1" type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Mover Izq.">
                                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Izq.">
                                                                                        <span class="fa fa-arrow-left"></span>
                                                                                    </span>
                                                                                </button>
                                                                                <button id="btnMoveRightTs1" type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Mover Derecha" >
                                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Derecha">
                                                                                        <span class="fa fa-arrow-right"></span>
                                                                                    </span>
                                                                                </button>
                                                                                <button id="btnMoveUpTs1" type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Mover Arriba">
                                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Arriba">
                                                                                        <span class="fa fa-arrow-up"></span>
                                                                                    </span>
                                                                                </button>
                                                                                <button id="btnMoveDownTs1" type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Mover Abajo">
                                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Abajo">
                                                                                        <span class="fa fa-arrow-down"></span>
                                                                                    </span>
                                                                                </button>
                                                                            
                                                                                <button id="btnZoomPlusTs1" type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
                                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Zoom In">
                                                                                        <span class="fa fa-search-plus"></span>
                                                                                    </span>
                                                                                </button>
                                                                                <button id="btnZoomMinusTs1" type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
                                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Zoom Out)">
                                                                                        <span class="fa fa-search-minus"></span>
                                                                                    </span>
                                                                                </button>
                                                                        
                                                                                <button id="btnRotateLTs1" type="button" class="btn btn-primary" title="Rotar a la izquierda">
                                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Rotar a la izquierda">
                                                                                        <i class="fa fa-undo" aria-hidden="true"></i>
                                                                                    </span>
                                                                                </button>
                                                                                <button id="btnRotateRTs1" type="button" class="btn btn-primary" title="Rotar a la derecha">
                                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Rotar a la derecha">
                                                                                        <i class="fa fa-repeat" aria-hidden="true"></i>
                                                                                    </span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    <br>
                                                                </div>
                                                                <div class="modal-footer content__cropper">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="button" class="btn btn-primary" id="cropThumbs1">Recortar</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal fade" id="modalThumbs2" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalLabel">Recorte de imagen</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body content__cropper">
                                                                    <div class="img-container">
                                                                    <img id="imageThumbs2" src="https://avatars0.githubusercontent.com/u/3456749">
                                                                    </div>
                                                                    <br>
                                                                        <div class="content-btn-controls">
                                                                            <div class="btn-move">
                                                                                <button id="btnMoveLeftTs2" type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Mover Izq.">
                                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Izq.">
                                                                                        <span class="fa fa-arrow-left"></span>
                                                                                    </span>
                                                                                </button>
                                                                                <button id="btnMoveRightTs2" type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Mover Derecha" >
                                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Derecha">
                                                                                        <span class="fa fa-arrow-right"></span>
                                                                                    </span>
                                                                                </button>
                                                                                <button id="btnMoveUpTs2" type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Mover Arriba">
                                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Arriba">
                                                                                        <span class="fa fa-arrow-up"></span>
                                                                                    </span>
                                                                                </button>
                                                                                <button id="btnMoveDownTs2" type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Mover Abajo">
                                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Abajo">
                                                                                        <span class="fa fa-arrow-down"></span>
                                                                                    </span>
                                                                                </button>
                                                                            
                                                                                <button id="btnZoomPlusTs2" type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
                                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Zoom In">
                                                                                        <span class="fa fa-search-plus"></span>
                                                                                    </span>
                                                                                </button>
                                                                                <button id="btnZoomMinusTs2" type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
                                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Zoom Out)">
                                                                                        <span class="fa fa-search-minus"></span>
                                                                                    </span>
                                                                                </button>
                                                                        
                                                                                <button id="btnRotateLTs2" type="button" class="btn btn-primary" title="Rotar a la izquierda">
                                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Rotar a la izquierda">
                                                                                        <i class="fa fa-undo" aria-hidden="true"></i>
                                                                                    </span>
                                                                                </button>
                                                                                <button id="btnRotateRTs2" type="button" class="btn btn-primary" title="Rotar a la derecha">
                                                                                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Rotar a la derecha">
                                                                                        <i class="fa fa-repeat" aria-hidden="true"></i>
                                                                                    </span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    <br>
                                                                </div>
                                                                <div class="modal-footer content__cropper">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="button" class="btn btn-primary" id="cropThumbs2">Recortar</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal fade" id="modalThumbs3" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalLabel">Recorte de imagen</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body content__cropper">
                                                                    <div class="img-container">
                                                                    <img id="imageThumbs3" src="https://avatars0.githubusercontent.com/u/3456749">
                                                                    </div>
                                                                    <br>
                                                                    <div class="content-btn-controls">
                                                                        <div class="btn-move">
                                                                            <button id="btnMoveLeftTs3" type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Mover Izq.">
                                                                                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Izq.">
                                                                                    <span class="fa fa-arrow-left"></span>
                                                                                </span>
                                                                            </button>
                                                                            <button id="btnMoveRightTs3" type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Mover Derecha" >
                                                                                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Derecha">
                                                                                    <span class="fa fa-arrow-right"></span>
                                                                                </span>
                                                                            </button>
                                                                            <button id="btnMoveUpTs3" type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Mover Arriba">
                                                                                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Arriba">
                                                                                    <span class="fa fa-arrow-up"></span>
                                                                                </span>
                                                                            </button>
                                                                            <button id="btnMoveDownTs3" type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Mover Abajo">
                                                                                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Abajo">
                                                                                    <span class="fa fa-arrow-down"></span>
                                                                                </span>
                                                                            </button>
                                                                        
                                                                            <button id="btnZoomPlusTs3" type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
                                                                                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Zoom In">
                                                                                    <span class="fa fa-search-plus"></span>
                                                                                </span>
                                                                            </button>
                                                                            <button id="btnZoomMinusTs3" type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
                                                                                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Zoom Out)">
                                                                                    <span class="fa fa-search-minus"></span>
                                                                                </span>
                                                                            </button>
                                                                    
                                                                            <button id="btnRotateLTs3" type="button" class="btn btn-primary" title="Rotar a la izquierda">
                                                                                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Rotar a la izquierda">
                                                                                    <i class="fa fa-undo" aria-hidden="true"></i>
                                                                                </span>
                                                                            </button>
                                                                            <button id="btnRotateRTs3" type="button" class="btn btn-primary" title="Rotar a la derecha">
                                                                                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Rotar a la derecha">
                                                                                    <i class="fa fa-repeat" aria-hidden="true"></i>
                                                                                </span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                </div>
                                                                <div class="modal-footer content__cropper">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>    
                                                                    <button type="button" class="btn btn-primary" id="cropThumbs3">Recortar</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Incluir descuento *</label>
                                                            <select id="check_descuento" class="form-control">
                                                                <option value="0">No</option>
                                                                <option value="1">Sí</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <?php include('includes/templates/crear/descuento-canastaproducto.php'); ?>

                                                    <div class="col col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Publicar *</label>
                                                            <select id="disponible" class="form-control">
                                                                <option selected>----</option>
                                                                <option value="0">No</option>
                                                                <option value="1">Sí</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Datos de facilitador -->
                                        <div class="card card-blue direct-chat direct-chat-dark">
                                            <div class="card-header card-personalizado" >
                                                <h3 class="card-title">Datos de facilitador</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row g-3">
                                                    <div class="col col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Nombre de facilitador</label>
                                                            <input
                                                                type="text"
                                                                id="nameFacilitador"
                                                                class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12" style="display : none;">
                                                        <div class="form-group">
                                                            <label>Posición de facilitador</label>
                                                            <input
                                                                type="text"
                                                                id="positionFacilitador"
                                                                class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12" style="display:none;">
                                                        <div class="form-group">
                                                            <label>Link facilitador</label>
                                                            <input
                                                                type="text"
                                                                id="linkCourseWorks"
                                                                class="form-control"
                                                                placeholder="https://granjatequio.com/ejemplo-red-social.html">
                                                        </div>
                                                    </div>

                                                    <div class="col col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Whatsapp</label>
                                                            <input
                                                                type="text"
                                                                id="whatsFacilitador"
                                                                class="form-control"
                                                                placeholder="1234567890"
                                                                maxlength="10"
                                                                >
                                                        </div>
                                                    </div>

                                                    <div class="col col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Telefono</label>
                                                            <input
                                                                type="text"
                                                                id="telFacilitador"
                                                                class="form-control"
                                                                placeholder="1234567890"
                                                                maxlength="10"
                                                                >
                                                        </div>
                                                    </div>

                                                    <div class="col col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input
                                                                type="text"
                                                                id="emailFacilitador"
                                                                class="form-control"
                                                                placeholder="correo@gmail.com"
                                                                maxlength="30"
                                                                >
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <label>Imagen de facilitador (jpg, jpeg, png - Máximo 5MB)</label>
                                                    </div>
                                                    <div class="col-sm-12 row__content__image__only">
                                                        <label class="label" data-toggle="tooltip" title="Change your avatar">
                                                            <img class="rounded" id="avatarFacilitador" src="images/logo_subir_imagen.png" alt="avatar">
                                                            <input type="file" class="sr-only" id="inputFacilitador" name="image" accept=".png, .jpg, .jpeg">
                                                        </label>
                                                    </div>
                                                    
                                                    <div class="container">
                                                        <div class="modal fade" id="modalFacilitador" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalLabel">Crop the image</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="img-container">
                                                                    <img id="imageFacilitador" src="https://avatars0.githubusercontent.com/u/3456749">
                                                                    </div>
                                                                    <br>
                                                                    <div class="content-btn-controls">
                                                                        <div class="btn-move">
                                                                            <button id="btnMoveLeftFa" type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Mover Izq.">
                                                                                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Izq.">
                                                                                    <span class="fa fa-arrow-left"></span>
                                                                                </span>
                                                                            </button>
                                                                            <button id="btnMoveRightFa" type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Mover Derecha" >
                                                                                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Derecha">
                                                                                    <span class="fa fa-arrow-right"></span>
                                                                                </span>
                                                                            </button>
                                                                            <button id="btnMoveUpFa" type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Mover Arriba">
                                                                                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Arriba">
                                                                                    <span class="fa fa-arrow-up"></span>
                                                                                </span>
                                                                            </button>
                                                                            <button id="btnMoveDownFa" type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Mover Abajo">
                                                                                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Abajo">
                                                                                    <span class="fa fa-arrow-down"></span>
                                                                                </span>
                                                                            </button>
                                                                        
                                                                            <button id="btnZoomPlusFa" type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
                                                                                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Zoom In">
                                                                                    <span class="fa fa-search-plus"></span>
                                                                                </span>
                                                                            </button>
                                                                            <button id="btnZoomMinusFa" type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
                                                                                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Zoom Out)">
                                                                                    <span class="fa fa-search-minus"></span>
                                                                                </span>
                                                                            </button>
                                                                    
                                                                            <button id="btnRotateLFa" type="button" class="btn btn-primary" title="Rotar a la izquierda">
                                                                                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Rotar a la izquierda">
                                                                                    <i class="fa fa-undo" aria-hidden="true"></i>
                                                                                </span>
                                                                            </button>
                                                                            <button id="btnRotateRFa" type="button" class="btn btn-primary" title="Rotar a la derecha">
                                                                                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Rotar a la derecha">
                                                                                    <i class="fa fa-repeat" aria-hidden="true"></i>
                                                                                </span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="button" class="btn btn-primary" id="cropFacilitador">Recortar</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Datos de nota de blog -->
                                        <div class="card card-blue direct-chat direct-chat-dark">
                                            <div class="card-header card-personalizado" >
                                                <h3 class="card-title">Datos del Certificado</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="col-sm-12">
                                                    <div class="form-group" style="display:none;">
                                                        <label>Nombre de nota</label>
                                                        <input
                                                            type="text"
                                                            id="nameNoteBlog"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12" style="display:none;">
                                                    <div class="form-group">
                                                        <label>Fecha</label>
                                                        <input
                                                            type="text"
                                                            id="dateNoteBlog"
                                                            class="form-control"
                                                            placeholder="1 - 5 enero de 2022">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12" style="display:none;">
                                                    <div class="form-group">
                                                        <label>Impartido por</label>
                                                        <input
                                                            type="text"
                                                            id="nameFacilitadorNoteBlog"
                                                            class="form-control"
                                                            placeholder="Nombre del facilitador">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Etiqueta de referencia</label>
                                                    <input
                                                            type="text"
                                                            id="typeTagImage"
                                                            class="form-control"
                                                            placeholder="Diploma">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Imagen del certificado (jpg, jpeg, png - Máximo 5MB)</label>
                                                </div>
                                                <div class="col-sm-12 row__content__image__only">
                                                    <!-- <input id="imageBlog" type="file" accept=".jpg,jpeg,png"/> -->
                                                    <label class="label" data-toggle="tooltip" title="Change your avatar">
                                                        <img class="rounded" id="avatarNota" src="images/logo_subir_imagen.png" alt="avatar">
                                                        <input type="file" class="sr-only" id="inputNota" name="image" accept=".png, .jpg, .jpeg">

                                                        <button type="button" class="btn botonFormulario" id="btnDeleteImage"  data-origin="create" style="width:80%; margin:15px; display:none" >Limpiar</button>
                                                    </label>
                                                    
                                                </div>
                                                <div class="container">
                                                    <div class="modal fade" id="modalNota" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalLabel">Recorte de imagen</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body content__cropper">
                                                                <div class="img-container">
                                                                <img id="imageNota" src="https://avatars0.githubusercontent.com/u/3456749">
                                                                </div>
                                                                <br>
                                                                <div class="content-btn-controls">
                                                                    <div class="btn-move">
                                                                        <button id="btnMoveLeftNo" type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Mover Izq.">
                                                                            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Izq.">
                                                                                <span class="fa fa-arrow-left"></span>
                                                                            </span>
                                                                        </button>
                                                                        <button id="btnMoveRightNo" type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Mover Derecha" >
                                                                            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Derecha">
                                                                                <span class="fa fa-arrow-right"></span>
                                                                            </span>
                                                                        </button>
                                                                        <button id="btnMoveUpNo" type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Mover Arriba">
                                                                            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Arriba">
                                                                                <span class="fa fa-arrow-up"></span>
                                                                            </span>
                                                                        </button>
                                                                        <button id="btnMoveDownNo" type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Mover Abajo">
                                                                            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Mover Abajo">
                                                                                <span class="fa fa-arrow-down"></span>
                                                                            </span>
                                                                        </button>
                                                                    
                                                                        <button id="btnZoomPlusNo" type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
                                                                            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Zoom In">
                                                                                <span class="fa fa-search-plus"></span>
                                                                            </span>
                                                                        </button>
                                                                        <button id="btnZoomMinusNo" type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
                                                                            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Zoom Out)">
                                                                                <span class="fa fa-search-minus"></span>
                                                                            </span>
                                                                        </button>
                                                                
                                                                        <button id="btnRotateLNo" type="button" class="btn btn-primary" title="Rotar a la izquierda">
                                                                            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Rotar a la izquierda">
                                                                                <i class="fa fa-undo" aria-hidden="true"></i>
                                                                            </span>
                                                                        </button>
                                                                        <button id="btnRotateRNo" type="button" class="btn btn-primary" title="Rotar a la derecha">
                                                                            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Rotar a la derecha">
                                                                                <i class="fa fa-repeat" aria-hidden="true"></i>
                                                                            </span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                            </div>
                                                            <div class="modal-footer content__cropper">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <button type="button" class="btn btn-primary" id="cropNota">Recortar</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-12" style="display:none;">
                                                    <div class="form-group">
                                                        <label>Link de nota</label>
                                                        <input
                                                            type="text"
                                                            id="linkNoteBlog"
                                                            class="form-control"
                                                            placeholder="https://granjatequio.com/ejmplo-link -nota">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="hidden" id="tipo" value="canastaproducto">
                                            <button type="submit" class="btn botonFormulario">Crear</button>
                                            <a href="index.php?id=diploma_curos_talleres" class="btn botonFormulario" >Cancelar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->