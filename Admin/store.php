<?php
    //using session to track user information
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Store</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="icon" href="/FYP/images/Logo.png">

    <link rel="stylesheet" type="text/css" href="adminstyle.css">

    <?php include '../dbconn.php'; ?>
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
                    <a href="store.php" class="active">
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
                            <form action="store.php" method="POST">
                                <input class="searchbox" type="text" name="txtsearch" placeholder="Search...">

                                <button type="submit" name="searchbtn" class="searchbtn"> 
                                    <i class="fas fa-solid fa-magnifying-glass"></i>
                                </button>
                            </form>
                        </div>

                        <?php
                            $txtSearch = "";
                            if (isset($_POST['searchbtn'])){
                                $txtSearch = $_POST['txtsearch'];
                            }

                            $sql = "SELECT * FROM store WHERE StoreName LIKE '%" . $txtSearch . "%'";
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

            <div class="store">
                <b>store</b>
            </div>

            <div class="playerBox">

                <a class="owner-btn" href="AddStore.php" role="button">Add Store</a>
                <br><br>

                <table>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Store Address</th>
                        <th>Phone Number</th>
                        <th>Photo</th>
                        <th>Mission</th>
                        <th>Category</th>
                        <th>Owner Email</th>
                        <th>action</th>
                    </tr>

                    <?PHP 
                        

                        $count = 1;

                        //read data each row
                        while ($row= mysqli_fetch_array($query)) {
                    ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $row["StoreName"] ?></td>
                                    <td><?php echo $row["StoreAddress"] ?></td>
                                    <td><?php echo $row["StorePhoneNum"] ?></td>
                                    <td> <img src="<?php echo "photo/".$row["StorePhoto"] ?>" style="height: 50px;" > </td>
                                    <td><?php echo $row["StoreMission"] ?></td>
                                    <td> 
                                        <?php 
                                            if (isset($row['StoreCategory']) && $row['StoreCategory'] == 1) {
                                                echo "<span>Food Hunting</span>";
                                            } else if (isset($row['StoreCategory']) && $row['StoreCategory'] == 2){
                                                echo "<span>Sightseeing</span>";
                                            } else{
                                                echo "<span>Museum</span>";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $row["OwnerEmail"] ?></td>
                                    <td>
                                        <a class="edit" href="EditStore.php?StoreID=<?php echo $row["StoreID"]; ?>"> Edit </a>
                                        <br>
                                        <a onclick="delete()" class="delete" href="DeleteStore.php?StoreID=<?php echo $row["StoreID"]; ?>"> Delete </a>
                                    </td>
                                </tr>
                        <?php

                                $count++;
                            }

                        ?>

                </table>
              
            </div>
            

             <!-- store CRUD section starts

            <section class="add-stores">


                <form action="" method="post" enctype="multipart/form-data">
                <h3>add store</h3>

                <input type="text" name="StoreName" class="box" placeholder="Enter store name" required>
                <input type="text" name="StoreLocation" class="box" placeholder="enter store adress" required>
                <input type="number" name="StorePhoneNum" class="box" placeholder="enter store phone number" required>
                <input type="file" accept="image/jpg, image/jpeg, image/png" class="box" required>
                <input type="submit" value="Add" name="add_store" class="btn">

            </section>
            store CRUD section endss-->
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

        function delete() {
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