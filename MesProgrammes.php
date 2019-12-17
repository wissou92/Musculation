<?php 
				   session_start();  $nom ;  $prenom; 
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
				 ?> 

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>
			Mes Programmes
		</title>
		
		<link rel="stylesheet" type="text/css" href="css/site.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css">
		<link rel="stylesheet" type="text/css" href="css/header.css">
	</head>
	<body>
		<?php require('include/header.php'); ?>
		<div id="contenu"> 
			<h1>Programmes Sportifs</h1>

		    <div  class ="main">
		       	 <?php 
					try{    
						$bdd = new mysqli('localhost', 'wiss', 'wiss', 'Programmes_Sportifs'); 
						$bdd->set_charset("utf8");
					}
					catch (Exception $e){
						die('Erreur : ' . $e->getMessage());
					}

				  	$resultat = $bdd->query("select P.nom, P.categorie_programme, P.prix, P.description, P.difficulte, P.avis 
				 						 from Programme P, Pratique  
				 	  				   	 where P.id = Pratique.id_programme 
				 	  				   	 and '$email' = Pratique.email_adherent ; ")   
				  						or die('Erreur SQL !<br>'.$sql3.'<br>'.mysqli_error()) ;

				  	$req = $bdd->query("select P.nom, P.categorie_programme, P.prix, P.description, P.difficulte, P.avis, P.id
				 						 from Programme P, Pratique  
				 	  				   	 where P.id = Pratique.id_programme 
				 	  				   	 and '$email' = Pratique.email_adherent ; ")   
				  						or die('Erreur SQL !<br>'.$sql3.'<br>'.mysqli_error()) ;
					$nb = 0; 
					$i= 0; 
					 

					while ($row = mysqli_fetch_array($resultat, MYSQLI_NUM)) { $nb += 1 ; }
				
		          	if ( $nb != 0 ) {

					    $tab[$nb][6];  			            
					    echo '<div id="contien_prog">';
					    while (  ($row1= mysqli_fetch_array($req, MYSQLI_NUM )) &&  $i  <  $nb ) {
								 			
							$tab[$i][0]= $row1[0]; 
							$tab[$i][1]= $row1[1];
							$tab[$i][2]= $row1[2]; 
							$tab[$i][3]= $row1[3]; 
							$tab[$i][4]= $row1[4];

								 
							echo '<div class="mes_prog"><h3>'.$tab[$i][0].'</h3>'.
							'<p><strong>Catégorie:</strong> '.$tab[$i][1].'</p>'.
							'<p><strong>Prix:</strong> '.$tab[$i][2].'$</p>'.
							'<p><strong>Difficulté:</strong> '.$tab[$i][4].'/20</p>'.
							'<p>'.$tab[$i][3].'</p>'.'<button id='.'"'.$tab[$i][.'"'.'>En savoir plus</button></div>';
					 	
				 		 	$i = $i +1 ; 
					   }
		    		}
		 			
					else { echo '<div id ="prog_msg"> <p>vous  avez '.$nb.' Programmes</p></div>'; }
					echo   '</div>';
				  
		        ?>
		    </div>
		</div>
		
		 <?php require('include/footer.php');?>
	</body>
</html>
