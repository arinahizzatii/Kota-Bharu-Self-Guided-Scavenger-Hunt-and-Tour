 <?php
    //using session to track user information
 session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Food Hunting</title>

 	<link rel="icon" href="/FYP/images/Logo.png">

 	<!-- font awesome cdn link -->
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

 	<link rel="icon" href="/FYP/images/Logo.png">

 	<link rel="stylesheet" type="text/css" href="Homestyle.css">

 	<?php include("../dbconn.php");  ?>


 </head>
 <body>

 	<!-- header section -->
 	<header class="header">
 		<a href="#" class="logo">
 			<div class="logoImg">
 				<img src="/FYP/images/Logo.png" alt="logo" class="image">
 			</div>
 			<div class="logoName">
 				<p>
 					Scavenger<span>Hunt</span>
 				</p>
 			</div>
 		</a>

      <!--Search funtion-->

      <div class="search-form">
         <div class="cari">
           <form action="foodhunting.php" method="POST">
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

   $sql = "SELECT * FROM store WHERE StoreName LIKE '%" . $txtSearch . "%' AND StoreCategory = 1";
   $query = mysqli_query($connection, $sql) or die("Search not found");

   ?>
</div>

<!--End of search funtion-->

<!--Header icons-->
<div class="icons">
  <div class="fas fa-search" id="search-btn"></div>
  <div class="fas fa-user" id="login-btn"></div>
  <div class="fas fa-bars" id="menu-btn"></div>
</div>

<div class="navbar">
  <a href="Home.php">Home</a>	
  <a onclick="out()" href="../Logout.php">Logout</a>
</div>

<!--Login Form-->
<form action="foodhunting.php" class="login-form">

  <div class="inputBox">
    <?php
    if(isset($_SESSION["log"]) && ($_SESSION["log"]==1)) {
      echo '<p class="Name">' . $_SESSION["PName"].'</p>';
  }
  else{
      echo "<meta http-equiv=\"refresh\" content=\"2;URL=../Reglogin.php\"/>";
  }
  ?>
</div>

<div class="inputBox">
 <?php
 if(isset($_SESSION["log"]) && ($_SESSION["log"]==1)) {
   echo '<span class="email">' . $_SESSION["PEmail"].'</span>';
}
else{
   echo "<meta http-equiv=\"refresh\" content=\"2;URL=../Reglogin.php\"/>";
}
?>
</div>

<a class="profile" href="profile.php"> Profile </a>
</form>
</header>
<!-- header section ends-->

<div class="food">
  <div class="image">
    <img src="/images/bricklane.png">
</div>
</div>

<!--untuk congrats!-->
<?php 

$sqlC = "SELECT COUNT(*) FROM checkpoint WHERE PlayerEmail = '".$_SESSION['PEmail']."';";
$queryC = mysqli_query($connection, $sqlC);
$rowC = mysqli_fetch_array($queryC)[0];

if ($rowC >= 5) {
  ?>
  <script type="text/javascript">
    // Delay in milliseconds before showing the alert (e.g., 3000 milliseconds = 3 seconds)
    const delayInMilliseconds = 700;

    // Function to show the alert after the specified delay
    function showAlert() {
        window.alert("CONGRATS! You have reached five checkpoints.");
    }

    // Set a timeout to call the showAlert function after the specified delay
    setTimeout(showAlert, delayInMilliseconds);
</script>
<?php
}
?>

<!--CONTENTS-->
<section class="food" id="food">



    <div class="box-container">

       <!--query untuk search-->
       <?php
       while ($row = mysqli_fetch_array($query)) {
        ?>

        <div class="box">
         <div class="image">
           <img src="<?php echo "../Admin/photo/".$row["StorePhoto"]; ?>" alt="cafe picture">
       </div>

       <div class="content">
           <h3><?php echo $row['StoreName']; ?></h3>
           <p>Phone:<span>  <?php echo $row['StorePhoneNum']; ?></span></p>
           <p>Address:<span> <?php echo $row['StoreAddress']; ?></span></p>
           <a target="_blank" class="d-btn" href="<?php echo $row['StoreLocation']; ?>">Direction</a>

           <a href="missionDesc.php?StoreID=<?php echo $row["StoreID"]; ?>" class="d-btn">Mission</a>

           <form action="foodhuntingProcess.php" method="POST" enctype="multipart/form-data">
             <input type="text" name="StoreID" value="<?php echo $row['StoreID']; ?>" hidden>
             <input type="text" name="PlayerEmail" value="<?php echo $_SESSION["PEmail"]; ?>" hidden>

             <p>Submit Photo:</p>
             <input class="upload-box" type="file" id="CPUpload" name="CPUpload"> <br><br>

             <input type="submit" class="s-btn" name="submitPhoto" id="submitPhoto" value="Submit">
          </form>

     </div>
 </div>
 <?php
} 
?>
</div>

</section>

<script src="script.js"></script>
</body>
</html>