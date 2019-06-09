<?php
	require_once ('connect.php');
	$conn = Connect();
	$strSQL = " SELECT ad_id, ad_caption, ad_image
				FROM ads
				WHERE ad_featured=1";
	$result = mysqli_query($conn, $strSQL);
	if ($result)
	{
		while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			echo "<img src=\"images/".$row['ad_image']."\" />";
		}
	}

?>
