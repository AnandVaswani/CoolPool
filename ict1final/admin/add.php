<html>
<head>
<?php

include 'connection.php';
$name = $_post('user');
$email = $_post('mail');
$pass = $_post('pass');
$sql = " Insert into data (fname, email, pass) values('$name','$email','$pass')";

if($_post['submit'])
	{
	if(mysqli_query($conn, $sql)) 
		{
		echo"Data added successfully";
		
		}
		else
		{
		echo"something went wrong";
		}
	}
?>
</head>

<body>
<form action="add.php" method="post">
	Name: <input type="text" name="user">
	Email: <input type="mail" name="mail">
	Password: <input type="password" name="pass">
	<input type="submit" name="submit" value="send info">
</form>
</body>

</html>