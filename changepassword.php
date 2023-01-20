<?php
session_start();

if(isset($_SESSION['user']))
{
echo '<h1 style="text-align:center">' .$_SESSION['user']."</h1>" ; 	
	
}
else
{
	header('Location:login.php');
}
$user = $_SESSION['user'];

if(isset($_POST['newpass']))
					{
					    $changepassword=$_POST['password'];
						
						$query="UPDATE `students` SET `password`='$changepassword' WHERE `name`='$user' ";
						
						include'connection.php';
						
						mysqli_query($con,$query);
					
					echo "<h2 style=color:darkgreen;>Your Password Changed Successfully.</h2>";
					}




?>
<html>
	<head>
		<title>
			Change Your Password
		</title>
	</head>

	<body>
	<center>
			<h1>Change Your Password</h1>
					<form action="changepassword.php" method="post" >
			<table>
				
				<tr><td>New Password :<td> <input required type="password" id="pass" name="password">
				<td><input type="checkbox" onclick="myFunction()">Show Password
				<tr> <td><input Type ="Reset"><td> <input type="submit" value="Change Password" name="newpass">
			</table>
			</form>
			<a href="userprofile.php">Back</a>
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