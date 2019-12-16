
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="style_inscription.css">
</head>
<body>
	<form method="post" action="Inscription.php">
		<div class="formulaire">
			<p>Inscrivez-vous</p>
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
			<button type="submit" id="envoi" name = "inscrit"  value="inscription">Envoyer</button>
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
							$bdd = new mysqli('localhost', 'root', 'user', 'Programmes_Sportifs'); $bdd->set_charset("utf8");
						  }
					   catch (Exception $e)
					   						{  
					   							 die('Erreur : ' . $e->getMessage());
					   					    }

					   $nom = $_POST['nom_adherant']; 
					   $prenom =$_POST['prenom_adherant']; 
					   $email = $_POST['email_adherant'];
					   $mdp = password_hash($_POST['mdp_adherant'] ,PASSWORD_DEFAULT);
					   $poids= $_POST['poids_adherant']; 
					   $age =$_POST['age_adherant']; 
					   $taille =$_POST['taille_adherant'];

					   	// cest ca marche mais faut securiser le mdp ca je sais pas faire 

				 	$req = "INSERT INTO Adherant(nom,prenom,email,mdp,poids,age,taille) 
					VALUES('$nom','$prenom','$email', '$mdp',$poids,$age,$taille);";


					    $result = $bdd-> query($req) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysqli_error());

					    
				  
					}

}
   			


?>       
</body>
</html>
