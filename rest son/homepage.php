<html>
<head> 
	<title> Restaurants </title>
	<link rel = "stylesheet" type = "text/css" href = "design.css">
</head>



<body>
 <br><br><br><br>
<h1><p align ="center"> Welcome to Restaurants <p></h1>
<p align ="center"> You need to register first but if you already have account, you can directly login <p>

<p align ="center" > <a align ="center" href="register.php"> Register </a> &nbsp&nbsp&nbsp

<a  href="login.php">Login</a>
</p>

<hr>
<center>
<p> You can look for the restaurant options without creating account but to make a reservation, you have to login<p>


<div id = "dropLocation">

<form  action = "" method = "POST">
	
		 Choose the City <input type = "text" name ="location"><br>
		 
 		
	

<input type = "submit" value = "search" name ="submit"/>

</form>
</div>



</center>

<?php
if(isset($_POST["submit"])){

if(!empty($_POST['location']) ) {

	$location=$_POST['location'];
	
	$con = mysqli_connect('localhost','root','') or die(mysql_error());
	mysqli_select_db($con, 'rest') or die("cannot select DB");

	$query = mysqli_query($con, "SELECT * FROM restaurants WHERE restLocation ='".$location."' ");

	$numrows=mysqli_num_rows($query);

	if($numrows!=0)
	{
	while($row=mysqli_fetch_assoc($query))
	{
		$dblocation = $row['restLocation'];
		$dbRestName = $row['restName'];
		$dbRestId = $row['resId'];
		$dbRestPrice = $row['restPrice'];
		$dbRestCuisine = $row['restCuisine'];
	
	
	
	




		echo "<br><br><br>
				<table border =2>
				<tr>
				<th> Restaurant id</th>
				<th> Name </th>
				<th> Location </th>
				<th> Price </th>
				</tr>
				<tr>
					<td> $dbRestId </td>	
					<td> $dbRestName </td>
					<td> $dblocation </td>
					<td> $dbRestPrice </td>

				</tr>
			</table>";

}
}
}
	
}

?>

</body>

</html>