<?php
require_once('./funcions.php');
//echo "chivato####";
//$fp = fopen('data.txt', 'a');
//fwrite($fp, $_POST['tipo']."\n");
$tipo = 'login';
switch($tipo){
case 'login':
    $retorno = array( 
        "tipo"=> $tipo,
        "datos"=>loguejar("aaa","aaa")
    );
    break;
case 'logout':
    $retorno = array(
        "tipo"=> $tipo,
        "datos"=>true
    );
    logout();
    break;
case 'totPregServ':
    $retorno = array(
        "tipo"=> $tipo,
        "datos"=>array("num1"=>getCantPreg())
    );
    break;
case 'getPreg':
    $datos = getPregunta(0);
    $id=$datos[0];
    $enunciado=$datos[1];
    $r1=$datos[2];
    $r2=$datos[3];
    $r3=$datos[4];
    $r4=$datos[5];
    $retorno = array("tipo"=>$tipo, "datos"=>array("id"=>$id,"enunciado"=>$enunciado,"r1"=>$r1,"r2"=>$r2,"r3"=>$r3,"r4"=>$r4));
    break;
}
$ret_fin = json_encode($retorno,JSON_UNESCAPED_UNICODE);
var_dump($ret_fin);
?>
