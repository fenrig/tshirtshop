<?php
	global $tshirt;
?>
<img class="fullnail" src="<?php echo 'http://' . $_SERVER['SERVER_ADDR'] . ':8081/thumbn/' . $tshirt['cid']; ?>" </img> 
<input id="amount" type="number" value="0" min="1" max="32000"/>
<button onClick="Add_To_Cart(<?php echo $tshirt['cid'] ?>,<?php echo $tshirt['price'] ?>)">Add</button>
<div>
		<h4>specs</h4>
		<hr>
		<table>
		<tr>
		<td>Price</td><td> &euro;<?php echo $tshirt['price'] ?></td> 
		</tr>
		<tr>
		<td>Brand</td><td><?php echo $tshirt['brand'] ?></td> 
 		</tr>
 		<tr>
 		<td>Sex</td><td><?php echo $tshirt['sex'] ?></td> 
		</tr>
		<tr>
		<td>Agegroup</td><td><?php echo $tshirt['agegroup'] ?></td> 
		</tr>
		<tr>
		<td>Color</td><td><?php echo $tshirt['color'] ?></td> 
		</tr>
		<tr>
		<td>Format</td><td><?php echo $tshirt['format'] ?></td> 
		</tr>
		<tr>
		<td>Sleeves</td><td><?php echo $tshirt['sleeves'] ?></td> 
		</tr>
		<tr>
		<td>Fabric</td><td><?php echo $tshirt['fabric'] ?></td> 
		</tr>
		<tr>
		<td>Description</td><td><?php echo $tshirt['description'] ?></td> 
		</tr>
		</table>
</div>
<script type="text/javascript">
	function Add_To_Cart(cid,price) {
		// cookie: "<cid>-<#>-<priceper>;..."
		if (document.getElementById('amount').value != 0) {
			var CookieValue="";
			var exdays=1;
			var exdate = new Date();
			exdate.setDate(exdate.getDate() + exdays);
			if(document.cookie.indexOf("trolley") >= 0){ // cookie bestaat
				var cookie = getCookie("trolley");
			}
			value = cookie + ";"+ cid + "-" + document.getElementById('amount').value + "-" + price;
			value = escape(value) +  "; expires="+exdate.toUTCString();
			document.cookie = "trolley =" + value;
			alert("Your Tshirt has been added to your shopping cart");
		}
		else {
			alert("Your Tshirt is NOT added to your shopping cart");
		}
			

	}
</script>