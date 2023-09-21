<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>

	<!-- font awesome cdn link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="icon" href="/FYP/images/Logo.png">
    
	<link rel="stylesheet" type="text/css" href="signup_style.css">
</head>
<body>
    	<!--LOGIN/SIGNUP-->
		<div class="container">

            <div class="signin-signup">

                <form action="LoginProcess.php" method="POST" class="signin-form">

                    <h2 class="title">Login</h2>

                    <!-- input email -->                    
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input name="email" id="email" type="email" placeholder="Email">
                    </div>

                    <!-- input password -->   
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input name="password" id="password" type="password" placeholder="Password">
                    </div>

                    <!-- Input usertype -->   
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                            <select name="userType" id="userType">
                                <option value="option" hidden>Select Category</option>
                                <option value="Player">Player</option>
                                <option value="Admin">Admin</option>
                                <option value="StoreOwner">Store Owner</option>
                            </select>
                    </div>

                    <input type="submit" value="Login" class="btn">

                    <!--Sign up link-->
                    <p class="account-text">Don't have an account? <a href="#" id="sign-up-btn2">Register</a></p>
                    
                </form>

                <!--SIGNUP FORM-->
                <form action="RegisterProcess.php" method="POST" class="signup-form">

                    <h2 class="title">Register</h2>

                    <!-- input email -->   
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input name="email" id="email" type="email" placeholder="Email">
                    </div>

                    <!-- input name -->   
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input name="Name" id="Name" type="text" placeholder="Name">

                    </div>
                    
                    <!-- input phone number -->   
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input name="phoneNumber" id="phoneNumber" type="number" placeholder="Phone Number">
                    </div>
                    
                    <!-- input date of birth -->   
                    <div class="input-field">
                        <i class="fas fa-calendar-days"></i>
                        <!-- using onfocus="(this.type='date')" -->
                        <input name="DOB" id="DOB" type="text"placeholder="Date of Birth" onfocus="(this.type='date')">
                    </div>

                    <!-- input country-->   
                    <div class="input-field">
                        <i class="fas fa-earth-americas"></i>
                        <select name="country" id="country"></select>
                            <script>
                            // Array of country names
                            var countries = ["Country", "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", 
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
                        <input name="password" id="password" type="password" placeholder="Password">
                    </div>

                    <!-- input confirmation passowrd -->   
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input name="Cpassword" id="Cpassword" type="password" placeholder="Confirm Password">
                    </div>

                    <input type="submit" value="Register" class="btn">

                    <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Login</a></p>

                </form>

            </div>

            <!-- input sign in container -->   
            <div class="panels-container">

                <div class="panel left-panel">

                    <div class="content">
                        <h3>Let's Tour with Us</h3>
                        <p>Take only memories, leave only footprints</p>
                        <button class="btn" id="sign-in-btn">Login</button>
                    </div>

                    <img src="images/sign-in.jpg" alt="" class="image">

                </div>

                <!-- input sign up container --> 
                <div class="panel right-panel">

                    <div class="content">
                        <h3>Wanna have an enjoyable trip?</h3>
                        <p>A journey of a thousand miles begins with a single step</p>
                        <button class="btn" id="sign-up-btn">Register</button>
                    </div>

                    <img src="images/signup.jpg" alt="" class="image">

                </div>
            </div>

        </div>

        <!-- js link -->
        <script src="login.js"></script>

</body>
</html>