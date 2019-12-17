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
				$resultat = $bdd->query
				("select nom, categorie_programme, prix, description, difficulte,avis ,id 
					from Programme ; ");
			    $tab[5][6];
				
			for ($it = 0 ; $it< 5 ; $it++) {  
			      $row = mysqli_fetch_array($resultat, MYSQLI_NUM);
			   	  $tab[$it][0]= $row[0]; 
			      $tab[$it][1]= $row [1];
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
	
	<link rel="stylesheet" type="text/css"  href="/css/site.css">
	<link rel="stylesheet" type="text/css" href="/css/header.css">
	<link rel="stylesheet" type="text/css" href="/css/footer.css">
</head>	





<body>
	<?php require('include/header.php'); ?>
		
		<div id= "pro-dec"> 
			<form method="post" action="Programmes.php">

			<h1>Programmes Sportifs</h1>
			 
			 <div  class ="main">

				<div >
				<input    id = "bt" value="En savoir plus"  type = "submit"  name = "m" >
				<input    id = "bt" value="Acheter"  type = "submit"  name = "Acheter" >
				<?php
				     echo '<h3>'.$tab[0][0].'</h3>';
					 echo '<p>Catégorie: '.$tab[0][1].'</p>';
					 echo '<p>Prix: '.$tab[0][2].'$</p>';
					 echo '<p>Difficulté: '.$tab[0][4].'/20</p>';
					 echo '<p>'.$tab[0][3].'</p>';

					if ( $_POST['m']=='En savoir plus')
					{
						$_SESSION['nom']= $tab[0][1]; 
						$_SESSION['email'] = $email; 
						header('location:http://localhost/ProjetBDD/Site/Exercice.php');
						exit;
					}	
					
					if ($_POST['Acheter']=='Acheter')
					{
					
							   try{    
									$bdd = new mysqli('localhost', 'wiss', 'wiss', 'Programmes_Sportifs'); 
									$bdd->set_charset("utf8");
								}catch (Exception $e){  die('Erreur : ' . $e->getMessage());}
						
							$id = $tab[0][6]; 
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
						  else{

						  	echo 'vous avez deja ce Programme';
						  }
					   
					}
								



				?>
			</div>

			<div>  
			<input    id = "bt" value="En savoir plus"  type = "submit"  name = "ma">
			<input    id = "bt" value="Acheter"  type = "submit"  name = "ma" >
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
					if ($_POST['ma']=='Acheter')
					{
						   try{    
								$bdd = new mysqli('localhost', 'wiss', 'wiss', 'Programmes_Sportifs'); 
								$bdd->set_charset("utf8");
							}catch (Exception $e){  die('Erreur : ' . $e->getMessage());}
					
						$id = $tab[1][6]; 
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
					  else{

					  	echo 'vous avez deja ce Programme';
					  }

				   
				}
			 ?>
			</div>
			  

			<div >
				 <input    id = "bt" value="En savoir plus"  type = "submit"  name = "ran" >
				 <input    id = "bt" value="Acheter"  type = "submit"  name = "ran" >
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

					if ($_POST['ran']=='Acheter')
					{
				try{    
								$bdd = new mysqli('localhost', 'wiss', 'wiss', 'Programmes_Sportifs'); 
								$bdd->set_charset("utf8");
							}catch (Exception $e){  die('Erreur : ' . $e->getMessage());}
					
						$id = $tab[2][6]; 
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
					  else{

					  	echo 'vous avez deja ce Programme';
					  }

				     }
				?>
			 </div> 

			 <div >
			 <input    id = "bt" value="En savoir plus"  type = "submit"  name = "100jr" >
			 <input    id = "bt" value="Acheter"  type = "submit"  name = "100jr" >
			 <?php      echo '<h3>'.$tab[3][0].'</h3>';
			 			echo '<p>Catégorie: '.$tab[3][1].'<p>';
			 			echo '<p>Prix: '.$tab[3][2].'$<p>';
			 			echo '<p>Difficulté: '.$tab[3][4].'/20<p>';
			 			echo '<p>'.$tab[3][3].'<p>';
			 	   
					if (isset($_POST['100j']) && $_POST['100jr']=='En savoir plus')
					{
						$_SESSION['nom']= $tab[3][1]; 
						$_SESSION['email'] = $email; 
						header('location:http://localhost/ProjetBDD/Site/Exercice.php');
					}
						if ($_POST['100jr']=='Acheter')
					{
				
						  try{    
								$bdd = new mysqli('localhost', 'wiss', 'wiss', 'Programmes_Sportifs'); 
								$bdd->set_charset("utf8");
							}catch (Exception $e){  die('Erreur : ' . $e->getMessage());}
					
						$id = $tab[3][6]; 
						$verif = $bdd -> query ("select P.id_programme 
						from Pratique P   
						where '$email' = P.email_adherent and $id  = id_programme;");
					if( mysqli_num_rows($verif) == 0){
					
						$req = $bdd->query("select CURRENT_DATE() ;") or die('sql erreur');
						$row = $req->fetch_row();
					  	$resultat = 
					 	$bdd->query( "INSERT INTO Pratique (date_debut , email_adherent , id_programme ) 
						VALUES( '$row[0]' , '$_SESSION[email]' , $id); "); 
					   
					  }else{ echo 'vous avez deja ce Programme';}
					}
				?> 
			 </div>

			 <div>
			 <input    	id = "bt" value="En savoir plus"  type = "submit"  name = "mf" >
			 <input    id = "bt" value="Acheter"  type = "submit"  name = "mf" >
			 <?php  	echo '<h3>'.$tab[4][0].'</h3>';
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
						if ($_POST['mf']=='Acheter')
					{
				try{    
								$bdd = new mysqli('localhost', 'wiss', 'wiss', 'Programmes_Sportifs'); 
								$bdd->set_charset("utf8");
							}catch (Exception $e){  die('Erreur : ' . $e->getMessage());}
					
						$id = $tab[4][6]; 
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
					  else{

					  	echo 'vous avez deja ce Programme';
					  }

				     }
			 	 ?>
			 </div> 
		 

		</div>
		    
		</form>
	<?php require('include/footer.php');?>
</body>

</html>
