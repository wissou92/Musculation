
<?php 
  
  function connect(){

try{
$bdd = new mysqli('localhost', 'root', 'user', 'Programmes_Sportifs');
		$bdd->set_charset("utf8");
		//$requete = 'SELECT * FROM classement_coach';
		//$resultat = $mysqli->query($requete);
		/*while ($ligne = $resultat->fetch_assoc()) {
			echo $ligne['numero_coach'].' '.$ligne['nb_coaching'].' '.$ligne['avis_global'].' ';
		
		}
		$mysqli->close();*/

$req = $bdd->prepare('INSERT INTO Adherant(nom,prenom,email,mdp,poids,age,taille) VALUES(:nom, :prenom, :email, :mdp, :poids, :age , :taille)');
$req->execute(array(
	'nom' => $nom,
	'prenom' => $prenom,
	'email' => $email,
	'mdp' => $mdp,
	'poids' => $poids,
	'age' => $age,
	'taille' => $taille 
	));

echo 'Le jeu a bien été ajouté !';

	
}catch (Exception $e){   die('Erreur : ' . $e->getMessage()); }




}

?> 