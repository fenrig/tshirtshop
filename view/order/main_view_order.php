<?php

	global $orderid;
	include_once('includes/sql.php');
	if( isset($this->sql) == false) $this->sql = new dbconnection();
	$order  = $this->sql->query("SELECT `AID`,`Order` FROM  `Orders` WHERE OID = $orderid");
	$firstquery = mysqli_fetch_array($order);
	$address = $this->sql->query("SELECT * FROM  `Addresses` WHERE AID = $firstquery[0]");
	$secondquery = mysqli_fetch_array($address);
	$user = $this->sql->query("SELECT * FROM  `users` WHERE uid = $secondquery[7]");
	$thirdquery = mysqli_fetch_array($user);

?>
	<table>
		<tr>
			<td>Username: </td>
			<td><?php echo $thirdquery[1] ?></td>
		</tr>
		<tr>
			<td>Country: </td>
			<td><?php echo $secondquery[1] ?></td>
		</tr>
		<tr>
			<td>Province: </td>
			<td><?php echo $secondquery[2] ?></td>
		</tr>
		<tr>
			<td>City: </td>
			<td><?php echo $secondquery[3] ?></td>
		</tr>
		<tr>
			<td>Street: </td>
			<td><?php echo $secondquery[4] . " " .  $secondquery[5] ?></td>
		</tr>
		<tr>
			<td>Extra: </td>
			<td><?php echo $secondquery[6] ?></td>
		</tr>
	</table>
	<hr>
	<table>
		<tr>
			<th>Order ID</th>
			<th>Quantity</th>
		</tr>
<?php
	$pieces = explode(';', $firstquery[1]);
	foreach ($pieces as $piece){
		if($piece == '') continue;
		$order = explode('-', $piece);

		echo "<tr><td>" . $order[0] . "</td><td>" . $order[1] . "</td></tr>";
	}
?>
	</table>
	<hr>
<?php
	echo "<a href=\"/shipped/$orderid\">Shipped</a>";
?>