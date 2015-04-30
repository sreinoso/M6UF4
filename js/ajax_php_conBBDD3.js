function datos_post() {
var usuario= document.getElementById("usuario");
var password= document.getElementById("password");
return "campo1=" + usuario.value + "&campo2=" + password.value;
}

var conexion;

function enviar(){
	if (window. XMLHttpRequest){
		conexion=new XMLHttpRequest();
	}
	else {
		conexion= new ActiveXObject("Microsoft.XMLHttp");
	}
	var datos=datos_post();
	conexion.open("POST", "conexion2.php",true);							// <form method=POST action=conexion2.php
	conexion.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	conexion.send(datos);													//submit


	conexion.onreadystatechange=function(){ 
		 if (conexion.readyState==4 && conexion.status==200) { 
			document.getElementById("myDiv").innerHTML=conexion.responseText; 
		 } 
	};

}
