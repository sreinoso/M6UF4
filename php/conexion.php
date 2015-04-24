<?php
include ('config.php');

/*Función que conecta a la base de datos */
	function conectar_bdd(){
		global $dbHost, $dbUser, $dbPass, $dbName;
		$conexion = mysql_connect($dbHost, $dbUser, $dbPass); 
		mysql_select_db($dbName,$conexion) or die ('Error al conect bdd'); 

			return $conexion; 
	}
	
	/*Función que se loguea en caso que su username y contraseña coincidan con los de la base de datos*/
	function loguejar($user,$pass){
		$con = conectar_bdd();
		$aux = false;
		$loguejar = "SELECT * FROM usuaris WHERE user = '$user' AND pass = PASSWORD('$pass')";
		$retval = mysql_query($loguejar,$con);
		$filas = mysql_num_rows($retval);
		if ($filas == 1){
			$aux = true;

		} 
		return $aux;
	}
	
	/*Función que captura el rol del usuario que permitirá acceder a unos apartados u a otros.
	function cogerRol($user){
		$con = conectar_bdd();
		$aux = false;
		$loguejar = "SELECT * FROM usuaris WHERE user = '$user'";
		$retval = mysql_query($loguejar,$con);
		$filas = mysql_num_rows($retval);
		if ($filas == 1){
			$result = mysql_fetch_assoc($retval);// Guarda el resultado de la query en una array asociativo
			$aux = $result['Rol']; // guarda el rol en aux
		} 	
		
		return $aux;
	}*/

	?>
	