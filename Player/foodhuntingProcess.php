<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Submitted</title>

	<link rel="icon" href="/FYP/images/Logo.png">

	<!-- font awesome cdn link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

	<link rel="icon" href="/FYP/images/Logo.png">

	<link rel="stylesheet" type="text/css" href="Homestyle.css">

	<?php include("../dbconn.php");  ?>

	<title>debug player file</title>
</head>
<body>
	<?php 


	if (isset($_POST["submitPhoto"])) {
		$storeID = $_POST["StoreID"];
		$playerEmail = $_POST["PlayerEmail"];
		$statusEarly = 0;

        //give unique name to the file as file with the same name cant be uploaded
		$file = rand(1000,100000)."-".$_FILES['CPUpload']['name'];
		$file_loc = $_FILES['CPUpload']['tmp_name'];
		$file_size = $_FILES['CPUpload']['size'];
		$file_type = $_FILES['CPUpload']['type'];
		$folder="../Owner/photo/";

		/* new file size in KB */
		$new_size = $file_size/1024;  

		/* make file name in lower case */
		$new_file_name = strtolower($file);

		$final_file=str_replace(' ','-',$new_file_name);

		if (move_uploaded_file($file_loc, $folder.$final_file)) {
			$sql = "INSERT INTO `checkpoint`(`CPUpload`, `CPhotoType`, `CPhotoSize`, `StoreID`, `PlayerEmail`, `CPStatus`) VALUES ('".$final_file."','".$file_type."','".$file_size."','".$storeID."','".$playerEmail."','".$statusEarly."')";

				mysqli_query($connection,$sql);
				?>
				
				<div class="container">
					<div class="pop" id="pop">
						<img src="/FYP/images/tick.png">
						<h2>Submitted!</h2>
						<p>Your photo mission has been submitted</p>
						<a href="foodhunting.php" style="color: #fff; font-weight: bold;"><button onclick="foodhunting.php" type="button"> OK </button></a>
						
					</div>
				</div>

				<?php
				//header("Location: foodhunting.php");
			} else {
				echo "Error.Please try again";
			}
		}
		?>
	</body>
	</html>