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
                  <th>Tipo</th>
                  <th>Cantidad(MXN ó %)</th>
                  <!--<th>Cantidad(USD)</th>-->
                  <th>Existencias</th>
                  <th>Válido desde</th>
                  <th>Válido hasta</th>
                  <th>Código</th>
                  <th>Estatus</th>
                  <th>Motivo</th>
                </tr>
                </thead>
                <tbody>
                  <?php mostrar_cupones(); ?>
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
    