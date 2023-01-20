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
if(isset($_POST['submit']))
{

	$rollno=$_POST['rollno'];
	if($_POST['submit']=='Delete')
	{
	
		
		$delete="delete from students where rollno=$rollno";
		include'connection.php';
		
		$result=mysqli_query($con,$delete);
		if($result)
		{
			echo"<h1>Record Deleted Roll No.= ". $rollno ."</h1>";
		}
		else{
			echo"delete Failed";
		}
	}
}
?>
 <?php echo "<h4>Date:" . date("d/m/Y"). "</h4>";?>
 <a href="logout.php">Logout</a>

<center>
<h1> Registered Students List </h1> 
</center>
<table border="1" width="100%">

		<tr>
			<th>SN	
			<th>Name
			<th>Father's Name		
			<th>Roll No.		
			<th>Trade		
			<th>Email		
			<th>Contact		
			<th>Password	
            <th>Remove
<?php

	$query="select * from students";
	
	include 'connection.php';
	
	$result=mysqli_query($con, $query);

	if($result)
	{
		$count=mysqli_num_rows($result);
		while($record=mysqli_fetch_assoc($result))
		{
		echo "<tr><td>".$sn=$record['sn'];		
		echo "<td>".$name=$record['name'];		
		echo "<td>".$fname=$record['fname'];		
		echo "<td><form action='' method='post'> <input type='text' name='rollno' style='width:50px' value='".$rollno=$record['rollno']."' readonly>";		
		echo "<td>".$trade=$record['trade'];		
		echo "<td>".$email=$record['email'];		
		$contact=$record['contact'];	
        echo "<td>".str_pad(substr($contact, -4), strlen($contact), '*', STR_PAD_LEFT);		
		//echo "<td>".$pass=$record['password'];	
		echo "<td>********";
		echo "<td><form><input type='submit' value='Delete' name='submit'></form>";
		}
		
	}
	
?>

</table>	<?php echo "<h2>Total No. Of Registration = ".$count;"</h2>"?>		
			<a href="adminportal.php">Back</a>