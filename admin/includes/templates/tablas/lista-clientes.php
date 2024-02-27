<?php
  require_once('php/clientes/consulta_clientes.php');
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
                  <th>ID Solicitud</th>
                  <th>Nombre</th>
                  <th>Apellido primario</th>
                  <th>Apellido secundario</th>
                  <th>Email</th>
                  <th>Teléfono</th>
                  <th>Código postal</th>
                  <th>Estado</th>
                  <th>Municipio</th>
                  <th>Fecha solicitud</th>
                </tr>
                </thead>
                <tbody>
                  <?php  mostrar_clientes_cursos(); ?>
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
    