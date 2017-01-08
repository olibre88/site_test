<?php
require_once 'core/init.php';

$getUsers = User::getUsers ();

foreach ( $getUsers as $data ) {
    $id = $data ['id'];
	$email = $data ['email'];
	$password = $data ['password'];
	$userName = $data ['userName'];
	$role = $data ['role'];
	
	$deleteUser = User::deleteUser($id);
	
	
	echo "<p class='com'>ID : $id , Email : $email, Password : $password, Username : $userName, Role : $role  </p>  
		 <input type='submit' name='delete' value='delete'/>";
	echo "<hr>";
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
<h1>Admin Panel</h1>


</form>

</body>
</html>