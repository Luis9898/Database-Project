<?php
	include 'connect_db.php';
	
	$Page_ID =mysqli_real_escape_string($mysqli, (int)$_POST['Page_ID']);
	
	$sql = "SELECT p.Page_ID, t.Post_ID, t.Text 
			FROM Post as p join text as t on p.Post_ID = t.Post_ID 
			where p.Page_ID = '$Page_ID'";
	
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
        	echo "<br>". $row["Text"]. "<br>";
    	}
	} 

	$sql_two = "SELECT p.Page_ID, i.Post_ID, i.Image_path 
			 FROM Post as p join image as i on p.Post_ID = i.Post_ID 
			 where p.Page_ID = '$Page_ID'";

	$result2 = $mysqli->query($sql_two);

	 if ($result2->num_rows > 0) {
    	while($row2 = $result2->fetch_assoc()) {
        	
        	echo '<img src="http://localhost:8888/Combined/' . $row2['Image_path'].'" width="360" height="150">';
        	echo "<br>";
    	}
	} 

	$sql_three = "SELECT p.Page_ID, v.Post_ID, v.Video_path 
				  FROM Post as p join video as v on p.Post_ID = v.Post_ID 
				  WHERE p.Page_ID = '$Page_ID'";


	$result3 = $mysqli->query($sql_three);

	 if ($result3->num_rows > 0) {
    	while($row3 = $result3->fetch_assoc()) {
        	
        	echo "<video width='400' controls><source src='http://localhost:8888/Combined/" . $row3['Video_path']."' type='video/mp4'></video>";
        	
        	echo "<br>";
        	echo "<br>";
    	}
	} else {
    	echo "0 results";
	}
	echo '<a href="index.php"><h2><font color="red">Return to main page.</font></h2> </a>';
	$mysqli->close();

?>