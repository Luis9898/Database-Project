<?php
include 'connect_db.php';

$Profile_ID =mysqli_real_escape_string($mysqli, (int)$_POST['Profile_ID']);

$sql = "DELETE FROM Profile 
		WHERE Profile_ID = '$Profile_ID' ";


$result = $mysqli->query($sql);

header("Location: index.php");


?>

