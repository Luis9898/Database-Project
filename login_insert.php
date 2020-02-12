<?php
session_start ();
include 'connect_db.php';
if(isset($_REQUEST['enter']))
{
$Username = $_REQUEST['Username'];
$Password = $_REQUEST['Password'];

$test = mysqli_query($mysqli,"select* from Profile where Username='$Username'and Password='$Password'");
$check=mysqli_fetch_array($test);
if($check)
{
	$_SESSION["login"]="1";
	header("location:index.php");
}
else	
{
	header("location:login.php?err=1");
}
}
?>
