<?php

	
	function getConnexion(){
		$servername = "remotemysql.com:3306";
		$username = "x8bg35vRs7";
		$data_base ="x8bg35vRs7";
		$password = "LCnuGB56YS";

		$conn = new mysqli($servername, $username, $password,$data_base);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		return $conn;
	}
	
	if (!empty($_POST['email'])  || !empty($_POST['mot_de_passe']) ) {

		$email = $_POST['email'];
		$password	= $_POST['mot_de_passe'];
		echo "$email   $password ";
		test($email,$password);
	}
	elseif(!empty($_POST['mail']) || !empty($_POST['password']) || !empty($_POST['sexe']) || !empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['date']) || !empty($_POST['num'])	|| !empty($_POST['CP']) || !empty($_POST['ville'])){

        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $sexe = $_POST['sexe'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $date = $_POST['date'];
        $num = $_POST['num'];
        $cp = $_POST['CP'];
        $ville = $_POST['ville'];

		$con = getConnexion();

		if ($insert = $con->prepare("INSERT INTO users(email, password, sexe, nom, prenom, date_naissance, telephone,  code_postal, ville, confirme_password) VALUES (?,?,?,?,?,?,?,?,?,?)")) {
			$insert->bind_param('ssssssiiss',$mail,$password,$sexe,$nom,$prenom,$date,$num,$cp,$ville,$password);
			$insert->execute();
			header('Location:../index.php');
		}
	}
	else{
		header('Location:../index.php');
	}

	function test($email,$password){
		$con = getConnexion();
		$stat = $con->query("SELECT * FROM users WHERE email = '$email' and password = '$password'");
		
	  	if($stat->num_rows > 0 ){
	  		while($row = $stat->fetch_assoc()) {
	  			session_start();
	  			$_SESSION['user'] = $row['nom'];
	  			$_SESSION['id'] = $row['id_user'];   
		    	header('Location:../acceuil.php');
		    }
		}
		else{
			header('Location:../index.php');
		}
	}

  //  session_start();

/*    function session_active(){
        $user =$_SESSION['user'];
        echo "".$user;
    }

    function session_desactiver(){
        if(!isset($_SESSION["user"])){
            header('location:index.php');
        }
    }
    
    function testexist(){
        if(isset($_SESSION["user"])){
            header('location:acceuil.php');
        }
    }*/

?>