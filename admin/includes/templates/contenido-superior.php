  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header center">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <?php if ($id === '') {

            ?>
              <h1 class="m-0 text-dark">BIENVENID@ <?php echo $_SESSION['username_logueo']; ?> </h1>
              <div align="center"><img src="images/logos/spivet.png" alt="agregar" style="opacity: .8" width="25%" height="25%"> </div>
            <?php } ?>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <?php if ($id === "") : ?>

        <?php elseif ($id === "clientes" && $_SESSION['id_rol'] == 1) : ?>
        
                  <div class="row">

                    <?php $valor = "clientes"; ?>

                    <div class="col-lg-2 col-12">
                        <!-- small box -->
                        <div class="small-box bg-info boton-background">
                            <a  href="#" id="editarRegistro2" class="small-box-footer"><img src="images/edit.svg" alt="Editar" style="opacity: .8; margin: 0px 3px 0px 0px"  width="30"  >Editar</a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-12">
                        <!-- small box -->
                        <div class="small-box bg-info boton-background">
                            <a href="javascript:window.print()"  class="small-box-footer"><img src="images/printer.svg" alt="Imprimir" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" >Imprimir</a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-12">
                        <!-- small box -->
                        <div class="small-box bg-info boton-background">
                            <a  id="descargar" href="#"  class="small-box-footer"><img src="images/download.svg" alt="Descargar" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" >Descargar</a>
                        </div>
                    </div>

                  </div>

        <?php elseif ($id === "empresas" && $_SESSION['id_rol'] == 1) : ?>
          <div class="row">
            <!--
            <div class="col-lg-3 col-12">
                <div class="small-box bg-info boton-background">
                  <a href="index.php?id=crear_empresa" class="small-box-footer"><img src="images/agregar.png" alt="agregar" style="opacity: .8; margin: 0px 3px 0px 0px">  Crear</a>
                </div>
             </div>
             -->
            <?php $valor = "empresas";
            mostrar_acciones_adicionales($valor); ?>
            <!-- ./col -->
          </div>

        <?php elseif ($id === "cursos_cobros" && ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 3)) : ?>
          <div class="row">

            <?php $valor = "cursos_cobros";
            mostrar_acciones_adicionales2($valor); ?>
            <!-- ./col -->
          </div>

        <?php elseif ($id === "cupones" && ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 4)) : ?>
          <div class="row">
            <div class="col-lg-3 col-12">
              <!-- small box -->

              <div class="small-box bg-info boton-background">
                <a href="index.php?id=crear_cupon" class="small-box-footer"><img src="images/add.svg" alt="Crear" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" > Crear</a>
              </div>

            </div>
            <?php $valor = "cupones";
            mostrar_acciones_adicionales2($valor); ?>
            <!-- ./col -->
          </div>

         <?php elseif ($id === "servicios" && $_SESSION['id_rol'] == 1) : ?>
        
                  <div class="row">

                    <?php $valor = "servicio"; ?>

                    <div class="col-lg-3 col-12">
                      <!-- small box -->

                      <div class="small-box bg-info boton-background">
                        <a href="index.php?id=crear_<?php echo $valor; ?>" class="small-box-footer"><img src="images/add.svg" alt="Crear" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" >Crear</a>
                      </div>

                    </div>

                    <div class="col-lg-2 col-12">
                        <!-- small box -->
                        <div class="small-box bg-info boton-background">
                            <a  href="#" id="editarRegistro2" class="small-box-footer"><img src="images/edit.svg" alt="Editar" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" >Editar</a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-12">
                        <!-- small box -->
                        <div class="small-box bg-info boton-background">
                            <a  href="#" id="eliminarRegistro2" class="small-box-footer"><img src="images/delete.svg" alt="Eliminar" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" >Eliminar</a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-12">
                        <!-- small box -->
                        <div class="small-box bg-info boton-background">
                            <a href="javascript:window.print()"  class="small-box-footer"><img src="images/printer.svg" alt="Imprimir" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" >Imprimir</a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-12">
                        <!-- small box -->
                        <div class="small-box bg-info boton-background">
                            <a  id="descargar" href="#"  class="small-box-footer"><img src="images/download.svg" alt="Descargar" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" >Descargar</a>
                        </div>
                    </div>

                  </div>

        <?php elseif ($id === "configuracion" && $_SESSION['id_rol'] == 1) : ?>
          <div class="row">
            <div class="col-lg-3 col-12">
              <!-- small box -->

              <div class="small-box bg-info boton-background">
                <a href="index.php?id=editar_configuracion" class="small-box-footer"><img src="images/edit.svg" alt="Editar" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" > Editar</a>
              </div>

            </div>
            <?php $valor = "configuracion";
            mostrar_acciones_adicionales($valor); ?>
            <!-- ./col -->
          </div>
        <?php elseif ($id === "usuarios" && $_SESSION['id_rol'] == 1) : ?>
          <div class="row">
            <div class="col-lg-3 col-12">
              <!-- small box -->

              <div class="small-box bg-info boton-background">
                <a href="index.php?id=crear_usuario" class="small-box-footer"><img src="images/add.svg" alt="Crear" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" > Crear</a>
              </div>

            </div>
            
            <div class="col-lg-2 col-12">
                <!-- small box -->
                <div class="small-box bg-info boton-background">
                    <a  href="#" id="editarRegistro2" class="small-box-footer"><img src="images/edit.svg" alt="Editar" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" >Editar</a>
                </div>
            </div>

            <div class="col-lg-2 col-12">
                <!-- small box -->
                <div class="small-box bg-info boton-background">
                    <a  href="#" id="eliminarRegistro2" class="small-box-footer"><img src="images/delete.svg" alt="Eliminar" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" >Eliminar</a>
                </div>
            </div>

            <div class="col-lg-2 col-12">
                <!-- small box -->
                <div class="small-box bg-info boton-background">
                    <a href="javascript:window.print()"  class="small-box-footer"><img src="images/printer.svg" alt="Imprimir" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" >Imprimir</a>
                </div>
            </div>

            <div class="col-lg-2 col-12">
                <!-- small box -->
                <div class="small-box bg-info boton-background">
                    <a  id="descargar" href="#"  class="small-box-footer"><img src="images/download.svg" alt="Descargar" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" >Descargar</a>
                </div>
            </div>
          </div>

        <?php elseif ($id === "diploma_curos_talleres" && ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 4)) : ?>
          <div class="row">
            <div class="col-lg-3 col-12">
              <div class="small-box bg-info boton-background">
                <a href="index.php?id=crear_diplomasCurosTaller" class="small-box-footer"><img src="images/add.svg" alt="Crear" style="opacity: .8; margin: 0px 3px 0px 0px" width="30" >Crear</a>
              </div>
            </div>
            <?= mostrar_acciones_adicionales2($id) ?>
          </div>

        <?php endif; ?>


        <!-- /.row -->