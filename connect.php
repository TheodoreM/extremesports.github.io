<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

function Connect()
{
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "extreme_events";

	// Create connection
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
mysqli_query($conn, "SET NAMES UTF8");
mysqli_query($conn, "SET CHARACTER SET 'UTF8'");

return $conn;
} 
?>

