<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
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
	$tno;
	$con=mysqli_connect("localhost","ajit","123456","restraunt");
	$res=mysqli_query($con,"SELECT * FROM gfloor");
	while($table=mysqli_fetch_array($res))
	{
		$tno=$table['table_no'];
		echo "Table No. $tno ";
		echo "<a href='manage_table1.php?removeg=true&no=$tno'>Remove</a>";
		echo "<br>";
	}
	echo "<a href='manage_table.php?addg=true'>Add Table</a>";
	if (isset($_GET['addg']))
	{
		mysqli_query($con,"INSERT INTO gfloor VALUES($tno+1,'Free','')");
		header("Location:manage_table1.php");
	}
	if (isset($_GET['removeg']))
	{
		$no=$_GET['no'];
		mysqli_query($con,"DELETE FROM gfloor WHERE table_no='$no'");
		header("Location:manage_table1.php");
	}
	echo "<h1>First Floor</h1>";
	$res=mysqli_query($con,"SELECT * FROM ffloor");
	while($table=mysqli_fetch_array($res))
	{
		$tno=$table['table_no'];
		echo "Table No. $tno ";
		echo "<a href='manage_table1.php?removef=true&no=$tno'>Remove</a>";
		echo "<br>";
	}
	echo "<a href='manage_table1.php?addf=true'>Add Table</a>";
	if (isset($_GET['addf']))
	{
		mysqli_query($con,"INSERT INTO ffloor VALUES($tno+1,'Free','')");
		header("Location:manage_table1.php");
	}
	if (isset($_GET['removef']))
	{
		$no=$_GET['no'];
		mysqli_query($con,"DELETE FROM ffloor WHERE table_no='$no'");
		header("Location:manage_table1.php");
	}	
?>
</body>
</html>