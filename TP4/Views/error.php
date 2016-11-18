<?php
	$titre="Liste des films";
	ob_start();
	echo '<h1>'.$titre.'</h1>';
	echo '<h2>Une erreur est survenue:identifiant de film requis</h2>';
	$contenu=ob_get_clean();
	require("Views/layout.php");
?>