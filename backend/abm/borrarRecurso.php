<?php
require "include/inc_connectdb.php";

include "include/inc_head.php"; 
function borrarRecurso($idRecurso){
		global $SqlLink;
		$query = "DELETE FROM recurso WHERE idRecurso=$idRecurso;";
		  mysqli_query($SqlLink,$query);
		  }


if( isset($_POST["confirmado"])){
	borrarRecurso($_GET["idRecurso"]);		
	header("Location: http://".$_SERVER['HTTP_HOST']."/recursos.php");
}

?>
<html>
<head>    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script type="/text/javascript" src="js/jquery-3.1.1.js" charset="UTF-8"></script></head>
	    <!-- Para el Menú - Custom styles for this template -->
    <link href="/css/justified-nav.css" rel="stylesheet"></head>
<body>

<div class="container">
<h3 class="text-muted">Alquiler CAPACITAS - Borrar recurso</h3>
<script>var r = confirm("Press a button!");
if (r == true) {
    location.href "/borrarRecurso.php?idRecurso=<? echo $_GET["idRecurso"]; ?>&confirmado";
} else {
    location.href "/recursos.php";
}</script>
</div>
</body>
</html>