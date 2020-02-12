<?php 
session_start ();
if(!isset($_SESSION["login"]))
header("location:login.php"); 

include 'connect_db.php';
$sql = "Select * from Page";
$result = $mysqli ->query($sql);
if($result->num_rows>0)
{
	while($row = $result->fetch_assoc())
	{

		echo "<br>" . "Page ID: " . $row["Page_ID"] . " Page Name: " . $row["Page_Name"] . " Description: " . $row["Description"] . " Image: " . $row["Image"] . 
			 " Category: " . $row["Category"] . " Views: " . $row["Views"] . " Admin: " . $row["Admin"]. "<br>";
	}
}
else
echo "No results bitch";
$mysqli->close();
?>

<html>
	<body> 

	<form action="Page_posts.php" method="post">
		<h1> See posts from a specific page!</h1>
		
		<p>Page Identification</p>
		<input type="text" name="Page_ID" placeholder="Enter the Page_ID">

	    <button type="submit">List</button>

	</form>


		<a href="index.php"><h2><font color="red">Return to main page.</font></h2> </a>
	</body>
</html>
