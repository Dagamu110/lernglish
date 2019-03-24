<?php 
	include 'funciones.php';

	$coma = '","';

	$list = $_GET['lists'];
	$type = $_GET['type'];
	$mode = $_GET['mode'];

	$modos = array();
	$src = 'data/' . $list . '/' . $type;
	$modes_data = opendir($src);

	while ( ($cursor_mode = readdir($modes_data)) !== False){
		if ($cursor_mode != "." and $cursor_mode != "..") {
			$modos[] = explode('.', $cursor_mode)[0];
		}	
	}

	closedir($modes_data);

	$items = '';
	$extract = array();
	foreach ($modos as &$modo) {
		$archivo = 'data/' . $list . '/' . $type . '/' . $modo . ".txt";
		$bytes = filesize($archivo);
		$cursor = fopen($archivo, "r"); 
		$contenido = fread($cursor, $bytes); 
		fclose($cursor);
		$extract[] = explode(',', $contenido);
	}
	$expression = 'var php = [';

	for ($i=0; $i <= count($extract) - 1; $i++) { 
		$expression .= '["'.implode('","', $extract[$i]) . '"]';
		if ($i != count($extract) - 1) {
			$expression .= ',';
		}
	}
	$expression .= '];';
	$expression = trim(preg_replace('/\s+/', ' ', $expression));
	writeJS($expression);

	$modosJS = 'var modos = ["';
	for ($i=0; $i <= count($modos) - 1; $i++) { 
		$modosJS .= implode(',', (array) $modos[$i]);
		if ($i != count($modos) - 1) {
			$modosJS .= '","';
		}
	}
	$modosJS .= '"];';
	$modosJS = trim(preg_replace('/\s+/', ' ', $modosJS));
	writeJS($modosJS);


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