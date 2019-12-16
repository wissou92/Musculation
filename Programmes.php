<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>
		Programmes Sportifs
	</title>
	
	<link rel="stylesheet" type="text/css"  href="Style_Programmes.css">
<div class = "header" > 	
<div id = "np">

<?php 
   session_start();  $nom ;  $prenom; 
try
{    
	$bdd = new mysqli('localhost', 'root', 'user', 'Programmes_Sportifs'); 
	$bdd->set_charset("utf8");
}
catch (Exception $e)
{   
	die('Erreur : ' . $e->getMessage());
}

$email = $_SESSION[email];
$resultat = $bdd->query("select nom ,prenom from Adherant where Adherant.email = '$email' ; ");
		
	if ($resultat) 
	{
      $row = $resultat->fetch_row();
      $resultat->close();
      $nom= $row[0]; 
      $prenom = $row [1];
    }
     
    printf("Bienvenue %s  %s ",$nom , $prenom);
 ?> 
</div>
<div id= "pro-dec"> 
<form method="post" action="Programmes.php">
<input id = "b1" type="submit" value="Se déconnecter" name="deconnect" /> </input>
<input id = "b2" type="submit" value = "Profil" name="Profil" /></input>

 <?php
 		session_start();
 		// si je vais dans profil  je detruit pas la session 
 		//jaurais besoin des informations 

 		if (isset($_POST['Profil'])&& $_POST['Profil']=='Profil'){
				$_SESSION["email"] = $email ; 
				header('location:http://localhost/ProjetBDD/Site/Profil.php');
				exit;
		}

 		if(isset($_POST['deconnect']) && $_POST['deconnect']=='Se déconnecter'){
				session_destroy();
				header('location:accueil.php');
				exit;
		}
?> 

</div>
</div>

</head>


<h1>Programmes Sportifs</h1>



<body>

	 <?php 
   session_start();  $nom ;  $prenom; 
try
{    
	$bdd = new mysqli('localhost', 'root', 'user', 'Programmes_Sportifs'); 
	$bdd->set_charset("utf8");
}
catch (Exception $e)
{   
	die('Erreur : ' . $e->getMessage());
}

$email = $_SESSION[email];
$resultat = $bdd->query("select nom, categorie_programme, prix, description, difficulte, avis from Programme ; ");
    $tab[5][5];
	
	// chaque ligne contient un programme 
	// colonne : nom  categorie prix  description difficulté 
	for ($it = 0 ; $it< 5 ; $it++)
	{
    
      $row = mysqli_fetch_array($resultat, MYSQLI_NUM);
   	  $tab[$it][0]= $row[0]; 
      $tab[$it][1]= $row [1];
      $tab[$it][2]= $row[2] ; 
      $tab[$it][3]= $row[3]; 
      $tab[$it][4]= $row[4];
    }

 ?> 


  

  <div  class ="main">


	 <div >

	 <input    id = "bt" value="En savoir plus"  type = submit  name = "m" >
	 <?php   echo '<h3>'.$tab[0][0].'</h3>';
			 echo '<p>Catégorie: '.$tab[0][1].'<p>';
			 echo '<p>Prix: '.$tab[0][2].'$<p>';
			 echo '<p>Difficulté: '.$tab[0][4].'/20<p>';
			 echo '<p>'.$tab[0][3].'<p>';

															if (isset($_POST['m']) && $_POST['m']=='En savoir plus')
															{
																$_SESSION['nom']= $tab[0][1]; 
																$_SESSION['email'] = $email; 
																header('location:http://localhost/ProjetBDD/Site/Exercice.php');
																exit;
															}

													?>     
								 	</div>

		<div>  
			<input    id = "bt" value="En savoir plus"  type = submit  name = "ma">
	 	<?php   echo '<h3>'.$tab[1][0].'</h3>';
	 			echo '<p>Catégorie: '.$tab[1][1].'<p>';
	 			echo '<p>Prix: '.$tab[1][2].'$<p>';
	 			echo '<p>Difficulté: '.$tab[1][4].'/20<p>';
	 			echo '<p>'.$tab[1][3].'<p>';
															if (isset($_POST['ma']) && $_POST['ma']=='En savoir plus')
															{
																$_SESSION['nom']= $tab[1][1]; 
																$_SESSION['email'] = $email; 
																header('location:http://localhost/ProjetBDD/Site/Exercice.php');
																exit;
															}
																	?>

		</div>
	  

	<div >
		 <input    id = "bt" value="En savoir plus"  type = "submit"  name = "ran" >
	 	<?php   echo '<h3>'.$tab[2][0].'</h3>';
	 			echo '<p>Catégorie: '.$tab[2][1].'<p>';
	 			echo '<p>Prix: '.$tab[2][2].'$<p>';
	 			echo '<p>Difficulté: '.$tab[2][4].'/20<p>';
	 			echo '<p>'.$tab[2][3].'<p>';


															if (isset($_POST['ran']) && $_POST['ran']=='En savoir plus')
															{
																$_SESSION['nom']= $tab[2][1]; 
																$_SESSION['email'] = $email; 
																header('location:http://localhost/ProjetBDD/Site/Exercice.php');
																exit;
															}
																	?>
	 	
	 </div> 

	 <div >
	 	<input    id = "bt" value="En savoir plus"  type = "submit"  name = "100jr" >
	 	<?php   echo '<h3>'.$tab[3][0].'</h3>';
	 			echo '<p>Catégorie: '.$tab[3][1].'<p>';
	 			echo '<p>Prix: '.$tab[3][2].'$<p>';
	 			echo '<p>Difficulté: '.$tab[3][4].'/20<p>';
	 			echo '<p>'.$tab[3][3].'<p>';
	 	   
															if (isset($_POST['100j']) && $_POST['100jr']=='En savoir plus')
															{
																$_SESSION['nom']= $tab[3][1]; 
																$_SESSION['email'] = $email; 
																header('location:http://localhost/ProjetBDD/Site/Exercice.php');
																exit;
															}
																	?>
	 	 
	 </div>

	 <div>
	 	<input    id = "bt" value="En savoir plus"  type = "submit"  name = "mf" >
	 	<?php   echo '<h3>'.$tab[4][0].'</h3>';
	 			echo '<p>Catégorie: '.$tab[4][1].'<p3>';
	 			echo '<p>Prix: '.$tab[4][2].'$<p3>';
	 			echo '<p>Difficulté: '.$tab[4][4].'/20<p3>';
	 			echo '<p>'.$tab[4][3].'<p3>';

	 			if (isset($_POST['mf']) && $_POST['mf']=='En savoir plus')
															{
																$_SESSION['nom']= $tab[4][1]; 
																$_SESSION['email'] = $email; 
																header('location:http://localhost/ProjetBDD/Site/Exercice.php');
																exit;
															}


	 	 ?>
	 	
	 	 
	 </div> 
 

</div>
    


</body>
</form>
</html>
