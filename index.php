<?php
session_start();
if(@$_SESSION['logged']!=true){
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link href="./js/recursos/jquery-ui.css" rel="stylesheet">
        <script src="./js/recursos/external/jquery/jquery.js"></script>
        <script src="./js/recursos/jquery-ui.min.js"></script>
        <script src="./js/recursos/jquery-ui.js"></script>
        <style>
            #linkreg{
                font-size:15px;
                text-decoration:none;
            }
            #condicions{
                font-size:12px;
                text-decoration:none;
            }
        </style>
        <script type="text/javascript" src="./js/PracticaUf4.js"></script>
        <script type="text/javascript" src="./js/login.js"></script>
    </head>
    <body>
        <div id="msg"></div>
        <button id="butoLogin">Login</button>
        <div id="dialog" title="Login">	
            <div id="formulario">
                <fieldset>
                    <label for="user">Usuari</label>
                    <input type="text" name="user" id="user" class="text ui-widget-content ui-corner-all">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass" class="text ui-widget-content ui-corner-all">
                    <input type="button" id="entrar" value="entrar"/>  
                    <input type="button" id="cancelar" value="cancelar"/> 
                </fieldset>
            </div>
            <a href="#" id="linkreg">No soc usuari. Vull registrar-me</a>
        </div>
        <div id="dialogReg" title="Registre">
            <form id="myForm">
                <fieldset>
                    <label for="useReg" id="redUsu">Usuari</label>
                    <input type="text" name="useReg" id="useReg" class="text ui-widget-content ui-corner-all">
                    <label for="pass" id="redPass">Password</label>
                    <input type="password" name="passReg" id="passReg" class="text ui-widget-content ui-corner-all">
                    <label for="mail" id="redMail">Email</label>
                    <input type="email" name="email" id="mail" class="text ui-widget-content ui-corner-all">
                    <label for="datanaix" id="redData">Data de naixement</label>
                    <input type="text" name="datanaix" id="myDate" class="text ui-widget-content ui-corner-all">
                    <input type="checkbox" id="check" name="condicions"><a id="condicions" href="#" >He llegit i accepto les condicions</a>
                    <input type="button" id="registre" value="Registrar-me"/>   
                    <input type="button" id="cancelReg" value="cancelar"/> 
                </fieldset>
            </form>
        </div>
        <div id="myDiv">

        </div>


    </body>
</html>
<?php
}else{
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Juego</title>
        <link href="./js/recursos/jquery-ui.css" rel="stylesheet">
        <script src="./js/recursos/external/jquery/jquery.js"></script>
        <script src="./js/recursos/jquery-ui.min.js"></script>
        <script src="./js/recursos/jquery-ui.js"></script>
        <style>
            #linkreg{
                font-size:15px;
                text-decoration:none;
            }
            #condicions{
                font-size:12px;
                text-decoration:none;
            }
        </style>
        <script type="text/javascript" src="./js/PracticaUf4.js"></script>
        <script type="text/javascript" src="./js/juego.js"></script>
    </head>
    <body>
        <div id="msg"></div>
        <div id="userLoged"></div>
        
        <div id="admin">
            <input type="button" id="jugar" name="jugar" value="JUGAR"/>
            <input type="button" id="consultar" name="consultar" value="CONSULTAR"/>
            <input type="button" id="logout" name="logout" value="LOGOUT"/>
        </div>
        <div id="panelJuego">
            <div class="pregunta">
                <!--<div class="enunciado">
                    Como te llamas?
                </div>
                <div class="respuesta">
                    <input type="radio" name="resp" value="pepe">Pepe</input>
                </div>
                <div class="respuesta">
                    <input type="radio" name="resp" value="pedro">Pedro</input>
                </div>
                <div class="respuesta">
                    <input type="radio" name="resp" value="juan">Juan</input>
                </div>
                <div class="respuesta">
                    <input type="radio" name="resp" value="aaa">aaa</input>
                </div>
            </div>-->
            <div id="acciones">
                <input type="button" id="envPreg" value="Enviar" name="envPeg">
            </div>
        </div>
    </body>
</html>
<?php
}
?>
