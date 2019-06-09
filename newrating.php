<!-- HTML φόρμα εισαγωγής αξιολόγησης -->
<?php
	ob_start();
?>
<form name="newrating" method="POST" enctype="multipart/form-data">
	<table style="width: 100%">
		<tr style="visibility: collapse;">	
			<td class="label white">Event ID:</td>
			<td class="data_input">
				<input type="text" required name="ev_id" value="<?php if (isset($ev_id)) { echo $ev_id; } ?>" size="20" max="20"></input>
			</td>
		</tr>
		<tr style="visibility: collapse;">	
			<td class="label white">User ID:</td>
			<td class="data_input">
				<input type="text" required name="user_id" value="<?php if (isset($LoggedUserID)) { echo $LoggedUserID; } ?>" size="20" max="20"></input>
			</td>
		</tr>
		</table>
		<h3 style="text-align: center; color: white; margin-top: 20px;">Πόσο σας αρέσει η δραστηριότητα;</h3>
		<fieldset class="rating" style="width: 210px; margin-left: auto; margin-right: auto;">
			<input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Πάρα πολύ">5 stars</label>
			<input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Πολύ">4 stars</label>
			<input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Αρκετά">3 stars</label>
			<input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Λίγο">2 stars</label>
			<input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Καθόλου">1 star</label>
		</fieldset>
		
		<p style="text-align: center; margin-top: 80px;">
		<input class="btn btn-primary"  type="submit" name="Submit" value="Αποθήκευση"></input>
		<input class="btn btn-primary" type="reset" name="cancel" value="Ακύρωση" onclick="collapseElement('divRate')"></p>
</form>

<?php
if (isset($_POST['Submit']) && isset($_POST['rating']))
{
	$ev_id = $_POST['ev_id'];
	$user_id = $_POST['user_id'];
	$rating = $_POST['rating'];
	$strSQL = "	INSERT 
				INTO 	user_ratings (usr_id, ev_id, comments, rate) 
				VALUES 	($user_id, $ev_id, '', $rating)";
	$result = mysqli_query($conn, $strSQL);
	header("Location: eventinfo.php?id=$ev_id");
}
?>
