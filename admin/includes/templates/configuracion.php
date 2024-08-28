<section class="content">
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <!--<div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>-->
                <div id="numeroAccion" style="display: none" ><span></span></div>
                <div class="card-body" style="width:100%; height:100%; overflow: scroll;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Configuraciones </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php mostrar_configuraciones(); ?>
                        </tbody>
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