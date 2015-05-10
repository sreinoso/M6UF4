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
        //var_dump($datos);
        //$retorno = array("tipo"=>$_POST['tipo'], "datos"=>"");
        $tipo = $_POST['tipo'];
        //$datos = array("id"=>$id,"enunciado"=>$enunciado,"r1"=>$r1,"r2"=>$r2,"r3"=>$r3,"r4"=>$r4);
        //$retorno = array("tipo"=>$tipo, "datos"=>$id.$enunciado.$r1.$r2.$r3.$r4);
        //$retorno = array("tipo"=>$_POST['tipo'], "datos"=>array("id"=>$id,"enunciado"=>$enunciado,"r1"=>$r1,"r2"=>$r2,"r3"=>$r3,"r4"=>$r4));
        //$retorno = array("tipo"=>$_POST['tipo'], "datos"=>"<div class='enunciado' id='$datos[0]'> $datos[1] </div> <div class='respuesta'> <input type='radio' name='resp'>$datos[2]</input> </div> <div class='respuesta'> <input type='radio' name='resp'>$datos[3]</input> </div> <div class='respuesta'> <input type='radio' name='resp'>$datos[4]</input> </div> <div class='respuesta'> <input type='radio' name='resp'>$datos[5]</input> </div> </div>");
        $retorno = array("tipo"=>$tipo, "datos"=>array("id"=>$id,"enunciado"=>$enunciado,"r1"=>$r1,"r2"=>$r2,"r3"=>$r3,"r4"=>$r4));
        //$retorno = array(
        //    "tipo"=>$_POST['tipo'],
        //    "datos"=>array("num1"=>5)
        //);
        //0,
        //1,
        //2,
        //3,
        //4,
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
