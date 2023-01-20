<?php
if(isset($_POST['register']))
{
	$name=$_POST['name'];
	$fname=$_POST['fname'];
	$roll=$_POST['rollno'];
	$trade=$_POST['trade'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$pass=$_POST['pass'];

	$query="INSERT INTO `students` ( `name`, `fname`, `rollno`, `trade`, `email`, `contact`, `password`) VALUES ( '$name', '$fname', '$roll', '$trade', '$email', '$contact', '$pass')";
	
	include 'connection.php';
	
	$querycheck= "select * from students where rollno= '$roll' or email= '$email'";
	
	$checkresult=mysqli_query($con, $querycheck);
	
	if($checkresult)
	{
		if($checkresult=mysqli_fetch_assoc($checkresult))
		{
			echo "<h1>Student Already Registerd with this Roll No./E-mail.</h1>";
		}
		else
		{
	      $result=mysqli_query($con,$query);
	
	      if($result)
	     {
		  echo"<h1>Registration Successful</h1>";
		 }
	     else
	      {
		    echo"Registration Failed";
	      }
	    }
	
	}

   else
    {
	echo"Please Fill and Submit Registration Form <a href='register.php'>Click Here</a>";
	}
}
?>

<a href="index.php">Go To Home</a></br>