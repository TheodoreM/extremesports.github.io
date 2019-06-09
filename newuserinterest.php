		<!-- HTML φόρμα εισαγωγής νέας κατηγορίας που ενδιαφέρει το χρήστη -->
		<form name="edit" action="<?php echo htmlentities($_SERVER['PHP_SELF']."?id=".$usr_id); ?>" method="POST" enctype="multipart/form-data">
			<table style="width: 90%">
				<tr>	<!-- ID -->
					<td class="label white">User ID:</td>
					<td class="data_input">
						<input type="text" class="form-control" style="width: 60px;" name="usr_id" value="<?php if (isset($usr_id)) { echo $usr_id; } ?>" size="20" max="20"></input>
					</td>
				</tr>
				<tr>	<!-- Κατηγορία δραστηριότητας -->
					<td><label class="label white">* Κατηγορία δραστηριότητας:</td></label>
					<td class="data_input">
						<select class="form-control" style="width: 200px;" name="sub_cat_id" >
							<?php
							$strSQL = "	SELECT scat_id, scat_name
										FROM sub_categories
										ORDER BY scat_name";
							$result = mysqli_query($conn, $strSQL);
							if ($result)
							{
								while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
								{	
									echo "<option value=".$row['scat_id'].">".$row['scat_id']."-".$row['scat_name']."</option>";
								}
							}
							?>
						</select>
					</td>
				</tr>
				<tr><td><br></td><td></td></tr>
				<tr>
					<td class="label white">
						<input class="btn btn-primary" type="submit" name="SubmitInterest" value="Αποθήκευση"></input>
					</td>
					<td class="label">
						<input class="btn btn-primary" type="reset" name="CancelInterest" value="Ακύρωση" onclick="collapseElement('divNewInterest')">
					</td>
					<td></td>
				</tr>
			</table>
		</form>

		<?php 
		if (isset ($_POST['SubmitInterest']))
		{
			// Assign _POST array values to variables
			$usr_id = $_POST['usr_id'];
			$sub_cat_id = $_POST['sub_cat_id'];
			$strSQL = "INSERT INTO 	user_prefs 
									(usr_id, sub_cat_id)
						VALUES 		($usr_id, $sub_cat_id)";

			$result = mysqli_query($conn, $strSQL);
			// Εάν η ενημέρωση είναι επιτυχής, επιστρέφεται κατάλληλο μήνυμα
			if ($result)
			{
				return ("Η νέα επιλογή καταχωρήθηκε.");
				header("Location: edituser.php?id=$usr_id");
			}
			else
				echo "<br><p class='errortext'>".mysqli_error($conn)."</p>";
		}
	?>

