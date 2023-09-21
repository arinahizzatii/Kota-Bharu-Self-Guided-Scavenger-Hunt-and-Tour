<?php
	//using session to track user information
	session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <link rel="icon" href="/FYP/images/Logo.png">
        
        <link rel="stylesheet" type="text/css" href="signup_style.css">

        <?php 
            include 'dbconn.php';
        ?>

    </head>
    <body>
        <?php
            //recall from Reglogin.php form
            $email = $_POST["email"];
            $password = $_POST["password"];
            $userType = $_POST["userType"];

            //login process for player
            $query = "";
 
            if ($userType == "Player") {
                $query = "SELECT * FROM player WHERE PlayerEmail = '" . $email . "' AND PlayerPassword = '" . $password . "'";
            } else if ($userType == "Admin") {
                $query = "SELECT * FROM admin WHERE AdminEmail = '" . $email . "' AND Password = '" . $password . "'";
            } else {
                $query = "SELECT * FROM owner WHERE OwnerEmail = '" . $email . "' AND OwnerPassword = '" . $password . "'";
            }

            //execute query in each row of the player, admin and store owner.
            $result = mysqli_query($connection, $query);
            $checkRow = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);

            //login failed (email didn't match with the password), stay at Reglogin.php
            if ($checkRow == 0) {
                ?>
                <!--informing the user the error has occured-->
                <script>alert("Login failed!\nYour password did not match with email or you have not registered");</script>
                <?php
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=Reglogin.php\"/>";
            } else {
                //login success or player
                if ($userType == "Player") {
                    //forward to the player home page
                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=Player/Home.php\"/>";

                    //pass the user information via session
                    $_SESSION["PEmail"] = $row["PlayerEmail"];
                    $_SESSION["PName"] = $row["PlayerName"];
                    $_SESSION["PPhoneNum"] = $row["PlayerPhoneNum"];
                    $_SESSION["PDOB"] = $row["PlayerDOB"];
                    $_SESSION["PCountry"] = $row["PlayerCountry"];
                    $_SESSION["PPassword"] = $row["PlayerPassword"];
                    $_SESSION["log"] = 1;
                } 

                //login success for Admin
                else if ($userType == "Admin"){
                    //forward to the Admin home page
                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=Admin/adminpage.php\"/>";
                    
                    //pass the user information via session
                    $_SESSION["AdminEmail"] = $row["AdminEmail"];
                    $_SESSION["Name"] = $row["Name"];
                    $_SESSION["PhoneNum"] = $row["PhoneNum"];
                    $_SESSION["DOB"] = $row["DOB"];
                    $_SESSION["APassword"] = $row["Password"];
                    $_SESSION["log"] = 2;
                }

                //login success for Store Owner
                else {
                    //forward to the Admin home page
                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=Owner/ownerpage.php\"/>";
                    
                    //pass the user information via session
                    $_SESSION["OEmail"] = $row["OwnerEmail"];
                    $_SESSION["OName"] = $row["OwnerName"];
                    $_SESSION["OPhoneNum"] = $row["OwnerPhoneNum"];
                    $_SESSION["ODOB"] = $row["OwnerDOB"];
                    $_SESSION["OPassword"] = $row["OwnerPassword"];
                    $_SESSION["log"] = 3;
                }
            }
        ?>
    </body>
</html>