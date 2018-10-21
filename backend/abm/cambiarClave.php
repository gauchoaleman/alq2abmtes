<?php
session_start();
require "include/inc_connectdb.php";

if( isset($_POST["enviar"])){
	//echo "en el if";
	if( $_POST["clave1"]==$_POST["clave2"]){
		if(cambiarClave($_POST)){
			header("Location: http://".$_SERVER['HTTP_HOST']."/index.php?mensaje=Cambio de clave exitoso");
		}
		else echo "Cambio de clave no exitoso.";
	}
	else echo "Las claves ingresadas no coinciden.";
}

?>
<html>
<head>    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script type="/text/javascript" src="js/jquery-3.1.1.js" charset="UTF-8"></script></head>
	    <!-- Para el Menú - Custom styles for this template -->
    <link href="/css/justified-nav.css" rel="stylesheet">
<body>
<div class="container">
<h3 class="text-muted">Alquiler CAPACITAS - Cambio de clave</h3>
<div class="row">
	<div class="col-sm-3">
<form method="POST" data-toggle="validator">
	
	
<label for="exampleInputPassword1">Ingrese nueva Clave:</label>
    <input type="password" required name="clave1" class="form-control">
	</div>
	<div class="col-sm-3">
<label for="exampleInputPassword1">Reingrese Clave:</label>
    <input type="password" required name="clave2" class="form-control">
	</div>
	</div>
<button type="submit" class="btn btn-primary" name="enviar" value="login">Enviar</button>
</form>
</div>
</body>
</html>
<?php
function cambiarClave($Data){
	global $SqlLink;
			
	extract($Data);
	print_r($Data);
	print_r($_SESSION);
	$query = "UPDATE usuario SET clave='$clave1' WHERE idUsuario=".$_SESSION["loginId"].";";
	echo $query;
	$resultObject = mysqli_query($SqlLink,$query);
	return true;
}?>