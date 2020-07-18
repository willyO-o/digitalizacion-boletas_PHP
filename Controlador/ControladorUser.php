<?php
    //  echo "<pre>";
    // var_dump($_POST);
    //  echo "</pre>";
    // session_start();

    if(isset($_POST['accion'])){

        require "../Modelo/User.php";

        switch ($_POST['accion']) {
            case 'add':

                $nom= filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
                $pat= filter_var($_POST['pat'], FILTER_SANITIZE_STRING);
                $mat= filter_var($_POST['mat'], FILTER_SANITIZE_STRING);
                $est= filter_var($_POST['est'], FILTER_SANITIZE_STRING);
                $ema= filter_var($_POST['ema'], FILTER_SANITIZE_STRING);
                $pas= filter_var($_POST['pas'], FILTER_SANITIZE_STRING);
                $rol= filter_var($_POST['rol'], FILTER_SANITIZE_STRING);


                $ob_bol=User::setAll('', $nom, $pat,$mat, $ema, $pas,'', $est, $rol);
                $resul= $ob_bol->existeEmail();
                $resp = array();
                if ($resul>0) {
                    $resp = array('resp' => 2 );
                }else{
                    $res=$ob_bol->add();
                    if ($res>0) {
                        $resp = array('resp' => 1 );
                    }else {
                        $resp = array('resp' => 0 );
                    }
                    
                }
                echo json_encode($resp);
                
                break;
            
            case 'update':
                $idu= filter_var($_POST['idu'], FILTER_SANITIZE_STRING);
                $nom= filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
                $pat= filter_var($_POST['pat'], FILTER_SANITIZE_STRING);
                $mat= filter_var($_POST['mat'], FILTER_SANITIZE_STRING);
                $est= filter_var($_POST['est'], FILTER_SANITIZE_STRING);
                $ema= filter_var($_POST['ema'], FILTER_SANITIZE_STRING);
                $pas= filter_var($_POST['pas'], FILTER_SANITIZE_STRING);
                $rol= filter_var($_POST['rol'], FILTER_SANITIZE_STRING);


                $ob_bol=User::setAll($idu, $nom, $pat,$mat, $ema, $pas,'', $est, $rol);
                $res=$ob_bol->update();

                $resp = array();
                if ($res>0) {
                    $resp = array('resp' => 1 );
                }else{
                    $resp = array('resp' => 0 );
                }

                echo json_encode($resp);
                
                break;

            case 'listar':

                $ob_bol=User::setNull();
                $res=$ob_bol->listar();
                $dat = array();
                while($row=$res->fetch_assoc())
                {
                    array_push($dat, $row);
                }
                $data = array('data' =>  $dat);
                echo json_encode($data);

                break;
            
            case 'upEstado':
 
                $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
                $est= filter_var($_POST['est'], FILTER_SANITIZE_STRING);
                $ob_bol=User::setNull();
                $res=$ob_bol->upEstado($est,$id);
                $resp = array();
                if ($res>0) {
                    $resp = array(
                        'resp' => 1
                    );
                }else{
                    $resp = array('resp' => 0 );
                }
                echo json_encode($resp);
                break;   

            case 'getUser':
 
                $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
                $ob_bol=User::setNull();
                $res=($ob_bol->getUser($id))->fetch_assoc();
                $resp = array();
                if ($res['idUs']>0) {
                    $resp = array(
                        'resp' => 1,
                        'd'=> $res
                    );
                }else{
                    $resp = array('resp' => 0 );
                }
                echo json_encode($resp);
                break;
            
            case 'listarRol':
 
                //$idIm= filter_var($_POST['idImg'], FILTER_SANITIZE_STRING);
                $ob_bol=User::setNull();
                $res=$ob_bol->listarRol();
                $data = array();
                while($row=$res->fetch_assoc())
                {
                    array_push($data, $row);
                }
                echo json_encode($data);
                break;
        
            case 'delete':
 
                $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
                $ob_bol=User::setNull();
                $res=$ob_bol->delete($id);
                $resp = array();
                if ($res>0) {
                    $resp = array('resp' => 1 );
                }else{
                    $resp = array('resp' => 0 );
                }
                echo json_encode($resp);
                break;
            
            case 'login':
 
                $email= filter_var($_POST['email'], FILTER_SANITIZE_STRING);
                $pass= filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
                $ob_bol=User::setNull();
                $res=($ob_bol->validar($email,$pass))->fetch_assoc();
                $resp = array();
                if ($res['idUs']>0) {

                    session_start();
                    $_SESSION['tipo']=$res['estado'];
                    $_SESSION['nombre']=$res['nombre'];
                    $_SESSION['paterno']=$res['paterno'];
                    $_SESSION['materno']=$res['materno'];
                    $_SESSION['email']=$res['email'];
                    $_SESSION['id']=$res['idUs'];
                    $_SESSION['rol']=$res['idRol'];

                    $ob_bol->estado($res['idUs']);

                    $resp = array(
                        'resp' => 1,
                        'd'=> $res
                    );
                }else{
                    $resp = array('resp' => 0 );
                }
                echo json_encode($resp);
                break;
            default:

                $resp = array('resp' => 0 );
                echo json_encode($resp);
                break;
        }
    }
?>