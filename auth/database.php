<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'site_test';
try{
	$conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
}catch (PDOException $e){
	die("Connection failed:".$e->getMessage());
}