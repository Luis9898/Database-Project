<?php 
session_start ();
if(!isset($_SESSION["login"]))

	header("location:login.php"); 

?>

<h1>Choose Your Post Type</h1>
<a href="Create_Post1.php"><h2>Create a Text Post</h2>
<a href="Create_Post2.php"><h2>Create a Image Post</h2>
<a href="Create_Post3.php"><h2>Create a Video Post</h2>
<a href="index.php"><h2>Return to main menu</h2>


<a href="logout.php"><h2><font color="red">Logout</font></h2>
