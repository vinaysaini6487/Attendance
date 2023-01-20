<html>
	<head>
		<title>Student Registration</title>
	</head>

	<body>
		<center>
			<h1>Register Yourself</h1>
		<form action="confirm_register.php" method="post" >
			<table>
				<tr><td>Name :<td> <input required type="text" name="name">
				<tr><td>Father's Name :<td> <input required type="text" name="fname">
				<tr><td>Roll No. :<td> <input type="text" required name="rollno">
				<tr><td>Class/Trade :<td> <input type="text" required name="trade">
				<tr><td>Email :<td> <input type="email" name="email" required>
				<tr><td>Contact :<td> <input type="text" name="contact" required>
				<tr><td>Password :<td> <input type="password" id="pass" name="pass" required>
				<td><input type="checkbox" onclick="myFunction()">Show Password
				<tr><td><input Type ="Reset"><td> <input type="Submit" name="register">
			
			
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