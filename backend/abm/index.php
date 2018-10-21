<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include "include/inc_head.php"; ?>
  </head>

  <body>

    <div class="container">
<?php
if (isset($_SESSION["loginId"])){
include "include/inc_menu.php";

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
}

function tryLogin($Data){
	global $SqlLink;

	extract($Data);
	$query = "SELECT Administradores_id FROM Administradores WHERE Nombre='$nombre' AND Clave='$clave';";
	//echo $query;
	$resultObject = mysqli_query($SqlLink,$query);
  //print_r($resultObject);
  $obj = $resultObject->fetch_object();
  print_r($obj);
	if( $resultObject->num_rows >0){
		$_SESSION["loginId"] = $obj->Administradores_id;
		return true;
	}
	else
		return false;
}
?>
