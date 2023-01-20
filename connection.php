<?php
$dbhost="localhost";

$dbuser="root";

$dbpass="";

$database="attendance";

$error="Connection Error";


$con=mysqli_connect($dbhost,$dbuser,$dbpass,$database) or die($error);
?>
