<?php
	$users = $this->sql->query("SELECT `username` FROM `users`");
?>
<div style="clear: both;">
<form method="post" action="upgradeuserx">
	<input required type="text" name="user" list="users" class="input">
	<datalist id="users">
	<?php
	while($user = mysqli_fetch_array($users)){
		echo '<option value="' . $user[0] . '" />';
	}
	?>
	</datalist>
	<br />
	<input type="submit" text="Upgrade!" >
</form>
</div>