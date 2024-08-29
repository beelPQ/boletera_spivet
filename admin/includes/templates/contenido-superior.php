  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header center">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-12">
                      <?php if ($id === '') { ?>
                          <h1 class="m-0 text-dark">BIENVENID@ <?php echo $_SESSION['username_logueo']; ?> </h1>
                          <div align="center"><img src="images/logos/spivet.png" alt="agregar" style="opacity: .8" width="25%" height="25%"> </div>
                      <?php } ?>
                  </div>
              </div>
          </div>
      </div>

      <section class="content">
          <div class="container-fluid">

              <?php if ($id === "") : ?>

              <?php elseif ($id === "clientes" && $_SESSION['id_rol'] == 1) : ?>

                  <div class="row">

                      <?php $valor = "clientes"; ?>

                      <div class="col-lg-2 col-12">
                          <!-- small box -->
                          <div class="small-box bg-info boton-background">
                              <a href="#" id="editarRegistro2" class="small-box-footer"><img src="images/edit.svg" alt="Editar" style="opacity: .8; margin: 0px 3px 0px 0px" width="30">Editar</a>
                          </div>
                      </div>

                      <div class="col-lg-2 col-12">
                          <!-- small box -->
                          <div class="small-box bg-info boton-background">
                              <a href="javascript:window.print()" class="small-box-footer"><img src="images/printer.svg" alt="Imprimir" style="opacity: .8; margin: 0px 3px 0px 0px" width="30">Imprimir</a>
                          </div>
                      </div>

                      <div class="col-lg-2 col-12">
                          <!-- small box -->
                          <div class="small-box bg-info boton-background">
                              <a id="descargar" href="#" class="small-box-footer"><img src="images/download.svg" alt="Descargar" style="opacity: .8; margin: 0px 3px 0px 0px" width="30">Descargar</a>
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
                              <a href="index.php?id=crear_cupon" class="small-box-footer"><img src="images/add.svg" alt="Crear" style="opacity: .8; margin: 0px 3px 0px 0px" width="30"> Crear</a>
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
                              <a href="index.php?id=crear_<?php echo $valor; ?>" class="small-box-footer"><img src="images/add.svg" alt="Crear" style="opacity: .8; margin: 0px 3px 0px 0px" width="30">Crear</a>
                          </div>

                      </div>

                      <div class="col-lg-2 col-12">
                          <!-- small box -->
                          <div class="small-box bg-info boton-background">
                              <a href="#" id="editarRegistro2" class="small-box-footer"><img src="images/edit.svg" alt="Editar" style="opacity: .8; margin: 0px 3px 0px 0px" width="30">Editar</a>
                          </div>
                      </div>

                      <div class="col-lg-2 col-12">
                          <!-- small box -->
                          <div class="small-box bg-info boton-background">
                              <a href="#" id="eliminarRegistro2" class="small-box-footer"><img src="images/delete.svg" alt="Eliminar" style="opacity: .8; margin: 0px 3px 0px 0px" width="30">Eliminar</a>
                          </div>
                      </div>

                      <div class="col-lg-2 col-12">
                          <!-- small box -->
                          <div class="small-box bg-info boton-background">
                              <a href="javascript:window.print()" class="small-box-footer"><img src="images/printer.svg" alt="Imprimir" style="opacity: .8; margin: 0px 3px 0px 0px" width="30">Imprimir</a>
                          </div>
                      </div>

                      <div class="col-lg-2 col-12">
                          <!-- small box -->
                          <div class="small-box bg-info boton-background">
                              <a id="descargar" href="#" class="small-box-footer"><img src="images/download.svg" alt="Descargar" style="opacity: .8; margin: 0px 3px 0px 0px" width="30">Descargar</a>
                          </div>
                      </div>

                  </div>

              <?php elseif ($id === "configuracion" && $_SESSION['id_rol'] == 1) : ?>
                  <div class="row">
                      <div class="col-lg-3 col-12">
                          <!-- small box -->

                          <div class="small-box bg-info boton-background">
                              <a href="index.php?id=editar_configuracion" class="small-box-footer"><img src="images/edit.svg" alt="Editar" style="opacity: .8; margin: 0px 3px 0px 0px" width="30"> Editar</a>
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
                              <a href="index.php?id=crear_usuario" class="small-box-footer"><img src="images/add.svg" alt="Crear" style="opacity: .8; margin: 0px 3px 0px 0px" width="30"> Crear</a>
                          </div>

                      </div>

                      <div class="col-lg-2 col-12">
                          <!-- small box -->
                          <div class="small-box bg-info boton-background">
                              <a href="#" id="editarRegistro2" class="small-box-footer"><img src="images/edit.svg" alt="Editar" style="opacity: .8; margin: 0px 3px 0px 0px" width="30">Editar</a>
                          </div>
                      </div>

                      <div class="col-lg-2 col-12">
                          <!-- small box -->
                          <div class="small-box bg-info boton-background">
                              <a href="#" id="eliminarRegistro2" class="small-box-footer"><img src="images/delete.svg" alt="Eliminar" style="opacity: .8; margin: 0px 3px 0px 0px" width="30">Eliminar</a>
                          </div>
                      </div>

                      <div class="col-lg-2 col-12">
                          <!-- small box -->
                          <div class="small-box bg-info boton-background">
                              <a href="javascript:window.print()" class="small-box-footer"><img src="images/printer.svg" alt="Imprimir" style="opacity: .8; margin: 0px 3px 0px 0px" width="30">Imprimir</a>
                          </div>
                      </div>

                      <div class="col-lg-2 col-12">
                          <!-- small box -->
                          <div class="small-box bg-info boton-background">
                              <a id="descargar" href="#" class="small-box-footer"><img src="images/download.svg" alt="Descargar" style="opacity: .8; margin: 0px 3px 0px 0px" width="30">Descargar</a>
                          </div>
                      </div>
                  </div>

              <?php elseif ($id === "diploma_curos_talleres" && ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 4)) : ?>
                  <div class="row">
                      <div class="col-lg-3 col-12">
                          <div class="small-box bg-info boton-background">
                              <a href="index.php?id=crear_diplomasCurosTaller" class="small-box-footer"><img src="images/add.svg" alt="Crear" style="opacity: .8; margin: 0px 3px 0px 0px" width="30">Crear</a>
                          </div>
                      </div>
                      <?= mostrar_acciones_adicionales2($id) ?>
                  </div>
              <?php elseif ($id === "checkin" && $_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) : // ? Sección para el checkin 
                ?>
                    <section id="modalEvent">
                        <button id="btnModalEventIn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEventIn" hidden></button>
                        <div class="modal fade" id="modalEventIn" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalEventInLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEventInLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modalEventInClose">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body"></div>
                                    <div class="modal-footer " hidden>
                                        <!--<div class="modal-footer d-flex justify-content-center" hidden >-->
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button id="btnClickModal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#avancedSearch" hidden></button>
                        <div class="modal fade" id="avancedSearch" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Busqueda avanzada</h5>
                                        <button id="btnClosedModaHeader" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" style="font-size: 24px;">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body custom-form1">
                                        <div class="col-sm-12 row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input type="text" id="txtNameClient" class="form-control content__input__checkin">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Primer apellido</label>
                                                    <input type="text" id="txtLastNameClient1" class="form-control content__input__checkin">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Segundo apellido</label>
                                                    <input type="text" id="txtLastNameClient2" class="form-control content__input__checkin">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <button id="btnSearchAvanced" class="btn botonFormulario" style="margin-top:29px;">Buscar</button>
                                                </div>
                                            </div>
                                        </div>

                                        <table id="table_checkin" class="table" style="width: 100%;">
                                            <thead>
                                                <tr align="center" role="row">
                                                    <th>Seleccion</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido Uno</th>
                                                    <th>Apellido Dos</th>
                                                    <th>Número de participante</th>
                                                    <th>Foto</th>
                                                </tr>
                                            </thead>
                                            <tbody id="dataSearch"></tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn  btn-secontary" id="btnClosedModal" data-dismiss="modal" style="width: 114px; height: 85;">Cerrar</button>
                                        <button class="btn botonFormulario" type="button" id="btnSelectedClient">Seleccionar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="content-general-dip gen-portrait" id="contentGeneral" hidden >
                        <div class="content-diploma anim-skeleton orien-portrait" id="contentDiploma">  
                            <div class="section1">
                                <span class="sp-float"></span>
                                <div id="bgTop" class="bg-top">
                                    <div class="cont-logo">
                                        <!--<img id="imgLogoSelected" src="https://cin24.spivet.com.mx/images/CIN2024.png" alt="">-->
                                        <img id="imgLogoSelected" src="" alt="">
                                        <div class="data-user">
                                            <span class="title"> Nombre Completo de Usuario </span><br>
                                            <span class="text-normal"> PIQUERO TECNOLOGÍA & DEPORTES </span><br>
                                            <span class="text-normal"> CÓDIGO DE PARTICIPANTE: </span><br>
                                            <span class="title"> COD-001 </span><br>
                                        </div>
                                    </div> 
                                </div> 
                                <div class="bg-center"></div>
                                <div class="bg-footer"></div>
                            </div>
                            <div class="section2">
                                <span class="sp-float"></span>
                                <div id="bgAll" class="bg-all">
                                    <img id="imgBgSelectedSec2" src="" alt="">
                                </div> 
                            </div>
                            <div class="section3">
                                <span class="sp-float"></span> 
                            </div>
                            <div class="section4">
                                <span class="sp-float"></span>
                            </div>
                        </div>
                    </section>
              <?php endif; ?>