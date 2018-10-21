<!DOCTYPE html>
<html lang="es">    
<?php include "include/inc_head.php";?>

  <body>

    <div class="container">

<?php include "include/inc_menu.php"; 
	  
	  if( isset($_GET["mensaje"]) ) echo $_GET["mensaje"];
	  
	  if( isset($_GET["accion"]))
	  {
	  switch( $_GET["accion"]){
		case "agregarAlquiler":
			include "include/inc_formularioAgregarAlquiler.php";
			break;
		case "borrarAlquiler":
			borrarAlquiler($_GET["idAlquiler"]);
			include "include/inc_listadoAlquileres.php";
			break;
		case "modificarAlquiler":
			if( $_POST ){
				include "include/inc_listadoAlquileres.php";
			}
			else
				include "include/inc_formularioModificarAlquiler.php";
			break;
		case "listadoRecursos":
		default:
			include "include/inc_listadoAlquileres.php";
			break;
	  }
	  }
	  else
	  {
		  include "include/inc_listadoAlquileres.php";
	  }
?>
      <!-- Site footer -->
      <footer class="footer">
        <p></p>
      </footer>

    </div> <!-- /container -->

	
  </body>
</html>
<?php 
function borrarAlquiler($idAlquiler){
	 global $SqlLink;
	 $query = "DELETE FROM alquiler WHERE idAlquiler=$idAlquiler;";
	 mysqli_query($SqlLink,$query);
	 $query = "DELETE FROM recursoalquiler WHERE idAlquiler=$idAlquiler;";
	 mysqli_query($SqlLink,$query);
}?>
