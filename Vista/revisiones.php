<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Revision y Consolidacion de Archivos Digitales</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Revision</li>
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

                <div class="col-md-6">
                    <div class="card">
                        <a class="zoom">

                        </a>

                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary" id="btn-prev" idimg="1">
                                    <i class="fas fa-arrow-left"></i>
                                    Anterior</button>
                                <button type="button" class="btn btn-success" id="btn-next" idimg="1">
                                    <i class="fas fa-arrow-right"></i>
                                    Siguiente</button>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- left column -->
                <div class="col-md-6 col-sm-12">
                    <form role="form" action="Controlador/ControladorBoleta.php" method="POST" id="form-boleta">
                        <!-- general form elements -->
                        <div class="card card-primary " style="height: 30rem;" id="card-registrar">

                            <div class="card-header">
                                <h3 class="card-title">Consolidar Archivo Digital</h3>
                            </div>
                            <div class="card-body overflow-auto">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nro</label>
                                            <input type="number" name="nro" class="form-control" id="fo-nro"
                                                placeholder="Nro de la Boleta" required readonly>
                                        </div>
                                        <div class="alert alert-danger hidden" id="alerta-nro">
                                            Ya existe un registro con el mismo numero
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Concepto</label>
                                            <input type="text" name="conc" class="form-control" id="fo-con"
                                                placeholder="Tipo de tramsaccion" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nombres</label>
                                            <input type="text" name="nom" class="form-control" id="fo-nom"
                                                placeholder="Se recibe de: " required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Apellido Paterno</label>
                                            <input type="text" name="pat" class="form-control" id="fo-pat"
                                                placeholder="Primer apellido" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Apellido Materno</label>
                                            <input type="text" name="mat" class="form-control" id="fo-mat"
                                                placeholder="Segundo apellido" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Monto</label>
                                            <input type="number" name="mont" class="form-control" id="fo-mon"
                                                placeholder="La suma de:" step="00.10" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nro Cuenta</label>
                                            <input type="text" name="cuen" class="form-control" id="fo-cue"
                                                placeholder="CTA. CTE. M/N FISCAL" readonly>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nacimiento <small>(opcional)</small></label>
                                            <input type="date" name="naci" class="form-control" id="fo-nac"
                                                placeholder="dd/mm/yyyy" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>C.I. <small>(opcional)</small> </label>
                                            <input type="text" name="ci" class="form-control" id="fo-ci"
                                                placeholder="Cedula de Identidad" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Banco</label>
                                            <input type="text" name="bank" class="form-control" id="fo-ban"
                                                placeholder="Nombre del Banco" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Fecha</label>
                                            <input type="date" name="fech" class="form-control" id="fo-fec"
                                                placeholder="dd/mm/yyyy" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Destino</label>
                                            <input type="text" name="dest" class="form-control" id="fo-des"
                                                placeholder="En favor de:" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Agencia</label>
                                            <input type="text" name="agen" class="form-control" placeholder="Agencia"
                                                id="fo-age" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Operativo</label>
                                            <input type="text" name="oper" class="form-control" placeholder="Operativo"
                                                id="fo-ope" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input type="text" name="user" class="form-control" placeholder="Usuario"
                                                id="fo-usu" readonly>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="accion" value="add">
                                <input type="hidden" name="database" value="boleta_consolidado">
                                <input type="hidden" name="idImg" value="" id="id-form-img">

                            </div>
                            <div class="card-footer ">
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-warning " id="btn-editar-fm">
                                        <i class="fas fa-pencil-alt"></i>
                                        Editar
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i>
                                        Consolidar
                                    </button>
                                </div>

                            </div>
                            <!-- /.card-body -->

                        </div>
                    </form>
                </div>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- ****************Main content******************** -->


</div>
<!-- /.content-wrapper -->