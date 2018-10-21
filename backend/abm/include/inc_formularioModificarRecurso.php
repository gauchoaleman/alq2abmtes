<?php 
$idTipoRecursoQuery = "SELECT * FROM idTipoRecurso";
$resultObjectTipoRecurso=$SqlLink->query($idTipoRecursoQuery);


$datosRecursoQuery = "SELECT * FROM recurso WHERE idRecurso=".$_GET['idRecurso'];
$resultObjectDatosRecurso=$SqlLink->query($datosRecursoQuery);
$datosObj = $resultObjectDatosRecurso->fetch_object();
?>
	 <!-- Formulario -->
	 
	 <div> 
	 Los campos marcados con * son obligatorios

      <form name="form" method="POST" action="include/inc_modificar_recurso.php" data-toggle="validator">
	   <div class="row">
    <div class="col-sm-4">
      <div class="form-group">
    <label for="exampleInputPassword1">Tipo recurso (*)</label><br>
	<select name="idTipoRecurso" required><?php
	while($tipoRecurso = $resultObjectTipoRecurso->fetch_object() ){
		if( $tipoRecurso->idTipoRecurso == $datosObj->idTipoRecurso )
			$selectLine ="<option value='".$tipoRecurso->idTipoRecurso."' selected>".$tipoRecurso->descripcion."</option>";
		else
			$selectLine ="<option value='".$tipoRecurso->idTipoRecurso."'>".$tipoRecurso->descripcion."</option>";
		echo $selectLine;
	}
		
	
	?>
	
	</select>
  </div>	
    </div>
    <div class="col-sm-4">
     <div class="form-group">
    <label for="exampleInputPassword1">Descripción (*)</label>
    <input type="text" name="descripcion" required class="form-control" value="<? echo $datosObj->descripcion;?>">
  </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
    <label for="exampleInputPassword1">Costo x hora (*)</label>
    <input type="number" name="costoxHora" required class="form-control" value="<? echo $datosObj->costoxHora;?>">
	<input type="hidden" name="idRecurso" class="form-control" value="<? echo $datosObj->idRecurso;?>">
  </div> 
    </div>
  </div>

	
  
  
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</div>
