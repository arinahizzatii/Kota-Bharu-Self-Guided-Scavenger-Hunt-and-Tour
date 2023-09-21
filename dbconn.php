<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Database Connection</title>
</head>

<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "scavenger_hunt";
		$connection = mysqli_connect($servername, $username, $password, $dbname);

		//check whether the database if connect successfully or not
		if (!$connection) {
			die("Database connection is failed: " . mysqli_connect_error());
		}
	?>
</body>
</html>