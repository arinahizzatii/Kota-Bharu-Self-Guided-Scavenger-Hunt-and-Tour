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
            //recall from RegLog.php from
            $userType = $_POST["userType"];
            $email = $_POST["email"];
            $name = $_POST["Name"];
            $PNumber = $_POST["phoneNumber"];
            $DOB = $_POST["DOB"];
            $country = $_POST["country"];
            $password = $_POST["password"];
            $Cpassword = $_POST["Cpassword"];
          
            //Register process for player
           
                 /* $query = INSERT INTO `player`(`PlayerEmail`, `PlayerName`, `PlayerPhoneNum`, `PlayerDOB`, `PlayerCountry`, `PlayerPassword`, 
                `CPlayerPassword`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')*/
            
                    
                $query = "Select * from player WHERE PlayerEmail = '".$email."'";

                    $result = mysqli_query($connection, $query);
                    $checkRow = mysqli_num_rows($result);
                    $row = mysqli_fetch_array($result);
        
                    if ($row["PlayerEmail"] == $email) { 
                    ?>
                        <script>alert("Register failed!\nThe account already exist");</script>
                    <?php
                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=Reglogin.php\"/>";
                    } else {
                        $query = "INSERT INTO `player`(`PlayerEmail`, `PlayerName`, `PlayerPhoneNum`, `PlayerDOB`, `PlayerCountry`, `PlayerPassword`, `CPlayerPassword`) 
                          VALUES ('" .$email. "','" .$name. "','" .$PNumber. "','" .$DOB. "','" .$country. "','" .$password. "','" .$Cpassword."')";
        
                        //execute query in each row of the player, admin and owner table
                        mysqli_query($connection, $query);
                        header('location: Reglogin.php');
                    }
        ?>
    </body>
</html>