<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body>

<h1>Ground Floor</h1>
<?php
	session_start();
	if(!isset($_SESSION['user']))
		header("Location:index1.php");
	$con=mysqli_connect("localhost","ajit","123456","restraunt");
	$no=$_GET["no"];
	$_SESSION["no"]=$no;
	$name=$_SESSION['user'];
	$floor=$_GET['floor'];
	$_SESSION["floor"]=$floor;
	mysqli_query($con,"UPDATE $floor SET status='Booked', customer='$name' WHERE table_no=$no");	
	header("Location:order1.php");
?>
</body>
</html>