<!-- Main Sidebar Container -->
<aside class="main-sidebar control-sidebar-dark elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="images/logos/spivet.png" class="brand-image " >
        <span class="brand-text font-weight-light" >DASHBOARD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="images/icons/icon_user.svg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block" style="color:#FFF"><?php echo $_SESSION['username_logueo']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any
                        other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link <?php if ($id === "") { ?>active<?php } ?>">
                                <i class="fas fa-home"></i>
                                <p>Inicio</p>
                            </a>
                        </li>


                        <?php if ($_SESSION['id_rol'] == 1) { ?>
                            <li class="nav-item">
                                <a href="index.php?id=clientes" class="nav-link <?php if ($id === "clientes") { ?>active<?php } ?>">
                                    <i class="fas fa-user-friends"></i>
                                    <p>Clientes</p>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 ) { ?>
                            <!-- Cursos y talleres -->
                            <li class="nav-item">
                                <a href="index.php?id=diploma_curos_talleres" class="nav-link <?php if ($id === "diploma_curos_talleres") { ?>active<?php } ?>">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                    <p>Cursos/Capacitaciones</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?id=cursos_cobros" class="nav-link <?php if ($id === "cursos_cobros") { ?>active<?php } ?>">
                                    <i class="fas fa-cash-register"></i>
                                    <p>Cobros</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?id=cupones" class="nav-link <?php if ($id === "cupones") { ?>active<?php } ?>">
                                    <i class="fas fa-ticket-alt"></i>
                                    <p class="aside_opc">Cupones</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="index.php?id=checkin" class="nav-link <?php if( $id == 'checkin' ) { ?>active<?php }?>">
                                    <i class="fas fa-clipboard-check"></i>
                                    <p class="menu-text">Check-In</p>
                                </a>
                            </li>
                            <!--<li class="nav-item">-->
                            <!--    <a href="index.php?id=lista-cursos-design" class="nav-link <?php if( $id == 'lista-cursos-design' ) { ?>active<?php }?>">-->
                            <!--        <i class="fas fa-edit"></i>-->
                            <!--        <p class="menu-text">Diploma</p>-->
                            <!--    </a>-->
                            <!--</li>-->
                        <?php } ?>
                        
                        <?php if ($_SESSION['id_rol'] == 3) { ?>
                            <li class="nav-item">
                                <a href="index.php?id=cursos_cobros" class="nav-link <?php if ($id === "cursos_cobros") { ?>active<?php } ?>">
                                    <i class="fas fa-cash-register"></i>
                                    <p>Cobros</p>
                                </a>
                            </li>
                        <?php } ?>

                         <?php if ($_SESSION['id_rol'] == 1) { ?>
                            <li class="nav-item">
                                <a href="index.php?id=servicios" class="nav-link <?php if ($id === "servicios") { ?>active<?php } ?>">
                                    <i class="fas fa-users-cog"></i>
                                    <p>Servicios</p>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($_SESSION['id_rol'] == 1) { ?>
                            <li class="nav-item">
                                <a href="index.php?id=usuarios" class="nav-link <?php if ($id === "usuarios") { ?>active<?php } ?>">
                                    <i class="fas fa-users"></i>
                                    <p>Usuarios</p>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($_SESSION['id_rol'] == 1) { ?>
                            <li class="nav-item">
                                <a href="index.php?id=empresas" class="nav-link <?php if ($id === "empresas") { ?>active<?php } ?>">
                                    <i class="fas fa-building"></i>
                                    <p>Empresa</p>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($_SESSION['id_rol'] == 1) { ?>
                            
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-cog"></i>
                                    <p>
                                        Configuración
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: none;">
                                    <li class="nav-item <?php if( $id == 'lista-cursos-design' ) { ?>active<?php }?>">
                                        <a href="index.php?id=lista-cursos-design" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Diseño</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.php?id=configuracion" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Configuracion general</p>
                                        </a>
                                    </li>
                                    <!--<li class="nav-item">-->
                                    <!--    <a href="pages/charts/inline.html" class="nav-link">-->
                                    <!--        <i class="far fa-circle nav-icon"></i>-->
                                    <!--        <p>Inline</p>-->
                                    <!--    </a>-->
                                    <!--</li>-->
                                    <!--<li class="nav-item">-->
                                    <!--    <a href="pages/charts/uplot.html" class="nav-link">-->
                                    <!--        <i class="far fa-circle nav-icon"></i>-->
                                    <!--        <p>uPlot</p>-->
                                    <!--    </a>-->
                                    <!--</li>-->
                                </ul>
                            </li>
                                
                             
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="login.php?cerrar_sesion=true" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>
                            Cerrar sesión
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>