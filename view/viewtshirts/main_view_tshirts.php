<?php
	global $tshirts;
	
	foreach ($tshirts as $tshirt){
		echo '<div>' . $tshirt['description'] . '</div>';
	}
?>
