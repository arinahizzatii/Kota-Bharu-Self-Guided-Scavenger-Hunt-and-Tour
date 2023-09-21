

<?php
    //using session to track user information
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Player</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="icon" href="/FYP/images/Logo.png">

    <link rel="stylesheet" type="text/css" href="ownerstyle.css">

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
                        <span class="title">Owner Panel</span>
                    </a>
                </li>

                <!-- dashboard -->
                <li>
                    <a href="ownerpage.php">
                        <span class="icon">
                            <i class="fa-solid fa-house"></i>
                        </span>  
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <!-- player -->
                <li>
                    <a href="ownerplayer.php">
                        <span class="icon">
                            <i class="fas fa-duotone fa-user-secret"></i>
                        </span>  
                        <span class="title">Player</span>
                    </a>
                </li>

                <!-- store owner -->
                <li>
                    <a href="approve.php" class="active">
                        <span class="icon">
                            <i class="fas fa-sharp fa-light fa-check"></i>
                        </span>  
                        <span class="title">Approved</span>
                    </a>
                </li>

                <!-- store -->
                <li>
                    <a href="pending.php">
                        <span class="icon">
                            <i class="fas fa-sharp fa-light fa-clock"></i>
                        </span>  
                        <span class="title">Pending</span>
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
                        <form action="player.php" method="POST">
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

                    $sql = "SELECT * FROM player WHERE PlayerEmail LIKE '%" . $txtSearch . "%'";
                    $query = mysqli_query($connection, $sql) or die("Search not found");

                    ?>
                </div>

                <div class="account">
                    <?php
                    if(isset($_SESSION["log"]) && ($_SESSION["log"]==3)){
                        echo '<p class="Name">' . $_SESSION["OName"].'</p>';
                    }
                    else{
                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=../Reglogin.php\"/>";
                    }
                    ?>
                </div>

                <!-- userIMG -->
                <div class="user">
                    <img src="/FYP/images/Logo.png" alt="logo" class="image">
                </div>
            </div>

            <div class="player">
                <b>Player</b>
            </div>

            <!--
            <section id="status" class="status">
                <div class="container">
                    <a href="pending.php" class="pending"><button class="p-btn"><i class="fa fa-spinner"></i>Pending</button></a>
                    <a href="#" class="approved"><button class="a-btn"><i class="fa fa-check"></i>Approved</button></a>
                </div>
            </section>-->

            <div class="playerBox">

                <table>
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                    </tr>

                    <?PHP 
                    include '../dbconn.php';

                    $sqlP = "SELECT c.CheckpointID, c.CPUpload, c.CPhotoType, c.CPhotoSize, c.StoreID, c.CPStatus, p.PlayerName, p.PlayerPhoneNum, p.PlayerDOB, p.PlayerCountry, p.PlayerStatus, p.AdminEmail, p.PlayerEmail FROM Checkpoint c JOIN Player p ON c.PlayerEmail = p.PlayerEmail WHERE c.CPStatus = 1";

                    $queryP = mysqli_query($connection, $sqlP);
                    $countP = 1;

                    while ($rowP = mysqli_fetch_assoc($queryP)) {

                        ?>
                        <tr>
                            <td><?php echo $countP; ?></td>
                            <td><?php echo $rowP["PlayerEmail"] ?></td>
                            <td><?php echo $rowP["PlayerName"] ?></td>
                            <td><?php echo $rowP["PlayerPhoneNum"] ?></td>
                            <td>
                                <?php 
                                if ($rowP['CPStatus'] == 0) {
                                    echo "Pending";
                                }else{
                                    echo "Approved";
                                }
                                ?>
                            </td>
                    <?php       
                        $countP++; 
                    }
                    ?>
                        </tr>
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
        </script>
    </body>
    </html>