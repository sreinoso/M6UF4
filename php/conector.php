<?php
require_once('./funcions.php');
session_start();
echo "chivato####";
$fp = fopen('data.txt', 'a');
fwrite($fp, $_POST['tipo']."\n");
if(isset($_POST['tipo'])){
$tipo = $_POST['tipo'];
    switch($tipo){
        case 'login':
            $logged = loguejar($_POST['usr'],$_POST['pass']);
            if($logged==true){
                $fp = fopen('data.txt', 'a');
                fwrite($fp, "LOGEADO"."\n");
                
                header('location: /brain/login.php'); 
            }else{

            }
            break;



    }


}




?>
