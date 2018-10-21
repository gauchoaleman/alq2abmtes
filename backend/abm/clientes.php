<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include "include/inc_head.php"; 
	function borrarCliente($idCliente)
	  {
		  global $SqlLink;
		  $query = "DELETE FROM cliente WHERE idCliente=$idCliente;";
		  mysqli_query($SqlLink,$query);
	  }?>
  </head>

  <body>

    <div class="container">

      <?php include "include/inc_menu.php"; 
	  if( isset($_GET["mensaje"]) ) echo $_GET["mensaje"];
	  
	  if( isset($_GET["accion"]))
	  {
	  switch( $_GET["accion"]){
		case "agregarCliente":
			include "include/inc_formularioCliente.php";
			break;
		case "modificarCliente":
			include "include/inc_formularioModificarCliente.php";
			break;
		case "borrarCliente":
			borrarCliente($_GET["idCliente"]);
			include "include/inc_listadoClientes.php";
			break;
		case "listadoClientes":
		default:
			include "include/inc_listadoClientes.php";
			break;
	  }
	  }
	  else
	  {
		  include "include/inc_listadoClientes.php";
	  }
	  
	  
	  ?>
      <!-- Site footer -->
      <footer class="footer">
        <p></p>
      </footer>

    </div> <!-- /container -->


   
  </body>
</html>
