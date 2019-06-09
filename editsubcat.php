<?php
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
        <title>Επεξεργασία υποκατηγορίας</title>
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
                                <h2>Επεξεργασία υποκατηγορίας</h2>
                            </div>
							<?php
								// Δέχεται σαν παράμετρο το scat_id (ID της υποκατηγορίας)
								$scat_id = $_GET["id"];
								$conn = Connect();
								// Βρίσκει όλα τα πεδία για την υποκατηγορία
								$strSQL = "	SELECT	scat_id, scat_cat_id, scat_name, scat_active, scat_sorter
											FROM 	sub_categories
											WHERE 	scat_id='$scat_id'";
								$result = mysqli_query($conn, $strSQL);

								// Εάν δεν είναι δυνατή η εκτέλεση του ερωτήματος, διακοπή της εκτέλεσης
								if (!$result )
									die('Εμφανίσθηκε συνθήκη σφάλματος: ' . mysqli_error($conn));

								// Πίνακας δυναμικών πληροφοριών. Τα δεδομένα προκύπτουν από αντίστοιχους πίνακες 
								while($row = mysqli_fetch_array($result))
								{
									$scat_id = $row['scat_id'];
									$scat_cat_id = $row['scat_cat_id'];
									$scat_name = $row['scat_name'];
									$scat_active = $row['scat_active'];
									$scat_sorter = $row['scat_sorter'];
								}
							?>
							<!-- HTML φόρμα εισαγωγής των στοιχείων υποκατηγορίας -->
							<form name="edit" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">

									<tr>	<!-- ID υποκατηγορίας -->
									<td><label>ID:</td></label>
									<td class="data_input">
										<input class="form-control" style="width: 200px;" type="text" name="scat_id" value="<?php if (isset($scat_id)) echo ($scat_id); ?>"></input>
									</td>
									</tr>
									<tr>	<!-- Κατηγορία στην οποία ανήκει η υποκατηγορία -->
									<td><label>* Κατηγορία:</td></label>
									<td class="data_input">
										<select class="form-control" style="width: 200px;" name="scat_cat_id" >
											<?php
											$strSQL = "	SELECT cat_id, cat_name
														FROM categories
														ORDER BY cat_name";
											$result = mysqli_query($conn, $strSQL);
											if ($result)
											{
												while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
												{	
													$option_selected = '';
													if ($row['scat_cat_id'] == $scat_cat_id) $option_selected = 'selected';
													echo "<option value=".$row['scat_cat_id']." ".$option_selected.">".$row['scat_cat_name']."</option>";
												}
											}
											?>
										</select>
									</td>
									</tr>
									<tr>	<!-- Όνομα υποκατηγορίας -->
									<td><label>* Τίτλος υποκατηγορίας:</td></label>
									<td class="data_input">
										<input class="form-control" style="width: 400px;" type="text" required name="scat_name" value="<?php if (isset($scat_name)) echo ($scat_name); ?>" size="25" max="25"></input>
									</td>
									</tr>
									<tr>	<!-- Ταξινόμηση -->
										<td><label>Ταξινόμηση:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 40px;" type="text" name="scat_sorter" value="<?php if (isset($scat_sorter)) echo ($scat_sorter); ?>" size="3" max="3"></input>
										</td>
									</tr>
									<tr>	<!-- Κατάσταση υποκατηγορίας -->
										<td><label>Κατάσταση:</label></td>
										<td class="data_input">
											<select class="form-control" style="width: 200px;" name="scat_active" >
											  <option value="1" "<?php if ($scat_active == 1) echo "selected"; ?>">Ενεργή</option>
											  <option value="2" "<?php if ($scat_active == 0) echo "selected"; ?>">Ανενεργή</option>
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
							
                            <!-- End Main Content -->
                        </div>
                        <!-- End Main Column -->
						
						<?php 
							if (isset ($_POST['Submit']))
							{
								// Assign _POST array values to variables
								$scat_id = $_POST['$scat_id'];
								$scat_cat_id = mysqli_escape_string($conn, $_POST['$scat_cat_id']);
								$scat_name = mysqli_escape_string($conn, $_POST['$scat_name']);
								$scat_active = $_POST['$scat_active'];
								$scat_sorter = $_POST['$scat_sorter'];
								
								$strSQL = "	UPDATE 	sub_categories 
											SET 	scat_cat_id = $scat_cat_id, 
													scat_name = '$scat_name', 
													scat_active = scat_active, 
													scat_sorter = '$scat_sorter'
											WHERE	scat_id = $scat_id";

								$result = mysqli_query($conn, $strSQL);
								// Εάν η ενημέρωση είναι επιτυχής, φορτώνεται εκ νέου η σελίδα επεξεργασίας υποκατηγορίας
								// με τα στοιχεία που έχουν καταχωρηθεί.
								if ($result)
								{
									return ("Τα στοιχεία της υποκατηγορίας ενημερώθηκαν.");
									header("Location: editsubcat.php?id=$scat_id");
								}
								else
									echo "<br><p class='errortext'>".mysqli_error($conn)."</p>";
							}
						?>
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