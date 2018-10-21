<br><form method="GET">Buscar:<input type="text" name="buscar"><input type="submit"></form><h1 align="right"><a href="/clientes.php?accion=agregarCliente">+</a></h5>
<?
$query = "SELECT * FROM cliente ";
if( isset($_GET["buscar"]) && $buscar=$_GET["buscar"])
	$query .= " AND (nombre LIKE '%$buscar%' OR apellido LIKE '%$buscar%' OR email LIKE '%$buscar%');";
	 $ResultObject = mysqli_query($SqlLink,$query);
	//echo $query;
	$ResultArray = array();
	if (!$ResultObject) 
		trigger_error("SQL Query failed: ".mysqli_error($SqlLink),E_USER_ERROR);
	else if($ResultObject->num_rows >0)
	{
?>
 
<div class="row">
    <div class="col-sm-1" align="center" >
<h5>
    &nbsp;
</h5>    
    </div>
    <div class="col-sm-1" align="center" >
<h5>
    Id
</h5>    
    </div>
    <div class="col-sm-2" align="center">
     
    <h5>
    Nombre
	</h5>
    </div>
	<div class="col-sm-2" align="center">
     
    <h5>
    Apellido
	</h5>

    </div>
	<div class="col-sm-1" align="center">
     
    <h5>
    DNI
	</h5>

    </div>
	<div class="col-sm-1" align="center">
    <h5>
    Sexo
	</h5>

    </div>
    <div class="col-sm-2" align="center">
        <h5>
    Email
	</h5>
  </div> 
    
  <div class="col-sm-2" align="center">
      <h5>
   Fecha de nacimiento
	</h5>	
  </div> 

	<?
		while ($obj = $ResultObject->fetch_object())
		{
    ?>
	 
	   <div class="row">
    <div class="col-sm-1" align="center">

    <a onclick="return confirm('Seguro que quiere borrar el cliente?')" href="clientes.php?accion=borrarCliente&idCliente=<?echo $obj->idCliente;?>">B</a>
	<a href="clientes.php?accion=modificarCliente&idCliente=<?echo $obj->idCliente;?>">M</a>
    
		
    </div>
	<div class="col-sm-1" align="center">

    <?php echo $obj->idCliente; ?>
    
		
    </div>
    <div class="col-sm-2" align="center">
     
    <?php echo $obj->nombre; ?>
    </div>
	<div class="col-sm-2" align="center">
     
    <?php echo $obj->apellido; ?>

    </div>
	<div class="col-sm-1" align="center">
     
    <?php echo $obj->dni; ?>

    </div>
	<div class="col-sm-1" align="center">
     
    <?php echo $obj->sexo; ?>

    </div>
    <div class="col-sm-2" align="center">
      <?php echo $obj->email; ?>
  </div> 
    
  <div class="col-sm-2" align="center">
      <?php $date = new DateTime($obj->fechaNacimiento);
			echo date_format($date, 'd/m/Y'); ?>
  </div> 
    
  </div>
	<? }
	}
	 /* liberar el conjunto de resultados */
   	$ResultObject->close();?>
