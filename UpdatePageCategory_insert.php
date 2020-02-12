<?php
	session_start ();
	include 'connect_db.php';

	$Page_ID = mysqli_real_escape_string($mysqli, (int)$_POST['Page_ID']);
	$cat=mysqli_real_escape_string($mysqli, $_POST['category']);
	
	$test = mysqli_query($mysqli,"select* from Page where Page_ID='$Page_ID'");
	$results=mysqli_fetch_array($test);

	if( $results)
	{
	
		$sql = "Update Page SET Category='$cat' where Page_ID=$Page_ID";
	
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
		header("location:UpdatePageCategory.php?err=1");
	
	}

	

	mysqli_close($mysqli);
	?>