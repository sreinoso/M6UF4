document.ready=function(){
    getCantPreguntas();
    var cantPreguntas;

    document.getElementById("logout").addEventListener("click",logout);
    document.getElementById("jugar").addEventListener("click",startGame);
    document.getElementById("envPreg").addEventListener("click",nextPregunta);
    
    var usuario = getCookie("usuario");
    $("#jugar").prop("disabled",true);
    
    $("#userLoged").html("Benvingut/da "+usuario);
    $("#pregunta").on("click",function(){
        $("#msg").html($("input:checked").val()+" checked");
    });
    //respuestas[posicionPreguntaJugando] = $("input:checked").val()+"checked");
    //$("aler").html( "<?php echo ( isset( $success ) ) ? '<p class=\"success\">'.$success.'</p>' : '<p class=\"failure\">'.$failure.'</p>'; ?>");
};