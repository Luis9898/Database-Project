<?php
	include 'connect_db.php';


	$Fname = mysqli_real_escape_string($mysqli, $_REQUEST['Fname']);
	$Lname = mysqli_real_escape_string($mysqli, $_REQUEST['Lname']);
	$Email = mysqli_real_escape_string($mysqli, $_REQUEST['Email']);
	$Username = mysqli_real_escape_string($mysqli, $_REQUEST['Username']);
	$Password = mysqli_real_escape_string($mysqli, $_REQUEST['Password']);
	$date = date('Y-m-d H:i:s');
	$sql = "INSERT INTO Profile (Fname, Lname, Email, Username, Password, Date)
			 VALUES ('$Fname', '$Lname', '$Email','$Username', '$Password', '$date' )";
	
	if(mysqli_query($mysqli, $sql)){
		echo "records added";
	}else{
		echo "ERROR: could not add data";
	}
	header("location:login.php");
	mysqli_close($mysqli);
	?>