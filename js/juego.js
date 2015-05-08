document.ready=function(){
    getCantPreguntas();
    var cantPreguntas;

    document.getElementById("logout").addEventListener("click",logout);
    document.getElementById("jugar").addEventListener("click",startGame);
    
    var usuario = getCookie("usuario");
    
    $("#userLoged").html("Benvingut/da "+usuario);
};
