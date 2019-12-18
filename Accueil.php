<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title> UVSQ Training </title>
	<link rel="stylesheet" type="text/css" href="/css/site.css">
	<link rel="stylesheet" type="text/css" href="/css/header.css">
	<link rel="stylesheet" type="text/css" href="/css/footer.css">
</head>

<body>
	<?php require("include/header.php") ?>
	<div id="contenu" class="accueil">
		<h1>UVSQ Training</h1>
		<p>Nous sommes content de vous revoir !</p>
		<?php
			try{    
					$bdd = new mysqli('localhost', 'wiss', 'wiss', 'Programmes_Sportifs'); 
					$bdd->set_charset("utf8");
			}
			
			catch (Exception $e){   die('Erreur : ' . $e->getMessage());}

			$resultat = $bdd -> query 
			(" select  Imc.imc
			 from  Imc   
			 where '$prenom'  = Imc.prenom  
			 and   '$nom' = Imc.nom ;")
			or die('Erreur SQL !<br>'.$sql3.'<br>'.mysqli_error());

			echo '<p>';
			 if ($row = $resultat->fetch_row())
			 {
			 	    if ($row[0] >18 && $row[0] < 25 ) echo'votre imc est de : '.round($row[0], 2).' votre corpulence est normale';	
			 	    else if ($row[0] >18 && $row[0] < 25 ) echo'votre imc est de : '.round($row[0], 2).' vous êtes en obésité';
			 	    else if ($row[0] >30 ) echo'votre imc est de : '.round($row[0], 2).'vous etes en surpoids';
			 	    else echo'votre imc est de : '.$row[0].'maigreur';
			 }
			 echo '</p>';

			  
		    
	?>
	</div>
	<?php require("include/footer.php"); ?>

</body>

</html>
