<?php
	include_once('includes/sql.php');
	if( isset($this->sql) == false) $this->sql = new dbconnection();
	$colors  = $this->sql->query("SELECT DISTINCT  `color` FROM  `clothings`");
?>