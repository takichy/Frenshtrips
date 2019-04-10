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
<title>Offers</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Destino project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/offers_styles.css">
<link rel="stylesheet" type="text/css" href="styles/offers_responsive.css">
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
								<li class="main_nav_item"><a href="promo.php">Promo</a></li>
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
					<li class="menu_item menu_mm"><a href="#">Acceuil</a></li>
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
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

		</div>
	</div>







				<div class="col">
					<div class="section_title text-center">
						<h2>Paiement</h2>
					</div>
				</div>

	<div class="container">
		<div class="row-fluid">
		      <form action="Traitement/model.php" method="POST">
		      	<input type="hidden" name="idVoyage" value="<?php echo($_GET['idVoyage']) ?>">
		      	
				<div class="form-group">
				    <label  for="nom_carte">Nom du titulaire de la carte</label>
				    <input type="text" id="nom_carte" name="nom_carte" placeholder="" class="form-control" required="required">
				</div>

				<div class="form-group">
				    <label  for="numero_carte">Numéro</label>
				    <input type="text" id="numero_carte" name="numero_carte" placeholder="" class="form-control" required="required">
				</div>


				<div class="form-group">
				    <label  for="username">Date d'expiration</label>
				    <select class="span3" name="mois_expiration">
		                <option></option>
		                <option value="01">01</option>
		                <option value="02">02</option>
		                <option value="03">03</option>
		                <option value="04">04</option>
		                <option value="05">05</option>
		                <option value="06">06</option>
		                <option value="07">07</option>
		                <option value="08">08</option>
		                <option value="09">09</option>
		                <option value="10">10</option>
		                <option value="11">11</option>
		                <option value="12">12</option>
		            </select>

		            <select class="span2" name="annee_expiration">
		            	<option></option>
		                <option value="19">2019</option>
		                <option value="20">2020</option>
		                <option value="21">2021</option>
		                <option value="22">2022</option>
		                <option value="23">2023</option>
		                <option value="24">2024</option>
		                <option value="25">2025</option>
		                <option value="26">2026</option>
		                <option value="27">2027</option>
		                <option value="28">2028</option>
		                <option value="29">2029</option>
		            </select>
				</div>

				<div class="form-group">
				    <label  for="carte_ccv">Carte CVV</label>
				    <input type="text" id="carte_ccv" name="carte_ccv" placeholder="" class="form-control" required="required">
				</div>

				<div class="control-group row col-md-12">
					<div class="form-group">
						<input type="submit" name="Valider" value="Valider Paiement"  class="btn btn-success">
					</div>
				</div>
			</form>
	    </div>
	</div>




<br><br><br><br><br><br><br>




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