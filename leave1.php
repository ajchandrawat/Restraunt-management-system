<?php
	session_start();
	$total=0;
	$con=mysqli_connect("localhost","ajit","123456","restraunt");
	foreach ($_SESSION['items'] as $value) 
	{
		$res=mysqli_query($con,"SELECT * FROM menu WHERE id=$value");
		while($row=mysqli_fetch_array($res))
		{
			echo $row['dishname'];
			echo $row['price'];
			echo "<br>";
			$total+=$row['price'];
		}
	}
	echo "Total : $total";
	echo "<p>Please take this reciept and pay at the counter</p>";
	unset($_SESSION['items']);
	$no=$_SESSION["no"];
	$floor=$_SESSION['floor'];
	mysqli_query($con,"UPDATE $floor SET status='Free', customer='' WHERE table_no=$no");	
	session_destroy();
	echo("<a href='index1.php'>Logout</a>")
?>