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
    
    <title>Edit Store Process</title>

    <!-- import database connection file -->
    <?php 
        include("../dbconn.php"); 
    ?>

    <link rel="stylesheet" type="text/css" href="adminpage.css">
</head>
<body>

    <?php
        if ( isset($_POST["edit"])) {
            $StoreID = $_POST["StoreID"];
            $Name = $_POST["Name"];
            $address = $_POST["address"];
            $location = $_POST["location"];
            $phoneNumber = $_POST["phoneNumber"];
            $mission = $_POST["mission"];
            $category = $_POST["StoreCategory"];
            $OEmail = $_POST['OEmail'];
            


            /*UPDATE `store` SET `StoreID`='[value-1]',`StoreName`='[value-2]',`StoreAddress`='[value-3]',`StorePhoneNum`='[value-4]',`OwnerEmail`='[value-5]',`AdminEmail`='[value-6]' WHERE 1*/

            $sql = "UPDATE store 
                    SET StoreName = '" . $Name . "', StoreAddress = '" . $address . "',StoreLocation = '" . $location . "',StorePhoneNum = '" . $phoneNumber . "',StoreMission = '" . $mission . "', StoreCategory = '" . $category . "', OwnerEmail = '". $OEmail . "'
                    WHERE StoreID = '". $StoreID . "'";

            $query = mysqli_query($connection, $sql) or die(mysqli_error());

            if ($query) {
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=store.php\"/>";
            } else{
                die(mysqli_error());
            }     
        } else {
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=store.php\"/>";
        }
    ?>
</body>
</html>
