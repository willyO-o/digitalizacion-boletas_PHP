<?php
    if(isset($_GET['exit'])){
        session_start();
        $_SESSION = array();
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="css/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a><b>Sistema de Digitalizacion de boletas </b></a>
            <div><img
                    src="data:image/png;base64,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"
                    alt="" width="100 rem">
            </div>

        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <h3 class="text-center">Login</h3>
                <p class="login-box-msg">Ingrese sus datos para Iniciar Sesion</p>
                <form id="form-login">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="pass" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <input type="hidden" name="accion" value="login">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="js/vendor/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/vendor/adminlte.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/vendor/sweetalert2.min.js"></script>
    <script src="https://kit.fontawesome.com/d790aeebdb.js" crossorigin="anonymous"></script>
</body>

</html>