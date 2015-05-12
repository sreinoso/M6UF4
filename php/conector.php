<?php
require_once('./funcions.php');
session_start();
//echo "chivato####";
//$fp = fopen('data.txt', 'a');
//fwrite($fp, $_POST['tipo']."\n");
if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
    $data = @$_POST['data'];
    switch($tipo){
    case 'login':
        //$retorno = array("tipo"=> $tipo,"datos"=>"true");
        $retorno = array( 
            "tipo"=> $tipo,
            "datos"=>loguejar($_POST['usr'],$_POST['pass'])
        );
        break;
    case 'logout':
        $retorno = array(
            "tipo"=> $_POST['tipo'],
            "datos"=>true
        );
        logout();
        break;
    case 'totPregServ':
        $retorno = array(
            "tipo"=> $_POST['tipo'],
            "datos"=>array("num1"=>getCantPreg())
        );
        //$retorno["datos"] = array("num1"=>getCantPreg());
        break;
    case 'getPreg':
        $id=$data;
        $datos = getPregunta($id);
        $enunciado=$datos[1];
        $r1=$datos[2];
        $r2=$datos[3];
        $r3=$datos[4];
        $r4=$datos[5];
        $rc=$datos[6];
        $tipo = $_POST['tipo'];
        $retorno = array("tipo"=>$tipo, "datos"=>array("id"=>$id,"enunciado"=>$enunciado,"r1"=>$r1,"r2"=>$r2,"r3"=>$r3,"r4"=>$r4,"rc"=>$rc));
        break;
    case 'envRes':
        $xp = $_POST['data'];
        $usuario = $_POST['user'];
        actualizaXP($xp,$usuario);
        $retorno = array("tipo"=>$tipo, "datos"=>"");

        break;
    }
    //echo ($retorno);
    //echo "chivato####";
    //$fp = fopen('data.txt', 'a');
    //fwrite($fp, $retorno."\n");
    //var_dump($retorno);
    //json_encode($retorno);
}
//$ret_fin = json_encode($retorno);
$ret_fin = json_encode($retorno,JSON_UNESCAPED_UNICODE);
//echo json_encode($retorno,JSON_UNESCAPED_UNICODE);
echo $ret_fin;
?>
