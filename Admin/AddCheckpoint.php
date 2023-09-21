<?php
    include '../dbconn.php';

    $Cid = "";
    $photo = "";
    $Sid = "";
    $email = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cid = $_POST["cid"];
        $photo = $_POST["photo"];
        $sid = $_POST["sid"];
        $email = $_POST["email"];

        do {
            if (empty($cid) || empty($photo) || empty($sid) || empty($email)) {
                $errorMessage = "All the fields are required";
                break;
            }

            // add store owner to database
            $sql = "INSERT INTO checkpoint (CheckpointID, CUpload, StoreID, PlayerEmail) VALUES ('$cid', '$photo', '$sid', '$email')";
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Invalid query: " . $connection->error;
                break;
            }

            $Cid = "";
            $photo = "";
            $Sid = "";
            $email = "";

            $successMessage = "Store Owner added successfully";

            header("Location: /Admin/checkpoint.php");
            exit;

        } while (false);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Checkpoint</title>

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

                    <div class="search">
                        <div class="cari">
                            <form action="admin.php" method="POST">
                                <input class="searchbox" type="text" name="checkpointsearch" placeholder="Search here">
                                <label type="submit" name="search-btn"> 
                                    <i class="fas fa-solid fa-magnifying-glass"></i>
                                </label>
                            </form>
                        </div>
                    </div>

                <!-- userIMG -->
                <div class="user">
                    <img src="/FYP/images/Logo.png" alt="logo" class="image">
                </div>
            </div>

            <!-- add store owner CRUD section starts-->
            <div class="add-checkpoint">

                <?php 
                    if (!empty($errorMessage)) {
                        echo '
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>' . $errorMessage . '</strong>
                            <button type="button" class="close-btn" data-bs-dismiss="alert" area-label="close"></button>
                        </div>';
                    }
                ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <h3>add Checkpoint</h3>

                    <input type="text" name="StoreLocation" class="box" placeholder="enter store adress" required>
                    <input type="file" accept="image/jpg, image/jpeg, image/png" class="box" required>

                    <input type="submit" value="Add" name="add_owner" class="add-btn">
                    <a class="cancel-btn" href="store.php">Cancel</a>

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
