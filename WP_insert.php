<?php
	session_start ();
	include 'connect_db.php';

	$message= mysqli_real_escape_string($mysqli, $_POST['message']);
	$get = "SELECT MAX(Post_ID) FROM Post";

	$sql= "INSERT INTO text (Text, Post_ID)
        VALUES('$message',(SELECT MAX(Post_ID) FROM Post))";

	
	if(mysqli_query($mysqli, $sql)){
		echo "records added";
	}else{
		echo "error";
	}

	mysqli_close($mysqli);
	header("location:index.php");
	?>