<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="/FYP/images/Logo.png">

	<title>Logout</title>

</head>

<body>
	<?php
		session_start();

		//for player session
		if ($_SESSION["log"] == 1) {
			unset($_SESSION["PEmail"]);
			unset($_SESSION["PName"]);
			unset($_SESSION["PPhoneNum"]);
			unset($_SESSION["PDOB"]);
			unset($_SESSION["PCountry"]);
		}
		
		//for admin session
		else if ($_SESSION["log"] == 2){
			unset($_SESSION["AdminEmail"]);
			unset($_SESSION["Name"]);
			unset($_SESSION["PhoneNum"]);
			unset($_SESSION["DOB"]);
			unset($_SESSION["Country"]);

		} else {
			//for owner session
			unset($_SESSION["OEmail"]);
			unset($_SESSION["OName"]);
			unset($_SESSION["OPhoneNum"]);
			unset($_SESSION["ODOB"]);
			unset($_SESSION["OCountry"]);
		}

		//unset all the log
		unset($_SESSION['log']);

		//destro all the session
		session_destroy();

		//direct to the login page
		echo "<meta http-equiv=\"refresh\" content=\"2;url=Reglogin.php\">";
	?>
</body>
</html>