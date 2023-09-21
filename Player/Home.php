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

				<!--Search funtion

			      <div class="search-form">
			         <div class="cari">
			           <form action="#" method="POST">
			             <input class="searchbox" type="text" name="txtsearch" placeholder="Search...">

			             <button type="submit" name="searchbtn" class="searchbtn"> 
			               <i class="fas fa-solid fa-magnifying-glass"></i>
			           </button>
			       </form>
			   </div>
			</div>-->

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

	<!--home section starts-->
		<section class="home" id="home">

			<div class="content">
				<h3>Ready, Set, Hunt: Get Scavenging!</h3>
				<p> I can’t wait to find the next clue. Scavenger hunt is a game of discovery, 
					a journey of exploration and anticipation. We may not know where it is, but we’re sure to find it.</p>

					<div class="popup" id="popup-1">
						<div class="overlay">
							<div class="content-1">
								<div class="close-btn" onclick="togglePopup()">&times;</div>
								<h1>Categories</h1>
								<a href="foodhunting.php">Food Hunting</a>
								<a href="sightseeing.php">Sightseeing</a>
								<a href="museum.php">Museum</a>	
							</div>
						</div>
						<a class="btn" onclick="togglePopup()">play now</a>
					</div>
			</div>

		</section>
	<!--home section ends-->

	<!--about section starts-->

		<section class="about" id="about">
		
			<div class="row">
				<div class="video-container">
					<video controls src="/FYP/images/kotabharu.mp4" loop autoplay muted></video>
				</div>
			
				<div class="about-content">
					<h3>Tour With Us</h3>
						<p>Discover the enchanting beauty of Kelantan, where rich cultural heritage meets breathtaking natural wonders. 
						   Immerse yourself in the vibrant colors, traditional arts, and warm hospitality of this captivating Malaysian state.</p>
						<p>	Explore ancient temples, indulge in mouthwatering local cuisine, and experience the rhythmic beats of traditional 
							music and dance. From lush rainforests to serene river cruises, Kelantan offers a truly unique and unforgettable 
							travel experience. Come and be enchanted by the charm of Kelantan, where every corner tells a story waiting to be 
							discovered.</p>
				</div>
			<div>

		</section>
	<!--about section ends-->



<!-- custom js file link -->
<script src="script.js"></script>


</body>
</html>