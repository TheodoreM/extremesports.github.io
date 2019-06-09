<head>
	<link rel="stylesheet" href="assets/css/custom.css" rel="stylesheet">
</head>
<?php
	include 'connect.php';

	//require 'connect.php';

	$conn = Connect(); 
	//$result = $conn->query($query); 

	$name = mysqli_escape_string($conn, $_POST['name']);
	$email = mysqli_escape_string($conn, $_POST['email']);
	$phone = mysqli_escape_string($conn, $_POST['phone']);
	$message = mysqli_escape_string($conn, $_POST['message']);

	$strSQL = " INSERT INTO contact (c_name, c_email, c_phone, c_message)
				VALUES ('$name', '$email', '$phone', '$message')";	

	$result = mysqli_query($conn, $strSQL);
	// Εάν η ενημέρωση είναι επιτυχής, φορτώνεται η σελίδα επεξεργασίας του χρήστη
	if ($result)
	{
		echo "<br><p class='errortext'>Ευχαριστούμε που επικοινωνήσατε μαζί μας.</br>Ένας συνεργάτης μας θα επικοινωνήσει μαζί σας το συντομότερο.<br>";
		$last_id = mysqli_insert_id($conn);
		//header("Location: edituser.php?id=$usr_id");
	}
	else
		echo "<br><p class='errortext'>".mysqli_error($conn)."<br>";
			

?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	