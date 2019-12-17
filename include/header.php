	<header>
		<div id="banniere">
		</div>
		<nav>
			<div id="information">
			<?php	
				$nom ;  $prenom; 
				try
				{    
					$bdd = new mysqli('localhost', 'wiss', 'wiss', 'Programmes_Sportifs'); 
					$bdd->set_charset("utf8");
				}
				catch (Exception $e)
				{   
					die('Erreur : ' . $e->getMessage());
				}

				
				$email = $_SESSION["email"];

				$resultat = $bdd->query("select nom ,prenom from Adherant where Adherant.email = '$email' ; ");

						
					if ($resultat) 
					{
				      $row = $resultat->fetch_row();
				      $resultat->close();
				      $nom= $row[0]; 
				      $prenom = $row [1];
				    }
				     
				    echo '<p>' . ucfirst($nom) .' '. ucfirst($prenom). '</p>';
			?> 
			</div>
			<ul>
				<a href="/Profil.php">
					<li>Profil</li>
				</a>
				<a href="/Programmes.php">
					<li>Programme</li>
				</a>
				<a href="MesProgrammes.php">
					<li>Mes Programmes</li>
				</a>
				<a href="Coach.php">
					<li>Coach</li>
				</a>
				<a href="#.html">
					<li>Mes Exercices</li>
				</a>
				<a href="#.html">
					<li>Suivi Nutritionnel</li>
				</a>
			</ul>

			<div id="deconnexion">
				<form method="post" action="include/header.php">
					<input id="deconnect" type="submit" value="Deconnexion" name="deconnect">
				</form>
			</div>
		</nav>
	</header>


<?php
	if(isset($_POST['deconnect']) && $_POST['deconnect']=='Deconnexion')
 		{
				session_destroy();
				header('location:/Index.php');
				exit();
		}

?>
