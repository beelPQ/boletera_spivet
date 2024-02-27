
<div id="contentSpinner" class="content-spinner" >
    <div class="spinner-body">
        <span id="txtSpanSpinner" class="txtSpanSpinner" >Cargando</span>
        <div class="spinner-circle"></div>
        <div class="spinner-circle1"></div>
        <div class="spinner-circle2"></div>
        <div class="spinner-circle3"></div>
        <div class="spinner-circle4"></div>
        <div class="spinner-circle5"></div>
    </div>
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Editar registro</h3>
                        </div>
                        <div class="card-body">
                            <form id="editarCoursesWorks" action="#" method="post" autocomplete="off">
                                <div class="row">
                                    <?=editar_diplomaCursoTaller($idregistro);?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
