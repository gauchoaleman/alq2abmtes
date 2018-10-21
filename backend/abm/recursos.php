
<!DOCTYPE html>

<html lang="es">
  <head>
    <?php include "include/inc_head.php"; 
	function borrarRecurso($idRecurso){
		  global $SqlLink;
		  $query = "DELETE FROM recurso WHERE idRecurso=$idRecurso;";
		  mysqli_query($SqlLink,$query);
	  }

	  ?>
  </head>

  <body>

    <div class="container">

<?php 
include "include/inc_menu.php"; 

	  if( isset($_GET["mensaje"]) ) echo $_GET["mensaje"];
	  
	  if( isset($_GET["accion"]))
	  {
	  switch( $_GET["accion"]){
		case "agregarRecurso":
			include "include/inc_formularioAgregarRecurso.php";
			break;
		case "borrarRecurso":
			borrarRecurso($_GET["idRecurso"]);
			include "include/inc_listadoRecursos.php";
			break;
		case "modificarRecurso":
			if( $_POST ){
				include "include/inc_listadoRecursos.php";
			}
			else
				include "include/inc_formularioModificarRecurso.php";
			break;
		case "listadoRecursos":
		default:
			include "include/inc_listadoRecursos.php";
			break;
	  }
	  }
	  else
	  {
		  include "include/inc_listadoRecursos.php";
	  }
	  ?>

      <!-- Site footer -->
      <footer class="footer">
        <p></p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
