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
// Read data from database table to update
    $rollno=$_SESSION['check'];
    $query="select * from students where rollno=$rollno";
	
	include 'connection.php';
	
	$result=mysqli_query($con, $query);

	if($result)
	{
		if($record=mysqli_fetch_assoc($result))
		{
		 $sn=$record['sn'];		
		 $name=$record['name'];		
		 $fname=$record['fname'];		
		 $rollno=$record['rollno'];		
		 $trade=$record['trade'];		
		 $email=$record['email'];		
		 $contact=$record['contact'];		
		 $password=$record['password'];	
         $image=$record['image'];		 
		}
	}
	
// End Read Data Code

// Update Data Code 

if(isset($_POST['update_record']))
{
	$sn=$_POST['sn'];
	$name=$_POST['name'];
	$fname=$_POST['fname'];
	$rollno=$_POST['rollno'];
	$trade=$_POST['trade'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$password=$_POST['password'];
	

	
	
	include 'connection.php';
	
	$updatequery="UPDATE `students` SET `name`='$name',`fname`='$fname',`rollno`=$rollno,`trade`='$trade',`email`='$email',`contact`=$contact,`password`='$password' WHERE sn=$sn;";
	
	$result=mysqli_query($con,$updatequery);
	if($result)
	{
		echo"<script>alert('Record Updated Successfully.');</script>";
	}
	else
	{
		echo"Record Update Failed";
	}
}



// End Update Date Code 



?>

<html>
	<head>
		<title>Student Record</title>
	</head>

	<body>
		<center>
			<h1>Update Student Record</h1>
		<form action="" method="post" >

		<table>
                <?php echo"<img src='upload/".$image."' border='1' width='150' height='150'></br>"; ?>
				<tr><td>Sn :<td> <input required type="text" name="sn" value="<?php echo $sn; ?>" readonly >
				<tr><td>Name :<td> <input required type="text" name="name" value="<?php echo $name; ?>" >
				<tr><td>Father's Name :<td> <input required type="text" name="fname" value="<?php echo $fname; ?>">
				<tr><td>Roll No. :<td> <input type="text" required name="rollno" value="<?php echo $rollno; ?>">
				<tr><td>Trade :<td> <input type="text" required name="trade" value="<?php echo $trade; ?>">
				<tr><td>Email :<td> <input type="email" name="email" required value="<?php echo $email; ?>">
				<tr><td>Contact :<td> <input type="text" name="contact" required value="<?php echo $contact; ?>">
				<tr><td>Password :<td> <input type="text" name="password" required value="<?php echo $password; ?>">
				<tr><td><input Type ="Reset"><td> <input type="Submit" value="Update" name="update_record">
			
			<a href="check_record.php">Back</a>
		</table>
			
			<a href="adminportal.php"><h3>Admin Portal</h3></a>
			
		</form>
		</center>
	
		
	</body>
</html>