<?php
ini_set('display_error','1');
//define constants for connection info
define("MYSQLUSER","root");
define("MYSQLPASS","");
define("HOSTNAME","localhost");
define("MYSQLDB","login");

//make connection to database
function db_connect()
{
	$conn = @new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
	if($conn -> connect_error) {
		die('Connect Error: ' . $conn -> connect_error);
	}
	return $conn;
} 

if(isset($_POST['name'], $_POST['phone'],$_POST['email'], $_POST['password'], $_POST['confirmpassword'],$_POST['city'])) {
    //make the database connection
  $conn  = db_connect();
    	$name = $conn -> real_escape_string($_POST['name']);
		$phone = $conn -> real_escape_string($_POST['phone']);
    	$email = $conn -> real_escape_string($_POST['email']);
		$password = $conn -> real_escape_string($_POST['password']);
    	$confirmpassword = $conn -> real_escape_string($_POST['confirmpassword']);
		$city = $conn -> real_escape_string($_POST['city']);
    //create an insert query
    $sql = "insert into register (name, phone,email,password,confirmpassword, city)  VALUES ('$name', '$phone', '$email', '$password', '$confirmpassword','$city')";
    //execute the query
	 if($conn -> query($sql))
    {
	
        echo "<h1>Welcome to Queensland Car Rental</h1>";
        
    }
    $conn -> close();
}
else {
	
	
	
        echo "<h1>Welcome to ABC School</h1>";
       
	
    die("Input error");
}
?>