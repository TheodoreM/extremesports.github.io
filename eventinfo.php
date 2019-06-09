<!-- === BEGIN HEADER === -->
<?php
	ob_start();
	require_once ('connect.php');
	require_once ('Includes/functions.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
		<!-- Shadowbox to display image thumbnails in full size -->
        <link rel="stylesheet" href="shadowbox/shadowbox.css" rel="stylesheet">
		<script src="Shadowbox/shadowbox.js" type="text/javascript"></script>
		<script src="js/xtreme.js"></script>
		<script type="text/javascript">
		Shadowbox.init();
		</script>
        <!-- Title -->
        <title>Extreme Sports</title>
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
                    <a href="#" target="_blank" title="Twitter"></a>
                </li>
                <li class="social-facebook">
                    <a href="#" target="_blank" title="Facebook"></a>
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
							<?php
								// Δέχεται σαν παράμετρο το ev_id (ID της εκδήλωσης)
								$ev_id = $_GET["id"];
								$conn = Connect();
								// Βρίσκει όλα τα πεδία για την εκδήλωση με ev_id
								$strSQL = "	SELECT 		events.ev_id, ev_name, ev_description, ev_startdate,
														ev_enddate, ev_place, ev_published, ev_lat, ev_lon, ev_cost, ev_sorter, ev_subcat, sum(rate)/count(user_ratings.ev_id) as ev_rating
											FROM 		events 
														LEFT OUTER JOIN user_ratings 
														ON events.ev_id = user_ratings.ev_id
											WHERE 		events.ev_id=$ev_id
											GROUP BY 	events.ev_id, ev_name, ev_description, 
														ev_startdate, ev_enddate, ev_place, ev_published, ev_lat, ev_lon, ev_cost, ev_sorter, ev_subcat
											";
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
									echo "<table id=\"InfoTable\">";
									echo "<tr>";
									$ev_id  = $row['ev_id'];
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
									$ev_rating = $row['ev_rating'];
									$gallery++;
								
									echo "    <td id=\"DataArea\" style=\"width: 500px;\">";
									echoX ("       <h2>" . $ev_name . "</h2>", $ev_name);
									echo "<p class=\"EventInfoCaption\">Πληροφορίες</p>";
									echoX ("       <p class=\"EventInfo\">" . $ev_description . "</p>", $ev_description);
									$date = date_create($ev_startdate);
									echoX ("       <p class=\"EventInfoCaption\">Από " . date_format($date, 'd/m/Y') . " έως ", $ev_startdate);
									$date = date_create($ev_enddate);
									echoX (date_format($date, 'd/m/Y') . "</p>", $ev_enddate);
									$ev_cost = number_format((float)$ev_cost, 2, '.', '');
									echoX ("       <p class=\"EventInfoCaption\">Κόστος: €" . $ev_cost . "</p>", $ev_cost);
									echoX ("       <p class=\"EventInfo\">" . $ev_place . "</p>", $ev_place);
									echo "    </td>";
									echo "</tr>";
									echo "</table>";
									// Βρίσκει τις φωτογραφίες της εκδήλωσης και εμφανίζει thumbnails
									$strSQL = "	SELECT ph_photofile, ph_photocaption 
												FROM event_photos 
												WHERE ph_ev_id = $ev_id
												ORDER BY ph_photosorter";
									$Thumbnails = mysqli_query($conn, $strSQL);
									$gallery=0;
									// Εάν δεν είναι δυνατή η εκτέλεση του ερωτήματος, διακοπή της εκτέλεσης
									if (!$Thumbnails )
										die('Εμφανίσθηκε συνθήκη σφάλματος: ' . mysqli_error($conn));
									
									while($row = mysqli_fetch_array($Thumbnails))
									{
										$ev_photofile = $row['ph_photofile'];
										$ev_photocaption = $row['ph_photocaption'];
										$gallery++;
										echoX ("<a href=\"content/" . $ev_photofile . "\" rel=\"shadowbox[gallery]\"><img class=\"Thumbnail\" alt=\"".$ev_photocaption."\" title=\"".$ev_photocaption."\" src=\"content/" . $ev_photofile . "\" /> </a>", $ev_photofile);
									}
								}
								
								echo "<iframe 
											width=\"600\" 
											height=\"500\" 
											frameborder=\"0\" 
											scrolling=\"no\" 
											marginheight=\"0\" 
											marginwidth=\"0\" 
											float=\"left\"
											src=\"https://maps.google.com/maps?q=".$ev_lat.",".$ev_lon."&hl=es&amp;z=12&amp;output=embed\">
										</iframe>";	

								 // Έλεγχος έαν ο χρήστης έχει κάνει login στο σύστημα, 
								 // ώστε να μπορεί να αξιολογήσει τη δραστηριότητα
								// Βρίσκει το id του συνδεδεμένου χρήστη από το session cookie
								$LoggedUserID = GetLoggedID();
								// Εμφάνιση κουμπιού αξιολόγησης εάν έχει γίνει logged κάποιος χρήστης
								if ($LoggedUserID <> 0)
								{	
									echo "<br><br><h3>Σας αρέσει;</h3><br>";
									if (isset($ev_rating) && ($ev_rating > 0))
									{
										echo "<span class=\"EventInfo\">Έως τώρα η δραστηριότητα αξιολογήθηκε με </span>";
										for ($j=0; $j<round($ev_rating); $j++)
											echo "<img src='images/star.png' class='xtreme-icon' />";
									}
									else
										echo "<span class=\"EventInfo\">Θέλετε να είστε ο πρώτος που θα αξιολογήσει τη δραστηριότητα;</span>";
									echo "<input class=\"btn btn-primary\" style=\"margin-left:30px;\" name=\"Rate\" value=\"Αξιολογήστε\" onclick=\"expandElement('divRate')\"></input>";
									echo "<div id='divRate' class='PopupFormBox' style='height: 220px; width: 500px; display: none; z-index: 1000; position: fixed;'>";
									require_once ('newrating.php');
									echo "</div>";
									
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
                                    <h3 class="panel-title">Επερχόμενες δραστηριότητες</h3>
                                </div>
                                <div class="panel-body">
                                    <ul class="posts-list margin-top-10">
										<?php
											require_once ('relatedposts.php');
										?>  										
                                    </ul>
                                </div>
                            </div>
                            <!-- End recent Posts -->
                            <!-- About -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Διαφήμιση</h3>
                                </div>
                                <div class="panel-body">
								<?php
									require_once ('ads.php');
								?>     
                                </div>
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