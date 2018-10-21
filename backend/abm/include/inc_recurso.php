<?php 
require "inc_connectdb.php";

extract($_POST);

$query = "INSERT INTO recurso (idTipoRecurso,descripcion,costoxHora) VALUES ($idTipoRecurso,'$descripcion','$costoxHora');";
//echo $query;
if( $SqlLink->query($query))
	$mensaje="La inserción fue exitosa";
else
	$mensaje="La inserción fracasó";
//phpinfo();
//print $_SERVER['HTTP_HOST'];

header("Location: http://".$_SERVER['HTTP_HOST']."/recursos.php?mensaje=".$mensaje);
?>