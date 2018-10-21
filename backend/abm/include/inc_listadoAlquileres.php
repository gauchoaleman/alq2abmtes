<br><form method="GET">Buscar:<input type="text" name="buscar"><input type="submit"></form><h1 align="right"><a href="/alquileres.php?accion=agregarAlquiler">+</a></h4>
<?
//Hacer 2 queries: uno este, otro que joinea idtiporecurso, recurso y cliente y alquiler para mostrar los recursos que coinciden.
$query="SELECT * FROM alquiler a,cliente c WHERE a.idCliente=c.idCliente ";
if( isset($_GET["buscar"])){
	$buscar = $_GET["buscar"];
	$query .= "AND (observaciones LIKE '%$buscar%' OR c.nombre LIKE '%$buscar%' OR c.apellido LIKE '%$buscar%');";
}

$ResultObject = mysqli_query($SqlLink,$query);
		
	
	$ResultArray = array();
	if (!$ResultObject) 
		trigger_error("SQL Query failed: ".mysqli_error($SqlLink),E_USER_ERROR);
	else if($ResultObject->num_rows >0)
	{
?>
 
<div class="row">
    <div class="col-sm-1" align="center" >

    &nbsp;

    </div>
    <div class="col-sm-1" align="center" >
<h5>
    Id
</h5>    
    </div>
    <div class="col-sm-1" align="center">
     
  <h5>  
    Cliente
	</h5>
    </div>
	<div class="col-sm-2" align="center">
     
    <h5>
    Fecha inicio
	</h5>

    </div>
	<div class="col-sm-2" align="center">
     <h5>
    Fecha fin
	</h5>

    </div>
	<div class="col-sm-2" align="center">
    <h5>
	Obs.
	</h5>
</div>
	<div class="col-sm-2" align="center">
      <h5>  
    Recursos
	</h5>
  </div>
	
    <div class="col-sm-1" align="center">
      <h5>  
    Total
	</h5>
  </div> 
</div>


	<?
		while ($obj = $ResultObject->fetch_object())
		{
    ?>
	 
	   <div class="row">
    <div class="col-sm-1" align="center">

    <a onclick="return confirm('Seguro que quiere borrar el alquiler?')" href="alquileres.php?accion=borrarAlquiler&idAlquiler=<?echo $obj->idAlquiler;?>">B</a>
	<a href="alquileres.php?accion=modificarAlquiler&idAlquiler=<?echo $obj->idAlquiler;?>">M</a>
    
		
    </div>
	<div class="col-sm-1" align="center">

    <?php echo $obj->idAlquiler; ?>
    
		
    </div>
	<div class="col-sm-1" align="center">

    <?php echo $obj->nombre." ".$obj->apellido; ?>
    
		
    </div>
    <div class="col-sm-2" align="center">
     
    <?php 
	$FechaInicioDate = new DateTime($obj->fechaInicio);
	echo date_format($FechaInicioDate, 'd/m/Y h:m');?>
    </div>
	<div class="col-sm-2" align="center">
     
    <?php 
	$FechaFinDate = new DateTime($obj->fechaFin);
	echo date_format($FechaFinDate, 'd/m/Y h:m');?>

    </div>
	<div class="col-sm-2" align="center">
     
    <?php echo $obj->observaciones; ?>

    </div>
	<div class="col-sm-2" align="center">
     
    <?php mostrarRecursos($obj->idAlquiler); ?>

    </div>
    <div class="col-sm-1" align="center">
      $ <?php echo $obj->precioTotal; ?>
  </div> 
    
   
    
  </div>
	<? }
	}
	 /* liberar el conjunto de resultados */
   	$ResultObject->close();

	
	function mostrarRecursos($idAlquiler)
	{
		$ret="";
		global $SqlLink;
		$query="SELECT descripcion FROM recurso r,recursoalquiler ra WHERE ra.idAlquiler=$idAlquiler AND r.idRecurso=ra.idRecurso;";
		$ResultObject = mysqli_query($SqlLink,$query);
		//echo $query;
		while ($obj = $ResultObject->fetch_object()){
			$ret .= $obj->descripcion."<br>";
		}
		$ret .= "<hr>";
		echo $ret;
	}
?>