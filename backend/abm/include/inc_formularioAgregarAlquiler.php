<div>
Los campos marcados con * son obligatorios
<form name="form" method="POST" action="/include/inc_alquiler.php" data-toggle="validator">
	
		<div class="row">
		<div class="col-xs-4">
		<div class="form-group">
		<label for="exampleInputEmail1">Fecha inicio (*)</label><br>
			<input required type="datetime-local" name="fechaInicio">
		</div>	
		</div>	
		<div class="col-xs-4">
		<div class="form-group">
		<label for="exampleInputEmail1">Fecha fin (*)</label><br>
			<input required type="datetime-local" name="fechaFin">
		</div> 
		</div>
		<div class="col-xs-4">
		<div class="form-group">
		<label for="exampleInputEmail1">Observaciones</label><br>
			<input type="text" name="observaciones">
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
		echo "<input  minchecked='1' type='checkbox' name='recursos[]' value='".$obj->idRecurso."'>".$obj->descripcion.", $".$obj->costoxHora." por hora </option><br>";
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
	while ($obj = $resultObject->fetch_object()){
		echo "<option value='".$obj->idCliente."'>".$obj->nombre." ".$obj->apellido."</option>";
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
		<button type="submit" class="btn btn-primary">Enviar</button>
		</div>
				
				
		</div>


	
  
</form>
	</div>