<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="/FYP/images/Logo.png">

	<title>Delete Store Owner</title>
</head>

<body>
	<?php 
		include '../dbconn.php';

		if (isset($_GET["OwnerEmail"])) {
            $email = $_GET["OwnerEmail"];

            $sql = "DELETE FROM owner WHERE OwnerEmail ='" . $email . "'";
            $query = mysqli_query($connection, $sql) or die(mysqli_error());

            if($query){
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=owner.php\"/>";
            } else {
                die(mysqli_error());
            }
        } else {
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=owner.php\"/>";
        }
	?> 
</body>
</html>