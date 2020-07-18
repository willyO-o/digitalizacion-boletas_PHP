<?php
    //  echo "<pre>";
    // var_dump($_POST);
    //  echo "</pre>";

    if(isset($_POST['accion'])){

        require "../Modelo/Boleta.php";

        switch ($_POST['accion']) {
            case 'add':
                session_start();

                $nro= filter_var($_POST['nro'], FILTER_SANITIZE_STRING);
                $conc= filter_var($_POST['conc'], FILTER_SANITIZE_STRING);
                $nom= filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
                $pat= filter_var($_POST['pat'], FILTER_SANITIZE_STRING);
                $mat= filter_var($_POST['mat'], FILTER_SANITIZE_STRING);
                $cuen= filter_var($_POST['cuen'], FILTER_SANITIZE_STRING);
                $ci= filter_var($_POST['ci'], FILTER_SANITIZE_STRING);
                $naci= filter_var($_POST['naci'], FILTER_SANITIZE_STRING);
                $mont= filter_var($_POST['mont'], FILTER_SANITIZE_STRING);
                $bank= filter_var($_POST['bank'], FILTER_SANITIZE_STRING);
                $fech= filter_var($_POST['fech'], FILTER_SANITIZE_STRING);
                $dest= filter_var($_POST['dest'], FILTER_SANITIZE_STRING);
                $agen= filter_var($_POST['agen'], FILTER_SANITIZE_STRING);
                $oper= filter_var($_POST['oper'], FILTER_SANITIZE_STRING);
                $user= filter_var($_POST['user'], FILTER_SANITIZE_STRING);
                $idImg= filter_var($_POST['idImg'], FILTER_SANITIZE_STRING);
                $database= filter_var($_POST['database'], FILTER_SANITIZE_STRING);
                


                $idUs=$_SESSION['id'] ;
                
                $fReg = date('Y-m-d H:i:s');

                $ob_bol= Boleta::setNull();
                                        
                $res=$ob_bol->add($nro,$conc,$nom,$pat,$mat,$cuen,$ci,$naci,$mont,$bank,$fech,$dest,$agen,$oper,$user,$fReg,$idUs,$idImg,$database);

                $resp = array();
                if ($res>0) {
                    if ($database=="boleta") {
                        $r=$ob_bol->estadoImg('1',$idImg);
                        $resp = array('resp' => 1 ,"tipo" => "bol");
                    }else{
                        $r=$ob_bol->estadoImg('2',$idImg);
                        $resp = array('resp' => 1 , "tipo" => "con");
                    }
                    
                    
                }else{
                    $resp = array('resp' => 0 );
                }

                echo json_encode($resp);
                
                break;

            case 'prev':

                $idIm= filter_var($_POST['idImg'], FILTER_SANITIZE_STRING);
                $es= filter_var($_POST['est'], FILTER_SANITIZE_STRING);
                $ob_bol=Boleta::setNull();
                $res=($ob_bol->anterior($idIm,$es))->fetch_assoc();
                $resp = array();
                if ($res['idImg']>0) {
                    $resp = array(
                        'resp' => 1,
                        'idImg'=> $res['idImg'],
                        'ruta'=> $res['img'],
                        'est'=>$res['estado']
                    );
                }else{
                    $resp = array('resp' => 0 );
                }
                echo json_encode($resp);

                break;
            
            case 'next':
 
                $idIm= filter_var($_POST['idImg'], FILTER_SANITIZE_STRING);
                $es= filter_var($_POST['est'], FILTER_SANITIZE_STRING);
                $ob_bol=Boleta::setNull();
                $res=($ob_bol->siguiente($idIm,$es))->fetch_assoc();
                $resp = array();
                if ($res['idImg']>0) {
                    $resp = array(
                        'resp' => 1,
                        'idImg'=> $res['idImg'],
                        'ruta'=> $res['img'],
                        'est'=>$res['estado']
                    );
                }else{
                    $resp = array('resp' => 0 );
                }
                echo json_encode($resp);
                break;   

            case 'img':
 
                $es= filter_var($_POST['est'], FILTER_SANITIZE_STRING);
                $ob_bol=Boleta::setNull();
                $res=($ob_bol->primeraImg($es))->fetch_assoc();
                $resp = array();
                if ($res['idImg']>0) {
                    $resp = array(
                        'resp' => 1,
                        'idImg'=> $res['idImg'],
                        'ruta'=> $res['img'],
                        'est'=>$res['estado']
                    );
                }else{
                    $resp = array('resp' => 0 );
                }
                echo json_encode($resp);
                break;

            case 'nro':
                $nro=filter_var($_POST['nro'], FILTER_SANITIZE_STRING);

                $ob_im=Boleta::setNull();
                
                $res=($ob_im->comprobarNro($nro))->fetch_assoc();
                $resp = array();
                if ($res['c']>0) {
                    $resp = array('resp' => 1 );
                }else{
                    $resp = array('resp' => 0 );
                }
                echo json_encode($resp);

                break;

            case 'listarCon':

                $ob_bol=Boleta::setNull();
                $res=$ob_bol->listarConsolidados();
                $dat = array();
                while($row=$res->fetch_assoc())
                {
                    array_push($dat, $row);
                }
                $data = array('data' =>  $dat);
                echo json_encode($data);

                break;
            
            case 'listarTra':

                $ob_bol=Boleta::setNull();
                $res=$ob_bol->listarTranscritos();
                $dat = array();
                while($row=$res->fetch_assoc())
                {
                    array_push($dat, $row);
                }
                $data = array('data' =>  $dat);
                echo json_encode($data);

                break;

            case 'listarSin':

                $ob_bol=Boleta::setNull();
                $res=$ob_bol->listarSinRegistrar();
                $dat = array();
                while($row=$res->fetch_assoc())
                {
                    array_push($dat, $row);
                }
                $data = array('data' =>  $dat);
                echo json_encode($data);

                break;
            case 'getRegi':

                $idIm= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
                $ob_bol=Boleta::setNull();
                $res=($ob_bol->getReg($idIm))->fetch_assoc();
                $resp = array();
                if ($res['idImg']>0) {
                    $resp = array(
                        'resp' => 1,
                        'd' =>$res
                    );
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

    if (isset($_GET['accion'])) {

        require "../Modelo/Boleta.php";

        switch ($_GET['accion']) {
            case 'grafica':

                $ob=Boleta::setNull();

                $res=$ob->getGraficaBarras();
                $dat = array();
                while ($row=$res->fetch_assoc()) {
                    array_push($dat, $row);
                }

                echo json_encode($dat);
                break;

            case 'widgets':

                $ob=Boleta::setNull();

                $res=$ob->getConteoEstados();
                $dat = array();
                while ($row=$res->fetch_assoc()) {
                    array_push($dat, $row);
                }

                echo json_encode($dat);
                break;

            case 'pie':

                $ob=Boleta::setNull();

                $res=$ob->getGraficaPie();
                $dat = array();
                while ($row=$res->fetch_assoc()) {
                    array_push($dat, $row);
                }

                echo json_encode($dat);
                break;
            default:
                # code...
                break;
        }
    }
?>