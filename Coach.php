<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Coachs</title>
</head>
<body>
	<?php require('include/header.php'); ?>
	<div id="contenu">
		<?php
			try {
				$bdd = new mysqli('localhost', 'wiss', 'wiss', 'Programmes_Sportifs');
				$bdd->set_charset("utf-8");
			} 
			catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}

			$resultat = $bdd->query("SELECT nom, prenom")
		 ?>
	</div>
	<?php require('include/footer.php'); ?>
</body>
</html>