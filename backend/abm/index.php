<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include "include/inc_head.php"; ?>
  </head>

  <body>

    <div class="container">
<?php include "include/inc_menu.php";

if( isset($_GET["mensaje"]) ) echo $_GET["mensaje"];
if( isset($_GET["accion"]) )
	if($_GET["accion"] == "logout")	{
		session_destroy();
    echo "hola linea16";
		//header("Location: http://".$_SERVER['HTTP_HOST']."/loginForm.php");
	}
	else if($_GET["accion"] == "cambiarclave")	{
		header("Location: http://".$_SERVER['HTTP_HOST']."/cambiarClave.php");
	}

	include "include/inc_resumenDeCuentas.php";
	?><!-- Site footer -->
      <footer class="footer">
        <p></p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
<?php
function tryLogin($Data){
	global $SqlLink;

	extract($Data);
	$query = "SELECT idUsuario FROM usuario WHERE nombre='$nombre' AND clave='$clave';";
	echo $query;
	$resultObject = mysqli_query($SqlLink,$query);
	$obj = $resultObject->fetch_object();
	if( $resultObject->num_rows >0){
		$_SESSION["loginId"] = $obj->idUsuario;
		return true;
	}
	else
		return false;
}
?>
