<?php
	# http://designshack.net/articles/css/verticalaccordionav/
	include_once('includes/sql.php');
	if( isset($this->sql) == false) $this->sql = new dbconnection();
	$colors  = $this->sql->query("SELECT DISTINCT  `color` FROM  `clothings`");
	$fabrics = $this->sql->query("SELECT DISTINCT  `fabric` FROM  `clothings`");
	$brands = $this->sql->query("SELECT DISTINCT  `brand` FROM  `clothings`");
	$formats = $this->sql->query("SELECT DISTINCT `format` FROM `tshirt`");
	$sleeves = $this->sql->query("SELECT DISTINCT `sleeves` FROM `tshirt`");
?>
<script type="text/javascript" src="http://chir.ag/projects/ntc/ntc.js"></script>
<script type="text/javascript">
	function updateLabel(){
		var color_value = document.getElementsByName("colorHex")[0].value.toUpperCase();
		var n_match = ntc.name(color_value);
		document.getElementById("color").value = n_match[1].toLowerCase();
	}
</script>
<div style="clear: both;">
<form method="post" action="addTshirt" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="31457280" />
	<table style="border-width:0px; color: white;">
		<tr>
			<td class="label">
				Price:
			</td>
			<td>
				<input required class="input" type="number" name="price" step="0.01" min="0.00"/>
			</td>
		</tr>
		<tr>
			<td class="label">
				Color:
			</td>
			<td>
				<input onChange="updateLabel()" type="color" name="colorHex" class="input" />
				<input required type="text" name="color" list="colorx" id="color" value="black"></input>
				<datalist id="colorx">
<?php
while($color = mysqli_fetch_array($colors)){
	echo '<option value="' . $color[0] . '" />';
}
?>
				</datalist>
			</td>
		</tr>
		<tr>
			<td class="label">
				Brand:
			</td>
			<td>
				<input required type="text" name="brand" list="brand" class="input">
				<datalist id="brand">
<?php
while($brand = mysqli_fetch_array($brands)){
	echo '<option value="' . $brand[0] . '" />';
}
?>	
				</datalist>
			</td>
		</tr>
		<tr>
			<td class="label">
				Agegroup:
			</td>
			<td>
				<select required name="agegroup">
					<option value="baby">Baby</option>
					<option value="child">Child</option>
					<option value="teenager">Teenager</option>
					<option value="adult">Adult</option>
					<option value="maternity">Maternity</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="label">
				Sex:
			</td>
			<td>
				<select required name="sex">
					<option value="unisex">Unisex</option>
					<option value="female">Female</option>
					<option value="male">Male</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="label">
				Fabric:
			</td>
			<td>
				<input required type="text" name="fabric" list="fabric" class="input">
				<datalist id="fabric">
<?php
while($fabric = mysqli_fetch_array($fabrics)){
	echo '<option value="' . $fabric[0] . '" />';
}
?>
				</datalist>
			</td>
		</tr>
		<tr>
			<td class="label">
				Description:
			</td>
			<td>
				<textarea name="description" rows="4" cols="50" maxlength="255" class="input"></textarea>
			</td>
		</tr>
		<tr>
			<td class="label">
				Format:
			</td>
			<td>
				<input required name="format" type="text" list="format" class="input">
				<datalist id="format">
<?php
while($format = mysqli_fetch_array($formats)){
	echo '<option value="' . $format[0] . '" />';
}
?>
				</datalist>
			</td>
		</tr>
		<tr>
			<td class="label">
				Sleeves:
			</td>
			<td>
				<input required type="text" name="sleeves" list="sleeves" class="input">
				<datalist id="sleeves">
<?php
while($sleeve = mysqli_fetch_array($sleeves)){
	echo '<option value="' . $sleeve[0] . '" />';
}
?>
				</datalist>
			</td>
		</tr>
		<tr>
			<td class="label">
				Thumbnail:
			</td>
			<td>
				<input type="file" name="thumbnail" accept="image/*"> 
			</td>
		</tr>
		<tr>
			<td class="label">
				Fullnail:
			</td>
			<td>
				<input type="file" name="fullnail" accept="image/*"> 
			</td>
		</tr>
		<tr>
			<td class="label" colspan="2" style="float:left;">
				<input type="submit" valye="Voeg Tshirt toe">
			</td>
		</tr>
	</table>
</form>
</div>