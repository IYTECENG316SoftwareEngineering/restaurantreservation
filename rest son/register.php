<!doctype html>
<html>
<head>
<title>Register</title>
<link rel = "stylesheet" type = "text/css" href = "design.css">
</head>
<body>

<p align= "center" > <a href = "homepage.php" > HOMEPAGE </a><p>
<p align = "center"> If you already have account click, <a href="login.php">Login</a><p>

<p align = "center"> If it is your first time, fill the form <p>

<h3 align = "center" >Registration Form</h3>

 <!--<form  align = "center" action="" method="POST">
    <table align = "center">
       <tr>
	      <td><label for="username">Name</label></td>
          <td><input type="text" name="username" placeholder="Name"/></td>
	   </tr>
	   <tr>
	     <td><label for="password">Surname</label></td>
		  <td><input type="text" name="surname" placeholder="Surname"/></td>
	   </tr>
		<tr> 
		 <td><label for="password">Email</label></td>
		  <td><input type="text" name="email" placeholder="Email"/></td></br>
		</tr>
		<tr>
		 <td><label for="password">Password</label></td>
		  <td><input type="password" name="password" placeholder="Password"/></td></br>
		</tr>
		<tr> 
		 <td><label for="password">Phone</label></td>
		  <td><input type="text" name="phone" placeholder="Phone"/></td></br>
		</tr>
		<tr>
		
		 <td> <input type="submit" value="Sign-up"/></td></br>
	    </tr>
</form>	-->

<form  align = "center" action="" method="POST">
	Username: <input type="text" name="user"><br />
	Password: &nbsp<input type="password" name="pass"><br /><br /> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="submit" value="Submit the form" name="submit" />
</form>


<?php

if(isset($_POST["submit"])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {
	$user=$_POST['user'];
	$pass=$_POST['pass'];

	//connection with database. db name= restx   table name:login
	$con=mysqli_connect('localhost','root','') or die(mysql_error());
	mysqli_select_db($con, 'rest') or die("cannot select DB");

	$query=mysqli_query($con, "SELECT * FROM login WHERE username='".$user."'");
	
	$numrows=mysqli_num_rows($query);

	if($numrows==0)
	{
	$sql="INSERT INTO login(username,password) VALUES('$user','$pass')";

	$result=mysqli_query($con, $sql);


	if($result){
	echo "Account Successfully Created";
	} else {
	echo "Failure!";
	}

	} else {
	echo "That username already exists! Please try again with another.";
	}

} else {
	echo "All fields are required!";
}
}
?>

</body>
</html>