<?php
require_once('./funcions.php');
session_start();
//echo "chivato####";
//$fp = fopen('data.txt', 'a');
//fwrite($fp, $_POST['tipo']."\n");
if(isset($_POST['tipo'])){
    $retorno = array("tipo"=> $_POST['tipo'],"datos"=>"true");
    $tipo = $_POST['tipo'];
    switch($tipo){
        case 'login':
            $retorno["datos"] = loguejar($_POST['usr'],$_POST['pass']);
            break;
        case 'logout':
            logout();
            break;
        case 'totPregServ':
            $retorno["datos"] = array("num1"=>getCantPreg(),"num2"=>20,"num3"=>30);
            break;
    }
    //echo ($retorno);
    echo json_encode($retorno);
}
?>
