<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="res.css">
</head>
<body>
<div class="bar">
	<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="admin1.php">Admin Home</a></li>
  <li><a href="manage_table1.php">Manage Tables</a></li>
  <li><a href="manage_items1.php">Manage Items</a></li>
  <li><a href="logout1.php">Logout</a><li>
</ul>
</div>
<h1>Ground Floor</h1>
<?php
	$con=mysqli_connect("localhost","ajit","123456","restraunt");
	$res=mysqli_query($con,"SELECT * FROM gfloor");
	while($table=mysqli_fetch_array($res))
	{
		$no=$table['table_no'];
		echo "Table No. $no : ";
		if($table["status"]=="Booked")
			echo "Booked<br>";
		else
			echo "Free<br>";
	}
	echo "<h1>First Floor</h1>";
	$res=mysqli_query($con,"SELECT * FROM ffloor");
	while($table=mysqli_fetch_array($res))	
	{
		$no=$table['table_no'];
		echo "Table No. $no : ";
		if($table["status"]=="Booked")
			echo "Booked<br>";
		else
			echo "Free<br>";
	}	
?>
</body>
</html>