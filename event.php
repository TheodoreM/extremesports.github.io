<?php
    require_once ('connect.php');
	require_once ('relatedposts.php');

	function echoX ($strOut, $strCondition)
    {
        if (strlen($strCondition)>0)
            echo $strOut;
    }

?>

<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>XTreme Event</title>

	<link rel="stylesheet" href="Styles/xtreme.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="shadowbox/shadowbox.css">

	<!-- include CSS always before including js -->
	<link type="text/css" rel="stylesheet" href="Styles/tn3.css"></link>
	<!-- include jQuery library -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<!-- include tn3 plugin -->
	<script type="text/javascript" src="scripts/jquery.tn3lite.min.js"></script>
	<!--  initialize the TN3 when the DOM is ready -->
	<script type="text/javascript" src="Scripts/xtreme.js"></script>
	<script type="text/javascript" src="Shadowbox/shadowbox.js"></script>
	<script type="text/javascript">
		Shadowbox.init();
	</script>

</head>

<body>

<?php
	// Δέχεται σαν παράμετρο το ev_id (ID της εκδήλωσης)
	$ev_id = $_GET["id"];
	$conn = Connect();
	// Βρίσκει όλα τα πεδία για την εκδήλωση με ev_id
	$strSQL = "SELECT * FROM event_info WHERE ev_id='$ev_id'";
	$result = mysqli_query($conn, $strSQL);

	// Εάν δεν είναι δυνατή η εκτέλεση του ερωτήματος, διακοπή της εκτέλεσης
	if (!$result )
		die('Εμφανίσθηκε συνθήκη σφάλματος: ' . mysqli_error($conn));

	// Καταχωρεί το όνομα της εκδήλωσης στη μεταβλητή $ev_Name
    $row = mysqli_fetch_array($result);
    $ev_name = $row['ev_name'];
    ?>
	<!-- Δημιουργείται ο πίνακας της σελίδας -->
    <table id="MasterTable">
        <!-- Γραμμή μενού -->
        <tr>
	        <td class="headingrow"></td>
        </tr>
        <!-- Γραμμή τίτλου σελίδας -->
        <tr>
    	    <td><h1><?php echo $ev_name?></h1></td>
        </tr>
    </table>
    
    <!-- Πίνακας δυναμικών πληροφοριών. Τα δεδομένα προκύπτουν από αντίστοιχους πίνακες -->
    <?php
	
	$gallery = 0;
	mysqli_data_seek($result,0);
	while($row = mysqli_fetch_array($result))
	{
		echo "<table id=\"InfoTable\">";
		echo "<tr>";
		$ev_id  = $row['ev_id '];
		$ev_subcat = $row['ev_subcat'];
		$ev_name = $row['ev_name'];
		$ev_description = $row['ev_description'];
		$ev_startdate = $row['ev_startdate'];
		$ev_enddate = $row['ev_enddate'];
		$ev_place = $row['ev_place'];
		$ev_lat = $row['ev_lat'];
		$ev_lon = $row['ev_lon'];
		$ev_cost = $row['ev_cost'];
		$ev_sorter = $row['ev_sorter'];
		$ev_published = $row['ev_published'];

		//$ev_featuredimage = row['ev_featuredimage'];
		$gallery++;
	
		echo "    <td id=\"LogoImage\">";
		//echoX ("       <a href=\"content/" . $ev_featuredimage . "\" rel=\"shadowbox[gallery".$gallery."]\"><img class=\"Logo\" alt=\"\" src=\"content/" . $ev_featuredimage . "\" /></a>", $ev_featuredimage);
		echo "    </td>";
		echo "    <td id=\"DataArea\" style=\"width: 500px;\">";
		echoX ("       <p class=\"DataCaption\">" . $ev_name . "</p>", $ev_name);
		echoX ("       <p class=\"ItemData\">" . $ev_description . "</p>", $ev_description);
		echoX ("       <p class=\"ItemData\">" . $ev_startdate . "</p>", $ev_startdate);
		echoX ("       <p class=\"ItemData\">" . $ev_enddate . "</p>", $ev_enddate);
		echoX ("       <p class=\"ItemData\">" . $ev_cost . "</p>", $ev_cost);
		echoX ("       <p class=\"ItemData\">" . $ev_place . "</p>", $ev_place);
		echo "    </td>";
		echo "    <td id=\"ThumbnailArea\">";
	
		// Βρίσκει τις φωτογραφίες κάθε κέντρου ψυχαγωγίας και εμφανίζει thumbnails
		$strSQL = "SELECT * FROM event_photos WHERE ev_ID = $ev_id";
		$Thumbnails = mysqli_query($conn, $strSQL);
		// Εάν δεν είναι δυνατή η εκτέλεση του ερωτήματος, διακοπή της εκτέλεσης
		if (!$Thumbnails )
			die('Εμφανίσθηκε συνθήκη σφάλματος: ' . mysqli_error($conn));
		
		while($row = mysqli_fetch_array($Thumbnails))
		{
			$ev_photofile = $row['ev_photofile'];
			$ev_photocaption = $row['ev_photocaption'];
			echoX ("<a href=\"content/" . $ev_photofile . "\" rel=\"shadowbox[gallery".$gallery."]\"><img class=\"Logo\" alt=\"\" src=\"content/" . $ev_photofile . "\" /> </a>", $ev_photofile);
		}		
		echo"    </td>";
		// Δεξιό κελί, περιέχει τον χάρτη
		echo "   <td id=\"LogoImage\">";
		echo "   <iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1572.7592888860447!2d".$ev_lat."!3d".$ev_lon."!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sel!2sgr!4v1419157251580\" style=\"width: 220px; height: 220px; border-width:6px; border-color: #e5dfd9; border-style: solid; margin: 0px;\"></iframe>";
		echo "   </td>";
		echo "   </tr>";
		echo "</table>";
	}
	?>
</body>
</html>