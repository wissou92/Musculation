<?php 
						session_start();
						try
						{    
							$bdd = new mysqli('localhost', 'wiss', 'wiss', 'Programmes_Sportifs'); 
							$bdd->set_charset("utf8");
						}
						catch (Exception $e){   die('Erreur : ' . $e->getMessage());}	
						
						$resultat = $bdd->query("select nom ,prenom,poids,age,taille from Adherant where Adherant.email = '$_SESSION[email]' ; ");
				
						if ($resultat) 
						{
					      $row = $resultat->fetch_row();
					      $resultat->close();
					      $nom= $row[0]; 
					      $prenom = $row [1];
					      $poids =$row[2]; 
					      $age = $row[3]; 
					      $taille = $row[4];  
					    }
						
					?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Programmes Sportifs</title>
		<link rel="stylesheet" type="text/css" href="css/site.css" >
		<link rel="stylesheet" type="text/css" href="css/header.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css">
		
	</head>
	<body>
		<?php require('include/header.php'); ?>
		<div id="contenu">
			<form method="post" action="">
				<div class="formulaire">
					<h2>Votre Profil </h2>
						
				</div>

				<div class="formulaire">
					<label for="email">E-mail:</label>
					<input type="email" id="email" name="email_adherant"  placeholder="<?php echo $_SESSION["email"];?>">
				</div>

				<div class="formulaire">
					<label for="nom">Nom :</label>
					<input type="nom" id="nom" name="nom_adherant" disabled="oui" placeholder="<?php echo $nom ; ?>">
				</div>
				<div class="formulaire">
					<label for="prenom">Prenom:</label>
					<input type="prenom" id="prenom" name="prenom_adherant" disabled="oui"   placeholder="<?php echo $prenom;?>">
				</div>
					
				<div class="formulaire">
					<label for="mdp">Mot de passe:</label>
					<input type="password" id="mdp" name="mdp_adherant" placeholder="">
				</div>

				<div class="formulaire">
					<label for="age">Age :</label>
					<input type="number" id="age" name="age_adherant"   disabled="oui"  placeholder="<?php echo $age;?>" >
				</div>
				<div class="formulaire">
					<label for="poids">Poids :</label>
					<input type="number" id="poids" name="poids_adherant" placeholder="<?php echo $poids;?>">
				</div>

				<div class="formulaire">
					<label for="taille">Taille :</label>
					<input type="number" id="taille" name="taille_adherant" placeholder="<?php echo $taille;?>">
				</div>

					
				<div class="formulaire" id="button">
					<input  type="submit" id="envoi"   value = "enregistrer" name = "enregistrer" ></input>
				</div>
			</form>


	<?php
		if( isset($_POST))
	   {
	   	 
	    if ($_POST['enregistrer'] ==  'enregistrer' && isset($_POST['enregistrer']))
	    {
	    	try
				{    
						$bdd = new mysqli('localhost', 'root', 'user', 'Programmes_Sportifs'); $bdd->set_charset("utf8");
				}
				catch (Exception $e){   die('Erreur : ' . $e->getMessage());}	
							
		
		 if(!empty($_POST['mdp_adherant'])){  
		  		$mdp = $_POST['mdp_adherant'];	
		  		echo $mdp.'<br>';
		  		echo $_POST['mdp_adherant'];					
		echo $resultat =$bdd -> query (" update Adherant  set Adherant.mdp = '$mdp' where Adherant.email = '$_SESSION[email]' ;")
				or die('Erreur SQL !<br>'.$sql3.'<br>'.mysqli_error());
		  }

		   if(!empty($_POST['email_adherant']))
		  {  
		  		$email = $_POST['email_adherant'];							
				$resultat = $bdd -> query (" update Adherant  set mdp = '$email' where Adherant.email = '$_SESSION[email]';") or die('Erreur SQL !<br>'.$sql3.'<br>'.mysqli_error());
				$_SESSION[email] = $email ;
		  }
		  if(!empty($_POST['poids_adherant']))
		  {  
		  		$poids = $_POST['poids_adherant'];							
				$resultat = $bdd -> query (" update Adherant  set poids = $poids where Adherant.email = '$_SESSION[email]';") or die('Erreur SQL !<br>'.$sql3.'<br>'.mysqli_error());
		  }	
		  if(!empty($_POST['taille_adherant']))
		  {  
		  		$taille = $_POST['taille_adherant'];							
				$resultat = $bdd -> query (" update Adherant  set taille =  $taille  where Adherant.email = '$_SESSION[email]' ;")  or die('Erreur SQL !<br>'.$sql3.'<br>'.mysqli_error());
		  }	
		
		}
	  }
	?>
</div>
	<?php require('include/footer.php'); ?>
	</body>
</html>

