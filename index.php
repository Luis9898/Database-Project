<?php 
session_start ();
if(!isset($_SESSION["login"]))

	header("location:login.php"); 

?>

<h1>Welcome to the main Page!</h1>
<a href="Create_Page.php"><h2>Create a Page</h2>
<a href="CreatePostOptions.php"><h2>Create a Post</h2>
<a href="PageDetails.php"><h2>Show Page Details</h2>
<a href="getUser.php"><h2>See posts from specific account</h2>
<a href="getDate.php"><h2>See all posts on a specific date</h2>
<a href="UpdatePageOptions.php"><h2>Update Page Info</h2>
<a href="getUserToDelete.php"><h2>Delete User</h2>




<a href="logout.php"><h2><font color="red">Logout</font></h2>
