
<?php
	include_once('server.php');
	if(isset($_GET['del']))
	{
		$id = $_GET['del'];
		$sql= "DELETE FROM licence WHERE id='$id'";
	
		echo "Sorry";
	}
?>