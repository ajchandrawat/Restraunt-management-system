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
<h1>Menu</h1>
<?php
	$con=mysqli_connect("localhost","ajit","123456","restraunt");
	$res=mysqli_query($con,"SELECT * FROM menu");
	$categories=array();
	while($row=mysqli_fetch_array($res))
	{
		$cat=$row['category'];
		array_push($categories,$cat);
	}
	$categories=array_unique($categories);
	foreach ($categories as $value)
	{
		echo "<h1>$value</h1>";
		$res=mysqli_query($con,"SELECT * FROM menu WHERE category='$value'");
		while($row=mysqli_fetch_array($res))
		{
			$item=$row['dishname'];
			$price=$row['price'];
			echo "$item : $price ";
			echo "<a href='manage_items1.php?dname=$item'> Remove </a>";
			echo "<br>";
		}
		if (isset($_GET['dname']))
		{
			$no=$_GET['dname'];
			mysqli_query($con,"DELETE FROM menu WHERE dishname='$no'");
			header("Location:manage_items1.php");
		}
		$x='PHP_SELF';
		echo "<form action='manage_items1.php?cat=$value' method='POST'>";
		echo "<input type='text' name='dishname' placeholder='Dish Name'>";
		echo "<input type='number' name='price' placeholder='Price'>";
		echo "<input type='Submit' name='Add' value='Add'>";
		echo "</form>";
		if(isset($_POST["Add"]))
		{
			$dish=$_POST['dishname'];
			$price=$_POST['price'];
			$val=$_GET['cat'];
			$res=mysqli_query($con,"INSERT INTO menu VALUES('$dish',$price,'$val')");
			unset($_POST["Add"]);
			header("Location:manage_items1.php");
		}
	}
?>

</body>
</html>