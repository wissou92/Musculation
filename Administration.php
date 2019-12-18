<?php session_start(); ?>

<?php
	$select = $_GET['select'];
?>

<?php
	if(isset($_POST)) {
		try {
			$bdd = $bdd = new mysqli('localhost', 'wiss', 'wiss', 'Programmes_Sportifs'); 
					$bdd->set_charset("utf8");
		}
		catch (Exception $e) {   
			die('Erreur : ' . $e->getMessage());
		}
		


		if($select == 'coach' and $_POST['submit_coach'] == 'Ajouter') {
			$nom = $_POST['nom_coach'];
			$prenom = $_POST['prenom_coach'];
			$experience = $_POST['experience'];
			$note = $_POST['note'];
			$bdd->query("INSERT INTO Coach (nom, prenom, experience, note) VALUES ('$nom', '$prenom', '$experience', '$note');") or die('Erreur SQL !<br>');
		}
		else if ($select == 'programme' and $_POST['submit_programme'] == 'Ajouter') {
			$nom = $_POST['nom_prog'];
			$categorie = $_POST['categorie'];
			$description = $_POST['desc_prog'];
			$difficulte = $_POST['difficulte'];
			$avis = $_POST['avis'];
			$bdd->query("INSERT INTO Programme (nom, categorie_programme, prix, description, difficulte, avis) VALUES ('$nom','$categorie','0','$description', '$difficulte', '$avis');") or die('Erreur SQL !<br>');
		}
		else if ($select == 'exercice' and $_POST['submit_exercice'] == 'Ajouter') {
			$id_programme = $_POST['id_programme_e'];
			$nom = $_POST['nom_exercice'];
			$categorie = $_POST['categorie'];
			$description = $_POST['desc_exo'];
			$prix = $_POST['prix_exo'];
			$bdd->query("INSERT INTO Exercice (id_programme, nom_exercice, categorie_exercice, description, prix_exercice) VALUES ('$id_programme','$nom','$categorie', '$description', '$prix');"."UPDATE Programme SET Programme.prix = Programme.prix + '$prix' WHERE Programme.id = '$id_programme';") or die('Erreur SQL !<br>');
		}
		else if ($select == 'conseil' and $_POST['submit_conseil'] == 'Ajouter') {
			$id_programme = $_POST['id_programme_c'];
			$nom = $_POST['nom_conseil'];
			$categorie = $_POST['categorie'];
			$description = $_POST['desc_conseil'];
			$prix = $_POST['prix_conseil'];

			$bdd->query("INSERT INTO Exercice (id_programme, conseil, categorie_exercice, description, prix_conseil) VALUES ('$id_programme','$nom','$categorie', '$description', '$prix');"."UPDATE Programme SET Programme.prix = Programme.prix + '$prix' WHERE Programme.id = '$id_programme';") or die('Erreur SQL !<br>');
		}
	}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Administration</title>
	<link rel="stylesheet" href="/css/site.css">
	<link rel="stylesheet" href="/css/header.css">
	<link rel="stylesheet" href="/css/footer.css">
</head>
<body>
	<?php require('include/header.php'); ?>
	<div id="contenu">
		<div id="deroulant">
			<form method="GET" action="Administration.php">
				<select id="mon_select" name="select" onChange="this.parentNode.submit()">
				   	<label>Ajout :</label>
				   	<option value="" <?php if($select == "") echo "selected";?>>-- Choisissez une option --</option>
				   	<option value="coach" <?php if($select == "coach") echo "selected";?> >Coach</option>
				   	<option value="programme" <?php if($select == "programme") echo "selected";?> >Programme</option>
				   	<option value="exercice" <?php if($select == "exercice") echo "selected";?> >Exercice</option>
				   	<option value="conseil" <?php if($select == "conseil") echo "selected";?> >Conseil</option>
				</select>
			</form>
		</div>
		<div id="main">
			<?php
				if($select == '') { 
			?>
				<div id="default">
					
				</div>
			<?php 
				}

				if($select == 'coach') {
			?>
				<div id="form_coach">
					<form action="Administration.php?select=coach" method="post">
						<div class = "elem">
							<h1>Ajoutez un nouveau coach</h1>
						</div>
						<div class = "elem">
							<label for="nom">Nom: </label>
							<input type="text" name="nom_coach" required>
						</div>
						<div class = "elem">
							<label for="prenom">Prenom: </label>
							<input type="text" name="prenom_coach" required>
						</div>
						<div class = "elem">
							<label for="experience">Experience :</label>
							<input type="text" name="experience" required>
						</div>
						<div class = "elem">
							<label for="note">Note :</label>
							<input type="number" max="20" name="note" required>
						</div>
						<div class = "elem">
							<input type="submit" value="Ajouter" name="submit_coach">
						</div>
					</form>
				</div>
			<?php 
				}
				if($select == 'programme') {
				?>
					<div id="form_programme">
						<form action="Administration.php?select=programme" method="post">
							<div class = "elem">
								<h1>Ajoutez un nouveau programme</h1>
							</div>
							<div class = "elem">
								<label for="nom_prog">Nom Programme: </label>
								<input type="text" name="nom_prog" required>
							</div>
							<div class="radio" class ="elem">
								<div id="start">
									<label for="categorie">Catégorie: </label>
								</div>
								<div class="rond">
									<div>
										<input type="radio" name="categorie" value="musculation" checked><label>musculation</label>
									</div>
									<div>
										<input type="radio" name="categorie" value="remise en forme"><label>remise en forme</label>
									</div>
									<div>
										<input type="radio" name="categorie" value="relaxation"><label>relaxation</label>
									</div>
									<div>
										<input type="radio" name="categorie" value="cardio"><label>cardio</label>
									</div>
								</div>
							</div>
							<div class = "elem">
								<label for="desc_prog">Description :</label>
								<input type="textarea" name="desc_prog" required>
							</div>
							<div class = "elem">
								<label for="difficulte">Difficulté :</label>
								<input type="number" max="20" name="difficulte" required>
							</div>
							<div class = "elem">
								<label for="avis">Avis :</label>
								<input type="number" max="20" name="avis" required>
							</div>
							<div class = "elem">
								<input type="submit" value="Ajouter" name="submit_programme">
							</div>
						</form>
					</div>
				<?php 
				}

				if($select == 'exercice') {
				?>
					<div id="form_exo">
						<form action="Administration.php?select=exercice" method="post">
							<div class = "elem">
								<h1>Ajoutez un nouvel exercice</h1>
							</div>
							<div class = "elem">
								<label for="id_programme_e">ID Programme: </label>
								<input type="number" name="id_programme_e" required>
							</div>
							<div class = "elem">
								<label for="nom_exercice">Nom Exercice: </label>
								<input type="text" name="nom_exercice" required>
							</div>

							<div class="radio" class ="elem">
								<div id="start">
									<label for="categorie">Catégorie: </label>
								</div>
								<div class="rond">
									<div>
										<input type="radio" name="categorie" value="musculation" checked><label>musculation</label>
									</div>
									<div>
										<input type="radio" name="categorie" value="remise en forme"><label>remise en forme</label>
									</div>
									<div>
										<input type="radio" name="categorie" value="relaxation"><label>relaxation</label>
									</div>
									<div>
										<input type="radio" name="categorie" value="cardio"><label>cardio</label>
									</div>
								</div>
							</div>

							<div class = "elem">
								<label for="desc_exo">Description :</label>
								<input type="textarea" name="desc_exo" required>
							</div>
							<div class = "elem">
								<label>Prix :</label>
								<input type="number" name="prix_exo" required>
							</div>
							<div class = "elem">
								<input type="submit" value="Ajouter" name="submit_exercice">
							</div>
						</form>
					</div>
				<?php 
				}
				
					if($select == 'conseil') {
				?>
					<div id="form_conseil">
						<form action="Administration.php?select=conseil" method="post">
							<div class = "elem">
								<h1>Ajoutez un nouveau conseil</h1>
							</div>
							<div class = "elem">
								<label for="id_programme_c">ID Programme: </label>
								<input type="number" name="id_programme_c" required>
							</div>
							<div class = "elem">
								<label for="nom_conseil">Nom Conseil: </label>
								<input type="text" name="nom_conseil" required>
							</div>

							<div class="radio" class ="elem">
								<div id="start">
									<label for="categorie">Catégorie: </label>
								</div>
								<div class="rond">
									<div>
										<input type="radio" name="categorie" value="musculation" checked><label>musculation</label>
									</div>
									<div>
										<input type="radio" name="categorie" value="remise en forme"><label>remise en forme</label>
									</div>
									<div>
										<input type="radio" name="categorie" value="relaxation"><label>relaxation</label>
									</div>
									<div>
										<input type="radio" name="categorie" value="cardio"><label>cardio</label>
									</div>
								</div>
							</div>

							<div class = "elem">
								<label for="desc_exo">Description :</label>
								<input type="textarea" name="desc_conseil" required>
							</div>
							<div class = "elem">
								<label>Prix :</label>
								<input type="number" name="prix_conseil" required>
							</div>
							<div class = "elem">
								<input type="submit" value="Ajouter" name="submit_conseil">
							</div>
						</form>
					</div>
				<?php 
				}
				?>
		</div>
	</div>
	<?php require('include/footer.php'); ?>
</body>
</html>