<?php
	# http://designshack.net/articles/css/verticalaccordionav/
	include_once('includes/sql.php');
	$this->sql = new dbconnection();
	$colors  = $this->sql->query("SELECT DISTINCT  `color` FROM  `clothings`");
	$fabrics = $this->sql->query("SELECT DISTINCT  `fabric` FROM  `clothings`");
	$brands = $this->sql->query("SELECT DISTINCT  `brand` FROM  `clothings`");
?>
<div class="searchbar">
	<form action="search/" method="get">
		<span>
			<input type="text" class="search square" name="q" placeholder="Search..." />
			<input class="searchbutton" type="submit" value="Search" />
		</span>
		<div class="hiddensearch">
			<div>
				<fieldset>
					<legend>Colors:</legend>
<?php
					while($color = mysqli_fetch_array($colors)){
						echo $color[0] . '<input type="checkbox" name="colors[]" value="' . $color[0] . '" />';
					}		
?>
				</fieldset>
			</div>
			<div>
				<fieldset>
					<legend>fabric</legend>
<?php
					while($fabric = mysqli_fetch_array($fabrics)){
						echo $fabric[0] . '<input type="checkbox" name="fabrics[]" value="' . $fabric[0] . '" />';
					}
?>
				</fieldset>
			</div>
			<div>
				<fieldset>
					<legend>brand</legend>
<?php
					while($brand = mysqli_fetch_array($brands)){
						echo $brand[0] . '<input type="checkbox" name="brands[]" value="' . $brand[0] . '" />';
					}
?>
				</fieldset>
			</div>
			<div>
				<fieldset>
					<legend>sex</legend>
					<select name="sex">
						<option value="None">Any</option>
						<option value="male">male</option>
						<option value="female">female</option>
					</select>
				</fieldset>
			</div>
			<div>
				<fieldset>
					<legend>age</legend>
					<select name="age">
						<option value="None">Any</option>
						<option value="baby">baby</option>
						<option value="child">child</option>
						<option value="teenager">teenager</option>
						<option value="adult">adult</option>
						<option value="maternity">maternity</option>
					</select>
				</fieldset>
			</div>
		</div>
	</form>
</div>