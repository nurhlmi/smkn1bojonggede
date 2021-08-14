<?php
	/*echo $pathInfo = $_SERVER['PATH_INFO'];
	$explodedPath = explode('/', $pathInfo);
	
	if($explodedPath[1] == "read") {
		if($explodedPath[2] == "11230921312321") {
			echo "<br>bisa";
		} else {
			echo "<br>gabisa";
		}
	} else {
		echo "<br>gabisa read";
	}*/
	
	function textToSlug($text='asd') {
		$text = trim($text);
		if (empty($text)) return '';
		$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
		$text = strtolower(trim($text));
		$text = str_replace(' ', '-', $text);
		$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
		return $text;
	}
?>