<?php
session_start();
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','schoolcom');

define ('SCHOOLNAME', '2o цулмасио цкуйым меяым');

define('AlertPending', 1);
define('AlertOK', 2);
define('AlertFailed', 3);

$conn = mysqli_connect (DBHOST, DBUSER, DBPASS);

if(!$conn){
    die( "Sorry! There seems to be a problem connecting to our database.");
}
mysqli_select_db ($conn, DBNAME);
mysqli_query($conn, "SET NAMES UTF8");

define('DIR','http://localhost/schoolcom/');
define('DIRADMIN','admin/');
define('SITETITLE','School-Parent Communication');
define('included', 1);

class Homework
{
    public $hw_ID="N/A";
    public $hw_Text="N/A";
    public $hw_Assignment="N/A";
    public $hw_Deadline="N/A";
    public $hw_Student="N/A";
}


class Absence
{
    public $abs_ID="N/A";
    public $abs_Date="N/A";
    public $abs_Number="N/A";
    public $abs_StudID="N/A";
    public $abs_StudLastname="N/A";
    public $abs_StudFirstname="N/A";
    public $abs_ParEmail="N/A";
    public $abs_ParMobile="N/A";
    public $abs_ParPreferred="N/A";
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        
    </body>
</html>

