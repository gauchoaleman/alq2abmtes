<?php 
require "inc_connectdb.php";

extract($_POST);
list($anio, $mes, $dia) = sscanf($fechaNacimiento, "%d-%d-%d");
$query = "INSERT INTO cliente (nombre,apellido,email,dni,sexo,fechaNacimiento,telefono) 
VALUES ('$nombre', '$apellido', '$email', '$dni', '$sexo', '$anio-$mes-$dia', '$telefono');";
if( $SqlLink->query($query))
	$mensaje="La inserción fue exitosa";
else
	$mensaje="La inserción fracasó";
//phpinfo();
//print $_SERVER['HTTP_HOST'];

header("Location: http://".$_SERVER['HTTP_HOST']."/clientes.php?mensaje=".$mensaje);
?>