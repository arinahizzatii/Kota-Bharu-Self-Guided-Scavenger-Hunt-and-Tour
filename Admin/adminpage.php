<?php
    //using session to track user information
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

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
                    <a href="adminpage.php" class="active">
                        <span class="icon">
                            <i class="fa-solid fa-house"></i>
                        </span>  
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <!-- admin -->
                <li>
                    <a href="admin.php">
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

        <!-- main -->
        <div class="main">
            <div class="topbar">      
                <div class="toggle"><i class="fas fa-solid fa-bars"></i></div>    
                
                <!--
                <div class="search">
                        <div class="cari">
                            <form action="store.php" method="POST">
                                <input class="searchbox" type="text" name="txtsearch" placeholder="Search...">

                                <button type="submit" name="searchbtn" class="searchbtn"> 
                                    <i class="fas fa-solid fa-magnifying-glass"></i>
                                </button>
                            </form>
                        </div>

                    
                </div>-->

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

            <div class="dashboard">
                <b>dashboard</b>
            </div>

            <!-- cards -->
            <div class="cardBox">

                <!-- Admin card -->
                <div class="card"> 
                    <div>

                        <?php
                            $sql = "SELECT * from admin";
                            $admin = mysqli_query($connection,$sql);

                            if($totaladmin = mysqli_num_rows($admin)){
                                echo '<div class="numbers"> '.$totaladmin.' </div>';
                            }
                            else{
                                echo '<div class="numbers"> 0 </div>';
                            }
                        ?>

                        <div class="cardName">Admin</div>
                    </div>  
                    <div class="iconBox"><i class="fas fa-duotone fa-user"></i></div>
                </div>

                <!-- Player card -->
                <div class="card"> 
                    <div>

                        <?php
                            $sql = "SELECT * from player";
                            $player = mysqli_query($connection,$sql);

                            if($totalplayer = mysqli_num_rows($player)){
                                echo '<div class="numbers"> '.$totalplayer.' </div>';
                            }
                            else{
                                echo '<div class="numbers"> 0 </div>';
                            }
                        ?>

                        <div class="cardName">Players</div>
                    </div>  
                    <div class="iconBox"><i class="fas fa-duotone fa-user-secret"></i></div>
                </div>

                <!-- Store Owner card -->
                <div class="card"> 
                    <div>

                        <?php
                            $sql = "SELECT * from owner";
                            $owner = mysqli_query($connection,$sql);

                            if($totalowner = mysqli_num_rows($owner)){
                                echo '<div class="numbers"> '.$totalowner.' </div>';
                            }
                            else{
                                echo '<div class="numbers"> 0 </div>';
                            }
                        ?>

                        <div class="cardName">Store Owners</div>
                    </div>  
                    <div class="iconBox"><i class="fas fa-solid fa-user-tie"></i></div>
                </div>

                <!-- Stores card -->
                <div class="card"> 
                    <div>
                        
                        <?php
                            $sql = "SELECT * from store";
                            $store = mysqli_query($connection,$sql);

                            if($totalstore = mysqli_num_rows($store)){
                                echo '<div class="numbers"> '.$totalstore.' </div>';
                            }
                            else{
                                echo '<div class="numbers"> 0 </div>';
                            }
                        ?>

                        <div class="cardName">Stores</div>
                    </div>  
                    <div class="iconBox"><i class="fas fa-duotone fa-store"></i></div>
                </div>

                <!-- Checkpoints card -->
                <div class="card"> 
                    <div>

                        <?php
                            $sql = "SELECT * from checkpoint";
                            $checkpoint = mysqli_query($connection,$sql);

                            if($totalcheckpoint = mysqli_num_rows($checkpoint)){
                                echo '<div class="numbers"> '.$totalcheckpoint.' </div>';
                            }
                            else{
                                echo '<div class="numbers"> 0 </div>';
                            }
                        ?>

                        <div class="cardName">Checkpoints</div>
                    </div>  
                    <div class="iconBox"><i class="fas fa-duotone fa-location-dot"></i></div>
                </div>
            </div>

           <!-- <div class="details">
                <div class="recentPlayer">
                    <div class="cardHeader">
                        <h2>Recent Players</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Players</td>
                                <td>Status</td>
                            </tr>
                        </thead>
               
                        <tbody>
                            <tr>
                                <td>arinah@gmail.com</td>
                                <td><span class="statusCompleted">Completed</span></td>
                            </tr>

                            <tr>
                                <td>arinah@gmail.com</td>
                                <td><span class="statusCompleted">Completed</span></td>
                            </tr>

                            <tr>
                                <td>arinah@gmail.com</td>
                                <td><span class="statusCompleted">Completed</span></td>
                            </tr>

                            <tr>
                                <td>arinah@gmail.com</td>
                                <td><span class="statusCompleted">Completed</span></td>
                            </tr>

                            <tr>
                                <td>arinah@gmail.com</td>
                                <td><span class="statusProgress">In Progress</span></td>
                            </tr>

                            <tr>
                                <td>arinah@gmail.com</td>
                                <td><span class="statusProgress">In Progress</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="recentPlayer">
                    <div class="cardHeader">
                        <h2>Recent Players</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Players</td>
                                <td>Status</td>
                            </tr>
                        </thead>
               
                        <tbody>
                            <tr>
                                <td>arinah@gmail.com</td>
                                <td><span class="statusCompleted">Completed</span></td>
                            </tr>

                            <tr>
                                <td>arinah@gmail.com</td>
                                <td><span class="statusProgress">In Progress</span></td>
                            </tr>

                            <tr>
                                <td>arinah@gmail.com</td>
                                <td><span class="statusProgress">In Progress</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>-->
            </div>
        </div>
    </div>

    <script type="text/javascript">
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
    </script>
</body>
</html>
