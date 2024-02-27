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
                  <th>Detalle compra</th>
                  <th>ID compra</th>
                  <th>Fecha pago</th>
                  <th>Status del pago</th>
                  <th>Nombre</th>
                  <th>Apellido primario</th>
                  <th>Apellido secundario</th>
                </tr>
                </thead>
                <tbody align="center">
                  <?php mostrar_cursos_cobros(); ?>
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


<div class="modal fade modalCustom1" id="divModal" tabindex="-1" role="dialog" aria-labelledby="divModal" aria-hidden="true">
    <div class="modal-dialog modal-xll" role="document"><!-- clase 'modal-lg' para ampliar-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-content">
                    <div class="modal-body">
                       
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>