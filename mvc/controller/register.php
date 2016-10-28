<?php 
/*------------------------------------------------------------------------------*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*|||||||||||||||||||||||||||ZeLog project by ZeAqua||||||||||||||||||||||||||||*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*------------------------------------------------------------------------------*/

//test session
session_start();
if ($_SESSION["username"]) {
	header('Location: search.php');
}

//test data existing
if (isset($_POST['email']) && isset($_POST['password'])) {

	$error = false;
	$email = $_POST['email'];

	//passwords compare
	if ($_POST['password'] != $_POST['cpassword']) $error = 'Confirmation faild... Reenter passwords';
	else {
		//DB connection
		include_once('config.php');
		$mysqli = new mysqli($config['db_host'], $config['db_user'], $config['db_password'], $config['db_name']);
	
		// Test connection
		if (mysqli_connect_errno()) {
		    printf("DB connection error: %s\n", mysqli_connect_error());
		    exit();
		}

		if ($stmt = $mysqli->prepare("SELECT email FROM users_tabl WHERE email = ?")) {
			$stmt->bind_param("s", $email);
			// Try to execute
			if ($stmt->execute()){ 
				$stmt->bind_result($email_db);
				$stmt->fetch();
				if (!$email_db) {//if user do not exist
		 			$stmt->close();
	
					//crypt password
					$password = $_POST['password'];
					$salt = '$2y$11$lkhdsfkhsdfhdfslfjdlsfjdkp';
					$hashed_password = crypt($password, $salt);
	
					//$query = "INSERT INTO `users_tabl` (email, password) VALUES ('$email', '$hashed_password')";
					if ($stmt = $mysqli->prepare("INSERT INTO `users_tabl` (email, password) VALUES (?, ?)")) {
						$stmt->bind_param("ss", $email,$hashed_password);
						// Try to execute
						if ($stmt->execute()){ 
							$_SESSION['username'] = $email;
							header('Location: index.php');
						} else $error = "User Registration Failed";
					}
				} else $error = 'This email already registred!';
				$stmt->close();
			} else {
				$error = 'Error : ('. $mysqli->errno .')';
			}
		}
		$mysqli->close();
	}
}

?>
<!-- error test -->
<script>if ('<?php echo $error;?>' != '') alert('<?php echo $error;?>')</script>
<link rel="stylesheet" href="main.css">
<div class="login-page">
	<div class="form">
		<form class="login-form" method="POST" action="register.php">
			<div class="input-group">
			<input type="email" name="email" placeholder='Email (enter something with "@")' <?php if ($email) echo "value='$email'";?>required>
			<input type="password" name="password" placeholder="Password" required>
			<input type="password" name="cpassword" placeholder="Confirm password" required>
			<button type="submit">Register</button>
			<p class="message">Already registered? <a href="login.php">Log in</a></p>
		</form>
	</div>
</div>


<?php ?>
