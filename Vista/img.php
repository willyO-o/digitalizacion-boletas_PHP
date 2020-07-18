<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Subir Archivos Digitales</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Subir Imagenes</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- ****************Main content******************** -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <!-- left column -->
                <div class="col-lg-8 col-sm-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Subir Nuevo Archivo Digita/Imagen</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="Controlador/ControladorImg.php" method="post"
                            enctype="multipart/form-data" id="form-img">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nro <small>(ingrese en nro que se ve en la imgane digital)</small> </label>
                                    <input type="number" name="nroImg" class="form-control" id="nroImg"
                                        placeholder="Ingrese el numero que aparece en la boleta" required>
                                    <div class="alert alert-danger hidden" id="alerta-nro">
                                        Ya existe un registro con el mismo numero
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Subir Imagen <small>(archivos permitidos .jpg
                                            .jpeg .png)</small> </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="imagen" class="custom-file-input"
                                                id="exampleInputFile" required>
                                            <label class="custom-file-label" for="exampleInputFile">Escoger
                                                archivo click aqui</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Buscar</span>
                                        </div>

                                    </div>
                                    <div class="alert alert-danger hidden" id="alerta-img">
                                        Extension de archivo no admintido
                                    </div>
                                    <div class="alert alert-danger hidden" id="alerta-Nomimg">
                                        Ya existe un registro con el mismo nombre
                                    </div>
                                    <hr>
                                    <label for="">Vista Previa</label>
                                    <img src="" alt="sin imagen" id="img-muestra" width="100%" height="500">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <input type="hidden" name="accion" value="add">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- ****************Main content******************** -->


</div>
<!-- /.content-wrapper -->