<?php
require_once 'core/init.php';

if (isset ( $_POST ['submit'] ) && isset ( $_POST ['email'] ) && isset ( $_POST ['password'] ) && isset ( $_POST ['userName'] )) {
	
	$email = $_POST ['email'];
	$password = $_POST ['password'];
	$userName = $_POST ['userName'];
	
	$result = User::insert ( $email, $password, $userName );
	
	if (false === $result) {
		echo "Error";
	} else {
		echo "You have successfully registered, <a href='login.php'>Click here to return to login form.</a>";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
<title>Registar</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header">
		<a href="/site_test">Your App Name</a>
	</div>
	<h1>Registar</h1>
	<span>or <a href="login.php">Login here</a></span>

	<form action="register.php" method="POST">

		<input type="text" placeholder="Enter your email" name="email"> <input
			type="text" placeholder="Enter your user name" name="userName"> <input
			type="password" placeholder="Enter your password" name="password"> <input
			type="submit" name="submit">

	</form>
</body>
</html>