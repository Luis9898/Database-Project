<?php
	session_start ();
	include 'connect_db.php';

	$Page_ID = mysqli_real_escape_string($mysqli, (int)$_POST['Page_ID']);
	$Name=mysqli_real_escape_string($mysqli, $_POST['Name']);
	$date = date('Y-m-d H:i:s');
	
	$test = mysqli_query($mysqli,"select* from Page where Page_ID='$Page_ID'");
	$results=mysqli_fetch_array($test);

	if( $results)
	{
	
		$sql = "Update Page SET Page_name='$Name' where Page_ID='$Page_ID'";
	
		if(mysqli_query($mysqli, $sql))
		{
		echo "records added";
		}
		else
		{
		echo "didnt work";
		}
		header("location:UpdatePageOptions.php");
	}
	else	
	{
		header("location:UpdatePageName.php?err=1");
	
	}

	

	mysqli_close($mysqli);
	?>