
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="style_inscription.css">
</head>
<body>
	<form method="post" action="Connexion.php">
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
			<button type="submit" id="envoi">Inscription</button>
		</div>
	</form>
<?php
session_start();

  $prenom ;$nom ; $email ; $age ; $poids ; $taille ; $mdp;  
   				if ( isset($_POST))
   				{ 
	
   					if(!empty($_POST['prenom_adherent']))		
   					{
   						   $prenom = $_POST['prenom_adherent'];
   					}
   					if(!empty($_POST['nom_adherent']))		
   					{
   						   $nom = $_POST['nom_adherent'];
   					}
   					if(!empty($_POST['email_adherent']))		
   					{
   						   $email = $_POST['email_adherent'];
   					}
   					 if(!empty($_POST['mdp_adherent']))		
   					{
   						   $mdp = $_POST['mdp_adherent'];
   						 
   					}
   					 if(!empty($_POST['age_adherent']))		
   					{
   						   $age = $_POST['age_adherent'];
   					}
   					 if(!empty($_POST['poids_adherent']))		
   					{
   						   $poids = $_POST['poids_adherent'];
   						  
   					}
   				     if(!empty($_POST['taille_adherent']))		
   					{
   						   $taille = $_POST['taille_adherent'];
   					}
   					
try{    
	$bdd = new mysqli('localhost', 'root', 'user', 'Programmes_Sportifs');
	$bdd->set_charset("utf8");
$req = $bdd->query ("INSERT INTO Adherant(nom,prenom,email,mdp,poids,age,taille) VALUES('$nom' , '$prenom', '$email', '$mdp', '$poids', '$age' , '$taille')");
}

catch (Exception $e)
{   
	die('Erreur : ' . $e->getMessage());
}
  
}
   			


?>       
</body>
</html>
