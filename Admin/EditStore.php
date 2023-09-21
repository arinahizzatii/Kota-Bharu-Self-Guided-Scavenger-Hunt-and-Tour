<?php
    //using session to track user information
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Store</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://kit.fontawesome.com/a45dc93085.js" crossorigin="anonymous"></script>

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

            <div class="store">
                <b>Store > Edit Store</b>
                <p>Store > Edit Store</p>
            </div>

            <!-- add store owner CRUD section starts-->
            <div class="edit-store">

                <?php 
                    if (isset($_GET['StoreID'])) {
                        $id = $_GET['StoreID'];

                        $sql = "SELECT *
                        FROM store
                        WHERE StoreID = '" .$id. "'";

                        $query = mysqli_query($connection, $sql) or die("Query Fail");
                        $data = mysqli_fetch_array($query);

                    if (!empty($errorMessage)) {
                        echo '
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>' . $errorMessage . '</strong>
                            <button type="button" class="close-btn" data-bs-dismiss="alert" area-label="close"></button>
                        </div>';
                    }
                ?>

                <form action="EditStoreProcess.php" method="post" enctype="multipart/form-data">
                    <h3>Edit Store</h3>

                    <input name="StoreID" id="StoreID" type="text" class="box" placeholder="StoreID" value="<?php echo $data["StoreID"]; ?>" readonly>

                    <input name="Name" id="Name" type="text" class="box" placeholder="Name" value="<?php echo $data["StoreName"]; ?>">

                    <input name="address" id="address" type="text" class="box" placeholder="Address" value="<?php echo $data["StoreAddress"]; ?>">

                    <input name="location" id="location" type="text" class="box" placeholder="location" value="<?php echo $data["StoreLocation"]; ?>">
                                
                    <input name="phoneNumber" id="phoneNumber" type="text" class="box" placeholder="Phone Number" value="<?php echo $data["StorePhoneNum"]; ?>">

                    <input name="mission" id="mission" type="text" class="box" placeholder="Mission" value="<?php echo $data["StoreMission"]; ?>">

                    <select name="StoreCategory" id="StoreCategory" class="box">
                            <option disabled hidden>Select</option>
                            <option value="1" <?php if ($data["StoreCategory"] == 1) echo "selected"; ?>>Food Hunting</option>
                            <option value="2" <?php if ($data["StoreCategory"] == 2) echo "selected"; ?>>Sightseeing</option>
                            <option value="3" <?php if ($data["StoreCategory"] == 3) echo "selected"; ?>>Museum</option>
                    </select>

                    <input type="email" id="OEmail" name="OEmail" class="box" placeholder="Enter Owner Email" value="<?php echo $data["OwnerEmail"]; ?>">

                    <input type="file" accept="image/jpg, image/jpeg, image/png" class="upload-box" value="<?php echo $data["StorePhoto"]; ?>">

                    <?php
                        if (!empty($successMessage)) {
                            echo '
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>' . $successMessage . '</strong>
                                <button type="button" class="close-btn" data-bs-dismiss="alert" area-label="close"></button>
                            </div>';
                        }
                    ?>

                    <input type="submit" value="Update" name="edit" class="upd-btn">
                    <a class="cancel-btn" href="store.php">Cancel</a>
                </form>
                    
            </div>

            <?php
            } else {
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=player.php\"/>";
            }
            ?>
                    
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
