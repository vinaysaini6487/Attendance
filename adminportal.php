
<?php
session_start();

if(isset($_SESSION['email']))
{
//echo '<h1 style="text-align:center">Welcome ' .$_SESSION['email']."</h1>" ; 	
	
}
else
{
	header('Location:admin.php');
}
?>
<?php echo "<h4>Date:" . date("d/m/Y");"</h4>"?> <br>
<a href="logout.php">Log Out</a>

<html>
	<head>
		<title>
			Admin Portal
		</title>
	</head>

	<body>
	 
	
	<center>
	    <h1> Admin Portal </h1>
		<a href="registration_list.php"><h1>Check List</h1></a>
	    <a href="createcode.php"><h1>Create Attendance Code</h1></a>
	    <a href="check_record.php"><h1>Check/Update Student Record</h1></a>
	</body>
</html>