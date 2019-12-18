<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>
		Programmes Sportifs
	</title>
	
	<link rel="stylesheet" type="text/css"  href="/css/site.css">
	<link rel="stylesheet" href="/css/header.css">
	<link rel="stylesheet" href="/css/footer.css">


<form method="post" action="Userconnecte.php">
</head>


<body>
		<?php require('include/header.php'); ?>
		<div id="contenu">
			<h1>Programmes Sportifs</h1>
	<?php 
	 try{    
			$bdd = new mysqli('localhost', 'wiss', 'wiss', 'Programmes_Sportifs'); 
			$bdd->set_charset("utf8");
		}
		catch (Exception $e){die('Erreur : ' . $e->getMessage());}


	?>


	 <div>
	    <div>
	       	 <?php 
	       	 $email = $_SESSION['email']; 
					try{    
						$bdd = new mysqli('localhost', 'wiss', 'wiss', 'Programmes_Sportifs'); 
						$bdd->set_charset("utf8");
					}catch (Exception $e){die('Erreur : ' . $e->getMessage());}

			  	$resultat = $bdd->query("select Cs.date_coaching,C.nom,E. nom_exercice  
			  		from Coach C , Coaching_sportif  Cs , Exercice E 
			  		where    
			  		C.numero = Cs.numero_coach 
			  		and  E.id_exercice = Cs.code_exercice 
			  		and Cs.email_adherent = '$email';") 
			  	or die('Erreur SQL !<br>'.$sql3.'<br>'.mysqli_error()) ;

			  	$req = $bdd->query("select Cs.date_coaching,C.nom,E. nom_exercice  
			  		from Coach C , Coaching_sportif  Cs , Exercice E 
			  		where    
			  		C.numero = Cs.numero_coach 
			  		and  E.id_exercice = Cs.code_exercice 
			  		and Cs.email_adherent = '$email';") 
			  	 or die('Erreur SQL !<br>'.$sql3.'<br>'.mysqli_error());

			  	$nb = 0; 
				$i= 0; 
				 

				 while ($row = mysqli_fetch_array($resultat, MYSQLI_NUM)) { $nb += 1 ; }
			
	          if ( $nb != 0 )
	          {
							      $tab[$nb][3];   
							while (  ($row1= mysqli_fetch_array($req, MYSQLI_NUM )) &&  $i  <  $nb )
							{
										 		
										   	 				$tab[$i][0]= $row1[0]; 
										     				$tab[$i][1]= $row1[1];
										      				$tab[$i][2]= $row1[2]; 
									
										      	echo '<div class="coaching"> <p>date :'.$tab[$i][0].'</p>'.
												 	 '<p>nom du coach: '.$tab[$i][1].'</p>'.
												     '<p>nom exercice: '.$tab[$i][2].'$<p>'.
													 '</div>';
												 	
												 		 	$i = $i +1;
							}
			   }else 
					 { 
					 	echo '<div> <p>vous  avez '.$nb.'Coaching<p><div>'; 
					 }  
			
	 
				
	         ?>
	    </div>

	<div>
	       	 <?php 
	       	 $email = $_SESSION['email']; 
					try{    
						$bdd = new mysqli('localhost', 'root', 'user', 'Programmes_Sportifs'); 
						$bdd->set_charset("utf8");
					}catch (Exception $e){die('Erreur : ' . $e->getMessage());}

			  	$resultat = $bdd->query("select Cn.date_coaching, C.nom,  Cd.nom_conseil 
			  							from Coach C , Coaching_nutrition  Cn , Conseil_dietetique Cd 
			  							where  C.numero = Cn.numero_coach   and  Cd.id_conseil = Cn.code_conseil  and Cn.email_adherent = '$email' ;") 
			  	or die('Erreur SQL !<br>'.$sql3.'<br>'.mysqli_error()) ;

			  	$req = $bdd->query("select Cn.date_coaching, C.nom,  Cd.nom_conseil 
			  							from Coach C , Coaching_nutrition  Cn , Conseil_dietetique Cd 
			  							where  C.numero = Cn.numero_coach   and  Cd.id_conseil = Cn.code_conseil  and Cn.email_adherent = '$email' ;") 
			  	 or die('Erreur SQL !<br>'.$sql3.'<br>'.mysqli_error());

			  	$nb = 0; 
				$i= 0; 
				 

				 while ($row = mysqli_fetch_array($resultat, MYSQLI_NUM)) { $nb += 1 ; }
			
	          if ( $nb != 0 )
	          {
							      $tab[$nb][3];   
							while (  ($row1= mysqli_fetch_array($req, MYSQLI_NUM )) &&  $i  <  $nb )
							{
										 		
										   	 				$tab[$i][0]= $row1[0]; 
										     				$tab[$i][1]= $row1[1];
										      				$tab[$i][2]= $row1[2]; 
									
										      	echo '<div class = "coaching"> <p>date :'.$tab[$i][0].'</p>'.
												 	 '<p>nom du coach: '.$tab[$i][1].'</p>'.
												     '<p>nom conseil: '.$tab[$i][2].'$<p>'.
													 '</div>';
												 	
												 		 	$i = $i +1;
							}
			   }else 
					 { 
					 	echo '<div> <p>vous  avez '.$nb.'Coaching<p><div>'; 
					 }  
			
	 
				
	         ?>
	    </div>


	</div>
		<?php require('include/footer.php'); ?>

	</div>

</body>

</html>