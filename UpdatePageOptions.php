<?php 
session_start ();
if(!isset($_SESSION["login"]))

	header("location:login.php"); 

?>

<h1>Choose Your Post Type</h1>
<a href="UpdatePageName.php"><h2>Update Page Name</h2>
<a href="UpdatePageDescription.php"><h2>Update Page Description</h2>
<a href="UpdatePageImage.php"><h2>Update Page Image</h2>
<a href="UpdatePageCategory.php"><h2>Update Page Category</h2>
<a href="index.php"><h2>Return to main menu</h2>


<a href="logout.php"><h2><font color="red">Logout</font></h2>
