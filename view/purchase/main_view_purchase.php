<div class="purchase">
<?php
if(isset($_SESSION['username'])) {
	echo "<br>Please choose a existing address from below or add a new one.<br>";
	global $UID;
	global $Addresses;
	echo "<form action='newaddresspurchase' method='post'>";
	echo "<p>";
	echo "Country : <input type='text' name='country'><br>";
	echo "Province : <input type='text' name='province'><br>";
	echo "City : <input type='text' name='city'><br>";
	echo "Street : <input type='text' name='street'><br>";
	echo "Number : <input type='text' name='number'><br>";
	echo "Extra : <TEXTAREA Name='extra' ROWS=3 COLS=45></TEXTAREA></br>";
	echo "<input type='submit' value='New address' />";
	echo "</p>";
	echo "</form>";

	if ($Addresses != NULL) {
		echo "</br></br>";
		$counter=0;
		echo "<table>";
		echo "<th>Country</th>";
		echo "<th>Province</th>";
		echo "<th>City</th>";
		echo "<th>Number</th>";
		echo "<th>Extra</th>";
		while ($tmp = mysqli_fetch_array($Addresses)) {
			echo "<tr>";
			echo "<td>";
			echo $tmp['Country'];
			echo "</td>";
			echo "<td>";
			echo $tmp['Province'];
			echo "</td>";
			echo "<td>";
			echo $tmp['City'];
			echo "</td>";
			echo "<td>";
			echo $tmp['Number'];
			echo "</td>";
			echo "<td>";
			echo $tmp['Extra'];
			echo "</td>";
			echo "<td>";
			echo "<button type='button' onClick='ConfirmPurchase(";
			echo $tmp['AID'];
			echo ")' >Choose</button>";
			echo "</td>";
			echo "</tr>";
			$counter++;
		}
	echo "<form name='buynow' action='addresspurchase' method='post'>";
	echo "<input type='hidden' id='HiddenAID' name='AID' >";
	echo "</form>";

	}
	else {
		echo "You don't have any existing addresses.";
	}
}
else {
	echo "<script type='text/javascript'>";
	echo "SavePage();";
	echo "</script>";
}
?>
</div>