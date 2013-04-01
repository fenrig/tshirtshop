<?php
	global $tshirts;
	// foreach doesn't work
	for($i = 0; $i < $tshirts->length(); $i++){
		echo '<div>' . $tshirts[$i]['description'] . '</div>';
	}
?>
