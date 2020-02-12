<body>

<form action="deleteProfile.php" method="post">
		<h1> Delete profile</h1>
		
		<p>User Identification</p>
		<input type="text" name="Profile_ID" placeholder="Enter your Profile_ID">

	    <p><button type="submit">Delete</button></p>


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
			} else {
				echo "No results bitch";
			}
	    ?>
</form>
<a href="index.php"><h2><font color="red">Return to main page.</font></h2> </a>
</body>