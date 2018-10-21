<?php
	$SqlLink = mysqli_connect("localhost", "root", "root","script_tesina");
	if (mysqli_connect_errno()) {
		trigger_error("Could not connect to SqlServer: ".mysqli_connect_error());
	}
?>
