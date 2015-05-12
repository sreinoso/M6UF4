<?php
require_once('./config.php');

/*Función que conecta a la base de datos */
function conectar_bdd(){
    global $dbHost, $dbUser, $dbPass, $dbName;
    $conexion = mysql_connect($dbHost, $dbUser, $dbPass); 
    mysql_select_db($dbName,$conexion) or die ('Error al conect bdd'); 
    return $conexion; 
}
 
 
function getCantPreg(){
    $con = conectar_bdd();
    $aux = false;
    $query = "SELECT count(*) FROM PREGUNTA";
    $retval = mysql_query($query,$con);
    $filas = mysql_num_rows($retval);
    return mysql_fetch_row($retval);
}
function getPregunta($id){
    $con = conectar_bdd();
    $query = 'SELECT id,enunciat,resposta1,resposta2,resposta3,resposta4,respostacorrecta FROM PREGUNTA where id='.$id;
    $retval = mysql_query($query,$con);
    return mysql_fetch_row($retval);
}

/*Función que se loguea en caso que su username y contraseña coincidan con los de la base de datos*/
function loguejar($user,$pass){
    @session_start();
    $con = conectar_bdd();
    $aux = false;
    $loguejar = "SELECT * FROM JUGADOR WHERE nickname = '$user' AND pwd = PASSWORD('$pass')";
    $retval = mysql_query($loguejar,$con);
    $filas = mysql_num_rows($retval);
    if ($filas == 1){
        $_SESSION['logged']=true;
        return true;
    }else{ 
        $_SESSION['logged']=false;
        return false;
    }
}
function logout(){
    $_SESSION['logged']=false;
}

function actualizaXP($xp,$usuario){
    $con = conectar_bdd();
    $query = 'SELECT experiencia_total,partides_jugades FROM JUGADOR where nickname="'.$usuario.'"';
    $retval = mysql_query($query,$con);
    $result = mysql_fetch_row($retval);
    $xp_act = $result[0];
    $played = $result[1];
    $played++;
    $xp_act+=$xp;
    $query = 'UPDATE `JUGADOR` SET `experiencia_total`='.$xp_act.' ,`partides_jugades`='.$played.'  WHERE `nickname` ="'.$usuario.'"';
    $retval = mysql_query($query,$con);

}

////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

/*Mostra els productes i les seves funcionalitats en forma d'icones*/
function mostra_product(){
    $con = conectar_bdd();
    $query = 'SELECT * FROM productes as prod, proveidors as prov where prod.codi = prov.codi_producte group by prod.codi';
    if ($result = mysql_query($query,$con)) $fields=mysql_num_fields($result);	
    if(!$result){
        exit;
    }
}
function consultar($data = null){
    //echo($data);
    $con = conectar_bdd();
    switch($data){
        case "noma":
            $query = 'SELECT nickname,experiencia_total FROM JUGADOR order by nickname asc';
            break;
        case "nomd":
            $query = 'SELECT nickname,experiencia_total FROM JUGADOR order by nickname desc';
            break;
        case "punta":
            $query = 'SELECT nickname,experiencia_total FROM JUGADOR order by experiencia_total asc';
            break;
        case "puntd":
            $query = 'SELECT nickname,experiencia_total FROM JUGADOR order by experiencia_total desc';
            break;
        default:
            $query = 'SELECT nickname,experiencia_total FROM JUGADOR order by nickname asc';
            break;
    }
    $result = mysql_query($query,$con);	
    $i = 0;
    while ($fila = mysql_fetch_array($result,MYSQL_ASSOC)) {
        $ret[$i]=$fila;
        $i++;
    }
    //var_dump($ret);
    return $ret;
}
function registre($usr,$pass){
    $con = conectar_bdd();
    $query = 'INSERT INTO `JUGADOR`(`id`,`nickname`, `pwd`) VALUES (null,"'.$usr.'",password("'.$pass.'"))';
    mysql_query($query,$con);	
}


?>
