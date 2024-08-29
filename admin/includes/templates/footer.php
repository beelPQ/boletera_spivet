</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Copyright &copy; <?= date('Y') ?> <a href="https://piquero.com.mx" class="custom_link1" target="_blank">Piquero Tec</a>.</strong>
  Todos los derechos reservados.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0.0 <b>Piquero Tec</b>
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<!-- <script src="plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!--datatables-->
<script src="js/jquery.dataTables.js"></script>
<script src="js/dataTables.bootstrap4.js"></script>


<?php //---------------------------------JSs COMPONENTES-----------------------------------------------------------------------------------------------?>

      <?php if( $accion === 'editar-clientes' ){ ?>
              <!-- input telefono con bandera  -->
              <script src="tools/inputtelephone/js/intlTelInput.js"></script>
    <?php } ?>

    <?php if( $id === 'crear_servicio' || $accion === 'editar-servicios' ){ ?>
        <!-- Editor CKeditor -->
        <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/super-build/ckeditor.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/super-build/translations/es.js"></script>
        <script type="text/javascript" src="tools/ckeditor/custom_functions_ckeditor.js"></script>
    
<?php } ?>

<?php if( $id === 'crear_servicio' || $accion === 'editar-servicios' ){ ?>
        <!-- cropper -->
        <script type="text/javascript" src="tools/cropper/cropper.js"></script>
        <script type="text/javascript" src="tools/cropper/custom_functions_cropper.js"></script>
        
<?php } ?>

<?php //---------------------------------FIN JSs COMPONENTES-----------------------------------------------------------------------------------------------?>



<?php if ( $accion === 'editar-clientes' ) { ?>
  <script src="js/clientes/form-cliente.js?v=<?= time() ?>"></script>
<?php } ?>


<?php if ($id === 'crear_empresa' || $id === 'crear_usuario' || $id === 'crear_cupon') { ?>
  <script src="js/crear.js?v=<?= time() ?>"></script>
<?php } ?>


<?php if ($id === 'cursos_cobros') { ?>
  <script src="js/cursos_cobros.js?v=<?= time() ?>"></script>
<?php } ?>

<?php if ($id === 'crear_cupon' || $accion === 'editar-cupones') { ?>
  <script src="js/form_cupon.js?v=<?= time() ?>"></script>
<?php } ?>


<?php if ( $id === 'crear_servicio' || $accion === 'editar-servicios' ) { ?>
  <script src="js/servicios/form-servicio.js?v=<?= time() ?>"></script>
<?php } ?>


<?php if ($id === 'diploma_curos_talleres') { ?>
  <script src="js/displomasCusosTalleres.js?v=<?= time() ?>"></script>
<?php } ?>

<?php if ($id === 'crear_diplomasCurosTaller' || $accion == 'editar-diplomasCurosTaller') { ?>
  <!-- <script src="node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script> -->
  <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/super-build/ckeditor.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/super-build/translations/es.js"></script>
  <script src="https://unpkg.com/jquery@3/dist/jquery.min.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/bootstrap@4/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/cropper.js?v=<?= time() ?>"></script>

  <script src="js/cropperActions.js?v=<?= time() ?>"></script>
  <script src="js/form_displomasCusosTalleres.js?v=<?= time() ?>"></script>
<?php } ?>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.16/sorting/datetime-moment.js"></script>

<script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.7/js/dataTables.checkboxes.min.js"></script>

<?php if ($accion == 'editar-empresa' || $accion == 'editar_configuracion' || $accion === 'editar-cupones' ||  strpos($id, 'editar-usuarios')) { ?>
  <script src="js/editar.js?v=<?= time() ?>"></script>
<?php } ?>

<?php if( $id == 'checkin' ){ ?>
        <!-- input telefono con bandera  -->
        <!--<script src="tools/inputtelephone/js/intlTelInput.js"></script>-->
        <script src="js/checkin/checkin.min.js?v=<?= time() ?>"></script>
<?php } ?>

<?php if( $id != 'checkin' ){ ?><script src="js/irEditar.js?v=<?= time() ?>"></script><?php } ?>


<?php if( strpos($id, "design_diploma") !== false ){?>
    <script src="js/design/design_diploma.min.js?v=<?= time() ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
<?php  } ?>

<?php if( strpos($id, "design_credencial") !== false ){?>
    <script src="js/design/design_credencial.min.js?v=<?= time() ?>"></script> 
    <script src="https://unpkg.com/jquery@3/dist/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap@4/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    
    <script src="js/cropper/custom_functions_cropper.js?v=<?= time() ?>"></script> 
    <script src="js/cropper/cropper.js?v=<?= time() ?>"></script> 
<?php  } ?>

<script src="js/acciones.js?v=<?= time() ?>"></script>
<script>
  <?php if ($id == 'diploma_curos_talleres' || $id == 'cursos_cobros' || $id == 'cupones' || $id == 'clientes' || $id == 'servicios' || $id == 'usuarios' || $id == 'lista-cursos-design' ) { 

       

        if($id == 'diploma_curos_talleres' || $id == 'servicios' || $id == 'lista-cursos-design' ){
  ?>
          let customTable1_order_column = [1,'asc'];
  <?php
        }else if($id == 'cursos_cobros'){
  ?>
          let customTable1_order_column = [2,'desc'];
  <?php
        }else{
  ?>
          let customTable1_order_column = [1,'desc'];
  <?php
        }

    ?>
   
    const table = $("#customTable1").DataTable({
      'columnDefs': [{
        'targets': 0,
        'checkboxes': {
          'selectRow': true,
          'selectAllPages': false
        }
      }],
      'select': {
        'style': 'multi'
      },
      'order': [customTable1_order_column],
      "language": {
        "paginate": {
          "previous": "Página anterior",
          "next": "Página siguiente"
        }
      },
      "scrollX": true,
      stateSave: true,
    });

  <?php } ?>


  $(function() {
    $("#example1").DataTable({
      stateSave: true,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      stateSave: true,
    });
  });

  window.addEventListener("load", function(event) {
    document.querySelector(`#contentSpinnerPrimary`).style.display = 'none';
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

</body>

</html>