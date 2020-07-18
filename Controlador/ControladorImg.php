<?php

    require "../Modelo/Imagen.php";

    //var_dump($_FILES);
    if(isset($_POST['accion'])){

        switch ($_POST['accion']) {
            case 'add':

                $directorio='../files/';

                if (!is_dir($directorio)) {
                    mkdir($directorio, 0755,true);     
                }
                move_uploaded_file($_FILES['imagen']['tmp_name'] , $directorio.$_FILES['imagen']['name']);

                $nro= filter_var($_POST['nroImg'], FILTER_SANITIZE_STRING);
                $ruta=$_FILES['imagen']['name'];

                $ob_im=Imagen::setImg($ruta,$nro);

                $res=$ob_im->add();

                $resp = array();
                if ($res>0) {
                    $resp = array('resp' => 1 );
                }else{
                    $resp = array('resp' => "error" );
                }

                echo json_encode($resp);
                
                break;

            case 'nombImg':
                $nom=filter_var($_POST['nom'], FILTER_SANITIZE_STRING);

                $ob_im=Imagen::setImg($nom,"");
                
                $res=($ob_im->comprobarNombre())->fetch_assoc();
                $resp = array();
                if ($res['c']>0) {
                    $resp = array('resp' => 1 );
                }else{
                    $resp = array('resp' => 0 );
                }
                echo json_encode($resp);

                break;
            
            case 'nro':
                $nro=filter_var($_POST['nro'], FILTER_SANITIZE_STRING);

                $ob_im=Imagen::setNro($nro);
                
                $res=($ob_im->comprobarNro())->fetch_assoc();
                $resp = array();
                if ($res['c']>0) {
                    $resp = array('resp' => 1 );
                }else{
                    $resp = array('resp' => 0 );
                }
                echo json_encode($resp);

                break;   
            
            default:
                # code...
                break;
        }
    }

?>