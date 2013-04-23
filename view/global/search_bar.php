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
			<a class="optionslabel" onclick="var obj = document.getElementsByClassName('hiddensearch');
			if(obj.length > 0) obj[0].className ='showsearch'
			else document.getElementsByClassName('showsearch')[0].className ='hiddensearch';">Options</a>
		</span>
		<div class="hiddensearch">
			<div class="searchoptions" >
				<fieldset>
					<legend>Colors:</legend>
<?php
					while($color = mysqli_fetch_array($colors)){
						echo '<input type="checkbox" name="colors[]" value="' . $color[0] . '" />' . $color[0] . ' <br />';
					}		
?>
				</fieldset>
			</div>
			<div class="searchoptions" >
				<fieldset>
					<legend>fabric</legend>
<?php
					while($fabric = mysqli_fetch_array($fabrics)){
						echo '<input type="checkbox" name="fabrics[]" value="' . $fabric[0] . '" />' . $fabric[0] . ' <br />';
					}
?>
				</fieldset>
			</div>
			<div class="searchoptions" >
				<fieldset>
					<legend>brand</legend>
<?php
					while($brand = mysqli_fetch_array($brands)){
						echo '<input type="checkbox" name="brands[]" value="' . $brand[0] . '" />' . $brand[0] . '<br />';
					}
?>
				</fieldset>
			</div>
			<div class="searchoptions smallersearchoptions" >
				<fieldset>
					<legend>sex</legend>
					<select name="sex">
						<option value="None">Any</option>
						<option value="male">male</option>
						<option value="female">female</option>
					</select>
				</fieldset>			
				<fieldset class="pos_vert_bottom">
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