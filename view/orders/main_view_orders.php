<?php
	include_once('includes/sql.php');
	if( isset($this->sql) == false) $this->sql = new dbconnection();
	$openorders  = $this->sql->query("SELECT DISTINCT  `OID` FROM  `Orders` WHERE Status = 0");
	while($order = mysqli_fetch_array($openorders)){
		echo "<div><a href=\"/order/$order[0]\">Order '$order[0]'</a></div>";
	}
?>