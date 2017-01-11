<?php
$status = $_GET ["status"];

if ($status == "disp") {
	
	$link = mysqli_connect ( "localhost", "root", "" );
	mysqli_select_db ( $link, "site_test" );
	$res = mysqli_query ( $link, "select * from users" );
	
	echo "<table>";
	while ( $row = mysqli_fetch_array ( $res ) ) {
		echo "<tr>";
		
		echo "<td>" . $row ["id"] . "</td>";
		echo "<td><div id='name" . $row ['id'] . "'>" . $row ['email'] . "</div></td>";
		echo "<td><div id='userName" . $row ['id'] . "'>" . $row ["userName"] . "</div></td>";
		echo "<td><div id='password" . $row ['id'] . "'>" . $row ["password"] . "</div></td>";
		echo "<td> <input type='button' id='" . $row ['id'] . "' name='" . $row ['id'] . "' value='delete' onClick='delete1(this.id)'></td>";
		echo "<td> <input type='button' id='" . $row ["id"] . "' name='" . $row ["id"] . "' value='edit' onClick='aa(this.id)'>";
		echo "<input type='button' id='update" . $row ["id"] . "' name='" . $row ["id"] . "' value='update' style='visibility:hidden'  onClick='bb(this.name)'></td>";
		echo "</tr>";
	}
	
	echo "</table>";
}

if ($status == "update") {
	$id = $_GET ["id"];
	$name = $_GET ["name"];
	$userName = $_GET ["userName"];
	$password = $_GET["password"];
	
	$name = trim ( $name );
	$userName = trim ( $userName );
	$password = trim ( $password );
	
	$link = mysqli_connect ( "localhost", "root", "" );
	mysqli_select_db ( $link, "site_test" );
	$res = mysqli_query ( $link, "UPDATE `site_test`.`users` SET `email`='$name', `password`='$password', `userName`='$userName' WHERE `id`='$id';" );
}

if ($status == "delete") {
	$id = $_GET ["id"];
	
	$link = mysqli_connect ( "localhost", "root", "" );
	mysqli_select_db ( $link, "site_test" );
	$res = mysqli_query ( $link, "delete from  users  where id=$id" );
}

if ($status == "ins") {
	$name = $_GET ["name"];
	$userName = $_GET ["userName"];
	
	$link = mysqli_connect ( "localhost", "root", "" );
	mysqli_select_db ( $link, "site_test" );
	$res = mysqli_query ( $link, "insert into users (email,userName) VALUES ('{$name}', '{$userName}')" );
}

