<?php
    include "include/control.php" ;
    $menu = isset($_GET['menu']) ? $_GET['menu']: "home";
?>

<?php include "Modelo/Conexion.php" ?>
<!-- incluyendo la cabecera -->
<?php include "include/header.php" ?>
<!-- incluyendo la cabecera -->


<!-- inportando la navegacion aside -->
<?php include "include/aside.php" ?>
<!-- Main Sidebar Container -->

<?php
    switch ($menu) {
        case 'home':
            include "Vista/home.php" ;
            break;

        case 'img':
            include "Vista/img.php" ;
            break;

        case 'tr':
            include "Vista/transcribir.php" ;
            break;
        case 'us':
            include "Vista/usuarios.php" ;
            break;
        case 'lis':
            include "Vista/listado.php" ;
            break;
        case 'rev':
            include "Vista/revisiones.php" ;
            break;
        default:
            include "Vista/home.php" ;
            break;
    }
  ?>
<?php ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<?php include "include/footer.php" ?>