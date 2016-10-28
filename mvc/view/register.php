<?php 
/*------------------------------------------------------------------------------*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*|||||||||||||||||||||||||||ZeLog project by ZeAqua||||||||||||||||||||||||||||*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*------------------------------------------------------------------------------*/

?>

<div class="register-page">
	<div class="form">
		<form class="login-form" method="POST" action="index.php?page=register">
			<h2>Registration</h2>
			<div class="input-group">
				<input type="text" name="username" placeholder="Username" value="<?php echo $data['username'] ? $data['username'] : '';?>" required>
				<input type="email" name="email" placeholder='Email' value="<?php echo $data['email'] ? $data['email'] : '';?>" required>
				<input type="password" name="password" placeholder="Password" required>
				<input type="password" name="cpassword" placeholder="Confirm password" required>
			</div>
			<div class="input-group">
				<textarea readonly>This User Agreement (this “Agreement”) is a contract between you (“you” or “User”) and Upwork Global Inc. (“Upwork”, “we,” or “us”) and, to the extent expressly stated, our affiliates Upwork Escrow Inc. (“Upwork Escrow”) and Elance Limited.  You must read, agree to, and accept all of the terms and conditions contained in this Agreement in order to use our website located at www.upwork.com, all affiliated websites, including mobile websites and applications, owned and operated by us, our predecessors or successors in interest, or our Affiliates (collectively, the “Site”), all services (except the Freelancer Services), applications and products that are accessible through the Site and all Upwork mobile applications that link to or reference this Agreement (“Site Services”) whether provided by us or our Affiliates.</textarea>
				<div class="checkbox"><input type="checkbox" id="imagree" value="agree" required/><label for="imagree">I'm agree</label></div>
			</div>
			<button type="submit">Register</button>
			<p class="message">Already registered? <a href="index.php?page=login">Log in</a></p>
		</form>
	</div>
</div>


<?php ?>
