<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="/FYP/images/Logo.png">

	<title>Delete Admin</title>
</head>

<body>
	<?php 
		include '../dbconn.php';

		if (isset($_GET["AdminEmail"])) {
            $email = $_GET["AdminEmail"];

            $sql = "DELETE FROM admin WHERE AdminEmail ='" . $email . "'";
            $query = mysqli_query($connection, $sql) or die(mysqli_error());

            if($query){
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=admin.php\"/>";
            } else {
                die(mysqli_error());
            }
        } else {
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=admin.php\"/>";
        }
	?> 
</body>
</html>