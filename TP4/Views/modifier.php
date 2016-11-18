<?php
	$titre="Profile";
	ob_start();
	echo '<h1> Vos informations : </h1>';
	echo '<form method="post" action="index.php?action=update">';
			echo '<p>Login* : <input name="Login" value="'.$results['Login'].'" type="text" readonly="readonly" required/></p>';
			echo '<p>Nom : <input name="Nom" value="'.$results['Nom'].'" type="text" required/></p>';
			echo '<p>Mail : <input name="Mail" value="'.$results['Mail'].'" type="text" required/></p>';
			echo '<p>Mot de passe : <input name="Pass" value="'.$results['Pass'].'" type="password" required/></p>';
			echo '<p>Répéter mot de passe : <input name="Pass1" type="password" required/></p>';
			echo '<p> * Vous ne pouvez pas changer cette case</p>';
			echo '<p><input type="submit" value="Sauvegarder"></p>';
	echo '</form>';
	echo '<p>Site créé exclusivement en PHP5, HTML5 et CSS3</p>';
	$contenu=ob_get_clean();
	require("Views/layout.php");
?>