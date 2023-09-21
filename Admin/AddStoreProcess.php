<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="signup_style.css">

    <?php 
    include '../dbconn.php';
    ?>

</head>

<body>
    <?php
            //recall from RegLog.php from
    //$id = $_POST["StoreID"];
    $Name = $_POST["StoreName"];
    $address = $_POST["StoreAddress"];
    $phoneNumber = $_POST["StorePhoneNum"];
    $mission = $_POST['StoreMission'];
    $category = $_POST['StoreCategory'];
    $OEmail = $_POST["OEmail"];

    //give unique name to the file as file with the same name cant be uploaded
    $file = rand(1000,100000)."-".$_FILES['StorePhoto']['name'];
    $file_loc = $_FILES['StorePhoto']['tmp_name'];
    $file_size = $_FILES['StorePhoto']['size'];
    $file_type = $_FILES['StorePhoto']['type'];
    $folder="photo/";
    
    /* new file size in KB */
    $new_size = $file_size/1024;  
    
    /* make file name in lower case */
    $new_file_name = strtolower($file);
    
    $final_file=str_replace(' ','-',$new_file_name);

    if(move_uploaded_file($file_loc,$folder.$final_file)){

            //INSERT INTO `store`(`StoreID`, `StoreName`, `StoreAddress`, `StorePhoneNum`, `StorePhoto`, `StorePhotoType`, `StorePhotoSize`, `OwnerEmail`, `AdminEmail`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]')

        $sql = "INSERT INTO `store`(`StoreName`, `StoreAddress`, `StorePhoneNum`, `StorePhoto`, `StorePhotoType`, `StorePhotoSize`, `StoreMission`, `StoreCategory`, `OwnerEmail`)
         VALUES ('".$Name."','".$address."','".$phoneNumber."','".$final_file."','".$file_type."','".$file_size."','".$mission."','".$category."','".$OEmail."')";

            mysqli_query($connection,$sql);
            
            echo "File sucessfully upload";

            header('location: store.php');

        } else {
            echo "Error.Please try again";
        }

    //echo $Name, $address, $phoneNumber, $photo, $OEmail, $AEmail;

        

        ?>
    </body>
    </html>