<?php 
$idTipoRecursoQuery = "SELECT * FROM idTipoRecurso";
$resultObjectTipoRecurso=$SqlLink->query($idTipoRecursoQuery);


$datosAlquilerQuery = "SELECT * FROM alquiler WHERE idAlquiler=".$_GET['idAlquiler'];
$resultObjectDatosAlquiler=$SqlLink->query($datosAlquilerQuery);
$datosAlquilerObj = $resultObjectDatosAlquiler->fetch_object();

$datosRecursosAlquilerQuery = "SELECT * FROM recursoAlquiler ra,recurso r WHERE idAlquiler=".$_GET['idAlquiler'];
$datosRecursosAlquilerQuery .= " AND ra.idRecurso = r.idRecurso";
//echo $datosRecursosAlquilerQuery;
$datosRecursosAlquilerObject=$SqlLink->query($datosRecursosAlquilerQuery);
$recursosAlquilados=array();
while($obj = $datosRecursosAlquilerObject->fetch_object()){
	$recursosAlquilados[]=$obj->idRecurso;
}
//print_r($recursosAlquilados);
$resultObjectDatosRecurso=$SqlLink->query($datosRecursosAlquilerQuery);
//$datosAlquilerObj = $resultObjectDatosRecurso->fetch_object();
?>
<div class="container">
Los campos marcados con * son obligatorios

<form name="form" method="POST" action="/include/inc_modificar_alquiler.php" data-toggle="validator">
	
		<div class="row">
		<div class="col-xs-4">
		<div class="form-group">
		<?
		$expInicio = explode(" ", $datosAlquilerObj->fechaInicio);
		$impInicio = implode( "T",$expInicio)
		?>
		<label for="exampleInputEmail1">Fecha inicio (*)</label><br>
			<input  type="datetime-local" required value="<? echo $impInicio;?>" name="fechaInicio">
		</div>	
		</div>	
		<div class="col-xs-4">
		<div class="form-group">
		<?
		$expFin = explode(" ", $datosAlquilerObj->fechaFin);
		$impFin = implode( "T",$expFin)
		?>
		<label for="exampleInputEmail1">Fecha fin (*)</label><br>
			<input  type="datetime-local" required value="<? echo $impFin;?>" name="fechaFin">
			
		</div> 
		</div>
		<div class="col-xs-4">
		<div class="form-group">
		<label for="exampleInputEmail1" >Observaciones</label><br>
			<input type="text" value="<? echo $datosAlquilerObj->observaciones;?>" name="observaciones">
		</div>	
		</div>	
		</div>
<div class="row">
		
		<div class="col-xs-4">
		<div class="form-group">
		<label for="exampleInputEmail1">Recursos</label><br>
		<?php $query = "SELECT * FROM recurso;";
$resultObject=$SqlLink->query($query);?>
    <?php 
	while ($obj = $resultObject->fetch_object()){
		echo "<input  type='checkbox' name='recursos[]'";
		if (in_array($obj->idRecurso,$recursosAlquilados)) echo " checked ";
		echo "value='".$obj->idRecurso."'>".$obj->descripcion.", $".$obj->costoxHora." por hora </option><br>";
	}
	?>
  </div>	
		
		</div> 

				<div class="col-xs-4">
		<div class="form-group">
		<?php $query = "SELECT * FROM cliente;";
$resultObject=$SqlLink->query($query);?>
<label for="exampleInputPassword1">Cliente (*)</label><br>
	<select required name="idCliente">
    <?php 
	while ($objCliente = $resultObject->fetch_object()){
		echo "<option ";
		if ($objCliente->idCliente==$datosAlquilerObj->idCliente) echo " selected "; 
		echo " value=".$objCliente->idCliente.">".$objCliente->nombre." ".$objCliente->apellido."</option>";
	}
	?>
	</select>
  </div>	
  </div>	
  <div class="col-xs-4">
		<div class="form-group">
		&nbsp
  </div>	
  </div>	
		
		</div> 
		<input type="hidden" name="idAlquiler" value="<? echo $datosAlquilerObj->idAlquiler;?>">
		<button type="submit" class="btn btn-primary">Enviar</button>
		</div>