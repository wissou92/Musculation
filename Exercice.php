<!DOCTYPE html>
<html lang="fr">
<head>
	
	<meta charset="UTF-8">
	<title>
		Programmes Sportifs
	</title>
	<link rel="stylesheet" type="text/css"  href="">
 	

<form method="post" action="#">


</head>


<h1>Programmes Sportifs</h1>

<body>


  <div> 
  	<input    id = "bt" value="Acheter ce Programme"  type = "submit"  name = "prog" >
  </div>


	 <div  class ="main">
       	 <?php 
       	 session_start();
				try{    
					$bdd = new mysqli('localhost', 'root', 'user', 'Programmes_Sportifs'); 
					$bdd->set_charset("utf8");
				}catch (Exception $e){die('Erreur : ' . $e->getMessage());}

	$resultat = $bdd->query("select E.nom_exercice, E.prix_exercice,E.description
		 						 from Programme P, Exercice E  
		 	  				   	 where P.id = E.id_programme 
		 	  				   	 and '$_SESSION[nom]' = E.categorie_exercice;")   
		  	or die('Erreur SQL !<br>'.$sql3.'<br>'.mysqli_error()) ;

		  	$req = $bdd->query("select E.nom_exercice, E.prix_exercice, E.description
		 						 from Programme P, Exercice E  
		 	  				   	 where P.id = E.id_programme 
		 	  				   	 and '$_SESSION[nom]' = E.categorie_exercice ; ")
		  	or die('Erreur SQL !<br>'.$sql3.'<br>'.mysqli_error()) ;


		  	$nb = 0;
		    $i= 0; 
		    $_SESSION['nom'];
			 while ($row = mysqli_fetch_array($resultat, MYSQLI_NUM)) { $nb += 1 ; }
		
          if ( $nb != 0 ){
						    $tab[$nb][3]; 
						    while (  ($row1= mysqli_fetch_array($req, MYSQLI_NUM )) &&  $i  <  $nb ){
						 			
						   	  				$tab[$i][0]= $row1[0]; 
						     				$tab[$i][1]= $row1[1];
						      				$tab[$i][2]= $row1[2] ; 

						      				echo '<div>
						      					  <h3>'.$tab[$i][0].'</h3>'.
								 		 		 '<p>Prix: '.$tab[$i][1].'$</p>'.
								 			 	 '<p>Description: '.$tab[$i][2].'/20<p>
								 			 	 </div>';
								 		 	$i = $i +1 ; 
						   }
						}
			else { echo 'ce Programme ne contient aucun excercie pour le moment'; } 



			if ($_POST['prog']=='Acheter ce Programme')
			{
			
				$id = $_SESSION['id']; 
				$email = $_SESSION['email']; 
				$verif = $bdd -> query ("select P.id_programme 
				from Pratique P   
				where '$email' = P.email_adherent and $id  = id_programme;");
			
				if( mysqli_num_rows($verif) == 0){
			
					$req = $bdd->query("select CURRENT_DATE() ;") or die('sql erreur');
					$row = $req->fetch_row();
			  		$resultat = 
			 		$bdd->query( "INSERT INTO Pratique (date_debut , email_adherent , id_programme ) 
					VALUES( '$row[0]' , '$_SESSION[email]' , $id); "); 
			}
			  else{  echo 'vous avez deja ce Programme';}
			 
		} 
			
		 
 ?>
    </div>
	
</form>
</body>

</html>
