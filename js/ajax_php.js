function datos_post() {
    var usuario= document.getElementById("user");
    var password= document.getElementById("pass");
    return "usr=" + user.value + "&pass=" + pass.value;
}

var conexion;

document.getElementById("entrar").addEventListener("click",enviar);
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
