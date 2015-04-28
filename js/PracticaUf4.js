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

	function valida(){						//Funcio per validar un usuari i contrasenya en el "dialog" - Login
		//if ((document.getElementById('user') == "")&&(document.getElementById('pass') =="")){					// Si l'usuari i pass no hi ha escrit res, fa un efecte d'esquerra a dreta
			 //$("#dialog").effect('shake');
		//} else {		
            
			//if (user === pass){							//Si l'usuari es igual a la pass, es tanca el "dialog" i mostra un missatge de benvinguda
            enviar("login");
            //alert("aaa");
			//	$( "#dialog" ).dialog( "close" );
			//	$("#Welcome").open = $("#Welcome").html("Benvingut/da "+ user);
			//} else if (user !== pass){					//Si l'usuari i la pass es diferent, fa un efecte d'esquerra a dreta
			//	 $("#dialog").effect('shake');
			//}
		//}
	}		
 
	$( "#butoLogin" ).click(function() {				//Quan cliquis en el boto de login s'obre el "dialog" - Login	
		$( "#dialog" ).dialog( "open" );
	});  
	$( "#cancelar" ).click(function() {					//Quan cliquis en el boto "cancelar" es tancará el "dialog" - Login
		$( "#dialog" ).dialog( "close" );
	});  
	$( "#entrar" ).click(function() {					//Quan cliquis en el boto "entrar" validará o no al usuari i password
	 valida (user.value,pass.value);					//Funcio "valida"
	}); 

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
 
function datos_post(tipo) {
    if(tipo === "login"){
//alert(tipo);
        var usuario= document.getElementById("user");
        var password= document.getElementById("pass");
        //alert("tipo=" + tipo + "&usr=" + usuario.value + "&pass=" + password.value);
        return "tipo=" + tipo + "&usr=" + usuario.value + "&pass=" + password.value;
    }
}

var conexion;

document.ready=function(){document.getElementById("entrar").addEventListener("click",valida);};
function enviar(tipo){
    if (window.XMLHttpRequest){
        conexion=new XMLHttpRequest();
    }
    else {
        conexion= new ActiveXObject("Microsoft.XMLHttp");
    }
    var datos=datos_post(tipo);
    alert(datos);
    conexion.open("POST", "/brain/php/conector.php",true);							// <form method=POST action=conector.php
    conexion.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    conexion.send(datos);													//submit


    conexion.onreadystatechange=function(){ 
        if (conexion.readyState==4 && conexion.status==200) { 
            //document.getElementById("myDiv").innerHTML=conexion.responseText; 
            if(tipo === "login") location.reload();
        } 
    };

}
  
