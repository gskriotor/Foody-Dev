<?php

	session_start();
	
	$meat = $_SESSION['meat'];
	$i = $_SESSION['i'];
	$i -= 5;
	echo $i;
	echo $meat.'<br>';
	
	$resu = file_get_contents('https://api.edamam.com/search?q='.$meat.'&app_id=5ee0a61d&app_key=32e69f550e6b2ab75b8eec40ab00232f&from=0&to=100&calories=591-722&health=alcohol-free');
    	$out = json_decode($resu, true);
	
	echo $out['hits'][$i]['recipe']['label'];
	#session_unset();
	#session_destroy();
?>
