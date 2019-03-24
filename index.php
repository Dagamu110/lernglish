<?php 

	// error_reporting(0);

	include 'funciones.php';

	$data = opendir('data');
	$lists = array();

	class Lista
	{
		public $name;
		public $types;
		public $modes;
		
		public function giveTypes($list)
		{
			$tipos = array();
			$src = 'data/' . $list;
			$types_data = opendir($src);


			while ( ($cursor_type = readdir($types_data)) !== False){
				if ($cursor_type != "." and $cursor_type != "..") {
					$tipos[] = $cursor_type;
				}	
			}

			closedir($types_data);

			return $tipos;

		}
		public function giveModes($list,$type)
		{
			$modos = array();
			$src = 'data/' . $list . '/' . $type[0];
			$modes_data = opendir($src);

			while ( ($cursor_mode = readdir($modes_data)) !== False){
				if ($cursor_mode != "." and $cursor_mode != "..") {
					$modos[] = explode('.', $cursor_mode)[0];
				}	
			}

			closedir($modes_data);

			return $modos;

		}

	}
	while ( ($cursor_list = readdir($data)) !== False){
		if ($cursor_list != "." and $cursor_list != "..") {
			$list = new Lista;
			$list->name = $cursor_list;
			$list->type = $list->giveTypes($list->name);
			$list->modes = $list->giveModes($list->name,$list->type);
			$lists[] = $list;
		}	
	}
	closedir($data);

	

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>Lernglish</title>
	<link rel="stylesheet" href="estilos/index.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<div class="Container">
		<form action="practice.php" method="get">
			<div class="selects">
				<select name="lists" id="lists">
					<option default>Listas</option>
				</select>
				<select name="type" id="type" style="display: none;">
					<option default>Tipos</option>
				</select>
				<select name="mode" id="mode" style="display: none;">
					<option default>Modos</option>
				</select>
			</div>
			<br>
			<button type="submit" class="start" id="start">Comenzar</button>

		</form>
	</div>
	<?php 
		writeJS("var lists = [];");
		foreach ($lists as &$lista) {
			$JSObject = "lists.push({ \n";
			$JSObject .= "'name':'" . $lista->name . "', \n";
			$JSObject .= "'type':['" . implode("','",$lista->type) . "'], \n";
			$JSObject .= "'modes':['" . implode("','",$lista->modes) . "']}); \n";
			writeJS($JSObject);
		}
	 ?>
	 <script type="text/javascript" src="js/funciones.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
</body>
</html>