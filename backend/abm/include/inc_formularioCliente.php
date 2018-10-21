
	 <!-- Formulario -->
	 <div> 
	 Los campos marcados con * son obligatorios

      <form name="form" method="POST" action="include/inc_cliente.php" data-toggle="validator">
	  
	   <div class="row">
    <div class="col-sm-4">
      <div class="form-group">
    <label for="exampleInputPassword1">Nombre (*)</label>
    <input type="text" name="nombre" required class="form-control">
  </div>	
    </div>
    <div class="col-sm-4">
     <div class="form-group">
    <label for="exampleInputPassword1" >Apellido (*)</label>
    <input type="text" name="apellido" required class="form-control">
  </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
    <label for="exampleInputPassword1">Email (*)<label>
    <input type="email" id="inputEmail" required name="email" class="form-control">
  </div> 
    </div>
  </div>

	
  <div class="row">
        <div class="col-sm-4">
      <div class="form-group">
    <label for="exampleInputPassword1">Sexo (*)</label><br>
    <input type="radio" name="sexo" required value="M">Masculino<br>
  <input type="radio" name="sexo" required value="F">Femenino<br>
  
  </div>	
   
    </div>
    <div class="col-sm-4">
      <div class="form-group">
    <label for="exampleInputPassword1">Dni (*)</label>
    <input type="number" name="dni" required class="form-control" >
  </div>	
    </div>
    <div class="col-xs-4">
		<div class="form-group">
		<label for="exampleInputEmail1">Fecha de nacimiento (*)</label><br>
			<input type="date" required name="fechaNacimiento" max="2010-12-31">
		</div>	
	</div>
</div>
	   <div class="row">

    <div class="col-sm-4">
     
    <div class="form-group">
    <label for="exampleInputPassword1">Teléfono (*)</label>
    <input type="text" required name="telefono" class="form-control" >
  </div>	
  </div>
    
    <div class="col-sm-4">
  
    &nbsp;
  
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</div>