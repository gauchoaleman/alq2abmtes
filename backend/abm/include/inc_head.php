<?php
session_start();
/*
Código del head que se incluye en todas las páginas
*/
include_once("../../include/inc_connectdb.php");

if (!isset($_SESSION["loginId"]))
	require("./loginForm.php");
else{
?>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Alquileres CAPACITAS</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script type="/text/javascript" src="js/jquery-3.1.1.js" charset="UTF-8"></script>

    <!-- Para el Menú - Custom styles for this template -->
    <link href="/css/justified-nav.css" rel="stylesheet">

    <!-- Para Datepicker -->
    <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	<script type="text/javascript" src="/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/js/ie-emulation-modes-warning.js"></script>
	 <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
	<style>
	h5   {font-weight: bold;}
	</style>
  </head>
<?}?>
