document.ready=function(){
    var preguntas = getCantPreguntas(10);
    var preguntasCargadas = 0;
    document.getElementById("logout").addEventListener("click",logout);
    document.getElementById("jugar").addEventListener("click",startGame);
    
    var usuario = getCookie("usuario");
    
    $("#userLoged").html("Benvingut/da "+usuario);
};
