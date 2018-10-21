<h1 align="right"><a href="/recursos.php?accion=agregarRecurso">+</a></h5>
<?
	  	$ResultObject = mysqli_query($SqlLink,"SELECT *,t.descripcion AS descripcionTipo,r.descripcion AS descripcionRecurso FROM recurso r,idTipoRecurso t WHERE r.idTipoRecurso=t.idTipoRecurso ORDER BY idRecurso;");
	
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
    <div class="col-sm-2" align="center" >
<h5>
    Tipo recurso
</h5>    
    </div>
    <div class="col-sm-3" align="center" >
<h5>
    Id
</h5>    
    </div>
    <div class="col-sm-3" align="center">
     
    <h5>
    Descripción
	</h5>
    </div>
	<div class="col-sm-3" align="center">
     
    <h5>
    Costo x hora
	</h5>

    </div>
	

	<?
		while ($obj = $ResultObject->fetch_object())
		{
    ?>
	 
	<div class="row">
    <div class="col-sm-1" align="center">

    <a onclick="return confirm('Seguro que quiere borrar el recurso?')" href="recursos.php?accion=borrarRecurso&idRecurso=<?echo $obj->idRecurso;?>">B</a>&nbsp;
	<a href="recursos.php?accion=modificarRecurso&idRecurso=<?echo $obj->idRecurso;?>">M</a>
    
		
    </div>
	<div class="col-sm-2" align="center">

    <?php echo $obj->descripcionTipo; ?>
		
    </div>
	<div class="col-sm-3" align="center">

    <?php echo $obj->idRecurso; ?>
    
		
    </div>
    <div class="col-sm-3" align="center">
     
    <?php echo $obj->descripcionRecurso; ?>
    </div>
	<div class="col-sm-3" align="center">
     
    <?php echo $obj->costoxHora; ?>

    </div>
	
    
  </div>
	<? }
	}
	 /* liberar el conjunto de resultados */
   	$ResultObject->close();?>
