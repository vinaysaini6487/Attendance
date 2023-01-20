<?php
session_start();
if(isset($_POST['login']))
{
	 $admin_id=$_POST['email'];
	 $password=$_POST['password'];
	
	 $query="SELECT * FROM `admin` WHERE email='$admin_id' and password='$password'";
	
	include ('connection.php');
	
	$result=mysqli_query($con, $query);
	
	if($result)
	{
		$admin_id1="";
	   if ($record=mysqli_fetch_assoc($result))
	   {
	   $admin_id1=$record['email'];
	   $password=$record['password'];
	   }
	 else
		echo"Login Failed";

   if($admin_id==$admin_id1)
		{
			$_SESSION['email']=$admin_id;
			$_SESSION['password']=$password;
			header('Location:adminportal.php');
		}
		else
	   echo"<h3>Invalid Id/Password</h3>"; }
}

?>
 <?php echo "<h4>Date:" . date("d/m/Y");"</h4>"?>

<html>
	<head>
		<title>
			Admin Login
		</title>
	</head>

	<body>
	<center>
			<h1>Admin Login</h1>
					<form action="admin.php" method="post" >
			<table>
				<tr><td>Admin Id : <td> <input required type="email" name="email">
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