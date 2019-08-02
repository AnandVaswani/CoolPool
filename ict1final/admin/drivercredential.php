<?php
$db = mysqli_connect('localhost', 'ictatjcu_easys', '123zxc', 'ictatjcu_easys');
	$query = "SELECT * FROM licence";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);	
?>
<html>
<body bgcolor="#E6E6FA">
	<head>
		<title> Admin Panel </title>
		<style>
		body
			{
				background-image: url("Admin.jpg");
				background-size: 100% 100%;
				margin: 0px;
				border: 0px;
			}
		
		#header
			{
				width: 100%;
				height: 120px;
				background: #555;
				color: white;
			}
		#sidebar
			{
				width: 300px;
				height:100%;
				background : white;
				float: left;
			}
		#Data
			{
				height; 700px;
				background: #c0392b;
				color: white;
				font-family: Helvetica;
				font-size: 25px;
			}
		#adminlogo{
			background: white;
			border-radius: 50px;
			}
		ul li
			{
			padding: 20px;
			border-bottom: 2px solid grey;
			}
		ul li:hover
			{
			background: #c0392b;
			color: white;
			}
			body {font-family: Arial, Helvetica, sans-serif;}

.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.navbar a {
  float: right;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 18px;
}
.logo a {
  float: left;
  padding: 8px 30px 0px 30px;  
}

.navbar a:hover {
  background-color: #000;
}

.active {
  background-color: blue;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}
		</style>


	</head>
	<body>
    <div class="navbar">
		<a class="active" href="index.html"><i class="fa fa-fw fa-home"></i> Home</a> 
</div>
	<div id="header">
	<center><img src="logo2.jpg" alt="admin logo" id="admin logo"><br><font size="6">Cool Pool Admin Panel</font>
	</center>
	</div>
	
	<div id="sidebar">
	<ul>
		<li>Home Dashboard</li>
		<li>Trips</li>
		<li> Driver Credentials </li>
		<li> New User</li>
		<li> Orders </li>
		<li> Rewards </li>
		<a href="" target="_blank" style=""color: black; text-decoration: none;"><li> Ride Details </li></a>
	</ul>
	</div>
		<?php 
		if(isset($_POST['submitDeleteBtn'])) { 
			$key=$_POST['keyToDelete'];
			$query = "SELECT * FROM licence where id ='$key' ";
			$result = mysqli_query($db, $query);
			$row = mysqli_fetch_assoc($result);	
			if(mysqli_num_rows($result)>0)
			{ 
			$queryDelete = mysqli_query("DELETE from licence where id='$key' ");?>
				
		
		<?php  
		header('location:drivercredential.php');
		}
		else { 
				echo" Bad Luck";
		 }
		
		}
		?>
		
     <table class="content-table" align="center" border="1px" style="width:600px; line-height:30px;">
		<thead>
			<tr>
			<th>Id</th>
			<th> Name On Licence </th>
			<th> Licence No </th>
			<th> Vehicle No</th>
			<th>Select
			<th> Delete </th>
			</tr>
		</thead>
		<?php
		if($result -> num_rows >0){
			while($row = mysqli_fetch_assoc($result)) {
				?>
				<tr>
				<form action="" method="POST" role="form">
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['licence']; ?></td>
				<td><?php echo $row['plate']; ?></td>
				<td><input type="checkbox" name="keyToDelete" value=<?php echo $row['id'];?>"></td>
				<td><input type="submit" name="submitDeleteBtn" class="btn btn-info"></td>
				</tr>
				<?php
			}
		}
		else
		{
			?>
			<tr>
			<th colspan="5"> No Data Found</th>
			</tr>
			<?php
		}
		?>
			
	</table>
	
	</body>
</html>