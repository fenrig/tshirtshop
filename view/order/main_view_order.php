<?php

	global $orderid;
	$orderid = mysql_real_escape_string($orderid);
	include_once('includes/sql.php');
	if( isset($this->sql) == false) $this->sql = new dbconnection();
	$order  = $this->sql->query("SELECT `AID`,`Order`,`Status` FROM  `Orders` WHERE OID = $orderid");
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
	<table style="border-width: 2px; border-style:solid; border: 1px solid black;">
		<tr>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Quantity</th>
		</tr>
<?php
	$pieces = explode(';', $firstquery[1]);
	foreach ($pieces as $piece){
		if($piece == '') continue;
		$order = explode('-', $piece);
		$tidx = $this->sql->query("SELECT tid FROM `tshirt` WHERE cid = $order[0]");
		$tidc = mysqli_fetch_array($tidx);
		$clothing = $this->sql->query("SELECT * FROM `clothings` WHERE cid = $order[0]");
		$clothingc = mysqli_fetch_array($clothing);
		echo "<tr><td><a href=\"/tshirt/$tidc[0]\">" . $order[0] . "</a></td><td><a href=\"/tshirt/$tidc[0]\">" . $clothingc[7]. "</a></td><td>" . $order[1] . "</td></tr>";
	}
?>
	</table>
	<hr>
<?php
	switch($firstquery[2]){
		case 0:
			echo "<a href=\"/shipped/$orderid\">Shipped</a>";
			break;
		case 1:
			echo "Already Shipped";
			break;
		default:
			echo "oei";
	}
?>