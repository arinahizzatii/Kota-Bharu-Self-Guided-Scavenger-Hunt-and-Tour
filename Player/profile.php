<?php
    //using session to track user information
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scavenger Hunt</title>

    <link rel="icon" href="/FYP/images/Logo.png">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

            <!--Header icons-->
        <div class="icons">
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-user" id="login-btn"></div>
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>

        <div class="navbar">
            <a href="Home.php">Home</a>
            <a onlick="out()" href="../Logout.php">Logout</a>
        </div>

        <!--Login Form-->
        <form action="Home.php" class="login-form">

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

    <?php
        if (isset($_SESSION["log"]) && ($_SESSION["log"] == 1)) {

            $sql = "SELECT * FROM player WHERE PlayerEmail = '".$_SESSION["PEmail"]."'";
            $query = mysqli_query($connection, $sql) or die("Search not found");
            $row = mysqli_fetch_array($query);
    ?>

    <div class="edit-player">
     
        <form action="profileprocess.php" method="POST">

            <h2 class="title">My Profile</h2>

            <!-- input email -->   
            <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input name="email" id="email" type="email" value="<?php echo $row['PlayerEmail']; ?>" readonly>
            </div>

            <!-- input name -->   
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input name="Name" id="Name" type="text" value="<?php echo $row['PlayerName'] ?>">

            </div>
            
            <!-- input phone number -->   
            <div class="input-field">
                <i class="fas fa-phone"></i>
                <input name="phoneNumber" id="phoneNumber" type="number" value="<?php echo $row['PlayerPhoneNum'] ?>">
            </div>
            
            <!-- input date of birth -->   
            <div class="input-field">
                <i class="fas fa-calendar-days"></i>
                <!-- using onfocus="(this.type='date')" -->
                <input name="DOB" id="DOB" type="text" value="<?php echo $row['PlayerDOB'] ?>" onfocus="(this.type='date')">
            </div>

            <!-- input country-->   
            <div class="input-field">
                <i class="fas fa-earth-americas"></i>
                <select name="country" id="country" value="<?php echo $row['PlayerCountry'] ?>"></select>
                    <script>
                    // Array of country names
                    var countries = ["Malaysia", "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", 
                    "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados",
                    "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", 
                    "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Côte d'Ivoire", "Cabo Verde", "Cambodia", "Cameroon", "Canada", 
                    "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo", "Costa Rica","Croatia", "Cuba", 
                    "Cyprus", "Czechia", "Democratic Republic of the Congo", "Denmark", "Djibouti","Dominica", "Dominican Republic", 
                    "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland", 
                    "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau",
                    "Guyana", "Haiti", "Holy See", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", 
                    "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", 
                    "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi",
                    "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", 
                    "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", 
                    "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea", "North Macedonia", "Norway", "Oman", 
                    "Pakistan", "Palau", "Palestine State", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", 
                    "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines",
                    "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", 
                    "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "South Sudan", 
                    "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Tajikistan", "Tanzania", "Thailand", 
                    "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", 
                    "Ukraine", "United Arab Emirates", "United Kingdom", "United States of America", "Uruguay", "Uzbekistan", "Vanuatu", 
                    "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe",];

                    // Get the dropdown element
                    var dropdown = document.getElementById("country");

                    // Populate the dropdown with country options
                    for (var i = 0; i < countries.length; i++) {
                        var option = document.createElement("option");
                        option.text = countries[i];
                        dropdown.add(option);
                    }
                    </script>
            </div>

            <!-- input password -->   
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input name="password" id="password" type="password" value="<?php echo $row['PlayerPassword'] ?>">
            </div>


            <input type="submit" value="Update" name="edit" class="upd-btn">
            <a class="cancel-btn" href="Home.php">Cancel</a>

        </form>                    
</div>

<!-- custom js file link -->
<script src="script.js"></script>

    <?php
        }
        else
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=../Login.php\"/>";
    ?>
</body>
</html>