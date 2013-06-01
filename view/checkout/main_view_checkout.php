<div class="checkout">
<?php
	if (isset($_COOKIE["trolley"])) {
		global $Orders;
		$counter =0;
		$troll = $_COOKIE['trolley'];
		$pieces = explode(';',$troll);
		echo "<table>";
		echo "<th>Product</th>";
		echo "<th>Quantity</th>";
		echo "<th>Price Per Product</th>";
		foreach ($pieces as $piece) {
			$lpiece =explode('-',$piece);
			echo "<tr>";
			echo "<td>";
			echo $Orders[$counter]['description'];
			echo "</td>";
			echo "<td>$lpiece[1]</td>";
			echo "<td>$lpiece[2]</td>";
			echo "<td>";
			echo "<button type='button' onClick='DeleteOrder($counter)' >Delete</button>";
			echo "</td>";
			echo "</tr>";		
			$counter++;
		}
		echo "<button type='button'>Confirm Orders!</button>";
	}
	else {
		echo "U don't have any items in your trolley yet";
	}
?>
</div>