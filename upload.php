<?php
include 'connect_db.php';

if (isset($_POST['submit'])) {
	$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png', 'pdf');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if($fileSize < 1000000000){
				$fileDestination = 'uploads/'.$fileName;
				move_uploaded_file($fileTmpName, $fileDestination);

				$sql = "INSERT INTO Image (Image_name,Image_path, Post_ID) VALUES ('$fileName', '$fileDestination',(SELECT MAX(Post_ID) FROM Post))";
				$mysqli->query($sql) or die($mysqli->error);
				header("Location: index.php?uploadsuccess");
				

			} else {
				echo "Too big";
			}
		} else {
			echo "Error Uploading";
		}
	} else {
		echo "Wrong Type";
	}
}
?>