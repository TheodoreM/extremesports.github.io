<?php
	ob_start();
	session_start();
	include 'Includes/functions.php';
?>
<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <!-- Title -->
        <title>Επεξεργασία δραστηριότητας</title>
        <!-- Meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- Favicon -->
        <link href="favicon.ico" rel="shortcut icon">
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.css" rel="stylesheet">
        <!-- Template CSS -->
        <link rel="stylesheet" href="assets/css/animate.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/nexus.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/custom.css" rel="stylesheet">
        <!-- Google Fonts-->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=PT+Sans" type="text/css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">
		
		<script src="js/xtreme.js"></script>
				
    </head>
    <body>
        <div id="body-bg">
			<?php
				require_once ('loggedinfo.php');
				// Δέχεται σαν παράμετρο το ev_id (ID της δραστηριότητας)
				$ev_id = $_GET["id"];
			?>
            <ul class="social-icons pull-right hidden-xs">
                <li class="social-rss">
                    <a href="#" target="_blank" title="RSS"></a>
                </li>
                <li class="social-twitter">
                    <a href="https://twitter.com/?lang=en" target="_blank" title="Twitter"></a>
                </li>
                <li class="social-facebook">
                    <a href="https://www.facebook.com/" target="_blank" title="Facebook"></a>
                </li>
                <li class="social-googleplus">
                    <a href="#" target="_blank" title="GooglePlus"></a>
                </li>
            </ul>
            <div id="pre-header" class="container" style="height: 60px">
                <!-- Spacing above header -->
            </div>
            <div id="header">
                <div class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.php" title="">
                                <img src="assets/img/Extreme-Sports.jpg" alt="Logo" />
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>
                </div>
            </div>
            <!-- Top Menu -->
            <div id="hornav" class="container no-padding">
                <div class="row">
                    <div class="col-md-12 no-padding">
                        <div class="text-center visible-lg">
                            <ul id="hornavmenu" class="nav navbar-nav">
                                <li>
                                    <a href="index.php" class="fa-home">Home</a>
                                </li>
								<?php
									require_once ('headmenu.php');
								?>
                                <li>
                                    <a href="contact.php" class="fa-comment">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top Menu -->
            <div id="post_header" class="container" style="height: 40px">
                <!-- Spacing below header -->
            </div>
            <div id="content-top-border" class="container">
            </div>
            <!-- === END HEADER === -->
            <!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <!-- Main Column -->
                        <div class="col-md-9">
                            <!-- Main Content -->
                            <div class="headline">
                                <h2>Επεξεργασία δραστηριότητας</h2>
                            </div>
							<?php
								$conn = Connect();
								// Βρίσκει όλα τα πεδία για την εκδήλωση με ev_id
								$strSQL = "SELECT * FROM events WHERE ev_id=$ev_id";
								$result = mysqli_query($conn, $strSQL);

								// Εάν δεν είναι δυνατή η εκτέλεση του ερωτήματος, διακοπή της εκτέλεσης
								if (!$result )
									die('Εμφανίσθηκε συνθήκη σφάλματος: ' . mysqli_error($conn));

								// Καταχωρεί το όνομα της εκδήλωσης στη μεταβλητή $ev_Name
								$row = mysqli_fetch_array($result);
								$ev_name = $row['ev_name'];
								// Πίνακας δυναμικών πληροφοριών. Τα δεδομένα προκύπτουν από αντίστοιχους πίνακες 
								$gallery = 0;
								mysqli_data_seek($result,0);
								while($row = mysqli_fetch_array($result))
								{
									$ev_id = $row['ev_id'];
									$ev_name = $row['ev_name'];
									$ev_description = $row['ev_description'];
									$ev_startdate = $row['ev_startdate'];
									$ev_enddate = $row['ev_enddate'];
									$ev_place = $row['ev_place'];
									$ev_published = $row['ev_published'];
									$ev_lat = $row['ev_lat'];
									$ev_lon = $row['ev_lon'];
									$ev_cost = $row['ev_cost'];
									$ev_sorter = $row['ev_sorter'];
									$ev_subcat = $row['ev_subcat'];
								}
							?>
							<!-- HTML φόρμα εισαγωγής των στοιχείων δραστηριότητας -->
							<form name="edit" action="<?php echo htmlentities($_SERVER['PHP_SELF']).'?id='.$ev_id; ?>" method="POST" enctype="multipart/form-data">

									<tr>	<!-- ID εκδήλωσης -->
									<td><label style="display:none">ID:</td></label>
									<td class="data_input">
										<input class="form-control" style="display:none; width: 200px;" type="text" name="ev_id" value="<?php if (isset($ev_id)) echo ($ev_id); ?>"></input>
									</td>
									</tr>
									<tr>	<!-- Κατηγορία δραστηριότητας -->
									<td><label>* Κατηγορία δραστηριότητας:</td></label>
									<td class="data_input">
										<select class="form-control" style="width: 200px;" name="ev_subcat" >
											<?php
											$strSQL = "	SELECT scat_id, scat_name
														FROM sub_categories
														ORDER BY scat_name";
											$result = mysqli_query($conn, $strSQL);
											if ($result)
											{
												while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
												{	
													$option_selected = '';
													if ($row['scat_id'] == $ev_subcat) $option_selected = 'selected';
													echo "<option value=".$row['scat_id']." ".$option_selected.">".$row['scat_name']."</option>";
												}
											}
											?>
										</select>
									</td>
									</tr>
									<tr>	<!-- Τίτλος εκδήλωσης -->
									<td><label>* Τίτλος εκδήλωσης:</td></label>
									<td class="data_input">
										<input class="form-control" style="width: 400px;" type="text" required name="ev_name" value="<?php if (isset($ev_name)) echo ($ev_name); ?>" size="50" max="100"></input>
									</td>
									</tr>
									<tr>	<!-- Περιγραφή -->
										<td><label>* Περιγραφή:</label></td>
										<td class="data_input">
											<textarea class="form-control" style="width: 200px;" type="textarea" required name="ev_description" value="" rows="5" cols="150" maxlength="3000"><?php if (isset($ev_description)) echo ($ev_description); ?></textarea>
										</td>
									</tr>
									<tr>	<!-- Ημερομηνία έναρξης δραστηριότητας -->
										<td><label>* Ημερομηνία έναρξης:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="date" required name="ev_startdate" value="<?php if (isset($ev_startdate)) echo ($ev_startdate); ?>" width="100px;"></input>
										</td>
									</tr>
									<tr>	<!-- Ημερομηνία ολοκλήρωσης δραστηριότητας -->
										<td><label>* Ημερομηνία ολοκλήρωσης:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="date" required name="ev_enddate" value="<?php if (isset($ev_enddate)) echo ($ev_enddate); ?>" width="100px;"></input>
										</td>
									</tr>
									<tr>	<!-- Τοποθεσία -->
										<td><label>* Τοποθεσία:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 300px;" type="text" required name="ev_place" value="<?php if (isset($ev_place)) echo ($ev_place); ?>" size="40" max="60"></input>
										</td>
									</tr>
									<tr>	<!-- Γεωγραφικό πλάτος -->
										<td><label>Γεωγραφικό πλάτος:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 100px;" type="text" name="ev_lat" value="<?php if (isset($ev_lat)) echo ($ev_lat); ?>" size="30" max="30"></input>
										</td>
									</tr>
									<tr>	<!-- Γεωγραφικό μήκος -->
										<td><label>Γεωγραφικό μήκος:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 100px;" type="text" name="ev_lon" value="<?php if (isset($ev_lon)) echo ($ev_lon); ?>" size="30" max="30"></input>
										</td>
									</tr>
									<tr>	<!-- Κόστος -->
										<td><label>Κόστος:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="number" name="ev_cost" value="<?php if (isset($ev_cost)) echo ($ev_cost); ?>"></input>
										</td>
									</tr>
									<tr><td><label></label><hr></td></tr>
									<tr>	<!-- Ταξινόμηση -->
										<td><label>Ταξινόμηση:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 40px;" type="text" name="ev_sorter" value="<?php if (isset($ev_sorter)) echo ($ev_sorter); ?>" size="3" max="3"></input>
										</td>
									</tr>
									<tr>	<!-- Κατάσταση δημοσίευσης -->
										<td><label>Δημοσιεύτηκε:</label></td>
										<td class="data_input">
											<select class="form-control" style="width: 200px;" name="ev_published" >
												<option value="1" "<?php if ($ev_published == 1) echo "selected"; ?>">Δημοσιεύθηκε</option>
												<option value="2" "<?php if ($ev_published == 2) echo "selected"; ?>">Σε αναμονή</option>
											</select>
										</td>
									</tr>
									<tr><td><label></label><hr></td></tr>
									<!-- Κουμπί "Καταχώρηση" και "Επαναφορά" -->
									<tr>
										<td></td>
										<td>
										<input class="btn btn-primary" type="submit" name="Submit" value="Αποθήκευση">
										<input class="btn btn-primary" name="NewPhoto" value="Νέα φωτογραφία" onclick="expandElement('divNewPhoto')"></input>
										</input>   <input class="btn btn-primary" type="reset" name="reset" value="Επαναφορά"></input>
										</td>
									</tr>
								</table>
							</form>

							<!-- End Form -->
							
							<!-- Λωρίδα φωτογραφιών του event στο κάτω μέρος της σελίδας  του event -->
							<br><h3>Φωτογραφίες</h3><p></p>
							<?php
								$strQuery = "	SELECT 		ph_id, ph_photofile, ph_photocaption, 
															ph_featured, ph_photosorter
												FROM 		events  
															INNER JOIN event_photos ON events.ev_id = event_photos.ph_ev_id
												WHERE 		events.ev_id = $ev_id
												ORDER BY 	ph_photosorter";
								$result = mysqli_query($conn, $strQuery);
								if ($result)
								{
									echo "<table id=\"InfoTable\"><tr>";
									while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
									{
										echo "<td>";
										$ph_id              = $row['ph_id'];
										$ph_photofile		= $row['ph_photofile'];
										$ph_photocaption	= $row['ph_photocaption'];
										$ph_featured		= $row['ph_featured'];
										echo "<img src='content/".$ph_photofile."' style='height: 100px;' /><br>";
										echo "<a href=\"deletephoto.php?id=$ph_id&ev_id=$ev_id  \"class=\"CommandText\">Διαγραφή</a><br>";

										echo "<td>";
									}
									echo "</tr></table id=\"InfoTable\">";
								}
							?>

							<div id="divNewPhoto" class="PopupFormBox" style="display: none; width: 800px; height: 340px">
								<?php
									require_once ('neweventphoto.php');
								?>
							</div>
							
							
                            <!-- End Main Content -->
                        </div>
                        <!-- End Main Column -->
						
						<?php 
							if (isset ($_POST['Submit']))
							{
								// Assign _POST array values to variables
								//$ev_id  = $_POST['ev_id '];
								$ev_subcat = $_POST['ev_subcat'];
								$ev_name = mysqli_escape_string($conn, $_POST['ev_name']);
								$ev_description = mysqli_escape_string($conn, $_POST['ev_description']);
								$ev_startdate = $_POST['ev_startdate'];
								$ev_enddate = $_POST['ev_enddate'];
								$ev_place = mysqli_escape_string($conn, $_POST['ev_place']);
								$ev_lat = escape_numeric($_POST['ev_lat'], 'null');
								$ev_lon = escape_numeric($_POST['ev_lon'], 'null');
								$ev_cost = escape_numeric($_POST['ev_cost'], 'null');
								$ev_sorter = mysqli_escape_string($conn, $_POST['ev_sorter']);
								$ev_published = $_POST['ev_published'];
								
								$strSQL = "	UPDATE 	events 
											SET 	ev_subcat = $ev_subcat, 
													ev_name = '$ev_name', 
													ev_description = '$ev_description', 
													ev_startdate = '$ev_startdate', 
													ev_enddate = '$ev_enddate', 
													ev_place = '$ev_place', 
													ev_lat = $ev_lat, 
													ev_lon= $ev_lon, 
													ev_cost = $ev_cost, 
													ev_sorter = '$ev_sorter', 
													ev_published = $ev_published 
											WHERE	ev_id = $ev_id";
								
								$result = mysqli_query($conn, $strSQL);
								// Εάν η ενημέρωση είναι επιτυχής, επιστρέφεται κατάλληλο μήνυμα
								if ($result)
								{
									echo "Τα στοιχεία της δραστηριότητας ενημερώθηκαν.";
									header("Location: editevent.php?id=$ev_id");
								}
								else
									echo "<br><p class='errortext'>".mysqli_error($conn)."</p>";
							}
						?>
                       
                    </div>
                </div>
            </div>
            <!-- === END CONTENT === -->
            <!-- === BEGIN FOOTER === -->
			<?php
				include 'xtremefooter.php';
			?>
            <!-- End Footer Menu -->
            <!-- JS -->
            <script type="text/javascript" src="assets/js/jquery.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/bootstrap.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/scripts.js"></script>
            <!-- Isotope - Portfolio Sorting -->
            <script type="text/javascript" src="assets/js/jquery.isotope.js" type="text/javascript"></script>
            <!-- Mobile Menu - Slicknav -->
            <script type="text/javascript" src="assets/js/jquery.slicknav.js" type="text/javascript"></script>
            <!-- Animate on Scroll-->
            <script type="text/javascript" src="assets/js/jquery.visible.js" charset="utf-8"></script>
            <!-- Sticky Div -->
            <script type="text/javascript" src="assets/js/jquery.sticky.js" charset="utf-8"></script>
            <!-- Slimbox2-->
            <script type="text/javascript" src="assets/js/slimbox2.js" charset="utf-8"></script>
            <!-- Modernizr -->
            <script src="assets/js/modernizr.custom.js" type="text/javascript"></script>
            <!-- End JS -->
    </body>
</html>
<!-- === END FOOTER === -->