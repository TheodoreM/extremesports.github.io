<?php
	ob_start();
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
        <title>Επεξεργασία των στοιχείων σας</title>
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
		<script>
			var check = function() {
			  if (document.getElementById('usr_password').value ==
				document.getElementById('usr_passwordverification').value) {
				document.getElementById('message').style.color = 'green';
				document.getElementById('message').innerHTML = 'Τα συνθηματικά ταιριάζουν.';
				document.getElementById('Submit').disabled = false;
			  } else {
				document.getElementById('message').style.color = 'red';
				document.getElementById('message').innerHTML = 'Τα συνθηματικά δεν ταιριάζουν.';
				document.getElementById('Submit').disabled = true;
			  }
			}
		</script>		
		<script src="js/xtreme.js"></script>
    </head>
    <body>
        <div id="body-bg">
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
                                <h2>Επεξεργασία των στοιχείων σας</h2>
                            </div>
							<?php
								// Δέχεται σαν παράμετρο το ev_id (ID της εκδήλωσης)
								$usr_id = $_GET["id"];
								$conn = Connect();
								// Βρίσκει όλα τα πεδία για τον χρήστη με usr_id
								$strSQL = "SELECT * FROM users WHERE usr_id=$usr_id";
								$result = mysqli_query($conn, $strSQL);

								// Εάν δεν είναι δυνατή η εκτέλεση του ερωτήματος, διακοπή της εκτέλεσης
								if (!$result )
									die('Εμφανίσθηκε συνθήκη σφάλματος: ' . mysqli_error($conn));

								// Πίνακας δυναμικών πληροφοριών. Τα δεδομένα προκύπτουν από τον πίνακα users
								while($row = mysqli_fetch_array($result))
								{
									$usr_id = $row['usr_id'];
									$usr_lastname = $row['usr_lastname'];
									$usr_firstname = $row['usr_firstname'];
									$usr_email = $row['usr_email'];
									$usr_mobile = $row['usr_mobile'];
									$usr_phone = $row['usr_phone'];
									$usr_com_channel = $row['usr_com_channel'];
									$usr_sex = $row['usr_sex'];
									$usr_birthday = $row['usr_birthday'];
									$usr_photo = $row['usr_photo'];
									$usr_username = $row['usr_username'];
									$usr_password = $row['usr_password'];
								}
							?>							
                            <!-- Contact Form -->
							<!-- HTML φόρμα επεξεργασίας των στοιχείων του συνδεδεμένου μέλους -->
							<form name="edit" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
								<table>
									<tr>	<!-- User ID  -->
									<td><label>ID:</td></label>
									<td class="data_input">
										<input class="form-control" style="width: 200px;" type="text" name="usr_id" value="<?php if (isset($usr_id)) echo ($usr_id); ?>"></input>
									</td>
									</tr>
									<tr>
										<!-- Επώνυμο -->
									<td><label>* Το επώνυμό σας:</td></label>
									<td class="data_input">
										<input class="form-control" style="width: 200px;" type="text" required name="usr_lastname" value="<?php if (isset($usr_lastname)) echo ($usr_lastname); ?>" size="20" max="20"></input>
									</td>
									</tr>
									<tr>	<!-- Όνομα -->
										<td><label>* Το όνομά σας:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="text" required name="usr_firstname" value="<?php if (isset($usr_firstname)) echo ($usr_firstname); ?>" size="20" max="20"></input>
										</td>
									</tr>
									<tr>	<!-- E-mail -->
										<td><label>* Το e-mail σας:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 400px;" type="email" required name="usr_email" value="<?php if (isset($usr_email)) echo ($usr_email); ?>" size="30" max="45"></input>
										</td>
									</tr>
									<tr>	<!-- Κινητό -->
										<td><label>Το κινητό σας τηλέφωνο:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="tel" name="usr_mobile" value="<?php if (isset($usr_mobile)) echo ($usr_mobile); ?>" size="15" max="15"></input>
										</td>
									</tr>
									<tr>	<!-- Άλλο τηλέφωνο -->
										<td><label>Άλλο τηλέφωνο:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="tel" name="usr_phone" value="<?php if (isset($usr_phone)) echo ($usr_phone); ?>" size="15" max="15"></input>
										</td>
									</tr>
									<tr>	<!-- Προτιμώμενος τρόπος επικοινωνίας με το Xtreme sports -->
										<td><label>Προτιμώμενη μέθοδος επικοινωνίας:</label></td>
										<td class="data_input">
											<select class="form-control" style="width: 200px;" name="usr_com_channel" >
											  <option value="1">Κινητό τηλέφωνο <?php if ($row['usr_com_channel'] == 1) echo "selected" ?> </option>
											  <option value="2" <?php if ($row['usr_com_channel'] == 2) echo "selected" ?>>E-mail</option>
											</select>
										</td>
									</tr>
									<tr>	<!-- Ημερομηνία γέννησης -->
										<td><label>Η ημερομηνία γέννησής σας:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="date" name="usr_birthday" value="<?php if (isset($usr_birthday)) echo ($usr_birthday); ?>" width="100px;"></input>
										</td>
									</tr>
									<tr>	<!-- Φύλο -->
										<td><label>Το φύλο σας:</label></td>
										<td class="data_input">
											<select class="form-control" style="width: 150px;" name="usr_sex" >
											  <option value="1" <?php if ($usr_sex == 1) echo "selected" ?>>Άνδρας</option>
											  <option value="2" <?php if ($usr_sex == 2) echo "selected" ?>>Γυναίκα</option>
											</select>
										</td>
									</tr>
									<tr><td><label></label><hr></td></tr>
									<tr>	<!-- Username -->
										<td><label>* Επιλέξετε ένα όνομα χρήστη για τη σύνδεσή σας:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="text" name="usr_username" required value="<?php if (isset($usr_username)) echo ($usr_username); ?>" size="35" max="45"></input>
										</td>
									</tr>
									<tr>	<!-- Password -->
										<td><label>* Επιλέξετε το συνθηματικό σας:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="text" name="usr_password" id="usr_password" required value="<?php if (isset($usr_password)) echo ($usr_password); ?>" size="20" max="20"  onkeyup="check();"></input>
										</td>
									</tr>
									<tr>	<!-- Password verification -->
										<td><label>* Επιβεβαιώστε το συνθηματικό σας:</label></td> 
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="text" name="usr_passwordverification" id="usr_passwordverification" value="<?php if (isset($usr_password)) echo ($usr_password); ?>" size="20" max="20"  onkeyup="check();"></input><span id='message'></span>
										</td>
									</tr>
									<tr><td><label></label><hr></td></tr>
									<!-- Κουμπί "Καταχώρηση" και "Επαναφορά" -->
									<tr>
										<td></td>
										<td>
										<input class="btn btn-primary" type="submit" name="Submit" id="Submit" value="Αποθήκευση">
										<input class="btn btn-primary" name="NewInterest" value="Ενδιαφέροντα" onclick="expandElement('divNewInterest')"></input>
										</input>   <input class="btn btn-primary" type="reset" name="reset" value="Επαναφορά"></input>
										</td>
									</tr>
								</table>
							</form>

							<?php 
								if (isset ($_POST['Submit']))
								{
									// Assign _POST array values to variables
									// Assign _POST array values to variables
									$usr_lastname = $_POST['usr_lastname'];
									$usr_firstname = escape_alpha($conn, $_POST['usr_firstname']);
									$usr_email = escape_alpha($conn, $_POST['usr_email']);
									$usr_mobile = escape_alpha($conn, $_POST['usr_mobile']);
									$usr_phone = escape_alpha($conn, $_POST['usr_phone']);
									$usr_com_channel = escape_numeric($_POST['usr_com_channel'], 1);
									$usr_birthday = $_POST['usr_birthday'];
									$usr_sex = escape_numeric($_POST['usr_sex'], 1);
									$usr_photo = '';
									$usr_username = escape_alpha($conn, $_POST['usr_username']);
									$usr_password = escape_alpha($conn, $_POST['usr_password']);
									$usr_active = 1;
									
									$strSQL = "	SELECT count(usr_id) AS ExistingUsers 
												FROM users
												WHERE 	usr_email = '$usr_email' OR
														usr_mobile = '$usr_mobile' OR
														usr_username = '$usr_username'";
									$result = mysqli_query($conn, $strSQL);
									// Εάν έχουν βρεθεί χρήστες με το ίδιο τηλέφωνο ή email
									$existing_users = 0;
									if ($result)
									{
										while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
										{
											$existing_users = $row['ExistingUsers'];
											echo "<br><p class='errortext'>Υπάρχει ήδη εγγεγραμμένος χρήστης στο XTreme Sports με το όνομα που επιλέξατε. <br>Δοκιμάστε ξανά δίνοντας διαφορετικά στοιχεία εγγραφής</p>";
										}
									}
									
									if ($existing_users == 0)
									{
										$strSQL = "	UPDATE users
													SET usr_lastname = '$usr_lastname',
														usr_firstname = '$usr_firstname',
														usr_email = '$usr_email',
														usr_mobile = '$usr_mobile',
														usr_phone = '$usr_phone',
														usr_com_channel = $$usr_com_channel,
														usr_birthday = '$usr_birthday',
														usr_sex = $usr_sex,
														usr_photo = '$usr_photo',
														usr_username = '$usr_username',
														usr_password = '$usr_password',
														usr_active = $usr_active
													WHERE usr_id = $usr_id";
										$result = mysqli_query($conn, $strSQL);
										// Εάν η ενημέρωση είναι επιτυχής, φορτώνεται η σελίδα επεξεργασίας του χρήστη
										if ($result)
										{
											echo "<br><p class='errortext'>Το νέο μέλος καταχωρήθηκε.</br>";
											$last_id = mysqli_insert_id($conn);
											header("Location: edituser.php?id=$last_id");
										}
										else
											echo "<br><p class='errortext'>".mysqli_error($conn)."<br>";
									}
								}
							?>
							
							<!-- End Contact Form -->
							<!-- Πίνακας κατηγοριών που ενδιαφέρουν το χρήστη -->
							<br><h3>Κατηγορίες που σας ενδιαφέρουν</h3><br>

							<?php
								$strQuery = "	SELECT 		sub_categories.scat_id, sub_categories.scat_name
												FROM 		sub_categories INNER JOIN user_prefs 
															ON sub_categories.scat_id=user_prefs.sub_cat_id
												WHERE 		user_prefs.usr_id=$usr_id 
												ORDER BY 	sub_categories.scat_name";
								$result = mysqli_query($conn, $strQuery);
								if ($result)
								{
									echo "<table id=\"InfoTable\">";

									while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
									{

										$scat_id	= $row['scat_id'];
										$scat_name	= $row['scat_name'];

										echo "<tr>";
										echo "    <td id=\"DataArea\" style=\"width: 20%;\">";
										echo "<p class='CommandText'>".$scat_name."</p>";
										echo "</td>";
										echo "<td id=\"DataArea\" style=\"width: 20%;\">";
										echo "<a href=\"deleteinterest.php?uid=$usr_id&id=$scat_id \" class=\"CommandText\">Διαγραφή</a><br>";
										echo "</td>";
										echo "</tr>";										
									}
									echo "</table>";
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
                                    <h3 class="panel-title">Contact Info</h3>
                                </div>
                                <div class="panel-body">
                                    <p>Lorem ipsum dolor sit amet, no cetero voluptatum est, audire sensibus maiestatis vis et. Vitae audire prodesset an his. Nulla ubique omnesque in sit.</p>
                                    <ul class="list-unstyled">
                                        <li>
                                            <i class="fa-phone color-primary"></i>+353-44-55-66</li>
                                        <li>
                                            <i class="fa-envelope color-primary"></i>info@example.com</li>
                                        <li>
                                            <i class="fa-home color-primary"></i>http://www.example.com</li>
                                    </ul>
                                    <ul class="list-unstyled">
                                        <li>
                                            <strong class="color-primary">Monday-Friday:</strong>9am to 6pm</li>
                                        <li>
                                            <strong class="color-primary">Saturday:</strong>10am to 3pm</li>
                                        <li>
                                            <strong class="color-primary">Sunday:</strong>Closed</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End recent Posts -->
                            <!-- About -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">About</h3>
                                </div>
                                <div class="panel-body">
                                    Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.
                                </div>
                            </div>
                            <!-- End About -->
                        </div>
                        <!-- End Side Column -->
                    </div>
                </div>
            </div>
			<div id="divNewInterest" class="PopupFormBox" style="display: none;">
				<?php
					 require_once ('newuserinterest.php');
				?>
			</div>
			<?php 
				if (isset ($_POST['Submit']))
				{
					// Assign _POST array values to variables
					$usr_lastname = $_POST['usr_lastname'];
					$usr_firstname = escape_alpha($conn, $_POST['usr_firstname']);
					$usr_email = escape_alpha($conn, $_POST['usr_email']);
					$usr_mobile = escape_alpha($conn, $_POST['usr_mobile']);
					$usr_phone = escape_alpha($conn, $_POST['usr_phone']);
					$usr_com_channel = escape_numeric($_POST['usr_com_channel'], 1);
					$usr_birthday = $_POST['usr_birthday'];
					$usr_sex = escape_numeric($_POST['usr_sex'], 1);
					$usr_photo = '';
					$usr_username = escape_alpha($conn, $_POST['usr_username']);
					$usr_password = escape_alpha($conn, $_POST['usr_password']);
					$usr_active = 1;
					
					$strSQL = "	SELECT count(usr_id) AS ExistingUsers 
								FROM users
								WHERE 	usr_email = '$usr_email' OR
										usr_mobile = '$usr_mobile' OR
										usr_username = '$usr_username'";
					$result = mysqli_query($conn, $strSQL);
					// Εάν έχουν βρεθεί χρήστες με το ίδιο τηλέφωνο ή email
					$existing_users = 0;
					if ($result)
					{
						while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
						{
							$existing_users = $row['ExistingUsers'];
							echo "<br><p class='errortext'>Υπάρχει ήδη εγγεγραμμένος χρήστης στο XTreme Sports με το όνομα που επιλέξατε. <br>Δοκιμάστε ξανά δίνοντας διαφορετικά στοιχεία εγγραφής</p>";
						}
					}
					
					if ($existing_users == 0)
					{
						$strSQL = "	UPDATE users
									SET usr_lastname = '$usr_lastname',
										usr_firstname = '$usr_firstname',
										usr_email = '$usr_email',
										usr_mobile = '$usr_mobile',
										usr_phone = '$usr_phone',
										usr_com_channel = $$usr_com_channel,
										usr_birthday = '$usr_birthday',
										usr_sex = $usr_sex,
										usr_photo = '$usr_photo',
										usr_username = '$usr_username',
										usr_password = '$usr_password',
										usr_active = $usr_active
									WHERE usr_id = $usr_id";
						$result = mysqli_query($conn, $strSQL);
						// Εάν η ενημέρωση είναι επιτυχής, φορτώνεται η σελίδα επεξεργασίας του χρήστη
						if ($result)
						{
							echo "<br><p class='errortext'>Το νέο μέλος καταχωρήθηκε.</br>";
							$last_id = mysqli_insert_id($conn);
							header("Location: edituser.php?id=$last_id");
						}
						else
							echo "<br><p class='errortext'>".mysqli_error($conn)."<br>";
					}
				}
			?>
			
            <!-- === END CONTENT === -->
            <!-- === BEGIN FOOTER === -->
            <div id="content-bottom-border" class="container">
            </div>
            <div id="base">
                <div class="container padding-vert-30 margin-top-60">
                    <div class="row">
                        <!-- Contact Details -->
                        <div class="col-md-4 margin-bottom-20">
                            <h3 class="margin-bottom-10">Contact Details</h3>
                            <p>
                                <span class="fa-phone">Telephone:</span>(212)888-77-88
                                <br>
                                <span class="fa-envelope">Email:</span>
                                <a href="mailto:info@joomla51.com">info@joomla51.com</a>
                                <br>
                                <span class="fa-link">Website:</span>
                                <a href="http://www.joomla51.com">www.joomla51.com</a>
                            </p>
                            <p>The Dunes, Top Road,
                                <br>Strandhill,
                                <br>Co. Sligo,
                                <br>Ireland</p>
                        </div>
                        <!-- End Contact Details -->
                        <!-- Sample Menu -->
                        <div class="col-md-3 margin-bottom-20">
                            <h3 class="margin-bottom-10">Sample Menu</h3>
                            <ul class="menu">
                                <li>
                                    <a class="fa-tasks" href="#">Placerat facer possim</a>
                                </li>
                                <li>
                                    <a class="fa-users" href="#">Quam nunc putamus</a>
                                </li>
                                <li>
                                    <a class="fa-signal" href="#">Velit esse molestie</a>
                                </li>
                                <li>
                                    <a class="fa-coffee" href="#">Nam liber tempor</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <!-- End Sample Menu -->
                        <div class="col-md-1"></div>
                        <!-- Disclaimer -->
                        <div class="col-md-3 margin-bottom-20 padding-vert-30 text-center">
                            <h3 class="color-gray margin-bottom-10">Join our Newsletter</h3>
                            <p>
                                Sign up for our newsletter for all the
                                <br>latest news and information
                            </p>
                            <input type="email">
                            <br>
                            <button class="btn btn-primary btn-lg margin-top-20" type="button">Subscribe</button>
                        </div>
                        <!-- End Disclaimer -->
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- Footer Menu -->
            <div id="footer">
                <div class="container">
                    <div class="row">
                        <div id="footermenu" class="col-md-8">
                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="#" target="_blank">Sample Link</a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">Sample Link</a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">Sample Link</a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">Sample Link</a>
                                </li>
                            </ul>
                        </div>
                        <div id="copyright" class="col-md-4">
                            <p class="pull-right">(c) 2014 Your Copyright Info</p>
                        </div>
                    </div>
                </div>
            </div>
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