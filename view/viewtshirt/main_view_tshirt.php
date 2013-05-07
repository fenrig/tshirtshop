<?php
	global $tshirt;
?>
<img class="fullnail" src="<?php echo 'http://' . $_SERVER['SERVER_ADDR'] . ':8081/thumbn/' . $tshirt['cid']; ?>" </img> 
<input name="quantity" type="number" value="0" min="1" max="32000"/>
<button onclick="JavaScript:alert('Added to your shopping cart')">Add</button>
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