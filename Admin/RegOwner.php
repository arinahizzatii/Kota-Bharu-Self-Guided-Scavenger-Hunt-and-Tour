<?php
    //using session to track user information
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Store Owner</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://kit.fontawesome.com/a45dc93085.js" crossorigin="anonymous"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="icon" href="/FYP/images/Logo.png">

    <link rel="stylesheet" type="text/css" href="adminstyle.css">
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
                </div>>

                <!-- userIMG -->
                <div class="user">
                    <img src="/FYP/images/Logo.png" alt="logo" class="image">
                </div>
            </div>
            

            <div class="owner">
                <b>Admin > Register Store Owner</b>
                <p>Admin > Register Store Owner</p>
            </div>


            <!-- add store owner CRUD section starts-->
            <div class="add-owner">

                <?php 
                    if (!empty($errorMessage)) {
                        echo '
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>' . $errorMessage . '</strong>
                            <button type="button" class="close-btn" data-bs-dismiss="alert" area-label="close"></button>
                        </div>';
                    }
                ?>

                <form action="RegOwnerProcess.php" method="POST" enctype="multipart/form-data">
                    <h3>Register store owner</h3>
                    
                    <input name="email" id="email" type="email" class="box" placeholder="Email">
            
                    <input name="Name" id="Name" type="text" class="box" placeholder="Name">
                                
                    <input name="phoneNumber" id="phoneNumber" type="number" class="box" placeholder="Phone Number">
              
                        <!-- using onfocus="(this.type='date')" -->
                    <input name="DOB" id="DOB" type="text" class="box" placeholder="Date of Birth" onfocus="(this.type='date')">

                     <!-- input password -->   
                    <input name="password" id="password" type="password" class="box" placeholder="Password">
                   
                    <!-- input confirmation passowrd -->   
                    <input name="Cpassword" id="Cpassword" type="password" class="box" placeholder="Confirm Password">


                    <input type="submit" value="Register" name="add_owner" class="add-btn">
                    <a class="cancel-btn" href="owner.php">Cancel</a>

                    <?php
                        if (!empty($successMessage)) {
                            echo '
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>' . $successMessage . '</strong>
                                <button type="button" class="close-btn" data-bs-dismiss="alert" area-label="close"></button>
                            </div>';
                        }
                    ?>
                </form>
            </div>
            <!-- add store owner CRUD section ends-->
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

    </script>
</body>
</html>
