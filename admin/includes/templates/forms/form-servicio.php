<?php
  require_once('php/servicios/consulta_servicios.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->

                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card-header">

                            <?php if( isset($accion) && $accion === 'editar-servicios' ){ ?>
                                        <h3 class="card-title">Editar servicio</h3>
                            <?php }else{ ?>
                                        <h3 class="card-title">Crear servicio</h3>
                            <?php } ?>

                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="editarCampos" action="#" method="post" autocomplete="off">
                                <div class="row">
                                    
                                    <div class="col-sm-12 row">

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Nombre*:</label>
                                                <input
                                                    type="text"
                                                    id="name"
                                                    class="form-control"
                                                    maxlength="49"
                                                    placeholder="texto"
                                                
                                                    >
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Categoría*:</label>
                                                <select id="categorie" class="form-control"  >
                                                     <?php echo list_categories_services(0,'seleccionar'); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                        </div>


                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Descripción:</label>
                                                <textarea id="longDescription"></textarea>
                                                <div id="longDescription_count"></div>
                                            </div>
                                        </div>


                                         <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Mostrar en el home*:</label>
                                                <select id="show_home" class="form-control">
                                                    <option value="0" selected>No</option>
                                                    <option value="1">Si</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Orden*:</label>
                                                <input
                                                    type="text"
                                                    id="orden"
                                                    class="form-control"
                                                    maxlength="6"
                                                    placeholder="número"
                                                
                                                    >
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Publicar*:</label>
                                                <select id="publish" class="form-control">
                                                    <option selected>----</option>
                                                    <option value="0">No</option>
                                                    <option value="1">Sí</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                        </div>



                                        <div class="col-sm-4 customBorder1">
                                            <div class="form-group" >
                                                
                                                <?php if( isset($accion) && $accion === 'editar-servicios' ){ ?>
                                                            <label class="form-label">Actualizar imagen:</label> <span id="currentImagen"></span><br>
                                                <?php }else{ ?>
                                                            <label class="form-label">Adjuntar imagen:</label><br>
                                                <?php } ?>

                                               <img class="rounded" id="previewImage1" width="100" height="100" src="images/components/empty_image.png" alt="preview" onclick="previewCropper(this,'inputImage1')" style="cursor: pointer;">
                                               
                                               <?php 
                                                    //parametros inputCropper: inputFile,IDpreview,widthPreview,heightPreview,widthSaved,heightSaved,typeCrop,minWidthCrop,minHeightCrop,maxWidthCrop,maxHeightCrop,event
                                                    // (cuando se quiere una imagen cuadrada) si typeCrop es 1 no se usan los valores de los parametros minWidthCrop,minHeightCrop,maxWidthCrop,maxHeightCrop
                                                    // (cuando se quiere una imagen rectangular) si typeCrop es 2 se usan los valores de los parametros minWidthCrop,minHeightCrop,maxWidthCrop,maxHeightCrop
                                                ?>
                                               <input type="file" class="sr-only" id="inputImage1" name="image" accept="image/*" onchange="inputCropper(this,'previewImage1',80,80,346,346,1,0,0,0,0,event)">
                                               <br>
                                               <button type="button" class="btn botonFormulario" id="previewImage1_delete" style="display:none;margin-top:5px;" onclick="cleanPreview(this,'previewImage1',event)">Cambiar imagen</button>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                        </div>




                                       

                                        <div class="col-sm-12">

                                            <?php if( isset($accion) && $accion === 'editar-servicios' ){ ?>
                                                    <input type="hidden" id="operation" value="edit">
                                                    <input type="hidden" id="code" value="<?php echo $idregistro;?>">
                                                   
                                        <?php }else{ ?>
                                                    <input type="hidden" id="operation" value="create">
                                        <?php } ?>

                                            <button type="submit" class="btn botonFormulario">Guardar</button>
                                            <a href="index.php?id=servicios" class="btn botonFormulario" >Cancelar</a>
                                        </div>

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


<!-- CROPPER -->
<button type="button" id="showModalCropper" class="btn btn-primary" data-toggle="modal" data-target="#modalCropper" hidden></button>

<div class="modal fade" id="modalCropper" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Recorte su foto</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" id="closeModalx"></button>
      </div>
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