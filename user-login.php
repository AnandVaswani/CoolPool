<?php
//define constants for connection info
define("MYSQLUSER","root");
define("MYSQLPASS","");
define("HOSTNAME","localhost");
define("MYSQLDB","login");




if (isset($_SESSION['valid_user'])) {
    header("location: loginprocess.php");
}
//make connection to database
function db_connect()
{
	$conn = @new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
	if($conn -> connect_error) {
		die('Connect Error: ' . $conn -> connect_error);
	}
	return $conn;
} 

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $email = $conn -> real_escape_string($_POST['email']);
    $password = $conn -> real_escape_string($_POST['password']);

    //make a query to check if user login successfully
    $sql = "select * from register where email='$email' and password='$password'";
    $result = $conn -> query($sql);
    $numOfRows = $result -> num_rows;
    $row = $result -> fetch_assoc();
    if ($numOfRows == 1) {
        $_SESSION['valid_user'] = $email;
        //get the first word of the name and uppercase the first letter
        $tempStr = trim($row["name"]);
        $tempArr = explode(' ',$tempStr);
        $_SESSION['name'] = ucwords($tempArr[0]);
        header("location: loginprocess.php");
    }else {
        $error = 'Your Login Name or Password is invalid';
    }
}
?>
<html>
<head>
<title> Login Page </title>
<style>
body {
	background: gray;
}
.log-in{
	max-width: 350px;
	background: #2e2e54;
	padding: 40px;
	color: white;
	font-family:sans-serif;
	font-weight:bold;
	letter-spacing:1px;
	margin:auto;
	font-size=18px;
}
input[type=text],input[type=password]{
	width:100%;
	padding:10px;
	margin:10px 0;
}
input[type=submit]{
	width:49%;
	padding:15px;
	margin-top: 30px;
	background:#5454d8;
	border:none;
	color:white;
	font-size:20px;
	font-weight:bold;
	letter-spacing:1px;
	cursor:pointer;
}
span{
	font-size:15px;
}
@media screen and {maz-width:600px) {
	imput[type=submit]{
	width:100%
	}
}
</style>
</head>
<body>
		<div class = "log-in">
	
			<form action="loginprocess.php"  method="POST">			
				<label>Username:</label>
				<input type="text" id="username" name="username" placeholder ="Username" />
				<label>Password:</label>
				<input type="password" id="password" name="password" placeholder= "Password" /> <br>
				<input type="checkbox" name="checkbox"><span>Remember Me</span><br>
				<input type ="submit" value ="Reset">
				<input type="submit" value="Login" />
				
			</form>
		</div>
</body>
</html>
			
			
