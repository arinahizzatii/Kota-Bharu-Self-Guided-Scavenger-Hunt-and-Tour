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
    
    <title>Edit Player Process</title>

    <!-- import database connection file -->
    <?php 
        include("../dbconn.php"); 
    ?>

    <link rel="stylesheet" type="text/css" href="adminpage.css">
</head>
<body>

    <?php
        if ( isset($_POST["edit"])) {
            $email = $_POST["email"];
            $Name = $_POST["Name"];
            $phoneNumber = $_POST["phoneNumber"];
            $DOB = $_POST["DOB"];
            $country = $_POST["country"];


            /*UPDATE `player` SET `PlayerEmail`='[value-1]',`PlayerName`='[value-2]',`PlayerPhoneNum`='[value-3]',
            `PlayerDOB`='[value-4]',`PlayerCountry`='[value-5]',`PlayerPassword`='[value-6]',`CPlayerPassword`='[value-7]',`AdminEmail`='[value-8]' WHERE 1*/

            $sql = "UPDATE player 
                    SET PlayerName = '" . $Name . "',PlayerPhoneNum = '" . $phoneNumber . "',PlayerDOB = '" . $DOB . "',
                    PlayerCountry = '". $country . "'
                    WHERE PlayerEmail = '". $email . "'";

            $query = mysqli_query($connection, $sql) or die(mysqli_error());

            if ($query) {
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=Player.php\"/>";
            } else{
                die(mysqli_error());
            }     
        } else {
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=Player.php\"/>";
        }
    ?>
</body>
</html>
