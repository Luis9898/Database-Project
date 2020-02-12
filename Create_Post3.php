<?php 
session_start ();
if(!isset($_SESSION["login"]))
	header("location:login.php");

?>


<body>

<form action="Post_video_insert.php" method="post">
		<h1> Create your post!</h1>
		<p>Page Identification</p>
		<input type="text" name="Page_ID" placeholder="Enter Page_ID">
		
		<p>User Identification</p>
		<input type="text" name="Profile_ID" placeholder="Enter your Profile_ID">

	    <button type="submit">Create</button>
		<?php 
		if(isset($_REQUEST["err"]))
		$msg="Invalid Page_ID or Post_ID";
		?>
		<p style="color:red;">
		<?php if(isset($msg))
		{
	
		echo $msg;
		}
		?>

</form>
<h1>List of eligible users</h1>
<?php 
include 'connect_db.php';
$profile = "Select Profile_ID, Fname, Lname from Profile";
$prof_result = $mysqli ->query($profile);

$page = "Select Page_ID, Page_name from Page";
$page_result = $mysqli ->query($page);

if($prof_result->num_rows>0)
{
	while($row = $prof_result->fetch_assoc())
	{

		echo "<br>" . "Profile ID: " . $row["Profile_ID"] . " -----Name: " . $row["Fname"] . " -----Last Name: " . $row["Lname"] . "<br>";
	}
}
else
echo "No results bitch";
echo "<h1> Page Results </h1>";
if($page_result->num_rows>0)
{
	while($row = $page_result->fetch_assoc())
	{

		echo "<br>" . "Page ID: " . $row["Page_ID"] . " -----Name: " . $row["Page_name"] . "<br>";
	}
}
else
echo "No results bitch";
$mysqli->close();
?>
</body>


<a href="index.php"><h2><font color="red">Return to main page.</font></h2> </a>