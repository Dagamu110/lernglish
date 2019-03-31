<?php 
	function writeJS($value)
		{
			echo "<script>".$value."</script>";
	}
	function readItems($list,$type,$modos){
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

	}
	function readModes($list,$type){
		$modos = array();
		$src = 'data/' . $list . '/' . $type;
		$modes_data = opendir($src);

		while ( ($cursor_mode = readdir($modes_data)) !== False){
			if ($cursor_mode != "." and $cursor_mode != "..") {
				$modos[] = explode('.', $cursor_mode)[0];
			}	
		}

		closedir($modes_data);

		return $modos;
	}
?>