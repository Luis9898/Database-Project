<?php

	include 'connect_db.php';

	

if (isset($_POST['submit'])) {
	$Profile_ID = mysqli_real_escape_string($mysqli, (int)$_POST['Profile_ID']);
	$Page_Name = mysqli_real_escape_string($mysqli, $_REQUEST['Page_Name']);
	$Description = mysqli_real_escape_string($mysqli, $_REQUEST['Description']);
	$Category = mysqli_real_escape_string($mysqli, $_REQUEST['Category']);	

	$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	echo $fileActualExt;	

	$allowed = array('jpg', 'jpeg', 'png', 'pdf');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if($fileSize < 1000000000){
				$fileDestination = 'uploads/'.$fileName;
				move_uploaded_file($fileTmpName, $fileDestination);

				$sql = "INSERT INTO Page (Page_Name, Description, Image, Category, Views, Admin) VALUES ('$Page_Name', '$Description', '$fileDestination', '$Category', 0, $Profile_ID)";
				$mysqli->query($sql) or die($mysqli->error);
				header("Location: index.php?uploadsuccess");
				

			} else {
				echo "Your file is too big";
			}
		} else {
			echo "There was an error uploading your file";
		}
	} else {
		echo "You cannot upload files of this type";
	}
}
	?>