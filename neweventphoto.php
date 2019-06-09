		<!-- HTML φόρμα εισαγωγής της νέας φωτογραφίας-->
		<form name="edit" action="<?php echo htmlentities($_SERVER['PHP_SELF']."?id=".$ev_id); ?>" method="POST" enctype="multipart/form-data">
			<table style="width: 90%">
				<tr style=" visibility: collapse;">	<!-- ID -->
					<td class="label white right"  style="color: white;">ID:</td>
					<td class="data_input">
						<input type="text" class="form-control extra-height" style="width: 60px;" name="ph_id" value="<?php if (isset($ph_id)) { echo $ph_id; } ?>" size="20" max="20"></input>
					</td>
				</tr>
				<tr style=" visibility: collapse;">	<!-- Event ID -->
					<td class="label white right" style="color: white;">Event ID:</td>
					<td class="data_input">
						<input type="text" class="form-control extra-height" style="width: 60px;" name="ph_ev_id" value="<?php if (isset($ev_id)) { echo $ev_id; } ?>" size="20" max="20"></input>
					</td>
				</tr>
				<tr>	<!-- Φωτογραφία -->
					<td class="label white right" style="color: white;">* Φωτογραφία:</td>
					<td class="data_input">
						<input class="form-control extra-height" style="width: 500px;" type="file" name="ph_photofile"></input>
					</td>
				</tr>

				<tr>	<!-- Λεζάντα -->
					<td class="label white right" style="color: white;">* Λεζάντα:</td>
					<td class="data_input">
						<input type="text" required class="form-control extra-height" style="width: 300px;" name="ph_photocaption" value="<?php if (isset($ph_photocaption)) { echo $ph_photocaption; } ?>" size="60" max="255"></input>
					</td>
				</tr>
				<tr>	<!-- Sorter -->
					<td class="label white right" style="color: white;">Sorter:</td>
					<td class="data_input">
						<input type="text" class="form-control extra-height" style="width: 60px;" name="ph_photosorter" value="<?php if (isset($ph_photosorter)) { echo $ph_photosorter; } ?>" size="3" max="3"></input>
					</td>
				</tr>
				<tr>	<!-- Featured -->
					<td class="label white right" style="color: white;">Προβεβλημένη:</td>
					<td class="data_input">
						<select class="form-control extra-height" style="width: 80px;" name="ph_featured" >
						  <option value="1" >Ναι</option>
						  <option value="2" >Όχι</option>
						</select>
					</td>
				</tr>
				<tr><td><br></td><td></td></tr>
				<tr>
					<td class="white">
						<input class="btn btn-primary" type="submit" name="SubmitPhoto" value="Αποθήκευση"></input>
					</td>
					<td class="white">
						<input class="btn btn-primary" type="reset" name="CancelPhoto" value="Ακύρωση" onclick="collapseElement('divNewPhoto')">
					</td>
					<td></td>
				</tr>
			</table>
		</form>

		<?php 
		if (isset ($_POST['SubmitPhoto']))
		{
			// Assign _POST array values to variables
			// $ph_id = $_POST['ph_id'];
			$ph_ev_id = $_POST['ph_ev_id'];
			$ph_photofile = $_FILES['ph_photofile']['name'];
			$ph_photocaption = $_POST['ph_photocaption'];
			$ph_photosorter = $_POST['ph_photosorter'];
			$ph_featured = $_POST['ph_featured'];
			
			//ΑΝΕΒΑΣΜΑ ΑΡΧΕΙΟΥ ΕΙΚΟΝΑΣ
			// Ορισμός του φακέλου όπου γίνονται Upload οι φωτογραφίες των εκδηλώσεων
			$target_dir = "content/";
			// Πλήρες όνομα του uploaded αρχείου
			$target_file = $target_dir . basename($_FILES["ph_photofile"]["name"]);
			// Flag το οποίο ενημερώνεται ανάλογα με την επιτυχία ή όχι του Upload
			// 1 = επιτυχία / ο = αποτυχία
			$uploadOk = 1;
			// Προσδιορίζεται ο τύπος του αρχείου (format) που ο χρήστης επιχειρεί να ανεβάσει
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

			// Έλεγχος εάν πρόκειται πράγματι για αρχείο εικόνας
			// Ελέγχεται o ΜΙΜΕ τύπος του αρχείου απ' όπου προκύπτει το format
			$check = getimagesize($_FILES["ph_photofile"]["tmp_name"]);
			if ($check !== false) 
			{
				// echo "Αποδεκτό αρχείο εικόνας - " . $check["mime"] . ".";
				$uploadOk = 1;
			} 
			else 
			{
				echo "Το αρχείο δεν είναι εικόνα.";
				$uploadOk = 0;
			}
			
			// Ο παρακάτω κώδικας επιτρέπει μόνο συγκεκριμένες μορφοποιήσεις
			// jpg, jpeg, png, gif
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
			{
				echo "Επιτρέπονται μόνο αρχεία JPG, JPEG, PNG & GIF.";
				$uploadOk = 0;
			}
			// Έλεγχος εάν πληρούνται όλες οι συνθήκες
			if ($uploadOk == 0) 
			{
				echo "Η φωτογραφία δεν ήταν δυνατό να μεταφορτωθεί.";
			// Εάν οι συνθήκες πληρούνται, ξεκινά η διαδικασία μεταφόρτωσης
			} 
			else 
			{
				if (move_uploaded_file($_FILES["ph_photofile"]["tmp_name"], $target_file)) 
				{
					echo "Η εικόνα ". basename( $_FILES["ph_photofile"]["name"]). " μεταφορτώθηκε.";
				} 
				else 
				{
					echo "Σφάλμα κατά τη μεταφόρτωση του αρχείου.";
				}
			}

			$strSQL = "INSERT INTO 	event_photos 
									(ph_ev_id, ph_photofile, ph_photocaption, ph_photosorter, ph_featured)
						VALUES 		($ph_ev_id, '$ph_photofile', '$ph_photocaption', 
									'$ph_photosorter', '$ph_featured')";
			echo $strSQL;
			$result = mysqli_query($conn, $strSQL);
			echo $strSQL;
			// Εάν η ενημέρωση είναι επιτυχής, επιστρέφεται κατάλληλο μήνυμα
			if ($result)
			{
				//return ("Η νέα εκδήλωση καταχωρήθηκε.");
				//$last_id = mysqli_insert_id($conn);
				header("Location: editevent.php?id=$ph_ev_id");
			}
			else
				echo "<br><p class='errortext'>".mysqli_error($conn)."</p>";
		}
	?>

