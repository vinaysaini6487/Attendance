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

<?php
if(isset($_POST['check']))
{
	$rollno=$_POST['rollno'];

	include 'connection.php';
	
	$querycheck= "select * from students where rollno= '$rollno'";
	
	$checkresult=mysqli_query($con, $querycheck);
	
	if($checkresult)
	{
		if($checkresult=mysqli_fetch_assoc($checkresult))
		{
			$_SESSION['check']=$rollno;
			header('Location:update_record.php');
		}
		else
		{
			echo "<script>alert('No Record Found.');</script>";
		}      
    }
}
?>

<html>
	<head>
		<title>
			Check Record
		</title>
	</head>

	<body>
	<center>
			<h1>Check Student Record</h1>
					<form action="check_record.php" method="post" >
			<table>
			    <tr><td>Roll No :<td> <input type="text" required name="rollno"  >
				
				<tr> <td><input Type ="Reset"><td> <input type="submit" value="Check" name="check">
			</table>
			</form>
			<a href="adminportal.php">Back</a>
	</center>

	</body>
</html>