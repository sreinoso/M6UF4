<?php
session_start();
if(@$_SESSION['logged']!=true){
    header("location: login.php");
?>
<?php
}else{
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
</head>
<body>

<input type="button" id="jugar" name="jugar" value="JUGAR"/>
 

 
 
 
 
 
 
 
</body>
</html>
<?php
}
?>
