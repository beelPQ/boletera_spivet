<?php
  require_once('php/servicios/consulta_servicios.php');
?>

<section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!--<div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>-->
            <div id="numeroAccion" style="display: none"></div>
            <div class="card-body" style="overflow: auto;">
              <table id="customTable1" class="table table-bordered table-striped" style="overflow-x: scroll;">
                <thead>
                <tr align="center">
                  <th></th>
                  <th>Nombre</th>
                  <th>Categoría</th>
                  <th>Descrcripción</th>
                  <th>Imagen</th>
                  <th>Aparecer en home</th>
                  <th>Orden</th>
                  <th>Publicado</th>
                </tr>
                </thead>
                <tbody>
                  <?php  mostrar_servicios_cursos(); ?>
                </tbody>
                <tfoot>
                
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    