<?php

$accion = '';
include 'includes/funciones/logueo.php';
require_once('php/conexion.php');
require_once('php/consulta.php');
require_once('php/consulta_tablas.php');
require_once('php/consulta_inputs.php');
require_once('php/consulta_listas.php');
require_once('php/consulta_editar.php');
require_once('php/consulta_editar2.php');
if ($_SESSION['id_logueo'] === "") {
  header('Location: login.php');
}



?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="images/icons/favicon.ico" type="image/x-icon">
  <title>Boletera Spivet - Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css?v=<?= time() ?>">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  <!-- checkbox Datatables -->
  <link rel="stylesheet" href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.7/css/dataTables.checkboxes.css">

  
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@4/dist/css/bootstrap.min.css" crossorigin="anonymous">

  <!-- Cropper css -->
  <link rel="stylesheet" href="css/cropper.css">
  


  <!-- input telefono con bandera  -->
  <link rel="stylesheet" href="tools/inputtelephone/css/intlTelInput.css">
  <link rel="stylesheet" href="tools/inputtelephone/css/demo.css">


  <!-- CODIGO YAGUA - PIQUERO -->
  <?php
  $administrador = $_SESSION['id_logueo'];

  $id = "";
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }

  /*
    <div class="loader" id='loader'></div>

    <div id="contentSpinnerPrimary" class="content-spinner">
      <div class="spinner-body">
        <span id="txtSpanSpinner" class="txtSpanSpinner">Cargando</span>
        <div class="spinner-circle"></div>
        <div class="spinner-circle1"></div>
        <div class="spinner-circle2"></div>
        <div class="spinner-circle3"></div>
        <div class="spinner-circle4"></div>
        <div class="spinner-circle5"></div>
      </div>
    </div>
  */
  ?>

    <?php if( $id == 'checkin' ){ ?>
        <link rel="stylesheet" href="css/checkin.min.css">
    <?php } ?>
    <?php if( strpos($id, "design_diploma") !== false ){?>
        <link rel="stylesheet" href="css/design_diploma.min.css?v=<?= time() ?>"> 
    <?php } ?>
    <?php if( strpos($id, "design_credencial") !== false ){?>
        <link rel="stylesheet" href="css/design_credencial.min.css?v=<?= time() ?>"> 
    <?php } ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  
  <div id="contentSpinnerPrimary" class="spinner" ><span class="loader"></span></div>

  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" id="collapseMenu" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->