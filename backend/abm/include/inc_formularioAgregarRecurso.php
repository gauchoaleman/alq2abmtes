<?php $query = "SELECT * FROM idTipoRecurso";
$resultObject=$SqlLink->query($query);?>
	 <!-- Formulario -->
	 
	 <div> 
	 Los campos marcados con * son obligatorios

      <form name="form" method="POST" action="include/inc_recurso.php" data-toggle="validator">
	   <div class="row">
    <div class="col-sm-4">
      <div class="form-group">
    <label for="exampleInputPassword1">Tipo recurso (*)</label><br>
	<select required name="idTipoRecurso">
    <?php 
	while ($obj = $resultObject->fetch_object()){
		echo "<option value='".$obj->idTipoRecurso."'>".$obj->descripcion."</option>";
	}
	?>
	</select>
  </div>	
    </div>
    <div class="col-sm-4">
     <div class="form-group">
    <label for="exampleInputPassword1">Descripción (*)</label>
    <input type="text" required name="descripcion" class="form-control">
  </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
    <label for="exampleInputPassword1">Costo x hora (*)</label>
    <input type="number" required name="costoxHora" class="form-control">
  </div> 
    </div>
  </div>

	
  
  
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</div>
