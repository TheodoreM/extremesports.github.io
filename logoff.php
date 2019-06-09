<?php
	session_start();
	include 'includes/functions.php';
	
	logoff();
	header ('Location: index.php');

?>