<?php
    // Using session to track user information
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

    <link rel="stylesheet" type="text/css" href="Homestyle.css">
</head>
</body>
<?php
    // Import database connection file
include("../dbconn.php");

    // Check if the necessary session variables are set
if (isset($_POST['edit'])) {
        // Get the session variables and store them in local variables
    $email = $_POST['email'];
    $Name = $_POST['Name'];
    $phoneNumber = $_POST['phoneNumber'];
    $DOB = $_POST['DOB'];
    $country = $_POST['country'];
    $password = $_POST['password'];

        // Prepare the SQL statement using prepared statements
    $sql = "UPDATE `player` SET `PlayerEmail`='".$email."',`PlayerName`='".$Name."',`PlayerPhoneNum`='".$phoneNumber."',`PlayerDOB`='".$DOB."',`PlayerCountry`='".$country."',`PlayerPassword`='".$password."' WHERE `PlayerEmail`='".$email."'";

    $query = mysqli_query($connection, $sql) or die(mysqli_error());

    if ($query) {
        echo "<meta http-equiv=\"refresh\" content=\"1;URL=profile.php\"/>";
    } else{
        die(mysqli_error());
    }     
} else {
    echo "<meta http-equiv=\"refresh\" content=\"1;URL=profile.php\"/>";
}
?>
</body>
</html>