<?php 

if(!empty($_POST['email'])&& !empty($_POST['password']));




?>


<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header">
		<a href="/site_test">Your App Name</a>
	</div>
	<h1>Login</h1>
	<span>or <a href="register.php">Register here</a></span>
	<form action="login.php" method="POST">
		<input type="text" placeholder="Enter your email" name="email"> <input
			type="password" placeholder="Enter your password" name="password"> <input
			type="submit">

	</form>

</body>
</html>