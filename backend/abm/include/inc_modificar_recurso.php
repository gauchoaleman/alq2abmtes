<?php 
require "inc_connectdb.php";

extract($_POST);

$query = "UPDATE recurso SET descripcion='$descripcion',costoxHora='$costoxHora', idTipoRecurso=$idTipoRecurso WHERE idRecurso=$idRecurso;";

//echo $query;
if( $SqlLink->query($query))
	$mensaje="La modificac	ion fue exitosa";
else
	$mensaje="La modificacion fracasó";
//phpinfo();
//print $_SERVER['HTTP_HOST'];

header("Location: http://".$_SERVER['HTTP_HOST']."/recursos.php?mensaje=".$mensaje);
?>