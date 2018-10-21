<?php 
require "inc_connectdb.php";

$recursos = array();
extract($_POST);
print_r($_POST);

$expInicio = explode("T", $fechaInicio);
$impInicio = implode( " ",$expInicio);
$expFin = explode("T", $fechaFin);
$impFin = implode( " ",$expFin);

$precioTotal = obtenerPrecioTotal($recursos,$fechaInicio,$fechaFin);

$query = "UPDATE alquiler SET idCliente=$idCliente,fechaInicio='$impInicio',fechaFin='$impFin', observaciones='$observaciones', precioTotal='$precioTotal' WHERE idAlquiler=$idAlquiler;";
//echo $query;
$result=$SqlLink->query($query);

borrarRecursosAlquiler($idAlquiler);
agregarRecursosAlquiler($recursos,$idAlquiler);

if( $result )
	$mensaje="La modificación fue exitosa";
else
	$mensaje="La modificación fracasó";


//phpinfo();
//print $_SERVER['HTTP_HOST'];

header("Location: http://".$_SERVER['HTTP_HOST']."/alquileres.php?mensaje=".$mensaje);

function borrarRecursosAlquiler($idAlquiler){
	global $SqlLink;
	$query = "DELETE FROM recursoalquiler WHERE idAlquiler=$idAlquiler";
	echo $query;
	$SqlLink->query($query);
}

function agregarRecursosAlquiler($recursos,$idAlquiler){
	global $SqlLink;
	while (list($clave, $valor) = each($recursos)) {
		$query = "INSERT INTO recursoalquiler (idAlquiler,idRecurso) VALUES ($idAlquiler,$valor)";
		echo $query;
		$SqlLink->query($query);
	}
}

function obtenerPrecioTotal($recursos,$fechaInicio,$fechaFin){
	global $SqlLink;
	$costoTotal = 0;
	list($anioI, $mesI, $diaI,$horaI,$minutoI) = sscanf($fechaInicio, "%d-%d-%dT%d:%d");
	list($anioF, $mesF, $diaF,$horaF,$minutoF) = sscanf($fechaFin, "%d-%d-%dT%d:%d");
	//echo "FEchaHOra: $anioI-$mesI-$diaI $horaI:$minutoI";
	$fechaInicioFormateada = new DateTime("$anioI-$mesI-$diaI $horaI:$minutoI");
	$fechaFinFormateada = new DateTime("$anioF-$mesF-$diaF $horaF:$minutoF");
    $interval = $fechaFinFormateada->diff($fechaInicioFormateada);    
    //echo $interval->format("diffff: %H");
	
	$diff = abs(strtotime("$anioF-$mesF-$diaF $horaF:$minutoF") - strtotime("$anioI-$mesI-$diaI $horaI:$minutoI"));
	//echo "strtotime method: $diff";
	$diffHoras = $diff/(60*60);
	$difFechas = $fechaFin-$fechaInicio;
	//echo "Diff horas: $diffHoras";
	//echo "dif. fechas: $difFechas";
	while (list($clave, $valor) = each($recursos)) {
		$query = "SELECT costoxHora FROM recurso WHERE idRecurso=$valor";
		$sqlObj = $SqlLink->query($query);
		$obj = $sqlObj->fetch_object();
		$costoxHora=$obj->costoxHora;
		//echo "CostoTotal: $costoTotal";
		$costoTotal = $costoTotal+$diffHoras*$costoxHora;
		//echo "Costo por hora: ".$obj->costoxHora;
	}
	return $costoTotal;
}
?>