<?php
	$titre="Liste des films";
	ob_start();
	echo '<form method="post" action="index.php?action=login">';
			echo '<p><input name="Login" placeholder="Enter your username" type="text"/></p>';
			echo '<p><input name="Pass" placeholder="Enter your password" type="password"/>';
			echo '<p><input type="submit" value="Log in"></p>';
	echo '</form>';
	echo '<p>Site créé exclusivement en PHP5, HTML5 et CSS3</p>';
	$contenu=ob_get_clean();
	require("Views/layout.php");
?>