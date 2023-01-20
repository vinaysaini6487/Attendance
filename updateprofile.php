<?php
session_start();

if(isset($_SESSION['user']))
{
echo '<h1 style="text-align:center">' .$_SESSION['user']."</h1>" ; 	
	$rollno=$_SESSION['rollno'];
	$checkdata= "Select * from students where rollno='$rollno'";
	include ('connection.php');
	$result=mysqli_query($con,$checkdata);
	if($record1=mysqli_fetch_assoc($result))
	   {
	   $email=$record1['email'];
	   $contact=$record1['contact'];
	   $fname=$record1['fname'];
	   }
}
else
{
	header('Location:login.php');
}
    
$user = $_SESSION['user'];

if(isset($_POST['updateprofile']))
					{
					    $contact=$_POST['contact'];
						$email=$_POST['email'];
						$fname=$_POST['fname'];
						$query="UPDATE `students` SET `contact`='$contact', `email`='$email', `fname`='$fname' WHERE `name`='$user' ";
						
						include'connection.php';
						
						mysqli_query($con,$query);
					
					echo "<h2 style=color:darkgreen;>Your Profile Updated Successfully.</h2>";
					}


?>
<html>
	<head>
		<title>
			Update Profile
		</title>
	</head>

	<body>
	<center>
			<h1>Update Your Profile</h1>
					<form action="updateprofile.php" method="post" >
			<table>
			    <tr><td>Roll No :<td> <input type="text" name="rollno" value=" <?php  echo $_SESSION['rollno']; ?>" readonly >
				<tr><td>Father's Name :<td> <input type="text" name="fname" value="<?php  echo $fname; ?>" >
				<tr><td>Contact :<td> <input required type="text" name="contact" value="<?php  echo $contact; ?>" >
				<tr><td>Email :<td> <input required type="email" name="email" value=" <?php  echo $email; ?>" >
				<tr> <td><input Type ="Reset"><td> <input type="submit" value="Update" name="updateprofile">
			</table>
			</form>
			<a href="userprofile.php">Back</a>
	</center>

	</body>
</html>