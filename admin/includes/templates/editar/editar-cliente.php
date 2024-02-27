<?php
  require_once('php/clientes/consulta_clientes.php');
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
                            <h3 class="card-title">Editar cliente</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="editarCampos" action="#" method="post" autocomplete="off">
                                <div class="row">
                                    <?php
                                        editar_cliente_cursos($idregistro); 
                                    ?>
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