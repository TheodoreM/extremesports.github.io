<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'phpmailer/vendor/autoload.php';	
define('SITEURL','http://localhost/xtreme/');
define('SITETITLE','EXTREME SPORTS');

function login ($conn, $user, $pass)
{
	$user = strip_tags(mysqli_real_escape_string($conn, $user));
	$pass = strip_tags(mysqli_real_escape_string($conn, $pass));
	
	$sql = "SELECT usr_id, usr_username, usr_password , usr_lastname, usr_firstname
			FROM users 
			WHERE usr_username = '$user' AND usr_password = '$pass'";
	$result = mysqli_query($conn, $sql) or die('Query failed. ' . mysqli_error($conn));
	if (mysqli_num_rows($result) == 1) 
	{
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$_SESSION['LoggedUserID'] = $row['usr_id'];
		$_SESSION['LoggedUsername'] = $row['usr_username'];
		// Ο χρήστης με id = 1 είναι ο διαχειριστής
		// Γίνεται εγγραφή της τιμής 1 στο session, στο πεδίο LoggedRoleID, το οποίο σημαίνει ότι είναι διαχειριστής
		if ($row['usr_id'] == 1)
			$_SESSION['LoggedRoleID'] = "1";
		else
			$_SESSION['LoggedRoleID'] = "0";
		$_SESSION['LoggedName'] = $row['usr_firstname']." ".$row['usr_lastname'];
	} 
	else 
	{
		$_SESSION['LoggedUserID'] = "0";
		$_SESSION['error'] = 'Wrong username or password';
	}
}

function GetLoggedID()
{
	if (isset ($_SESSION['LoggedUserID']))
		$LoggedID = $_SESSION['LoggedUserID'];
	else $LoggedID = 0;
	return $LoggedID;
}

function GetLoggedUserData()
{
	if (isset ($_SESSION['LoggedUserID']))
		$LoggedFullName = $_SESSION['LoggedName'];
	else
		$LoggedFullName = '';
	return $LoggedFullName;
}

function IsLoggedAdmin()
{
	$IsAdmin = false;
	if (isset ($_SESSION['LoggedUserID']))
	{
		if ($_SESSION['LoggedUserID'] == 1)
			$IsAdmin = True;
		else
			$IsAdmin = false;
	}
	return $IsAdmin;
}

// *******************************************************************************
//
// Function: do_logoff();
// Αποσυνδέει το χρήστη και καταστρέφει το session cookie
//
// *******************************************************************************
function logoff()
{
	// session_start();
    session_unset();
    // Καταστρέφει το session και διαγράφει το cookie
    session_destroy();
    return TRUE;

}

function echoX ($strOut, $strCondition)
{
	if (strlen($strCondition)>0)
		echo $strOut;
}

// Γενικές συναρτήσεις για χειρισμό μεταβλητών της PHP

function escape_numeric($var, $default) {
    if (empty($var)) {
        $var = $default;
    }
	return $var;
}

// Καθαρίζει μια μεταβλητή string, ώστε να αποφεύγεται το sql injection
function escape_alpha($conn, $data) 
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = mysqli_real_escape_string($conn, $data);

	return $data;
}


// Κλάση μηνύματος SMS
class Message 
{
	function Message($ToPhonenumbers, $MessageText) 
	{
		$this->ToPhonenumbers=new SoapVar($ToPhonenumbers, null, null, null, null, "api.suresms.com/soap/v1");
		$this->MessageText=new SoapVar($MessageText, null, null, null, null, "api.suresms.com/soap/v1");
	}
}


function messages() 
{
	$message = '';
	if(isset($_SESSION['success']) && $_SESSION['success'] != '') 
	{
		$message = '<div class="msg-ok">'.$_SESSION['success'].'</div>';
		$_SESSION['success'] = '';
	}
	if( isset($_SESSION['error']) && $_SESSION['success'] != '') 
	{
		$message = '<div class="msg-error">'.$_SESSION['error'].'</div>';
		$_SESSION['error'] = '';
	}
	echo "$message";
}


function SendSMSAlert ($arg1, $arg2)
{
	$url="http://api.suresms.com/soap/v1/service.asmx?wsdl";

	$client = new SoapClient($url, array("trace" => 1)); //you only need trace if you want to se the request

	$accountName="ProgressIT";
	$password="ehJ6PVNP";

	$message=new Message($arg1,$arg2);

	$params=array('AccountName' => $accountName, 'AccountPassword' => $password, 'Message' => new SoapVar($message, SOAP_ENC_OBJECT));

	$response=$client->CreateMessage($params);
	$sms_api_result = 0;
	// Έλεγχος αποστολής του SMS
	if ($sms_api_result == 0) 
	{
		// Ok, το SMS προωθήθηκε στο API
		// echo "<img src=\"Images/tick.png\">Το μήνυμα SMS στάλθηκε επιτυχώς.";
        return FALSE;
	}
	else 
	{
		// Αποτυχία, το SMS δεν στάλθηκε
		// echo "<img src=\"Images/warning.png\">Παρουσιάστηκε μια συνθήκη σφάλματος, η οποία δεν επιτρέπει την αποστολή του SMS.<br><br>";
        return TRUE;
	}                
	
}

function SendEmailAlert ($recipientEmail, $recipientName, $messageSubject, $messageText)
{
    $mail = new PHPMailer(TRUE);

	
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; // or 587
    $mail->Username = 'spyrosfoundas@gmail.com';    // SMTP username
    $mail->Password = '12121968';                   // SMTP password
	
	$mail->IsHTML(true);
	$mail->CharSet="UTF-8";
	
    $mail->From = 'xtremesports@gmail.com';
    $mail->FromName = "Extreme Sports";
               
    $mail->addAddress($recipientEmail, $recipientName);     // Add a recipient

    $mail->WordWrap = 50;                           // Set word wrap to 50 characters
    $mail->isHTML(true);                            // Set email format to HTML

    $mail->Subject = $messageSubject;
    $mail->Body    = $messageText;
    $mail->AltBody = $messageText;
    echo "<tr>";    
    if(!$mail->send()) 
    {
        return FALSE;
    } 
    else 
    {
        return TRUE;
    }
}

?>

