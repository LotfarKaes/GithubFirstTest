<?php
include 'session.php';
$username = $_SESSION['username'];
$userID = $_SESSION['userID'];
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="mycss.css">
		<title>
			This is Sample
		</title>
		</head>
	<body bgcolor="green">
		<div id="body">
			<div id="menu">
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="maintenance.php">Maintenance</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
			</div>

			<div id="content">
				<p><?php echo "Today is".  "  ". date("M/d/y") . " - " . date("l") . ""?></p>
				<p><?php echo "" . date("h:i:sa") . ""?></p>
				<h1>Welcome <?php echo $username;?></h1>
				

			</div>

		
		</div>
		</body>

</html>