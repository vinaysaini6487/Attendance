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


<?php echo "<h4>Date:" . date("d/m/Y");"</h4>"?>

<a href="logout.php">Log Out</a>
<html>
	<head>
		<title>
			Submit Your Attendance
		</title>
	
	</head>

	<body>
		<center>
			<h1>
				Submit Your Attendance
			</h1>

		<table>
				<form action="verify_attendance.php" method="post">
				<tr><td>Your Name :<td> 	<?php  echo $_SESSION['user']; ?>
				<tr><td>Your Roll No :<td> <input type="text" name="rollno" value=" <?php  echo $_SESSION['rollno']; ?>" readonly >
				<tr><td>Secret Code :<td> <input type="text" required name="code">
				<tr><td>Submit Attendance :<td> <input type="submit" name="submit">
				
				</form>
			    <a href="userprofile.php">Back</a>
				
				<td>
				
		</table>

		</center>
	
	
	</body>

</html>
