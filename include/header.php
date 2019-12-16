	<header>
		<div id="banniere">
		</div>
		<nav>
			<div id="information"></div>
			<ul>
				<a href="Profil.php">
					<li>Profil</li>
				</a>
				<a href="#.html">
					<li>Programme</li>
				</a>
				<a href="#.html">
					<li>Coach</li>
				</a>
				<a href="#.html">
					<li>Conseils</li>
				</a>
				<a href="#.html">
					<li>Exercices</li>
				</a>
				<a href="#.html">
					<li>Contact</li>
				</a>
			</ul>

			<div id="deconnexion">
				<form method="post" action="header.php">
					<input id="deconnect" type="submit" value="Deconnexion" name="deconnect">
				</form>
			</div>
		</nav>
	</header>


<?php
	if(isset($_POST['deconnect']) && $_POST['deconnect']=='Se déconnecter')
 		{
				session_destroy();
				header('location:accueil.php');
				exit;
		}

?>