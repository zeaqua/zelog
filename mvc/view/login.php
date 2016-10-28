<?php 
/*------------------------------------------------------------------------------*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*|||||||||||||||||||||||||||ZeLog project by ZeAqua||||||||||||||||||||||||||||*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*------------------------------------------------------------------------------*/

?>

<div class="login-page">
	<div class="form">
		<h2>Sign In</h2>
		<form class="login-form" method="POST" action="index.php?page=login">
			<div class="input-group">
			<input type="text" name="username" placeholder="Username" value="<?php echo $data['username'] ? $data['username'] : '';?>" required>
			<input type="password" name="password" placeholder="Password" required>
			<button type="submit">Log In</button>
			<p class="message">Not registered? <a href="index.php?page=register">Create an account</a></p>
		</form>
	</div>
</div>

<?php?>
