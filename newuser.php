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
                                <h2>Εγγραφή νέου μέλους</h2>
                            </div>
							
                            <!-- Contact Form -->
							<!-- HTML φόρμα εισαγωγής των στοιχείων του νέου μέλους -->
							<form name="edit" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
									<tr>
										<!-- Επώνυμο -->
									<td><label>* Το επώνυμό σας:</td></label>
									<td class="data_input">
										<input class="form-control" style="width: 200px;" type="text" required name="usr_lastname" value="<?php if (isset($_POST['usr_lastname'])) echo ($_POST['usr_lastname']); ?>" size="20" max="20"></input>
									</td>
									</tr>
									<tr>	<!-- Όνομα -->
										<td><label>* Το όνομά σας:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="text" required name="usr_firstname" value="<?php if (isset($_POST['usr_firstname'])) echo ($_POST['usr_firstname']); ?>" size="20" max="20"></input>
										</td>
									</tr>
									<tr>	<!-- E-mail -->
										<td><label>* Το e-mail σας:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 400px;" type="email" required name="usr_email" value="<?php if (isset($_POST['usr_email'])) echo ($_POST['usr_email']); ?>" size="30" max="45"></input>
										</td>
									</tr>
									<tr>	<!-- Κινητό -->
										<td><label>Το κινητό σας τηλέφωνο:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="tel" name="usr_mobile" value="<?php if (isset($_POST['usr_mobile'])) echo ($_POST['usr_mobile']); ?>" size="15" max="15"></input>
										</td>
									</tr>
									<tr>	<!-- Άλλο τηλέφωνο -->
										<td><label>Άλλο τηλέφωνο:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="tel" name="usr_phone" value="<?php if (isset($_POST['usr_phone'])) echo ($_POST['usr_phone']); ?>" size="15" max="15"></input>
										</td>
									</tr>
									<tr>	<!-- Προτιμώμενος τρόπος επικοινωνίας με το Xtreme sports -->
										<td><label>Προτιμώμενη μέθοδος επικοινωνίας:</label></td>
										<td class="data_input">
											<select class="form-control" style="width: 200px;" name="usr_com_channel" >
											  <option value="1">Κινητό τηλέφωνο</option>
											  <option value="2">E-mail</option>
											</select>
										</td>
									</tr>
									<tr>	<!-- Ημερομηνία γέννησης -->
										<td><label>Η ημερομηνία γέννησής σας:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="date" name="usr_birthday" value="<?php if (isset($_POST['usr_birthday'])) echo ($_POST['usr_birthday']); ?>" width="100px;"></input>
										</td>
									</tr>
									<tr>	<!-- Φύλο -->
										<td><label>Το φύλο σας:</label></td>
										<td class="data_input">
											<select class="form-control" style="width: 150px;" name="usr_sex" >
											  <option value="1">Άνδρας</option>
											  <option value="2">Γυναίκα</option>
											</select>
										</td>
									</tr>
									<tr><td><label></label><hr></td></tr>
									<tr>	<!-- Username -->
										<td><label>* Επιλέξετε ένα όνομα χρήστη για τη σύνδεσή σας:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="text" name="usr_username" required value="<?php if (isset($_POST['usr_username'])) echo ($_POST['usr_username']); ?>" size="35" max="45"></input>
										</td>
									</tr>
									<tr>	<!-- Password -->
										<td><label>* Επιλέξετε το συνθηματικό σας:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="password" name="usr_password" id="usr_password" required value="" size="20" max="20"  onkeyup="check();"></input>
										</td>
									</tr>
									<tr>	<!-- Password verification -->
										<td><label>* Επιβεβαιώστε το συνθηματικό σας:</label></td> 
										<td class="data_input">
											<input class="form-control" style="width: 200px;" type="password" name="usr_passwordverification" id="usr_passwordverification" value="" size="20" max="20"  onkeyup="check();"></input><span id='message'></span>
										</td>
									</tr>
									<tr><td><label></label><hr></td></tr>
									<!-- Κουμπί "Καταχώρηση" και "Επαναφορά" -->
									<tr>
										<td></td>
										<td>
										<input class="btn btn-primary" type="submit" name="Submit" id="Submit" value="Αποθήκευση"></input>   <input class="btn btn-primary" type="reset" name="reset" value="Επαναφορά"></input>
										</td>
									</tr>
								</table>
							</form>

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
											echo "<br><p class='errortext'>Έχετε ήδη εγγραφεί στο XTreme Sports. <br>Δοκιμάστε ξανά δίνοντας διαφορετικά στοιχεία εγγραφής</p>";
										}
									}
									
									if ($existing_users == 0)
									{
										$strSQL = "	INSERT INTO users
																(usr_lastname, usr_firstname, usr_email, usr_mobile,
																usr_phone, usr_com_channel, usr_sex, usr_birthday, usr_photo,
																usr_username, usr_password, usr_active)
													VALUES 		('$usr_lastname', '$usr_firstname', '$usr_email', '$usr_mobile', 
																'$usr_phone', $usr_com_channel, $usr_sex, '$usr_birthday', 
																'$usr_photo', '$usr_username', '$usr_password', $usr_active)";
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
							
                            <!-- End Main Content -->
                        </div>
                        <!-- End Main Column -->
                        <!-- Side Column -->
                        <div class="col-md-3">
                            <!-- Recent Posts -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Επικοινωνία</h3>
                                </div>
                                <div class="panel-body">
                                    <p>Επικοινώνησε μαζι μας εύκολα:</p>
                                    <ul class="list-unstyled">
                                        <li>
                                            <i class="fa-phone color-primary"></i>6979518990</li>
                                        <li>
                                            <i class="fa-envelope color-primary"></i>thomas_kaf13@hotmail.com</li>
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