<?php
	include 'funciones.php';

	$list = $_GET['lists'];
	$type = $_GET['type'];

	$modos = readModes($list,$type);

	readItems($list,$type,$modos);
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modo Lista</title>
	<link rel="stylesheet" href="estilos/index.css">
	<link rel="stylesheet" href="estilos/list-mode.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
	<div class='Container' id="Container">
		<h1 class="title">Lernglish</h1>
		<div class="columns" id='div-columns'></div>
		<button id="check">Revisar</button>
	</div>
	<script type="text/javascript" src="js/funciones.js"></script>
	<script type="text/javascript" src="js/Listmode.js"></script>
</body>
</html>