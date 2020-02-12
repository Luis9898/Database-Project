<body>

<form action="listPosts.php" method="post">
		<h1> See posts from specific profile!</h1>
		
		<p>User Identification</p>
		<input type="text" name="Profile_ID" placeholder="Enter your Profile_ID">

	    <button type="submit">List</button>

</form>
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
?>

</body>