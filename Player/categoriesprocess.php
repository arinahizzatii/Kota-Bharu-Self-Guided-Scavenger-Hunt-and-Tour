<?php
    //using session to track user information
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="/FYP/images/Logo.png">
    
    <title>Submit Mission</title>

    <!-- import database connection file -->
    <?php 
        include("../dbconn.php"); 
    ?>

    <link rel="stylesheet" type="text/css" href="Homestyle.css">
</head>
<body>

    <?php
        if ( isset($_POST["submit"])) {
            $email = $_POST["PEmail"];
            $Name = $_POST["PName"];
            $phoneNumber = $_POST["PPhoneNum"];


            //give unique name to the file as file with the same name cant be uploaded
            $file = rand(1000,100000)."-".$_FILES['CUpload']['name'];
            $file_loc = $_FILES['CUpload']['tmp_name'];
            $file_size = $_FILES['CUpload']['size'];
            $file_type = $_FILES['CUpload']['type'];
            $folder="Admin/photo/";


            /* new file size in KB */
            $new_size = $file_size/1024;  
    
            /* make file name in lower case */
            $new_file_name = strtolower($file);
            
            $final_file=str_replace(' ','-',$new_file_name);

            if(move_uploaded_file($file_loc,$folder.$final_file)){

            //INSERT INTO `checkpoint`(`CheckpointID`, `CPUpload`, `CPhotoType`, `CPhotoSize`, `StoreID`, `PlayerEmail`) 
            //VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')

            $sql = "INSERT INTO `checkpoint`(`CheckpointID`, `CPUpload`, `CPhotoType`, `CPhotoSize`, `StoreID`, `PlayerEmail`) 
            VALUES ('".$cid."','".$finalfile."','".$file_type."','".$file_size."','".$file_type."','".$cid."','".$email."')";

            mysqli_query($connection,$sql);
            
            echo "File sucessfully upload";
            
            header('location: foodhunting.php');

            } else {
                echo "Error.Please try again";
            }

            if ($_POST['submit']) {
                if (mail ($final_file)) {
                    echo '<p>Your message has been sent!</p>';
                } else {
                    echo '<p>Something went wrong, go back and try again!</p>';
                }
            }
            

            //echo $Name, $address, $phoneNumber, $photo, $OEmail, $AEmail;

            if ($query) {
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=foodhunting.php\"/>";
            } else{
                die(mysqli_error());
            }     
        } else {
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=foodhunting.php\"/>";
        }
    ?>
</body>
</html>
