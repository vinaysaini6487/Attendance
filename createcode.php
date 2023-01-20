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

<html>

	<body>
		<center>
		
				<?php
					if(isset($_POST['create']))
					{
						$code=$_POST['code'];
						echo"<h1> Today's Code :- ". $code."</h1>";
						
						$query="UPDATE `secretcode` SET `code`='$code'";
						
						include'connection.php';
						
						mysqli_query($con,$query);

					}


				?>
<?php echo "<h4>Date:" . date("d/m/Y");"</h4>"?>
 <a href="logout.php">Log Out</a>
		<h1>
			Create a new Code
		</h1>
			<form action="" method="post">
				<input type="text" required name="code">
				<input type="submit"  name="create" value="Create Code"><br>	
			</form>
		<center>
		<button onclick="startCount()">Start count!</button>
				    <input type="text" id="txt" readonly>
                <button onclick="stopCount()">Stop count!</button>
			<script src="count.js"></script><br>
	<a href="adminportal.php">Back</a>
	</body>

<html>