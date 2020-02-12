<?php
include 'connect_db.php';

if (isset($_POST['submit'])) {
	$file = $_FILES['file'];
	$Page_ID = mysqli_real_escape_string($mysqli, (int)$_POST['Page_ID']);
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png', 'pdf');
	header("Location: index.php?uploadsuccess");
	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if($fileSize < 1000000000){
				$fileDestination = 'uploads/'.$fileName;
				move_uploaded_file($fileTmpName, $fileDestination);

				$sql = "UPDATE Page SET Image='$fileDestination' where Page_ID=$Page_ID";
				$mysqli->query($sql) or die($mysqli->error);
				header("Location: index.php?uploadsuccess");
				

			} else {
				echo "Too big";
			}
		} else {
			echo "Error Uploading";
		}
	} else {
		echo "Wrong type";
	}
}
?>