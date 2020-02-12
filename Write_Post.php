<?php 
session_start ();
if(!isset($_SESSION["login"]))
	header("location:login.php");


?>
<body>

<form action="WP_insert.php" method="post">
		<h1> Enter the text!</h1>
		<p>Text Box</p>
		<textarea rows="5" cols="20" name="message"></textarea>
	    <button type="submit">Create</button>
</form>

</body>


<a href="index.php"><h2><font color="red">Return to main page.</font></h2> </a>