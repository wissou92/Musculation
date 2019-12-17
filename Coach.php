<?php session_start(); ?>
<?php
try {
				$bdd = new mysqli('localhost', 'wiss', 'wiss', 'Programmes_Sportifs');
				$bdd->set_charset("utf-8");
			} 
			catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}

			$compte = $bdd->query("SELECT COUNT(*) as nb_coach FROM Coach;");
			$count = $compte->fetch_row();
		 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Coachs</title>
	<link rel="stylesheet" type="text/css" href="/css/site.css">
	<link rel="stylesheet" type="text/css" href="/css/header.css">
	<link rel="stylesheet" type="text/css" href="/css/footer.css">
</head>
<body>
	<?php require('include/header.php'); ?>
	<div id="contenu">

		<?php
			$resultat = $bdd->query("SELECT * FROM Coach;");
			while($row = $resultat->fetch_row()) {
		?>
			<div class="description">
				<div class="coach">
					<p>
						<strong>Nom:</strong> <?php echo strtoupper($row[1]); ?>
					</p>
					<p>
					<strong>Prenom:</strong> <?php echo ucfirst($row[2]); ?> 
					</p>
					<p>
						<strong>Experience:</strong> <?php echo strtoupper($row[3]); ?>
					</p>
					<p>
						<strong>Note:</strong> <?php echo ucfirst($row[4]); ?> 
					</p>
				</div>
				<div class="photo">
					<?php echo '<style type="text/css"> .photo {
						background:url("/img/coach/'.$row[0].'.jpg");
						background-size: 100%;
						background-position-y: -20px;
					}
					</style>'; ?>
				</div>
			</div>


		<?php
			}
		?>
			
	</div>
	<?php require('include/footer.php'); ?>
</body>
</html>