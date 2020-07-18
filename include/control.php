<?php
    session_start();
    if (isset($_SESSION['rol'])) {
        switch($_SESSION['rol']) {
            case 2:
                if ($_GET['menu']!="tr") {
                    header("location: admin.php?menu=tr");
                }
                
                break;
            
            case 3:
                if ($_GET['menu']!="rev") {
                    header("location: admin.php?menu=rev");
                }
                break;
            case 4:
                if ($_GET['menu']!="img") {
                    header("location: admin.php?menu=img");
                }
                break;
            default:
               
                break;
        }
    }else{
        header("location: index.php");
    }
?>