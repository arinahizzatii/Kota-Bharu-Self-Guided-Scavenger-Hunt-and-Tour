<?php
	//using session to track user information
	session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register Admin Process</title>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <link rel="icon" href="/FYP/images/Logo.png">

        <link rel="stylesheet" type="text/css" href="signup_style.css">

        <?php 
            include '../dbconn.php';
        ?>

    </head>

    <body>
        <?php
            //recall from RegAdmin.php from
            $email = $_POST["email"];
            $name = $_POST["Name"];
            $PNumber = $_POST["phoneNumber"];
            $DOB = $_POST["DOB"];
            $password = $_POST["password"];
            $Cpassword = $_POST["Cpassword"];
          
            //Register process for admin

                $query = "Select * from admin WHERE AdminEmail = '".$email."'";
    
                    //execute query in each row of the admin table
                    $result = mysqli_query($connection, $query);
                    $checkRow = mysqli_num_rows($result);
                    $row = mysqli_fetch_array($result);
        
                    if ($row["AdminEmail"] == $email) { 
                    ?>
                        <script>alert("Register failed!\nThe account already exist");</script>
                    <?php
                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=admin.php\"/>";
                    } else {
                        $query = "INSERT INTO `admin`(`AdminEmail`, `Name`, `PhoneNum`, `DOB`, `Password`, `CPassword`) 
                            VALUES ('" .$email. "','" .$name. "','" .$PNumber. "','" .$DOB."','" .$password. "','" .$Cpassword."')";
        
                        //execute query in each row of the owner table
                        mysqli_query($connection, $query);
                        header('location: admin.php');
                    }

        ?>
    </body>
</html>