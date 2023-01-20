<?php
session_start();
if(isset($_POST['login']))
{
	$usermail=$_POST['email'];
	$password=$_POST['password'];
	
	$query="select * from students where email='$usermail' and password='$password'";
	
	include ('connection.php');
	
	$result=mysqli_query($con, $query);
	
	if($result)
	{
		$email="";
	   if ($record=mysqli_fetch_assoc($result))
	   {
	    $username=$record['name'];
	    $roll=$record['rollno'];
		$email=$record['email'];
	   }
	 else
		echo"Login Failed";

   if($usermail==$email)
		{
			$_SESSION['user']=$username;
			$_SESSION['rollno']=$roll;
			header('Location:userprofile.php');
		}
		else
			echo"<h3>Invalid Username/Password</h3>";
	}
}

?>

<html>
	<head>
		<title>
			Login
		</title>
	</head>

	<body>
	<center>
			<h1>Please Login</h1>
					<form action="login.php" method="post" >
			<table>
				<tr><td>Username/Email : <td> <input required type="email" name="email">
				<tr><td>Password :<td> <input required type="password" id="pass" name="password">
				<td><input type="checkbox" onclick="myFunction()">Show Password
				<tr> <td><input Type ="Reset"><td> <input type="submit" value="Login" name="login">
			
			
			</table>
			</form>
			<a href="index.php">Go To Home</a>
	</center>
<script>
function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
	</body>
</html>