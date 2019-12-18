<?php session_start(); ?>

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

		$email = $_SESSION[email];
			$resultat = $bdd->query
			("select nom, categorie_programme, prix, description, difficulte,avis ,id 
				from Programme ; ");
			$req = $bdd->query
			("select nom, categorie_programme, prix, description, difficulte,avis ,id 
				from Programme ; ");
			$nb =0 ; 
			while ($row = mysqli_fetch_array($req, MYSQLI_NUM)) { $nb += 1 ; }
		    $tab[$nb][6];
			
			for ($it = 0 ; $it< $nb ; $it++)
			{
		    
		      $row = mysqli_fetch_array($resultat, MYSQLI_NUM);
		   	  $tab[$it][0]= $row[0]; 
		      $tab[$it][1]= $row[1];
		      $tab[$it][2]= $row[2]; 
		      $tab[$it][3]= $row[3]; 
		      $tab[$it][4]= $row[4];
		      $tab[$it][6]= $row[6];
		    }

		 ?> 


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>
		Programmes Sportifs
	</title>
	
	<link rel="stylesheet" type="text/css" href="/css/site.css">
	<link rel="stylesheet" type="text/css" href="/css/header.css">
	<link rel="stylesheet" type="text/css" href="/css/footer.css">

</head>

<body>
		<?php require('include/header.php'); ?>
		

		<div  id ="contenu">
	       <h1>Programmes Sportifs</h1>
	       <form method="post" action="Programmes.php" id="general">
	   <?php
	            $i= 0 ; 
	            echo '<div id="contien_prog">';
	            while ($i < 5)
	            { 
	            		echo '<div class="prog">';
		 	           echo '<h3>'.$tab[$i][0].'</h3>';
		 	           echo '<p>Catégorie: '.$tab[$i][1].'</p><p>Prix: '.$tab[$i][2].'$</p>';
		 	           echo '<p>Difficulté: '.$tab[$i][4].'/20</p><p>'.$tab[$i][3].'</p>';
		 	           echo '<input    class= "bt" value="En savoir plus"  type = "submit"  name = "prog'.$i.'" >';
						echo '<input    class= "bt" value="Acheter"  type = "submit"  name = "Acheter'.$i.'" >';
		 	           echo '</div>';
				        $i++;	

	            }
	            echo '</div>';
	         
	         for ( $i= 0; $i< $nb ; $i++){
	            if ( $_POST['prog'.$i]=='En savoir plus')
			{
				$_SESSION['id'] = $tab[$i][6];
				$_SESSION['nom']= $tab[$i][1]; 
				$_SESSION['email'] = $email; 
				header('location:/Exercice.php');
				exit;
			}
			
			if ($_POST['Acheter'.$i]=='Acheter')
			{
			
					 try{    
							$bdd = new mysqli('localhost', 'wiss', 'wiss', 'Programmes_Sportifs'); 
							$bdd->set_charset("utf8");
						}catch (Exception $e){  die('Erreur : ' . $e->getMessage());}
				
					$id = $tab[$i][6]; 
					$verif = $bdd -> query ("select P.id_programme 
					from Pratique P   
					where '$email' = P.email_adherent and $id  = id_programme;");
				
				if( mysqli_num_rows($verif) == 0)
				{
				
					$req = $bdd->query("select CURRENT_DATE() ;") or die('sql erreur');
					$row = $req->fetch_row();
				  	$resultat = 
				 	$bdd->query( "INSERT INTO Pratique (date_debut , email_adherent , id_programme ) 
					VALUES( '$row[0]' , '$_SESSION[email]' , $id); "); 
				}
				  else{  echo '<div>vous avez deja ce Programme</div>';}
				 
			}
			   
			}

	       ?>
	       </form>
	   </div>


<?php require('include/footer.php'); ?>
</body>

</html>
