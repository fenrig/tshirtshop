<div class="checkout" style="clear: both;">
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
		echo "<th></th>";
		foreach ($pieces as $piece) {
			$lpiece =explode('-',$piece);
			echo "<tr>";
			echo "<td>";
			echo "<a href=/tshirt/";
			echo $Orders[$counter]['tid'];
			echo ">";
			echo $Orders[$counter]['description'];
			echo "</a>";
			echo "</td>";
			echo "<td>$lpiece[1]</td>";
			echo "<td>$lpiece[2]</td>";
			echo "<td>";
			echo "<button type='button' onClick='DeleteOrder($counter)' >Delete</button>";
			echo "</td>";
			echo "</tr>";		
			$counter++;
		}
		echo "<tr>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td style=\"text-align: center;\">";
		echo "<a id='Purchase' href='/purchase'>Confirm Order</a>";
		echo "</td>";
		echo "</tr>";
		echo "</table>";
	}
	else {
		echo "U don't have any items in your trolley yet";
	}
?>
</div>
