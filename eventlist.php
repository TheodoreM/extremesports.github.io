<?php
	ob_start();
	session_start();
	include 'includes/functions.php';
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
        <title>Καταχωρημένες εκδηλώσεις</title>
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
                                <h2>Καταχωρημένες δραστηριότητες</h2>
                            </div>
							
							<!-- HTML φόρμα εισαγωγής των στοιχείων δραστηριότητας -->
							<?php
								$conn = Connect();
								$strSQL = " select 		events.ev_id, events.ev_name, events.ev_startdate, 
														events.ev_published, pub_status.ps_name, sub_categories.scat_name
											from 		events 
														inner join sub_categories on events.ev_subcat = sub_categories.scat_id
														inner join pub_status on events.ev_published = pub_status.ps_id
											order by 	events.ev_startdate desc";
								$result = mysqli_query($conn, $strSQL);
								$counter = 0;
								if ($result)
								{
									echo "<table id=\"InfoTable\">";
									while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
									{
										$counter++;

										echo "<tr>";
										$ev_id = $row['ev_id'];
										$ev_name = $row['ev_name'];
										$ev_startdate = $row['ev_startdate'];
										$ps_name = $row['ps_name'];
										$ev_cat_name = $row['scat_name'];
										echo "    <td id=\"DataArea\" style=\"width: 3%;\">";
										echoX ("       <p class=\"DataCaption\">" . $counter . "</p>", $counter);
										echo "    </td>";
										echo "    <td id=\"DataArea\" style=\"width: 50%; vertical-align: bottom;\">";
										echoX ("       <p class=\"DataCaption\">" . $ev_name . "</p>", $ev_name);
										echo "<a href=\"editevent.php?id=$ev_id\" class=\"CommandText\">Επεξεργασία</a>";
										echo "<a href=\"deleteevent.php?id=$ev_id\" class=\"CommandText\">Διαγραφή</a>";
										echo "    </td>";
										echo "    <td id=\"DataArea\" style=\"width: 10%;\">";
										$date = date_create ($ev_startdate);
										echoX ("       <p class=\"DataCaption\">" . date_format($date, "d/m/Y") . "</p>", date_format($date, "d/m/Y"));
										echo "    </td>";
										echo "    <td id=\"DataArea\" style=\"width: 10%;\">";
										echoX ("       <p class=\"DataCaption\">" . $ps_name . "</p>", $ps_name);
										echo "    </td>";
										echo "    <td id=\"DataArea\" style=\"width: 10%\">";
										echoX ("       <p class=\"DataCaption\">" . $ev_cat_name . "</p>", $ev_cat_name);
										echo "    </td>";
										echo "</tr>";
									}
									echo "</table>";
								}
										
							?>

							<!-- End Form -->


                            <!-- End Main Content -->
                        </div>
                        <!-- End Main Column -->
						
                        <!-- Side Column -->
                        <div class="col-md-3">
                            <!-- Recent Posts -->
                            
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