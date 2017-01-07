<?php 

require_once 'core/init.php';
if (isset ( $_POST ['submit'] ) && isset ( $_POST ['email'] ) && isset ( $_POST ['password'] )) {

	$email = str_replace ( "'", "", $_POST ['email'] );
	$email = str_replace ( "<", "", $email );
	$email = str_replace ( ">", "", $email );

	$password = str_replace ( "'", "", $_POST ['password'] );
	$password = str_replace ( "<", "", $password );
	$password = str_replace ( ">", "", $password );

	if (empty ( $email ) || empty ( $password )) {
		die ( "Invalid data" );
	}

	

	$acaunt = User::getByUsernameAndPassword ( $email, $password );
	if($acaunt === false){
		echo "Nije pronadjen korisnika {$email} {$password}";
	}else{
		session_start ();
		$_SESSION ['user_id'] = $acaunt->id;
		$_SESSION ['user_name'] = $email;
		echo "Welcome $email";
		header ( "Location: index.php" );
	}
}




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
			type="submit" name="submit">

	</form>

</body>
</html>