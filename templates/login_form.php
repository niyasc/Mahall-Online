<div class='content'>
<form action='login.php' method='post'>

<table class='table-striped' style='width:400px'>
	<tr>
		<td style="text-align:center">
			<h4>Login</h4>
		</td>
	</tr>
	<?php
		if(!empty($_GET["error"]))
		{
		?>
		<tr>
			<td style='text-align:center'>
				<div class='label label-danger'>
				<?=$_GET["error"]?>
				</div>
			</td>
		</tr>
		<?php
		}
	?>
	<tr>
		<td>
			<input class='form-control' type='text' required='' name='uname' placeholder="Mahall user name" autofocus='' autosuggest='false'/>
		</td>
	</tr>
	<tr>
		<td>
			<input class='form-control' type='password' required='' name='passwd' placeholder="Password"/>
		</td>
	</tr>
	<tr>
		<td style='text-align:center'>
			<input type='submit' value='Login' class='btn btn-default'>
		</td>
	</tr>
		<tr>
		<td style='text-align:center'>
			<a href='register.php' class='btn btn-default'>Create Account</a>
		</td>
	</tr>
</table>
</form>

</div>

