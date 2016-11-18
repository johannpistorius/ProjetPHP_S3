<?php
	$titre="Profile";
	ob_start();
	echo '<h1> Vos informations : </h1>';
	echo '<p> Login : '.$results['Login'].'</p>';
	echo '<p> Nom : '.$results['Nom'].'</p>';
	echo '<p> Mail: '.$results['Mail'].'</p>';
	echo '<form method="post" action="index.php?action=modifier">';
		echo '<p><input type="submit" value="Modifier"></p>';
	echo '</form>';
	echo '<p>Site créé exclusivement en PHP5, HTML5 et CSS3</p>';
	$contenu=ob_get_clean();
	require("Views/layout.php");
?>