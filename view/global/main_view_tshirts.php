<?php
	global $tshirts;
	?>

	<div class="product-grid">
	<div>
	<?php
	foreach ($tshirts as $tshirt){
		?>
			<a class="product-in-grid" href="<?php echo '/tshirt/' . $tshirt['tid']; ?>">
				<img class="fullnail" src="<?php echo 'http://' . $_SERVER['SERVER_ADDR'] . ':8081/thumbn/' . $tshirt['cid']; ?>" 
				onmouseover="this.src='<?php echo 'http://' . $_SERVER['SERVER_ADDR'] . ':8081/fulln/' . $tshirt['cid']; ?>'" 
				onmouseout="this.src='<?php echo 'http://' . $_SERVER['SERVER_ADDR'] . ':8081/thumbn/' . $tshirt['cid']; ?>'"/>
				<span class="price">
					<?php
					$number = number_format($tshirt['price'], 2, '.', '');
					$price = explode('.', $number);
					?>
					<span class="u">&#8364;</span>
					<span class="d"><?php echo $price[0] ?></span>
					<span class="c"><?php echo '.' . $price[1] ?></span>
				</span>
			</a>
		<?php
	}
	?>
	</div>
	<div id="pages">
		<span>
		<?php
			global $count;
			# var_dump($result);
			foreach(range(0,($count[0] / 20),1) as $counter){
				echo '<a href="#">' . $counter . '</a>';
			}
		?>
		</span>
	</div>
	</div>

	<?php
	# echo '<div>' . $tshirt['description'] . '</div>';
?>
