<?php
require "inc_connectdb.php";
$query = "SELECT * FROM cliente;";
$resultObject=$SqlLink->query($query);?>
<label for="exampleInputPassword1">Cliente</label><br>
	<select required name="idCliente">
    <?php 
	while ($obj = $resultObject->fetch_object()){
		echo "<option value='".$obj->idCliente."'>".$obj->nombre." ".$obj->apellido."</option>";
	}
	?>
	</select>
  </div>	