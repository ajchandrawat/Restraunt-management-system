<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body>
<h1>Menu</h1>
<?php
	session_start();
	if(!isset($_SESSION['user']))
		header("Location:index1.php");
	if (!isset($_SESSION['items'])) 
	{
		$_SESSION['items']=array();	
	}
	if (isset($_GET['orderid'])) 
	{
		array_push($_SESSION['items'],$_GET['orderid']);
		unset($_GET['orderid']);
	}
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
			echo "<br>";
			$id=$row['id'];
			echo "<a href='order1.php?orderid=$id'>Order</a>";
		}
	}
	echo "<a href='leave1.php'>Leave</a>";
?>

</body>
</html>