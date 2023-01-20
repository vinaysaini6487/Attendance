<?php

if(isset($_POST['submit']))
{
	$rollno=$_POST['rollno'];
	$code=$_POST['code'];
	$date=date("d/m/Y");
	$querycheck="select * from secretcode";
	include'connection.php';
	$querycheck1= "select * from attendance_data where rollno= '$rollno' and date='$date'";
	
	$checkresult=mysqli_query($con, $querycheck1);
	
	if($checkresult)
	{
		if($checkresult=mysqli_fetch_assoc($checkresult))
		{
			echo "<h1>You have Alreday Submitted Your Attendance.</h1>";
		}
		else
		{
	$result=mysqli_query($con,$querycheck);
	if($result)
	{
		$record=mysqli_fetch_assoc($result);
		$secretcode=$record['code'];
		
		if($code==$secretcode)
		{
			echo"<h1>Code Matched</h1>";
			$date=date("d/m/Y");
			
			$submitquery="INSERT INTO `attendance_data` (`rollno`, `date`, `status`, `code`) VALUES ($rollno, '$date', 'P', '$code')";
			
			$result1=mysqli_query($con,$submitquery);
			if($result1)
			{
					
					echo"<h4>Your Attendance Submitted Successfully.</h4>";
			}
			else
				echo"Not Submitted";
			
			
			
			
		}
		else
		{
			echo"<h3>Incorrect Code</h3>";
		}
		
	}	
		
		
	}
	
	}	
	
}

?>
<a href="logout.php">Logout</a> 
 
<a href="userprofile.php">Back</a>