<?php
	require_once ('connect.php');
	$conn = Connect();
	// Βρίσκει όλα τα πεδία για τις εκδηλώσεις που εμφανίζει στη δεξιά στήλη
	
	$LoggedUserID = GetLoggedID();
	// Καλούμε τη συνάρτηση GetLoggedID() για να διαβάσουμε από το session cookie
	// το ID του συνδεδεμένου χρήστη. Εάν δεν υπάρχει συνδεδεμένος χρήστης, τότε επιστρέφει τιμή 0.
	// Αναθέτουμε την τιμή που επιστρέφει η GetLoggedID() στη μεταβλητή $LoggedUserID
	if ($LoggedUserID == 0)
	{
		$strSQL = " select 	events.ev_id, events.ev_name, events.ev_description,
							events.ev_startdate, event_photos.ph_photofile
					from 	events inner join event_photos on 
							events.ev_id = event_photos.ph_ev_id
					where 	event_photos.ph_featured=1 AND events.ev_published=1
					order 	by ev_startdate 
					LIMIT 	6
					";
	}
	else
	{
		$strSQL = "	select 	events.ev_id, events.ev_name, events.ev_description,
							events.ev_startdate, event_photos.ph_photofile
					from 	events inner join 
							event_photos on events.ev_id = event_photos.ph_ev_id 
					where events.ev_subcat in
					(
						select 		user_prefs.sub_cat_id
						from 		user_prefs
						where 		user_prefs.usr_id = $LoggedUserID 
					)";
	}
	$result = mysqli_query($conn, $strSQL);

	// Εάν δεν είναι δυνατή η εκτέλεση του ερωτήματος, διακοπή της εκτέλεσης
	if (!$result )
		die('Εμφανίσθηκε συνθήκη σφάλματος: ' . mysqli_error($conn));

	$row = mysqli_fetch_array($result);
	$ev_name = $row['ev_name'];
	// Πίνακας δυναμικών πληροφοριών. Τα δεδομένα προκύπτουν από αντίστοιχους πίνακες 
	mysqli_data_seek($result,0);
	while($row = mysqli_fetch_array($result))
	{
		$ev_id  = $row['ev_id'];
		$ev_name = $row['ev_name'];
		$ev_startdate = $row['ev_startdate'];
		$ph_photofile = $row['ph_photofile'];
		echo "<div class=\"recent-post\">";
		echo "<a class=\"EventInfo\" href=\"eventinfo.php?id=$ev_id\">";
		echo "<img class=\"pull-left\" src=\"content/$ph_photofile\" alt=\"thumb1\"></a><br><br>";
		echo "<strong><a class=\"EventInfo\" href=\"eventinfo.php?id=$ev_id\" >".$ev_name."</a></strong>";
		echo "<br>";
		$date = date_create ($ev_startdate);
		echo "<span class=\"class=\"EventInfo\" \">".date_format($date, 'd/m/Y')."</span>";
		echo "</div>";
		echo "<div class=\"clearfix\"></div>";
	}
?>
