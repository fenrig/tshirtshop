<?php
	$users = $this->sql->query("SELECT `username` FROM `users`");
?>
<div style="clear: both;">
<form method="post" action="upgradeuserx">
	<table>
		<tr>
			<td>
				<select name="user">
				<?php
				while($user = mysqli_fetch_array($users)){
					echo '<option value="' . $user[0] . '" />' . $user[0] . '</option>';
				}
				?>
				</select>
				
			</td>
			<td>
				<input type="submit" text="Upgrade!" >
			</td>
		</tr>
	</table>
</form>
</div>