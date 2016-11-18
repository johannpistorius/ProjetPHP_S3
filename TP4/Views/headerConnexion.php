<?php
	echo '<header>';
		echo '<a class="button"  href="index.php">Accueil</a>';
		if(ISSET($_SESSION["utilisateur"])){
			echo '<a class="button"  href="index.php?action=deconnexion">Déconnexion</a>';
			echo '<a class="button"  href="index.php?action=profile">Profile</a>';
			echo '<p>Bonjour, '.$_SESSION["utilisateur"]. '!</p>';
		}
		else{
			echo '<a class="button"  href="index.php?action=connexion">Connexion</a>';
			echo '<a class="button"  href="index.php?action=inscription">Inscription</a>';
		}
	echo '</header>';
?>