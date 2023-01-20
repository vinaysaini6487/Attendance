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

	if(isset($_POST['upload']))
	{
		 $file= $_FILES['file'];
		 $file_name=$file['name'];
		 $file_arr=explode('.',$file_name);
		 
		 $file_type=$file_arr['1'];
		 $file_size=$file['size'];
		 $file_temp_name=$file['tmp_name'];
		 $name= $_SESSION['user'].$_SESSION['rollno'];
		 $destination="upload/".$name.".".$file_type;
		
		if($file_type=='jpg' or $file_type=='png')
		{
			if($file_size<=1002400)
			{
			 if(move_uploaded_file($file_temp_name,$destination))
			 {
				 echo"<h2>Profile Image Changed</h2>";
				 $roll=$_SESSION['rollno'];
				 $img=$name.".".$file_type;
				 $update= "UPDATE `students` SET `image`='$img' WHERE rollno=$roll";
				 include'connection.php';
				 mysqli_query($con,$update);
			 }
			}
			else{
				echo"please up file upto 100 KB";
			}
		}
		else{
			echo"Only JPG/PNG files are allowed";
		}
		
	}






?>


<html>
	<head>
		<title>File Upload</title>
	</head>
	
	<body>
		<center>
			<table>
				<form action="" method="post" enctype="multipart/form-data">

				<tr><td>Select File :<td>	<input type="file" name="file">
				
				<tr><td><td ><input type="submit" name="upload" value="Upload">
			</table>
		<a href="userprofile.php">Back</a>
		</center>
	
	</body>



</html>