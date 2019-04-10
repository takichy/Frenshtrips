<?php
	$is_user = $_SESSION['id'];

	if (!empty($_POST['iduser']) || !empty($_POST['email']) || !empty($_POST['message']) || !empty($_POST['nom']) || !empty($_POST['sujet']) ) {
		$iduser = $_POST['iduser'];
		$email	= $_POST['email'];
		$message	= $_POST['message'];
		$nom	= $_POST['nom'];
		$sujet	= $_POST['sujet'];

		InsertContact($iduser,$email,$message,$nom,$sujet);
		header('Location:../contactez_nous.php');
	}

	elseif (!empty($_POST['nom_carte']) || !empty($_POST['numero_carte']) || !empty($_POST['carte_ccv']) || !empty($_POST['mois_expiration']) || !empty($_POST['annee_expiration'])) {
		
		$nom_carte = $_POST['nom_carte'];
		$numero_carte	= $_POST['numero_carte'];
		$carte_ccv	= $_POST['carte_ccv'];
		$mois_expiration	= $_POST['mois_expiration'];
		$annee_expiration	= $_POST['annee_expiration'];
		$idVoyage = $_POST['idVoyage'];

		InsertPaiement($nom_carte,$numero_carte,$carte_ccv,$mois_expiration,$annee_expiration,$is_user,$idVoyage);
		header('Location:../acceuil.php');
	}

	function getConnexion(){
		$servername = "127.0.0.1";
		$username = "root";
		$data_base ="frenchtrips";
		$password = "";

		$conn = new mysqli($servername, $username, $password,$data_base);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		return $conn;
	}

	function getTopVoyage($idAnnee){
		$con = getConnexion();
	 	$stat = $con->query("SELECT * FROM voyage WHERE top = true and annee = $idAnnee LIMIT 4");
	 
	  	if($stat->num_rows > 0 ){
		    while($row = $stat->fetch_assoc()) {
		        echo "
		        	<div class=\"popular_item\">
						<a href=\"details.php?id_Voyage=$row[id_voyage]\">
							<img src=\"$row[image]\" alt=\"image by Egzon Bytyqi\">
							<div class=\"popular_item_content\">
								<div class=\"popular_item_price\">Prix $row[prix] €</div>
								<div class=\"popular_item_title\">$row[ville]</div>
							</div>
						</a>	
					</div>
		        ";
		    }
		}
		elseif($stat->num_rows == 0){
			echo "Partie top voyage est vide pour le moment";
		}
	}

	function getDetailsVoyage($idVoyage){
		$con = getConnexion();
	 	$stat = $con->query("SELECT * FROM voyage WHERE id_voyage = $idVoyage");
	 
	  	if($stat->num_rows > 0 ){
		    while($row = $stat->fetch_assoc()) {

		        echo "
					<div class=\"item clearfix rating_5\">
						<div class=\"item_image\"><img src=\"$row[image]\" alt=\"\"></div>
						<div class=\"item_content\">
							<div class=\"item_price\">Prix $row[prix]€</div>
							<div class=\"item_title\">$row[ville], $row[pays]</div>
							<ul>
								<li>$row[nbr_personne] personne</li>
								<li>$row[nbr_nuit] nuits</li>
								<li>$row[star_hotel] star hotel</li>
							</ul>
							<div class=\"rating rating_$row[star_hotel]\" data-rating=\"$row[star_hotel]\">
				";

				for ($i=0; $i < $row['star_hotel']; $i++) {
					echo "<i class=\"fa fa-star\"></i>";
				}
				
					$is_user = $_SESSION['id'];
					echo"
							</div>
							<div class=\"item_text\">
								$row[description]
							</div>

							<a href=\"paiement.php?idVoyage=$row[id_voyage]&idUser=$is_user\"> <button class=\"btn \">Réserver </button>  </a>
						</div>
					</div>
		        ";


		    }
		}
		elseif($stat->num_rows == 0){
			echo "Partie details voyage est vide pour le moment";
		}
	}

	function getOffreSpecial($idAnnee){
		$con = getConnexion();
	 	$stat = $con->query("SELECT * FROM voyage WHERE special_offre = true and annee = $idAnnee LIMIT 5");
	 
	  	if($stat->num_rows > 0 ){
		    while($row = $stat->fetch_assoc()) {
		        echo "
		        	
					<div class=\"owl-item\">
						<div class=\"special_item\">
							<div class=\"special_item_background\"><img src=\"$row[image]\" alt=\"\"></div>
							<div class=\"special_item_content text-center\">
								<div class=\"special_category\">$row[categorie]</div>
								<div class=\"special_title\"><a href=\"details.php?id_Voyage=$row[id_voyage]\">$row[ville] - $row[pays]</a></div>
							</div>
						</div>
					</div>
		        ";
		    }
		}
		elseif($stat->num_rows == 0){
			echo "Partie top voyage est vide pour le moment";
		}
	}

	function getAllVoyage(){
		$con = getConnexion();
	 	$stat = $con->query("SELECT * FROM voyage");
	 
	  	if($stat->num_rows > 0 ){
		    while($row = $stat->fetch_assoc()) {
		        echo "
		        	<div class=\"popular_item\">
						<a href=\"details.php?id_Voyage=$row[id_voyage]\">
							<img style=\" width:262px; height:198px;\" src=\"$row[image]\" alt=\"image by Egzon Bytyqi\">
							<div class=\"popular_item_content\">
								<div class=\"popular_item_price\">Prix $row[prix] €</div>
								<div class=\"popular_item_title\">$row[ville]</div>
							</div>
						</a>	
					</div>
		        ";
		    }
		}
		elseif($stat->num_rows == 0){
			echo "Partie top voyage est vide pour le moment";
		}
	}

	function getPromo($idAnnee){
		$con = getConnexion();
	 	$stat = $con->query("SELECT * FROM voyage where annee = $idAnnee and promo = true ");
	 
	  	if($stat->num_rows > 0 ){
	  		$i = 0;
		    while($row = $stat->fetch_assoc()) {

		    	$description = $row['description']; 
				$morceauDescription = substr($description,0,100);


		    	if ($i==2) {
			    	echo "
			    		<br><br><br><br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br><br><br><br><br><br><br>
						<br>
						<div class=\"col-lg-6 last_col\">
							<div class=\"last_item\">
								<div class=\"last_item_content\">
									<div class=\"last_subtitle\">$row[ville] - $row[pays]</div>
									<div class=\"last_percent\">$row[promo_pourcentage]%</div>
									<div class=\"last_title\"><h3>Offre de dernière minute</h3></div>
									<div class=\"last_text\">$morceauDescription ...</div>
									<div class=\"button last_button\"><a href=\"details.php?id_Voyage=$row[id_voyage]\">voir l'offre</a></div>
								</div>
							</div>
						</div>
			        ";
		    		$i=0;
		    	}else{
			    	echo "
						<div class=\"col-lg-6 last_col\">
							<div class=\"last_item\">
								<div class=\"last_item_content\">
									<div class=\"last_subtitle\">$row[ville] - $row[pays]</div>
									<div class=\"last_percent\">$row[promo_pourcentage]%</div>
									<div class=\"last_title\"><h3>Offre de dernière minute</h3></div>
									<div class=\"last_text\">$morceauDescription ...</div>
									<div class=\"button last_button\"><a href=\"details.php?id_Voyage=$row[id_voyage]\">voir l'offre</a></div>
								</div>
							</div>
						</div>
			        ";
		    	}


		        $i++;
		    }
		}
		elseif($stat->num_rows == 0){
			echo "Partie top voyage est vide pour le moment";
		}
	}

	function InsertContact($iduser,$email,$message,$nom,$sujet){
		$con = getConnexion();

		if ($insert = $con->prepare("INSERT INTO contact(email,id_user,message,nom,sujet) VALUES (?,?,?,?,?)")) {
			$insert->bind_param('sisss',$email,$iduser,$message,$nom,$sujet);
			$insert->execute();
		}
	}

	function ChercherVoyage($destination,$duree,$min_budget,$max_budget){
		$con = getConnexion();

		$stat = $con->query("select * from voyage where ville = '$destination' and ((duree = $duree) or (duree BETWEEN $duree-5 AND $duree+5)) AND (prix BETWEEN $min_budget AND $max_budget)");
	 
	  	if($stat->num_rows > 0 ){
		    while($row = $stat->fetch_assoc()) {
		        echo "
		        	<div class=\"popular_item\">
						<a href=\"details.php?id_Voyage=$row[id_voyage]\">
							<img style=\" width:262px; height:198px;\" src=\"$row[image]\" alt=\"image by Egzon Bytyqi\">
							<div class=\"popular_item_content\">
								<div class=\"popular_item_price\">Prix $row[prix] €</div>
								<div class=\"popular_item_title\">$row[ville]</div>
							</div>
						</a>	
					</div>
		        ";
		    }
		}
		elseif($stat->num_rows == 0){
			echo "Partie top voyage est vide pour le moment";
		}
	}

	function InsertPaiement($nom_carte,$numero_carte,$carte_ccv,$mois_expiration,$annee_expiration,$is_user,$idVoyage){
		
		$con = getConnexion();

		if ($insert = $con->prepare("INSERT INTO paiement(id_voyage,id_user,nom_carte,numero_carte,carte_ccv,mois_expiration,annee_expiration) VALUES (?,?,?,?,?,?,?)")) {
			$insert->bind_param('iissiii',$idVoyage,$is_user,$nom_carte,$numero_carte,$carte_ccv,$mois_expiration,$annee_expiration);
			$insert->execute();
		}
	}

?>