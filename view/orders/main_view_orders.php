<?php
	include_once('includes/sql.php');
	if( isset($this->sql) == false) $this->sql = new dbconnection();
	$openorders  = $this->sql->query("SELECT DISTINCT  `OID` FROM  `Orders` WHERE Status = 0");
?>
<h4>Payed orders to ship:</h4>
<ul>
<?php
	while($order = mysqli_fetch_array($openorders)){
		echo "<li><div><a href=\"/order/$order[0]\">Order '$order[0]'</a></div></li>";
	}
?>
</ul>
<script type="text/javascript">
function goToOrder(){
	window.location = "/order/" + document.getElementById("orderbox").value;
}
</script>
<h4>Other orders:</h4>
<select id="orderbox">
<?php
	$orders  = $this->sql->query("SELECT DISTINCT  `OID` FROM  `Orders`");
	while($order = mysqli_fetch_array($orders)){
		echo "<option value=\"$order[0]\">$order[0]</option>";
	}

?>
</select>
<input type="button" onclick="goToOrder()" value="Go to order">