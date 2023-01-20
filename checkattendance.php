<?php
session_start();

if(isset($_SESSION['user']))
{
echo '<h1 style="text-align:center">' .$_SESSION['user']."</h1>" ; 	
	
}
 
?>
<?php echo "<h4>Date:" . date("d/m/Y");"</h4>"?> <br>
<center>
<h1> Attendance Record</h1>
<table border="1" width="20%">

		<tr>
			<th>Date	
			<th>Status
				
			

<?php
	$rollno=$_SESSION['rollno'];
	$checkdata= "Select * from attendance_data where rollno='$rollno'";
	include 'connection.php';
	$result=mysqli_query($con,$checkdata);
	if($record=mysqli_fetch_assoc($result))
	   {
	   $date=$record['date'];
	   $status=$record['status'];
	   
	$query= "select * from attendance_data where date='$date' and status='$status'";
	
	include 'connection.php';
	
	$result1=mysqli_query($con,$query);

	if($result1)
	{
		while($record=mysqli_fetch_assoc($result1))
		{ 
		echo "<tr><td>".$date=$record['date'] ;		
		echo "<td>".$status=$record['status'] ;		
				
		}
	
	}
	   }	
	   
?>
	
</table>
<a href="userprofile.php">Back</a>