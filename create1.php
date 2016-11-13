<!DOCTYPE html>
<html>
<head>
	<title>Restraunt</title>
</head>
<body>
	<div class="login">
	<center>
		<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
		<b> &nbsp <input type="text" name="email"  required="true" placeholder="Email"/><br><br>
		<b> &nbsp <input type="text" id="uname" name="username"  required="true" placeholder="Name"/><br><br>
		<b> &nbsp <input type="text" id="uname" name="name"  required="true" placeholder="USERNAME"/><br><br>	
		<b> &nbsp <input type="Submit" name="Submit" value="Login"/><br><br>
		</form>
		<a href="create1.php">Create Account</a>
	</center>
	</div>
</body>
</html>
<?php
		if(isset($_POST["Submit"]))
		{
			$con=mysqli_connect("localhost","ajit","123456","restraunt");
			$name=$_POST["username"];
			$pass=$_POST["password"];
			$mail=$_POST["email"];
			$phone=$_POST["phone"];
			$res=mysqli_query($con,"INSERT INTO accounts VALUES('$name','$pass','$mail','$phone')");
			header("Location:index1.php");
		}
?>