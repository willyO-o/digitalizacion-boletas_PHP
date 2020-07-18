<!-- Main Sidebar Container -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header Page header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Administrar Usuarios</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?menu=main">Administracion</a></li>
                        <li class="breadcrumb-item active">Boletas</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <!-- Custom Tabs -->
                    <div class="card">
                        <div class="card-header d-flex p-0">
                            <h3 class="card-title p-3">Listados de Boletas</h3>
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item"><a class="nav-link active" href="#tab_1"
                                        data-toggle="tab">Consolidados</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Registrados</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Sin
                                        Registrar</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Boletas Consolidados</h3>
                                        </div>
                                        <!-- /.card-header -->

                                        <div class="card-body" id="lista-prod">
                                            <table id="tab-consolidado" class="table table-bordered table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th>Imagen</th>
                                                        <th>Nro</th>
                                                        <th>Concepto</th>
                                                        <th>Nombre </th>
                                                        <th>Apellido </th>
                                                        <th>Transcriptor</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>

                                                <tfoot>
                                                    <tr>
                                                        <th>Imagen</th>
                                                        <th>Nro</th>
                                                        <th>Concepto</th>
                                                        <th>Nombre </th>
                                                        <th>Apellido </th>
                                                        <th>Transcriptor</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Boletas Transcritas sin Consolidar</h3>
                                        </div>
                                        <!-- /.card-header -->

                                        <div class="card-body" id="lista-prod">
                                            <table id="tab-registrado" class="table table-bordered table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th>Imagen</th>
                                                        <th>Nro</th>
                                                        <th>Concepto</th>
                                                        <th>Nombre </th>
                                                        <th>Apellido </th>
                                                        <th>Transcriptor</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>

                                                <tfoot>
                                                    <tr>
                                                        <th>Imagen</th>
                                                        <th>Nro</th>
                                                        <th>Concepto</th>
                                                        <th>Nombre </th>
                                                        <th>Apellido </th>
                                                        <th>Transcriptor</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"> Boletas Sin Transcribir</h3>
                                        </div>
                                        <!-- /.card-header -->

                                        <div class="card-body" id="lista-prod">
                                            <table id="tab-sin-registrar" class="table table-bordered table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th>Imagen</th>
                                                        <th>Nro </th>
                                                        <th>Estado</th>
                                                        
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>

                                                <tfoot>
                                                    <tr>
                                                    
                                                        <th>Imagen</th>
                                                        <th>Nro </th>
                                                        <th>Estado</th>
                                                        
                                                        <th>Acciones</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- ./card -->
                </div>
                <!-- /.col -->
            </div>



        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- modal agregar-->
<div class="modal fade" id="modal-ver">
    <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header ">
                    <h4 class="modal-title ">Detalles de Boleta</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="ver-contenido">




                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-ban"></i>
                        Cerrar
                    </button>
                </div>
            </div>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

