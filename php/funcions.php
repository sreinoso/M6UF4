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
    $loguejar = "SELECT count(*) FROM PREGUNTA";
    $retval = mysql_query($loguejar,$con);
    $filas = mysql_num_rows($retval);
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


?>
