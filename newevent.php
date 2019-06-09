<?php
	ob_start();
	require_once ('connect.php');
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
        <title>Καταχώρηση νέας δραστηριότητας</title>
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
                                <h2>Νέα δραστηριότητα</h2>
                            </div>
							
							<!-- HTML φόρμα εισαγωγής των στοιχείων δραστηριότητας -->
							<form name="edit" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">

									<tr>	<!-- ID εκδήλωσης -->
									<td><label style="display:none">ID:</td></label>
									<td class="data_input">
										<input class="form-control" style="display:none; width: 200px;" type="text" name="ev_id"></input>
									</td>
									</tr>
									<tr>	<!-- Κατηγορία εκδήλωσης -->
									<td><label>* Κατηγορία εκδήλωσης:</td></label>
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
													echo "<option value=".$row['scat_id'].">".$row['scat_name']."</option>";
												}
											}
											?>
										</select>
									</td>
									</tr>
									<tr>	<!-- Τίτλος εκδήλωσης -->
									<td><label>* Τίτλος εκδήλωσης:</td></label>
									<td class="data_input">
										<input class="form-control" style="width: 400px;" type="text" required name="ev_name" value="" size="50" max="100"></input>
									</td>
									</tr>
									<tr>	<!-- Περιγραφή -->
										<td><label>* Περιγραφή:</label></td>
										<td class="data_input">
											<textarea class="form-control" style="width: 200px;" type="textarea" required name="ev_description" value="" rows="5" cols="150" maxlength="3000"></textarea>
										</td>
									</tr>
									<tr>	<!-- Ημερομηνία έναρξης δραστηριότητας -->
										<td><label>* Ημερομηνία έναρξης:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="date" required name="ev_startdate" value="" width="100px;"></input>
										</td>
									</tr>
									<tr>	<!-- Ημερομηνία ολοκλήρωσης δραστηριότητας -->
										<td><label>* Ημερομηνία ολοκλήρωσης:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="date" required name="ev_enddate" value="" width="100px;"></input>
										</td>
									</tr>
									<tr>	<!-- Τοποθεσία -->
										<td><label>* Τοποθεσία:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 300px;" type="text" required name="ev_place" value="" size="40" max="60"></input>
										</td>
									</tr>
									<tr>	<!-- Γεωγραφικό πλάτος -->
										<td><label>Γεωγραφικό πλάτος:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 100px;" type="text" required name="ev_lat" value="" size="30" max="30"></input>
										</td>
									</tr>
									<tr>	<!-- Γεωγραφικό μήκος -->
										<td><label>Γεωγραφικό μήκος:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 100px;" type="text" required name="ev_lon" value="" size="30" max="30"></input>
										</td>
									</tr>
									<tr>	<!-- Κόστος -->
										<td><label>Κόστος:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="number" name="ev_cost" value=""></input>
										</td>
									</tr>
									<tr><td><label></label><hr></td></tr>
									<tr>	<!-- Ταξινόμηση -->
										<td><label>Ταξινόμηση:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 40px;" type="text" name="ev_sorter" value="" size="3" max="3"></input>
										</td>
									</tr>
									<tr>	<!-- Κατάσταση δημοσίευσης -->
										<td><label>Δημοσιεύτηκε:</label></td>
										<td class="data_input">
											<select class="form-control" style="width: 200px;" name="ev_published" >
											  <option value="1">Δημοσιεύθηκε</option>
											  <option value="2">Σε αναμονή</option>
											</select>
										</td>
									</tr>
									<tr><td><label></label><hr></td></tr>
									<!-- Κουμπί "Καταχώρηση" και "Επαναφορά" -->
									<tr>
										<td></td>
										<td>
										<input class="btn btn-primary" type="submit" name="Submit" value="Αποθήκευση">
										</input>   <input class="btn btn-primary" type="reset" name="reset" value="Επαναφορά"></input>
										</td>
									</tr>
								</table>
							</form>

							<!-- End Form -->
							
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
								
								$strSQL = "INSERT INTO events 
											(ev_subcat, ev_name, ev_description, ev_startdate, ev_enddate, 
											ev_place, ev_lat, ev_lon, ev_cost, ev_sorter, ev_published) 
											VALUES (
											$ev_subcat, '$ev_name', '$ev_description', '$ev_startdate', '$ev_enddate', '$ev_place', $ev_lat, $ev_lon, $ev_cost, '$ev_sorter', $ev_published
											)";
								$result = mysqli_query($conn, $strSQL);
								// Εάν η ενημέρωση είναι επιτυχής, επιστρέφεται κατάλληλο μήνυμα
								if ($result)
								{
									echo "Η νέα εκδήλωση καταχωρήθηκε.";
									$last_id = mysqli_insert_id($conn);
									
									// Θέμα μηνύματος email
									$emailSubject = SITETITLE.": ".$ev_name;
									// Κείμενο ενημερωτικού μηνύματος.
									$dateStart = date_create($ev_startdate);
									$dateStart = date_format($dateStart, 'd/m/Y');
									$dateEnd = date_create($ev_enddate);
									$dateEnd = date_format($dateEnd, 'd/m/Y');
									$text = $ev_name." από¨".$dateStart." έως ".$dateEnd.
											" Επισκεφθείτε το ".SITETITLE." στη διεύθυνση ".SITEURL." για περισσότερες πληροφορίες";
									echo "<h2>Αποστολές ενημερωτικών μηνυμάτων για τη δραστηριότητα</h2>";
									// Μόλις καταχωρηθεί η εκδήλωση γίνεται αποστολή ενημερωτικών μηνυμάτων
									// ανάλογα με την επιλογή που έχει κάνει ο χρήστης.
									// Βρίσκονται τα στοιχεία όλων των χρηστών που ενδιαφέρονται για τη sub_category
									// της νέας δραστηριότητας.
									
									$strSQL = " select 	users.usr_id AS 'usr', usr_lastname, usr_firstname, usr_email, 
														usr_mobile, usr_com_channel
												from	users inner join
														user_prefs on user_prefs.usr_id = users.usr_id
												where 	sub_cat_id = $ev_subcat";
									$result = mysqli_query($conn, $strSQL);
									if ($result)
									{
										echo "<table id=\"InfoTable\">";
										while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
										{
											echo "<tr>";
											echo "<td id=\"DataArea\" >";
											$usr_id = $row['usr'];
											echo $usr_id;
											echo "</td>";
											echo "<td id=\"DataArea\" >";
											$usr_lastname = $row['usr_lastname'];
											$usr_firstname = $row['usr_firstname'];
											$usr_name = $usr_firstname." ".$usr_lastname;
											echo "</td>";
											echo "<td id=\"DataArea\" >";
											$usr_email = $row['usr_email'];
											echo $usr_email;
											echo "</td>";
											echo "<td id=\"DataArea\" >";
											$usr_mobile = $row['usr_mobile'];
											echo $usr_mobile;
											echo "</td>";
											echo "<td id=\"DataArea\" >";
											echo $text;
											echo "</td>";
											echo "<td>";
											// Εάν ο χρήστης έχει επιλέξει επικοινωνία μέσω sms
											if ($row['usr_com_channel'] == 1)
											{
												if (SendSMSAlert ($usr_mobile, $text))
													echo "<img style='width: 40px;' src='images/mobileok.png' />";
												else
													echo "<img style='width: 40px;' src='images/mobilefail.png' />";
											}
											// Εάν ο χρήστης έχει επιλέξει επικοινωνία μέσω email
											else if ($row['usr_com_channel'] == 2)
											{
												SendEmailAlert ($usr_email, $usr_name, $emailSubject, $text);
												echo "<img style='width: 40px;'  src='images/emailok.png' />";
											}
											echo "</td>";
											echo "</tr>";

										}
										echo "</table>";
									}
									else
										echo "Δε βρέθηκε μέλος με το συγκεκριμένο ενδιαφέρον.";

								}
								else
									echo mysqli_error($conn)."<br>";
							}
						?>
							
							
                            <!-- End Main Content -->
                        </div>
                        <!-- End Main Column -->
						
                        <!-- Side Column -->
                        <div class="col-md-3">
                            <!-- Recent Posts -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Πρόσφατα</h3>
                                </div>
                                <div class="panel-body">
									<?php
										require_once ('relatedposts.php');
									?>  	
                                </div>
                            </div>
                            <!-- End recent Posts -->
                            <!-- About -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Ενδιαφέρει</h3>
                                </div>
                                <div class="panel-body">
								<?php
									require_once ('ads.php');
								?>                                </div>
                            </div>
                            <!-- End About -->
                        </div>
                        <!-- End Side Column -->
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