
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="css/style_inscription.css">
</head>
	<body>
	<form method="post" action="Inscription.php">

		<div class="formulaire">
		<h1>Inscrivez-vous</h1>
		</div>
		
		<div class="formulaire">
		<label for="prenom">Prénom :</label>
		<input type="text" id="prenom" name="prenom_adherant" required>	
		</div>

		<div class="formulaire">
			<label for="nom">Nom :</label>
			<input type="text" id="nom" name="nom_adherant" required>
		</div>

		<div class="formulaire">
			<label for="email">E-mail :</label>
			<input type="email" id="email" name="email_adherant" required>
		</div>
		
		<div class="formulaire">
			<label for="mdp">Mot de passe :</label>
			<input type="password" id="mdp" name="mdp_adherant" required>
		</div>
		
		<div class="formulaire">
			<label for="age">age :</label>
			<input type="number" id="age" name="age_adherant" required>
		</div>
		
		<div class="formulaire">
			<label for="poids">poids :</label>
			<input type="number" id="poids" name="poids_adherant" required>
		</div>

		<div class="formulaire">
			<label for="taille">taille :</label>
			<input type="number" id="taille" name="taille_adherant" required>
		</div>
		
		<div class="formulaire" id="button">
			<input type="submit" id="envoi" name = "inscrit"  value="inscription">
		</div>
	</form>
<?php
session_start();
   $nom; $prenom; $email; $mdp; $poids; $age; $taille;   
   				if (isset($_POST))
   				{ 
				   	if ( isset($_POST['inscrit']) && $_POST['inscrit'] == 'inscription')
				   {				
					   try{    
							$bdd = new mysqli('localhost', 'wiss', 'wiss', 'Programmes_Sportifs'); 
							$bdd->set_charset("utf8");
						  }
					   catch (Exception $e){ die('Erreur : ' . $e->getMessage());}

					   $nom = $_POST['nom_adherant']; 
					   $prenom =$_POST['prenom_adherant']; 
					   $email = $_POST['email_adherant'];
					   $mdp = md5($_POST['mdp_adherant']);
					   $poids= $_POST['poids_adherant']; 
					   $age =$_POST['age_adherant']; 
					   $taille =$_POST['taille_adherant'];
 						echo $mdp;
					 	$req = "INSERT INTO Adherant(nom,prenom,email,mdp,poids,age,taille) 
						VALUES('$nom','$prenom','$email', '$mdp',$poids,$age,$taille);";

						$result = $bdd-> query($req) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysqli_error());
						
						header('Location:Connexion.php');
						exit();
					}

}
   			


?>       
</body>
</html>
