<?php
include 'connect_db.php';
	
$Date = mysqli_real_escape_string($mysqli, $_REQUEST['Date']);

$sql = "SELECT p.Profile_ID, p.Post_date, t.Post_ID, t.Text, page.Page_Name 
		FROM Page as page join Post as p on page.Page_ID = p.Page_ID join text as t on p.Post_ID = t.Post_ID 
		WHERE p.Post_date = '$Date'";


$result = $mysqli->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        	echo "<br> Posted on: ".$row["Page_Name"]." on ".$row["Post_date"]."<br>".$row["Text"]. "<br>";
    }

} else {
    	echo "0 results";
}

$sql_image = "SELECT p.Profile_ID, p.Post_date, i.Post_ID, i.Image_path, page.Page_Name 
			  FROM Page as page join Post as p on page.Page_ID = p.Page_ID join image as i on p.Post_ID = i.Post_ID 
			  WHERE p.Post_date = '$Date'";

$result_image = $mysqli->query($sql_image);

if ($result_image->num_rows > 0) {
    	while($row2 = $result_image->fetch_assoc()) {
        	echo "<br> Image posted on: ".$row2["Page_Name"]." on ".$row2["Post_date"]."<br>";
        	echo '<img src="http://localhost:8888/Combined/'.$row2['Image_path'].'" width="360" height="150">';
        	echo "<br>";
    	}
}

$sql_video = "SELECT p.Profile_ID, p.Post_date, v.Post_ID, v.Video_path, page.Page_Name 
			  FROM Page as page join Post as p on page.Page_ID = p.Page_ID join video as v on p.Post_ID = v.Post_ID 
			  WHERE p.Post_date = '$Date'"; 

$result_video = $mysqli->query($sql_video);

if ($result_video->num_rows > 0) {
    	while($row3 = $result_video->fetch_assoc()) {
        	echo "<br> Video posted on: ".$row3["Page_Name"]." on ".$row3["Post_date"]."<br>";
        	echo "<video width='400' controls><source src='http://localhost:8888/Combined/".$row3['Video_path']."' type='video/mp4'></video>";
        	
        	echo "<br>";
        	echo "<br>";
    	}
	} else {
    	echo "0 results";
	}

$sql_comment = "SELECT c.Date, c.Comment, page.Page_Name 
				FROM Page as page join comments as c on page.Page_ID = c.Page_ID 
				WHERE c.Date = '$Date'";

$result_comment = $mysqli->query($sql_comment);

if ($result_comment->num_rows > 0) {

    while($row4 = $result_comment->fetch_assoc()) {
        	echo "<br> Commented on: ".$row4["Page_Name"]." on ".$row4["Date"]."<br>".$row4["Comment"]. "<br>";
    }

} else {
    	echo "0 results";
}
echo '<a href="index.php"><h2><font color="red">Return to main page.</font></h2> </a>';
$mysqli->close(); 


?> 