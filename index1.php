<html>
	<head>
	<link rel="stylesheet" type="text/css "href="management.css"/>
	
	<title>Restraunt</title>
	</head>
	<body bgcolor="white">
	<div class="login">
	<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
	<center><br><br><br>

<h1><font color="black">Welcome to Login Page </font><br></h1>



<b> &nbsp <input type="text" id="uname" name="name"  required="true" placeholder="USERNAME"/><br><br>
 &nbsp <input type="password" id="password" name="pass" required="true"placeholder="PASSWORD"/><br><br>

</b><input type="checkbox" id="chk" required="true"/> <u>I accept the term and condition</u><br><br>
<b><input type="submit" id="submit" name="login" value="login" required="true"/><br>
<a href="create1.php">Create Account</a>

</form>
</div>

</body>
</html>
<?php
		if(isset($_POST["Submit"]))
		{
			session_start();
			$con=mysqli_connect("localhost","ajit","123456","restraunt");
			$name=$_POST["username"];
			$pass=$_POST["password"];
			$res=mysqli_query($con,"SELECT * FROM accounts");
			while($row=mysqli_fetch_array($res))
			{
				if($name==$row['user'] and $pass==$row['pass'])
				{
					$_SESSION["user"]=$name;
					$_SESSION["pass"]=$pass;
					if($name=="admin")
						header("Location:admin.php");
					else
						header("Location:book.php");
				}
				else
					echo "fail";
			}
		}
?>