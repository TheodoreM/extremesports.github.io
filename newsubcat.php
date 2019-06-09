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
        <title>Καταχώρηση νέας υποκατηγορίας</title>
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
                                <h2>Νέα υποκατηγορία</h2>
                            </div>
							
							<!-- HTML φόρμα εισαγωγής των στοιχείων υποκατηγορία -->
							<form name="edit" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">

									<tr>	<!-- ID υποκατηγορίας -->
									<td><label style="display:none">ID:</td></label>
									<td class="data_input">
										<input class="form-control" style="display:none; width: 200px;" type="text" name="scat_id"></input>
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
													echo "<option value=".$row['cat_id'].">".$row['cat_name']."</option>";
												}
											}
											?>
										</select>
									</td>
									</tr>
									<tr>	<!-- Όνομα υποκατηγορίας -->
									<td><label>* Τίτλος υποκατηγορίας:</td></label>
									<td class="data_input">
										<input class="form-control" style="width: 400px;" type="text" required name="scat_name" value="" size="25" max="25"></input>
									</td>
									</tr>
									<tr>	<!-- Ταξινόμηση -->
										<td><label>Ταξινόμηση:</label></td>
										<td class="data_input">
											<input class="form-control" style="width: 40px;" type="text" name="scat_sorter" value="" size="3" max="3"></input>
										</td>
									</tr>
									<tr>	<!-- Κατάσταση υποκατηγορίας -->
										<td><label>Κατάσταση:</label></td>
										<td class="data_input">
											<select class="form-control" style="width: 200px;" name="scat_active" >
											  <option value="1">Ενεργή</option>
											  <option value="2">Ανενεργή</option>
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
								//$scat_id  = $_POST['scat_id '];
								$scat_cat_id = $_POST['scat_cat_id'];
								$scat_name = mysqli_escape_string($conn, $_POST['scat_name']);
								$scat_sorter = mysqli_escape_string($conn, $_POST['scat_sorter']);
								$scat_active = $_POST['scat_active'];
								
								$strSQL = "INSERT INTO sub_categories 
											(scat_cat_id, scat_name, scat_active, scat_sorter) 
											VALUES (
											$scat_cat_id, '$scat_name', $scat_active, '$scat_sorter'
											)";
								$result = mysqli_query($conn, $strSQL);
								// Εάν η ενημέρωση είναι επιτυχής, επιστρέφεται κατάλληλο μήνυμα
								if ($result)
								{
									echo "<br><p class='errortext'>Η νέα υποκατηγορία καταχωρήθηκε.</p>";
								}
								else
									echo "<br><p class='errortext'>".mysqli_error($conn)."</p>";
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