<?php 
	include 'funciones.php';

	$coma = '","';

	$list = $_GET['lists'];
	$type = $_GET['type'];
	$mode = $_GET['mode'];

	if ($mode == 'Lista') {
		header('Location: Listmode.php?lists='.$list.'&type='.$type);
	}

	$modos = readModes($list,$type);

	readItems($list,$type,$modos);


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lernglish</title>
	<link rel="stylesheet" href="estilos/index.css">
	<link rel="stylesheet" href="estilos/practice.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<div class="Container">
		<div class="top">
			<div class="hearts" id="hearts">
				<span class="heart" id="live1"></span>
				<span class="heart" id="live2"></span>
				<span class="heart" id="live3"></span>
			</div>
			<div class="coins">
				<span id="points">0</span>
			</div>
		</div>
		<h1 class="title">Lernglish</h1>
		<h2 id="h2"><?php echo $_GET['mode']; ?>:</h2>
		<div id="options">
			<a href="#" id="option1"></a>
			<a href="#" id="option2"></a>
			<a href="#" id="option3"></a>
			<a href="#" id="option4"></a>

		</div>

	</div>
	<script type="text/javascript" src="js/funciones.js"></script>
	<script type="text/javascript" src="js/practice.js"></script>
</body>
</html>