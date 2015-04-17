<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:login.php");
} else {
?>
<!doctype html>
<html>
<head>
<title>Welcome</title>
</head>
<body>
	<a href = "homepage.php" > HOMEPAGE </a><p>
	<h2>Welcome, <?=$_SESSION['sess_user'];?>! </h2>
	<a href="logout.php">Logout</a>
	<p> Your account is created successfully. Now you can start to visit restaurant options <p>

</body>
</html>
<?php
}
?>
