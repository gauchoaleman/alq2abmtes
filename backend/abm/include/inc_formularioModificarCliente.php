<?php 

$query = "SELECT * FROM cliente WHERE idCliente=".$_GET['idCliente'];

$resultObjectDatosCliente=$SqlLink->query($query);
$datosObj = $resultObjectDatosCliente->fetch_object();
?>
	 <!-- Formulario -->
	 <div> 
	 Los campos marcados con * son obligatorios

      <form name="form" method="POST" data-toggle="validator" action="include/inc_modificar_cliente.php">
	   <div class="row">
    <div class="col-sm-4">
      <div class="form-group">
    <label for="exampleInputPassword1">Nombre (*)</label>
    <input type="text" name="nombre" required value="<? echo $datosObj->nombre;?>" class="form-control">
  </div>	
    </div>
    <div class="col-sm-4">
     <div class="form-group">
    <label for="exampleInputPassword1">Apellido (*)</label>
    <input type="text" name="apellido" required value="<? echo $datosObj->apellido;?>" class="form-control">
  </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
    <label for="exampleInputPassword1">Email (*)</label>
    <input name="email" required type="email" value="<? echo $datosObj->email;?>" class="form-control">
  </div> 
    </div>
  </div>

	
  <div class="row">
        <div class="col-sm-4">
      <div class="form-group">
    <label for="exampleInputPassword1">Sexo (*)</label><br>
    <input type="radio" name="sexo" required value="M" <?if ($datosObj->sexo=="M") echo "checked='checked'"?>>Masculino<br>
  <input type="radio" name="sexo" required value="F" <?if ($datosObj->sexo=="F") echo "checked='checked'"?>>Femenino<br>
  
  </div>	
   
    </div>
    <div class="col-sm-4">
      <div class="form-group">
    <label for="exampleInputPassword1">Dni (*)</label>
    <input type="number" name="dni" required value="<? echo $datosObj->dni;?>" class="form-control" >
  </div>	
    </div>
    <div class="col-xs-4">
		<div class="form-group">
		<label for="exampleInputEmail1">Fecha de nacimiento (*)</label><br>
			<input type="date" required name="fechaNacimiento" value="<? echo $datosObj->fechaNacimiento;?>" max="2010-12-31">
		</div>	
	</div>
</div>
	   <div class="row">

    <div class="col-sm-4">
     
    <div class="form-group">
    <label for="exampleInputPassword1">Teléfono (*)</label>
    <input type="text" required name="telefono" value="<? echo $datosObj->telefono;?>" class="form-control" >
  </div>	
  </div>
    
    <div class="col-sm-4">
  
    &nbsp;
  
    </div>
  </div>
  <input type="hidden" name="idCliente" value="<? echo $datosObj->idCliente;?>">
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</div>