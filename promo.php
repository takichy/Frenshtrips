<?php
	session_start();
	$nom = $_SESSION['user'];
	if ($nom == null) {
		header('Location:index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>French Trips</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Destino project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link href="plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_container d-flex flex-row align-items-center justify-content-start">

						<!-- Logo -->
						<div class="logo_container">
							<div class="logo">
								<div>French</div>
								<div>Trips</div>
							</div>
						</div>

						<!-- Main Navigation -->
						<nav class="">
							<ul class="main_nav_list">
								<li class="main_nav_item"><a href="acceuil.php">Acceuil</a></li>
								<li class="main_nav_item"><a href="nos_destinations.php">nos destinations</a></li>
								<li class="main_nav_item"><a href="decouvrez_nous.php">decouvrez nous</a></li>
								<li class="main_nav_item active"><a href="promo.php">Promo</a></li>
								<li class="main_nav_item"><a href="contactez_nous.php">Contactez nous</a></li>
								<li class="main_nav_item" style="color: white;">Salut <?php echo"$nom"; ?> </li>
								<li class="main_nav_item"><a href="Deconnection.php">Deco</a></li>
							</ul>
						</nav>

						<!-- Hamburger -->
						<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>

					</div>
				</div>
			</div>
		</div>
	</header>


	<!-- Menu -->

	<div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<div class="menu_search_form_container">
					<form action="#" id="menu_search_form">
						<input type="search" class="menu_search_input menu_mm">
						<button id="menu_search_submit" class="menu_search_submit" type="submit"><img src="images/search_2.png" alt=""></button>
					</form>
				</div>
				<ul class="menu_list menu_mm">
					<li class="menu_item menu_mm"><a href="acceuil.php">Acceuil</a></li>
					<li class="menu_item menu_mm"><a href="nos_destinations.php">nos destinations</a></li>
					<li class="menu_item menu_mm"><a href="decouvrez_nous.php">decouvrez nous</a></li>
					<li class="menu_item menu_mm"><a href="promo.php">Promo</a></li>
					<li class="menu_item menu_mm"><a href="contactez_nous.php">Contact</a></li>
				</ul>

				<!-- Menu Social -->
				
				<div class="menu_social_container menu_mm">
					<ul class="menu_social menu_mm">
						<li class="menu_social_item menu_mm"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					</ul>
				</div>

				<div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
			</div>
		</div>
	</div>
	
	<!-- Home -->

	<div class="home1">
		<div class="home_background" style=" background-image:url(images/home.jpg)"></div>

		<div class="find">
			<br><br><br><br><br>
			<div class="container">
				<div class="col-12">
					<div class="find_title text-center">Trouvez Votre Voyage</div>
				</div>
				<form action="ChercherVoyage.php" method="POST" id="find_form" class="find_form d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-md-between justify-content-start flex-wrap">
					
					<div class="find_item">
						<div>Destination:</div>
						<input type="text" id="destination" name="destination" class="destination find_input" required="required" placeholder="Destination du voyage">
					</div>
					
					<div class="find_item">
						<div>Durée:</div>
						<input type="text" id="duree" name="duree" class="duree find_input" required="required" placeholder="Durée du voyage">
					</div>
					
					<div class="find_item" style="color: white;">
						<div>Budget Min</div>
						<select name="min_budget" id="min_budget" class="dropdown_item_select find_input">
							<option>&nbsp;</option>
							<option>10</option>
							<option>100</option>
							<option>500</option>
						</select>
					</div>
					
					<div class="find_item">
						<div>Budget Max</div>
						<select name="max_budget" id="max_budget" class="dropdown_item_select find_input" style="color: white;">
							<option>&nbsp;</option>
							<option>100</option>
							<option>500</option>
							<option>1000</option>
						</select>
					</div>

					<input type="submit" name="chercher" value="chercher" class="button find_button">
				
				</form>
			</div> 
		</div>
	</div>






				<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h2>Nos promotions</h2>
					</div>
				</div>
			</div>
		
				<!-- Last -->
	<div class="row"><br><br>

	<div class="last">

		
		<div class="last_background parallax-window" data-parallax="scroll" data-image-src="images/last.jpg" data-speed="0.8"></div>

		<div class="container">
			<div class="row">
				<div class="last_logo"><img src="images/last_logo.png" alt=""></div>
					<?php
					 	require_once('Traitement/model.php');
						getPromo(2019);
					?>
			</div>
		</div>
	</div>
</div>
	<div class="row"><br><br><br><br><br></div>


	<!-- Footer -->
	<footer class="footer">
		<div class="container">
			<div class="logo">
				<div>French</div>
				<div>Trips</div>
				<div class="copyright">Copyright &copy;
					<script>document.write(new Date().getFullYear());</script>
					TOUS DROITS RESERVES | CE SITE EST FABRIQUÉ  
					<i class="fa fa-heart-o" aria-hidden="true"></i> PAR 
					<a href="" target="_blank">French Trips</a>
				</div>
			</div>
		</div>
	</footer>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>