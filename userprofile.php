<?php
session_start();

if(isset($_SESSION['user']))
{
echo '<h1 style="text-align:center">Welcome ' .$_SESSION['user']."</h1>" ; 	
	
}
else
{
	header('Location:login.php');
}

?>
<?php echo "<h4>Date:" . date("d/m/Y");"</h4>"?> <br>
<a href="logout.php"><h4>Logout</h4></a>

<html>

	<body>
		<center>
		
<?php

if(isset($_SESSION['user']))
{
	
	$roll=$_SESSION['rollno'];
	$imgquery="select image from students where rollno=$roll";
	include'connection.php';
	$result=mysqli_query($con,$imgquery);
	
	if($result)
	{
		$record=mysqli_fetch_assoc($result);
		$image=$record['image'];
	}
	
echo"<img src='upload/".$image."' border='1' width='150' height='150'></br>";
	
}
else
{
	session_destroy();
	header('Location:login.php');
}


?>
		<a href="submitattendance.php"><h1>Submit Attendance</h1></a>
		<a href="checkattendance.php"><h1>Check Your Attendance</h1></a>
		<a href="updateprofile.php"><h1>Update Profile</h1></a>
		<a href="changeprofileimage.php"><h1>Change Profile Image</h1></a>
		<a href="changepassword.php"><h1>Change Password</h1></a>	
		
		<center>
			
	
	</body>

<html>