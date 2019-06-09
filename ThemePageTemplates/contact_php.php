<?php
     include 'connect.php';
	 
	//require 'connect.php';

    $conn = Connect(); 
    //$result = $conn->query($query); 
	 
	 $first = $_POST['first'];
	 $last = $_POST['last'];
	 $email = $_POST['email'];
	 $pwd = $_POST['pwd'];
	 
	 $sql = "INSERT INTO users (name, LastName, email, Password)
	        VALUES ('{$first}', '{$last}', '{$email}', '{$pwd}')";	
		mysqli_query($conn, $sql);	
		
		header("Location: contact.php");
		

?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	