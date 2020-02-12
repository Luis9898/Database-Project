<html>
<head>
</head>
<h1>Login</h1>
<form action="login_insert.php" method="POST"><br><br>
Username:<input type="text" required="" name="Username"><br><br>
Password:<input type="password" required="" name="Password"><br><br>

<input type="submit" value="Login" name="enter">
<a href="http://localhost:8888/Combined/Register.php">Don't have an account?</a>
<br>
<?php 
if(isset($_REQUEST["err"]))
	$msg="Invalid username or Password";
?>
<p style="color:red;">
<?php if(isset($msg))
{
	
echo $msg;
}
?>

</p>

</form>

</html>