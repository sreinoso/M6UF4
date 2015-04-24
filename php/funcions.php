<?php
require ('conexion.php');

/*Mostra els productes i les seves funcionalitats en forma d'icones*/
function mostra_product(){
	$con = conectar_bdd();
	$query = 'SELECT * FROM productes as prod, proveidors as prov where prod.codi = prov.codi_producte group by prod.codi';
	if ($result = mysql_query($query,$con)) $fields=mysql_num_fields($result);	
	if(!$result){
		exit;
	}
	echo "<table>\n<tr>";		
	for ($i=0; $i < 7; $i++){ //Table Header	
		print "<th>".mysql_field_name($result, $i)."</th>"; 	
	}
	echo "<th></th></tr>\n";
	while ($row = mysql_fetch_row($result)) { //Table body
		echo "<tr class='fila".$row[0]."'>";				
		  for ($f=0; $f < 7; $f++) {
			 echo "<td>$row[$f]";
			 
				if ($f==6){ // En la sisena posicio contant el 0, es posicionaran les icones de modificacio i eliminació
						
				echo"<td><div id='capaborrar-".$row[0]."'><span style=\"float:left;\"><form action='#' method='POST'>
					 <button type='button' name='boton' id='butoModif' onClick='abredialog(".$row[0].")'><img src='res/images/modificar.png' alt='Editar Registro'/></button>
					 <button type='button' name='boton' onClick='confirmacion($row[0])'><img src='res/images/borrar.png' alt='eliminar Registro'/></button>
					 <button type='button' name='boton' onClick='mostrar($row[0])' class='botonmostrar' id='proveidor-".$row[0]."'><img src='res/images/lupa.png' alt='Proveidores'/></button>
					 </div>
					</td>";
				}
			}
			echo "</tr>\n";
			echo "<span style='display:block;float:left;visibility:hidden;'><div id='capalupa-".$row[0]."'>".mostra_proveidor($row[0])."</div></span>";
	}
	echo "</table><p>";

	mysql_data_seek($result, 0);  /*Reinicia la posicio del punter de les dades recollides de mysql*/
	while ($row = mysql_fetch_row($result)) {
		echo "<div id='dialog".$row[0]."' title='Modificar producte".$row[0]."'><form><fieldset>";
		echo "<label for='codi'>Codi</label><input type='text'  name='codi' id='codi' value=".$row[0]." class='text ui-widget-content ui-corner-all'>";
		echo "<label for='titol'>Titol</label><input type='titol' name='titol' id='titol' value=".$row[1]." class='text ui-widget-content ui-corner-all'>";
		echo "<label for='format'>Formati</label><input type='text' name='format' id='format' value=".$row[2]." class='text ui-widget-content ui-corner-all'>";
		echo "<label for='director'>Director</label><input type='text' name='director' id='director' value=".$row[3]." class='text ui-widget-content ui-corner-all'>";
		echo "<label for='duracio'>Duracio</label><input type='text' name='duracio' id='duracio' value=".$row[4]." class='text ui-widget-content ui-corner-all'>";
		echo "<label for='preu'>Preu</label><input type='text' name='preu' id='preu' value=".$row[5]." class='text ui-widget-content ui-corner-all'>";
		echo "<label for='stock'>Stock</label><input type='text' name='stock' id='stock' value=".$row[6]." class='text ui-widget-content ui-corner-all'>";
		echo "<input type='button' id='entrar' value='entrar'/> <input type='button' id='cancelar' value='cancelar'/>";
		echo "</fieldset></form></div>";
		echo "<script type='text/javascript'>creadialog(".$row[0].")</script>";
	}
	
	
}

/*Mostra els proveidors sota de cada producte quan se li dona click a la lupa*/
function mostra_proveidor($id){
	$con = conectar_bdd();
	$query = "SELECT * FROM productes, proveidors where productes.codi = proveidors.codi_producte AND productes.codi = '$id'";
	if ($result = mysql_query($query,$con)) $fields=mysql_num_fields($result);	
	if(!$result){
		echo 'No se puede hacer la consulta:'.mysql_error();
		exit;
	}
	for ($i=7; $i < 14; $i++){
			echo "<th class='proveedor capaocultar".$id."'>".mysql_field_name($result, $i)."</th>";	
	}
	echo "<th class='proveedor capaocultar".$id."'></th>";
	while ($row = mysql_fetch_row($result)) {				
		echo "<tr class='proveedor capaocultar".$id."'>";
		echo "<td>'".$row[7]."'</td>";
		echo "<td>'".$row[8]."'</td>";
		echo "<td>'".$row[9]."'</td>";
		echo "<td>'".$row[10]."'</td>";
		echo "<td>'".$row[11]."'</td>";
		echo "<td>'".$row[12]."'</td>";
		echo "<td>'".$row[13]."'</td>";
		echo "<td></td>";
		echo "</tr>";
	}
}
	

?>
