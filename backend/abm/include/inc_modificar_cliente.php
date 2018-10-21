<?php 
require "inc_connectdb.php";

extract($_POST);
list($anio, $mes, $dia) = sscanf($fechaNacimiento, "%d-%d-%d");
$query = "UPDATE cliente SET nombre='$nombre', apellido='$apellido', email='$email', dni='$dni', sexo='$sexo', fechaNacimiento='$anio-$mes-$dia', telefono='$telefono' WHERE idCliente=$idCliente;";

if( $SqlLink->query($query))
	$mensaje="La modificación fue exitosa";
else
	$mensaje="La modificación fracasó";
//phpinfo();
//print $_SERVER['HTTP_HOST'];

header("Location: http://".$_SERVER['HTTP_HOST']."/clientes.php?mensaje=".$mensaje);
?>