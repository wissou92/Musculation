<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>
		Programmes Sportifs
	</title>
	
	<link rel="stylesheet" type="text/css"  href="Style_Userconnecte.css">
	<section  id = "np">
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

<div > 
<form method="post" action="accueil.php">
	<input id = "dec" type="submit" value="Se déconnecter" name="deconnect" /> </input>
 
 <?php 

 		session_start();
 		if(isset($_POST['deconnect']) AND $_POST['deconnect']=='Se déconnecter'){
		session_destroy();
		header('location:accueil.php');
		exit;
	}
?> 
</form>
</div>

</head>

<body>
	<h1>Programmes Sportifs</h1>

 </section>


</body>
</html>
