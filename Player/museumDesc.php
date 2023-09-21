<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Mission</title>
  <link rel="icon" href="/FYP/images/Logo.png">

  <!-- font awesome cdn link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <link rel="icon" href="/FYP/images/Logo.png">

  <link rel="stylesheet" type="text/css" href="Homestyle.css">

  <?php include("../dbconn.php");  ?>

  <title>debug player file</title>
</head>
<body>
  
   <?php
        $storeID = $_GET['StoreID']; 
          //extract data from database in table store
        $sql = "SELECT * FROM store WHERE StoreID = '".$storeID."'";

                //execute the sql query
        $query = mysqli_query($connection, $sql) or die("Search not found");
        $row = mysqli_fetch_array($query);
        ?>
        
        <div class="container">
          <div class="pop" id="pop">
            <img src="/FYP/images/tick.png">
            <h2>Mission</h2>
            <p> <?php echo  $row['StoreMission'];?> </p>
            <a href="museum.php" style="color: #fff; font-weight: bold;"><button onclick="museum.php" type="button"> OK </button></a>
            
          </div>
        </div>
  </body>
  </html>