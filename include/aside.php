<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="?menu=home" class="brand-link">
        <img src="img/logo.png" alt=" Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SisDIg</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="img/user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block"><?php echo  $_SESSION['nombre'] ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class

                
               with font-awesome or any other icon font library -->


                <?php switch($_SESSION['rol']) {
                   case '1': ?>
                <li class="nav-item">
                    <a href="?menu=home" class="nav-link">
                        <i class="nav-icon nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Inicio

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?menu=img" class="nav-link">
                        <i class="nav-icon fas fa-file-upload"></i>
                        <p>
                            Subir Imagenes

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?menu=tr" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Transcripciones

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?menu=rev" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-check"></i>
                        <p>
                            Revisiones

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?menu=lis" class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Boletas

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="?menu=us" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>
                            Usuarios

                        </p>
                    </a>
                </li>
                <?php break;
                    case '2': ?>
                <li class="nav-item">
                    <a href="?menu=tr" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Transcripciones

                        </p>
                    </a>
                </li>
                <?php break;
                    case '3': ?>
                <li class="nav-item">
                    <a href="?menu=rev" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-check"></i>
                        <p>
                            Revisiones

                        </p>
                    </a>
                </li>
                <?php break; 
                       case '4': ?>
                <li class="nav-item">
                    <a href="?menu=img" class="nav-link">
                        <i class="nav-icon fas fa-file-upload"></i>
                        <p>
                            Subir Imagenes

                        </p>
                    </a>
                </li>

                <?php   break;
                 ?>

                <?php } ?>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>