<?php
	require_once 'includes/functions.php';
?>
<div id="LoggedInfo">
	<table   style="width: 100%; table-layout: fixed;">
	<tr>
	<?php
		echo "<td style=\"width: 80%\">";
		$LoggedUserID = GetLoggedID();
		if (IsLoggedAdmin() == true)
		{
			echo "<span style='margin-left: 30px;'> </span>";
			echo "<a href=\"eventlist.php\" class=\"CommandText Black\">Διαχείριση δραστηριοτήτων</a>";
			echo "<span style='margin-right: 30px;'> </span>";
			echo "<a href=\"newevent.php\" class=\"CommandText Black\">Νέα δραστηριότητα</a>";
			echo "<span style='margin-right: 30px;'> </span>";
			echo "<a href=\"subcategorieslist.php\" class=\"CommandText Black\">Υποκατηγορίες</a>";
			echo "<span style='margin-right: 30px;'> </span>";
			echo "<a href=\"newsubcat.php\" class=\"CommandText Black\">Νέα υποκατηγορία</a>";
		}
		echo "</td>";
		echo "<td>";
		if (GetLoggedID() == 0)
		{
			echo "<a href=\"login.php\" class=\"CommandText Black\">Συνδεθείτε</a>";
		}
		else
		{
			echo "<a href=\"edituser.php?id=".$LoggedUserID."\"><span class=\"CommandText Black\">".GetLoggedUserData()."</span></a><br>";
			echo "<a href=\"logoff.php\" class=\"CommandText Black\">Αποσύνδεση</a>";
		}
		echo "</td>";
	?>
	</tr>
	</table>
</div>