<?php 
session_start ();
if(!isset($_SESSION["login"]))
	header("location:login.php");

?>


<body>

<form action="UpdatePageName_insert.php" method="post">
		<h1> Update a Page Name!</h1>
		<p>Page Identification</p>
		<input type="text" name="Page_ID" placeholder="Enter Page_ID">
		
		<p>New name</p>
		<input type="text" name="Name" placeholder="Enter new name">

	    <button type="submit">Create</button>
		
<?php 
if(isset($_REQUEST["err"]))
	$msg="Invalid Page_ID";
?>
<p style="color:red;">
<?php if(isset($msg))
{
	
echo $msg;
}
?>
</form>
<h1>Available Pages</h1>
<?php 
include 'connect_db.php';

$page = "Select Page_ID, Page_name from Page";
$page_result = $mysqli ->query($page);

if($page_result->num_rows>0)
{
	while($row = $page_result->fetch_assoc())
	{

		echo "<br>" . "Page ID: " . $row["Page_ID"] . " -----Name: " . $row["Page_name"] . "<br>";
	}
}
else
echo "No results";
$mysqli->close();
?>

</body>


<a href="index.php"><h2><font color="red">Return to main page.</font></h2> </a>
