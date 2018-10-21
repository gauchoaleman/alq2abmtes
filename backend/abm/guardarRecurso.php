<?php
require "include/inc_connectdb.php";



if( isset($_POST["enviar"])){
	//echo "en el if";
	if (tryLogin($_POST)){
		//echo "Login exitoso";
		//echo "Location: http://".$_SERVER['HTTP_HOST']."/index.php";
		
		
		header("Location: http://".$_SERVER['HTTP_HOST']."/index.php");
	}
	else $mensaje="Login no exitoso.";
}

?>
<html>
<head>    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script type="/text/javascript" src="js/jquery-3.1.1.js" charset="UTF-8"></script></head>
	    <!-- Para el Menú - Custom styles for this template -->
    <link href="/css/justified-nav.css" rel="stylesheet"></head>
<body>

<div class="container">
<h3 class="text-muted">Alquiler CAPACITAS - Login</h3>
<?if( isset($mensaje))
	echo $mensaje;?>
<div class="row">
    <div class="col-sm-3">
<form method="POST" data-toggle="validator">
<label required for="exampleInputPassword1">Nombre de usuario</label>
    <input type="text" name="nombre" class="form-control">
	</div>
	<div class="col-sm-3">
	
<label for="exampleInputPassword1">Clave</label>
    <input type="password" required name="clave" class="form-control">
	</div> 
	</div>
<button type="submit" class="btn btn-primary" name="enviar" value="login">Enviar</button>
</div>
</form>
</body>
</html>
<?php
function tryLogin($Data){
	global $SqlLink;
	
	extract($Data);
	//print_r($Data);
	$query = "SELECT idUsuario FROM usuario WHERE nombre='$nombre' AND clave='$clave';";
	//echo $query;
	$resultObject = mysqli_query($SqlLink,$query);
	$obj = $resultObject->fetch_object();
	if( $resultObject->num_rows >0){
		session_start();
		$_SESSION["loginId"] = $obj->idUsuario;
		return true;
	}
	else
		return false;
}?>