<?php 

require 'auth/database.php';

if(!empty($_POST['email'])&& !empty($_POST['password'])):
// Ener the new user in database
	$sql="INSERT INTO users (email, password) VALUES(:email,:password)";
	$stmt = $conn->prepare($sql);
	

	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':password',password_hash($_POST['password'],PASSWORD_BCRYPT));
endif;
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

	<form action="registar.php" method="POST">
	
		<input type="text" placeholder="Enter your email" name="email"> 
		<input type="password" placeholder="Enter your password" name="password">
		<input type="password" placeholder="Confirm password" name="password">	 
		<input type="submit">

	</form>
</body>
</html>