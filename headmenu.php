<?php
	require_once ('connect.php');
	$conn = Connect();
	$strSQL = " SELECT cat_id, cat_name
				FROM categories
				ORDER BY cat_sorter";
	$result = mysqli_query($conn, $strSQL);
	if ($result)
	{
		while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			// Οριζόντιο μενού
			$Cat_ID = $row['cat_id'];
			$Cat_Name = $row['cat_name'];
			
			// Drop down menu
			echo "<li>";
			echo "<span class=\"fa-gears\">$Cat_Name</span>";

			$strSQL_subcat = "SELECT sub_categories.scat_id, sub_categories.scat_cat_id, sub_categories.scat_name
							FROM 	sub_categories 
							WHERE	sub_categories.scat_cat_id = $Cat_ID";
			$result_subcat = mysqli_query($conn, $strSQL_subcat);
			if ($result_subcat)
			{
				echo "<ul>";
				while ($row_subcat = mysqli_fetch_array($result_subcat, MYSQLI_ASSOC))
				{
					echo "<li class=\"parent\">";
					$sub_cat_id = $row_subcat['scat_id'];
					$sub_cat_name = $row_subcat['scat_name'];
					echo "<span>".$sub_cat_name."</span>";
					
					$strSQL_inner = "SELECT events.ev_id, events.ev_name, events.ev_place
									FROM 	events 
									WHERE	events.ev_subcat = $sub_cat_id";
					$result_inner = mysqli_query($conn, $strSQL_inner);
					if ($result_inner)
					{
						echo "<ul>";
						while ($row_inner = mysqli_fetch_array($result_inner,MYSQLI_ASSOC))
						{
							echo "<li>";
								echo "<a href=\"eventinfo.php?id=".$row_inner['ev_id']."\">".$row_inner['ev_name']."</a>";
							echo "</li>";
						}
						echo "</ul>";
					}
					
					echo "</li>";
				}
				echo "</ul>";
			}
			echo "</li>";
		}
	}

?>
