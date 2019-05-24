<?php
//define constants for connection info
define("MYSQLUSER","root");
define("MYSQLPASS","");
define("HOSTNAME","localhost");
define("MYSQLDB","login");


        // check session variable
        if (isset($_SESSION['valid_user']))
        {
			function db_connect()
{
			$conn = @new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
			if($conn -> connect_error) {
			die('Connect Error: ' . $conn -> connect_error);
			}
			return $conn;
} 			$user_check = $_SESSION['valid_user'];

            //make a query to check if a valid user
            $ses_sql = "select name from register where email='$user_check'";
            $result = $conn -> query($ses_sql);
            if ($result -> num_rows == 1) {
                //$row = $result -> fetch_assoc();
                //$name = $row['name'];
                //echo "<p>Welcome <b>$name!</b></p>";
                $name = $_SESSION['name'];
                echo "<p>Welcome <b>$name</b></p>";
                echo "<p><a href=\"logout.php\"></a></p>";
            }
            else {
                echo "<p>Something is wrong.</p>";
                echo "<p><a href=\"user-login.php\" id=\"4\" 
				onClick=\"nav_item_selected(4)\">Login</a></p>";
            }
        }
        else
        {
            echo "<p>You are not logged in.</p>";
            echo "<p><a href=\"user-login.php\" id=\"4\" 
			onClick=\"nav_item_selected(4)\">Login</a></p>";
        }
        ?>
