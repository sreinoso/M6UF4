<?php
require_once('./funcions.php');
session_start();
//echo "chivato####";
//$fp = fopen('data.txt', 'a');
//fwrite($fp, $_POST['tipo']."\n");
if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
    switch($tipo){
    case 'login':
        $retorno = array( "tipo"=> $_POST['tipo'],loguejar($_POST['usr'],$_POST['pass']));
        //$retorno["datos"] = loguejar($_POST['usr'],$_POST['pass']);
        break;
    case 'logout':
        $retorno = array("tipo"=> $_POST['tipo'],"datos"=>true);
        logout();
        break;
    case 'totPregServ':
        $retorno = array("tipo"=> $_POST['tipo'],"datos"=>array("num1"=>getCantPreg()));
        //$retorno["datos"] = array("num1"=>getCantPreg());
        break;
    case 'getPreg':
        $datos = getPregunta(2);
        $retorno = array("tipo"=> $_POST['tipo'],"datos"=>array(
            "id"=>$datos[0],
            "enunciat"=>$datos[1],
            "resposta1"=>$datos[2],
            "resposta2"=>$datos[3],
            "resposta3"=>$datos[4],
            "resposta4"=>$datos[5] 
        ));
        break;
    }
    //echo ($retorno);
//echo "chivato####";
//$fp = fopen('data.txt', 'a');
//fwrite($fp, $retorno."\n");
    echo json_encode($retorno);
}
?>
