/****************************************************LOGIN********************************************************************/
$(function() {
	$( "#dialog" ).dialog({								//El "dialog" - Login, no s'obre si no cliques en el text
		autoOpen: false,
		show: {
			effect: "blind"
		},
		minWidth: 300, 									//Mides minimes i maximes del "dialog" - Login
		minHeight: 300,
		maxWidth: 350, 
		maxHeight: 300      
	});

 
	$( "#butoLogin" ).click(function() {				//Quan cliquis en el boto de login s'obre el "dialog" - Login	
		$( "#dialog" ).dialog( "open" );
	});  
	$( "#cancelar" ).click(function() {					//Quan cliquis en el boto "cancelar" es tancará el "dialog" - Login
		$( "#dialog" ).dialog( "close" );
	});  
	//$( "#entrar" ).click(function() {					//Quan cliquis en el boto "entrar" validará o no al usuari i password
	// valida (user.value,pass.value);					//Funcio "valida"
	//}); 

/*************************************************REGISTRE*******************************************************************/
	$( "#dialogReg" ).dialog({
		autoOpen: false,								//El "dialog" - Registre, no s'obre si no cliques en el text
		show: {
			effect: "blind"
		},
		minWidth: 320, 									//Mides minimes i maximes del "dialog" - Registre
		minHeight: 350,
		maxWidth: 320, 
		maxHeight: 350      
	});
	
		
	function validaReg(user,pass,email,data){			// Funció que valida l'usuari, la password, l'email, la data i el checkbox
		var valid=0;
		var exprEmail = /^([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,+]*(.){1}[a-zA-Z]{2,4})+$/;  //Patro per validar mail
		var exprData = /^([0][1-9]|[12][0-9]|3[01])(-)([0][1-9]|[1][0-2])(-)(\d{4})$/;								 //Patro per validar la data
				
		if (useReg.value.length > 6){					//Que l'usuari tingui mes de 6 caracters
			$("#redUsu").css({color: "black"});	
			valid ++;
		} else {
			$("#redUsu").css({color: "red"});
		}
		if (passReg.value.length > 6){					//Que la password tingui mes de 6 caracters
			$("#redPass").css({color: "black"});
			valid ++;
		}else{				
			$("#redPass").css({color: "red"});
		}
		if (exprEmail.test(email)){						//Que el mail tingui el mateix patro que 'exprEmail'
			$("#redMail").css({color: "black"});
			valid ++;				
		} else {
			$("#redMail").css({color: "red"});
		}
		if ($("#check").prop('checked')==true){			//Que el 'tick' de condicions estigui omplert
			$("#condicions").css({color: "black"});
			valid ++;				
		} else {
			$("#condicions").css({color: "red"});
		}
		var fechaComoObjeto=$( "#myDate" ).datepicker('getDate');		
		var dataUsu = new Date ();						//Crea una nova data per a ferla servir en l'any actual
		var anyActual = dataUsu.getFullYear();			//Guarda l'any actual
		if (data.value ==''){
			$("#redData").css({color: "red"});
		}	
		if ($( "#myDate" ).val().length ==0) {			//Mirar que no estigui buit el camp de la data
			$("#redData").css({color: "red"});
		} else {		
			if (((anyActual-fechaComoObjeto.getFullYear())>=18)&&(exprData.test(data))){	//Resta l'any actual amb la data introduida y mira que sigui l'edat major a 18 i mira que tingui el patró de 'exprData'
				$("#redData").css({color: "black"});	
				valid ++;
			} else {
				$("#redData").css({color: "red"});
			}		
		}	
		/*Cuando todos los campos esten OK entonces ::*/
		if(valid == 5){	
			alert('Todos los campos son correctos para el registro ');
		}	
	}	
	
/***********************************************DATA - REGISTRE**************************************************************/
 	var pickerOpts = {
		dateFormat: 'dd-mm-yy',							//Format de la data (dia-mes-any)
		yearRange:"1900:2005", 							//Rang dels anys que pot escollir 
		changeMonth: true,								//Habilitat per a que puguis escollir el mes
		changeYear: true,								//Habilitat per a que puguis escollir l'any
		buttonImage: "./js/recursos/images/calendar.gif",  			//ruta de la imatge pel calendari
		showOn: "button",								//Mostra el "buttonImage"
		buttonImageOnly: true,  						//Col·loca la imatge al costat del input
		buttonText: "Selecciona una data",				//Text que surt si et poses a sobre de la icona del calendari
		showButtonPanel: true							//Mostra uns botons per acceptar o posar la data actual
	};
	$("#myDate").datepicker(pickerOpts);				//Mostrar el calendari amb les opcions descrites abans	

	$( "#linkreg" ).click(function() {					//Quan cliquis al text "Vull registrarme" pasará al "dialog" de registre
		$( "#dialogReg" ).dialog( "open" );
	});
	
	$( "#cancelReg" ).click(function() {				//Quan cliquis en "cancelar" pasará a la finestra de login
		$( "#dialogReg" ).dialog( "close" );
	});
	
	$( "#registre" ).click(function() {					//Executa una funció per validar el registre
		validaReg(useReg.value,passReg.value,mail.value,myDate.value);
	});	

});


//##################################################
//AJAX
//##################################################
var preguntas = [];
var preguntasCargadas = 0;
var posicionPreguntaJugando = 0;
var respuestas = [];
var rc = [];
var tiempo;
    var progreso = 0;

function datos_post(tipo,data) {
    switch(tipo){
        case "login":
            //alert(tipo);
            var usuario= document.getElementById("user");
            var password= document.getElementById("pass");
            //alert("tipo=" + tipo + "&usr=" + usuario.value + "&pass=" + password.value);
            return "tipo=" + tipo + "&usr=" + usuario.value + "&pass=" + password.value;
        case "logout":
        case "totPregServ":
        case "getPreg":
            return "tipo=" + tipo + "&data=" + data;
        default:
            return "";

    }

}



function startGame () {
    $( "input" ).on( "click", function() {
        respuestas[posicionPreguntaJugando] = $( "input[type=radio]:checked" ).attr('id') + ":" + progreso;
    });

    $("#jugar").prop("disabled",true);
    $("#envPreg").css("display","block");
    //console.log(preguntas[posicionPreguntaJugando]);
    $("#pregunta").html(preguntas[posicionPreguntaJugando]);
    tiempo = setInterval(actualizarbar, 100);
    function actualizarbar(){
        $("#progressbar").progressbar({
            value: ++progreso
        });
        if(progreso == 100){    
            $("#progressbar").progressbar(0);
            $( "input" ).on( "click", function() {
                respuestas[posicionPreguntaJugando] = $( "input[type=radio]:checked" ).attr('id') + ":" + progreso;
            });
            clearInterval(tiempo);  
            posicionPreguntaJugando++;
            nextPregunta();
        } 
    }

    //$(function () {
    //    $("#progressbar").progressbar({
    //        value: progreso
    //    });
    //});
}
function nextPregunta(){
    if(posicionPreguntaJugando==0){
            posicionPreguntaJugando++;
    }
    //console.log(this);
    var paux=progreso;
    progreso = 0;
    if(this.id == "envPreg"){
                if($( "input[type=radio]:checked" ).attr('id')!= jQuery.type( undefined )){
                    respuestas[posicionPreguntaJugando] = $( "input[type=radio]:checked" ).attr('id') + ":" + progreso;
                }else{
                    respuestas[posicionPreguntaJugando] =  "r9:" + paux;
                }

        clearInterval(tiempo);  
    }
    tiempo = setInterval(actualizarbar, 100);

    function actualizarbar(){
        $("#progressbar").progressbar({
            value: ++progreso
        });
        if(progreso == 100){    
            clearInterval(tiempo);  
            nextPregunta(progreso);
        } 
    }

    //$(function () {
    //    $("#progressbar").progressbar({
    //        value: progreso
    //    });
    //});
    $("#pregunta").html(preguntas[posicionPreguntaJugando]);
    $( "input" ).on( "click", function() {
        respuestas[posicionPreguntaJugando] = $( "input[type=radio]:checked" ).attr('id') + ":" + progreso;
    });
    if(posicionPreguntaJugando==10){
        fin();
        clearInterval(tiempo); 
    }else{
        posicionPreguntaJugando++;
    }
}

function fin() {
    for(var i = 1 ; i<11;i++){
        respuestas[i] = respuestas[i].split(":");
        respuestas[i][0] = respuestas[i][0].substring(1);
    }
    
    //console.log(rc);
    //alert("FIN");
    $("#jugar").prop("disabled",false);
    $("#envPreg").prop("disabled",true);
    clearInterval(tiempo);  
    comprueba(rc,respuestas);
    preguntas = null;
    posicionPreguntaJugando = 0;

}

function comprueba(rc,respuestas){
//Experiència=(100 – Temps que hagi empleat en contestar en total) + (Número d’encerts * 10) –( Número d’errors * 20)  
var ttot = 0;
var ok = 0;
var nok = 0;

//console.log(rc);
//console.log(respuestas);
for(var i = 1; i<11; i++){
    console.log(respuestas[i][1]);
    ttot+=parseInt(respuestas[i][1]);
        console.log("rc["+(i-1)+"]: "+rc[i-1]);
        console.log("respuesta["+i+"]: "+respuestas[i][0]);
    if(rc[i-1] == respuestas[i][0]){
        ok++;
    }else{
        nok++;
    }
}

console.log(ok);
console.log(nok);
console.log(ttot);

ttot/=10;

var xp = (100 - ttot) + (ok*10) - (nok * 20);
console.log(xp);

}

function enviar(tipo,data){
    var conexion;
    if (window.XMLHttpRequest){
        conexion=new XMLHttpRequest();
    } else {
        conexion= new ActiveXObject("Microsoft.XMLHttp");
    }
    var datos=datos_post(tipo,data);
    //alert(datos);
    conexion.open("POST", "/brain/php/conector.php",true);							// <form method=POST action=conector.php
    conexion.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    conexion.send(datos);													//submit


    conexion.onreadystatechange=function(){ 
        if (conexion.readyState==4 && conexion.status==200) { 
            //console.log(conexion.responseText);
            var aux=JSON.parse(conexion.responseText); 
            tipo = aux.tipo;
            resul = aux.datos;
            action(tipo,resul);
        } 
    };

}

function action (tipo,datos) {
    //LA ACCIÓN SE REPITE VARIAS VECES, COMPROBAR PORQUE!
    /*TODO*/
    //alert(tipo);
    switch(tipo){
        case 'login':
            var usuario=document.getElementById("user");
            //alert (usuario);
            if(datos){
                document.getElementById('msg').innerHTML = "Benvingut/da "+usuario.value;
                window.setTimeout(function(){
                    setCookie("usuario",usuario.value,1);
                    location.reload();
                }
                , 1000);
            }else{
                $("#dialog").effect('shake');
            }
            break;
        case 'logout':
            document.getElementById('msg').innerHTML = "ADEU!";
            window.setTimeout(function(){
                location.reload();
            }
            , 1000);
            break;
        case 'totPregServ':
            cantPreguntas = datos.num1[0]; 
            getPreguntas(cantPreguntas);
            break;
        case 'getPreg':
            generaPregunta(datos);
            break;
    }
}
function valida(){						//Funcio per validar un usuari i contrasenya en el "dialog" - Login
    enviar("login");
}		

function logout(){
    //alert("logout");
    enviar("logout");
}

function registre () {
    var container = document.getElementById(this.parent);
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}

function getExpTot(usuario) {

}

function generaPregunta(datos){ 
    var html;

    //console.log(datos);
    var id = datos.id;
    var enunciado = datos.enunciado;
    var r1 = datos.r1;
    var r2 = datos.r2;
    var r3 = datos.r3;
    var r4 = datos.r4;
    var correcta = datos.rc;
    //de datos a id, enunciado, rx....
    //enviar(getPreg);
    html = "<div class='enunciado' id='" + id +"'> " + enunciado + " </div> <div class='respuesta'> <input type='radio' id='r0' name='resp'>"+r1+"</input> </div> <div class='respuesta'> <input type='radio' id='r1' name='resp'>"+r2+"</input> </div> <div class='respuesta'> <input type='radio' id='r2' name='resp'>"+r3+"</input> </div> <div class='respuesta'> <input type='radio' id='r3' name='resp'>"+r4+"</input></div>";
    preguntas[preguntasCargadas] = html;
    rc[preguntasCargadas] = correcta;
    //console.log(rc[preguntasCargadas]);
    //console.log(html);
    //console.log(preguntas);
    preguntasCargadas++;
    if(preguntasCargadas == 10){
        activaJugar();
    }
}

function activaJugar(){
    $("#jugar").prop("disabled",false);
}

function getCantPreguntas(){
    var totPregServ = enviar("totPregServ");
}

function getPreguntas(totPregServ){
    var listaUsadas = [];
    var totalPreguntas = 10;
    for (var i = 1; i <= totalPreguntas; i++) {
        //generar aleatorio 
        var num_rand;
        do{
            num_rand = Math.floor(Math.random() * 10) + 1;
            //console.log(num_rand);
        }while(listaUsadas.indexOf(num_rand)!=-1);
        listaUsadas.push(num_rand);
        //comprobar si ese aleatorio se ha usado antes

        //console.log(i);
        //en caso de no usarse, se genera la pregunta
        enviar("getPreg",num_rand);
        //console.log(preguntas);
    }
    //console.log(listaUsadas);
    //console.log("aaa");
}
