<html>
<head>
	<title>Login</title>
	<link rel = "stylesheet" type = "text/css" href = "design.css">
</head>
<body>

<p align = "center"> If you don't have account, click <a href="register.php">Register</a><p>
<h3 align = "center">Login Form</h3>
<form  align = "center" action="" method="POST">
	Username: <input type="text" name="user"><br /><br />
	Password: <input type="password" name="pass"><br /><br /> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="submit" value="Login" name="submit" />
</form>
<?php
if(isset($_POST["submit"])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {
	$user=$_POST['user'];
	$pass=$_POST['pass'];

	//connection with database. db name= restx   table name:login
	$con=mysqli_connect('localhost','root','') or die(mysql_error());
	mysqli_select_db($con,'rest') or die("cannot select DB");

	$query=mysqli_query($con, "SELECT * FROM login WHERE username='".$user."' AND password='".$pass."'");
	$numrows=mysqli_num_rows($query);
	if($numrows!=0)
	{
	while($row=mysqli_fetch_assoc($query))
	{
	$dbusername=$row['username'];
	$dbpassword=$row['password'];
	}

	if($user == $dbusername && $pass == $dbpassword)
	{
	session_start();
	$_SESSION['sess_user']=$user;

	/* Redirect browser */
	header("Location: member.php");
	}
	} else {
	echo "Invalid username or password!";
	}

} else {
	echo "All fields are required!";
}
}
?>

</body>
</html>