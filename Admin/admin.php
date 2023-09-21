<?php
    //using session to track user information
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="icon" href="/FYP/images/Logo.png">
                                                                                                                                                                
    <link rel="stylesheet" type="text/css" href="adminstyle.css">

    <?php 
        include("../dbconn.php"); 
    ?>
    
</head>
<body>
    <!-- SIDEBAR -->
    <div class="container">
        <div class="navigation">
            <ul>
                <!-- admin -->
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="/FYP/images/Logo.png" alt="logo" class="image">
                            <!--<i class="fas fa-duotone fa-map-location-dot"></i>-->
                        </span>  
                        <span class="title">Admin Panel</span>
                    </a>
                </li>

                <!-- dashboard -->
                <li>
                    <a href="adminpage.php">
                        <span class="icon">
                            <i class="fa-solid fa-house"></i>
                        </span>  
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <!-- admin -->
                <li>
                    <a href="admin.php" class="active">
                        <span class="icon">
                            <i class="fas fa-duotone fa-user"></i>
                        </span>  
                        <span class="title">Admin</span>
                    </a>
                </li>

                <!-- player -->
                <li>
                    <a href="player.php">
                        <span class="icon">
                            <i class="fas fa-duotone fa-user-secret"></i>
                        </span>  
                        <span class="title">Player</span>
                    </a>
                </li>

                <!-- store owner -->
                <li>
                    <a href="owner.php">
                        <span class="icon">
                            <i class="fas fa-solid fa-user-tie"></i>
                        </span>  
                        <span class="title">Store Owner</span>
                    </a>
                </li>

                <!-- store -->
                <li>
                    <a href="store.php">
                        <span class="icon">
                            <i class="fas fa-duotone fa-store"></i>
                        </span>  
                        <span class="title">Store</span>
                    </a>
                </li>

                <!-- checkpoints -->
                <li>
                    <a href="checkpoint.php">
                        <span class="icon">
                            <i class="fas fa-duotone fa-location-dot"></i>
                        </span>  
                        <span class="title">Checkpoint</span>
                    </a>
                </li>

                <!-- logout -->
                <li>
                    <a onclick="out()" href="../Logout.php">
                        <span class="icon">
                            <i class="fas fa-duotone fa-arrow-right-from-bracket"></i>
                        </span>  
                        <span class="title">Logout</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="main">
            <div class="topbar">      
                <div class="toggle"><i class="fas fa-solid fa-bars"></i></div> 

                    <!--Search-->
                    <div class="search">
                        <div class="cari">
                            <form action="admin.php" method="POST">
                                <input class="searchbox" type="text" name="txtsearch" placeholder="Search...">

                                <button type="submit" name="searchbtn" class="searchbtn"> 
                                    <i class='fas fa-solid fa-magnifying-glass'></i>
                                </button>
                            </form>
                        </div>

                        <?php
                            $txtSearch = "";
                            if (isset($_POST['searchbtn'])){
                                $txtSearch = $_POST['txtsearch'];
                            }

                            $sql = "SELECT * FROM admin WHERE AdminEmail LIKE '%" . $txtSearch . "%'";
                            $query = mysqli_query($connection, $sql) or die("Search not found");  
                        ?>
                    </div>

                <!-- Account -->
                <div class="account">
                    <?php
                        if(isset($_SESSION["log"]) && ($_SESSION["log"]==2)){
                            echo '<p class="Name">' . $_SESSION["Name"].'</p>';
                        }
                        else{
                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=../Reglogin.php\"/>";
                        }
                    ?>
                    <!--<p>NUR ARINAH IZZATI<p>-->
                </div>

                <!-- userIMG -->
                <div class="user">
                    <img src="/FYP/images/Logo.png" alt="logo" class="image">
                </div>
            </div>

            <div class="owner">
                <b>Admin</b>
            </div>

            <div class="playerBox">

                <a class="owner-btn" href="RegAdmin.php" role="button">Register Admin</a>
                <br><br>

                <table>
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Date of Birth</th>
                        <th>action</th>
                    </tr>

                    <?PHP 
                        include '../dbconn.php';

                        //read all row from database table
                        //$sql = "SELECT * FROM admin";
                        //$result = $connection->query($sql);

                        //if(!$result){
                        //    die("Invalid query: " . $connection->error);
                        //}

                        $count = 1;

                        //read data each row
                        while ($row= mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $row["AdminEmail"] ?></td>
                                    <td><?php echo $row["Name"] ?></td>
                                    <td><?php echo $row["PhoneNum"] ?></td>
                                    <td><?php echo $row["DOB"] ?></td>
                                    <td>
                                        <a class="edit" href="EditAdmin.php?AdminEmail=<?php echo $row["AdminEmail"]; ?>"> Edit </a>
                                        <br>
                                        <a onclick="return Delete()" class="delete" href="DeleteAdmin.php?AdminEmail=<?php echo $row["AdminEmail"]; ?>"> Delete </a>
                                    </td>
                                </tr>
                                <?php

                                $count++;
                            }
                    ?>

                </table>
              
            </div>
            
        </div>
    </div>

    <script>
        // Menu toggle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }
       
        // Add hovered class in selected list item
        let list = document.querySelectorAll('.navigation li');
        function activeLink(){
            list.forEach((item) =>
            item.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        list.forEach((item) =>
        item.addEventListener('mouseover', activeLink));

        function out() {
            var result = confirm('Are you sure to logout?');
            if (result == false) {
                event.preventDefault();
            }
        }

        function Delete() {
            var result = confirm('Are you sure to delete the data?');
            if (result == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>
</html>