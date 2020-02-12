
<!DOCTYPE html>
<html>
<head>
	<title>Create a new Page!</title>
</head>
<body>
<h1> Create a new page! </h1>
<div id="content">
	<form action="insertPage.php" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="size" value="1000000">
		
		<p>Profile Identification</p>
		<input type="text" name="Profile_ID" placeholder="Enter Profile_ID">

		<p>Page Name</p>
		<input type="text" name="Page_Name" placeholder="Enter Page Name">

		<p>Description</p>
			<input type="text" name="Description" placeholder="Enter Description">

		<p>Category</p>
			<input type="text" name="Category" placeholder="Enter Category">

		<p>Select an Image</p>
		<input type="file" name="file">

		<input type="submit" name="submit" value="Upload">

	</form>
</div>
	<h1>List of eligible users</h1>
	<?php 
	include 'connect_db.php';
	$profile = "Select Profile_ID, Fname, Lname from Profile";
	$prof_result = $mysqli ->query($profile);

	if($prof_result->num_rows>0)
	{
		while($row = $prof_result->fetch_assoc())
		{

			echo "<br>" . "Profile ID: " . $row["Profile_ID"] . " -----Name: " . $row["Fname"] . " -----Last Name: " . $row["Lname"] . "<br>";
		}
	}
	else
	echo "No results bitch";
	$mysqli->close();
	?>
<a href="index.php"><h2><font color="red">Return to main page.</font></h2> </a>
</body>
</html>