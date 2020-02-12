<?php
	session_start ();
	include 'connect_db.php';

	$Page_ID = mysqli_real_escape_string($mysqli, (int)$_POST['Page_ID']);
	$Profile_ID =mysqli_real_escape_string($mysqli, (int)$_POST['Profile_ID']);
	$date = date('Y-m-d H:i:s');


	$res = mysqli_query($mysqli,"select* from Profile where Profile_ID='$Profile_ID'");
	$test = mysqli_query($mysqli,"select* from Page where Page_ID='$Page_ID'");
	$result=mysqli_fetch_array($res);
	$results=mysqli_fetch_array($test);

	if($result AND $results)
	{
	
		$sql = "INSERT INTO Post ( Page_ID, Post_date, Post_time, profile_ID) 
			VALUES ($Page_ID, '$date',CURRENT_TIME(), $Profile_ID)";
	
		if(mysqli_query($mysqli, $sql))
		{
		echo "records added";
		}else
		{
		echo "ERROR: could not add data";
		}
		header("location:start.php");
	}
	else	
	{
		header("location:Create_Post2.php?err=1");
	
	}



	mysqli_close($mysqli);
	?>